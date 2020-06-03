<?php
use Dompdf\Dompdf;
class estCalculator
{
	public function activate()
	{
		if ( ! is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
			// Stop activation redirect and show error
			wp_die('Sorry, but this plugin requires the ACF Pro to be installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
		}
	}

	public function createOptionPage()
	{
		if( function_exists('acf_add_options_page') ) {
			$option_page = acf_add_options_page(array(
				'page_title' 	=> 'Qubit Calculator Settings',
				'menu_title' 	=> 'Qubit Calculator',
				'menu_slug' 	=> 'qubit-calc-settings',
				'capability' 	=> 'edit_posts',
				'redirect' 	=> false
			));
		}
	}

	public function showCalcForm()
	{
		ob_start();
		require( plugin_dir_path( __DIR__ ) . 'inc/calc-template.php' );
		$content = ob_get_clean();
		return $content;
	}

	public function enqueue()
	{

			wp_enqueue_script('validate', plugins_url('assets/js/jquery.validate.min.js', __DIR__), array('jquery'), 1, true );
			wp_enqueue_script('ui-slider', plugins_url('assets/js/jquery-ui.min.js', __DIR__), array('jquery'), 1, true );
			wp_enqueue_script('qubit-calc-script', plugins_url('assets/js/est-calc.js', __DIR__), array('jquery'), 1, true);

			wp_localize_script('qubit-calc-script', 'qubitCalc',
				array(
					'ajaxurl' => admin_url('admin-ajax.php'),
				)
			);

	}

	public function convertPDF($templatePath, $fileName)
	{
		require_once( plugin_dir_path( __DIR__ ) . 'vendor/dompdf/autoload.inc.php' );
		$dompdf = new Dompdf([
			'enable_remote' => true,
			'isHtml5ParserEnabled' => true
		]);

		$dompdf->loadHtml($templatePath);
		$dompdf->setPaper('A4', 'portrait');
		// Render the HTML as PDF
		$dompdf->render();
		// Output the generated PDF to Browser
//		$dompdf->stream();
		$output = $dompdf->output();
		$save = file_put_contents(ABSPATH . '/reports/' . $fileName, $output);
		return $save;
	}

	public function getModelDescription()
	{
		$model = filter_var($_POST['modelID'], FILTER_SANITIZE_NUMBER_INT);
		if($model !== false){
			$models = get_field('models', 'option');
			if($models && is_array($models)) {
				$description = (isset($models[$model]['model_description'])) ? $models[$model]['model_description'] : '';
				echo json_encode($description);
			}
		}else {
			echo 'false';
		}
		wp_die();
	}

	function calcSum($devs, $currency)
	{
		$price_range = get_field('price', 'option');
		if($price_range && (int)$devs && $currency) {
			$price_group = 'price_group_';
			if($devs <= 4) {
				$price_group .= '1';
			}elseif ($devs <= 10){
				$price_group .= '2';
			}else {
				$price_group .= '3';
			}
			if(isset($price_range[$price_group][$currency])){
				return $price_range[$price_group][$currency];
			}
		}
		return false;
	}

	private function sendAdminEmail($data)
	{
		$emailText = '';
		foreach($data as $key => $value) {
			$emailText .= $key . ": " . $value . " \n";
		}
		$headers[] = 'From: Company name <name>';
		wp_mail('example@thismail.mail', 'Calculator inquiry', $emailText);
	}

	private function sendUserEmail($user_email, $user_name, $user_surname, $fileName)
	{
		$emailFrom = get_field('email_from','option');
		$userName = $user_name . ' ' . $user_surname;
		$reportLink = get_home_url() . '/reports/' . $fileName;
		$logo = get_field('email_logo', 'option');
		$img = get_field('email_image', 'option');
		$links = get_field('links', 'option');
		ob_start();
		include( plugin_dir_path( __DIR__ ) . '/inc/email.php' );
		$emailTemplate = ob_get_clean();
		if($emailFrom && $emailTemplate && $links && $logo) {
			$headers[] = 'From: Company name <'. $emailFrom .'>';
			$headers[] = 'content-type: text/html';
			wp_mail($user_email, 'Your estimation for remote team set up by Company name is ready!', $emailTemplate, $headers);
		}

	}

	public function calcReport()
	{
		$data = array();
		parse_str($_POST['calcData'], $data);
		if($data){
			$validData = array();
			$result = array();

			$user_name = filter_var($data['first-name'], FILTER_SANITIZE_STRING);
			$validData['First name']=$user_name;

			$user_surname = filter_var($data['last-name'], FILTER_SANITIZE_STRING);
			$validData['Last name']=$user_surname;

			$company = filter_var($data['company'], FILTER_SANITIZE_STRING);
			$validData['Company']=$company;

			$user_email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
			$validData['Email']=$user_email;

			$currency = filter_var($data['currencies'], FILTER_SANITIZE_STRING);
			$validData['Currencies']=$currency;

			$budget = (filter_var($data['budget'], FILTER_SANITIZE_NUMBER_INT)) ? $data['budget'] * 1000 : '';
			$validData['Budget']=$budget;

			$devs = filter_var($data['devs'], FILTER_SANITIZE_NUMBER_INT);
			$validData['Developers']=$devs;

			$model = filter_var($data['models'], FILTER_SANITIZE_NUMBER_INT);

			if($user_email && $currency && $devs) {
				$comissionPerPerson = $this->calcSum($devs, $currency);
				$tax = $budget * 6 / 100;
				$total = ($budget + $comissionPerPerson + $tax) * $devs;
				if( $models = get_field('models', 'option')) {
					$model_type = $models[$model]['model_type'];
					$validData['Model type']=$model_type;
				}
				$currencySymbol = '';
				switch ($currency){
					case "USD":
						$currencySymbol = '$';
						break;
					case "EUR":
						$currencySymbol = '€';
						break;
					case "GBP":
						$currencySymbol = '£';
						break;
				}
				$this->sendAdminEmail($validData);
				//convert report
				ob_start();
				include( plugin_dir_path( __DIR__ ) . '/inc/report-template.php' );
				$reportTemplate = ob_get_clean();
				$fileName = 'report_' . date("Y-m-d-h-i") . '_' . rand() . '.pdf';
				$report = $this->convertPDF($reportTemplate, $fileName);

				if($report){
					$this->sendUserEmail($user_email, $user_name, $user_surname , $fileName);
					$result['message'] = get_field('submit_message', 'option');
				}else {
					$result['message'] = "Repord hasn't be created.";
				}
				echo json_encode($result);
			}else {
				echo 'Validation data error';
			}

		}else {
			echo 'false';
		}
		wp_die();
	}
}
