<?php
$this->breadcrumbs=array(
	'Tramites',
);

$this->menu=array(
//array('label'=>'Crear Tramite','url'=>array('create')),
array('label'=>'Administrar Tramites','url'=>array('admin')),
);
?>

<h1>Tramites</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
