<?php
$this->breadcrumbs=array(
	'Razones Estados',
);

$this->menu=array(
array('label'=>'Create RazonesEstado','url'=>array('create')),
array('label'=>'Manage RazonesEstado','url'=>array('admin')),
);
?>

<h1>Razones Estados</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
