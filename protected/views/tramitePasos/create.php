<?php
$this->breadcrumbs=array(
	'Tramite Pasoses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TramitePasos','url'=>array('index')),
array('label'=>'Manage TramitePasos','url'=>array('admin')),
);
?>

<h1>Create TramitePasos</h1>

<?php echo $this->renderPartial('_form', array(
                                            'model'=>$model,
                                            'tramiteold'=>$tramiteold,
                                            'tramite'=>$tramite,
                                            'tramitepasos'=>$tramitepasos,
        
        
        
        )); ?>