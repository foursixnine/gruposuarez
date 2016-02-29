<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_duracion_paso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_duracion_paso),array('view','id'=>$data->id_duracion_paso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_paso')); ?>:</b>
	<?php echo CHtml::encode($data->idPaso["descripcion"]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_paso')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoPaso["descripcion"]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_banco')); ?>:</b>
	<?php echo CHtml::encode($data->idBanco["descripcion"]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duracion')); ?>:</b>
	<?php echo CHtml::encode($data->duracion); ?>
	<br />


</div>