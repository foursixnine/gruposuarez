<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	$model->id_gestion,
);

$this->menu=array(
array('label'=>'Volver','url'=>array('cliente/detalle')),
);
?>


<button type="button" class="btn btn-warning">Detalle de  la Gesti&oacute;n #<?php echo $model->id_gestion; ?></button>


<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_cliente',
		'idClienteGs.nombre_de_empresa',
		'idClienteGs.proyecto',
		'idClienteGs.numero_de_lote',
		'contactado_llamada',
		'llamada_voz',
		'idAcuerdoCobros.descripcion',
		'fecha_acuerdo',
		'idGestionLlamadas.descripcion',
        'observaciones',
),
)); ?>
