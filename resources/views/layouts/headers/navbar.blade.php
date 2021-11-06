<header>
  <div class="header__container header__container--expanded">
    <div class="header__info">
      <a href="/">
        <img class="header__logo" src="{{asset('/mailing/email-ecotec-posgrado/img/logo-ecotec.png')}}" alt="Logo">
      </a>

      <button id="menuBtn" class="menu-btn">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="main-navbar">

        <ul class="header__nav">
          <li class="header__item">
            <a class="navbar__link {{ Request::path() == 'perfil' ? 'active' : '' }}" href="/perfil">Perfil</a>
          </li>
          <li class="header__item">
            <a class="navbar__link {{
                Request::path() == 'datos-personales' ||
                Request::path() == 'datos-familiares' ||
                Request::path() == 'datos-estudiantiles' ||
                Request::path() == 'experiencia-laboral' ||
                Request::path() == 'datos-idiomas' ||
                Request::path() == 'datos-financiamiento'
                  ? 'active' : ''
              }}" href="/datos-personales">Solicitud</a>
          </li>
          <li class="header__item">
            <a class="navbar__link {{ Request::path() == 'documentos' ? 'active' : '' }}"
              href="/documentos">Documentos</a>
          </li>
          <li class="header__item">
            <a class="navbar__link {{ Request::path() == 'consultar' ? 'active' : '' }}" href="/consultar">Consultar</a>
          </li>

          {{-- <button class="logout-btn-responsive button button--rounded button--gray"
            type="submit">Cerrar Sesión</button> --}}

        </ul>

      </nav>
    </div>
    <div class="header__username">
      <div>Bienvenido <span>{{Auth::user()->name}}</span></div>
      <form method="POST" action="/logout">
        @csrf
        <button class="button button--rounded button--gray" type="submit">Cerrar Sesión</button>
      </form>
    </div>
  </div>

</header>
