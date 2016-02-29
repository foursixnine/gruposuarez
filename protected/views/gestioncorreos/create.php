<?php
$this->breadcrumbs=array(
	'Gestioncorreoses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Gestioncorreos','url'=>array('index')),
array('label'=>'Manage Gestioncorreos','url'=>array('admin')),
);
?>

<h1>Create Gestioncorreos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>