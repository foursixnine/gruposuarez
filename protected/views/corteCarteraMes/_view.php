<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_corte_cartera_mes')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_corte_cartera_mes),array('view','id'=>$data->id_corte_cartera_mes)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mes')); ?>:</b>
	<?php echo CHtml::encode($data->mes); ?>
	<br />


</div>