<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_cartera')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_cartera),array('view','id'=>$data->id_tipo_cartera)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>