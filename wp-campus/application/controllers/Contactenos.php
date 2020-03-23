<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Contactenos extends Layout{

	public function index()
	{
		$this->load_layout('contactenos/index');
	}
}