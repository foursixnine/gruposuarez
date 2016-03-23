<?php 
$this->breadcrumbs=array(
	'Pasos Tramite'=>array('index'),
	$model->id_tramite_pasos=>array('view','id'=>$model->id_tramite_pasos),
	'Crear Pasos',
);

	$this->menu=array(
	//array('label'=>'Tramites Anteriores','url'=>array('admin')),
        array('label'=>'Tramites Anteriores','url'=>array('admin','id'=>$tramite->id_tramite)),
        //array('label'=>'Volver al Paso Anteriror','url'=>array('pasoanterior','id'=>$tramite->id_tramite)),
	);

$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
		'id' =>'tramite-pasos-form',
		'type' => 'horizontal',	   
)); 
 
?>
<?php

/*
 $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
  'id'=>'midialogo',
  // Opciones adicionales javascript
  'options'=>array(
   'title'=>'Tramites de Pasos',
   'autoOpen'=>true,

  
  ),
 ));


     //echo 'Hola estas en el paso # '. $tramite->id_pasos .' APURATE!!!!';

    $this->endWidget('zii.widgets.jui.CJuiDialog');

    // Link que abre la ventana de diálogo
   echo CHtml::link('Abrir ventana', '#', array(
      'onclick'=>'$("#midialogo").dialog("open"); return false;',
   )); */
  ?>
<br/>
<?php

$new=0;
foreach ($pasos as $nompaso) {
    if($nompaso['id_paso']==$tramite->id_pasos){
        $new=$nompaso['id_paso'];
        $new_tramite=$new+1;
    }
}

?>

<!--PARA DETERMINAR EL PASO ACTUAL -->
<?php 
 
if($tramite->fecha_paso==""){
     $tramite->idPasos['id_paso'];
  ?>

<button type="button" class="btn btn-warning">Paso
<span class="badge"><?php  $tramite->idPasos['id_paso']; ?></span>
 <?php  $tramite->idPasos['descripcion']; ?></button>
<?php 
  }else{

     foreach ($pasos as $nompaso) {
            if($nompaso['id_paso']==$new_tramite){
?>

<button type="button" class="btn btn-warning">Paso
<span class="badge"><?php  $nompaso["id_paso"]; ?></span>
 <?php   $paso_now=$nompaso["id_paso"]; 
   $paso_now=$nompaso["id_paso"];?></button>
<?php    
  }
        }
}
?>
<br/>
<?php //$tramite->idPasos['descripcion'];?>

<?php 
  $paso_now=0;
if($tramite->fecha_paso==""){
      //  echo "<h2> ".''. $tramite->idPasos["id_paso"] .'<br/>'. $tramite->idPasos["descripcion"] .'</h2>';
        //die;
        $paso_now=$tramite->idPasos["id_paso"];
}else{
        foreach ($pasos as $nompaso) {
            if($nompaso['id_paso']==$new_tramite){
              //  echo $nompaso['descripcion'];
               // "<h1 class='titulo'>".''. $nompaso["id_paso"] .'<br/> <button type="button" class="btn btn-warning">'. $nompaso['descripcion'] ."</button></h1>";
   $paso_now=$nompaso["id_paso"];
            }
        }
}
?>

<script>
$(function(){
    var paso = <?php echo ($paso_now); ?>;
 //   alert(paso);
   document.getElementById("TramitePasos_id_tipo_responsable").disabled=true;
   if(paso == 1 || paso == 2){
    $("#mielemento3").css("display", "block");
    }else{
         $("#mielemento3").css("display", "none");
    }
    if(paso == 5){
    $("#mielemento2").css("display", "block");
    }else{
         $("#mielemento2").css("display", "none");
    }
    $("#mielemento").css("display", "none");
    //$('select#TramitePasos_id_tipo_responsable').hide();
    $('select#TramitePasos_id_responsable_ejecucion').change(function () { 
      //  alert("1");
           $valor=(document.getElementById('TramitePasos_id_responsable_ejecucion').value);
           if($valor==1){
               document.getElementById("TramitePasos_id_tipo_responsable").disabled=true; 
              $('#TramitePasos_id_tipo_responsable').val()=null; 
              $("#mielemento").css("display", "none");                                       
           }else{
               document.getElementById("TramitePasos_id_tipo_responsable").disabled=false;
               $("#mielemento").css("display", "block");
        }
    });
    
    
    //////******************  SELECT TIPO DE RESPONSABLE  *********************/////////////////
    
    $('select#TramitePasos_id_tipo_responsable').change(function () {         
       
           $valor=(document.getElementById('TramitePasos_id_tipo_responsable').value);
           if($valor==1){
               alert($valor);
           //    document.getElementById("TramitePasos_id_banco").disabled=false; 
              $("#mielemento").css("display", "block");
               document.getElementById("TramitePasos_id_abogado").disabled=true;  
               document.getElementById("TramitePasos_id_proveedor").disabled=true;       
     
           }else{               
              document.getElementById("TramitePasos_id_proveedor").disabled=false;        
           //   document.getElementById("TramitePasos_id_banco").disabled=true;  
              $("#mielemento").css("display", "none");
              document.getElementById("TramitePasos_id_abogado").disabled=true;   
           }
    });
    
    
});

</script>
<span class="badge"><?php echo $tramite->idPasos['id_paso']; ?></span>    
<h1><?php echo $tramite->idPasos['descripcion']; ?></h1> 
 <fieldset>
 

<p class="help-block">Los campos con <span class="required">*</span> son reueridos.</p>

<?php echo $form->errorSummary($model); ?>
       
   
        <div id="mielemento3"> 
            
            <?php     
            echo $form->dropDownListGroup(
                                $model,
                                'id_paso',
                                array(
                                        'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                        ),
                                        'widgetOptions' => array(
                                                'data' => array(
                                                    0=>'---SELECCONE---',
                                                    1=>'SOLICITUD DE MINUTA DE CANCELACIÓN A BANCO INTERINO Y FIRMA DE MINUTA',
                                                    2=>'CONFECCIONAR MINUTA DE VENTA'),
                                                'htmlOptions' => array(),
                                        )
                                )
                        ); 
            ?>  
            
        </div> 

	
    <?php echo $form->dropDownListGroup(
			$model,
			'id_responsable_ejecucion',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                                'model' => $model,
                                                'attribute' => 'id_responsable_ejecucion',
                                                'data' => CHtml::listData(ResponsableEjecucion::model()->findAll(), 'id_responsable_ejecucion', 'descripcion'),
                                                'options' => array(
                                                                'placeholder' => "Responsable Ejecución",
                                                                'allowClear'=>true,                                                  
                                                                  )
                                                        ),                              
                                )
                        ); 
    ?>

    <?php echo $form->dropDownListGroup(
			$model,
			'id_tipo_responsable',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                                'model' => $model,
                                                'attribute' => 'id_tipo_responsable',
                                                'data' => CHtml::listData(TipoResponsable::model()->findAll(), 'id_responsable_ejecucion', 'descripcion'),
                                                'options' => array(
                                                                'placeholder' => "Tipo de Responsable Ejecución",
                                                                'allowClear'=>true,
                                                        'allowClear'=>true,
            
                                                         'minimumInputLength'=>2,
                                                                  ),
                                                'htmlOptions'=>array(
                                                  'style'=>'width:380px',
                                                ),
                                                        )
                                )
                        ); 
    ?>               

    
    <div id="mielemento">
    <?php //echo $form->textFieldGroup($model,'id_banco',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
         <b><?php echo $form->labelEx($model, 'Banco Acreedor: ');?></b>

         <h2><strong><FONT FACE="Arial" Size="5" COLOR="#FF0000">
                  <?php if($tramite->idClienteGs["id_banco"]==16){ ?>
                 <b><?php echo "DE CONTADO"; ?></font></b></strong></h2>
                  <?php }  else { ?>
                    <b><?php echo $tramite->idClienteGs["banco_acreedor"]; ?></font></b></strong></h2>
          <?php   } ?>
    </div>

    <!--**********************ESTADO***************************-->            
    <?php //echo $form->textFieldGroup($model,'id_banco',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    <b><?php echo $form->labelEx($model, 'Tramite Actividad');?></b>
    
                    <br />
                       <?php echo $form->dropDownListGroup(
			$tramite_actividad,
			'id_estado',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                                'model' => $tramite_actividad,
                                                'attribute' => 'id_estado',
                                                'data' => CHtml::listData(Estado::model()->findAll(), 'id_estado', 'descripcion'),
                                                'options' => array(
                                                                'placeholder' => "Estado de la Actividad",
                                                                'allowClear'=>true,
                                                                  )
                                                        )
                                )
                        ); 
    ?> 

    <?php echo $form->datePickerGroup($tramite_actividad,'fecha_tramite_actividad',
                array('widgetOptions'=>array('options'=>array(
                                             'format' => 'yyyy-mm-dd'
                ),
                'htmlOptions'=>array('class'=>'span5')), 
                'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>'));
    ?>

    <?php echo $form->textAreaGroup(
        $tramite_actividad,
        'observaciones',
        array(
                'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                        'htmlOptions' => array('rows' => 5),
                )
        )
        );  
    ?>
                    
    <!--*************RAZONES DE ESTADO****************--> 
    
    <?php echo $form->dropDownListGroup(
			$model,
			'id_razones_estado',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                                'model' => $model,
                                                'attribute' => 'id_razones_estado',
                                                'data' => CHtml::listData(RazonesEstado::model()->findAll(), 'id_razones_estado', 'descripcion'),
                                                'options' => array(
                                                                'placeholder' => "Razones de Estado",
                                                                'allowClear'=>true,
                                                                  )
                                                        )
                                )
                        ); 
    ?>  
    

 
	
        <div id="mielemento2">
     
                    <?php echo $form->datePickerGroup($model,'firma_cliente',
                                array('widgetOptions'=>array('options'=>array(
                                                             'format' => 'yyyy-mm-dd'
                                ),
                                'htmlOptions'=>array('class'=>'span5')), 
                                'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>'));
                    ?>
                
                    <?php echo $form->datePickerGroup($model,'firma_promotora',
                                array('widgetOptions'=>array('options'=>array(
                                                             'format' => 'yyyy-mm-dd'
                                ),
                                'htmlOptions'=>array('class'=>'span5')), 
                                'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); 
                    ?>                    
                    
        </div>
       
 	     
      
	
		      <br/>

</fieldset>                      
       
  <!--*************BOTONES DE ACTUALIZAR Y CERRAR PASO****************--> 
<div class="form-actions">
    
	
         <div class="buttons">      
             <?php    echo CHtml::submitButton('ACTUALIZAR',array('name'=>'actualizar')); 
       
              /*  $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Cerrar Paso' : 'Save',

		)); */?>

      
    <?php  echo CHtml::submitButton($model->isNewRecord ? 'CERRAR PASO' : 'Save',
    array(
    'confirm'=> '¿Esta seguro que desea pasar al siguiente paso? ',   
   // type="button",   
    'class' => 'btn btn-warning' ));  
        ?>
 </div> 
</div>

                      
                      
              
<?php $this->endWidget(); ?>


<br/>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-actividad-grid',
'dataProvider'=>$tramitesactividad,
'columns'=>array(
                'idPaso.descripcion',
                'idEstado.descripcion',
             
                array(
                      'class' => 'bootstrap.widgets.TbEditableColumn',
                      'name' => 'Fecha Tramite',
                      'editable' => 
                          array(
                              'type' => 'date',
                              'model'     => $model,
                              'attribute' => 'fecha_tramite_actividad',                              
                              'url' => $this->createUrl('/tramiteActividad/updatefechatramite'),
                              'placement' => 'right',
                              'format' => 'yyyy-mm-dd',
                              'viewformat' => 'yyyy-mm-dd',
                              'options' => array(
                                    'datepicker' => array(
                                        'language' => 'es'
                                                        )
                                                )
                          )
                ), 
                array(
                      'class' => 'bootstrap.widgets.TbEditableColumn',
                      'name' => 'observaciones',
                      'editable' => 
                          array(
                              'type' => 'textarea',
                              'model'     => $model,
                              'attribute' => 'observaciones',                           
                              'url' => $this->createUrl('/tramiteActividad/updateobservaciones'),
                               'placement' => 'right',                            
                          )
                  ), 
             /*   array(
                       'class'=>'CButtonColumn',
                       'template'=>'{delete}',
                       'buttons'=>array
                   (
               
                             'delete' => array
                   (
                       'label'=>'Eliminar Proyecto',
                       'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                       'url'=>'Yii::app()->createUrl("tramiteActividad/delete", array("id"=>$data->id_tramite_actividad))',
                   ),

                ),
                   ),*/
             
    
    
 
)
)
    );?>




