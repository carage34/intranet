  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

	public function index()
	{
		//var_dump($b);
		$this->load->model('categorie_model');
		
		
		$categorie = $this->categorie_model->getCategorie();
		$sousCat = $this->categorie_model->getSousCategorie();
		$data=array("categories"=>$categorie,  "sousCategorie"=>$sousCat);
		$this->load->view('header', $data);
		$cat = $this->input->get("cat");
        $scat =  "Scat : ".$this->input->get("scat");
        $types = $this->categorie_model->getType();
        $this->load->view("contenu", array("types" => $types));

	}
}
