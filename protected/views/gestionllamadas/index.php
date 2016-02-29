<?php
$this->breadcrumbs=array(
	'Gestionllamadases',
);

$this->menu=array(
array('label'=>'Create Gestionllamadas','url'=>array('create')),
array('label'=>'Manage Gestionllamadas','url'=>array('admin')),
);
?>

<h1>Gestionllamadases</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
