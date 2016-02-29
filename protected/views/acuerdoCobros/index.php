<?php
$this->breadcrumbs=array(
	'Acuerdo Cobroses',
);

$this->menu=array(
array('label'=>'Create AcuerdoCobros','url'=>array('create')),
array('label'=>'Manage AcuerdoCobros','url'=>array('admin')),
);
?>

<h1>Acuerdo Cobroses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
