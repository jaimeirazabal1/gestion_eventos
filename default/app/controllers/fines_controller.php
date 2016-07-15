<?php 
class FinesController extends AppController{

	public function registrar(){
		View::select(NULL,'json');
		$post = Input::post("fines");
		if (Load::model('ge_fines')->esta_repetido($post['usuario_id'],$post['fecha_inicio'],$post['fecha_final'])) {
			die(json_encode(array("message"=>"Ya se ha realizado un registro de la actividad del fin de semana!","success"=>false)));
		}
		$fines = Load::model("ge_fines",Input::post("fines"));
		if (isset($post['se_queda'])) {
			$fines->se_queda = 1;
			$fines->direccion='';
		}else{
			$fines->se_queda = 0;
		}
		if ($fines->save()) {
			
			$datos = Load::model("ge_fines")->find("conditions: usuario_id = '".$post['usuario_id']."'");
			die(json_encode(array("message"=>"Registro realizado",
									"registros"=>Load::model('ge_fines')->generar_tabla($datos),
									"success"=>true
									)
							));
		}else{
			die(json_encode(array("message"=>"Ocurrio un error realizando el registro","success"=>false)));
		}
	}

	public function index($usuario_id = NULL){
		if ($usuario_id) {
			$q="
			SELECT 
				ge_fines.*, 
				ge_usuario.nombre, 
				ge_usuario.apellido 
			FROM
				ge_fines 
			INNER JOIN 
				ge_usuario on ge_usuario.id = ge_fines.usuario_id 
			where ge_fines.usuario_id = '".$usuario_id."'
			ORDER BY ge_fines.id desc 
			";
			//die($q);
			$this->fines = Load::model('ge_fines')->find_all_by_sql($q);
			$this->usuario = Load::model('ge_usuario')->find($usuario_id);
		}else{
			$this->usuarios = Load::model('ge_usuario')->find();
		}
	}
	public function eliminar($id){
		$fines = Load::model("ge_fines")->find($id);
		$usuario = $fines->usuario_id;
		if ($fines->delete()) {
			Flash::valid("Registro Eliminado");
		}else{
			Flash::error("No se pudo eliminar el registro");
		}
		Router::redirect("fines/index/".$usuario);
	}

}


 ?>