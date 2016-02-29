<?php
$this->breadcrumbs=array(
	'Tipo Pasos'=>array('index'),
	$model->id_tipo_paso,
);

$this->menu=array(
array('label'=>'List TipoPaso','url'=>array('index')),
array('label'=>'Create TipoPaso','url'=>array('create')),
array('label'=>'Update TipoPaso','url'=>array('update','id'=>$model->id_tipo_paso)),
array('label'=>'Delete TipoPaso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_paso),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoPaso','url'=>array('admin')),
);
?>

<h1>View TipoPaso #<?php echo $model->id_tipo_paso; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipo_paso',
		'descripcion',
),
)); ?>
