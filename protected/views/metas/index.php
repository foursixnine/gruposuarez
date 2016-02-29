<?php
$this->breadcrumbs=array(
	'Metases',
);

$this->menu=array(
array('label'=>'Crear Metas','url'=>array('create')),
array('label'=>'Administrar Metas','url'=>array('admin')),
);
?>

<h1>Metas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
