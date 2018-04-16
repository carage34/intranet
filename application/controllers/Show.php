<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

    public function index()
    {
        $id=$this->input->post('id');
        $this->load->view($id);
    }
}