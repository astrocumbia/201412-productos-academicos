<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuariodao extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login( $username , $password )
    {
        $this->db->where( 'nombre' , $username );
        $this->db->where( 'password' , $password );
        $query = $this->db->get( 'administrador' );

        if( $query->num_rows() == 1)
        {
            return $query->row();

        }else{
            $this->session->set_flashdata( 'usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect( base_url() , 'refresh' );
        }
    }

    public function registro( $datos ){
        return  $this->db->insert( "usuarios" , $datos );
    }
}
