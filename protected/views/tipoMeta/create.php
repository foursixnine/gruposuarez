<?php
$this->breadcrumbs=array(
	'Tipo Metas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoMeta','url'=>array('index')),
array('label'=>'Manage TipoMeta','url'=>array('admin')),
);
?>

<h1>Create TipoMeta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>