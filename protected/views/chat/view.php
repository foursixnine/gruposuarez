<?php
$this->breadcrumbs=array(
	'Chats'=>array('index'),
	$model->id_chat,
);

$this->menu=array(
array('label'=>'List Chat','url'=>array('index')),
array('label'=>'Create Chat','url'=>array('create')),
array('label'=>'Update Chat','url'=>array('update','id'=>$model->id_chat)),
array('label'=>'Delete Chat','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_chat),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Chat','url'=>array('admin')),
);
?>

<h1>View Chat #<?php echo $model->id_chat; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_chat',
		'descripcion',
		'id',
		'archivo',
		'imagen',
),
)); ?>
