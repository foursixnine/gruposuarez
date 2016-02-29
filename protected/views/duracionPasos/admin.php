<?php
$this->breadcrumbs=array(
	'Duración Pasos'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Duración de Pasos','url'=>array('index')),
array('label'=>'Create Duración de Pasos','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('duracion-pasos-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Duracion Pasoses</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'duracion-pasos-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		
		'idPaso.descripcion',
                array(
                    'name'=>'id_paso',
                    'header'=>'Paso',
                    'value'=> 'CHtml::encode($data->idPaso["descripcion"])',
                    'filter'=>CHtml::listData(Paso::model()->findAll(), 'id_paso', 'descripcion'),
                ), 
		'idTipoPaso.descripcion',
		'idBanco.descripcion',
		'duracion',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
