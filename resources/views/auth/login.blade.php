@extends('layouts.home')
@section('content')
    <div class="login__background">
        <div class="container">
            <div class="row">
                <div class="col-md-5 offset-md-7 vh-100 d-flex align-items-center">
                    <div class="home__content">
                        {{-- <img class="home__logo mb-4" src="/images/brand/logo-ecotec-blue.png"
                            alt="Logo Universidad Técnologica Ecotec." /> --}}
                        <img class="home__logo mb-4" src="{{asset('/mailing/email-ecotec-posgrado/img/logo-ecotec.png')}}" alt="Logo Universidad Técnologica Ecotec.">

                        <h1 class="home__title">Forma parte de nuestra comunidad Ecotec.</h1>
                        <p class="home__description mb-4">
                            Inicia tu proceso de admisión registrando tu número de cédula en la
                            siguiente casilla...
                        </p>
                        <form action="/login-user" method="POST">
                            @csrf

                            @if ($errors->any())
                                <span style="color: red">{{ $errors->first() }}</span>
                            @endif
                            <input class="home__input mb-2" type="email" name="email" placeholder="Email" />
                            <input class="home__input" type="password" name="password" placeholder="Contraseña" />
                            <button class="button button--rounded button--skyblue mt-4 float-right"
                                type="submit.preventDefault">
                                Ingresar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
