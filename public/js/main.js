/* CSS3SCHOOL - FULLSCREEN MENU - OVERLAY  */

function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}

function successMsg() {
  Swal.fire({
    icon: "success",
    title: "Gracias por completar tu información",
    text: "Revisa tu correo electrónico.",
    confirmButtonText: "ACEPTAR",
    confirmButtonColor: "#01b9fc"
  });
}

$(document).ready(function() {
  /* STEPPER VERTICAL */

  $(".stepper").mdbStepper();

  /* SPINER  */
  $("#loadScreen").fadeOut(700);
  $("html").fadeIn("slow");

  /* SELECT DISCAPACIDAD */

  $("#discapacidad").change(function() {
    var val = $(this).val();
    if (val === "1") {
      $("#discapacidad-hidden-fields").fadeIn();
    } else {
      $("#discapacidad-hidden-fields").fadeOut();
      $("#discapacidad-hidden-fields input").val("");
    }
  });

  /* ESTUDIOS */

  $("#otraUniversidad").click(function() {
    if ($(this).is(":checked")) {
      $("#otraUniversidad-hidden-fields").fadeIn();
    } else {
      $("#otraUniversidad-hidden-fields").fadeOut();
      $("#otraUniversidad-hidden-fields input").val("");
    }
  });

  /*EMPLEO */
  $("#empleo").click(function() {
    if ($(this).is(":checked")) {
      $("#empleo-hidden-fields").fadeIn();
    } else {
      $("#empleo-hidden-fields").fadeOut();
      $("#empleo-hidden-fields input").val("");
    }
  });

  /*
    
    /*$("#discapacidad").change(function() {
        var val = $(this).val();
        if(val === "1") {
            $("#discapacidad-hidden-fields").fadeIn();
        }
        else if(val === "1") {
            $("#discapacidad-hidden-fields").fadeOut();
        }
    });

    */

  /* MENU CLASS CANGE COLORS */

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    //>=, not <=
    if (scroll >= 300) {
      //clearHeader, not clearheader - caps H
      $(".mainMenu").addClass("floatingMenu");
    } else {
      $(".mainMenu").removeClass("floatingMenu");
    }
  }); //missing );

  /* TRANSITION SPAGE */

  barba.init({
    transitions: [
      {
        name: "opacity-transition",
        leave(data) {
          return gsap.to(data.current.container, {
            opacity: 0
          });
        },
        enter(data) {
          return gsap.from(data.next.container, {
            opacity: 0
          });
        }
      }
    ]
  });
});
