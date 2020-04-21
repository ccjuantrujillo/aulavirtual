<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Alumno extends LayoutAdmin{
    var $datosCurso;
    var $menu;

    public function __construct(){
        parent::__construct();                
        $this->load->model('Matricula_model');
        $this->load->model('Curso_model');
        $this->load->helper('menu_helper');
        $this->load->helper('date_helper');
    }

    public function index(){
            echo "chau";
    }

    public function inicio($curso)
    {
        //Creamos un arreglo de asistencias        
        $columna  = "";
        $columna .= "<th>No</th>";
        $columna .= "<th>Codigo</th>";
        $columna .= "<th>Identificador</th>";
        $columna .= "<th>Apellidos</th>";
        $columna .= "<th>Nombres</th>";
        $columna .= "<th>Correo</th>";
        $columna .= "<th>Correo Inst.</th>";
        $fila   = "";
        $filter = new stdClass();
        $filter->curso = $curso;        
        $alumnos = $this->Matricula_model->listar($filter);
        if(count($alumnos)>0){
            foreach($alumnos as $indice=>$value){
                $fila.="<tr>";
                $fila.="<td>".($indice+1)."</td>";
                $fila.="<td>".$value->ALUMP_Codigo."</td>";
                $fila.="<td>".$value->ALUMC_Identificador."</td>";
                $fila.="<td>".$value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno."</td>";
                $fila.="<td>".$value->PERSC_Nombre."</td>";
                $fila.="<td>".$value->PERSC_Email."</td>";
                $fila.="<td>".$value->PERSC_EmailInstitucional."</td>";
                $fila.="</tr>";                
            }
        }
        $data["fila"]       = $fila;
        $data["columna"]    = $columna;
        $data['menuizq']    = menu_izq($curso);
        $data['curso']      = $this->Curso_model->get($curso);        
        $this->load_layout('alumno/inicio',$data);
    }	
}