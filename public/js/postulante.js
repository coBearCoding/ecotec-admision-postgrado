/* var progress_ = 0
var nombres_validate = false
var apellidos_validate = false
var etnia_validate = false
var fecha_validate = false
var sexo_validate = false
var estado_validate = false
var discapacidad_validate = false
var sector_validate = false
var direcciond_validate = false
var provincia_validate = false
var canton_validate = false
var telefono_validate = false
var celular_validate = false
var email_validate = false
var facebook_validate = false
var instagram_validate = false
var linkedin_validate = false
var twitter_validate = false */
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* LLenar Datos Postulantes - Progress */

    /* */
    $("#colegio_tipo").change(function(){
		$("#colegio_tipo_nombre").val($("#colegio_tipo option:selected").text());
    });

	$("#universidad_tipo").change(function(){
		$("#estudio_tipo_institucion_nombre").val($("#universidad_tipo option:selected").text());
    });

    $("#colegio_grad").change(function(){
		$("#colegio_grad_name").val($("#colegio_grad option:selected").text());
    });

    $("#universidad").change(function(){
		$("#estudio_institucion_nombre").val($("#universidad option:selected").text());
    });

    $("#facultad").change(function(){
		$("#facultad_nombre").val($("#facultad option:selected").text());
    });

    $("#carrera").change(function(){
		$("#carrera_nombre").val($("#carrera option:selected").text());
    });

    $("#enfasis").change(function(){
		$("#enfasis_nombre").val($("#enfasis option:selected").text());
    });

    $("#btn_personal").click(function () {
        if (!validacionesPersonales()) {
            return false;
        }


        var data = new $('#form_personales').serialize();
        console.log(data)

        $.ajax({
            type: 'POST',
            url: '/personales',
            data: data,
            beforeSend: function () {
                $("#loadScreen").show();
            },
            success: function (data) {
                $("#loadScreen").hide();
                console.log(data);
                var d = JSON.parse(data);
                $('#div_mensajes').removeClass('d-none text-center')
                if (d['status'] == 'success') {
                    toastr.success(d['data']);
                    setTimeout(function(){ jQuery('#siguiente')[0].click(); }, 2000);
                } else {
                    toastr.error(d['data']);
                }
            },
            error: function (xhr) { // if error occured
                $("#loadScreen").hide();
                toastr.error('Error: ' + xhr.statusText + xhr.responseText);
                console.log('Error', xhr.statusText + xhr.responseText);
            },
            complete: function () {
                $("#loadScreen").hide();
            },
            dataType: 'html'
        });
    });

     $("#btn_familiares").click(function () {
        if (!validacionesFamilia()) {
            return false;
        }

        var data = new $('#form_familiares').serialize();

        $.ajax({
            type: 'POST',
            url: '/familiares',
            data: data,
            beforeSend: function () {
                $("#loadScreen").show();
                console.log('cargando...');
            },
            success: function (data) {
                $("#loadScreen").hide();
                console.log(data);
                var d = JSON.parse(data);
                $('#div_mensajes').removeClass('d-none text-center')
                if (d['status'] == 'success') {
                    toastr.success(d['data']);
                    setTimeout(function(){ jQuery('#siguiente')[0].click(); }, 2000);
                } else {
                    toastr.error(d['data']);
                }
            },
            error: function (xhr) { // if error occured
                $("#loadScreen").hide();
                toastr.error('Error: ' + xhr.statusText + xhr.responseText);
                console.log('Error', xhr.statusText + xhr.responseText);
            },
            complete: function () {
                $("#loadScreen").hide();
            },
            dataType: 'html'
        });
    });

    $("#btn_estudiantiles").click(function () {
        /*if (!$("#form_familiares").valid()) {
            return false;
        }*/

        if (!validarEstudiantiles()) {
            return false;
        }
        var data = new $('#form_estudiantiles').serialize();

        $.ajax({
            type: 'POST',
            url: '/estudiantiles',
            data: data,
            beforeSend: function () {
                console.log('cargando...');
                $("#loadScreen").show();
            },
            success: function (data) {
                $("#loadScreen").hide();
                console.log(data);
                var d = JSON.parse(data);
                $('#div_mensajes').removeClass('d-none text-center')
                if (d['status'] == 'success') {
                    toastr.success(d['data']);
                    setTimeout(function(){ jQuery('#siguiente')[0].click(); }, 2000);
                } else {
                    toastr.error(d['data']);
                }
            },
            error: function (xhr) { // if error occured
                $("#loadScreen").hide();
                toastr.error('Error: ' + xhr.statusText + xhr.responseText);
                console.log('Error', xhr.statusText + xhr.responseText);
            },
            complete: function () {
                $("#loadScreen").hide();
            },
            dataType: 'html'
        });
    });

    $("#btn_carrera").click(function () {
        /*if (!$("#form_familiares").valid()) {
            return false;
        }*/
        if (!validarCarrera()) {
            return false;
        }
        console.log('paso')
        var data = new $('#form_carrera').serialize();

        $.ajax({
            type: 'POST',
            url: '/carrera',
            data: data,
            beforeSend: function () {
                console.log('cargando...');
                $("#loadScreen").show();
            },
            success: function (data) {
                $("#loadScreen").hide();
                console.log(data);
                var d = JSON.parse(data);
                $('#div_mensajes').removeClass('d-none text-center')
                if (d['status'] == 'success') {
                    //toastr.success(d['data']);
                    //setTimeout(function(){ jQuery('#siguiente')[0].click(); }, 2000);
                    successMsg();
                    console.log('sss')
                } else {
                    toastr.error(d['data']);
                }
            },
            error: function (xhr) { // if error occured
                $("#loadScreen").hide();
                toastr.error('Error: ' + xhr.statusText + xhr.responseText);
                console.log('Error', xhr.statusText + xhr.responseText);
            },
            complete: function () {
                $("#loadScreen").hide();
            },
            dataType: 'html'
        });
    });

});

function guardar(){
	console.log('guardando');
	var url = $("#url").val();
    var formulario = $("#modulo_form").val();
	var data = new $('#form_'+formulario).serialize();

        $.ajax({
            type: 'POST',
            url: '/'+url,
            data: data,
            beforeSend: function () {
                console.log('cargando...');
                $("#loadScreen").show();
            },
            success: function (data) {
                $("#loadScreen").hide();
                console.log(data);
                var d = JSON.parse(data);
                $('#div_mensajes').removeClass('d-none text-center')
                if (d['status'] == 'success') {
                    toastr.success(d['data']);
                    //setTimeout(function(){ jQuery('#siguiente')[0].click(); }, 2000);
                } else {
                    toastr.error(d['data']);
                }
            },
            error: function (xhr) { // if error occured
                $("#loadScreen").hide();
                toastr.error('Error: ' + xhr.statusText + xhr.responseText);
                console.log('Error', xhr.statusText + xhr.responseText);
            },
            complete: function () {
                $("#loadScreen").hide();
            },
            dataType: 'html'
        });
}

function validarCarrera(){
    var validar = true;
    if ($("#facultad").val() == '' || $("#facultad").val() == null) {
        toastr.warning('El campo facultad es obligatorio');
        return validar = false;
    }
    if ($("#carrera").val() == '' || $("#carrera").val() == null) {
        toastr.warning('El campo Carrera es obligatorio');
        return validar = false;
    }
    if ($("#enfasis").val() == '' || $("#enfasis").val() == null) {
        toastr.warning('El campo Enfasis es obligatorio');
        return validar = false;
    }
    if ($("#enteraecotec").val() == '' || $("#enteraecotec").val() == null) {
        toastr.warning('El campo Cómo te enteraste de la Universidad Ecotec es obligatorio');
        return validar = false;
    }

    if ($("#textarea").val() == '' || $("#textarea").val() == null) {
        toastr.warning('El campo ¿Porqué escogiste la Universidad Ecotec? es obligatorio');
        return validar = false;
    }

    if($("#empleo").is(':checked')){

        if ($("#empresa_empleo").val() == '' || $("#empresa_empleo").val() == null) {
            toastr.warning('El campo Empresa  en la sección de ¿Estas laborando actualmente? es obligatorio');
            return validar = false;
        }

        if ($("#cargo_empleo").val() == '' || $("#cargo_empleo").val() == null) {
            toastr.warning('El campo Cargo en la sección de ¿Estas laborando actualmente? es obligatorio');
            return validar = false;
        }

        if ($("#telefono_empleo").val() == '' || $("#telefono_empleo").val() == null) {
            toastr.warning('El campo Teléfono en la sección de ¿Estas laborando actualmente? es obligatorio');
            return validar = false;
        }

        if ($("#ciudad_empleo").val() == '' || $("#ciudad_empleo").val() == null) {
            toastr.warning('El campo Ciudad en la sección de ¿Estas laborando actualmente? es obligatorio');
            return validar = false;
        }

        if ($("#dirección_empleo").val() == '' || $("#dirección_empleo").val() == null) {
            toastr.warning('El campo Dirección en la sección de ¿Estas laborando actualmente? es obligatorio');
            return validar = false;
        }
    }

    return validar = true;
}


function validarEstudiantiles(){
    var validar = true;
    if ($("#colegio_provincia").val() == '' || $("#colegio_provincia").val() == null) {
        toastr.warning('El campo Provincia de Graduación es obligatorio');
        return validar = false;
    }
    if ($("#colegio_tipo").val() == '' || $("#colegio_tipo").val() == null) {
        toastr.warning('El campo Tipo de Insitución es obligatorio');
        return validar = false;
    }
    if ($("#colegio_grad").val() == '' || $("#colegio_grad").val() == null) {
        toastr.warning('El campo Insitución es obligatorio');
        return validar = false;
    }
    if ($("#colegio_jornada").val() == '' || $("#colegio_jornada").val() == null) {
        toastr.warning('El campo Insitución es obligatorio');
        return validar = false;
    }

    if($("#otraUniversidad").is(':checked')){

        if ($("#universidad_provincia").val() == '' || $("#universidad_provincia").val() == null) {
            toastr.warning('El campo Provincia en la sección de ¿Cuentas ya con estudios superiores? es obligatorio');
            return validar = false;
        }
        if ($("#universidad").val() == '' || $("#universidad").val() == null) {
            toastr.warning('El campo Institución en la sección de ¿Cuentas ya con estudios superiores? es obligatorio');
            return validar = false;
        }
    }

    return validar = true;
}

function validacionesPersonales(){
    var validar = true;
    if ($("#nombres").val() == '') {
        toastr.warning('El campo nombre es obligatorio');
        return validar = false;
    }

    if ($("#apellidos").val() == '') {
        toastr.warning('El campo apellidos es obligatorio');
        return validar  = false;
    }

    if ($("#cedula").val() == '') {
        toastr.warning('El campo cédula es obligatorio');
        return validar  = false;
    }

    if ($("#direcciond").val() == '') {
        toastr.warning('El campo dirección es obligatorio');
        return validar  = false;
    }

    if ($("#telefono").val() == '') {
        toastr.warning('El campo telefono es obligatorio');
        return validar  = false;
    }

    if (/^\d+$/.test($("#telefono").val()) == false) {
        toastr.warning('El campo telefono solo acepta numeros');
        return validar  = false;
    }

    if ($("#celular").val() == '') {
        toastr.warning('El campo celular es obligatorio');
        return validar  = false;
    }

    if (/^\d+$/.test($("#celular").val()) == false) {
        toastr.warning('El campo celular solo acepta numeros');
        return validar  = false;
    }

    if ($("#email").val() == '') {
        toastr.warning('El campo email es obligatorio');
        return validar  = false;
    }

    if( /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test($("#email").val()) == false){
        toastr.warning("Por favor, introduce una dirección de correo electrónico válida");
        return validar  = false;
    }

    return validar;
}

function validacionesFamilia(){
    var validar = true;
    if ($("#nombrep").val() == '') {
        toastr.warning('El campo nombre del padre es obligatorio');
        return validar = false;
    }

    if ($("#apellidop").val() == '') {
        toastr.warning('El campo apellidos del padre es obligatorio');
        return validar  = false;
    }


    if ($("#emailp").val() == '') {
        toastr.warning('El campo email del padre es obligatorio');
        return validar  = false;
    }

    if( /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test($("#emailp").val()) == false){
        toastr.warning("Por favor, introduce una dirección de correo electrónico válida para el padre");
        return validar  = false;
    }

    if ($("#telefonop").val() == '') {
        toastr.warning('El campo teléfono o celular de padre es obligatorio');
        return validar  = false;
    }

    if ($("#empresap").val() == '') {
        toastr.warning('El campo empresa es obligatorio');
        return validar  = false;
    }

    if ($("#cargop").val() == '') {
        toastr.warning('El campo cargo del padre es obligatorio');
        return validar  = false;
    }

    if ($("#domiciliop").val() == '') {
        toastr.warning('El campo domicilio es obligatorio');
        return validar  = false;
    }

    if ($("#nombrem").val() == '') {
        toastr.warning('El campo nombre de la madre es obligatorio');
        return validar = false;
    }

    if ($("#apellidom").val() == '') {
        toastr.warning('El campo apellidos de la madre es obligatorio');
        return validar  = false;
    }


    if ($("#emailm").val() == '') {
        toastr.warning('El campo email de la madre es obligatorio');
        return validar  = false;
    }

    if( /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test($("#emailm").val()) == false){
        toastr.warning("Por favor, introduce una dirección de correo electrónico válida para la madre");
        return validar  = false;
    }

    if ($("#telefonom").val() == '') {
        toastr.warning('El campo teléfono o celular de la madre es obligatorio');
        return validar  = false;
    }

    if ($("#empresam").val() == '') {
        toastr.warning('El campo empresa es obligatorio');
        return validar  = false;
    }

    if ($("#cargom").val() == '') {
        toastr.warning('El campo cargo de la madre es obligatorio');
        return validar  = false;
    }

    if ($("#domiciliom").val() == '') {
        toastr.warning('El campo domicilio es obligatorio');
        return validar  = false;
    }

    if ($("#nhermanos").val() == '') {
        toastr.warning('El campo cuantos hermanos(as) tienes es obligatorio');
        return validar  = false;
    }

    if ($("#edades").val() == '') {
        toastr.warning('El campo edades es obligatorio');
        return validar  = false;
    }


    if ($("#contactoem").val() == '') {
        toastr.warning('El campo en caso de emergencia es obligatorio');
        return validar  = false;
    }

    if ($("#cemergen").val() == '') {
        toastr.warning('El campo en celular de emergencia es obligatorio');
        return validar  = false;
    }

    return validar;
}
function successMsg () {
    Swal.fire({
        icon: 'success',
        title: 'Gracias por completar tu información',
        text: 'Revisa tu correo electrónico.',
        confirmButtonText: 'ACEPTAR',
        confirmButtonColor: '#01b9fc',
        allowOutsideClick: false,
        allowEscapeKEy: false,
        allowEnterKey : false,

    }).then((result) => {
        if (result.isConfirmed) {
            location.replace('/')
            window.location.hash = "no-back-button";
            window.location.hash = "Again-No-back-button";
            window.onhashchange = function(){
                window.location.hash = "no-back-button";
            }
        }
      })
}

function removeProgress(){
    var matches = $('#progressCircle').attr('class').match(/\progress-\S+/g);
    $.each(matches, function(){
        var className = this;
        $('#progressCircle').removeClass(className.toString());
    });
}
