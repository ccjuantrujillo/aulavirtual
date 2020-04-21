<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matricula extends CI_Controller {
    
    public function __construct(){
        parent::__construct(); 
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");            
        $this->load->model('Matricula_model');      
        $this->load->model('Curso_model');   
        $this->load->model('Aula_model');  
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
        //$filter->order_by = array("f.PROD_Nombre"=>"asc","e.PERSC_ApellidoPaterno"=>"asc","e.PERSC_ApellidoMaterno"=>"asc");
        $filter_not = new stdClass(); 
        $registros = count($this->Matricula_model->listar($filter,$filter_not));
        $ordenes   = $this->Matricula_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($ordenes)>0){
            foreach($ordenes as $indice => $value){
                $lista[$indice]           = new stdClass();
                $lista[$indice]->codigo   = $value->MATRICP_Codigo;
                $lista[$indice]->nombres  = $value->PERSC_Nombre;
                $lista[$indice]->paterno  = $value->PERSC_ApellidoPaterno;
                $lista[$indice]->materno  = $value->PERSC_ApellidoMaterno;
                $lista[$indice]->curso    = $value->CURSOC_Nombre;
                $lista[$indice]->aula     = $value->AULAC_Descripcion;
                $lista[$indice]->fechareg = $value->fechareg;
                $lista[$indice]->fecha    = $value->MATRICC_Fecha;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/matricula/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']        = $lista;
        $data['menu']         = $menu;
        $data['form_open']    = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));     
        $data['form_close']   = form_close();         
        $data['j']            = $j;
        $data['registros']    = $registros;
        $data['paginacion']   = $this->pagination->create_links();
        $this->load->view("matricula/matricula_index",$data);
    }

    public function editar($accion,$codigo=""){
        $lista = new stdClass();
        $lista->accion = $accion;
        $lista->codigo = $codigo;
        if($accion == "e"){
            $filter            = new stdClass();
            $filter->matricula = $codigo;
            $matricula         = $this->Matricula_model->obtener($filter);
            $lista->paterno    = $matricula->PERSC_ApellidoPaterno;  
            $lista->materno    = $matricula->PERSC_ApellidoMaterno;  
            $lista->nombres    = $matricula->PERSC_Nombre;  
            $lista->curso      = $matricula->CURSOP_Codigo; 
            $lista->fecha      = date_sql($matricula->MATRICC_Fecha);  
            $lista->alumno     = $matricula->ALUMP_Codigo; 
            $lista->matricula  = $matricula->MATRICP_Codigo;
            $lista->aula       = $matricula->AULAP_Codigo;
            $lista->observacion= $matricula->MATRICC_Observacion;
        }
        elseif($accion == "n"){ 
            $lista->paterno    = "";  
            $lista->materno    = ""; 
            $lista->nombres    = "";  
            $lista->curso      = $this->input->get_post('curso'); 
            $lista->fecha      = date("d/m/Y",time());
            $lista->alumno     = "";
            $lista->matricula  = "";
            $lista->aula       = "";
            $lista->observacion= "";
        } 
        $arrEstado          = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
        $filter   = new stdClass();
        $filter->curso = $lista->curso;
        $curso    = $this->Curso_model->obtener($filter);
        $lista->cantidad   = 0;
        $lista->intentos   = 0;
        $data['titulo']     = $accion=="e"?"Editar Matricula":"Nueva Matricula"; 
        $data['form_open']  = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));     
        $data['form_close'] = form_close();         
        $data['lista']	    = $lista;  
        $data['accion']	    = $accion;  
        $data['txtobservacion'] = form_textarea('observacion', '');
        $data['selcurso']   = form_dropdown('curso',$this->Curso_model->seleccionar('0'),$lista->curso,"id='curso' class='comboMedio'");         
        $data['selaula']  = form_dropdown('aula',$this->Aula_model->seleccionar('0'),$lista->aula,"id='aula' class='comboMedio'");
        $data['oculto']     = form_hidden(array("accion"=>$accion,"codigo"=>$codigo));
	$this->load->view("matricula/matricula_nuevo",$data);
    }

    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "MATRICC_Fecha"       => $this->input->post('fecha'),
                        "CURSOP_Codigo"       => $this->input->post('curso'),
                        "AULAP_Codigo"        => $this->input->post('aula'),
                        "ALUMP_Codigo"        => $this->input->post('alumno'),
                        "MATRICC_Observacion" => $this->input->post('observacion')
                       );
        $resultado = false;
        if($accion == "n"){
            $resultado = true;
            $this->Matricula_model->insertar($data);                      
        }
        elseif($accion == "e"){ 
            $resultado = true;
            $this->Matricula_model->modificar($codigo,$data);                                
        }                                     
        echo json_encode($resultado);
    }
	
    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $resultado = true;
        $this->Matricula_model->eliminar($codigo);
        echo json_encode($resultado);
    }

    public function ver($codigo){
        $filter           = new stdClass();
        $filter->orden    = $codigo;
        $ordenes          = $this->orden_model->obtener($filter);
        $codproducto      = $ordenes->PROD_Codigo;
        $codcliente       = $ordenes->CLIP_Codigo;
        $filter           = new stdClass();
        $filter->cliente  = $codcliente; 
        $clientes         = $this->cliente_model->obtener($filter);
        $filter           = new stdClass();
        $filter->producto = $codproducto; 
        $productos        = $this->producto_model->obtener($filter);        
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

    public function buscar($n=""){
        $tipo    = $this->input->get_post('tipo');
        $ot      = $this->input->get_post('ot');
        $rsocial = $this->input->get_post('rsocial');
        $filter  = new stdClass();
        $filter->anio = date('Y',time());
        $filter->tipo = "OT";
        $tipoots = $this->tipoot_model->listar($filter);
        if($tipo=='') $tipo = isset($tipoots->cod_argumento)?$tipoots->cod_argumento:"";
        $fila   = "";
        $filter = new stdClass();
        $filter->tipoot = $tipo;
        if($ot!='')      $filter->nroot      = $ot;
        if($rsocial!='') $filter->codcliente = $rsocial;
        if($tipo=="04")  $filter->estado     = "P";
        $ots = $this->ot_model->listarg($filter,array('ot.nroOt'=>'asc'));         
        $tipoOt     = form_dropdown('tipo',$this->tipoot_model->seleccionar('',''),$tipo,"id='tipo' class='comboMedio' onchange='busca_tipoOt();'");   
        if(count($ots)>0){
            foreach($ots as $indice=>$value){
                $nroot  = $value->NroOt;
                $site   = $value->DirOt;
                $codcli = $value->CodCli;
                $codot  = $value->CodOt; 
                $finot  = $value->FinOt;
                $ftermino  = $value->FteOt;
                $razon_social = $tipo=='04'?$site:$value->razcli;
              // quitar esto { 
                $finot_envia = $tipo=='04'?date("d/m/Y",time()):$value->FinOt;
              // } 
                $fila .= "<tr   title='Fecha Termino: ".$ftermino."'     id='".$codot."' id2='".$tipo."'  id3='".$finot."' onclick='listadoot(this);'>";
                $fila .= "<td style='width:10%;' align='center'><p class='listadoot'>".$nroot."</p></td>";
                $fila .= "<td style='width:35%;' align='left'><p class='listadoot'>".$site."</p></td>";
                $fila .= "<td style='width:12%;' align='left'><p class='listadoot'>".$finot."</p></td>";
                $fila .= "<td style='width:12%;' align='left'><p class='listadoot'>".$ftermino."</p></td>";
                $fila .= "<td style='width:31%;' align='left'><p class='listadoot'>".$razon_social."</p></td>";
                $fila .= "</tr>";
            }
        }  
        else{
            $fila.="<tr>";
            $fila.="<td colspan='3'>NO EXISTEN RESULTADOS</td>";
            $fila.="</tr>";
        }
        $data['ot']   = $ot;
        $data['n']    = $n;
        $data['fila'] = $fila;
        $data['tipoot']  = $tipoOt;
        $data['rsocial'] = $rsocial;
        $this->load->view(ventas."ot_buscar",$data);  
    }

    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $apertura = $this->Matricula_model->obtener($filter);
        $resultado = json_encode($apertura);       
        echo $resultado; 
    }    
}