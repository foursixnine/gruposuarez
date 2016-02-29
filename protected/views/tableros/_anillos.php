<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script>
var pArray= <?php echo json_encode($proyecto); ?>;
var countsiArray= <?php echo json_encode($totalsi); ?>;
//alert (countsiArray);
</script>

<div id="containertablero" style="min-width: 855px; height: 400px;margin: 0 auto"></div>

<script>
 $(function () {
    $('#containertablero').highcharts({
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
});

</script>

        

      