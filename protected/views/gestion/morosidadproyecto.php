
<?php 
$x=0;
if($proyectomorosos!==null){
$sumc=0;
$sum30=0;
$sum60=0;
$sum90=0;
$sum120=0;
$sumtv=0;
    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 
 

</head>
<table border="1">

    <tr>
        
       

<td colspan="7"  align="center">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE DE GESTION</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
    
    <tr>
                <th>PROYECTO</th>  
                <th>TOTAL VENCIDO</th>
                <th>CARTERA 30</th>
                <th>CARTERA 60</th>
                <th>CARTERA 90</th>        
                <th>CARTERA 120</th>
                <th>CARTERA CORRIENTE</th>  
    </tr>
    
    <?php foreach ($proyectomorosos as $value) {
                $sumc+=$value['cartera_corriente'];
                $sum30+=$value['treinta'];
                $sum60+=$value['sesenta'];
                $sum90+=$value['noventa'];
                $sum120+=$value['cientoveinte'];
                $sumtv+=$value['suma'];
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['titulo'];?></td>
                <td><?php echo $value['suma'];?></td> 
                <td><?php echo $value['treinta']; ?></td>
                <td><?php echo $value['sesenta']; ?></td>
                <td><?php echo $value['noventa']; ?></td>
                <td><?php echo $value['cientoveinte'];?></td>
                <td><?php echo $value['cartera_corriente'];?></td>
                
            </tr>
            
    <?php } ?>  

            <tr>
                <td colspan="6" align="right"><b>TOTAL VENCIDO</b></td>
                <td><?php echo $sumtv; ?></td>
            </tr>


            <tr>
                <td colspan="6" align="right"><b>CARTERA 30</b></td>
                <td><?php echo $sum30; ?></td>
            </tr>


            <tr>
                <td colspan="6" align="right"><b>CARTERA 6O</b></td>
                <td><?php echo $sum60; ?></td>
            </tr>

            <tr>
                <td colspan="6" align="right"><b>CARTERA 9O</b></td>
                <td><?php echo $sum90; ?></td>
            </tr>  

            <tr>
                <td colspan="6" align="right"><b>CARTERA 12O</b></td>
                <td><?php echo $sum120; ?></td>
            </tr>

            <tr>
                <td colspan="6" align="right"><b>TOTAL CORRIENTE</b></td>
                <td><?php echo $sumc; ?></td>
            </tr> 

            </table>
    
<?php }?>