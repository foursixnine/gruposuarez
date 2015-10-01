
<?php 
$x=0;
if($data!==null){

    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 


</head>
<table border="1">

    <tr>
        
       

<td colspan="9" color="">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE DE LIQUIDACION</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
    
    <tr>
        <th>NOMBRE DE EMPRESA</th>
        <th>PROYECTO</th>
        <th>NUM DE PROPIEDAD</th>  
        <th>TOTAL VENTA</th>
        <th>MOTO LIQUIDACION</th>
        <th>BANCO ACRREDOR</th>
        <th>FECHA PASO</th>        
        <th>FECHA DE PERMISO DE CONSTRUCCION</th>        

        

        
    </tr>
    
    <?php foreach ($data as $value) {
   
        
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['nombre_de_empresa'];?></td>
                <td><?php echo $value['proyecto']; ?></td>
                <td><?php echo $value['numero_de_lote']; ?></td>
                <td><?php echo $value['total_venta'];?></td>
                <td><?php echo $value['monto_liquidacion'];?></td>
                <td><?php echo $value['banco_acreedor']; ?></td>               
                <td><?php echo $value['fecha_paso'];?></td>
               
             
                
            </tr>
    <?php } ?>  
</table>
    
<?php }?>

