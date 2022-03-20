function init()
{

};

var tabla;

$(document).ready(function()
{
    tabla=$("#ticket_data").dataTable({
        "aProcessing":true,
        "aServerSide":true,
        dom:'Bfrtip',
        "searching":true,
        lengthChange:false,
        colReorder:true,
        buttons:
        [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax":
        {
            url:"../../controller/TicketsController.php?op=listar_x_usuarios",
            type:"post",
            dataType:"json",
            data:{UsuarioID : 1},
            error:function(e)
            {
                console.log(e.responseText);
            }
        },
        "ordering":true,
        "bDestroy":true,
        "responsive":true,
        "bInfo":true,
        "iDisplayLength":10,
        "autoWidth":false,
        "language":
        {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningun dato disponible en esta tabla",
            "sInfo": "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando....",
            "oPaginate":
            {
                "sFirst": "Primero",
                "sLast": "Ultimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria":
            {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();
});

function ver(TicketID)
{
    console.log(TicketID);
}

init();