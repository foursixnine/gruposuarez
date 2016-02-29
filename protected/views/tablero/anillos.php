<?php

$this->breadcrumbs=array(
	'Tablero',
        'anillos', 
);

$this->menu=array(
array('label'=>'Create Usuarios','url'=>array('create')),
array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>
<h1><?php echo $totalsi;?></h1>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>   
var tArray= <?php echo json_encode($totalsi); ?>;

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
            name: 'Cantidad de Llamadas Efectivas',
            data: [
                ['VERDE REAL', 8],
                ['ALTOS DEL TECAL ETAPAS  5 ABC', tArray],
                ['ALTOS DEL TECAL ETAPA 6 Y 7', 1],
                ['TORRES DE VENECIA TORRE 1', 6],
                ['TORRES DE TOSCANA TORRE 4', 8],
                ['ALTOS DEL TECAL  COROTU ETAPA 13 Y 14 DERECHO', 4],
                ['NEW WEST FASE I', 4],
                ['SENDEROS FASE I', 1],
                ['ALTOS DEL TECAL COROTU ETAPA 13 Y 14 IZQUIERDO', 1],
                ['NEW WEST FASE II', 1],
                ['TORRES DE TOSCANA TORRE', 3],
                ['TORRES DE VENECIA - TORRE I',1]
            ]
        }]
    });
});
   

</script>