<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estudiodao extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getEstudios(  )
    {
        $query = $this->db->query( "SELECT * FROM estudio" );
        $resultado = $query->result();
        return array("data" => $resultado, "numFilas" => $query->num_rows());
    }

    public function getEstudioById( $id )
    {
        $query = $this->db->query( 'SELECT * FROM estudio WHERE id = '.$id );
        $resultado = $query->row();
        return array("data" => $resultado );
    }

    public function add( $datos )
    {
        return  $this->db->insert( "estudio" , $datos );
    }

    public function update( $id , $datos )
    {
        $this->db->where('id', $id );
        $this->db->update('estudio', $datos );
    }

    public function delete( $id )
    {
        $this->db->where('id', $id);
        $this->db->delete('estudio');
    }



}
