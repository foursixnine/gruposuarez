<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_cumplimiento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cumplimiento),array('view','id'=>$data->id_cumplimiento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>