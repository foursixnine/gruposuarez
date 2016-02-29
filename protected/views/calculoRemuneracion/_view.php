<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_calculo_remuneracion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_calculo_remuneracion),array('view','id'=>$data->id_calculo_remuneracion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resultado')); ?>:</b>
	<?php echo CHtml::encode($data->resultado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pago_remuneracion')); ?>:</b>
	<?php echo CHtml::encode($data->id_pago_remuneracion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cumplimiento')); ?>:</b>
	<?php echo CHtml::encode($data->cumplimiento); ?>
	<br />


</div>