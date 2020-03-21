<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Inicio extends Layout{

	public function index()
	{
		redirect('/curso/read');
	}
}