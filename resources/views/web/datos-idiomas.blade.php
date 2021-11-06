@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Experiencia Laboral')
@section('js')
<script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script>
{{-- <script type="text/javascript" src="{{ asset('js/language-inputs.js') }}"></script> --}}
<script language="javascript" src="{{ asset('js/datos-idiomas.js') }}"></script>
@endsection
@section('content')

<input type="hidden" name="modulo_form" id="modulo_form" value="personales">
<input type="hidden" name="url" id="url" value="personales">

{{--<a href="{{ route('inicio2') }}" id="siguiente" name="siguiente" style="display: none;"></a> --}}
@include('layouts.headers.navbar')
{{-- @include('layouts.headers.guest') --}}


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
          <div id="progressCircle" class="pie-wrapper progress-85 style-2">
            <span class="label"><span id="progressNumber">85</span> <span class="smaller"> %</span></span>
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
        <form method="POST" action="/save-datos-idiomas" id="save-datos-idiomas-form">
          @csrf
          <div class="form__container--narrow">

            <h3 class="form__title">Datos Idiomas</h3>
            <p class="form__description">A continuación detalle los idiomas que domina con su respectivo nivel.</p>

            <div class="buttons-group buttons-group--right mb-4">
              <button id="agregar_idioma" type="button" class="button button--plain">Agregar +</button>
            </div>

            <div id="idioma_container_1" class="language-inputs">

              <div class="language-inputs__container animate__animated animate__fadeIn">

                <div class="language-inputs__number">
                  <span>1</span>
                </div>

                <div class="language-inputs__fields">
                  <div>
                    <label for="idioma1_id">Idioma: Ingles</label>
                    <input id="idioma1_id" value="46" name="idioma1_id" hidden/>
                  </div>

                  <div class="form__inner-grid--row">
                    <div>
                      <label for="idioma1_escritura">Nivel de escritura:</label>
                        <select class="mat-input mat-input--select" name="idioma1_escritura" id="idioma1_escritura">
                          @if ($datos != null && $datos->idioma1_escritura != null)
                            <option value="0">Seleccione</option>
                            <option value="REGULAR" @if($datos->idioma1_escritura == 'REGULAR') selected @endif>Básico</option>
                            <option value="BUENO" @if($datos->idioma1_escritura == 'BUENO') selected @endif>Intermedio</option>
                            <option value="MUY BUENO" @if($datos->idioma1_escritura == 'MUY BUENO') selected @endif>Avanzado</option>
                          @else
                            <option value="0">Seleccione</option>
                            <option value="REGULAR">Básico</option>
                            <option value="BUENO">Intermedio</option>
                            <option value="MUY BUENO">Avanzado</option>
                          @endif
                        </select>
                    </div>

                    <div>
                      <label for="idioma1_lectura">Nivel de lectura:</label>
                      <select class="mat-input mat-input--select" name="idioma1_lectura" id="idioma1_lectura">
                        @if ($datos != null && $datos->idioma1_lectura != null)
                        <option value="0">Seleccione</option>
                        <option value="REGULAR" @if($datos->idioma1_lectura == 'REGULAR') selected @endif>Básico</option>
                        <option value="BUENO" @if($datos->idioma1_lectura == 'BUENO') selected @endif>Intermedio</option>
                        <option value="MUY BUENO" @if($datos->idioma1_lectura == 'MUY BUENO') selected @endif>Avanzado</option>
                      @else
                        <option value="0">Seleccione</option>
                        <option value="REGULAR">Básico</option>
                        <option value="BUENO">Intermedio</option>
                        <option value="MUY BUENO">Avanzado</option>
                      @endif
                      </select>
                    </div>
                  </div>

                </div>

              </div>

            </div>

            <div id="idioma_container_2" class="language-inputs">

              <div class="language-inputs__container animate__animated animate__fadeIn">

                <div class="language-inputs__number">
                  <span>2</span>
                  <span id="remover_idioma_2" class="close-icon">
                    <ion-icon name="remove-circle-outline"></ion-icon><span class="close-text">Quitar</span>
                  </span>
                </div>

                <div class="language-inputs__fields">

                  <div>
                    <label for="idioma1">Idioma:</label>
                      <select name="idioma2_id" id="idioma2_id" class="mat-input mat-input--select idiomas">
                        @if($datos != null && $datos->idioma2_id != null)
                          @foreach ($idiomas as $idioma)
                            <option value="{{$idioma->id}}" @if($datos->idioma2_id == $idioma->id) selected @endif>{{$idioma->nombre}}</option>
                          @endforeach
                        @else
                          @foreach ($idiomas as $idioma)
                            <option value="{{$idioma->id}}">{{$idioma->nombre}}</option>
                          @endforeach
                        @endif
                    </select>
                  </div>

                  <div class="form__inner-grid--row">
                    <div>
                      <label for="idioma2_escritura">Nivel de escritura:</label>
                        <select class="mat-input mat-input--select" name="idioma2_escritura" id="idioma2_escritura">
                          @if ($datos != null && $datos->idioma2_escritura != null)
                            <option value="0">Seleccione</option>
                            <option value="REGULAR" @if($datos->idioma2_escritura == 'REGULAR') selected @endif>Básico</option>
                            <option value="BUENO" @if($datos->idioma2_escritura == 'BUENO') selected @endif>Intermedio</option>
                            <option value="MUY BUENO" @if($datos->idioma2_escritura == 'MUY BUENO') selected @endif>Avanzado</option>
                          @else
                            <option value="0">Seleccione</option>
                            <option value="REGULAR">Básico</option>
                            <option value="BUENO">Intermedio</option>
                            <option value="MUY BUENO">Avanzado</option>
                          @endif
                        </select>
                    </div>

                    <div>
                      <label for="idioma2_lectura">Nivel de lectura:</label>
                      <select class="mat-input mat-input--select" name="idioma2_lectura" id="idioma2_lectura">
                        @if ($datos != null && $datos->idioma2_lectura != null)
                        <option value="0">Seleccione</option>
                        <option value="REGULAR" @if($datos->idioma2_lectura == 'REGULAR') selected @endif>Básico</option>
                        <option value="BUENO" @if($datos->idioma2_lectura == 'BUENO') selected @endif>Intermedio</option>
                        <option value="MUY BUENO" @if($datos->idioma2_lectura == 'MUY BUENO') selected @endif>Avanzado</option>
                      @else
                        <option value="0">Seleccione</option>
                        <option value="REGULAR">Básico</option>
                        <option value="BUENO">Intermedio</option>
                        <option value="MUY BUENO">Avanzado</option>
                      @endif
                      </select>
                    </div>

                </div>

              </div>

            </div>

            <div id="idioma_container_3" class="language-inputs">

              <div class="language-inputs__container animate__animated animate__fadeIn">

                <div class="language-inputs__number">
                  <span>3</span>
                  <span id="remover_idioma_3" class="close-icon">
                    <ion-icon name="remove-circle-outline"></ion-icon><span class="close-text">Quitar</span>
                  </span>
                </div>

                <div class="language-inputs__fields">

                  <div>
                    <label for="idioma3_id">Idioma:</label>
                      <select name="idioma3_id" id="idioma3_id" class="mat-input mat-input--select idiomas">
                        @if($datos != null)
                          @foreach ($idiomas as $idioma)
                            <option value="{{$idioma->id}}" @if($datos->idioma3_id == $idioma->id) selected @endif>{{$idioma->nombre}}</option>
                          @endforeach
                        @else
                          @foreach ($idiomas as $idioma)
                            <option value="{{$idioma->id}}">{{$idioma->nombre}}</option>
                          @endforeach
                        @endif
                    </select>
                  </div>

                  <div class="form__inner-grid--row">
                    <div>
                      <label for="idioma3_escritura">Nivel de escritura:</label>
                        <select class="mat-input mat-input--select" name="idioma3_escritura" id="idioma3_escritura">
                          @if ($datos != null && $datos->idioma3_escritura != null)
                            <option value="0">Seleccione</option>
                            <option value="REGULAR" @if($datos->idioma3_escritura == 'REGULAR') selected @endif>Básico</option>
                            <option value="BUENO" @if($datos->idioma3_escritura == 'BUENO') selected @endif>Intermedio</option>
                            <option value="MUY BUENO" @if($datos->idioma3_escritura == 'MUY BUENO') selected @endif>Avanzado</option>
                          @else
                            <option value="0">Seleccione</option>
                            <option value="REGULAR">Básico</option>
                            <option value="BUENO">Intermedio</option>
                            <option value="MUY BUENO">Avanzado</option>
                          @endif
                        </select>
                    </div>

                    <div>
                      <label for="idioma3_lectura">Nivel de lectura:</label>
                      <select class="mat-input mat-input--select" name="idioma3_lectura" id="idioma3_lectura">
                        @if ($datos != null && $datos->idioma3_lectura != null)
                        <option value="0">Seleccione</option>
                        <option value="REGULAR" @if($datos->idioma3_lectura == 'REGULAR') selected @endif>Básico</option>
                        <option value="BUENO" @if($datos->idioma3_lectura == 'BUENO') selected @endif>Intermedio</option>
                        <option value="MUY BUENO" @if($datos->idioma3_lectura == 'MUY BUENO') selected @endif>Avanzado</option>
                      @else
                        <option value="0">Seleccione</option>
                        <option value="REGULAR">Básico</option>
                        <option value="BUENO">Intermedio</option>
                        <option value="MUY BUENO">Avanzado</option>
                      @endif
                      </select>
                    </div>
                  </div>

                </div>

              </div>

            </div>

          </div>

          <div class="buttons-group buttons-group--center mt-4">
            <button type="button" class="button button--rounded button--gray" onclick="guardarContinuar()">Guardar y Salir</button>
            <button type="submit" class="button button--rounded button--skyblue">Siguiente</button>
          </div>

        </form>
      </div>

    </section>
  </main>
</body>
@endsection

@section('css')

@endsection
