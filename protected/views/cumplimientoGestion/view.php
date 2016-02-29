<?php
$this->breadcrumbs=array(
	'Cumplimiento Gestions'=>array('index'),
	$model->id_cumplimiento,
);

$this->menu=array(
array('label'=>'List CumplimientoGestion','url'=>array('index')),
array('label'=>'Create CumplimientoGestion','url'=>array('create')),
array('label'=>'Update CumplimientoGestion','url'=>array('update','id'=>$model->id_cumplimiento)),
array('label'=>'Delete CumplimientoGestion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cumplimiento),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CumplimientoGestion','url'=>array('admin')),
);
?>

<h1>View CumplimientoGestion #<?php echo $model->id_cumplimiento; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_cumplimiento',
		'descripcion',
),
)); ?>
