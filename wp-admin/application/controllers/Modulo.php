<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modulo extends CI_Controller {
    public function __construct(){
        parent::__construct(); 
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        $this->load->model(maestros.'Turno_model');
        $this->load->model('Curso_model');
        $this->load->model('Alumno_model');
        $this->load->model('Modulo_model');
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
        $this->login   = $this->session->userdata('login');
    }

    public function index()
    {
        $this->load->view('seguridad/inicio');	
    }

    public function listar($j=0){
        $filter           = new stdClass();
        $filter->rol      = $this->session->userdata('rolusu');		
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu       = get_menu($filter);             
        $filter     = new stdClass();
        $filter->order_by = array("c.MODULOC_Descripcion"=>"asc");
        $filter_not = new stdClass(); 
        $registros = count($this->Modulo_model->listar($filter,$filter_not));
        $modulos   = $this->Modulo_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($modulos)>0){
            foreach($modulos as $indice => $value){
                $lista[$indice]              = new stdClass();
                $lista[$indice]->codigo      = $value->MODULOP_Codigo;
                $lista[$indice]->descripcion = $value->MODULOC_Descripcion;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/modulo/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']        = $lista;
        $data['menu']         = $menu;
        $data['header']       = get_header();
        $data['titulo']       = "Listado de modulos";
        $data['nuevo']        = "Crear una nuevo modulo";
        $data['form_open']    = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));     
        $data['form_close']   = form_close();         
        $data['j']            = $j;
        $data['registros']    = $registros;
        $data['paginacion']   = $this->pagination->create_links();
        $this->load->view("modulo/modulo_index",$data);
    }

    public function editar($accion,$codigo="",$codigodetalle=""){
        $lista = new stdClass();
        if($accion == "e"){
            $filter             = new stdClass();
            $filter->modulo     = $codigo;
            $moduilos           = $this->Modulo_model->obtener($filter); 
	    $lista->descripcion = $moduilos->MODULOC_Descripcion; 
            $lista->codigo      = $moduilos->MODULOP_Codigo;           
        }
        elseif($accion == "n"){ 
	    $lista->descripcion   = ""; 
            $lista->codigo        = ""; 
        } 
        $data['titulo']     = $accion=="e"?"Editar Modulo":"Nuevo Modulo"; 
        $data['form_open']  = form_open('',array("name"=>"frmPersona","id"=>"frmPersona"));     
        $data['form_close'] = form_close();         
        $data['lista']	    = $lista;  
        $data['accion']	    = $accion;  
        $data['aula']       = array();
        $data['oculto']     = form_hidden(array("accion"=>$accion));
        $this->load->view("modulo/modulo_nuevo",$data);
    }

    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "MODULOC_Descripcion" => $this->input->post('descripcion')
                       );
        $resultado = false;
        if($accion == "n"){
            $resultado = true;            
            $codigo = $this->Modulo_model->insertar($data); 
        }
        elseif($accion == "e"){
            $resultado = true;            
            $this->Modulo_model->modificar($codigo,$data);
        }                                   
        echo json_encode($resultado);
    }
	
    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $this->Modulo_model->eliminar($codigo);
        $resultado = true;
        echo json_encode($resultado);
    }
    
    public function ver($codigo){
        $filter           = new stdClass();
        $filter->orden    = $codigo;
        $ordenes          = $this->matricula_model->obtener($filter);
        $codproducto      = $ordenes->PROD_Codigo;
        $codcliente       = $ordenes->CLIP_Codigo;
        $filter           = new stdClass();
        $filter->cliente  = $codcliente; 
        $clientes         = $this->Alumno_model->obtener($filter);
        $filter           = new stdClass();
        $filter->curso = $codproducto; 
        $productos        = $this->Curso_model->obtener($filter);        
        $this->load->library("fpdf/pdf");
        $CI = & get_instance();
        $CI->pdf->FPDF('P');
        $CI->pdf->AliasNbPages();
        $CI->pdf->AddPage();
        $CI->pdf->SetTextColor(0,0,0);
        $CI->pdf->SetFillColor(216,216,216);
        $CI->pdf->SetFont('Arial','B',11);
        $CI->pdf->Image('img/puertosaber.jpg',10,8,10);
        $CI->pdf->Cell(0,13,"MATRICULA Nro ".$ordenes->ORDENC_Numero,0,1,"C",0);
         $CI->pdf->SetFont('Arial','B',7);
        $CI->pdf->Cell(120,10, "" ,0,1,"L",0);
        $CI->pdf->Cell(90,5, "CURSO : " ,1,0,"L",0);
        $CI->pdf->Cell(1,1, "" ,0,0,"L",0);
        $CI->pdf->Cell(90,5,$productos->PROD_Nombre,1,1,"L",0);
        $CI->pdf->Cell(90,1, "" ,0,1,"L",0);
        $CI->pdf->Cell(90,5, "APELLIDOS Y NOMBRES: " ,1,0,"L",0);
        $CI->pdf->Cell(1,1, "" ,0,0,"L",0);
        $CI->pdf->Cell(90,5,$clientes->PERSC_ApellidoPaterno." ".$clientes->PERSC_ApellidoMaterno.", ".$clientes->PERSC_Nombre,1,1,"L",0); 
        $CI->pdf->Cell(90,1, "" ,0,1,"L",0);
        $CI->pdf->Cell(90,5, "USUARIO: " ,1,0,"L",0);
        $CI->pdf->Cell(1,1, "" ,0,0,"L",0);
        $CI->pdf->Cell(90,5,$ordenes->ORDENC_Usuario ,1,1,"L",0);
         $CI->pdf->Cell(90,1, "" ,0,1,"L",0);
        $CI->pdf->Cell(90,5, "CLAVE: " ,1,0,"L",0);
        $CI->pdf->Cell(1,1,$ordenes->ORDENC_Password,0,0,"L",0);
        $CI->pdf->Cell(90,5, "" ,1,1,"L",0);
         $CI->pdf->Cell(90,1, "" ,0,1,"L",0);         
        $CI->pdf->Cell(90,5, "RESPONSABLE: " ,1,0,"L",0);
        $CI->pdf->Cell(1,1, "" ,0,0,"L",0);
        $CI->pdf->Cell(90,5, "" ,1,1,"L",0);   
         $CI->pdf->Cell(90,1, "" ,0,1,"L",0);
        $CI->pdf->SetTextColor(0,0,0);
        $CI->pdf->SetFillColor(255,255,255);
        $CI->pdf->Cell(181,5, "OBSERVACION : " ,0,1,"L",1);
        $CI->pdf->Cell(181,5,$ordenes->ORDENC_Observacion,1,1,"L",1);
        $CI->pdf->Output();
    }
    
     public function export_excel($type) {
        if($this->session->userdata('data_'.$type)){
            $result = $this->session->userdata('data_'.$type);
            $arr_columns = array();            
            switch ($type) {
                case 'listar_requisiciones_ot':
                    $this->reports_model->rpt_general('rpt_'.$type, 'REQUISICIONES POR OT', $result["columns"], $result["rows"],$result["group"]);
                    break;
                case 'listar_control_pesos1':
                case 'listar_control_pesos2':
                case 'listar_control_pesos3':
                case 'listar_control_pesos4':
                case 'listar_control_pesos5':
                case 'listar_control_pesos':
                    $arr_export_detalle = array();
                    $arr_columns[]['STRING']  = 'NRO.OT';
                    $arr_columns[]['STRING']  = 'NOMBRE';
                    $arr_columns[]['STRING']  = 'PROYECTO';
                    $arr_columns[]['STRING']  = 'TIPO PRODUCTO';
                    $arr_columns[]['DATE']    = 'F.INICIO';
                    $arr_columns[]['DATE']    = 'F.TERMINO';
                    $arr_columns[]['NUMERIC'] = 'W.REQUISICION';
                    $arr_columns[]['NUMERIC'] = 'W.PPTO.';
                    //$arr_columns[]['NUMERIC'] = 'W.METRADO';
                    $arr_columns[]['NUMERIC'] = 'W.O.TECNICA';
                    $arr_columns[]['NUMERIC'] = 'W.GALVANIZADO';
                    $arr_columns[]['NUMERIC'] = 'W.PRODUCCION';
                    $arr_columns[]['NUMERIC'] = 'W.ALMACEN';
                    $arr_group = array();
                    $this->reports_model->rpt_general('rpt_'.$type,'Control de pesos',$arr_columns,$result["rows"],$arr_group); 
                    break;
                case'productos_x_ot':
                    $arr_export_detalle = array();
                    $arr_columns[]['STRING']  = 'NRO.OT';
                    $arr_columns[]['STRING']  = 'T.TORRE';
                    $arr_columns[]['STRING']  = 'CODIGO';
                    $arr_columns[]['STRING']  = 'FAMILIA';
                    $arr_columns[]['STRING']  = 'DESCRIPCION';
                    $arr_columns[]['NUMERIC'] = 'INGRESO';
                    $arr_columns[]['NUMERIC'] = 'SALIDA';
                    $arr_columns[]['NUMERIC'] = 'SALDO';
                    $arr_columns[]['NUMERIC'] = 'INGRESO';
                    $arr_columns[]['NUMERIC'] = 'SALIDA';
                    $arr_columns[]['NUMERIC'] = 'SALDO';
                    $arr_group = array('E5:G5'=>'CANTIDAD','H5:K5'=>'MONTO');
                    $arr_group = array();
                    $this->reports_model->rpt_general('rpt_'.$type,'pRODUCTOS POR OT',$arr_columns,$result["rows"],$arr_group); 
                    break;
            }
        }else{
            echo "<div style='color:rgb(150,150,150);padding:10px;width:560px;height:160px;border:1px solid rgb(210,210,210);'>
                No hay datos para exportar
                </div>";
        }
    }
    
    public function export_pdf($type){     
        switch ($type) {
            case 'rpt_asignacion_aulas':
                $curso    = $this->input->get_post('curso_rpt');
                $ciclo = $this->input->get_post('ciclo_rpt');
                $filter = new stdClass();
                $filter->curso = $curso;
                $filter->order_by= array("d.PERSC_ApellidoPaterno"=>"asc");
                $profesores = $this->profesor_model->listar($filter);
                if($ciclo!=0 && $curso!=0){
                    $filter = new stdClass();
                    $filter->ciclo = $ciclo;
                    $ciclos = $this->ciclo_model->obtener($filter);
                    $this->load->library("fpdf/pdf");
                    $CI = & get_instance();
                    $CI->pdf->FPDF('L');
                    $CI->pdf->AliasNbPages();
                    $CI->pdf->AddPage();
                    $CI->pdf->SetTextColor(0,0,0);
                    $CI->pdf->SetFillColor(216,216,216);
                    $CI->pdf->SetFont('Arial','B',11);
                    $CI->pdf->Image('img/uni.gif',10,8,10);
                    $CI->pdf->Cell(0,5,"ASIGNACION DE AULAS",0,1,"C",0);
                    $CI->pdf->Cell(0,10,$ciclos->COMPC_Nombre,0,1,"C",0);
                    $CI->pdf->SetFont('Arial','B',6);   
                    /*Fila de turnos*/
                    $filter = new stdClass();
                    $filter->estado = 1;                
                    $turnos = $this->turno_model->listar($filter);
                    $CI->pdf->Cell(45,4,"",0,0,"L",0);
                    foreach($turnos as $item => $value){
                       $CI->pdf->Cell(84,4,$value->TURNOC_Descripcion,1,0,"C",0); 
                    }
                    $CI->pdf->Cell(10,4,"",0,1,"L",0);
                    /*Fila de tipos de estudio*/
                    $CI->pdf->Cell(45,4,"",0,0,"L",0);
                    for($i=0;$i<count($turnos);$i++){
                        $filter = new stdClass();
                        $filter->ciclo = $ciclo;
                        $tiposestudio = $this->tipoestudiociclo_model->listar($filter);
                        foreach($tiposestudio as $item=>$value){
                            $arr_tipoe = explode(" ",$value->TIPC_Nombre);
                            $nom_tipoe = count($arr_tipoe)==2?$arr_tipoe[1]:$arr_tipoe[0];
                            $CI->pdf->Cell(12,4,$nom_tipoe,1,0,"C",0);
                        }
                    }
                    $CI->pdf->Cell(71,4,"AULAS",1,1,"C",0);
                    /*Fila de grupos*/
                     $CI->pdf->Cell(45,4,"",0,0,"L",0);
                     for($i=0;$i<count($tiposestudio)*count($turnos);$i++){
                         $CI->pdf->Cell(6,4,"I",1,0,"C",0);
                         $CI->pdf->Cell(6,4,"II",1,0,"C",0);
                     }
                     foreach($tiposestudio as $item=>$value){
                         $arr_tipoe = explode(" ",$value->TIPC_Nombre);
                         $nom_tipoe = count($arr_tipoe)==2?$arr_tipoe[1]:$arr_tipoe[0];
                         $CI->pdf->Cell(9,4,$nom_tipoe,1,0,"C",0);
                     }
                     $CI->pdf->Cell(8,4,"TOTAL",1,1,"L",0);

                     /*lISTADO de profesores*/
                    foreach($profesores as $item=>$value){
                        $CI->pdf->Cell(5,4,$item+1,1,0,"L",0);
                        $CI->pdf->Cell(40,4,$value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno.", ".$value->PERSC_Nombre,1,0,"L",0);   
                        foreach($turnos as $itm1=>$val1){
                            $turno_id = $val1->TURNOP_Codigo;
                            foreach($tiposestudio as $itm2=>$val2){
                                $tipoestudio_id = $val2->TIPP_Codigo;
                                for($grupo_id=1;$grupo_id<=2;$grupo_id++){
                                    $filter = new stdClass();
                                    $filter->turno       = $turno_id;
                                    $filter->tipoestudio = $tipoestudio_id;
                                    $filter->grupo       = $grupo_id;
                                    $filter->profesor    = $value->PROP_Codigo;
                                    $aulas = $this->asignacion_model->rpt_asignacion_aulas($filter);
                                    $nom_aula = isset($aulas->AULAC_Nombre)?$aulas->AULAC_Nombre:"";
                                    $CI->pdf->Cell(6,4,$nom_aula,1,0,"C",0);  
                                    if($nom_aula!=""){
                                        if(isset($cantidad[$tipoestudio_id])){
                                            $cantidad[$tipoestudio_id] = $cantidad[$tipoestudio_id] + 1;
                                        }
                                        else{
                                            $cantidad[$tipoestudio_id] = 1;
                                        }
                                    }
                                }
                            }
                        }
                        $t_valor = 0;
                        foreach($tiposestudio as $itm3=>$val3){
                            $tipo_id = $val3->TIPP_Codigo;
                            $valor = isset($cantidad[$tipo_id])?$cantidad[$tipo_id]:0;
                            $t_valor = $t_valor + $valor;
                            $CI->pdf->Cell(9,4,$valor,1,0,"R",0);
                            $cantidad[$tipo_id] = 0;
                        }
                        $CI->pdf->Cell(8,4,$t_valor,1,1,"R",0);
                        $t_valor = 0;
                    }   
                    $CI->pdf->Output();                    
                }
                break;
            case 'rpt_horario_curso':
               $curso    = $this->input->get_post('curso_rpt');
                $ciclo = $this->input->get_post('ciclo_rpt');
                $filter = new stdClass();
                $filter->ciclo = $ciclo;
                $ciclos = $this->ciclo_model->obtener($filter);
                $this->load->library("fpdf/pdf");
                $CI = & get_instance();
                $CI->pdf->FPDF('P');
                $CI->pdf->AliasNbPages();
                $CI->pdf->AddPage();
                $CI->pdf->SetTextColor(0,0,0);
                $CI->pdf->SetFillColor(216,216,216);
                $CI->pdf->SetFont('Arial','B',11);
                $CI->pdf->Image('img/uni.gif',10,8,10);
                $CI->pdf->Cell(0,5,"HORARIO POR CURSO",0,1,"C",0);
                if($ciclo!=0){                    
                    $CI->pdf->Cell(0,10,$ciclos->COMPC_Nombre,0,1,"C",0);
                    $CI->pdf->SetFont('Arial','B',8);  
                    $arrDias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
                    foreach($arrDias as $item => $value){
                        if($item>0){
                            $CI->pdf->Cell(28,4,strtoupper($arrDias[$item]),1,0,"C",0);
                        }
                        else{
                            $CI->pdf->Cell(18,4,"AULA",1,0,"C",0);
                        }
                    }
                    $CI->pdf->Cell(1,4,"",0,1,"C",0);
                    $filter = new stdClass();
                    $filter->order_by = array("a.AULAC_Nombre"=>"asc");
                    $aulas = $this->aula_model->listar($filter);
                    foreach($aulas as $item => $value){
                        for($i=0;$i<4;$i++){
                            $nom_curso = "";
                            $id_aula = $value->AULAP_Codigo;
                            if($i==0)
                                $nom_aula = $value->AULAC_Nombre;
                            else
                                $nom_aula = "";
                            $CI->pdf->Cell(18,4,$nom_aula,1,0,"C",0);
                            for($id_dia=1;$id_dia<7;$id_dia++){
                                $filter = new stdClass();
                                $filter->ciclo = $ciclo;
                                $filter->dia   = $id_dia;
                                $filter->aula  = $id_aula;
                                if($curso!=0)  $filter->curso = $curso;
                                $cursos = $this->asignaciondetalle_model->rpt_horario_curso($filter);
                                $nom_curso = isset($cursos->PROD_Nombre)?$cursos->PROD_Nombre:"";
                                $nom_profesor = isset($cursos->PROD_Nombre)?"/".$cursos->PERSC_ApellidoPaterno:"";
                                $CI->pdf->Cell(28,4,$nom_curso.$nom_profesor,1,0,"C",0);    
                            }
                            $CI->pdf->Cell(5,4,"",0,1,"C",0);    
                        }
                    }                    
                }
                $CI->pdf->Output();
                break;
        }
    }    
}