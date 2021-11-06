const tipoIdentificacion = document.getElementById("tipoIdentificacion");
const numIdentificacion = document.getElementById("numIdentificacion");
const labelCedula = document.querySelector("label[for*=numIdentificacion]");

tipoIdentificacion.addEventListener("change", function() {
  numIdentificacion.value = "";

  if (tipoIdentificacion.value === "Cédula de indentidad") {
    labelCedula.textContent = "Cédula:";

    // Validaciones cedula
    numIdentificacion.setAttribute("onkeypress", "return onlyNumbers(event);");
    numIdentificacion.setAttribute("maxlength", 10);
  } else {
    labelCedula.textContent = "Pasaporte:";

    // Cambiar validaciones a  pasaporte
    numIdentificacion.setAttribute("onkeypress", null);
    numIdentificacion.setAttribute("maxlength", 30);
  }
});

function onlyNumbers(e) {
  // Only ASCII character in that range allowed
  const ASCIICode = e.which ? e.which : e.keyCode;

  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;

  return true;
}

numIdentificacion.addEventListener("keyup", function() {
  const numbersRegex = /^[0-9]+$/;
  console.log(numbersRegex.test(numIdentificacion.value));
});
