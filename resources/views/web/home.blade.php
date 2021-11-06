@extends('layouts.home') @section('content')
<div class="home__background">
  <div class="container">
    <div class="row">
      <div class="col-md-5 offset-md-7 vh-100 d-flex align-items-center">
        <div class="home__content">
          <img class="home__logo mb-4" src="{{asset('/mailing/email-ecotec-posgrado/img/logo-ecotec.png')}}" alt="Logo Universidad Técnologica Ecotec.">
          <h1 class="home__title">Forma parte de nuestra comunidad Ecotec.</h1>
          <p class="home__description mb-4">
            Inicia tu proceso de admisión registrando tu número de cédula en la
            siguiente casilla...
          </p>
          <form  method="POST" action="{{route('searchPostulante')}}"  id="formulario">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input class="home__input" type="text" placeholder="Número de Cédula" name="cedula" id="cedula" />
            <button class="button button--rounded button--skyblue mt-4 float-right" type="submit">
              Iniciar
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@section('js')
<script>
  $('#formulario').on('submit', (e)=>{
    e.preventDefault();

    // console.log()
  })
</script>

@endsection
@endsection
