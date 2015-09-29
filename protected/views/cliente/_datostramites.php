<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'id'=>'tramite-form',
    'enableAjaxValidation'=>false,
    //  'id' => 'inlineForm',
        'type' => 'inline',
     //   'htmlOptions' => array('class' => 'well'),
)); 

function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}

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
<?php echo $form->errorSummary($model); ?>
 <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_razones_estado',
                      'data' => CHtml::listData(RazonesEstado::model()->findAll(), 'id_razones_estado', 'descripcion'),
                      'options' => array(
                      'placeholder' => "RAZONES DE ESTADO",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:80px',
                      ),
                    ));
        ?>
<?php $this->endWidget(); ?>
  <!-----------***********************  TRAMITES ************************--->  
    <div class="row">
    <div class="col-sm-6" style="background-color:#f2dede;">     
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-danger">
                <strong>TRAMITES</strong>
              <!--  <a><image src="../../images/email.png" /></a>-->
            </a>
  

            <table class="list-group-item"">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                             echo CHtml::label('Monto Liquidacion','',array('size'=>8)); ?>
                        </td>

                        <td><?php echo $cliente->monto_liquidacion; ?></td>
                    </tr>    
                    <!--Fecha Ingreos Tramite -->
                    <tr>
                        <td><?php            
                        echo CHtml::label('Fecha ingreso a Tramite','',array('size'=>8));  ?></td>        
                        
                        <td>
                            <?php 
                            if(!empty($tramite->fecha_pazysalvo)){                        
                                echo $tramite->fecha_pazysalvo;
                            }
                            ?>
                        </td>
                    </tr>
                    
                                
                    <tr>
                        <td><?php            
                        echo CHtml::label('Estatus de Expedientes','',array('size'=>8));  ?></td>            
                        <td>
                              <?php 
                              
                          /*  if(!empty($tramite->id_estado)){                        
                                 echo $tramite->idExpedienteFisico["descripcion"];
                            }*/


                            ?>

                          



    
                          

                        </td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                        echo CHtml::label('Días en Estatus','',array('size'=>8));  ?>
                        </td>            
                        <td>
                             <?php
                                if(!empty($tramite->fecha_inicio)){
                                    echo $dias_transc_now=dias_transcurridos($tramite->fecha_inicio,'2015-09-15'); 
                                }   
                               ?>
                            
                        </td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                        echo CHtml::label('Banco Cliente','',array('size'=>8));  ?>
                        </td>            
                        <td>
                            <?php echo $cliente->banco_interino; ?>
                            
                        </td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                        echo CHtml::label('Generar Paz y Salvo','',array('size'=>8));  ?>
                        </td>             
                        <td>
                              <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/pdf.png").'',
                           'url'=>array('/cliente/generatePdf/'.$cliente->id_cliente_gs.''),
                        
                    ), 
             
            ),
            'encodeLabel' => false,
        ));
        ?>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        
        
      
  
  
</div>
</div>
    </div>

