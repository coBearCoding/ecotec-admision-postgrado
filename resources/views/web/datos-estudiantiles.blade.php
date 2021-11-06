@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Datos Estudiantiles')
@section('js')
<script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script>
<script language="javascript" src="{{ asset('js/datos-estudiantiles.js') }}"></script>

@endsection
@section('content')

<input type="hidden" name="modulo_form" id="modulo_form" value="personales">
<input type="hidden" name="url" id="url" value="personales">

{{-- <a href="{{ route('inicio2') }}" id="siguiente" name="siguiente" style="display: none;"></a> --}}
@include('layouts.headers.navbar')
{{-- @include('layouts.headers.guest') --}}

<body>
    <main class="layout-container">
        <section class="information-section datos-estudiantiles-screen">
            <!-- Background Image -->
            <div class="information-section__backgroundImg">
                <img src="/images/backgrounds/bg-2.png" alt="">
            </div>
            <!-- End Background Image -->
            <div class="information-section__content">
              <h3 class="information-section__title">Admisión en línea Posgrado</h3>
                <div class="progressbar-circle">
                    <div id="progressCircle" class="pie-wrapper progress-60 style-2">
                        <span class="label"><span id="progressNumber">60</span> <span class="smaller"> %</span></span>
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
                <form id="datos-estudiantiles-form" action="/save-datos-estudiantiles" method="POST">
                    @csrf
                        <!-- Vertical Steppers -->

                        <ul class="stepper stepper-vertical">
                            <h3 class="form__title">Cuéntanos sobre tus estudios</h3>

                            {{-- <li class="step active">
                                <a href="#!">
                                    <span class="circle">1</span>
                                    <span class="label">Estudios Secundarios</span>
                                </a>

                                <div class="step-content step-new-content" style="display: none;">

                                    <div class="form-stepper--wrapper">

                                        <div class="form__inner-grid">

                                            <div>
                                                <label for="secundariosCentroEstudio"
                                                    class="mat-label">Institución:</label>
                                                <select id="institucion_id" name="institucion_id" class="mat-input mat-input--select">
                                                  @if($datos && $datos->institucion_nombre != null)
                                                    <option value="0">Seleccione...</option>
                                                    @foreach ($colegios as $colegio)
                                                      <option value="{{$colegio->id_establecimiento}}" @if($datos->institucion_nombre == $colegio->nombre) selected @endif>{{$colegio->nombre}}</option>
                                                    @endforeach
                                                  @else
                                                    @foreach ($colegios as $colegio)
                                                    <option value="{{$colegio->id_establecimiento}}">{{$colegio->nombre}}</option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                            </div>

                                            <div>
                                                <label for="secundariosTituloObtenido" class="mat-label">Título
                                                    obtenido:</label>
                                                <input id="institucion_titulo" name="institucion_titulo"
                                                    type="text" class="mat-input" required value="{{$datos->institucion_titulo ?? ''}}">
                                            </div>

                                            <span class="form__help"><span class="keyword-help">Importante</span>:
                                                Escribirlo como se detalla en
                                                el Título de
                                                Bachiller.</span>

                                        </div>

                                    </div>

                                    <div class="form-grid--stepper mt-4">

                                        <div>
                                            <label for="secundariosYearInicio" class="mat-label">Año de incio:</label>
                                            @php
                                              $anio_actual = date("Y");
                                              $anio_min = date("Y",strtotime($anio_actual."- 60 year"));
                                              $graduacion = $datos->graduacion ?? '';
                                            @endphp
                                            <select name="institucion_inicio" id="institucion_inicio" required class="mat-input mat-input--select">
                                                @for ($i = $anio_actual; $i >= $anio_min; $i--)
                                                    <option value="{{ $i }}" @if($graduacion == $i) selected @endif>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div>
                                            <label for="secundariosYearFin" class="mat-label">Año de
                                                finalización:</label>
                                            @php
                                              $anio_actual = date("Y");
                                              $anio_min = date("Y",strtotime($anio_actual."- 60 year"));
                                              $graduacion = $datos->graduacion ?? '';
                                            @endphp
                                            <select name="graduacion" id="graduacion" class="mat-input mat-input--select">
                                                @for ($i = $anio_actual; $i >= $anio_min; $i--)
                                                    <option value="{{ $i }}" @if($graduacion == $i) selected @endif>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                    </div>

                                </div>

                            </li> --}}

                            <li class="step active">
                                <a href="#!">
                                    <span class="circle">1</span>
                                    <span class="label">Estudios Universitarios</span>
                                </a>


                                <div class="step-content step-new-content" style="display:none">

                                    <div class="form-stepper--wrapper">

                                        <div class="form__inner-grid">

                                            <div>
                                                <label for="secundariosCentroEstudio"
                                                    class="mat-label">Centro de estudio:</label>
                                                <select id="estudio_institucion_nombre" name="estudio_institucion_nombre" class="mat-input mat-input--select">
                                                    @if($datos && $datos->estudio_institucion_nombre != null)
                                                        <option value="0">Seleccione...</option>
                                                      @foreach ($tercer_nivel as $universidad)
                                                          <option value="{{$universidad->nombre}}" @if($datos->estudio_institucion_nombre == $universidad->nombre) selected @endif>{{$universidad->nombre}}</option>
                                                      @endforeach
                                                      <option value="Otra" @if($datos->estudio_institucion_nombre == "Otra") selected @endif>Otra</option>
                                                    @else
                                                      <option value="0">Seleccione...</option>
                                                      @foreach ($tercer_nivel as $universidad)
                                                          <option value="{{$universidad->nombre}}">{{$universidad->nombre}}</option>
                                                      @endforeach
                                                      <option>Otra</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div id="institucion_otra_container">
                                              <label for="institucion_otra" class="mat-label">Nombre de Institución:</label>
                                              <input id="institucion_otra" name="institucion_otra"
                                                  type="text" class="mat-input" required value="{{$datos->institucion_otra ?? ''}}">
                                          </div>

                                            <div>
                                                <label for="secundariosTituloObtenido" class="mat-label">Título
                                                    obtenido:</label>
                                                <input id="estudio_titulo" name="estudio_titulo"
                                                    type="text" class="mat-input" required value="{{$datos->estudio_titulo ?? ''}}">
                                            </div>

                                            <span class="form__help"><span class="keyword-help">Importante</span>:
                                                Escribirlo como se detalla en
                                                el Registro de
                                                Senescyt, caso
                                                contrario no se valida la matrícula en el máster.</span>

                                        </div>

                                    </div>

                                    {{-- <div class="form-grid--stepper mt-4">

                                        <div>
                                            <label for="secundariosYearInicio" class="mat-label">Año de incio:</label>
                                            @php
                                              $anio_actual = date("Y");
                                              $anio_min = date("Y",strtotime($anio_actual."- 60 year"));
                                              $graduacion = $datos->graduacion ?? '';
                                            @endphp
                                            <select name="estudio_inicio" id="estudio_inicio" class="mat-input mat-input--select">
                                                @for ($i = $anio_actual; $i >= $anio_min; $i--)
                                                    <option value="{{ $i }}" @if($graduacion == $i) selected @endif>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div>
                                            <label for="secundariosYearFin" class="mat-label">Año de
                                                finalización:</label>
                                                @php
                                                $anio_actual = date("Y");
                                                $anio_min = date("Y",strtotime($anio_actual."- 60 year"));
                                                $graduacion = $datos->estudios_graduacion ?? '';
                                              @endphp
                                              <select name="estudio_graduacion" id="estudio_graduacion" class="mat-input mat-input--select">
                                                  @for ($i = $anio_actual; $i >= $anio_min; $i--)
                                                      <option value="{{ $i }}" @if($graduacion == $i) selected @endif>{{ $i }}</option>
                                                  @endfor
                                              </select>
                                        </div>

                                    </div>


                                </div> --}}
                            </li>

                            {{-- <li class="step">
                                <a href="#!">
                                    <span class="circle">3</span>
                                    <span class="label">Estudios de Postgrado (Opcional)</span>
                                </a>

                                <div class="step-content step-new-content" style="display:none">

                                    <div class="form-stepper--wrapper">

                                        <div class="form__inner-grid">

                                            <div>
                                                <label for="secundariosCentroEstudio"
                                                    class="mat-label">Institución:</label>
                                                {{-- <input id="posgrado_institucion_nombre" name="posgrado_institucion_nombre"
                                                    type="text" class="mat-input" value="{{$datos->posgrado_institucion_nombre ?? ''}}">
                                                    <select id="posgrado_institucion_id" name="posgrado_institucion_id" class="mat-input mat-input--select">
                                                      @if($datos && $datos->posgrado_institucion_nombre != null)
                                                          <option value="0">Seleccione...</option>
                                                        @foreach ($tercer_nivel as $universidad)
                                                          <option value="{{$universidad->id_establecimiento}}" @if($datos->posgrado_institucion_nombre == $universidad->nombre) selected @endif>{{$universidad->nombre}}</option>
                                                        @endforeach
                                                      @else
                                                        @foreach ($tercer_nivel as $universidad)
                                                          <option value="{{$universidad->id_establecimiento}}">{{$universidad->nombre}}</option>
                                                        @endforeach
                                                      @endif
                                                    </select>
                                            </div>

                                            <div>
                                                <label for="secundariosTituloObtenido" class="mat-label">Título
                                                    obtenido:</label>
                                                <input id="posgrado_titulo" name="posgrado_titulo"
                                                    type="text" class="mat-input" value="{{$datos->posgrado_titulo ?? ''}}">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-grid--stepper mt-4">

                                      <div>
                                        <label for="secundariosYearInicio" class="mat-label">Año de incio:</label>
                                        @php
                                          $anio_actual = date("Y");
                                          $anio_min = date("Y",strtotime($anio_actual."- 60 year"));
                                          $graduacion = $datos->posgrado_graduacion ?? '';
                                        @endphp
                                        <select name="secundariosYearFin" id="secundariosYearFin" class="mat-input mat-input--select">
                                            @for ($i = $anio_actual; $i >= $anio_min; $i--)
                                                <option value="{{ $i }}" @if($graduacion == $i) selected @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div>
                                        <label for="secundariosYearFin" class="mat-label">Año de
                                            finalización:</label>
                                            @php
                                            $anio_actual = date("Y");
                                            $anio_min = date("Y",strtotime($anio_actual."- 60 year"));
                                            $graduacion = $datos->posgrado_graduacion ?? '';
                                          @endphp
                                          <select name="secundariosYearFin" id="secundariosYearFin" class="mat-input mat-input--select">
                                              @for ($i = $anio_actual; $i >= $anio_min; $i--)
                                                  <option value="{{ $i }}" @if($graduacion == $i) selected @endif>{{ $i }}</option>
                                              @endfor
                                          </select>
                                    </div>

                                    </div>
                                </div>


                            </li> --}}

                        </ul>

                    <div class="buttons-group buttons-group--center mt-4">
                        {{-- <button type="button" class="button button--rounded button--gray"
                            onclick="guardarContinuar()">Guardar y Salir</button> --}}
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
