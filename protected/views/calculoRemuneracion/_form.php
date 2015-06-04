<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calculo-remuneracion-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php if($metas == null){ ?>
    <?php $this->redirect('/gruposuarez/metas/'); ?>
<?php }else{ ?> 
<?php

$sum=0;
$sumcorriente=0;
$cobradoc=0;
$cobradov=0;

?> 

  <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA CORRIENTE</strong>
        </a>
 
 
          
            
            
 <?php  foreach($metas as $data){ ?>
           
       <?php if($data->cartera==1){ ?>        
           <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $data->monto_mes_proyecto;  ?></td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cobrado:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $data->monto;  ?></td>
                    </tr>                
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Proyecto', '????');
                            ?>
                        </td>

                        <td><?php echo $data->idProyecto->titulo; 

                    
                        ?></td>
                    </tr>
                    <tr>
                        <td><?php  $sumcorriente+=$data->monto_mes_proyecto; ?></td>
                        <td><?php  $cobradoc+=$data->monto; ?></td>
                    </tr>    
           </table>
 <?php }} ?>        

        </div>
  </div>   

 <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA VENCIDA</strong>
        </a>
<?php
   

  foreach($metas as $data1){ ?>
           
       <?php if($data1->cartera==2){ ?>        
           <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $data1->monto_mes_proyecto;  ?></td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cobrado:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $data1->monto;   ?></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Proyecto', '????');
                            ?>
                        </td>

                        <td><?php echo $data1->idProyecto->titulo; 

                    
                        ?></td>
                    </tr>
                    
                    
                    <tr>
                        

                        <td><?php   $sum+=$data1->monto_mes_proyecto; 
                                    $cobradov+=$data1->monto; 
                    
                        ?></td>
                    </tr>
           </table>
       <?php } ?>        
    <?php if($data1->cartera==2){ ?>
 
         <?php   
            
        }
 
        } 
        ?>
        </div>
  </div>


  <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>TOTAL CORRIENTE</strong>
        </a>

           <table class="list-group-item">
                <tbody>                                    
                    <tr>
                           <td>Total Meta:</td>
                        <td><strong><?php echo $sumcorriente;?></strong>
                        </td>
                         <td>Total Cobrado:</td>
                        <td>  <strong><?php echo $cobradoc=7000;?> </strong>

                       <td>Cumplimiento:</td>
                        <td><strong><?php  $porcentajec= $cobradoc / $sumcorriente *100;?>
                        <?php //echo "$cobradoc es el " . porcentaje($totaaal, $cobradoc, 2) . "% de $totaaal <br>";?>
                      <?php echo number_format($porcentajec, 2, '.', '');?>   %</strong></td>
                    </tr>
                       
           </table>
     
        </div>
  </div> 

  <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>TOTAL VENCIDA</strong>
        </a>

       
           <table class="list-group-item">
                <tbody>                                    
                    <tr>
                        
                         <td>Total Meta:</td>
                        <td>  <strong><?php echo $sum;?> </strong></td>
                        <td>Total Cobrado:</td>
                        <td><strong><?php echo $cobradov=40000;?></strong></td>
                               <td>Cumplimiento:</td>
                        <td><strong><?php $porcentajev= $cobradov / $sum *100;?>
                                     <?php echo number_format($porcentajev, 2, '.', '');?>   %</strong></td>
                    </tr>
                       
           </table>
     
        </div>
  </div> 
  

<br/>
<br/>

<br/>
<h1>Datos del C&aacute;lculo</h1>


<br/>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($usuarios,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

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
<fieldset>
    <legend align= "center">Tabla de Remuneraci&oacute;n</legend>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'pago-remuneracion-grid',
'dataProvider'=>$tablar->search(),
'columns'=>array(
		'idTipoCartera.descripcion',
		'porcentaje',
		'dinero',
),
)); ?>
</fieldset>

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


<?php }?>