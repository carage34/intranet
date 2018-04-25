<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categorie_model extends CI_Model
{
    public function getCategorie()
    {
        $this->load->database();
        $query = "SELECT * FROM categorie";
        $res = $this->db->query($query);
        return $res->result();
    }

    public function getSousCategorie()
    {
        $this->load->database();
        $query = "SELECT idCategorie, nomS, id FROM sousCategorie";
        $res = $this->db->query($query);
        return $res->result();
    }

    public function getSousCategorieWhere($st)
    {
        $this->load->database();
        $query = "SELECT idCategorie, nomS, id FROM sousCategorie WHERE idCategorie = ?";
        $res = $this->db->query($query, array($st));
        return $res->result();
    }

    public function insertCategorie($categorie)
    {
        $this->load->database();
        $catInfo = array(
            'nomC' => $categorie
        );
        $this->db->insert('categorie', $catInfo);
    }

    public function insertSous($sousCategorie, $idCategorie)
    {
        $this->load->database();
        $sousInfo = array(
            'idCategorie' => $idCategorie,
            'nomS' => $sousCategorie
        );
        $this->db->insert('sousCategorie', $sousInfo);
    }

    public function getType()
    {
        $this->load->database();
        $query = "SELECT * FROM typeContenu";
        $res = $this->db->query($query);
        return $res->result();
    }

    public function insertFile($titre, $desc, $cat, $sousCat, $filename, $extension)
    {
        $this->load->database();
        $contenu_info = array(
            'idCat' => $cat,
            'idSousCat' => $sousCat,
            'titre' => $titre,
            'description' => $desc,
        );
        $this->db->insert('contenu', $contenu_info);
        $query = "SELECT id FROM contenu ORDER BY id DESC LIMIT 1";
        $res = $this->db->query($query);
        $last = $res->row();
        $stp = $last->id;
        $file_info = array(
            'nom' => $filename,
            'extension' => $extension,
            'id_contenu' => $stp,
        );
        $this->db->insert('fichier', $file_info);

    }

    public function getNumberFile($cat, $scat)
    {
        $this->load->database();
        $query = "SELECT contenu.id, COUNT(*) as total FROM contenu, fichier WHERE contenu.id = fichier.id_contenu AND contenu.idCat=? AND contenu.idSousCat=?";
        $res = $this->db->query($query, array($cat, $scat));
        $row = $res->row();
        $nb = $row->total;
        return $nb;
    }

    public function getNumberWebLink($cat, $scat)
    {
        $this->load->database();
        $query = "SELECT contenu.id, COUNT(*) as total FROM contenu, fichier WHERE contenu.id = fichier.id_contenu AND contenu.idCat=? AND contenu.idSousCat=?";
        $res = $this->db->query($query, array($cat, $scat));
        $row = $res->row();
        $nb = $row->total;
        return $nb;
    }

}