<?php 
class ContactoController extends AppController{

	public function enviar(){
		View::select(null,"json");
		$post = Input::post("contacto");
		if (Correo::enviar($post['email'],$post['titulo'],$post['mensaje'])) {
			$contacto = Load::model("ge_contacto",Input::post("contacto"));
			if ($contacto->save()) {
				$this->data = array("message"=>"El mensaje se ha enviado!","success"=>true);
			}else{
				$this->data = array("message"=>"No se pudo enviar el mensaje!","success"=>false);
			}
		}else{
			$this->data = array("message"=>"No se pudo enviar el mensaje!!","success"=>false);
		}
	}
	public function index(){
		$this->mensajes = Load::model("ge_contacto")->get_mensajes();
	}
	public function eliminar($id){
		$contacto = Load::model("ge_contacto")->find($id);
		if ($contacto->delete()) {
			Flash::valid("Mensaje Eliminado");
		}else{
			Flash::error("El mensaje no pudo ser eliminado");
		}
		Router::toAction("");
	}
}

 ?>