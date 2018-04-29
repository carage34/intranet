<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller
{
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
        $types = $this->categorie_model->getType();
        $tabc = array("cat" => $cat, "scat" => $scat);
        $this->load->view("contenu", array("types" => $types, "tabc" => $tabc));
    }

    public function getNumberOfThing()
    {
        $this->load->model('categorie_model');
        $cat = $this->input->post("cat");
        $scat = $this->input->post("scat");
        $tab = array();
        $file = $this->categorie_model->getNumberFile($cat, $scat);
        array_push($tab, $file);
        $link = $this->categorie_model->getNumberWebLink($cat, $scat);
        array_push($tab, $link);
        echo json_encode($tab);
    }

    public function getContenu()
    {
        $this->load->model('categorie_model');
        $cat = $this->input->post("cat");
        $scat = $this->input->post("scat");
        $contenu = $this->input->post("contenu");
        if ($contenu == "file") {
            $files = $this->categorie_model->getFile($cat, $scat);
            echo json_encode($files);
        }

    }
}
