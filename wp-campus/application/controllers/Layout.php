<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Layout  extends CI_Controller {
    var $empresa;

    public function __construct () {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Empresa_model');
        $this->empresa = $this->config->item('empresa');
    }

    public function load_layout($view, $params = null)
    {
        // Paso por parámetro la vista $view al layout y la muestro
        $data['empresa'] = $this->Empresa_model->get($this->empresa);
        $data['content'] = $this->load->view($view, $params, true);
        $this->load->view('layout/load_layout',$data, false);
 
    }
}