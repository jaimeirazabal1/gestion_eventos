<?php 
class GeEvento extends ActiveRecord{
	public function get_eventos(){
		$q = "SELECT 
				ge_evento.*,
				CONCAT(ge_usuario.nombre, \" \", ge_usuario.apellido) as usuario 
				FROM 
					ge_evento 
					inner join ge_usuario on ge_usuario.id = ge_evento.usuario_id";
		return $this->find_all_by_sql($q);
	}
}

 ?>