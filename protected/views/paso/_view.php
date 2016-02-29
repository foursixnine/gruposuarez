<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_paso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_paso),array('view','id'=>$data->id_paso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>