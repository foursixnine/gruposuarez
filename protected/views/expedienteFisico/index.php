<?php
$this->breadcrumbs=array(
	'Expediente Fisicos',
);

$this->menu=array(
array('label'=>'Create ExpedienteFisico','url'=>array('create')),
array('label'=>'Manage ExpedienteFisico','url'=>array('admin')),
);
?>

<h1>Expediente Fisicos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
