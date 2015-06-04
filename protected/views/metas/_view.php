<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_meta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_meta),array('view','id'=>$data->id_meta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje_meta')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje_meta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_mes_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->monto_mes_proyecto); ?>
	<br />


</div>