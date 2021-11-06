$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#verContacto').click(function () {
        var cedula = $('#cedula').val();

        if (cedula.trim() == '') {
            toastr.error('Ups! Debes ingresar una cédula para continuar.');
        }
        $.ajax({
            url: '/buscarContacto',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "cedula": cedula
            },
            type: 'POST',
            beforeSend: function () {
                $('#loadScreen').fadeOut(700);
            },
            success: function (result) {

            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema: ' + status);
                $("html").fadeIn("slow");
            },
            complete: function () {
                $("html").fadeIn("slow");
            }
        });
    });


    $("#next-btn").prop("disabled", true);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $('.cmb_provincia').change(function () {
        var codigo = $(this).val();
        var campo = $(this).data('campo');
        var div = $(this).data('div');
        var cmb = $(this).data('cmb');
        var sigla = $(this).data('sigla');
        $.ajax({
            url: '/buscarCanton',
            data: {id: codigo, campo: campo, sigla: sigla},
            type: 'GET',
            success: function (result) {
                $('#' + div).html(result);
                $('#' + cmb).select2();
                $('#cmb_ciudad_dom').change(function () {
                    var codigo = $(this).val();
                    var campo = $(this).data('campo');
                    var div = $(this).data('div');
                    var cmb = $(this).data('cmb');
                    $.ajax({
                        url: '/buscarParroquia',
                        data: {id: codigo, campo: campo},
                        type: 'POST',
                        success: function (result) {
                            $('#' + div).html(result);
                            $('#' + cmb).select2();
                        },
                        error: function (xhr, status) {
                            alert('Disculpe, existió un problema: ' + status);
                        }
                    });

                });
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema: ' + status);
            }
        });
    });

    $('#cmb_tipo_unidad').change(function () {
        var codigo = $(this).val();
        $.ajax({
            url: '/buscarInstitucion',
            data: {id: codigo},
            type: 'POST',
            success: function (result) {
                $('#div_institucion').html(result);
                $('#cmb_institucion').select2();

            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema: ' + status);
            }
        });

    });

    $('#chk_discapacidad').click(function () {
        if ($('#chk_discapacidad').prop('checked')) {
            $('#txt_tipo_discapacidad').prop("readonly", false);
            $('#txt_porcentaje').prop("readonly", false);
        } else {
            $('#txt_tipo_discapacidad').prop("readonly", true);
            $('#txt_porcentaje').prop("readonly", true);
            $('#txt_tipo_discapacidad').val('');
            $('#txt_porcentaje').val('');
        }
    });

    $('#chk_term_cond').click(function () {
        if ($('#chk_term_cond').prop('checked')) {
            $('#btn_send_solicitud').prop('disabled', false);
        } else {
            $('#btn_send_solicitud').prop('disabled', true);
        }
    });




    $("#btn_guardar").click(function (e) {
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
                toastr.error('Error: ' + xhr.statusText + xhr.responseText);
            },
            complete: function () {
                swal.close();
            },
            dataType: 'html'
        });
    });

});


function view_table() {

    $.ajax({
        type: 'POST',
        url: '/view_data_solicitud',
        data: {"_token": $('meta[name="csrf-token"]').attr('content')},
        beforeSend: function () {
            $('#div_mensajes').removeClass('d-none');
            $('#div_mensajes').addClass('text-center');
            $('#mensajes').html('<img src="../images/load.gif" width="10%" height="10%" />');
        },
        success: function (data) {
            $('#solicitud').html(data);
            /*$('#tbl_solicitud').DataTable({
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
                        "sNext": ">",
                        "sPrevious": "<"
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
            });*/

        },
        error: function (xhr) { // if error occured
            toastr.error('Error: ' + xhr.statusText + xhr.responseText);
        },
        complete: function () {
            $('#div_mensajes').addClass('d-none');
        },
        dataType: 'html'
    });
}

function checkCampos(obj) {
    var camposRellenados = true;
    obj.find("input:required").each(function () {
        var $this = $(this);
        if ($this.val().length <= 0) {
            camposRellenados = false;
            return false;
        }
    });
    if (camposRellenados == false) {
        return false;
    } else {
        return true;
    }
}

function buscarCanton(codigo, campo, div, cmb, sigla, data) {
    $.ajax({
        url: '/buscarCanton',
        data: {id: codigo, campo: campo, sigla: sigla},
        type: 'GET',
        success: function (result) {
            $('#' + div).html(result);
            $('#' + cmb).select2();
            $('#' + cmb).val(data); // Select the option with a value of '1'
            $('#' + cmb).trigger('change');

            // $('#' + cmb).val(data).trigger('change');
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema: ' + status);
        }
    });
}

function buscarInstitucion(data) {
    var codigo = $('#cmb_tipo_unidad').val();
    $.ajax({
        url: '/buscarInstitucion',
        data: {id: codigo},
        type: 'POST',
        success: function (result) {
            $('#div_institucion').html(result);

            $('#cmb_institucion').select2();
            $('#cmb_institucion').val(data); // Select the option with a value of '1'
            $('#cmb_institucion').trigger('change');

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema: ' + status);
        }
    });
}
