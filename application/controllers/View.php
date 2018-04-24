<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller
{
    private $cat;
    private $scat;

    public function index()
    {
        //var_dump($b);
        $this->load->model('categorie_model');


        $categorie = $this->categorie_model->getCategorie();
        $sousCat = $this->categorie_model->getSousCategorie();
        $data = array("categories" => $categorie, "sousCategorie" => $sousCat);
        $this->load->view('header', $data);
        $cat = $this->input->get("cat");
        $scat = $this->input->get("scat");
        $this->cat = $cat;
        $this->scat = $scat;
        $types = $this->categorie_model->getType();
        $this->load->view("contenu", array("types" => $types));

    }

    public function getNumberFileThing()
    {
        $this->load->model('categorie_model');
        if ($this->input->post("type")==="file") {
            echo $this->categorie_model->getNumberFile($this->cat, $this->scat);
        }
    }

}
