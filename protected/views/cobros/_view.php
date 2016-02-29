<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_cobros')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cobros),array('view','id'=>$data->id_cobros)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_cobro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_cobro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_total')); ?>:</b>
	<?php echo CHtml::encode($data->monto_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_abonado')); ?>:</b>
	<?php echo CHtml::encode($data->monto_abonado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_cobro')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_cobro); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cartera')); ?>:</b>
	<?php echo CHtml::encode($data->id_cartera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_liquidacion')); ?>:</b>
	<?php echo CHtml::encode($data->monto_liquidacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_ultimo_pago')); ?>:</b>
	<?php echo CHtml::encode($data->monto_ultimo_pago); ?>
	<br />

	*/ ?>

</div>