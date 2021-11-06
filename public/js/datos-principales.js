$('document').ready(()=>{

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.alert').alert()
  //SELECCIONAR CARRERA PROGRAMA PARALELO HORARIO Y FECHA

  var select_sede = $('#sede');
  var select_carrera = $('#carrera');
  var select_programa = $('#programa');

  var input_paralelo = $('#paralelo');
  var input_horario = $('#horario');
  var input_fecha_inicio = $('#fecha_inicio');



  //Deshabilitar hasta llenar datos.
  select_carrera.prop('disabled',true);
  select_programa.prop('disabled',false);



  select_sede.change(()=>{

    select_carrera.prop('disabled',false);
    select_programa.prop('disabled',false);


    var cod_sede = select_sede.val();
    // var nom_sede = $('#nom_sede');

    if(cod_sede == 0){
      select_carrera.prop('disabled', true);
      select_programa.prop('disabled', true);
    }
    //Borrar datos antes de cargar.
    select_carrera.empty();
    select_programa.empty();
    input_paralelo.val(null);
    input_horario.val(null);
    input_fecha_inicio.val(null);

    $.ajax({
        type: 'POST',
        url: '/carrera',
        dataType:'json',
        data:{
          cod_sede: cod_sede
        },
        beforeSend: function () {
            console.log('cargando...');
        },
        success: function (data) {
          if(data.datos != null){
            data.carreras.forEach(element => {
              if(data.datos.carreras == element.nombre){
                select_carrera.append(`<option value="${element.cod_carr}" selected>${element.des_carr}</option>`);
              }
              else{
                select_carrera.append(`<option value="${element.cod_carr}">${element.des_carr}</option>`);
              }
            });
          }
          else{
            data.carreras.forEach(element => {
              select_carrera
              .append(`<option value="${element.cod_carr}">${element.des_carr}</option>`);
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

  // select_carrera.change(()=>{
  //   select_programa.prop('disabled', false);

  //   var cod_sede = select_sede.val();
  //   var cod_carr = select_carrera.val();
  //   var carrera_input = $('#des_carr');

  //   if(cod_carr == 0){
  //     select_programa.prop('disabled', true);
  //   }




    //Borrar datos antes de recargar.
    select_programa.empty();

    $.ajax({
      type: 'POST',
      url: '/programa',
      dataType:'json',
      data:{},
      beforeSend: function () {
          console.log('cargando...');
      },
      success: function (data) {
        console.log(data);
        if(data.datos != null){
          data.programas.forEach(element => {
            if(data.datos.programas == element.nombre){
              select_programa.append(`<option value="${element.id_enfa}" selected>${element.des_enfa}</option>`);
              des_carr.val() = select_programa.val();
            }
            else{
              select_programa.append(`<option value="${element.id_enfa}">${element.des_enfa}</option>`);
              des_carr.val() = select_programa.val();
            }
          });
        }
        else{
          select_programa
            .append(`<option value="0">Seleccione un programa...</option>`);
          data.programas.forEach(element => {
            select_programa
            .append(`<option value="${element.id_enfa}">${element.des_enfa}</option>`);
          });
        }
      },
      error: function (xhr) { // if error occured
          toastr.error('Error: ' + xhr.statusText + xhr.responseText);
      },
      complete: function () {
      },
  });


  // });

  select_programa.change(()=>{
    var cod_programa = select_programa.val();

    //Borrar datos antes de cargar.
    input_paralelo.val(null);
    input_horario.val(null);
    input_fecha_inicio.val(null);

    $.ajax({
      type: 'POST',
      url: '/paralelo',
      dataType:'json',
      data:{
        cod_enfa: cod_programa
      },
      beforeSend: function () {
          console.log('cargando...');
      },
      success: function (data) {
        if(data.datos != null){
          data.datos.forEach(element => {
            input_paralelo.val(`${element.par_curs}`);
            input_horario.val(`${element.des_hora}`);
            input_fecha_inicio.val(`${element.f_ini}`);
          });
        }
        data.paralelos.forEach(element => {
          input_paralelo.val(`${element.par_curs}`);
          input_horario.val(`${element.des_hora}`);
          input_fecha_inicio.val(`${element.f_ini}`);
        });
        console.log(data);
      },
      error: function (xhr) { // if error occured
          toastr.error('Error: ' + xhr.statusText + xhr.responseText);
      },
      complete: function () {
      },
    });
  });

});
