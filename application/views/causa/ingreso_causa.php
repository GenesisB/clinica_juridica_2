
<div class="fondo_formularios">
  <h2 style="text-align:center">Ingreso Causa Clinica Juridica UNAB</h2>

   <table style="margin:auto;">
	  <tr >
		<td>
		<label  for="id_causa">ID Causa</label>  
		  </td>
		  <td >
			<input id="id_causa" name="id_causa" type="text" >
		  </td>
	  </tr>
	  <tr >
		<td>
		<label  for="materia">Materia</label>  
		  </td>
		  <td >
			<select id="materia" name="materia" >
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
	  <tr >
		<td>
		<label  for="fecha_causa_ingreso">Fecha</label>  
		  </td>
		  <td >
			<?php if($dia){
				echo "<input id=\"fecha_causa_ingreso\" type=\"text\" class=\"form-control input-md\" value='$dia' disabled></input>" ;
			}else{
				echo "<input id=\"fecha_causa_ingreso\" type=\"text\" class=\"form-control input-md\" ></input>";
			}?>
			
			
		  </td>
	  </tr>
	   <tr >
		<td>
		<label  for="fecha_causa_ingreso">Hora</label>  
		  </td>
		  <td >
			<?php if($hora){
				echo "<input id=\"set_hora\"  type=\"text\" class=\"form-control input-md\"  value='$hora' disabled></input>";
			}?>
		  </td>
	  </tr>
	  
	  
	  
	  
	  <tr >
		<td>
		<label  for="list_abogado">Abogado</label>  
		  </td>
		  <td >
			<select id="list_abogados" name="list_abogado"   disabled>
			  <?php
			  
			  echo "<option value='0'>Seleccionar</option>";
			  if (isset($info)) {
							if ($info->num_rows() > 0)
							{
							   foreach ($info->result() as $row)
							   {
								   if($row->rut != $profesor_a_cargar){
									echo "<option value='".$row->rut."'>".$row->nombre."</option>";
								   }
									else{
										echo "<option value='".$row->rut."' selected>".$row->nombre."</option>";
									}
							   }
							}
			  }
			  
			?>
			  </select>
		  </td>
	  </tr>
	  <tr >
		<td>
		<label  for="list_alumnos">Alumno</label>  
		  </td>
		  <td >
			<select id="list_alumnos" name="list_alumnos" >
			  <?php
			  
			  echo "<option value='0'>Seleccionar</option>";
			  if (isset($alumnos)) {
							if ($alumnos->num_rows() > 0)
							{
							   foreach ($alumnos->result() as $row)
							   {
								   echo "<option value='".$row->rut."'>".$row->nombre."</option>";
							   }
							}
			  }
			  
			?>
			  </select>
		  </td>
	  </tr>
	  <tr >
		<td>
		<label  for="nombre_usuario">Nombre Usuario (a)</label>  
		  </td>
		  <td >
			<input id="nombre_usuario" name="nombre_usuario" type="text" >	<img style='cursor:pointer;' onClick="dialogo_buscar_usuarios('C');" src='../../assets/images/lupa.png' height='25px'>
		  
		  </td>
		  
	  </tr>
	  <tr >
		<td>
		<label  for="rut_usuario">RUT</label>  
		  </td>
		  <td >
			<input id="rut_usuario" name="rut_usuario" type="text"  >
		  </td>
	  </tr>
	  <tr >
		<td>
		<label  for="edad">Edad</label>  
		  </td>
		  <td >
			<input id="edad" name="edad" type="text"  >
		  </td>
	  </tr>
	  <tr >
		<td>
		<label  for="domicilio">Domicilio</label>  
		  </td>
		  <td >
			<input id="domicilio" name="domicilio" type="text" >
		  </td>
	  </tr>
	  <tr >
		<td>
		<label  for="telefono">Fono</label>  
		  </td>
		  <td >
			<input id="telefono" name="telefono" type="text"  >
		  </td>
	  </tr>
	  <tr >
		<td>
		<label  for="email">Email</label>  
		  </td>
		  <td >
			<input id="email" name="email" type="text"  >
		  </td>
	  </tr>
	  
	  <tr  style="text-align:justify;">
		  <td >
			<button onclick="ingresar_causa();" >Ingresar Causa</button>
		  </td>
	  </tr>
  </table>

  <div style="margin:auto; padding:10px;  width:100%; display:none;">
    <table style="padding: 0px">
      <tr>
        <td>
          <div style="margin:auto; padding:10px; border: 0.2px  solid black; height:236px; width:95.2%">
            <h3 style="margin-top:0px;">Estado Civil</h3>
            <table>
              <tr>
                <td>Casado</td>
                <td>
                  <input id="rCasado" name="estadoCivil" type="radio"></input>
                </td>
                <td>Soltero</td>
                <td>
                  <input id="rSoltero" name="estadoCivil" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>Viudo</td>
                <td>
                  <input id="rViudo" name="estadoCivil" type="radio"></input>
                </td>
                <td>AUC</td>
                <td>
                  <input id="rAUC" name="estadoCivil" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>Divorciado</td>
                <td>
                  <input id="rDivorciado" name="estadoCivil" type="radio"></input>
                </td>
                <td>Conviviente</td>
                <td>
                  <input id="rConviviente" name="estadoCivil" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <br/>
                  Separado de hecho:
                </td>
              </tr>
              <tr>
                <td>
                  Si
                  <input id="rSi" name="separadoSiNo" type="radio"></input>
                </td>
                <td>
                  No
                  <input id="rNo" name="separadoSiNo" type="radio"></input>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td>
          <div style="margin:auto; padding:10px; border: 0.2px solid black; height:100%; width:100%">
            <h3 style="margin-top:0px;">Situacion Laboral</h3>
            <table>
              <tr>
                <td colspan="3">
                  Independiente:
                  <input id="rIndependiente" name="rSituacionLaboral" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>Estable</td>
                <td>
                  <input id="rEstable" name="rIndependiente" type="radio"></input>
                </td>
                <td>Eventual</td>
                <td>
                  <input id="rEventual" name="rIndependiente" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>Jubilado</td>
                <td>
                  <input id="rJubilado" name="rIndependiente" type="radio"></input>
                </td>
                <td>Estudiante</td>
                <td>
                  <input id="rEstudiante" name="rIndependiente" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>
                  Dependiente:
                  <input id="rIndependiente" name="rSituacionLaboral" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>Con Contrato</td>
                <td>
                  <input id="rConContrato" name="rDependiente" type="radio"></input>
                </td>
                <td>Sin Contrato</td>
                <td>
                  <input id="rSinContrato" name="rDependiente" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <br/>
                  Actividad <input id="txtActividad" name="txtActividad" type="text"></input>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div style="margin:auto; padding:10px; border: 0.2px solid black; height:116px; width:95.2%">
            <h3 style="margin-top:0px;">Tipo de Prevision</h3>
            <table>
              <tr>
                <td>
                  AFP
                  <input id="rAFP" name="prevision" type="radio"></input>
                </td>
                <td>
                  IPS
                  <input id="rIPS" name="prevision" type="radio"></input>
                </td>
                <td>
                  SP
                  <input id="rSP" name="prevision" type="radio"></input>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td>
          <div style="margin:auto; padding:10px; border: 0.2px solid black; height:100%; width:100%">
            <h3 style="margin-top:0px;">Sistema de Salud</h3>
            <table>
              <tr>
                <td>
                  ISAPRE
                  <input id="rIsapre" name="salud" type="radio"></input>
                </td>
                <td>
                  FONASA
                  <input id="rFonasa" name="salud" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>
                  DIPRECA
                  <input id="rDipreca" name="salud" type="radio"></input>
                </td>
                <td>
                  CAPREDENA
                  <input id="rCapredena" name="salud" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>
                  OTRA
                  <input id="rSaludOtra" name="salud" type="text"></input>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div style="margin:auto; padding:10px; border: 0.2px solid black; height:182px; width:95.2%">
            <h3 style="margin-top:0px;">Escolaridad</h3>
            <table>
              <tr>
                <td>
                  Analfabeto
                  <input id="rIletrado" name="escolaridad" type="radio"></input>
                </td>
                <td>
                  Básica
                  <input id="rBasica" name="escolaridad" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>
                  Media
                  <input id="rMedia" name="escolaridad" type="radio"></input>
                </td>
                <td>
                  Técnica
                  <input id="rTecina" name="escolaridad" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>
                  Superior
                  <input id="rSuperior" name="escolaridad" type="radio"></input>
                </td>
                <td>
                  Cursando
                  <input id="rCursando" name="escolaridad" type="radio"></input>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td>
          <div style="margin:auto; padding:10px; border: 0.2px solid black; height:100%; width:100%">
            <h3 style="margin-top:0px;">Grupo Familiar</h3>
            <table>
              <tr>
                <td>
                  Total Personas <input id="txtTotPersonas" name="txtTotPersonas" type="text" />
                </td>
              </tr>
              <tr>
                <td>Adultos</td>
                <td>
                  <input id="txtAdultos" name="txtAdultos" type="text"></input>
                </td>
              </tr>
              <tr>
                <td>Menores </td>
                <td>
                  <input id="txtMenores" name="txtMenores" type="text"></input>
                </td>
              </tr>
              <tr>
                <td> Discapacitados </td>
              </tr>
              <tr>
                <td>
                  SI <input id="rFamSi" name="familia" type="radio" />
                </td>
                <td>
                  NO <input id="rFamNo" name="familia" type="radio" />
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div style="margin:auto; padding:10px; border: 0.2px solid black; height:253px; width:95.2%">
            <h3 style="margin-top:0px;">Situacion Habitacional</h3>
            <table>
              <tr>
                <td>
                  Propia
                </td>
                <td>
                  <input id="rPropia" name="habitacion" type="radio"></input>
                </td>
                <td>
                  Arrendada
                </td>
                <td>
                  <input id="rArrendada" name="habitacion" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>
                  Allegada
                </td>
                <td>
                  <input id="rAllegada" name="habitacion" type="radio"></input>
                </td>
                <td>
                  Prestada
                </td>
                <td>
                  <input id="rPrestada" name="habitacion" type="radio"></input>
                </td>
              </tr>
              <tr>
                <td>Valor dividendo o arriendo </td>
                <td>
                  $ <input id="txtDividento" name="txtDividento" type="text" style="width:90%" />
                </td>
              </tr>
            </table>
          </div>
        </td>      
        <td>
          <div style="margin:auto; padding:10px; border: 0.2px solid black; height:50%; width:100%">
            <h3 style="margin-top:0px;">Ingresos</h3>
            <table>
              <tr>
                <td>
                  $ <input id="txtIng1" name="txtIng1" type="text" />
                </td>
              </tr>
              <tr>
                <td>
                  $ <input id="txtIng2" name="txtIng2" type="text" />
                </td>
              </tr>
              <tr>
                <td>
                  $ <input id="txtIng3" name="txtIng3" type="text"/>
                </td>
              </tr>
              <tr>
                <td>
                  <b>Total</b> $ <input id="txtIngresoTotal" name="txtIngresoTotal" type="text" />
                </td>
              </tr>
            </table>
          </div>
        
          <div style="margin:auto; padding:10px; border: 0.2px solid black; height:50%; width:100%">
            <h3 style="margin-top:0px;">Beneficios Estatales	</h3>
            <table>
              <tr>
                <td>
                  SI <input id="rBenSi" name="beneficio" type="radio" />
                </td>
                <td>
                  NO <input id="rBenNo" name="beneficio" type="radio" />
                </td>
              </tr>
              <tr>
                <td>
                  <b>Indicar cual</b>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr>
      </tr>
    </table>
  </div>
  
	<li style="text-align:justify; margin-left:35px" >
		Declaro bajo juramento que los antecedentes entregados precedentemente son verdaderos; si así no fuere, estoy de acuerdo desde ya, 
		para que se me aplique el Reglamento del Usuario de la Clínicia Jurídica UNAB y que se deje sin efecto o de revoque la presentación del servicio y/o patrocinio y poder que se haya conferio, sea que el caso se encuentre en etapa judicial 
		 o extrajudicial. Asimismo me obligo a consultar en la Clínica, periódicamente, sobre el estado de mi casom como fechs de auudiencias, documentos faltantes, etc; y me obligo a informar a la Clínica mis cambios de domicilio, 
		 de teléfonos, email y a proporcionar oportunamente todos los datos, antecedentes y pruebas necesarios para fundar mis pretensiones o que se me solicite por el abogado o alumno que atienden de mi caso.
		 
	</li>
</div>