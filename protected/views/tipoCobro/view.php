<?php
$this->breadcrumbs=array(
	'Tipo Cobros'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List TipoCobro','url'=>array('index')),
array('label'=>'Create TipoCobro','url'=>array('create')),
array('label'=>'Update TipoCobro','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TipoCobro','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoCobro','url'=>array('admin')),
);
?>

<h1>View TipoCobro #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'descripcion',
),
)); ?>
