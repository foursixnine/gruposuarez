<?php
$this->breadcrumbs=array(
	'Gestionllamadases'=>array('index'),
	$model->id_gestion_llamadas,
);

$this->menu=array(
array('label'=>'List Gestionllamadas','url'=>array('index')),
array('label'=>'Create Gestionllamadas','url'=>array('create')),
array('label'=>'Update Gestionllamadas','url'=>array('update','id'=>$model->id_gestion_llamadas)),
array('label'=>'Delete Gestionllamadas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_gestion_llamadas),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Gestionllamadas','url'=>array('admin')),
);
?>

<h1>View Gestionllamadas #<?php echo $model->id_gestion_llamadas; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_gestion_llamadas',
		'descripcion',
		'id_tipo_gestion',
),
)); ?>
