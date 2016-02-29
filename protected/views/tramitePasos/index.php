<?php
$this->breadcrumbs=array(
	'Tramite Pasoses',
);

$this->menu=array(
array('label'=>'Create TramitePasos','url'=>array('create','id'=>$model->id_tramite)),
array('label'=>'Manage TramitePasos','url'=>array('admin')),
);
?>

<h1>Tramite Pasoses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
