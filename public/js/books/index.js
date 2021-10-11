$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table;
var auxData;

$(document).ready(function() {

  table = $('#books-table').DataTable({
      'ajax': {
          'url': "/getLibros",
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
      'columns': [{
              data: "id",
              "render": function(data, type, row) {
                  return '<div class="btn-group">' +
                      '<a href="/libros/' + data + '/edit" class="btn btn-xs btn-primary"> Editar </a>' +
                      '</div>';
              }
          },
          {
              data: "id",
              "render": function(data, type, row) {
                  return data ? zfill(data, 6) : '-';
              }
          },
          {
              data: "title",
              "render": function(data, type, row) {
                  return data ? data : '-';
              }
          },
          {
              data: "editor",
              "render": function(data, type, row) {
                  return data ? data : '-';
              }
          },
          {
              data: "date_publish",
              "render": function(data, type, row) {
                  return data ? data : '-';
              }
          },
          {
              data: "price_min",
              "render": function(data, type, row) {
                  return data ? data : '-';
              }
          },
          {
              data: "price",
              "render": function(data, type, row) {
                  return data ? data : '-';
              }
          },
          {
              data: "average",
              "render": function(data, type, row) {
                  return data ? data : '-';
              }
          },
          {
              data: "description",
              "render": function(data, type, row) {
                  return data ? data : '-';
              }
          },
          {
              data: "authors",
              "render": function(data, type, row) {
                  return data ? '<a  onclick="verAuthor(' + row.id + ')" class="btn btn-xs btn-primary" >Ver</a>' : '-';

              }
          },
          {
              data: "get_user",
              "render": function(data, type, row) {
                  return data ? data.name : '-';
              }
          },
          {
              data: "deleted_at",
              "render": function(data, type, row) {
                  return data ?
                      '<a  onclick="estatusUpload(' + row.id + ')" class="btn btn-xs btn-danger" >Inactivo</a>' :
                      '<a  onclick="estatusUpload(' + row.id + ')" class="btn btn-xs btn-success">Activo</a>';

              }
          },

      ]

  });


});


function zfill(number, width) {
    var numberOutput = Math.abs(number); /* Valor absoluto del número */
    var length = number.toString().length; /* Largo del número */
    var zero = "0"; /* String de cero */

    if (width <= length) {
        if (number < 0) {
             return ("-" + numberOutput.toString());
        } else {
             return numberOutput.toString();
        }
    } else {
        if (number < 0) {
            return ("-" + (zero.repeat(width - length)) + numberOutput.toString());
        } else {
            return ((zero.repeat(width - length)) + numberOutput.toString());
        }
    }
}


function verAuthor(id) {
  $('#list').modal('show');
  alert("kjhg");

  // $.ajax({
  //     url: "/getAuthor", //ESTO VARIA
  //     type: "post",
  //     data: {
  //         id: id
  //     },
  //     beforeSend: function() {},
  // }).done(function(d) {
  //     if (d.data) {
  //
  //       $('#DescModal').modal('show');
  //     }
  // }).fail(function() {
  //     alert("Ha ocurrido un error en la operación");
  // }).always(function() {});

}

function estatusUpload(id) {

    $.ajax({
        url: "/statusLibros", //ESTO VARIA
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
