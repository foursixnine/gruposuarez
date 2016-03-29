<meta http-equiv="Content-Type" charset=utf-8">
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

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
<button type="button" class="btn btn-warning">TRAMITE POR PASOS</button>
<br/>
<br/>
<?php echo $form->errorSummary($model); ?>
<div class="form-group">
    
        <?php echo $form->labelEx($model, 'Proyecto');?>
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
</div>      
<br/><br/>           
<div class="form-group">
     
          <?php echo $form->labelEx($model, 'Tramitadora'); ?>
           
          
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_usuario',
                      'data' => CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                      'options' => array(
                        'placeholder' => "TRAMITADORA",
                       'allowClear'=>true,
                      //  'minimumInputLength'=>2,
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
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
                              1=>'2016',
                              2=>'2015',
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


<div id="containertablero" style="min-width: 855px; height: 400px;margin: 0 auto">    
    
<h1><?php //echo Yii::t('app','Highcharts').' Column DrillDown'; ?></h1>
 
<?php


$this->Widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
      'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
      'modules/exporting', // adds Exporting button/menu to chart
    // 'themes/grid-light'        // applies global 'grid' theme to all charts
      'themes/white'
    ),
    'options' => array(
      'chart' => array(
                    'type'=>'column'
      ),
        
      'title' => array('text' => 'Pasos y Proyectos'
          ),
      'xAxis' => array(
         'categories' => $dataSeries
      ),


      'yAxis' => array(
         'title' => array(
             'text' => 'Total Pasos'
             )
      ),
      'legend'=> array(
            'align'=> 'right',
            'x'=> -30,
            'verticalAlign'=> 'top',
            'y'=> 25,
            'floating'=> true,
          //  'backgroundColor'=> '(Highcharts.theme && Highcharts.theme.background2)' || 'gray',
            'borderColor'=>'#CCC',
            'borderWidth'=> 1,
            'shadow'=> false
        ),

        'tooltip'=>array (
            'headerFormat'=>'<b>{point.x}</b><br/>',
            'pointFormat'=> '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        ),
        
        'plotOptions'=>array (
            'column'=>array(
                'stacking'=>'normal',
                'dataLabels'=>array(
                    'enabled'=> true,
             //       'color'=> '(Highcharts.theme && Highcharts.theme.dataLabelsColor) || "white"',
                    'style'=> array(
                        'textShadow'=>'0 0 3px black'
                    )
                )
            )
         ),

       'series' => $dataCategories,
    )
  ));

     
      
           
?>

</div>
   
 

<div id="containertablero2" style="min-width: 855px; height: 400px;margin: 0 auto">    
    
<h1><?php //echo Yii::t('app','Highcharts').' Column DrillDown'; ?></h1>
 
<?php

$this->Widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
      'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
      'modules/exporting', // adds Exporting button/menu to chart
   //  'themes/grid-light'        // applies global 'grid' theme to all charts
        'themes/white'
    ),
    'options' => array(
      'chart' => array(
                    'type'=>'column'
      ),
        
      'title' => array('text' => 'Cantidad'
          ),
      'xAxis' => array(
         'categories' => $dataSeries2
      ),


      'yAxis' => array(
         'title' => array(
             'text' => 'Total Pasos'
             )
      ),
      'legend'=> array(
            'align'=> 'right',
            'x'=> -30,
            'verticalAlign'=> 'top',
            'y'=> 25,
            'floating'=> true,
          // 'backgroundColor'=> '(Highcharts.theme && Highcharts.theme.background2)' || 'gray',
            'borderColor'=>'#CCC',
            'borderWidth'=> 1,
            'shadow'=> false
        ),

        'tooltip'=>array (
            'headerFormat'=>'<b>{point.x}</b><br/>',
            'pointFormat'=> '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        ),
        
        'plotOptions'=>array (
            'column'=>array(
                'stacking'=>'normal',
                'dataLabels'=>array(
                    'enabled'=> true,
                    'color'=> '(Highcharts.theme && Highcharts.theme.dataLabelsColor) || "white"',
                    'style'=> array(
                        'textShadow'=>'0 0 3px black'
                    )
                )
            )
         ),

       'series' => $dataCategories2,
    )
  ));

     
      
           
?>

</div>  
<p class="bg-primary">Leyenda</p>


    
    <button type="button" class="btn btn-default btn-xs">Paso 1:</button>
 
    <small>Solicitud de minuta de cancelaci&oacute;n a Banco Interino y Firma de Minuta</small><br/>
 

     <button type="button" class="btn btn-default btn-xs">Paso 2:</button>
 
    <small>Confeccionar minuta de Venta</small><br/>
 
    
     <button type="button" class="btn btn-default btn-xs">Paso 3:</button>
 
     <small>Solicitar Minuta de Pr&eacute;stamo</small><br/>
 
    
     <button type="button" class="btn btn-default btn-xs">Paso 4:</button>
 
     <small>Confeccionar escritura P&uacute;blica y Protocolo</small><br/>
     
     <button type="button" class="btn btn-default btn-xs">Paso 5:</button>
 
     <small>Firma de escritura y Promotor</small><br/>

          <button type="button" class="btn btn-default btn-xs">Paso 6:</button>
 
     <small>Interino</small><br/>
     
          <button type="button" class="btn btn-default btn-xs">Paso 7:</button>
 
     <small>Acreedor</small><br/>
     
          <button type="button" class="btn btn-default btn-xs">Paso 8:</button>
 
     <small>Cierre de escritura</small><br/>
     
          <button type="button" class="btn btn-default btn-xs">Paso 9:</button>
 
     <small>Ingreso al registro p&uacute;blico de escritura</small><br/>
     
          <button type="button" class="btn btn-default btn-xs">Paso 10:</button>
 
     <small>Envio de escritura a Bancos</small><br/>
     
          <button type="button" class="btn btn-default btn-xs">Paso 11:</button>
 
          <small>Liquidaci&oacute;n</small><br/>