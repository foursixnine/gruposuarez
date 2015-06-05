<?php
$this->breadcrumbs=array(
	'Tablero',
        'recuperacioncartera', 
);

?>
<h1></h1>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/data.js"></script>
<script src="http://code.highcharts.com/modules/drilldown.js"></script>

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
     
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<!-- Data from www.netmarketshare.com. Select Browsers => Desktop share by version. Download as tsv. -->
<pre id="tsv" style="display:none">Browser Version	Total Market Share
Treinta Dias 8.0	26.61%
Sesenta Dias 18.0	8.01%
Sesenta Dias 19.0	7.73%
Noventa 12	6.72%
Treinta Dias 6.0	6.40%
Noventa 11	4.72%
Treinta Dias 7.0	3.55%
Noventa 13	2.16%
Noventa 3.6	1.87%
Sesenta Dias 17.0	1.13%
Noventa 10	0.90%
Noventa 9.0	0.65%
Noventa 8.0	0.55%
Noventa 4.0	0.50%
Sesenta Dias 16.0	0.45%
Noventa 3.0	0.36%
Noventa 3.5	0.36%
Noventa 6.0	0.32%
Noventa 5.0	0.31%
Noventa 7.0	0.29%
Sesenta Dias 18.0 - Maxthon Edition	0.26%
Sesenta Dias 14.0	0.25%
Sesenta Dias 20.0	0.24%
Sesenta Dias 15.0	0.18%
Sesenta Dias 12.0	0.16%
Sesenta Dias 13.0	0.13%
Sesenta Dias 11.0	0.10%
Noventa 14	0.10%
Noventa 2.0	0.09%
Sesenta Dias 10.0	0.09%
Treinta Dias 8.0 - Tencent Traveler Edition	0.09%
Ciento Veinte 50.0	8.32%
Ciento Veinte 10.0	0.09%
</pre>


<script>

$(function () {

    Highcharts.data({
        csv: document.getElementById('tsv').innerHTML,
        itemDelimiter: '\t',
        parsed: function (columns) {

            var brands = {},
                brandsData = [],
                versions = {},
                drilldownSeries = [];

            // Parse percentage strings
            columns[1] = $.map(columns[1], function (value) {
                if (value.indexOf('%') === value.length - 1) {
                    value = parseFloat(value);
                }
                return value;
            });

            $.each(columns[0], function (i, name) {
                var brand,
                    version;

                if (i > 0) {

                    // Remove special edition notes
                    name = name.split(' -')[0];

                    // Split into brand and version
                    version = name.match(/([0-9]+[\.0-9x]*)/);
                    if (version) {
                        version = version[0];
                    }
                    brand = name.replace(version, '');

                    // Create the main data
                    if (!brands[brand]) {
                        brands[brand] = columns[1][i];
                    } else {
                        brands[brand] += columns[1][i];
                    }

                    // Create the version data
                    if (version !== null) {
                        if (!versions[brand]) {
                            versions[brand] = [];
                        }
                        versions[brand].push(['v' + version, columns[1][i]]);
                    }
                }

            });

            $.each(brands, function (name, y) {
                brandsData.push({
                    name: name,
                    y: y,
                    drilldown: versions[name] ? name : null
                });
            });
            $.each(versions, function (key, value) {
                drilldownSeries.push({
                    name: key,
                    id: key,
                    data: value
                });
            });

            // Create the chart
            $('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Recuperacion de Cartera'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Totaaaaaaaal percent market share'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: brandsData
                }],
                drilldown: {
                    series: drilldownSeries
                }
            });
        }
    });
});

</script>
