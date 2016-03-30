
<?php 
$x=0;
if($reportebancos!==null){

    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 
 

</head>
<table border="1">

    <tr>
        
       

<td colspan="5"  align="center">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE DE BANCOS</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
        total  Monto de Precio de Venta total

    <tr>
                <th>Banco</th>  
                <th>Nº de Paso</th> 
                <th>Nombre del Paso</th> 
                <th>Cantidad Total de Tramites</th>
                <th>Monto de Liquidacion</th>  
                <th>Monto de Precio de Venta</th> 
    </tr>
    
    <?php foreach ($reportebancos as $value) {
               
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['descripcion'];?></td>
                <td><?php echo $value['abrev'];?>
                <td><?php echo $value['nompaso'];?></td> 
                <td><?php echo $value['totalpaso'];?></td> 
                <td>$<?php echo number_format($value['montoliquidacion'], 2, ',', ' '); ?></td>
                <td>$<?php echo number_format($value['totalventa'], 2, ',', ' '); ?></td>
            </tr>
            
    <?php } ?>  



            </table>
    
<?php }?>