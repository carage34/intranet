<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller
{
    private $cat=1;
    private $scat=1;

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

    public function getNumberOfThing()
    {
        $this->load->model('categorie_model');
        $tab = array();
        $file = $this->categorie_model->getNumberFile($this->cat, $this->scat);
        array_push($tab, $file);
        $link = $this->categorie_model->getNumberWebLink($this->cat, $this->scat);
        array_push($tab, $link);
        echo json_encode($tab);
    }
}
