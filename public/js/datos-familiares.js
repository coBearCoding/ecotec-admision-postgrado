$('document').ready(()=>{

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
