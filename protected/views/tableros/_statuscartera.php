<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script>
var pArray= <?php echo json_encode($proyecto); ?>;
var total30= <?php echo ($total30); ?>;
var total60= <?php echo ($total60); ?>;
var total90= <?php echo ($total90); ?>;
var total120= <?php echo ($total120); ?>;

//alert(total30);die;
var mes = <?php echo json_encode($mes); ?>;
//alert(mes);die;

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

<div id="containertablero" style="min-width: 825px; height: 350px;margin: 0 auto"></div>




<script>
 
   $(function () {
    $('#containertablero').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Status Cartera'
        },
        xAxis: {
        // categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
           categories: ['Julio']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'percentaje'
            }
        },
        series: [{
            name: '30',
            data: [total30]
          //  data: [5, 3, 4, 7, 2,5, 3, 4, 7, 2,0,3]
        }, {
            name: '60',
            data: [total60]
            //data: [2, 2, 3, 2, 1,5, 3, 4, 7, 2,5,2]
        }, {
            name: '90',
            data: [total90]
            //data: [5, 3, 4, 7, 2,5, 3, 4, 7, 2,8,4]
        }, {
            name: '120',
            data: [total120]
            //data: [5, 3, 4, 7, 2,5, 3, 4, 7, 2,8,4]
        }
        ]
    });
});

</script>

        

      