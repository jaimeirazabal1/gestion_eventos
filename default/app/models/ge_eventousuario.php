<?php 
class GeEventousuario extends ActiveRecord{
	public function getById($id){
		$q = "SELECT 
			 ge_eventousuario.id,
			 ge_eventousuario.evento_id,
			 ge_eventousuario.usuario_id,
			 ge_evento.detalle,
			 ge_evento.fecha_registro,
			 ge_evento.fecha_final,
			 CONCAT(ge_usuario.nombre,' ',ge_usuario.apellido) as usuario
			FROM
			 ge_eventousuario 
			INNER JOIN 
			 ge_evento on ge_evento.id = ge_eventousuario.evento_id
			INNER JOIN 
			 ge_usuario on ge_usuario.id = ge_eventousuario.usuario_id
			WHERE evento_id = '$id'
		";
		return $this->find_all_by_sql($q);
	}

	public function agregar($evento_id, $usuario_id){
		$evento = new GeEventousuario();
		$evento->usuario_id = $usuario_id;
		$evento->evento_id = $evento_id;
		return $evento->save();
	}
	public function buscar($evento_id, $usuario_id){
		if ($this->find("conditions: evento_id = '$evento_id' and usuario_id = '$usuario_id'")) {
			return true;
		}
		return false;
	}
}


 ?>