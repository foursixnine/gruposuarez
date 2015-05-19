<script>
$(document).ready(function(){
    $('#serial-monitor').hide(); // Como por defecto está seleccionada la opción 1, se ocultan los campos que tienen que ver con "Escritorio"
    $('#serial-cpu').hide();
    $("select[name='Computador\\[tipo\\]']").change(function(){
        if ($(this).val()=== '1') { // Muestra el campo de portatil y oculta los campos de escritorio.
            $('#serial').show(); 
            $('#serial-monitor').hide();
            $('#serial-cpu').hide();
        }
        if ($(this).val()=== '2') { // Muestra los campos de escritorio y oculta el de portatil
            $('serial-monitor').show();
            $('serial-cpu').show();
            $('#serial').show();
        }
    });
});

</script>