<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_gestion_llamadas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_gestion_llamadas),array('view','id'=>$data->id_gestion_llamadas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_gestion')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_gestion); ?>
	<br />


</div>