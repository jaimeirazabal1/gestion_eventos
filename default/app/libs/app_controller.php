<?php
/**
 * @see Controller nuevo controller
 */
require_once CORE_PATH . 'kumbia/controller.php';

/**
 * Controlador principal que heredan los controladores
 *
 * Todas las controladores heredan de esta clase en un nivel superior
 * por lo tanto los metodos aqui definidos estan disponibles para
 * cualquier controlador.
 *
 * @category Kumbia
 * @package Controller
 */
class AppController extends Controller
{

    final protected function initialize()
    {
        $this->project_name = "Gestión de Eventos";
    	$ruta = Router::get("controller")."/".Router::get("action");
    	if (!Auth::is_valid() and $ruta != 'index/login' and $ruta != 'usuario/logout') {
            Flash::info("Debe estar autenticado para entrar en el sistema");
    		Router::redirect("index/login");
    	}
    }

    final protected function finalize()
    {
        
    }

}
