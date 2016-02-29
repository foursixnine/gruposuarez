<?php
$this->breadcrumbs=array(
	'Tipo Metas'=>array('index'),
	$model->id_tipo_meta=>array('view','id'=>$model->id_tipo_meta),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoMeta','url'=>array('index')),
	array('label'=>'Create TipoMeta','url'=>array('create')),
	array('label'=>'View TipoMeta','url'=>array('view','id'=>$model->id_tipo_meta)),
	array('label'=>'Manage TipoMeta','url'=>array('admin')),
	);
	?>

	<h1>Update TipoMeta <?php echo $model->id_tipo_meta; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>