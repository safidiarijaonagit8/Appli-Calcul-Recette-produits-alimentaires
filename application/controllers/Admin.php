<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('assets');
        // $sess = $this->session->userdata('admin');
        // if ($sess == null) {

        //     redirect('Accueil');
        // }
    }
}
?>