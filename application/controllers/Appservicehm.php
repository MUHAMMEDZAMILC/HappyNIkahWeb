<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Appservicehm extends CI_Controller {

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
	    
	    $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->getDistrict();
	    
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
             $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->GetDropDropdown($mode);
        }
        public function GetProfessionType(){
             $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->GetProfessionType();
        }
        public function GetState(){
             $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->GetState();
        }
         public function GetCountry(){
             $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->GetCountry();
        }
        public function GetJob(){
             $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->getJob();
        }
        public function GetQualification(){
             $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->getQualification();
        }
        public function GetHeight(){
	    
	    $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->getHeight();
	    
	}
        public function GetWeight(){
	    
	    $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->getWeight();
	    
	}
        public function ListBelief(){
	    
	    $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->listBelief();
	    
	}
	
	public function GetAge(){
        $this->load->model("Appservicemodelnew");
        echo $this->Appservicemodelnew->GetAge();
    }
    
    public function GetHeightss(){
        $this->load->model("Appservicemodelnew");
        echo $this->Appservicemodelnew->GetHeightss();
    }
    
    public function GetWeights(){
        $this->load->model("Appservicemodelnew");
        echo $this->Appservicemodelnew->GetWeightss();
    }
	
	public function GetParentDetails(){
        $this->load->model("Appservicemodelnew");
        echo $this->Appservicemodelnew->GetParentsDetails();
    }
    
    public function GetEducation(){
        $this->load->model("Appservicemodelnew");
        echo $this->Appservicemodelnew->GetEducations();
    }
    
    public function GetEducationGroup(){
        $this->load->model("Appservicemodelnew");
        echo $this->Appservicemodelnew->GetEducationsgroup();
    }
    
    public function GetHelpSupport(){
        $this->load->model("Appservicemodelnew");
        echo $this->Appservicemodelnew->GetHelpSupport();
    }
    
	public function InsertRegistration(){
          
	     $this->load->model("Appservicemodelhm");
	    
	   echo $this->Appservicemodelhm->InsertReg();
	
	}
        public function GetMotherTongue(){
            $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->GetMotherTongue();
        }
        public function UploadImage(){
             $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->UploadImage();
        }
        public function UploadImageNew(){
            $this->load->model("Appservicemodelnew");
	        echo  $this->Appservicemodelnew->UploadImageServer();
        }
        public function PhotoStatus(){
            $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->Photostatus();
        }
        public function UploadHoroscope(){
             $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->UploadHoroscope();
        }
        public function LoadUser(){
            $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->LoadUser();
        }
        public function LoginDetails(){
             $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->LoginDetails();
        }
        public function SendOtp(){
            $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->SendOtp();
        }
         public function VerifyOTP(){
            $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->VerifyOTP();
        }
         public function MemDetails(){
            $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->MemDetails();
        }
        public function ProfileInfo(){
            $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->ProfileInfo();
        }
         public function MyProfileInfo(){
            $this->load->model("Appservicemodelhm");
	    echo  $this->Appservicemodelhm->MyProfileInfo();
        }
        public function TotalProfileMatchViewed(){
             $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->TotalProfileMatch();
        }
        public function LastViewed(){
             $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->LastViewed();
        }
        public function  MatchingProfile(){
            $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->MatchingProfile();
        }
        public function PlanDetails() {
             $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->PlanDetails();
        }
        public function Payment(){
             $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->Payment();
        }
        public function SendActivity(){
            $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->SendActivity();
        }
        public function Explore(){
             $this->load->model("Appservicemodelhm");
           
             echo  $this->Appservicemodelhm->Explore();
        }
        public function UpdateProfVisit(){
            $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->UpdateProfVisit();
        }
        public function Search(){
            $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->Search();
        }
        public function LoadImages(){
            $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->LoadImages();
        }
       
        public function RetrieveData(){
            $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->RetrieveData();
        }
        public function ChatList(){
             $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->ChatList();
        }
        public function UserBasic(){
             $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->UserBasic();
        }
        public function LoginWithId(){
             $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->LoginWithId();
        }
        public function LoginWithAppleId(){
            $this->load->model("Appservicemodelhm");
            
            
       echo  $this->Appservicemodelhm->LoginWithAppleId();
       }

        public function SendMailTest(){
             $this->load->model("Appservicemodelhm");
             
             
	    echo  $this->Appservicemodelhm->SendMail("1838","0","123456");
        }
        public function WaterMark(){
            $this->load->model("Appservicemodelhm");
            echo $this->Appservicemodelhm->WaterMark();
        }
        
        public function MyProfileStatus()  {
            $this->load->model("Appservicemodelhm");
            echo $this->Appservicemodelhm->EditMyProfileInfoStatus();
        }

        
         public function GetHoroScope(){
            $this->load->model("Appservicemodelhm");
            echo $this->Appservicemodelhm->horoscopeDetails();
        }
}