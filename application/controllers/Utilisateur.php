<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulitisateur extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper('assets');
		$this->load->model('produitmodel', 'pm');
		$this->load->model('adminmodel', 'am');
		$this->load->model('utilisateurmodel', 'um');
		$this->load->helper('url');
		$this->load->library("pagination");
		$this->load->library('session');
	

	}
    
    public function listerecette()
    {
            $p = 4;
            $data['listerecette'] = $this->um->getListeRecette();
            $data['nbrRecette'] = $this->um->countRecette();
            $d = $data['nbrRecette'][0]['isa']/4;
            $dd = $d+1;
            $a = intval($dd);
            $data['nbrPage'] = $a;
            //$data['categories'] = $this->pm->getAllCategorie();
            $this->load->view('recette', $data);
    }
}
?>