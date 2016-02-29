<?php
$this->breadcrumbs=array(
	'Tipo Cobros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoCobro','url'=>array('index')),
	array('label'=>'Create TipoCobro','url'=>array('create')),
	array('label'=>'View TipoCobro','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoCobro','url'=>array('admin')),
	);
	?>

	<h1>Update TipoCobro <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>