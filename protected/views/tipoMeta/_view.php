<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_meta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_meta),array('view','id'=>$data->id_tipo_meta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>