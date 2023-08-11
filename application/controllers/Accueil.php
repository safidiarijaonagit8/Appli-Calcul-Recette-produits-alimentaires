<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('assets');
		$this->load->model('produitmodel', 'pm');
		$this->load->model('adminmodel', 'am');
		$this->load->model('utilisateurmodel', 'um');
		$this->load->helper('url');
		$this->load->library("pagination");
		$this->load->library('session');
	

	}

	public function listerecette()
    {
            $p = 4;
            $data['listerecette'] = $this->um->getListeRecette();
            $data['nbrRecette'] = $this->um->countRecette();
            $d = $data['nbrRecette'][0]['isa']/4;
            $dd = $d+1;
            $a = intval($dd);
            $data['nbrPage'] = $a;
            //$data['categories'] = $this->pm->getAllCategorie();
            $this->load->view('recette', $data);
    }

	public function index()
	{
		$p = 4;
		$data['produit'] = $this->pm->getProduitComplet($p);
		$data['nbrProduit'] = $this->pm->countProduit();
		$d = $data['nbrProduit'][0]['isa']/4;
		$dd = $d+1;
		$a = intval($dd);
		$data['nbrPage'] = $a;
		$data['categories'] = $this->pm->getAllCategorie();
		$this->load->view('index', $data);
	}

	public function init()
	{
		$page_id = $_GET['page_id'];
		$total = 4;
		
	  if($page_id == 1) {
		  // do nothing!
	  } else {            
		  $page_id= ($page_id-1)*$total+1;  
	  }
	  $data['nbrProduit'] = $this->pm->countProduit();
	  $d = $data['nbrProduit'][0]['isa']/4;
	  $dd = $d+1;
	  $a = intval($dd);
	  $data['nbrPage'] = $a;
	  $data['produit'] = $this->pm->getProduitByPage($page_id,$total);
	  $data['categories'] = $this->pm->getAllCategorie();
		$this->load->view('index', $data);
	   
	
	 
	}
	public function an()
	{
		$data['produit'] = $this->pm->getProduitComplet();
		$this->load->view('index', $data);

	}

	public function pageUtilisatuer()
	{
		$this->load->view('contact');
	}

	public function admin()
	{
		$this->load->view('login');
	}

	public function clientAjoutArgent()
	{

		
		//var_dump($pagesuivante);
		//$data['pagesuivante'] = $pagesuivante;
		$this->load->view('loginClient');
	}

	public function login()
	{
		$email = $this->input->post('username');
		$mdp = $this->input->post('mdp');
		$this->load->model('adminmodel');
		$existe = $this->adminmodel->getUtlisateur($email, $mdp);
	//	var_dump($existe);
		if ($existe == 1) {
			
			$sess = $this->adminmodel->administrateur($email, $mdp);
			
			$this->load->view('accueilAdmin');
		} else {
			$data['erreur'] = 'erreur';
			$this->load->view('login', $data);
		}
	}
	function listedemande()
	{
		
		$data['listedemande'] = $this->am->getListeDemande();
		$this->load->view('accueilAdmin', $data);

	}
	function validerdemande()
	{
		$idu = $this->input->get('idu');
		$m = $this->input->get('m');
		$this->am->validerdemande($idu, $m);
		$id = $this->input->get('id');
		//var_dump($id);
	//	var_dump($idu);
		//var_dump($m);
		//$this->db->transStart();
		//$this->db->query('delete from demandeargent where idutilisateur='.$id);
		//$this->db->transComplete();
		$this->am->changeretatdemande($id);
		$data['listedemande'] = $this->am->getListeDemande();
		$this->load->view('accueilAdmin', $data);

	}

	public function insertProduitDansPanier()
	{
		$idproduit = $this->input->post('idP');
		$quantite = $this->input->post('qt');
		$type = $this->input->post('type');
	//	var_dump($idproduit);
	//	var_dump($quantite);
	//	var_dump($type);
		$this->pm->insertProduitDansPanier($idproduit,$quantite,$type);
		$p = 4;
		$data['produit'] = $this->pm->getProduitComplet($p);
		$data['nbrProduit'] = $this->pm->countProduit();
		$d = $data['nbrProduit'][0]['isa']/4;
		$dd = $d+1;
		$a = intval($dd);
		$data['nbrPage'] = $a;
		$data['categories'] = $this->pm->getAllCategorie();
		$this->load->view('index', $data);
		
	}
	public function listepanier()
	{
		$data['listepanier'] = $this->um->getListePanier();
		$data['p'] = $this->um->getPrixTotalPanier();
		$prixtotal = $data['p'][0]['prixtotal'];
		$data['prixtotal'] = $prixtotal;
		$this->load->view('listepanier', $data);
	}
	public function logout()
	{
		$p = 4;
		$data['produit'] = $this->pm->getProduitComplet($p);
		$data['nbrProduit'] = $this->pm->countProduit();
		$d = $data['nbrProduit'][0]['isa']/3;
		$dd = $d+1;
		$a = intval($dd);
		$data['nbrPage'] = $a;
		$data['categories'] = $this->pm->getAllCategorie();
		$this->load->view('index', $data);
	}
	public function listestock()
	{
		$data['listestock'] = $this->am->listestock();
		$this->load->view('accueilAdmin', $data);
	}
	public function payer()
	{
		$prixtotal = $this->input->get('ptotal');
		$data['prixtotal'] = $prixtotal;
	//	var_dump($data['prixtotal']);
		$this->load->view('loginClient1',$data);
	}
	public function loginClientAjoutArgent()
	{
		$p = 4;
		$email = $this->input->post('username');
		$pagesuivante = $this->input->post('pagesuivante');
		$mdp = $this->input->post('mdp');
		$this->load->model('adminmodel');
		$existe = $this->adminmodel->getClient($email, $mdp);
		if ($existe == 1) {
			//$data['titre'] = 'Acceuil';
			//$data['template'] = 'accueil.php';
			
			$sess = $this->adminmodel->utilisateur($email, $mdp);
			$idclient = $sess[0]['id'];
			$data['idclient'] = $idclient;
			//var_dump($sess[0]['nom']);
			//$_SESSION['utilisateur'][] = $sess[0]['id'];
			//$this->session->set_userdata('utilisateur', $sess[0]['id']);  //le user mintsy
			//$b = $this->session->userdata('utilisateur');
			//var_dump($_SESSION['utilisateur']);
			$data['produit'] = $this->pm->getProduitComplet($p);
			$data['nbrProduit'] = $this->pm->countProduit();
			$d = $data['nbrProduit'][0]['isa']/4;
			$dd = $d+1;
			$a = intval($dd);
			$data['nbrPage'] = $a;
			$data['categories'] = $this->pm->getAllCategorie();
			
			
				$data['idclient'] = $idclient;
				$this->load->view('formajoutargent', $data);
			
			
			/*	$vola = $this->adminmodel->getArgentClient($idclient);
				$v = $vola[0]['vola'];
				$data['vola'] = $v;
				$data['idclient'] = $idclient;
				$this->load->view('accueilpaiement', $data);*/
			

		} else {
			$data['pagesuivante'] = $pagesuivante;
			$data['erreur'] = 'erreur';
			$this->load->view('loginClient', $data);
		}
	}
	function controlePaiement()
	{
		$panier = $this->input->post('paniers');
		$prixtotal = $this->input->post('prixtotal');
		//var_dump($panier);
		//var_dump($prixtotal);


		$email = $this->input->post('username');
		$mdp = $this->input->post('mdp');
		$this->load->model('adminmodel');
		$existe = $this->adminmodel->getClient($email, $mdp);
		if ($existe == 1) {
			//$data['titre'] = 'Acceuil';
			//$data['template'] = 'accueil.php';
			
			$sess = $this->adminmodel->utilisateur($email, $mdp);
			$idclient = $sess[0]['id'];
			$data['idclient'] = $idclient;
			$vola = $this->adminmodel->getArgentClient($idclient);
			$v = $vola[0]['vola'];
			//var_dump($sess[0]['nom']);
			//$_SESSION['utilisateur'][] = $sess[0]['id'];
			//$this->session->set_userdata('utilisateur', $sess[0]['id']);  //le user mintsy
			//$b = $this->session->userdata('utilisateur');
			//var_dump($_SESSION['utilisateur']);

				if($v<$prixtotal)
				{
					//$tab = json_decode($panier, true);
					//var_dump($tab[0]['nom']);
					//$data['panier'] = $tab; 
					$data['prixtotal'] = $prixtotal;
					$data['message'] = 'Votre argent est inferieur au prix total';
					$data['vola'] = $v;
					$data['idclient'] = $idclient;
					$this->load->view('accueilpaiement', $data);

				}
				else{
					
		
				
					$data['lastref'] =  $this->adminmodel->getLastRefAchat();
					$lastref = $data['lastref'][0]['lastref'];
					$ref = $lastref+1;
					$data['listepanier'] = $this->um->getListePanier();
				//	var_dump($data['listepanier']);
					for($i = 0;$i< count($data['listepanier']);$i++)
					{
						//$idp = $data['listepanier'][$i]['idproduit'];
						//$isa = $data['listepanier'][$i]['isa'];
						$this->um->insertDetailAchat($ref,$data['listepanier'][$i]['idproduit'],$data['listepanier'][$i]['isa']);
					}
					$this->um->insertAchat($idclient,$ref,$prixtotal);
					//$data['panier'] = $tab;
					//$tab = json_decode($panier, true);
					//var_dump($tab[0]['nom']);
					//$data['panier'] = $tab; 
					$this->adminmodel->mialavola($idclient,$prixtotal);
					$volaf = $this->adminmodel->getArgentClient($idclient);
					$vf = $vola[0]['vola'];
					$data['prixtotal'] = $prixtotal;
					$data['vola'] = $vf;
		
					$data['idclient'] = $idclient;
					$data['message'] = 'Achat effectue';
					$this->load->view('accueilpaiement', $data);
				}
			
			

		} else {
			$data['prixtotal'] = $prixtotal;
			
			$data['erreur'] = 'erreur';
			$this->load->view('loginClient1', $data);
		}


	}

	function formLoginClientPaiement()
	{
		$panier = $this->input->post('donne');
		$prixtotal = $this->input->post('total');
		//var_dump($panier);
	//	var_dump($prixtotal);
	//	$data['pagesuivante'] = 1;
		$data['paniers'] = $panier;
		$data['prixtotal'] = $prixtotal;
		$this->load->view('loginClient1',$data);
	}

	public function viderpanier()
	{
		$this->um->viderPanier();
		$data['listepanier'] = $this->um->getListePanier();
		$data['p'] = $this->um->getPrixTotalPanier();
		$prixtotal = $data['p'][0]['prixtotal'];
		$data['prixtotal'] = $prixtotal;
		$this->load->view('listepanier', $data);
	}
	public function statproduit()
	{
		$data['statproduit'] = $this->am->statproduit();
		$this->load->view('accueilAdmin', $data);
	}
	public function statproduit1()
	{
		$data['statproduit'] = $this->am->statproduit();
		//var_dump($data['statproduit']);
		$this->load->view('chartProduit', $data);
	}
	public function formrecherche()
	{
		$data['lc'] = $this->um->getListeCategorie();
		$this->load->view('formrecherche',$data);
	}
	function recherchemulticritere()
	{
		$categorie = $this->input->post('categorie');
		$format = $this->input->post('format');
		$min = $this->input->post('min');
		$max = $this->input->post('max');
		$data['l'] = $this->um->recherchemulticritere($categorie,$format,$min,$max);
		$data['produit'] = $data['l'];
		$data['nbrPage'] = 2;
		$data['categories'] = $this->pm->getAllCategorie();
		$this->load->view('index', $data);

	}
	public function formajoutargent()
	{
		$data['form'] = 1;
		$idclient = $this->input->get('idclient');
		$data['idclient'] = $idclient;
		$this->load->view('formajoutargent', $data);
	}

	public function demandeajoutargent()
	{

	
		$idclient = $this->input->post('idclient');
		$demande = $this->input->post('demandemontant');
		$this->am->insertDemandeArgent($demande,$idclient);
			$p = 4;
			$data['produit'] = $this->pm->getProduitComplet($p);
			$data['nbrProduit'] = $this->pm->countProduit();
			$d = $data['nbrProduit'][0]['isa']/4;
			$dd = $d+1;
			$a = intval($dd);
			$data['nbrPage'] = $a;
			$data['categories'] = $this->pm->getAllCategorie();
			$data['demandereussi'] = 1;
			$this->load->view('index', $data);
		}

	public function ficheProduit()
	{
		$idproduit = $this->input->get('idProduit');
		$data['fiche'] = $this->pm->getFicheProduit($idproduit);


		$this->load->view('ficheproduit', $data);
	}
	public function findQte($nomproduit)
	{

	}
	public function recette()
	{
		//$liste = array();
		//$liste = [];
		$idrecette = $this->input->post('idrecette');
		$qt = $this->input->post('qt');
		$data['refrecette'] = $this->am->getRefRecette($idrecette);
		$refrecette = $data['refrecette'][0]['refrecette'];
		$data['listeproduit'] = $this->am->getListeProduitRecette($refrecette);
		for($i=0;$i<count($data['listeproduit']);$i++)
		{
			$data['reste'] = $this->am->getResteProduit($data['listeproduit'][$i]['nomproduit']);
			if($data['reste'][0]['reste']!=null)
			{
				if($qt*$data['listeproduit'][$i]['qteilaina'] - $data['reste'][0]['reste']>0)
				{
					
				//$ilaina = $data['listeproduit'][$i]['qteilaina'] - $data['reste'][0]['reste'];
				$ilaina = $qt*$data['listeproduit'][$i]['qteilaina'];
				$data['produit'] = $this->am->findProduit($ilaina,$data['listeproduit'][$i]['nomproduit']);
				$reste = $data['produit'][0]['reste'];
				$this->am->insererReste($data['listeproduit'][$i]['nomproduit'],$reste);
				//$liste[$i] = $data['produit'][0];
				$type="recette";    
				$q = 1;
				$this->pm->insertProduitDansPanier($data['produit'][0]['id'],$q,$type);
				//array_push($liste, $data['produit'][0]);
			//	var_dump($liste);
			//$liste = $data['produit'][0];
				}
				elseif($data['listeproduit'][$i]['qteilaina'] - $data['reste'][0]['reste']<=0){ 
					$this->am->enleverReste($data['listeproduit'][$i]['nomproduit'],$data['listeproduit'][$i]['qteilaina']);
				
				}
			}
			else{
				$ilaina = $qt*$data['listeproduit'][$i]['qteilaina'];
				$data['produit'] = $this->am->findProduit($ilaina,$data['listeproduit'][$i]['nomproduit']);
				$reste = $data['produit'][0]['reste'];
				$this->am->insererReste($data['listeproduit'][$i]['nomproduit'],$reste);
				$liste[$i] = $data['produit'][0];
				$type="recette";
				$q = 1;
				$this->pm->insertProduitDansPanier($data['produit'][0]['id'],$q,$type);
				//array_push($liste, $data['produit'][0]);
			//var_dump($liste);
			}
		}
	
		//$this->pm->insertProduitDansPanier($idproduit,$quantite,$type);
		$p = 4;
            $data['listerecette'] = $this->um->getListeRecette();
            $data['nbrRecette'] = $this->um->countRecette();
            $d = $data['nbrRecette'][0]['isa']/4;
            $dd = $d+1;
            $a = intval($dd);
            $data['nbrPage'] = $a;
            //$data['categories'] = $this->pm->getAllCategorie();
            $this->load->view('recette', $data);
	}
	public function recette1()
	{
		//$liste = [];
			$idrecette = $this->input->post('idrecette');
			$qt = $this->input->post('qt');
			$data['refrecette'] = $this->am->getRefRecette($idrecette);
			$refrecette = $data['refrecette'][0]['refrecette'];
			$data['listeproduit'] = $this->am->getListeProduitRecette($refrecette);
			//var_dump($data['listeproduit']);
			for($i=0;$i<count($data['listeproduit']);$i++)
			{
				$data['reste'] = $this->am->getResteProduit($data['listeproduit'][$i]['nomproduit']);

				if($data['reste'][0]['reste']!=null)
				{
					if($qt*$data['listeproduit'][$i]['qteilaina'] - $data['reste'][0]['reste']>0)
					{
						$data['qte'] = $this->am->findQteIlaina($data['listeproduit'][$i]['nomproduit']);
						if($data['qte'][0]['qte'] < $qt*$data['listeproduit'][$i]['qteilaina'])
						{
							$isa = $qt*$data['listeproduit'][$i]['qteilaina']/$data['qte'][0]['qte'];

							//$i = 4.5;
							$nbr = $isa+1;
							$v = intval($nbr);
							//$v = 4;
							$type = "recette";
							$qtetotalnalaina = $v*$data['qte'][0]['qte'];
							$reste = $qtetotalnalaina-$qt*$data['listeproduit'][$i]['qteilaina'];
							$this->am->insererReste($data['listeproduit'][$i]['nomproduit'],$reste);
							$this->pm->insertProduitDansPanier($data['qte'][0]['id'],$v,$type);
						}
						else
						{
					//$ilaina = $data['listeproduit'][$i]['qteilaina'] - $data['reste'][0]['reste'];
						$ilaina = $qt*$data['listeproduit'][$i]['qteilaina'];
						$data['produit'] = $this->am->findProduit($ilaina,$data['listeproduit'][$i]['nomproduit']);
						$reste = $data['produit'][0]['reste'];
						$this->am->insererReste($data['listeproduit'][$i]['nomproduit'],$reste);
						$type="recette";
						$q = 1;
						$this->pm->insertProduitDansPanier($data['produit'][0]['id'],$q,$type);
						}
						
				}
				elseif($qt*$data['listeproduit'][$i]['qteilaina'] - $data['reste'][0]['reste']<=0)
				{ 
						$this->am->enleverReste($data['listeproduit'][$i]['nomproduit'],$qt*$data['listeproduit'][$i]['qteilaina']);
					
				}
			}
			else
			{
					$ilaina = $qt*$data['listeproduit'][$i]['qteilaina'];
					$data['qte'] = $this->am->findQteIlaina($data['listeproduit'][$i]['nomproduit']);
				
					
					if($data['qte'][0]['qte']<$qt*$data['listeproduit'][$i]['qteilaina'])
					{
						$isa = $qt*$data['listeproduit'][$i]['qteilaina']/$data['qte'][0]['qte'];
						//$nbr = $i+1;
						//$v = intval($nbr);

						$type="recette";
						$qtetotalnalaina = $isa*$data['qte'][0]['qte'];
						$reste = $qtetotalnalaina-$qt*$data['listeproduit'][$i]['qteilaina'];
						$this->am->insererReste($data['listeproduit'][$i]['nomproduit'],$reste);
						$this->pm->insertProduitDansPanier($data['qte'][0]['id'],$isa,$type);
					}
					else
					{
					
					$ilaina = $qt*$data['listeproduit'][$i]['qteilaina'];
					$data['produit'] = $this->am->findProduit($ilaina,$data['listeproduit'][$i]['nomproduit']);
					$reste = $data['produit'][0]['reste'];
					$this->am->insererReste($data['listeproduit'][$i]['nomproduit'],$reste);
					$type="recette";
					$q = 1;
					$this->pm->insertProduitDansPanier($data['produit'][0]['id'],$q,$type);
					}
				
			}
		}
		$data['listepanier'] = $this->um->getListePanier();
		$data['p'] = $this->um->getPrixTotalPanier();
		$prixtotal = $data['p'][0]['prixtotal'];
		$data['prixtotal'] = $prixtotal;
		$this->load->view('listepanier', $data);
}
public function recette2()
{
	$idrecette = $this->input->post('idrecette');
			$qt = $this->input->post('qt');
			$data['refrecette'] = $this->am->getRefRecette($idrecette);
			$refrecette = $data['refrecette'][0]['refrecette'];
			$data['listeproduit'] = $this->am->getListeProduitRecette($refrecette);
			$qtemisy = $this->am->getQteMisy($data['listeproduit'][$i]['nomproduit']);
			if($qtemisy < $data['listeproduit'][$i]['qteilaina'])
			{

			}

}
public function forminscription()
{
	$this->load->view('forminscription');
}
public function inscription()
{
	$username = $this->input->post('username');
	$mdp = $this->input->post('mdp');
	$this->um->inscriptionnn($username,$mdp);
	$data['message'] = 1;
	$this->load->view('forminscription', $data);
}
public function stock()
{
	//$this->um->viderPanier();
		$data['listepanier'] = $this->um->getListePanier();
		for($i=0;$i<count($data['listepanier']);$i++)
		{
			$this->um->updatestock($data['listepanier'][$i]['isa'],$data['listepanier'][$i]['idproduit']);

		}
		$data['listestock'] = $this->am->getEtatStock();
		$this->load->view('stock', $data);

}
	
	public function getProduit()
	{
		$idproduit = $this->input->post('idP');
		$qt = $this->input->post('qt');
		$produit = $this->pm->getProduitById($idproduit);
		$produit['quantite'] = (int)$qt;
		$produitJSon = json_encode($produit);
		$var = "
		<script>
				function savePanier(produit){
					localStorage.setItem('panier', JSON.stringify(produit));
				}
				function getPanier() {
                    let panier = localStorage.getItem('panier');
                    let result;
                    if (panier == null) {
                        return [];
                    } else {
                        return JSON.parse(panier);
                    }   
                }
				function add(produit){
					let panier =getPanier();
					let found=panier.find(p => p.id == produit.id);
					if(found!=undefined){
						found.quantite=found.quantite+produit.quantite;
					}
					else{
						panier.push(produit);  
					}
					savePanier(panier);
					window.location.href = 'http://127.0.0.1/evaluation2/Accueil';
				}
				add(" . $produitJSon . ");
        </script>";
		print($var);
	}
	public function getRecette()
	{
		$idrecette = $this->input->post('idrecette');
		$qt = $this->input->post('qt');
		$produit = $this->pm->getListeProduitRecette($idrecette);
		$produit['quantite'] = (int)$qt;
		$produitJSon = json_encode($produit);
		$var = "
		<script>
				function savePanier(produit){
					localStorage.setItem('panier', JSON.stringify(produit));
				}
				function getPanier() {
                    let panier = localStorage.getItem('panier');
                    let result;
                    if (panier == null) {
                        return [];
                    } else {
                        return JSON.parse(panier);
                    }   
                }
				function add(produit){
					let panier =getPanier();
					let found=panier.find(p => p.id == produit.id);
					if(found!=undefined){
						found.quantite=found.quantite+produit.quantite;
					}
					else{
						panier.push(produit);  
					}
					savePanier(panier);
					window.location.href = 'http://127.0.0.1/evaluation2/Accueil';
				}
				add(" . $produitJSon . ");
        </script>";
		print($var);
	}
	public function supprimerPanier()
	{
		$idproduit = $this->input->post('idP');
		$var = "
		<script>
		function savePanier(produit){
			localStorage.setItem('panier', JSON.stringify(produit));
		}
		function getPanier() {
			let panier = localStorage.getItem('panier');
			let result;
			if (panier == null) {
				return [];
			} else {
				return JSON.parse(panier);
			}   
		}
		function supprimer(id){
			let panier =getPanier();
			panier =panier.filter(p=>p.id!=id);
			savePanier(panier);
			window.location.href = 'http://127.0.0.1/evaluation2/Accueil';
		}
		
		supprimer(" . $idproduit . ");
		</script>
		";
		print($var);
	}

}
?>