<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_expediente_fisico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_expediente_fisico),array('view','id'=>$data->id_expediente_fisico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>