<?php
$this->breadcrumbs=array(
	'Tramites'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Tramite','url'=>array('index')),
array('label'=>'Manage Tramite','url'=>array('admin')),
);
?>

<h1>Create Tramite</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
                                              'tramite'=>$tramite,
                                           //   'tramitepasos'=>$tramitepasos,
                                              'tramiteold'=>$tramiteold,
                                                )); ?>