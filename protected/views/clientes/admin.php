<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Volver','url'=>array('gestion/index')),
//array('label'=>'Create Clientes','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('clientes-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Perfil de Cliente</h1>

<p>
	<!--You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.-->
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
/*
 $this->widget('booster.widgets.TbGridView',array(
'id'=>'clientes-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_gruposuarez',
		'cedula',
		'nom_cliente',
		'ape_cliente',
		'fe_cumpleannos',
		'direccion',
        array(
        'name'=>'id_proyecto',
        'header'=>'Proyecto',
        'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_proyecto', 'titulo'),
        ),*/
		
	/*	'telefono',
		'celular',
		'correo',
		'telefono2',
		'id_cliente',
		'id_status',
		'ocupacion',
		'id_ciudad',
		'fax',
		'ruc',
		'estado_civil',
		'nacionalidad',
		'sexo',
		'lugar_trabajo',
		'id_proyecto',*/
/*		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); */
$this->widget('booster.widgets.TbGridView',array(
'id'=>'clientes-grid',
'dataProvider'=>$model->buscarproyecto(),
'filter'=>$model,
'columns'=>
        array(
		'nom_cliente',
		'ape_cliente',
		'direccion',
        array(
        'name'=>'id_proyecto',
        'header'=>'Proyecto',
        'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
        'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_proyecto', 'titulo'),
        ),

'buttons' => 
   array(
            'class'=>'CButtonColumn',
                        'template' => '{iniciar_gestion} ',
                        'buttons' => array(
                             'iniciar_gestion' => array(
                                    'label'=>'Detalle Cliente',
                                    'url'=>'Yii::app()->createUrl("/clientes/perfilcliente/",array("id"=>$data["id_cliente"]))',
                                    
                       ) )
            ), 

		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
));

?>
