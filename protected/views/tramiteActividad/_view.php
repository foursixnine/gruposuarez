<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tramite_actividad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tramite_actividad),array('view','id'=>$data->id_tramite_actividad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tramite')); ?>:</b>
	<?php echo CHtml::encode($data->id_tramite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_tramite_actividad')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_tramite_actividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estado')); ?>:</b>
	<?php echo CHtml::encode($data->id_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_paso')); ?>:</b>
	<?php echo CHtml::encode($data->id_paso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />


</div>