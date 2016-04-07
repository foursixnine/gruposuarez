<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<?php var_dump($totalsi);
//die;
?>
<div id="containertablero2" style="min-width: 855px; height: 400px;margin: 0 auto">

<?php
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
                        'textShadow'=> '0px 1px 2px black'
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
                 'data'=>array(
                  array('hgh', $totalsi),
                  array('Correos', 0),
                   array('Correos', 30),
                  /*(
                    'name'=>'Proprietary or Undetectable',
                    'y'=>0.2,
                    'dataLabels'=> array(
                        'enabled'=> false
                    )
                )*/
            )
        )
    )
)
))
    );


?>
</div>


 