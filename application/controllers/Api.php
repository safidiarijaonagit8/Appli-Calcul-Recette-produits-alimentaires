<?php
require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller
{

   public function __construct()
   {
      header('Access-Control-Allow-Origin: *');
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
      parent::__construct();
      $this->load->database();
      $this->load->model("ProduitModel", "pm");
   }

   public function saveproduct_post()
   {
      $this->pm->save();
      $data["resultat"] = "success";
      $this->response($data, 200);
   }

   public function listProduit_get()
   {
      $data = $this->pm->getProduitComplet();
      $this->response($data, 200);
   }

   function books_get()
   {
      $result = $this->pm->getallAuthors();
      if ($result) {
         $this->response($result, 200);
      } else {
         $this->response("No record found", 404);
      }
   }

   public function deleteproduct_delete()
   {
      $json = file_get_contents('php://input');
      $product = json_decode($json);
      $this->Example_model->deleteapi($product->idhistorique);
      $data["resultat"] = "success";
      $this->response($data, 200);
   }

   public function getproduct_put($id = '')
   {
      $data = $this->Example_model->getbyid($id);
      $this->response($data, 200);
   }
}
