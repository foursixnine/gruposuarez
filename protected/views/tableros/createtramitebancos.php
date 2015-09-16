<meta http-equiv="Content-Type" charset=utf-8">
<?php   $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tableros-form',
//'type' => 'horizontal',
      'htmlOptions' => array('class' => 'form-inline'),
	'enableAjaxValidation'=>false,
)); 

$this->breadcrumbs=array(
	'Tableros Operativos'=>array('index'),
	'Tramites',
);

$this->menu=array(

array('label'=>'Volver','url'=>'index'),    
);
?>
        
<br/>
<h2 class="titulo">Bancos por Pasos</h2>
<br/>

<?php echo $form->errorSummary($model); ?>
<div class="form-group">
    
        <?php echo $form->labelEx($model, 'Banco');?>
        <!-- Auto Completar Acuerdo de Cobros -->     
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_banco',
                      'data' => CHtml::listData(Banco::model()->findAll(), 'id_banco', 'descripcion'),
                      'options' => array(
                        'placeholder' => "BANCO",
                             'allowClear'=>true,
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
</div>      
<br/><br/>           
<div class="form-group">
     
          <?php echo $form->labelEx($model, 'Tramitadora'); ?>
           
          
           <?php 
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
                        'placeholder' => "TRAMITADORA",
                             'allowClear'=>true,
                      ),
                                
                  
                            
)); 
    ?>
  
</div>

    <div class="form-group">
           <?php
           echo $form->labelEx($model, 'A&ntilde;o');
           $this->widget(
            'booster.widgets.TbSelect2',
                         array(
                            'model'=>$model,
                            'attribute'=>'anno',
                            'data'=>array(
                              1=>'2015',
                                                           ),
            'htmlOptions' => array(
                   'allowClear'=>true,
            //        'placeholder' => "A&ntilde;o",
                        'style'=>'width:80px',    
            
                ),
                             )
); 
?>

</div> 
      <br/>     <br/>     
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Generar' : 'Save',
		));  
    ?>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>

<div id="containertablero" style="min-width: 855px; height: 400px;margin: 0 auto">

<?php


$this->pageTitle=Yii::app()->name . ' - '.Yii::t('app','Highcharts');
?>
    
    
<h1><?php //echo Yii::t('app','Highcharts').' Column DrillDown'; ?></h1>
 
<?php

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'scripts' => array(
      'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
      'modules/exporting', // adds Exporting button/menu to chart
     'themes/light'        // applies global 'grid' theme to all charts
    //   'themes/white'
    ),
    'options' => array(
      'chart' => array(
                    'type'=>'bar',
           'style'=> array(
         'fontFamily'=> 'Dosis, sans-serif',
      )
      ),
        
      'title' => array('text' => 'Bancos por Pasos'
          ),
      'xAxis' => array(
         'categories' => $dataSeries
      ),


      'yAxis' => array(
         'min'=> 0,
         'title' => array(
             'text' => 'Total Pasos'
             )
      ),
      'legend'=> array(
            'reversed'=> true,
        ),

        
        'plotOptions'=>array (
            'column'=>array(
                'stacking'=>'normal',
          
            )
         ),

       'series' => $dataCategories,
    )
  ));

     
      
           
?>


</div>   
  
