<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('General_Model');

         $this->load->library("pagination");
        
        //echo $_SESSION['userinfo']['stage']; exit;
 
        if($_SESSION['user_id'] && $_GET['currentpage'] !=1){  

            if($_SESSION['userinfo']['stage'] == 1){   
                redirect('user/registration_steptwo?currentpage=1');  
                
            }
            else if($_SESSION['userinfo']['stage'] == 2){ 
                redirect('user/registration_stepthree?currentpage=1'); 
            }
            else if($_SESSION['userinfo']['stage'] == 3){ 
                redirect('user/registration_stepfour?currentpage=1'); 
            }
            else{
                
            } 
        }
        
       
          $UserID = $this->session->userdata('user_id');
        $regdata = $this->db->select('*')->from('tbl_registration')->where('id',$_SESSION['user_id'])->get()->row_array();
        
        
        //$_SESSION['status'] = $regdata['status'];  echo  $UserID.$_SESSION['user_id'].$regdata['status']; exit;
    }

    public function index()
    {   
        // if(!empty($_SESSION['user_id'])){  redirect('user/home'); }
       // $data['homeprofiles'] =$this->General_Model->gethomeprofiles();
        $data['countryCode'] = $this->General_Model->fetch_countrycode();
        $this->load->view('index',$data);
    }
    public function under_counstruction()
    {
         $this->load->view('under_construction.html');
       
    }
    public function privacy()
    {   
        $this->load->view('privacy');
    }
    public function about(){
        $this->load->view("aboutus");
        
    }
    public function contactus(){
        $this->load->view("contactus");
    }
    public function download(){
        $this->load->view("download");
    }
     public function terms(){
        $this->load->view("terms");
    }
    public function registration_step1()
    {   
        $UserID = $this->session->userdata('user_id');
        
        if(!empty($UserID)){
            $BasicDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);
            $data['BasicDetails'] = array_shift($BasicDetails);
            $this->load->view('registrationStep1',$data);

        }
        else{
            $this->load->view('registrationStep1');
        }
        
    }

    public function register(){

        $BasicDetails['profile_for'] = strip_tags($this->input->post('created_by'));
        $BasicDetails['name'] = strip_tags($this->input->post('name'));
        $BasicDetails['countryCode'] = strip_tags($this->input->post('countryCode'));
        $BasicDetails['phone'] = strip_tags($this->input->post('phone'));
        $BasicDetails['mail'] = strip_tags($this->input->post('email'));
        $day = $this->input->post('day');
        if(strlen($day)<2)
        {
            $day = '0'.$day;
        }
        $month = $this->input->post('month');
        if(strlen($month)<2)
        {
            $month = '0'.$month;
        }
        $year = $this->input->post('year');
        $BasicDetails['dob'] = $year.'-'.$month.'-'.$day;
        $BasicDetails['gender'] = strip_tags($this->input->post('gender'));
        // $BasicDetails['stage'] = 1;
        $BasicDetails['reg_date'] = date('Y-m-d');
        
        $UserID = $this->session->userdata('user_id');
        if(!empty($UserID)){
            $exist = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);
            if(!empty($exist)){

                 if($BasicDetails['countryCode'] == '91')
                {
                    $countryCode == $BasicDetails['countryCode'];
                }
                else
                {
                    $countryCode == "+".$BasicDetails['countryCode'];
                }
                $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
                $mobilenumber = $countryCode.$BasicDetails['phone'];
                $this->smsotp($otp,$mobilenumber,$_SESSION['name']);
                echo "1";
            }
            else{

                //$_SESSION['mail'] = $BasicDetails['mail'];
                $_SESSION['name'] = $BasicDetails['name'];
                $_SESSION['phone'] = $BasicDetails['phone'];
                $_SESSION['user_id'] = $this->General_Model->AddRecord('tbl_registration', $BasicDetails);
                $_SESSION['userinfo'] = $BasicDetails;
                
                $loginDetails['username'] = $_SESSION['phone'];
                $password = 'happy'.rand(10,10000);
                $loginDetails['password'] = md5($password);
                $loginDetails['user_id'] = $_SESSION['user_id'];
                $loginDetails['date'] = date('Y-m-d');
                $happynikah_id = $this->General_Model->fetch_hnID($_SESSION['user_id'])['happynikah_id'];
                // $phone = $this->General_Model->fetch_hnID($_SESSION['user_id'])['phone'];
                            
                $this->General_Model->AddRecord('tbl_userlogin', $loginDetails);
                
                $otpval['otp'] = $otp = rand(100000,999999);
                $otpval['user_id'] = $_SESSION['user_id'];
                $otpval['otp_time'] = date('Y-m-d H:i:s');
                $otpval['otp_from'] = "1";

                $this->General_Model->AddRecord('tbl_otp',$otpval);
                
                // $msg =  'You%20have%20successfully%20initiated%20registration%20in%20happynikah.com.%20UserID:'.$happynikah_id.'%20Password:'.$password.'%0APlease%20login%20and%20complete%20your%20profile.SYSOL%20SYSTEM%20SOLUTIONS%20PRIVATE%20LIMITED';
                
                if($BasicDetails['countryCode'] == '91')
                {
                    $countryCode == $BasicDetails['countryCode'];
                }
                else
                {
                    $countryCode == "+".$BasicDetails['countryCode'];
                }
                $mobilenumber = $countryCode.$BasicDetails['phone'];
                $this->smsotp($otp,$mobilenumber,$_SESSION['name']);
                
                $msg1 =  'You have successfully initiated registration in happynikah.com. UserID:'.$happynikah_id.' Your OTP is:'.$otp.'.';
                $this->emailotp($msg1,$BasicDetails['mail']);
                 
                
                echo "1";
            }
        }
        else{
            
            
            $checkexist = $this->db->select('*')->from('tbl_registration')->where('phone',$BasicDetails['phone'])->where('status!=','3')->get()->num_rows();
            if($checkexist == 0){

                //$_SESSION['mail'] = $BasicDetails['mail'];
                $_SESSION['name'] = $BasicDetails['name'];
                $_SESSION['phone'] = $BasicDetails['phone'];
                $_SESSION['user_id'] = $this->General_Model->AddRecord('tbl_registration', $BasicDetails);
                $_SESSION['userinfo'] = $BasicDetails;
                
                $loginDetails['username'] = $_SESSION['phone'];
                $password = 'happy'.rand(10,10000);
                $loginDetails['password'] = md5($password);
                $loginDetails['user_id'] = $_SESSION['user_id'];
                $loginDetails['date'] = date('Y-m-d');
                $happynikah_id = $this->General_Model->fetch_hnID($_SESSION['user_id'])['happynikah_id'];
                // $phone = $this->General_Model->fetch_hnID($_SESSION['user_id'])['phone'];
                            
                $this->General_Model->AddRecord('tbl_userlogin', $loginDetails);
                // $msg =  'You%20have%20successfully%20initiated%20registration%20in%20happynikah.com.%20UserID:'.$happynikah_id.'%20Password:'.$password.'%0APlease%20login%20and%20complete%20your%20profile.SYSOL%20SYSTEM%20SOLUTIONS%20PRIVATE%20LIMITED';
                
                $otpval['otp'] = $otp = rand(100000,999999);
                $otpval['user_id'] = $_SESSION['user_id'];
                $otpval['otp_time'] = date('Y-m-d H:i:s');
                $otpval['otp_from'] = "1";

                $this->General_Model->AddRecord('tbl_otp',$otpval);
                
                
                if($BasicDetails['countryCode'] == '91')
                {
                    $countryCode == $BasicDetails['countryCode'];
                }
                else
                {
                    $countryCode == "+".$BasicDetails['countryCode'];
                }
                $mobilenumber = $countryCode.$BasicDetails['phone'];
                $this->smsotp($otp,$mobilenumber,$_SESSION['name']);
                
                $msg1 =  'You have successfully initiated registration in happynikah.com. UserID:'.$happynikah_id.' OTP:'.$otp.'.';
                $this->emailotp($msg1,$BasicDetails['mail']);
                if(isset($_SESSION['reg_login']) && $_SESSION['reg_login']==1){
                    $newdata = array(
                        'register_id' =>$happynikah_id,
                        'date' =>date('Y-m-d H:i:s'),
                        'user_id' =>$_SESSION['user_id']
                        
                        );
                       // print_r($newdata);
                        $this->General_Model->insertregdetail($newdata);
                        $_SESSION['reg_login']=0;



                }
                
                echo "1";
                
            }else{
                
                // redirect('user?status='.$BasicDetails['phone'].' is already registered');
                $msg = $BasicDetails['phone'];
                echo $msg;
            }
        }
        // redirect('user/registration_steptwo');
    }
    
    public function emailotp($message1,$emailID)
    {
        $to_email = $emailID;
        $subject = 'Matrimony ID and OTP';
        $message = $message1;
        $headers = 'From: Happy Nikah <info@happynikah.com>';
        mail($to_email,$subject,$message,$headers);
    }
    
    function smsotp($otp,$mobilenumber,$name){
        
       //$url = 'https://2factor.in/API/R1/?module=TRANS_SMS&apikey=7a8571c8-ed69-11ec-9c12-0200cd936042&to=' . $mobilenumber . '&from=SYSOLS&templatename=OTP+Template&var1=' . $otp . '&var2=' . $name . '&var3=happynikah.com';
       $url = 'https://2factor.in/API/V1/7a8571c8-ed69-11ec-9c12-0200cd936042/SMS/' . $mobilenumber . '/' . $otp . '/OTP+VERIFICATION';
       
      file_get_contents($url); 
        
        return 1;

    }
    
    public function verify_mobile()
    {
        $otpdigit1 = $this->input->post('otpdigit1'); 
        $otpdigit2 = $this->input->post('otpdigit2');
        $otpdigit3 = $this->input->post('otpdigit3'); 
        $otpdigit4 = $this->input->post('otpdigit4');
        $otpdigit5 = $this->input->post('otpdigit5');
        $otpdigit6 = $this->input->post('otpdigit6');
         
        $postotp = $otpdigit1.$otpdigit2.$otpdigit3.$otpdigit4.$otpdigit5.$otpdigit6;

        $UserID = $this->session->userdata('user_id');

        $verify = $this->General_Model->verify_mobile($postotp,$UserID);
        
        if($verify == 1)
        {
            $BasicDetails['stage'] = 1;
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
            
            
            echo '1';
        }
        else
        {
            echo '0';
        }
    }

    public function registration_steptwo(){   
        $_SESSION['userinfo']['stage']=1;  
            $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");
            $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 
            $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");
            $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");
            $data['district'] = $this->General_Model->GetFullData($table = "tbl_district");
            $data['qualification'] = $this->General_Model->GetFullData($table = "tbl_qualification");
            $data['job'] = $this->General_Model->GetFullData($table = "tbl_jobs");
            $data['profession'] = $this->General_Model->GetFullData($table = "tbl_profession");
            $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");
            $UserID = $this->session->userdata('user_id');
            if(!empty($UserID)){
                $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);
                $data['ProfileDetails'] = array_shift($ProfileDetails);
                $userimage = $this->General_Model->GetFullData($table = "tbl_userimages",'user_image_id',$UserID);
                $data['userimage'] = array_shift($userimage);
                
                $this->load->view('registrationStep2',$data);
            }else{
                redirect('user');
            }
            
    }

    public function register_personal_info(){
            $UserID = $this->session->userdata('user_id');
            $name = $this->session->userdata('name');
            $age = $this->input->post('age');
            $about = "I'm ".$name.". I'm ".$age." Years old";
            $BasicDetails['about'] = !empty($this->input->post('about'))?$this->input->post('about'):$about;
            $BasicDetails['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
            $BasicDetails['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';
            $BasicDetails['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';
            $BasicDetails['color'] = !empty($this->input->post('color'))?$this->input->post('color'):'NULL';
            $BasicDetails['mail'] = !empty($this->input->post('email'))?$this->input->post('email'):'NULL';
            $BasicDetails['marital_status'] = !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'NULL';
            $BasicDetails['no_of_children'] = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'';
            $BasicDetails['physical_status'] = !empty($this->input->post('physical_status'))?$this->input->post('physical_status'):'NULL';
            $BasicDetails['registration_phychallenge'] = !empty($this->input->post('registration_phychallenge'))?$this->input->post('registration_phychallenge'):'NULL';
            $BasicDetails['mother_tongue'] = !empty($this->input->post('mother_tongue'))?$this->input->post('mother_tongue'):'NULL';
            $BasicDetails['blood_group'] = !empty($this->input->post('blood_group'))?$this->input->post('blood_group'):'NULL';
            $BasicDetails['religion'] = 2;
            $BasicDetails['caste'] = !empty($this->input->post('belief'))?$this->input->post('belief'):'NULL';
            $BasicDetails['address'] = !empty($this->input->post('address'))?$this->input->post('address'):'NULL';
            $BasicDetails['native_place'] = !empty($this->input->post('city'))?$this->input->post('city'):'NULL';
            $BasicDetails['pincode'] = $this->input->post('pincode');
            $BasicDetails['state'] = !empty($this->input->post('state'))?$this->input->post('state'):'NULL';
            $BasicDetails['country'] = !empty($this->input->post('country'))?$this->input->post('country'):'NULL';
            $BasicDetails['native_district'] = !empty($this->input->post('district'))?$this->input->post('district'):'NULL';
            $BasicDetails['other_contact_number'] = $this->input->post('othercontactno');
            $BasicDetails['education'] = !empty($this->input->post('qualification'))?$this->input->post('qualification'):'NULL';
            $BasicDetails['occupation'] = !empty($this->input->post('job'))?$this->input->post('job'):'NULL';
            $BasicDetails['profession'] = !empty($this->input->post('profession'))?$this->input->post('profession'):'NULL';
            $BasicDetails['job_category'] = !empty($this->input->post('job_status'))?$this->input->post('job_status'):'NULL';
            $BasicDetails['annual_income'] = !empty($this->input->post('annual_income'))?$this->input->post('annual_income'):'NULL';
            $BasicDetails['registration_hobbies'] = !empty($this->input->post('hobbies'))?$this->input->post('hobbies'):'NULL';
            $BasicDetails['photo_visibility'] = !empty($this->input->post('photo_visibility'))?$this->input->post('photo_visibility'):'NULL';
            
            $BasicDetails['photopassword'] = !empty($this->input->post('photopassword'))?$this->input->post('photopassword'):'0';

            if($this->input->post('showtoexpress') == "on")
            {
              $BasicDetails['showtoexpress'] = '1';
            }
            else
            {
              $BasicDetails['showtoexpress'] = '0';
            }

            if($this->input->post('showtopremium') == "on")
            {
              $BasicDetails['showtopremium'] = '1';
            }
            else
            {
              $BasicDetails['showtopremium'] = '0';
            }
            

            $BasicDetails['stage'] = 2;
            
            
           // print_r($BasicDetails); exit;
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
            // $filename = basename($_FILES['image']['name']);
            // $types = array('image/jpeg','image/gif','image/jpg','image/png');


            // if (in_array($_FILES['image']['type'], $types)) {  

            //       $file_ext = substr($filename, strrpos($filename, '.') + 1);
            //       $FileName=current(explode('.', $_FILES['image']['name'])); 
            //       $filenameis=rand(100,9000).".".$file_ext;
            //       $target_path = "./assets/photo_storage/". $filenameis;
            //       if(@move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) { 
                
            //           $mw = 293.33;
            //           $mh = 222.77;
            //           $img = $target_path;

            //           $uploaddata = array(
            //             'user_id' => $UserID,
            //             'user_image' => $filenameis
            //           );
            //           $this->General_Model->AddRecord('tbl_userimages',$uploaddata);
            //           $data = array(
            //               'photo' => $filenameis
            //               );
            //           $this->General_Model->UpdateData('tbl_registration','id',$UserID,$data);

            //           $_SESSION['userinfo']['stage'] =2;
            //       }
         
            // }
            
             $_SESSION['userinfo']['stage'] =2;
            redirect('user/registration_stepthree');
    }

    public function registration_stepthree(){
        $UserID = $this->session->userdata('user_id');
        if(!empty($UserID)){
            $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");
            $data['qualification'] = $this->General_Model->GetFullData($table = "tbl_qualification");
            
            $this->load->view('registrationStep3',$data);
        }
        else{
            redirect()->to(base_url());
        }
    }

    public function register_family_info(){  
            $UserID = $this->session->userdata('user_id');
            $FamilyDetails['user_id'] = $PartnerDetails['user_id'] = $UserID;
            $FamilyDetails['fathers_name'] = !empty($this->input->post('fathers_name'))?$this->input->post('fathers_name'):'NULL';
            $FamilyDetails['fathers_occupation'] = !empty($this->input->post('father_occupation'))?$this->input->post('father_occupation'):'NULL';
            $FamilyDetails['mothers_name'] = !empty($this->input->post('mothers_name'))?$this->input->post('mothers_name'):'NULL';
            $FamilyDetails['mothers_occupation'] = !empty($this->input->post('mother_occupation'))?$this->input->post('mother_occupation'):'NULL';
            $FamilyDetails['total_members'] = !empty($this->input->post('no_of_family_members'))?$this->input->post('no_of_family_members'):'NULL';
            $FamilyDetails['financial_status'] = !empty($this->input->post('financial_status'))?$this->input->post('financial_status'):'NULL';
            $PartnerDetails['partner_age_from'] = !empty($this->input->post('age_from'))?$this->input->post('age_from'):'NULL';
            $PartnerDetails['partner_age_to'] = !empty($this->input->post('age_to'))?$this->input->post('age_to'):'NULL';
            $PartnerDetails['partner_height'] = !empty($this->input->post('height_preference_from'))?$this->input->post('height_preference_from'):'NULL';
            $PartnerDetails['partner_height_to'] = !empty($this->input->post('height_preference_to'))?$this->input->post('height_preference_to'):'NULL';
            $PartnerDetails['partner_education'] = !empty($this->input->post('qualification_preference'))?$this->input->post('qualification_preference'):'NULL';
            $PartnerDetails['partner_familytype'] = !empty($this->input->post('family_type_preference'))?$this->input->post('family_type_preference'):'NULL';
            $PartnerDetails['partner_expectation'] = !empty($this->input->post('expectations'))?$this->input->post('expectations'):'NULL';
            
            $this->General_Model->AddRecord('tbl_familyprofile', $FamilyDetails);
            $this->General_Model->AddRecord('tbl_otherdetails', $PartnerDetails);
            // $loginDetails['username'] = $_SESSION['phone'];
            // $password = 'happy'.rand(10,10000);
            // $loginDetails['password'] = md5($password);
            // $loginDetails['user_id'] = $_SESSION['user_id'];
            // $loginDetails['date'] = date('Y-m-d');
            // $happynikah_id = $this->General_Model->fetch_hnID($UserID)['happynikah_id'];
            // $phone = $this->General_Model->fetch_hnID($UserID)['phone'];
            // $this->General_Model->AddRecord('tbl_userlogin', $loginDetails);
            
            $BasicDetails['stage'] = 3;
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
            
            $_SESSION['userinfo']['stage'] =3;
            
            redirect('user/registration_stepfour');
            
            // $set_password = $this->input->post('set_password');
            // $confirm_password = $this->input->post('confirm_password');

            // if($set_password != $confirm_password)
            // {
            //     echo "<script>alert('Password does not match');window.location.href='".base_url()."index.php/user/registration_stepthree?currentpage=1'</script>";
            //     // exit(0);
            // }
            // else
            // {
            //     $loginDetails['username'] = $_SESSION['phone'];
            //     $password = $set_password;
            //     $loginDetails['password'] = md5($password);
            //     $loginDetails['user_id'] = $_SESSION['user_id'];
            //     $loginDetails['date'] = date('Y-m-d');
            //     $check_password = $this->General_Model->check_password($_SESSION['user_id']);
            //     if($check_password == 0)
            //     {
            //         $this->General_Model->AddRecord('tbl_userlogin', $loginDetails);
            //     }
            //     else
            //     {
            //         $loginDetails['originalpass'] = $password;
            //         $this->General_Model->UpdateData('tbl_userlogin',$column_name = 'user_id',$_SESSION['user_id'],$loginDetails);
            //     }

            //     $this->session->unset_userdata('user_id');
            //     $this->session->unset_userdata("name");
            //     $this->session->unset_userdata("phone");
            //     $this->session->unset_userdata("userinfo");
            //     redirect('user/congratulations');
            // }
            
            
            // $msg =  'You%20have%20successfully%20initiated%20registration%20in%20happynikah.com.%20UserID:'.$happynikah_id.'%20Password:'.$password.'%0APlease%20login%20and%20complete%20your%20profile.SYSOL%20SYSTEM%20SOLUTIONS%20PRIVATE%20LIMITED';
            // $this->smsotp($msg,'91'.$phone);
            
            
            
        // $res = $this->General_Model->login($loginDetails['username'], $loginDetails['password']);
       
        // // print_r($res); exit;
        // if($res != 'failure'){
            
        //     $_SESSION['user_id'] = $res['user_id'];
        //     $_SESSION['name'] = $res['name'];
        //     $_SESSION['gender'] = $res['gender'];
        //     $_SESSION['religion'] = $res['religion'];
        //     $_SESSION['caste'] = $res['caste'];
        //     $_SESSION['age'] = $res['age'];
        //     $_SESSION['status'] = $res['status'];
        //     $_SESSION['photo'] = $res['photo'];
            
            
        // }
        
            // $this->session->unset_userdata('user_id');
            // $this->session->unset_userdata("name");
            // $this->session->unset_userdata("phone");
            // $this->session->unset_userdata("userinfo");
       // print_r($_SESSION);
            // redirect('user/congratulations');
    }
    
    public function registration_stepfour(){
        $userID =  $this->session->userdata('user_id');
        if(!empty($userID))
        {
            $data['userdetails'] = $this->General_Model->get_loginuser($userID);
            $this->load->view('registrationStep4',$data);
        }
        else
        {
            redirect()->to(base_url());
        }
    }

    public function create_password()
    {
        $set_password = $this->input->post('set_password');
        $confirm_password = $this->input->post('confirm_password');

        if($set_password != $confirm_password)
        {
            echo "<script>alert('Password does not match');window.location.href='".base_url()."index.php/user/registration_stepfour?currentpage=1'</script>";
            // exit(0);
        }
        else
        {
            $loginDetails['username'] = $_SESSION['phone'];
            $password = $set_password;
            $loginDetails['password'] = md5($password);
            $loginDetails['user_id'] = $_SESSION['user_id'];
            $loginDetails['date'] = date('Y-m-d');

            $check_password = $this->General_Model->check_password($_SESSION['user_id']);
            if($check_password == 0)
            {
                $this->General_Model->AddRecord('tbl_userlogin', $loginDetails);
            }
            else
            {
                $loginDetails['originalpass'] = $password;
                $this->General_Model->UpdateData('tbl_userlogin',$column_name = 'user_id',$_SESSION['user_id'],$loginDetails);
            }

            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata("name");
            $this->session->unset_userdata("phone");
            $this->session->unset_userdata("userinfo");
            redirect('user/congratulations');
        }
    }

    public function congratulations(){
        
        
         
           // $this->session->sess_destroy();
            
            $this->load->view('congratulations');
    }

    public function GetHeight()
   {   
        $HeightFrom = $this->input->post('HeightFrom');
        $result = $this->General_Model->GetFullData('tbl_height','',$HeightFrom);
        if ($result != "") {
            $data1 = '<option value="">Select</option>';
            for ($i = 0; $i < count($result); $i++) {
                $data = '<option value = "' . $result[$i]->height_id . '" textvalue="' . $result[$i]->height . '">' . $result[$i]->height . '</option>';
                if (empty($i)) {
                    print_r($data1);
                }
                print_r($data);
            }
        }
   }

    public function login(){

        $user = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $res = $this->General_Model->login($user, $password);
        
        if($res != 'failure'){
            
            $_SESSION['user_id'] = $res['user_id'];
            $_SESSION['name'] = $res['name'];
            $_SESSION['gender'] = $res['gender'];
            $_SESSION['religion'] = $res['religion'];
            $_SESSION['caste'] = $res['caste'];
            $_SESSION['age'] = $res['age'];
            $_SESSION['status'] = $res['status'];
            $_SESSION['photo'] = $res['photo'];
            echo 1;
            
        }else{
            echo 2;
        }

    }

   public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata("name");
        $this->session->unset_userdata("gender");
        $this->session->unset_userdata("religion");
        $this->session->unset_userdata("caste");
        $this->session->unset_userdata("age");
        $this->session->unset_userdata("status");
        $this->session->unset_userdata("photo");
        redirect('user');
    }

   public function home()
    {   
        
      
        
        if(empty($_SESSION['user_id'])){ redirect('user'); }

        $offset = $_GET['offset'];
        if(empty($offset)){ $offset = ''; }
        $UserID = $this->session->userdata('user_id');
        $partner_preference = $this->General_Model->GetFullData($table = "tbl_otherdetails",'user_id',$UserID);
        $partner_preference = array_shift($partner_preference);
        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");
        $Details['sender_id'] = $UserID;
        $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);
        $Details['caste'] =(!empty($this->session->userdata('caste') && $this->session->userdata('caste')!= 'NULL') ? $this->session->userdata('caste') : '');
        $Details['religion'] = 2;
        
        if($_SESSION['gender'] == 1){
            
            $dob_date = new DateTime($_SESSION['dob']); // Your date of birth
            $today_date = new Datetime(date('Y-m-d'));
            $diff = $today_date->diff($dob_date);
            $user_age = 18;
            $ageto = $diff->y;
        }
        else
        {
            $dob_date = new DateTime($_SESSION['dob']);
            $today_date = new Datetime(date('Y-m-d'));
            $diff = $today_date->diff($dob_date);
            $user_age = $diff->y;
            $ageto = $user_age+10;
        }
        $Details['AgeFrom'] = $user_age;
        $Details['AgeTo'] = $ageto;
        // $Details['AgeFrom'] = (!empty($partner_preference->partner_age_from) && $partner_preference->partner_age_from!= 'NULL' ? $partner_preference->partner_age_from : '');
        // $Details['AgeTo'] = (!empty($partner_preference->partner_age_to) && $partner_preference->partner_age_to!= 'NULL' ? $partner_preference->partner_age_to : '');
        $Details['HeightFrom'] = (!empty($partner_preference->partner_height) && $partner_preference->partner_height != 'NULL'? $partner_preference->partner_height : '');
        $Details['HeightTo'] = (!empty($partner_preference->partner_height_to) && $partner_preference->partner_height_to != 'NULL'? $partner_preference->partner_height_to : '');
        $Details['PartnerEducation'] = (!empty($partner_preference->partner_education) && $partner_preference->partner_education != 'NULL'? $partner_preference->partner_education : '');
        $Details['financial_status'] = (!empty($partner_preference->partner_familytype) && $partner_preference->partner_familytype != 'NULL'? $partner_preference->partner_familytype : '');
        
        //pagination:-

        $config = array();
        $config["base_url"] = base_url() . "index.php/user/home";
        $config["total_rows"] = $this->General_Model->getmatchingprofiles('',$Details,1);
        // $config["total_rows"] = 500;
        $config["per_page"] = DATALIMIT;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

       
        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        
        $data["links"] = $this->pagination->create_links();

        $data['MatchingProfiles'] = $this->General_Model->getmatchingprofiles($page,$Details);
     
        $count = 1;
        // $data['MatchingProfilesCount'] = $this->General_Model->getmatchingprofiles($offset,$Details,$count);
       // $data['InterestExpressedCount'] = $this->General_Model->interestexpressed($offset,$Details,$count);
        //$data['liked_profilesCount'] = $this->General_Model->liked_profiles($offset,$Details,$count);
        $this->load->view('home',$data);
    }

    public function profile(){
        $UserID = $this->session->userdata('user_id');


        if(empty($UserID)){ redirect('user/logout');}
        $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);
        $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");
        $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 
        $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");
        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");
        $data['district'] = $this->General_Model->GetFullData($table = "tbl_district");
        $data['state'] = $this->General_Model->GetFullData($table = "tbl_states");
        $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");
        $data['qualification'] = $this->General_Model->GetFullData($table = "tbl_qualification");
        $data['job'] = $this->General_Model->GetFullData($table = "tbl_jobs");
        $data['profession'] = $this->General_Model->GetFullData($table = "tbl_profession");
        $data['images'] = $this->General_Model->GetFullData('tbl_userimages','user_id',$UserID);
        $this->load->view('profile',$data);
    }
    
    public function update_about(){
            $UserID = $this->session->userdata('user_id');
            if(empty($UserID)){ redirect('user/logout');}
            $name = $this->session->userdata('name');
            $age = $this->session->userdata('age');
            $about = "I'm ".$name.". I'm ".$age." Years old";
            $BasicDetails['about'] = !empty($this->input->post('about'))?$this->input->post('about'):$about;
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
            
            redirect('user/profile');
    }

    public function update_basic_info(){
            $UserID = $this->session->userdata('user_id');
            if(empty($UserID)){ redirect('user/logout');}
            $BasicDetails['no_of_children'] = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'';
            $BasicDetails['profile_for'] = $this->input->post('profile_for');
            $BasicDetails['name'] = $this->input->post('name');
           // $BasicDetails['phone'] = $this->input->post('phone');
            $BasicDetails['mail'] = $this->input->post('mail');
            //$BasicDetails['gender'] = $this->input->post('gender');
            $BasicDetails['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
            $BasicDetails['marital_status'] = !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'NULL';
            $BasicDetails['mother_tongue'] = !empty($this->input->post('mother_tongue'))?$this->input->post('mother_tongue'):'NULL';
            $BasicDetails['other_contact_number'] = $this->input->post('othercontactno');
            $BasicDetails['registration_hobbies'] = !empty($this->input->post('registration_hobbies'))?$this->input->post('registration_hobbies'):'NULL';
            $BasicDetails['photo_visibility'] = !empty($this->input->post('photo_visibility'))?$this->input->post('photo_visibility'):'NULL';
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
            
            redirect('user/profile');
    }

    public function update_religious_info(){
            $UserID = $this->session->userdata('user_id');
            if(empty($UserID)){ redirect('user/logout');}
            $BasicDetails['caste'] = !empty($this->input->post('user_caste'))?$this->input->post('user_caste'):'NULL';
            
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
            
            redirect('user/profile');
    }

    public function update_professional_info(){
            $UserID = $this->session->userdata('user_id');
            if(empty($UserID)){ redirect('user/logout');}
            $BasicDetails['education'] = !empty($this->input->post('qualification'))?$this->input->post('qualification'):'NULL';
            $BasicDetails['occupation'] = !empty($this->input->post('job'))?$this->input->post('job'):'NULL';
            $BasicDetails['job_category'] = !empty($this->input->post('job_status'))?$this->input->post('job_status'):'NULL';
            $BasicDetails['profession'] = !empty($this->input->post('profession'))?$this->input->post('profession'):'NULL';
            $BasicDetails['annual_income'] = !empty($this->input->post('annual_income'))?$this->input->post('annual_income'):'NULL';
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
            
            redirect('user/profile');
    }

    public function update_physical_info(){
            $UserID = $this->session->userdata('user_id');
            if(empty($UserID)){ redirect('user/logout');}
            
            $BasicDetails['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';
            $BasicDetails['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';
            $BasicDetails['color'] = !empty($this->input->post('color'))?$this->input->post('color'):'NULL';
            $BasicDetails['physical_status'] = !empty($this->input->post('physical_status'))?$this->input->post('physical_status'):'NULL';
            $BasicDetails['registration_phychallenge'] = !empty($this->input->post('registration_phychallenge'))?$this->input->post('registration_phychallenge'):'NULL';
            $BasicDetails['blood_group'] = !empty($this->input->post('blood_group'))?$this->input->post('blood_group'):'NULL';
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
            
            redirect('user/profile');
    }

    public function update_location_info(){
            $UserID = $this->session->userdata('user_id');
            if(empty($UserID)){ redirect('user/logout');}
            $BasicDetails['native_place'] = !empty($this->input->post('city'))?$this->input->post('city'):'NULL';
            $BasicDetails['pincode'] = $this->input->post('pincode');
            $BasicDetails['native_district'] = !empty($this->input->post('district'))?$this->input->post('district'):'NULL';
            $BasicDetails['state'] = !empty($this->input->post('state'))?$this->input->post('state'):'NULL';
            $BasicDetails['country'] = !empty($this->input->post('country'))?$this->input->post('country'):'NULL';
            $BasicDetails['address'] = !empty($this->input->post('address'))?$this->input->post('address'):'NULL';
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);
            //echo $this->db->last_query(); exit;
            redirect('user/profile');
    }

    public function update_family_info(){
            $UserID = $this->session->userdata('user_id');
            if(empty($UserID)){ redirect('user/logout');}
            $FamilyDetails['fathers_name'] = !empty($this->input->post('fathers_name'))?$this->input->post('fathers_name'):'NULL';
            $FamilyDetails['fathers_occupation'] = !empty($this->input->post('father_occupation'))?$this->input->post('father_occupation'):'NULL';
            $FamilyDetails['mothers_name'] = !empty($this->input->post('mothers_name'))?$this->input->post('mothers_name'):'NULL';
            $FamilyDetails['mothers_occupation'] = !empty($this->input->post('mother_occupation'))?$this->input->post('mother_occupation'):'NULL';
            $FamilyDetails['total_members'] = !empty($this->input->post('no_of_family_members'))?$this->input->post('no_of_family_members'):'NULL';
            $FamilyDetails['financial_status'] = !empty($this->input->post('financial_status'))?$this->input->post('financial_status'):'NULL';
            $this->General_Model->UpdateData($table = 'tbl_familyprofile',$column_name = 'user_id',$UserID,$FamilyDetails);
            
            redirect('user/profile');
    }

     public function update_partner_preference(){
            $UserID = $this->session->userdata('user_id');
            $Otherdetails['partner_age_from'] = !empty($this->input->post('partner_age_from'))?$this->input->post('partner_age_from'):'NULL';
            $Otherdetails['partner_age_to'] = !empty($this->input->post('partner_age_to'))?$this->input->post('partner_age_to'):'NULL';
            $Otherdetails['partner_height'] = !empty($this->input->post('partner_height'))?$this->input->post('partner_height'):'NULL';
            $Otherdetails['partner_height_to'] = !empty($this->input->post('partner_height_to'))?$this->input->post('partner_height_to'):'NULL';
            $Otherdetails['partner_education'] = !empty($this->input->post('partner_education'))?$this->input->post('partner_education'):'NULL';
            $Otherdetails['partner_familytype'] = !empty($this->input->post('partner_familytype'))?$this->input->post('partner_familytype'):'NULL';
            $this->General_Model->UpdateData($table = 'tbl_otherdetails',$column_name = 'user_id',$UserID,$Otherdetails);
            
            redirect('user/profile');
    }

    public function search_profile()
    {
        $UserID = $this->session->userdata('user_id');
        $data['LoggedUserProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);
        // print_r($data);
        $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);
        $Details['caste'] = $this->input->post('caste');
        $Details['AgeFrom'] = substr($this->input->post('age'), 0, 2);
        $Details['AgeTo'] = substr($this->input->post('age'), 3, 5);
        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");
        $data['qualification'] = $this->General_Model->GetFullData($table = "tbl_qualification");
        $data['district'] = $this->General_Model->GetFullData($table = "tbl_district");


        $config = array();
        $config["base_url"] = base_url() . "index.php/user/search_profile";
        $config["total_rows"] = $this->General_Model->getmatchingprofiles('',$Details,1);
        $config["per_page"] = DATALIMIT;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        
        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        
        $data["links"] = $this->pagination->create_links();

        $data['Profiles'] = $this->General_Model->getmatchingprofiles( $page,$Details);

        

       // $data['Profiles'] = $this->General_Model->getmatchingprofiles('',$Details);
        // print_r($data['Profiles']); exit;
        $this->load->view('search',$data);
    }

    public function search(){
        $UserID = $this->session->userdata('user_id');
        $data['LoggedUserProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);
        $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);
        $Details['status'] = !empty($this->input->post('status'))?$this->input->post('status'):'';
        $Details['AgeFrom'] = !empty($this->input->post('agefrom'))?$this->input->post('agefrom'):'';
        $Details['AgeTo'] = !empty($this->input->post('ageto'))?$this->input->post('ageto'):'';
        $Details['marital_status'] = !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';
        $Details['belief'] = !empty($this->input->post('belief'))?$this->input->post('belief'):'';
        $Details['qualification'] = !empty($this->input->post('qualification'))?$this->input->post('qualification'):'';
        $Details['district'] = !empty($this->input->post('district'))?$this->input->post('district'):'';
        $Profiles = $this->General_Model->getmatchingprofiles('',$Details);
        // print_r($Profiles); exit;
        if(!empty($Profiles)){
                 foreach ($Profiles as $key => $value) {
                    $match = 0;
                    if($data['LoggedUserProfileDetails']['age']>=$value->partner_age_from && $data['LoggedUserProfileDetails']['age']<=$value->partner_age_to){
                        $match++;
                    }
                    if($data['LoggedUserProfileDetails']['height']>=$value->partner_height && $data['LoggedUserProfileDetails']['height']<=$value->partner_height_to){
                        $match++;
                    }
                    if($data['LoggedUserProfileDetails']['qualification'] == $value->qualification){
                        $match++;
                    }
                    if($data['LoggedUserProfileDetails']['financial_status'] == $value->partner_familytype){
                        $match++;
                    }
                        echo '<div class="d-lg-flex SRSbox">';
                            echo '<div class="flex-shrink-0">';
                                    if(empty($value->photo)){ 
                                           if($value->gender== 1){ 
                                                echo '<img src="'.base_url("/assets/photo_storage/male.jpg") .'" alt="profile image" class="proImg">';
                                           }
                                           else if($value->gender== 2)
                                           {
                                                echo '<img src="'.base_url("/assets/photo_storage/female.jpg") .'" alt="profile image" class="proImg">';
                                           }
                                    }
                                    else{
                                           echo '<img src="'.base_url("/assets/photo_storage/".$value->photo).'" alt="..." class="srProPic">';
                                    }

                              
                              echo '</div>';
                            echo ' <div class="flex-grow-1 ms-lg-3 p-4 p-lg-2 p-xxl-4 d-flex flex-column justify-content-between">';
                                echo '<div>';
                                    echo '<div class="headName d-flex align-items-center justify-content-between">';
                                        echo '<a href="'.site_url('user/singleprofile/'. $value->id).'">';
                                            echo '<div class="d-flex align-items-center">';
                                                echo '<label class="nme">'.$value->name.'</label>';
                                            echo '</div>';
                                        echo '</a>';
                                        echo '<div class="youHim">';
                                            echo '<img src="'.base_url("assets/images/people.png").'">
                                            You & Him
                                           <span>'.$match .' / 4</span>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="d-flex align-items-center">';
                                        echo '<label class="dsgntn">'.$value->job_name.'</label>';
                                        if($value->status ==1 || $value->status ==2 || $value->status ==3){ 
                                        echo '<span class="verified">';
                                            echo '<img src="'.base_url("assets/images/verify.png").'">';
                                            echo '&nbsp; Verified';
                                        echo '</span>';
                                        } 
                                        else{
                                        echo '<span class="verified">';
                                          echo '<img src="'.base_url("assets/images/blocked.png").'">';
                                            echo '&nbsp; Verification Pending';
                                        echo '</span>';
                                       }
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="dBox d-flex justify-content-between align-items-center">';
                                    echo '<div>';



                                        // echo '<span>'.$value->age.' Yrs, '.$value->height.' cm</span>';
                                        // echo '<span>Muslim, '.$value->user_caste.'</span>';
                                        // echo '<span>'.$value->native_place.', '.$value->district.'</span>';


                                    echo '<span>';
                                                if(!empty($value->age) && $value->age !='NULL'){
                                                    echo $value->age; 
                                                    echo 'Yrs,';
                                                }
                                                if(!empty($value->height) && $value->height !='NULL'){
                                                    echo $value->height;
                                                    echo 'cm,';
                                                }
                                        echo '</span>';
                                        echo '<span>Muslim';
                                                if(!empty($value->user_caste) && $value->user_caste !='NULL'){ 
                                                            echo ',';
                                                            echo $value->user_caste; 
                                        } 
                                        echo '</span>';
                                        echo '<span>'; 
                                                    if(!empty($value->native_place) && $value->native_place !='NULL' && !empty($value->district) && $value->district !='NULL'){ 

                                                                echo $value->native_place; 
                                                                echo ',';
                                                                echo $value->district; 
                                                    }
                                                    else if(!empty($value->native_place) && $value->native_place !='NULL'){ 
                                                                echo ',';
                                                                echo $value->native_place; 
                                                    } 
                                                    else if(!empty($value->district) && $value->district !='NULL'){        
                                                                echo ',';
                                                                echo $value->district; 
                                                    }
                                        echo '</span>';






                                    echo '</div>';
                                    echo '<a href="'.site_url('user/singleprofile/'. $value->id).'">';
                                    echo '<button class="sndrqst1" type="button">';
                                        echo '<img src="'.base_url("assets/images/checked.png").'">';
                                        echo 'View Profile';
                                    echo '</button>';
                                    echo '</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                 }
        }
        else
        { 
                        echo '<div class="d-lg-flex SRSbox">';
                            echo '<div class="flex-grow-1 ms-lg-3 p-4 p-lg-2 p-xxl-4 d-flex flex-column justify-content-between">';
                            echo '<center><h6 style="color:red"><b>No Profiles Found</b></h6></center>';
                            echo '</div>';
                        echo '</div>';
        }
                 exit;
    }  


    public function singleprofile($UserID = ''){ 
        $LoggedUserID = $this->session->userdata('user_id');
        $data['LoggedUserProfileDetails'] = $this->General_Model->GetProfileDetails($LoggedUserID);

        // echo $UserID; exit;
        $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);
        
        $data['payment_done'] = $this->General_Model->payment_done($LoggedUserID);
        
        $where = array('sender_id'=>$LoggedUserID,'planid'=>$data['payment_done'][0]->id);
        $data['contact_viewed'] = $this->General_Model->GetFullData1("tbl_contact_viewed",$where);
        
        if($UserID != 0){
        $check = $this->db->select('*')->from('tbl_viewed_profiles')->where('receiver_id',$UserID)->where('sender_id',$LoggedUserID)->get()->row_array();
        if(empty($check['viewed_id'])){
        $vieweddata = array('sender_id'=>$LoggedUserID,'receiver_id'=>$UserID,'date'=>date('Y-m-d'));
        $this->db->insert('tbl_viewed_profiles',$vieweddata);
        }else{

        $vieweddata = array('statusdate'=>date('Y-m-d'));
        $this->db->where('viewed_id',$check['viewed_id']);
        $this->db->update('tbl_viewed_profiles',$vieweddata);

        } }

        //print_r($data['ProfileDetails']); exit;
        $partner_preference = $this->General_Model->GetFullData($table = "tbl_otherdetails",'user_id',$UserID);
        // $partner_preference = array_shift($partner_preference);
        // $data['partner_preference'] = $partner_preference;
        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");
        $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);
        $Details['caste'] =(!empty($this->session->userdata('caste') && $this->session->userdata('caste')!= 'NULL') ? $this->session->userdata('caste') : '');
        $Details['religion'] = 2;
        $Details['AgeFrom'] = (!empty($partner_preference->partner_age_from) && $partner_preference->partner_age_from!= 'NULL' ? $partner_preference->partner_age_from : '');
        $Details['AgeTo'] = (!empty($partner_preference->partner_age_to) && $partner_preference->partner_age_to!= 'NULL' ? $partner_preference->partner_age_to : '');
        $Details['HeightFrom'] = (!empty($partner_preference->partner_height) && $partner_preference->partner_height != 'NULL'? $partner_preference->partner_height : '');
        $Details['HeightTo'] = (!empty($partner_preference->partner_height_to) && $partner_preference->partner_height_to != 'NULL'? $partner_preference->partner_height_to : '');
        $Details['PartnerEducation'] = (!empty($partner_preference->partner_education) && $partner_preference->partner_education != 'NULL'? $partner_preference->partner_education : '');
        $Details['financial_status'] = (!empty($partner_preference->partner_familytype) && $partner_preference->partner_familytype != 'NULL'? $partner_preference->partner_familytype : '');
        $data['partner_preference_data'] = $this->General_Model->GetPartnerPreference($UserID);


        $data['MatchingProfiles'] = $this->General_Model->getmatchingprofiles($offset,$Details);


        $data['interest'] =   $this->db->select('*')->from('tbl_interest')->where('receiver_id',$UserID)->where('sender_id',$LoggedUserID)->get()->num_rows();

        $data['block'] =   $this->db->select('*')->from('tbl_block')->where('receiver_id',$UserID)->where('sender_id',$LoggedUserID)->get()->num_rows();

        $data['shortlist'] =   $this->db->select('*')->from('tbl_shortlist')->where('receiver_id',$UserID)->where('sender_id',$LoggedUserID)->get()->num_rows();

        $data['like'] =   $this->db->select('*')->from('tbl_like')->where('receiver_id',$UserID)->where('sender_id',$LoggedUserID)->get()->num_rows();



        // echo $this->db->last_query(); exit;
        
        $this->load->view('singleProfile',$data); 
    }  

    public function send_interest(){
        $data['sender_id'] =  $this->session->userdata('user_id');
        $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';
        
        $check = $this->db->select('*')->from('tbl_interest')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();
        if(empty($check['interest_id'])){ $this->General_Model->AddRecord('tbl_interest', $data); }else{

            $this->General_Model->DeleteData('tbl_interest','interest_id',$check['interest_id'] );
        }
        echo 1; exit;
    }

    public function like(){
        $data['sender_id'] =  $this->session->userdata('user_id');
        $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';
        
        $check = $this->db->select('*')->from('tbl_like')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();
        if(empty($check['like_id'])){ $this->General_Model->AddRecord('tbl_like', $data); }else{

            $this->General_Model->DeleteData('tbl_like','like_id',$check['like_id'] );
        }
        echo 1; exit;
    }


    public function shortlist(){
        $data['sender_id'] =  $this->session->userdata('user_id');
        $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';
        
        $check = $this->db->select('*')->from('tbl_shortlist')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();
        if(empty($check['shortlist_id'])){ $this->General_Model->AddRecord('tbl_shortlist', $data); }else{

            $this->General_Model->DeleteData('tbl_shortlist','shortlist_id',$check['shortlist_id'] );
        }
        echo 1; exit;
    }


    function block(){


        $data['sender_id'] =  $this->session->userdata('user_id');
        $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';
        
        $check = $this->db->select('*')->from('tbl_block')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();
        if(empty($check['interest_id'])){ $this->General_Model->AddRecord('tbl_block', $data); }else{

            $this->General_Model->DeleteData('tbl_block','interest_id',$check['interest_id'] );
        }
        echo 1; exit;

    }

    public function contact(){
        $data['sender_id'] =  $this->session->userdata('user_id');
        $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';
        
        $data['plan_id'] = $this->General_Model->current_planID($this->session->userdata('user_id'))['plan_id'];
        
        $check = $this->db->select('*')->from('tbl_contact_viewed')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();
        if(empty($check['contact_viewed_id'])){ 
            $this->General_Model->AddRecord('tbl_contact_viewed', $data);
        }
        else{
            $updatedata = array('updatedate' =>date('Y-m-d H:i:s'));
            $this->General_Model->UpdateData('tbl_contact_viewed','contact_viewed_id', $check['contact_viewed_id'] ,$updatedata);
        }
        echo 1; exit;
    }

    public function explore(){
        $this->load->view('explore');
    }


    function exploredatas(){ 

     $UserID = $this->session->userdata('user_id');
     $Details['sender_id'] = $UserID;

     $type = $this->input->post('type');

     $option = $this->input->post('option');


     if($type == 1 && $option == 1){

     $InterestExpressed =     $this->db->select('*')->from('tbl_interest')->where('receiver_id',$UserID)->get()->result();

     }else if($type == 2 && $option == 1){


    $InterestExpressed =     $this->db->select('*')->from('tbl_interest')->where('sender_id',$UserID)->get()->result();

     }

   //  print_r($InterestExpressed); exit;


    
        

     ?>

<div class="owl-stage-outer">



<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 721px;">

<?php  foreach ($InterestExpressed as $key ) { 

$UserID = $key->receiver_id;
$ProfileDetails = $this->General_Model->GetProfileDetails($UserID);

    ?>

<div class="owl-item active" style="width: 215.333px; margin-right: 25px;"><div class="item">
                                            <a href="#">
                                                <div class="proLstBox">
                                                    
 <?php if(empty($ProfileDetails['photo'])){ 
                                            if($ProfileDetails['gender']== 1){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                            else if($ProfileDetails['gender']== 2){ ?>
                                                <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">
                                            <?php }
                                     } 
                                     else{ ?>
                                            <img src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg">

                                     <?php } ?>


                                                    <div class="overlay"></div>
                                                    <div class="contentBox">
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="http://[::1]/nikah/assets/images/name.png" alt="name" class="profileico" width="auto" height="auto">
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <span class="proDtls"><?php echo $ProfileDetails['name'];?></span>
                                                                <span class="proDtls"><?php echo $ProfileDetails['age'];?> Yrs, <?php echo $key->height;?> cm</span>
                                                                <span class="proDtls">Accounting Professional</span>
                                                                <span class="proDtls">Muslim, <?php 
                                                if(!empty($ProfileDetails['user_caste']) && $ProfileDetails['user_caste'] !='NULL'){ 
                                                            echo ',';
                                                            echo $ProfileDetails['user_caste']; 
                                        }  ?></span>
                                                                <span class="proDtls">
                                                                    
                                                                     <?php 
                                                    if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL' && !empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){ 

                                                                echo $ProfileDetails['native_place']; 
                                                                echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }
                                                    else if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL'){ 
                                                                echo ',';
                                                                echo $ProfileDetails['native_place']; 
                                                    } 
                                                    else if(!empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL'){        echo ',';
                                                                echo $ProfileDetails['district']; 
                                                    }?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div></div>

<?php }  if(count($InterestExpressed) == 0){ ?>


<div class="tab-pane fade active show" id="pills-intrestSent" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="cmpltProfileBox">
                                        <img src="http://[::1]/nikah/assets/images/heart.png">
                                        <h3>Profile Visits</h3>
                                        <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>
                                    </div>
                                </div>
</div></div>


  <?php }

      }

    public function featured_profiles(){
        $offset = $_GET['offset'];
        if(empty($offset)){ $offset = ''; }
        $UserID = $this->session->userdata('user_id');
        $partner_preference = $this->General_Model->GetFullData($table = "tbl_otherdetails",'user_id',$UserID);
        $partner_preference = array_shift($partner_preference);
        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");
        $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);
        $Details['caste'] =(!empty($this->session->userdata('caste') && $this->session->userdata('caste')!= 'NULL') ? $this->session->userdata('caste') : '');
        $Details['religion'] = 2;
        $Details['AgeFrom'] = (!empty($partner_preference->partner_age_from) && $partner_preference->partner_age_from!= 'NULL' ? $partner_preference->partner_age_from : '');
        $Details['AgeTo'] = (!empty($partner_preference->partner_age_to) && $partner_preference->partner_age_to!= 'NULL' ? $partner_preference->partner_age_to : '');
        $Details['HeightFrom'] = (!empty($partner_preference->partner_height) && $partner_preference->partner_height != 'NULL'? $partner_preference->partner_height : '');
        $Details['HeightTo'] = (!empty($partner_preference->partner_height_to) && $partner_preference->partner_height_to != 'NULL'? $partner_preference->partner_height_to : '');
        $Details['PartnerEducation'] = (!empty($partner_preference->partner_education) && $partner_preference->partner_education != 'NULL'? $partner_preference->partner_education : '');
        $Details['financial_status'] = (!empty($partner_preference->partner_familytype) && $partner_preference->partner_familytype != 'NULL'? $partner_preference->partner_familytype : '');


        $data['MatchingProfiles'] = $this->General_Model->getmatchingprofiles($offset,$Details);
        $count = 1;
        $data['MatchingProfilesCount'] = $this->General_Model->getmatchingprofiles($offset,$Details,$count);
        $this->load->view('featured_profiles',$data);
    }

    public function change_password(){
        $this->load->view('change_password');
    }

    public function upgradeto_premium(){
         $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");
        $this->load->view('upgradeto_premium',$data);
    }

    public function likes(){
        $offset = $_GET['offset'];
        if(empty($offset)){ $offset = ''; }
        $UserID = $this->session->userdata('user_id');
        $Details['sender_id'] = $UserID;
        $data['liked_profiles'] = $this->General_Model->liked_profiles($offset,$Details);
        $count = 1;
        $data['liked_profilesCount'] = $this->General_Model->liked_profiles($offset,$Details,$count);
        $this->load->view('likes',$data);
    }

    public function interest_expressed(){
        $offset = $_GET['offset'];
        if(empty($offset)){ $offset = ''; }
        $UserID = $this->session->userdata('user_id');
        $Details['sender_id'] = $UserID;
        $data['InterestExpressed'] = $this->General_Model->interestexpressed($offset,$Details);
        $count = 1;
        
        $this->load->view('interest_expressed',$data);
    }



     public function uploadphoto(){ 
        $imagevalue = $this->input->post('imagevalue');
        $userid = $this->session->userdata('user_id');
        $picnum = $this->input->post('picnum');
        $type = $this->input->post('type');
        
        
        if($picnum >= 3){
          echo 0;
        }
        else{
             
          $imagenewname = $userid.mt_rand(1111,9999).date('Y-m-d').'.jpg';
          $base64img = str_replace('data:image/jpeg;base64,', '', $_POST['imagevalue']);
          $base64img = str_replace(' ', '+', $base64img);
          $data = base64_decode($base64img);
          $newfilename = 'assets/photo_storage/'.$imagenewname;
          file_put_contents($newfilename, $data);
          //watermark
          $watermarkImagePath = 'hn_wtrmark.png';
          $watermarkImg = imagecreatefrompng('assets/images/'.$watermarkImagePath); 
          $im = imagecreatefromjpeg('assets/photo_storage/'.$imagenewname);
          //blurring img
          $this->blur_images($imagenewname,$imagevalue);
          
          $marge_right = 10; 
          $marge_bottom = 280; 
           
          $sx = imagesx($watermarkImg); 
          $sy = imagesy($watermarkImg); 
          

          imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));
          imagepng($im, $newfilename); 
          imagedestroy($im);
              
          $uploaddata = array(
                    'user_id' => $userid,
                    'user_image' => $imagenewname
          );
          $this->General_Model->AddRecord('tbl_userimages',$uploaddata);
          if($picnum == 0){
              $data = array(
                      'photo' => $imagenewname
                      );
              $this->General_Model->UpdateData('tbl_registration','id',$userid,$data);
              
              $_SESSION['photo'] =  $imagenewname;
          }
          
          if($type == 1){
              
              echo base_url().'assets/photo_storage/'.$imagenewname;
              
          }else{
              
          echo '<div class="col-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="proUpldedImg">
                                    <img src="'.base_url().'assets/photo_storage/'.$imagenewname.'" alt="profile image" class="proImg">
                                </div>
                            </div>';
          }                  
                            
        }
    }
   
   public function blur_images($imagenewname,$imagevalue)
   {
        $base64img = str_replace('data:image/jpeg;base64,', '', $imagevalue);
        $base64img = str_replace(' ', '+', $base64img);
        $data = base64_decode($base64img);
        $newfilename = 'assets/photo_storage_blur/'.$imagenewname;
        file_put_contents($newfilename, $data);
        $watermarkImagePath = 'mask.png';
        $watermarkImg = imagecreatefrompng('assets/images/'.$watermarkImagePath); 
        $im = imagecreatefromjpeg('assets/photo_storage_blur/'.$imagenewname);
        
        for($i=0;$i<=100;$i++)
        {
            imagefilter($im, IMG_FILTER_GAUSSIAN_BLUR);
            
        }
        $marge_right = 0; 
        $marge_bottom = 0;
        $sx = imagesx($watermarkImg); 
        $sy = imagesy($watermarkImg);
        imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));
        
        imagejpeg($im, $newfilename);
        imagedestroy($im);
   }


   public function deleteprofilepic(){
        $image_id = $this->input->post('image_id');
        $this->General_Model->DeleteData('tbl_userimages','user_image_id',$image_id);
        
        $userid = $this->session->userdata('user_id');
        
        $check = $this->db->select('*')->from('tbl_userimages')->where('user_id',$userid)->get()->num_rows();
         
        if($check == 0){
        $data = array(
                      'photo' => ''
                      );
        $this->General_Model->UpdateData('tbl_registration','id',$userid,$data);
        $_SESSION['photo'] = '';
        }
        echo 1;
        
        
   }

   public function setprofilepic(){
        $image = $this->input->post('image');
        $userid = $this->session->userdata('user_id');
        $data = array(
                      'photo' => $image
                      );
        $this->General_Model->UpdateData('tbl_registration','id',$userid,$data);
        $_SESSION['photo'] = $image;
        // echo $this->db->last_query(); exit;
        echo '<img src="'.base_url().'assets/photo_storage/'.$image.'" alt="profile image" class="proImg" style="width:100%;">';
        
        
   }



   function interestaction(){

    $type = $this->input->post('type');

    $senderid = $this->input->post('senderid');

    $receiverid = $this->input->post('receiverid');


    $data = array('status'=>$type,'statusdate'=>date('Y-m-d'));
    

    $this->db->where('sender_id',$senderid);
    $this->db->where('receiver_id',$receiverid);
    $this->db->update('tbl_interest',$data);

    echo 1;
   }
   
   
   function changepassword(){
       
       $opassword = $this->input->post('opassword');
       
       $password = $this->input->post('password');
       
       $cpassword = $this->input->post('cpassword');
       
       $userid = $this->session->userdata('user_id');
       
       $check = $this->db->select('*')->from('tbl_userlogin')->where('user_id',$userid)->get()->row_array();
       
       
       if($check['password'] == md5($opassword)){
           
           
           
            if($cpassword == $password){
                
                
                $data = array('password'=>$password);
                $this->db->where('user_id',$userid);
                $this->db->update('tbl_userlogin',$data);
                $this->session->set_flashdata('sucess', 'This is test message');
                
            }else{
                
                $this->session->set_flashdata('pass_mismatch', 'This is test message');
                
                
            }
            
            
           
           
           
       }else{
           
           $this->session->set_flashdata('pass_mismatch_old', 'This is test message');
           
       }
       
        redirect('user/change_password');
       
   }
   
   public function submit_setting()
    {
        $user_id = $this->input->post('user_id');
        $data['photopassword'] = $this->input->post('photopassword');
        $data['showtoexpress'] = $this->input->post('showtoexpress');
        $data['showtopremium'] = $this->input->post('showtopremium');
        $data['photo_visibility'] = $this->input->post('photo_protection');

        $this->General_Model->UpdateData('tbl_registration','id',$user_id,$data);
        echo 1;
    }

    public function photorequest()
    {
        $data['sender_id'] = $this->session->userdata('user_id');
        $data['receiver_id'] = $this->input->post('receiver_id');
        $data['date'] = date('Y-m-d');
        $data['status'] = '0';

        $this->General_Model->AddRecord('tbl_photorequest',$data);
        echo 1;
    }
     public function logn()
            {
                // if(!empty($_SESSION['user_id'])){  redirect('user/home'); }
               // $data['homeprofiles'] = $this->General_Model->gethomeprofiles();
                $data['countryCode'] = $this->General_Model->fetch_countrycode();
                $_SESSION['reg_login']=1;
                $this->load->view('home2', $data);
                
            }
   
   

}
