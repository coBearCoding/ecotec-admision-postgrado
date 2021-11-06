var progress_ = 0

//Datos Personales Aspirantes
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
var twitter_validate = false

//Datos de Padres
var nombrep_validate = false
var apellidop_validate = false
var emailp_validate = false
var telefonop_validate = false
var empresap_validate = false
var cargop_validate = false
var domiciliop_validate = false
var estudiosp_validate = false

var nombrem_validate = false
var apellidom_validate = false
var emailm_validate = false
var telefonom_validate = false
var empresam_validate = false
var cargom_validate = false
var domiciliom_validate = false
var estudiosm_validate = false

var nHermanos_validate = false
var edades_validate = false
var contactoem_validate = false
var cemergen_validate = false

//Rutas de pasos
var datos_personales= '/datos-personales'
var datos_familiares = '/datos-familiares'

$(document).ready(function () {
    if(datos_personales == window.location.pathname){
        if($('#nombres').val()!=''){
            progress_ = progress_ + 2
            nombres_validate = true
        }
        if($('#apellidos').val()!=''){
            progress_ = progress_ + 2
            apellidos_validate = true
        }
        if($('#etnia').val()!=''){
            progress_ = progress_ + 1
            etnia_validate = true
        }
        if($('#dia_nacimiento').val()!=''){
            progress_ = progress_ + 1
            fecha_validate = true
        }
        if($('.sexo').is(':checked')){
            progress_ = progress_ + 1
            sexo_validate = true
        }
        if($('.estado').is(':checked')){
            progress_ = progress_ + 1
            estado_validate = true
        }
        if($('#discapacidad').val()!=''){
            progress_ = progress_ + 1
            discapacidad_validate = true
        }
        if($('#sector').val()!=''){
            progress_ = progress_ + 1
            sector_validate = true
        }
        if($('#direcciond').val()!=''){
            progress_ = progress_ + 1
            direcciond_validate = true
        }
        if($('#provincia').val()!=''){
            progress_ = progress_ + 1
            provincia_validate = true
        }
        if($('#canton').val()!=''){
            progress_ = progress_ + 1
            canton_validate = true
        }
        if($('#telefono').val()!=''){
            progress_ = progress_ + 1
            telefono_validate = true
        }
        if($('#celular').val()!=''){
            progress_ = progress_ + 1
            celular_validate = true
        }
        if($('#email').val()!=''){
            progress_ = progress_ + 1
            email_validate = true
        }
        
        removeProgress()
        $('#progressCircle').addClass(`progress-${progress_}`)
        $('#progressNumber').html(progress_)
    }else if(datos_familiares == window.location.pathname){
        
        progress_ = 20

        if($('#nombresp').val()!=''){
            progress_ = progress_ + 1
            nombresp_validate = true
        }
        if($('#apellidop').val()!=''){
            progress_ = progress_ + 1
            apellidop_validate = true
        }
        if($('#emailp').val()!=''){
            progress_ = progress_ + 1
            emailp_validate = true
        }
        if($('#telefonop').val()!=''){
            progress_ = progress_ + 1
            telefonop_validate = true
        }
        if($('#empresap').val()!=''){
            progress_ = progress_ + 1
            empresap_validate = true
        }
        if($('#cargop').val()!=''){
            progress_ = progress_ + 1
            cargop_validate = true
        }
        if($('#domiciliop').val()!=''){
            progress_ = progress_ + 1
            domiciliop_validate = true
        }
        if($('#estudiosp').val()!=''){
            progress_ = progress_ + 1
            estudiosp_validate = true
        }

        
        if($('#nombresm').val()!=''){
            progress_ = progress_ + 1
            nombresm_validate = true
        }
        if($('#apellidom').val()!=''){
            progress_ = progress_ + 1
            apellidom_validate = true
        }
        if($('#emailm').val()!=''){
            progress_ = progress_ + 1
            emailm_validate = true
        }
        if($('#telefonom').val()!=''){
            progress_ = progress_ + 1
            telefonom_validate = true
        }
        if($('#empresam').val()!=''){
            progress_ = progress_ + 1
            empresam_validate = true
        }
        if($('#cargom').val()!=''){
            progress_ = progress_ + 1
            cargom_validate = true
        }
        if($('#domiciliom').val()!=''){
            progress_ = progress_ + 1
            domiciliom_validate = true
        }
        if($('#estudiosm').val()!=''){
            progress_ = progress_ + 1
            estudiosm_validate = true
        }

        if($('#nHermanos').val()!=''){
            progress_ = progress_ + 1
            nHermanos_validate = true
        }

        if($('#edades').val()!=''){
            progress_ = progress_ + 1
            edades_validate = true
        }

        if($('#contactoem').val()!=''){
            progress_ = progress_ + 1
            contactoem_validate = true
        }

        if($('#cemergen').val()!=''){
            progress_ = progress_ + 1
            cemergen_validate = true
        }
        removeProgress()
        $('#progressCircle').addClass(`progress-${progress_}`)
        $('#progressNumber').html(progress_)
    }
    
})

/** */
/* LLenar Datos Postulantes - Progress */
{
    $('#nombres').on('blur', function () {
            
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!nombres_validate){
                progress_ = progress_+2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            nombres_validate = true
        }else{
            if(progress_ > 0 && nombres_validate==true ){
                progress_ = progress_-2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            nombres_validate = false
        }
    })

    $('#apellidos').on('blur', function () {
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!apellidos_validate){
                progress_ = progress_+2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            apellidos_validate = true
        }else{
            if(progress_ > 0 && apellidos_validate == true){
                progress_ = progress_-2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            apellidos_validate = false
        }
    })

    $('#etnia').on('change', function () {
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!etnia_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            etnia_validate = true
        }else{
            if(progress_ > 0 && etnia_validate == true){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            etnia_validate = false
        }
    })

    $('#dia_nacimiento').on('blur', function () {
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!fecha_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            fecha_validate = true
        }else{
            if(progress_ > 0 && fecha_validate == true){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            fecha_validate = false
        }
    })

    $('.sexo').on('click', function () {
        if($(this).is(':checked')){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!sexo_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            sexo_validate = true
        }else{
            if(progress_ > 0 && sexo_validate == true){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            sexo_validate = false
        }
    })

    $('.estado').on('click', function () {
        if($(this).is(':checked')){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!estado_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            estado_validate = true
        }else{
            if(progress_ > 0 && estado_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            estado_validate = false
        }
    })

    $('#discapacidad').on('change', function () {
        if($(this).val() == 0){
            if(!$(this).val()==''){
                /* if(progress_ > 0 ){
                    progress_ = progress_-2
                } */
                if(!discapacidad_validate){
                    progress_ = progress_+1
                }
                removeProgress()
                $('#progressCircle').addClass(`progress-${progress_}`)
                $('#progressNumber').html(progress_)
                discapacidad_validate = true
            }else{
                if(progress_ > 0 && discapacidad_validate == true){
                    progress_ = progress_-1
                }
                removeProgress()
                $('#progressCircle').addClass(`progress-${progress_}`)
                $('#progressNumber').html(progress_)
                discapacidad_validate = false
            }
        }else if($(this).val() == 1){
            if(progress_ > 0 ){
                progress_ = progress_-1
            }
            $('#discual').on('blur',function () {
                if(!$('#discual').val() == '' && !$('#grado_disc').val() == ''){
                    if(!discapacidad_validate){
                        progress_ = progress_+1
                    }
                    removeProgress()
                    $('#progressCircle').addClass(`progress-${progress_}`)
                    $('#progressNumber').html(progress_)
                    discapacidad_validate = true
                }else{
                    if(progress_ > 0 && discapacidad_validate == true){
                        progress_ = progress_-1
                    }
                    removeProgress()
                    $('#progressCircle').addClass(`progress-${progress_}`)
                    $('#progressNumber').html(progress_)
                    discapacidad_validate = false
                }
            })
            $('#grado_disc').on('blur',function () {
                if(!$('#discual').val() == '' && !$('#grado_disc').val() == ''){
                    if(!discapacidad_validate){
                        progress_ = progress_+1
                    }
                    removeProgress()
                    $('#progressCircle').addClass(`progress-${progress_}`)
                    $('#progressNumber').html(progress_)
                    discapacidad_validate = true
                }else{
                    if(progress_ > 0 && discapacidad_validate == true){
                        progress_ = progress_-1
                    }
                    removeProgress()
                    $('#progressCircle').addClass(`progress-${progress_}`)
                    $('#progressNumber').html(progress_)
                    discapacidad_validate = false
                }
            })
        }
    })

    $('#sector').on('change', function () {
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!sector_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            sector_validate = true
        }else{
            if(progress_ > 0 && sector_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            sector_validate = false
        }
    })

    $('#direcciond').on('blur', function () {
        
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!direcciond_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            direcciond_validate = true
        }else{
            if(progress_ > 0 && direcciond_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            direcciond_validate = false
        }
    })

    $('#provincia').on('change', function () {
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!provincia_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            provincia_validate = true
        }else{
            if(progress_ > 0 && provincia_validate == true){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            provincia_validate = false
        }
    })

    $('#canton').on('change', function () {
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!canton_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            canton_validate = true
        }else{
            if(progress_ > 0 && canton_validate == true){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            canton_validate = false
        }
    })

    $('#telefono').on('blur', function () {
        
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!telefono_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            telefono_validate = true
        }else{
            if(progress_ > 0 && canton_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            telefono_validate = false
        }
    })

    $('#celular').on('blur', function () {
        
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!celular_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            celular_validate = true
        }else{
            if(progress_ > 0 && celular_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            celular_validate = false
        }
    })

    $('#email').on('blur', function () {
        
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!email_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            email_validate = true
        }else{
            if(progress_ > 0 && email_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            email_validate = false
        }
    })

    $('#facebook').on('blur', function () {
        
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!facebook_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            facebook_validate = true
        }else{
            if(progress_ > 0 && facebook_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            facebook_validate = false
        }
    })

    $('#instagram').on('blur', function () {
        
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!instagram_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            instagram_validate = true
        }else{
            if(progress_ > 0 && instagram_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            instagram_validate = false
        }
    })

    $('#linkedin').on('blur', function () {
        
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!linkedin_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            linkedin_validate = true
        }else{
            if(progress_ > 0 && linkedin_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            linkedin_validate = false
        }
    })

    $('#twitter').on('blur', function () {
        
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!twitter_validate){
                progress_ = progress_+1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            twitter_validate = true
        }else{
            if(progress_ > 0 && twitter_validate == true ){
                progress_ = progress_-1
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            twitter_validate = false
        }
    })
}
{
    $('#nombrep').on('blur', function () {
            
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!nombrep_validate){
                progress_ = progress_+2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            nombrep_validate = true
        }else{
            if(progress_ > 0 && nombrep_validate==true ){
                progress_ = progress_-2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            nombrep_validate = false
        }
    })

    $('#apellidop').on('blur', function () {
            
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!apellidop_validate){
                progress_ = progress_+2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            apellidop_validate = true
        }else{
            if(progress_ > 0 && apellidop_validate==true ){
                progress_ = progress_-2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            apellidop_validate = false
        }
    })

    $('#emailp').on('blur', function () {
            
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!emailp_validate){
                progress_ = progress_+2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            emailp_validate = true
        }else{
            if(progress_ > 0 && emailp_validate==true ){
                progress_ = progress_-2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            emailp_validate = false
        }
    })

    $('#telefonop').on('blur', function () {
            
        if(!$(this).val()==''){
            /* if(progress_ > 0 ){
                progress_ = progress_-2
            } */
            if(!telefonop_validate){
                progress_ = progress_+2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            telefonop_validate = true
        }else{
            if(progress_ > 0 && telefonop_validate==true ){
                progress_ = progress_-2
            }
            removeProgress()
            $('#progressCircle').addClass(`progress-${progress_}`)
            $('#progressNumber').html(progress_)
            telefonop_validate = false
        }
    })
}
/* */