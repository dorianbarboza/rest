<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class AppMusic_model extends CI_Model {
function __construct(){
parent::__construct();
$this -> load -> database();
}
function getCanciones(){
$this->db->select('id_Cancion, nombreCancion, albumCancion, autorCancion, publicacionCancion, generoCancion, paisCancion, urlImageCancion, urlCancion');
$this->db->from('canciones_tb');
$this->db->order_by("nombreCancion", "asc");
$consulta = $this->db->get();
$resultado = $consulta->result();
return $resultado;
}

function deleteCanciones($id) {
$this->db->where('id_Cancion',$id);
return $this->db->delete('canciones_tb');
}
/*
function getPost(){
return $this->db->get('canciones');
}*/
}
?>
