<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */
class IndexController extends AppController
{

    public function index()
    {
        
    }
    public function login(){
        if (Input::hasPost("user","pass")){
            $pwd = Load::model('ge_usuario')->encriptar(Input::post("pass"));
            $usuario=Input::post("user");
     
            $auth = new Auth("model", "class: ge_usuario", "email: $usuario", "contrasena: $pwd");
            if ($auth->authenticate()) {
                Flash::valid("Bienvenid@");
                $rol = Auth::get("tipo_usuario");
                
                Router::redirect("usuario/panel");
            } else {
                Flash::error("Nombre de usuario o contraseña invalidos");
            }
        }
    }
    public function pruebas(){
        View::template(null);

    }

}
