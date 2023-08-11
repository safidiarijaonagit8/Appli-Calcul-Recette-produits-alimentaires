<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateurmodel extends CI_Model
{
    public function getUtlisateur($userName, $mdp)
    {
        try {
            $sql = "SELECT * FROM utilisateur where  username=%s and mdp=%s ";
            $sql = sprintf($sql, $this->db->escape($userName), $this->db->escape(sha1($mdp)));
            $query = $this->db->query($sql);
            //$result = array();
            foreach ($query->result_array() as $key) {
                if ($key['username'] == $userName && $key['mdp'] == sha1($mdp)) {
                    return 1;
                } else {
                    return -1;
                }
            }
        } catch (Exception $th) {
            throw $th;
        }
    }
    public function inscriptionnn($username,$mdp)
    {

        $sql = "INSERT into utilisateur values(null,%s,%s,%s)";
        $sql = sprintf($sql,$this->db->escape($username),$this->db->escape($username),$this->db->escape(sha1($mdp)));
        $this->db->query($sql);
    }
    public function utilisateur($userName, $mdp)
    {
        try {
            $sql = "SELECT * FROM utilisateur where  username=%s and mdp=%s ";
            $sql = sprintf($sql, $this->db->escape($userName), $this->db->escape(sha1($mdp)));
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
    public function getListeRecette()
    {
        
        try {
            $sql = "SELECT id,nom,image FROM recette";
          //  $sql = sprintf($sql, $this->db->escape($userName), $this->db->escape(sha1($mdp)));
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
    public function getListePanier()
    {
        try {
            $sql = "SELECT pa.idproduit,nom,qte,format,image,pa.isa,pa.type,p.prix FROM panier pa join produit p on pa.idproduit=p.id";
          //  $sql = sprintf($sql, $this->db->escape($userName), $this->db->escape(sha1($mdp)));
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
    public function updatestock($isa,$idproduit)
    {
        $z = 0;
        $today = date('Y-m-d');
        $sql = "INSERT into stockproduit values(null,%s,%s,%s,%s)";
        $sql = sprintf($sql,$this->db->escape($idproduit),$this->db->escape($z),$this->db->escape($isa),$this->db->escape($today));
        $this->db->query($sql);
    }
    public function insertAchat($idclient,$ref,$prixtotal)
    {
        $today = date('Y-m-d');
        $sql = "INSERT into achatproduit values(null,%s,%s,%s,%s)";
        $sql = sprintf($sql,$this->db->escape($idclient),$this->db->escape($ref),$this->db->escape($prixtotal),$this->db->escape($today));
        $this->db->query($sql);
    }
    public function insertDetailAchat($ref,$idp,$isa)
    {
       // $today = date('Y-m-d');
        $sql = "INSERT into detailachatproduit values(null,%s,%s,%s)";
        $sql = sprintf($sql,$this->db->escape($ref),$this->db->escape($idp),$this->db->escape($isa));
        $this->db->query($sql);
    }
    public function recherchemulticritere($categorie,$format,$min,$max)
    {
        try {  //ou egal
            $sql = "SELECT * FROM produit where idtype=%s and format=%s and qte >= %s and qte <= %s ";
            $sql = sprintf($sql, $this->db->escape($categorie), $this->db->escape($format),$this->db->escape($min),$this->db->escape($max));
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
    public function getListeCategorie()
    {
        try {
            $sql = "SELECT * FROM typeproduit";
          //  $sql = sprintf($sql, $this->db->escape($userName), $this->db->escape(sha1($mdp)));
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
    public function viderPanier()
    {
        $sql = "delete from panier";
        //$sql = sprintf($sql,$this->db->escape($i),$this->db->escape($id));
        $query = $this->db->query($sql);
    }
    public function getPrixTotalPanier()
    {

        try {
            $sql = "SELECT sum(pa.isa*p.prix) as prixtotal FROM panier pa join produit p on pa.idproduit=p.id";
          //  $sql = sprintf($sql, $this->db->escape($userName), $this->db->escape(sha1($mdp)));
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
    public function countRecette()
    {
        try {
            $sql = "SELECT count(id) as isa  FROM recette";
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

}
?>