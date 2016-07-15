<?php 
class GeFines extends ActiveRecord{
	public function generar_tabla($datos){
		$tabla = "<table class='table datatables'>
					<thead>
						<th>Salida</th>
						<th>Semana</th>
						<th>Dirección</th>
					</thead>
					";
		if ($datos) {
			foreach ($datos as $key => $value) {
				$inicio = explode(' ',$value->fecha_inicio);
				$fin = explode(' ',$value->fecha_final);
				if ($value->se_queda) {
					$string = "No Salió";
				}else{
					$string = "Si Salió";
				}
				$tabla.="<tr>
							<td>$string</td>
							<td>Desde: ".$inicio[0]."<br> hasta: ".$fin[0]."</td>
							<td>".($value->direccion ? $value->direccion : "No Aplica") ."</td>
						</tr>
				";
			}
		}else{
			$tabla.="<tr><td colspan='3'><p class=\"text-center\">Sin registros actualmente</p></td></tr>";
		}
		$tabla.= "</table>";
		return $tabla;
	}
	public function esta_repetido($usuario_id,$fecha_inicio,$fecha_final){
		$r = $this->find("conditions: usuario_id = '".$usuario_id."' and fecha_inicio='".$fecha_inicio."' and fecha_final='".$fecha_final."'");
		if ($r) {
			return true;
		}
		return false;
	}
}

 ?>