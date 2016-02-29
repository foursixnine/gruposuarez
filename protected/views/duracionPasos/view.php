<?php
$this->breadcrumbs=array(
	'Duracion Pasoses'=>array('index'),
	$model->id_duracion_paso,
);

$this->menu=array(
array('label'=>'Listar Duracion de Pasos','url'=>array('index')),
array('label'=>'Create DuracionPasos','url'=>array('create')),
array('label'=>'Update DuracionPasos','url'=>array('update','id'=>$model->id_duracion_paso)),
array('label'=>'Delete DuracionPasos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_duracion_paso),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DuracionPasos','url'=>array('admin')),
);
?>

<h1>View DuracionPasos #<?php echo $model->id_duracion_paso; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_duracion_paso',
		'idPaso.descripcion',
		'idTipoPaso.descripcion',
		'idBanco.descripcion',
		'duracion',
),
)); ?>
