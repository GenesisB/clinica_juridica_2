<script type='text/javascript' src='../../JavaScriptSpellCheck/include.js' ></script>
<script type='text/javascript'>
	$Spelling.DefaultDictionary = "Espanol"; //español Dictionary
	$Spelling.SpellCheckAsYouType('resena');
</script>


<div class="fondo_formularios">
  <h2 style="text-align:center">Ficha de Orientacion Clinica Juridica UNAB</h2>
  <table style="margin:auto;">
    <tr>
      <td>
        Fecha
      </td>
      <td>
		<?php
			$date = date('d/m/Y', time());
			echo "<input id=\"fecha_orientacion\" name=\"fecha_orientacion\" type=\"text\" value=\"$date\" disabled/> ";
		?>
      </td>
    </tr>
    <tr>
      <td>
        Nombre Usuario
      </td>
      <td>
        <input id="nombre_usuario" name="nombre_usuario" type="text"/>&nbsp
		<img style='cursor:pointer;' onClick="dialogo_buscar_usuarios('O');" src='../../assets/images/lupa.png' height='15px'>
      </td>
    </tr>
    <tr>
      <td>
        RUT
      </td>
      <td>
		<input id="rut_usuario" name="rut_usuario" type="text"/>
      </td>

    </tr>
    <tr>
      <td>
        Telefono Contacto
      </td>
      <td>
        <input id="telefono" name="telefono" type="number"/>
      </td>
    </tr>
    <tr>
      <td>
        Domicilio
      </td>
      <td>
        <input id="domicilio" name="domicilio" type="text"/>
      </td>
    </tr>

    <tr>
      <td>
        Correo Electronico
      </td>
      <td>
        <input id="correo_electronico" name="correo_electronico" type="email"/>
      </td>
    </tr>

    <tr>
      <td>
        Materia de la Consulta
      </td>
      <td>
       <select id="materia" name="materia">
		  <?php

		  echo "<option value='0'>Seleccionar</option>";
		  if (isset($materia)) {
						if ($materia->num_rows() > 0)
						{
						   foreach ($materia->result() as $row)
						   {
							   echo "<option value='".$row->id_materia."'>".$row->nom_materia."</option>";
						   }
						}
		  }

		?>
		  </select>
      </td>

    </tr>
    <tr>
      <td>
        Breve reseña de la orientacion brindada
      </td>
      <td>
        <textarea name="resena"  id="resena" cols="45" rows="8"></textarea>
      </td>

    </tr>
  </table>
  <div style="text-align:center;">
  <br><br>
	<button onclick="ingresar_orientacion();" class="btn">Ingresar Orientacion</button>
  </div>
</div>
