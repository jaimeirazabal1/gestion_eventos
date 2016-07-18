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
}

 ?>