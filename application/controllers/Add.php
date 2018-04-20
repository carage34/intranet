  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

	public function index()
	{
		$this->load->model('categorie_model');
		$categorie = $this->categorie_model->getCategorie();
		$sousCat = $this->categorie_model->getSousCategorie();
		$types = $this->categorie_model->getType();
		$data=array("categories"=>$categorie,  "sousCategorie"=>$sousCat);
		$this->load->view('header', $data);
		$donne = array('types'=>$types);
		$this->load->view('ajout_contenu', $donne);
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

	public function insertData() {
	    if($this->input->post("choix")==1) {
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt';
            $config['max_size'] = 1024 * 8;
            $this->load->library("upload", $config);
            if (!$this->upload->do_upload('contenu')) {
                echo $this->upload->display_errors();

            } else {
                $data = $this->upload->data();
                echo $data['file_name'];
                echo "Fichier upload avec succès";
                var_dump($this->input->post("contenu"));
            }
        }
        $catgorie = $this->input->post("cate");
        $soucCat = $this->input->post("sousCate");
        $contenu = $this->input->post("contenu");
        $desc = $this->input->post("desc");
        if($desc=="") $desc=null;
        $titre = $this->input->post("title");


    }
}
