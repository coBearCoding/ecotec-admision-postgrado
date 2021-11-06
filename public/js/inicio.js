
function generar() {
    if ($("#chk_term_cond").prop('checked')) {
        $("#btn_enviar").prop('disabled', false);
    } else {
        $("#btn_enviar").prop('disabled', true);
    }
}
