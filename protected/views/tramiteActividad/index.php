<?php
$this->breadcrumbs=array(
	'Tramite Actividads',
);

$this->menu=array(
array('label'=>'Create TramiteActividad','url'=>array('create')),
array('label'=>'Manage TramiteActividad','url'=>array('admin')),
);
?>

<h1>Tramite Actividads</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
