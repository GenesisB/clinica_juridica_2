<div Style="margin:auto; width:60%;  padding:5px; text-align: center;"> 

<h2>Horario Personal</h2>

<br>


<?php
	$lunes = true;
	$martes = true;
	$miercoles = true;
	$jueves = true;
	$viernes = true;
	
	
	foreach ($horario as $valor) { //Dia Lunes
		if($valor["dia"] == "Lunes"){
			if($lunes){
				echo "<h2 class='cab_horario' >Lunes ".$valor["fecha_asignacion"]."</h2>";
				$lunes = false;
			}
			echo $valor["hora_inicio"]." / ".$valor["hora_fin"]."  -  Tipo: ".$valor["tipo"];;
			echo "<br>";
			if($valor["tipo"]=="Causa"){
				echo "<td><img title='Haga click aqui para ver detalles de la Causa' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_causa/".$valor["id_causa"]."\");' src='../../assets/images/info.png' height='15px'>Ver Detalle</td>";
			
			}else{
			}
									
			
			echo "<hr style='border-color:#08088A; width:90%;'><br>";
			
		}		
	}
	
	foreach ($horario as $valor) { //Dia Martes
		if($valor["dia"] == "Martes"){
			if($martes){
				echo "<h2 class='cab_horario' >Martes ".$valor["fecha_asignacion"]."</h2>";
				$martes = false;
			}
			echo $valor["hora_inicio"]." / ".$valor["hora_fin"]."  -  Tipo: ".$valor["tipo"];;
			echo "<br>";
			if($valor["tipo"]=="Causa"){
				echo "<td><img title='Haga click aqui para ver detalles de la Causa' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_causa/".$valor["id_causa"]."\");' src='../../assets/images/info.png' height='15px'>Ver Detalle</td>";
			
			}else{
			}
									
			
			echo "<hr style='border-color:#08088A; width:90%;'><br>";
			 
			
			
			
			
			
		}	
	}
	
	foreach ($horario as $valor) { //Dia Miercoles
		if($valor["dia"] == "Miercoles"){
			if($miercoles){
				echo "<h2 class='cab_horario' >Miercoles ".$valor["fecha_asignacion"]."</h2>";
				$miercoles = false;
			}
			echo $valor["hora_inicio"]." / ".$valor["hora_fin"]."  -  Tipo: ".$valor["tipo"];;
			echo "<br>";
			if($valor["tipo"]=="Causa"){
				echo "<td><img title='Haga click aqui para ver detalles de la Causa' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_causa/".$valor["id_causa"]."\");' src='../../assets/images/info.png' height='15px'>Ver Detalle</td>";
			
			}else{
			}
									
			
			echo "<hr style='border-color:#08088A; width:90%;'><br>";
		}	
	}
	
	foreach ($horario as $valor) { //Dia Jueves
		if($valor["dia"] == "Jueves"){
			$id_asunto = "";
			if($jueves){
				echo "<h2 class='cab_horario' >Jueves ".$valor["fecha_asignacion"]."</h2>";
				$jueves = false;
			}
			echo $valor["hora_inicio"]." / ".$valor["hora_fin"]."  -  Tipo: ".$valor["tipo"];;
			echo "<br>";
			if($valor["tipo"]=="Causa"){
				echo "<td><img title='Haga click aqui para ver detalles de la Causa' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_causa/".$valor["id_causa"]."\");' src='../../assets/images/info.png' height='15px'>Ver Detalle</td>";
			
			}else{
			}
									
			
			echo "<hr style='border-color:#08088A; width:90%;'><br>";
		}	
	}
	
	foreach ($horario as $valor) { //Dia Viernes
		if($valor["dia"] == "Viernes"){
			$id_asunto = "";
			if($jueves){
				echo "<h2 class='cab_horario' >Jueves ".$valor["fecha_asignacion"]."</h2>";
				$jueves = false;
			}
			echo $valor["hora_inicio"]." / ".$valor["hora_fin"]."  -  Tipo: ".$valor["tipo"];;
			echo "<br>";
			if($valor["tipo"]=="Causa"){
				echo "<td><img title='Haga click aqui para ver detalles de la Causa' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_causa/".$valor["id_causa"]."\");' src='../../assets/images/info.png' height='15px'>Ver Detalle</td>";
			
			}else{
			}
									
			
			echo "<hr style='border-color:#08088A; width:90%;'><br>";
		}	
	}
	
	


?>



</div>
