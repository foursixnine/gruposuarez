<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tablero')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tablero),array('view','id'=>$data->id_tablero)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_crm_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_crm_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campo')); ?>:</b>
	<?php echo CHtml::encode($data->campo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mes')); ?>:</b>
	<?php echo CHtml::encode($data->mes); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('anno')); ?>:</b>
	<?php echo CHtml::encode($data->anno); ?>
	<br />

	*/ ?>

</div>