<style>
.tab {
  float: left;
  background: #eee; 
 
}
.tab label {
  background: #eee; 
  padding: 20px; 
  border: 1px solid #ccc; 
  margin-left: -1px; 
  position: relative;
  left: 1px; 
}
.tab [type=radio] {
  display: none;   
}

[type=radio]:checked ~ label {
  background: white;
  border-bottom: 1px solid white;
  z-index: 2;
}
[type=radio]:checked ~ label ~ .content {
  z-index: 1;
}
</style>
<h2 class="titulo_fieldset">Estadisticas</h2><br><br>
 
    <div class="tab">
       <input type="radio" id="tab-1" value="tab-1" name="tab-graficos" checked>
       <label for="tab-1">Causas por Materia</label>      
    </div>    
    <div class="tab">
       <input type="radio" id="tab-2" value="tab-2" name="tab-graficos">
       <label for="tab-2">Causas por Profesor</label>     
    </div>    
    <div class="tab">
       <input type="radio" id="tab-3" value="tab-3" name="tab-graficos">
       <label for="tab-3">Causas por Causal</label>      
    </div>.
	<div class="tab">
       <input type="radio" id="tab-4" value="tab-4" name="tab-graficos">
       <label for="tab-4">Agendaciones por Profesor (H)</label>      
    </div>
	<div class="tab">
       <input type="radio" id="tab-5" value="tab-5" name="tab-graficos">
       <label for="tab-5">Agendaciones por Profesor (V)</label>      
    </div>
    
<br><hr style="margin-top: 18px;"><br>
<div id="grafico" style="width:90%; background-color:red;">
</div>


<script>

$(function () {
	
	 $('input[type=radio][name=tab-graficos]').change(function() {
        if (this.value == 'tab-1') {
			 $('#grafico').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'Cantidad de Causas Vigentes segun Materia'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.y}</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							}
						}
					}
				},
				series: [{
					name: 'Cantidad',
					colorByPoint: true,
					data: [
					<?php
					if (isset($cantidad_causas_materia)) {
						if ($cantidad_causas_materia->num_rows() > 0){
							foreach ($cantidad_causas_materia->result() as $row){
							echo "{											";
							echo "	name: '".$row->nom_materia."',    ";
							echo "	y: ".$row->cantidad."                               ";
							echo "},	                                    ";
							
							
							}
						}
					}			
					?>
					
					
					
					
					]
				}]
			});
            
        }else if (this.value == 'tab-2') {
			$('#grafico').highcharts({
				title: {
					text: 'Cantidad de Causas Vigentes por Profesor ',
					x: -20 //center
				},
				subtitle: {
					text: '',
					x: -20
				},
				xAxis: {
					
					
					
					
					categories: [<?php
					if (isset($cantidad_causas_profesor)) {
						if ($cantidad_causas_profesor->num_rows() > 0){
							foreach ($cantidad_causas_profesor->result() as $row){					
							echo "'".$row->nombre."',";				
							}
						}
					}			
					?>]
				},
				yAxis: {
					title: {
						text: 'N Causas'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					valueSuffix: ' '
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				
				
				series: [{
					name: 'N Causas',
					data: [<?php
					if (isset($cantidad_causas_profesor)) {
						if ($cantidad_causas_profesor->num_rows() > 0){
							foreach ($cantidad_causas_profesor->result() as $row){					
							echo $row->cantidad.",";				
							}
						}
					}			
					?>]
				}]
			}); 
        }else if (this.value == 'tab-3') {
			 $('#grafico').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'Cantidad de Causas Cerradas segun Causal de Termino'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.y}</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							}
						}
					}
				},
				series: [{
					name: 'Cantidad',
					colorByPoint: true,
					data: [
					<?php
					if (isset($cantidad_causas_causal)) {
						if ($cantidad_causas_causal->num_rows() > 0){
							foreach ($cantidad_causas_causal->result() as $row){
							echo "{											";
							echo "	name: '".$row->nom_causal."',    ";
							echo "	y: ".$row->cantidad."                               ";
							echo "},	                                    ";
							
							
							}
						}
					}			
					?>
					
					
					
					
					]
				}]
			});
        }else if (this.value == 'tab-4') {
           $('#grafico').highcharts({
				title: {
					text: 'Cantidad de Agendaciones segun Profesor (Historicas)',
					x: -20 //center
				},
				subtitle: {
					text: '',
					x: -20
				},
				xAxis: {
					
					
					
					
					categories: [<?php
					if (isset($cantidad_agendaciones_profesor_h)) {
						if ($cantidad_agendaciones_profesor_h->num_rows() > 0){
							foreach ($cantidad_agendaciones_profesor_h->result() as $row){					
							echo "'".$row->nombre."',";				
							}
						}
					}			
					?>]
				},
				yAxis: {
					title: {
						text: 'N Agendaciones'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					valueSuffix: ' '
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				
				
				series: [{
					name: 'N Agendaciones',
					data: [<?php
					if (isset($cantidad_agendaciones_profesor_h)) {
						if ($cantidad_agendaciones_profesor_h->num_rows() > 0){
							foreach ($cantidad_agendaciones_profesor_h->result() as $row){					
							echo $row->cantidad.",";				
							}
						}
					}			
					?>]
				}]
			}); 
        }else if (this.value == 'tab-5') {
           $('#grafico').highcharts({
				title: {
					text: 'Cantidad de Agendaciones segun Profesor (Vigentes)',
					x: -20 //center
				},
				subtitle: {
					text: '',
					x: -20
				},
				xAxis: {
					
					
					
					
					categories: [<?php
					if (isset($cantidad_agendaciones_profesor_v)) {
						if ($cantidad_agendaciones_profesor_v->num_rows() > 0){
							foreach ($cantidad_agendaciones_profesor_v->result() as $row){					
							echo "'".$row->nombre."',";				
							}
						}
					}			
					?>]
				},
				yAxis: {
					title: {
						text: 'N Agendaciones'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					valueSuffix: ' '
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				
				
				series: [{
					name: 'N Agendaciones',
					data: [<?php
					if (isset($cantidad_agendaciones_profesor_v)) {
						if ($cantidad_agendaciones_profesor_v->num_rows() > 0){
							foreach ($cantidad_agendaciones_profesor_v->result() as $row){					
							echo $row->cantidad.",";				
							}
						}
					}			
					?>]
				}]
			}); 
        }
    });
	
   $('#grafico').highcharts({ //cargo el grafico x defecto
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'Cantidad de Causas Vigentes segun Materia'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.y}</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							}
						}
					}
				},
				series: [{
					name: 'Cantidad',
					colorByPoint: true,
					data: [
					<?php
					if (isset($cantidad_causas_materia)) {
						if ($cantidad_causas_materia->num_rows() > 0){
							foreach ($cantidad_causas_materia->result() as $row){
							echo "{											";
							echo "	name: '".$row->nom_materia."',    ";
							echo "	y: ".$row->cantidad."                               ";
							echo "},	                                    ";
							
							
							}
						}
					}			
					?>
					
					
					
					
					]
				}]
			});

});
</script>
	


