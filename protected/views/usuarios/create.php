<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Usuarios','url'=>array('index')),
array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>


<button type="button" class="btn btn-warning">CREAR USUARIOS</button>
     
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>