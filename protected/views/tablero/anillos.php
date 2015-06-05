<?php
$this->breadcrumbs=array(
	'Tablero',
        'anillos', 
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
   <?php //var_dump($proyecto);die;?>  
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
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Contents of Highsoft\'s weekly fruit delivery'
        },
        subtitle: {
            text: '3D donut in Highcharts'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Delivered amount',
            data: [
                ['VERDE REAL', 8,2],
                ['ALTOS DEL TECAL ETAPAS  5 ABC', 3,1],
                ['ALTOS DEL TECAL ETAPA 6 Y 7', 1,2],
                ['TORRES DE VENECIA TORRE 1', 6,4],
                ['TORRES DE TOSCANA TORRE 4', 8,8],
                ['ALTOS DEL TECAL  COROTU ETAPA 13 Y 14 DERECHO', 4],
                ['NEW WEST FASE I', 4,9],
                ['SENDEROS FASE I', 1,8],
                ['ALTOS DEL TECAL COROTU ETAPA 13 Y 14 IZQUIERDO', 1],
                ['NEW WEST FASE II', 1,5],
                ['TORRES DE TOSCANA TORRE', 3,1],
                ['TORRES DE VENECIA - TORRE I',1,1]
            ]
        }]
    });
});
   

</script>