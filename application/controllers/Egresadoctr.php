<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Egresadoctr extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Egresadodao');
        //$this->load->library( array('session','form_validation'));
        $this->load->helper( array('url','form'));
        $this->load->database( 'default');
    }

    public function index()
    {
        $datos = $this->Egresadodao->getEgresados();
        $this->load->view('lista_egresados' , $datos );
    }

    public function add(){


        $estudio = $this->input->post('sigue_estudiando') == "si" ? 1 : 0 ;

        $datos = array(
            'matricula' 	    => 		$this->input->post('matricula'),
            'nombres' 	        => 		$this->input->post('nombres'),
            'apellidos'         =>      $this->input->post('apellidos'),
            'nacido_el'		    =>		$this->input->post('fecha_nacimiento'),
            'correo' 	        => 		$this->input->post('correo'),
            'direccion1' 	    => 		$this->input->post('direccion1'),
            'direccion2' 	    => 		$this->input->post('direccion2'),
            'codigo_postal' 	=> 		$this->input->post('codigo_postal'),
            'ciudad_id' 	    => 		$this->input->post('ciudad_actual'),
            'estado_id' 	    => 		$this->input->post('estado_actual'),
            'ciudad_origen_id' 	=> 		$this->input->post('ciudad_origen'),
            'estado_origen_id' 	=> 		$this->input->post('estado_origen'),
            'pais_origen_id'    => 		$this->input->post('pais_origen'),
            'telefono_movil' 	=> 		$this->input->post('telefono_movil'),
            'telefono_movil' 	=> 		$this->input->post('telefono_fijo'),
            'password' 		    => 		md5( md5( $this->input->post('password') ) ),
            'sigo_estudiando' 	=> 		$estudio
        );

        $this->Egresadodao->add( $datos );
        $this->index();
    }


    public function view_add(  ){

        $datos["paises"]   =  $this->Egresadodao->getPaises();
        $datos["estados"]  =  $this->Egresadodao->getEstados();
        $datos["ciudades"] =  $this->Egresadodao->getCiudades();

        $this->load->view('agregar_egresado', $datos );
    }

    public function view_update( $id ){
        $data = $this->Egresadodao->getEgresadoById( $id );
        $this->load->view('editar_egresado' , $data );
    }

    public function update( ){

        $id = $this->input->post('id');

        $pais_origen    =   $this->Egresadodao->getByName( "pais",    $this->input->post('pais_origen'));
        $estado_origen  =   $this->Egresadodao->getByName( "estado",  $this->input->post('estado_origen'));
        $ciudad_origen  =   $this->Egresadodao->getByName( "ciudad",  $this->input->post('ciudad_origen'));

        $estado_actual  =   $this->Egresadodao->getByName( "estado" , $this->input->post('estado_actual'));
        $ciudad_actual  =   $this->Egresadodao->getByName( "ciudad" , $this->input->post('ciudad_actual'));

        $estudio = $this->input->post('sigue_estudiando') == "si" ? 1 : 0 ;

        $datos = array(
            'matricula' 	    => 		$this->input->post('matricula'),
            'nombres' 	        => 		$this->input->post('nombres'),
            'apellidos'         =>      $this->input->post('apellidos'),
            'nacido_el'		    =>		$this->input->post('fecha_nacimiento'),
            'correo' 	        => 		$this->input->post('correo'),
            'direccion1' 	    => 		$this->input->post('direccion1'),
            'direccion2' 	    => 		$this->input->post('direccion2'),
            'codigo_postal' 	=> 		$this->input->post('codigo_postal'),
            'ciudad_id' 	    => 		$ciudad_actual->id,
            'estado_id' 	    => 		$estado_actual->id,
            'ciudad_origen_id' 	=> 		$ciudad_origen->id,
            'estado_origen_id' 	=> 		$estado_origen->id,
            'pais_origen_id'    => 		$pais_origen->id,
            'telefono_movil' 	=> 		$this->input->post('telefono_movil'),
            'telefono_movil' 	=> 		$this->input->post('telefono_fijo'),
            'password' 		    => 		md5( md5( $this->input->post('password') ) ),
            'sigo_estudiando' 	=> 		$estudio
        );


        $data = $this->Egresadodao->update( $id , $datos );
        $this->index();
    }

    public function delete( $id ){
        $this->Egresadodao->delete( $id );
        $this->index();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */