<?php
$this->breadcrumbs=array(
	'Tramite Pasoses',
);

$this->menu=array(
array('label'=>'Create Tramite Pasos','url'=>array('create','id'=>$model->id_tramite)),
array('label'=>'Manage Tramite Pasos','url'=>array('admin')),
);
?>

<h1>Tramite Pasoses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
