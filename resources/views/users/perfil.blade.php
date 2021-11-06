@extends('layouts.app', ['class' => 'bg-default'])
@section('title', 'Perfil')
@section('js')
{{-- <script type="text/javascript" src="{{ asset('js/postulante.js') }}"></script> --}}
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
        <div class="form__container--narrow">

          @if (session('msg'))
            <div class="alert alert-danger">
    	        <p>{{session('msg')}}</p>
            </div>
          @endif

          <h3 class="form__title">Información del Usuario</h3>

          <form class="mb-4" action="/save-informacion-perfil" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form__inner-grid mb-4">
              <div>
                <label for="name" class="mat-label">Nombre completo:</label>
                <input type="text" id="name" name="name" value="{{ $postulante_user->name }}" required class="mat-input" />
              </div>

              <div>
                <label for="email" class="mat-label">Email:</label>
                <input type="text" id="email" name="email" value="{{ $postulante_user->email }}" required class="mat-input" />
              </div>

            </div>

            <div class="buttons-group buttons-group--center mt-4">
              <button class="button button--rounded button--skyblue" type="submit">Actualizar</button>
            </div>

          </form>





          <h3 class="form__title mt-5">Cambiar Contraseña</h3>

          <form class="mb-4" action="/update-password" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form__inner-grid mb-4">
              <div>
                <label for="old_password" class="mat-label">Contraseña actual:</label>
                <input type="password" id="old_password" name="old_password" required class="mat-input" />
              </div>

              <div>
                <label for="new_password1" class="mat-label">Nueva contraseña:</label>
                <input type="password" id="new_password1" name="new_password1" required class="mat-input" />
              </div>

              <div>
                <label for="new_password2" class="mat-label">Confirmar nueva contraseña:</label>
                <input type="password" id="new_password2" name="new_password2" required class="mat-input" />
              </div>

            </div>


            <div class="buttons-group buttons-group--center mt-4">
              <button class="button button--rounded button--skyblue" type="submit">Cambiar constraseña</button>
            </div>
          </form>

        </div>


      </div>

    </section>
  </main>
</body>
@endsection

@section('css')

@endsection
