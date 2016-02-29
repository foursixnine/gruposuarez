<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_pago')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pago),array('view','id'=>$data->id_pago)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_pago')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_total')); ?>:</b>
	<?php echo CHtml::encode($data->monto_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_cobro')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_cobro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trienta')); ?>:</b>
	<?php echo CHtml::encode($data->trienta); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sesenta')); ?>:</b>
	<?php echo CHtml::encode($data->sesenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noventa')); ?>:</b>
	<?php echo CHtml::encode($data->noventa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cientoveiente')); ?>:</b>
	<?php echo CHtml::encode($data->cientoveiente); ?>
	<br />

	*/ ?>

</div>