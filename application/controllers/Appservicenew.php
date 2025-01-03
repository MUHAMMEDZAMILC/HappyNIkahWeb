<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Appservicenew extends CI_Controller {

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
	    
	    $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->getDistrict();
	    
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
        public function GetTabar(){
            $this->load->model("Appservicemodelnew");
       echo  $this->Appservicemodelnew->gettabbar();
       }
        public function GetDropDropdown($mode){
             $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->GetDropDropdown($mode);
        }
        public function GetProfessionType(){
             $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->GetProfessionType();
        }
        public function GetState(){
             $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->GetState();
        }
         public function GetCountry(){
             $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->GetCountry();
        }
        public function GetJob(){
             $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->getJob();
        }
        public function GetQualification(){
             $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->getQualification();
        }
        public function GetHeight(){
	    
	    $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->getHeight();
	    
	}
        public function GetWeight(){
	    
	    $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->getWeight();
	    
	}
        public function ListBelief(){
	    
	    $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->listBelief();
	    
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
          
	     $this->load->model("Appservicemodelnew");
	    
	   echo $this->Appservicemodelnew->InsertReg();
	
	}
        public function GetMotherTongue(){
            $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->GetMotherTongue();
        }
        public function UploadImage(){
             $this->load->model("Appservicemodelnew");
	   // echo  $this->Appservicemodelnew->UploadImage();
	    echo  $this->Appservicemodelnew->UploadImageServer();
        }
        public function UploadImageNew(){
            $this->load->model("Appservicemodelnew");
	        echo  $this->Appservicemodelnew->UploadImageServer();
        }
        public function PhotoStatus(){
            $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->Photostatus();
        }
        public function LoadUser(){
            $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->LoadUser();
        }
        public function LoginDetails(){
             $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->LoginDetails();
        }
        public function SendOtp(){
            $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->SendOtp();
        }
         public function VerifyOTP(){
            $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->VerifyOTP();
        }
         public function MemDetails(){
            $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->MemDetails();
        }
        public function ProfileInfo(){
            $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->ProfileInfo();
        }
         public function MyProfileInfo(){
            $this->load->model("Appservicemodelnew");
	    echo  $this->Appservicemodelnew->MyProfileInfo();
        }
        public function TotalProfileMatchViewed(){
             $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->TotalProfileMatch();
        }
        public function LastViewed(){
             $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->LastViewed();
        }
        public function  MatchingProfile(){
            $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->MatchingProfile();
        }
        public function PlanDetails() {
             $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->PlanDetails();
        }
        public function Payment(){
             $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->Payment();
        }
        public function SendActivity(){
            $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->SendActivity();
        }
        public function Explore(){
             $this->load->model("Appservicemodelnew");
           
             echo  $this->Appservicemodelnew->Explore();
        }
        public function UpdateProfVisit(){
            $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->UpdateProfVisit();
        }
        public function Search(){
            $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->Search();
        }
        public function LoadImages(){
            $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->LoadImages();
        }
       
        public function RetrieveData(){
            $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->RetrieveData();
        }
        public function ChatList(){
             $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->ChatList();
        }
        public function UserBasic(){
             $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->UserBasic();
        }
        public function LoginWithId(){
             $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->LoginWithId();
        }
        public function LoginWithAppleId(){
            $this->load->model("Appservicemodelnew");
            
            
       echo  $this->Appservicemodelnew->LoginWithAppleId();
       }
        public function SendMailTest(){
             $this->load->model("Appservicemodelnew");
             
             
	    echo  $this->Appservicemodelnew->SendMail("1838","0","123456");
        }
        public function WaterMark(){
            $this->load->model("Appservicemodelnew");
            echo $this->Appservicemodelnew->WaterMark();
        }
        public function MyProfileStatus()  {
            $this->load->model("Appservicemodelnew");
            echo $this->Appservicemodelnew->EditMyProfileInfoStatus();
        }
        public function GetReferDetails()  {
            $this->load->model("Appservicemodelnew");
            echo $this->Appservicemodelnew->GetReferDetails();
        }
        public function GetAccessToken(){
		$this->load->model("Appservicemodelnew");
		$accessToken = $this->Appservicemodelnew->getAccessToken();
        
		echo "Access Token: $accessToken";

	}
}