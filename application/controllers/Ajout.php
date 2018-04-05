 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajout extends CI_Controller {

	public function index()
	{
		$this->load->model('categorie_model');
		$categorie = $this->categorie_model->getCategorie();
		$sousCat = $this->categorie_model->getSousCategorie();
		$data=array("categories"=>$categorie,  "sousCategorie"=>$sousCat);
		$this->load->view('ajout_categorie', $data);
		
	}
}
