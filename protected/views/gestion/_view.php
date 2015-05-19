<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_gestion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_gestion),array('view','id'=>$data->id_gestion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contactado_llamada')); ?>:</b>
	<?php echo CHtml::encode($data->contactado_llamada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('llamada_voz')); ?>:</b>
	<?php echo CHtml::encode($data->llamada_voz); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('id_acuerdo')); ?>:</b>
	<?php //echo CHtml::encode($data->id_acuerdo); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('fecha_acuerdo')); ?>:</b>
	<?php//echo CHtml::encode($data->fecha_acuerdo); ?>
	<br />
	<b><?php //echo CHtml::encode($data->getAttributeLabel('id_gestion_llamada')); ?>:</b>
	<?php //echo CHtml::encode($data->id_gestion_llamada); ?>
	<br />


</div>