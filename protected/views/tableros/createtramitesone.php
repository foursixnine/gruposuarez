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

<button type="button" class="btn btn-warning">LIQUIDACIONES</button>
<br/><br/>
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

           <?php echo $form->labelEx($model, 'Meses'); ?>
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
   <?php echo $form->labelEx($model, 'Año'); ?>
           <br/>
     
           <?php
           $this->widget(
            'booster.widgets.TbSelect2',
                         array(
                            'model'=>$model,
                            'attribute'=>'anno',
                            'data'=>array(
                              1=>'2016',
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

/*********ORIGINAL*****************///////



$this->Widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
      'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
      'modules/exporting', // adds Exporting button/menu to chart
      'themes/grid-light'        // applies global 'grid' theme to all charts
    ),
    'options' => array(
      'title' => array(
            'text' => 'Casas Liquidadas a Credito'
      ),
      'subtitle' => array(
          'text' => 'Pasos en Liquidación'
      ),
      'xAxis' => array(
         'categories' => $mes_paso,
         'crosshair' => true
      ),
      //Eje Primerio 
      'yAxis' =>array(   
            array(
                      'labels' => array(
                      'format' => '{value} ',
                          'style'  => array(
                              'color' => 'Highcharts.getOptions().colors[1]'
                          )
                      ),
                      'title' => array(
                            'text' => 'Cantidad de Casas de Contado',
                            'style' => array(
                                              'color' => 'Highcharts.getOptions().colors[1]'
                                            )
                                    ),
                    'min' => 1,
                    'max' => 30
            ),array( // Secondary yAxis
            'title' => array(
                'text' => 'Monto Liquidado',
                'style' => array(
                    'color'=>'Highcharts.getOptions().colors[0]'
                )
            ),
            'labels'=>array(
                'format' => '{value} mm',
                'style' =>array(
                    'color'=> 'Highcharts.getOptions().colors[0]'
                )
            ),
            'opposite'=>true
          )
      ),


        'tooltip' =>array( 
            'shared'=> true
        ),

        'legend' =>array(
            'layout'=>  'vertical', //horizontal
            'align'=>  'left', //center
            'x'=> 120,
            'borderWidth'=> 2,
            'verticalAlign'=> 'top', //bottom top
            'y'=> 100,
            'floating'=> true

            //'enabled' => true
        
            //'backgroundColor' => '(Highcharts.theme && Highcharts.theme.legendBackgroundColor) || + .'#FFFFFF'.+'
        ),
       //Comienzan las grafico la data
        'series' => 
        array(
          array(
                'name'=> 'Monto Liquidado',
                'type'=>'column',
                'yAxis'=> 1, 
                'data' => $totalliquidado,
                //Para colocar en formato $ y con 2 decimales
                'tooltip' => array(
                  'valueDecimals'=> 2,
                  'valuePrefix'=> '$',
                  'valueSuffix'=> ' USD'
                )
          ),      
          array(
               'type'=>'spline',
               'name' => 'Casas Liquidadas ', 
               'data' => $totalpaso,
               'tooltip' => array(
                    'valueSuffix' => ' Casas'
               )
          ),
      ),
    )
  ));
      
      
      
?>
</div>


<br/>


<div id="containertablero2" style="min-width: 855px; height: 400px;margin: 0 auto">


<?php

/*********ORIGINAL*****************///////



$this->Widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
      'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
      'modules/exporting', // adds Exporting button/menu to chart
      'themes/grid-light'        // applies global 'grid' theme to all charts
    ),
    'options' => array(
      'title' => array(
            'text' => 'Casas Liquidadas de Contado'
      ),
      'subtitle' => array(
          'text' => 'Pasos en Liquidación'
      ),
      'xAxis' => array(
         'categories' => $mes_paso2,
         'crosshair' => true
      ),
      //Eje Primerio 
      'yAxis' =>array(   
            array(
                      'labels' => array(
                      'format' => '{value} ',
                          'style'  => array(
                              'color' => 'Highcharts.getOptions().colors[1]'
                          )
                      ),
                      'title' => array(
                            'text' => 'Cantidad de Casas',
                            'style' => array(
                                              'color' => 'Highcharts.getOptions().colors[1]'
                                            )
                                    ),
                    'min' => 1,
                    'max' => 30
            ),array( // Secondary yAxis
            'title' => array(
                'text' => 'Monto Liquidado',
                'style' => array(
                    'color'=>'Highcharts.getOptions().colors[0]'
                )
            ),
            'labels'=>array(
                'format' => '{value} mm',
                'style' =>array(
                    'color'=> 'Highcharts.getOptions().colors[0]'
                )
            ),
            'opposite'=>true
          )
      ),


        'tooltip' =>array( 
            'shared'=> true
        ),

        'legend' =>array(
            'layout'=>  'vertical', //horizontal
            'align'=>  'left', //center
            'x'=> 120,
            'borderWidth'=> 2,
            'verticalAlign'=> 'top', //bottom top
            'y'=> 100,
            'floating'=> true

            //'enabled' => true
        
            //'backgroundColor' => '(Highcharts.theme && Highcharts.theme.legendBackgroundColor) || + .'#FFFFFF'.+'
        ),
       //Comienzan las grafico la data
        'series' => 
        array(
          array(
                'name'=> 'Monto Liquidado',
                'type'=>'column',
                'yAxis'=> 1, 
                'data' => $totalventa,
                //Para colocar en formato $ y con 2 decimales
                'tooltip' => array(
                  'valueDecimals'=> 2,
                  'valuePrefix'=> '$',
                  'valueSuffix'=> ' USD'
                )
          ),      
          array(
               'type'=>'spline',
               'name' => 'Casas Liquidadas ', 
               'data' => $totalpaso2,
               'tooltip' => array(
                    'valueSuffix' => ' Casas'
               )
          ),
      ),
    )
  ));
      
      
      
?>
</div>