<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tableros-form',
	'enableAjaxValidation'=>false,
)); 
$this->breadcrumbs=array(
	'Tableros Operativos'=>array('index'),
	'GESTION;',
);

$this->menu=array(

array('label'=>'Volver','url'=>'../index'),    
);
?>
        

<h1>Tablero de Status Cartera </h1>


<?php echo $form->errorSummary($model); ?>

        <?php echo $form->labelEx($model, 'Proyecto');?><br/>
        <!-- Auto Completar Acuerdo de Cobros -->     
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_crm_proyecto',
                      'data' => CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
                      'options' => array(
                        'placeholder' => "PROYECTO",
                             'allowClear'=>true,
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
          <?php echo $form->labelEx($model, 'Cobradora'); ?>
           
           <br/>
           <?php /*
           $this->widget(
            'booster.widgets.TbSelect2',
                         array(
                            'model'=>$model,
                            'attribute'=>'id_usuario',
                            'data'=>array(
                                1=>'Gabriela',
                                2=>'Oly',
          
                            ),
             'options' => array(
                        'placeholder' => "Cobradora",
                             'allowClear'=>true,

                      ),
                             )
); 
*/?>
                <?php
                    $this->widget(
                        'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_usuario',
                      'data' => CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                      'options' => array(
                        'placeholder' => "Cobradora",
                       'allowClear'=>true,
                      //  'minimumInputLength'=>2,
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
            ?>

        <br/>
          <?php echo $form->labelEx($model, 'Tipo de Pago'); ?>
           <br/>
            <?php
                    $this->widget(
                        'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_tipo_cobro',
                      'data' => CHtml::listData(TipoCobro::model()->findAll(), 'id', 'descripcion'),
                      'options' => array(
                        'placeholder' => "Tipo de Pago",
                       'allowClear'=>true,
                      //  'minimumInputLength'=>2,
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
            ?>

<br/>

           <?php echo $form->labelEx($model, 'Mes'); ?>
           <br />
           <?php
           $this->widget(
            'booster.widgets.TbSelect2',
                         array(
                            'model'=>$model,
                            'attribute'=>'mes',
                            'data'=>array(
                                1=>'Enero',
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
                            ),
             'options' => array(
                        'placeholder' => "Meses",
                             'allowClear'=>true,

                      ),
                             )
); 
?>
      <br/>      
  
           <br />
           <?php
           $this->widget(
            'booster.widgets.TbSelect2',
                         array(
                            'model'=>$model,
                            'attribute'=>'anno',
                            'data'=>array(
                              1=>'2016',
                              2=>'2015',
                                                           ),
            'htmlOptions' => array(
                   'allowClear'=>true,
            //        'placeholder' => "A&ntilde;o",
                            
            
                ),
                             )
); 
?>
           <br/>
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Generar' : 'Save',
		));  
    ?>
    <?php 
 echo CHtml::link('Ver todos los Proyectos',array('/tableros/createmetascobranza/'));
/*
  $this->widget('booster.widgets.TbButton', array(
    'label'=>'Actualizar',
    'buttonType'=>'primary',
    'icon'=>'repeat white',
    'htmlOptions'=>array(
      'id'=>'update-grid-button',
      'class'=>'pull-right',
    )
  )); 
  
      $this->widget('booster.widgets.TbButton',array(
    'label'=>'Actualizar',
    'buttonType'=>'success',
    'icon'=>'repeat white',
     'htmlOptions' => array(
       //  'id'=>'update-grid-button',
         'class'=>'pull-right',
      //   'submit'=>Yii::app()->createUrl('tableros/createanillos')),
            'url'=>Yii::app()->createUrl('tableros/createanillos')),
    ));*/
  ?>
</div>

<?php $this->endWidget(); ?>
   
    <?php 
 //var_dump($cobradora); var_dump($proyecto);
          if($proyecto!="" and $mes!="" and $cobradora=="") {
            //var_dump($cobradora); var_dump($proyecto);die;
            //var_dump("Metas Cobranzas TODOS");
             echo $this->renderPartial('_metascobranzas',
                    array(
                        'proyecto'=>$proyecto,
                        'totalmetaspg'=>$totalmetaspg,
                        'mes'=>$mes,      
                        'model'=>$model,
                        'proyecto'=>$proyecto,
              
                                     ));
          ////POSEE UN PROYECTO SOLAMENTE
          }elseif($proyecto!="" and $mes =="" and $cobradora=="" ){

             echo $this->renderPartial('_metascobranzasproy',
                    array(
                            'proyecto'=>$proyecto,
                            'model'=>$model,
                            'proyecto'=>$proyecto,
                            'eneproy'=>$eneproy,
                            'febproy'=>$febproy,
                            'marproy'=>$marproy,
                            'abrilproy'=>$abrilproy,
                            'mayoproy'=>$mayoproy,
                            'junproy'=>$junproy,
                            'julproy'=>$julproy,
                            'agosproy'=>$agosproy,
                            'sepproy'=>$sepproy,    
                            'octproy'=>$octproy,
                            'novproy'=>$novproy,
                            'dicproy'=>$dicproy,  
                            'eneropgg'=>$eneropgg,
                            'febreropgg'=>$febreropgg,
                            'marzopgg'=>$marzopgg,
                            'abrilpgg'=>$abrilpgg,
                            'mayopgg'=>$mayopgg,
                            'juniopgg'=>$juniopgg,
                            'juliopgg'=>$juliopgg,
                            'agostopgg'=>$agostopgg,
                            'septiembrepgg'=>$septiembrepgg,
                            'octubrepgg'=>$octubrepgg,
                            'noviembrepgg'=>$noviembrepgg,
                            'diciembrepgg'=>$diciembrepgg, 
                                     ));
              
          //COBRADORA TIENE VALOR Y PROYECTO TAMBIEN
          }elseif($proyecto!="" and $mes =="" and $cobradora!="" ){

             echo $this->renderPartial('_metascobranzasproy',
                    array(
                            'proyecto'=>$proyecto,
                            'model'=>$model,
                            'proyecto'=>$proyecto,
                            'eneproy'=>$eneproy,
                            'febproy'=>$febproy,
                            'marproy'=>$marproy,
                            'abrilproy'=>$abrilproy,
                            'mayoproy'=>$mayoproy,
                            'junproy'=>$junproy,
                            'julproy'=>$julproy,
                            'agosproy'=>$agosproy,
                            'sepproy'=>$sepproy,    
                            'octproy'=>$octproy,
                            'novproy'=>$novproy,
                            'dicproy'=>$dicproy,  
                            'eneropgg'=>$eneropgg,
                            'febreropgg'=>$febreropgg,
                            'marzopgg'=>$marzopgg,
                            'abrilpgg'=>$abrilpgg,
                            'mayopgg'=>$mayopgg,
                            'juniopgg'=>$juniopgg,
                            'juliopgg'=>$juliopgg,
                            'agostopgg'=>$agostopgg,
                            'septiembrepgg'=>$septiembrepgg,
                            'octubrepgg'=>$octubrepgg,
                            'noviembrepgg'=>$noviembrepgg,
                            'diciembrepgg'=>$diciembrepgg, 
                                     ));
              
          //COBRADORA TIENE VALOR Y PROYECTO NO     
          }elseif($cobradora!="" and $proyecto==""){
             //var_dump($cobradora);
              //var_dump("COBRADORA TIENE VALOR Y PROYECTO NO   ");
             
            // die;
             echo $this->renderPartial('_metascobranzascobrador',
                    array(
                            'model'=>$model,
                        //    'proyecto'=>$proyecto,
                            'eneproycobrador'=>$eneproycobrador,
                            'febproycobrador'=>$febproycobrador,
                            'marproycobrador'=>$marproycobrador,
                            'abrilproycobrador'=>$abrilproycobrador,
                            'mayoproycobrador'=>$mayoproycobrador,
                            'junproycobrador'=>$junproycobrador,
                            'julproycobrador'=>$julproycobrador,
                            'agosproycobrador'=>$agosproycobrador,
                            'sepproycobrador'=>$sepproycobrador,    
                            'octproycobrador'=>$octproycobrador,
                            'novproycobrador'=>$novproycobrador,
                            'dicproycobrador'=>$dicproycobrador,  
                            'eneropggcobrador'=>$eneropggcobrador,
                            'febreropggcobrador'=>$febreropggcobrador,
                            'marzopggcobrador'=>$marzopggcobrador,
                            'abrilpggcobrador'=>$abrilpggcobrador,
                            'mayopggcobrador'=>$mayopggcobrador,
                            'juniopggcobrador'=>$juniopggcobrador,
                            'juliopggcobrador'=>$juliopggcobrador,
                            'agostopggcobrador'=>$agostopggcobrador,
                            'septiembrepggcobrador'=>$septiembrepggcobrador,
                            'octubrepggcobrador'=>$octubrepggcobrador,
                            'noviembrepggcobrador'=>$noviembrepggcobrador,
                            'diciembrepggcobrador'=>$diciembrepggcobrador, 
                        
                                     ));
              
              
          }
          
          
          
          else{ 
              echo $this->renderPartial('_metascobranzastodos',
                    array(
                        'proyecto'=>$proyecto,
                        'totalmetaspg'=>$totalmetaspg,
                        'mes'=>$mes,      
                        'model'=>$model,
                        'proyecto'=>$proyecto,
                        'enero'=>$enero,
                        'febrero'=>$febrero,
                        'marzo'=>$marzo,
                        'abril'=>$abril,
                        'mayo'=>$mayo,
                        'junio'=>$junio,
                        'julio'=>$julio,
                        'agosto'=>$agosto,
                        'septiembre'=>$septiembre,
                        'octubre'=>$octubre,
                        'noviembre'=>$noviembre,
                        'diciembre'=>$diciembre,  
                        'eneropg'=>$eneropg,
                        'febreropg'=>$febreropg,
                        'marzopg'=>$marzopg,
                        'abrilpg'=>$abrilpg,
                        'mayopg'=>$mayopg,
                        'juniopg'=>$juniopg,
                        'juliopg'=>$juliopg,
                        'agostopg'=>$agostopg,
                        'septiembrepg'=>$septiembrepg,
                        'octubrepg'=>$octubrepg,
                        'noviembrepg'=>$noviembrepg,
                        'diciembrepg'=>$diciembrepg, 
                                     ));
          }
    ?>