
<div class="container-fluid text-center jumbotron">
	<div class="display-3">SERVICES</div>
	<br>
	<br>
	<table class="table table-borderless table-responsive-sm table-active table-striped">
		<thead class="thead-light">
			<tr class="h3">
				<th scope="col"></th>
				<th scope="col">Third Party</th>
				<th scope="col">Comprehensive</th>
				<th scope="col">Comprehensive + Zero Depreciation</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach( $coverages as $key => $coverage ): ?>
			<tr>
				<th scope="row" class="h4"><?= $coverage['factor'] ?></th>
				<td>
					<?php if($coverage['third_party']):?>
						<i class="fas fa-check"></i>
					<?php elseif ($coverage['third_party'] == null):?>
						<em><?= 'Optional Add-on'?></em>
					<?php else:?>
						<?= 'X'?>
					<?php endif;?>
				</td>
				<td>
					<?php if($coverage['comprehensive']):?>
						<i class="fas fa-check"></i>
					<?php elseif($coverage['comprehensive'] == null): ?>
						<em><?= 'Optional Add-on'?></em>
					<?php else:?>
						<?= 'X'?>
					<?php endif;?>
				</td>
				<td>
					<?php if($coverage['comprehensive_plus_zero_depreciation']):?>
						<i class="fas fa-check"></i>
					<?php elseif($coverage['comprehensive_plus_zero_depreciation'] == null): ?>
						<em><?= 'Optional Add-on'?></em>
					<?php else:?>
						<?= 'X'?>
					<?php endif;?>
				</td>
			</tr>
		<?php endforeach;?>
		<tr>
			<td></td>
			<td>
				<?= form_open('insurance/services') ?>
				<?= form_hidden('insurance_id', 1)?>
				<?= form_submit('insure', 'Insure Now', 'class="btn btn-info btn-lg"')?>
				<?= form_close()?>
			</td>
			<td>
				<?= form_open('insurance/services') ?>
				<?= form_hidden('insurance_id', 2)?>
				<?= form_submit('insure', 'Insure Now', 'class="btn btn-info btn-lg"')?>
				<?= form_close()?>
			</td>
			<td>
				<?= form_open('insurance/services') ?>
				<?= form_hidden('insurance_id', 3)?>
				<?= form_submit('insure', 'Insure Now', 'class="btn btn-info btn-lg"')?>
				<?= form_close()?>
			</td>
		</tr>
		</tbody>
	</table>
<!--	--><?//= $random ?>
<!--	--><?php //print_r($array)  ?>
<!--	--><?php //print_r($unique)  ?>
</div>
