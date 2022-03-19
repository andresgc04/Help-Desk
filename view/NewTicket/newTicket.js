$(document).ready(function() {
    $('#ticket_Descripcion').summernote
    ({
        height:150
    });

    $.post("../../controller/CategoriasController.php?op=combo",function(data, status){
        $('#CategoriaId').html(data);
    });
});