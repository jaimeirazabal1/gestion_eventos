<?php 
class GeComidas extends ActiveRecord{
	public function comidasToJson(){
		$comidas = array();
		foreach ($this->find() as $key => $value) {
			$r = Load::model("ge_comidasusuario")->find_first("conditions: comidas_id = '".$value->id."' and usuario_id= '".Auth::get("id")."'");
			if ($r) {
				$comidas[]=array("title"=>$value->titulo,"start"=>$value->fecha_comida,"description"=>$value->descripcion,"id"=>$value->id,"color"=>"green");
				# code...
			}else{

				$comidas[]=array("title"=>$value->titulo,"start"=>$value->fecha_comida,"description"=>$value->descripcion,"id"=>$value->id,"color"=>"orange");
			}
		}
		return json_encode($comidas);
	}
	
}


 ?>