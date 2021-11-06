@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Experiencia Laboral')
@section('js')
    <script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('js/datos-experiencia-laboral.js') }}"></script>
@endsection
@section('content')

    <input type="hidden" name="modulo_form" id="modulo_form" value="personales">
    <input type="hidden" name="url" id="url" value="personales">

    {{-- <a href="{{ route('inicio2') }}" id="siguiente" name="siguiente" style="display: none;"></a> --}}
    @include('layouts.headers.navbar')
    {{-- @include('layouts.headers.guest') --}}

    @php
    use Carbon\Carbon;
    @endphp

    <body>
        <main class="layout-container">
            <section class="information-section experiencia-laboral-screen">
                <!-- Background Image -->
                <div class="information-section__backgroundImg">
                    <img src="/images/backgrounds/bg-3.png" alt="">
                </div>
                <!-- End Background Image -->
                <div class="information-section__content">
                  <h3 class="information-section__title">Admisión en línea Posgrado</h3>
                    <div class="progressbar-circle">
                        <div id="progressCircle" class="pie-wrapper progress-70 style-2">
                            <span class="label"><span id="progressNumber">70</span> <span class="smaller">
                                    %</span></span>
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
                    <form id="datos-estudiantiles-form" method="POST" action="/save-datos-experiencia-laboral">
                        @csrf

                        <!-- Vertical Steppers -->

                        <ul class="stepper stepper-vertical">
                            <h3 class="form__title">Sobre tu experiencia laboral</h3>

                            <li class="step active">
                                <a href="#!">
                                    <span class="circle">1</span>
                                    <span class="label">Datos Generales</span>
                                </a>

                                <div class="step-content step-new-content">

                                    {{-- <div class="form-stepper--wrapper">

                                        <div class="form__inner-grid">

                                            <div>
                                                <label for="profesion" class="mat-label">Profesión:</label>
                                                <input id="profesion" name="profesion" type="text" required
                                                    class="mat-input" value="{{ $datos->profesion ?? '' }}">
                                            </div>

                                        </div>

                                    </div> --}}

                                    <div class="form-grid--stepper mt-4">

                                        <div>
                                            <label for="anios_profesion" class="mat-label">Años de experiencia
                                                profesional:</label>
                                            <input id="anios_profesion" name="anios_profesion" type="text"
                                                class="mat-input" maxlength="2" onkeypress="return onlyNumbers(event);"
                                                value="{{ $datos->anios_profesion ?? '' }}" placeholder="Números" />
                                        </div>

                                        <div>
                                            <label for="anios_trabajando" class="mat-label">Años de experiencia
                                                laboral:</label>
                                            <input id="anios_trabajando" name="anios_trabajando" type="text"
                                                class="mat-input" maxlength="2" onkeypress="return onlyNumbers(event);"
                                                value="{{ $datos->anios_trabajando ?? '' }}" placeholder="Números" />
                                        </div>

                                    </div>


                                </div>

                            </li>

                            <li class="step">
                                <a href="#!">
                                    <span class="circle">2</span>
                                    <span class="label">Trabajo Actual</span>
                                </a>


                                <div class="step-content step-new-content" style="display:none">

                                    <div class="form-grid--stepper">

                                        <div style="grid-column-start: 1; grid-column-end: 3;">
                                            <label for="trabaja_actualmente" class="mat-label">Trabaja
                                                Actualmente?</label>
                                            <select id="trabaja_actualmente" class="mat-input mat-input--select">
                                                <option value="S" @if($datos->empresa != null) selected @endif>Si</option>
                                                <option @if($datos->empresa == null) selected @endif value="N">No</option>
                                            </select>
                                        </div>
                                        <div class="experiencia_content">
                                            <label for="empresa" class="mat-label">Nombre de la empresa:</label>
                                            <input id="empresa" name="empresa" type="text" class="mat-input"
                                                value="{{ $datos->empresa ?? '' }}">
                                        </div>

                                        <div  class="experiencia_content">
                                            <label for="direccion" class="mat-label">Dirección:</label>
                                            <input id="direccion" name="direccion" type="text" class="mat-input"
                                                value="{{ $datos->direccion_trabajo ?? '' }}">
                                        </div>

                                        <div  class="experiencia_content">
                                            <label for="telefono" class="mat-label">Teléfono:</label>
                                            <input id="telefono" name="telefono" type="text" class="mat-input"
                                                maxlength="10" onkeypress="return onlyNumbers(event);"
                                                value="{{ $datos->telefono_trabajo ?? '' }}" />
                                        </div>

                                        <div  class="experiencia_content">
                                            <label for="cargo" class="mat-label">Cargo:</label>
                                            <input name="cargo" id="cargo" type="text" class="mat-input"
                                                value="{{ $datos->cargo ?? '' }}">
                                        </div>

                                        <div  class="experiencia_content">
                                            <label for="sueldo" class="mat-label">Sueldo:</label>
                                            {{-- <input name="sueldo" id="sueldo" type="text" class="mat-input"
                                                maxlength="10" required onkeypress="return onlyNumbers(event);"

                                                value="{{ number_format((int)$datos->sueldo, 2 ) ?? '' }}" /> --}}

                                                {{-- {{$datos->sueldo}} --}}
                                                {{-- <select id="sueldo" name="sueldo" class="mat-input mat-input--select">
                                                  @if($datos->sueldo != null)

                                                    <option value="1">400 - 800</option>
                                                    <option value="2">801 - 1200</option>
                                                    <option value="3">1201 - 1600</option>
                                                    <option value="4">1601 - 2000</option>
                                                    <option value="5">Mas de 2000</option>
                                                  @else
                                                    <option>Seleccione...</option>
                                                    <option value="1" @if(number_format($datos->sueldo, 2) == '1') selected @endif>400 - 800</option>
                                                    <option value="2" @if(number_format($datos->sueldo, 2) == '2') selected @endif>801 - 1200</option>
                                                    <option value="3" @if(number_format($datos->sueldo, 2) == '3') selected @endif>1201 - 1600</option>
                                                    <option value="4" @if(number_format($datos->sueldo, 2) == '4') selected @endif>1601 - 2000</option>
                                                    <option value="5" @if(number_format($datos->sueldo, 2) == '5') selected @endif>Mas de 2000</option>
                                                  @endif
                                                </select> --}}
                                                <select id="sueldo" name="sueldo" class="mat-input mat-input--select">
                                                  @if($datos->sueldo_id != null)
                                                    <option value="0">Seleccione...</option>
                                                    @foreach ($sueldos as $sueldo)
                                                      <option @if($sueldo->sueldo_id == $datos->sueldo_id) selected @endif value="{{$sueldo->sueldo_id}}">{{$sueldo->descripcion}}</option>
                                                    @endforeach
                                                  @else
                                                    <option value="0" selected>Seleccione...</option>
                                                    @foreach ($sueldos as $sueldo)
                                                      <option value="{{$sueldo->sueldo_id}}">{{$sueldo->descripcion}}</option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                        </div>

                                        {{-- <div  class="experiencia_content">
                                            <label for="fecha_ingreso" class="mat-label">Fecha de ingreso:</label>
                                            <input name="fecha_ingreso" id="fecha_ingreso" type="date"
                                                class="mat-input"
                                                value="{{ Carbon::parse($datos->fecha_ingreso)->format('Y-m-d') ?? '' }}" />
                                        </div> --}}
                                    </div>



                                </div>
                            </li>

                            {{-- <li class="step">
              <a href="#!">
                <span class="circle">3</span>
                <span class="label">Trabajo Anterior 1</span>
              </a>

              <div class="step-content step-new-content" style="display:none">

                <div class="form-grid--stepper">

                  <div>
                    <label for="trabajo1_ant_empresa" class="mat-label">Nombre de la empresa:</label>
                    <input id="trabajo1_ant_empresa" name="trabajo1_ant_empresa" type="text" class="mat-input" value="{{$datos->trabajo1_ant_empresa ?? ''}}">
                  </div>

                  <div>
                    <label for="trabajo1_ant_direccion" class="mat-label">Dirección:</label>
                    <input id="trabajo1_ant_direccion" name="trabajo1_ant_direccion" type="text" class="mat-input" value="{{$datos->trabajo1_ant_direccion ?? ''}}">
                  </div>

                  <div>
                    <label for="trabajo1_ant_telefono" class="mat-label">Teléfono:</label>
                    <input id="trabajo1_ant_telefono" name="trabajo1_ant_telefono" type="text" class="mat-input"
                      maxlength="10" onkeypress="return onlyNumbers(event);"  value="{{$datos->trabajo1_ant_telefono ?? ''}}"/>
                  </div>

                  <div>
                    <label for="trabajo1_ant_cargo" class="mat-label">Cargo:</label>
                    <input name="trabajo1_ant_cargo" id="trabajo1_ant_cargo" type="text" class="mat-input" value="{{$datos->trabajo1_ant_cargo ?? ''}}">
                  </div>

                  <div>
                    <label for="trabajo1_ant_sueldo" class="mat-label">Sueldo:</label>
                    <input name="trabajo1_ant_sueldo" id="trabajo1_ant_sueldo" type="text" class="mat-input"
                      maxlength="10" onkeypress="return onlyNumbers(event);"  value="{{$datos->trabajo1_ant_sueldo ?? ''}}"/>
                  </div>

                  <div>
                    <label for="trabajo1_fecha_ingreso" class="mat-label">Fecha de ingreso:</label>
                    <input name="trabajo1_fecha_ingreso" id="trabajo1_fecha_ingreso" type="date"
                      class="mat-input" value="{{Carbon::parse($datos->trabajo1_ant_fecha_ingreso)->format('Y-m-d') ?? ''}}">
                  </div>

                  <div>
                    <label for="trabajo1_fecha_salida" class="mat-label">Fecha de salida:</label>
                    <input name="trabajo1_fecha_salida" id="trabajo1_fecha_salida" type="date"
                      class="mat-input" value="{{Carbon::parse($datos->trabajo1_ant_fecha_salida)->format('Y-m-d') ?? ''}}">
                  </div>

                </div>

              </div>
            </li>

            <li class="step">
              <a href="#!">
                <span class="circle">4</span>
                <span class="label">Trabajo Anterior 2</span>
              </a>

              <div class="step-content step-new-content" style="display:none">

                <div class="form-grid--stepper">

                  <div>
                    <label for="trabajo2_ant_empresa" class="mat-label">Nombre de la empresa:</label>
                    <input id="trabajo2_ant_empresa" name="trabajo2_ant_empresa" type="text" class="mat-input" value="{{$datos->trabajo2_ant_empresa ?? ''}}">
                  </div>

                  <div>
                    <label for="trabajo2_ant_direccion" class="mat-label">Dirección:</label>
                    <input id="trabajo2_ant_direccion" name="trabajo2_ant_direccion" type="text" class="mat-input" value="{{$datos->trabajo2_ant_direccion ?? ''}}">
                  </div>

                  <div>
                    <label for="trabajo2_ant_telefono" class="mat-label">Teléfono:</label>
                    <input id="trabajo2_ant_telefono" name="trabajo2_ant_telefono" type="text" class="mat-input"
                      maxlength="10" onkeypress="return onlyNumbers(event);"  value="{{$datos->trabajo2_ant_telefono ?? ''}}"/>
                  </div>

                  <div>
                    <label for="trabajo2_ant_cargo" class="mat-label">Cargo:</label>
                    <input name="trabajo2_ant_cargo" id="trabajo2_ant_cargo" type="text" class="mat-input" value="{{$datos->trabajo2_ant_cargo ?? ''}}">
                  </div>

                  <div>
                    <label for="trabajo2_ant_sueldo" class="mat-label">Sueldo:</label>
                    <input name="trabajo2_ant_sueldo" id="trabajo2_ant_sueldo" type="text" class="mat-input"
                      maxlength="10" onkeypress="return onlyNumbers(event);"  value="{{$datos->trabajo2_ant_sueldo ?? ''}}"/>
                  </div>

                  <div>
                    <label for="trabajo2_fecha_ingreso" class="mat-label">Fecha de ingreso:</label>
                    <input name="trabajo2_fecha_ingreso" id="trabajo2_fecha_ingreso" type="date"
                      class="mat-input" value="{{Carbon::parse($datos->trabajo2_ant_fecha_ingreso)->format('Y-m-d') ?? ''}}">
                  </div>

                  <div>
                    <label for="trabajo2_fecha_salida" class="mat-label">Fecha de salida:</label>
                    <input name="trabajo2_fecha_salida" id="trabajo2_fecha_salida" type="date"
                      class="mat-input" value="{{Carbon::parse($datos->trabajo2_ant_fecha_salida)->format('Y-m-d') ?? ''}}">
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
