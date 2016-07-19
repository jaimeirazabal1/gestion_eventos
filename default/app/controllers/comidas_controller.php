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
	    
	    Load::lib("html2pdf-4.5.1/vendor/autoload");	
	    //require_once(dirname(__FILE__).'/../vendor/autoload.php');
	    $time = strtotime(date("Y-m-d"));
	    $dia_hoy = date("D");
	    if ($dia_hoy == "Mon") {
	    	$first_day_of_week = date("Y-m-d");
	    }else{

	    	$first_day_of_week = date('Y-m-d', strtotime('Last Monday', $time));
	    }
	    if ($dia_hoy == "Sun") {
	    	$last_day_of_week = date("Y-m-d");
	    }else{

			$last_day_of_week = date('Y-m-d', strtotime('Next Sunday', $time));
	    }
		$comidas = Load::model('ge_comidas')->find("conditions: (fecha_comida >= '".$first_day_of_week."' AND fecha_comida <= '".$last_day_of_week."')","order: fecha_comida asc");
		$tabla = "";
		
		$diassemanaN= array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		foreach ($comidas as $key => $value) {
			$tabla.="<h5>{$value->tipo} : {$value->titulo}</h5>";
			$tabla.="<span>{$value->descripcion}</span>, ";
			$dia = date("w",strtotime($value->fecha_comida));
		
			$tabla.="<span>".$diassemanaN[$dia]."</span>";
			$q = Load::model("ge_comidasusuario")->get_inscritos($value->id);
			$tabla.="<ol>";

			foreach ($q as $llave => $valor) {
				$tabla.= "<li>".$valor->nombre." ".$valor->apellido." ".$valor->dni."</li>";
			}
			$tabla.="</ol>";
		}
		
		ob_start();
	    try
	    {
	        $html2pdf = new HTML2PDF('P', 'letter', 'es');
	//      $html2pdf->setModeDebug();
	        $html2pdf->setDefaultFont('Arial');
	        $html2pdf->writeHTML("<h2 style='text-align:center'>Asistencia comidas</h2>
	        					<h4 style='text-align:center'>Semana desde ".$first_day_of_week." hasta ".$last_day_of_week."</h4>
	        					".$tabla);
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


	    Load::lib("html2pdf-4.5.1/vendor/autoload");	
	    //require_once(dirname(__FILE__).'/../vendor/autoload.php');
	    $time = strtotime(date("Y-m-d"));
	    $dia_hoy = date("D");
	    if ($dia_hoy == "Mon") {
	    	$first_day_of_week = date("Y-m-d");
	    }else{

	    	$first_day_of_week = date('Y-m-d', strtotime('Last Monday', $time));
	    }
	    if ($dia_hoy == "Sun") {
	    	$last_day_of_week = date("Y-m-d");
	    }else{

			$last_day_of_week = date('Y-m-d', strtotime('Next Sunday', $time));
	    }
		$comidas = Load::model('ge_comidas')->find("conditions: (fecha_comida >= '".$first_day_of_week."' AND fecha_comida <= '".$last_day_of_week."')","order: fecha_comida asc");
		$tabla = "";
		
		$diassemanaN= array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		foreach ($comidas as $key => $value) {
			$tabla.="<h5>{$value->tipo} : {$value->titulo}</h5>";
			$tabla.="<span>{$value->descripcion}</span>, ";
			$dia = date("w",strtotime($value->fecha_comida));
		
			$tabla.="<span>".$diassemanaN[$dia]."</span>";
			$q = Load::model("ge_comidasusuario")->get_noinscritos($value->id);
			$tabla.="<ol>";

			foreach ($q as $llave => $valor) {
				$tabla.= "<li>".$valor->nombre." ".$valor->apellido." ".$valor->dni."</li>";
			}
			$tabla.="</ol>";
		}
		
		ob_start();
	    try
	    {
	        $html2pdf = new HTML2PDF('P', 'letter', 'es');
	//      $html2pdf->setModeDebug();
	        $html2pdf->setDefaultFont('Arial');
	        $html2pdf->writeHTML("<h2 style='text-align:center'>Inasistencia de comidas</h2>
	        					<h4 style='text-align:center'>Semana desde ".$first_day_of_week." hasta ".$last_day_of_week."</h4>
	        					".$tabla);
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