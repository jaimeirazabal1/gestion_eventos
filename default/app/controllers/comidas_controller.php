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
	public function asistira(){
		View::select(NULL,NULL);
	    ob_start();

	    Load::lib("html2pdf-4.5.1/vendor/autoload");	
	    //require_once(dirname(__FILE__).'/../vendor/autoload.php');
	    try
	    {
	        $html2pdf = new HTML2PDF('P', 'letter', 'es');
	//      $html2pdf->setModeDebug();
	        $html2pdf->setDefaultFont('Arial');
	        $html2pdf->writeHTML("
	        					<h2 style='text-align:center'>Asistencia comidas</h2>
	        					<p>Hola</p>
	        					");
	        $html2pdf->Output('exemple00.pdf');
	    }
	    catch(HTML2PDF_exception $e) {
	        echo $e;
	        exit;
	    }

		die;
	}
	public function noasistira(){
		View::select(NULL,NULL);
	    ob_start();

	    Load::lib("html2pdf-4.5.1/vendor/autoload");	
	    //require_once(dirname(__FILE__).'/../vendor/autoload.php');
	    try
	    {
	        $html2pdf = new HTML2PDF('P', 'letter', 'es');
	//      $html2pdf->setModeDebug();
	        $html2pdf->setDefaultFont('Arial');
	        $html2pdf->writeHTML("
	        					<h2 style='text-align:center'>Asistencia comidas</h2>
	        					<p>Hola</p>
	        					");
	        $html2pdf->Output('exemple00.pdf');
	    }
	    catch(HTML2PDF_exception $e) {
	        echo $e;
	        exit;
	    }

		die;	
	}
}


 ?>