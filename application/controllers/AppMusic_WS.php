<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH.'/libraries/REST_Controller.php' );
use Restserver\libraries\REST_Controller;
class AppMusic_WS extends REST_Controller {
  function __construct()
  {
  header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
  header("Access-Control-Allow-Origin: *");
  parent::__construct();
  $this->load->database(); /* Cargamos la base de datos */
  $this->load->helper('url'); /* Añadimos el helper al controlador */
  $this -> load -> model ('AppMusic_model'); /* Añadimos el modelo de datos */
  }
  public function getcanciones_get() {
  $data = $this->AppMusic_model->getCanciones();
  header('Content-Type: application/json');
  $this->response( $data);
  }

  public function deletecanciones_post() {
$myid = $this->input->post('id_Cancion');
$data = $this->AppMusic_model->deleteCanciones($myid);
$this->response($data);
}


  }
