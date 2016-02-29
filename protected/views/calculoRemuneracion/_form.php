<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calculo-remuneracion-form',
	'enableAjaxValidation'=>false,
)); ?>

 
<div class="row">
    <!--<div class="col-sm-6" style="background-color:lavender;">-->
    <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA CORRIENTE - <?php echo $meta_corriente->idCrmProyecto->titulo;?></strong>
        </a>
 
<!--****************************CARTERA CORRIENTE***************************-->
          
  <?php if($meta_corriente->id_tipo_meta == 2){ ?>        
         <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Vencido Inicio de Mes:   ', '????');
                            ?>
                        </td>

                        <td><?php  //echo $meta_corriente->monto_mes_proyecto;
                        
                          echo $pivote_inicio_mes->monto;
                              ?></td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Vencido Final de Mes:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $pivote_final_mes->monto; ?></td>
                    </tr>
                    
                            
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta Corriente', '????');
                            ?>
                        </td>

                        <td><?php echo $metas->monto_mes_proyecto; 

                    
                        ?></td>
                    </tr>
                    
                       <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Diferencia de Cartera:', '????');
                            ?>
                        </td>

                        <td><?php  echo $resta = (($pivote_final_mes->monto) - ($pivote_inicio_mes->monto));

                    
                        ?></td>
                    </tr>
                    
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cumplimiento', '????');
                            ?>
                        </td>

                        <td>
                               <strong bgcolor="#FF3333"> <p style="color: #6600CC; background-color: #ffffff"><?php 
                               //var_dump((int) ($pivote_inicio_mes->monto - 7)); die;
                                       
                                        //El resultado de inicio mes he inicio fin lo divido entre meta corriente de BD META 
                                        
                                        $porcentajec = $resta / $metas->monto_mes_proyecto  ;
                                        echo number_format($porcentajec, 2, '.', '');?>   %</p></strong>
                            
                        </td>
                    </tr>
                    
                </tbody>     
           </table>
     
        </div>
  </div>  
         
    <?php 
        }

     ?>            
       
  
<br/>

    <!--<div class="col-sm-6" style="background-color:lavender;">-->
    <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA VENCIDAD - <?php echo $meta_corriente->idCrmProyecto->titulo;?></strong>
        </a>
 
<!--****************************CARTERA VENCIDAD***************************-->
          
  <?php if($metas->id_tipo_meta == 1){ ?>        
                       <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta:   ', '????');
                            ?>
                        </td>

                        <td><?php  //echo $meta_corriente->monto_mes_proyecto;
                        
                          echo $metas->monto_mes_proyecto;
                              ?></td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cobrado:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $cobrado;   ?></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cumplido', '????');
                            ?>
                        </td>

                        <td>
                               <strong><?php $porcentajev = $cobrado / $metas->monto_mes_proyecto ;?>
                                     <?php echo number_format($porcentajev, 2, '.', '');?>   %</strong>
                            
                        </td>
                    </tr>
                    
   
                    
           </table>
        
    <?php 
        }
        
     ?>            
         </div>           
  </div>
</div>
<br/>
<br/>
<h2>Datos para el Calculo</h2>



<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($usuarios,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'resultado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'id_pago_remuneracion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

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
                    '100' => '100'),

                 'options' => array(
                   'placeholder' => "Peso Cartera Corriente",
                  //     'id' => "proyecto",
                  /* 'allowClear'=>true,
                   'minimumInputLength'=>2,*/
                 ),
                 'htmlOptions'=>array(
                   'style'=>'width:380px',
                     
                 ),
               ));
   ?>
<br/>
<br/>
<?php  //echo $model->resultadov = Yii::app()->format->number($model->resultadov);?>
<?php echo $form->textFieldGroup($model,'resultadov',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

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
                   'placeholder' => "Peso Cartera Vencida",
                  //     'id' => "proyecto",
                  /* 'allowClear'=>true,
                   'minimumInputLength'=>2,*/
                 ),
                 'htmlOptions'=>array(
                   'style'=>'width:380px',
                     
                 ),
               ));
   ?>
<br/>
    <?php echo $form->textFieldGroup($model,'cumplimiento',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
<br/>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<br/>
</table>
   
</div>

<fieldset>
    <legend align= "center">Tabla de Remuneraci&oacute;n</legend>
<?php /*$this->widget('booster.widgets.TbGridView',array(
'id'=>'pago-remuneracion-grid',
'dataProvider'=>$tablar->search(),
'columns'=>array(
		'idTipoCartera.descripcion',
		'porcentaje',
		'dinero',
),
));*/ ?>
</fieldset>
   



<br/>
<br/>
<div>
<br/>
<h1>Datos del C&aacute;lculo</h1>


<br/>



<script type="text/javascript">
        $(document).ready(function(){
 var porc = "<?php echo $porcentajec; ?>" ;
 var porv = "<?php echo $porcentajev; ?>" ;
$('#calculoRemuneracion_peso').select2().on('change', function() {
 
  
 var porcentaje = $('#calculoRemuneracion_peso').val(); 
 var porc = "<?php echo $porcentajec; ?>" ;
  
  //alert(porv);
 //var resultado = cantidad + porcentaje /100;
 $("#calculoRemuneracion_resultado").val(porcentaje * porc/100);
 
}).trigger('change');
////vencida
$('#calculoRemuneracion_peso1').select2().on('change', function() {
 
  
 var porcentaje =$('#calculoRemuneracion_peso1').val(); 
 var porv = "<?php echo $porcentajev; ?>" ;
  
  //alert(porv);
 //var resultado = cantidad + porcentaje /100;
 var totalresulv = porcentaje * porv/100;
 totalresulv = totalresulv.toFixed(2);
 $("#calculoRemuneracion_resultadov").val(totalresulv);
 
 var resul1 = $("#calculoRemuneracion_resultado").val();
 var resul2 = $("#calculoRemuneracion_resultadov").val();
 var total = parseInt(resul1) + parseInt(resul2);
total = total.toFixed(2);
 $("#calculoRemuneracion_cumplimiento").val(total);
}).trigger('change');
});
</script>   