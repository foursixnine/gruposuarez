<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tramite')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tramite),array('view','id'=>$data->id_tramite)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente_gs')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente_gs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_pazysalvo')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_pazysalvo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_expediente_fisico')); ?>:</b>
	<?php echo CHtml::encode($data->id_expediente_fisico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pasos')); ?>:</b>
	<?php echo CHtml::encode($data->id_pasos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_abogado')); ?>:</b>
	<?php echo CHtml::encode($data->id_abogado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_razones_estado')); ?>:</b>
	<?php echo CHtml::encode($data->id_razones_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveedores')); ?>:</b>
	<?php echo CHtml::encode($data->id_proveedores); ?>
	<br />

	*/ ?>

</div>