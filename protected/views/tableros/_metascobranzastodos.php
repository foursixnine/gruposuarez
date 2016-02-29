<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<?php
if (empty($septiembre)) {
      $septiembre=0;
}

if (empty($eneropg)) {
      $eneropg=0;
}

if (empty($febreropg)) {
      $febreropg=0;
}

if (empty($marzopg)) {
      $marzopg=0;
}
if (empty($abrilpg)) {
      $abrilpg=0;
}
if (empty($mayopg)) {
      $mayopg=0;
}

if (empty($juniopg)) {
      $juniopg=0;
}
if (empty($juliopg)) {
      $juliopg=0;
}

if (empty($agostopg)) {
      $agostopg=0;
}

if (empty($septiembrepg)) {
      $septiembrepg=0;
}

if (empty($octubrepg)) {
      $octubrepg=0;
}

if (empty($noviembrepg)) {
      $noviembrepg=0;
}

if (empty($diciembrepg)) {
      $diciembrepg=0;
}
?>
<script>
//**************ENERO*****/////////
var enero = <?php echo ($enero); ?>;
if (enero == "") {
    enero= 0;
    alert(enero);
} 
//**************FEBRERO************//
var febrero = <?php echo ($febrero); ?>;
if (febrero == "") {
    febrero= 0;
}
//**************MARZO************//
var marzo = <?php echo ($marzo); ?>;
if (marzo == "") {
    marzo= 0;
} 
//**************ABRIL************//
var abril = <?php echo ($abril); ?>;
if (abril == "") {
    abril= 0;
}
//**************mayo************//
var mayo = <?php echo ($mayo); ?>;
if (mayo == "") {
    mayo= 0;
}
//**************junio************//
var junio = <?php echo ($junio); ?>;
if (junio == "") {
    junio= 0;
}
//**************junio************//
var julio = <?php echo ($julio); ?>;
if (julio == "") {
    julio= 0;
}
//**************agosto************//
var agosto = <?php echo ($agosto); ?>;
if (agosto == "") {
    agosto= 0;
}
//**************septiembre************//

var septiembre = <?php echo ($septiembre); ?>;
if (septiembre == "") {
    septiembre= 0;
}

var octubre= 0;
var noviembre= 0;
var diciembre= 0;

//**************ENERO*****/////////
var eneropg = <?php echo ($eneropg); ?>;
if (eneropg == "") {
    eneropg= 0;
} 
//**************FEBRERO************//
var febreropg = <?php echo ($febreropg); ?>;
if (febreropg == "") {
    febreropg= 0;
}
//**************MARZO************//
var marzopg = <?php echo ($marzopg); ?>;
if (marzopg == "") {
    marzopg= 0;
} 
//**************ABRIL************//
var abrilpg = <?php echo ($abrilpg); ?>;
if (abrilpg == "") {
    abrilpg= 0;
}
//**************mayo************//
var mayopg = <?php echo ($mayopg); ?>;
if (mayopg == "") {
    mayopg= 0;
}
//**************junio************//
var juniopg = <?php echo ($juniopg); ?>;
if (juniopg == "") {
    juniopg= 0;
}
//**************julio************//
var juliopg = <?php echo ($juliopg); ?>;
if (juliopg == "") {
    juliopg= 0;
}
//**************agosto************//
var agostopg = <?php echo ($agostopg); ?>;
if (agostopg == "") {
    agostopg= 0;
}
//**************septiembre************//

var septiembrepg = <?php echo ($septiembrepg); ?>;
if (septiembrepg == "") {
    septiembrepg= 0;
}
var octubrepg = <?php echo ($octubrepg); ?>;
if (octubrepg == "") {
    octubrepg= 0;
}
var noviembrepg = <?php echo ($noviembrepg); ?>;
if (noviembrepg == "") {
    noviembrepg= 0;
}

var diciembrepg = <?php echo ($diciembrepg); ?>;
if (diciembrepg == "") {
    diciembrepg= 0;
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
                text: 'Cumplido'
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

