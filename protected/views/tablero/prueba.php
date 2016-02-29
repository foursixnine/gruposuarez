<style type="text/css">

@font-face {

font-family: prueba;

src: url(fonts/osaka_sans_serif/osakare.ttf) format('truetype');

}
h1.prueba{
    color: red;
        font-family:prueba;
}
</style>

<h1 class="prueba">PRUEBA HOLA COMO ESTAS</h1>
<a href="fonts/osaka_sans_serif/osakare.ttf">HOLA COMO ESTAS</a>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

    include ("dbpmysql.php");
    include ("dbp.php");
//var_dump(conexionmysql());die;
    $sqlmysql = "SELECT * from customers_view";
    $resultado =  mysqli_query(conexionmysql(),$sqlmysql);
                
    while($row = $resultado->fetch_assoc()) {

            echo $nombre_de_empresa=$row["NOMBRE_DE_EMPRESA"];
            echo $nombre=$row["NOMBRE"];
            echo $apellido=$row["APELLIDO"];
            echo $status=$row["STATUS"];
            echo $proyecto=$row["PROYECTO"];      
            echo $num_de_lote=$row["NUMERO_DE_LOTE"];
            echo $id_cliente=$row["ID_CLIENTE"];
            echo $id_proyecto=$row["ID_PROYECTO"];
            echo $numero_celular=$row["NUMERO_CELULAR"];
            echo $numero_casa=$row["NUMERO_CASA"];
            echo $numero_adicional=$row["NUMERO_ADICIONAL"];
            echo $correo=$row["CORREO"];
            echo $cedula=$row["CEDULA"];
            echo $lugar_trabajo=$row["LUGAR_TRABAJO"];
            echo $ocupacion=$row["OCUPACION"];
            echo $sexo=$row["SEXO"];
            echo $nacionalidad=$row["NACIONALIDAD"];
            echo $referencia_1=$row["REFERENCIA_1"];
            echo $referencia_2=$row["REFERENCIA_2"];
            echo $telefono_ref_1=$row["TELEFONO_REF_1"];
            echo $telefono_ref_2=$row["TELEFONO_REF_2"];
            echo $referencia_1=$row["RELACION_REF_1"];
            echo $referencia_2=$row["RELACION_REF_2"];
            echo $id_de_reason=$row["ID_DE_REASON"];
            echo $vendedor=$row["VENDEDOR"];
            echo $id_vendedor=$row["ID_VENDEDOR"];
            echo $banco_acreedor=$row["BANCO_ACREEDOR"];
            echo $id_banco=$row["ID_BANCO"];
            echo $banco_interino=$row["BANCO_INTERINO"];
            echo $status_de_lote=$row["STATUS_DE_LOTE"];
            echo $direccion=$row["DIRECCION"];
            echo $motivo_del_pago=$row["MOTIVO_DEL_PAGO"];
            echo $fecha_de_carta_promesa=$row["FECHA_DE_CARTA_PROMESA"];

            echo $sql ="INSERT INTO cliente (
                        nombre_de_empresa, nombre, apellido, status, proyecto, 
                        numero_de_lote, id_cliente, id_proyecto, numero_celular, numero_casa, 
                        numero_adicional, correo, cedula, lugar_trabajo, ocupacion, sexo, 
                        nacionalidad, referencia_1, referencia_2, telefono_ref_1, telefono_ref_2, 
                        relacion_ref_1, relacion_ref_2, id_de_reason, vendedor, id_vendedor, 
                        banco_acreedor, id_banco, banco_interino, status_de_lote, direccion, 
                        motivo_del_pago, forma_de_pago, cantidad_de_quotas, cantidad_de_quotas_mejoras, 
                        tipo_de_cliente, estado_civil, status_plan_pago, monto_ultimo_pago, 
                        cartera_corriente, cartera_30_dias, cartera_60_dias, cartera_90_dias, 
                        cartera_120_dias, total_vencido, monto_abono, monto_liquidacion, 
                        total_venta, monto_quota_abono, gasto_legal, total, monto_mejoras, 
                        monto_cuota_mejoras, fecha_de_pago_abono, fecha_ultimo_pago, 
                        fecha_de_entrega, fecha_de_permiso_contruccion, fecha_de_permiso_bomberos, 
                        fecha_de_permiso_ocupacion, fecha_de_carta_promesa)


      VALUES ($nombre_de_empresa,
             $nombre,
             $apellido,
             $status,
             $proyecto,
             $apellido,
             $id_cliente,
             $id_proyecto,
             $numero_celular,
             $numero_casa,
             $numero_adicional,
             $correo,
             $cedula,
             $lugar_trabajo,
             $ocupacion,
             $sexo,
             $nacionalidad,
             $referencia_1,
             $referencia_2,
             $telefono_ref_1,
             $telefono_ref_2,
             $referencia_1,
             $referencia_2,
             $id_de_reason,
             $vendedor,
             $id_vendedor,
             $banco_acreedor,
             $id_banco,
             $banco_interino,
             $status_de_lote,
             $direccion,
             $motivo_del_pago,
             $fecha_de_carta_promesa)";

}

?>


  VALUES ( .'$nombre_de_empresa'. , $row["NOMBRE"])";