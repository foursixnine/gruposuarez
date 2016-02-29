<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'metas-form',
	//'enableAjaxValidation'=>true,
    
        'enableClientValidation' => true,
        'enableAjaxValidation' => true,
         
)); ?>

<script type="text/javascript">
$(document).ready(function(){

    
//*******************VENCIDA***************    
    var uno = <?php echo json_encode($proyect01); ?>;
    var dos = <?php echo json_encode($proyect02); ?>;
    var tres = <?php echo json_encode($proyect03); ?>;
    var cuatro = <?php echo json_encode($proyect04); ?>;
    var cinco = <?php echo json_encode($proyect05); ?>;
    var seis = <?php echo json_encode($proyect06); ?>;
    var siete = <?php echo json_encode($proyect07); ?>;
    var nueve = <?php echo json_encode($proyect09); ?>;
    var once = <?php echo json_encode($proyect11); ?>;
    var doce = <?php echo json_encode($proyect12); ?>;
    var trece = <?php echo json_encode($proyect13); ?>;
    var catorce = <?php echo json_encode($proyect14); ?>;
//*************************CORRIENTE*************************///

    var unoc = <?php echo json_encode($carteracorriente1); ?>;
    var dosc = <?php echo json_encode($carteracorriente2); ?>;
    var tresc = <?php echo json_encode($carteracorriente3); ?>;
    var cuatroc = <?php echo json_encode($carteracorriente4); ?>;
    var cincoc = <?php echo json_encode($carteracorriente5); ?>;
    var seisc = <?php echo json_encode($carteracorriente6); ?>;
    var sietec = <?php echo json_encode($carteracorriente7); ?>;
    var nuevec = <?php echo json_encode($carteracorriente9); ?>;
    var oncec = <?php echo json_encode($carteracorriente11); ?>;
    var docec = <?php echo json_encode($carteracorriente12); ?>;
    var trecec = <?php echo json_encode($carteracorriente13); ?>;
    var catorcec = <?php echo json_encode($carteracorriente14); ?>;
    



 $('select#Metas_id_tipo_meta').click(function () {
   
      var valor = $('#Metas_id_crm_proyecto').val(); 
  
      var tipo_meta =$('#Metas_id_tipo_meta').select2().val();
      if (tipo_meta == 1){
          
     
    if(valor=="PROJ0001"){        
        $("#Metas_monto").val(uno);
    }
    if(valor=="PROJ0002"){      
        $("#Metas_monto").val(dos);
    }
    if(valor=="PROJ0003"){      
        $("#Metas_monto").val(tres);
    }
    if(valor=="PROJ0004"){      
        $("#Metas_monto").val(cuatro);
    }    
    if(valor=="PROJ0005"){      
        $("#Metas_monto").val(cinco);
    } 
    if(valor=="PROJ0006"){      
        $("#Metas_monto").val(seis);
    }   
    if(valor=="PROJ0007"){      
        $("#Metas_monto").val(siete);
    }     
    if(valor=="PROJ0009"){      
        $("#Metas_monto").val(nueve);
    }    
    if(valor=="PROJ0011"){      
        $("#Metas_monto").val(once);
    }    
    if(valor=="PROJ0012"){      
        $("#Metas_monto").val(doce);
    }
    if(valor=="PROJ0013"){      
        $("#Metas_monto").val(trece);
    }
    if(valor=="PROJ0014"){      
        $("#Metas_monto").val(catorce);
    } 
          
          
          
      }else{
                  
          
    if(valor=="PROJ0001"){        
        $("#Metas_monto").val(unoc);
    }
    if(valor=="PROJ0002"){      
        $("#Metas_monto").val(dosc);
    }
    if(valor=="PROJ0003"){      
        $("#Metas_monto").val(tresc);
    }
    if(valor=="PROJ0004"){      
        $("#Metas_monto").val(cuatroc);
    }    
    if(valor=="PROJ0005"){      
        $("#Metas_monto").val(cincoc);
    } 
    if(valor=="PROJ0006"){      
        $("#Metas_monto").val(seisc);
    }   
    if(valor=="PROJ0007"){      
        $("#Metas_monto").val(sietec);
    }     
    if(valor=="PROJ0009"){      
        $("#Metas_monto").val(nuevec);
    }    
    if(valor=="PROJ0011"){      
        $("#Metas_monto").val(oncec);
    }    
    if(valor=="PROJ0012"){      
        $("#Metas_monto").val(docec);
    }
    if(valor=="PROJ0013"){      
        $("#Metas_monto").val(trecec);
    }
    if(valor=="PROJ0014"){      
        $("#Metas_monto").val(catorcec);
    } 
      }
});


$('#Metas_porcentaje_meta').select2().on('change', function() {
    var cantidad = $('#Metas_monto').val(); 
  //  alert(cantidad);
    var porcentaje = $('#Metas_porcentaje_meta').val();   
       $("#Metas_monto_mes_proyecto").val(parseFloat(Math.round(cantidad * porcentaje) / 100).toFixed(2));
       
   }).trigger('change');

});
</script>
<p class="help-block">Los campos con<span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>
<?php
                           
	 echo $form->checkboxListGroup(
			$model,
			'mes',
			array(
				'widgetOptions' => array(
					                             'data' => array(1 => 'Enero',
                                                        2=>'Febrero',
                                                        3=>'Marzo',
                                                        4=>'Abril',
                                                        5=>'Mayo',
                                                        6=>'Junio',
                                                        7=>'Julio',
                                                        8=>'Agosto',
                                                        9=>'Septiembre',
                                                        10=>'Octubre',
                                                        11=>'Noviembre',
                                                        12=>'Diciembre',
                                                        )
				),
				'inline'=>true
			)
		); 
?>
  


        <b><?php echo $form->labelEx($model, 'Proyecto');?></b>
        <br />
        <!-- Auto Completar Acuerdo de Cobros -->     
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_crm_proyecto',
                      'data' => CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
                      'options' => array(
                      'placeholder' => "PROYECTO",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
        <br/>
    
    	<b><?php echo $form->labelEx($model, 'Tipo Meta');?></b>
        <br />
        <!-- Auto Completar Acuerdo de Cobros -->     
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_tipo_meta',
                      'data' => CHtml::listData(TipoMeta::model()->findAll(), 'id_tipo_meta', 'descripcion'),
                      'options' => array(
                      'placeholder' => "Tipo Meta",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
        <br/>
        <b><?php echo $form->labelEx($model, 'Porcentaje');?></b>
        <br />
        <?php
               $this->widget(
                 'booster.widgets.TbSelect2', array(            
                 'model' => $model,
                 'attribute' => 'porcentaje_meta',
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
                   'placeholder' => "%",
                  //     'id' => "proyecto",
                  /* 'allowClear'=>true,
                   'minimumInputLength'=>2,*/
                 ),
                     
                     // array('empty'=>'','id'=>'area_type','style'=>'width:100%',),
                 'htmlOptions'=>array(
                   'style'=>'width:380px',
                     
                 ),
               ));
         ?>


      <?php //echo $form->textFieldGroup($model,'monto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'form-control')))); ?>
      <?php echo $form->textFieldGroup(
            $model,
            'monto',
            array(
              'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
              ),
              'prepend' => '$'
            )
          ); ?>

      <?php //echo $form->textFieldGroup($model,'monto_mes_proyecto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
      <?php echo $form->textFieldGroup(
            $model,
            'monto_mes_proyecto',
            array(
              'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
              ),
              'prepend' => '$'
            )
          ); ?>
	

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

        
 <?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'metas-grid',
'dataProvider'=>$model->search(),
'columns'=>array(		
		'monto',
		'porcentaje_meta',
		'monto_mes_proyecto',
		'idTipoMeta.descripcion',
		'idCrmProyecto.titulo',
                  'mes0.descripcion',
		array(
    'class' => 'bootstrap.widgets.TbEditableColumn',
  'name' => 'usuarios',
    'editable' => array(
        'type' => 'select',
          'model'     => $model,
           'attribute' => 'id_usuario',
        'url' => $this->createUrl('actualizar'),
       // 'source'=>editable::source( CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre')),
    'source' =>  CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                     
        )
    ),  
  array(
            'class'=>'CButtonColumn',
            'template'=>'{ver}',
            'buttons'=>array
        (
        'ver' => array
        (
            'label'=>'Ver Cliente',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
            'url'=>'Yii::app()->createUrl("metas/view", array("id"=>$data->id_meta))',
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
       