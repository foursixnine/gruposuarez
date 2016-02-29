<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script>

var pArray= <?php echo json_encode($proyecto); ?>;
var total30= <?php echo ($total30); ?>;
var total60= <?php echo ($total60); ?>;
var total90= <?php echo ($total90); ?>;
var total120= <?php echo ($total120); ?>;
var total30p = <?php echo ($total30p); ?>;
var total60p = <?php echo ($total60p); ?>;
var total90p = <?php echo ($total90p); ?>;
var total120p = <?php echo ($total120p); ?>;

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

<?php 
/*
676247.36
453774.06
2775347.53
 * junio 30 509675.60
 * junio 60 378986.51
 * junio 90 299996.31
 * junio 120 299996.31 
 * 
 */
?>
<div id="containertablero" style="min-width: 725px; height: 350px;margin: 0 auto"></div>



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
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
           // categories: ['Julio','Agosto']
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
   // data: [5]
            data: [0, 0, 0, 0, 0,0, total30,total30p,773539.42, 449752.80,0,0]
        }, {
            name: '60',
        //    data: [5]
            data: [0, 0, 0, 0, 0,0, total60,total60p, 773539.42, 449752.80,0,0]
        }, {
            name: '90',
         //   data: [5]
            data: [0, 0, 0, 0, 0,0, total90,total90p, 626194.59, 612916.94,0,0]
        },{
            name: '120',
         //   data: [5]
            data: [0, 0, 0, 0, 0,0, total120,total120p, 3148568.22, 3539332.87,0,0]
        }]
    });
});


    

</script>      