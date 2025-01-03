<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coming_soon extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('General_Model');

         $this->load->library("pagination");
        
          }

    public function index()
    {   
               $this->load->view('under_construction.html');

    }
    public function under_counstruction()
    {
         $this->load->view('under_construction.html');
       
    }
}