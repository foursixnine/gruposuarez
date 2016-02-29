<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_pago_remuneracion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pago_remuneracion),array('view','id'=>$data->id_pago_remuneracion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dinero')); ?>:</b>
	<?php echo CHtml::encode($data->dinero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bono')); ?>:</b>
	<?php echo CHtml::encode($data->bono); ?>
	<br />


</div>