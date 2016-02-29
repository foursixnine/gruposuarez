<?php
$this->breadcrumbs=array(
	'Tablero',
        'metascobranzas', 
);

?>
<h1></h1>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<p><strong>Proyecto</strong><br/>
     <!-- Auto Completar Acuerdo de Cobros -->     
     <?php
           $this->widget(
            'booster.widgets.TbSelect2',
            array(
                'name' => 'llamada_voz',
                'id' => 'llamada_voz',
                'data' => array(1 => 'VERDE REAL', 2 => 'ALTOS DEL TECAL ETAPAS  5 ABC',
                    3=>'ALTOS DEL TECAL ETAPA 6 Y 7',
                    4=>'TORRES DE VENECIA TORRE 1'),
                'htmlOptions' => array(
                    'placeholder' => "----",
                            
            
                ),
            )
        );
     ?>
<br/>
<p><strong>Cobrador</strong><br/>
     <!-- Auto Completar Acuerdo de Cobros -->     
     <?php
           $this->widget(
            'booster.widgets.TbSelect2',
            array(
                'name' => 'cobradora',
                'id' => 'cobradora',
                'data' => array(1 => 'JUANA', 2 => 'PETRA',
                    3=>'ANDRES',
                    4=>'FABIANA'),
                'htmlOptions' => array(
                    'placeholder' => "----",
                            
            
                ),
            )
        );
     ?>
<br/>
<p><strong>Metas</strong><br/>
     <!-- Auto Completar Acuerdo de Cobros -->     
     <?php
           $this->widget(
            'booster.widgets.TbSelect2',
            array(
                'name' => 'cobradora',
                'id' => 'cobradora',
                'data' => array(
                    1 => 'Meta 1', 
                    2 => 'Meta 2',
                    3=>'Meta 3',
                    4=>'Meta 4'),
                'htmlOptions' => array(
                    'placeholder' => "----",
                ),
            )
        );
     ?>
<br/>
<p><strong>Fecha</strong></p>
<?php      
$this->widget('booster.widgets.TbDateRangePicker', array(
    'name' => 'fecha_acuerdo',
    'id' => 'fecha_acuerdo',
    'options'=>
    	array(
				'widgetOptions' => array(
					'callback' => 'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}'
				), 
		   		'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => 'Click inside! An even a date range field!.',
				'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
            )
));
?>

<script>
   
 var tArray= <?php echo json_encode($treinta); ?>;
alert(tArray);
var sArray= <?php echo json_encode($sesenta) ; ?>;
alert(sArray);
var nArray= <?php echo json_encode($noventa); ?>;
alert(nArray);
var cArray= <?php echo json_encode($cientoveinte); ?>;
alert(cArray);
 // for(var i=0;i<12;i++){
      //alert(jArray[i]);
       //[1,2,3,4,5,6,7,8,9,10,11,12]
 // }
var totalt = 0;
for (var i = 0; i < tArray.length; i++) {
    totalt += tArray[i] << 0;
}
alert(totalt);
var totals = 0;
for (var i = 0; i < sArray.length; i++) {
    totals += sArray[i] << 0;
}
alert(totals);

var totaln = 0;
for (var i = 0; i < nArray.length; i++) {
    totaln += nArray[i] << 0;
}
alert(totaln);

var totalc = 0;
for (var i = 0; i < cArray.length; i++) {
    totalc += cArray[i] << 0;
}
alert(totalc);
</script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'METAS COBRANZAS'
        },
        xAxis: {
            categories: [
                '30 Dias',
                '60 Dias',
                '90 Dias',
                '120 Dias'
            ]
        },
        yAxis: [{
            min: 0,
            title: {
                text: 'Employees'
            }
        }, {
            title: {
                text: 'Profit (millions)'
            },
            opposite: true
        }],
        legend: {
            shadow: true
        },
        tooltip: {
            shared: true
        },
        plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 0
            }
        },
        series: [ {
            name: 'Cumplido',
            color: 'rgba(248,161,63,1)',
            data: [totalt, totals, totaln,totalc],
            tooltip: {
                valuePrefix: '$',
                valueSuffix: ' M'
            },
            pointPadding: 0.3,
            pointPlacement: 0.2,
            yAxis: 1
        }, {
            name: 'Meta Esperada',
            color: 'rgba(186,60,61,.9)',
            data: [203.6, 198.8, 208.5,12],
            tooltip: {
                valuePrefix: '$',
                valueSuffix: ' M'
            },
            pointPadding: 0.4,
            pointPlacement: 0.2,
            yAxis: 1
        }]
    });
});

  

</script>