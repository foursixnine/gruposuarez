<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('ID_CLIENTE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_CLIENTE),array('perfilcliente','id'=>$data->id_cliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_DE_EMPRESA')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PROYECTO')); ?>:</b>
	<?php echo CHtml::encode($data->PROYECTO); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('NUMERO_DE_LOTE')); ?>:</b>
	<?php echo CHtml::encode($data->NUMERO_DE_LOTE); ?>
	<br />

</div>

<br/>