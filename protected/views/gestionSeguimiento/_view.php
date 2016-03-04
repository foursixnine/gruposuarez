<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_gestion_seguimiento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_gestion_seguimiento),array('view','id'=>$data->id_gestion_seguimiento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_gestion')); ?>:</b>
	<?php echo CHtml::encode($data->id_gestion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_gestion_seguimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_gestion_seguimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />


</div>