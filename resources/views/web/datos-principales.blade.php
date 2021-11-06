@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Datos Principales')
@section('js')
{{-- <script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script> --}}

<script language="javascript" src="{{ asset('js/datos-principales.js') }}"></script>

@endsection
@section('content')

<input type="hidden" name="modulo_form" id="modulo_form" value="personales">
<input type="hidden" name="url" id="url" value="personales">

{{-- <a href="{{ route('inicio2') }}" id="siguiente" name="siguiente" style="display: none;"></a> --}}
@include('layouts.headers.guest')

<body>
    <main class="layout-container">
        <section class="information-section datos-principales-screen">
            <!-- Background Image -->
            <div class="information-section__backgroundImg">
                <img src="/images/backgrounds/bg-1.png" alt="">
            </div>


            <!-- End Background Image -->
            <div class="information-section__content">
                <h3 class="information-section__title">Admisión en línea Posgrado</h3>
                {{-- <small class="information-section__subtitle">Queremos cuidarte</small> --}}
                <div class="progressbar-circle">
                    <div id="progressCircle" class="pie-wrapper progress-20 style-2">
                        <span class="label"><span id="progressNumber">10</span> <span class="smaller"> %</span></span>
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
                <h3 class="form__title">Inicia tu proceso de Postulación</h3>
                @if($errors->any())
                  @foreach ($errors->all() as $error)
                    <div class="alert alert-warning" role="alert">
                     {{$error}}
                    </div>
                  @endforeach
                @endif


                <form id="datos-principales-form" method="POST" action="/save-datos-principales">
                    @csrf

                    <div class="form-grid--principal mb-5">
                        <div>
                            <label for="nombres" class="mat-label">Nombres:</label>
                            <input type="text" id="nombres" name="nombres" required="true" class="mat-input" maxlength="50"
                                value="{{ old('nombres', ($datos->nombres ?? '')) }}" />
                        </div>

                        <div>
                            <label for="apellidos" class="mat-label">Apellidos:</label>
                            <input type="text" id="apellidos" name="apellidos" required="true" class="mat-input" maxlength="50"
                                value="{{ old('apellidos', ($datos->apellidos ?? '')) }}" />
                        </div>


                        <div>
                            <label for="tipo_documento" class="mat-label">Tipo de identificación:</label>
                            <select name="tipo_documento" id="tipo_documento"
                                class="mat-input mat-input--select">
                                @if ($datos != null)
                                    <option value="C" @if ($datos->tipo_documento == 'C') selected @endif>Cédula de identidad</option>
                                    <option value="P" @if ($datos->tipo_documento == 'P') selected @endif>Pasaporte</option>
                                @else
                                    <option value="C">Cédula de identidad</option>
                                    <option value="P">Pasaporte</option>
                                @endif
                            </select>
                        </div>

                        <div>
                            <label for="documento" class="mat-label">Cédula:</label>
                            <input type="text" id="documento" name="documento" required="true" class="mat-input"
                                value="{{ old('documento', ($datos->documento ??  $cedula)) }}" />
                        </div>

                        <div>
                            <label for="email" class="mat-label">Email:</label>
                            <input type="text" id="email" name="email" required="true" class="mat-input" value="{{ old('email',($datos->email ?? '')) }}" />
                        </div>

                        <div>
                            <label for="telefono" class="mat-label">Teléfono:</label>
                            <input type="text" id="telefono" name="telefono" required="true" class="mat-input"
                                value="{{ old('telefono', ($datos->telefono_personal ?? '')) }}" />
                        </div>

                        <div>
                            <label for="celular" class="mat-label">Celular:</label>
                            <input type="text" id="celular" name="celular" required="true" class="mat-input"
                                value="{{ old('celular', ($datos->celular_personal ?? '')) }}" />
                        </div>

                        {{-- <div>
                            <label for="direccion" class="mat-label">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" required="true" class="mat-input"
                                value="{{ old('direccion', ($datos->direccion_personal ?? '')) }}" />
                        </div> --}}


                        {{-- <div>
                          <label for="sede" class="mat-label">Campus:</label>
                          <select name="sede" id="sede" required="true" class="mat-input mat-input--select">

                            @if ($datos != null)
                              @foreach ($sedes as $sede)
                                <option @if($datos->cod_sede == $sede->nom_sede) selected @endif  value="{{$sede->cod_sede}}">{{$sede->nom_sede}}</option>
                              @endforeach
                            @else
                              <option value="0" selected>Seleccione un campus Ecotec</option>
                              @foreach ($sedes as $sede)
                                <option value="{{$sede->cod_sede}}">{{$sede->nom_sede}}</option>
                              @endforeach
                            @endif

                          </select>
                      </div> --}}

                      {{-- <div style="grid-column-start: 1; grid-column-end: 3;">
                          <label for="carrera" class="mat-label">Carrera:</label>
                          <select name="carrera" id="carrera" required="true" class="mat-input mat-input--select">
                              <option>Seleccione una carrera</option>
                              {{-- Viene del JS
                          </select>
                      </div> --}}

                      <div style="grid-column-start: 1; grid-column-end: 3;">
                          <label for="programa"  class="mat-label">Próximos Programas a Iniciar:</label>
                          <select name="programa" id="programa" required="true" class="mat-input mat-input--select">
                              <option>Seleccione un programa</option>
                              {{-- Viene del JS --}}
                          </select>
                      </div>

                      {{-- <div>
                          <label for="paralelo" class="mat-label">Paralelo:</label>
                          <input readonly type="text" id="paralelo" required="true" name="paralelo"
                              class="mat-input" />
                            {{-- Viene del JS
                      </div> --}}

                      <div>
                          <label for="fecha_inicio" class="mat-label">Fecha de inicio:</label>
                          <input readonly type="date" id="fecha_inicio" name="fecha_inicio" required="true" class="mat-input" />
                              {{-- Viene del JS --}}
                      </div>

                      <div>
                          <label for="horario" class="mat-label">Horario:</label>
                          <input readonly type="text" id="horario" name="horario" required="true" class="mat-input" />
                              {{-- Viene del JS --}}
                      </div>




            </div>

            <div class="buttons-group buttons-group--center mt-4">
                <button id="btn-summit" type="submit" class="button button--rounded button--skyblue">Postularse</button>
            </div>
            </form>
            </div>

        </section>
    </main>
</body>
@endsection

@section('css')

@endsection
