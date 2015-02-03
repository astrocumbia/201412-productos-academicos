<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mainctr extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper( array('url','form'));
        $this->load->database( 'default');
    }

    public function index()
    {
        $this->load->view('Main');
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */