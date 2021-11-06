@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Datos Familiares')
@section('js')
    <script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
    <script language="javascript" src="{{ asset('js/datos-familiares.js') }}"></script>
@endsection
@section('content')

    <input type="hidden" name="modulo_form" id="modulo_form" value="personales">
    <input type="hidden" name="url" id="url" value="personales">

    {{-- <a href="{{ route('inicio2') }}" id="siguiente" name="siguiente" style="display: none;"></a> --}}
    @include('layouts.headers.navbar')


    <body>
        <main class="layout-container">
            <section class="information-section datos-familiares-screen">
                <!-- Background Image -->
                <div class="information-section__backgroundImg">
                    <img src="/images/backgrounds/bg-1.png" alt="">
                </div>
                <!-- End Background Image -->
                <div class="information-section__content">
                    <h3 class="information-section__title">Admisión en línea</h3>
                    <small class="information-section__subtitle">Queremos cuidarte</small>
                    <div class="progressbar-circle">
                        <div id="progressCircle" class="pie-wrapper progress-40 style-2">
                            <span class="label"><span id="progressNumber">40</span> <span class="smaller">
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
                    <form id="datos-familiares-form" method="POST" action="/save-datos-familiares">

                        @csrf
                        <!-- Vertical Steppers -->

                        <ul class="stepper stepper-vertical">

                            <h3 class="form__title">Datos Familiares</h3>
                            <p class="form__description">A continuación detalle la información de las personas con las
                                que usted viva
                                actualmente.</p>

                            <li class="step active">
                                <a href="#!">
                                    <span class="circle">1</span>
                                    <span class="label">Datos del Padre</span>
                                </a>

                                <div class="step-content step-new-content">

                                    <div class="form-grid--stepper">

                                        <input type="hidden" name="postulante_id" id="postulante_id"
                                            value="{{ $datos->id ?? '' }}">

                                        <div>
                                            <label class="mat-label">Nombres</label>
                                            <input value="{{ $datos->nombre_padre ?? '' }}" type="text" id="nombre_padre"
                                                name="nombre_padre" class="mat-input" maxlength="100" required>
                                        </div>
                                        <div>
                                            <label for="apellido_padre" class="mat-label">Apellidos</label>
                                            <input value="{{ $datos->apellido_padre ?? '' }}" type="text"
                                                id="apellido_padre" name="apellido_padre" class="mat-input"
                                                maxlength="100" required>
                                        </div>

                                        <div>
                                            <p class="mat-label">Direccion</p>
                                            <input value="{{ $datos->direccion_padre ?? '' }}" type="text"
                                                id="domicilio_padre" name="domicilio_padre" class="mat-input"
                                                maxlength="100" required>
                                        </div>

                                        <div>
                                            <label for="p1TelfCell" class="mat-label">Teléfono o Celular:</label>
                                            <input id="telefono_padre" name="telefono_padre" type="text"
                                                class="mat-input" maxlength="10"
                                                onkeypress="return onlyNumbers(event);"
                                                value="{{ $datos->telefono_padre ?? '' }}" />
                                        </div>


                                        <div>
                                            <label class="mat-label">Email</label>
                                            <input value="{{ $datos->email_padre ?? '' }}" type="email" id="email_padre"
                                                name="email_padre" class="mat-input" maxlength="100" required>
                                        </div>


                                        <div>
                                            <label class="mat-label">Empresa</label>
                                            <input value="{{ $datos->empresa_padre ?? '' }}" type="text"
                                                id="empresa_padre" name="empresa_padre" class="mat-input"
                                                maxlength="100" required>
                                        </div>
                                        <div>
                                            <label class="mat-label">Cargo</label>
                                            <input value="{{ $datos->cargo_padre ?? '' }}" type="text" id="cargo_padre"
                                                name="cargo_padre" class="mat-input" maxlength="100" required>
                                        </div>

                                        <div>


                                            <label class="mat-label">Nivel de Educación</label>
                                            <select id="estudios_padre" name="estudios_padre"
                                                class="mat-input mat-input--select" required="">
                                                @if ($datos != null)
                                                    @foreach ($niveles_educacion as $nivel_educacion)
                                                        <option value="{{ $nivel_educacion->des_nivel }}"
                                                            @if ($nivel_educacion->des_nivel == $datos->nivel_educacion_padre) selected @endif>
                                                            {{ $nivel_educacion->des_nivel }}</option>
                                                    @endforeach
                                                @else
                                                    <option selected value="0">Seleccione...</option>
                                                    @foreach ($niveles_educacion as $nivel_educacion)
                                                        <option value="{{ $nivel_educacion->des_nivel }}">
                                                            {{ $nivel_educacion->des_nivel }}</option>
                                                    @endforeach
                                                @endif


                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="step">
                                <a href="#!">
                                    <span class="circle">2</span>
                                    <span class="label">Datos de la Madre</span>
                                </a>


                                <div class="step-content step-new-content" style="display:none">

                                    <div class="form-grid--stepper">

                                        <input type="hidden" name="postulante_id" id="postulante_id"
                                            value="{{ $datos->id ?? '' }}">

                                        <div>
                                            <label class="mat-label">Nombres</label>
                                            <input value="{{ $datos->nombre_madre ?? '' }}" type="text" id="nombre_madre"
                                                name="nombre_madre" class="mat-input" maxlength="100" required>
                                        </div>
                                        <div>
                                            <label for="apellido_padre" class="mat-label">Apellidos</label>
                                            <input value="{{ $datos->apellido_madre ?? '' }}" type="text"
                                                id="apellido_madre" name="apellido_madre" class="mat-input"
                                                maxlength="100" required>
                                        </div>

                                        <div>
                                            <p class="mat-label">Direccion</p>
                                            <input value="{{ $datos->direccion_madre ?? '' }}" type="text"
                                                id="domicilio_madre" name="domicilio_madre" class="mat-input"
                                                maxlength="100" required>
                                        </div>

                                        <div>
                                            <label for="p1TelfCell" class="mat-label">Teléfono o Celular:</label>
                                            <input id="telefono_madre" name="telefono_madre" type="text"
                                                class="mat-input" maxlength="10"
                                                onkeypress="return onlyNumbers(event);"
                                                value="{{ $datos->telefono_madre ?? '' }}" />
                                        </div>


                                        <div>
                                            <label class="mat-label">Email</label>
                                            <input value="{{ $datos->email_madre ?? '' }}" type="email" id="email_madre"
                                                name="email_madre" class="mat-input" maxlength="100" required>
                                        </div>

                                        <div>
                                            <label class="mat-label">Empresa</label>
                                            <input value="{{ $datos->empresa_madre ?? '' }}" type="text"
                                                id="empresa_madre" name="empresa_madre" class="mat-input"
                                                maxlength="100" required>
                                        </div>
                                        <div>
                                            <label class="mat-label">Cargo</label>
                                            <input value="{{ $datos->cargo_madre ?? '' }}" type="text" id="cargo_madre"
                                                name="cargo_madre" class="mat-input" maxlength="100" required>
                                        </div>

                                        <div>


                                            <label class="mat-label">Nivel de Educación</label>
                                            <select id="estudios_madre" name="estudios_madre"
                                                class="mat-input mat-input--select" required="">
                                                @if ($datos != null)
                                                    @foreach ($niveles_educacion as $nivel_educacion)
                                                        <option value="{{ $nivel_educacion->des_nivel }}"
                                                            @if ($nivel_educacion->des_nivel == $datos->nivel_educacion_madre) selected @endif>
                                                            {{ $nivel_educacion->des_nivel }}</option>
                                                    @endforeach
                                                @else
                                                    <option selected value="0">Seleccione...</option>
                                                    @foreach ($niveles_educacion as $nivel_educacion)
                                                        <option value="{{ $nivel_educacion->des_nivel }}">
                                                            {{ $nivel_educacion->des_nivel }}</option>
                                                    @endforeach
                                                @endif


                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="step">
                                <a href="#!">
                                    <span class="circle">3</span>
                                    <span class="label">Personas con las que convive</span>
                                </a>

                                <div class="step-content step-new-content" style="display:none">

                                    <div class="form-grid--stepper">

                                        @if ($datos != null)

                                            <p style="font-weight:bold;">Persona 1</p>
                                            <div>
                                                &nbsp;
                                            </div>
                                            <div>

                                                <label for='persona'>Nombre</label>
                                                <input id='nombre_parentesco1' name='nombre_parentesco1' class='mat-input'
                                                    type='text' value="{{ $datos->nombre_parentesco1 ?? '' }}" />
                                            </div>

                                            <div>

                                                <label for='persona'>Apellido</label>
                                                <input id='apellido_parentesco1' name='apellido_parentesco1' class='mat-input'
                                                    type='text' value="{{ $datos->apellido_parentesco1 ?? '' }}" />
                                            </div>
                                            <div>
                                                <label for='persona'>Tipo Parentesco</label>
                                                <select id='tipo_parentesco1' name='tipo_parentesco1'
                                                    class='mat-input mat-input--select' type='text'>
                                                    @if ($datos->tipo_parentesco1 != null)

                                                        <option value="0">Seleccione..</option>
                                                        <option @if ($datos->tipo_parentesco1 == 'Padre') selected @endif>Padre</option>
                                                        <option @if ($datos->tipo_parentesco1 == 'Madre') selected @endif>Madre</option>
                                                        <option @if ($datos->tipo_parentesco1 == 'Hermano/a') selected @endif>Hermano/a</option>
                                                        <option @if ($datos->tipo_parentesco1 == 'Conyugue') selected @endif>Conyugue</option>

                                                    @else
                                                        <option selected value="0">Seleccione..</option>
                                                        <option>Padre</option>
                                                        <option>Madre</option>
                                                        <option>Hermano/a</option>
                                                        <option>Conyugue</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div>

                                                <label for='persona'>Telefono</label>
                                                <input id='telefono_parentesco1' name='telefono_parentesco1' class='mat-input'
                                                    type='text' value="{{ $datos->telefono_parentesco1 ?? '' }}" />
                                            </div>

                                            <p style="font-weight:bold;">Persona 2</p>
                                            <div>
                                                &nbsp;
                                            </div>
                                            <div>

                                                <label for='persona'>Nombre</label>
                                                <input id='nombre_parentesco2' name='nombre_parentesco2' class='mat-input'
                                                    type='text' value="{{ $datos->nombre_parentesco2 ?? '' }}" />
                                            </div>

                                            <div>

                                                <label for='persona'>Apellido</label>
                                                <input id='apellido_parentesco2' name='apellido_parentesco2' class='mat-input'
                                                    type='text' value="{{ $datos->apellido_parentesco2 ?? '' }}" />
                                            </div>
                                            <div>
                                                <label for='persona'>Tipo Parentesco</label>
                                                <select id='tipo_parentesco2' name='tipo_parentesco2'
                                                    class='mat-input mat-input--select' type='text'>
                                                    @if ($datos->tipo_parentesco2 != null)

                                                        <option value="0">Seleccione..</option>
                                                        <option @if ($datos->tipo_parentesco2 == 'Padre') selected @endif>Padre</option>
                                                        <option @if ($datos->tipo_parentesco2 == 'Madre') selected @endif>Madre</option>
                                                        <option @if ($datos->tipo_parentesco2 == 'Hermano/a') selected @endif>Hermano/a</option>
                                                        <option @if ($datos->tipo_parentesco2 == 'Conyugue') selected @endif>Conyugue</option>

                                                    @else
                                                        <option value="0" selected>Seleccione..</option>
                                                        <option>Padre</option>
                                                        <option>Madre</option>
                                                        <option>Hermano/a</option>
                                                        <option>Conyugue</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div>

                                                <label for='persona'>Telefono</label>
                                                <input id='telefono_parentesco2' name='telefono_parentesco2' class='mat-input'
                                                    type='text' value="{{ $datos->telefono_parentesco2 ?? '' }}" />
                                            </div>

                                            <p style="font-weight:bold;">Persona 3</p>
                                            <div>
                                                &nbsp;
                                            </div>
                                            <div>

                                                <label for='persona'>Nombre</label>
                                                <input id='nombre_parentesco3' name='nombre_parentesco3' class='mat-input'
                                                    type='text' value="{{ $datos->nombre_parentesco3 ?? '' }}" />
                                            </div>

                                            <div>

                                                <label for='persona'>Apellido</label>
                                                <input id='apellido_parentesco3' name='apellido_parentesco3' class='mat-input'
                                                    type='text' value="{{ $datos->apellido_parentesco3 ?? '' }}" />
                                            </div>
                                            <div>
                                                <label for='persona'>Tipo Parentesco</label>
                                                <select id='tipo_parentesco3' name='tipo_parentesco3'
                                                    class='mat-input mat-input--select' type='text'>
                                                    @if ($datos->tipo_parentesco3 != null)

                                                        <option value="0">Seleccione..</option>
                                                        <option @if ($datos->tipo_parentesco3 == 'Padre') selected @endif>Padre</option>
                                                        <option @if ($datos->tipo_parentesco3 == 'Madre') selected @endif>Madre</option>
                                                        <option @if ($datos->tipo_parentesco3 == 'Hermano/a') selected @endif>Hermano/a</option>
                                                        <option @if ($datos->tipo_parentesco3 == 'Conyugue') selected @endif>Conyugue</option>

                                                    @else
                                                        <option selected value="0">Seleccione..</option>
                                                        <option>Padre</option>
                                                        <option>Madre</option>
                                                        <option>Hermano/a</option>
                                                        <option>Conyugue</option>
                                                    @endif

                                                </select>
                                            </div>

                                            <div>

                                                <label for='persona'>Telefono</label>
                                                <input id='telefono_parentesco3' name='telefono_parentesco3' class='mat-input'
                                                    type='text' value="{{ $datos->telefono_parentesco3 ?? '' }}" />
                                            </div>

                                        @else

                                            @for ($i = 1; $i <= 3; $i++)

                                                <p style="font-weight:bold;">Persona {{ $i }}</p>
                                                <div>
                                                    &nbsp;
                                                </div>
                                                <div>

                                                    <label for='persona'>Nombre</label>
                                                    <input id='nombre_parentesco{{ $i }}'
                                                        name='nombre_parentesco{{ $i }}' class='mat-input'
                                                        type='text' />
                                                </div>

                                                <div>

                                                    <label for='persona'>Apellido</label>
                                                    <input id='apellido_parentesco{{ $i }}'
                                                        name='apellido_parentesco{{ $i }}' class='mat-input'
                                                        type='text' />
                                                </div>
                                                <div>
                                                    <label for='persona'>Tipo Parentesco</label>
                                                    <select id='tipo_parentesco{{ $i }}'
                                                        name='tipo_parentesco{{ $i }}'
                                                        class='mat-input mat-input--select' type='text'>
                                                        <option value="0" selected>Seleccione..</option>
                                                        <option>Padre</option>
                                                        <option>Madre</option>
                                                        <option>Hermano/a</option>
                                                        <option>Conyugue</option>
                                                    </select>
                                                </div>

                                                <div>

                                                    <label for='persona'>Telefono</label>
                                                    <input id='telefono_parentesco{{ $i }}'
                                                        name='telefono_parentesco{{ $i }}' class='mat-input'
                                                        type='text' />
                                                </div>

                                            @endfor
                                        @endif
                                    </div>

                                </div>


                            </li>

                            <li class="step">
                                <a href="#!">
                                    <span class="circle">4</span>
                                    <span class="label">Contactos de Emergencia</span>
                                </a>

                                <div class="step-content step-new-content" style="display:none">

                                    <div class="form-grid--stepper">
                                        <div>
                                            <p class="mat-label">En caso de emergencia contactar a:</p>
                                            <input value="{{ $datos->emergencia ?? '' }}" type="text" id="contactoem"
                                                name="contacto_emergencia" required="true" class="mat-input" maxlength="100" required>
                                        </div>
                                        <div>
                                            <p class="mat-label">Su número celular es:</p>
                                            <input value="{{ $datos->celular ?? '' }}" type="number" id="cemergen"
                                                name="celular_emergencia" class="mat-input" maxlength="100" required="true">
                                        </div>
                                    </div>

                                </div>
                            </li>
                </div>

                </ul>

                <div class="buttons-group buttons-group--center mt-4">
                    {{-- <button type="button" class="button button--rounded button--gray" onclick="guardarContinuar()">Guardar y
                        Salir</button> --}}
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
