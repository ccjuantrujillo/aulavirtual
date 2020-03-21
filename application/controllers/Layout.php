<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Layout  extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->helper('url');
    }

    public function load_layout($view, $params = null)
    {
        // Paso por parámetro la vista $view al layout y la muestro
        $data = array();
        $data['content'] = $this->load->view($view, $params, true);
        $this->load->view('layout/load_layout',$data, false);
 
    }
}