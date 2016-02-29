<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
<?php

if (empty($eneproy)) {
        $eneproy=0;
}

if (empty($febproy)) {
      $febproy=0;
}

if (empty($marproy)) {
    $marproy=0;
}

if (empty($abrilproy)) {
    $abrilproy=0;
}
if (empty($mayoproy)) {
      $mayoproy=0;
}
if (empty($junproy)) {
      $junproy=0;
}
if (empty($julproy)) {
      $julproy=0;
}
if (empty($agosproy)) {
      $agosproy=0;
}
if (empty($agosproy)) {
      $agosproy=0;
}
if (empty($sepproy)) {
      $sepproy=0;
}
if (empty($octproy)) {
      $octproy=0;
}
if (empty($novproy)) {
      $novproy=0;
}
if (empty($dicproy)) {
      $dicproy=0;
}
//////////////////////////////////////PG///////////////////////

if (empty($eneropgg)) {
        $eneropgg=0;
}

if (empty($febreropgg)) {
      $febreropgg=0;
}

if (empty($marzopgg)) {
    $marzopgg=0;
}

if (empty($abrilpgg)) {
    $abrilpgg=0;
}
if (empty($mayopgg)) {
      $mayopgg=0;
}
if (empty($juniopgg)) {
      $juniopgg=0;
}
if (empty($juliopgg)) {
      $juliopgg=0;
}
if (empty($agostopgg)) {
      $agostopgg=0;
}
if (empty($septiembrepgg)) {
      $septiembrepgg=0;
}
if (empty($octubrepgg)) {
      $octubrepgg=0;
}
if (empty($noviembrepgg)) {
      $noviembrepgg=0;
}

if (empty($diciembrepgg)) {
      $diciembrepgg=0;
}
?>   
var enero = <?php echo ($eneproy); ?>;
var febrero= <?php echo ($febproy); ?>;
var marzo= <?php echo ($marproy); ?>;
var abril= <?php echo ($abrilproy); ?>;
var mayo= <?php echo ($mayoproy); ?>;
var junio= <?php echo ($junproy); ?>;
var julio= <?php echo ($julproy); ?>;
var agosto= <?php echo ($agosproy); ?>;
var septiembre= <?php echo ($sepproy); ?>;
var octubre= <?php echo ($octproy); ?>;
var noviembre= <?php echo ($novproy); ?>;
var diciembre= <?php echo ($dicproy); ?>;


                 
var eneropg= <?php echo ($eneropgg); ?>;
var febreropg= <?php echo ($febreropgg); ?>;
var marzopg= <?php echo ($marzopgg); ?>;
var abrilpg = <?php echo ($abrilpgg); ?>;
var mayopg= <?php echo ($mayopgg); ?>;
var juniopg= <?php echo ($juniopgg); ?>;
var juliopg= <?php echo ($juliopgg); ?>;
var agostopg= <?php echo ($agostopgg); ?>;
var septiembrepg= <?php echo ($septiembrepgg); ?>;
var octubrepg= <?php echo ($octubrepgg); ?>;
var noviembrepg= <?php echo ($noviembrepgg); ?>;
var diciembrepg= <?php echo ($diciembrepgg); ?>;

       alert(juliopg);
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
                text: 'Cumplidooooooo'
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

