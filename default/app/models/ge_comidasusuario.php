<?php 
class GeComidasusuario extends ActiveRecord{
	public function get_($comidas_id,$usuario_id){
		$r = $this->find_first("conditions: comidas_id='".$comidas_id."' and usuario_id='".$usuario_id."'");
	
		if ($r) {
			return true;
		}
		return false;
	}
	public function inscripcion($accion,$comida_id,$usuario_id){
		if ($accion == "borrarse") {
			$comida = $this->find_first("conditions: comidas_id='".$comida_id."' and usuario_id='".$usuario_id."' ");
			if ($comida->delete()) {
				return true;
			}
			return false;
		}else{
			$comida = new GeComidasusuario();
			$comida->comidas_id = $comida_id;
			$comida->usuario_id = $usuario_id;
			if ($comida->save()) {
				return true;
			}
			return false;			
		}
	}
	public function get_inscritos($comida_id){
		$q = "SELECT * from ge_comidas 
			inner join ge_comidasusuario 
			inner join ge_usuario 
			on ge_comidas.id = ge_comidasusuario.comidas_id and ge_comidasusuario.usuario_id = ge_usuario.id
			where ge_comidas.id = '$comida_id'";


		return $this->find_all_by_sql($q);
	}
	public function get_noinscritos($comida_id){
		$q = "SELECT * from ge_comidas 
			inner join ge_comidasusuario 
			inner join ge_usuario 
			on ge_comidas.id = ge_comidasusuario.comidas_id and ge_comidasusuario.usuario_id != ge_usuario.id
			where ge_comidas.id = '$comida_id'";


		return $this->find_all_by_sql($q);
	}
}

 ?>