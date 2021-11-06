<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
        <style>

          * {
            margin: 0;
            box-sizing: border-box;
          }
          body {
            font-family: "Poppins", sans-serif;
            font-size: 1.4em;
            font-weight: 500;
            color: #28576f;
          }
          .container {
            background-color: #f3f9f9;
            line-height: 1.5;
            width: 650px;
            margin: 0 auto;
            min-height: 100px;
            padding: 3em 3em 0;
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
            font-size: 2.5em;
            line-height: 1.16em;
          }

          .subtitle {
            margin: 1em 0 2em;
          }

              </style>
    <title>Email</title>
</head>

<body>
    <div class="container">
        <img src="{{$message->embed('mailing/email-ecotec-posgrado/img/logo-ecotec.png')}}" alt="Logo ecotec" width="35%" />

        <h1 class="title-primary">Estimado Postulante</h1>

        <p class="subtitle">
            Sus documentos han sido recibidos y procederemos a la revisión de los mismos. Posterior a ello, usted
            recibirá la confirmación de que su portafolio de documentos ha sido recibido a conformidad.
        </p>
        <p class="subtitle">
            Saludos cordiales.
            Admisiones Posgrado
        </p>
        <img src="{{$message->embed('mailing/email-ecotec-posgrado/img/01.jpg')}}" alt="Imagen" width="100%" />
    </div>
</body>

</html>
