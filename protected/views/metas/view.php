<?php
$this->breadcrumbs=array(
	'Metases'=>array('index'),
	$model->id_meta,
);

$this->menu=array(
array('label'=>'Listar Metas','url'=>array('index')),
array('label'=>'Crear Cartera Corriente','url'=>array('carteracorriente')),
array('label'=>'Crear Cartera Vencida','url'=>array('carteravencida')),
array('label'=>'Actualizar Metas','url'=>array('update','id'=>$model->id_meta)),
array('label'=>'Eliminar Metas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_meta),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Metas','url'=>array('admin')),
);
?>

<h1>Meta -  #<?php echo $model->id_meta; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_meta',
		'idProyecto.titulo',
		'fecha_inicio',
		'fecha_fin',
		'monto',
		'porcentaje_meta',
		'monto_mes_proyecto',
                'idUsuario.nombre',
),
)); ?>
