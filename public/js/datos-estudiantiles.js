$('document').ready(()=>{

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });



  var select_colegios = $('#institucion_id');
  var select_tercer_nivel = $('#estudio_institucion_nombre');
  var select_posgrado = $('#posgrado_institucion_id');
  var institucion_otra_container = $('#institucion_otra_container');


  institucion_otra_container.hide();

  select_colegios.select2({
    selectionCssClass: 'mat-input mat-input--select',
    theme: 'custom-class'
  });

  select_tercer_nivel.select2({
    selectionCssClass: 'mat-input mat-input--select',
    theme: 'custom-class'
  });

  select_posgrado.select2({
    selectionCssClass: 'mat-input mat-input--select',
    theme: 'custom-class'
  });


  if(select_tercer_nivel.val() == "Otra"){
    institucion_otra_container.show("slow");
  }else{
    institucion_otra_container.hide("slow");
  } 

  select_tercer_nivel.change((e)=>{
    if(select_tercer_nivel.val() == "Otra"){
      institucion_otra_container.show("slow");
    }else{
      institucion_otra_container.hide("slow");
    }
  });


  function guardarContinuar(){
    var form = $('#datos-principales-form').serialize();

    $.ajax({
      type: "POST",
      url: '/guardarContinuar',
      data: form.serialize(), // serializes the form's elements.
      success: function(data)
      {
          alert(data); // show response from the php script.
      }
    });
  }
});
