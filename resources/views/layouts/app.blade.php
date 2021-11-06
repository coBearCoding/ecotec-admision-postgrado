<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecotec | @yield('title') </title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

  <!-- BOOSTRAP -->
  <link rel="stylesheet" href="../../node_modules/mdbootstrap/css/bootstrap.min.css">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="../../vendor/@fortawesome/fontawesome-free/css/all.css">

  <!-- ANIMATE CSS -->
  <link rel="stylesheet" href="../../css/animate.min.css">

  <!-- TOASTIFY -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  <!-- SWEETALERT2 -->
  <link rel="stylesheet" href="../../css/sweetalert2.min.css">

  <!-- OLD STYLES -->
  <link rel="stylesheet" href="../../css/style.css">

  {{-- SELECT2 --}}

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="css/app.css">

  @yield('css')
</head>

<script>
window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script>

@yield('content')

@yield('modal')

<!-- IONICONS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- TOASTIFY (Notificaciones) -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- unpkg -->
<script src="https://unpkg.com/@barba/core"></script>
<!-- jsdelivr -->
<script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>

<script src="../../js/jquery.min.js"></script>

<!-- MDBOOSTRAP -->
<script type="text/javascript" src="../../node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="../../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../node_modules/mdbootstrap/js/mdb.min.js"></script>

<script src="../../js/stepper.js"></script>
<script src="../../js/dropdownMenu.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="../../js/main.js"></script>

<script src="./../js/jquery.validate.min.js"></script>
<script src="./../js/jquery.inputmask.js"></script>
<script src="./../js/sweetalert2.all.min.js"></script>

@stack('js')

@yield('js')

</html>
