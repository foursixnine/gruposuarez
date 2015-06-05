<?php
$this->breadcrumbs=array(
	'Tablero',
        'estatuscartera', 
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

<?php
array_merge($nom_proyecto);
?>

<script>   
 var jArray= <?php echo json_encode(array($nom_proyecto) ); ?>;
 var tArray= <?php echo json_encode(array($treinta) ); ?>;

var sArray= <?php echo json_encode(array($sesenta) ); ?>;

var nArray= <?php echo json_encode(array($noventa) ); ?>;

var cArray= <?php echo json_encode(array($cientoveinte) ); ?>;

</script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



<script>
    

$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Estatus Cartera'
        },
        xAxis: {
            categories: ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE']
          //  categories: [tArray]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Estatus Cartera'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black'
                    }
                }
            }
        },
        series: [{
            name: '0-30',
            data: [tArray]
        }, {
            name: '31-60',
            data: [tArray]
        }, {
            name: '61-90',
            data: [tArray]
        },{
            name: '91-120',
            data: [0.00]
        }]
    });
});


</script>