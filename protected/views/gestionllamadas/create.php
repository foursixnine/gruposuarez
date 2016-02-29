<?php
$this->breadcrumbs=array(
	'Gestionllamadases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Gestionllamadas','url'=>array('index')),
array('label'=>'Manage Gestionllamadas','url'=>array('admin')),
);
?>

<h1>Create Gestionllamadas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>