<?php
//car no
//staying place
//car model
//engine
//deisel
//mobile
//has ur policy expired ? not expired : already expird
//								|
						//when is ur policy expiring
?>
	<div class="container" style="width: 40rem">

		<div class="card">
			<div class="card-header text-center">
				<span class="display-4">Step 1 of 2</span>
			</div>
			<div class="card-body">
				<?= form_open('insurance/insure')?>
				<div class="form-row">
					<div class="form-group col-sm-6">
						<?php $fuel = array(1 => 'Third Party', 2 => 'Comprehensive', 3 => 'Comprehensive + Zero Depreciation') ?>
						<?= form_label('Insurance Cover Type :', 'insurance_id')?>
						<?= form_dropdown('insurance_id', $fuel, $insurance_id, 'class="form-control rounded-pill"')?>
						<?= form_error('insurance_id')?>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-6">
						<?= form_label('Car No :', 'car_no')?>
						<?php echo isset($car_no) ? form_input('car_no',$car_no, 'class="form-control rounded-pill"') : form_input('car_no','', 'class="form-control rounded-pill"')?>
						<?= form_error('car_no')?>
					</div>
					<div class="form-group col-sm-6">
						<?= form_label('Car Model :', 'car_model')?>
						<?php echo isset($car_model) ? form_input('car_model',$car_model, 'class="form-control rounded-pill"') : form_input('car_model','', 'class="form-control rounded-pill"')?>
						<?= form_error('car_model')?>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-6">
						<?= form_label('Engine :', 'engine')?>
						<?php echo isset($engine) ? form_input('engine',$engine, 'class="form-control rounded-pill"') : form_input('engine','', 'class="form-control rounded-pill"')?>
						<?= form_error('engine')?>
					</div>
					<div class="form-group col-sm-6">
						<?php $fuel = array(1 => 'Petrol', 2 => 'Diesel') ?>
						<?= form_label('Fuel Type :', 'fuel_type')?>
						<?= form_dropdown('fuel_type', $fuel, 1, 'class="form-control rounded-pill"')?>
						<?= form_error('fuel_type')?>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12">
						<?= form_label('Address :', 'address')?>
						<?php echo isset($address) ? form_input('address',$address, 'class="form-control rounded-pill"') : form_input('address','', 'class="form-control rounded-pill"')?>
						<?= form_error('address')?>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-6">
						<?= form_label('Phone No:', 'phone')?>
						<?= form_input('phone', $customer_details['phone'], 'class="form-control rounded-pill"')?>
						<?= form_error('phone')?>
					</div>
				</div>
				<div class="text-center">
					<?= form_submit('checkout', '       Proceed to Payment       ', 'class="btn btn-info rounded-pill"')?>
				</div>
				<?= form_close()?>
			</div>
		</div>
	</div>
