<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	$model->id_gestion,
);


?>



<h1>Detalle de la Gesti&oacute;n #<?php echo $model->id_gestion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_gestion',
		'id_cliente',
		'contactado_llamada',
		'llamada_voz',
               
    
    
		'idAcuerdoCobros.descripcion',
		'fecha_acuerdo',
		'idGestionLlamadas.descripcion',
                'observaciones',
),
)); ?>
