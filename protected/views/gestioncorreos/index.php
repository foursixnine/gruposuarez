<?php
$this->breadcrumbs=array(
	'Gestioncorreoses',
);

$this->menu=array(
array('label'=>'Create Gestioncorreos','url'=>array('create')),
array('label'=>'Manage Gestioncorreos','url'=>array('admin')),
);
?>

<h1>Gestioncorreoses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
