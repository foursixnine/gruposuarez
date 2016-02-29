<?php
$this->breadcrumbs=array(
	'Cobroses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Cobros','url'=>array('index')),
array('label'=>'Create Cobros','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('cobros-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Cobroses</h1>

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
'id'=>'cobros-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_cobros',
		'fecha_cobro',
		'id_proyecto',
		'monto_total',
		'monto_abonado',
		'id_cliente',
		/*
		'id_tipo_cobro',
		'id_cartera',
		'monto_liquidacion',
		'monto_ultimo_pago',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
