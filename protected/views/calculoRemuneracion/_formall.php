<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calculo-remuneracion-form',
	//'enableAjaxValidation'=>true,
    	'enableAjaxValidation'=>false,
)); ?>

<br/>
<?php  
$fecha = date("d-m-Y"); // fecha actual 
$mes_actual= date("n");
$variablephp=0;
//var_dump($count_proyecto_corriente);die;

//////////////////////////TRASLADO DE CARTERA//////////////////////////

$sumv=0;
$sumpf=0;
$sumpi=0;
 //$resta = (($pivote_final_mes->monto) - ($pivote_inicio_mes->monto));
   foreach($cartera_corriente as $data){
      $sum=0;
     //Obtener mes actual  

                                $mes=$mes_actual-1;
                                $sum_pivote_inicio_mes= Yii::app()->db->createCommand()
                                ->select('sum(monto)')
                                ->from('pivote')
                                ->where('mes='."'".$mes."'".' and id_crm_proyecto='."'".$data->id_crm_proyecto."'")
                                ->queryScalar();
                                 $sum_pivote_inicio_mes;                       
                                $sumpi+=$sum_pivote_inicio_mes;
                                
                                
                        $mes_actual= date("n");
                                 $sum_pivote_final_mes= Yii::app()->db->createCommand()
                                 ->select('sum(monto)')
                                 ->from('pivote')
                                 ->where('mes='."'".$mes_actual."'".' and id_crm_proyecto='."'".$data->id_crm_proyecto."'")
                                 ->queryScalar();
                         $sum_pivote_final_mes;
                                 $sumpf+=$sum_pivote_final_mes;
                         

                        $diferencia =  (($sum_pivote_final_mes) - ($sum_pivote_inicio_mes));
                        number_format($diferencia,2,'.',',');
                        $total = ((int)$diferencia / (int)$sum_pivote_inicio_mes)*100;
                         if ($total <= 5){
                                       $sum=100;
                                    }elseif($total == 6 || $total <= 10) {
                                       $sum=70;
                                    }else{
                                         $sum=0;
                         }   
                           
                           
                           
   }



//////////////////////////////VENCIDA/////////////////////////
  
   foreach($cartera_vencidad as $data){
           
         
                             if($data->mes == $mes_actual){
                                   $cobrado = Yii::app()->dbconix->createCommand()
                                   ->select('sum(p.monto)')
                                   ->from('payments p, quotes_details qd')
                                   ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-09-01'".' and '. "'2015-09-31'".' and project = '."'".$data->id_crm_proyecto."'")
                                   ->queryScalar();
                             }
                        
                          
                  
                         $porcentajev = $cobrado / $data->monto_mes_proyecto * 100;
                                  
                                 
                           $sumv+=$porcentajev/$count_proyecto_vencida;
                      
   }
 $sumv;
 ?>

<script type="text/javascript">
$(document).ready(function(){

var sumv = "<?php echo number_format($sumv, 2, '.', '');?>" ;
var sum = "<?php echo number_format($sum, 2, '.', '');?>" ;        
$("#calculoRemuneracion_resultadov").val(sumv);
$("#calculoRemuneracion_resultado").val(sum);
/////////////CORRIENTE///////////////

$('#calculoRemuneracion_peso').select2().on('change', function() {
//CORRIENTE    
var porcentaje = $('#calculoRemuneracion_peso').val(); 
var total = porcentaje * sum /100;
//VENCIDA
var porcentajev = $('#calculoRemuneracion_peso1').val(); 
var totalv = porcentajev * sumv/100;
var cumplimiento = totalv+total;
//TOTAL CUMPLIMIENTO
 
 $("#calculoRemuneracion_cumplimiento").val(cumplimiento);
 



}).trigger('change');


/////////////VENCIDAD/////////////////
 
  //Asigno la SumV al campo resultado

  
$('#calculoRemuneracion_peso1').select2().on('change', function() {
//VENCIDAD
var porcentajev = $('#calculoRemuneracion_peso1').val(); 
var totalv = porcentajev * sumv/100;
//CORRIENTE
var porcentaje = $('#calculoRemuneracion_peso').val(); 
var total = porcentaje * sum /100;

var cumplimiento = total + totalv;
//alert(cumplimiento);
cumplimiento = cumplimiento.toFixed(2);
 $("#calculoRemuneracion_cumplimiento").val(cumplimiento);
 
///////////////////////////////////////
totalpeso=(parseInt($('#calculoRemuneracion_peso').val()) + parseInt($('#calculoRemuneracion_peso1').val()));
if(totalpeso < 100){
   // alert("totalpeso");
    // alert("Pesos invalidos! Verificar montos");
     $( "#calculoRemuneracion_peso1" ).focus();
    }
}).trigger('change');


var baseurl="<?php print Yii::app()->request->baseUrl;?>";
//alert(baseurl);

});


       
        
</script>   
<br/>

<button type="button" class="btn btn-warning">C&aacute;lculo Remuneraci&oacute;n</button>
<br/>

<?php echo $form->errorSummary($model); ?>


	<?php $model->id_usuario=$id;?>
  <?php echo $form->hiddenField($model,'id_usuario', array('class'=>'span5')) ?>
        <?php //$form->hiddenField($model,'id_usuario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php /*echo $form->textFieldGroup($model,'resultado',array('widgetOptions'=>
                                        array('htmlOptions'=>
                                                            array('class'=>'span5',
                                                                  'style' => 'width:80px;',
                                                                'prepend' => '$', 'append' => '.00', 'span' => 2
                                                                 )
                                              )
                                                                 )
                                        ); */?>

<?php echo $form->textFieldGroup(
			$model,
			'resultado',
			array('disabled'=>'true',
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-1',
				),
              /*              	'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				),*/
				'append' => '%'
			)
		); ?>
<br/>
	<?php //echo $form->textFieldGroup($model,'id_pago_remuneracion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
<?php echo $form->labelEx($model, 'Peso Cartera Corriente');?></br>
        <?php $this->widget(
                 'booster.widgets.TbSelect2', array(            
                 'model' => $model,
                 'attribute' => 'peso',
                 'data' => array(
'5' => '5',
'10' => '10',
'15' => '15',
'20' => '20',
'25' => '25',
'30' => '30',
'35' => '35',
'40' => '40',
'45' => '45',
'50' => '50',
'55' => '55',
'60' => '60',
'65' => '65',
'70' => '70',
'75' => '75',
'80' => '80',
'85' => '85',
'90' => '90',
'95' => '95',
'100' => '100',
),

                 'options' => array(
                  // 'placeholder' => "Peso Cartera Corriente",
                  //     'id' => "proyecto",
                  /* 'allowClear'=>true,
                   'minimumInputLength'=>2,*/
                 ),
                 'htmlOptions'=>array(
                  //   'disabled' => true,
                   'style'=>'width:380px',
                     
                 ),
               
               ));
   ?>
<br/>
<br/>

<?php //echo $form->textFieldGroup($model,'resultadov',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','style' => 'width:80px;')))); ?>

   <?php echo $form->textFieldGroup(
			$model,
			'resultadov',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
                        'widgetOptions' => array(
                            'htmlOptions' => array(
                            'class'=>'span5',
                 //               'disabled' => true,
                            'style' => 'width:590px;'), 
),
				'append' => '%'
			)
           
           
		); ?> 
    
<?php echo $form->labelEx($model, 'Peso Cartera Vencidad');?><br/>
        <?php $this->widget(
                 'booster.widgets.TbSelect2', array(            
                 'model' => $model,
                 'attribute' => 'peso1',
                 'data' => array(
                    
'5' => '5',
'10' => '10',
'15' => '15',
'20' => '20',
'25' => '25',
'30' => '30',
'35' => '35',
'40' => '40',
'45' => '45',
'50' => '50',
'55' => '55',
'60' => '60',
'65' => '65',
'70' => '70',
'75' => '75',
'80' => '80',
'85' => '85',
'90' => '90',
'95' => '95',
'100' => '100'),

                 'options' => array(
                //   'placeholder' => "Peso Cartera Vencida",
                  //     'id' => "proyecto",
                  /* 'allowClear'=>true,
                   'minimumInputLength'=>2,*/
                 ),
                 'htmlOptions'=>array(
                   'style'=>'width:380px',
                    // 'disabled' => true
                 ),
               ));
   ?>
<br/>
<br/>



<?php echo $form->textFieldGroup(
			$model,
			'cumplimiento',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
                                        
				),
                            
				  'widgetOptions' => array(
                            'htmlOptions' => array(
                            'class'=>'span5',
                              //  'disabled' => true,
                            'style' => 'width:590px;'), 
),
				'append' => '%'
			)
		); ?>

<br/>

 <?php
 /*
         //     var_dump($gestion_old);die;
          foreach ($tablar as $row) {

            echo $message = "<table><tr>
                            <td><strong>Porcentaje:</strong></td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'> ".$row['porcentaje']."</td>
                            </tr>
                           <tr>
                            <td><strong>Dinero:</strong></td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'> ".$row['dinero']."</td>
                            </tr>
                            <tr>
                            <td><strong>Bono:</strong></td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'> ".$row['bono']."</td>
                            </tr>
                   
                           </table>";
        }

     */   ?>  

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

  

   


<br/>






       <!--         
<div class="col-sm-3" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>BONO A PAGAR</strong>
        </a>

           
       
           <table class="list-group-item-success">
                                        <tr>                     
                       <td>
                       <a href="#" class="list-group-item list-group-item-heading">
            <strong><?php //echo "0"; ?></strong>
        </a>
                       
                       
                       </td>
                    </tr> 
                      
              
           </table>
      

            
        </div>
</div>
       -->