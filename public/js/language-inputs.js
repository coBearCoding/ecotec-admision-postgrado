const MAX_LANG_INPUTS = 3; // Max lang cards allowed

const addLanguageButton = document.getElementById("addLanguageButton");

function removeLangItem(el) {
  const languageInputs = document.querySelector(".language-inputs");

  if ([...languageInputs.children].length === 1) {
    return Toastify({
      text: "Debe especificar al menos 1 idioma",
      backgroundColor: `linear-gradient(to right, #01b9fc 0%, #1b67a3)`,
      className: "default-toast",
      stopOnFocus: true,
      offset: {
        x: "1rem",
        y: "4rem"
      }
    }).showToast();
  }

  const langItem = el.closest(".language-inputs__container");
  langItem.remove();

  [...languageInputs.children].forEach((item, index) => {
    item.querySelector(
      ".language-inputs__number span:first-child"
    ).textContent = index + 1;

    const labelIdiomaSelect = item.querySelector('label[for*="Select"]');
    const selectIdiomaSelect = item.querySelector('select[id*="Select"]');

    const labelNivelEscrito = item.querySelector('label[for*="NivelEscrito"]');
    const selectNivelEscrito = item.querySelector('select[id*="NivelEscrito"]');

    const labelNivelLectura = item.querySelector('label[for*="NivelLectura"]');
    const selectNivelLectura = item.querySelector('select[id*="NivelLectura"]');

    if (
      labelIdiomaSelect &&
      selectIdiomaSelect &&
      labelNivelEscrito &&
      selectNivelEscrito &&
      labelNivelLectura &&
      selectNivelLectura
    ) {
      labelIdiomaSelect.setAttribute("for", `idioma${index + 1}Select`);
      selectIdiomaSelect.id = `idioma${index + 1}Select`;
      selectIdiomaSelect.setAttribute("name", `idioma${index + 1}Select`);

      labelNivelEscrito.setAttribute("for", `idioma${index + 1}NivelEscrito`);
      selectNivelEscrito.id = `idioma${index + 1}NivelEscrito`;
      selectNivelEscrito.setAttribute("name", `idioma${index + 1}NivelEscrito`);

      labelNivelLectura.setAttribute("for", `idioma${index + 1}NivelLectura`);
      selectNivelLectura.id = `idioma${index + 1}NivelLectura`;
      selectNivelLectura.setAttribute("name", `idioma${index + 1}NivelLectura`);
    }
  });
}

addLanguageButton.addEventListener("click", e => {
  const languageInputs = document.querySelector(".language-inputs");
  const numItems = [...languageInputs.children].length;

  if (numItems < MAX_LANG_INPUTS) {
    // Add new language-inputs__container
    const newLanguageInputContainer = document.createElement("div");
    newLanguageInputContainer.className =
      "language-inputs__container animate__animated animate__fadeIn";
    newLanguageInputContainer.innerHTML = `
      <div class="language-inputs__number">
        <span>${numItems + 1}</span>
        <span onclick="removeLangItem(this)" class="close-icon">
          <ion-icon name="remove-circle-outline"></ion-icon><span class="close-text">Quitar</span>
        </span>
      </div>

      <div class="language-inputs__fields">

        <div>
          <label for="idioma${numItems + 1}Select">Idioma:</label>
          <select class="mat-input mat-input--select idiomas" name="idioma${numItems +
            1}Select" id="idioma${numItems + 1}Select">
            <option value="0">Seleccione</option>
            <option value="Inglés">Inglés</option>
            <option value="Francés">Francés</option>
            <option value="Italiano">Italiano</option>
            <option value="Mandarín">Mandarín</option>
          </select>
        </div>

        <div class="form__inner-grid--row">
          <div>
            <label for="idioma${numItems +
              1}NivelEscrito">Nivel de escritura:</label>
            <select class="mat-input mat-input--select" name="idioma${numItems +
              1}NivelEscrito" id="idioma${numItems + 1}NivelEscrito">
              <option value="0">Seleccione</option>
              <option value="Básico">Básico</option>
              <option value="Intermedio">Principiante</option>
              <option value="Avanzado">Avanzado</option>
            </select>
          </div>

          <div>
            <label for="idioma${numItems +
              1}NivelLectura">Nivel de lectura:</label>
            <select class="mat-input mat-input--select" name="idioma${numItems +
              1}NivelLectura" id="idioma${numItems + 1}NivelLectura">
              <option value="0">Seleccione</option>
              <option value="Básico">Básico</option>
              <option value="Intermedio">Principiante</option>
              <option value="Avanzado">Avanzado</option>
            </select>
          </div>
        </div>

      </div>
    `;

    languageInputs.appendChild(newLanguageInputContainer);
  } else {
    return Toastify({
      text: `Solo se permiten ingresar ${MAX_LANG_INPUTS} idiomas`,
      backgroundColor: `linear-gradient(to right, #01b9fc 0%, #1b67a3)`,
      className: "default-toast",
      stopOnFocus: true,
      offset: {
        x: "1rem",
        y: "4rem"
      }
    }).showToast();
  }
});
