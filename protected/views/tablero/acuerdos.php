<?php
$this->breadcrumbs=array(
	'Tablero',
        'acuerdos', 
);

?>
<h1></h1>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>





<?php 
// array_merge($proyecto);
 //var_dump($proyecto); 
?>

<script>
   
 var jArray= <?php echo json_encode(array($proyecto) ); ?>;
//alert(jArray);
 // for(var i=0;i<12;i++){
      //alert(jArray[i]);
       //[1,2,3,4,5,6,7,8,9,10,11,12]
 // }
  
  var tempArray = <?php echo json_encode($proyecto); ?>;

   //You will be able to access the properties as 
   

</script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


<script>
    var jArray = new Array();
     var jArray= <?php echo json_encode($proyecto ); ?>;

$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'LLAMADAS'
        },
        xAxis: {
            categories: jArray
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total llamadas'
            }
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'percent'
            }
        },
        series: [{
            name: 'SI',
            data: [5, 3, 4, 7, 2,5,8,4,1,1,2,1]
        }, {
            name: 'NO',
            data: [2, 2, 3, 2, 1,5, 3, 4, 7, 2,5,8]
        }]
    });
});
</script>