
<?php 
$x=0;

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
        <th>PROYECTO</th>
        <th>NUMERO DE PROPIEDAD</th>
        <th>EXPEDIENTE FISICO</th>
        <th>TRAMITADOR</th> 
        <th>VENDEDOR</th>
        <th>NOMBRE DEL CLIENTE</th>  
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
 
    </tr>
    
    <?php 
 // foreach ($tramite as $key) {
    //foreach ($data as $value) {
     foreach($issueDataProvider->getData(true) as $queryData)
        {
   ///***************///
                   
              $nom = $queryData->idClienteGs->nombre_de_empresa;
              $proyecto = $queryData->idClienteGs->proyecto;
              $lote =$queryData->idClienteGs->numero_de_lote;

              $total_venta =  $queryData->idClienteGs->total_venta;
              $monto_liquidacion =  $queryData->idClienteGs->monto_liquidacion;
              $banco_acreedor =  $queryData->idClienteGs->banco_acreedor;
              $fecha_inicio =  $queryData->fecha_inicio;
              $fecha_actualizacion =  $queryData->fecha_actualizacion;
              $fecha_paso =  $queryData->fecha_paso;
              $id_tramite =  $queryData->id_tramite;
              $plano =  $queryData->idTramite->plano;
              $fecha_entrega = $queryData->idTramite->fecha_entrega; 
              $ganancia_capital = $queryData->idTramite->ganancia_capital;   
              $fecha_escritura = $queryData->idTramite->fecha_escritura;   
              $fecha_inscripcion_escritura = $queryData->idTramite->fecha_inscripcion_escritura;   
              $num_escritura = $queryData->idTramite->num_escritura;    
              $num_finca_inscrita = $queryData->idTramite->num_finca_inscrita;   
              $transferencia_inmueble = $queryData->idTramite->transferencia_inmueble;    
              $num_permiso_ocupacion = $queryData->idTramite->num_permiso_ocupacion;  
              $fecha_de_permiso_ocupacion = $queryData->idClienteGs->fecha_de_permiso_ocupacion;  
              $id_paso = $queryData->idPaso->descripcion; 
              $id_expediente_fisico = $queryData->idExpedienteFisico->descripcion; 
              $num_formulario = $queryData->idTramite->num_formulario;
              $id_tipo_responsable = $queryData->idPaso->abrev;  
              $fecha_de_permiso_contruccion =$queryData->idClienteGs->fecha_de_permiso_contruccion;
              $vendedor =$queryData->idClienteGs->vendedor;
              $confeccion_protocolo =$queryData->idClienteGs->confeccion_protocolo;
              $agente_tramite =$queryData->idClienteGs->agente_tramite;
      /****************************/
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $proyecto; ?></td>
                <td><?php echo $lote; ?></td>
                <td><?php echo $id_expediente_fisico; ?></td>
                <td><?php echo $agente_tramite;?></td> 
                
                <td><?php echo $vendedor; ?></td>
                <td><?php echo $nom; ?></td>
              
                <td><?php echo $total_venta;?></td>
                <td><?php echo $monto_liquidacion;?></td>
                <td><?php if($banco_acreedor=="S/DESCRIPCION"){
                            echo "DE CONTADO"; 
                }else{
                             echo $banco_acreedor; 
                }

                    ?></td>    
               <td><?php echo $id_tipo_responsable;?></td>      
               <td><?php echo $id_paso;?></td>  
               <td><?php echo $fecha_inicio;?></td> 
               <td><?php echo $fecha_actualizacion;?></td>  
               <td><?php echo $fecha_paso;?></td>         
               <td><?php echo $plano;?></td>
               <td><?php echo $fecha_entrega;?></td>
               <td><?php echo $ganancia_capital;?></td>
               <td><?php echo $fecha_escritura;?></td>
               <td><?php echo $fecha_inscripcion_escritura;?></td>
               <td><?php echo $num_escritura; ?></td>
               <td><?php echo $num_finca_inscrita; ?></td>
               <td><?php echo $transferencia_inmueble; ?></td>
               <td><?php echo $num_permiso_ocupacion; ?></td>
               <td><?php echo $num_formulario; ?></td>
               <td><?php echo $fecha_de_permiso_ocupacion;?></td>
               <td><?php echo $fecha_de_permiso_contruccion;?></td>
                 
            </tr>
    <?php } ?>  
</table>


