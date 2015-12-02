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
array('label'=>'Tramites Liquidados','url'=>array('tramitesliquidados')),
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

<?php
 $tags = array(
      array('id' => 1, 'text' => 'SI'),
      array('id' => 0, 'text' => 'NO'),
    

    );

  $id = Yii::app()->user->id;
  $a = Yii::app()->user->name;
 if($a=='admin' or $a=='lvelasco'){
   


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
                'fecha_de_permiso_ocupacion',
                'observacion_tramite',
               /* array(
                    'name'=>'id_proyecto',
                    'header'=>'Proyecto',
                    'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),                   
                ), */
      
       /*            array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'confeccion_protocolo',                    
                    'editable' => 
                        array(

        'type'      => 'select2',
        'model'     => $cliente,
        'attribute' => 'confeccion_protocolo',
        'url'       => $this->createUrl('/cliente/actualizarprotocolo'), 
        'source'    => $tags,
        'placement' => 'right',

        'select2'   => array(
           'multiple' => false
        ),
        )
                    ), */
    array(
                    'class' => 'bootstrap.widgets.TbToggleColumn',
                    'toggleAction' => 'cliente/toggle',
                    'name' => 'confeccion_protocolo',
                    'header' => 'Permiso de Ocupacion',
                    'filter'=>false,
                ),
                  

                array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'id_rango',
                    'htmlOptions'=>array('width'=>'150'),
                    'editable' => array(
                      'apply'=>'$data->confeccion_protocolo ==1 ? true : false',
                        'type' => 'select',
                        'source' =>  CHtml::listData(Rango::model()->findAll(), 'id_rango', 'descripcion'),      
                        'url' => $this->createUrl('/cliente/actualizarprotocolo'), 
                        'placement' => 'right',
                    )
                ),
         /*array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'monto_liquidacion',    
                            'editable' => array(
                                //   'apply'=>'$data->confeccion_protocolo ==1',
                                    'type' => 'text',
                                   // 'apply'=>'($data->confeccion_protocolo == 1 ? true : false)',
                                    //'apply' => '$data->confeccion_protocolo == 1',
                                    'model'     => $cliente,
                                    'attribute' => 'monto_liquidacion',
                                    'url' => $this->createUrl('/cliente/actualizarprotocolo'), 


      

                            ),
                    ),*/
/*
  array('name' => 'monto_liquidacion',
        'value'=>'($data->monto_liquidacion != 0 ? "Iniciar Tramite" : "Falta Permiso")',
              'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
    ),*/
             
                'buttons' => 
                array(
                'class'=>
                        'CButtonColumn',
                        'template' => '{iniciar_tramite} ',
                        'buttons' => array(
                             'iniciar_tramite' => array(
                                    'label'=>'Iniciar',
                                    'url'=>'Yii::app()->createUrl("/cliente/iniciartramite/",array("id"=>$data["id_cliente_gs"]))',
                                    
                        )                  )
                ), 
                    
		
)
)
    );
?>


<button type="button" class="btn btn-warning">INICIAR TRAMITES</button>

<?php 
$this->widget('booster.widgets.TbGridView',array(
'id'=>'tramitadoraold',
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
                                'model'     => $tramitadora,
                                'attribute' => 'id_expediente_fisico',
                                'url' => $this->createUrl('actualizar'),
                                'source' =>  CHtml::listData(ExpedienteFisico::model()->findAll(), 'id_expediente_fisico', 'descripcion'),      
                            )
                    ), 

                'idClienteGs.nombre_de_empresa',
                'idClienteGs.proyecto',
             
                'idClienteGs.numero_de_lote',
                'idClienteGs.fecha_de_permiso_ocupacion',
          /*      array(
                    'name'=>'id_usuario',
                    'header'=>'Tramitador',
                    'value'=> 'CHtml::encode($data->idUsuario["nombre"])',
                    'filter'=>CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                ), */
                array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'id_usuario',
                    'editable' => 
                        array(
                            'type' => 'select',
                            'model'     => $tramitadora,
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
   // 'urlExpression'=>'($data->idClienteGs["pazysalvo"]!=0) ? Yii::app()->createUrl("tramitePasos/tramite",array("id"=>$data["id_tramite"])) : "#"',
    'urlExpression'=>'($data->permiso_ocupacion !=0) ? Yii::app()->createUrl("tramitePasos/tramite",array("id"=>$data["id_tramite"])) : "#"',
   
    'cssClassExpression'=>'($data->permiso_ocupacion==1 ? " challenged" : "")',  
    ),


                array(
                      'class' =>'bootstrap.widgets.TbEditableColumn',
                      'name' => 'idClienteGs.observacion_tramite',
                      'editable' => 
                          array(
                              'type' => 'textarea',
                              'model'     => $cliente,
                              'attribute' => 'idClienteGs.observacion_tramite',                           
                              'url' => $this->createUrl('/cliente/actualizarobservaciones'),
                               'placement' => 'right',  
                               'emptytext' => 'Ninguna Observación...',                          
                          )
                ),
    
    


)
)
    );

?>

<?php

 
 }else{
 
   
?>


<br><br><br><br><br><br><br><br>
<button type="button" class="btn btn-warning">INICIAR TRAMITES</button>

<?php 
$this->widget('booster.widgets.TbGridView',array(
'id'=>'activostramitador',
'dataProvider'=>$tramitadora->activostramitador($id),
'filter'=>$tramitadora,
'columns'=>array(
                'fecha_pazysalvo',
    
                array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'id_expediente_fisico',                    
                    'editable' => 
                            array(
                                'type' => 'select',
                                'model'     => $tramitadora,
                                'attribute' => 'id_expediente_fisico',
                                'url' => $this->createUrl('actualizar'),
                                'source' =>  CHtml::listData(ExpedienteFisico::model()->findAll(), 'id_expediente_fisico', 'descripcion'),      
                            )
                    ), 
                'idClienteGs.nombre_de_empresa',
                'idClienteGs.proyecto',
             
                'idClienteGs.numero_de_lote',
                'idClienteGs.fecha_de_permiso_ocupacion',
                'idUsuario.nombre',
          /*      array(
                    'name'=>'id_usuario',
                    'header'=>'Tramitador',
                    'value'=> 'CHtml::encode($data->idUsuario["nombre"])',
                    'filter'=>CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                ), */
                
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
    'labelExpression'=>'($data->idClienteGs["pazysalvo"] != 0 ? "Iniciar Tramite" : "Falta Permiso")',
    'urlExpression'=>'($data->idClienteGs["pazysalvo"]!=0) ? Yii::app()->createUrl("tramitePasos/tramite",array("id"=>$data["id_tramite"])) : "#"',
    'cssClassExpression'=>'($data->permiso_ocupacion==1 ? " challenged" : "")',  
    ),


                array(
                      'class' =>'bootstrap.widgets.TbEditableColumn',
                      'name' => 'idClienteGs.observacion_tramite',
                      'editable' => 
                          array(
                              'type' => 'textarea',
                              'model'     => $cliente,
                              'attribute' => 'idClienteGs.observacion_tramite',                           
                              'url' => $this->createUrl('/cliente/actualizarobservaciones'),
                               'placement' => 'right',  
                               'emptytext' => 'Ninguna Observación...',                          
                          )
                ),
    
    


)
)
    );

?>


<?php

 }

?>
