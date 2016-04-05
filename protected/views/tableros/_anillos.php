<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script>
var pArray= <?php echo json_encode($proyecto); ?>;
var countsiArray= <?php echo json_encode($totalsi); ?>;
//alert (countsiArray);
</script>

<div id="containertablero" style="min-width: 855px; height: 400px;margin: 0 auto"></div>

<script>

    $this->Widget('ext.highcharts.HighchartsWidget', array(
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'GESTION DE COBROS<br>',
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>Llamadas {point.y}</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: false,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: pArray,
            innerSize: '50%',
            data: [
            ['Llamadas', countsiArray],
            ['Correos', 0],
         
                
            ]
        }]
    });
);

</script>


<?php
    $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' =>array(
        'chart'=>array(
            'plotBackgroundColor' => null,
            'plotBorderWidth'=> 0,
            'plotShadow'=> false
        ),
        'title'=>array(
            'text'=> 'Browser<br>shares<br>2015',
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
                array('Firefox',   10.38),
                array('IE',       56.33),
                array('Chrome', 24.03),
                array('Safari',    4.77),
                array('Opera',     0.91),
               /* array(
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
)
    );


?>
</div>


 