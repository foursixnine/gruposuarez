<?php
$this->breadcrumbs=array(
	'Tipo Pasos',
);

$this->menu=array(
array('label'=>'Create TipoPaso','url'=>array('create')),
array('label'=>'Manage TipoPaso','url'=>array('admin')),
);
?>

<h1>Tipo Pasos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
