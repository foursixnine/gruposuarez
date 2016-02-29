<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_razones_estado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_razones_estado),array('view','id'=>$data->id_razones_estado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>