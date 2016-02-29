<?php
$this->breadcrumbs=array(
	'Tipo Metas'=>array('index'),
	$model->id_tipo_meta,
);

$this->menu=array(
array('label'=>'List TipoMeta','url'=>array('index')),
array('label'=>'Create TipoMeta','url'=>array('create')),
array('label'=>'Update TipoMeta','url'=>array('update','id'=>$model->id_tipo_meta)),
array('label'=>'Delete TipoMeta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_meta),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoMeta','url'=>array('admin')),
);
?>

<h1>View TipoMeta #<?php echo $model->id_tipo_meta; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipo_meta',
		'descripcion',
),
)); ?>
