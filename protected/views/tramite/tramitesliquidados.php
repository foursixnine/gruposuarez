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

<button type="button" class="btn btn-warning">TRAMITES LIQUIDADOS</button>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-grid',
'dataProvider'=>$model->tramitesliquidados(),
'filter'=>$model,
'columns'=>array(
                'idUsuario.nombre',
                'fecha_inicio',
                'idClienteGs.proyecto',
                'idClienteGs.numero_de_lote',
                
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
                    //'striped' => true,
                    'context' => 'success',
                    'animated' => false,
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
                                    'label'=>'Ver Tramite',
                                    'url'=>'Yii::app()->createUrl("/tramitePasos/vertramitesliquidados/",array("id"=>$data["id_tramite"]))',
                                    
                       ) )
            ), 
    


)
)
    );?>
