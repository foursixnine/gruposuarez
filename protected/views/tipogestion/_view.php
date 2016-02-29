<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_gestion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_gestion),array('view','id'=>$data->id_tipo_gestion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>