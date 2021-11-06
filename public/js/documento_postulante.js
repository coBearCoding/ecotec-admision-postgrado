$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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
            },
            complete: function () {
                $("#loadScreen").hide();
            },
            dataType: 'html'
        });
}

