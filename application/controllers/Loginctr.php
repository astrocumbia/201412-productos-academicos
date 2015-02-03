<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginctr extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuariodao');
        $this->load->library( array('session','form_validation'));
        $this->load->helper( array('url','form'));
        $this->load->database( 'default');
    }

    public function index()
    {
        switch ( $this->session->userdata('perfil') ) {

            case '':
                $this->load->view('login');
                break;

            case 'usuario':
                redirect( base_url().'index.php/Mainctr');
                break;

            case 'administrador':
                redirect( base_url().'index.php/Mainctr');
                break;
        }
    }


    public function login()
    {
        $username = $this->input->post( 'username' );
        $password = md5( md5( $this->input->post( 'password' ) ));
        $check_user = $this->Usuariodao->login( $username , $password );

        if( $check_user == TRUE)
        {
            $data = array(
                'is_logued' 	=> 		TRUE,
                'perfil'        =>      'administrador',
                'id'            =>      $check_user->id,
                'nombre' 	    => 		$check_user->nombre,
            );

            $this->session->set_userdata( $data );
        }

        $this->index();
    }

    public function logout()
    {
        $this->session->set_userdata( array( 'perfil' =>'' ) );
        $this->session->sess_destroy();
        $this->index();
    }
}
