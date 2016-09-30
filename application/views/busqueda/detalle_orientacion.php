<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<div style="margin:auto; width:60%;  padding:5px">
  <h2 style="text-align:center">Detalle Orientacion</h2>

  <div style="margin:auto; padding:10px;  width:60%;" class="form-horizontal">
	  <div class="form-group">
		<label class="col-md-4 control-label" for="materia">Materia</label>  
		  <div class="col-md-8">
			<label id="materia" name="materia" class="control-label"></label>
			<select id="materia" name="materia" class="form-control" disabled>
			  <?php
			  if (isset($materia)) {
							if ($materia->num_rows() > 0)
							{
							   foreach ($materia->result() as $row)
							   {
								   foreach($info->result() as $row2){
									   if( $row->id_materia == $row2->MATERIA ){
										echo "<option value='".$row->id_materia."' selected>".$row->nom_materia."</option>";
									   }
								   }
							   }
							}
			  }
			  
			?>
			</select>
		  </div>
	  </div>
	  <div class="form-group">
		<label class="col-md-4 control-label" for="fecha_causa_ingreso">Fecha</label>  
		  <div class="col-md-8">
			<?php foreach($info->result() as $row){
				echo "<input id=\"fecha_causa_ingreso\" type=\"text\" class=\"form-control input-md\" value='".$row->."' disabled></input>" ;
			}?>
			
			
		  </div>
	  </div>
	  <div class="form-group">
		<label class="col-md-4 control-label" for="list_abogado">Abogado</label>  
		  <div class="col-md-8">
			<select id="list_abogados" name="list_abogado"  class="form-control" disabled>
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
		  </div>
	  </div>
	  <div class="form-group">
		<label class="col-md-4 control-label" for="nombre_usuario">Nombre Usuario (a)</label>  
		  <div class="col-md-6">
			<input id="nombre_usuario" name="nombre_usuario" type="text" class="form-control input-md">
		  </div>
		  <div class="col-md-2">
			<img style='cursor:pointer;' onClick="dialogo_buscar_usuarios('C');" src='../../assets/images/lupa.png' height='25px'>
		  </div>
	  </div>
	  <div class="form-group">
		<label class="col-md-4 control-label" for="rut_usuario">RUT</label>  
		  <div class="col-md-8">
			<input id="rut_usuario" name="rut_usuario" type="text"  class="form-control input-md">
		  </div>
	  </div>
	  <div class="form-group">
		<label class="col-md-4 control-label" for="edad">Edad</label>  
		  <div class="col-md-8">
			<input id="edad" name="edad" type="text"  class="form-control input-md">
		  </div>
	  </div>
	  <div class="form-group">
		<label class="col-md-4 control-label" for="domicilio">Domicilio</label>  
		  <div class="col-md-8">
			<input id="domicilio" name="domicilio" type="text" class="form-control input-md">
		  </div>
	  </div>
	  <div class="form-group">
		<label class="col-md-4 control-label" for="telefono">Fono</label>  
		  <div class="col-md-8">
			<input id="telefono" name="telefono" type="text"  class="form-control input-md">
		  </div>
	  </div>
	  <div class="form-group">
		<label class="col-md-4 control-label" for="email">Email</label>  
		  <div class="col-md-8">
			<input id="email" name="email" type="text"  class="form-control input-md">
		  </div>
	  </div>
	  
	  <div class="form-group" style="text-align:justify;">
		  <div class="col-md-8">
			<button onclick="ingresar_causa();" class="btn">Ingresar Causa</button>
		  </div>
	  </div>
  </div>
</div>