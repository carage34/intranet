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
 }