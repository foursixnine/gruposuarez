<?php
$this->breadcrumbs=array(
	'Gestion Seguimientos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Seguimiento de Gestión','url'=>array('index')),
array('label'=>'Manage GestionSeguimiento','url'=>array('admin')),
);
?>
<h1>Observaciones (Seguimiento) - Gestón de Clientes</h1>

<?php echo $this->renderPartial('_form', array(
							'model'=>$model,
							'gestion_old'=>$gestion_old,
							'id_gestion'=>$id_gestion
							)); ?>