<?php 
class EventoController extends AppController{

	public function index(){
		$this->eventos = Load::model("ge_evento")->get_eventos();
	}

	public function registrar(){
		if (Input::post("evento")) {
			$evento = Load::model("ge_evento",Input::post("evento"));
			if ($evento->save()) {
				Flash::valid("Evento registrado con exito");
				Router::toAction("index");
			}else{
				Flash::error("No se pudo registrar el evento!");
			}

		}
	}

	public function eliminar($id){
		$evento = Load::model("ge_evento")->find($id);
		if ($evento->delete()) {
			Flash::valid("El Evento se borró correctamente!");
		}else{
			Flash::error("No se pudo borrar el evento");
		}
		Router::toAction("");
	}

	public function editar($id){
		if (Input::post("evento")) {
			$evento = Load::model("ge_evento",Input::post("evento"));
			if ($evento->update()) {
				Flash::valid("Evento registrado con exito");
				Router::toAction("index");
			}else{
				Flash::error("No se pudo registrar el evento!");
			}

		}
		$this->evento = Load::model("ge_evento")->find($id);
		$this->evento->fecha_inicio = explode(" ",$this->evento->fecha_inicio);
		$this->evento->fecha_final = explode(" ",$this->evento->fecha_final);
		$this->evento->fecha_inicio = $this->evento->fecha_inicio[0];
		$this->evento->fecha_final = $this->evento->fecha_final[0];
	}

	public function inscritos($id){
		$this->eventos = Load::model("ge_eventousuario")->getById($id);
	}

	public function inscribir($evento_id, $usuario_id){
		if (!Load::model("ge_eventousuario")->buscar($evento_id,$usuario_id)) {

			if (Load::model("ge_eventousuario")->agregar($evento_id,$usuario_id)) {
				Flash::valid("Fuiste inscrito en el evento");
			}else{
				Flash::error("No se pudo inscribir en el evento");
			}
		}else{
			Flash::info("Ya estabas inscrito en este evento");
		}
			Router::redirect("usuario/panel#eventos");
	}

	public function borrarinscrito($evento_id, $usuario_id,$url = null){
		$evento = Load::model("ge_eventousuario")->find_first("conditions: evento_id = '$evento_id' and usuario_id='$usuario_id'");
		if ($evento->delete()) {
			Flash::valid("Usuario eliminado del evento");
		}else{
			Flash::error("No se pudo eliminar el usuario del evento");
		}
		if ($url) {
			Router::redirect("usuario/panel#eventos");
		}else{

			Router::redirect("evento/inscritos/$evento_id");
		}
	}

}


 ?>