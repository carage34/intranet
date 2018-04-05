 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajout extends CI_Controller {

	public function index()
	{
		if($this->form_validation->run()==false) {
		$this->load->model('categorie_model');
		$categorie = $this->categorie_model->getCategorie();
		$sousCat = $this->categorie_model->getSousCategorie();
		$data=array("categories"=>$categorie,  "sousCategorie"=>$sousCat);
		$this->load->view('ajout_categorie', $data);
		$this->form_validation->set_rules('cat', "Catégorie", 'trim|required');
	} else {
		$categorie = $this->security->xss_clean($this->input->post('cat'));
		$this->categorie_model->insertCategorie($categorie);
		$this->load->view('indexx');
		}	
	}

	public function sous() {
		if($this->form_validation->run()==false) {
		$this->load->model('categorie_model');
		$this->form_validation->set_rules('cate', '"Sous catégorie"', 'required|callback_selectSous');
		$this->form_validation->set_rules('scat', "Sous catégorie", 'trim|required');
	} else {
		$categorie = $this->input->post('cate');
		$sousCat = $this->input->post('scat');
		$this->categorie_model->insertSous($categorie, $sousCat);
		$this->load->view('indexx');
	}
	}
	public function selectSous($sousC) {
		if($sousC=="none") {
			$this->form_validation->set_message('selectSous', "Veuillez selectionner une catégorie");
			return FALSE;
		} else {
			return TRUE;
		} 
	}
}
