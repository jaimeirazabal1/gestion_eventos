<?php 	
class GeContacto extends ActiveRecord{
	public function get_mensajes(){
		$q = "SELECT ge_contacto.*, CONCAT(ge_usuario.nombre,' ',ge_usuario.apellido) as usuario 
				FROM ge_contacto 
				INNER JOIN ge_usuario on ge_contacto.usuario_id = ge_usuario.id";
		return $this->find_all_by_sql($q);
	}
}


 ?>