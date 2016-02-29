<?php
$this->breadcrumbs=array(
	'Tipo Carteras'=>array('index'),
	$model->id_tipo_cartera=>array('view','id'=>$model->id_tipo_cartera),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoCartera','url'=>array('index')),
	array('label'=>'Create TipoCartera','url'=>array('create')),
	array('label'=>'View TipoCartera','url'=>array('view','id'=>$model->id_tipo_cartera)),
	array('label'=>'Manage TipoCartera','url'=>array('admin')),
	);
	?>

	<h1>Update TipoCartera <?php echo $model->id_tipo_cartera; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>