<?php
$this->breadcrumbs=array(
	'Calculo Remuneracions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List calculoRemuneracion','url'=>array('index')),
array('label'=>'Manage calculoRemuneracion','url'=>array('admin')),
);
?>


<br/>
<h1>Calculo de Remuneraci&oacute;n</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 
                    'metas'=>$metas,
                    'usuarios'=>$usuarios,
                    'tablar'=>$tablar,
                    )); ?>