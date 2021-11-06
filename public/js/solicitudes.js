$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var start = moment();
    var end = moment();

    function cb(start, end) {
        $('#fecha span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $("#fecha_ini").val(start.format('YYYY-MM-DD'));
        $("#fecha_fin").val(end.format('YYYY-MM-DD'));
    }

    $("#estado").change(function(){
        $("#estado_export").val($(this).val())
    })



    $('#fecha').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
            'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],
            'Anterior Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

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

     $("#actualizarEstado").click(function(e){

        e.preventDefault();

        if ($("#estado_edit").val()=="" || $("#estado_edit").val()==null) {
            return toastr.warning("Debe seleccionar un estado");
        }
        var data = $('#form_estado').serialize();

        $.ajax({
            type: 'POST',
            url: '/solicitudes/estado',
            data: data,
            beforeSend: function() {
                //
                Swal.fire({
                    title: '¡Espere, Por favor!',
                    html: 'Cargando informacion...',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    }
                }); 
            },
            success: function(data) {
                Swal.close();
                $('#estadoModal').modal('toggle');
                console.log(data)
                var d = JSON.parse(data);
                if (d['msg'] == 'error') {
                    toastr.error(d['data']);
                } else {
                    toastr.success(d['data']);
                   // view_table();
                    $("#tbl_solicitudes").DataTable().ajax.reload();
                   // clear_data();
                }
            },
            error: function(xhr) { // if error occured
                toastr.error('Error: '+xhr.statusText + xhr.responseText);
            },
            complete: function() {
                Swal.close();
            },
            dataType: 'html'
        });
    });
});
function busquedaTable(){
    $("#tbl_solicitudes").DataTable().ajax.reload();
}

function historial(id,codigo) {
    $('#title_historial').html("Solicitud N°"+codigo);
    $.ajax({
            type: 'POST',
            url: '/solicitudes/historial',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "id_solicitud":id
            },
            beforeSend: function() {
                $('#div_mensajes').removeClass('d-none');
                $('#div_mensajes').addClass('text-center');
                $('#mensajes').html('<img src="../images/load.gif" width="10%" height="10%" />');
            },
            success: function(data) {
                $('#historial').html(data);
                /*$('#tbl_historial').DataTable({
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    },
                    "paging": true,
                    "lengthChange": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                });*/
               
            },
            error: function(xhr) { // if error occured
                toastr.error('Error: '+xhr.statusText + xhr.responseText);
            },
            complete: function() {
                $('#div_mensajes').addClass('d-none');
            },
            dataType: 'html'
        });
}

function editar(id,name,email){
	console.log(12)
    //$('#EditModal').modal('toggle');
    $('#editModal').modal('toggle');
    $("#id").val(id);
    $("#nombre_edit").val(name);
    $("#correo_edit").val(email);
}

function estado(id,codigo){
    $("#id_solicitud").val(id);
}

function view_table(){
    $("#tbl_solicitudes").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: '/solicitudes/data',
            data: function (d) {
                d.estado = $('#estado').val() != "" ? $('#estado').val() : null;
                d.fecha_ini = $("#fecha_ini").val() + ' 00:00:00';
                d.fecha_fin = $("#fecha_fin").val() + ' 23:59:59';
            }
        },
        "columns":[
            {data:'postulante.nombres'},
            {data:'postulante.apellidos'},
            {data:'postulante.num_iden'},
            {data:'cod_solicitud'},
            {data:'solicitud_estado.nombre'},
            {data:'datos'},
            {data:'detalle'},
            {data:'fecha'},
            {data:'opciones'},
        ],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 2 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 3 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 4 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 5 ],
                "visible": true,
                "searchable": true
            },
            {
                "targets": [ 6 ],
                "visible": true,
                "searchable": true
            },
            {
                "targets": [ 7 ],
                "visible": true,
                "searchable": false
            }
        ],
        "language": {
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
    });

    $("#tbl_solicitudes_wrapper").find('div.row').first().addClass('p-4');
    $("#tbl_solicitudes_wrapper").find('div.row').last().addClass('p-4');
}

/*function view_table() {

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
}*/