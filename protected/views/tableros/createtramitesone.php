<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tableros-form',
	'enableAjaxValidation'=>false,
)); 
$this->breadcrumbs=array(
	'Tableros Operativos'=>array('index'),
	'Paso LIQUIDACION',
);

$this->menu=array(

array('label'=>'Volver','url'=>'index'),    
);
?>
<br/>        

<h2 class="titulo">Liquidaciones</h2>


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
          <?php echo $form->labelEx($model, 'Tramitadora'); ?>
           
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
                        'placeholder' => "TRAMITADORA",
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
                        'placeholder' => "MES",
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
                              1=>'2015',
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
  
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>

<div id="containertablero" style="min-width: 855px; height: 400px;margin: 0 auto">

<?php

$this->Widget('ext.highcharts.HighchartsWidget', array(
'scripts' => array(
      'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
      'modules/exporting', // adds Exporting button/menu to chart
      'themes/grid-light'        // applies global 'grid' theme to all charts
    ),
    'options' => array(
      'title' => array('text' => 'Tramite 1'),
      'xAxis' => array(
        'categories' => $mes_paso
      ),
      'yAxis' => array(
         'title' => array('text' => 'Tramite 1 '),
        // 'format'=>'{value}°C'
      ),
        'legend'=> array(
          'format'=>  '{value} mm',            
        ),
      'colors'=>array('#0563FE', '#6AC36A', '#FFD148', '#FF2F2F'),
      'gradient' => array('enabled'=> true),
      'credits' => array('enabled' => true),
      'exporting' => array('enabled' => true), //to turn off exporting uncomment
      'chart' => array(
        'plotBackgroundColor' => '#ffffff',
        'plotBorderWidth' => null,
        'plotShadow' => true,
        'height' => 400,
        'type'=>'xy',
      ),
      'title' => false,
       'series' => array(
          array(
              
              'type'=>'column',
                'name' => 'Monto Liquidado',
              //  'yAxis'=> 2,
                'data' =>$totalliquidado
              ),
              
         array(
             'type'=>'spline',
                'name' => 'Casas Liquidadas',
                'data' => $totalpaso,
              //  'yAxis'=> 1
              ),
   /*     array('type'=>'spline',
                'name' => 'Pasos', 
                'data' => $totalliquidado
              ),   */    
      ),
    )
  ));
      
?>
</div>   
  


<?php

/*********ORIGINAL*****************///////


/*
$this->Widget('ext.highcharts.HighchartsWidget', array(
'scripts' => array(
      'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
      'modules/exporting', // adds Exporting button/menu to chart
      'themes/grid-light'        // applies global 'grid' theme to all charts
    ),
    'options' => array(
      'title' => array('text' => 'Patient Visits By Day (Last Two Weeks)'),
      'xAxis' => array(
         'categories' => array('14th','15th','16th','17th','18th','19th','20th','21th','22th','23th','24th','25th','26th','27th','28th')
      ),
      'yAxis' => array(
         'title' => array('text' => 'Number of Visits')
      ),
      'colors'=>array('#0563FE', '#6AC36A', '#FFD148', '#FF2F2F'),
      'gradient' => array('enabled'=> true),
      'credits' => array('enabled' => false),
     
      'chart' => array(
        'plotBackgroundColor' => '#ffffff',
        'plotBorderWidth' => null,
        'plotShadow' => false,
        'height' => 400,
      ),
      'title' => false,
       'series' => array(
          array('type'=>'column','name' => 'Hampton Office', 'data' => array(20, 25, 25,35, 30, 28,25, 27, 23, 24, 25, 26,27,28,33)),
          array('type'=>'spline','name' => 'Hampton Office', 'data' => array(20, 25, 25,35, 30, 28,25, 27, 23, 24, 25, 26,27,28,33)),
          array('type'=>'spline','name' => 'Richmond Office', 'data' => array(5, 7, 8,9, 7, 10,11, 12, 13,15, 17, 14,15,16,18)),
          array(
            'type'=>'pie',
            'name' => 'Richmond Office',
            'data' => array(5, 7, 8),
            'dataLabels' => array(
              'enabled' => false,
            ),
            'showInLegend'=>false,
            'size'=>'10',
            'center'=>[20, 20],
          ),
      ),
    )
  ));
      
      */
?>