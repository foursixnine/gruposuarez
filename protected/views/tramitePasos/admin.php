
<?php
$this->breadcrumbs=array(
	'Tramite Pasoses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Volver','url'=>array('tramite/admin')),
//array('label'=>'Create TramitePasos','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tramite-pasos-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<br/>

<button type="button" class="btn btn-warning">PASOS DE TRAMITES ANTERIORES</button>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-pasos-grid',
'dataProvider'=>$model,
//'filter'=>$model,
'columns'=>array(
			'id_tramite',
			'idPaso.abrev',	
			'idPaso.descripcion',		
			'id_cliente_gs',
			'fecha_pazysalvo',
		'buttons' => 
array(
            'class'=>'CButtonColumn',
            'template'=>'{actualizar}',
            'buttons'=>array
        (
        'actualizar' => array
        (
            'label'=>'Modificar o Actualizar Paso',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/edit.png',
            'url'=>'Yii::app()->createUrl("tramitePasos/update", array("id"=>$data->id_tramite_pasos))',
        ),
       /*              'delete' => array
     (
            'label'=>'Eliminar Proyecto',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
            'url'=>'Yii::app()->createUrl("metas/delete", array("id"=>$data->id_meta))',
        ),*/
                      
     ),
        ),
),
     
)); 
            
?>
