$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table;

$(document).ready(function() {

    table = $('#employee-table').DataTable({
        'ajax': {
          'url': "/getEmpleados",
          'type': "POST",
        },
        'language': {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
          }
        },
        'columns': [
            {
                data: "id",
                "render": function (data, type, row) {
                  return '<div class="btn-group">'+
                  '<a href="/empleados/'+data+'/edit" class="btn btn-xs btn-primary"> Editar </a>'+
                  '</div>';
                }
            },
            {
                data: "name",
                "render": function(data, type, row) {
                    return data ? data : '-';
                }
            },

            {
                data: "email",
                "render": function(data, type, row) {
                    return data ? data : '-';
                }
            }
        ]

    });
});

function estatusUpload(id) {

    $.ajax({
        url: "/statusEmpleados", //ESTO VARIA
        type: "post",
        data: {
            id: id
        },
        beforeSend: function() {},
    }).done(function(d) {
        if (d.object == 'success') {
            table.ajax.reload();
        }
    }).fail(function() {
        alert("Ha ocurrido un error en la operación");
    }).always(function() {});
}
