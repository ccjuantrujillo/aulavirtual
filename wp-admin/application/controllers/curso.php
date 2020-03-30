<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curso extends CI_Controller {
    var $compania;
    var $configuracion;

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        $this->load->model('Empresa_model');
        $this->load->model('Curso_model');	 
        $this->load->model('Ciclo_model');            
        $this->load->model('Profesor_model');  
        $this->load->model('Area_model');  
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
        $this->login   = $this->session->userdata('login');
    }

    public function index(){
        $this->load->view('seguridad/inicio');
    }
    
    public function listar($j=0){
        $filter           = new stdClass();
        $filter->rol      = $this->session->userdata('rolusu');	
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu       = get_menu($filter);
        $filter     = new stdClass();   
        $filter_not = new stdClass(); 
        $filter->order_by = array("e.CICLOC_DESCRIPCION"=>"asc","c.CURSOC_Nombre"=>"asc");
        $registros = count($this->Curso_model->listar($filter,$filter_not));
        $productos = $this->Curso_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($productos)>0){
            foreach($productos as $indice=>$valor){ 
                $lista[$indice]           = new stdClass();
                $lista[$indice]->codigo   = $valor->CURSOP_Codigo;
                $lista[$indice]->nombre   = $valor->CURSOC_Nombre;
                $lista[$indice]->profesor = $valor->PERSC_Nombre." ".$valor->PERSC_ApellidoPaterno;
                $lista[$indice]->estado   = $valor->CURSOC_FlagEstado;
                $lista[$indice]->fechareg = $valor->CURSOC_FechaRegistro;
                $lista[$indice]->ciclo    = $valor->CICLOC_DESCRIPCION;
                $lista[$indice]->video    = $valor->CURSOC_Video;
                $lista[$indice]->area     = $valor->AREAC_Descripcion;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/almacen/curso/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/       
        $data['lista']      = $lista;
        $data['menu']       = $menu;
        $data['header']     = get_header();        
        $data['registros']  = $registros;
        $data['j']          = $j;
        $data['paginacion'] = $this->pagination->create_links();
        $this->load->view('curso/curso_index',$data);
    }

    public function editar($accion,$codigo=""){
        $lista = new stdClass();
        $lista->accion = $accion;
        $lista->codigo = $codigo;
        if($accion == "e"){
            $filter                = new stdClass();
            $filter->curso         = $codigo;
            $productos             = $this->Curso_model->obtener($filter);
            $filter                = new stdClass();
            $filter->curso         = $codigo;
            $lista->producto       = $codigo;
            $lista->ciclo          = $productos->CICLOP_Codigo;
            $lista->nombre         = $productos->CURSOC_Nombre;  
            $lista->descripcion    = $productos->CURSOC_DescripcionBreve;  
            $lista->imagen         = $productos->CURSOC_Imagen==""?"no_disponible.jpg":$productos->PROD_Imagen;
            $lista->imagenpdf      = $productos->CURSOC_Silabus!=""?"pdf.png":"";  
            $lista->silabus        = $productos->CURSOC_Silabus;
            $lista->especificacion = $productos->CURSOC_EspecificacionPDF;  
            $lista->comentario     = $productos->CURSOC_Comentario;  
            $lista->cantidad       = $productos->CURSOC_Cantidad;  
            $lista->intentos       = $productos->CURSOC_Intentos;  
            $lista->tiempo         = $productos->CURSOC_Tiempo;  
            $lista->tiempoprueba   = $productos->CURSOC_TiempoExamen;  
            $lista->puntaje        = $productos->CURSOC_Puntaje;  
            $lista->estado         = $productos->CURSOC_FlagEstado; 
            $lista->profesor       = $productos->PROP_Codigo; 
            $lista->video          = $productos->CURSOC_Video; 
            $lista->area           = $productos->AREAP_Codigo; 
        }
        elseif($accion == "n"){
            $lista->producto       = "";
            $lista->ciclo          = 0;
            $lista->nombre         = "";  
            $lista->descripcion    = "";  
            $lista->imagen         = "no_disponible.jpg";  
            $lista->imagenpdf      = "";  
            $lista->silabus        = "";
            $lista->especificacion = "";  
            $lista->comentario     = "";  
            $lista->cantidad       = "";  
            $lista->tiempo         = 5;  
            $lista->tiempoprueba   = 30;
            $lista->intentos       = 5;  
            $lista->puntaje        = 14;
            $lista->estado         = 1; 
            $lista->profesor       = "";  
            $lista->video          = "";  
            $lista->area           = "";
        }
        $data["principal"] = $this->editar_principal($lista);
        $data["archivos"]  = $this->editar_archivo($lista);
        $this->load->view('curso/curso_nuevo',$data);
    }  
    
    public function editar_principal($lista){
        $arrEstado          = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
        $data['titulo']     = $lista->accion=="e"?"Modificar Curso":"Nuevo Curso";
        $data['form_open']  = form_open(base_url()."index.php/curso/grabar",array("name"=>"frmBusqueda","id"=>"frmBusqueda","class"=>"formulario","enctype"=>"multipart/form-data"));
        $data['form_close']  = form_close();    
        $data['lista']	     = $lista;
        $data['selestado']   = form_dropdown('estado',$arrEstado,$lista->estado,"id='estado' class='comboMedio'");
        $filter = new stdClass();
        $data['selarea']     = form_dropdown('area',$this->Area_model->seleccionar($filter),$lista->area,"id='area' class='comboMedio'");
        $data['selciclo']    = form_dropdown('ciclo',$this->Ciclo_model->seleccionar(),$lista->ciclo,"id='ciclo' class='comboMedio'");
        $data['selprofesor'] = form_dropdown('profesor',$this->Profesor_model->seleccionar(),$lista->profesor,"id='profesor' class='comboMedio'");        
        $data['oculto']      = form_hidden(array('accion'=>$lista->accion,'codigo'=>$lista->codigo));
        $data['links']       = array("urlprod"=>base_url()."index.php/almacen/curso/editar/".$lista->accion."/".$lista->codigo,"urlatrib"=>base_url()."index.php/almacen/semana/listar/".$lista->accion."/".$lista->codigo,"urlcomp"=>"");
        return $this->load->view('curso/curso_nuevo_principal',$data,true);
	}
	
	public function editar_archivo($lista){     
        $data['form_open']  = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"","method"=>"post","enctype"=>"multipart/form-data"));
        $data['form_close'] = form_close();
        $data['lista']	    = $lista;
		$data['semana']     = form_input(array( 'name'  => 'semana','id' => 'semana','value' => '','maxlength' => '100','class' => 'cajaMedia'));
        $data['oculto']      = form_hidden(array('accion'=>$lista->accion,'codigo'=>$lista->codigo));
		$data["lista"] = $lista;
        return $this->load->view('curso/archivo_nuevo',$data,true);	
	}
	
    public function grabar(){
        /*Grabamos formulario*/
        $mensaje = array("subimage"=>false,"subarchivo"=>false);        
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "CURSOC_Nombre"            => trim($this->input->post('nombre')),
                        "CURSOC_DescripcionBreve"  => trim($this->input->post('descripcion')),
                        "CURSOC_EspecificacionPDF" => ($this->input->post('pdf')),
                        "CURSOC_Comentario"        => trim($this->input->post('comentario')),
                        "CURSOC_Cantidad"          => trim($this->input->post('cantidad')),
                        "CURSOC_Intentos"          => trim($this->input->post('intentos')),
                        "CURSOC_Tiempo"            => trim($this->input->post('tiempo')),
                        "CURSOC_Puntaje"           => trim($this->input->post('puntaje')),
                        "CICLOP_Codigo"            => $this->input->post('ciclo'),
                        "CURSOC_FlagEstado"        => $this->input->post('estado'),
                        "CURSOC_TiempoExamen"      => trim($this->input->post('tiempoprueba')),
                        "PROP_Codigo"              => $this->input->post('profesor'),
                        "CURSOC_Video"             => $this->input->post('video'),
                        "AREAP_Codigo"             => $this->input->post('area')
                       );     
        /*Subimos imagen*/
        if(isset($_FILES['imagen']['name']) && trim($_FILES['imagen']['name'])!=""){
            //$upload_folder  = "D:/Dropbox/script/php/puertosaber/img";
            $upload_folder  = "img";
            $nombre_archivo = $_FILES["imagen"]["name"];
            $tmp_archivo    = $_FILES["imagen"]["tmp_name"];
            $archivador     = $upload_folder."/".$nombre_archivo;
            $mensaje["subimage"] = true;
            if (!move_uploaded_file($tmp_archivo, $archivador)) {
                $mensaje["subimage"] = false;
            }
            $data["CURSOC_Imagen"] = $nombre_archivo;
        }
        /*Subimos archivo*/
        if(isset($_FILES['archivo']['name']) && trim($_FILES['archivo']['name'])!=""){
            $upload_folder  = "files";
            $nombre_archivo = $_FILES["archivo"]["name"];
            $tmp_archivo    = $_FILES["archivo"]["tmp_name"];
            $archivador     = $upload_folder."/".$nombre_archivo;
            $mensaje["subarchivo"] = true;
            if (!move_uploaded_file($tmp_archivo, $archivador)) {
                $mensaje["subarchivo"] = false;
            }
            $data["CURSOC_Silabus"] = $nombre_archivo;
        }
        if($accion == "n"){
            $this->Curso_model->insertar($data);
        }
        elseif($accion == "e"){
            $data['CURSOC_FechaModificacion'] = date("Y-m-d H:i:s",time());
            $this->Curso_model->modificar($codigo,$data);
        }
        //echo json_encode($mensaje);
		echo "<script>alert('Operacion realizada con exito.');location.href='".base_url()."index.php/curso/listar';</script>";
    }
    
    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $filter = new stdClass();
        $filter->curso = $codigo;
        //$videos = $this->semana_model->listar($filter);
        $resultado = false;
        //if(count($videos)==0){
            $resultado = true;
            $this->Curso_model->eliminar($codigo);
        //}
        echo json_encode($resultado);
    } 

    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $cursos  = $this->Curso_model->listar($filter);
        $resultado = json_encode($cursos);
        echo $resultado;
    }    
    
    public function export_excel($type){
            if($this->session->userdata('data_'.$type)){
                $result = $this->session->userdata('data_'.$type);
                switch ($type) {
                    case 'stock_productos':
                        $arr_columns = array();
                        $arr_export_detalle = array();
                        $arr_columns[]['STRING'] = 'CODIGO';
                        $arr_columns[]['STRING'] = 'ALMACEN';
                        $arr_columns[]['STRING'] = 'MATERIAL';
                        $arr_columns[]['STRING'] = 'LINEA';
                        $arr_columns[]['STRING'] = 'PRODUCTO';
                        $arr_columns[]['NUMERIC'] = 'PESO';
                        $arr_columns[]['STRING'] = 'UNIDAD';
                        $arr_columns[]['NUMERIC'] = 'STOCK ACTUAL';
                        $arr_columns[]['NUMERIC'] = 'STOCK COMPROM';
                        $arr_columns[]['NUMERIC'] = 'STOCK TRANS';
                        $arr_columns[]['NUMERIC'] = 'STOCK DISPONIBLE';
                        
                        $arr_group = array('H5:K5'=>'STOCK');
                        $this->reports_model->rpt_general('rpt_'.$type,'Stock_Productos', $arr_columns, $result["rows"],$arr_group);
                        break;         
                    case 'detalle_stock':
                        $arr_columns = array();
                        $arr_export_detalle = array();
                        $arr_columns[]['STRING'] = 'Fecha';
                        $arr_columns[]['STRING'] = 'Tipo_Mov';
                        $arr_columns[]['STRING'] = 'Documento';
                        $arr_columns[]['STRING'] = 'Numero';
                        $arr_columns[]['NUMERIC'] = 'Ingreso';
                        $arr_columns[]['NUMERIC'] = 'Salida';
                        $arr_columns[]['NUMERIC'] = 'Saldo';
                        $arr_columns[]['STRING'] = 'OT';
                        $arr_columns[]['STRING'] = 'REQUIRIMIENTO';
                        $arr_group = array();
                        $this->reports_model->rpt_general('rpt_'.$type,'Detalle de Producto',$arr_columns,$result["rows"],$arr_group);                          
                        break;
                    
                    case 'stock_comprometido':
                        
                        $arr_columns = array();
                        $arr_export_detalle = array();
                        $arr_columns[]['STRING']='NUM.REQ';
                        $arr_columns[]['STRING']='FECHA';
                        $arr_columns[]['STRING']='NROOT';		
                        $arr_columns[]['STRING']='CODRES';
                        $arr_columns[]['STRING']='APROBADO';
                        $arr_columns[]['STRING']='USERAPROB';
                        $arr_columns[]['NUMERIC']='CANTIDAD';
                        $arr_columns[]['NUMERIC']='CANTIDAD V.S.</td>';
                        $arr_columns[]['NUMERIC']='STOCK COMPROM.';
                        $arr_columns[]['STRING']='FECHA V.S.';
                        $arr_columns[]['STRING']='NUMERO V.S.';
                        $arr_columns[]['STRING']='VALUSER';
                        $arr_group = array();
                        $this->reports_model->rpt_general('rpt_'.$type,'Detalle de Stock Comprometido',$arr_columns,$result["rows"],$arr_group);                          
                        break;
                    
                    case 'stock_transito':
                        $arr_columns[]['STRING']='FECHA OC';
                        $arr_columns[]['STRING']='NUM OC';
                        $arr_columns[]['NUMERIC']='CANT. OC';		
                        $arr_columns[]['STRING']='FECHA NEA';
                        $arr_columns[]['STRING']='NUM. NEA';
                        $arr_columns[]['NUMERIC']='CANT. NEA';
                        $arr_columns[]['NUMERIC']='STOCK TRANS.';
                        $arr_group = array();
                        $this->reports_model->rpt_general('rpt_'.$type,'Detalle de Stock Transito',$arr_columns,$result["rows"],$arr_group);                          
                        break;
                }
            }
            else{
                echo "<div style='color:rgb(150,150,150);padding:10px;width:560px;height:160px;border:1px solid rgb(210,210,210);'>
                No hay datos para exportar
                </div>";
            }
        }
}
?>