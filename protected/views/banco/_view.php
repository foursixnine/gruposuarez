<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_banco')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_banco),array('view','id'=>$data->id_banco)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>