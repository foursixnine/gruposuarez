<?php

function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
$fecha_actual = date('Y-m-d');
// Ejemplo de uso:
$this->breadcrumbs=array(
	'Tramites'=>array('index'),
	'Administrar',
);
//'<br/>';
$this->menu=array(
array('label'=>'Listar Tramites','url'=>array('listar')),
array('label'=>'Tramites en Transito','url'=>array('continuartramites')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tramite-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<br/>
<button type="button" class="btn btn-warning">CLIENTE EN TRAMITES</button>
<?php



$this->widget('booster.widgets.TbGridView',array(
'id'=>'clientetramite',
'dataProvider'=>$cliente->clientestramites(),
'filter'=>$cliente,
'columns'=>array(
                'nombre_de_empresa',
                'status_de_lote', 
                'numero_de_lote',
                array(
                    'name'=>'id_proyecto',
                    'header'=>'Proyecto',
                    'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),                   
                ),                         
                'buttons' => 
   array(
            'class'=>'CButtonColumn',
                        'template' => '{iniciar_tramite} ',
                        'buttons' => array(
                             'iniciar_tramite' => array(
                                    'label'=>'Iniciar',
                                    'url'=>'Yii::app()->createUrl("/cliente/iniciartramite/",array("id"=>$data["id_cliente_gs"]))',
                                    
                       ) )
            ), 
                    
		
)
)
    );
?>

<button type="button" class="btn btn-warning">INICIAR TRAMITES</button>

<?php 
$this->widget('booster.widgets.TbGridView',array(
'id'=>'tramitadora',
'dataProvider'=>$tramitadora->activos(),
'filter'=>$tramitadora,
'columns'=>array(
                'fecha_pazysalvo',
                array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'id_expediente_fisico',
                    'editable' => 
                        array(
                            'type' => 'select',
                            'model'     => $model,
                            'attribute' => 'id_expediente_fisico',
                            'url' => $this->createUrl('actualizar'),
                            'source' =>  CHtml::listData(ExpedienteFisico::model()->findAll(), 'id_expediente_fisico', 'descripcion'),      
                        )
                ), 
		'idClienteGs.nombre_de_empresa',
		'idClienteGs.proyecto',
		'idClienteGs.numero_de_lote',
                array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'id_usuario',
                    'editable' => 
                        array(
                            'type' => 'select',
                            'model'     => $model,
                            'attribute' => 'id_usuario',
                         //    'text'      => 'Seleccione el Tramitador',
                            'url' => $this->createUrl('actualizarcobradora'),
                            'source' =>  CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),      
                        )
                ),     
                array(
                    'class' => 'bootstrap.widgets.TbToggleColumn',
                    'toggleAction' => 'tramite/toggle',
                    'name' => 'permiso_ocupacion',
                    'header' => 'Permiso de Ocupacion',
                    'filter'=>false,
                ),  	
  array(
    'class'=>'CLinkColumn',
    'header'=>'Tramite',
    'labelExpression'=>'($data->permiso_ocupacion != 0 ? "Iniciar Tramite" : "Falta Permiso")',
    'urlExpression'=>'($data->permiso_ocupacion!=0) ? Yii::app()->createUrl("tramitePasos/tramite",array("id"=>$data["id_tramite"])) : "#"',
    'cssClassExpression'=>'($data->permiso_ocupacion==1 ? " challenged" : "")',  
    ),
    
    


)
)
    );

?>