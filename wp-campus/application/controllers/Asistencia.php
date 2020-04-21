<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Asistencia extends LayoutAdmin{
    var $datosCurso;
    var $menu;

    public function __construct(){
        parent::__construct();                
        $this->load->model('Cabasistencia_model');
        $this->load->model('Asistencia_model');
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
        $filter = new stdClass();
        $filter->curso = $curso;
        $arrAsistencia = $this->Asistencia_model->listar($filter);
        if(count($arrAsistencia)>0){
            foreach($arrAsistencia as $value){
                $data[$value->MATRICP_Codigo][$value->CABASISTC_Fecha] = $value->ASISTC_Marcacion;
            }
        }
        //Creamos la cabecera
        $columna  = "";
        $columna .= "<th>No</th>";
        $columna .= "<th>Codigo</th>";
        $columna .= "<th>Identificador</th>";
        $columna .= "<th>Apellidos</th>";
        $columna .= "<th>Nombres</th>";
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->order_by = array("c.CABASISTC_Fecha"=>"asc");
        $cabAsistencia = $this->Cabasistencia_model->listar($filter);
        if(count($cabAsistencia)>0){
            foreach($cabAsistencia as $value){
                $columna .= "<th>".str_replace("/2020","", date_sql($value->CABASISTC_Fecha))."</th>";
            }
        }
        //Lista de alumnos matriculados - detalle
        $arrMarca   = array(""=>"--","0"=>"<font color='red'>F</font>","1"=>"A","2"=>"T");
        $fila   = "";
        $filter = new stdClass();
        $filter->curso = $curso;  
        $filter->order_by = array("g.PERSC_ApellidoPaterno"=>"asc","g.PERSC_ApellidoMaterno"=>"asc","g.PERSC_Nombre"=>"asc");
        $alumnos = $this->Matricula_model->listar($filter);
        if(count($alumnos)>0){
            foreach($alumnos as $indice=>$value){
                $fila.="<tr>";
                $fila.="<td>".($indice+1)."</td>";
                $fila.="<td>".$value->ALUMP_Codigo."</td>";
                $fila.="<td>".$value->ALUMC_Identificador."</td>";
                $fila.="<td>".$value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno."</td>";
                $fila.="<td>".$value->PERSC_Nombre."</td>";
                $filter = new stdClass();
                $filter->curso = $curso;    
                $filter->order_by = array("c.CABASISTC_Fecha"=>"asc");
                $cabAsistencia = $this->Cabasistencia_model->listar($filter);
                if(count($cabAsistencia)>0){
                    foreach($cabAsistencia as $value2){
                        $valor = "";
                        if(isset($data[$value->MATRICP_Codigo][$value2->CABASISTC_Fecha])){
                            $valor = $data[$value->MATRICP_Codigo][$value2->CABASISTC_Fecha];
                        }
                    $fila.="<td style='text-align:center;'>".$arrMarca[$valor]."</td>";
                    }
                }
                $fila.="</tr>";                
            }
        }
        $data["fila"]       = $fila;
        $data["columna"]    = $columna;
        $filter = new stdClass();
        $filter->curso = $curso;          
        $data['asistencia'] = $this->Asistencia_model->listar($filter); 
        $data['menuizq']    = menu_izq($curso);
        $data['curso']      = $this->Curso_model->get($curso);        
        $this->load_layout('asistencia/inicio',$data);
    }	

    public function read(){
        $data['cursos']    = $this->Curso_model->read();
        $data['menuizq']   = menu_izq();
        $this->load_layout('curso/read',$data);
    }	
}