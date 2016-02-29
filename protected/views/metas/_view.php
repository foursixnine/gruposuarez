<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_meta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_meta),array('view','id'=>$data->id_meta)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario.nombre')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario["nombre"]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCrmProyecto.titulo')); ?>:</b>
	<?php echo CHtml::encode($data->idCrmProyecto["titulo"]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mes')); ?>:</b>
	<?php echo CHtml::encode($data->mes0["descripcion"]); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_meta')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_meta); ?>
	<br />

	*/ ?>

</div>