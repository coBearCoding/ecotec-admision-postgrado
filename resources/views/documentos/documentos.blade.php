@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Documentos')
@section('js')
<script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/documentos-postulante.js') }}"></script>
<script type="text/javascript">
// Ejemplo de mensaje de error
// Toastify({
//   text: "No se puede cargar el archivo",
//   backgroundColor: `linear-gradient(to right, #01b9fc 0%, #1b67a3)`,
//   className: "default-toast",
//   // close: true,
//   stopOnFocus: true,
//   offset: {
//     x: "1rem",
//     y: '4rem',
//   },
// }).showToast();
</script>
@endsection
@section('content')

<input type="hidden" name="modulo_form" id="modulo_form" value="personales">
<input type="hidden" name="url" id="url" value="personales">

{{--<a href="{{ route('inicio2') }}" id="siguiente" name="siguiente" style="display: none;"></a> --}}
@include('layouts.headers.navbar')

<body>
  <main class="layout-container">
    <section class="information-section general-screen">
      <!-- Background Image -->
      <div class="information-section__backgroundImg">
        <img src="/images/backgrounds/bg-1.png" alt="">
      </div>
      <!-- End Background Image -->
      <div class="information-section__content">
        <h3 class="information-section__title">Admisión en línea Posgrado</h3>
        <div class="progressbar-circle">
          <div id="progressCircle" class="pie-wrapper progress-100 style-2">
            <span class="label"><span id="progressNumber">100</span> <span class="smaller"> %</span></span>
            <div class="pie">
              <div class="left-side half-circle"></div>
              <div class="right-side half-circle"></div>
            </div>
            <div class="shadow"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="content-section">

      <div class="form__container">

        <h3 class="form__title">Documentos</h3>
        @if ($ok)
          <p class="form__description">Todos los documentos fueron cargados a su PORTAFOLIO.</p>
        @else
          <p class="form__description">Por favor, cargar todos los documentos solicitados para continuar con el proceso de
            admisión. Recuerde que los documentos cargados serán parte de su PORTAFOLIO.</p>
        @endif


        <form action="/save-documentos" method="POST" action="/save-datos-financiamiento" enctype="multipart/form-data">
          @csrf

          <div class="form-grid--documents mb-5">

            <div @if ($cedula) hidden @endif>
              <label for="cedula" class="mat-label">Cédula (o Pasaporte):</label>
              <input type="file" id="cedula" name="cedula" class="mat-input--file" accept="application/pdf"/>
              <span class="form__help mt-2">*Solo esta permitido subir hasta 2 MB </span>
            </div>

            <div @if ($hoja_de_vida) hidden @endif>
              <label for="hoja_de_vida" class="mat-label">Hoja de vida (actualizada):</label>
              <input type="file" id="hoja_de_vida" name="hoja_de_vida" class="mat-input mat-input--file" accept="application/pdf"/>
              <span class="form__help mt-2">*Solo esta permitido subir hasta 2 MB </span>
            </div>

            <div @if ($titulo_senescyt) hidden @endif>
              <label for="titulo_senescyt" class="mat-label">Título inscrito en la Senescyt:</label>
              <input type="file" id="titulo_senescyt" name="titulo_senescyt" class="mat-input mat-input--file" accept="application/pdf"/>
              <span class="form__help mt-2">*Solo esta permitido subir hasta 2 MB </span>
            </div>

            <div @if ($titulo_tercer_nivel) hidden @endif>
              <label for="titulo_tercer_nivel" class="mat-label">Título de tercer nivel:</label>
              <input type="file" id="titulo_tercer_nivel" name="titulo_tercer_nivel" class="mat-input mat-input--file" accept="application/pdf"/>
              <span class="form__help mt-2">*Solo esta permitido subir hasta 2 MB </span>
            </div>

            <div @if ($certificado_ingles) hidden @endif>
              <label for="certificado_ingles" class="mat-label">Certificado inglés (Nivel A2):</label>
              <input type="file" id="certificado_ingles" name="certificado_ingles" class="mat-input mat-input--file" accept="application/pdf"/>
              <span class="form__help mt-2">*Solo esta permitido subir hasta 2 MB </span>
            </div>

            <div @if ($recomendacion_acad_lab->first()) hidden @endif>
              <label for="recomendacion_acad_lab" class="mat-label">Recomendación académica y/o laboral N°1:</label>
              <input type="file" id="recomendacion_acad_lab" name="recomendacion_acad_lab" class="mat-input mat-input--file" accept="application/pdf"/>
              <span class="form__help mt-2">*Solo esta permitido subir hasta 2 MB </span>
            </div>

            <div @if ($recomendacion_acad_lab->count()==2) hidden @endif>
              <label for="recomendacion_acad_lab2" class="mat-label">Recomendación académica y/o laboral N°2:</label>
              <input type="file" id="recomendacion_acad_lab2" name="recomendacion_acad_lab2" class="mat-input mat-input--file" accept="application/pdf"/>
              <span class="form__help mt-2">*Solo esta permitido subir hasta 2 MB </span>
            </div>

            <div @if ($carta_motivacion) hidden @endif>
              <label for="carta_motivacion" class="mat-label">Carta de motivación:</label>
              <span class="form__help mt-2">
                <a target="__blank" href="{{asset('docs/carta_motivacion.docx')}}">Formato de carta de motivación</a>
              </span>
              <input type="file" id="carta_motivacion" name="carta_motivacion" class="mat-input mat-input--file" accept="application/pdf"/>
              <span class="form__help mt-2">*Solo esta permitido subir hasta 2 MB </span>
            </div>

          </div>

          <div @if ($ok) hidden @endif class="buttons-group buttons-group--center mt-4 mb-4">
            <button class="button button--rounded button--skyblue" type="submit">Subir documentos</button>
          </div>
        </form>

      </div>

    </section>
  </main>
</body>
@endsection

@section('css')

@endsection
