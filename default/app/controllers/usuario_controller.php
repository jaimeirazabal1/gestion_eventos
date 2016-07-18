<?php 
class UsuarioController extends AppController{
	public function index(){
		$this->usuarios = Load::model("ge_usuario")->find();
	}
	public function register(){
		if (Input::post("usuario")) {
			$usuario = Load::model("ge_usuario",Input::post("usuario"));
			$usuario->contrasena = $usuario->encriptar($usuario->contrasena);
			if (!$usuario->verificar_contrasena(Input::post("usuario"))) {
				Flash::error("Las contraseñas suministradas no coinciden, por favor intentelo de nuevo!");
				return;
			}
			if ($usuario->save()) {
				Flash::valid("Usuario creado con éxito!");
			}else{
				Flash::error("El usuario no se pudo crear!");
			}
		}
	}
	public function eliminar($id){
		$usuario = Load::model("ge_usuario")->find($id);
		if ($usuario->delete()) {
			Flash::valid("Usuario Eliminado con éxito!");
		}else{
			Flash::error("No se pudo eliminar el usuario!");
		}
		Router::toAction("index");
	}
	public function editar($id){
		if (Input::post("usuario")) {
			$usuario = Load::model("ge_usuario",Input::post("usuario"));
			if ($usuario->update()) {
				Flash::valid("Usuario Editado!");
			}else{
				Flash::error("No se pudo editar el usuario");
			}
			Router::redirect("usuario/");
		}
		$this->usuario = Load::model("ge_usuario")->find($id);

	}
	public function cambiopass(){
		View::select(null,null);
		if (Input::post("contrasena") and Input::post("contrasena2")) {
			if (Input::post("contrasena") != Input::post("contrasena2")) {
				if (Input::isAjax()) {
					die(json_encode(array("message"=>"Las contraseñas no coinciden, intentelo de nuevo!")));
				}else{

					Flash::error("Las contraseñas no coinciden, intentelo de nuevo!");
					Router::toAction("editar/".$_POST['usuario']['id']);
					return;
				}
			}
			$usuario = Load::model("ge_usuario")->find($_POST['usuario']['id']);
			$usuario->contrasena = $usuario->encriptar(Input::post("contrasena"));
			if ($usuario->update()) {
				if (Input::isAjax()) {
					die(json_encode(array("message"=>"La contraseña fué actualizada con éxito!")));
				}else{

					Flash::valid("Contraseña actualizada");
				}
			}else{
				if (Input::isAjax()) {
					die(json_encode(array("message"=>"La contraseña no pudo ser actualizada")));
				}else{
					Flash::error("No se pudo actualizar la contraseña!");
				}
			}
		}else{
			if (Input::isAjax()) {
				die(json_encode(array("message"=>"No se recibieron contraseñas para actualizar")));
			}else{

				Flash::warning("No se recibieron contraseñas para actualizar");
			}
		}
		Router::toAction("editar/".$_POST['usuario']['id']);
	}
	public function logout(){
		Auth::destroy_identity();
		Router::redirect("index/login");
	}
	public function panel(){
		$this->usuario = Load::model("ge_usuario")->find(Auth::get("id"));
		$fines = Load::model('ge_fines');
		$this->fines = $fines->generar_tabla($fines->find("conditions: usuario_id = '".Auth::get('id')."' ","order: id desc"));
		$this->eventos = Load::model("ge_evento")->get_eventos();
		$this->comidas = Load::model("ge_comidas")->comidasToJson();
	}
	public function editar_valor($campo,$id,$valor){+
		View::select(null,"json");
		$usuario = Load::model("ge_usuario")->find($id);
		if (isset($usuario->$campo)) {
			$usuario->$campo = $valor;
			//var_dump($usuario);
		}else{
			echo json_encode(array("message"=>"El campo $campo no existe!"));
			die;
		}
		if ($usuario->update()) {
			die(json_encode(array("message"=>"Se actualizo el campo $campo con éxito!")));
		}else{
			die(json_encode(array("message"=>"Error editando el campo $campo")));
		}
	}
}


 ?>