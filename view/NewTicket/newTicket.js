function init(){
    $("#ticket_form").on("submit", function(e)
    {
        GuardaryEditar(e);
    });
}

$(document).ready(function() 
{
    $('#Descripcion_Ticket').summernote
    ({
        height:150
    });

    $.post("../../controller/CategoriasController.php?op=combo",function(data, status)
    {
        $('#CategoriaID').html(data);
    });
});

function GuardaryEditar(e)
{
    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);

    $.ajax({
        url:"../../controller/TicketsController.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos)
        {
            $("#Titulo_Ticket").val('');
            $("#Descripcion_Ticket").summernote('reset');
            swal("Correcto!", "Registro realizado con exito", "success");
        },
        error: function(datos)
        {
            console.log(datos);
        }
    });
}

init();