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

<?php echo $this->renderPartial('_form', array('model'=>$model, 
                    'metas'=>$metas,
                    'cobrado'=>$cobrado,
                    'tablar'=>$tablar,
                    'pivote_inicio_mes'=> $pivote_inicio_mes,
                    'pivote_final_mes'=>$pivote_final_mes,
                    'meta_corriente'=>$meta_corriente,
                    )); 
?>