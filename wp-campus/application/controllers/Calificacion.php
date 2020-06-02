<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Calificacion extends LayoutAdmin{
    var $menu; 
    
    public function __construct(){
        parent::__construct();                
        $this->load->model("Calificacion_model");
        $this->load->model("Tarea_model");
        $this->load->model("Periodo_model");
        $this->load->model("Matricula_model");
        $this->load->model("Curso_model");        
        $this->load->helper('menu_helper');
        $this->load->helper('date_helper');      
        $this->script = "<script src='".base_url()."js/calificacion.js'></script>";        
    }
    
    public function index(){
            echo "chau";
    }       
    
    public function inicio($curso){
        $periodotarea = $this->input->post("periodotarea");
        //PERIODO DE LAS CALIFICACIONES//1ER BIMESTRE, 2DO BIMESTRE, ETC
        if($periodotarea==""){
            $filter = new stdClass();
            $filter->order_by = array("c.PERIODP_Codigo"=>"asc");
            $periodos = $this->Periodo_model->read($filter);
            $periodo = $periodos[0]->PERIODP_Codigo;
            $periodotarea = $periodo."_0";
        }
        else{
            $txtTarea = explode("_",$periodotarea);
            $periodo  = $txtTarea[0];
        }
        //CABECERA DE LA TABLA
        $columna = "<tr align='center'>";
        $columna.="<td>No</td>";  
        $columna.="<td>Codigo</td>";  
        $columna.="<td>Apellidos</td>";  
        $columna.="<td>Nombres</td>";  
        $filter  = new stdClass();
        $filter->curso   = $curso;
        $filter->periodo = $periodo;
        $filter->order_by = array("c.TIPOTAREAP_Codigo"=>"asc");
        $tareas = $this->Tarea_model->listar($filter);
        $jj = 0;
        $tipotarea_ant = 0;
        $arrTarea = array();
        foreach($tareas as $ind=>$value){
            //Mostramos el nombre de la tarea en una columna
            $columna.="<td>".$value->TAREAC_Nombre."<br>".substr(date_sql($value->TAREAC_Fecha),0,5)."</td>";  
            //Calculamos la cantidad tareas por tipo de tarea
            $arrTarea[$value->TAREAP_Codigo] = $value;
            $arrTipoTarea[$value->TIPOTAREAP_Codigo]=($value->TIPOTAREAP_Codigo==$tipotarea_ant)?++$jj:$jj=1;
            $tipotarea_ant = $value->TIPOTAREAP_Codigo;
        }
        $columna.="<td>Promedio</td>";
        $columna.="</tr>";
        //ARREGLO DE CALIFICACION
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->periodo = $periodo;
        $calificacion = $this->Calificacion_model->listar($filter);
        if(count($calificacion)>0){
            foreach($calificacion as $value){
                $arrNotas[$value->MATRICP_Codigo][$value->TAREAP_Codigo] = $value->CALIFICAC_Puntaje;
            }
        }
        //CONSTRUIMOS LA TABLA DE NOTAS DE ALUMNOS
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->order_by = array("g.PERSC_ApellidoPaterno"=>"asc","g.PERSC_ApellidoMaterno"=>"asc","g.PERSC_Nombre"=>"asc");
        $alumnos = $this->Matricula_model->listar($filter);
        $fila   = "";
        if(count($alumnos)>0){
            foreach($alumnos as $indice=>$value){
                $promedio = 0;
                $fila.="<tr>";
                $fila.="<td align='center'>".($indice+1)."</td>";
                $fila.="<td align='center'>".$value->ALUMP_Codigo."</td>";
                $fila.="<td>".$value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno."</td>";
                $fila.="<td>".$value->PERSC_Nombre."</td>";
                if(count($arrTarea)>0){
                    foreach($arrTarea as $codtarea=>$datos){
                        $nota = isset($arrNotas[$value->MATRICP_Codigo][$codtarea])?$arrNotas[$value->MATRICP_Codigo][$codtarea]:0;
                        $fila.="<td align='center'>".$nota."</td>";
                        $tipotarea = $datos->TIPOTAREAP_Codigo;
                        $peso      = $datos->TIPOTAREAC_Peso;
                        $cantidad  = $arrTipoTarea[$tipotarea];
                        $promedio += $nota*$peso/($cantidad*100);
                    }
                    $fila.="<td align='center'>".round($promedio,2)."</td>";    
                }
            }
        }
        $fila.="</tr>";
        $data["columna"] = $columna;
        $data["fila"]    = $fila;
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->order_by = array("g.PERIODP_Codigo"=>"asc","c.TIPOTAREAP_Codigo"=>"asc");
        $data["seltarea"] = form_dropdown("periodotarea",$this->Tarea_model->seleccionar($filter),$periodotarea,"id='periodotarea' class='form-control'");
        $data['menuizq'] = menu_izq($curso);
        $data['menucent']   = menu_cent($curso);
        $data['curso']   = $this->Curso_model->get($curso);        
        $this->load_layout("calificacion/inicio",$data);
    }
    
    public function editar($curso){
        $txtTarea = $this->input->post("periodotarea");
        $arrTarea = explode("_",$txtTarea);
        $periodo  = $arrTarea[0];
        $tarea    = $arrTarea[1];
        //Listado de calificaciones
        $fila     = "";
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->tarea = $tarea;
        $filter->order_by = array("g.PERSC_ApellidoPaterno"=>"asc","g.PERSC_ApellidoMaterno"=>"asc","g.PERSC_Nombre"=>"asc","e.TAREAP_Codigo"=>"asc");          $calificaciones = $this->Calificacion_model->listar($filter);
        foreach($calificaciones as $item=>$value){
            $fila.="<tr id='".$value->CALIFICAP_Codigo."'>";
            $fila.="<td>".($item+1)."</td>";
            $fila.="<td>".$value->ALUMP_Codigo."</td>";
            $fila.="<td>".$value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno."</td>";
            $fila.="<td>".$value->PERSC_Nombre."</td>";
            $fila.="<td>". form_input(["name"=>"nota[]","id"=>"nota[]","class"=>"form-control clsnotas"],$value->CALIFICAC_Puntaje)."</td>";
            $fila.="</tr>";
        }
        $data["fila"] = $fila;
        //Combo tareas
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->order_by = array("g.PERIODP_Codigo"=>"asc","c.TIPOTAREAP_Codigo"=>"asc");        
        $data["seltareas"] = form_dropdown("periodotarea",$this->Tarea_model->seleccionar($filter),$txtTarea,"id='periodotarea' class='form-control'");
        $data['menuizq'] = menu_izq($curso);   
        $data['menucent']   = menu_cent($curso);        
        $data['curso']   = $this->Curso_model->get($curso);
        $this->load_layout("calificacion/editar",$data);
    }
    
    public function grabar(){
        $datos  = (object)$_REQUEST;
        $codigo = $datos->calificacion;
        $nota   = $datos->nota;
        $data   = array("CALIFICAC_Puntaje"=>$nota);
        $resultado = $this->Calificacion_model->modificar($codigo,$data);
        echo json_encode($resultado);
    }
}
