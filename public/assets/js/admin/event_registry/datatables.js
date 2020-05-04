$(document).ready(function () {

    var tableCompanyKit = $('#datatable_event_registry').DataTable({

        dom: "<'row'<'col-sm-12 col-md-4' l><'col-sm-12 col-md-4' f><'col-sm-12 col-md-4 mt-3' B>>" +
                'tr' +
                "<'row'<'col-sm-12 col-md-5' i><'col-sm-12 col-md-7' p>>",
        buttons: [{
                extend: 'excelHtml5'
                
                /*exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11]
                }*/
            }],
        //ordering: false,
        "order": [[3, 'asc']],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
});