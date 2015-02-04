<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Egresadodao extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getEgresados(  )
    {
        $query = $this->db->query( "SELECT * FROM egresado" );
        $resultado = $query->result();
        return array("data" => $resultado, "numFilas" => $query->num_rows());
    }

    public function getEgresadoById( $id )
    {
        $query = $this->db->query( 'SELECT * FROM egresado WHERE id = '.$id );
        $resultado = $query->row();
        return array("data" => $resultado );
    }

    public function getByName( $tabla , $name )
    {
        $query = $this->db->query( 'SELECT * FROM '.$tabla.' WHERE nombre = "'.$name.'"' );
        $resultado = $query->row();
        return $resultado;
    }

    public function add( $datos )
    {
        return  $this->db->insert( "egresado" , $datos );
    }

    public function update( $id , $datos )
    {
        $this->db->where('id', $id );
        $this->db->update('egresado', $datos );
    }

    public function delete( $id )
    {
        $this->db->where('id', $id);
        $this->db->delete('egresado');
    }

    public function getPaises( )
    {
        $query = $this->db->query( 'SELECT * FROM pais' );
        $resultado = $query->result();
        return array("data" => $resultado, "numFilas" => $query->num_rows());
    }

    public function getEstados( )
    {
        $query = $this->db->query( 'SELECT * FROM estado' );
        $resultado = $query->result();
        return array("data" => $resultado, "numFilas" => $query->num_rows());
    }

    public function getCiudades( )
    {
        $query = $this->db->query( 'SELECT * FROM Ciudad' );
        $resultado = $query->result();
        return array("data" => $resultado, "numFilas" => $query->num_rows());
    }



}
