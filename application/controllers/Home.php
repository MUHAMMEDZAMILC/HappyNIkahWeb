<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {



    function __construct() {

        parent::__construct();

        $this->load->library('session');

        $this->load->helper('url');

        $this->load->database();

        $this->load->model('General_Model');

        $this->output->cache(60);
        $this->output->enable_profiler(TRUE);

         $this->load->library("pagination");

        

        //echo $_SESSION['userinfo']['stage']; exit;

 

        // if($_SESSION['user_id'] && $_GET['currentpage'] !=1){  



        // if($_SESSION['userinfo']['stage'] == 1){   redirect('user/registration_steptwo?currentpage=1');  }

        // else if($_SESSION['userinfo']['stage'] == 2){ redirect('user/registration_steptwo'); }else{





        // } 

        // }

    }

    

    public function upgradeto_premium(){

        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");

        $this->load->view('upgradeto_premium',$data);

    }

    

    

    function paymentcallbackafterorder_razrpy(){

        

        print_r($this->input->get_post());

        

        $_SESSION['callbackdatas'] = $this->input->get_post();

        

    }

    

    

    function resetpassword(){

        

        $mobile = $this->input->post('mobile');

        

        $code = $this->input->post('code');

        

        if($code == '91')

        {

            $countrycode = $code;

        }

        else

        {

            $countrycode = "+".$code;

        }

        $mobilenumber = $countrycode.$mobile;

        

        

        //$chk = $this->db->select('*')->from('tbl_registration')->where('phone',$mobile)->where('countryCode',$code)->where('status !=','3')->get()->row_array();

        $this->db->select("*");

        $this->db->from("tbl_registration");

        $this->db->where("(concat(countryCode,phone)='".$code.$mobile."' or phone='".$mobile."')");

        $chk=$this->db->get()->row_array();

        if(!empty($chk['id'])){

            

            $_SESSION['reset_id'] = $chk['id'];

            $_SESSION['reset_phone'] = $mobile;

            

        

        

        $otpval['otp'] = $otp = rand(100000,999999);

        $otpval['user_id'] = $chk['id'];

        $otpval['otp_time'] = date('Y-m-d H:i:s');

        $otpval['otp_from'] = "2";

        



        $this->General_Model->AddRecord('tbl_otp',$otpval);

        $user=$chk['name'];

        

        $_SESSION['lastotp'] = $otp;

        

         //$msg =  $otp.'%20is%20the%20Reset%20Password%20OTP%20for%20happynikah.com';////commented by shiji

         

     

         //$url =  'http://sms.sysol.in/api/api.php?ver=1&mode=1&action=push_sms&type=1&route=2&login_name=Sysolsystemsolutions&api_password=9d61ac8866c76e24cdde&message='.$msg.'&number='.$mobilenumber.'&sender=SYSOLS&template_id=1607100000000205213';

        ////commented by shiji recent

        // $url='https://2factor.in/API/R1/?module=TRANS_SMS&apikey=7a8571c8-ed69-11ec-9c12-0200cd936042&to='.$mobilenumber.'&from=SYSOLS&templatename=RESET+PASSWORD&var1='.$otp.'&var2=happynikah.com';

        

       // $url='https://2factor.in/API/R1/?module=TRANS_SMS&apikey=7a8571c8-ed69-11ec-9c12-0200cd936042&to='.$mobilenumber.'&from=SYSOLS&templatename=OTP+Template&var1='.$otp.'&var2='.$user.'&var3=happynikah.com';

       

        $url = 'https://2factor.in/API/V1/7a8571c8-ed69-11ec-9c12-0200cd936042/SMS/'.$mobilenumber.'/'.$otp.'/RESET+PASSWORD';//new api 05082022

         file_get_contents($url); 

         echo $_SESSION['lastotp'];

         
        }else{

            

         //   echo $this->db->last_query();

            

           echo 2;

           

        }

        

    }

    
    function verifyotp(){

        
         $otpdigit1 = $this->input->post('otpdigit1');

         

         $otpdigit2 = $this->input->post('otpdigit2');

         

         $otpdigit3 = $this->input->post('otpdigit3');

         

         $otpdigit4 = $this->input->post('otpdigit4');

         

         $otpdigit5 = $this->input->post('otpdigit5');



         $otpdigit6 = $this->input->post('otpdigit6');

         

         $postotp = $otpdigit1.$otpdigit2.$otpdigit3.$otpdigit4.$otpdigit5.$otpdigit6;

         $verify = $this->General_Model->verify_mobile($postotp,$_SESSION['reset_id']);

         if($verify == 1)

        {

            echo 1;

        }else{

             echo 2;

        }

         

        //  if($_SESSION['lastotp'] == $postotp){

        //      echo 1;

        //  }else{

        //      echo 2;

        //  }

        

    }

    

    function changepassword(){

        $confirmpasswordreset = $this->input->post('confirmpasswordreset');

        
        $passwordreset = $this->input->post('passwordreset');


        $password = md5($passwordreset);

        
       // echo $_SESSION['reset_id']; exit;

        
        $chk = $this->db->select('*')->from('tbl_userlogin')->where('user_id',$_SESSION['reset_id'])->get()->row_array();

        if(empty($chk['user_id'])){

         $data = array('password'=>$password,'date'=>date('Y-m-d'),'user_id'=>$_SESSION['reset_id'],'username'=>$_SESSION['reset_phone']);

        $this->db->insert('tbl_userlogin',$data);

        }else{


        $data = array('password'=>$password,'date'=>date('Y-m-d'));

        $this->db->where('user_id',$_SESSION['reset_id']);

        $this->db->update('tbl_userlogin',$data);


        }

        

        echo 1;

    }

    
    function fetchstate(){

        $country = $this->input->post('country');

        $res = $this->db->select('*')->from('tbl_states')->where('country_id',$country)->get()->result();

        $result = '<option value=""> Select State</option>';

        foreach($res as $res){

            
           $result .= '<option value="'.$res->id.'">'.$res->name.'</option>';

        }

        
        echo $result;

        
    }

    
    function fetchcity(){

        $state = $this->input->post('state');

        $res = $this->db->select('*')->from('tbl_district')->where('state_id',$state)->get()->result();

        $result = '<option value=""> Select District/City</option>';

        foreach($res as $res){

           $result .= '<option value="'.$res->district_id.'">'.$res->district.'</option>';

        }


        echo $result;

        
    }

    function ContactNow(){

        $to_email="info@happynikah.com";

        $from=$_POST['mail'];

        $name=$_POST['name'];
        
        $subject="Happy Nikah Contact from ".$name;

        $message=$_POST['message'];

        
        $headers = 'From: '.$name.'<'.$from.'>';

        echo mail($to_email, $subject, $message, $headers);

        //echo "1";

    }
    
    function ContactNow_gotonikah(){

        $to_email="info@gotonikah.com";

        $from=$_POST['mail'];

        $name=$_POST['name'];
        
        $phone=$_POST['phone'];
        
        $subject="Goto Nikah Contact from ".$name;

        $message=$_POST['message'];

        
        $headers = 'From: '.$name.'<'.$from.'>'.$phone;

        echo mail($to_email, $subject, $message, $headers);

        //echo "1";

    }

    
}