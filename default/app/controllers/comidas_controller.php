<?php 
class ComidasController extends AppController{
	public function index(){
		$this->comidas = Load::model("ge_comidas")->find();
	}
	public function registrar(){
		if (Input::post("comidas")) {
			$comida = Load::model('ge_comidas',Input::post("comidas"));
			if ($comida->save()) {
				Flash::valid("Comida Guardada con exito!");
				Router::toAction("");
			}else{
				Flash::error("No se pudo guardar la comida!");
			}
		}

	}

	public function editar($id){
		if (Input::post("comidas")) {
			$comida = Load::model('ge_comidas',Input::post("comidas"));
			if ($comida->update()) {
				Flash::valid("Comida Guardada con exito!");
				Router::toAction("");
			}else{
				Flash::error("No se pudo guardar la comida!");
			}
		}
		$this->comidas = Load::model("ge_comidas")->find($id);

	}
	public function eliminar($id){
		$comida = Load::model("ge_comidas")->find($id);
		if ($comida->delete()) {
			Flash::valid("Comida eliminada!");
		}else{
			Flash::error("No se pudo eliminar la comida!");
		}
		Router::toAction('');
	}

	public function get_usuario_inscrito($comida_id,$usuario_id){
		View::select(null,"json");
		$this->data = Load::model("ge_comidasusuario")->get_($comida_id,$usuario_id);
	}
	public function inscripcion($accion,$comida_id,$usuario_id){
		View::select(null,"json");
		$this->data = Load::model("ge_comidasusuario")->inscripcion($accion,$comida_id,$usuario_id);		
	}
}


 ?>