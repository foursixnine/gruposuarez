<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_acuerdo_cobros')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_acuerdo_cobros),array('view','id'=>$data->id_acuerdo_cobros)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>