<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->database();//cargamos la base de datos
	$this->load->library('grocery_CRUD');//cargamos a libreria
	$this->load->helper('url');//añadi,ls el helper al copntroler

}

	public function index()
	{
		redirect('Welcome/administracion');
	}

	function administracion()
{
try{
/* Creamos el objeto */
$crud = new grocery_CRUD();
/* Seleccionamos el tema */
$crud->set_theme('flexigrid');
/* Seleccionmos el nombre de la tabla de nuestra base de datos*/
$crud->set_table('canciones_tb');
$crud->order_by('nombreCancion','asc');
/* establecemos la relación con la llave foranea */
$crud->set_relation('id_Cancion', 'canciones_tb', 'urlCancion');
/* Le asignamos un nombre a cada campo para que no muestre el nombre del campo*/
$crud->display_as('id_Cancion', 'Id')
     ->display_as('nombreCancion', 'Nombre')
		 ->display_as('albumCancion', 'Album')
		 ->display_as('publicacionCancion', 'Publicado')
		 ->display_as('generoCancion', 'Genero')
		 ->display_as('paisCancion', 'Pais')
		 ->display_as('urlImageCancion', 'Img url')
		 ->display_as('urlCancion', 'Url');
/* Es el nombre que se muestra en Añadir Alumnos*/
$crud->set_subject('Cancion');
/* Asignamos el idioma español */
$crud->set_language('spanish');
/* Aqui le decimos a grocery que estos campos son obligatorios */
$crud->required_fields(
'id_Cancion',
'nombreCancion',
'albumCancion',
'publicacionCancion',
'generoCancion',
'paisCancion',
'urlImageCancion',
'urlCancion'
);
/* Aqui le indicamos que campos deseamos mostrar */
$crud->columns(
	'id_Cancion',
	'nombreCancion',
	'albumCancion',
	'publicacionCancion',
	'generoCancion',
	'paisCancion',
	'urlImageCancion',
	'urlCancion'
);
$output = $crud->render();
/* Aquí cargamos la vista de nombre administración que se encuentra en el directorio productos, es
importante que si en tu estructura no tienes el directorio productos, no lo pongas carga la vista de
manera directa: $this->load->view('administracion', $output) */
$this->load->view('administracion', $output);
}catch(Exception $e){
	/* Si algo sale mal cachamos el error y lo mostramos */
	show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}

}
