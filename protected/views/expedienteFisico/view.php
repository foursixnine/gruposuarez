<?php
$this->breadcrumbs=array(
	'Expediente Fisicos'=>array('index'),
	$model->id_expediente_fisico,
);

$this->menu=array(
array('label'=>'List ExpedienteFisico','url'=>array('index')),
array('label'=>'Create ExpedienteFisico','url'=>array('create')),
array('label'=>'Update ExpedienteFisico','url'=>array('update','id'=>$model->id_expediente_fisico)),
array('label'=>'Delete ExpedienteFisico','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_expediente_fisico),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ExpedienteFisico','url'=>array('admin')),
);
?>

<h1>View ExpedienteFisico #<?php echo $model->id_expediente_fisico; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_expediente_fisico',
		'descripcion',
),
)); ?>
