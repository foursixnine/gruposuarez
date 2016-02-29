<?php
$this->breadcrumbs=array(
	'Tableroses'=>array('index'),
	$model->id_tablero,
);

$this->menu=array(
array('label'=>'List Tableros','url'=>array('index')),
array('label'=>'Create Tableros','url'=>array('create')),
array('label'=>'Update Tableros','url'=>array('update','id'=>$model->id_tablero)),
array('label'=>'Delete Tableros','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tablero),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Tableros','url'=>array('admin')),
);
?>

<h1>View Tableros #<?php echo $model->id_tablero; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tablero',
		'id_crm_proyecto',
		'fecha_inicio',
		'fecha_fin',
		'campo',
		'id_usuario',
),
)); ?>
