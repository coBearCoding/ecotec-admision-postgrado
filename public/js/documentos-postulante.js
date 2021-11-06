$(document).ready(() => {

    var cedula = $('#cedula');
    var hoja_de_vida = $('#hoja_de_vida');
    var titulo_senescyt = $('#titulo_senescyt');
    var titulo_tercer_nivel = $('#titulo_tercer_nivel');
    var certificado_ingles = $('#certificado_ingles');
    var recomendacion_acad_lab = $('#recomendacion_acad_lab');
    var recomendacion_acad_lab2 = $('#recomendacion_acad_lab2');
    var carta_motivacion = $('#carta_motivacion');

    cedula.change((event) => {
        console.log(event)
        if (event.target.files[0].size > 2000000) {
            alert(`El tamaño máximo es 2 MB`);
            event.target.value = '';
        }
    });

    hoja_de_vida.change((event) => {
        console.log(event)
        if (event.target.files[0].size > 2000000) {
            alert(`El tamaño máximo es 2 MB`);
            event.target.value = '';
        }
    });

    titulo_senescyt.change((event) => {
        console.log(event)
        if (event.target.files[0].size > 2000000) {
            alert(`El tamaño máximo es 2 MB`);
            event.target.value = '';
        }
    });

    titulo_tercer_nivel.change((event) => {
        console.log(event)
        if (event.target.files[0].size > 2000000) {
            alert(`El tamaño máximo es 2 MB`);
            event.target.value = '';
        }
    });

    certificado_ingles.change((event) => {
        console.log(event)
        if (event.target.files[0].size > 2000000) {
            alert(`El tamaño máximo es 2 MB`);
            event.target.value = '';
        }
    });

    recomendacion_acad_lab.change((event) => {
        console.log(event)
        if (event.target.files[0].size > 2000000) {
            alert(`El tamaño máximo es 2 MB`);
            event.target.value = '';
        }
    });

    recomendacion_acad_lab2.change((event) => {
        console.log(event)
        if (event.target.files[0].size > 2000000) {
            alert(`El tamaño máximo es 2 MB`);
            event.target.value = '';
        }
    });

    carta_motivacion.change((event) => {
      console.log(event)
      if (event.target.files[0].size > 2000000) {
          alert(`El tamaño máximo es 2 MB`);
          event.target.value = '';
      }
  });
})
