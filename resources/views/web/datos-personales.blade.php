@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Datos Personales')
@section('js')
    <script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script> --}}
    <script language="javascript" src="{{ asset('js/datos-personales.js') }}"></script>
@endsection
@section('content')

    <input type="hidden" name="modulo_form" id="modulo_form" value="personales">
    <input type="hidden" name="url" id="url" value="personales">

    {{-- <a href="{{ route('inicio2') }}" id="siguiente" name="siguiente" style="display: none;"></a> --}}
    @include('layouts.headers.navbar')

    <body>
        <main class="layout-container">
            <section class="information-section datos-personales-screen">
                <!-- Background Image -->
                <div class="information-section__backgroundImg">
                    <img src="/images/backgrounds/bg-1.png" alt="">
                </div>
                <!-- End Background Image -->
                <div class="information-section__content">
                  <h3 class="information-section__title">Admisión en línea Posgrado</h3>
                    <div class="progressbar-circle">
                        <div id="progressCircle" class="pie-wrapper progress-20 style-2">
                            <span class="label"><span id="progressNumber">20</span> <span class="smaller">
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
                    <form id="datos-personales-form" method="POST" action="/save-datos-personales"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Vertical Steppers -->
                        <ul class="stepper stepper-vertical">
                            <h3 class="form__title">Formulario de Inscripción</h3>

                            <li class="step active">
                                <a href="#!">
                                    <span class="circle">1</span>
                                    <span class="label">Cuéntanos más de ti</span>
                                </a>

                                <div class="step-content step-new-content">

                                    <div class="form-grid--stepper">

                                        <div style="grid-column-start: 1; grid-column-end: 3;">
                                            @if ($solicitud_documentos == null)
                                                <label for="foto_carnet" class="mat-label">Foto tamano carnet (Peso
                                                    máximo 2MB):</label>
                                                <input type="file" id="foto_carnet" name="foto_carnet"
                                                    class="mat-input" value="" accept=".png, .jpeg, .jpg" />
                                                @if ($errors->any())
                                                    <span style="color: red">{{ $errors->first() }}</span>
                                                @endif
                                            @endif
                                        </div>

                                        <div>
                                            <label for="nombres" class="mat-label">Nombres:</label>
                                            <input id="nombres" name="nombres" type="text" required="true"
                                                class="mat-input" maxlength="50" value="{{ $datos->nombres ?? '' }}" />
                                        </div>

                                        <div>
                                            <label for="apellidos" class="mat-label">Apellidos:</label>
                                            <input id="apellidos" name="apellidos" type="text" required="true"
                                                class="mat-input" maxlength="50"
                                                value="{{ $datos->apellidos ?? '' }}" />
                                        </div>

                                        <div>
                                            <label for="tipoIdentificacion" class="mat-label">Tipo de
                                                identificación:</label>
                                            <select disabled id="tipo_identificacion" class="mat-input mat-input--select">
                                                @if ($datos != null)
                                                    <option value="C" @if ($datos->tipo_documento == 'C') selected @endif>Cédula de identidad</option>
                                                    <option value="P" @if ($datos->tipo_documento == 'P') selected @endif>Pasaporte</option>
                                                @else
                                                    <option value="C">Cédula de identidad</option>
                                                    <option value="P">Pasaporte</option>
                                                @endif
                                            </select>
                                            <input hidden name="tipo_identificacion" value="{{ $datos->tipo_documento }}" />
                                        </div>

                                        <div>
                                            <label for="numIdentificacion" class="mat-label">Cédula:</label>
                                            <input readonly type="text" id="documento" name="documento"
                                                class="mat-input" maxlength="10"
                                                onkeypress="return onlyNumbers(event);" required="true"
                                                value="{{ $datos->documento ?? '' }}" />
                                        </div>

                                        <div>
                                            <label for="fecha_nacimiento" class="mat-label">Fecha de
                                                nacimiento:</label>
                                            <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" required="true"
                                                class="mat-input" value="{{ $datos->fecha_nacimiento ?? '' }}" />
                                        </div>

                                        <div>
                                            <label for="estado_civil" class="mat-label">Estado civil:</label>
                                            <select id="estado_civil" name="estado_civil"
                                                class="mat-input mat-input--select">
                                                @if ($datos != null)
                                                    <option @if ($datos->estado_civil == 'Soltero') selected @endif>Soltero</option>
                                                    <option @if ($datos->estado_civil == 'Casado') selected @endif>Casado</option>
                                                    <option @if ($datos->estado_civil == 'Divorciado') selected @endif>Divorciado</option>
                                                    <option @if ($datos->estado_civil == 'Viudo') selected @endif>Viudo</option>
                                                    <option @if ($datos->estado_civil == 'Union Libre') selected @endif>Union Libre</option>
                                                @else
                                                    <option>Seleccione...</option>
                                                    <option>Soltero</option>
                                                    <option>Casado</option>
                                                    <option>Divorciado</option>
                                                    <option>Viudo</option>
                                                    <option>Union Libre</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div>
                                            <label for="pais_nacionalidad" class="mat-label">Pais de
                                                nacionalidad:</label>
                                            <select id="pais_nacionalidad" name="pais_nacionalidad"
                                                class="mat-input mat-input--select">
                                                @if ($datos != null)
                                                    @foreach ($paises as $pais)
                                                        <option @if ($datos->pais_nacionalidad == $pais->nombre) selected @endif value="{{ $pais->nombre }}">
                                                            {{ $pais->nombre }}</option>
                                                    @endforeach
                                                @else
                                                    <option selected>Seleccione pais de residencia</option>
                                                    @foreach ($paises as $pais)
                                                        <option value="{{ $pais->nombre }}">{{ $pais->nombre }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>

                                        {{-- Este campo no existe en la base de datos, no se esta guardando --}}
                                        <div>
                                            <label for="nacionalidad" class="mat-label">Nacionalidad:</label>
                                            <input type="text" id="nacionalidad" name="nacionalidad" required
                                                class="mat-input" value="{{ $datos->nacionalidad ?? '' }}" />
                                        </div>
                                        {{-- fin --}}

                                        <div>
                                            <label for="identificacionEtnica" class="mat-label">Identificación
                                                Étnica:</label>
                                            <select name="etnia" id="etnia" class="mat-input mat-input--select">

                                                @if ($datos != null)
                                                    @foreach ($etnias as $etnia)
                                                        <option @if (strtoupper($datos->etnia) == $etnia->des_etnia) selected @endif value="{{ $etnia->des_etnia }}">
                                                            {{ $etnia->des_etnia }}</option>
                                                    @endforeach
                                                @else
                                                    <option>Seleccione...</option>
                                                    @foreach ($etnias as $etnia)
                                                        <option value="{{ $etnia->des_etnia }}">{{ $etnia->des_etnia }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div>
                                          <label for="sexo" class="mat-label">Sexo:</label>
                                          <select name="sexo" id="sexo" class="mat-input mat-input--select">
                                              @if($datos != null)
                                                  <option value="">Seleccione...</option>
                                                  <option value="M" @if($datos->sexo == "M") selected @endif>Masculino</option>
                                                  <option value="F" @if($datos->sexo == "F") selected @endif>Femenino</option>
                                              @else
                                                  <option value="" selected>Seleccione...</option>
                                                  <option value="M">Masculino</option>
                                                  <option value="F">Femenino</option>
                                              @endif
                                          </select>
                                      </div>

                                    </div>


                                </div>

                            </li>

                            <li class="step">
                                <a href="#!">
                                    <span class="circle">2</span>
                                    <span class="label">Deseamos que tu visita sea cómoda</span>
                                </a>


                                <div class="step-content step-new-content" style="display:none">
                                    <div class="form-stepper--wrapper">
                                        <div>
                                            <label for="discapacidad" class="mat-label">¿Posees alguna
                                                discapacidad?</label>
                                            <select name="discapacidad" id="discapacidad"
                                                class="mat-input mat-input--select">
                                                @if ($datos != null)
                                                    <option @if ($datos->discapacidad == 'SI') selected @endif value="SI">Sí</option>
                                                    <option @if ($datos->discapacidad == 'NO') selected @endif value="NO" selected>No</option>
                                                @else
                                                    <option value="SI">Sí</option>
                                                    <option value="NO" selected>No</option>
                                                @endif

                                            </select>
                                        </div>

                                        <div id="tipo_discapcidad_container">
                                            <label for="tipo_discapacidad" class="text-info mb-0">Tipo de
                                                Discapacidad</label>
                                            <select name="tipo_discapacidad" id="tipo_discapacidad"
                                                class="mat-input mat-input--select" @if ($datos->tipo_discapacidad && $datos->tipo_discapacidad == 'SI') required="true" @endif>
                                                @if ($datos->tipo_discapacidad != null)
                                                  <option value="0">Seleccione...</option>
                                                    @foreach ($tipos_discapacidad as $tipo_discapacidad)
                                                        <option @if ($datos->tipo_discapacidad == $tipo_discapacidad->des_tipo_discapacidad) selected @endif
                                                            value="{{ $tipo_discapacidad->des_tipo_discapacidad }}">
                                                            {{ $tipo_discapacidad->des_tipo_discapacidad }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="0" selected>Seleccione...</option>
                                                    @foreach ($tipos_discapacidad as $tipo_discapacidad)
                                                        <option value="{{ $tipo_discapacidad->des_tipo_discapacidad }}">
                                                            {{ $tipo_discapacidad->des_tipo_discapacidad }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div id="porcentaje_container">
                                            <label id="lbl_porcentaje_discapacidad" for="porcentaje_discapacidad"
                                                class="text-info mb-0">Porcentaje</label>
                                            <input type="text" id="porcentaje_discapacidad" name="porcentaje_discapacidad"
                                                @if ($datos->tipo_discapacidad && $datos->tipo_discapacidad == 'SI') required="true" @endif class="mat-input" maxlength="3"
                                                pattern="^[0-9]+$" value="{{ $datos->porcentaje_discapacidad ?? '' }}">
                                        </div>

                                        <div id="conadis_container">
                                          <label id="lbl_conadis" for="conadis"
                                              class="text-info mb-0">Conadis</label>
                                          <input type="text" id="conadis" name="conadis"
                                              @if ($datos->tipo_discapacidad && $datos->tipo_discapacidad == 'SI') required="true" @endif class="mat-input" maxlength="10"
                                              pattern="^[0-9]+$" value="{{ $datos->conadis ?? '' }}">
                                      </div>
                                    </div>


                                </div>
                            </li>

                            <li class="step">
                                <a href="#!">
                                    <span class="circle">3</span>
                                    <span class="label">¿Dónde podemos encontrarte?</span>
                                </a>

                                <div class="step-content step-new-content" style="display:none">

                                    <div class="form-grid--stepper">

                                        <div>
                                            <label for="pais_residencia" class="mat-label">País de residencia:</label>
                                            <select name="pais_residencia" id="pais_residencia"
                                                class="mat-input mat-input--select">
                                                @if ($datos != null)
                                                    @foreach ($paises as $pais)
                                                        <option @if ($datos->pais_residencia == $pais->nombre) selected @endif value="{{ $pais->nombre }}">
                                                            {{ $pais->nombre }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">Seleccione un país</option>
                                                    @foreach ($paises as $pais)
                                                        <option value="{{ $pais->nombre }}">{{ $pais->nombre }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div>
                                            <label for="provincia" class="mat-label">Provincia de residencia:</label>
                                            <select name="provincia" id="provincia" class="mat-input mat-input--select">
                                                {{-- VIENE DEL JS --}}
                                            </select>
                                        </div>

                                        <div>
                                            <label for="ciudad" class="mat-label">Cantón de residencia:</label>
                                            <select name="canton" id="canton" class="mat-input mat-input--select">
                                                <option value="">Seleccione un cantón</option>
                                                {{-- VIENE DEL JS --}}
                                            </select>
                                        </div>

                                        <div>
                                            <label for="direccionDomicilio" class="mat-label">Direccion
                                                domiciliaria:</label>
                                            <input id="direccion_domicilio" name="direccion_domicilio" type="text"
                                                required="true" class="mat-input" maxlength="100"
                                                value="{{ $datos->direccion_personal ?? '' }}" />
                                        </div>

                                        {{-- <div>
                                            <label for="direccionTrabajo" class="mat-label">Direccion de
                                                trabajo:</label>
                                            <input id="direccion_trabajo" name="direccion_trabajo" type="text"
                                                class="mat-input" maxlength="100"
                                                value="{{ $datos->direccion_trabajo ?? '' }}" />
                                        </div> --}}

                                    </div>

                                </div>
                            </li>

                            <li class="step ">
                                <a href="#!">
                                    <span class="circle">4</span>
                                    <span class="label">¿Cómo podemos contactarte?</span>
                                </a>

                                <div class="step-content step-new-content" style="display:none">
                                    <div class="form-grid--stepper mb-4">
                                        <div>
                                            <label for="telefonoDomicilio" class="mat-label">Teléfono
                                                (domicilio):</label>
                                            <input id="telefono_domicilio" name="telefono_domicilio" type="text"
                                                class="mat-input" maxlength="10"
                                                onkeypress="return onlyNumbers(event);"
                                                value="{{ $datos->telefono_personal ?? '' }}" />
                                        </div>

                                        {{-- <div>
                                            <label for="telefonoTrabajo" class="mat-label">Teléfono (trabajo):</label>
                                            <input id="telefono_trabajo" name="telefono_trabajo" type="text"
                                                class="mat-input" maxlength="10"
                                                onkeypress="return onlyNumbers(event);"
                                                value="{{ $datos->telefono_trabajo ?? '' }}" />
                                        </div> --}}

                                        <div>
                                            <label for="celular" class="mat-label">Celular:</label>
                                            <input id="celular" name="celular" type="text" class="mat-input"
                                                maxlength="10" onkeypress="return onlyNumbers(event);"
                                                value="{{ $datos->celular_personal ?? '' }}" />
                                        </div>

                                        <div>
                                            <label for="email" class="mat-label">Email:</label>
                                            <input readonly id="email" name="email" type="text" class="mat-input"
                                                value="{{ $datos->email ?? '' }}">
                                        </div>

                                        <div>
                                            <label for="medios_contactos" class="mat-label">Medio por el cual nos contactaste:</label>
                                            {{-- <input id="medios_contactos" name="medios_contactos" type="text"
                                                class="mat-input" value="{{ $datos->medio_contacto ?? '' }}"> --}}
                                                <select id="medios_contactos" name="medios_contactos" class="mat-input mat-input--select">
                                                  @if($datos->medio_contacto != null)
                                                    <option value="0">Seleccione...</option>
                                                    @foreach ($contactos_tipos as $contacto_tipo)
                                                      <option value="{{$contacto_tipo->codigo}}" @if($contacto_tipo->codigo == $datos->medio_contacto) selected @endif>{{$contacto_tipo->descripcion}}</option>
                                                    @endforeach
                                                  @else
                                                    <option value="0">Seleccione...</option>
                                                    @foreach ($contactos_tipos as $contacto_tipo)
                                                      <option value="{{$contacto_tipo->codigo}}">{{$contacto_tipo->descripcion}}</option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                        </div>

                                        <div>
                                          <p class="mat-label">En caso de emergencia contactar a:</p>
                                          <input value="{{ $datos->emergencia ?? '' }}" type="text" id="contactoem"
                                              name="contacto_emergencia" required="true" class="mat-input"
                                              maxlength="100" required>
                                      </div>
                                      <div>
                                          <p class="mat-label">Su número celular es:</p>
                                          <input value="{{ $datos->celular_emergencia ?? '' }}" type="number" id="cemergen"
                                              name="celular_emergencia" class="mat-input" maxlength="100"
                                              required="true">
                                      </div>
                                    </div>



                                    {{-- <div class="form-stepper--wrapper">

                  <label class="mat-label">
                    Perfiles sociales:
                  </label>

                  <div class="social-form-group mt-2">
                    <label for="facebook" class="mat-label">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </label>
                    <input id="facebook" name="facebook" type="text" class="mat-input" value="{{$datos->facebook ?? ''}}">
                  </div>

                  <div class="social-form-group mt-2">
                    <label for="instagram" class="mat-label">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </label>
                    <input id="instagram" name="instagram" type="text" class="mat-input" value="{{$datos->instagram ?? ''}}">
                  </div>

                  <div class="social-form-group mt-2">
                    <label for="linkedin" class="mat-label">
                      <ion-icon name="logo-linkedin"></ion-icon>
                    </label>
                    <input id="linkedin" name="linkedin" type="text" class="mat-input" value="{{$datos->linkedin ?? ''}}">
                  </div>

                  <div class="social-form-group mt-2">
                    <label for="twitter" class="mat-label">
                      <ion-icon name="logo-twitter"></ion-icon>
                    </label>
                    <input id="twitter" name="twitter" type="text" class="mat-input" value="{{$datos->twitter ?? ''}}">
                  </div>

                  <div class="social-form-group mt-2">
                    <label for="tiktok" class="mat-label">
                      <ion-icon name="logo-tiktok"></ion-icon>
                    </label>
                    <input id="tiktok" name="tiktok" type="text" class="mat-input" value="{{$datos->tiktok ?? ''}}">
                  </div>

                </div> --}}


                                </div>

                            </li>
                        </ul>

                        <div class="buttons-group buttons-group--center mb-4">
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
