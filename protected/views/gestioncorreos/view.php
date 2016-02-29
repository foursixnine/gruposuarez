<?php
$this->breadcrumbs=array(
	'Gestioncorreoses'=>array('index'),
	$model->id_gestion_correos,
);

$this->menu=array(
array('label'=>'List Gestioncorreos','url'=>array('index')),
array('label'=>'Create Gestioncorreos','url'=>array('create')),
array('label'=>'Update Gestioncorreos','url'=>array('update','id'=>$model->id_gestion_correos)),
array('label'=>'Delete Gestioncorreos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_gestion_correos),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Gestioncorreos','url'=>array('admin')),
);
?>

<h1>View Gestioncorreos #<?php echo $model->id_gestion_correos; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_gestion_correos',
		'descripcion',
		'id_tipo_gestion',
),
)); ?>
