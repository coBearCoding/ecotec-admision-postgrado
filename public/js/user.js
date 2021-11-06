$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    view_table();

    $("#btn_guardar").click(function(e){
    	e.preventDefault();
    	var data = new $('#formulario').serialize();
        $('#exampleModal').modal('toggle');
        $.ajax({
            type: 'POST',
            url: '/usuarios/register',
            data: data,
            beforeSend: function () {
                Swal.fire({
                    title: '¡Espere, Por favor!',
                    html: 'Cargando informacion...',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    }
                }); 
            },
            success: function (data) {
                var d = JSON.parse(data);
                if (d['msg'] == 'error') {
                    toastr.error(d['data']);
                } else {
                    toastr.success(d['data']);
                    view_table();
                   // limpiar();
                }
            },
            error: function (xhr) { // if error occured
                toastr.error('Error: '+xhr.statusText + xhr.responseText);
            },
            complete: function () {
               swal.close();
            },
            dataType: 'html'
        });
    }); 

    $("#btn_guardar_edit").click(function(e){
    	e.preventDefault();
    	var data = new $('#formulario_edit').serialize();
        $('#editModal').modal('toggle');
        $.ajax({
            type: 'POST',
            url: '/usuarios/register',
            data: data,
            beforeSend: function () {
                Swal.fire({
                    title: '¡Espere, Por favor!',
                    html: 'Cargando informacion...',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    }
                }); 
            },
            success: function (data) {
                var d = JSON.parse(data);
                if (d['msg'] == 'error') {
                    toastr.error(d['data']);
                } else {
                    toastr.success(d['data']);
                    view_table();
                   // limpiar();
                }
            },
            error: function (xhr) { // if error occured
                toastr.error('Error: '+xhr.statusText + xhr.responseText);
            },
            complete: function () {
               swal.close();
            },
            dataType: 'html'
        });
    })
});

function editar(id,name,email){
    $('#editModal').modal('toggle');
    $("#id").val(id);
    $("#nombre_edit").val(name);
    $("#correo_edit").val(email);
}

function eliminar(data,name){
    $.confirm({
        title: 'Eliminar usuario!',
        content: '¿Desea eliminar el usuario usuario '+name+'?',
        buttons: {
            confirm: function () {
                $.ajax({
                    type: 'POST',
                    url: '/usuarios/delete',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "id": data
                    },
                    beforeSend: function () {
                        Swal.fire({
		                    title: '¡Espere, Por favor!',
		                    html: 'Cargando informacion...',
		                    allowOutsideClick: false,
		                    onBeforeOpen: () => {
		                        Swal.showLoading()
		                    }
		                }); 
                    },
                    success: function (d) {
                        if (d['msg'] == 'error') {
                            toastr.error(d['data']);
                        } else {
                            toastr.success(d['data']);
                            view_table();
                            limpiar();
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Error: '+xhr.statusText + xhr.responseText);
                    },
                    complete: function () {
                        $('#div_mensajes').addClass('d-none');
                    },
                });
            },
            cancel: function () {
                $.alert('Se ha cancelado la eliminación!');
            }
        }
    });
}

function view_table() {

    $.ajax({
        type: 'POST',
        url: '/usuarios/data',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
             Swal.fire({
	                title: '¡Espere, Por favor!',
	                html: 'Cargando informacion...',
	                allowOutsideClick: false,
	                onBeforeOpen: () => {
	                    Swal.showLoading()
	                }
	            });
        },
        success: function (data) {
            $('#div_tabla').html(data);
            $('#tbl_usuarios').DataTable({
            	//"dom":"lfrtip",
                "language": {
                	//"paginate":{previous:"<i class='fas fa-angle-left'>",next:"<i class='fas fa-angle-right'>"
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla =(",
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
                        "sNext": "<i class='fas fa-angle-right'>",
                        "sPrevious": "<i class='fas fa-angle-left'>"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                },
                "paging": true,
                "lengthChange": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "order": [[0, "desc"]]
            });
            // acciones();
            $("#tbl_usuarios_wrapper").find('div.row').first().addClass('p-4');
            $("#tbl_usuarios_wrapper").find('div.row').last().addClass('p-4');
        },
        error: function (xhr) { // if error occured
            toastr.error('Error: ' + xhr.statusText + xhr.responseText);
        },
        complete: function () {
             	swal.close()
        },
        dataType: 'html'
    });
}