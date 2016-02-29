<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cliente_gs),array('view','id'=>$data->id_cliente_gs)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_de_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_de_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_de_lote')); ?>:</b>
	<?php echo CHtml::encode($data->numero_de_lote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->id_proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_celular')); ?>:</b>
	<?php echo CHtml::encode($data->numero_celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_casa')); ?>:</b>
	<?php echo CHtml::encode($data->numero_casa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_adicional')); ?>:</b>
	<?php echo CHtml::encode($data->numero_adicional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</b>
	<?php echo CHtml::encode($data->cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lugar_trabajo')); ?>:</b>
	<?php echo CHtml::encode($data->lugar_trabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ocupacion')); ?>:</b>
	<?php echo CHtml::encode($data->ocupacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->sexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referencia_1')); ?>:</b>
	<?php echo CHtml::encode($data->referencia_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referencia_2')); ?>:</b>
	<?php echo CHtml::encode($data->referencia_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_ref_1')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_ref_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_ref_2')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_ref_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relacion_ref_1')); ?>:</b>
	<?php echo CHtml::encode($data->relacion_ref_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relacion_ref_2')); ?>:</b>
	<?php echo CHtml::encode($data->relacion_ref_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_de_reason')); ?>:</b>
	<?php echo CHtml::encode($data->id_de_reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendedor')); ?>:</b>
	<?php echo CHtml::encode($data->vendedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vendedor')); ?>:</b>
	<?php echo CHtml::encode($data->id_vendedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banco_acreedor')); ?>:</b>
	<?php echo CHtml::encode($data->banco_acreedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_banco')); ?>:</b>
	<?php echo CHtml::encode($data->id_banco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banco_interino')); ?>:</b>
	<?php echo CHtml::encode($data->banco_interino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_de_lote')); ?>:</b>
	<?php echo CHtml::encode($data->status_de_lote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo_del_pago')); ?>:</b>
	<?php echo CHtml::encode($data->motivo_del_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forma_de_pago')); ?>:</b>
	<?php echo CHtml::encode($data->forma_de_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_de_quotas')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_de_quotas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_de_quotas_mejoras')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_de_quotas_mejoras); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_de_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_de_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_civil')); ?>:</b>
	<?php echo CHtml::encode($data->estado_civil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_plan_pago')); ?>:</b>
	<?php echo CHtml::encode($data->status_plan_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_ultimo_pago')); ?>:</b>
	<?php echo CHtml::encode($data->monto_ultimo_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cartera_corriente')); ?>:</b>
	<?php echo CHtml::encode($data->cartera_corriente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cartera_30_dias')); ?>:</b>
	<?php echo CHtml::encode($data->cartera_30_dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cartera_60_dias')); ?>:</b>
	<?php echo CHtml::encode($data->cartera_60_dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cartera_90_dias')); ?>:</b>
	<?php echo CHtml::encode($data->cartera_90_dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cartera_120_dias')); ?>:</b>
	<?php echo CHtml::encode($data->cartera_120_dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_vencido')); ?>:</b>
	<?php echo CHtml::encode($data->total_vencido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_abono')); ?>:</b>
	<?php echo CHtml::encode($data->monto_abono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_liquidacion')); ?>:</b>
	<?php echo CHtml::encode($data->monto_liquidacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_venta')); ?>:</b>
	<?php echo CHtml::encode($data->total_venta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_quota_abono')); ?>:</b>
	<?php echo CHtml::encode($data->monto_quota_abono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gasto_legal')); ?>:</b>
	<?php echo CHtml::encode($data->gasto_legal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_mejoras')); ?>:</b>
	<?php echo CHtml::encode($data->monto_mejoras); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_cuota_mejoras')); ?>:</b>
	<?php echo CHtml::encode($data->monto_cuota_mejoras); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_de_pago_abono')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_de_pago_abono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ultimo_pago')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ultimo_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_de_entrega')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_de_entrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_de_permiso_contruccion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_de_permiso_contruccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_de_permiso_bomberos')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_de_permiso_bomberos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_de_permiso_ocupacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_de_permiso_ocupacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_de_carta_promesa')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_de_carta_promesa); ?>
	<br />

	*/ ?>

</div>