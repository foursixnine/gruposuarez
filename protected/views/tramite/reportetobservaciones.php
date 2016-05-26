
<?php 
$x=0;
if($reportetobservaciones!==null){

    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 
 

</head>
<table border="1">

    <tr>
        
       

<td colspan="7"  align="center">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE DE TRAMITES ACTIVIDADES</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
        

    <tr>
                <th>Nº de Lote</th>             
                <th>Nombre del Cliente</th>         
                <th>Nombre del Paso</th>  
                <th>Nº de Paso</th> 
                <th>Observaciones</th> 
                <th>Tramitador</th> 
                <th>Vendedor</th> 
    </tr>
    
    <?php foreach ($reportetobservaciones as $value) {
               
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['numero_de_lote'];?></td>
                <td><?php echo $value['nombre_de_empresa'];?>
                <td><?php echo $value['nompaso'];?></td> 
                <td><?php echo $value['abrev'];?></td> 
                <td><?php echo $value['observaciones']; ?></td>
                <td><?php echo $value['vendedor']; ?></td>
                <td><?php echo $value['tramitador']; ?></td>              
            </tr>
            
    <?php } ?>  



            </table>
    
<?php }?>