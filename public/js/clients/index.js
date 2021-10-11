$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table;

$(document).ready(function() {

    table = $('#clients-table').DataTable({
        'ajax': {
          'url': "/getClients",
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
                  '<a href="/clientes/'+data+'"      class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>'+
                  '<a href="/clientes/'+data+'/edit" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-edit"     aria-hidden="true"></span></a>'+
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
                data: "lastname",
                "render": function(data, type, row) {
                    return data ? data : '-';
                }
            },
            {
                data: "email",
                "render": function(data, type, row) {
                    return data ? data : '-';
                }
            },
            {
                data: "phone",
                "render": function(data, type, row) {
                    return data ? data : '-';
                }
            },
            {
                data: "address",
                "render": function(data, type, row) {
                    return data ? data : '-';
                }
            },
            {
                data: "year_birth",
                "render": function(data, type, row) {
                    return data ? data : '-';
                }
            },
            {
                data: "year_died",
                "render": function(data, type, row) {
                    return data ? data : '-';
                }
            },
            {
                data: "deleted_at",
                "render": function(data, type, row) {
                     return data ?
                     '<a  onclick="estatusUpload('+row.id+')" class="btn btn-xs btn-danger" ><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span></a>' :
                     '<a  onclick="estatusUpload('+row.id+')" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></a>' ;

                }
            },

        ]

    });
});

function estatusUpload(id) {

    $.ajax({
        url: "/statusClient", //ESTO VARIA
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
