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
     <!-- Proyecto -->   

        <?php/*
                    $this->widget(
                        'booster.widgets.TbSelect2', array(
                      'model' => $proyecto,
                      'attribute' => 'id_proyecto',
                      'data' => CHtml::listData(Proyecto::model()->findAll(), 'id_proyecto', 'titulo'),
                      'options' => array(
                        'placeholder' => "PROYECTO",
               
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        */?>
<br/>
<p><strong>Cobrador</strong><br/>
     <!-- Auto Completar Acuerdo de Cobros -->     
        <?php/*
                    $this->widget(
                        'booster.widgets.TbSelect2', array(
                      'model' => $cobrador,
                      'attribute' => 'id_usuario',
                      'data' => CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                      'options' => array(
                        'placeholder' => "COBRADOR",
                  
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
       */ ?>
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
 var jArray= <?php echo json_encode($nom_proyecto) ; ?>;
 var tArray= <?php echo json_encode($treinta); ?>;

var sArray= <?php echo json_encode($sesenta); ?>;

var nArray= <?php echo json_encode($noventa); ?>;

var cArray= <?php echo json_encode($cientoveinte); ?>;

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
            categories: ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE','13','14','15','16']
           // categories: nArray
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
            data: [nArray]
        }, {
            name: '31-60',
            data: [nArray]
        }, {
            name: '61-90',
            data: [nArray]
        },{
            name: '91-120',
            data: [nArray]
        }]
    });
});


</script>