<?php
$this->breadcrumbs=array(
	'Razones Estados'=>array('index'),
	$model->id_razones_estado,
);

$this->menu=array(
array('label'=>'List RazonesEstado','url'=>array('index')),
array('label'=>'Create RazonesEstado','url'=>array('create')),
array('label'=>'Update RazonesEstado','url'=>array('update','id'=>$model->id_razones_estado)),
array('label'=>'Delete RazonesEstado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_razones_estado),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage RazonesEstado','url'=>array('admin')),
);
?>

<h1>View RazonesEstado #<?php echo $model->id_razones_estado; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_razones_estado',
		'descripcion',
),
)); ?>
