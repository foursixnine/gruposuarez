
<?php 
$x=0;
if($reporteclientesretirados!==null){

    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 


</head>
<table border="1">

    <tr>
        
       

<td colspan="15" color="">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE STATUS ACTUAL</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
    
    <tr>
        <th>PROYECTO</th>
        <th>NUMERO DE PROPIEDAD</th>  
      
        <th>TRAMITADOR</th> 
        <th>VENDEDOR</th>
        <th>NOMBRE DEL CLIENTE</th>
        
        
        
        
        <th>PRECIO TOTAL VENTA</th>
        <th>PRECIO HIPOTECA</th>
        <th>BANCO HIPOTECARIO</th>
      >  
        
        
    </tr>
    
    <?php foreach ($reporteclientesretirados as $value) {
   
        
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['proyecto']; ?></td>
                <td><?php echo $value['numero_de_lote']; ?></td>
              
                <td><?php echo $value['agente_tramite'];?></td>
                <td><?php echo $value['vendedor']; ?></td>
                <td><?php echo $value['nombre_de_empresa'];?></td>              
                <td><?php echo $value['total_venta'];?></td>
                <td><?php echo $value['monto_liquidacion'];?></td>
                <td><?php if($value['banco_acreedor']=="S/DESCRIPCION"){
                            echo "DE CONTADO"; 
                }else{
                             echo $value['banco_acreedor']; 
                }
                    ?></td>    
           
       
              
               
             


                
            </tr>
    <?php } ?>  
</table>
    
<?php }?>

