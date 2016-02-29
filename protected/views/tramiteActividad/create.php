<?php
$this->breadcrumbs=array(
	'Tramite Actividads'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TramiteActividad','url'=>array('index')),
array('label'=>'Manage TramiteActividad','url'=>array('admin')),
);
?>

<h1>Create TramiteActividad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>