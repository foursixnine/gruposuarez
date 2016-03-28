
<?php 
$x=0;
if($reportepasos!==null){

    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 
 

</head>
<table border="1">

    <tr>
        
       

<td colspan="5"  align="center">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE DE LIQUIDACION</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
    
    <tr>
                <th>PROYECTO</th>  
                <th>MES</th>
                <th>N° de LOTE</th>  
                <th>PRECIO TOTAL DE VENTA</th>  
                <th>PRECIO MONTO LIQUIDACION</th>  
    </tr>
    
    <?php foreach ($reportepasos as $value) {
               
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['titulo'];?></td>
                <td><?php echo $value['mes'];?></td> 
                <td><?php echo $value['lote'];?></td> 
                <td>$<?php echo number_format($value['totalventa'], 2, ',', ' '); ?></td>
                <td>$<?php echo number_format($value['totalliquidado'], 2, ',', ' '); ?></td>
            </tr>
            
    <?php } ?>  



            </table>
    
<?php }?>