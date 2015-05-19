<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	$model->id_gestion,
);


?>



<h1>View Gestion #<?php echo $model->id_gestion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_gestion',
		'id_cliente',
		'contactado_llamada',
		'llamada_voz',
		'id_acuerdo_cobros',
		'fecha_acuerdo',
		'id_gestion_llamada',
),
)); ?>
