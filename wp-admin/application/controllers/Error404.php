<?php header("Content-type:text/html;charset=utf-8");
if(!defined('BASEPATH'))    exit('No direct script access allowed');
    
class Error404 extends CI_Controller{    
    public function index(){
        echo "Error 404. Usted esta intentando acceder a una pagina que no existe";
    }
}
