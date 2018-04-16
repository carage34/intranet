  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

	public function index()
	{
		$this->load->model('categorie_model');
		$cat = $this->input->post("cate");
		if($cat) echo "lol";
		$categorie = $this->categorie_model->getCategorie();
		$sousCat = $this->categorie_model->getSousCategorie();
		$data=array("categories"=>$categorie,  "sousCategorie"=>$sousCat);
		$this->load->view('header', $data);
		$this->load->view('ajout_contenu');
	}

	public function getSousCat($cat) {
		$this->load->model('categorie_model');
		$sousCat = $this->categorie_model->getSousCategorieWhere($cat);
		$html="";
		foreach($sousCat as $scat) {
			$html .='
			<option value='.$scat->id.'>'.$scat->nomS.'</option>
			';			
		}
		echo json_encode($html);
	}
}
