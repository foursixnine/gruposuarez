<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
<?php

if (empty($eneproycobrador)) {
        $eneproycobrador=0;
}

if (empty($febproycobrador)) {
      $febproycobrador=0;
}

if (empty($marproycobrador)) {
    $marproycobrador=0;
}

if (empty($abrilproycobrador)) {
    $abrilproycobrador=0;
}
if (empty($mayoproycobrador)) { 
    
      $mayoproycobrador=0;
}
if (empty($junproycobrador)) {
      $junproycobrador=0;
}
if (empty($julproycobrador)) {
      $julproycobrador=0;
}
if (empty($agosproycobrador)) {
      $agosproycobrador=0;
}
if (empty($sepproycobrador)) {
      $sepproycobrador=0;
}
if (empty($octproycobrador)) {
      $octproycobrador=0;
}
if (empty($novproycobrador)) {
      $novproycobrador=0;
}
if (empty($dicproycobrador)) {
      $dicproycobrador=0;
}

//////////////////////////////////////PG///////////////////////

if (empty($eneropggcobrador)) {
        $eneropggcobrador=0;
}

if (empty($febreropggcobrador)) {
      $febreropggcobrador=0;
}

if (empty($marzopggcobrador)) {
    $marzopggcobrador=0;
}

if (empty($abrilpggcobrador)) {
    $abrilpggcobrador=0;
}
if (empty($mayopggcobrador)) {
      $mayopggcobrador=0;
}
if (empty($juniopggcobrador)) {
      $juniopggcobrador=0;
}
if (empty($juliopggcobrador)) {
      $juliopggcobrador=0;
}
if (empty($agostopggcobrador)) {
      $agostopggcobrador=0;
}
if (empty($septiembrepggcobrador)) {
      $septiembrepggcobrador=0;
}
if (empty($octubrepggcobrador)) {
      $octubrepggcobrador=0;
}
if (empty($noviembrepggcobrador)) {
      $noviembrepggcobrador=0;
}

if (empty($diciembrepggcobrador)) {
      $diciembrepggcobrador=0;
}
?>   
var enero = <?php echo ($eneproycobrador); ?>;
var febrero= <?php echo ($febproycobrador); ?>;
var marzo= <?php echo ($marproycobrador); ?>;
var abril= <?php echo ($abrilproycobrador); ?>;
var mayo= <?php echo ($mayoproycobrador); ?>;
var junio= <?php echo ($junproycobrador); ?>;
var julio= <?php echo ($julproycobrador); ?>;
var agosto= <?php echo ($agosproycobrador); ?>;
var septiembre= <?php echo ($sepproycobrador); ?>;
var octubre= <?php echo ($octproycobrador); ?>;
var noviembre= <?php echo ($novproycobrador); ?>;
var diciembre= <?php echo ($dicproycobrador); ?>;


                        
var eneropg= <?php echo ($eneropggcobrador); ?>;
var febreropg= <?php echo ($febreropggcobrador); ?>;
var marzopg= <?php echo ($marzopggcobrador); ?>;
var abrilpg = <?php echo ($abrilpggcobrador); ?>;
var mayopg= <?php echo ($mayopggcobrador); ?>;
var juniopg= <?php echo ($juniopggcobrador); ?>;
var juliopg= <?php echo ($juliopggcobrador); ?>;
var agostopg= <?php echo ($agosproycobrador); ?>;
var septiembrepg= <?php echo ($septiembrepggcobrador); ?>;
var octubrepg= <?php echo ($octubrepggcobrador); ?>;
var noviembrepg= <?php echo ($noviembrepggcobrador); ?>;
var diciembrepg= <?php echo ($diciembrepggcobrador); ?>;


</script>
<script>
    //alert(febreropg);

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
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiempre',
                'Octubre',
                'Noviembre',
                'Diciembre',
            ]
        },
        yAxis: [{
            min: 0,
            title: {
                text: 'Cumplido Cobradora'
            }
        }, {
            title: {
                text: 'Esperado'
            },
            opposite: true
        }],
        legend: {
            shadow: true
        },
        tooltip: {
            shared: true
        },
        plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 0,
            }
        },
        series: [ {
            name: 'Cumplido',
            color: 'rgba(248,161,63,1)',
            data: [enero, febrero, marzo,abril,mayo, junio, julio,agosto,septiembre,octubre,noviembre,diciembre],
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
            data: [eneropg, febreropg, marzopg,abrilpg,mayopg, juniopg, juliopg,agostopg,septiembrepg,octubrepg,noviembrepg,diciembrepg],
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

