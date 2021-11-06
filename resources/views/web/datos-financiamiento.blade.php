@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Experiencia Laboral')
@section('js')
<script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/datos-financiamiento.js') }}"></script>
@endsection
@section('content')

<input type="hidden" name="modulo_form" id="modulo_form" value="personales">
<input type="hidden" name="url" id="url" value="personales">

{{--<a href="{{ route('inicio2') }}" id="siguiente" name="siguiente" style="display: none;"></a> --}}
@include('layouts.headers.navbar')
<body>
  <main class="layout-container">
    <section class="information-section experiencia-laboral-screen">
      <!-- Background Image -->
      <div class="information-section__backgroundImg">
        <img src="/images/backgrounds/bg-3.png" alt="">
      </div>
      <!-- End Background Image -->
      <div class="information-section__content">
        <h3 class="information-section__title">Admisión en línea</h3>
        <small class="information-section__subtitle">Queremos cuidarte</small>
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
        <form id="datos-financiamiento-form" method="POST" action="/save-datos-financiamiento">
          @csrf
          <div class="form__container--narrow">

            <h3 class="form__title">Datos de Financiamiento</h3>
            <p class="form__description">Marque las siguientes opciones de financiamiento.</p>

            <form>

              <div>
                <label class="mat-label" for="financiamiento_tipo">Opciones de financiamiento:</label>
                <select name="financiamiento_tipo" id="financiamiento_tipo" class="mat-input mat-input--select">
                  @if($datos != null & $datos->financiamiento_tipo != null)
                    <option value="0">Seleccione</option>
                    @foreach ($financiamiento_tipos as $financiamiento_tipo)
                      <option value="{{$financiamiento_tipo->financiamiento_tipo_nombre}}" @if($datos->financiamiento_tipo == $financiamiento_tipo->financiamiento_tipo_nombre) selected @endif>{{$financiamiento_tipo->financiamiento_tipo_nombre}}</option>
                    @endforeach
                  @else
                    <option value="0">Seleccione</option>
                    @foreach ($financiamiento_tipos as $financiamiento_tipo)
                      <option value="{{$financiamiento_tipo->financiamiento_tipo_nombre}}">{{$financiamiento_tipo->financiamiento_tipo_nombre}}</option>
                    @endforeach

                  @endif
                </select>
              </div>

              <div id="financiamiento_banco_group" class="mt-4 animate__animated animate__fadeIn"
                style="display: none;">
                <label for="financiamiento_banco" class="mat-label"><custom-text id="custom_text_financiamiento">Banco:</custom-text></label>
                <input type="text" name="financiamiento_banco" id="financiamiento_banco" class="mat-input">
              </div>

              {{-- <div id="otrosDetalleGroup" class="mt-4 animate__animated animate__fadeIn" style="display: none;">
                <label for="otrosDetalle" class="mat-label">Detalle:</label>
                <textarea name="otrosDetalle" id="otrosDetalle" rows="2"></textarea>
              </div> --}}


              <div class="e-badge e-badge--flex e-badge--important mt-5">
                <div class="e-badge-check">
                  <input type="checkbox" name="aceptar_terminos" id="aceptar_terminos">
                </div>
                <label for="aceptarTerminos">CERTIFICO, que la información que proporciono en este
                  formulario es veraz. También reconozco que los valores cancelados por concepto de inscripción no son
                  reembolsables.</label>
              </div>
          <div class="buttons-group buttons-group--center mt-4">
            {{-- <button type="button" class="button button--rounded button--gray" onclick="guardarContinuar()">Guardar y Salir</button> --}}
            <button type="submit" id="final_step" class="button button--rounded button--skyblue" disabled>Subir Documentación</button>
          </div>

        </form>
      </div>

    </section>
  </main>
</body>
@endsection

@section('css')

@endsection
