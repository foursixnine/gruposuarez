<?php
$this->breadcrumbs=array(
	'Acuerdo Cobroses'=>array('index'),
	$model->id_acuerdo_cobros,
);

$this->menu=array(
array('label'=>'List AcuerdoCobros','url'=>array('index')),
array('label'=>'Create AcuerdoCobros','url'=>array('create')),
array('label'=>'Update AcuerdoCobros','url'=>array('update','id'=>$model->id_acuerdo_cobros)),
array('label'=>'Delete AcuerdoCobros','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_acuerdo_cobros),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage AcuerdoCobros','url'=>array('admin')),
);
?>

<h1>View AcuerdoCobros #<?php echo $model->id_acuerdo_cobros; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_acuerdo_cobros',
		'descripcion',
),
)); ?>
