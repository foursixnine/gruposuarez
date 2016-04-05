<script type="text/javascript" src="http://code.highcharts.com/highcharts.js">
</script>
<script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js">
</script>
       
<div id="containertablero" style="min-width: 855px; height: 400px;margin: 0 auto">

<?php


$this->pageTitle=Yii::app()->name . ' - '.Yii::t('app','Highcharts');
?><?php
    $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' =>array(
        'chart'=>array(
            'plotBackgroundColor' => null,
            'plotBorderWidth'=> 0,
            'plotShadow'=> false
        ),
        'title'=>array(
            'text'=> 'GESTION </br>DE </br>COBROS</br>',
            'align'=> 'center',
            'verticalAlign'=> 'middle',
            'y'=> 40
        ),
        'tooltip'=>array(
            'pointFormat'=> '{series.name}: <b>{point.percentage:.1f}%</b>'
        ),
        'plotOptions'=>array( 
            'pie'=>array(
                'dataLabels'=>array(
                    'enabled'=> true,
                    'distance'=> -50,
                    'style'=>array(
                        'fontWeight'=> 'bold',
                        'color'=> 'white',
                        'textShadow'=> '0px 0.5px 1px black'
                    )
                ),
                'startAngle'=> -90,
                'endAngle'=> 90,
                'center'=> array('50%', '75%')
           ),
        ),
        'series'=> array(
            array(
            'type'=>'pie',
            'name'=> 'Browser share',
            'innerSize'=>'50%',
            'data'=>array(
                 ['Llamadas', $totalsi],
                 ['Correos', 0],
              /*  array('Firefox',   10.38),
                array('IE',       56.33),
                array('Chrome', 24.03),
                array('Safari',    4.77),
                array('Opera',     0.91),*/
                array(
                    'name'=>'Proprietary or Undetectable',
                    'y'=>0.2,
                    'dataLabels'=> array(
                        'enabled'=> false
                    )
                )
            )
        )
    )
)
)
    );


?>
</div>


 