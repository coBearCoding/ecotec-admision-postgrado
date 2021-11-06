$(document).ready(() => {
  var financiamiento_tipo = $('#financiamiento_tipo');
  var financiamiento_banco_group = $('#financiamiento_banco_group');
  var financiamiento_banco = $('#financiamiento_banco');
  var custom_text_financiamiento = $('#custom_text_financiamiento');
  var aceptar_terminos = $('#aceptar_terminos');
  var final_step_button = $('#final_step');

  financiamiento_tipo.change(() => {
    if (financiamiento_tipo.val() == 'Crédito Educativo'){
      financiamiento_banco_group.show(200);
      custom_text_financiamiento.text('Banco:');
      financiamiento_banco.attr('required', true);
    }else if(financiamiento_tipo.val() == 'Tarjeta de Crédito'){
      financiamiento_banco_group.show(200);
      custom_text_financiamiento.text('Banco:');
      financiamiento_banco.attr('required', true);
    }else if(financiamiento_tipo.val() == 'Otros'){
      financiamiento_banco_group.show(200);
      custom_text_financiamiento.text('Detalle:');
      financiamiento_banco.attr('required', true);
    }else{
      financiamiento_banco_group.hide(200);
      financiamiento_banco.attr('required', false);
    }
  });

  aceptar_terminos.change(()=>{
    if(aceptar_terminos.is(':checked')){
      final_step_button.attr('disabled', false);
    }else{
      final_step_button.attr('disabled', true);
    }
  });
});
