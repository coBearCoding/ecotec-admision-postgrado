$(document).ready(()=>{
  var select_idiomas = $('.idiomas');
  var button_agregar = $('#agregar_idioma');
  var button_remove_2 = $('#remover_idioma_2');
  var button_remove_3 = $('#remover_idioma_3');

  var idioma_container_2 = $('#idioma_container_2');
  var idioma_container_3 = $('#idioma_container_3');


  idioma_container_2.hide();
  idioma_container_3.hide();


  button_remove_2.click(()=>{
    if(idioma_container_2.is(":visible")){
      idioma_container_2.hide();
    }
  });
  button_remove_3.click(()=>{
    if(idioma_container_3.is(":visible")){
      idioma_container_3.hide();
    }
  });

  select_idiomas.select2({
    selectionCssClass: 'mat-input mat-input--select',
    theme: 'custom-class'
  });


  button_agregar.click((e)=>{
    if(idioma_container_2.is(":visible")){
      if(idioma_container_3.is(":visible")){
       return Toastify({
          text: `Solo se permiten ingresar 3 idiomas`,
          backgroundColor: `linear-gradient(to right, #01b9fc 0%, #1b67a3)`,
          className: "default-toast",
          stopOnFocus: true,
          offset: {
            x: "1rem",
            y: "4rem"
          }
        }).showToast();
      }else{
        idioma_container_3.show();
      }
    }else{
      idioma_container_2.show();
    }
  });
})
