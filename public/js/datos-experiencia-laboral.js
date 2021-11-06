$(document).ready(() => {
  var select_trabaja = $('#trabaja_actualmente');
  var contenido = $('.experiencia_content');

  if (select_trabaja.val() == 'N') {
    contenido.hide();
  } else {
    contenido.show();
  }

  select_trabaja.change((e) => {
    if (select_trabaja.val() == 'N') {
      contenido.hide();
    } else {
      contenido.show();
    }
  });
});
