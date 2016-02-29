<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script>

var totalmetaspg = <?php echo ($totalmetaspg); ?>;

var totalconix = totalmetaspg + 1615;

var mes = <?php echo ($mes); ?>;
if (mes == 1) {
    mesmostrar = "Enero";
}
if (mes == 2) {
    mesmostrar = "Febrero";
}
if (mes == 3) {
    mesmostrar = "Marzo";
}
if (mes == 4) {
    mesmostrar = "Abril";
}
if (mes == 5) {
    mesmostrar = "Mayo";
}
if (mes == 6) {
    mesmostrar = "Junio";
}
if (mes == 7) {
    mesmostrar = "Julio";
}
if (mes == 8) {
    mesmostrar = "Agosto";
}
if (mes == 9) {
    mesmostrar = "Septiembre";
}
if (mes == 10) {
    mesmostrar = "Octubre";
}
if (mes == 11) {
    mesmostrar = "Noviembre";
}
if (mes == 12) {
    mesmostrar = "Diciembre";
}


</script>

<div id="containertablero" style="min-width: 855px; height: 400px;margin: 0 auto"></div>


<script>

  
$(function () {
    $('#containertablero').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'METAS COBRANZAS'
        },
        xAxis: {
            categories: [
                mesmostrar,
          
            ]
        },
        yAxis: [{
            min: 0,
            title: {
                text: 'mes'
            }
        }, {
            title: {
                text: 'Profit (millions)'
            },
            opposite: true
        }],
        legend: {
            shadow: false
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
            data: [totalconix],
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
            data: [totalmetaspg],
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