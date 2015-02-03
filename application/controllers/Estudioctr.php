<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estudioctr extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Estudiodao');
        //$this->load->library( array('session','form_validation'));
        $this->load->helper( array('url','form'));
        $this->load->database( 'default');
    }

    public function index()
    {
        $datos = $this->Estudiodao->getEstudios();
        $this->load->view('lista_estudios' , $datos );
    }

    public function add(){

        $datos = array(
            'programa' 	    => 		$this->input->post('programa'),
            'institucion' 	=> 		$this->input->post('institucion'),
            'tipo'          =>      $this->input->post('tipo'),
            'iniciado_el'   =>		$this->input->post('fecha_inicio'),
            'terminado_el' 	=> 		$this->input->post('fecha_terminacion'),
            'titulado_el' 	=> 		$this->input->post('fecha_titulacion')
        );

        $this->Estudiodao->add( $datos );
        $this->index();
    }


    public function view_add(  ){
        $this->load->view('agregar_estudio');
    }

    public function view_update( $id ){
        $data = $this->Estudiodao->getEstudioById( $id );
        $this->load->view('editar_estudio' , $data );
    }

    public function update( ){

        $id = $this->input->post('id');

        $datos = array(
            'programa' 	    => 		$this->input->post('programa'),
            'institucion' 	=> 		$this->input->post('institucion'),
            'tipo'          =>      $this->input->post('tipo'),
            'iniciado_el'   =>		$this->input->post('fecha_inicio'),
            'terminado_el' 	=> 		$this->input->post('fecha_fin'),
            'titulado_el' 	=> 		$this->input->post('fecha_titulacion')
        );

        $this->Estudiodao->update( $id , $datos );
        $this->index();
    }

    public function delete( $id ){
        $this->Estudiodao->delete( $id );
        $this->index();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */