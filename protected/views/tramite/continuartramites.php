<?php
function dias_transcurridos($fecha_i,$fecha_f)
{
  $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
  $dias   = abs($dias); $dias = floor($dias);   
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
array('label'=>'Volver','url'=>array('admin')),
//array('label'=>'Create Tramite','url'=>array('create')),
);

?>

<br/><br/>
<br/><br/>
<br/><br/>

<button type="button" class="btn btn-warning">TRAMITES EN CURSO</button>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-grid',
'dataProvider'=>$model->tramitadora(),
'filter'=>$model,
'columns'=>array(
                'fecha_inicio',
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
                 
                array(
                    'name'=>'id_usuario',
                    'header'=>'Tramitador',
                    'value'=> 'CHtml::encode($data->idUsuario["nombre"])',
                    'filter'=>CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                ), 
                   /* array(
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
                ),  */
               
                'idClienteGs.vendedor',
                'idClienteGs.proyecto',
                'numero_de_lote',

    
    	        array(
                    'name'=>'id_pasos',
                    'header'=>'Paso',
                    'value'=> 'CHtml::encode($data->idPasos["descripcion"])',
                    'filter'=>CHtml::listData(Paso::model()->findAll(), 'id_paso', 'descripcion'),
                ), 
     array(
            'header' => 'Porcentaje',
            'value' => function($data)
            {
                Controller::widget('bootstrap.widgets.TbProgress', array(
                    'percent' => ($data->id_pasos)/ 11 * 100,
                    'striped' => true,
                    'animated' => true,
                    ));
            },
            'htmlOptions' => array (
                'style' => ''
            ),
        ),
    
    
    
        
'buttons' => 
   array(
            'class'=>'CButtonColumn',
                        'template' => '{continuar_tramite} ',
                        'buttons' => array(
                             'continuar_tramite' => array(
                                    'label'=>'Continuar Tramite',
                                    'url'=>'Yii::app()->createUrl("/tramitePasos/tramite/",array("id"=>$data["id_tramite"]))',
                                    
                       ) )
            ), 
    


)
)
    );?>
