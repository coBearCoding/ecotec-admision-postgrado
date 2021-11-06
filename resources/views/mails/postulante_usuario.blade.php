<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
   <style>
     * {
  margin: 0;
  box-sizing: border-box;
}
body {
  font-family: "Poppins", sans-serif;
  font-size: 1.2em;
  font-weight: 500;
  color: #28576f;
}
.container {
  background-color: #f3f9f9;
  line-height: 1.5;
  width: 600px;
  margin: 0 auto;
  min-height: 100px;
  padding: 3em 3em 0;
  display: block;
  overflow: hidden;
}

.container-py-0 {
  background-color: #f3f9f9;
  line-height: 1.5;
  width: 600px;
  margin: 0 auto;
  padding: 0em 3em ;
}



.text-light {
  font-weight: 400;
  font-size: 1.1em;
  color: #085a9a;
  margin: 1.7em 0 0.5em;
}

.title-primary {
  color: #33bbe4;
}

.title-secondary {
  color: #085a9a;
}

[class|="title"] {
  font-size: 1.8em;
  line-height: 1.16em;
}

.subtitle {
  margin: 1em 0 2em;
}

p{
  text-align: justify;
}
span{
  font-size: 15px;
  color: gray;
  text-align: center;
}

a.btn{
  background-color: #085a9a;
  color: white;
  padding: 10px 20px;
  border-radius: 30px;
  text-decoration: none;
}
img{margin:0 !important; padding: 0  !important;}

   </style>

    <title>Email</title>
  </head>

  <body>
    <div class="container" >
      <center> <img src="img/logo-ecotec.png" alt="Logo ecotec" width="35%" /> </center>

      <p class="text-light">#Nombre de Postulante#</p>
      <h1 class="title-primary">Bienvenido a</h1>
      <h1 class="title-secondary">Posgrado ECOTEC.</h1>
      <p class="subtitle">
        Tus datos personales han sido recibidos.
      </p>
    </div>
    <div class="">
      <div class="container" style="padding: 0; "  >
        <div class="container" style=" background:#00bbfe; margin-bottom: 0 !important; padding-bottom: 0 !important;"  >
          A continuación, encontrarás el brochure del programa <strong>XXXXXXXXXXX</strong>.
        </div>
        <a href="#">
          <img src="img/download.jpg" alt="Imagen" width="100%" />
        </a>
      </div>
    </div>
    <div class="container-py-0">
      <p>El valor de inversión del programa es de <strong>USD X,XXX.00</strong>  y contamos con opciones de financiamiento que te permitirán alcanzar tu desarrollo profesional.</p>
      <br>
      <p>Tu gestor asignado para el proceso de admisión es <strong>XXXXXXXXX</strong>.</p>
      <br>
      <br>
      <center><a href="{{ route('login') }}" class="btn">Continuar con el Proceso</a></center>
      <br>
      <br>
      <p>Saludos cordiales.<br>
        Admisiones Posgrado</p>
    </div>
    <div class="container">
      <span>
        Para consultas y comentarios, sírvase contactarnos a la dirección de correo posgrado@ecotec.edu.ec y al PBX (04) 3723400 ext. 465
      </span>
      <br><br>
      <img src="img/footer.jpg" alt="Imagen" width="100%" />
    </div>


  </body>
</html>
