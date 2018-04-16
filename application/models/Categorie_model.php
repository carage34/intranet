 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Categorie_model extends CI_Model {
 	public function getCategorie() {
 		$this->load->database();
 		$query = "SELECT * FROM categorie";
 		$res = $this->db->query($query);
 		return $res->result();
 	}

 	public function getSousCategorie() {
 		$this->load->database();
 		$query = "SELECT idCategorie, nomS, id FROM sousCategorie";
 		$res = $this->db->query($query);
 		return $res->result();
 	}

 	public function getSousCategorieWhere($st) {
 		$this->load->database();
 		$query = "SELECT idCategorie, nomS, id FROM sousCategorie WHERE idCategorie = ?";
 		$res = $this->db->query($query, array($st));
 		return $res->result();		
 	}

 	public function insertCategorie($categorie) {
 		$this->load->database();
 		$catInfo=array(
 			'nomC'=>$categorie
 		);
 		$this->db->insert('categorie', $catInfo);
 	}

 	public function insertSous($sousCategorie, $idCategorie) {
 		$this->load->database();
 		$sousInfo = array(
 			'idCategorie'=>$idCategorie,
 			'nomS'=>$sousCategorie
 		);
 		$this->db->insert('sousCategorie', $sousInfo);
 	}
 	public function getType() {
 	    $this->load->database();
 	    $query="SELECT * FROM typeContenu";
 	    $res=$this->db->query($query);
 	    return $res->result();
    }
 }