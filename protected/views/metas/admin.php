<?php
$this->breadcrumbs=array(
	'Metas'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Metas','url'=>array('index')),
array('label'=>'Crear Metas','url'=>array('create')),
array('label'=>'Calcular Remuneración de la Cobradora','url'=>array('calculoRemuneracion/calculoremunecacioncobradora')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('metas-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<br/>
<button class="btn btn-warning">ADMINISTRAR META</button>
<div>
<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'metas-grid',
'type' => 'striped bordered condensed',
'template' => "{items}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_meta',
		'monto',
		'porcentaje_meta',
		'monto_mes_proyecto',
	//	'idTipoMeta.descripcion',
	//	'idCrmProyecto.titulo',
                 'mes0.descripcion',
	      array(
                    'name'=>'id_crm_proyecto',
                    'header'=>'Proyecto',
                    'value'=> 'CHtml::encode($data->idCrmProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
               ), 
               array(
                    'name'=>'id_tipo_meta',
                    'header'=>'Tipo Meta',
                    'value'=> 'CHtml::encode($data->idTipoMeta["descripcion"])',
                    'filter'=>CHtml::listData(TipoMeta::model()->findAll(), 'id_tipo_meta', 'descripcion'),
               ), 
            array(
    'class' => 'bootstrap.widgets.TbEditableColumn',
    'name' => 'id_usuario',
    'editable' => array(
        'type' => 'select',
          'model'     => $model,
           'attribute' => 'id_usuario',
        'url' => $this->createUrl('actualizar'),
       // 'source'=>editable::source( CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre')),
    'source' =>  CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                     
        )   
    ),
/*array(
'class'=>'booster.widgets.TbButtonColumn',
),*/
      array(
            'class'=>'CButtonColumn',
            'template'=>'{ver}{delete}',
            'buttons'=>array
        (
        'ver' => array
        (
            'label'=>'Ver Meta',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
            'url'=>'Yii::app()->createUrl("metas/view", array("id"=>$data->id_meta))',
        ),
                  'delete' => array
        (
            'label'=>'Eliminar Proyecto',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
            'url'=>'Yii::app()->createUrl("metas/delete", array("id"=>$data->id_meta))',
        ),
                            
                
                
     ),
        ),
),
)); ?>
