<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_calculo_vencidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_calculo_vencidad),array('view','id'=>$data->id_calculo_vencidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('treinta')); ?>:</b>
	<?php echo CHtml::encode($data->treinta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sesenta')); ?>:</b>
	<?php echo CHtml::encode($data->sesenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noventa')); ?>:</b>
	<?php echo CHtml::encode($data->noventa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cientoveinte')); ?>:</b>
	<?php echo CHtml::encode($data->cientoveinte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_crm_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_crm_proyecto); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('mes')); ?>:</b>
	<?php echo CHtml::encode($data->mes); ?>
	<br />

	*/ ?>

</div>