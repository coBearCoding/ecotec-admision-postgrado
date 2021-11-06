@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Consultar')
@section('js')
<script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script>
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
        {{-- <div class="progressbar-circle">
          <div id="progressCircle" class="pie-wrapper progress-20 style-2">
            <span class="label"><span id="progressNumber">20</span> <span class="smaller"> %</span></span>
            <div class="pie">
              <div class="left-side half-circle"></div>
              <div class="right-side half-circle"></div>
            </div>
            <div class="shadow"></div>
          </div>
        </div> --}}
      </div>
    </section>
    <section class="content-section">

      <div class="form__container">
        <h3 class="form__title">Realice el seguimiento del estado de su solicitud</h3>

        <div class="content-section__inner-wrapper">
          <label class="information-title">N° Solicitud:</label>
          <p class="information-text">{{ $solicitud->cod_solicitud }}</p>

          <label class="information-title">Su solicitud se encuentra en estado:</label>
          <p class="information-text">{{ $estado->nombre }}</p>

          <label class="information-title">Identificación:</label>
          <p class="information-text">{{ $postulante->tipo_documento }} | {{ $postulante->documento }} - {{$postulante->nombres.' '.$postulante->apellidos}}</p>
        </div>


      </div>

    </section>
  </main>
</body>
@endsection

@section('css')
<style type="text/css">
#form_personales label[tipo="error"] {
  display: none;
  font-size: 12px;
  color: #fe0000;
}

.form_error {
  border: 1px solid red !important;
}
</style>
@endsection
