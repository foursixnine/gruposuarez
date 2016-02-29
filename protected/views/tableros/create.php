<?php
$this->breadcrumbs=array(
	'Tableroses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Tableros','url'=>array('index')),
array('label'=>'Manage Tableros','url'=>array('admin')),
);
?>

<h1>Create Tableros</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>