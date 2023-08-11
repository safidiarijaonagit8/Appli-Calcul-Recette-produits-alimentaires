<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adminmodel extends CI_Model
{
    public function getUtlisateur($userName, $mdp)
    {
        try {
            $sql = "SELECT * FROM admin where  username=%s and mdp=%s ";
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
    public function getListeDemande()
    {
        $i = 0;
        try {
            $sql = "SELECT * FROM v_listedemande where etat=%s";
            $sql = sprintf($sql,$this->db->escape($i));
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
    public function changeretatdemande($id)
    {
         $i = 1;
        $sql = "UPDATE demandeargent set etat=%s where id=%s";
        $sql = sprintf($sql,$this->db->escape($i),$this->db->escape($id));
        $query = $this->db->query($sql);
    }

    public function statproduit()
    {
        try {
            $sql = "SELECT * FROM v_produitlafo";
            //$sql = sprintf($sql,$this->db->escape($i));
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
    public function getArgentClient($idutilisateur)
	{
        try {
            $sql = "SELECT sum(montantentree)-sum(montantsortie) as vola FROM argentvirtuel where  idclient=%s";
            $sql = sprintf($sql, $this->db->escape($idutilisateur));
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
    public function insererReste($nomproduit,$qte)
    {
        $sql = "INSERT into reste values(null,%s,%s,0)";
        $sql = sprintf($sql,$this->db->escape($nomproduit),$this->db->escape($qte));
        $this->db->query($sql);

    }
    public function enleverReste($nomproduit,$qte)
    {
        $sql = "INSERT into reste values(null,%s,0,%s)";
        $sql = sprintf($sql,$this->db->escape($nomproduit),$this->db->escape($qte));
        $this->db->query($sql);


    }
public function getLastRefAchat()
{
    try {
        $sql = "select max(refachat) as lastref from achatproduit";
        
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
public function getRefRecette($idrecette)
{
    try {
        $sql = "select refrecette from recette where id=%s";
        $sql = sprintf($sql, $this->db->escape($idrecette));
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
public function getListeProduitRecette($refrecette)
{
    try {
        $sql = "select * from detailrecette where refrecette=%s";
        $sql = sprintf($sql, $this->db->escape($refrecette));
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
public function getResteProduit($nomproduit)
{
    try {
        $sql = "select sum(entree)-sum(sortie) as reste from reste where nomproduit=%s";
        $sql = sprintf($sql, $this->db->escape($nomproduit));
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
public function findProduit($ilaina,$nomproduit)
{
    try {
        $sql = "select qte-%s as reste,id,nom,prix,image,format,qte from produit where nom=%s order by reste asc";
        $sql = sprintf($sql, $this->db->escape($ilaina),$this->db->escape($nomproduit));
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
public function inscription($username, $mdp)
{
    $sql = "INSERT into utilisateur values(null,%s,%s,%s)";
    $sql = sprintf($sql,$this->db->escape($username),$this->db->escape($username),$this->db->escape(sha1($mdp)));
    $this->db->query($sql);
}

public function findQteIlaina($nomproduit)
{
    try {
        $sql = "select id,qte from produit where nom=%s";
        $sql = sprintf($sql, $this->db->escape($nomproduit));
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
public function getEtatStock()
{
    try {
        $sql = "select * from v_etatstock";
        //$sql = sprintf($sql, $this->db->escape($nomproduit));
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
public function getQteMisy($nomproduit)
{
    try {
        $sql = "select id,qte from produit where nom=%s";
        $sql = sprintf($sql, $this->db->escape($nomproduit));
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

    public function listestock()
    {
        try {
            $sql = "select * from v_etatstock";
            
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
    public function getClient($userName, $mdp)
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
    public function administrateur($userName, $mdp)
    {
        try {
            $sql = "SELECT * FROM admin where  username=%s and mdp=%s ";
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
    public function insertDemandeArgent($montant,$idclient)
    {
        $sql = "INSERT into demandeargent values(null,%s,%s,0)";
        $sql = sprintf($sql,$this->db->escape($idclient),$this->db->escape($montant));
        $this->db->query($sql);
    }
    public function validerdemande($idu,$m)
    {
        $sql = "INSERT into argentvirtuel values(null,%s,%s,0)";
        $sql = sprintf($sql,$this->db->escape($idu),$this->db->escape($m));
        $this->db->query($sql);
    }
    public function mialavola($idu,$m)
    {
        $sql = "INSERT into argentvirtuel values(null,%s,0,%s)";
        $sql = sprintf($sql,$this->db->escape($idu),$this->db->escape($m));
        $this->db->query($sql);

    }

}
?>