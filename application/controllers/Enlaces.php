<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Enlaces extends Layout{

	public function index()
	{
		$data['sistemas']  = $this->sistemas();
		$data['idiomas']   = $this->idiomas();
		$data['trabajo']   = $this->trabajo();
		$data['economia']  = $this->economia();
		$data['musica']    = $this->musica();
		$data['filosofia'] = $this->filosofia();
		$data['religion']  = $this->religion();
		$data['proyectos'] = $this->proyectos();
		$data['sise']      = $this->sise();
		$data['telecomunicaciones']      = $this->telecomunicaciones();
		$data['electronica'] = $this->electronica();
		$data['tesis']       = $this->tesis();
		$data['interesante'] = $this->interesante();
		$this->load_layout('enlaces/index',$data);
	}
	public function sistemas(){
		return $this->load->view('enlaces/sistemas','',TRUE);	
	}
	public function idiomas(){
		return $this->load->view('enlaces/idiomas','',TRUE);	
	}	
	public function trabajo(){
		return $this->load->view('enlaces/trabajo','',TRUE);	
	}	
	public function economia(){
		return $this->load->view('enlaces/economia','',TRUE);	
	}	
	public function musica(){
		return $this->load->view('enlaces/musica','',TRUE);	
	}	
	public function filosofia(){
		return $this->load->view('enlaces/filosofia','',TRUE);	
	}	
	public function religion(){
		return $this->load->view('enlaces/religion','',TRUE);	
	}		
	public function proyectos(){
		return $this->load->view('enlaces/proyectos','',TRUE);	
	}	
	public function sise(){
		return $this->load->view('enlaces/sise','',TRUE);	
	}	
	public function telecomunicaciones(){
		return $this->load->view('enlaces/telecomunicaciones','',TRUE);	
	}	
	public function electronica(){
		return $this->load->view('enlaces/electronica','',TRUE);	
	}	
	public function tesis(){
		return $this->load->view('enlaces/tesis','',TRUE);	
	}		
	public function interesante(){
		return $this->load->view('enlaces/interesante','',TRUE);	
	}										
}