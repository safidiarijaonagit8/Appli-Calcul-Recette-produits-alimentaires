<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produitmodel extends CI_Model
{
    protected $table = 'produit';
    public function __construct()
    {
        parent::__construct();
    }
    public function get_count()
    {
        return $this->db->count_all($this->table);
    }
    public function get_produit($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('produitcomplet');
        $result = array();
        foreach ($query->result_array() as $key) {
            $result[] = $key;
        }
        return $result;
    }
    public function insertProduitDansPanier($idproduit,$quantite,$type)
    {
        $sql = "INSERT into panier values(null,%s,%s,%s)";
        $sql = sprintf($sql,$this->db->escape($idproduit),$this->db->escape($quantite),$this->db->escape($type));
        $this->db->query($sql);
    }
    public function getAllProduit($p)
    {
        try {
            $sql = "SELECT * FROM produit limit %s";
            $sql = sprintf($sql, $this->db->escape($p));
            $query = $this->db->query($sql);
            $result = array();
            foreach ($query->result_array() as $key) {
                $result[] = $key;
            }
            return $result;
        } catch (Exception $th) {
            throw $th;
        }
    }
    public function getFicheProduit($id)
    {
        try {
            $sql = "SELECT * FROM v_etatstock where id =  %s";
            $sql = sprintf($sql, $this->db->escape($id));
            $query = $this->db->query($sql);
            $result = array();
            foreach ($query->result_array() as $key) {
                $result[] = $key;
            }
            return $result;
        } catch (Exception $th) {
            throw $th;
        }

    }
    public function countProduit()
    {
        try {
            $sql = "SELECT count(id) as isa  FROM produit";
            //$sql = sprintf($sql, $this->db->escape($p));
            $query = $this->db->query($sql);
            $result = array();
            foreach ($query->result_array() as $key) {
                $result[] = $key;
            }
            return $result;
        } catch (Exception $th) {
            throw $th;
        }
    }
    public function getProduitByPage($page_id, $total)
    {
        $p = $page_id-1;
        try {
            $sql= "SELECT * FROM produit LIMIT %s,%s";
            $sql = sprintf($sql, $this->db->escape($p),$this->db->escape($total));
            $query = $this->db->query($sql);
            $result = array();
            foreach ($query->result_array() as $key) {
                $result[] = $key;
            }
            return $result;
        } catch (Exception $th) {
            throw $th;
        }
        
    }

    public function getProduitComplet()
    {
        try {
            $sql = "SELECT * FROM produit p join typeproduit tp on p.idtype=tp.id limit 3";
            $query = $this->db->query($sql);
            $result = array();
            foreach ($query->result_array() as $key) {
                $result[] = $key;
            }
            return $result;
        } catch (Exception $th) {
            throw $th;
        }
    }
    public function getProduitById($id)
    {
        try {
            $sql = "SELECT * FROM produitcomplet where id=%s";
            $sql = sprintf($sql, $this->db->escape($id));
            $query = $this->db->query($sql);
            $result = array();
            foreach ($query->result_array() as $key) {
                $result[] = $key;
            }
            return $result[0];
        } catch (Exception $th) {
            throw $th;
        }
    }
    public function getAllCategorie()
    {
        try {
            $sql = "SELECT * FROM typeproduit";
            
            $query = $this->db->query($sql);
            $result = array();
            foreach ($query->result_array() as $key) {
                $result[] = $key;
            }
            return $result;
        } catch (Exception $th) {
            throw $th;
        }
    }
}
?>