<div>
  <label for="fecha_nacimiento" class="mat-label">Fecha de Nacimiento:</label>
  <input type="date" id="fecha_nacimiento" class="mat-input" value="{{$datos->fecha_nacimiento ?? ''}}"/>
</div>


<div>
  <label for="sexo" class="mat-label">Sexo:</label>
  <select id="sexo" class="mat-input mat-input--select">
    @if ($datos != null)

      <option value="M" @if ($datos->sexo == 'M') selected @endif>Masculino</option>
      <option value="F" @if ($datos->sexo == 'F') selected @endif>Femenino</option>
    @else
      <option value="M">Masculino</option>
      <option value="F">Femenino</option>
    @endif

  </select>
</div>


<div>
  <label for="estado_civil" class="mat-label">Estado civil:</label>
  <select id="estado_civil" class="mat-input mat-input--select">
    @if ($datos != null)
      <option @if($datos->estado_civil == 'Soltero') selected @endif>Soltero</option>
      <option @if($datos->estado_civil == 'Casado') selected @endif>Casado</option>
      <option @if($datos->estado_civil == 'Divorciado') selected @endif>Divorciado</option>
      <option @if($datos->estado_civil == 'Viudo') selected @endif>Viudo</option>
      <option @if($datos->estado_civil == 'Union Libre') selected @endif>Union Libre</option>
    @else
      <option>Soltero</option>
      <option>Casado</option>
      <option>Divorciado</option>
      <option>Viudo</option>
      <option>Union Libre</option>
    @endif
  </select>
</div>

<div>
  <label for="etnia" class="mat-label">Etnia:</label>

  <select id="etnia" class="mat-input mat-input--select">
      @if ($datos != null)
          <option @if ($datos->etnia == 'Mestizo/a') selected @endif value="Mestizo/a" selected>Mestizo/a
          </option>
          <option @if ($datos->etnia == 'Indígena') selected @endif value="Indígena">Indígena</option>
          <option @if ($datos->etnia == 'Afroecuatoriano/a') selected @endif value="Afroecuatoriano/a">
              Afroecuatoriano/a</option>
          <option @if ($datos->etnia == 'Negro/a') selected @endif value="Negro/a">Negro/a</option>
          <option @if ($datos->etnia == 'Mulato/a') selected @endif value="Mulato/a">Mulato/a</option>
          <option @if ($datos->etnia == 'Montubio/a') selected @endif value="Montubio/a">Montubio/a</option>
          <option @if ($datos->etnia == 'Blanco/a') selected @endif value="Blanco/a">Blanco/a</option>
          <option @if ($datos->etnia == 'Otro') selected @endif value="Otro">Otro</option>
          <option @if ($datos->etnia == 'No Registra') selected @endif value="No Registra">No Registra</option>
      @else
          <option value="Mestizo/a" selected>Mestizo/a</option>
          <option value="Indígena">Indígena</option>
          <option value="Afroecuatoriano/a">Afroecuatoriano/a</option>
          <option value="Negro/a">Negro/a</option>
          <option value="Mulato/a">Mulato/a</option>
          <option value="Montubio/a">Montubio/a</option>
          <option value="Blanco/a">Blanco/a</option>
          <option value="Otro">Otro</option>
          <option value="No Registra">No Registra</option>
      @endif

  </select>
</div>

<div>
  <label for="pais_nacionalidad" class="mat-label">Nacionalidad:</label>
  <input type="text" id="pais_nacionalidad" class="mat-input"
      value="{{ $datos->pais_nacionalidad ?? '' }}" />
</div>

<div>
  <label for="pais_nacionalidad" class="mat-label">Pais de nacionalidad:</label>
  <select id="pais_nacionailidad" class="mat-input mat-input--select">
      @if ($datos != null)
          <option @if ($datos->pais_residencia == 'Mestizo/a') selected @endif value="Mestizo/a" selected>Ecuador
          </option>
          <option @if ($datos->pais_residencia == 'Indígena') selected @endif value="Indígena">Colombia</option>
          <option @if ($datos->pais_residencia == 'Afroecuatoriano/a') selected @endif value="Afroecuatoriano/a">Venezuela
          </option>
          <option @if ($datos->pais_residencia == 'Negro/a') selected @endif value="Negro/a">Cuba</option>
          <option @if ($datos->pais_residencia == 'Mulato/a') selected @endif value="Mulato/a">Argentina</option>
          <option @if ($datos->pais_residencia == 'Montubio/a') selected @endif value="Montubio/a">Chile</option>
      @else
          <option>Seleccione pais de residencia</option>
          @foreach ($paises as $pais)
              <option value="{{ $pais->nombre }}">{{ $pais->nombre }}</option>
          @endforeach
      @endif

  </select>
</div>

<div>
  <label for="pais_residencia" class="mat-label">Pais de residencia:</label>
  <select id="pais_residencia" class="mat-input mat-input--select">
      @if ($datos != null)
          <option @if ($datos->pais_residencia == 'ECUADOR') selected @endif value="Mestizo/a" selected>Ecuador
          </option>
          <option @if ($datos->pais_residencia == 'Indígena') selected @endif value="Indígena">Colombia</option>
          <option @if ($datos->pais_residencia == 'Afroecuatoriano/a') selected @endif value="Afroecuatoriano/a">Venezuela
          </option>
          <option @if ($datos->pais_residencia == 'Negro/a') selected @endif value="Negro/a">Cuba</option>
          <option @if ($datos->pais_residencia == 'Mulato/a') selected @endif value="Mulato/a">Argentina</option>
          <option @if ($datos->pais_residencia == 'Montubio/a') selected @endif value="Montubio/a">Chile</option>
      @else
          <option>Seleccione pais de residencia</option>
          @foreach ($paises as $pais)
              <option value="{{ $pais->nombre }}">{{ $pais->nombre }}</option>
          @endforeach
      @endif

  </select>
</div>





<div>
  <label for="provincia" class="mat-label">Provincia de Residencia:</label>
  <select id="provincia" class="mat-input">
      {{-- Viene del JS --}}
  </select>
</div>

<div>
  <label for="ciudad" class="mat-label">Ciudad de Residencia:</label>
  <select id="ciudad" class="mat-input mat-input--select">
      {{-- Viene del JS --}}
  </select>
</div>

<div>
  <label for="sector" class="mat-label">Sector:</label>
  <select id="sector" class="mat-input-select">
    @if ($datos != null)
      {{-- <select id="sector" name="sector" class="form-control validate mb-0 custom-select" required> --}}
      <option value="">- Seleccione...</option>
      <option @if ($datos->sector == 'NORTE/Alboradas') selected @endif value="NORTE/Alboradas">NORTE-Alboradas
      </option>
      <option @if ($datos->sector == 'NORTE/Sauces') selected @endif value="NORTE/Sauces">NORTE-Sauces</option>
      <option @if ($datos->sector == 'NORTE/Kennedy') selected @endif value="NORTE/Kennedy">NORTE-Kennedy</option>
      <option @if ($datos->sector == 'NORTE/Urdesa/Urdenor') selected @endif value="NORTE/Urdesa/Urdenor">
          NORTE–Urdesa-Urdenor</option>
      <option @if ($datos->sector == 'NORTE/Garzota') selected @endif value="NORTE/Garzota">NORTE-Garzota</option>
      <option @if ($datos->sector == 'NORTE/Atarazana/FAE') selected @endif value="NORTE/Atarazana/FAE">
          NORTE-Atarazana–FAE</option>
      <option @if ($datos->sector == 'NORTE/Samanes/Guayacanes') selected @endif value="NORTE/Samanes/Guayacanes">
          NORTE-Samanes–Guayacanes</option>
      <option @if ($datos->sector == 'NORTE/Via Francisco de Orellana') selected @endif value="NORTE/Via Francisco de Orellana">
          NORTE-Vía Francisco de Orellana</option>
      <option @if ($datos->sector == 'NORTE/Via Narcisa de Jesús') selected @endif value="NORTE/Via Narcisa de Jesús">NORTE-Vía
          Narcisa de Jesús</option>
      <option @if ($datos->sector == 'NORTE') selected @endif value="NORTE">NORTE</option>
      <option @if ($datos->sector == 'CENTRO') selected @endif value="CENTRO">CENTRO</option>
      <option @if ($datos->sector == 'SUR/Centenario') selected @endif value="SUR/Centenario">SUR–Centenario
      </option>
      <option @if ($datos->sector == 'SUR/Barrio del Seguro') selected @endif value="SUR/Barrio del Seguro">SUR–Barrio del
          Seguro</option>
      <option @if ($datos->sector == 'SUR/Cdla. Naval') selected @endif value="SUR/Cdla. Naval">SUR–Cdla. Naval
      </option>
      <option @if ($datos->sector == 'SUR/Saiba/Almendros') selected @endif value="SUR/Saiba/Almendros">
          SUR–Saiba–Almendros</option>
      <option @if ($datos->sector == 'SUR/Acacias') selected @endif value="SUR/Acacias">SUR–Acacias</option>
      <option @if ($datos->sector == 'SUR/Esteros/Pradera') selected @endif value="SUR/Esteros/Pradera">
          SUR–Esteros–Pradera</option>
      <option @if ($datos->sector == 'SUR/Cdla 9 de Octubre del Periodista/Valdivia/Sopena') selected @endif
          value="SUR/Cdla 9 de Octubre del Periodista/Valdivia/Sopena">SUR–Cdla 9 de
          Octubre–del Periodista–Valdivia–Sopeña</option>
      <option @if ($datos->sector == 'SUR ESTE') selected @endif value="SUR ESTE">SUR ESTE</option>
      <option @if ($datos->sector == 'SUR OESTE') selected @endif value="SUR OESTE">SUR OESTE</option>
      <option @if ($datos->sector == 'SUR') selected @endif value="SUR">SUR</option>
      <option @if ($datos->sector == 'SAMBORONDON Km 1 al 9.4') selected @endif value="SAMBORONDON Km 1 al 9.4">SAMBORONDÓN
          Km 1 al 9.4</option>
      <option @if ($datos->sector == 'SAMBORONDON Km 9,5 al 14') selected @endif value="SAMBORONDON Km 9,5 al 14">SAMBORONDÓN
          Km 9,5 al 14</option>
      <option @if ($datos->sector == 'AURORA') selected @endif value="AURORA">AURORA</option>
      <option @if ($datos->sector == 'DAULE/Altos del Valle') selected @endif value="DAULE/Altos del Valle">DAULE-Altos del
          Valle</option>
      <option @if ($datos->sector == 'DAULE/CABECERA CANTONAL') selected @endif value="DAULE/CABECERA CANTONAL">
          DAULE-CABECERA CANTONAL</option>
      <option @if ($datos->sector == 'DAULE/Condado') selected @endif value="DAULE/Condado">DAULE-Condado</option>
      <option @if ($datos->sector == 'DAULE KM 1- 11') selected @endif value="DAULE KM 1- 11">DAULE KM 1- 11
      </option>
      <option @if ($datos->sector == 'DAULE/Las Joyas') selected @endif value="DAULE/Las Joyas">DAULE-Las Joyas
      </option>
      <option @if ($datos->sector == 'DAULE/Matices') selected @endif value="DAULE/Matices">DAULE-Matices</option>
      <option @if ($datos->sector == 'DAULE/Plaza Madeira') selected @endif value="DAULE/Plaza Madeira">DAULE-Plaza
          Madeira</option>
      <option @if ($datos->sector == 'DAULE/Sambo City') selected @endif value="DAULE/Sambo City">DAULE-Sambo City
      </option>
      <option @if ($datos->sector == 'DAULE/Santa María de Casa Grande') selected @endif value="DAULE/Santa María de Casa Grande">
          DAULE-Santa María de Casa Grande</option>
      <option @if ($datos->sector == 'DAULE/Villa Club') selected @endif value="DAULE/Villa Club">DAULE-Villa Club
      </option>
      <option @if ($datos->sector == 'DAULE/Villa Italia') selected @endif value="DAULE/Villa Italia">DAULE-Villa Italia
      </option>
      <option @if ($datos->sector == 'DAULE/Volare') selected @endif value="DAULE/Volare">DAULE-Volare</option>
      <option @if ($datos->sector == 'DAULE/Otras Urbanizaciones') selected @endif value="DAULE/Otras Urbanizaciones">
          DAULE-Otras Urbanizaciones</option>
      <option @if ($datos->sector == 'SALITRE/Compostela') selected @endif value="SALITRE/Compostela">SALITRE-Compostela
      </option>
      <option @if ($datos->sector == 'SALITRE/Milan') selected @endif value="SALITRE/Milan">SALITRE-Milán</option>
      <option @if ($datos->sector == 'SALITRE/Otras Urbanizaciones') selected @endif value="SALITRE/Otras Urbanizaciones">
          SALITRE-Otras Urbanizaciones</option>
      <option @if ($datos->sector == 'VIA A LA COSTA-Ceibos') selected @endif value="VIA A LA COSTA-Ceibos">VIA A LA
          COSTA-Ceibos</option>
      <option @if ($datos->sector == 'VIA A LA COSTA-Cimas') selected @endif value="VIA A LA COSTA-Cimas">VIA A LA
          COSTA-Cimas</option>
      <option @if ($datos->sector == 'VIA A LA COSTA-Senderos') selected @endif value="VIA A LA COSTA-Senderos">VIA A LA
          COSTA-Senderos</option>
      <option @if ($datos->sector == 'VIA A LA COSTA-Olivos') selected @endif value="VIA A LA COSTA-Olivos">VIA A LA
          COSTA-Olivos</option>
      <option @if ($datos->sector == 'VIA A LA COSTA-Puerto Azul') selected @endif value="VIA A LA COSTA-Puerto Azul">VIA A LA
          COSTA-Puerto Azul</option>
      <option @if ($datos->sector == 'VIA A LA COSTA-Kms 10-15') selected @endif value="VIA A LA COSTA-Kms 10-15">VIA A LA
          COSTA-Kms 10-15</option>
      <option @if ($datos->sector == 'VIA A LA COSTA-Kms Mayor a 15') selected @endif value="VIA A LA COSTA-Kms Mayor a 15">VIA A
          LA COSTA-Kms Mayor a 15</option>
      <option @if ($datos->sector == 'DURAN') selected @endif value="DURAN">DURÁN</option>
      <option @if ($datos->sector == 'PLAYAS') selected @endif value="PLAYAS">PLAYAS</option>
      <option @if ($datos->sector == 'SALINAS') selected @endif value="SALINAS">SALINAS</option>
      <option @if ($datos->sector == 'BABAHOYO') selected @endif value="BABAHOYO">BABAHOYO</option>
      <option @if ($datos->sector == 'MACHALA') selected @endif value="MACHALA">MACHALA</option>
      <option @if ($datos->sector == 'MILAGRO') selected @endif value="MILAGRO">MILAGRO</option>
      <option @if ($datos->sector == 'QUEVEDO') selected @endif value="QUEVEDO">QUEVEDO</option>
      <option @if ($datos->sector == 'SAMBORONDON CABECERA CANTONAL') selected @endif value="SAMBORONDON CABECERA CANTONAL">
          SAMBORONDON CABECERA CANTONAL</option>
      <option @if ($datos->sector == 'SALITRE CABECERA CANTONAL') selected @endif value="SALITRE CABECERA CANTONAL">SALITRE
          CABECERA CANTONAL</option>
      <option @if ($datos->sector == 'BUCAY') selected @endif value="BUCAY">BUCAY</option>
      <option @if ($datos->sector == 'LA TRONCAL') selected @endif value="LA TRONCAL">LA TRONCAL</option>
      <option @if ($datos->sector == 'YAGUACHI') selected @endif value="YAGUACHI">YAGUACHI</option>
      <option @if ($datos->sector == 'EL TRIUNFO') selected @endif value="EL TRIUNFO">EL TRIUNFO</option>
      <option @if ($datos->sector == 'MARCELINO MARIDUEÑA') selected @endif value="MARCELINO MARIDUEÑA">MARCELINO
          MARIDUEÑA</option>
      <option @if ($datos->sector == 'NOBOL') selected @endif value="NOBOL">NOBOL</option>
      <option @if ($datos->sector == 'OTROS CANTONES PROVINCIA DE LOS RIOS') selected @endif value="OTROS CANTONES PROVINCIA DE LOS RIOS">
          OTROS CANTONES PROVINCIA DE LOS RIOS</option>
      <option @if ($datos->sector == 'OTROS CANTONES PROVINCIA DEL ORO') selected @endif value="OTROS CANTONES PROVINCIA DEL ORO">
          OTROS CANTONES PROVINCIA DEL ORO</option>
      <option @if ($datos->sector == 'OTROS CANTONES PROVINCIA DEL GUAYAS') selected @endif value="OTROS CANTONES PROVINCIA DEL GUAYAS">
          OTROS CANTONES PROVINCIA DEL GUAYAS</option>
      <option @if ($datos->sector == 'OTRO') selected @endif value="OTRO">OTRO</option>

      @endif
  </select>
</div>

<div>
  <label for="discapacidad" class="mat-label">Posee discapacidad?</label>
  <select id="discapacidad" class="mat-input mat-input--select">
      <option>SI</option>
      <option selected>NO</option>
  </select>
</div>

<div id="tipo_discapcidad_container">
  <label for="tipo_discapacidad" class="text-info mb-0" >Tipo de Discapacidad</label>
  <input value="" type="text" id="tipo_discapacidad" name="tipo_discapacidad" class="form-control validate mb-0"
      maxlength="100">
</div>


<div id="porcentaje_container">
  <label id="lbl_porcentaje_discapacidad" for="porcentaje_discapacidad" class="text-info mb-0">Porcentaje</label>
  <input type="text" id="porcentaje_discapacidad" name="porcentaje_discapacidad"
      class="form-control validate mb-0" maxlength="3" pattern="^[0-9]+$">
</div>

<div>
<label class="text-info mb-0">Cómo te enteraste de la Universidad Ecotec</p>
<select name="enteraecotec" id="enteraecotec" class="mat-input mat-input--select" tabindex="-1" style="width: 100%;">

    @if ($contactos_tipos != null)
      <option value="">Seleccione...</option>
      @foreach ($contactos_tipos as $contacto_tipo)
        <option value="{{$contacto_tipo->descripcion}}">{{$contacto_tipo->descripcion}}</option>
      @endforeach
    @else
        <option @if($enteraste == 'Radio' ) selected @endif value="Radio">Radio</option>
        <option @if($enteraste == 'Sitio web' ) selected @endif value="Sitio web">Sitio web</option>
        <option @if($enteraste == 'Correo' ) selected @endif value="Correo">Correo</option>
        <option @if($enteraste == 'Prensa' ) selected @endif value="Prensa">Prensa</option>
        <option @if($enteraste == 'Referidos' ) selected @endif value="Referidos">Referidos</option>
        <option @if($enteraste == 'Convenios' ) selected @endif value="Convenios">Convenios</option>
        <option @if($enteraste == 'Google' ) selected @endif value="Google">Google</option>
        <option @if($enteraste == 'Visita' ) selected @endif value="Visita">Visita</option>
        <option @if($enteraste == 'Red de Maestros' ) selected @endif value="Red de Maestros">Red de Maestros</option>
        <option @if($enteraste == 'Alumni' ) selected @endif value="Alumni">Alumni</option>
    @endif
      </select>
</div>
</div>
