
<?php 
$x=0;
if($data!==null){

    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 


</head>
<table border="1">

    <tr>
        
       

<td colspan="15" color="">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE</STRONG></div>
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
        <th>PLANO</th>        
        <th>FECHA DE ENTREGA</th>        
        <th>GANANCIA DE CAPITAL</th>        
        <th>FECHA DE ESCRITURA</th>     
        <th>FECHA DE INSCRIPCION ESCRITURA</th>
        <th>NUM DE ESCRITURA</th>
        <th>NUM FINCA ESCRITURA</th>
        <th>TRANSFERENCIA INMUEBLE</th>
        <th>NUM PERMISO DE OCUPACIÓN</th>        
    </tr>
    
    <?php foreach ($data as $value) {
   
        
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['nombre_de_empresa'];?></td>
                <td><?php echo $value['proyecto']; ?></td>
                <td><?php echo $value['numero_de_lote']; ?></td>
    
                 <td>$<?php echo number_format($value['total_venta'], 2, ',', ' ');?></td>
                <td>$<?php echo number_format($value['monto_liquidacion'], 2, ',', ' ');?></td>
                <td><?php if($value['banco_acreedor']=="S/DESCRIPCION"){
                            echo "DE CONTADO"; 
                }else{
                             echo $value['banco_acreedor']; 
                }

                    ?></td>               
                <td><?php echo $value['fecha_paso'];?></td>
                <td><?php echo $value['plano'];?></td>
               <td><?php echo $value['fecha_entrega'];?></td>
               <td><?php echo $value['ganancia_capital'];?></td>
               <td><?php echo $value['fecha_escritura'];?></td>
               <td><?php echo $value['fecha_inscripcion_escritura'];?></td>
               <td><?php echo $value['num_escritura'];?></td>
               <td><?php echo $value['num_finca_inscrita'];?></td>
               <td><?php echo $value['transferencia_inmueble'];?></td>
               <td><?php echo $value['num_permiso_ocupacion'];?></td>

             


                
            </tr>
    <?php } ?>  
</table>
    
<?php }?>

