<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Appservice extends CI_Controller {

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
	public function GetDistrict(){
	    
	    $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->getDistrict();
	    
	}
        public function GetData(){
        
        $mode=$_GET['mode'];
            if($mode==0){
               $this->GetDistrict();
            }elseif($mode==1){
                $this->GetHeight();
            }elseif($mode==2){
                $this->GetWeight();
            }elseif($mode==3){
                $this->ListBelief();
            }
            elseif($mode==4){
                $this->GetMotherTongue();
            }elseif($mode==5){
                $this->GetQualification();
            }elseif($mode==6){
                $this->GetJob();
            }elseif($mode==7){
                $this->GetCountry();
            }
            elseif($mode==8){
                $this->GetState();
            }elseif($mode==9){
                $this->GetProfessionType();
            }
            elseif($mode>=10){
                $this->GetDropDropdown($mode);
            }
        }
        public function GetDropDropdown($mode){
             $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->GetDropDropdown($mode);
        }
        public function GetProfessionType(){
             $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->GetProfessionType();
        }
        public function GetState(){
             $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->GetState();
        }
         public function GetCountry(){
             $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->GetCountry();
        }
        public function GetJob(){
             $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->getJob();
        }
        public function GetQualification(){
             $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->getQualification();
        }
        public function GetHeight(){
	    
	    $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->getHeight();
	    
	}
        public function GetWeight(){
	    
	    $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->getWeight();
	    
	}
        public function ListBelief(){
	    
	    $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->listBelief();
	    
	}
	public function InsertRegistration(){
          
	     $this->load->model("Appservicemodel");
	    
	   echo $this->Appservicemodel->InsertReg();
	
	}
        public function GetMotherTongue(){
            $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->GetMotherTongue();
        }
        public function UploadImage(){
             $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->UploadImage();
        }
        public function LoadUser(){
            $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->LoadUser();
        }
        public function LoginDetails(){
             $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->LoginDetails();
        }
        public function SendOtp(){
            $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->SendOtp();
        }
         public function VerifyOTP(){
            $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->VerifyOTP();
        }
         public function MemDetails(){
            $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->MemDetails();
        }
        public function ProfileInfo(){
            $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->ProfileInfo();
        }
         public function MyProfileInfo(){
            $this->load->model("Appservicemodel");
	    echo  $this->Appservicemodel->MyProfileInfo();
        }
        public function TotalProfileMatchViewed(){
             $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->TotalProfileMatch();
        }
        public function LastViewed(){
             $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->LastViewed();
        }
        public function  MatchingProfile(){
            $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->MatchingProfile();
        }
        public function PlanDetails() {
             $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->PlanDetails();
        }
        public function Payment(){
             $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->Payment();
        }
        public function SendActivity(){
            $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->SendActivity();
        }
        public function Explore(){
             $this->load->model("Appservicemodel");
           
             echo  $this->Appservicemodel->Explore();
        }
        public function UpdateProfVisit(){
            $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->UpdateProfVisit();
        }
        public function Search(){
            $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->Search();
        }
        public function LoadImages(){
            $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->LoadImages();
        }
       
        public function RetrieveData(){
            $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->RetrieveData();
        }
        public function ChatList(){
             $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->ChatList();
        }
        public function UserBasic(){
             $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->UserBasic();
        }
        public function LoginWithId(){
             $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->LoginWithId();
        }
        public function SendMailTest(){
             $this->load->model("Appservicemodel");
             
             
	    echo  $this->Appservicemodel->SendMail("1838","0","123456");
        }
        public function WaterMark(){
            $this->load->model("Appservicemodel");
            echo $this->Appservicemodel->WaterMark();
        }
}