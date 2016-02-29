<?php
$this->breadcrumbs=array(
	'Tipo Carteras'=>array('index'),
	$model->id_tipo_cartera,
);

$this->menu=array(
array('label'=>'List TipoCartera','url'=>array('index')),
array('label'=>'Create TipoCartera','url'=>array('create')),
array('label'=>'Update TipoCartera','url'=>array('update','id'=>$model->id_tipo_cartera)),
array('label'=>'Delete TipoCartera','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_cartera),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoCartera','url'=>array('admin')),
);
?>

<h1>View TipoCartera #<?php echo $model->id_tipo_cartera; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipo_cartera',
		'descripcion',
),
)); ?>
