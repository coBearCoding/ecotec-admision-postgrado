$(document).ready(()=>{


  var select_pais = $('#pais_residencia');
  var select_provincia = $('#provincia');
  var select_ciudad = $('#canton');
  var discapacidad = $('#discapacidad');
  var tipo_discapacidad_container = $('#tipo_discapcidad_container');
  var porcentaje_container = $('#porcentaje_container');
  var porcentaje_discapacidad = $('#porcentaje_discapacidad');
  var conadis_container = $('#conadis_container');
  var conadis = $('#conadis');

  var foto_carnet = $('#foto_carnet');

  foto_carnet.change((event)=>{
    console.log(event)
    if (event.target.files[0].size > 2000000) {
      alert(`El tamaño máximo es 2 MB`);
      event.target.value = '';
    }
  });

  if (discapacidad.val() == 'SI'){
    tipo_discapacidad_container.show("slow");
    porcentaje_container.show("slow");
    conadis_container.show("slow");
  }else{
    tipo_discapacidad_container.hide("slow");
    porcentaje_container.hide("slow");
    conadis_container.hide("slow");
  }

  discapacidad.change(()=>{
    if (discapacidad.val() == 'SI'){
      tipo_discapacidad_container.show("slow");
      porcentaje_container.show("slow");
      conadis_container.show("slow");
    }else{
      tipo_discapacidad_container.hide("slow");
      porcentaje_container.hide("slow");
      conadis_container.hide("slow");
    }
  });

  porcentaje_discapacidad.keyup((e)=>{
    var keyCode = e.which;
    if (discapacidad.val() == 'SI'){
      if((keyCode < 48) || (keyCode > 57)){
        return false;
      }
      console.log(porcentaje_discapacidad.val());
      if(porcentaje_discapacidad.val() > 100){
        porcentaje_discapacidad.val(100);
      }
    }
  });




  // ACTIVAR SELECT2

  select_ciudad.select2({
    selectionCssClass: 'mat-input mat-input--select',
    theme: 'custom-class'
  });

  select_provincia.select2({
    selectionCssClass: 'mat-input mat-input--select',
    theme: 'custom-class'
  });


  //CARGAR PROVINCIAS SIN CAMBIAR PAIS

  $.ajax({
    type: 'POST',
    url: '/provincia',
    dataType:'json',
    data:{
      pais: select_pais.val(),
    },
    beforeSend: function () {
      // console.log('cargando...');
    },
    success: function (data) {
      if(data.datos != null){
        data.provincias.forEach(element => {
          // console.log(element);
          if(data.datos.provincia == element.nombre){
            select_provincia.append(`<option value="${element.nombre}" selected>${element.nombre}</option>`);
          }
          else{
            select_provincia.append(`<option value="${element.nombre}">${element.nombre}</option>`);
          }
        });
      }
    },
    error: function (xhr) { // if error occured
        toastr.error('Error: ' + xhr.statusText + xhr.responseText);
    },
    complete: function () {
    },
});

//CARGAR CIUDADES SIN CAMBIAR PROVINCIA
setTimeout(() => {
  // console.log('Ejecutado');
  $.ajax({
    type: 'POST',
    url: '/ciudad',
    dataType:'json',
    data:{
      provincia: select_provincia.val(),
    },
    beforeSend: function () {
      // console.log('cargando...');
    },
    success: function (data) {
      if(data.datos != null){
        data.cantones.forEach(element => {
          // console.log(element);

          if(data.datos.cantones == element.cantones){
            select_ciudad.append(`<option value="${element.canton}" selected>${element.canton}</option>`);
          }
          else{
            select_ciudad.append(`<option value="${element.canton}">${element.canton}</option>`);
          }
        });
      }else{
        data.forEach(element => {
          select_ciudad
          .append(`<option value="${element.canton}">${element.canton}</option>`);
        });
      }
    },
    error: function (xhr) {
        toastr.error('Error: ' + xhr.statusText + xhr.responseText);
    },
    complete: function () {
    },
  });
}, 5000);

  //AL SELECCIONAR PAIS
  select_pais.change(()=>{

    //Borrar datos antes de recargar.
    select_provincia.empty();

    $.ajax({
      type: 'POST',
      url: '/provincia',
      dataType:'json',
      data:{
        pais: select_pais.val(),
      },
      beforeSend: function () {
        // console.log('cargando...');
      },
      success: function (data) {
        if(data.datos != null){
          data.provincias.forEach(element => {

            if(data.datos.provincia == element.nombre){
              select_provincia.append(`<option value="${element.nombre}" selected>${element.nombre}</option>`);
            }
            else{
              select_provincia.append(`<option value="${element.nombre}">${element.nombre}</option>`);
            }
          });
        }else{
          data.forEach(element => {
            select_provincia
            .append(`<option value="${element.nombre}">${element.nombre}</option>`);
          });
        }
      },
      error: function (xhr) { // if error occured
          toastr.error('Error: ' + xhr.statusText + xhr.responseText);
      },
      complete: function () {
      },
  });


  });

  // AL SELECCIONAR PROVINCIA
    select_provincia.change(()=>{

      //Borrar datos antes de recargar.
      select_ciudad.empty();

      $.ajax({
        type: 'POST',
        url: '/ciudad',
        dataType:'json',
        data:{
          provincia: select_provincia.val(),
        },
        beforeSend: function () {
            // console.log('cargando...');
        },
        success: function (data) {
          if(data.datos != null){
            data.cantones.forEach(element => {

              if(data.datos.canton == element.canton){
                select_ciudad.append(`<option value="${element.canton}" selected>${element.canton}</option>`);
              }
              else{
                select_ciudad.append(`<option value="${element.canton}">${element.canton}</option>`);
              }
            });
          }else{
            // console.log(data);
            data.forEach(element => {
              select_ciudad
              .append(`<option value="${element.canton}">${element.canton}</option>`);
            });
          }
        },
        error: function (xhr) { // if error occured
            toastr.error('Error: ' + xhr.statusText + xhr.responseText);
        },
        complete: function () {
        },
    });
  });


  // VALIDACIONES Y SUBMIT

})
