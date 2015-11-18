<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	$model->id_gestion=>array('view','id'=>$model->id_gestion),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Gestion','url'=>array('index')),
	array('label'=>'Crear Gestión','url'=>array('create')),
	array('label'=>'Ver Gestion','url'=>array('view','id'=>$model->id_gestion)),
	array('label'=>'Administrar Gestion','url'=>array('admin')),
);
?>
<br/><br/>
<button type="button" class="btn btn-warning">ACTUALIZAR GESTION</button>



<?php echo $this->renderPartial('actualizar',array('model'=>$model,
'cliente'=>$cliente,
)); ?>

