<?php 
class GeUsuario extends ActiveRecord{
	public function encriptar($pass){
		return md5($pass);
	}
	public function verificar_contrasena($inputs){
		return $inputs['contrasena'] == $inputs['contrasena2'];
	}
	protected function initialize(){
    	$this->validates_uniqueness_of("dni");
    	$this->validates_uniqueness_of("email");
    	$this->validates_uniqueness_of("telefono");
    }
}


 ?>