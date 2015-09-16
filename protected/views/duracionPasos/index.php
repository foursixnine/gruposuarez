<?php
$this->breadcrumbs=array(
	'Duracion Pasoses',
);

$this->menu=array(
array('label'=>'Create DuracionPasos','url'=>array('create')),
array('label'=>'Manage DuracionPasos','url'=>array('admin')),
);
?>

<h1>Duracion Pasoses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
