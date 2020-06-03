<?php
/*
Plugin Name:  Estimation calculator
Version:      1.5.1
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

spl_autoload_register('est_calc_classes_autoload');
function est_calc_classes_autoload($class_name) {
	if( file_exists(__DIR__ . '/core/' . $class_name . '.php')  ){
		require __DIR__ . '/core/' . $class_name . '.php';
	}
}

$qb_calc = new estCalculator();

register_activation_hook(__FILE__, array($qb_calc, 'activate'));

$qb_calc->createOptionPage();

//$qb_calc->convertPDF('test','test');

add_shortcode('calc-form', array($qb_calc, 'showCalcForm'));
add_action( 'wp_enqueue_scripts', array($qb_calc, 'enqueue') );
add_action( 'wp_ajax_get_model', array($qb_calc, 'getModelDescription') );
add_action( 'wp_ajax_nopriv_get_model', array($qb_calc, 'getModelDescription') );
add_action( 'wp_ajax_get_report', array($qb_calc, 'calcReport') );
add_action( 'wp_ajax_nopriv_get_report', array($qb_calc, 'calcReport') );

//function my_setup() {
//	global $qb_calc;
////	$qb_calc->calcSum('','');
//	$qb_calc->testConvert();
//}
//add_action('plugins_loaded', 'my_setup');
