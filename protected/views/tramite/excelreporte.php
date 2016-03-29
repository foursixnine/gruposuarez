
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
        <th>NOMBRE DEL CLIENTE</th>
        <th>EXPEDIENTE FISICO</th>
        <th>VENDEDOR</th>
        <th>PROYECTO</th>
        <th>NUMERO DE PROPIEDAD</th>  
        <th>PRECIO TOTAL VENTA</th>
        <th>PRECIO HIPOTECA</th>
        <th>BANCO HIPOTECARIO</th>
        <th>N° DE PASO</th> 
        <th>NOMBRE DEL PASO</th> 
        <th>FECHA DE INICIO DEL TRAMITE</th> 
        <th>FECHA DE ULTIMA MODIFICACION</th> 
        <th>FECHA DE CIERRE PASO</th>        
        <th>N° PLANO</th>        
        <th>FECHA DE ENTREGA</th>        
        <th>GANANCIA DE CAPITAL</th>        
        <th>FECHA DE ESCRITURA</th>     
        <th>FECHA DE INSCRIPCION ESCRITURA</th>
        <th>N° DE ESCRITURA</th>
        <th>N° DE FINCA INSCRITA - UBICACIÓN</th>
        <th>TRANSFERENCIA INMUEBLE</th>
        <th>N° PERMISO DE OCUPACIÓN</th>
        <th>N° DE FORMULARIO</th>        
        <th>FECHA DE PERMISO DE OCUPACIÓN</th>        
        <th>FECHA DE PERMISO DE CONSTRUCCION</th>  
        <th>TRAMITADOR</th>  
        
    </tr>
    
    <?php foreach ($data as $value) {
   
        
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['nombre_de_empresa'];?></td>
                <td><?php echo $value['id_expediente_fisico']; ?></td>
                <td><?php echo $value['vendedor']; ?></td>
                <td><?php echo $value['proyecto']; ?></td>
                
                <td><?php echo $value['numero_de_lote']; ?></td>
    
                 <td>$<?php echo $value['total_venta'];?></td>
                <td>$<?php echo $value['monto_liquidacion'];?></td>
                <td><?php if($value['banco_acreedor']=="S/DESCRIPCION"){
                            echo "DE CONTADO"; 
                }else{
                             echo $value['banco_acreedor']; 
                }

                    ?></td>    
               <td><?php echo $value['id_tipo_responsable'];?></td>      
               <td><?php echo $value['id_pasos'];?></td>  
               <td><?php echo $value['fecha_inicio'];?></td> 
               <td><?php echo $value['fecha_actualizacion'];?></td>  
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
               <td><?php echo $value['num_formulario'];?></td>
               <td><?php echo $value['fecha_de_permiso_ocupacion'];?></td>
               <td><?php echo $value['fecha_de_permiso_contruccion'];?></td>
               <td><?php echo $value['agente_tramite'];?></td>
               
             


                
            </tr>
    <?php } ?>  
</table>
    
<?php }?>

