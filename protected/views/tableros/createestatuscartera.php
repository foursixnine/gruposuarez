<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tableros-form',
	'enableAjaxValidation'=>false,
)); 
$this->breadcrumbs=array(
	'Tableros Operativos'=>array('index'),
	'Gestion',
);

$this->menu=array(

array('label'=>'Volver','url'=>'../index'),    
);
?>
        

<h1>Tablero de Status Cartera</h1>


<?php echo $form->errorSummary($model); ?>

        <?php echo $form->labelEx($model, 'Proyecto');?></b>
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
                            'allowClear'=>true,
            
                     /*   'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
        <br/>
        
	<?php echo $form->labelEx($model, 'Cobrador');?>
        <br />

	 <?php
                    $this->widget(
                        'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_usuario',
                      'data' => CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                'options' => array(
                        'placeholder' => "Cobrador",
                             'allowClear'=>true,
                 /*       'allowClear'=>true,*/
                     /*   'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
          ?>
        <br />
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
                        'placeholder' => "MES",
                             'allowClear'=>true,
                 /*       'allowClear'=>true,*/
                     /*   'minimumInputLength'=>2,*/
                      ),
                             )
); 
?>
         <br />
                  <?php //echo $form->labelEx($model, 'Año'); ?>
         <p><strong>A&ntilde;o</strong></p>
    
           <?php
           $this->widget(
            'booster.widgets.TbSelect2',
                         array(
                            'model'=>$model,
                            'attribute'=>'campo',
                            'data'=>array(
                              1=>'2015',
                         


                                
                                
                     
                                
                            ),
            'htmlOptions' => array(
                   'allowClear'=>true,
                    'placeholder' => "----",
                            
            
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
 echo CHtml::link('Ver Todos',array('/tableros/createestatuscartera/'));
 //echo CHtml::link('Ver todos los Proyectos',array('/tableros/createanillos/'));
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

          if($proyecto!="" or $mes!=""){
             
            echo $this->renderPartial('_statuscartera',
                    array('proyecto'=>$proyecto,
        'total30'=>$total30,
        'total60'=>$total60,
        'total90'=>$total90,
        'total120'=>$total120,
                       
        'mes'=>$mes,
                                     ));
          }
        else{
           //   var_dump($total30);
              echo $this->renderPartial('_statuscarteratodos',
                    array('proyecto'=>$proyecto,
           'total30'=>$total30,
        'total60'=>$total60,
        'total90'=>$total90,
        'total120'=>$total120,
                           'total30p'=>$total30p,
        'total60p'=>$total60p,
        'total90p'=>$total90p,
        'total120p'=>$total120p,
        'mes'=>$mes,
                                     ));
          }
    ?>