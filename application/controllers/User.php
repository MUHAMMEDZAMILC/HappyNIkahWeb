<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use CodeIgniter\I18n\Time;

class User extends CI_Controller 

{

    function __construct() 

    {

        parent::__construct();

        $this->load->library('session');

        $this->load->helper('url');

        $this->load->library('email');

        $this->load->database();

        $this->load->model('General_Model');

        $this->load->library("pagination");

        $UserID = $this->session->userdata('user_id');

        //$regdata = $this->db->select('*')->from('tbl_registration')->where('id',$_SESSION['user_id'])->get()->row_array();

    }

    

    public function is_session_available()

    {

        if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']))

        {  



            if($_SESSION['userinfo']['stage'] == 1)

            {   

            // redirect('registration_step1?currentpage=1');  

            

             redirect('apps_store');  

            //header("location:".base_url()."user/registration_step1?currentpage=1");

            }

            else if($_SESSION['userinfo']['stage'] == 2)

            { 

            redirect('registration_steptwo?currentpage=1');  

            //  header("location:".base_url()."user/registration_steptwo?currentpage=1");

            }

            

            else if($_SESSION['userinfo']['stage'] == 3)

            { 

            redirect('registration_stepthree?currentpage=1');  

            //  header("location:".base_url()."user/registration_stepthree?currentpage=1");

            }

            

            else if($_SESSION['userinfo']['stage'] == 4)

            { 

            redirect('registration_stepfour?currentpage=1');  

            //header("location:".base_url()."user/registration_stepfour?currentpage=1");

            }

            else

            {

                

            } 

        }

    }

    

      public function is_session_available_gotonikah()

      {

        if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']))

        {  

            if($_SESSION['userinfo']['stage'] == 1)

            {   

            redirect('user/registration_step1_gotonikah?currentpage=1');  

            //header("location:".base_url()."user/registration_step1?currentpage=1");

            }

            else if($_SESSION['userinfo']['stage'] == 2)

            { 

            redirect('user/registration_steptwo_gotonikah?currentpage=1');  

            //  header("location:".base_url()."user/registration_steptwo?currentpage=1");

            }

            

            else if($_SESSION['userinfo']['stage'] == 3)

            { 

            redirect('user/registration_stepthree_gotonikah?currentpage=1');  

            //  header("location:".base_url()."user/registration_stepthree?currentpage=1");

            }

            

            else if($_SESSION['userinfo']['stage'] == 4)

            { 

            redirect('user/registration_stepfour_gotonikah?currentpage=1');  

            //header("location:".base_url()."user/registration_stepfour?currentpage=1");

            }

            else

            {

                

            } 

        }

    }

    

    public function imageiks()

    {

        $path="assets/photo_storage/1009748952022-12-01.jpg";

          $image = new Imagick($path);                  

                header('Content-type: image/jpeg');

                // Use blurImage function

                $image->blurImage(20, 10);

               

                $imagenewname = mt_rand(1111,9999).date('Y-m-d').'.jpg';

          

          $newfilename = 'assets/photo_storage/'.$imagenewname;

                file_put_contents($newfilename, $image);

                

                //watermark

                // Load the stamp and the photo to apply the watermark to

          $watermarkImagePath = 'mask.png';

          $watermarkImg = imagecreatefrompng('assets/images/'.$watermarkImagePath); 

          $im = imagecreatefromjpeg('assets/photo_storage/'.$imagenewname);

          // Set the margins for the stamp and get the height/width of the stamp image



          $marge_right = 10; 

          $marge_bottom = 280; 

           

          $sx = imagesx($watermarkImg); 

          $sy = imagesy($watermarkImg); 

          // Copy the stamp image onto our photo using the margin offsets and the photo 

// width to calculate positioning of the stamp. 



          imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));

          header('Content-type: image/jpeg');

          imagejpeg($im, $newfilename);

          echo $im;

          exit;

          // Output and free memory

          imagedestroy($im);

                 /* $imagenewname = $userid.mt_rand(1111,9999).date('Y-m-d').'.jpg';

          $base64img = str_replace('data:image/jpeg;base64,', '', $image);

          $base64img = str_replace(' ', '+', $base64img);

          $data = base64_decode($base64img);

          $newfilename = 'assets/photo_storage/'.$imagenewname;

          file_put_contents($newfilename, $data);

        

          //watermark

          $watermarkImagePath = 'hn_wtrmark.png';

          $watermarkImg = imagecreatefrompng('assets/images/'.$watermarkImagePath); 

          $im = imagecreatefromjpeg('assets/photo_storage/'.$imagenewname);

          

          $marge_right = 10; 

          $marge_bottom = 280; 

           

          $sx = imagesx($watermarkImg); 

          $sy = imagesy($watermarkImg); 

          



          imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));

          imagepng($im, $newfilename); 

          imagedestroy($im);*/

    }

    

    

     public function index1()

    { 

      $this->load->view('index1');

    }

    public function index()

    {          

        if(isset($_SESSION['user_id']) && !(isset($_SESSION['userinfo']['stage'])))

        { 

        redirect('home');  

        }

        $this->is_session_available();

        

        if ($this->uri->uri_string() == 'user' || $this->uri->uri_string() == 'index') 

        {

        redirect('/');

        }



        // if(!empty($_SESSION['user_id'])){  redirect('user/home'); }

        $data['homeprofiles'] =$this->General_Model->gethomeprofiles();

        $data['countryCode'] = $this->General_Model->fetch_countrycode();

        $this->load->view('index',$data);

    }

    

    public function indexnew()

    {          

    if(isset($_SESSION['user_id']) && !(isset($_SESSION['userinfo']['stage'])))

    { 

    redirect('user/home');  

    }

    $this->is_session_available();

    

    // if(!empty($_SESSION['user_id'])){  redirect('user/home'); }

    $data['homeprofiles'] =$this->General_Model->gethomeprofiles();

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    $this->load->view('indexnew',$data);

    }

    

    public function test()

    {

    $homeprofiles =$this->General_Model->gethomeprofilestest();

    print_r($homeprofiles);

    }

    

    public function privacy()

    {   

    $this->is_session_available();

    

    if ($this->uri->uri_string() == 'user/privacy') 

    {

    redirect('privacy');

    }

    

    $this->load->view('privacy');

    }

    

    public function about()

    {

        

    $this->is_session_available();

    if ($this->uri->uri_string() == 'user/about') 

    {

    redirect('about');

    }

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    $this->load->view("aboutus",$data);

    }

    

    public function about_us()

    {

    $this->is_session_available();

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    $this->load->view("aboutus_mobile",$data);

    }

    

    public function about_us_goto()

    {

     $this->is_session_available_gotonikah();

     $data['countryCode'] = $this->General_Model->fetch_countrycode();

     $this->load->view("about_us_goto",$data);

    }

    

    public function contactus()

    {

        $this->is_session_available();

        $data['countryCode'] = $this->General_Model->fetch_countrycode();

        $data['success'] = $this->session->flashdata('success');

        $data['failure'] = $this->session->flashdata('failure');

    

        if ($this->uri->uri_string() == 'user/contactus') 

        {

        redirect('contactus');

        }

    

        // redirect('contactus');

        $this->load->view("contactus",$data);

    }

    

    public function download()

    {

        $this->is_session_available();

        $data['countryCode'] = $this->General_Model->fetch_countrycode();

             

        if ($this->uri->uri_string() == 'user/download') 

        {

        redirect('download');

        }

        $this->load->view("download",$data);

    }

    

    public function refund_policy()

    {

        

        $data['countryCode'] = $this->General_Model->fetch_countrycode();

        $this->is_session_available();

        

        if ($this->uri->uri_string() == 'user/refund_policy') 

        {

        redirect('refund_policy');

        }

        

        $this->load->view("refund_policy",$data);

    }

     public function terms()

     {

        $data['countryCode'] = $this->General_Model->fetch_countrycode();

        $this->is_session_available();

        if ($this->uri->uri_string() == 'user/terms') 

        {

        redirect('terms');

        }

        $this->load->view("terms",$data);

    }

    

    public function terms_gotonikah()

     {

        $this->is_session_available_gotonikah();

        $this->load->view("terms_gotonikah");

    }

    

    public function registration_step1()

    { 

        if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['gotoback']) && $_GET['gotoback']==1 ))

        {

          

            $UserID = $this->session->userdata('user_id');

            $BasicDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

            $data['BasicDetails']= array_shift($BasicDetails);

            $data['maritalstatus']=$this->General_Model->GetFullData($table = "tbl_maritalstatus");

			$data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");

			$data['country'] = $this->General_Model->GetFullData($table = "tbl_country");

			$data['religion'] = $this->General_Model->GetFullData($table = "tbl_religion",'deleted','0');

			$data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");

            $_SESSION['userinfo']['stage']=1;  

            $this->load->view('registrationStep1',$data);

       }

      

          else if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['currentpage']) && $_GET['currentpage']==1))

          {  

              

            $UserID = $this->session->userdata('user_id');

            

            if($_SESSION['userinfo']['stage'] == 2)

            { 

            redirect('registration_steptwo?currentpage=1');  

            //  header("location:".base_url()."user/registration_steptwo?currentpage=1");

            }

            

            else if($_SESSION['userinfo']['stage'] == 3)

            { 

            redirect('registration_stepthree?currentpage=1');  

            //  header("location:".base_url()."user/registration_stepthree?currentpage=1");

            }

            

            else if($_SESSION['userinfo']['stage'] == 4)

            { 

            redirect('registration_stepfour?currentpage=1');  

            //header("location:".base_url()."user/registration_stepfour?currentpage=1");

            }

            

            else

            {

            $BasicDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

            $data['BasicDetails']= array_shift($BasicDetails);

            $data['maritalstatus']=$this->General_Model->GetFullData($table = "tbl_maritalstatus");

			$data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");

			$data['country'] = $this->General_Model->GetFullData($table = "tbl_country");

			$data['religion'] = $this->General_Model->GetFullData($table = "tbl_religion",'deleted','0');

			$data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");

            $_SESSION['userinfo']['stage']=1;  

            $this->load->view('registrationStep1',$data);

            }

              

          }

          

        else

        {

        redirect('user');

        }

    }



     public function registration_step1_gotonikah()

     { 

        if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['gotoback']) && $_GET['gotoback']==1 ))

        {

        $UserID = $this->session->userdata('user_id');

        $BasicDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

        $data['BasicDetails']= array_shift($BasicDetails);

        $data['maritalstatus']=$this->General_Model->GetFullData($table = "tbl_maritalstatus");

        $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");

        $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");

        $data['religion'] = $this->General_Model->GetFullData($table = "tbl_religion",'deleted','0');

        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");

        $_SESSION['userinfo']['stage']=1;  

        $this->load->view('registrationStep1_gotonikah',$data);

        }

      

        else if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['currentpage']) && $_GET['currentpage']==1))

        {  

        

        $UserID = $this->session->userdata('user_id');

        if($_SESSION['userinfo']['stage'] == 2)

        { 

        redirect('user/registration_steptwo_gotonikah?currentpage=1');  

        }

        

        else if($_SESSION['userinfo']['stage'] == 3)

        { 

        redirect('user/registration_stepthree_gotonikah?currentpage=1');  

        }

        else if($_SESSION['userinfo']['stage'] == 4)

        { 

        redirect('user/registration_stepfour_gotonikah?currentpage=1');  

        }

        else

        {

        

        $BasicDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

        $data['BasicDetails']= array_shift($BasicDetails);

        $data['maritalstatus']=$this->General_Model->GetFullData($table = "tbl_maritalstatus");

        $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");

        $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");

        $data['religion'] = $this->General_Model->GetFullData($table = "tbl_religion",'deleted','0');

        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");

        $_SESSION['userinfo']['stage']=1;  

        $this->load->view('registrationStep1_gotonikah',$data);

        }

        }

        else

        {

        redirect('user/gotonikah');

        }

    }

    

    public function register_user()

    {

      

        $BasicDetails['profile_for'] = strip_tags($this->input->post('created_by'));

        $BasicDetails['name'] = strip_tags($this->input->post('name'));

        $BasicDetails['countryCode'] = strip_tags($this->input->post('countryCode'));

        $BasicDetails['phone'] = strip_tags($this->input->post('phone'));

        $BasicDetails['mail'] = strip_tags($this->input->post('email'));

        $BasicDetails['age'] = $this->input->post('age');

        //$BasicDetails['home_country'] = $this->input->post('country');

        $BasicDetails['country'] = $this->input->post('country');

        $BasicDetails['state'] = $this->input->post('state');

        $BasicDetails['home_district'] = $this->input->post('home_district');

        $BasicDetails['gender'] = strip_tags($this->input->post('gender'));

        $BasicDetails['stage'] = 0;

        $BasicDetails['direct'] = "31";

        $BasicDetails['pending_status'] = "1";

        $BasicDetails['reg_date'] = date('Y-m-d');

        if($this->session->userdata('user_id'))

        $UserID = $this->session->userdata('user_id');

        else

        $UserID="";

        

       if(!empty($UserID))

        {

            $_SESSION['name'] = $BasicDetails['name'];

            $_SESSION['phone'] = $BasicDetails['phone'];

            $_SESSION['age'] = $BasicDetails['age'];

            $_SESSION['country']=$BasicDetails['country'];

            $_SESSION['state']=$BasicDetails['state'];

            $_SESSION['home_district']=$BasicDetails['home_district'];

            

            $exist = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

            if(!empty($exist))

            {



                if($BasicDetails['countryCode'] == '91')

                {

                $countryCode = $BasicDetails['countryCode'];

                }

                

                else

                {

                $countryCode = "+".$BasicDetails['countryCode'];

                }

                

                $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

                $_SESSION['stage']=0;

                $otpval['otp'] = $otp = rand(100000,999999);

                $otpval['user_id'] = $_SESSION['user_id'];

                $otpval['otp_time'] = date('Y-m-d H:i:s');

                $otpval['otp_from'] = "1";



                $this->General_Model->AddRecord('tbl_otp',$otpval);

                $mobilenumber = $countryCode.$BasicDetails['phone'];

                $this->smsotp($otp,$mobilenumber,$_SESSION['name']);

                echo "1";

            }

            else

            {



                //$_SESSION['mail'] = $BasicDetails['mail'];

                $_SESSION['name'] = $BasicDetails['name'];

                $_SESSION['phone'] = $BasicDetails['phone'];

                $_SESSION['age'] = $BasicDetails['age'];

                $_SESSION['country']=$BasicDetails['country'];

                $_SESSION['state']=$BasicDetails['state'];

                $_SESSION['home_district']=$BasicDetails['home_district'];

                $user_id = $this->General_Model->AddRecord('tbl_registration', $BasicDetails);

                $_SESSION['user_id'] =$user_id;

                

                $AlertDetails['user_id']=$user_id;

                $AlertDetails['alerts']="1,2,3";                

                $qry = $this->General_Model->AddRecord('tbl_user_alerts', $AlertDetails);    

                

                $log_data = array(

                'user_id' => $user_id);

                $this->db->insert('tbl_otherdetails',$log_data);

                

                $_SESSION['userinfo'] = $BasicDetails;

                

                $loginDetails['username'] = $_SESSION['phone'];

                $password = 'happy'.rand(10,10000);

                $loginDetails['password'] = md5($password);

                $loginDetails['originalpass'] = $password;

                $loginDetails['user_id'] = $_SESSION['user_id'];

                $loginDetails['date'] = date('Y-m-d');

                $happynikah_id = $this->General_Model->fetch_hnID($_SESSION['user_id'])['happynikah_id'];

               

                $this->General_Model->AddRecord('tbl_userlogin', $loginDetails);

            

                $otpval['otp'] = $otp = rand(100000,999999);

                $otpval['user_id'] = $_SESSION['user_id'];

                $otpval['otp_time'] = date('Y-m-d H:i:s');

                $otpval['otp_from'] = "1";



                $this->General_Model->AddRecord('tbl_otp',$otpval);

                $_SESSION['stage']=0;



                if($BasicDetails['countryCode'] == '91')

                {

                $countryCode = $BasicDetails['countryCode'];

                }

                else

                {

                $countryCode = "+".$BasicDetails['countryCode'];

                }

                $mobilenumber = $countryCode.$BasicDetails['phone'];

                $this->smsotp($otp,$mobilenumber,$_SESSION['name']);

                

                $msg1 =  'You have successfully initiated registration in happynikah.com. UserID:'.$happynikah_id.' Your OTP is:'.$otp.'.';

                $this->emailotp($msg1,$BasicDetails['mail']);

                

                echo "1";

            }

        }

        

        else

        {

            $checkexist = $this->db->select('*')->from('tbl_registration')->where('phone',$BasicDetails['phone'])->where('status!=','3')->get()->num_rows();

            $checkexist_other_number = $this->db->select('*')->from('tbl_registration')->where('other_contact_number',$BasicDetails['phone'])->where('status!=','3')->get()->num_rows();

            if($checkexist == 0 && $checkexist_other_number ==0)

            {



                $_SESSION['name'] = $BasicDetails['name'];

                $_SESSION['phone'] = $BasicDetails['phone'];

                $_SESSION['age'] = $BasicDetails['age'];

                $_SESSION['country']=$BasicDetails['country'];

                $_SESSION['state']=$BasicDetails['state'];

                $_SESSION['districts']=$BasicDetails['home_district'];

                $user_id = $this->General_Model->AddRecord('tbl_registration', $BasicDetails);

                $_SESSION['user_id'] =$user_id;

                $AlertDetails['user_id']=$user_id;

                $AlertDetails['alerts']="1,2,3";                

                $qry = $this->General_Model->AddRecord('tbl_user_alerts', $AlertDetails);

                

                $log_data = array('user_id' => $user_id,);

                $this->db->insert('tbl_otherdetails',$log_data);

                

               

                $_SESSION['stage']=0;

                $_SESSION['userinfo'] = $BasicDetails;

                

                $loginDetails['username'] = $_SESSION['phone'];

                $password = 'happy'.rand(10,10000);

                $loginDetails['password'] = md5($password);

                $loginDetails['originalpass'] = $password;

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

                

                

                if($BasicDetails['countryCode'] == '91')

                {

                $countryCode = $BasicDetails['countryCode'];

                }

                

                else

                {

                $countryCode = "+".$BasicDetails['countryCode'];

                }

                $mobilenumber = $countryCode.$BasicDetails['phone'];

                $this->smsotp($otp,$mobilenumber,$_SESSION['name']);

                

                $msg1 =  'You have successfully initiated registration in happynikah.com. UserID:'.$happynikah_id.' OTP:'.$otp.'.';

                $this->emailotp($msg1,$BasicDetails['mail']);

                

                if(isset($_SESSION['reg_login']) && $_SESSION['reg_login']==1)

                {

                $newdata = array(

                'register_id' =>$happynikah_id,

                'date' =>date('Y-m-d H:i:s'),

                'user_id' =>$_SESSION['user_id']

                );

                

                $this->General_Model->insertregdetail($newdata);

                $_SESSION['reg_login']=0;

                }

                

                echo "1";

            }

            else

            {

            echo "2";

            }

        }

       

    }

    

    

    public function register_user_gotonikah()

    {

      

        $BasicDetails['profile_for'] = strip_tags($this->input->post('created_by'));

        $BasicDetails['name'] = strip_tags($this->input->post('name'));

        $BasicDetails['countryCode'] = strip_tags($this->input->post('countryCode'));

        $BasicDetails['phone'] = strip_tags($this->input->post('phone'));

        $BasicDetails['mail'] = strip_tags($this->input->post('email'));

     

        $BasicDetails['age'] = $this->input->post('age');

        $BasicDetails['country'] = $this->input->post('country');

        $BasicDetails['state'] = $this->input->post('state');

        $BasicDetails['home_district'] = $this->input->post('home_district');

        $BasicDetails['gender'] = strip_tags($this->input->post('gender'));

        $BasicDetails['stage'] = 0;

        $BasicDetails['direct'] = "31";

        $BasicDetails['goto_nikah'] = "1";

        $BasicDetails['reg_date'] = date('Y-m-d');

        if($this->session->userdata('user_id'))

        $UserID = $this->session->userdata('user_id');

        else

        $UserID="";

        

       

        if(!empty($UserID))

        {

                $_SESSION['name'] = $BasicDetails['name'];

                $_SESSION['phone'] = $BasicDetails['phone'];

                $_SESSION['age'] = $BasicDetails['age'];

                $_SESSION['country']=$BasicDetails['country'];

                $_SESSION['state']=$BasicDetails['state'];

                $_SESSION['home_district']=$BasicDetails['home_district'];

               $exist = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

            if(!empty($exist))

            {



                 if($BasicDetails['countryCode'] == '91')

                {

                    $countryCode = $BasicDetails['countryCode'];

                }

                else

                {

                    $countryCode = "+".$BasicDetails['countryCode'];

                }

                $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

                $_SESSION['stage']=0;

                $otpval['otp'] = $otp = rand(100000,999999);

                $otpval['user_id'] = $_SESSION['user_id'];

                $otpval['otp_time'] = date('Y-m-d H:i:s');

                $otpval['otp_from'] = "1";



                $this->General_Model->AddRecord('tbl_otp',$otpval);

                $mobilenumber = $countryCode.$BasicDetails['phone'];

                $this->smsotp($otp,$mobilenumber,$_SESSION['name']);

                echo "1";

            }

            else

            {



                $_SESSION['name'] = $BasicDetails['name'];

                $_SESSION['phone'] = $BasicDetails['phone'];

                $_SESSION['age'] = $BasicDetails['age'];

                $_SESSION['country']=$BasicDetails['country'];

                $_SESSION['state']=$BasicDetails['state'];

                $_SESSION['home_district']=$BasicDetails['home_district'];

                $user_id = $this->General_Model->AddRecord('tbl_registration', $BasicDetails);

                $_SESSION['user_id'] =$user_id;

                

                $AlertDetails['user_id']=$user_id;

                $AlertDetails['alerts']="1,2,3";                

                $qry = $this->General_Model->AddRecord('tbl_user_alerts', $AlertDetails);    

                

                $log_data = array(

                'user_id' => $user_id);

                $this->db->insert('tbl_otherdetails',$log_data);

                

                $_SESSION['userinfo'] = $BasicDetails;

                

                $loginDetails['username'] = $_SESSION['phone'];

                $password = 'happy'.rand(10,10000);

                $loginDetails['password'] = md5($password);

                $loginDetails['originalpass'] = $password;

                $loginDetails['user_id'] = $_SESSION['user_id'];

                $loginDetails['date'] = date('Y-m-d');

                $happynikah_id = $this->General_Model->fetch_hnID($_SESSION['user_id'])['happynikah_id'];



                $this->General_Model->AddRecord('tbl_userlogin', $loginDetails);

              

             

                $otpval['otp'] = $otp = rand(100000,999999);

                $otpval['user_id'] = $_SESSION['user_id'];

                $otpval['otp_time'] = date('Y-m-d H:i:s');

                $otpval['otp_from'] = "1";



                $this->General_Model->AddRecord('tbl_otp',$otpval);

                $_SESSION['stage']=0;



                if($BasicDetails['countryCode'] == '91')

                {

                $countryCode = $BasicDetails['countryCode'];

                }

                else

                {

                $countryCode = "+".$BasicDetails['countryCode'];

                }

                $mobilenumber = $countryCode.$BasicDetails['phone'];

                $this->smsotp($otp,$mobilenumber,$_SESSION['name']);

                

                $msg1 =  'You have successfully initiated registration in happynikah.com. UserID:'.$happynikah_id.' Your OTP is:'.$otp.'.';

                $this->emailotp($msg1,$BasicDetails['mail']);

                 

                

                echo "1";

            }

        }

        else

        {

            $checkexist = $this->db->select('*')->from('tbl_registration')->where('phone',$BasicDetails['phone'])->where('status!=','3')->get()->num_rows();

            if($checkexist == 0)

            {



                //$_SESSION['mail'] = $BasicDetails['mail'];

                $_SESSION['name'] = $BasicDetails['name'];

                $_SESSION['phone'] = $BasicDetails['phone'];

                $_SESSION['age'] = $BasicDetails['age'];

                $_SESSION['country']=$BasicDetails['country'];

                $_SESSION['state']=$BasicDetails['state'];

                $_SESSION['districts']=$BasicDetails['home_district'];

                $user_id = $this->General_Model->AddRecord('tbl_registration', $BasicDetails);

                $_SESSION['user_id'] =$user_id;

                $AlertDetails['user_id']=$user_id;

                $AlertDetails['alerts']="1,2,3";                

                $qry = $this->General_Model->AddRecord('tbl_user_alerts', $AlertDetails);

                

                $log_data = array(

                'user_id' => $user_id,  

                );

                $this->db->insert('tbl_otherdetails',$log_data);

                

               

                $_SESSION['stage']=0;

                $_SESSION['userinfo'] = $BasicDetails;

                

                $loginDetails['username'] = $_SESSION['phone'];

                $password = 'happy'.rand(10,10000);

                $loginDetails['password'] = md5($password);

                $loginDetails['originalpass'] = $password;

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

                    $countryCode = $BasicDetails['countryCode'];

                }

                else

                {

                    $countryCode = "+".$BasicDetails['countryCode'];

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

      

                        $this->General_Model->insertregdetail($newdata);

                        $_SESSION['reg_login']=0;

                }

                

                echo "1";

            }

            else

            {

                

                echo "2";

            }

        }

    }

    

    

    public function emailotp($message1,$emailID)

    {

        $to_email = $emailID;

        $subject = 'Matrimony ID and OTP';

        $message = $message1;

        $headers = 'From: Happy Nikah <info@happynikah.com>';

        mail($to_email,$subject,$message,$headers);

    }

    

    public function send_feedback()

    {

        $to_email = "ligishaponnu@gmail.com";

        $subject = 'Happy Nikah User Feedback';

        $username=$this->input->post('name');

        $message=$this->input->post('message');

        $email=$this->input->post('email');

        $message = $message1;

        $headers = 'From: '.$username.' <'.$email.'>';

        mail($to_email,$subject,$message,$headers);

        redirect('user/feedback/1');



    }

    

    function smsotp($otp,$mobilenumber,$name)

    {

        

     $url = 'https://2factor.in/API/R1/?module=TRANS_SMS&apikey=7a8571c8-ed69-11ec-9c12-0200cd936042&to=' . $mobilenumber . '&from=SYSOLS&templatename=OTP+Template&var1=' . $otp . '&var2=' . $name . '&var3=happynikah.com';

      

    //   $url = 'https://2factor.in/API/V1/7a8571c8-ed69-11ec-9c12-0200cd936042/SMS/' . $mobilenumber . '/' . $otp . '/OTP+VERIFICATION';

    

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

            $BasicDetails['stage'] = 0;

            $_SESSION['userinfo']['stage']=1;  

            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

            

            echo '1';

        }

        else

        {

            echo '0';

        }

    }



        public function registration_steptwo()

        { 

        

        if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['gotoback']) && $_GET['gotoback']==2 ))

        {

        

        $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");

        $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 

        $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 

        $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 

        $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 

        $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 

        $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");

        $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");

        $data['professiontype'] = $this->General_Model->GetFullData($table = " tbl_professiontype");

        $data['profession'] = $this->General_Model->GetFullData($table = " tbl_profession");

        

        $UserID = $this->session->userdata('user_id');

        

        if(!empty($UserID))

        {

        $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

        foreach($ProfileDetails as $val)

        {

        $high_education=$val->highest_education;

        }

        

        $data['edu_data']=$this->General_Model->GetFullData($table = "tbl_education",$column="high_edu_id",$column_value=$high_education);

        $data['ProfileDetails'] = array_shift($ProfileDetails);

        $userimage = $this->General_Model->GetFullData($table = "tbl_userimages",'user_image_id',$UserID);

        $data['userimage'] = array_shift($userimage);

        $this->load->view('registrationStep2',$data);

        

        }

        }

        

        else if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['currentpage']) && $_GET['currentpage']==1))

        {  

        

        if($_SESSION['userinfo']['stage'] == 1)

        { 

        redirect('registration_step1?currentpage=1');  

        }

        

        else if($_SESSION['userinfo']['stage'] == 3)

        { 

        redirect('registration_stepthree?currentpage=1');  

        }

        

        else if($_SESSION['userinfo']['stage'] == 4)

        { 

        redirect('registration_stepfour?currentpage=1');  

        }

        

        else

        {

        // $this->is_session_available();

        $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");

        $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 

        $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 

        $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 

        $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 

        $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 

        $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");

        $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");

        $data['professiontype'] = $this->General_Model->GetFullData($table = " tbl_professiontype");

        $data['profession'] = $this->General_Model->GetFullData($table = " tbl_profession");

        

        $UserID = $this->session->userdata('user_id');

        

        if(!empty($UserID))

        {

        $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

        

        foreach($ProfileDetails as $val)

        {

        $high_education=$val->highest_education;

        }

        if($high_education!="")

        {

        $data['edu_data']=$this->General_Model->GetFullData($table = "tbl_education",$column="high_edu_id",$column_value=$high_education);

        }

        $data['ProfileDetails'] = array_shift($ProfileDetails);

        $userimage = $this->General_Model->GetFullData($table = "tbl_userimages",'user_image_id',$UserID);

        $data['userimage'] = array_shift($userimage);

        

        $this->load->view('registrationStep2',$data);

        }

        }

        }

        else

        {

        

        redirect(base_url('user'));

        }

        

        }

    

        public function registration_steptwo_gotonikah()

        { 

        

        if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['gotoback']) && $_GET['gotoback']==2 ))

        {

        

        $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");

        $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 

        $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 

        $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 

        $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 

        $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 

        $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");

        $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");

        $data['professiontype'] = $this->General_Model->GetFullData($table = " tbl_professiontype");

        $data['profession'] = $this->General_Model->GetFullData($table = " tbl_profession");

        

        $UserID = $this->session->userdata('user_id');

        if(!empty($UserID)){

        $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

        foreach($ProfileDetails as $val)

        {

        $high_education=$val->highest_education;

        }

        

        $data['edu_data']=$this->General_Model->GetFullData($table = "tbl_education",$column="high_edu_id",$column_value=$high_education);

        // print_r();

        $data['ProfileDetails'] = array_shift($ProfileDetails);

        $userimage = $this->General_Model->GetFullData($table = "tbl_userimages",'user_image_id',$UserID);

        $data['userimage'] = array_shift($userimage);

        $this->load->view('registrationStep2_gotonikah',$data);

        

        }

        }

        else if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['currentpage']) && $_GET['currentpage']==1)){  

        

        if($_SESSION['userinfo']['stage'] == 1){ 

        redirect('user/registration_step1_gotonikah?currentpage=1');  

        

        //  header("location:".base_url()."user/registration_steptwo?currentpage=1");

        

        }

        else if($_SESSION['userinfo']['stage'] == 3){ 

        redirect('user/registration_stepthree_gotonikah?currentpage=1');  

        

        //  header("location:".base_url()."user/registration_stepthree?currentpage=1");

        

        }

        else if($_SESSION['userinfo']['stage'] == 4){ 

        redirect('user/registration_stepfour_gotonikah?currentpage=1');  

        

        //header("location:".base_url()."user/registration_stepfour?currentpage=1");

        }

        else{

        // $this->is_session_available();

        $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");

        $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 

        $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 

        $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 

        $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 

        $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 

        $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");

        $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");

        $data['professiontype'] = $this->General_Model->GetFullData($table = " tbl_professiontype");

        $data['profession'] = $this->General_Model->GetFullData($table = " tbl_profession");

        

        $UserID = $this->session->userdata('user_id');

        if(!empty($UserID)){

        $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

        foreach($ProfileDetails as $val)

        {

        $high_education=$val->highest_education;

        }

        if($high_education!="")

        {

        $data['edu_data']=$this->General_Model->GetFullData($table = "tbl_education",$column="high_edu_id",$column_value=$high_education);

        }

        $data['ProfileDetails'] = array_shift($ProfileDetails);

        $userimage = $this->General_Model->GetFullData($table = "tbl_userimages",'user_image_id',$UserID);

        $data['userimage'] = array_shift($userimage);

        

        $this->load->view('registrationStep2_gotonikah',$data);

        }

        }

        }

        else

        {

        

        redirect(base_url('user/gotonikah'));

        }

        

        }

        

        public function register_basicinfo()

        {

        $UserID = $this->session->userdata('user_id');

        $name = $this->session->userdata('name');

        

        if(!empty($UserID))

        {

        

        $BasicDetails['marital_status'] = !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'NULL';

        $BasicDetails['no_of_children'] = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'';

        $BasicDetails['physical_status'] = !empty($this->input->post('physically_challenged'))?$this->input->post('physically_challenged'):'';

        $BasicDetails['registration_phychallenge'] =!empty($this->input->post('disability'))?$this->input->post('disability'):'';

        $BasicDetails['disability'] =!empty($this->input->post('disability'))?$this->input->post('physical_status'):'';

        $BasicDetails['nationality'] = !empty($this->input->post('nationality'))?$this->input->post('nationality'):'NULL';

        $BasicDetails['religion'] = 2;

        $BasicDetails['caste'] = !empty($this->input->post('belief'))?$this->input->post('belief'):'NULL';

        $BasicDetails['reg_date'] = date('Y-m-d');

        $BasicDetails['status'] = "0";

        $BasicDetails['reg_through'] = "0";

        $BasicDetails['direct'] = "31";

        $BasicDetails['stage'] = "1";

        $BasicDetails['dob'] = $this->input->post('dob');





        $from = new DateTime($this->input->post('dob'));

        $to   = new DateTime('today');

        $age= $from->diff($to)->y;

        $BasicDetails['age'] = $age;

        

        # procedural

        //echo date_diff(date_create('1970-02-01'), date_create('today'))->y;

        

        $this->General_Model->UpdateData('tbl_registration','id',$UserID ,$BasicDetails);

        $_SESSION['userinfo']['stage'] =2;

        

        redirect('registration_steptwo');

        

        }

        }

        

    

        public function register_basicinfo_gotonikah()

        {

        $UserID = $this->session->userdata('user_id');

        $name = $this->session->userdata('name');

        if(!empty($UserID)){

        

        $BasicDetails['marital_status'] = !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'NULL';

        $BasicDetails['no_of_children'] = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'';

        $BasicDetails['physical_status'] = !empty($this->input->post('physically_challenged'))?$this->input->post('physically_challenged'):'';

        $BasicDetails['registration_phychallenge'] =!empty($this->input->post('disability'))?$this->input->post('disability'):'';

        $BasicDetails['disability'] =!empty($this->input->post('disability'))?$this->input->post('physical_status'):'';

        $BasicDetails['nationality'] = !empty($this->input->post('nationality'))?$this->input->post('nationality'):'NULL';

        // $BasicDetails['blood_group'] = !empty($this->input->post('blood_group'))?$this->input->post('blood_group'):'NULL';

        $BasicDetails['religion'] = 2;

        $BasicDetails['caste'] = !empty($this->input->post('belief'))?$this->input->post('belief'):'NULL';

        $BasicDetails['reg_date'] = date('Y-m-d');

        $BasicDetails['status'] = "0";

        $BasicDetails['reg_through'] = "0";

        $BasicDetails['direct'] = "31";

        $BasicDetails['goto_nikah'] = "1";

        $BasicDetails['stage'] = "1";

        $BasicDetails['dob'] = $this->input->post('dob');

        // object oriented

        $from = new DateTime($this->input->post('dob'));

        $to   = new DateTime('today');

        $age= $from->diff($to)->y;

        $BasicDetails['age'] = $age;

        

        # procedural

        //echo date_diff(date_create('1970-02-01'), date_create('today'))->y;

        

        $this->General_Model->UpdateData('tbl_registration','id',$UserID ,$BasicDetails);

        

        $_SESSION['userinfo']['stage'] =2;

        

        redirect('user/registration_steptwo_gotonikah');

        

        }

        }

        

          public function register_personal_info()

          {

            $UserID = $this->session->userdata('user_id');

            

            $BasicDetails['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';

            $BasicDetails['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';

            $BasicDetails['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';

            $BasicDetails['mother_tongue'] = !empty($this->input->post('mothertongue'))?$this->input->post('mothertongue'):'NULL';

            $BasicDetails['highest_education'] = $this->input->post('highest_education');

            $BasicDetails['education'] = $this->input->post('education');

            $BasicDetails['job_category'] = $this->input->post('profession_type');

            $BasicDetails['occupation'] = $this->input->post('profession');

            $BasicDetails['appearance'] = $this->input->post('appearance');

            $BasicDetails['bodytype'] = $this->input->post('bodytype');



            $BasicDetails['stage'] = 2;

            

            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

            

            $_SESSION['userinfo']['stage'] =3;

            redirect('registration_stepthree');

    }

    

       public function register_personal_info_gotonikah()

        {

            $UserID = $this->session->userdata('user_id');

 

            $BasicDetails['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';

            $BasicDetails['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';

            $BasicDetails['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';

            $BasicDetails['mother_tongue'] = !empty($this->input->post('mothertongue'))?$this->input->post('mothertongue'):'NULL';

            $BasicDetails['highest_education'] = $this->input->post('highest_education');

            $BasicDetails['education'] = $this->input->post('education');

            $BasicDetails['job_category'] = $this->input->post('profession_type');

            $BasicDetails['occupation'] = $this->input->post('profession');

            $BasicDetails['appearance'] = $this->input->post('appearance');

            $BasicDetails['bodytype'] = $this->input->post('bodytype');





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

            

             $_SESSION['userinfo']['stage'] =3;

            redirect('user/registration_stepthree_gotonikah');

    }

    

    public function registration_stepthree()

    {

     

     if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['gotoback']) && $_GET['gotoback']==3 ))

     {

        $UserID = $this->session->userdata('user_id');

        $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

            

            foreach($ProfileDetails as $val)

            {

            $home_country=$val->home_country;

			$country=$val->country;

			$state=$val->state;

			$home_state=$val->home_state;

			}

			

			$data['homestates']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$home_country);

			$data['homedistricts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$home_state);

			$data['homecity']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$home_state);

			$data['country']=$this->General_Model->GetFullData($table = "tbl_country");

			$data['district']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state);

			$data['state']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$country);

			$data['city']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$state);

			$data['countryCode'] = $this->General_Model->fetch_countrycode();

            $data['ProfileDetails']= array_shift($ProfileDetails);

            $this->load->view('registrationStep3',$data);

       }

       

      else if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']))

      {  



        if($_SESSION['userinfo']['stage'] == 1)

        { 

        redirect('registration_step1?currentpage=1');  

        }

        

        else if($_SESSION['userinfo']['stage'] == 2)

        { 

        redirect('registration_steptwo?currentpage=1');  

        }

        

        else if($_SESSION['userinfo']['stage'] == 4)

        { 

        redirect('registration_stepfour?currentpage=1');  

        }

        

        else

        {

        $UserID = $this->session->userdata('user_id');

        $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

        foreach($ProfileDetails as $val)

        {

        $home_country=$val->home_country;

		$country=$val->country;

		$state=$val->state;

		$home_state=$val->home_state;

        }

        

	    $data['homestates']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$home_country);

		$data['homedistricts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$home_state);

		$data['homecity']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$home_state);

		$data['country']=$this->General_Model->GetFullData($table = "tbl_country");

		$data['district']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state);

		$data['state']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$country);

		$data['city']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$state);

		$data['countryCode'] = $this->General_Model->fetch_countrycode();

        $data['ProfileDetails']= array_shift($ProfileDetails);

        $this->load->view('registrationStep3',$data);

        }

        }

        else

        {

            redirect()->to(base_url());

        }

    }

    

     public function registration_stepthree_gotonikah()

     {

      // echo $_SESSION['userinfo']['stage'];

        //$this->is_session_available();

      if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']) && (isset($_GET['gotoback']) && $_GET['gotoback']==3 ))

       {

        $UserID = $this->session->userdata('user_id');

            $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

           foreach($ProfileDetails as $val)

                                {

            $home_country=$val->home_country;

			$country=$val->country;

			$state=$val->state;

			$home_state=$val->home_state;                                }

			$data['homestates']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$home_country);

			$data['homedistricts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$home_state);

			$data['homecity']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$home_state);

			$data['country']=$this->General_Model->GetFullData($table = "tbl_country");

			$data['district']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state);

			$data['state']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$country);

			$data['city']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$state);

			$data['countryCode'] = $this->General_Model->fetch_countrycode();

            $data['ProfileDetails']= array_shift($ProfileDetails);

            $this->load->view('registrationStep3',$data);

       }

       

      else if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']))

      {  



        if($_SESSION['userinfo']['stage'] == 1){ 

                                redirect('user/registration_step1_gotonikah?currentpage=1');  



              //  header("location:".base_url()."user/registration_steptwo?currentpage=1");



            }

            else if($_SESSION['userinfo']['stage'] == 2){ 

                                redirect('user/registration_steptwo_gotonikah?currentpage=1');  



              //  header("location:".base_url()."user/registration_stepthree?currentpage=1");



            }

            else if($_SESSION['userinfo']['stage'] == 4){ 

                                redirect('user/registration_stepfour_gotonikah?currentpage=1');  



                //header("location:".base_url()."user/registration_stepfour?currentpage=1");

            }

            else{

            $UserID = $this->session->userdata('user_id');

            $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

            foreach($ProfileDetails as $val)

            {

            $home_country=$val->home_country;

			$country=$val->country;

			$state=$val->state;

			$home_state=$val->home_state;

                

            }

            

		    $data['homestates']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$home_country);

			$data['homedistricts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$home_state);

			$data['homecity']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$home_state);

			$data['country']=$this->General_Model->GetFullData($table = "tbl_country");

			$data['district']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state);

			$data['state']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$country);

			$data['city']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$state);

			$data['countryCode'] = $this->General_Model->fetch_countrycode();

            $data['ProfileDetails']= array_shift($ProfileDetails);

            $this->load->view('registrationStep3_gotonikah',$data);

        }

      }

        else

        {

            redirect()->to(base_url('user/gotonikah'));

        }

    }

    

    

    public function register_location_info()

    {  

        $UserID = $this->session->userdata('user_id');

        if($this->input->post('select_same')==1)

        {

        $UserDetails['home_country'] = $this->input->post('country');

		$UserDetails['home_state'] = $this->input->post('states');

		$UserDetails['home_district'] =$this->input->post('districts');

		$UserDetails['home_city'] = $this->input->post('city');

        }

        else

        {

        $UserDetails['home_country'] = $this->input->post('present_country');

		$UserDetails['home_state'] = $this->input->post('present_states');

		$UserDetails['home_district'] =$this->input->post('present_district');

		$UserDetails['home_city'] = $this->input->post('present_city');    

        }

		$UserDetails['country'] = $this->input->post('country');

		$UserDetails['state'] = $this->input->post('states');

		$UserDetails['home_district'] = $this->input->post('districts');

		$UserDetails['native_place'] = $this->input->post('city');

		$UserDetails['mail'] = $this->input->post('email');

		$UserDetails['address'] = $this->input->post('address');

		$UserDetails['secondary_code'] = $this->input->post('secondary_code');

		$UserDetails['other_contact_number'] = $this->input->post('secondary_number');

        $UserDetails['stage'] = 3;

            

        $qry=$this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$UserDetails);

        $_SESSION['userinfo']['stage'] =4;

        redirect('registration_stepfour');

    }

    

    

     public function register_location_info_gotonikah()

    {  

        $UserID = $this->session->userdata('user_id');

        if($this->input->post('select_same')==1)

        {

        $UserDetails['home_country'] = $this->input->post('country');

		$UserDetails['home_state'] = $this->input->post('states');

		$UserDetails['home_district'] =$this->input->post('districts');

		$UserDetails['home_city'] = $this->input->post('city');

        }

        else

        {

        $UserDetails['home_country'] = $this->input->post('present_country');

		$UserDetails['home_state'] = $this->input->post('present_states');

		$UserDetails['home_district'] =$this->input->post('present_district');

		$UserDetails['home_city'] = $this->input->post('present_city');    

        }

		$UserDetails['country'] = $this->input->post('country');

		$UserDetails['state'] = $this->input->post('states');

		$UserDetails['home_district'] = $this->input->post('districts');

		$UserDetails['native_place'] = $this->input->post('city');

		$UserDetails['mail'] = $this->input->post('email');

		$UserDetails['address'] = $this->input->post('address');

		$UserDetails['secondary_code'] = $this->input->post('secondary_code');

		$UserDetails['other_contact_number'] = $this->input->post('secondary_number');

        $UserDetails['stage'] = 3;

            

            

         //print_r($UserDetails); exit;

         $qry=$this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$UserDetails);

         $_SESSION['userinfo']['stage'] =4;

         redirect('user/registration_stepfour_gotonikah');

    }

    

    public function register_profiledescription()

    {

        $UserID = $this->session->userdata('user_id');



        $BasicDetails['photo_visibility'] = !empty($this->input->post('picVisibltySelct'))?$this->input->post('picVisibltySelct'):'0';

        $name = $this->session->userdata('name');

        $age = $this->session->userdata('age');

        $about = "I'm ".$name.". I'm ".$age." Years old.Looking for good proposal..";   

        $BasicDetails['about'] = !empty($this->input->post('about'))?$this->input->post('about'):$about;

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



        $BasicDetails['stage'] = 4;

        $_SESSION['userinfo']['stage'] =5;



        $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

        $ImageDetails = $this->General_Model->get_profileimagedata($UserID);

        

        if($ImageDetails->num_rows()!=0)

        { 

        $imagedata=$ImageDetails->row();

        $imageid=$imagedata->user_image_id;

        $imageDetails['profile_pic'] = 1;

        

        $this->General_Model->UpdateData($table = 'tbl_userimages',$column_name = 'user_image_id',$imageid,$imageDetails);

        }



        $this->session->unset_userdata("userinfo");

        redirect('home');



    }

    

    public function register_profiledescription_gotonikah()

    {

        $UserID = $this->session->userdata('user_id');



        $BasicDetails['photo_visibility'] = !empty($this->input->post('picVisibltySelct'))?$this->input->post('picVisibltySelct'):'0';

        $name = $this->session->userdata('name');

        $age = $this->session->userdata('age');

        $about = "I'm ".$name.". I'm ".$age." Years old.Looking for good proposal..";   

        $BasicDetails['about'] = !empty($this->input->post('about'))?$this->input->post('about'):$about;

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

        



        $BasicDetails['stage'] = 4;

        $_SESSION['userinfo']['stage'] =5;

        

        

        // print_r($BasicDetails); exit;

        $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

        $ImageDetails = $this->General_Model->get_profileimagedata($UserID);

        if($ImageDetails->num_rows()!=0)

        { 

        $imagedata=$ImageDetails->row();

        $imageid=$imagedata->user_image_id;

        $imageDetails['profile_pic'] = 1;

        

        $this->General_Model->UpdateData($table = 'tbl_userimages',$column_name = 'user_image_id',$imageid,$imageDetails);

        }

        

        $this->session->unset_userdata("userinfo");

        redirect('user/home_gotonikah');



    }

    

    public function register_family_info()

    {  

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

        

        $BasicDetails['stage'] = 3;

        $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

        $_SESSION['userinfo']['stage'] =3;

        redirect('registration_stepfour');



    }

    

    public function registration_stepfour()

    {

        

    if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']))

    {  

    

    if($_SESSION['userinfo']['stage'] == 1)

    { 

    redirect('registration_step1?currentpage=1');  

    }

    

    else if($_SESSION['userinfo']['stage'] == 2)

    { 

    redirect('registration_steptwo?currentpage=1');  

    }

    

    else if($_SESSION['userinfo']['stage'] == 3)

    { 

    redirect('registration_stepthree?currentpage=1');  

    }

    

    else

    {

    $UserID = $this->session->userdata('user_id');

    $name = $this->session->userdata('name');

    $age = $this->session->userdata('age');

    $data['uabout'] = "I'm ".$name.". I'm ".$age." Years old.Looking for good proposal.."; 

    $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

    $data['ProfileDetails'] = array_shift($ProfileDetails);

    $userimage = $this->General_Model->GetFullData($table = "tbl_userimages",'user_image_id',$UserID);

    $data['userimage'] = array_shift($userimage);

    $this->load->view('registrationStep4',$data);

    }

    

    }

    else

    {

    redirect()->to(base_url());

    }

    }

        

    public function registration_stepfour_gotonikah()

    {

    if(isset($_SESSION['user_id']) && isset($_SESSION['userinfo']['stage']))

    {  

    

    if($_SESSION['userinfo']['stage'] == 1)

    { 

    redirect('user/registration_step1_gotonikah?currentpage=1');  

    }

    

    else if($_SESSION['userinfo']['stage'] == 2)

    { 

    redirect('user/registration_steptwo_gotonikah?currentpage=1');  

    }

    

    else if($_SESSION['userinfo']['stage'] == 3)

    { 

    redirect('user/registration_stepthree_gotonikah?currentpage=1');  

    }

    

    else

    {

    $UserID = $this->session->userdata('user_id');

    $name = $this->session->userdata('name');

    $age = $this->session->userdata('age');

    $data['uabout'] = "I'm ".$name.". I'm ".$age." Years old.Looking for good proposal.."; 

    $ProfileDetails = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);

    $data['ProfileDetails'] = array_shift($ProfileDetails);

    $userimage = $this->General_Model->GetFullData($table = "tbl_userimages",'user_image_id',$UserID);

    $data['userimage'] = array_shift($userimage);

    $this->load->view('registrationStep4_gotonikah',$data);

    }

    

    }

    else

    {

    redirect()->to(base_url('user/gotonikah'));

    }

    }



    public function create_password()

    { 

    $set_password = $this->input->post('set_password');

    $confirm_password = $this->input->post('confirm_password');

    if(!$_SESSION['user_id'])

    {

    redirect()->to(base_url());

    }

    if($set_password != $confirm_password)

    {

    redirect("user/congratulations/1");

    }

    else

    {

    

    $loginDetails['username'] = $_SESSION['phone'];

    $password = $set_password;

    $loginDetails['password'] = md5($password);

    

    //  $loginDetails['originalpass'] = $password;

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

    

    $this->db->select('u.*,r.*');

    $this->db->from('tbl_userlogin u');

    $this->db->join('tbl_registration r','r.id = u.user_id','left');

    $this->db->where('r.id',$_SESSION['user_id']);

    $query = $this->db->get();

    $res = $query->row_array();

    

    if($query != 'failure')

    {

    $_SESSION['user_id'] = $res['user_id'];

    $_SESSION['name'] = $res['name'];

    $_SESSION['gender'] = $res['gender'];

    $_SESSION['religion'] = $res['religion'];

    $_SESSION['caste'] = $res['caste'];

    $_SESSION['age'] = $res['age'];

    $_SESSION['status'] = $res['status'];

    $_SESSION['photo'] = $res['photo'];

    $_SESSION['dob'] = $res['dob'];

    

    if($res['stage']==0)

    // redirect('registration_step1?currentpage=1');  

    // redirect('apps_download'); 

    redirect('apps_store'); 

    

    elseif($res['stage']==1)

    redirect('registration_steptwo?currentpage=1'); 

    

    elseif($res['stage']==2)

    redirect('registration_stepthree?currentpage=1');  

    

    elseif($res['stage']==3)

    redirect('registration_stepfour?currentpage=1'); 

    

    elseif($res['stage']==4)

    redirect('home');  

    

    }

    }

    }



    public function create_password_gotonikah()

    { 

    $set_password = $this->input->post('set_password');

    $confirm_password = $this->input->post('confirm_password');

    if(!$_SESSION['user_id'])

    {

    redirect()->to(base_url('user/gotonikah'));

    }

    if($set_password != $confirm_password)

    {

    redirect("user/congratulations_gotonikah/1");

    }

    else

    {

    

    $loginDetails['username'] = $_SESSION['phone'];

    $password = $set_password;

    $loginDetails['password'] = md5($password);

    //  $loginDetails['originalpass'] = $password;

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

    /* echo $_SESSION['user_id'];

    print_r($loginDetails);

    exit;*/

    $this->General_Model->UpdateData('tbl_userlogin',$column_name = 'user_id',$_SESSION['user_id'],$loginDetails);

    }

    

    $this->db->select('u.*,r.*');

    $this->db->from('tbl_userlogin u');

    $this->db->join('tbl_registration r','r.id = u.user_id','left');

    $this->db->where('r.id',$_SESSION['user_id']);

    $query = $this->db->get();

    $res = $query->row_array();

    

    if($query != 'failure')

    {

    $_SESSION['user_id'] = $res['user_id'];

    $_SESSION['name'] = $res['name'];

    $_SESSION['gender'] = $res['gender'];

    $_SESSION['religion'] = $res['religion'];

    $_SESSION['caste'] = $res['caste'];

    $_SESSION['age'] = $res['age'];

    $_SESSION['status'] = $res['status'];

    $_SESSION['photo'] = $res['photo'];

    $_SESSION['dob'] = $res['dob'];

    if($res['stage']==0)

    redirect('user/registration_step1_gotonikah?currentpage=1');  

    elseif($res['stage']==1)

    redirect('user/registration_steptwo_gotonikah?currentpage=1');  

    elseif($res['stage']==2)

    redirect('user/registration_stepthree_gotonikah?currentpage=1');  

    elseif($res['stage']==3)

    redirect('user/registration_stepfour_gotonikah?currentpage=1');  

    elseif($res['stage']==4)

    redirect('user/home_gotonikah');  

    

    }

    }

    }



    public function admintohome($UserID)

    {

    if($UserID!= 'failure')

    {



    $UserDetails= $this->db->select('*')->from('tbl_registration')->where('id',$UserID)->get()->row();

      

    $user_id=$UserDetails->id;

    $name=$UserDetails->name;   

    $gender=$UserDetails->gender;

    $phone=$UserDetails->phone;

    $religion=$UserDetails->religion;

    $caste= $UserDetails->caste;

    $age=$UserDetails->age;

    $status=$UserDetails->status;

    $height=$UserDetails->height;

    $weight=$UserDetails->weight;

    $native_place=$UserDetails->native_place;

    $education=$UserDetails->education;



     $_SESSION['user_id']= $user_id;

     $_SESSION['name'] = $name;

     $_SESSION['gender'] = $gender;

     $_SESSION['religion'] = $religion;

     $_SESSION['caste'] = $caste;

     $_SESSION['age'] = $age;

     $_SESSION['status'] = $status;

     $_SESSION['height']= $height;

     $_SESSION['weight']=$weight;

     $_SESSION['phone']=$phone;

     $_SESSION['native_place']=$native_place;

     $_SESSION['education']=$education;

     $this->load->view('home');

    }



  }



    public function congratulations($sts=0)

    {

    

    $userID =  $this->session->userdata('user_id');

    

    if(!empty($userID))

    {

    $data['userdetails'] = $this->General_Model->get_loginuser($userID);

    $data['errormessage']=$sts;

    // $this->load->view('congratulations',$data);

    }

    else

    {

    redirect()->to(base_url());

    }

    

    if($this->uri->uri_string() == 'user/congratulations')

    {

    redirect('congratulations');

    }

    

    $this->load->view('congratulations',$data);

    }

    

    public function congratulations_gotonikah($sts=0)

    {

        

      $userID =  $this->session->userdata('user_id');

        

        if(!empty($userID))

        {

            $data['userdetails'] = $this->General_Model->get_loginuser($userID);

            $data['errormessage']=$sts;

            $this->load->view('congratulations_gotonikah',$data);

        }

        else

        {

            redirect()->to(base_url());

        }

         

           // $this->session->sess_destroy();

        // $this->load->view('congratulations_gotonikah',$data);

    }

    

    public function goto_success()

    {

    redirect('user/congratulations');

    }

    

    public function GetHeight()

    { 

        

    $HeightFrom = $this->input->post('HeightFrom');

    $result = $this->General_Model->GetFullData('tbl_height','',$HeightFrom);

    

    if ($result != "") 

    {

    $data1 = '<option value="">Select</option>';

    

    for ($i = 0; $i < count($result); $i++) 

    {

    $data = '<option value = "' . $result[$i]->height_id . '" textvalue="' . $result[$i]->height . '">' . $result[$i]->height . '</option>';

    

    if (empty($i)) 

    {

    print_r($data1);

    }

    print_r($data);

    }

    }

   }



    public function login()

    {


    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');

    $user = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $res = $this->General_Model->login($user, $password);



    if($res != '')
    {

    $res1 = $this->General_Model->update_is_login($res['user_id'],"1");

    $this->General_Model->update_login_status($res['user_id'],
        'success');
    

    $_SESSION['user_id'] = $res['user_id'];

    $_SESSION['name'] = $res['name'];

    $_SESSION['gender'] = $res['gender'];

    $_SESSION['religion'] = $res['religion'];

    $_SESSION['caste'] = $res['caste'];

    $_SESSION['age'] = $res['age'];

    $_SESSION['status'] = $res['status'];

    $_SESSION['photo'] = $res['photo'];

    $_SESSION['phone'] = $res['phone'];

    $_SESSION['photo'] = $res['photo'];

    $_SESSION['dob'] = $res['dob'];

    $_SESSION['mail'] = $res['mail'];

    $_SESSION['reg_id'] = $res['happynikah_id'];

    $_SESSION['userinfo']['stage'] = $res['stage'];

    

    if($res['stage']==1)

    echo "1";

    elseif($res['stage']==2)

    echo "2";

    elseif($res['stage']==3)

    echo "3";

    elseif($res['stage']==4)

    echo "4";

    else

    echo "5";

    }

    else

    {

     $this->General_Model->update_login_status($res['user_id'],
        'failure');

    echo "6";


    }

    

    }

    

    public function user_otplogin()

    {

    $code = $this->input->post('code');

    $mobile = $this->input->post('mobile');

    $res = $this->General_Model->check_existinguser($code, $mobile);

    

    if($res->num_rows()!=0)

    {

    $userdata=$res->row();

    $otpval['otp'] = $otp = rand(100000,999999);

    $otpval['user_id'] = $userdata->id;

    $otpval['otp_time'] = date('Y-m-d H:i:s');

    $otpval['otp_from'] = "3";

    $_SESSION['usrid'] = $userdata->id;

    $_SESSION['usrname'] = $userdata->name;

    $this->General_Model->AddRecord('tbl_otp',$otpval);

    

    if($BasicDetails['countryCode'] == '91')

    {

    $countryCode == $code;

    }

    

    else

    {

    $countryCode == "+".$code;

    }

    $mobilenumber = $countryCode.$mobile;

    $_SESSION['otp_phone'] = $mobilenumber;

    if($this->smsotp($otp,$mobilenumber,$userdata->name))

    {

    

    echo "1";

    }

    

    else

    {

    echo "2";

    }

    }

    else

    {

    echo "3";

    }

    

    }



    public function resend_otp()

    {

    $user=$_SESSION['usrid'];

    $phone=$_SESSION['otp_phone'];

    $name=$_SESSION['user_name'];

    if($user!="" && $phone!="")

    {

    $otpval['otp'] = $otp = rand(100000,999999);

    $otpval['user_id'] = $user;

    $otpval['otp_time'] = date('Y-m-d H:i:s');

    $otpval['otp_from'] = "3";

    $this->General_Model->AddRecord('tbl_otp',$otpval);

    

    if($BasicDetails['countryCode'] == '91')

    {

    $countryCode == $code;

    }

    

    else

    {

    $countryCode == "+".$code;

    }

    $mobilenumber = $countryCode.$mobile;

    $this->smsotp($otp,$mobilenumber,$name);

    echo 1;

    }

    

    else

    {

    echo 2;

    }

    }



    public function logout() 

    {

    $userID =  $this->session->userdata('user_id');

    $this->session->unset_userdata('user_id');

    $this->session->unset_userdata("name");

    $this->session->unset_userdata("gender");

    $this->session->unset_userdata("religion");

    $this->session->unset_userdata("caste");

    $this->session->unset_userdata("age");

    $this->session->unset_userdata("status");

    $this->session->unset_userdata("photo");

    $res1 = $this->General_Model->update_is_login($userID,"0");

    if($res1)

    redirect('/');

    }



    public function logout_gotonikah() 

    {

        

    $userID =  $this->session->userdata('user_id');

    $this->session->unset_userdata('user_id');

    $this->session->unset_userdata("name");

    $this->session->unset_userdata("gender");

    $this->session->unset_userdata("religion");

    $this->session->unset_userdata("caste");

    $this->session->unset_userdata("age");

    $this->session->unset_userdata("status");

    $this->session->unset_userdata("photo");

    $res1 = $this->General_Model->update_is_login($userID,"0");

    

    if($res1)

    redirect('user/gotonikah');

    }

    

    public function home()
    {   

    session_start();

    if(empty($_SESSION['user_id']))

    { 

    redirect('user'); 
    }

    if($this->uri->uri_string() == 'user/home') 
    {
    redirect('home');
    }
  

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    else

    $offset ="";

    

    if(empty($offset))

    { 

    $offset = ''; 

    }

    

    $UserID = $this->session->userdata('user_id');

    

    if($_SESSION['gender'] == 1)

    {

    if($_SESSION['dob']!="")

    {

    $dob_date = new DateTime($_SESSION['dob']);

    $today_date = new Datetime(date('Y-m-d'));

    $diff = $today_date->diff($dob_date);

    $user_age = 18;

    $ageto = $diff->y;

    }

    else

    {

    $user_age = 18;

    $ageto = $_SESSION['age'];

    }

    }

    else

    {

    if($_SESSION['dob']!="")

    {

    $dob_date = new DateTime($_SESSION['dob']);

    $today_date = new Datetime(date('Y-m-d'));

    $diff = $today_date->diff($dob_date);

    $user_age = $diff->y;

    $ageto = $user_age+10;

    }

    else

    {

    $user_age = $_SESSION['age'];

    $ageto = $user_age+10;

    }

    }

    

    $Details['AgeFrom'] = $user_age;

    $Details['AgeTo'] = $ageto;

    $partner_preference = $this->General_Model->GetFullData($table = "tbl_otherdetails",'user_id',$UserID);

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    $partner_preference = array_shift($partner_preference);

    

    $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");

    $Details['sender_id'] = $UserID;

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $Details['caste'] =(!empty($this->session->userdata('caste') && $this->session->userdata('caste')!= 'NULL') ? $this->session->userdata('caste') : '');

    $Details['religion'] = 2;

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    

    $Details['HeightFrom'] = (!empty($partner_preference->partner_height) && $partner_preference->partner_height != 'NULL'? $partner_preference->partner_height : '');

    $Details['HeightTo'] = (!empty($partner_preference->partner_height_to) && $partner_preference->partner_height_to != 'NULL'? $partner_preference->partner_height_to : '');

    $familytype = (!empty($partner_preference->partner_familytype) && $partner_preference->partner_familytype != 'NULL'? $partner_preference->partner_familytype : '');

    $data['familytype']=explode(",",$familytype);

    $ignoredids=array();

    

    foreach ($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    foreach ($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    

    $Details['blocked_profiles']=$blockedids;

    $Details['family_type']=explode(",",$familytype);

    

    $config = array();

    $config["base_url"] = base_url() . "home";

    $config["total_rows"] = $this->General_Model->getmatchingprofilesHome('',$Details,1);

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 2;

    

    $this->pagination->initialize($config);      

    $page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;

    $data["links"] = $this->pagination->create_links();     

    $MatchingProfiles = $this->General_Model->getmatchingprofilesHome($page,$Details);

    $data['MatchingProfiles']=$MatchingProfiles;

    $count = 1;

    

    $data['InterestExpressedCount'] = $this->General_Model->interestexpressed($offset,$Details,$count);

    $data['liked_profilesCount'] = $this->General_Model->liked_profiles($offset,$Details,$count);

    

    $data['pic']=$this->General_Model->GetProfileDetails($this->session->userdata('user_id'))['photo'];

    $this->load->view('home',$data);

    }

    

    public function apps_list()

    {

    $data['homeprofiles'] =$this->General_Model->gethomeprofiles();

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    

    $this->load->view('apps_list',$data);

    }

    

    public function profile()

    {

    $UserID = $this->session->userdata('user_id');

    $data['user_id']=$UserID;

    

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    if ($this->uri->uri_string() == 'user/profile')

    {

    redirect('profile');

    }

    

    $ProfileDetails = $this->General_Model->GetProfileDetails($UserID);

    $data['ProfileDetails']=$ProfileDetails;

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    $name=$ProfileDetails['name'];

    

    $high_education=$ProfileDetails['highest_education'];

    $home_country=$ProfileDetails['home_country'];

    $country=$ProfileDetails['country'];

    $state=$ProfileDetails['present_state'];

    $state2=$ProfileDetails['state'];

    

    $native_district=$ProfileDetails['native_district'];

    $home_state=$ProfileDetails['home_state'];

    $home_district=$ProfileDetails['home_district'];

    $partner_country=$ProfileDetails['partner_country'];

    $partner_state=$ProfileDetails['partner_state'];

    

    $data['homestates']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$home_country);

    $data['homedistricts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state2);

    $data['homecity']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$home_district);

    $data['country']=$this->General_Model->GetFullData($table = "tbl_country");

    $data['states']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$country);

    $data['districts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state);

    

    if($partner_country!="")

    $data['partner_states']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$partner_country);

    

    if($partner_state!="")

    $data['partner_district']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$partner_state);

    

    $data['city']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$native_district);

    $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");

    $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 

    $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");

    $data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");

    $data['district'] = $this->General_Model->GetFullData($table = "tbl_district");

    $data['state'] = $this->General_Model->GetFullData($table = "tbl_states");

    $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");

    $data['professiontype'] = $this->General_Model->GetFullData($table = "tbl_professiontype");

    $data['profession'] = $this->General_Model->GetFullData($table = "tbl_profession");

    $data['income'] = $this->General_Model->GetFullData($table = "tbl_professional_income");

    $data['images'] = $this->General_Model->GetFullData('tbl_userimages','user_id',$UserID);

    $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");

    $data['edu_data']=$this->General_Model->GetFullData($table = "tbl_education",$column="high_edu_id",$column_value=$high_education);

    $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");

    $data['education'] = $this->General_Model->GetFullData($table = "tbl_education");

    $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 

    $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 

    $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 

    $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 

    $data['familytype'] = $this->General_Model->GetFullData($table = "tbl_familytype"); 

    $data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus"); 

    $data['maritalstatus']=$this->General_Model->GetFullData($table = "tbl_maritalstatus");

    $data['hometype'] = $this->General_Model->GetFullData($table = "tbl_hometype"); 

    $OtherDetails=$this->General_Model->GetOtherDetails($UserID);

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    $data['madrassa_education'] = $this->General_Model->GetFullData($table = "tbl_madrassa_education");

    $data['OtherDetails']=$OtherDetails;

    $this->load->view('profile',$data);

    }



    public function update_about_old()

    {

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID))

    { 

    redirect('user/logout');

    

    }

    

    $name = $this->session->userdata('name');

    $age = $this->session->userdata('age');

    

    $about = "I'm ".$name.". I'm ".$age." Years old.Looking for good proposal..";

    $BasicDetails['about'] = !empty($this->input->post('about'))?$this->input->post('about'):$about;

    $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

    

    redirect('user/profile');

    }

     

    public function update_about()

    {

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    $name = $this->session->userdata('name');

    $age = $this->session->userdata('age');

    

    $about = "I'm ".$name.". I'm ".$age." Years old.Looking for good proposal..";

    $current_data = $this->General_Model->getData('tbl_registration', 'id', $UserID);

    

    $updated_columns = array();

    

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $BasicDetails);

    

    

    $about2 = !empty($this->input->post('about'))?$this->input->post('about'):$about;

    if($about2 !== $current_data['about']) 

    {

    $updated_columns['about'] = $about2;

    }

    

    if(!empty($updated_columns))

    {

    $this->General_Model->insert_update_logs($UserID, $updated_columns);

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $updated_columns);

    }

    

    redirect('user/profile');

    }



    public function update_basic_info()

    {

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID)) 

    {

    redirect('logout');

    }



    $updated_columns = array();

    $current_data = $this->General_Model->getData('tbl_registration', 'id', $UserID);



    $profile_for = $this->input->post('profile_for');

    if ($profile_for !== $current_data['profile_for']) 

    {

    $updated_columns['profile_for'] = $profile_for;

    }



    $uname = $this->input->post('name');

    if($uname !== $current_data['name']) 

    {

    $updated_columns['name'] = $uname;

    }



    $mail = $this->input->post('mail');

    if($mail !== $current_data['mail']) 

    {

    $updated_columns['mail'] = $mail;

    }

    

    $marital_status =  !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'NULL';

    if($marital_status !== $current_data['marital_status']) 

    {

    $updated_columns['marital_status'] = $marital_status;

    }

    

    $physical_status = $this->input->post('physically_challenged');

    if($physical_status !== $current_data['physical_status']) 

    {

    $updated_columns['physical_status'] = $physical_status;

    }

    

    $no_of_children = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'';

    if($no_of_children !== $current_data['no_of_children']) 

    {

    $updated_columns['no_of_children'] = $no_of_children;

    }

    

    $disability = $this->input->post('disability');

    if($disability !== $current_data['registration_phychallenge']) 

    {

    $updated_columns['registration_phychallenge'] = $disability;

    }

    

    $disability2 = $this->input->post('physical_status');

    if($disability2 !== $current_data['disability']) 

    {

    $updated_columns['disability'] = $disability2;

    }

    

    $nationality = $this->input->post('nationality');

    if($nationality !== $current_data['nationality']) 

    {

    $updated_columns['nationality'] = $nationality;

    }

    

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $BasicDetails);

    $_SESSION['name']=$uname;

     

    if (!empty($updated_columns))

    {

       

    $this->General_Model->insert_update_logs($UserID, $updated_columns);

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $updated_columns);

    }

    

    redirect('user/profile');

   }





    public function update_basic_info_old()

    {

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID))

    { 

    redirect('user/logout');

    

    }

    

    $BasicDetails['no_of_children'] = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'';

    $BasicDetails['profile_for'] = $this->input->post('profile_for');

    $uname = $this->input->post('name');

    $BasicDetails['name'] = $uname;

    $BasicDetails['mail'] = $this->input->post('mail');

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $BasicDetails['marital_status'] = !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'NULL';

    $BasicDetails['physical_status'] = $this->input->post('physically_challenged');

    $BasicDetails['registration_phychallenge'] =$this->input->post('disability');

    $BasicDetails['disability'] =$this->input->post('physical_status');

    $BasicDetails['nationality'] =$this->input->post('nationality');



    $updated_columns=$this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

    

    $_SESSION['name']=$uname;

    redirect('user/profile');

    }



    public function update_religious_info_old()

    {

    

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('user/logout');

    }

    

    $BasicDetails['caste'] = !empty($this->input->post('user_caste'))?$this->input->post('user_caste'):'NULL';

    $BasicDetails['madrassa_education'] = !empty($this->input->post('madrassa_education'))?$this->input->post('madrassa_education'):'NULL';

    $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

    

    redirect('user/profile');

    }

    

    public function update_religious_info()

    {

    

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    $updated_columns = array();

    $current_data = $this->General_Model->getData('tbl_registration', 'id', $UserID);

    

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $BasicDetails);

    

    $caste = !empty($this->input->post('user_caste'))?$this->input->post('user_caste'):'NULL';

    if ($caste !== $current_data['caste']) 

    {

    $updated_columns['caste'] = $caste;

    }

    

    $madrassa_education = !empty($this->input->post('madrassa_education'))?$this->input->post('madrassa_education'):'NULL';

    if($madrassa_education !== $current_data['madrassa_education']) 

    {

    $updated_columns['madrassa_education'] = $madrassa_education;

    }

    

    if(!empty($updated_columns))

    {

    $this->General_Model->insert_update_logs($UserID, $updated_columns);

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $updated_columns);

    }

    

    redirect('user/profile');

    }



    public function update_professional_info_old()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('user/logout');

    }

    $BasicDetails['highest_education'] = !empty($this->input->post('highest_education'))?$this->input->post('highest_education'):'NULL';

    $BasicDetails['education'] = !empty($this->input->post('education'))?$this->input->post('education'):'NULL';

    $BasicDetails['job_category'] = !empty($this->input->post('profession_type'))?$this->input->post('profession_type'):'NULL';

    $BasicDetails['occupation'] = !empty($this->input->post('profession'))?$this->input->post('profession'):'NULL';

    $BasicDetails['job_details'] = !empty($this->input->post('job_details'))?$this->input->post('job_details'):'NULL';

    $BasicDetails['annual_income'] = !empty($this->input->post('annual_income'))?$this->input->post('annual_income`'):'NULL';

    $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

    

    redirect('user/profile');

    }

    

    public function update_professional_info()

    {

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    $updated_columns = array();

    $current_data = $this->General_Model->getData('tbl_registration', 'id', $UserID);

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $BasicDetails);

    

    

    $highest_education = !empty($this->input->post('highest_education'))?$this->input->post('highest_education'):'NULL';

    

    if($highest_education !== $current_data['highest_education']) 

    {

    $updated_columns['highest_education'] = $highest_education;

    }

    

    $education = !empty($this->input->post('education'))?$this->input->post('education'):'NULL';

    if($education !== $current_data['education']) 

    {

    $updated_columns['education'] = $education;

    }

    

    $profession_type = !empty($this->input->post('profession_type'))?$this->input->post('profession_type'):'NULL';

    if($profession_type !== $current_data['job_category']) 

    {

    $updated_columns['job_category'] = $profession_type;

    }

    

    $profession = !empty($this->input->post('profession'))?$this->input->post('profession'):'NULL';

    if($profession !== $current_data['occupation']) 

    {

    $updated_columns['occupation'] = $profession;

    }

    

    $job_details = !empty($this->input->post('job_details'))?$this->input->post('job_details'):'NULL';

    if($job_details !== $current_data['job_details']) 

    {

    $updated_columns['job_details'] = $job_details;

    }

    

    $annual_income = !empty($this->input->post('annual_income'))?$this->input->post('annual_income'):'NULL';

    if($annual_income !== $current_data['annual_income']) 

    {

    $updated_columns['annual_income'] = $annual_income;

    }

    

    if(!empty($updated_columns))

    {

    

    $this->General_Model->insert_update_logs($UserID, $updated_columns);

    

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $updated_columns);

    }

    

    redirect('user/profile');

    }



    public function update_physical_info_old()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('user/logout');

    }

    

    $BasicDetails['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';

    $BasicDetails['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';

    $BasicDetails['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';

    $BasicDetails['mother_tongue'] = !empty($this->input->post('mothertongue'))?$this->input->post('mothertongue'):'NULL';

    $BasicDetails['blood_group'] = !empty($this->input->post('bloodgroup'))?$this->input->post('bloodgroup'):'NULL';

    $BasicDetails['appearance'] = !empty($this->input->post('appearance'))?$this->input->post('appearance'):'NULL';

    $BasicDetails['bodytype'] = !empty($this->input->post('bodytype'))?$this->input->post('bodytype'):'NULL';

    $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

    

    redirect('user/profile');

    }

    

    public function update_physical_info()

    {

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    $updated_columns = array();

    $current_data = $this->General_Model->getData('tbl_registration', 'id', $UserID);

    

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $BasicDetails);

    

    

    $height = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';

    if($height !== $current_data['height']) 

    {

    $updated_columns['height'] = $height;

    }

    

    $weight = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';

    if($height !== $current_data['weight']) 

    {

    $updated_columns['weight'] = $weight;

    }

    

    $skin_color = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';

    if($skin_color !== $current_data['color']) 

    {

    $updated_columns['color'] = $skin_color;

    }

    

    $mothertongue = !empty($this->input->post('mothertongue'))?$this->input->post('mothertongue'):'NULL';

    if($mothertongue !== $current_data['mother_tongue']) 

    {

    $updated_columns['mother_tongue'] = $mothertongue;

    }

    

    $bloodgroup = !empty($this->input->post('bloodgroup'))?$this->input->post('bloodgroup'):'NULL';

    if($bloodgroup !== $current_data['blood_group']) 

    {

    $updated_columns['blood_group'] = $bloodgroup;

    }

    

    $appearance = !empty($this->input->post('appearance'))?$this->input->post('appearance'):'NULL';

    if($appearance !== $current_data['appearance']) 

    {

    $updated_columns['appearance'] = $appearance;

    }

    

    $bodytype = !empty($this->input->post('bodytype'))?$this->input->post('bodytype'):'NULL';

    if($bodytype !== $current_data['bodytype']) 

    {

    $updated_columns['bodytype'] = $bodytype;

    }

    

    if(!empty($updated_columns))

    {

    

    $this->General_Model->insert_update_logs($UserID, $updated_columns);

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $updated_columns);

    }

    redirect('user/profile');

    }



    public function update_location_info_old()

    {

        

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('user/logout');

    }

    

    $BasicDetails['native_place'] = !empty($this->input->post('city'))?$this->input->post('city'):'NULL';

    $BasicDetails['native_district'] = !empty($this->input->post('districts'))?$this->input->post('districts'):'NULL';

    $BasicDetails['state'] = !empty($this->input->post('states'))?$this->input->post('states'):'NULL';

    $BasicDetails['country'] = !empty($this->input->post('country'))?$this->input->post('country'):'NULL';

    $BasicDetails['home_country'] = !empty($this->input->post('present_country'))?$this->input->post('present_country'):'NULL';

    $BasicDetails['home_state'] = !empty($this->input->post('present_states'))?$this->input->post('present_states'):'NULL';

    $BasicDetails['home_district'] = !empty($this->input->post('present_district'))?$this->input->post('present_district'):'NULL';

    $BasicDetails['home_city'] = !empty($this->input->post('present_city'))?$this->input->post('present_city'):'NULL';

    $BasicDetails['mail'] = !empty($this->input->post('email'))?$this->input->post('email'):'NULL';

    $BasicDetails['address'] = !empty($this->input->post('address'))?$this->input->post('address'):'NULL';

    $BasicDetails['secondary_code'] = !empty($this->input->post('secondary_code'))?$this->input->post('secondary_code'):'NULL';

    $BasicDetails['other_contact_number'] = !empty($this->input->post('secondary_number'))?$this->input->post('secondary_number'):'NULL';

    $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$BasicDetails);

    redirect('user/profile');

    }



    public function update_location_info()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    $updated_columns = array();

    $current_data = $this->General_Model->getData('tbl_registration', 'id', $UserID);

    

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $BasicDetails);

    

    $native_place = !empty($this->input->post('city'))?$this->input->post('city'):'NULL';

    if($native_place !== $current_data['native_place']) 

    {

    $updated_columns['native_place'] = $native_place;

    }

    

    $native_district = !empty($this->input->post('districts'))?$this->input->post('districts'):'NULL';

    if($native_district !== $current_data['native_district']) 

    {

    $updated_columns['native_district'] = $native_district;

    }

    

    $states = !empty($this->input->post('states'))?$this->input->post('states'):'NULL';

    if($states !== $current_data['state']) 

    {

    $updated_columns['state'] = $states;

    }

    

    $country = !empty($this->input->post('country'))?$this->input->post('country'):'NULL';

    if($country !== $current_data['country']) 

    {

    $updated_columns['country'] = $country;

    }

    

    $home_country = !empty($this->input->post('present_country'))?$this->input->post('present_country'):'NULL';

    if($home_country !== $current_data['home_country']) 

    {

    $updated_columns['home_country'] = $home_country;

    }

    

    $home_state = !empty($this->input->post('present_states'))?$this->input->post('present_states'):'NULL';

    if($home_state !== $current_data['home_state']) 

    {

    $updated_columns['home_state'] = $home_state;

    }

    

    $home_district = !empty($this->input->post('present_district'))?$this->input->post('present_district'):'NULL';

    if($home_district !== $current_data['home_district']) 

    {

    $updated_columns['home_district'] = $home_district;

    }

    

    $home_city = !empty($this->input->post('present_city'))?$this->input->post('present_city'):'NULL';

    if($home_city !== $current_data['home_city']) 

    {

    $updated_columns['home_city'] = $home_city;

    }

    

    $mail = !empty($this->input->post('email'))?$this->input->post('email'):'NULL';

    if($mail !== $current_data['mail']) 

    {

    $updated_columns['mail'] = $mail;

    }

    

    $address = !empty($this->input->post('address'))?$this->input->post('address'):'NULL';

    if($address !== $current_data['address']) 

    {

    $updated_columns['address'] = $address;

    }

    

    $secondary_code = !empty($this->input->post('secondary_code'))?$this->input->post('secondary_code'):'NULL';

    if($secondary_code !== $current_data['secondary_code']) 

    {

    $updated_columns['secondary_code'] = $secondary_code;

    }

    

    $secondary_no = !empty($this->input->post('secondary_number'))?$this->input->post('secondary_number'):'NULL';

    if($secondary_no !== $current_data['other_contact_number']) 

    {

    $updated_columns['other_contact_number'] = $secondary_no;

    }

    

    

    if(!empty($updated_columns))

    {

    

    $this->General_Model->insert_update_logs($UserID, $updated_columns);

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $updated_columns);

    }

    

    redirect('user/profile');

    }

    

    

    public function update_family_info_old()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('user/logout');

    

    }

    $FamilyDetails['fatherdetails'] = !empty($this->input->post('fatherdetails'))?$this->input->post('fatherdetails'):'NULL';

    $FamilyDetails['fathers_occupation'] = !empty($this->input->post('fathers_occupation'))?$this->input->post('fathers_occupation'):'NULL';

    $FamilyDetails['motherdetails'] = !empty($this->input->post('motherdetails'))?$this->input->post('motherdetails'):'NULL';

    $FamilyDetails['mothers_occupation'] = !empty($this->input->post('mothers_occupation'))?$this->input->post('mothers_occupation'):'NULL';

    $FamilyDetails['total_members'] = !empty($this->input->post('total_members'))?$this->input->post('total_members'):'NULL';

    $FamilyDetails['financial_status'] = !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'NULL';

    $FamilyDetails['familytype'] = !empty($this->input->post('familytype'))?$this->input->post('familytype'):'NULL';

    $FamilyDetails['hometype'] = !empty($this->input->post('hometype'))?$this->input->post('hometype'):'NULL';

    $FamilyData = $this->General_Model->GetFullData($table = "tbl_familyprofile",'user_id',$UserID);

    

    if (!empty($FamilyData)) 

    {  

    

    $this->General_Model->insert_update_logs($UserID, $FamilyData);            

    $this->General_Model->UpdateData($table = 'tbl_familyprofile',$column_name = 'user_id',$UserID,$FamilyDetails);

    }

    else

    {

    

    $FamilyDetails['user_id'] =$UserID;

    $this->General_Model->AddRecord('tbl_familyprofile', $FamilyDetails);  

    

    }

    redirect('user/profile');

    }

    

    public function update_family_info()

    

    {

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID))

    { 

    redirect('logout');

    

    }

    

    $updated_columns = array();

    $current_data = $this->General_Model->getData('tbl_familyprofile', 'user_id', $UserID);

    

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $BasicDetails);

    

    

    

    $fatherdetails = !empty($this->input->post('fatherdetails'))?$this->input->post('fatherdetails'):'NULL';

    if($fatherdetails !== $current_data['fatherdetails']) 

    {

    $updated_columns['fatherdetails'] = $fatherdetails;

    }

    

    $fathers_occupation = !empty($this->input->post('fathers_occupation'))?$this->input->post('fathers_occupation'):'NULL';

    if($fathers_occupation !== $current_data['fathers_occupation']) 

    {

    $updated_columns['fathers_occupation'] = $fathers_occupation;

    }

    

    $motherdetails = !empty($this->input->post('motherdetails'))?$this->input->post('motherdetails'):'NULL';

    if($motherdetails !== $current_data['motherdetails']) 

    {

    $updated_columns['motherdetails'] = $motherdetails;

    }

    

    $mothers_occupation = !empty($this->input->post('mothers_occupation'))?$this->input->post('mothers_occupation'):'NULL';

    if($mothers_occupation !== $current_data['mothers_occupation']) 

    {

    $updated_columns['mothers_occupation'] = $mothers_occupation;

    }

    

    $total_members = !empty($this->input->post('total_members'))?$this->input->post('total_members'):'NULL';

    if($total_members !== $current_data['total_members']) 

    {

    $updated_columns['total_members'] = $total_members;

    }

    

    $financial_status = !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'NULL';

    if($financial_status !== $current_data['financial_status']) 

    {

    $updated_columns['financial_status'] = $financial_status;

    }

    

    $familytype = !empty($this->input->post('familytype'))?$this->input->post('familytype'):'NULL';

    if($familytype !== $current_data['familytype']) 

    {

    $updated_columns['familytype'] = $familytype;

    }

    

    $hometype = !empty($this->input->post('hometype'))?$this->input->post('hometype'):'NULL';

    if($hometype !== $current_data['hometype']) 

    {

    $updated_columns['hometype'] = $hometype;

    }

    

    if(!empty($updated_columns))

    {

    

    $this->General_Model->insert_update_logs($UserID, $updated_columns);

    $this->General_Model->UpdateData('tbl_familyprofile', 'user_id', $UserID, $updated_columns);

    }

    

    else

    {

    

    }

    redirect('user/profile');

    }



    public function update_hobbies_old()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    

    { 

    redirect('user/logout');

    }

    

    $otherDetails['fav_sports'] = !empty($this->input->post('favourite_sports'))?$this->input->post('favourite_sports'):'NULL';

    $otherDetails['fav_food'] = !empty($this->input->post('favourite_food'))?$this->input->post('favourite_food'):'NULL';

    $otherDetails['eating_habits'] = !empty($this->input->post('eating_habits'))?$this->input->post('eating_habits'):'NULL';

    $otherDetails['fav_places'] = !empty($this->input->post('favourite_places'))?$this->input->post('favourite_places'):'NULL';

    $otherDetails['hobbies'] = !empty($this->input->post('hobbies'))?$this->input->post('hobbies'):'NULL';

    $otherData = $this->General_Model->GetFullData($table = "tbl_otherdetails",'user_id',$UserID);

    

    if (!empty($otherData))

    {  

    $this->General_Model->UpdateData($table = 'tbl_otherdetails',$column_name = 'user_id',$UserID,$otherDetails);

    }

    

    else

    {

        

    $otherDetails['user_id'] =$UserID;

    $this->General_Model->AddRecord('tbl_otherdetails', $otherDetails);  

    

    }

    redirect('user/profile');

    }

    

    public function update_hobbies()

    {

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID))

    {

    redirect('logout');

    }

    

    $updated_columns = array();

    $current_data = $this->General_Model->getData('tbl_registration', 'id', $UserID);

    

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $BasicDetails);

    

    $hobbies = !empty($this->input->post('hobbies'))?$this->input->post('hobbies'):'NULL';

    if($hobbies !== $current_data['hobbies']) 

    {

    $updated_columns['hobbies'] = $hobbies;

    }

    

    if(!empty($updated_columns))

    {

    

    $this->General_Model->insert_update_logs($UserID, $updated_columns);

    

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $updated_columns);

    }

    

    else

    {

    

    }

    redirect('user/profile');

    }



    public function update_partner_preference_old()

    {

    

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('user/logout');

    

    }

    $PartnerDetails['partner_age_from'] = !empty($this->input->post('partner_age_from'))?$this->input->post('partner_age_from'):'NULL';

    $PartnerDetails['partner_age_to'] = !empty($this->input->post('partner_age_to'))?$this->input->post('partner_age_to'):'NULL';

    $PartnerDetails['partner_height'] = !empty($this->input->post('partner_height_from'))?$this->input->post('partner_height_from'):'NULL';

    $PartnerDetails['partner_height_to'] = !empty($this->input->post('partner_height_to'))?$this->input->post('partner_height_to'):'NULL';

    $partner_physicalstatus = !empty($this->input->post('partner_physical_status'))?$this->input->post('partner_physical_status'):'';

    $PartnerDetails['partner_physicalstatus'] =!empty($partner_physicalstatus)?implode(',',$partner_physicalstatus):'NULL';

    $partner_maritalstatus = !empty($this->input->post('partner_marital_status'))?$this->input->post('partner_marital_status'):'';

    $PartnerDetails['partner_maritalstatus'] =!empty($partner_maritalstatus)?implode(',',$partner_maritalstatus):'NULL';

    $partner_mothertongue = !empty($this->input->post('partner_mothertongue'))?$this->input->post('partner_mothertongue'):'';

    $PartnerDetails['partner_mother_tongue'] =!empty($partner_mothertongue)?implode(',',$partner_mothertongue):'NULL';

    $partner_languagespoken = !empty($this->input->post('partner_language_spoken'))?$this->input->post('partner_language_spoken'):'';

    $PartnerDetails['partner_languagespoken'] =!empty($partner_languagespoken)?implode(',',$partner_languagespoken):'NULL';

    $partner_skincolor = !empty($this->input->post('partner_skin_color'))?$this->input->post('partner_skin_color'):'';

    $PartnerDetails['partner_skincolor'] =!empty($partner_skincolor)?implode(',',$partner_skincolor):'NULL';

    $partner_appearance = !empty($this->input->post('partner_appearance'))?$this->input->post('partner_appearance'):'';

    $PartnerDetails['partner_appearance'] =!empty($partner_appearance)?implode(',',$partner_appearance):'NULL';

    $PartnerDetails['partner_religion'] = !empty($this->input->post('partner_religion'))?$this->input->post('partner_religion'):'NULL';

    $partner_caste = !empty($this->input->post('partner_caste'))?$this->input->post('partner_caste'):'';

    $PartnerDetails['partner_caste'] = !empty($partner_caste)?implode(',',$partner_caste):'NULL';

    $partner_education=!empty($this->input->post('partner_education'))?$this->input->post('partner_education'):'';

    $PartnerDetails['partner_education'] = !empty($partner_education)?implode(',',$partner_education):'NULL';

    $partner_occupation=!empty($this->input->post('partner_occupation'))?$this->input->post('partner_occupation'):'';

    $PartnerDetails['partner_occupation'] = !empty($partner_occupation)?implode(',',$partner_occupation):'NULL';

    $PartnerDetails['partner_annualincome'] = !empty($this->input->post('partner_annualincome'))?$this->input->post('partner_annualincome'):'NULL';

    $PartnerDetails['partner_country'] = !empty($this->input->post('partner_country'))?$this->input->post('partner_country'):'NULL';

    $PartnerDetails['partner_state'] = !empty($this->input->post('partner_state'))?$this->input->post('partner_state'):'NULL';

    $partner_district= !empty($this->input->post('partner_district'))?$this->input->post('partner_district'):'';

    $PartnerDetails['partner_district'] =!empty($partner_district)?implode(',',$partner_district):'NULL';

    $PartnerDetails['partner_nationality'] = !empty($this->input->post('partner_nationality'))?$this->input->post('partner_nationality'):'NULL';

    $PartnerDetails['demands'] = !empty($this->input->post('partner_expectation'))?$this->input->post('partner_expectation'):'NULL';

    

    

    $partnerData = $this->General_Model->GetFullData($table = "tbl_otherdetails",'user_id',$UserID);

    

    if(!empty($partnerData)) 

    {  

    

    $this->General_Model->UpdateData($table = 'tbl_otherdetails',$column_name = 'user_id',$UserID,$PartnerDetails);

    }

    

    else

    {

    

    $PartnerDetails['user_id'] =$UserID;

    

    $this->General_Model->AddRecord('tbl_otherdetails', $PartnerDetails);  

    

    }

    redirect('user/profile');

    }

    

    public function update_partner_preference()

    {

    

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('logout');

    

    }

    

    $updated_columns = array();

    $current_data = $this->General_Model->getData('tbl_otherdetails', 'user_id', $UserID);

    

    $BasicDetails['edit_through'] = "1";

    $BasicDetails['edit_date'] = date('Y-m-d H:i:s');

    $BasicDetails['update_data'] = "1";

    $this->General_Model->UpdateData('tbl_registration', 'id', $UserID, $BasicDetails);

    

    $partner_age_from = !empty($this->input->post('partner_age_from'))?$this->input->post('partner_age_from'):'NULL';

    if($partner_age_from !== $current_data['partner_age_from']) 

    {

    $updated_columns['partner_age_from'] = $partner_age_from;

    }

    

    $partner_age_to = !empty($this->input->post('partner_age_to'))?$this->input->post('partner_age_to'):'NULL';

    if($partner_age_to !== $current_data['partner_age_to']) 

    {

    $updated_columns['partner_age_to'] = $partner_age_to;

    }

    

    $partner_height_from = !empty($this->input->post('partner_height_from'))?$this->input->post('partner_height_from'):'NULL';

    if($partner_height_from !== $current_data['partner_height']) 

    {

    $updated_columns['partner_height'] = $partner_height_from;

    }

    

    $partner_height_to = !empty($this->input->post('partner_height_to'))?$this->input->post('partner_height_to'):'NULL';

    if($partner_height_to !== $current_data['partner_height_to']) 

    {

    $updated_columns['partner_height_to'] = $partner_height_to;

    }

    

    $partner_height_to = !empty($this->input->post('partner_height_to'))?$this->input->post('partner_height_to'):'NULL';

    if($partner_height_to !== $current_data['partner_height_to']) 

    {

    $updated_columns['partner_height_to'] = $partner_height_to;

    }

    

    $partner_physicalstatus = !empty($this->input->post('partner_physical_status')) ? $this->input->post('partner_physical_status') : array();

    

    if (!empty($partner_physicalstatus))

    {

    $partner_physicalstatus = implode(',', $partner_physicalstatus);

    } 

    

    else

    {

    // $partner_physicalstatus = 'NULL';

    $partner_physicalstatus = 'NULL';

    }

    

    if ($partner_physicalstatus !== $current_data['partner_physicalstatus'])

    {

    $updated_columns['partner_physicalstatus'] = $partner_physicalstatus;

    }

    

    $partner_maritalstatus = !empty($this->input->post('partner_marital_status')) ? $this->input->post('partner_marital_status') : array();

    

    if (!empty($partner_maritalstatus))

    {

    $partner_maritalstatus = implode(',', $partner_maritalstatus);

    } 

    else

    {

    $partner_maritalstatus = 'NULL';

    }

    

    if ($partner_maritalstatus !== $current_data['partner_maritalstatus'])

    {

    $updated_columns['partner_maritalstatus'] = $partner_maritalstatus;

    }

    

    $partner_mothertongue = !empty($this->input->post('partner_mothertongue')) ? $this->input->post('partner_mothertongue') : array();

    

    if (!empty($partner_mothertongue))

    {

    $partner_mothertongue = implode(',', $partner_mothertongue);

    } 

    else

    {

    $partner_mothertongue = 'NULL';

    }

    

    if ($partner_mothertongue !== $current_data['partner_mother_tongue'])

    {

    $updated_columns['partner_mother_tongue'] = $partner_mothertongue;

    }

    

    $partner_languagespoken = !empty($this->input->post('partner_language_spoken')) ? $this->input->post('partner_language_spoken') : array();

    

    if (!empty($partner_languagespoken))

    {

    $partner_languagespoken = implode(',', $partner_languagespoken);

    } 

    else

    {

    $partner_languagespoken = 'NULL';

    }

    

    if ($partner_languagespoken !== $current_data['partner_languagespoken'])

    {

    $updated_columns['partner_languagespoken'] = $partner_languagespoken;

    }

    

    $partner_skincolor = !empty($this->input->post('partner_skin_color')) ? $this->input->post('partner_skin_color') : array();

    

    if (!empty($partner_skincolor))

    {

    $partner_skincolor = implode(',', $partner_skincolor);

    } 

    else

    {

    $partner_skincolor = 'NULL';

    }

    

    if ($partner_skincolor !== $current_data['partner_skincolor'])

    {

    $updated_columns['partner_skincolor'] = $partner_skincolor;

    }

    

    $partner_appearance = !empty($this->input->post('partner_appearance')) ? $this->input->post('partner_appearance') : array();

    

    if (!empty($partner_appearance))

    {

    $partner_appearance = implode(',', $partner_appearance);

    } 

    else

    {

    $partner_appearance = 'NULL';

    }

    

    if ($partner_appearance !== $current_data['partner_appearance'])

    {

    $updated_columns['partner_appearance'] = $partner_appearance;

    }

    

    $partner_religion = !empty($this->input->post('partner_religion'))?$this->input->post('partner_religion'):'NULL';

    if($partner_religion !== $current_data['partner_religion']) 

    {

    $updated_columns['partner_religion'] = $partner_religion;

    }

    

    $partner_caste = !empty($this->input->post('partner_caste')) ? $this->input->post('partner_caste') : array();

    

    if (!empty($partner_caste))

    {

    $partner_caste = implode(',', $partner_caste);

    } 

    else

    {

    $partner_caste = 'NULL';

    }

    

    if ($partner_caste !== $current_data['partner_caste'])

    {

    $updated_columns['partner_caste'] = $partner_caste;

    }

    

    $partner_education = !empty($this->input->post('partner_education')) ? $this->input->post('partner_education') : array();

    

    if (!empty($partner_education))

    {

    $partner_education = implode(',', $partner_education);

    } 

    else

    {

    $partner_education = 'NULL';

    }

    

    if ($partner_education !== $current_data['partner_education'])

    {

    $updated_columns['partner_education'] = $partner_education;

    }

    

    $partner_occupation = !empty($this->input->post('partner_occupation')) ? $this->input->post('partner_occupation') : array();

    

    if (!empty($partner_occupation))

    {

    $partner_occupation = implode(',', $partner_occupation);

    } 

    else

    {

    $partner_occupation = 'NULL';

    }

    

    if ($partner_occupation !== $current_data['partner_occupation'])

    {

    $updated_columns['partner_occupation'] = $partner_occupation;

    }

    

    $partner_annualincome = !empty($this->input->post('partner_annualincome'))?$this->input->post('partner_annualincome'):'NULL';

    if($partner_annualincome !== $current_data['partner_annualincome']) 

    {

    $updated_columns['partner_annualincome'] = $partner_annualincome;

    }

    

    $partner_country = !empty($this->input->post('partner_country'))?$this->input->post('partner_country'):'NULL';

    if($partner_country !== $current_data['partner_country']) 

    {

    $updated_columns['partner_country'] = $partner_country;

    }

    

    $partner_state = !empty($this->input->post('partner_state'))?$this->input->post('partner_state'):'NULL';

    if($partner_state !== $current_data['partner_state']) 

    {

    $updated_columns['partner_state'] = $partner_state;

    }

    

    $partner_district = !empty($this->input->post('partner_district')) ? $this->input->post('partner_district') : array();

    

    if (!empty($partner_district))

    {

    $partner_district = implode(',', $partner_district);

    } 

    else

    {

    $partner_district = 'NULL';

    }

    

    if ($partner_district !== $current_data['partner_district'])

    {

    $updated_columns['partner_district'] = $partner_district;

    }

    

    $partner_nationality = !empty($this->input->post('partner_nationality'))?$this->input->post('partner_nationality'):'NULL';

    if($partner_nationality !== $current_data['partner_nationality']) 

    {

    $updated_columns['partner_nationality'] = $partner_nationality;

    }

    

    $partner_expectation = !empty($this->input->post('partner_expectation'))?$this->input->post('partner_expectation'):'NULL';

    if($partner_expectation !== $current_data['demands']) 

    {

    $updated_columns['demands'] = $partner_expectation;

    }

    

    if(!empty($updated_columns))

    {

    

    $this->General_Model->insert_update_logs($UserID, $updated_columns);

    

    $this->General_Model->UpdateData('tbl_otherdetails', 'user_id', $UserID, $updated_columns);

    }

    

    else

    {

    // $PartnerDetails['user_id'] =$UserID;

    // $this->General_Model->AddRecord('tbl_otherdetails', $PartnerDetails);  

    

    }

    redirect('user/profile');

    }

    

    

    public function searchprofiles()

    {

    $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");

    $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 

    $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 

    $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 

    $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 

    $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 

    $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");

    $data['religion'] = $this->General_Model->GetFullData($table = "tbl_religion");

    $data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");

    $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");

    $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");

    $data['professiontype'] = $this->General_Model->GetFullData($table = " tbl_professiontype");

    $data['profession'] = $this->General_Model->GetFullData($table = " tbl_profession");

    $data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus");

    $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");

    $data['maritalstatus']=$this->General_Model->GetFullData($table = "tbl_maritalstatus");

    

    if ($this->uri->uri_string() == 'user/searchprofiles') 

    {

    redirect('searchprofiles');

    } 

    

    $this->load->view('search_criterias',$data);

    }

    

    public function search_profile_common()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    else

    $offset ="";

    

    if(empty($offset))

    { 

    $offset = ''; 

    }

    

    $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    

    if($this->input->post('searchtype')!="")

    {

    $Details['caste'] = $this->input->post('belief');

    $Details['AgeFrom'] =!empty($this->input->post('age_from'))?$this->input->post('age_from'):'';

    $Details['AgeTo'] = !empty($this->input->post('age_to'))?$this->input->post('age_to'):'';

    $Details['HeightFrom'] = !empty($this->input->post('height_from'))?$this->input->post('height_from'):'';

    $Details['HeightTo']=  !empty($this->input->post('height_to'))?$this->input->post('height_to'):'';

    $Details['highest_education']= !empty($this->input->post('highest_education'))?$this->input->post('highest_education'):'';

    $Details['country']= !empty($this->input->post('country'))?$this->input->post('country'):'';

    $Details['state']= !empty($this->input->post('state'))?$this->input->post('state'):'';

    $Details['district']= !empty($this->input->post('district'))?$this->input->post('district'):'';

    $Details['city']= !empty($this->input->post('city'))?$this->input->post('city'):'';

    $Details['marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

    

    $_SESSION['common_caste'] =!empty($this->input->post('belief'))?$this->input->post('belief'):'';

    $_SESSION['common_AgeFrom'] =!empty($this->input->post('age_from'))?$this->input->post('age_from'):'';

    $_SESSION['common_AgeTo'] = !empty($this->input->post('age_to'))?$this->input->post('age_to'):'';

    $_SESSION['common_HeightFrom'] = !empty($this->input->post('height_from'))?$this->input->post('height_from'):'';

    $_SESSION['common_HeightTo']=  !empty($this->input->post('height_to'))?$this->input->post('height_to'):'';

    $_SESSION['common_highest_education']= !empty($this->input->post('highest_education'))?$this->input->post('highest_education'):'';

    $_SESSION['common_country']= !empty($this->input->post('country'))?$this->input->post('country'):'';

    $_SESSION['common_state']= !empty($this->input->post('state'))?$this->input->post('state'):'';

    $_SESSION['common_district']= !empty($this->input->post('district'))?$this->input->post('district'):'';

    $_SESSION['common_city']= !empty($this->input->post('city'))?$this->input->post('city'):'';

    $_SESSION['common_marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

    }

    

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    

    $ignoredids=array();

    foreach ($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    foreach ($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    

    $Details['blocked_profiles']=$blockedids;

    

    $config = array();

    $config["base_url"] = base_url() . "search_profile_common";

    $config["total_rows"] = $this->General_Model->getmatchingprofilesCommon('',$Details,1);

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 3;

    

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

    $data["links"] = $this->pagination->create_links();

    $MatchingProfiles = $this->General_Model->getmatchingprofilesCommon($page,$Details);

    

    $data['MatchingProfiles'] =$MatchingProfiles;

    $this->load->view('search',$data);

    }

        

    public function search_profile_advanced()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    else

    $offset ="";

    

    if(empty($offset))

    { 

    $offset = '';

    }

    

    $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $data['payment_done'] = $this->General_Model->payment_done($UserID);



    if($this->input->post('searchtype')!="")

    {

    $Details['AgeFrom'] =!empty($this->input->post('adv_age_from'))?$this->input->post('adv_age_from'):'';

    $Details['AgeTo'] = !empty($this->input->post('adv_age_to'))?$this->input->post('adv_age_to'):'';

    $Details['HeightFrom'] = !empty($this->input->post('adv_height_from'))?$this->input->post('adv_height_from'):'';

    $Details['HeightTo']=  !empty($this->input->post('adv_height_to'))?$this->input->post('adv_height_to'):'';

    $Details['WeightFrom'] =  !empty($this->input->post('adv_weight_from'))?$this->input->post('adv_weight_from'):'';

    $Details['WeightTo']=  !empty($this->input->post('adv_weight_to'))?$this->input->post('adv_weight_to'):'';

    $Details['bodytype']= !empty($this->input->post('bodytype'))?$this->input->post('bodytype'):'';

    $Details['skin_color']= !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'';

    $Details['financialstatus']= !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'';

    $Details['caste']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';

    $Details['physical_status']= !empty($this->input->post('physical_status'))?$this->input->post('physical_status'):'';

    $Details['highest_education']= !empty($this->input->post('adv_highest_education'))?$this->input->post('adv_highest_education'):'';

    $Details['country']= !empty($this->input->post('adv_country'))?$this->input->post('adv_country'):'';

    $Details['state']= !empty($this->input->post('adv_state'))?$this->input->post('adv_state'):'';

    $Details['district']= !empty($this->input->post('adv_district'))?$this->input->post('adv_district'):'';

    $Details['city']= !empty($this->input->post('adv_city'))?$this->input->post('adv_city'):'';

    $Details['profile_with_photo']= !empty($this->input->post('profile_with_photo'))?$this->input->post('profile_with_photo'):'';

    $Details['sort_by']= !empty($this->input->post('sort_by'))?$this->input->post('sort_by'):'';

    $Details['profession_type']= !empty($this->input->post('profession_type'))?$this->input->post('profession_type'):'';

    $Details['marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

    $Details['adv_belief']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';

    

    $_SESSION['adv_AgeFrom'] =!empty($this->input->post('adv_age_from'))?$this->input->post('adv_age_from'):'';

    $_SESSION['adv_AgeTo'] = !empty($this->input->post('adv_age_to'))?$this->input->post('adv_age_to'):'';

    $_SESSION['adv_HeightFrom'] = !empty($this->input->post('adv_height_from'))?$this->input->post('adv_height_from'):'';

    $_SESSION['adv_HeightTo']=  !empty($this->input->post('adv_height_to'))?$this->input->post('adv_height_to'):'';

    $_SESSION['adv_WeightFrom'] =  !empty($this->input->post('adv_weight_from'))?$this->input->post('adv_weight_from'):'';

    $_SESSION['adv_WeightTo']=  !empty($this->input->post('adv_weight_to'))?$this->input->post('adv_weight_to'):'';

    $_SESSION['adv_bodytype']= !empty($this->input->post('bodytype'))?$this->input->post('bodytype'):'';

    $_SESSION['adv_skin_color']= !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'';

    $_SESSION['adv_financialstatus']= !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'';

    $_SESSION['adv_caste']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';

    $_SESSION['adv_physical_status']= !empty($this->input->post('physical_status'))?$this->input->post('physical_status'):'';

    $_SESSION['adv_highest_education']= !empty($this->input->post('adv_highest_education'))?$this->input->post('adv_highest_education'):'';

    $_SESSION['adv_country']= !empty($this->input->post('adv_country'))?$this->input->post('adv_country'):'';

    $_SESSION['adv_state']= !empty($this->input->post('adv_state'))?$this->input->post('adv_state'):'';

    $_SESSION['adv_district']= !empty($this->input->post('adv_district'))?$this->input->post('adv_district'):'';

    $_SESSION['adv_city']= !empty($this->input->post('adv_city'))?$this->input->post('adv_city'):'';

    $_SESSION['adv_profile_with_photo']= !empty($this->input->post('profile_with_photo'))?$this->input->post('profile_with_photo'):'';

    $_SESSION['adv_sort_by']= !empty($this->input->post('sort_by'))?$this->input->post('sort_by'):'';

    $_SESSION['adv_profession_type']= !empty($this->input->post('profession_type'))?$this->input->post('profession_type'):'';

    $_SESSION['adv_marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

    $_SESSION['adv_belief']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';

    }

    

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    $ignoredids=array();

    

    foreach ($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    foreach ($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    

    $Details['blocked_profiles']=$blockedids;

    $config = array();

    $config["base_url"] = base_url() . "search_profile_advanced";

    $config["total_rows"] = $this->General_Model->getmatchingprofilesAdvanced('',$Details,1);

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 3;

    

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

    echo $this->pagination->create_links();

    

    $data["links"] = $this->pagination->create_links();

    $MatchingProfiles = $this->General_Model->getmatchingprofilesAdvanced($page,$Details);

    $data['MatchingProfiles'] =$MatchingProfiles;

    $this->load->view('search',$data);

    }

    

    public function search_profile_id()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    else

    $offset ="";

    

    if(empty($offset))

    { 

    $offset = '';

    }

    

    $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $data['payment_done'] = $this->General_Model->payment_done($UserID);



    if($this->input->post('searchtype')=="byid")

    {

    $Details['nikah_id']= !empty($this->input->post('happy_id'))?$this->input->post('happy_id'):'';

    $_SESSION['adv_nikah_id']= !empty($this->input->post('happy_id'))?$this->input->post('happy_id'):'';

    }

    

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    

    $ignoredids=array();

    

    foreach($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    

    foreach($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    $Details['blocked_profiles']=$blockedids;

    

    $config = array();

    $config["base_url"] = base_url() . "search_profile_id";

    $config["total_rows"] = $this->General_Model->getmatchingprofilesid('',$Details,1);

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 3;

    

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

    $data["links"] = $this->pagination->create_links();

    

    $MatchingProfiles = $this->General_Model->getmatchingprofilesid($page,$Details);

    $data['MatchingProfiles'] =$MatchingProfiles;

    $this->load->view('search',$data);

    }



    public function search_profile()

    {

    

    $UserID = $this->session->userdata('user_id');

    if(empty($UserID))

    {

    redirect('logout');

    }

    

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    else

    $offset ="";

    

    if(empty($offset))

    { 

    $offset = ''; 

    }

    

    $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    

    if($this->input->post('searchtype')=="common")

    {

    $Details['caste'] = $this->input->get('belief');

    $Details['AgeFrom'] =!empty($this->input->post('age_from'))?$this->input->post('age_from'):'';

    $Details['AgeTo'] = !empty($this->input->post('age_to'))?$this->input->post('age_to'):'';

    $Details['HeightFrom'] = !empty($this->input->post('height_from'))?$this->input->post('height_from'):'';

    $Details['HeightTo']=  !empty($this->input->post('height_to'))?$this->input->post('height_to'):'';

    $Details['highest_education']= !empty($this->input->post('highest_education'))?$this->input->post('highest_education'):'';

    $Details['country']= !empty($this->input->post('country'))?$this->input->post('country'):'';

    $Details['state']= !empty($this->input->post('state'))?$this->input->post('state'):'';

    $Details['district']= !empty($this->input->post('district'))?$this->input->post('district'):'';

    $Details['city']= !empty($this->input->post('city'))?$this->input->post('city'):'';

    $Details['marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

    }

    

    else if($this->input->post('searchtype')=="advanced")

    {

    $Details['AgeFrom'] =!empty($this->input->post('adv_age_from'))?$this->input->post('adv_age_from'):'';

    $Details['AgeTo'] = !empty($this->input->post('adv_age_to'))?$this->input->post('adv_age_to'):'';

    $Details['HeightFrom'] = !empty($this->input->post('adv_height_from'))?$this->input->post('adv_height_from'):'';

    $Details['HeightTo']=  !empty($this->input->post('adv_height_to'))?$this->input->post('adv_height_to'):'';

    $Details['WeightFrom'] =  !empty($this->input->post('adv_weight_from'))?$this->input->post('adv_weight_from'):'';

    $Details['WeightTo']=  !empty($this->input->post('adv_weight_to'))?$this->input->post('adv_weight_to'):'';

    $Details['bodytype']= !empty($this->input->post('bodytype'))?$this->input->post('bodytype'):'';

    $Details['skin_color']= !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'';

    $Details['financialstatus']= !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'';

    $Details['caste']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';

    $Details['physical_status']= !empty($this->input->post('physical_status'))?$this->input->post('physical_status'):'';

    $Details['highest_education']= !empty($this->input->post('adv_highest_education'))?$this->input->post('adv_highest_education'):'';

    $Details['country']= !empty($this->input->post('adv_country'))?$this->input->post('adv_country'):'';

    $Details['state']= !empty($this->input->post('adv_state'))?$this->input->post('adv_state'):'';

    $Details['district']= !empty($this->input->post('adv_district'))?$this->input->post('adv_district'):'';

    $Details['city']= !empty($this->input->post('adv_city'))?$this->input->post('adv_city'):'';

    $Details['profile_with_photo']= !empty($this->input->post('profile_with_photo'))?$this->input->post('profile_with_photo'):'';

    $Details['sort_by']= !empty($this->input->post('sort_by'))?$this->input->post('sort_by'):'';

    $Details['profession_type']= !empty($this->input->post('profession_type'))?$this->input->post('profession_type'):'';

    $Details['marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

    $Details['adv_belief']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';

    }

    

    else

    {

    $Details['nikah_id']= !empty($this->input->post('happy_id'))?$this->input->post('happy_id'):'';

    }

    

    if($this->input->post('searchtype')!="")

    {

    

    }

   

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    

    $ignoredids=array();

    foreach ($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    foreach ($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    

    $Details['blocked_profiles']=$blockedids;

    $config = array();

    $config["base_url"] = base_url() . "search_profile";

    $total_rows=$this->General_Model->getmatchingprofiles('',$Details,1);

    $session['matchrows']=$total_rows;

    $config["total_rows"] = $session['matchrows'];

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 3;

    

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

    echo $this->pagination->create_links();

    $data["links"] = $this->pagination->create_links();

    

    $MatchingProfiles = $this->General_Model->getmatchingprofiles($page,$Details);

    

    $data['MatchingProfiles'] =$MatchingProfiles;

    $this->load->view('search',$data);

    }

    

    

    public function disabilityprofiles_gotonikah()

    {

    $UserID = $this->session->userdata('user_id');

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    else

    $offset ="";

    

    if(empty($offset))

    { 

    $offset = ''; 

    }

    

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    

    $Details['physical_status']="Physically Challenged";

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $config = array();

    $config["base_url"] = base_url() . "disabilityprofiles";

    $config["total_rows"] = $this->General_Model->getmatchingprofiles('',$Details,1);

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 3;

    

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

    

    $data["links"] = $this->pagination->create_links();

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    $ignoredids=array();

    foreach ($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    foreach ($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    $Details['blocked_profiles']=$blockedids;

    $MatchingProfiles = $this->General_Model->getmatchingprofiles($page,$Details);

    

    $data['MatchingProfiles'] =$MatchingProfiles;

    $this->load->view('search_gotonikah',$data);

    }

    

    public function disabilityprofiles()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    

    else

    $offset ="";

    if(empty($offset))

    {

    $offset = '';

    }

    

    if ($this->uri->uri_string() == 'user/disabilityprofiles')

    {

    redirect('disabilityprofiles');

    }

        

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    $Details['physical_status']="Physically Challenged";

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $config = array();

    $config["base_url"] = base_url() . "disabilityprofiles";

    $config["total_rows"] = $this->General_Model->getmatchingprofiles('',$Details,1);

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 2;

    

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;

    

    $data["links"] = $this->pagination->create_links();

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    

    $ignoredids=array();

    foreach ($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    foreach ($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    $Details['blocked_profiles']=$blockedids;

    $MatchingProfiles = $this->General_Model->getmatchingprofiles($page,$Details);

    

    $data['MatchingProfiles'] =$MatchingProfiles;

    $this->load->view('search',$data);

    }

    

    public function orphan_or_poor_profiles()

    {  

    $UserID = $this->session->userdata('user_id');

    

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    else

    $offset ="";

    

    if(empty($offset))

    { 

    $offset = ''; 

    }

    

    if ($this->uri->uri_string() == 'user/orphan_or_poor_profiles')

    {

    redirect('orphan_or_poor_profiles');

    }

    

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    

    $Details['financial_status']="Poor Family";

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $config = array();

    $config["base_url"] = base_url() . "orphan_or_poor_profiles";

    $config["total_rows"] = $this->General_Model->getmatchingprofiles('',$Details,1);

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 2;

    

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;

    

    $data["links"] = $this->pagination->create_links();

    

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    $ignoredids=array();

    foreach ($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    foreach ($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    $Details['blocked_profiles']=$blockedids;

    $MatchingProfiles = $this->General_Model->getmatchingprofiles($page,$Details);

    

    $data['MatchingProfiles'] =$MatchingProfiles;

    $this->load->view('search',$data);

    }

    

    

    public function orphan_or_poor_profiles_gotonikah()

    {  

    $UserID = $this->session->userdata('user_id');

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    else

    

    $offset ="";

    

    if(empty($offset))

    { 

    $offset = ''; 

        

    }

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    

    $Details['financial_status']="Poor Family";

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $config = array();

    $config["base_url"] = base_url() . "orphan_or_poor_profiles";

    $config["total_rows"] = $this->General_Model->getmatchingprofiles('',$Details,1);

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 3;

    

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

    

    $data["links"] = $this->pagination->create_links();

    

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    //profiles blocked me

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    $ignoredids=array();

    foreach ($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    foreach ($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    $Details['blocked_profiles']=$blockedids;

    $MatchingProfiles = $this->General_Model->getmatchingprofiles($page,$Details);

    

    $data['MatchingProfiles'] =$MatchingProfiles;

    $this->load->view('search_gotonikah',$data);

    }

    

    public function search()

    {

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

    

    if(!empty($Profiles))

    {

    foreach ($Profiles as $key => $value)

    {

    $match = 0;

    

    if($data['LoggedUserProfileDetails']['age']>=$value->partner_age_from && $data['LoggedUserProfileDetails']['age']<=$value->partner_age_to)

    {

    $match++;

    }

    

    if($data['LoggedUserProfileDetails']['height']>=$value->partner_height && $data['LoggedUserProfileDetails']['height']<=$value->partner_height_to)

    {

    $match++;

    }

    if($data['LoggedUserProfileDetails']['qualification'] == $value->qualification)

    {

    $match++;

    }

    if($data['LoggedUserProfileDetails']['financial_status'] == $value->partner_familytype)

    {

    $match++;

    }

    echo '<div class="d-lg-flex SRSbox">';

    echo '<div class="flex-shrink-0">';

    if(empty($value->photo))

    { 

    

    if($value->gender== 1)

    { 

    echo '<img src="'.base_url("/assets/photo_storage/male.jpg") .'" alt="profile image" class="proImg">';

    }

    

    else if($value->gender== 2)

    {

    echo '<img src="'.base_url("/assets/photo_storage/female.jpg") .'" alt="profile image" class="proImg">';

    }

    }

    

    else

    {

    echo '<img src="'.base_url("/assets/photo_storage/".$value->photo).'" alt="..." class="srProPic">';

    }

    

    echo '</div>';

    echo ' <div class="flex-grow-1 ms-lg-3 p-4 p-lg-2 p-xxl-4 d-flex flex-column justify-content-between">';

    echo '<div>';

    echo '<div class="headName d-flex align-items-center justify-content-between">';

    echo '<a href="'.site_url('singleprofile/'. $value->id).'">';

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

    

    if($value->status ==1 || $value->status ==2 || $value->status ==3)

    { 

    echo '<span class="verified">';

    echo '<img src="'.base_url("assets/images/verify.png").'">';

    echo '&nbsp; Verified';

    echo '</span>';

    } 

    

    else

    {

    echo '<span class="verified">';

    echo '<img src="'.base_url("assets/images/blocked.png").'">';

    echo '&nbsp; Verification Pending';

    echo '</span>';

    }

    

    echo '</div>';

    echo '</div>';

    echo '<div class="dBox d-flex justify-content-between align-items-center">';

    echo '<div>';

    echo '<span>';

    

    if(!empty($value->age) && $value->age !='NULL')

    {

    echo $value->age; 

    echo 'Yrs,';

    }

    

    if(!empty($value->height) && $value->height !='NULL')

    {

    echo $value->height;

    echo 'cm,';

    }

    

    echo '</span>';

    echo '<span>Muslim';

    

    if(!empty($value->user_caste) && $value->user_caste !='NULL')

    { 

    echo ',';

    echo $value->user_caste; 

    } 

    echo '</span>';

    echo '<span>'; 

    

    if(!empty($value->native_place) && $value->native_place !='NULL' && !empty($value->district) && $value->district !='NULL')

    { 

    echo $value->native_place; 

    echo ',';

    echo $value->district; 

    }

    

    else if(!empty($value->native_place) && $value->native_place !='NULL')

    { 

    echo ',';

    echo $value->native_place; 

    } 

    

    else if(!empty($value->district) && $value->district !='NULL')

    {        

    echo ',';

    echo $value->district; 

    }

    

    echo '</span>';

    echo '</div>';

    echo '<a href="'.site_url('singleprofile/'. $value->id).'">';

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



    public function singleprofile($UserID = '')

    { 

    $LoggedUserID = $this->session->userdata('user_id');

    

    if(empty($LoggedUserID))

    { 

    redirect('logout');

    }

    

    $data['LoggedUserProfileDetails'] = $this->General_Model->GetProfileDetails($LoggedUserID);

    $data['singleProfileImages'] = $this->General_Model->GetFullData($table = "tbl_userimages",'user_id',$UserID);

    $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);

    $payment_done = $this->General_Model->payment_done($LoggedUserID);

    $data['payment_done'] =$payment_done;

    $data['report_status'] = $this->db->select('*')->from('tbl_reportprofile')->where('receiver_id',$UserID)->where('sender_id',$LoggedUserID)->get();

    

    $where = array('sender_id'=>$LoggedUserID,'planid'=>$payment_done[0]->id);

    $contact_viewed= $this->General_Model->GetFullData1("tbl_contact_viewed",$where);

    

    $data['contact_viewed'] = $contact_viewed;

    

    if($UserID != 0)

    {

    $check = $this->db->select('*')->from('tbl_viewed_profiles')->where('receiver_id',$UserID)->where('sender_id',$LoggedUserID)->get()->row_array();

    

    if(empty($check['viewed_id']))

    {

    $vieweddata = array('sender_id'=>$LoggedUserID,'receiver_id'=>$UserID,'date'=>date('Y-m-d'));

    $this->db->insert('tbl_viewed_profiles',$vieweddata);

    }

    

    else

    {

    $vieweddata = array('statusdate'=>date('Y-m-d'));

    $this->db->where('viewed_id',$check['viewed_id']);

    $this->db->update('tbl_viewed_profiles',$vieweddata);

    } 

    }

    

    $partner_preference = $this->General_Model->GetFullData($table = "tbl_otherdetails",'user_id',$UserID);

    $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

    $Details['caste'] =(!empty($this->session->userdata('caste') && $this->session->userdata('caste')!= 'NULL') ? $this->session->userdata('caste') : '');

    $Details['religion'] = 2;

    $Details['AgeFrom'] = (!empty($partner_preference->partner_age_from) && $partner_preference->partner_age_from!= 'NULL' ? $partner_preference->partner_age_from : '');

    $Details['AgeTo'] = (!empty($partner_preference->partner_age_to) && $partner_preference->partner_age_to!= 'NULL' ? $partner_preference->partner_age_to : '');

    $Details['HeightFrom'] = (!empty($partner_preference->partner_height) && $partner_preference->partner_height != 'NULL'? $partner_preference->partner_height : '');

    $Details['HeightTo'] = (!empty($partner_preference->partner_height_to) && $partner_preference->partner_height_to != 'NULL'? $partner_preference->partner_height_to : '');

    $Details['PartnerEducation'] = (!empty($partner_preference->partner_education) && $partner_preference->partner_education != 'NULL'? $partner_preference->partner_education : '');

    $Details['familytype'] = (!empty($partner_preference->partner_familytype) && $partner_preference->partner_familytype != 'NULL'? $partner_preference->partner_familytype : '');

    $data['partner_preference_data'] = $this->General_Model->GetPartnerPreference($UserID);

    

    $MatchingProfiles = $this->General_Model->getsimilarprofiles('',$Details);

    $data['MatchingProfiles'] =$MatchingProfiles;

    $data['interest'] =   $this->db->select('*')->from('tbl_interest')->where('receiver_id',$UserID)->where('sender_id',$LoggedUserID)->get()->num_rows();

    $this->load->view('singleProfile',$data); 

    }  



    public function send_interest()

    {

    $data['sender_id'] =  $this->session->userdata('user_id');

    $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';

    

    $check = $this->db->select('*')->from('tbl_interest')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();

    

    if(empty($check['interest_id']))

    { 

    $this->General_Model->AddRecord('tbl_interest', $data); 

    }

    

    else

    {

    $this->General_Model->DeleteData('tbl_interest','interest_id',$check['interest_id'] );

    }

    $uname=$this->session->userdata('name');

    

    $message=$uname." Sent Interest on your Profile.";

    $notification_type=1;

    

    $alert_data = $this->General_Model->GetFullData('tbl_user_alerts','user_id',$this->input->post('receiver_id'));

    $vals=$alert_data[0];

    $receiver_data = $this->General_Model->GetFullData('tbl_registration','id',$this->input->post('receiver_id'));

    $vals1=$receiver_data[0];

    $alerts=explode(",",$vals->alerts); 

    

    if(in_array("1",$alerts))

    {

    $to_email = $vals1->mail;

    $subject = 'Expresed Interest on your Profile';

    $message = $message;

    $headers = 'From: Happy Nikah <info@happynikah.com>';

    mail($to_email,$subject,$message,$headers);

    }

    else if(in_array("2",$alerts))

    {

    

    }

    else if(in_array("3",$alerts))

    {

    $result = $this->General_Model->GetFullData('tbl_firebase_token','user_id',$this->input->post('receiver_id'));

    $vals=$result[0];

    

    $token=$vals->firebase_token;



    $res= $this->noti($token, array(

    "title" => "Message From ".$uname,

    "body" => $message,

    "user_id"=>$this->input->post('receiver_id'),

    "sender_id"=>$this->session->userdata('user_id'),

    "noti_type1"=>"notification",            

    ));

    }

    $datas = array(

    'sender_id' => $this->session->userdata('user_id'),

    'receiver_id' => $this->input->post('receiver_id'),

    'notification_type'=>$notification_type,

    'date'=>date('Y-m-d'),

    );

    

    $this->General_Model->AddRecord('tbl_notification',$datas);

    echo 1; 

    exit;

    }

    

    public function ignore_profile()

    {

    $data['sender_id'] =  $this->session->userdata('user_id');

    $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';

    $check = $this->db->select('*')->from('tbl_ignored')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();



    if(empty($check['id']))

    { 

    $this->General_Model->AddRecord('tbl_ignored', $data); 

    }

    

    else

    {

    $this->General_Model->DeleteData('tbl_ignored','id',$check['id'] );

    }

    echo 1; 

    exit;

    }

    

    public function undo_ignored_profile()

    {

    $data['sender_id'] =  $this->session->userdata('user_id');

    $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';

    

    $check = $this->db->select('*')->from('tbl_ignored')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();

    if(!empty($check['id']))

    { 

    $this->General_Model->DeleteData('tbl_ignored','id',$check['id'] );

    }

    echo 1; 

    exit;

    }

    

    public function report_profile()

    {

    $data['sender_id'] =  $this->session->userdata('user_id');

    $data['receiver_id'] =  !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';

    $data['reason'] =  !empty($this->input->post('reason'))?$this->input->post('reason'):'';

    $data['comments'] = !empty($this->input->post('comments'))?$this->input->post('comments'):'';

    if($this->General_Model->AddRecord('tbl_reportprofile', $data))

    {

    echo 1;

    exit;

    }

    }

    

    public function like()

    {

    $data['sender_id'] =  $this->session->userdata('user_id');

    $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';

    

    $check = $this->db->select('*')->from('tbl_like')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();

    

    if(empty($check['like_id']))

    { 

    $this->General_Model->AddRecord('tbl_like', $data); 

    }

    

    else

    {

    $this->General_Model->DeleteData('tbl_like','like_id',$check['like_id'] );

    }

    echo 1; 

    exit;

    }

    

    public function shortlist()

    {

    $data['sender_id'] =  $this->session->userdata('user_id');

    $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';

    $check = $this->db->select('*')->from('tbl_shortlist')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();

    

    if(empty($check['shortlist_id']))

    { 

    $this->General_Model->AddRecord('tbl_shortlist', $data); 

    echo 1;

    exit;

    }

    

    else

    {

    $this->General_Model->DeleteData('tbl_shortlist','shortlist_id',$check['shortlist_id'] );

    echo 0;

    exit;

    }

    }

    

    public function block()

    {

    $data['sender_id'] =  $this->session->userdata('user_id');

    $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';

    $data['complaint'] = !empty($this->input->post('comments'))?$this->input->post('comments'):'';

    $data['reason'] = !empty($this->input->post('reason'))?$this->input->post('reason'):'';

    

    $check = $this->db->select('*')->from('tbl_block')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();

    if(empty($check['interest_id']))

    { 

    $this->General_Model->AddRecord('tbl_block', $data); 

    }

    else

    {

    $this->General_Model->DeleteData('tbl_block','interest_id',$check['interest_id'] );

    }

    echo 1; 

    exit;

    }



    public function contact()

    {

    $data['sender_id'] =  $this->session->userdata('user_id');

    $data['receiver_id'] = !empty($this->input->post('receiver_id'))?$this->input->post('receiver_id'):'';

    $data['plan_id'] = $this->General_Model->current_planID($this->session->userdata('user_id'))['plan_id'];

    

    $check = $this->db->select('*')->from('tbl_contact_viewed')->where('receiver_id',$data['receiver_id'])->where('sender_id',$data['sender_id'])->get()->row_array();

    

    if(empty($check['contact_viewed_id']))

    { 

    $this->General_Model->AddRecord('tbl_contact_viewed', $data);

    }

    else

    {

    $updatedata = array('updatedate' =>date('Y-m-d H:i:s'));

    $this->General_Model->UpdateData('tbl_contact_viewed','contact_viewed_id', $check['contact_viewed_id'] ,$updatedata);

    }

    echo 1; 

    exit;

    }



    public function explore()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    if ($this->uri->uri_string() == 'user/explore')

    {

    redirect('explore');

    }

    

    $Details['sender_id'] = $UserID;

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    $data['ExpressedByOthers'] =  $this->db->select('tbl_interest.*')->from('tbl_interest')->join('tbl_registration r','r.id = tbl_interest.sender_id ')

                                  ->where('r.status',1)->where('r.deleted',0)->where('r.deactivate',0)->where('receiver_id',$UserID)->get()->result();

                                

    $data['Expressedbyme'] =  $this->db->select('*')->from('tbl_interest')->join('tbl_registration r','r.id = tbl_interest.receiver_id','left')->where('r.deleted',0)

                              ->where('r.status',1)->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

                             

    $data['accepted_list'] =  $this->db->select('tbl_interest.*')->from('tbl_interest')->join('tbl_registration r','r.id = tbl_interest.receiver_id','left')

                              ->join('tbl_registration rg','rg.id = tbl_interest.sender_id','left')->where('tbl_interest.status',1)

                              ->where('rg.deleted',0)->where('rg.deactivate',0)->where('r.deleted',0)->where('r.deactivate',0)

                              ->where('r.status',1)->where('rg.status',1)->where("(sender_id=$UserID OR receiver_id=$UserID)")->get()->result();

                              

    $data['rejected_list'] =  $this->db->select('*')->from('tbl_interest')->join('tbl_registration r','r.id = tbl_interest.receiver_id','left')

                              ->join('tbl_registration rg','rg.id = tbl_interest.sender_id','left')->where('tbl_interest.status',2)

                              ->where('rg.deleted',0)->where('rg.deactivate',0)->where('r.deleted',0)->where('r.deactivate',0)->where('r.status',1)

                              ->where('rg.status',1)->where("(receiver_id=$UserID OR sender_id=$UserID)")->get()->result();

                              

    $payment_data=$this->db->select('*')->from('tbl_payement')->where('user_id',$UserID)->get();

    

    if($payment_data->num_rows()!=0)

    {

    $data['Myviewedlist'] = $this->db->select('*')->from('tbl_viewed_profiles')->join('tbl_registration r','r.id = tbl_viewed_profiles.receiver_id','left')

                            ->where('r.deleted',0)->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

                            

    $data['Myvisitors'] =   $this->db->select('*')->from('tbl_viewed_profiles')->join('tbl_registration r','r.id = tbl_viewed_profiles.sender_id','left')

                            ->where('r.deleted',0)->where('r.deactivate',0)->where('receiver_id',$UserID)->get()->result();

    $data['Mycontactviewedlist'] = $this->db->select('*')->from('tbl_contact_viewed')->join('tbl_registration r','r.id = tbl_contact_viewed.receiver_id','left')

                                   ->where('r.deleted',0)->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

                                   

    $data['Mycontactvisitors'] =  $this->db->select('*')->from('tbl_contact_viewed')->join('tbl_registration r','r.id = tbl_contact_viewed.sender_id','left')

                                  ->where('r.deleted',0)->where('r.deactivate',0)->where('receiver_id',$UserID)->get()->result();

    }

    

    $data['Shortlist'] =     $this->db->select('*')->from('tbl_shortlist')->join('tbl_registration r','r.id = tbl_shortlist.receiver_id','left')->where('r.deleted',0)

                             ->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

    $data['Ignorelist'] =     $this->db->select('*')->from('tbl_ignored')->join('tbl_registration r','r.id = tbl_ignored.receiver_id','left')->where('r.deleted',0)

                              ->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

    $this->load->view('explore',$data);

    }



    public function explore_gotonikah()

    {

    $UserID = $this->session->userdata('user_id');

    

    if(empty($UserID))

    { 

    redirect('user/logout_gotonikah');

    }

    

    $Details['sender_id'] = $UserID;

    $data['payment_done'] = $this->General_Model->payment_done($UserID);



    $data['ExpressedByOthers'] =     $this->db->select('tbl_interest.*')->from('tbl_interest')->join('tbl_registration r','r.id = tbl_interest.sender_id ')

    ->where('r.status',1)->where('r.deleted',0)->where('r.deactivate',0)->where('receiver_id',$UserID)->get()->result();



    $data['Expressedbyme'] =     $this->db->select('*')->from('tbl_interest')->join('tbl_registration r','r.id = tbl_interest.receiver_id','left')->where('r.deleted',0)

    ->where('r.status',1)->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

    $data['accepted_list'] =     $this->db->select('tbl_interest.*')->from('tbl_interest')->join('tbl_registration r','r.id = tbl_interest.receiver_id','left')

    ->join('tbl_registration rg','rg.id = tbl_interest.sender_id','left')->where('tbl_interest.status',1)->where('rg.deleted',0)->where('rg.deactivate',0)->where('r.deleted',0)

    ->where('r.deactivate',0)->where('r.status',1)->where('rg.status',1)->where("(sender_id=$UserID OR receiver_id=$UserID)")->get()->result();

    $data['rejected_list'] =     $this->db->select('*')->from('tbl_interest')->join('tbl_registration r','r.id = tbl_interest.receiver_id','left')

    ->join('tbl_registration rg','rg.id = tbl_interest.sender_id','left')->where('tbl_interest.status',2)->where('rg.deleted',0)->where('rg.deactivate',0)

    ->where('r.deleted',0)->where('r.deactivate',0)->where('r.status',1)->where('rg.status',1)->where("(receiver_id=$UserID OR sender_id=$UserID)")->get()->result();

    $payment_data=$this->db->select('*')->from('tbl_payement')->where('user_id',$UserID)->get();

    

    if($payment_data->num_rows()!=0)

    {

    $data['Myviewedlist'] =     $this->db->select('*')->from('tbl_viewed_profiles')->join('tbl_registration r','r.id = tbl_viewed_profiles.receiver_id','left')->where('r.deleted',0)->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

    $data['Myvisitors'] =     $this->db->select('*')->from('tbl_viewed_profiles')->join('tbl_registration r','r.id = tbl_viewed_profiles.sender_id','left')->where('r.deleted',0)->where('r.deactivate',0)->where('receiver_id',$UserID)->get()->result();

    $data['Mycontactviewedlist'] =     $this->db->select('*')->from('tbl_contact_viewed')->join('tbl_registration r','r.id = tbl_contact_viewed.receiver_id','left')->where('r.deleted',0)->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

    $data['Mycontactvisitors'] =     $this->db->select('*')->from('tbl_contact_viewed')->join('tbl_registration r','r.id = tbl_contact_viewed.sender_id','left')->where('r.deleted',0)->where('r.deactivate',0)->where('receiver_id',$UserID)->get()->result();

    }

    $data['Shortlist'] =     $this->db->select('*')->from('tbl_shortlist')->join('tbl_registration r','r.id = tbl_shortlist.receiver_id','left')->where('r.deleted',0)->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

    $data['Ignorelist'] =     $this->db->select('*')->from('tbl_ignored')->join('tbl_registration r','r.id = tbl_ignored.receiver_id','left')->where('r.deleted',0)->where('r.deactivate',0)->where('sender_id',$UserID)->get()->result();

   

    $this->load->view('explore_gotonikah',$data);

    }



    public function exploredatas()

    { 

    $UserID = $this->session->userdata('user_id');

    $Details['sender_id'] = $UserID;

    $type = $this->input->post('type');

    $option = $this->input->post('option');

    

    if($type == 1 && $option == 1)

    {

    $InterestExpressed =   $this->db->select('*')->from('tbl_interest')->where('receiver_id',$UserID)->get()->result();

    }

    

    else if($type == 2 && $option == 1)

    {

    $InterestExpressed =   $this->db->select('*')->from('tbl_interest')->where('sender_id',$UserID)->get()->result();

    }

    ?>

    

    <div class="owl-stage-outer">

    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 721px;">

    

    <?php  foreach ($InterestExpressed as $key )

    { 

    

    $UserID = $key->receiver_id;

    $ProfileDetails = $this->General_Model->GetProfileDetails($UserID);

    

    ?>

    

    <div class="owl-item active" style="width: 215.333px; margin-right: 25px;"><div class="item">

    <a href="#">

    <div class="proLstBox">

    

    <?php if(empty($ProfileDetails['photo']))

    { 

    if($ProfileDetails['gender']== 1)

    { 

    ?>

    <img src="<?php echo base_url('/assets/photo_storage/male.jpg'); ?>" alt="profile image" class="proImg">

    <?php }

    

    else if($ProfileDetails['gender']== 2)

    { 

    ?>

    <img src="<?php echo base_url('/assets/photo_storage/female.jpg'); ?>" alt="profile image" class="proImg">

    <?php }

    } 

    else{ ?>

    <img src="<?php echo base_url('/assets/photo_storage/'.$ProfileDetails['photo']); ?>" alt="profile image" class="proImg">

    <?php } ?>

    

    <div class="overlay">

    </div>

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

    

    if(!empty($ProfileDetails['user_caste']) && $ProfileDetails['user_caste'] !='NULL')

    { 

    echo ',';

    echo $ProfileDetails['user_caste']; 

    } 

    ?>

    </span>

    <span class="proDtls">

        

    <?php 

    if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL' && !empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL')

    { 

    echo $ProfileDetails['native_place']; 

    echo ',';

    echo $ProfileDetails['district']; 

    }

    

    else if(!empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] !='NULL')

    { 

    echo ',';

    echo $ProfileDetails['native_place']; 

    } 

    else if(!empty($ProfileDetails['district']) && $ProfileDetails['district'] !='NULL')

    { 

    echo ',';

    echo $ProfileDetails['district']; 

    }?>

    

    </span>

    </div>

    </div>

    </div>

    </div>

    </a>

    </div>

    </div>

    

    <?php }  

    if(count($InterestExpressed) == 0)

    { ?>

    

    <div class="tab-pane fade active show" id="pills-intrestSent" role="tabpanel" aria-labelledby="pills-profile-tab">

    <div class="cmpltProfileBox">

    <img src="http://[::1]/nikah/assets/images/heart.png">

    <h3>Profile Visits</h3>

    <p>People who have interested you, will appear here. Complete your Profile to increase your chances.</p>

    </div>

    </div>

    </div>

    </div>

    <?php }

    }

    

    public function featured_profiles()

    {

    $offset = $_GET['offset'];

    

    if(empty($offset))

    { 

    $offset = ''; 

    }

    

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

    $Details['family_type'] = (!empty($partner_preference->partner_familytype) && $partner_preference->partner_familytype != 'NULL'? $partner_preference->partner_familytype : '');

    $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

    $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

    

    $ignoredids=array();

    

    foreach ($ignored_profiles as $key)

    {

    $ignoredids[]= $key->receiver_id;

    }

    $Details['ignored_profiles']=$ignoredids;

    

    $blockedids=array();

    foreach ($blocked_profiles as $key)

    {

    $blockedids[]= $key->receiver_id;

    }

    

    $Details['blocked_profiles']=$blockedids;

    

    $config = array();

    $config["base_url"] = base_url() . "home";

    $config["total_rows"] = $this->General_Model->getmatchingprofilesHome('',$Details,1);

    $config["per_page"] = DATALIMIT;

    $config["uri_segment"] = 3;

    

    $this->pagination->initialize($config);      

    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

    $data["links"] = $this->pagination->create_links();     

    $MatchingProfiles = $this->General_Model->getmatchingprofilesHome($offset,$Details);

    

    $data['MatchingProfiles'] =$MatchingProfiles;

    

    

    $count = 1;

    $data['MatchingProfilesCount'] = $this->General_Model->getmatchingprofilesHome($offset,$Details,$count);

    $this->load->view('search',$data);

    }



    public function change_password()

    {

    if ($this->uri->uri_string() == 'user/change_password') 

    {

    redirect('change_password');

    }

    $this->load->view('change_password');

    }

    

    

    public function change_password_gotonikah()

    {

    $this->load->view('change_password_gotonikah');

    }

    

    public function help_support()

    {

    $UserID = $this->session->userdata('user_id');

    $data['payment_done'] = $this->General_Model->payment_done($UserID);

    

    if(empty($UserID))

    { 

    redirect('logout');

    }

    

    if ($this->uri->uri_string() == 'user/help_support') 

    {

    redirect('help_support');

    } 


  $user_id_new = $this->session->userdata('user_id_admin');  // Get the user_id from session

// Check if the user_id is valid
if (empty($UserID)) {
    // Handle the error, for example, redirect to an error page or log the issue
   
} else {
    // Prepare the log data
    $log_data = array(
        'sender_id' => $UserID,  // Ensure sender_id is not NULL
        'date' => date('Y-m-d H:i:s'),
    );

    // Insert data into tbl_payment_viewed table
    $this->db->insert('tbl_payment_viewed', $log_data);

    // Optionally, you can log success or return a confirmation
    // log_message('info', 'Payment viewed logged for user: ' . $UserID);
}

    

    $this->load->view('help-support',$data);

    } 

    

    public function help_support_gotonikah()

    {

        $UserID = $this->session->userdata('user_id');

        $data['payment_done'] = $this->General_Model->payment_done($UserID);

        

        if(empty($UserID))

        { 

        redirect('user/logout_gotonikah');

        }

        

        $this->load->view('help-support-gotonikah',$data);

    }

    

    public function feedback($message="")

    {

        $data['message']=$message;

        $UserID = $this->session->userdata('user_id');

        

        if(empty($UserID))

        { 

        redirect('logout');

        }

        

        if ($this->uri->uri_string() == 'user/feedback') 

        {

        redirect('feedback');

        }

        

        $this->load->view('feedback',$data);

    }

    

    public function doorstep_collection()

    {        

        $UserID = $this->session->userdata('user_id');

        $data['name']=$this->input->post('name');

        $data['isd']=$this->input->post('isd');

        $data['pay_amount']=$this->input->post('pay_amount');

        $data['phone']=$this->input->post('phone');

        $data['address']=$this->input->post('address');

        $data['user_id']=$UserID;

        $data['cdate']= date('Y-m-d');

        $this->General_Model->AddRecord('tbl_doorsteppayment', $data);

        // $update_data = [
        // 'direct' => 98
        // ];
        // $this->db->where('id', $UserID);
        // $this->db->update('tbl_registration', $update_data);


        // echo 1;

        // exit;

    }

    

    

    public function settings()

    {

        $UserID = $this->session->userdata('user_id');

        if(empty($UserID))

        { 

        redirect('logout');

        }

        

        if ($this->uri->uri_string() == 'user/settings')

        {

        redirect('settings');

        }

        

        $data['payment_done'] = $this->General_Model->payment_done($UserID);

        $hide_data = $this->General_Model->GetFullData('tbl_registration','id',$UserID);

        $delete_data = $this->General_Model->GetFullData('tbl_profiledelete_request','user_id',$UserID);

        $alert_data = $this->General_Model->GetFullData('tbl_user_alerts','user_id',$UserID);

        $data['hide_data']=$hide_data;

        $data['delete_data']=$delete_data;

        foreach($alert_data as $vals)

        {

        $vals=$vals->alerts; 

        }

       

        $alert_data=explode(",",$vals);

        $data['alert_data']=$alert_data;

        $this->load->view('settings',$data);

    }

    

    public function settings_gotonikah()

    {

        $UserID = $this->session->userdata('user_id');

        if(empty($UserID))

        { 

        redirect('user/logout');

        }

        $data['payment_done'] = $this->General_Model->payment_done($UserID);



        $hide_data = $this->General_Model->GetFullData('tbl_registration','id',$UserID);

        $delete_data = $this->General_Model->GetFullData('tbl_profiledelete_request','user_id',$UserID);

        $alert_data = $this->General_Model->GetFullData('tbl_user_alerts','user_id',$UserID);

        $data['hide_data']=$hide_data;

        $data['delete_data']=$delete_data;

        foreach($alert_data as $vals)

        {

        $vals=$vals->alerts; 

        }

       

        $alert_data=explode(",",$vals);

        $data['alert_data']=$alert_data;

        $this->load->view('settings_gotonikah',$data);

    }

    

    public function upgradeto_premium($assisted=0)

    {

    $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan",'assisted','0');

    $data['assisted']=$assisted;

    $data['assisted_plan'] = $this->General_Model->GetFullData($table = "tbl_plan",'assisted','1');

    

    if ($this->uri->uri_string() == 'user/upgradeto_premium') 

    {

    redirect('upgradeto_premium');

    }

    $this->load->view('upgradeto_premium',$data);

    }

    

    public function upgradeto_premium_gotonikah($assisted=0)

    {

    $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan",'assisted','0');

    $data['assisted']=$assisted;

    $data['assisted_plan'] = $this->General_Model->GetFullData($table = "tbl_plan",'assisted','1');

    $this->load->view('upgradeto_premium_gotonikah',$data);

    }



    public function payment_methods()

    {

    $data['amount']=$this->input->post('planamount');

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    

    if ($this->uri->uri_string() == 'user/payment_methods') 

    {

    redirect('payment_methods');

    }

    

    $planid=$this->input->post('plan_id');

    $user_id=$this->session->userdata('user_id');



    if(!empty($user_id))

    {

          $this->db->select('*');

          $this->db->from('tbl_payment_viewed');

          $this->db->where('sender_id',$user_id);

          $query = $this->db->get();

          $querydata =array();

          $querydata=$query->row_array();

        

        if($query->num_rows()>0)

        {

        $log_data2 = array(

        'sender_id' => $user_id,

        'planid' => $planid,

        'date'=>date('Y-m-d H:i:s'),

        'visit_count'=>$querydata['visit_count']+1

        ); 

        $this->db->where('sender_id',$user_id);

        $this->db->update('tbl_payment_viewed',$log_data2); 

        }

        else

        {

        $log_data = array(

        'sender_id' => $user_id,

        'planid' => $planid,

        'visit_count'=>'1'

        );

        $this->db->insert('tbl_payment_viewed',$log_data);   


       
        $update_data = [
        'direct' => 98
        ];
        $this->db->where('id', $user_id);
        $this->db->update('tbl_registration', $update_data);

        
        }

         

    }

    $this->load->view('paymentMethods',$data);

    }

    

    public function likes()

    {

        $offset = $_GET['offset'];

        

        if(empty($offset))

        { 

        $offset = '';

        }

        

        $UserID = $this->session->userdata('user_id');

        $Details['sender_id'] = $UserID;

        $data['liked_profiles'] = $this->General_Model->liked_profiles($offset,$Details);

        $count = 1;

        $data['liked_profilesCount'] = $this->General_Model->liked_profiles($offset,$Details,$count);

        $this->load->view('likes',$data);

    }



    public function interest_expressed()

    {

        $offset = $_GET['offset'];

        

        if(empty($offset))

        { 

        $offset = ''; 

        }

        

        $UserID = $this->session->userdata('user_id');

        $Details['sender_id'] = $UserID;

        $data['InterestExpressed'] = $this->General_Model->interestexpressed($offset,$Details);

        $count = 1;

        $this->load->view('interest_expressed',$data);

    }



    public function uploadphoto()

     { 

        $imagevalue = $this->input->post('imagevalue');

        $userid = $this->session->userdata('user_id');

        $picnum = $this->input->post('picnum');

        $type = $this->input->post('type');

        

        

        if($picnum >= 3)

        {

          echo 0;

        }

        else

        {

             

        $imagenewname = $userid . mt_rand(1111, 9999) . date('Y-m-d') . '.jpg';

        $base64img = str_replace('data:image/jpeg;base64,', '', $imagevalue);

        $base64img = str_replace(' ', '+', $base64img);

        $data = base64_decode($base64img);

    

        $tempFilePath = 'assets/photo_storage/' . $imagenewname;

        file_put_contents($tempFilePath, $data);

        

        $watermarkImagePath = 'assets/images/hn_wtrmark.png';

        $watermarkImg = imagecreatefrompng($watermarkImagePath);

        $im = imagecreatefromjpeg($tempFilePath);

    

        $marge_right = 10;

        $marge_bottom = 280;

    

        $sx = imagesx($watermarkImg);

        $sy = imagesy($watermarkImg);

    

        imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));

    

        imagejpeg($im, $tempFilePath);

        imagedestroy($im);

       

        if($picnum==0)

        {

        

        $uploaddata = array(

        'user_id' => $userid,

        'user_image' => $imagenewname,

        'piccount'=>1,

        'datetime'=>date('Y-m-d H:i:s'),

        );

        $this->General_Model->AddRecord('tbl_userimages',$uploaddata);

        }

          

        if($picnum==1)

        {

        

        $uploaddata2 = array(

        'user_id' => $userid,

        'user_image' => $imagenewname,

        'piccount'=>2,

        'datetime'=>date('Y-m-d H:i:s'),

        );

        $this->General_Model->AddRecord('tbl_userimages',$uploaddata2);

        }

        

        if($picnum==2)

        {

        

        $uploaddata3 = array(

        'user_id' => $userid,

        'user_image' => $imagenewname,

        'piccount'=>3,

        'datetime'=>date('Y-m-d H:i:s'),

        );

        $this->General_Model->AddRecord('tbl_userimages',$uploaddata3);

        }

        

        if($picnum==3)

        {

        

        $uploaddata4 = array(

        'user_id' => $userid,

        'user_image' => $imagenewname,

        'piccount'=>4,

         'datetime'=>date('Y-m-d H:i:s'),

        );

        $this->General_Model->AddRecord('tbl_userimages',$uploaddata4);

        }

        

        if($picnum == 0)

        {

        $data = array(

        'photo' => $imagenewname

        );

        $this->General_Model->UpdateData('tbl_registration','id',$userid,$data);

        

        $_SESSION['photo'] =  $imagenewname;

        }



     

        } 

       



        if($type == 1)

        {

        

        echo base_url().'assets/photo_storage/'.$imagenewname;

        

        }

        else

        {

        

        echo '<div class="col-6 col-sm-4 col-md-6 col-lg-4">

        <div class="proUpldedImg">

        <img src="'.base_url().'assets/photo_storage/'.$imagenewname.'" alt="profile image" class="proImg">

        </div>

        </div>';

        }                  

        

   

        }



    public function uploadtophotostorage($file_path)

    {

        

    $uploadUrl = "https://happynikah.azurewebsites.net/api/Files/photo_storage";

    $ch = curl_init();



    curl_setopt_array($ch, array(

    CURLOPT_URL => $uploadUrl,

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_SSL_VERIFYPEER => false,

    CURLOPT_POST => true,

    CURLOPT_POSTFIELDS => array(

    'FileDetail' => new CURLFile($file_path, 'image/jpeg', basename($file_path))

    ),

    ));



    $response = curl_exec($ch);

    curl_close($ch);



    return json_decode($response, true);

    }



    public function uploadtocrop($file_path) 

    {

    $uploadUrl = "https://happynikah.azurewebsites.net/api/Files/crop_image";

    $ch = curl_init();



    curl_setopt_array($ch, array(

    CURLOPT_URL => $uploadUrl,

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_SSL_VERIFYPEER => false,

    CURLOPT_POST => true,

    CURLOPT_POSTFIELDS => array(

    'FileDetail' => new CURLFile($file_path, 'image/jpeg', basename($file_path))

    ),

    ));



    $response = curl_exec($ch);

    curl_close($ch);



    return json_decode($response, true);

    }



    public function resizeImage($imagenewname,$imagevalue)



    {

 

        $percent = 0.5;



            $base64img = str_replace('data:image/jpeg;base64,', '', $imagevalue);

            $base64img = str_replace(' ', '+', $base64img);

            $data = base64_decode($base64img);

            $newfilename = 'assets/photo_storage_thumb/'.$imagenewname;

            file_put_contents($newfilename, $data);

            $watermarkImagePath = 'hn_wtrmark.png';

            $watermarkImg = imagecreatefrompng('assets/images/'.$watermarkImagePath); 

            $im = imagecreatefromjpeg('assets/photo_storage_thumb/'.$imagenewname);

            

          

            $marge_right = 0; 

            $marge_bottom = 0;

            $sx = imagesx($watermarkImg); 

            $sy = imagesy($watermarkImg);

            imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));

            

           imagejpeg($im, $newfilename);

           $width = imagesx($im);

           $height = imagesy($im);

           $newwidth = $width * $percent;

           $newheight = $height * $percent;

       

           $thumb = imagecreatetruecolor($newwidth, $newheight);

       

           // Resize

           imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

       

           // Output

           imagejpeg($thumb,$newfilename);

            imagedestroy($thumb);

 

    }

    

   public function blur_images($imagenewname,$imagevalue)

   {

        /*$base64img = str_replace('data:image/jpeg;base64,', '', $imagevalue);

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

        imagedestroy($im);*/

        $path="assets/photo_storage/".$imagenewname;

          $image = new Imagick($path);                  

                header('Content-type: image/jpeg');

                // Use blurImage function

                $image->blurImage(20, 10);

               

              //  $imagenewname = $userid.mt_rand(1111,9999).date('Y-m-d').'.jpg';

          

          $newfilename = 'assets/photo_storage_blur/'.$imagenewname;

                file_put_contents($newfilename, $image);

                

                //watermark

                // Load the stamp and the photo to apply the watermark to

          $watermarkImagePath = 'hn_wtrmark.png';

          $watermarkImg = imagecreatefrompng('assets/images/'.$watermarkImagePath); 

          $im = imagecreatefromjpeg('assets/photo_storage_blur/'.$imagenewname);

          // Set the margins for the stamp and get the height/width of the stamp image



          $marge_right = 10; 

          $marge_bottom = 280; 

           

          $sx = imagesx($watermarkImg); 

          $sy = imagesy($watermarkImg); 

          // Copy the stamp image onto our photo using the margin offsets and the photo 

// width to calculate positioning of the stamp. 



          imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));

          header('Content-type: image/jpeg');

          imagejpeg($im, $newfilename);

   }



   public function deleteprofilepic()

   {

        $image_id = $this->input->post('image_id');

        $this->General_Model->DeleteData('tbl_userimages','user_image_id',$image_id);

        

        $userid = $this->session->userdata('user_id');

        

        $check = $this->db->select('*')->from('tbl_userimages')->where('user_id',$userid)->get()->num_rows();

         

        if($check == 0)

        {

        $data = array('photo' => '');

        

        $this->General_Model->UpdateData('tbl_registration','id',$userid,$data);

        $_SESSION['photo'] = '';

        }

        echo 1;

   }

   

   public function setprofilepic()

   {

        $image = $this->input->post('image');

        $imageid = $this->input->post('imageid');

        $userid = $this->session->userdata('user_id');

        $data = array('photo' => $image);

        $this->General_Model->UpdateData('tbl_registration','id',$userid,$data);

        $_SESSION['photo'] = $image;

        $imageDetails['profile_pic'] = 0;

        $this->General_Model->UpdateData($table = 'tbl_userimages',$column_name = 'user_id',$userid,$imageDetails);

        $imageDetails['profile_pic'] = 1;

        $this->General_Model->UpdateData($table = 'tbl_userimages',$column_name = 'user_image_id',$imageid,$imageDetails);

        echo '<img src="'.base_url().'assets/photo_storage/'.$image.'" alt="profile image" class="proImg" style="width:100%;">';

        

   }



   public function interestaction()

   {

    $type = $this->input->post('type');

    $senderid = $this->input->post('senderid');

    $receiverid = $this->input->post('receiverid');

    $data = array('status'=>$type,'statusdate'=>date('Y-m-d'));

    

    $this->db->where('sender_id',$senderid);

    $this->db->where('receiver_id',$receiverid);

    $this->db->update('tbl_interest',$data);

    $uname=$this->session->userdata('name');

    

    if($type==1)

    {

    $message=$uname." Accepted your Request.";

    $notification_type=2;

    }

    

    else if($type==2)

    {

    $message=$uname." Declined your Request.";

    $notification_type=3;

    }

    

    $alert_data = $this->General_Model->GetFullData('tbl_user_alerts','user_id',$receiverid);

    $vals=$alert_data[0];

    $receiver_data = $this->General_Model->GetFullData('tbl_registration','id',$receiverid);

    $vals1=$receiver_data[0];

    $alerts=explode(",",$vals->alerts); 

    

    if(in_array("1",$alerts))

    {

    $to_email = $vals1->mail;

    $subject = 'Matrimony Profile Request Response';

    $message = $message;

    $headers = 'From: Happy Nikah <info@happynikah.com>';

    mail($to_email,$subject,$message,$headers);

    }

    

    else if(in_array("2",$alerts))

    {

    }

    

    else if(in_array("3",$alerts))

    {

    $result = $this->General_Model->GetFullData('tbl_firebase_token','user_id',$receiverid);

    $vals=$result[0];

    $token=$vals->firebase_token;

    

    $res= $this->noti($token, array(

    "title" => "Message From ".$uname,

    "body" => $message,

    "user_id"=>$receiverid,

    "sender_id"=>$senderid,

    "noti_type1"=>"notification",));

    }

    $datas = array(

    'sender_id' => $senderid,

    'receiver_id' => $receiverid,

    'notification_type'=>$notification_type,

    'date'=>date('Y-m-d'),

    );

    $this->General_Model->AddRecord('tbl_notification',$datas);

    

    echo 1;

    }



   public function changepassword()

   {

       

       $opassword = $this->input->post('opassword');

       $password = $this->input->post('password');

       $cpassword = $this->input->post('cpassword');

       $userid = $this->session->userdata('user_id');

       

       $check = $this->db->select('*')->from('tbl_userlogin')->where('user_id',$userid)->get()->row_array();

       

        if($check['password'] == md5($opassword))

        {

        

        if($cpassword == $password)

        {

        $data = array('password'=>md5($password),'originalpass'=>$password);

        $this->db->where('user_id',$userid);

        $this->db->update('tbl_userlogin',$data);

        $this->session->set_flashdata('sucess', 'This is test message');

        

        }

        else

        {

        $this->session->set_flashdata('pass_mismatch', 'This is test message');

        }

        }

        

        else

        {

        $this->session->set_flashdata('pass_mismatch_old', 'This is test message');

        }

        redirect('user/change_password');

        

        }

        

       public function changepassword_gotonikah()

        {

       

       $opassword = $this->input->post('opassword');

       

       $password = $this->input->post('password');

       

       $cpassword = $this->input->post('cpassword');

       

       $userid = $this->session->userdata('user_id');

       

       $check = $this->db->select('*')->from('tbl_userlogin')->where('user_id',$userid)->get()->row_array();

       

       

       if($check['password'] == md5($opassword))

       {

        

        if($cpassword == $password)

        {

                $data = array('password'=>md5($password),'originalpass'=>$password);

                $this->db->where('user_id',$userid);

                $this->db->update('tbl_userlogin',$data);

                $this->session->set_flashdata('sucess', 'This is test message');

                

            }

            else

            {

                

                $this->session->set_flashdata('pass_mismatch', 'This is test message');

            }

       }

       

        else

        {

        

        $this->session->set_flashdata('pass_mismatch_old', 'This is test message');

        

        }

        

        redirect('user/change_password_gotonikah');

        

        }

   

   public function submit_setting()

    {

        $user_id = $this->input->post('user_id');

        $data['photopassword'] = $this->input->post('photopassword');

        $data['showtoexpress'] = $this->input->post('showtoexpress');

        $data['showtopremium'] = $this->input->post('showtopremium');

        $data['photo_visibility'] = $this->input->post('photo_protection');

        if($this->input->post('photo_protection')==1)

        {

        $datas="Your photo has been protected..";

        }

        else

        {

            $datas="Your photo visibility has been changed to public..";

        }



        $this->General_Model->UpdateData('tbl_registration','id',$user_id,$data);

        echo $datas;

    }



    public function photorequest()

    {

        $data['sender_id'] = $this->session->userdata('user_id');

        $data['receiver_id'] = $this->input->post('receiver_id');

        $data['date'] = date('Y-m-d');

        $data['status'] = '0';



        $this->General_Model->AddRecord('tbl_photorequest',$data);

        $uname=$this->session->userdata('name');

       

        $message=$uname." Requested your Photo.";

        $notification_type=4;

   

    $alert_data = $this->General_Model->GetFullData('tbl_user_alerts','user_id',$this->input->post('receiver_id'));

    $vals=$alert_data[0];

    $receiver_data = $this->General_Model->GetFullData('tbl_registration','id',$this->input->post('receiver_id'));

    $vals1=$receiver_data[0];

    $alerts=explode(",",$vals->alerts); 

    if(in_array("1",$alerts))

    {

        $to_email = $vals1->mail;

        $subject = 'Photo request';

        $message = $message;

        $headers = 'From: Happy Nikah <info@happynikah.com>';

        mail($to_email,$subject,$message,$headers);

    }

    else if(in_array("2",$alerts))

    {

    

    }

    else if(in_array("3",$alerts))

    {

        $result = $this->General_Model->GetFullData('tbl_firebase_token','user_id',$this->input->post('receiver_id'));

        $vals=$result[0];

        $token=$vals->firebase_token;

        

        //$device_token = 'cucm31G_UU4e7N_k8zs_xc:APA91bGp6by4GqxJ9beOW40v2Z2fpHfyTRw4yj2hy435LII1NG_IpUkAgqauCTfqcEhiLaCpMPd3VpQjcy8yk0X_b9kngrWeQi730599sVdK1-ta2J9k8FOaD-tOWdDItc6w1md3bTYe';

        

        $res= $this->noti($token, array(

        "title" => "Message From ".$uname,

        "body" => $message,

        "user_id"=>$this->input->post('receiver_id'),

        "sender_id"=>$this->session->userdata('user_id'),

        "noti_type1"=>"notification",            

        ));

    }

        $datas = array(

        'sender_id' => $this->session->userdata('user_id'),

        'receiver_id' => $this->input->post('receiver_id'),

        'notification_type'=>$notification_type,

        'dat

        e'=>date('Y-m-d'),

        );

    $this->General_Model->AddRecord('tbl_notification',$datas);

    echo 1;

    }

    

    public function logn()

    {

    // if(!empty($_SESSION['user_id'])){  redirect('user/home'); }

    // $data['homeprofiles'] = $this->General_Model->gethomeprofiles();

    

    if ($this->uri->uri_string() == 'user/logn') 

    {

    redirect('logn');

    }

    

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    $_SESSION['reg_login']=1;

    $this->load->view('home2', $data);

    }

    

    public function muslim_matrimony()

    {

    // if(!empty($_SESSION['user_id'])){  redirect('user/home'); }

    // $data['homeprofiles'] = $this->General_Model->gethomeprofiles();

    

    if ($this->uri->uri_string() == 'user/muslim_matrimony') 

    {

    redirect('muslim_matrimony');

    }

    

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    $_SESSION['reg_login']=1;

    $this->load->view('muslim_matrimony', $data);

    }

    

    

    public function matrimony()

    {

  

    

    if ($this->uri->uri_string() == 'user/matrimony') 

    {

    redirect('matrimony');

    }

    

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    $_SESSION['reg_login']=1;

    $this->load->view('matrimony', $data);

    }

    

    

    

    public function apps_store()

    {

    // if(!empty($_SESSION['user_id'])){  redirect('user/home'); }

    // $data['homeprofiles'] = $this->General_Model->gethomeprofiles();

    

    if ($this->uri->uri_string() == 'user/apps_store') 

    {

    redirect('apps_store');

    }

    

    $userID =  $this->session->userdata('user_id');

    

   

    $data['userdetails'] = $this->General_Model->get_loginuser($userID);

    

    $data['countryCode'] = $this->General_Model->fetch_countrycode();

    $_SESSION['reg_login']=1;

    $this->load->view('apps_store', $data);

    }

        

    public function GetEducation()

    {

    $high_education = $this->input->post('high_education');

    $result = $this->General_Model->GetFullData('tbl_education','high_edu_id',$high_education);

    if($result != "") 

    {

    $data1 = '<option value="">--Select--</option>';

    for ($i = 0; $i < count($result); $i++)

    {

    $data = '<option value = "' . $result[$i]->edu_id . '" textvalue="' . $result[$i]->education . '">' . $result[$i]->education . '</option>';

    

    if(empty($i))

    {

    print_r($data1);

    }

    print_r($data);

    }

    }

    } 

        

    public function GetStates()

    {

    $country = $this->input->post('country');

    $result = $this->General_Model->GetFullData('tbl_states','country_id',$country);

    if($result != "") 

    {

    $data1 = '<option value="">--Select--</option>';

    for($i = 0; $i < count($result); $i++)

    {

    $data = '<option value = "' . $result[$i]->id . '" textvalue="' . $result[$i]->name . '">' . $result[$i]->name . '</option>';

    if(empty($i))

    {

    print_r($data1);

    }

    print_r($data);

    }

    }

    }

    

    public function GetDistrict2()

    {

    $state = $this->input->post('state');

    $result = $this->General_Model->GetFullData('tbl_district','state_id',$state);



    if ($result != "") 

    {

    $data1 = '<option value="">--Select--</option>';

    for ($i = 0; $i < count($result); $i++) 

    {

    $data = '<option value = "' . $result[$i]->district_id . '" textvalue="' . $result[$i]->district . '">' . $result[$i]->district . '</option>';

    if (empty($i)) 

    {

    print_r($data1);

    }

    print_r($data);

    }

    }

    }

    

    public function GetDistrict()

    {

    $states = $this->input->post('states');

    $result = $this->General_Model->GetFullData('tbl_district','state_id',$states);

    if($result != "") 

    {

    $data1 = '<option value="">--Select--</option>';

    for ($i = 0; $i < count($result); $i++) 

    {

    $data = '<option value = "' . $result[$i]->district_id . '" textvalue="' . $result[$i]->district . '">' . $result[$i]->district . '</option>';

    if(empty($i)) 

    {

    print_r($data1);

    }

    print_r($data);

    }

    }

    }

    

    public function GetCity()

    {

    $districts = $this->input->post('districts');

    $result = $this->General_Model->GetFullData('tbl_city','district_id',$districts);

    if ($result != "")

    {

    $data1 = '<option value="">--Select--</option>';

    

    for ($i = 0; $i < count($result); $i++) 

    {

    $data = '<option value = "' . $result[$i]->name . '" textvalue="' . $result[$i]->name . '">' . $result[$i]->name . '</option>';

    if (empty($i)) 

    {

    print_r($data1);

    }

    print_r($data);

    }

    }

    }

    

    public function GetCity2()

    {

    $districts = $this->input->post('districts');

    $result = $this->General_Model->GetFullData('tbl_city','district_id',$districts);

    if ($result != "") 

    {

    $data1 = '<option value="">--Select--</option>';

    for ($i = 0; $i < count($result); $i++)

    {

    $data = '<option value = "' . $result[$i]->name . '" textvalue="' . $result[$i]->name . '">' . $result[$i]->name . '</option>';

    if (empty($i)) 

    {

    print_r($data1);

    }

    print_r($data);

    }

    }

    }

    

    public function update_tablevalues()

    {

    $val=135;

    for($i=1;$i<=10096;$i++)

    {

    $BasicDetails['photo'] = "mProfile1.png";

    $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$i,$BasicDetails);

    $val++;

    }

    }

    

    public function verify_mobile_forlogin()

    {

    $otpdigit1 = $this->input->post('otpdigit1'); 

    $otpdigit2 = $this->input->post('otpdigit2');

    $otpdigit3 = $this->input->post('otpdigit3'); 

    $otpdigit4 = $this->input->post('otpdigit4');

    $otpdigit5 = $this->input->post('otpdigit5');

    $otpdigit6 = $this->input->post('otpdigit6');

    

    $postotp = $otpdigit1.$otpdigit2.$otpdigit3.$otpdigit4.$otpdigit5.$otpdigit6;

    $UserID = $this->session->userdata('usrid');

    

    $verify = $this->General_Model->verify_mobile_forlogin($postotp,$UserID);

    

    if($verify == 1)

    {

    $res = $this->General_Model->otp_login($UserID);

    if($res != 'failure')

    {

    $res1 = $this->General_Model->update_is_login($res['user_id'],"1");

    

    $_SESSION['user_id'] = $res['user_id'];

    $_SESSION['name'] = $res['name'];

    $_SESSION['gender'] = $res['gender'];

    $_SESSION['religion'] = $res['religion'];

    $_SESSION['caste'] = $res['caste'];

    $_SESSION['age'] = $res['age'];

    $_SESSION['status'] = $res['status'];

    $_SESSION['photo'] = $res['photo'];

    $_SESSION['dob'] = $res['dob'];

    $_SESSION['mail'] = $res['mail'];

    $_SESSION['reg_id'] = $res['happynikah_id'];

    $_SESSION['userinfo']['stage'] = $res['stage'];

    

    if($res['stage']==1)

    echo 1;

    elseif($res['stage']==2)

    echo 2;

    elseif($res['stage']==3)

    echo 3;

    elseif($res['stage']==4)

    echo 4;

    else

    echo 5;

    }

    }

    else

    {

    echo 6;

    }

    }

        

    public function hide_profile()

    {

    $hide_status=$this->input->post('hide_status');

    $res = $this->General_Model->hide_profile($hide_status);

    if($res)

    echo 1;

    }

    

    public function delete_profile()

    {

    $delete_data['reason']=$this->input->post('reason');

    $delete_data['comments']=$this->input->post('comments');

    $res = $this->General_Model->delete_profile($delete_data);

    if($res)

    echo 1;

    }

    

    public function add_useralerts()

    {

    $alert_data['alerts']=implode(",",$this->input->post('val'));

    $res = $this->General_Model->update_useralerts($alert_data);

    if($res)

    echo 1;

    }



    public function update_usertoken()

    {

    $result = $this->General_Model->GetFullData('tbl_firebase_token','user_id',$this->session->userdata('user_id'));

    $data['firebase_token']=$this->input->post('user_token'); 

    $tokens=array();

    

    $tokens[]=$this->input->post('user_token');

    $res=$this->send_push_notification($tokens,'What is Push Notification ?','In general, push notifications are the message / notifications you will receive in android. This makes the customers engage with the clients on digital platforms. This service can be initiated in either way form users or from clients. ','https://stackoverlode.com/no-image/image.jpg');

    if(empty($result))

    {

    $data['user_id']=$this->session->userdata('user_id');

    $this->General_Model->AddRecord('tbl_firebase_token', $data);

    echo "Inserted..";

    }

    

    else

    {

    $this->General_Model->UpdateData($table = 'tbl_firebase_token',$column_name = 'user_id',$this->session->userdata('user_id'),$data);

    echo "Updated..";

    }

    }



    public function noti($device_token, $message)

    {

    $SERVER_API_KEY = 'AAAAi6yvty0:APA91bGbeHCnexM6qqd76TJZGgy1oj3UP8-A0GlvwEyjnNz5R7vFbSwEdXciQMTyPOQLDh340o5f1FVo14b0SwxJ2N1CEKfC9CaJTW7ynid7TZXowbVRFSZ7PjIKXgXrNgsUdGuFKC5c';

    

    /* "to" : "notification_key",

    "notification" : {

    "body" : "Body of Your Notification",

    "title": "Title of Your Notification"

    }*/

    

    $data = [

    "to" => $device_token, // for single device id

    "notification" => $message,

    "priority"=>"high",

    ];

    $notification = json_encode($data);

    

    $headers = [

    'Authorization: key=' . $SERVER_API_KEY,

    'Content-Type: application/json',

    ];

    

    $ch = curl_init();

    

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $notification);

    $response = curl_exec($ch);

    shell_exec('curl -X POST --header "Authorization: key=<'.$SERVER_API_KEY.'>" --header "Content-Type: application/json" https://fcm.googleapis.com/fcm/send -d "{\"to\":\"'.$to.'\",\"priority\":\"high\",\"notification\":{\"body\": \"'.stripslashes($message).'\"}}"');

    

    curl_close($ch);

    return $response;

    }





    public function send_push_notification()

    {

    $headers=[

    'Authorization:key=AAAAi6yvty0:APA91bGbeHCnexM6qqd76TJZGgy1oj3UP8-A0GlvwEyjnNz5R7vFbSwEdXciQMTyPOQLDh340o5f1FVo14b0SwxJ2N1CEKfC9CaJTW7ynid7TZXowbVRFSZ7PjIKXgXrNgsUdGuFKC5c',

    'Content-Type: application/json'

    ];

    $data=[  

    'title'=>"ji",

    'body'=>"jh",

    ];

    $notification=[

    'data'=>$data,

    'to'=>'cucm31G_UU4e7N_k8zs_xc:APA91bGp6by4GqxJ9beOW40v2Z2fpHfyTRw4yj2hy435LII1NG_IpUkAgqauCTfqcEhiLaCpMPd3VpQjcy8yk0X_b9kngrWeQi730599sVdK1-ta2J9k8FOaD-tOWdDItc6w1md3bTYe',

    ];

    //$serverkey = 'AAAAi6yvty0:APA91bGbeHCnexM6qqd76TJZGgy1oj3UP8-A0GlvwEyjnNz5R7vFbSwEdXciQMTyPOQLDh340o5f1FVo14b0SwxJ2N1CEKfC9CaJTW7ynid7TZXowbVRFSZ7PjIKXgXrNgsUdGuFKC5c';// this is a Firebase server key 

    

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://fcm.googleapis.com/fcm/send");

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($notification));  //Post Fields

    

    $output = curl_exec ($ch);

    curl_close ($ch);

    print_r($output);

    }



    public function user_chat()

    {

    $userid=$this->session->userdata('user_id');

    

    if(empty($userid))

    { 

    redirect('logout');

    }

    

    if ($this->uri->uri_string() == 'user/user_chat')

    {

    redirect('user_chat');

    }

    

    $chatpartnerid=$this->session->userdata('chat_user');

    $res = $this->General_Model->get_chatusers($userid);

    $payment_done = $this->General_Model->payment_done($userid);

    

    if(empty($payment_done))

    {

    $data['chatstatus']=0;//go to premium

    }

    

    else

    {

    $expiry_date = strtotime($payment_done[0]->expiry_date);

    $today_date = strtotime(date('Y-m-d'));

    $datediff = $today_date - $expiry_date;

    $round_diff = round($datediff/(60*60*24));

    

    if($round_diff < '0')//not expired

    {

    $chat_receivers = $this->General_Model->get_chatsenders($userid,$payment_done[0]->id);

    if(count($chat_receivers) == ($payment_done[0]->messagebalance)+($payment_done[0]->addonmessage))

    {

    $data['chatstatus']=1;//limit reached

    }

    

    else

    {

    $data['chatstatus']=2;//active

    }

    

    }

    else//expired

    {

    $data['chatstatus']=3;//expired

    }

    }

    

    $userlist="";

    

    foreach($res as $vals)

    { 

    

    $res1 = $this->General_Model->get_unread_messages($vals['sender_id']);

    $res2 = $this->General_Model->get_last_message($vals['sender_id']);

    $chatuser=$vals['sender_id'];

    

    if($vals['sender_id']==$userid)

    {

    $chatuser=$vals['id'];

    

    $usertype="Me";  

    }

    

    else

    {

    $userdata = $this->General_Model->get_userdata($vals['sender_id']);

    $usertype=$userdata->name; 

    }

    

    $userlist.='<a href="#" onclick="get_userchatdata('.$chatuser.')">';

    $userlist.='<div class="d-flex justify-content-between align-items-center singleChat active">';

    $userlist.='<div class="d-flex align-items-center">';

    $userlist.='<div class="profImgBoxParent">';

    $userlist.='<div class="profImgBox">';

    

    if(empty($vals['photo']))

    { 

    if($vals['gender']== 1)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" >';

    }

    

    else if($vals['gender']== 2)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }

    

    else

    {

    $photo_status = $this->General_Model->check_photoStatus($vals['photo']);//check if approved or not

    if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)

    {

    //if approved

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals['id'];

    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

    

    if($photo_privacy !=1)

    {// if public

    $file_pointer = 'assets/photo_storage_thumb/'.$vals['photo'];

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">';

    } 

    else

    {

    $file_pointer = 'assets/photo_storage/'.$vals['photo'];

    

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">';

    

    }

    else

    {

    if($vals['gender']== 1)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">';

    }

    else

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }

    

    }

    }

    else

    {

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals['id'];

    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);

    

    if($photo_requeststatus==0)

    {

        

    $file_pointer = 'assets/photo_storage_blur/'.$vals['photo'];

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {

    if($vals['gender']== 1)

    {

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($vals['gender']== 2)

    { 

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    

    else

    {

    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);

    if($photo_requeststatus==1)

    {

    $file_pointer = 'assets/photo_storage_thumb/'.$vals['photo'];

    

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals['photo'].'" alt="profile image">';

    } 

    else

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage/'.$vals['photo'].'" alt="profile image">';

    }

    $userlist.='<div class="overlay"></div>';

    }

    

    else

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals['photo'];

    

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals['photo'].'" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {

    if($vals['gender']== 1)

    { 

    $userlist.='  <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div> <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($key->gender== 2)

    { 

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>  <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    }

    }

    

    }

    

    else 

    { 

    if($vals['gender']== 1)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png"alt="profile image" class="proImg" style="height:100%;">

    <div class="overlay"></div>';

    }

    

    else if($vals['gender']== 2)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg" style="height:100%;">

    <div class="overlay"></div>';

    }

    }

    }

    

    $userlist.='</div>';

    $userlist.='<span class="statusIndictn"></span>';

    $userlist.='</div>';

    $userlist.='<div class="nameTitle">';

    $userlist.='<p class="name">'.$vals['name'].'</p>';

    //  $userlist.='<p>'.$usertype.':'.$res2->messages.'</p>';

    $userlist.='</div>';

    $userlist.='</div>';

    $userlist.='<div class="totMsg">';

    $userlist.=' <span>'.$res1->num_rows().'</span>';

    $userlist.='</div>';

    $userlist.='</div>';

    $userlist.='</a>';

    }

    

    $data['userlist']=$userlist;

    if($chatpartnerid=="")

    {

    if(!empty($res))

    {

    $res3 = $this->General_Model->get_lastchat_list();

    $res3_row=$res3->row();

    if($res3_row->sender_id==$this->session->userdata('user_id'))

    {

    $chatpartner=$res3_row->receiver_id;

    }

    else

    {

    $chatpartner=$res3_row->sender_id;

    }

    $partner_details= $this->General_Model->get_partner_details($chatpartner);

    $vals=$partner_details->row();

    $data['name']=$vals->name;

    $data['id']=$vals->id;

    $data['photo']=$vals->photo;

    $data['gender']=$vals->gender;

    $data['job']=$vals->job;

    $data['page']=$vals->partner_age_from;

    $data['pageto']=$vals->partner_age_to;

    $data['pheight']=$vals->partner_height;

    $data['pheight_to']=$vals->partner_height_to;

    $data['pquali']=$vals->qualification;

    $user_details= $this->General_Model->get_partner_details($userid);

    $vals=$user_details->row();

    $data['uage']=$vals->age;

    $data['uheight']=$vals->height;

    $data['uquali']=$vals->education;

    $data['last_chatlist']=$res3;

    }

    }

    else

    {

    

    $chatpartner=$chatpartnerid;

    $partner_details= $this->General_Model->get_partner_details($chatpartner);

    $res3 = $this->General_Model->get_user_chatlist($userid,$chatpartner);

    

    $vals=$partner_details->row();

    $data['name']=$vals->name;

    $data['id']=$vals->id;

    $data['photo']=$vals->photo;

    $data['gender']=$vals->gender;

    $data['job']=$vals->job;

    $data['page']=$vals->partner_age_from;

    $data['pageto']=$vals->partner_age_to;

    $data['pheight']=$vals->partner_height;

    $data['pheight_to']=$vals->partner_height_to;

    $data['pquali']=$vals->qualification;

    $user_details= $this->General_Model->get_partner_details($userid);

    $vals=$user_details->row();

    $data['uage']=$vals->age;

    $data['uheight']=$vals->height;

    $data['uquali']=$vals->education;

    $data['last_chatlist']=$res3;

    }

    

    $data['user']=$userid;

    $receivers = $this->General_Model->total_receivers($userid);

    $this->load->view('userchat',$data);

    }

        



    public function user_chat_gotonikah()

    {

    $userid=$this->session->userdata('user_id');

    if(empty($userid))

    { 

    redirect('user/logout_gotonikah');

    

    }

    $chatpartnerid=$this->session->userdata('chat_user');

    $res = $this->General_Model->get_chatusers($userid);

    $payment_done = $this->General_Model->payment_done($userid);

    if(empty($payment_done))

    {

    $data['chatstatus']=0;//go to premium

    }

    else

    {

    $expiry_date = strtotime($payment_done[0]->expiry_date);

    $today_date = strtotime(date('Y-m-d'));

    $datediff = $today_date - $expiry_date;

    $round_diff = round($datediff/(60*60*24));

    if($round_diff < '0')//not expired

    {

    //check chatcount

    $chat_receivers = $this->General_Model->get_chatsenders($userid,$payment_done[0]->id);

    if(count($chat_receivers) == ($payment_done[0]->messagebalance)+($payment_done[0]->addonmessage))

    {

    $data['chatstatus']=1;//limit reached

    }

    else

    {

    $data['chatstatus']=2;//active

    }

    

    }

    else//expired

    {

    $data['chatstatus']=3;//expired

    }

    }

    

    

    

    $userlist="";

    

    foreach($res as $vals)

    { 

    

    $res1 = $this->General_Model->get_unread_messages($vals['sender_id']);

    $res2 = $this->General_Model->get_last_message($vals['sender_id']);

    $chatuser=$vals['sender_id'];

    

    if($vals['sender_id']==$userid)

    {

    $chatuser=$vals['id'];

    

    $usertype="Me";  

    }

    else{

    $userdata = $this->General_Model->get_userdata($vals['sender_id']);

    $usertype=$userdata->name; 

    }

    

    $userlist.='<a href="#" onclick="get_userchatdata('.$chatuser.')">';

    $userlist.='<div class="d-flex justify-content-between align-items-center singleChat active">';

    $userlist.='<div class="d-flex align-items-center">';

    $userlist.='<div class="profImgBoxParent">';

    $userlist.='<div class="profImgBox">';

    if(empty($vals['photo'])){ 

    if($vals['gender']== 1){ 

    

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" >';

    

    }

    else if($vals['gender']== 2){ 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    

    }

    }

    else

    {

    $photo_status = $this->General_Model->check_photoStatus($vals['photo']);//check if approved or not

    if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals['id'];

    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

    if($photo_privacy !=1)

    {// if public

    $file_pointer = 'assets/photo_storage_thumb/'.$vals['photo'];

    if(file_exists($file_pointer)){

    $userlist.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">';

    } else{

    $file_pointer = 'assets/photo_storage/'.$vals['photo'];

    if(file_exists($file_pointer)){

    $userlist.='<img src="'.base_url().'/assets/photo_storage/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">';

    

    }else{

    if($vals['gender']== 1){ 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">';

    }

    else{ 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    

    

    }//end file exists

    

    }

    }

    else

    {//private

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals['id'];

    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

    if($photo_requeststatus==0)//not requested for photo

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals['photo'];

    if(file_exists($file_pointer)){

    

    $userlist.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    else{//file missing

    if($vals['gender']== 1){

    

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    else if($vals['gender']== 2){ 

    

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    else//requested for photo

    {

    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

    if($photo_requeststatus==1)

    {

    $file_pointer = 'assets/photo_storage_thumb/'.$vals['photo'];

    if(file_exists($file_pointer)){

    $userlist.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals['photo'].'" alt="profile image">';

    } else{

    $userlist.='<img src="'.base_url().'/assets/photo_storage/'.$vals['photo'].'" alt="profile image">';

    

    }               $userlist.='<div class="overlay"></div>';

    

    

    }

    else{

    $file_pointer = 'assets/photo_storage_blur/'.$vals['photo'];

    if(file_exists($file_pointer)){

    

    $userlist.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals['photo'].'" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    else{

    if($vals['gender']== 1){ 

    

    $userlist.='  <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div> <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    else if($key->gender== 2){ 

    

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>  <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    }//end of requested for photo

    }//end of private

    

    }//end of approved

    

    

    else { //not approved 

    

    if($vals['gender']== 1){ 

    

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png"alt="profile image" class="proImg" style="height:100%;">

    <div class="overlay"></div>';

    }

    else if($vals['gender']== 2){ 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg" style="height:100%;">

    <div class="overlay"></div>';

    }

    

    }//end of not approved

    }//not empty

    $userlist.='</div>';

    $userlist.='<span class="statusIndictn"></span>';

    $userlist.='</div>';

    $userlist.='<div class="nameTitle">';

    $userlist.='<p class="name">'.$vals['name'].'</p>';

    //  $userlist.='<p>'.$usertype.':'.$res2->messages.'</p>';

    $userlist.='</div>';

    $userlist.='</div>';

    $userlist.='<div class="totMsg">';

    $userlist.=' <span>'.$res1->num_rows().'</span>';

    $userlist.='</div>';

    $userlist.='</div>';

    $userlist.='</a>';

    

    }

    

    $data['userlist']=$userlist;

    if($chatpartnerid=="")

    {

    if(!empty($res))

    {

    $res3 = $this->General_Model->get_lastchat_list();

    $res3_row=$res3->row();

    if($res3_row->sender_id==$this->session->userdata('user_id'))

    {

    $chatpartner=$res3_row->receiver_id;

    }

    else

    {

    $chatpartner=$res3_row->sender_id;

    }

    $partner_details= $this->General_Model->get_partner_details($chatpartner);

    $vals=$partner_details->row();

    $data['name']=$vals->name;

    $data['id']=$vals->id;

    $data['photo']=$vals->photo;

    $data['gender']=$vals->gender;

    $data['job']=$vals->job;

    $data['page']=$vals->partner_age_from;

    $data['pageto']=$vals->partner_age_to;

    $data['pheight']=$vals->partner_height;

    $data['pheight_to']=$vals->partner_height_to;

    $data['pquali']=$vals->qualification;

    $user_details= $this->General_Model->get_partner_details($userid);

    $vals=$user_details->row();

    $data['uage']=$vals->age;

    $data['uheight']=$vals->height;

    $data['uquali']=$vals->education;

    $data['last_chatlist']=$res3;

    }

    }

    else

    {

    

    $chatpartner=$chatpartnerid;

    

    $partner_details= $this->General_Model->get_partner_details($chatpartner);

    $res3 = $this->General_Model->get_user_chatlist($userid,$chatpartner);

    

    $vals=$partner_details->row();

    $data['name']=$vals->name;

    $data['id']=$vals->id;

    $data['photo']=$vals->photo;

    $data['gender']=$vals->gender;

    $data['job']=$vals->job;

    $data['page']=$vals->partner_age_from;

    $data['pageto']=$vals->partner_age_to;

    $data['pheight']=$vals->partner_height;

    $data['pheight_to']=$vals->partner_height_to;

    $data['pquali']=$vals->qualification;

    $user_details= $this->General_Model->get_partner_details($userid);

    $vals=$user_details->row();

    $data['uage']=$vals->age;

    $data['uheight']=$vals->height;

    $data['uquali']=$vals->education;

    $data['last_chatlist']=$res3;

    

    }

    $data['user']=$userid;

    //$userData = $this->General_Model->GetFullData($table = "tbl_registration",'user_id',$userid);

    //check user payment plan 

    $receivers = $this->General_Model->total_receivers($userid);

    

    //check total chat users only receivers

    $this->load->view('userchat_gotonikah',$data);

    }



    public function userchat($user)

    {

    $_SESSION['chat_user']=$user;

    redirect('user_chat');

    }



    public function get_userchatdata_div()

    {

    $partnerid=$this->input->post('userid');

    $userid=$this->session->userdata('user_id');

    $results = $this->General_Model->get_chat_list($userid,$partnerid);

    $chatdata='';

    $chatdata=' <div class="chatSection scrollBox">';

    foreach($results->result() as $vals)

    {

    

    if($userid==$vals->id)

    {

    $uage=$vals->age;

    $uheight=$vals->height;

    $uquali=$vals->education;

    $chatdata.='<div class="d-flex mb-3">

    <div class="flex-grow-1 me-3 d-flex flex-column align-items-end">

    <ul class="chatlist chatlistSender">

    <li>'.$vals->messages.'</li>

    </ul>

    <span class="chatTime">'.$vals->time.'</span>

    </div>      

    </div>';

    }

    

    if($userid!=$vals->id)

    {

    $chatdata.='<div class="d-flex mb-3">

    <div class="flex-grow-1 ms-3">

    <ul class="chatlist">

    <li>'.$vals->messages.'</li>

    </ul>

    <span class="chatTime">'.$vals->time.'</span>

    </div>      

    </div>';

    }

    }

    

    $chatdata.="</div>";

    $chatdata.='<div class="urText d-flex align-items-center">

    <div class="input-group customForm">

    <input type="text" class="form-control" placeholder="Enter your message here" aria-label="chat text box">

    

    <button class="btn sendBtn" type="button">

    <img src="'.base_url().'assets/images/send.png">

    </button>

    </div>

    </div>';

    //$userData = $this->General_Model->GetFullData($table = "tbl_registration",'id',$partnerid);

    $userData= $this->General_Model->get_partner_details($partnerid);

    

    $user_details="";

    foreach($userData->result() as $vals)

    {

    $user_details.='<div class="d-flex align-items-center">

    <div class="profImgBox">';

    if(empty($vals->photo))

    { 

    if($vals->gender== 1)

    { 

    $user_details.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" >';

    }

    

    else if($vals->gender== 2)

    { 

    $user_details.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }

    

    else

    {

    $photo_status = $this->General_Model->check_photoStatus($vals->photo);//check if approved or not

    if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals->id;

    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

    

    if($photo_privacy !=1)

    {

    $file_pointer = 'assets/photo_storage_thumb/'.$vals->photo;

    if(file_exists($file_pointer))

    {

    $user_details.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals->photo.'" >';

    } 

    else

    {

    $file_pointer = 'assets/photo_storage/'.$vals->photo;

    if(file_exists($file_pointer))

    {

    $user_details.='<img src="'.base_url().'/assets/photo_storage/'.$vals->photo.'" >';

    

    }

    else

    {

    if($vals->gender== 1)

    { 

    $user_details.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">';

    }

    else

    { 

    $user_details.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }

    

    }

    }

    else

    {

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals->id;

    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

    if($photo_requeststatus==0)//not requested for photo

    {

        

    $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;

    if(file_exists($file_pointer))

    {

    $user_details.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals->photo.'" alt="profile image">

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {

    if($vals->gender== 1)

    {

    $user_details.=' <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($vals->gender== 2)

    { 

    $user_details.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    else//requested for photo

    {

    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

    if($photo_requeststatus==1)

    {

    $file_pointer = 'assets/photo_storage_thumb/'.$vals->photo;

    

    if(file_exists($file_pointer))

    {

    $user_details.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals->photo.'" alt="profile image">';

    } 

    else

    {

    $user_details.='<img src="'.base_url().'/assets/photo_storage/'.$vals->photo.'" alt="profile image">';

    

    }

    $user_details.='<div class="overlay"></div>';



    }

    

    else

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;

    

    if(file_exists($file_pointer))

    {

    $user_details.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals->photo.'" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {

    if($vals->gender== 1)

    { 

    $user_details.='  <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div> <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($key->gender== 2)

    { 

    $user_details.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>  <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    }

    }

    

    }

    

    else 

    { 

    if($vals->gender== 1)

    { 

    $user_details.='<img src="'.base_url().'/assets/photo_storage/maleweb.png">

    <div class="overlay"></div>';

    }

    else if($vals->gender== 2)

    { 

    $user_details.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png">

    <div class="overlay"></div>';

    }

    

    }

    }

    $user_details.='</div>';

    $user_details.='<div class="nameTitle">

    <p>'.$vals->name.'</p>

    <p class="dsgntn">'.$vals->job.'</p>

    <span>

    <img src="'.base_url().'assets/images/verify.png">

    Verified

    </span>

    </div>

    </div><a href="'.site_url().'singleprofile/'.$vals->id.'">View Profile</a>';

    }

    

    $user_details1="";

    foreach($userData->result() as $vals)

    {

    

    $user_details1.='<div class="d-flex align-items-center">

    <div class="profImgBox">';

    

    if(empty($vals->photo))

    { 

        

    if($vals->gender== 1)

    { 

    $user_details1.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" >';

    }

    

    else if($vals->gender== 2)

    { 

    $user_details1.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }

    

    else

    {

    $photo_status = $this->General_Model->check_photoStatus($vals->photo);

    

    if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)

    {

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals->id;

    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

    

    if($photo_privacy !=1)

    {

    $file_pointer = 'assets/photo_storage_thumb/'.$vals->photo;

    if(file_exists($file_pointer))

    {

    $user_details1.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals->photo.'" >';

    } 

    else

    {

    $file_pointer = 'assets/photo_storage/'.$vals->photo;

    

    if(file_exists($file_pointer))

    {

    $user_details1.='<img src="'.base_url().'/assets/photo_storage/'.$vals->photo.'" >';

    

    }

    else

    {

    if($vals->gender== 1)

    { 

    $user_details1.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">';

    }

    else

    { 

    $user_details1.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }

    }

    }

    

    else

    {

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals->id;

    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);

    

    if($photo_requeststatus==0)

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;

    if(file_exists($file_pointer))

    {

    $user_details1.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals->photo.'" alt="profile image">

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {

    if($vals->gender== 1)

    {

    $user_details1.=' <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($vals->gender== 2)

    { 

    

    $user_details1.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    

    else

    {

    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);

    if($photo_requeststatus==1)

    {

    $file_pointer = 'assets/photo_storage_thumb/'.$vals->photo;

    

    if(file_exists($file_pointer))

    {

    $user_details1.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals->photo.'" alt="profile image">';

    } 

    

    else

    {

    $user_details1.='<img src="'.base_url().'/assets/photo_storage/'.$vals->photo.'" alt="profile image">';

    }

    $user_details1.='<div class="overlay"></div>';

    

    }

    

    else

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;

    if(file_exists($file_pointer))

    {

        

    $user_details1.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals->photo.'" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {

        

    if($vals->gender== 1)

    { 

    $user_details1.='  <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div> <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($key->gender== 2)

    { 

    $user_details1.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>  <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    }

    }

    }

    

    else 

    { 

    if($vals->gender== 1)

    { 

        

    $user_details1.='<img src="'.base_url().'/assets/photo_storage/maleweb.png">

    <div class="overlay"></div>';

    }

    

    else if($vals->gender== 2)

    { 

    $user_details1.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png">

    <div class="overlay"></div>';

    }

    

    }

    }

    $user_details1.='</div>';

    $user_datails1.='<div class="nameTitle">

    <p>'.$vals->name.'</p>

    </div>

    </div>';

    }

    

    $userotherData = $this->General_Model->GetFullData($table = "tbl_otherdetails",'user_id',$partnerid);

    

    foreach($userotherData as $vals)

    {

    $page=$vals->partner_age_from;

    $pageto=$vals->partner_age_to;

    $pheight=$vals->partner_height;

    $pheight_to=$vals->partner_height_to;

    $pquali=$vals->qualification;

    }

    

    $match_details="";

    //if($page!=""){

    

    $match = 0;

    

    if($uage>=$page && $uage<=$pageto)

    {

    $match++;

    }

    

    if($uheight>=$pheight && $uheight<=$pheight)

    {

    $match++;

    }

    

    if($uquali == $pquali)

    {

    $match++;

    }

    

    $match_details.='<div class="likeDislikeBox mb-0">';

    

    if($page!="")

    {

    

    $match_details.=' <div class="headBox">

    <div class="row">

    <div class="col-12 col-sm-7 d-flex align-items-center mb-3 mb-sm-0">

    <div class="w-100">

    <div class="youHim">

    <img src="'.base_url().'assets/images/people.png">

    You &amp; Him

    </div>

    <h3>Likes &amp; Dislikes</h3>

    

    <p>Your profile matches with <span>'.$match.'/ 4</span>  of '.$name.'s preferences!</p>

    </div>

    </div>

    <div class="col-12 col-sm-5 d-flex justify-content-between align-items-center">

    <button type="button" class="btnLikeUnlike me-3">

    <img src="'.base_url().'assets/images/like1.png" class="likeDislikeIcon" alt="like icon">

    </button>

    <button type="button" class="btnLikeUnlike">

    <img src="'.base_url().'assets/images/dislike.png" class="likeDislikeIcon" alt="dislike icon">

    </button>

    </div>

    </div>

    </div>

    <div class="px-3 pt-3 scrollBox">

    

    <div class="row mb-2">

    <div class="col-5 d-flex align-items-center">

    <p class="dtls">Age</p>

    </div>

    <div class="col-5 d-flex align-items-center">

    <p class="dtls">'.$page.' - '.$pageto.' Yrs</p>

    </div>

    <div class="col-2 d-flex align-items-center justify-content-end">';

    

    if($uage>=$page && $uage<=$pageto)

    { 

    $match_details.='<img src="'.base_url().'assets/images/checkedG.png" class="chk">';

    } 

    

    else

    { 

    $match_details.=' <img src="'.base_url().'assets/images/blocked.png" class="chk" >';

    }

    

    $match_details.='</div>

    </div>

    <div class="row mb-2">

    <div class="col-5 d-flex align-items-center">

    <p class="dtls">Height</p>

    </div>

    <div class="col-5 d-flex align-items-center">

    <p class="dtls">'.$pheight.' -  '.$pheight_to.'</p>

    </div>

    <div class="col-2 d-flex align-items-center justify-content-end">';

    

    if($uheight>=$pheight && $uheight<=$pheight_to)

    { 

    $match_details.='<img src="'.base_url().'assets/images/checkedG.png" class="chk">';

    } 

    else

    {

    $match_details.='<img src="<?php echo base_url() ?>assets/images/blocked.png" class="chk" >';

    }   

    

    $match_details.=' </div>

    </div>

    <div class="row mb-2">

    <div class="col-5 d-flex align-items-center">

    <p class="dtls">Qualification</p>

    </div>

    <div class="col-5 d-flex align-items-center">

    <p class="dtls">'.$pquali.'</p>

    </div>

    <div class="col-2 d-flex align-items-center justify-content-end">';

    

    if($uquali == $pquali)

    { 

    $match_details.='<img src="'.base_url().'assets/images/checkedG.png" class="chk">';

    } 

    

    else

    { 

    $match_details.='<img src="'.base_url().'assets/images/blocked.png" class="chk" >';

    } 

    

    $match_details.='</div>

    </div>

    

    </div>

    </div>';

    }

    

    echo $chatdata."###".$user_details."###".$match_details."###".$user_details1;

    }



    public function add_usermessage()

    {

    $usermessage=$this->input->post('usermessage');

    $senderid=$this->session->userdata('user_id');

    $uname=$this->session->userdata('name');

    $receiverid=$this->input->post('uid');

    $_SESSION['chat_user']=$receiverid;

    

    $this->db->select("p.id");

    $this->db->from("tbl_payement p");

    $this->db->where("p.expiry_date>CURDATE()");

    $this->db->where("p.status", 1);

    $this->db->where("user_id", $senderid);

    $arplan = $this->db->get();

    

    if($arplan->num_rows() > 0) 

    {

    $arplan = $arplan->row_array();

    $planid = $arplan["id"];

    }

    else

    {

    $planid = 0;

    }

    

    $uploaddata = array(

    'sender_id' => $senderid,

    'receiver_id' => $receiverid,

    'messages' => $usermessage,

    'date' => date("Y-m-d"),

    'time' => date("Y-m-d H:i:s"),

    'planid'=>$planid,

    );

 

    $result = $this->General_Model->GetFullData('tbl_firebase_token','user_id',$receiverid);

    $vals=$result[0];

    $token=$vals->firebase_token;

    $login_result = $this->General_Model->GetFullData('tbl_userlogin','user_id',$receiverid);

    $login_vals=$login_result[0];

    $logstatus=$login_vals->is_online;

    //$device_token = 'cucm31G_UU4e7N_k8zs_xc:APA91bGp6by4GqxJ9beOW40v2Z2fpHfyTRw4yj2hy435LII1NG_IpUkAgqauCTfqcEhiLaCpMPd3VpQjcy8yk0X_b9kngrWeQi730599sVdK1-ta2J9k8FOaD-tOWdDItc6w1md3bTYe';

    if($logstatus==1)

    {

    $res= $this->noti($token, array(

    "title" => "Message From ".$uname,

    "body" => "New message received.. ",

    "user_id"=>$receiverid,

    "sender_id"=>$senderid,

    "noti_type1"=>"chat",            

    ));

    }   

    

    $this->General_Model->AddRecord('tbl_chating',$uploaddata);

    $message="";

    $date=date_create(date('H:i:s'));

    $message.='

    <div class="d-flex mb-3">

    <div class="flex-grow-1 me-3 d-flex flex-column align-items-end">

    <ul class="chatlist chatlistSender">

    <li>'.$usermessage.'</li>

    </ul>

    <span class="chatTime">'.DATE_FORMAT($date,'h:i').'</span>

    </div>

    </div>';

    echo $message;

    }





    public function get_userlist()

    {

    $userid=$this->session->userdata('user_id');

    $res = $this->General_Model->get_chatusers($userid);

    

    $userlist="";

    foreach($res as $vals)

    { 

    

    $res1 = $this->General_Model->get_unread_messages($vals['sender_id']);

    $res2 = $this->General_Model->get_last_message($vals['sender_id']);

    $chatuser=$vals['sender_id'];

    

    if($vals['sender_id']==$userid)

    {

    $chatuser=$vals['id'];

    $usertype="Me";  

    }

    

    else

    {

    $userdata = $this->General_Model->get_userdata($vals['sender_id']);

    $usertype=$userdata->name; 

    }

    

    $userlist.='<a href="#" onclick="get_userchatdata('.$chatuser.')">';

    $userlist.='<div class="d-flex justify-content-between align-items-center singleChat active">';

    $userlist.='<div class="d-flex align-items-center">';

    $userlist.='<div class="profImgBoxParent">';

    $userlist.='<div class="profImgBox">';

    

    if(empty($vals['photo']))

    { 

    if($vals['gender']== 1)

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" >';

    

    }

    else if($vals['gender']== 2)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }

    else

    {

    $photo_status = $this->General_Model->check_photoStatus($vals['photo']);//check if approved or not

    if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1){//if approved

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals['id'];

    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

    

    if($photo_privacy !=1)

    {// if public

    

    $file_pointer = 'assets/photo_storage_thumb/'.$vals['photo'];

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">';

    } 

    else

    {

    $file_pointer = 'assets/photo_storage/'.$vals['photo'];

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">';

    

    }

    else

    {

    if($vals['gender']== 1)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">';

    }

    else

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }//end file exists

    

    }

    }

    

    else

    {//private

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals['id'];

    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

    if($photo_requeststatus==0)//not requested for photo

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals['photo'];

    

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">

     <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {//file missing

    if($vals['gender']== 1)

    {

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($vals['gender']== 2)

    { 

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    

    else//requested for photo

    {

    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

    

    if($photo_requeststatus==1)

    {

    $file_pointer = 'assets/photo_storage_thumb/'.$vals['photo'];

    

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals['photo'].'" alt="profile image">';

    }

    else

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage/'.$vals['photo'].'" alt="profile image">';

    }

    $userlist.='<div class="overlay"></div>';

    }

    

    else

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals['photo'];

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals['photo'].'" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {

    if($vals['gender']== 1)

    { 

    $userlist.='  <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div> <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($key->gender== 2)

    { 

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>  <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    }

    }

    }

    

    else

    {

    if($vals['gender']== 1)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png"alt="profile image" class="proImg" style="height:100%;">

    <div class="overlay"></div>';

    }

    

    else if($vals['gender']== 2)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg" style="height:100%;">

    <div class="overlay"></div>';

    }

    

    }//end of not approved

    }//not empty

    $userlist.='</div>';

    $userlist.='<span class="statusIndictn"></span>';

    $userlist.='</div>';

    $userlist.='<div class="nameTitle">';

    $userlist.='<p class="name">'.$vals['name'].'</p>';

    //  $userlist.='<p>'.$usertype.':'.$res2->messages.'</p>';

    $userlist.='</div>';

    $userlist.='</div>';

    $userlist.='<div class="totMsg">';

    $userlist.=' <span>'.$res1->num_rows().'</span>';

    $userlist.='</div>';

    $userlist.='</div>';

    $userlist.='</a>';

    }

    echo $userlist;

    }

    

    public function ajax_chatuserlist()

    {

    $user=$this->input->post('username');

    $userid=$this->session->userdata('user_id');

    $res = $this->General_Model->get_ajaxchatusers($userid,$user);

    $userlist="";

    

    foreach($res as $vals)

    { 

    

    $res1 = $this->General_Model->get_unread_messages($vals['sender_id']);

    $res2 = $this->General_Model->get_last_message($vals['sender_id']);

    $chatuser=$vals['sender_id'];

    

    if($vals['sender_id']==$userid)

    {

    $chatuser=$vals['id'];

    $usertype="Me";  

    }

    

    else

    {

    $userdata = $this->General_Model->get_userdata($vals['sender_id']);

    $usertype=$userdata->name; 

    }

    

    $userlist.='<a href="#" onclick="get_userchatdata('.$chatuser.')">';

    $userlist.='<div class="d-flex justify-content-between align-items-center singleChat active">';

    $userlist.='<div class="d-flex align-items-center">';

    $userlist.='<div class="profImgBoxParent">';

    $userlist.='<div class="profImgBox">';

    

    if(empty($vals['photo']))

    { 

    if($vals['gender']== 1)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" >';

    }

    

    else if($vals['gender']== 2)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }

    

    else

    {

    $photo_status = $this->General_Model->check_photoStatus($vals['photo']);//check if approved or not

    if(isset($photo_status->status) && $photo_status->status != 0 && $photo_status->status != 1)

    {

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals['id'];

    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

    

    if($photo_privacy !=1)

    {

    $file_pointer = 'assets/photo_storage_thumb/'.$vals['photo'];

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">';

    } 

    else

    {

    $file_pointer = 'assets/photo_storage/'.$vals['photo'];

    

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">';

    

    }

    else

    {

    if($vals['gender']== 1)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">';

    }

    

    else

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image">';

    }

    }//end file exists

    

    }

    }

    else

    {//private

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals['id'];

    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

    

    if($photo_requeststatus==0)//not requested for photo

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals['photo'];

    

    if(file_exists($file_pointer))

    {

    

    $userlist.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals['photo'].'" alt="profile image" class="proImg" style="height:100%;">

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {//file missing

    if($vals['gender']== 1)

    {

    

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($vals['gender']== 2)

    { 

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="'.base_url().'assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    

    else//requested for photo

    {

    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

    if($photo_requeststatus==1)

    {

    $file_pointer = 'assets/photo_storage_thumb/'.$vals['photo'];

    

    if(file_exists($file_pointer))

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals['photo'].'" alt="profile image">';

    } 

    

    else

    {

    $userlist.='<img src="'.base_url().'/assets/photo_storage/'.$vals['photo'].'" alt="profile image">';

    } 

    $userlist.='<div class="overlay"></div>';

    }

    

    else

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals['photo'];

    if(file_exists($file_pointer))

    {

        

    $userlist.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals['photo'].'" alt="profile image" class="proImg">

    <div class="overlay"></div>

    <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else

    {

    if($vals['gender']== 1)

    { 

    $userlist.='  <img src="'.base_url().'/assets/photo_storage/maleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div> <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    

    else if($key->gender== 2)

    { 

    $userlist.=' <img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg">

    <div class="overlay"></div>  <div class="lockOverlay">

    <img src="<?php echo base_url();?>assets/images/lockProfile.svg">

    </div>';

    }

    }

    }

    }

    }

    }

    

    else 

    { 

    if($vals['gender']== 1)

    { 

    

    $userlist.='<img src="'.base_url().'/assets/photo_storage/maleweb.png"alt="profile image" class="proImg" style="height:100%;">

    <div class="overlay"></div>';

    }

    

    else if($vals['gender']== 2)

    { 

    $userlist.='<img src="'.base_url().'/assets/photo_storage/femaleweb.png" alt="profile image" class="proImg" style="height:100%;">

    <div class="overlay"></div>';

    }

    

    }

    }

    $userlist.='</div>';

    $userlist.='<span class="statusIndictn"></span>';

    $userlist.='</div>';

    $userlist.='<div class="nameTitle">';

    $userlist.='<p class="name">'.$vals['name'].'</p>';

    //  $userlist.='<p>'.$usertype.':'.$res2->messages.'</p>';

    $userlist.='</div>';

    $userlist.='</div>';

    $userlist.='<div class="totMsg">';

    $userlist.=' <span>'.$res1->num_rows().'</span>';

    $userlist.='</div>';

    $userlist.='</div>';

    $userlist.='</a>';

    }

    echo $userlist;

    }

    

    public function get_total_usermessages()

    {

    $uid=$this->input->post('uid');

    if($uid==$this->session->userdata('user_id'))

    {

    $chat_count = $this->General_Model->get_unread_receivedmessages($uid);

    $unread_count=$chat_count->num_rows();

    } 

    echo $unread_count;

    

    

    }

    public function get_total_usernotifications()

    {

    $uid=$this->input->post('uid');

    if($uid==$this->session->userdata('user_id'))

    {

    $notifications = $this->General_Model->get_unread_notifications($uid);

    //$unread_count=$chat_count->unread_count;

    $noti_count= $notifications->num_rows();

    return $noti_count;

    } 

    

    }

    

    public function change_notificationreadstatus()

    {

    $uid=$this->input->post('uid');

    if($uid==$this->session->userdata('user_id'))

    {

    $result = $this->General_Model->change_notificationreadstatus($uid);

    echo 1;

    } 

    }

    

    public function get_notifications($id)

    {

    $result = $this->General_Model->get_notifications($uid);

    return $result;

    }

    

    public function get_latestnotifications($id)

    {

    $result = $this->General_Model->get_notifications($uid);

    $userlist="";

    

    foreach($result as $vals)

    {

    $userlist.='<li class="d-flex justify-content-between notfctnItems">

    <span class="mb-8">'.$vals->name;

    if($vals->notification_type=="1")

    {

    $userlist.="Expresed Interest on your Profile";

    }

    

    elseif($vals->notification_type=="2")

    {

    $userlist.="Accepted your Request";;

    }

    

    elseif($vals->notification_type=="3")

    {

    $userlist.="Rejected your Request";

    }

    

    elseif($vals->notification_type=="4")

    {

    $userlist.="requested your photo";

    }

    elseif($vals->notification_type=="5")

    {

    $userlist.="Accepted Your PhotoRequest";

    }

    elseif($vals->notification_type=="6")

    {

    $userlist.="rejected your photorequest";

    }

    

    $userlist.='</span> <span class="d-flex justify-content-between">

    <a href="javascript:void(0);"><img src="<?php echo base_url() ?>/assets/images/cancel.png" alt="cancel" class="me-2"></a>

    <a href="javascript:void(0);"><img src="<?php echo base_url() ?>/assets/images/checked.png" alt="checked"></a>

    </span>

    </li>';

    }

    echo $result;

    }

    

    public function accept_photorequest()

    {

    $sender_id=$this->input->post('sender_id');

    $receiver_id=$this->session->userdata('user_id');

    $result = $this->General_Model->accept_photorequest($sender_id,$receiver_id);

    //send notification

    

    $uname=$this->session->userdata('name');

    $reg_id=$this->session->userdata('reg_id');

    $notification_type=1;

    

    $alert_data = $this->General_Model->GetFullData('tbl_user_alerts','user_id',$sender_id);

    $vals=$alert_data[0];

    $receiver_data = $this->General_Model->GetFullData('tbl_registration','id',$sender_id);

    $vals1=$receiver_data[0];

    $alerts=explode(",",$vals->alerts); 

    $message="Your interest is accepted by ".$uname."(".$reg_id.")";

    

    if(in_array("1",$alerts))

    {

    $to_email = $vals1->mail;

    $subject = 'Photo request accepted';

    $message = $message;

    $headers = 'From: Happy Nikah <info@happynikah.com>';

    mail($to_email,$subject,$message,$headers);

    }

    else if(in_array("2",$alerts))

    {

    

    }

    else if(in_array("3",$alerts))

    {

    $result = $this->General_Model->GetFullData('tbl_firebase_token','user_id',$sender_id);

    $vals=$result[0];

    $token=$vals->firebase_token;

    

    //$device_token = 'cucm31G_UU4e7N_k8zs_xc:APA91bGp6by4GqxJ9beOW40v2Z2fpHfyTRw4yj2hy435LII1NG_IpUkAgqauCTfqcEhiLaCpMPd3VpQjcy8yk0X_b9kngrWeQi730599sVdK1-ta2J9k8FOaD-tOWdDItc6w1md3bTYe';

    

    $res= $this->noti($token, array(

    "title" => "Message From ".$uname,

    "body" => $message,

    "user_id"=>$this->input->post('sender_id'),

    "sender_id"=>$this->session->userdata('user_id'),

    "noti_type1"=>"notification",            

    ));

    }

    $datas = array(

    'sender_id' => $this->session->userdata('user_id'),

    'receiver_id' => $this->input->post('sender_id'),

    'notification_type'=>'5',

    'date'=>date('Y-m-d'),

    );

    $this->General_Model->AddRecord('tbl_notification',$datas);

    

    echo 1; exit;

    }

    

    public function reject_photorequest()

    {

    $sender_id=$this->input->post('sender_id');

    $receiver_id=$this->session->userdata('user_id');

    $result = $this->General_Model->reject_photorequest($sender_id,$receiver_id);

    //send notification

    

    $uname=$this->session->userdata('name');

    $reg_id=$this->session->userdata('reg_id');

    

    

    $alert_data = $this->General_Model->GetFullData('tbl_user_alerts','user_id',$sender_id);

    $vals=$alert_data[0];

    $receiver_data = $this->General_Model->GetFullData('tbl_registration','id',$sender_id);

    $vals1=$receiver_data[0];

    $alerts=explode(",",$vals->alerts); 

    $message="Your interest is rejected by ".$uname."(".$reg_id.")";

    if(in_array("1",$alerts))

    {

    $to_email = $vals1->mail;

    $subject = 'Photo request rejected';

    $message = $message;

    $headers = 'From: Happy Nikah <info@happynikah.com>';

    mail($to_email,$subject,$message,$headers);

    }

    else if(in_array("2",$alerts))

    {

    

    }

    

    else if(in_array("3",$alerts))

    {

    $result = $this->General_Model->GetFullData('tbl_firebase_token','user_id',$sender_id);

    $vals=$result[0];

    $token=$vals->firebase_token;

    

    //$device_token = 'cucm31G_UU4e7N_k8zs_xc:APA91bGp6by4GqxJ9beOW40v2Z2fpHfyTRw4yj2hy435LII1NG_IpUkAgqauCTfqcEhiLaCpMPd3VpQjcy8yk0X_b9kngrWeQi730599sVdK1-ta2J9k8FOaD-tOWdDItc6w1md3bTYe';

    

    $res= $this->noti($token, array(

    "title" => "Message From ".$uname,

    "body" => $message,

    "user_id"=>$this->input->post('sender_id'),

    "sender_id"=>$this->session->userdata('user_id'),

    "noti_type1"=>"notification",            

    ));

    }

    $datas = array(

    'sender_id' => $this->session->userdata('user_id'),

    'receiver_id' => $this->input->post('sender_id'),

    'notification_type'=>'6',

    'date'=>date('Y-m-d'),

    );

    $this->General_Model->AddRecord('tbl_notification',$datas);

    

    echo 1; exit;

    }

    

    public function requeststatus($sender_id,$receiver_id)

    {

    $result = $this->General_Model->requeststatus($sender_id,$receiver_id);

    return $result;

    }

        

    public function get_usermessage()

    {

    $sender_id=$this->input->post('sender_id');

    $receiver_id=$this->input->post('uid');

    $usermessage=$this->input->post('message');

    $chatpartnerid=$this->session->userdata('chat_user');

    $message="";

    

    if($chatpartnerid==$sender_id)

    {

    $date=date_create(date('H:i:s'));

    $message.='

    <div class="d-flex mb-3">

    

    <div class="flex-grow-1 ms-3">

    <ul class="chatlist">

    <li>'.$usermessage.'</li>

    </ul>

    <span class="chatTime">'.DATE_FORMAT($date,'h:i').'</span>

    </div>

    

    </div>';

    

    echo $message;

    }

    else

    {

    echo $message="";     

    }

    }

    

    public function delete_notification()

    {

    $n_id=$this->input->post('n_id');

    $result = $this->General_Model->DeleteData("tbl_notification","id",$n_id);

    echo "1";

    exit;

    }

    public function delete_allnotifications()

    {

    $receiver_id=$this->input->post('receiver_id');

    $result = $this->General_Model->DeleteData("tbl_notification","receiver_id",$receiver_id);

    echo "1";

    exit;

    }

    

    public function view_allnotifications2()

    {

    

    if ($this->uri->uri_string() == 'user/view_allnotifications2') 

    {

    redirect('view_allnotifications2');

    }

    

    $this->load->view('notificationall');

    }

    

    

    public function view_allnotifications2_gotonikah()

    {

    $this->load->view('notificationall_gotonikah');

    }

    

    public function view_allnotifications()

    {

    $notifications = $this->General_Model->get_notifications($this->session->userdata('user_id'));

    $datas="";

    

    foreach($notifications->result() as $vals)

    {

    $datas.='<div class="item p-3"  id="noti_'.$vals->nid.'">

    <div class="row gx-2 justify-content-between align-items-center">

    <div class="col-auto proLstBox">';

    

    if(empty($vals->photo))

    { 

    if($vals->gender== 1)

    { 

    $datas.='<img src="'.base_url('/assets/photo_storage/male.jpeg').'" alt="profile image" class="profile-image" style="height:50%;">';

    }

    

    else if($vals->gender== 2)

    { 

    $datas.='<img src="'.base_url('/assets/photo_storage/female.jpeg').'" alt="profile image" class="profile-image" style="height:50%;">';

    }

    } 

    

    else

    {

    $photo_status = $this->General_Model->check_photoStatus($vals->photo);//check if approved or not

    

    if($photo_status->status != 0 && $photo_status->status != 1)

    {

    

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals->rid;

    $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected

    

    if($photo_privacy !=1)

    {

    $datas.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals->photo.'" alt="profile image" class="profile-image" style="height:50%;">';

    }

    

    else

    {

    $sender_id = $this->session->userdata('user_id');

    $receiver_id = $vals->rid;

    $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected

    if($photo_requeststatus==0)//not requested for photo

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;

    

    if(file_exists($file_pointer))

    {

    $datas.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals->photo.'" alt="profile image" class="profile-image" style="height:50%;">';

    }

    else

    {

    if($vals->gender== 1)

    { 

    $datas.='<img src="'.base_url().'/assets/photo_storage/male.jpeg" alt="profile image" class="profile-image" style="height:50%;">';

    }

    else if($vals->gender== 2)

    {

    $datas.='<img src="'.base_url().'/assets/photo_storage/female.jpeg" alt="profile image" class="profile-image" style="height:50%;">';

    }

    }

    }

    else//requested for photo

    {

    $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request

    if($photo_requeststatus==1)

    {

    $datas.='<img src="'.base_url().'/assets/photo_storage_thumb/'.$vals->photo.'" alt="profile image" class="profile-image" style="height:50%;">';

    }

    

    else

    {

    $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;

    if(file_exists($file_pointer))

    {

    $datas.='<img src="'.base_url().'/assets/photo_storage_blur/'.$vals->photo.'" alt="profile image" class="profile-image" style="height:50%;">';

    }

    

    else

    {

    if($vals->gender== 1)

    { 

    $datas.='<img src="'.base_url().'/assets/photo_storage/male.jpeg" alt="profile image" class="profile-image">';

    }

    

    else if($vals->gender== 2)

    { 

    $datas.='<img src="'.base_url().'/assets/photo_storage/female.jpeg" alt="profile image" class="profile-image">';

    }

    }

    }

    }

    

    }//end of private

    

    }//end of approved

    else//not approved

    {//

    

    if($vals->gender== 1){ 

    

    $datas.='<img src="'.base_url().'/assets/photo_storage/male.jpeg" alt="profile image" class="profile-image" style="height:50%;">';

    

    }

    

    else if($vals->gender== 2)

    {

    

    $datas.='<img src="'.base_url().'/assets/photo_storage/female.jpeg" alt="profile image" class="profile-image" style="height:50%;">';

    

    }

    }//end of not approved

    }//end of photo not empty

    

    $datas.='</div>';

    $datas.='<div class="col">';

    $datas.='<div class="info">';

    

    $datas.='<div class="desc">';

    $datas.=$vals->name."&nbsp;";

    

    if($vals->notification_type=="1")

    $datas.= "Expresed Interest on your Profile";

    

    elseif($vals->notification_type=="2")

    {

    $datas.="Accepted your Request";

    }

    

    elseif($vals->notification_type=="3")

    {

    $datas.= "Rejected your Request";

    }

    

    elseif($vals->notification_type=="4")

    {

    $datas.= "requested your photo";

    }

    elseif($vals->notification_type=="5")

    {

    $datas.= "Accepted Your PhotoRequest";

    }

    

    elseif($vals->notification_type=="6")

    {

    $datas.= "rejected your photorequest";

    }

    

    $now = time(); // or your date as well

    $your_date = strtotime($vals->date);

    $datediff = $now - $your_date;

    

    $days= round($datediff / (60 * 60 * 24));

    

    if($days==0)

    {

    $days="Today";

    }

    

    elseif($days==1)

    {

    $days="Yesterday";

    }

    

    elseif($days<7 && $days>1)

    {

    $days=date('l', strtotime($vals->date));

    }

    

    else

    {

    $days=abs($days)."days ago."; 

    }

    

    $datas.=' </div>';

    $datas.='<div class="meta">'.$days.'</div>';

    $datas.='<div class="meta" style="padding-top: 16px;padding-right:2px;">';

    if($vals->notification_type==4)

    {

    $requeststatus = $this->General_Model->requeststatus($vals->sender_id,$vals->receiver_id);

    $sts=$requeststatus->row();

    

    

    $datas.='<div id="requestaccept_'.$vals->sender_id.'">';

    $datas.='<svg  xmlns="http://www.w3.org/2000/svg"'.($sts->status==1 || $sts->status==2)?'style="display:none;"':'style="color:green;"'.' width="24" height="24" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16" onclick="accept_photorequest('.$vals->sender_id.')">';

    $datas.='<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />

    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />

    </svg>';

    $datas.='<svg '.($sts->status==1 || $sts->status==2)?'style="display:none;"':'style="color:red;"'.'xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16" onclick="reject_photorequest('.$vals->sender_id.')">';

    $datas.='<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />

    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />

    </svg>

    </div>';

    $datas.='<svg id="requestrejected_'.$vals->sender_id.'"'.($sts->status==0 || $sts->status==1)?'style="display:none;"':'style="color:red;"'.'xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">';

    $datas.='<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />';

    $datas.='<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />

    </svg>';

    $datas.='<svg id="requestaccepted_'.$vals->sender_id.'"  xmlns="http://www.w3.org/2000/svg"'.($sts->status==0 || $sts->status==2)?'style="display:none;"':'style="color:green;"'.' width="24" height="24" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16" onclick="accept_photorequest('.$vals->sender_id.')">';

    $datas.='<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />';

    $datas.='<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />

    </svg>';

    

    if($sts->status==2 || $sts->status==1) 

    {

    $datas.=' <a href="#" aria-label="Delete" onclick="delete_notification('.$vals->nid.')" >

    <i class="fa fa-trash fa-lg" aria-hidden="true" title="Delete"></i>

    </a>';

    }

    }

    else

    {

    

    $datas.='<a href="#" aria-label="Delete" onclick="delete_notification('.$vals->nid.')" >

    <i class="fa fa-trash fa-lg" aria-hidden="true" title="Delete"></i>

    </a>';

    

    }

    

    $datas.='     </div>';

    $datas.=' </div>';

    $datas.=' </div>';

    $datas.='</div>';

    $datas.='</div>';

    }

    echo $datas;

    }

        

    public function update_contact_viewed()

    {

    $receiver_id=$this->input->post('receiver_id');

    $updatestatus = $this->General_Model->update_contactview($this->session->userdata('user_id'),$receiver_id);

    if($updatestatus)

    {

    echo 1;

    }

    }

    

    public function update_contact_viewed2()

    {

    $receiver_id=$this->input->post('receiver_id');

    

    $log_data = array(

    'sender_id' => $this->session->userdata('user_id'),

    'planid' => $receiver_id,

    'date'=>date('Y-m-d'),);

    

    $this->db->insert('tbl_payment_viewed',$log_data);

    

    if($log_data)

    {

    echo 1;

    }

    }

    

    

    public function contact_submit()

    {

    $name = $this->input->post('name');

    $email = $this->input->post('email');

    $phone = $this->input->post('phone');

    

    $this->email->from('info@happynikah.com', 'HappyNikah');

    $this->email->to('info@happynikah.com');

    $this->email->subject('Contacts Details');

    $this->email->message('Dear ' . $name . ', Thank you for submitting contact information. Email: ' . $email . '. Phone: ' . $phone);

    

    if ($this->email->send()) 

    {

    $this->session->set_flashdata('success', 'Email sent successfully');

    } 

    else 

    {

    $this->session->set_flashdata('failure', 'Error sending Email');

    }

    

    $this->contactus();

    }

    

    // public function contact_submit()

    // {

    // $name = $this->input->post('name');

    // $email = $this->input->post('email');

    // $phone = $this->input->post('phone');

    



    // $this->email->from('info@happynikah.com', 'HappyNikah');

    // $this->email->to('info@happynikah.com');

    // $this->email->subject('Contacts Details');

    // $this->email->message('Dear ' . $name . ', Thank you for submitting contact information. Email: ' . $email . '. Phone: ' . $phone);



    

    // if($this->email->send())

    // {

    // $this->session->set_flashdata('success', 'Email sent successfully');

    // redirect('user/contactus');

    // } 

    

    // else 

    // {

    // $this->session->set_flashdata('failure', 'Error sending Email');

    // redirect('user/contactus');

    // }

    // }

        

///////////////////////////////////////////////// Go TO Nikah //////////////////////////////////////////////////

   

    public function about_gotonikah()

    {

    $this->is_session_available_gotonikah();

    

    if ($this->uri->uri_string() == 'user/about_gotonikah') 

    {

    redirect('about_gotonikah');

    }

    

    $this->load->view("aboutus_gotonikah");

    }



    public function contactus_gotonikah()

    {

    $this->is_session_available_gotonikah();

    

    if ($this->uri->uri_string() == 'user/contactus_gotonikah') 

    {

    redirect('contactus_gotonikah');

    }

    

    $this->load->view("contactus_gotonikah");

    }



    public function download_gotonikah()

    {

    $this->is_session_available_gotonikah();

    

    if ($this->uri->uri_string() == 'user/download_gotonikah') 

    {

    redirect('download_gotonikah');

    }

    

    $this->load->view("download_gotonikah");

    }



    public function contact_gotonikah_submit()

    {

    $name = $this->input->post('name');

    $email = $this->input->post('email');

    // Other form fields can be accessed similarly

    

    // Send email

    $this->email->from('info@gotonikah.com', 'GotoNikah');

    $this->email->to('info@gotonikah.com');

    $this->email->subject('Contacts Details');

    $this->email->message('Dear' . $name . ',Thanks you for Submittng Contacts Information: . $email . ');

    

    if($this->email->send())

    {

    $this->session->set_flashdata('success', 'Email sent successfully');

    redirect('user/contactus_gotonikah');

    // echo 'Email sent successfully.';

    } 

    else 

    {

    // echo 'Error sending email.';

    $this->session->set_flashdata('failure', 'Error sending Email');

    redirect('user/contactus_gotonikah');

    }

    }

        

    public function gotonikah()

    {          

        if(isset($_SESSION['user_id']) && !(isset($_SESSION['userinfo']['stage'])))

        { 

        redirect('user/home_gotonikah');  

        }

     

        if ($this->uri->uri_string() == 'user/gotonikah')

        {

        redirect('gotonikah');

        }

        $this->is_session_available_gotonikah();

          

        // if(!empty($_SESSION['user_id'])){  redirect('user/home'); }

        $data['homeprofiles'] =$this->General_Model->gethomeprofiles();

        $data['countryCode'] = $this->General_Model->fetch_countrycode();

        $this->load->view('index_gotonikah',$data);

    }



    public function privacy_gotonikah()

    {   

        $this->is_session_available_gotonikah();

        $this->load->view('privacy_gotonikah');

    }

    

   public function refund_policy_gotonikah()

    {   

        $this->is_session_available_gotonikah();

        $this->load->view('refund_policy_gotonikah');

    }

    

    public function home_gotonikah()

    {   

        

    session_start();

    if(empty($_SESSION['user_id']))

    { 

    redirect('user'); 

    }

    

    if(isset($_GET['offset']))

    $offset = $_GET['offset'];

    else

    $offset ="";

    if(empty($offset)){ $offset = ''; 

        

    }

        

        $UserID = $this->session->userdata('user_id');

         

        if($_SESSION['gender'] == 1)

        {

            if($_SESSION['dob']!="")

            {

            $dob_date = new DateTime($_SESSION['dob']); // Your date of birth

            $today_date = new Datetime(date('Y-m-d'));

            $diff = $today_date->diff($dob_date);

            $user_age = 18;

            $ageto = $diff->y;

            }

            else

            {

            $user_age = 18;

            $ageto = $_SESSION['age'];

            }

        }

        else

        {

            if($_SESSION['dob']!="")

            {

            $dob_date = new DateTime($_SESSION['dob']);

            $today_date = new Datetime(date('Y-m-d'));

            $diff = $today_date->diff($dob_date);

            $user_age = $diff->y;

            $ageto = $user_age+10;

            }

            else

            {

            $user_age = $_SESSION['age'];

            $ageto = $user_age+10;

            }

        }

        $Details['AgeFrom'] = $user_age;

        $Details['AgeTo'] = $ageto;

        $partner_preference = $this->General_Model->GetFullData($table = "tbl_otherdetails",'user_id',$UserID);

        //me ignored

        $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

        //profiles blocked me

        $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);



        $partner_preference = array_shift($partner_preference);

       

        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");

        $Details['sender_id'] = $UserID;

       

        $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

        $Details['caste'] =(!empty($this->session->userdata('caste') && $this->session->userdata('caste')!= 'NULL') ? $this->session->userdata('caste') : '');

        $Details['religion'] = 2;

        //$Details['AgeFrom'] = (!empty($partner_preference->partner_age_from) && $partner_preference->partner_age_from!= 'NULL' ? $partner_preference->partner_age_from : '');

        //$Details['AgeTo'] = (!empty($partner_preference->partner_age_to) && $partner_preference->partner_age_to!= 'NULL' ? $partner_preference->partner_age_to : '');

        $data['payment_done'] = $this->General_Model->payment_done($UserID);



        // $Details['AgeFrom'] = (!empty($partner_preference->partner_age_from) && $partner_preference->partner_age_from!= 'NULL' ? $partner_preference->partner_age_from : '');

        // $Details['AgeTo'] = (!empty($partner_preference->partner_age_to) && $partner_preference->partner_age_to!= 'NULL' ? $partner_preference->partner_age_to : '');

        $Details['HeightFrom'] = (!empty($partner_preference->partner_height) && $partner_preference->partner_height != 'NULL'? $partner_preference->partner_height : '');

        $Details['HeightTo'] = (!empty($partner_preference->partner_height_to) && $partner_preference->partner_height_to != 'NULL'? $partner_preference->partner_height_to : '');

       /// $Details['PartnerEducation'] = (!empty($partner_preference->partner_education) && $partner_preference->partner_education != 'NULL'? $partner_preference->partner_education : '');

        $familytype = (!empty($partner_preference->partner_familytype) && $partner_preference->partner_familytype != 'NULL'? $partner_preference->partner_familytype : '');

        $data['familytype']=explode(",",$familytype);

        $ignoredids=array();

        foreach ($ignored_profiles as $key)

           {

          $ignoredids[]= $key->receiver_id;

        }

        $Details['ignored_profiles']=$ignoredids;

        

        $blockedids=array();

        foreach ($blocked_profiles as $key)

           {

          $blockedids[]= $key->receiver_id;

        }

        $Details['blocked_profiles']=$blockedids;

        //pagination:-

        $Details['family_type']=explode(",",$familytype);



        $config = array();

        $config["base_url"] = base_url() . "index.php/user/home_gotonikah";

        $config["total_rows"] = $this->General_Model->getmatchingprofilesHome('',$Details,1);

        $config["per_page"] = DATALIMIT;

        $config["uri_segment"] = 3;

        

        $this->pagination->initialize($config);      

        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();     

        $MatchingProfiles = $this->General_Model->getmatchingprofilesHome($page,$Details);

        $data['MatchingProfiles']=$MatchingProfiles;

        $count = 1;

       

        $data['InterestExpressedCount'] = $this->General_Model->interestexpressed($offset,$Details,$count);

        $data['liked_profilesCount'] = $this->General_Model->liked_profiles($offset,$Details,$count);

        

        $data['pic']=$this->General_Model->GetProfileDetails($this->session->userdata('user_id'))['photo'];

        $this->load->view('home_gotonikah',$data);

        

    }

    

    public function profile_gotonikah()

    {

        $UserID = $this->session->userdata('user_id');

        $data['user_id']=$UserID;

        if(empty($UserID))

        { 

        redirect('user/logout_gotonikah');

            

        }

        $ProfileDetails = $this->General_Model->GetProfileDetails($UserID);     



        $data['ProfileDetails']=$ProfileDetails;

        $data['payment_done'] = $this->General_Model->payment_done($UserID);

            

            $name=$ProfileDetails['name'];

            

            $high_education=$ProfileDetails['highest_education'];

            $home_country=$ProfileDetails['home_country'];

            $country=$ProfileDetails['country'];

             

            $state=$ProfileDetails['present_state'];

                $state2=$ProfileDetails['state'];



            $native_district=$ProfileDetails['native_district'];

            $home_state=$ProfileDetails['home_state'];

            $home_district=$ProfileDetails['home_district'];

            $partner_country=$ProfileDetails['partner_country'];

            $partner_state=$ProfileDetails['partner_state'];

            

            $data['homestates']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$home_country);

            $data['homedistricts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state2);

            

            $data['homecity']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$home_district);

            $data['country']=$this->General_Model->GetFullData($table = "tbl_country");



            $data['states']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$country);

            $data['districts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state);

            if($partner_country!="")

            $data['partner_states']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$partner_country);

            if($partner_state!="")

            $data['partner_district']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$partner_state);

            $data['city']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$native_district);



            $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");

            $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 

            $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");

            $data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");

            $data['district'] = $this->General_Model->GetFullData($table = "tbl_district");

            $data['state'] = $this->General_Model->GetFullData($table = "tbl_states");

            $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");

            $data['professiontype'] = $this->General_Model->GetFullData($table = "tbl_professiontype");

            $data['profession'] = $this->General_Model->GetFullData($table = "tbl_profession");

            $data['income'] = $this->General_Model->GetFullData($table = "tbl_professional_income");

            $data['images'] = $this->General_Model->GetFullData('tbl_userimages','user_id',$UserID);

            $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");

                       

            $data['edu_data']=$this->General_Model->GetFullData($table = "tbl_education",$column="high_edu_id",$column_value=$high_education);





            $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");

            $data['education'] = $this->General_Model->GetFullData($table = "tbl_education");

            $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 

            $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 

            $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 

            $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 

            $data['familytype'] = $this->General_Model->GetFullData($table = "tbl_familytype"); 

            $data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus"); 

            $data['maritalstatus']=$this->General_Model->GetFullData($table = "tbl_maritalstatus");

            $data['hometype'] = $this->General_Model->GetFullData($table = "tbl_hometype"); 

            $OtherDetails=$this->General_Model->GetOtherDetails($UserID);

            $data['countryCode'] = $this->General_Model->fetch_countrycode();

                $data['madrassa_education'] = $this->General_Model->GetFullData($table = "tbl_madrassa_education");

            $data['OtherDetails']=$OtherDetails;

            $this->load->view('profile_gotonikah',$data);

    }

    

     public function searchprofiles_gotonikah()

        {

        $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");

        $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 

        $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 

        $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 

        $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 

        $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 

        $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");

        $data['religion'] = $this->General_Model->GetFullData($table = "tbl_religion");

        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");

        $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");

        $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");

        $data['professiontype'] = $this->General_Model->GetFullData($table = " tbl_professiontype");

        $data['profession'] = $this->General_Model->GetFullData($table = " tbl_profession");

        $data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus");

        $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");

        $data['maritalstatus']=$this->General_Model->GetFullData($table = "tbl_maritalstatus");

        

        $this->load->view('search_criterias_gotonikah',$data);

        

        }



      public function search_profile_common_gotonikah()

        {

        $UserID = $this->session->userdata('user_id');

        if(empty($UserID))

        { 

        redirect('user/logout');

            

        }

        if(isset($_GET['offset']))

        $offset = $_GET['offset'];

        else

        $offset ="";

        if(empty($offset)){ $offset = ''; }

        $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);

        $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

        $data['payment_done'] = $this->General_Model->payment_done($UserID);

        

        if($this->input->post('searchtype')!="")

        {

        

        $Details['caste'] = $this->input->post('belief');

        $Details['AgeFrom'] =!empty($this->input->post('age_from'))?$this->input->post('age_from'):'';

        $Details['AgeTo'] = !empty($this->input->post('age_to'))?$this->input->post('age_to'):'';

        $Details['HeightFrom'] = !empty($this->input->post('height_from'))?$this->input->post('height_from'):'';

        $Details['HeightTo']=  !empty($this->input->post('height_to'))?$this->input->post('height_to'):'';

        $Details['highest_education']= !empty($this->input->post('highest_education'))?$this->input->post('highest_education'):'';

        $Details['country']= !empty($this->input->post('country'))?$this->input->post('country'):'';

        $Details['state']= !empty($this->input->post('state'))?$this->input->post('state'):'';

        $Details['district']= !empty($this->input->post('district'))?$this->input->post('district'):'';

        $Details['city']= !empty($this->input->post('city'))?$this->input->post('city'):'';

        $Details['marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

        

        $_SESSION['common_caste'] =!empty($this->input->post('belief'))?$this->input->post('belief'):'';

        $_SESSION['common_AgeFrom'] =!empty($this->input->post('age_from'))?$this->input->post('age_from'):'';

        $_SESSION['common_AgeTo'] = !empty($this->input->post('age_to'))?$this->input->post('age_to'):'';

        $_SESSION['common_HeightFrom'] = !empty($this->input->post('height_from'))?$this->input->post('height_from'):'';

        $_SESSION['common_HeightTo']=  !empty($this->input->post('height_to'))?$this->input->post('height_to'):'';

        $_SESSION['common_highest_education']= !empty($this->input->post('highest_education'))?$this->input->post('highest_education'):'';

        $_SESSION['common_country']= !empty($this->input->post('country'))?$this->input->post('country'):'';

        $_SESSION['common_state']= !empty($this->input->post('state'))?$this->input->post('state'):'';

        $_SESSION['common_district']= !empty($this->input->post('district'))?$this->input->post('district'):'';

        $_SESSION['common_city']= !empty($this->input->post('city'))?$this->input->post('city'):'';

        $_SESSION['common_marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

        

        

        }

        

       

        $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

        //profiles blocked me

        $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

        $ignoredids=array();

        foreach ($ignored_profiles as $key)

        {

        $ignoredids[]= $key->receiver_id;

        }

        $Details['ignored_profiles']=$ignoredids;

        

        $blockedids=array();

        foreach ($blocked_profiles as $key)

        {

        $blockedids[]= $key->receiver_id;

        }

        $Details['blocked_profiles']=$blockedids;

        $config = array();

        $config["base_url"] = base_url() . "index.php/user/search_profile_common_gotonikah";

        $config["total_rows"] = $this->General_Model->getmatchingprofilesCommon('',$Details,1);

        

        $config["per_page"] = DATALIMIT;

        $config["uri_segment"] = 3;

        

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

        

        $data["links"] = $this->pagination->create_links();

        

        

        $MatchingProfiles = $this->General_Model->getmatchingprofilesCommon($page,$Details);

        

        $data['MatchingProfiles'] =$MatchingProfiles;

       

        

        $this->load->view('search_gotonikah',$data);

        

        }

    

        public function search_profile_advanced_gotonikah()

        {

        

        $UserID = $this->session->userdata('user_id');

        if(empty($UserID))

        { 

        redirect('user/logout');

            

        }

        

        if(isset($_GET['offset']))

        $offset = $_GET['offset'];

        else

        $offset ="";

        if(empty($offset)){ $offset = ''; }

        $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);

        $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

        $data['payment_done'] = $this->General_Model->payment_done($UserID);



         if($this->input->post('searchtype')!="")

        {

           

            $Details['AgeFrom'] =!empty($this->input->post('adv_age_from'))?$this->input->post('adv_age_from'):'';

            $Details['AgeTo'] = !empty($this->input->post('adv_age_to'))?$this->input->post('adv_age_to'):'';

            $Details['HeightFrom'] = !empty($this->input->post('adv_height_from'))?$this->input->post('adv_height_from'):'';

            $Details['HeightTo']=  !empty($this->input->post('adv_height_to'))?$this->input->post('adv_height_to'):'';

            $Details['WeightFrom'] =  !empty($this->input->post('adv_weight_from'))?$this->input->post('adv_weight_from'):'';

            $Details['WeightTo']=  !empty($this->input->post('adv_weight_to'))?$this->input->post('adv_weight_to'):'';

             $Details['bodytype']= !empty($this->input->post('bodytype'))?$this->input->post('bodytype'):'';

            $Details['skin_color']= !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'';

            $Details['financialstatus']= !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'';

            $Details['caste']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';

            $Details['physical_status']= !empty($this->input->post('physical_status'))?$this->input->post('physical_status'):'';

            $Details['highest_education']= !empty($this->input->post('adv_highest_education'))?$this->input->post('adv_highest_education'):'';

            $Details['country']= !empty($this->input->post('adv_country'))?$this->input->post('adv_country'):'';

            $Details['state']= !empty($this->input->post('adv_state'))?$this->input->post('adv_state'):'';

            $Details['district']= !empty($this->input->post('adv_district'))?$this->input->post('adv_district'):'';

            $Details['city']= !empty($this->input->post('adv_city'))?$this->input->post('adv_city'):'';

            $Details['profile_with_photo']= !empty($this->input->post('profile_with_photo'))?$this->input->post('profile_with_photo'):'';

            $Details['sort_by']= !empty($this->input->post('sort_by'))?$this->input->post('sort_by'):'';

            $Details['profession_type']= !empty($this->input->post('profession_type'))?$this->input->post('profession_type'):'';

            $Details['marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

            $Details['adv_belief']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';

            

            $_SESSION['adv_AgeFrom'] =!empty($this->input->post('adv_age_from'))?$this->input->post('adv_age_from'):'';

            $_SESSION['adv_AgeTo'] = !empty($this->input->post('adv_age_to'))?$this->input->post('adv_age_to'):'';

            $_SESSION['adv_HeightFrom'] = !empty($this->input->post('adv_height_from'))?$this->input->post('adv_height_from'):'';

            $_SESSION['adv_HeightTo']=  !empty($this->input->post('adv_height_to'))?$this->input->post('adv_height_to'):'';

            $_SESSION['adv_WeightFrom'] =  !empty($this->input->post('adv_weight_from'))?$this->input->post('adv_weight_from'):'';

            $_SESSION['adv_WeightTo']=  !empty($this->input->post('adv_weight_to'))?$this->input->post('adv_weight_to'):'';

            $_SESSION['adv_bodytype']= !empty($this->input->post('bodytype'))?$this->input->post('bodytype'):'';

            $_SESSION['adv_skin_color']= !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'';

            $_SESSION['adv_financialstatus']= !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'';

            $_SESSION['adv_caste']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';

            $_SESSION['adv_physical_status']= !empty($this->input->post('physical_status'))?$this->input->post('physical_status'):'';

            $_SESSION['adv_highest_education']= !empty($this->input->post('adv_highest_education'))?$this->input->post('adv_highest_education'):'';

            $_SESSION['adv_country']= !empty($this->input->post('adv_country'))?$this->input->post('adv_country'):'';

            $_SESSION['adv_state']= !empty($this->input->post('adv_state'))?$this->input->post('adv_state'):'';

            $_SESSION['adv_district']= !empty($this->input->post('adv_district'))?$this->input->post('adv_district'):'';

            $_SESSION['adv_city']= !empty($this->input->post('adv_city'))?$this->input->post('adv_city'):'';

            $_SESSION['adv_profile_with_photo']= !empty($this->input->post('profile_with_photo'))?$this->input->post('profile_with_photo'):'';

            $_SESSION['adv_sort_by']= !empty($this->input->post('sort_by'))?$this->input->post('sort_by'):'';

            $_SESSION['adv_profession_type']= !empty($this->input->post('profession_type'))?$this->input->post('profession_type'):'';

            $_SESSION['adv_marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';

            $_SESSION['adv_belief']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';



            

        }

        

       $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

        //profiles blocked me

        $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

        $ignoredids=array();

        foreach ($ignored_profiles as $key)

           {

          $ignoredids[]= $key->receiver_id;

        }

        $Details['ignored_profiles']=$ignoredids;

        

        $blockedids=array();

        foreach ($blocked_profiles as $key)

           {

          $blockedids[]= $key->receiver_id;

        }

        $Details['blocked_profiles']=$blockedids;

        $config = array();

        $config["base_url"] = base_url() . "index.php/user/search_profile_advanced_gotonikah";

        $config["total_rows"] = $this->General_Model->getmatchingprofilesAdvanced('',$Details,1);

     

        $config["per_page"] = DATALIMIT;

        $config["uri_segment"] = 3;



        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

        echo $this->pagination->create_links();

        $data["links"] = $this->pagination->create_links();



       

        $MatchingProfiles = $this->General_Model->getmatchingprofilesAdvanced($page,$Details);



        $data['MatchingProfiles'] =$MatchingProfiles;

        

        $this->load->view('search_gotonikah',$data);

    }

    

    public function search_profile_id_gotonikah()

    {

       

        $UserID = $this->session->userdata('user_id');

        if(empty($UserID))

        { 

        redirect('user/logout');

            

        }

        if(isset($_GET['offset']))

        $offset = $_GET['offset'];

        else

        $offset ="";

        if(empty($offset))

        { 

        $offset = ''; 

            

        }

        $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($UserID);

       $Details['gender'] = ($this->session->userdata('gender') == 1 ? 2 : 1);

        $data['payment_done'] = $this->General_Model->payment_done($UserID);

      

         if($this->input->post('searchtype')=="byid")

        {

        

            $Details['nikah_id']= !empty($this->input->post('happy_id'))?$this->input->post('happy_id'):'';

            $_SESSION['adv_nikah_id']= !empty($this->input->post('happy_id'))?$this->input->post('happy_id'):'';

        }

      

       $ignored_profiles = $this->General_Model->GetFullData($table = "tbl_ignored",'sender_id',$UserID);

       

        $blocked_profiles = $this->General_Model->GetFullData($table = "tbl_block",'receiver_id',$UserID);

        $ignoredids=array();

        foreach ($ignored_profiles as $key)

           {

          $ignoredids[]= $key->receiver_id;

        }

        $Details['ignored_profiles']=$ignoredids;

        

        $blockedids=array();

        foreach ($blocked_profiles as $key)

           {

          $blockedids[]= $key->receiver_id;

        }

        $Details['blocked_profiles']=$blockedids;

        $config = array();

        $config["base_url"] = base_url() . "index.php/user/search_profile_id_gotonikah";

       $config["total_rows"] = $this->General_Model->getmatchingprofilesid('',$Details,1);

      

      $config["per_page"] = DATALIMIT;

        $config["uri_segment"] = 3;



        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

     

        $data["links"] = $this->pagination->create_links();



       

        $MatchingProfiles = $this->General_Model->getmatchingprofilesid($page,$Details);



        $data['MatchingProfiles'] =$MatchingProfiles;

      

    

        $this->load->view('search_gotonikah',$data);

    }

    public function feedback_gotonikah($message="")

    {

        $data['message']=$message;

        $UserID = $this->session->userdata('user_id');

        if(empty($UserID))

        { 

        redirect('user/logout');

            

        }

        $this->load->view('feedback_gotonikah',$data);

    }

    

    public function gotonikah_landing()

    {

        if ($this->uri->uri_string() == 'user/gotonikah_landing')

        {

        redirect('gotonikah_landing');

        }

        

        if(isset($_SESSION['user_id']) && !(isset($_SESSION['userinfo']['stage'])))

        { 

        redirect('user/home_gotonikah');  

        }

        $this->is_session_available_gotonikah();

        

        // if(!empty($_SESSION['user_id'])){  redirect('user/home'); }

        $data['homeprofiles'] =$this->General_Model->gethomeprofiles();

        $data['countryCode'] = $this->General_Model->fetch_countrycode();

        

        $this->load->view('gotonikah_landing',$data);

    }

    

    public function GetStates_gotonikah()

    {

         $country = $this->input->post('country');

         $result = $this->General_Model->GetFullData('tbl_states','country_id',$country);

         if ($result != "") {

             $data1 = '<option value="">--Select--</option>';

             for ($i = 0; $i < count($result); $i++) {

                 $data = '<option value = "' . $result[$i]->id . '" textvalue="' . $result[$i]->name . '">' . $result[$i]->name . '</option>';

                 if (empty($i)) {

                     print_r($data1);

                 }

                 print_r($data);

             }

         }

    }

}

        