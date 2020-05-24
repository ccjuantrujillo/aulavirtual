<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Calificacion extends LayoutAdmin{
    var $menu;
    
    public function index(){
            echo "chau";
    }    
    
    public function __construct(){
        parent::__construct();                
        $this->load->model("Calificacion_model");
        $this->load->model("Tarea_model");
        $this->load->model("Curso_model");        
        $this->load->helper('menu_helper');
        $this->load->helper('date_helper');        
    }
    
    public function inicio($curso){
        //Cabecera de la tabla
        $columna = "<tr>";
        $columna.="<td>No</td>";  
        $columna.="<td>Codigo</td>";  
        $columna.="<td>Apellidos</td>";  
        $columna.="<td>Nombres</td>";  
        $filter  = new stdClass();
        $filter->curso = $curso;
        $filter->order_by = array("c.TAREAP_Codigo"=>"asc");
        $tareas  = $this->Tarea_model->listar($filter);
        foreach($tareas as $value){
            $arrTarea[] = $value->TAREAP_Codigo;
            $columna.="<td>".$value->TAREAC_Nombre."</td>";    
        }
        $columna.="</tr>";
        //Lista de calificaciones
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->order_by = array("g.PERSC_ApellidoPaterno"=>"asc","g.PERSC_ApellidoMaterno"=>"asc","e.TAREAP_Codigo"=>"asc");
        $fila  = "";
        $jj    = 1;
        $persona_ant="";
        $calificacion = $this->Calificacion_model->listar($filter);
        foreach($calificacion as $item=>$value){
            $codtarea = $value->TAREAP_Codigo;
            if($value->PERSP_Codigo!=$persona_ant){
                $k=0;
                if($persona_ant!="") $fila.="</tr>";
                $fila.="<tr>";
                $fila.="<td>".$jj++."</td>";
                $fila.="<td>".$value->ALUMP_Codigo."</td>";
                $fila.="<td>".$value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno."</td>";
                $fila.="<td>".$value->PERSC_Nombre."</td>";
                $fila.="<td>".($arrTarea[$k]==$codtarea?$value->CALIFICAC_Puntaje:"0")."</td>";
                $persona_ant = $value->PERSP_Codigo;
            }
            else{
                $ind = ++$k;
                $fila.="<td>".((isset($arrTarea[$ind])&&$arrTarea[$ind]==$codtarea)?$value->CALIFICAC_Puntaje:"0")."</td>";
            }
        }
        $fila.="</tr>";
        $data["columna"] = $columna;
        $data["fila"]    = $fila;
        $data['menuizq'] = menu_izq($curso);
        $data['curso']   = $this->Curso_model->get($curso);        
        $this->load_layout("calificacion/inicio",$data);
    }
}
