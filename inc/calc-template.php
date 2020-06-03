<div id="calc-wr">
	<form id="calc-form" action="" method="post">
		<h2 class="calc-main-title"><?php _e('Get a proposal','qcalc'); ?></h2>
		<div class="calc-step">
			<div class="calc-step__item">
				<h2 class="calc-sub-title calc-sub-title_1"><?php _e('Add info to get started','qcalc'); ?></h2>
				<div class="calc-fields-group">
					<div class="calc-field-wr calc-field-wr_currency">
						<?php
						$price = get_field('price','option');
						if(isset($price['price_group_1'])): ?>
						<label for="currencies"><?php _e('Currency','qcalc'); ?></label>
                        <div class="calc-field-wr__input-wrap calc-field-wr__input-wrap_select">
						    <select class="form-control" id="currencies" name="currencies">
							<?php
                                $i = 0;
								foreach ($price['price_group_1'] as $key => $currency):
							?>
								<option value="<?=$key;?>" <?php echo($i == 0) ? 'selected' : '' ?>><?=$key;?></option>
							<?php
									$i++;
								endforeach;
							?>
						</select>
                        </div>
						<?php
						endif;
						?>
					</div>
					<div class="calc-field-wr calc-field-wr_model">
						<?php
						$models = get_field('models','option');
						if($models): ?>
						<label for="models"><?php _e('Engagement model','qcalc'); ?></label>
                        <div class="calc-field-wr__input-wrap calc-field-wr__input-wrap_select">
                            <select class="form-control" id="models" name="models">
								<?php
								foreach ($models as $key => $model):
									?>
                                    <option value="<?=$key;?>" <?php echo($key == 0) ? 'selected' : '' ?>><?=$model['model_type'];?></option>
								<?php
								endforeach;
								?>
                            </select>
                        </div>
						<?php
						endif;
						?>
					</div>
					<div class="calc-field-wr calc-field-wr_devs">
						<?php
						$max_people = get_field('number_of_people','option');
						if($max_people): ?>
						<label for="devs"><?php _e('Team members','qcalc'); ?></label>
                        <div class="calc-field-wr__input-wrap">
                            <input name="devs" id="devs" class="form-control digits required" min="1" max="<?=$max_people;?>" value="1" placeholder="<?= __('Team size', 'qcalc'); ?>">
                            <div class="inc-btn" href="#"></div>
                            <div class="dec-btn" href="#"></div>
                        </div>
						<?php
						endif;
						?>
					</div>
                    <div class="calc-field-wr calc-field-wr_range">
                        <label for="range"><?php _e('Median salary <br> (Our service fee will be added)','qcalc'); ?></label>
                        <div class="calc-field-wr__range-wr">
                            <div id="range"></div>
                            <input type="hidden" id="budget" name="budget" value="2">
                        </div>
                    </div>
				</div>
				<div class="devs-icons-wr">
                    <img class="dev-icon" src="<?php echo plugin_dir_url(__DIR__) . 'assets/img/dev.png'; ?>" alt=""></div>
			</div>
			<div class="calc-step__item calc-step__item_model-item">
				<?php
				$service = (isset($models[0]['model_type'])) ? '<span class="model-type">' .$models[0]['model_type'] . '</span>' : '';
				?>
				<h2 class="calc-sub-title calc-sub-title_2"><?php _e('Our fee includes the following services','qcalc'); ?></h2>
				<div class="team-service-description">
					<?php echo (isset($models[0]['model_description'])) ? $models[0]['model_description'] : ''; ?>
				</div>
			</div>
			<div class="calc-step__item">
				<h2 class="calc-sub-title calc-sub-title_3"><?= __('Ready to scale?', 'qcalc'); ?></h2>
				<div class="calc-fields-group">
					<div class="calc-field-wr">
						<input name="first-name" id="first-name" class="form-control text required" type="text" placeholder="<?= __('First name', 'qcalc'); ?>">
					</div>
					<div class="calc-field-wr">
						<input name="last-name" id="last-name" class="form-control text required" type="text" placeholder="<?= __('Last name', 'qcalc'); ?>">
					</div>
					<div class="calc-field-wr">
						<input name="company" id="company" class="form-control address required" type="text" placeholder="<?= __('Company', 'qcalc'); ?>">
					</div>
					<div class="calc-field-wr">
						<input name="email" id="email" class="form-control required" type="email" placeholder="<?= __('Business email', 'qcalc'); ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="calc-btns">
			<button type="submit" class="btn calc-submit"><span><?= __('Send me estimation!', 'qcalc'); ?></span></button>
		</div>
	</form>
</div>
