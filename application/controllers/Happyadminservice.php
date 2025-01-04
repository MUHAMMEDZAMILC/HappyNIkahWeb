<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class HappyAdminservice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function Test(){
	    
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->Testx();
	    
	}
	public function LoginStaffid(){
	   
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->LoginStaff();
	}
	public function AdsManagement(){
	    
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->AdsManage();
	}
	public function GetData(){
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->GetData();
	}
	public function SendActivity(){
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->SendActivity();
	}
    public function RegisterUser(){
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->InsertReg();
	}
	public function GetPhotoList(){
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->PhotoApproveList();
	}
	public function GetProfilepproveList(){
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->ProfilepproveList();
	}
	public function Search(){
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->Search();
	}

	// Lead Module
	public function LeadModule(){
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->Lead();
	}
	// Payment Module
	public function PaymentModule(){
	    $this->load->model("Happyadminservicemodel");
	    echo  $this->Happyadminservicemodel->Payment();
	}
}