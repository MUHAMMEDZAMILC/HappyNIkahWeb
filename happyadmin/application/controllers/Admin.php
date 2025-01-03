<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use CodeIgniter\I18n\Time;
// require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{

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

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session','form_validation');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('General_Model');
		
		$UserID3 = $this->session->userdata('user_id');
		$this->load->library("pagination"); 
	}
	
	public function __destruct()
	{  
    $this->db->close();  
    }  
    
	public function index()
	{
	$this->load->view('login');
	}

    public function logaction()
    {
    $user = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $status= $this->input->post('user_type');
    $res = $this->General_Model->login($user,$password,$status);
    
    if($res != 'failure')
    {
    
    $user_type = $this->input->post('nikah_type');
    
    
    // $new_nikah_type = ($user_type == 'happynikah') ? 'happynikah' : 'gotonikah';
    
    
    switch ($user_type) 
    {
    case 'happynikah':
    $new_nikah_type = 'happynikah';
    break;
    case 'happymangalyam':
    $new_nikah_type = 'happymangalyam';
    break;
    case 'gotonikah':
    $new_nikah_type = 'gotonikah';
    break;
    default:
    $new_nikah_type = 'happynikah';
    break;
    }
    

    $this->General_Model->updateNikahType($res['user_id'], $new_nikah_type);
    
    $_SESSION['user_id_admin'] = $res['user_id'];
    $_SESSION['username'] = $res['username'];
    $_SESSION['user_type'] = $res['user_type'];
    $_SESSION['nikah_type'] = $new_nikah_type;
    
    if ($user_type == 'happynikah') 
    {
    redirect('admin/dashboard');
    } 
    
    elseif($user_type == 'gotonikah') 
    {
    redirect('admin/dashboard_gotonikah');
    }

    elseif($user_type == 'happymangalyam') 
    {
    redirect('admin/dashboard_happymangalyam');
    }
    }
    
    else
    {
    redirect('admin?error=1');
    }
    }

   public function followup_register()
   {

	$this->form_validation->set_rules('status','status','required');
	$this->form_validation->set_rules('fdate','Followup Date','required');
	$this->form_validation->set_rules('message','Message','required');

	$status   = $this->input->post('status');
	$fdate    = $this->input->post('fdate');
	$message  = trim($this->input->post('message'));
	$update_id  = $this->input->post('update_id');
    $login_id = $this->session->userdata('user_id_admin');
    
    $data2 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$update_id);
    $this->db->update('tbl_assign_active_calls', $data2);
    
    
    $data_payment_viewed = array('delete_status' =>'Inactive');
    $this->db->set('delete_status', 'Inactive');
    $this->db->where('sender_id',$update_id);
    $this->db->update('tbl_payment_viewed', $data_payment_viewed);
      
    $dataassignregister = array('assign_status' =>'Inactive');
    $this->db->set('assign_status', 'Inactive');
    $this->db->where('id',$update_id);
    $this->db->update('tbl_registration',$dataassignregister);
      
      
    $data5 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$update_id);
    $this->db->update('tbl_assign_approve_calls', $data5);

	$this->General_Model->signup_followup($status,$fdate,$message,$update_id,$login_id);
	redirect('admin/search_profiles');
	}
	
   public function payment_request()
   {

	$this->form_validation->set_rules('membership_plan','Membership plan','required');
	$this->form_validation->set_rules('postpone_date','Postpone Date','required');
	$this->form_validation->set_rules('plantype','Plan Type','required');

	$membership_plan   = $this->input->post('membership_plan');
	$postpone_date    = $this->input->post('postpone_date');
	$plantype  = $this->input->post('plantype');
	$payment_id  = $this->input->post('payment_id');
	$message = $this->input->post('message');
    $login_id = $this->session->userdata('user_id_admin');
    $delete_status="Active";
    
    $data5 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$payment_id);
    $this->db->update('tbl_assign_approve_calls', $data5);
    
    $dataassignregister = array('assign_status' =>'Inactive');
    $this->db->set('assign_status', 'Inactive');
    $this->db->where('id',$payment_id);
    $this->db->update('tbl_registration',$dataassignregister);
    
    $data2 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$payment_id);
    $this->db->update('tbl_assign_active_calls', $data2);
    
    $data_payment_viewed = array('delete_status' =>'Inactive');
    $this->db->set('delete_status', 'Inactive');
    $this->db->where('sender_id',$payment_id);
    $this->db->update('tbl_payment_viewed', $data_payment_viewed);
    
    $mdth=$this->db->select('*')->from('tbl_payement')->where('user_id',$payment_id)->get()->result_array();
    
    foreach($mdth as $paystatus)
    {
    $ss=$paystatus['status'];
    }
    
    $row_count = $this->General_Model->getRowCount();
    
    if($row_count >= 30) 
    {
    $this->session->set_flashdata('warning', 'Postpone Limit can be  Exceeded...');
    } 
    
    if($row_count <= 30) 
    {
    
    if($ss=='1')
    {
    $paidstatus="Paid"; 
    $data=array(
    'plan_id'=>$membership_plan,
    'postpone_date'=>$postpone_date,
    'message'=>$message,
    'cdate'=>date("Y-m-d H:i:s"),
    'plan_type'=>$plantype,
    'payment_id'=>$payment_id,
    'login_id'=>$login_id,
    'delete_status'=>$delete_status,
    'paid_status'=>$paidstatus,
    'crnt_date'=>date('Y-m-d')
    );
    $this->db->insert('tbl_paymentrequest',$data);
    }
    
    
    if(empty($mdth) || $ss == '0')
    {
    $paidstatus="UnPaid"; 
    $data=array(
    'plan_id'=>$membership_plan,
    'postpone_date'=>$postpone_date,
    'message'=>$message,
    'cdate'=>date("Y-m-d H:i:s"),
    'plan_type'=>$plantype,
    'payment_id'=>$payment_id,
    'login_id'=>$login_id,
    'delete_status'=>$delete_status,
    'paid_status'=>$paidstatus,
    'crnt_date'=>date('Y-m-d')
    );
    $this->db->insert('tbl_paymentrequest',$data);
    }
    }
    
    redirect('admin/search_profiles');
    }
    
    public function payment_request_approve_calls()
    {

	$this->form_validation->set_rules('membership_plan','Membership plan','required');
	$this->form_validation->set_rules('postpone_date','Postpone Date','required');
	$this->form_validation->set_rules('plantype','Plan Type','required');

	$membership_plan   = $this->input->post('membership_plan');
	$postpone_date    = $this->input->post('postpone_date');
	$plantype  = $this->input->post('plantype');
	$payment_id  = $this->input->post('payment_id');
	$message = $this->input->post('message');
    $login_id = $this->session->userdata('user_id_admin');
    $delete_status="Active";
    
    $data5 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$payment_id);
    $this->db->update('tbl_assign_approve_calls', $data5);
    
    $dataassignregister = array('assign_status' =>'Inactive');
    $this->db->set('assign_status', 'Inactive');
    $this->db->where('id',$payment_id);
    $this->db->update('tbl_registration',$dataassignregister);
    
    
    $data_payment_viewed = array('delete_status' =>'Inactive');
    $this->db->set('delete_status', 'Inactive');
    $this->db->where('sender_id',$payment_id);
    $this->db->update('tbl_payment_viewed', $data_payment_viewed);
    
    $mdth=$this->db->select('*')->from('tbl_payement')->where('status','1')->where('user_id',$payment_id)->get()->result_array();
     
    foreach($mdth as $paystatus)
    {
    $ss=$paystatus['user_id'];
    }
    
    $row_count = $this->General_Model->getRowCount();
    
    if($row_count >= 25) 
    {
    $this->session->set_flashdata('warning', 'Postpone Limit can be  Exceeded...');
    } 
    
    if($row_count <= 25) 
    {
    
    if($ss==$payment_id)
    {
    $paidstatus="Paid"; 
    $data=array(
    'plan_id'=>$membership_plan,
    'postpone_date'=>$postpone_date,
    'message'=>$message,
    'cdate'=>date("Y-m-d H:i:s"),
    'plan_type'=>$plantype,
    'payment_id'=>$payment_id,
    'login_id'=>$login_id,
    'delete_status'=>$delete_status,
    'paid_status'=>$paidstatus,
    'crnt_date'=>date('Y-m-d')
    );
    $this->db->insert('tbl_paymentrequest',$data);
    }
    
    if(empty($ss))
    {
    $paidstatus="UnPaid"; 
    $data=array(
    'plan_id'=>$membership_plan,
    'postpone_date'=>$postpone_date,
    'message'=>$message,
    'cdate'=>date("Y-m-d H:i:s"),
    'plan_type'=>$plantype,
    'payment_id'=>$payment_id,
    'login_id'=>$login_id,
    'delete_status'=>$delete_status,
    'paid_status'=>$paidstatus,
    'crnt_date'=>date('Y-m-d')
    );
    $this->db->insert('tbl_paymentrequest',$data);
    }
    }
    
    redirect('admin/search_profiles');
    }
    
   public function payment_request_active_calls()
   {

	$this->form_validation->set_rules('membership_plan','Membership plan','required');
	$this->form_validation->set_rules('postpone_date','Postpone Date','required');
	$this->form_validation->set_rules('plantype','Plan Type','required');

	$membership_plan   = $this->input->post('membership_plan');
	$postpone_date    = $this->input->post('postpone_date');
	$plantype  = $this->input->post('plantype');
	$payment_id  = $this->input->post('payment_id');
	$message = $this->input->post('message');
    $login_id = $this->session->userdata('user_id_admin');
    $delete_status="Active";
    
    $data2 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$payment_id);
    $this->db->update('tbl_assign_active_calls', $data2);
    
    $dataassignregister = array('assign_status' =>'Inactive');
    $this->db->set('assign_status', 'Inactive');
    $this->db->where('id',$payment_id);
    $this->db->update('tbl_registration',$dataassignregister);
    
    $data_payment_viewed = array('delete_status' =>'Inactive');
    $this->db->set('delete_status', 'Inactive');
    $this->db->where('sender_id',$payment_id);
    $this->db->update('tbl_payment_viewed', $data_payment_viewed);
    
    $mdth=$this->db->select('*')->from('tbl_payement')->where('status','1')->where('user_id',$payment_id)->get()->result_array();
     
    foreach($mdth as $paystatus)
    {
    $ss=$paystatus['user_id'];
    }
    
    $row_count = $this->General_Model->getRowCount();
    
    if($row_count >= 25) 
    {
    $this->session->set_flashdata('warning', 'Postpone Limit can be  Exceeded...');
    } 
    
    if($row_count <= 25) 
    {
    
    if($ss==$payment_id)
    {
    $paidstatus="Paid"; 
    $data=array(
    'plan_id'=>$membership_plan,
    'postpone_date'=>$postpone_date,
    'message'=>$message,
    'cdate'=>date("Y-m-d H:i:s"),
    'plan_type'=>$plantype,
    'payment_id'=>$payment_id,
    'login_id'=>$login_id,
    'delete_status'=>$delete_status,
    'paid_status'=>$paidstatus,
    'crnt_date'=>date('Y-m-d')
    );
    $this->db->insert('tbl_paymentrequest',$data);
    }
    
    
    if(empty($ss))
    {
    $paidstatus="UnPaid"; 
    $data=array(
    'plan_id'=>$membership_plan,
    'postpone_date'=>$postpone_date,
    'message'=>$message,
    'cdate'=>date("Y-m-d H:i:s"),
    'plan_type'=>$plantype,
    'payment_id'=>$payment_id,
    'login_id'=>$login_id,
    'delete_status'=>$delete_status,
    'paid_status'=>$paidstatus,
    'crnt_date'=>date('Y-m-d')
    );
    $this->db->insert('tbl_paymentrequest',$data);
    }
    }
        
	redirect('admin/search_profiles');
    }

	public function today_followup_register()
    {
	$status   = $this->input->post('status');
	$fdate    = $this->input->post('fdate');
	$message  = trim($this->input->post('message'));
	$eventId  = $this->input->post('eventId');
    $login_id = $this->session->userdata('user_id_admin');
    
    $data5 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$eventId);
    $this->db->update('tbl_assign_approve_calls', $data5);
    
    
    $data_payment_viewed = array('delete_status' =>'Inactive');
    $this->db->set('delete_status', 'Inactive');
    $this->db->where('sender_id',$eventId);
    $this->db->update('tbl_payment_viewed', $data_payment_viewed);
    
    $dataassignregister = array('assign_status' =>'Inactive');
    $this->db->set('assign_status', 'Inactive');
    $this->db->where('id',$eventId);
    $this->db->update('tbl_registration',$dataassignregister);
    
	$this->General_Model->signup_followup2($status,$fdate,$message,$eventId,$login_id);
	redirect('admin/search_profiles');
	}
	
	
	public function pending_followup_register()
    {
        
	$status   = $this->input->post('status');
	$fdate    = $this->input->post('fdate');
	$message  = trim($this->input->post('message'));
	$eventId  = $this->input->post('eventId');
    $login_id = $this->session->userdata('user_id_admin');
    
    
    $data5 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$eventId);
    $this->db->update('tbl_assign_approve_calls', $data5);
    
    $data_payment_viewed = array('delete_status' =>'Inactive');
    $this->db->set('delete_status', 'Inactive');
    $this->db->where('sender_id',$eventId);
    $this->db->update('tbl_payment_viewed', $data_payment_viewed);
    
    
    $data_activecalls = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$eventId);
    $this->db->update('tbl_assign_active_calls', $data_activecalls);
    
    $dataassignregister = array('assign_status' =>'Inactive');
    $this->db->set('assign_status', 'Inactive');
    $this->db->where('id',$eventId);
    $this->db->update('tbl_registration',$dataassignregister);
    
	$this->General_Model->signup_followup2($status,$fdate,$message,$eventId,$login_id);
	redirect('admin/search_profiles');
	}
	
	public function approve_badge()
    {
    $config['upload_path'] = './upload/badge/';
    $config['allowed_types'] = '*'; 
    $config['max_size'] = 0; 

    $this->load->library('upload', $config);

    $this->form_validation->set_rules('documents', 'Documents', 'required');
    $this->form_validation->set_rules('filedocs', 'File', 'callback_file_check');

    if ($this->form_validation->run() == FALSE) 
    {
    redirect('admin/search_profiles');
    } 
    
    else 
    {
    
    if ($this->upload->do_upload('filedocs')) 
    {
    $data = array(
    'user_id' => $this->input->post('user_id'),
    'documents' => $this->input->post('documents'),
    'filedocs' => $this->upload->data('file_name'),
    'date' => date('Y-m-d H:i:s')
    );
    
    $this->db->insert('tbl_badge', $data);
    
    $badge_profile_id = array('badge_status'=>'1');
    
    $this->db->where('id', $this->input->post('user_id'));
    $this->db->update('tbl_registration',$badge_profile_id);
    
    redirect('admin/search_profiles');
    } 
    else 
    {
    redirect('admin/search_profiles');
    }
    }
   }

    public function file_check($str)
    {
    $allowed_mime_types = array('image/gif', 'image/jpeg', 'image/png');
    $mime_type = $_FILES['filedocs']['type'];
    
    if(in_array($mime_type, $allowed_mime_types)) 
    {
    return TRUE;
    } 
    else 
    {
    $this->form_validation->set_message('file_check', 'Please upload a valid image file (gif, jpg, or png).');
    return FALSE;
    }
    }
	
    public function random_password() 
    {
    
    $string="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
    $password=substr(($string),0,8);  
    $pass=md5($password);
    }
    
	public function todayfollowup_update()
	{

	$data=$this->General_Model->update_today_followup();
	echo json_encode($data);
	}
	
    public function todayfollowup_creation_update()
    {
    
    $fdate    = $this->input->post('fdate');
    $id= $this->input->post('user_id');
    $emp_id =$this->input->post('session');
    $message =$this->input->post('message');
    $login_id = $this->session->userdata('user_id_admin');
    $delete_date=date('Y-m-d');
    $status='3';
    
    $this->General_Model->update_followup_creation_update($id,$emp_id,$message,$delete_date,$fdate);
    redirect('admin/search_profiles');
    
    }
	
	public function todaypostpone_update()
	{
	    
    $membership_plan   = $this->input->post('membership_plan');
	$postpone_date    = $this->input->post('postpone_date');
	$plantype  = $this->input->post('plantype');
    $login_id = $this->session->userdata('user_id_admin');
	$message = $this->input->post('message');
	$id= $this->input->post('user_id');
    $cdate=date('Y-m-d');
    $cdate_time=date('Y-m-d H:i:s');
    
    $this->General_Model->todaypostpone_update($id,$membership_plan,$postpone_date,$plantype,$message,$cdate,$login_id,$cdate_time);
    redirect('admin/search_profiles');
    }
    
	public function closeexpirycalls()
	{
    $session_id = $this->session->userdata('user_id_admin');
	$reason = $this->input->post('reason_status');
	$id= $this->input->post('user_id2');
	$message = $this->input->post('message'); 
    $payment_status='0';    
    $cdate=date('Y-m-d');

	$this->General_Model->closeexpirycalls($id,$session_id,$message,$reason,$cdate,$payment_status);
	
	redirect('admin/search_profiles');
	}
	
	public function todaypostpone_delete()
	{
    $delete_status="Inactive";
    $login_id = $this->session->userdata('user_id_admin');
	$message = $this->input->post('message');
	$reason = $this->input->post('reason_status');
	$id= $this->input->post('user_id2');
	$cdate=date('Y-m-d H:i:s');
	$date=date('Y-m-d');
	
    $this->General_Model->todaypostpone_delete($id,$delete_status,$login_id,$message,$reason,$cdate,$date);
    redirect('admin/search_profiles');
	}
	
	public function closetodayfollowup()
	{

    $delete_status="Inactive";
    $login_id = $this->session->userdata('user_id_admin');
	$message = $this->input->post('message');
	$reason = $this->input->post('reason_status');
	$id= $this->input->post('user_id2');
	$cdate=date('Y-m-d H:i:s');
	$crnt_date=date('Y-m-d');
	
    $this->General_Model->closetodayfollowup($id,$delete_status,$login_id,$message,$reason,$cdate,$crnt_date);
     redirect('admin/search_profiles');
	}
	
	public function closependingfollowup()
	{
    $delete_status="Inactive";
    $login_id = $this->session->userdata('user_id_admin');
	$message = $this->input->post('message');
	$reason = $this->input->post('reason_status');
	$id= $this->input->post('user_id2');
	
	$cdate=date('Y-m-d H:i:s');
	$crnt_date=date('Y-m-d');
    $this->General_Model->closependingfollowup($id,$delete_status,$login_id,$message,$reason,$cdate,$crnt_date);
    redirect('admin/search_profiles');
	}
	
	public function profile_delete()
	{
        $id= $this->input->post('user_id');
        $emp_id =$this->input->post('session');
        $reason_status=$this->input->post('reason_status');
        $message =$this->input->post('message');
        $delete_date=date('Y-m-d H:i:s');
        $status='3';
        
        $data2 = array('active_status' =>'Inactive');
        $this->db->set('active_status', 'Inactive');
        $this->db->where('action_check',$id);
        $this->db->update('tbl_assign_active_calls', $data2);
        
        $data33 = array('active_status' =>'Inactive');
        $this->db->set('active_status', 'Inactive');
        $this->db->where('action_check',$id);
        $this->db->update('tbl_assign_approve_calls', $data33);
        
	    $this->General_Model->profile_delete_id($id,$emp_id,$status,$reason_status,$message,$delete_date);
        redirect('admin/search_profiles');

	}
	
	public function profile_approvel()
	{
		$id= $this->input->post('user_id');
		$emp_id =$this->input->post('session');
		$reason_status=$this->input->post('reason_status');
		$message =$this->input->post('message');
		$delete_date=date('Y-m-d H:i:s');
		$status='1';
		$pending_status='2';

	   $this->General_Model->profile_approvel_id($id,$emp_id,$status,$reason_status,$message,$delete_date,$pending_status);
       redirect('admin/search_profiles');
	}
	
	public function undelete_profile()
	{
		$id= $this->input->post('user_id');
		$emp_id =$this->input->post('session');
		$reason_status=$this->input->post('reason_status');
		$message =$this->input->post('message');
		$delete_date=date('Y-m-d H:i:s');
		$status='6';

	    $this->General_Model->profile_undelete_id($id,$emp_id,$status,$reason_status,$message,$delete_date);
        redirect('admin/search_profiles');
	  
	}
	
   public function dashboard()
   {
       
	if($_SESSION['user_type']==='0')
	{
	 
		$UserID=$this->session->userdata('user_id');
		
	  	$data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','0'));
	  	$pending_all=array('status'=>'0','goto_nikah'=>'0');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$pending_all));
        $approve_all=array('status'=>'1','goto_nikah'=>'0');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$approve_all));
        $reject_all=array('status'=>'2','goto_nikah'=>'0');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$reject_all));
        $delete_all=array('status'=>'3','goto_nikah'=>'0');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$delete_all));
        $where_male = array('gender'=>'1','goto_nikah'=>'0');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'0');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'0');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'0');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'0');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        
        $where_daily_all = array('goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
         
        $data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",$where_daily_all));
        $where1 = array('status'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        $where10 = array('reg_through'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
		$this->load->view('dashboardsuper',$data);
	  }
	  
	  elseif($_SESSION['user_type']==='1')
	  {

	  	$UserID=$this->session->userdata('user_id');
		
	  	$data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','0'));
	  	$pending_all=array('status'=>'0','goto_nikah'=>'0');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$pending_all));
        $approve_all=array('status'=>'1','goto_nikah'=>'0');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$approve_all));
        $reject_all=array('status'=>'2','goto_nikah'=>'0');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$reject_all));
        $delete_all=array('status'=>'3','goto_nikah'=>'0');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$delete_all));
        $where_male = array('gender'=>'1','goto_nikah'=>'0');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'0');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'0');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'0');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'0');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        
        $where_daily_all = array('goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
         
        $data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",$where_daily_all));
        $where1 = array('status'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        $where10 = array('reg_through'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
		$this->load->view('dashboardadmin',$data);
	  }
	  
	  elseif($_SESSION['user_type']=='3')
	  {
	  	$UserID=$this->session->userdata('user_id');
		
	  	$data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','0'));
	  	$pending_all=array('status'=>'0','goto_nikah'=>'0');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$pending_all));
        $approve_all=array('status'=>'1','goto_nikah'=>'0');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$approve_all));
        $reject_all=array('status'=>'2','goto_nikah'=>'0');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$reject_all));
        $delete_all=array('status'=>'3','goto_nikah'=>'0');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$delete_all));
        $where_male = array('gender'=>'1','goto_nikah'=>'0');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'0');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'0');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'0');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'0');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        
        $where_daily_all = array('goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
         
        $data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",$where_daily_all));
        $where1 = array('status'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        $where10 = array('reg_through'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
		$this->load->view('dashboardsales',$data);
	    }
	    
	    elseif($_SESSION['user_type']=='4') 
	    {
	  
	  	$data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','0'));
	  	$pending_all=array('status'=>'0','goto_nikah'=>'0');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$pending_all));
        $approve_all=array('status'=>'1','goto_nikah'=>'0');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$approve_all));
        $reject_all=array('status'=>'2','goto_nikah'=>'0');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$reject_all));
        $delete_all=array('status'=>'3','goto_nikah'=>'0');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$delete_all));
        $where_male = array('gender'=>'1','goto_nikah'=>'0');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'0');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'0');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'0');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'0');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
		
		$sessid= $this->session->userdata('user_id_admin');
		$wheredailyall = array('reg_date'=>date('Y-m-d'),'staff_id'=>$sessid,'status'=>'1');
		 
		$wheremonthall = array('MONTH(reg_date)'=>date('m'),'staff_id'=>$sessid,'status'=>'1');
		$data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",$wheredailyall));
		$data['month_all'] = count($this->General_Model->GetFullData1("tbl_registration",$wheremonthall));
				
	    $where1 = array('status'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        $where10 = array('reg_through'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
		$this->load->view('dashboardcreation',$data);
	    }
	    
	    elseif($_SESSION['user_type']=='5')
	    {
        $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','0'));
	  	$pending_all=array('status'=>'0','goto_nikah'=>'0');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$pending_all));
        $approve_all=array('status'=>'1','goto_nikah'=>'0');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$approve_all));
        $reject_all=array('status'=>'2','goto_nikah'=>'0');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$reject_all));
        $delete_all=array('status'=>'3','goto_nikah'=>'0');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$delete_all));
        $where_male = array('gender'=>'1','goto_nikah'=>'0');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'0');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'0');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'0');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'0');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        
        $where_daily_all = array('goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
         
        $data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",$where_daily_all));
        $where1 = array('status'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        $where10 = array('reg_through'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
		$this->load->view('dashboardapproval',$data);
	    }
	    
	  	elseif($_SESSION['user_type']==='6')
	  	{
	  	   
	    $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','0'));
	  	$pending_all=array('status'=>'0','goto_nikah'=>'0');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$pending_all));
        $approve_all=array('status'=>'1','goto_nikah'=>'0');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$approve_all));
        $reject_all=array('status'=>'2','goto_nikah'=>'0');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$reject_all));
        $delete_all=array('status'=>'3','goto_nikah'=>'0');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$delete_all));
        $where_male = array('gender'=>'1','goto_nikah'=>'0');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'0');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'0');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'0');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'0');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        
        $where_daily_all = array('goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
         
        $data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",$where_daily_all));
        $where1 = array('status'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        $where10 = array('reg_through'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
        
        
        $reg_date=date('Y-m-d');
        
        $data['daily_admin2'] =$this->db->select('*')->from('tbl_registration')->where_in('staff_id',array('3','4','5','6','7','8','24'))->where('status','1')
        ->where('reg_through','1')->where('reg_date',$reg_date)->get();
        
	  	$this->load->view('dashboardsupport',$data);  
	  	}
	  	
        elseif($_SESSION['user_type']=='7')
        {
        $this->load->view('dashboardchatsupport');
	    }
	    
	    elseif($_SESSION['user_type']=='8')
        {
        $this->load->view('dashboardservice');
	    }
	    
	    elseif($_SESSION['user_type']=='13')
        {
        
       	$UserID=$this->session->userdata('user_id');
	  	
	    $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','0'));
	  	$pending_all=array('status'=>'0','goto_nikah'=>'0');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$pending_all));
        $approve_all=array('status'=>'1','goto_nikah'=>'0');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$approve_all));
        $reject_all=array('status'=>'2','goto_nikah'=>'0');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$reject_all));
        $delete_all=array('status'=>'3','goto_nikah'=>'0');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$delete_all));
        $where_male = array('gender'=>'1','goto_nikah'=>'0');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'0');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'0');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'0');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'0');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        
        $where_daily_all = array('goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
         
        $data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",$where_daily_all));
        $where1 = array('status'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        $where10 = array('reg_through'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
        
        $this->load->view('dashboardsuperadmin',$data);
	    }
	    
	    elseif($_SESSION['user_type']=='14')
        {
        
       	$UserID=$this->session->userdata('user_id');
	  	
	    $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','0'));
	  	$pending_all=array('status'=>'0','goto_nikah'=>'0');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$pending_all));
        $approve_all=array('status'=>'1','goto_nikah'=>'0');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$approve_all));
        $reject_all=array('status'=>'2','goto_nikah'=>'0');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$reject_all));
        $delete_all=array('status'=>'3','goto_nikah'=>'0');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$delete_all));
        $where_male = array('gender'=>'1','goto_nikah'=>'0');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'0');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'0');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'0');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'0');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        
        $where_daily_all = array('goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
         
        $data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",$where_daily_all));
        $where1 = array('status'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        $where10 = array('reg_through'=>'2','goto_nikah'=>'0','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
        
        $this->load->view('dashboardaccountsadmin',$data);
	    }
	    
        elseif($_SESSION['user_type']=='16')
        {
        $this->load->view('directdashboard');  
        }
        elseif($_SESSION['user_type']=='17')
        {
        $this->load->view('staffdashboard');  
        }
        
        else
        {
        $this->load->view('dashboard3');
        }
    }
   
    public function check_phone_avalibility()  
    {  
    
    // if($this->General_Model->is_phone_available($_POST["phone"]))  
    // {  
    // echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Phone Already Registered</label>';  
    // }  
    // else  
    // {  
    // echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Phone Available,Registration Can be Possible</label>';  
    // }  
    
    
    $phone = $_POST["phone"];
    $availability = $this->General_Model->is_phone_available($phone);

    if ($availability == 'registered') {
    echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Phone Already Registered</label>';
    } 
    
    elseif ($availability == 'available') {
        echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Phone Available,Registration Can be Possible</label>';
    }
    
    
    
    }       

        public function register($page = '')
        {
        if($page == 'Register')
        {
        
        $UserDetails['name'] = !empty($this->input->post('name'))?$this->input->post('name'):'NULL';
        $UserDetails['gender'] = !empty($this->input->post('gender'))?$this->input->post('gender'):'NULL';
        $UserDetails['countryCode'] =!empty($this->input->post('country_code'))?$this->input->post('country_code'):'NULL';
        $UserDetails['phone'] =!empty($this->input->post('phone'))?$this->input->post('phone'):'NULL';
        $UserDetails['source'] = !empty($this->input->post('source'))?$this->input->post('source'):'NULL';
        $UserDetails['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
        $UserDetails['dob'] = !empty($this->input->post('dob'))?$this->input->post('dob'):'NULL';
        $UserDetails['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';
        $UserDetails['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';
        $UserDetails['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';
        $UserDetails['marital_status'] = $this->input->post('marital_status');
        $UserDetails['no_of_children'] = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'NULL';
        $UserDetails['physical_status'] = $this->input->post('physically_challenged');
        $UserDetails['registration_phychallenge'] =$this->input->post('disability');
        $UserDetails['disability'] =$this->input->post('physical_status');
        $UserDetails['mother_tongue'] = !empty($this->input->post('mothertongue'))?$this->input->post('mothertongue'):'NULL';
        $UserDetails['nationality'] =$this->input->post('nationality');
        $UserDetails['religion'] = 2;
        $UserDetails['caste'] = $this->input->post('belief');
        $UserDetails['highest_education'] = $this->input->post('highest_education');
        $UserDetails['education'] = $this->input->post('education');
        $UserDetails['blood_group'] =$this->input->post('bloodgroup');
        $UserDetails['madrassa_education'] = !empty($this->input->post('madrassa_education'))?$this->input->post('madrassa_education'):'NULL';	
        $UserDetails['code'] =$this->input->post('code');
        $UserDetails['financialstatus'] =$this->input->post('financialstatus');
        $UserDetails['job_category'] = $this->input->post('profession_type');
        $UserDetails['occupation'] = $this->input->post('profession');
        $UserDetails['present_country'] = $this->input->post('present_country');
        $UserDetails['home_state'] = $this->input->post('present_states');
        $UserDetails['home_district'] =$this->input->post('present_district');
        $UserDetails['home_city'] = $this->input->post('present_city');
        $UserDetails['country'] = $this->input->post('country');
        $UserDetails['home_country'] = $this->input->post('country');
        $UserDetails['photopassword'] = $this->input->post('photopassword');
        $UserDetails['photo_visibility'] = !empty($this->input->post('photo_visibility'))?$this->input->post('photo_visibility'):'0';
        $UserDetails['annual_income'] = $this->input->post('annual_income');  
        $UserDetails['state'] = $this->input->post('states');
        $UserDetails['native_district'] = $this->input->post('districts');
        $UserDetails['native_place'] = $this->input->post('native_place');
        $UserDetails['bodytype'] =$this->input->post('bodytype');
        $UserDetails['appearance'] = $this->input->post('appearance');
        $UserDetails['mail'] = $this->input->post('email');
        $UserDetails['address'] = $this->input->post('address');
        $UserDetails['secondary_code'] = !empty($this->input->post('secondary_code'))?$this->input->post('secondary_code'):'NULL';
        $UserDetails['other_contact_number'] = $this->input->post('secondary_number');
        $UserDetails['job_details'] = $this->input->post('job_details');
        $UserDetails['reg_date'] = date('Y-m-d');
        $UserDetails['verified_date'] = date('Y-m-d');
        $UserDetails['staff_id'] = $this->session->userdata('user_id_admin');
        $UserDetails['about'] = "I'm ".$UserDetails['name'].". I'm ".$UserDetails['age']." Years old";
        $UserDetails['status'] = "1";
        $UserDetails['reg_through'] = "1";
        $UserDetails['direct'] = "32";
        $UserDetails['stage']="4";

        $FamilyDetails['familytype'] = !empty($this->input->post('familytype'))?$this->input->post('familytype'):'NULL';
        $FamilyDetails['financial_status'] = !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'NULL';		
        $FamilyDetails['hometype'] = !empty($this->input->post('hometype'))?$this->input->post('hometype'):'NULL';
        $FamilyDetails['fatherdetails'] = !empty($this->input->post('fatherdetails'))?$this->input->post('fatherdetails'):'NULL';
        $FamilyDetails['fathers_occupation'] = !empty($this->input->post('fathers_occupation'))?$this->input->post('fathers_occupation'):'NULL';
        $FamilyDetails['motherdetails'] = !empty($this->input->post('motherdetails'))?$this->input->post('motherdetails'):'NULL';
        $FamilyDetails['mothers_occupation'] = !empty($this->input->post('mothers_occupation'))?$this->input->post('mothers_occupation'):'NULL';
        $FamilyDetails['total_members'] = !empty($this->input->post('total_members'))?$this->input->post('total_members'):'NULL';
        
        
        $ProfileDetails['partner_age_from'] = !empty($this->input->post('partner_age_from'))?$this->input->post('partner_age_from'):'NULL';
        $ProfileDetails['aboutme'] = $this->input->post('description');
        $ProfileDetails['partner_age_to'] = !empty($this->input->post('partner_age_to'))?$this->input->post('partner_age_to'):'NULL';
        $ProfileDetails['partner_height'] = !empty($this->input->post('partner_height_from'))?$this->input->post('partner_height_from'):'NULL';
        $ProfileDetails['partner_height_to'] = !empty($this->input->post('partner_height_to'))?$this->input->post('partner_height_to'):'NULL';
        $partner_physicalstatus = !empty($this->input->post('partner_physical_statusnew'))?$this->input->post('partner_physical_statusnew'):'';
        $ProfileDetails['partner_physicalstatus'] =!empty($partner_physicalstatus)?implode(',',$partner_physicalstatus):'0';
        $partner_maritalstatus = !empty($this->input->post('partner_marital_status'))?$this->input->post('partner_marital_status'):'';
        $ProfileDetails['partner_maritalstatus'] =!empty($partner_maritalstatus)?implode(',',$partner_maritalstatus):'0';
        $partner_mothertongue = !empty($this->input->post('partner_mother_tongue'))?$this->input->post('partner_mother_tongue'):'';
        $ProfileDetails['partner_mother_tongue'] =!empty($partner_mothertongue)?implode(',',$partner_mothertongue):'0';
        $partner_languagespoken = !empty($this->input->post('partner_language_spoken'))?$this->input->post('partner_language_spoken'):'';
        $ProfileDetails['partner_languagespoken'] =!empty($partner_languagespoken)?implode(',',$partner_languagespoken):'0';
        $partner_skincolor = !empty($this->input->post('partner_skin_color'))?$this->input->post('partner_skin_color'):'';
        $ProfileDetails['partner_skincolor'] =!empty($partner_skincolor)?implode(',',$partner_skincolor):'0';
        $partner_appearance = !empty($this->input->post('partner_appearance'))?$this->input->post('partner_appearance'):'';
        $ProfileDetails['partner_appearance'] =!empty($partner_appearance)?implode(',',$partner_appearance):'0';
        $ProfileDetails['partner_caste'] = !empty($this->input->post('partner_caste'))?$this->input->post('partner_caste'):'NULL';
        $ProfileDetails['partner_religion'] = !empty($this->input->post('partner_religion'))?$this->input->post('partner_religion'):'NULL';
        $ProfileDetails['partner_physicalstatus'] = !empty($this->input->post('partner_physically_challenged'))?$this->input->post('partner_physically_challenged'):'NULL';    
        $partner_occupation=!empty($this->input->post('partner_occupation'))?$this->input->post('partner_occupation'):'';
        $OtherDetails['partner_occupation'] = !empty($partner_occupation)?implode(',',$partner_occupation):'0';
        $ProfileDetails['partner_annualincome'] = !empty($this->input->post('partner_annualincome'))?$this->input->post('partner_annualincome'):'NULL';
        $ProfileDetails['aboutme'] = !empty($this->input->post('description'))?$this->input->post('description'):'NULL';
        $ProfileDetails['partner_country'] = !empty($this->input->post('partner_country'))?$this->input->post('partner_country'):'NULL';
        $ProfileDetails['partner_state'] = !empty($this->input->post('partner_state'))?$this->input->post('partner_state'):'NULL';
        $partner_district= !empty($this->input->post('partner_district'))?$this->input->post('partner_district'):'';
        $ProfileDetails['partner_district'] =!empty($partner_district)?implode(',',$partner_district):'0';
        $OtherDetails['partner_nationality'] = !empty($this->input->post('partner_nationality'))?$this->input->post('partner_nationality'):'NULL';
        $ProfileDetails['demands'] = !empty($this->input->post('partner_expectation'))?$this->input->post('partner_expectation'):'NULL';   
        $partner_education = !empty($this->input->post('partner_education'))?$this->input->post('partner_education'):'';
        $ProfileDetails['partner_education'] = !empty($partner_education)?implode(',',$partner_education):'NULL';
        $ProfileDetails['partner_financial'] = !empty($this->input->post('partnerfinancialstatus'))?$this->input->post('partnerfinancialstatus'):'NULL';
        $partner_profession = !empty($this->input->post('partner_occupation'))?$this->input->post('partner_occupation'):'NULL';
        $ProfileDetails['partner_occupation']= !empty($partner_profession)?implode(',',$partner_profession):'NULL';
        $partner_district2= !empty($this->input->post('district_preference'))?$this->input->post('district_preference'):'NULL';
        $PartnerDetails['partner_district'] =!empty($partner_district2)?implode(',',$partner_district2):'NULL';
        
        if($this->session->userdata('user_id'))
        $UserID = $this->session->userdata('user_id');
        else
        $UserID="";
        
        if(!empty($UserID))
        {
        $_SESSION['name'] = $BasicDetails['name'];
        $_SESSION['phone'] = $BasicDetails['phone'];
        $_SESSION['age'] = $BasicDetails['age'];
        $exist = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);
        }
        
        $submit_value = $this->input->post('submit');
        if($submit_value == 'Save User Details')
        {
        $checkexist = $this->db->select('*')->from('tbl_registration')->where('phone',$UserDetails['phone'])
        ->where('status !=','3')->get()->num_rows();
        if($checkexist == 0)
        {
        
        $_SESSION['name'] = $UserDetails['name'];
        $_SESSION['phone'] = $UserDetails['phone'];
        $_SESSION['age'] = $UserDetails['age'];
        
        
        $UserID = $this->General_Model->AddRecord('tbl_registration', $UserDetails);
        $_SESSION['user_id'] =$UserID;
        
        $FamilyDetails['user_id'] = !empty($UserID)?$UserID:'NULL';
        $ProfileDetails['user_id'] = !empty($UserID)?$UserID:'NULL';
        $this->General_Model->AddRecord('tbl_familyprofile', $FamilyDetails);
        $this->General_Model->AddRecord('tbl_otherdetails', $ProfileDetails);
        
        
        $string="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
        $password=substr(str_shuffle($string),0,8);  
        
        $PartnerDetails['user_id'] = $UserID;
        $empsess_id=$this->session->userdata('user_id_admin');
        $loginDetails['password']=md5($password);
        $loginDetails['user_id'] = $UserID;
        
        
        $loginDetails['date'] = date('Y-m-d');
        $loginDetails['emp_id'] = $empsess_id;
        
        $loginDetails['username'] = $UserDetails['phone'];
        $loginDetails['originalpass'] = $password;  
        $happynikah_id = $this->General_Model->fetch_hnID($UserID)['happynikah_id'];
        
        $this->General_Model->AddRecord('tbl_userlogin',$loginDetails);
        
        
        if($UserDetails['countryCode'] == '91')
        {
        $countryCode = $UserDetails['countryCode'];
        }
        
        else
        {
         $countryCode = "+".$UserDetails['countryCode'];
        }
          
        $mobilenumber = $countryCode.$UserDetails['phone'];
        $name=$UserDetails['name'];
  
        $msg="UserID:$happynikah_id%20Password:$password";
       
        $this->smsotp($msg,$mobilenumber,$name);
        }
        
        else
        {   
        
        $UserDetails['name'] = !empty($this->input->post('name'))?$this->input->post('name'):'NULL';
        $UserDetails['gender'] = !empty($this->input->post('gender'))?
        $this->input->post('gender'):'NULL';
        $UserDetails['countryCode'] =!empty($this->input->post('country_code'))?$this->input->post('country_code'):'NULL';
        $UserDetails['phone'] =!empty($this->input->post('phone'))?$this->input->post('phone'):'NULL';
        $UserDetails['source'] = !empty($this->input->post('source'))?
        $this->input->post('source'):'NULL';
        $UserDetails['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
        $UserDetails['dob'] = !empty($this->input->post('dob'))?$this->input->post('dob'):'NULL';
        $UserDetails['height'] = !empty($this->input->post('height'))?
        $this->input->post('height'):'NULL';
        $UserDetails['weight'] = !empty($this->input->post('weight'))?
        $this->input->post('weight'):'NULL';
        $UserDetails['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';
        $UserDetails['marital_status'] = $this->input->post('marital_status');
        $UserDetails['no_of_children'] = $this->input->post('no_of_children');
        $UserDetails['physical_status'] = $this->input->post('physically_challenged');
        $UserDetails['registration_phychallenge'] =$this->input->post('disability');
        $UserDetails['disability'] =$this->input->post('physical_status');
        $UserDetails['mother_tongue'] =$this->input->post('mothertongue');
        $UserDetails['nationality'] =$this->input->post('nationality');
        $UserDetails['religion'] = 2;
        $UserDetails['caste'] = $this->input->post('belief');
        $UserDetails['photo_visibility'] = $this->input->post('photo_visibility');
        $UserDetails['highest_education'] = $this->input->post('highest_education');
        $UserDetails['education'] = $this->input->post('education');
        $UserDetails['job_category'] = $this->input->post('profession_type');
        $UserDetails['occupation'] = $this->input->post('profession');
        $UserDetails['present_country'] = $this->input->post('present_country');
        $UserDetails['present_state'] = $this->input->post('present_states');
        $UserDetails['present_district'] =$this->input->post('present_district');
        $UserDetails['present_city'] = $this->input->post('present_city');
        $UserDetails['country'] = $this->input->post('country');
        $UserDetails['state'] = $this->input->post('states');
        $UserDetails['native_district'] = $this->input->post('districts');
        $UserDetails['native_place'] = $this->input->post('native_place');
        $UserDetails['bodytype'] =$this->input->post('bodytype');
        $UserDetails['appearance'] = $this->input->post('appearance');
        $UserDetails['mail'] = $this->input->post('email');
        $UserDetails['address'] = $this->input->post('address');
        $UserDetails['secondary_code'] = $this->input->post('secondary_code');
        $UserDetails['other_contact_number'] = $this->input->post('secondary_number');
        $ProfileDetails['aboutme'] = $this->input->post('description');
        $UserDetails['home_country'] = $this->input->post('country');
        $UserDetails['reg_date'] = date('Y-m-d');
        $UserDetails['verified_date'] = date('Y-m-d');
        $UserDetails['staff_id'] = $this->session->userdata('user_id_admin');
        $UserDetails['about'] = "I'm ".$UserDetails['name'].". I'm ".$UserDetails['age']." Years old";
        $UserDetails['status'] = "1";
        $UserDetails['stage'] = "4";
        $UserDetails['reg_through'] = "1";
        $UserDetails['blood_group'] = $this->input->post('bloodgroup');
        $UserDetails['job_details'] = $this->input->post('job_details');
        
        
        $config['upload_path'] = '../../assets/photo_storage/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '*';
        $config['max_width'] = '*';
        $config['max_height'] = '*';
        
        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload('photo')) 
        {
        $error = $this->upload->display_errors();
        }
        else
        {
        $filename = $this->upload->data();
        $UserDetails['photo']= $filename['file_name'];
        
        $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,
        $UserDetails);
        
        $this->session->set_flashdata('existing',$UserDetails['phone'].'is already registered!');
        redirect('admin/register');    
        
        }
        }			 
        }
        else
        {
        
        $UserID = $this->input->post('userid');
        
        $UserDetails_update['name'] = !empty($this->input->post('name'))?$this->input->post('name'):'NULL';
        $UserDetails_update['gender'] = !empty($this->input->post('gender'))?$this->input->post('gender'):'NULL';
        $UserDetails_update['countryCode'] =!empty($this->input->post('country_code'))?$this->input->post('country_code'):'NULL';
        $UserDetails_update['phone'] =!empty($this->input->post('phone'))?$this->input->post('phone'):'NULL';
        $UserDetails_update['source'] = !empty($this->input->post('source'))?$this->input->post('source'):'NULL';
        $UserDetails_update['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
        $UserDetails_update['dob'] = !empty($this->input->post('dob'))?$this->input->post('dob'):'NULL';
        $UserDetails_update['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';
        $UserDetails_update['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';
        $UserDetails_update['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';
        $UserDetails_update['marital_status'] = $this->input->post('marital_status');
        $UserDetails_update['no_of_children'] = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'NULL';
        $UserDetails_update['physical_status'] = $this->input->post('physically_challenged');
        $UserDetails_update['registration_phychallenge'] =$this->input->post('disability');
        $UserDetails_update['disability'] =$this->input->post('physical_status');
        $UserDetails_update['mother_tongue'] =!empty($this->input->post('mothertongue'))?$this->input->post('mothertongue'):'NULL';
        $UserDetails_update['nationality'] =$this->input->post('nationality');
        $UserDetails_update['religion'] = 2;
        $UserDetails_update['caste'] = $this->input->post('belief');
        $UserDetails_update['highest_education'] = $this->input->post('highest_education');
        $UserDetails_update['education'] = $this->input->post('education');
        $UserDetails_update['blood_group'] =$this->input->post('bloodgroup');
        $UserDetails_update['madrassa_education'] = !empty($this->input->post('madrassa_education'))?$this->input->post('madrassa_education'):'NULL';
        $UserDetails_update['code'] =$this->input->post('code');
        $UserDetails_update['financialstatus'] =$this->input->post('financialstatus');
        $UserDetails_update['job_category'] = $this->input->post('profession_type');
        $UserDetails_update['occupation'] = $this->input->post('profession');
        $UserDetails_update['present_country'] = $this->input->post('present_country');
        $UserDetails_update['home_state'] = $this->input->post('present_states');
        $UserDetails_update['home_district'] =$this->input->post('present_district');
        $UserDetails_update['home_city'] = $this->input->post('present_city');
        $UserDetails_update['country'] = $this->input->post('country');
        $UserDetails_update['home_country'] = $this->input->post('country');
        $UserDetails_update['photopassword'] = $this->input->post('photopassword');
        $UserDetails_update['photo_visibility'] = !empty($this->input->post('photo_visibility'))?$this->input->post('photo_visibility'):'0';
        $UserDetails_update['annual_income'] = $this->input->post('annual_income');  
        $UserDetails_update['state'] = $this->input->post('states');
        $UserDetails_update['native_district'] = $this->input->post('districts');
        $UserDetails_update['native_place'] = $this->input->post('native_place');
        $UserDetails_update['bodytype'] =$this->input->post('bodytype');
        $UserDetails_update['appearance'] = $this->input->post('appearance');
        $UserDetails_update['mail'] = $this->input->post('email');
        $UserDetails_update['address'] = $this->input->post('address');
        $UserDetails_update['secondary_code'] = !empty($this->input->post('secondary_code'))?$this->input->post('secondary_code'):'NULL';
        $UserDetails_update['other_contact_number'] = $this->input->post('secondary_number');
        $UserDetails_update['job_details'] = $this->input->post('job_details');
        $UserDetails_update['edit_admin_date'] = date('Y-m-d H:i:s');
        $UserDetails_update['emp_id'] = $this->session->userdata('user_id_admin');
        $UserDetails_update['about'] = "I'm ".$UserDetails['name'].". I'm ".$UserDetails['age']." Years old";
        $UserDetails_update['update_data'] = "2";	
        
        
        $PartnerDetails['partner_country'] = !empty($this->input->post('partner_country'))?$this->input->post('partner_country'):'NULL';
        $PartnerDetails['partner_state'] = !empty($this->input->post('partner_state'))?$this->input->post('partner_state'):'NULL';
        
        $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$UserDetails_update);
        
        $this->General_Model->UpdateData($table = 'tbl_otherdetails',$column_name = 'user_id',$UserID,$ProfileDetails);
        
        $this->General_Model->UpdateData($table = 'tbl_familyprofile',$column_name = 'user_id',$UserID,$FamilyDetails);
        
        $checkexistfam = $this->db->select('*')->from('tbl_familyprofile')->where('user_id',
        $UserID)->get()->num_rows();
        
        if($checkexistfam == 0)
        {
        
        $FamilyDetails['user_id'] = $UserID;
        $this->General_Model->AddRecord('tbl_familyprofile', $FamilyDetails);
        }
        else
        {
        
        $this->General_Model->UpdateData($table = 'tbl_familyprofile',$column_name = 'user_id',
        $UserID,$FamilyDetails);
        }
        
        }
        
        if($UserID != "") 
        {
        $this->session->set_flashdata('added','Data!');
        redirect('admin/register');
        }
        else
        {
        $this->session->set_flashdata('error','Data!');
        redirect('admin/register');
        }
        
        }   
        else
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
        $data['states'] = $this->General_Model->GetFullData($table = "tbl_states");
        $data['madrassa_education'] = $this->General_Model->GetFullData($table = "tbl_madrassa_education");
        $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");
        $data['professiontype'] = $this->General_Model->GetFullData($table = "tbl_professiontype");
        $data['profession'] = $this->General_Model->GetFullData($table = "tbl_profession");
        $data['income'] = $this->General_Model->GetFullData($table = "tbl_professional_income");
        // 		$data['job'] = $this->General_Model->GetFullData($table = "tbl_jobs");
        $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");
        $data['contacttype'] = $this->General_Model->GetFullData($table = "tbl_contacttype");
        $data['familytype'] = $this->General_Model->GetFullData($table = "tbl_familytype");
        $data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus");
        $data['hometype'] = $this->General_Model->GetFullData($table = "tbl_hometype");
        $data['maritalstatus'] = $this->General_Model->GetFullData($table = "tbl_maritalstatus");
        $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");
        $data['secondary_code'] = $this->General_Model->GetFullData($table = "tbl_countrycode");
        $data['countryCode'] = $this->General_Model->GetFullData($table = "tbl_countrycode");
        
        $this->load->view('register',$data);  
        }
        }
    
       
  
        // public function uploadphoto()
        // {
        // $imagevalue = $this->input->post('imagevalue');
        // $userid = $this->input->post('userid');
        // $picnum = $this->input->post('picnum');
        
        // if($picnum >= 3) 
        // {
        // echo 0;
        // }
        // else 
        // {
        // $imagenewname = $userid . mt_rand(1111, 9999) . date('Y-m-d') . '.jpg';
        // $base64img = str_replace('data:image/jpeg;base64,', '', $imagevalue);
        // $base64img = str_replace(' ', '+', $base64img);
        // $data = base64_decode($base64img);
        
        // $tempFilePath = '../assets/photo_storage/' . $imagenewname;
        // file_put_contents($tempFilePath, $data);
        
        
        // $watermarkImagePath = '../assets/images/hn_wtrmark.png';
        // $watermarkImg = imagecreatefrompng($watermarkImagePath);
        // $im = imagecreatefromjpeg($tempFilePath);
        
        // $marge_right = 10;
        // $marge_bottom = 280;
        
        // $sx = imagesx($watermarkImg);
        // $sy = imagesy($watermarkImg);
        
        // imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));
        
        // imagejpeg($im, $tempFilePath);
        // imagedestroy($im);
        

        // $uploadResponse = $this->uploadtophotostorage($tempFilePath);
        // $this->uploadtocrop($tempFilePath);
        
        
        // if($uploadResponse['success'] === true) 
        // {
        // $uploaddata = array(
        // 'user_id' => $userid,
        // 'user_image' => $imagenewname,
        // 'status' => '2',
        // 'datetime' => date('Y-m-d H:i:s'),
        // );
        
        // $this->General_Model->AddRecord('tbl_userimages', $uploaddata);
        
        // if($picnum == 0) 
        // {
        // $data = array('photo' => $imagenewname);
        
        // $this->General_Model->UpdateData('tbl_registration', 'id', $userid, $data);
        // }
        
        // echo 1; 
        // } 
        // else 
        // {
        // echo 0;
        // }
        // }
        // }

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

        public function blur_images($imagenewname,$imagevalue)
        {
        $base64img = str_replace('data:image/jpeg;base64,', '', $imagevalue);
        $base64img = str_replace(' ', '+', $base64img);
        $data = base64_decode($base64img);
        $newfilename = '../assets/photo_storage_blur/'.$imagenewname;
        file_put_contents($newfilename, $data);
        $watermarkImagePath = 'mask.png';
        $watermarkImg = imagecreatefrompng('../assets/images/'.$watermarkImagePath); 
        $im = imagecreatefromjpeg('../assets/photo_storage_blur/'.$imagenewname);
        
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
        
        public function users($status = '')
        {
        
        if($status == '0')
        {
        $data['page'] = "Total Pending Calls";
        $data['users'] = $this->General_Model->GetFullData('tbl_registration','status','0');
        }
        
        if($status == '1')
        {
        $data['page'] = "Approved Profiles";
        }
        
        if($status == '2')
        {
        $data['page'] = "Rejected Calls";
        }
        
        if($status == '3')
        {
        $data['page'] = "Deleted Calls";
        $data['users'] = $this->General_Model->GetFullData('tbl_registration','status','3');
        }
        
        if($status == 'profile_approval')
        {
        $data['page'] = "Profile Approvals";
        $data['users'] = $this->General_Model->GetPendingcalls();
        }
        
        if($status == 'quick_calls'){
        $data['page'] = "Quick Calls";
        $data['users'] = $this->General_Model->GetQuickcalls();
        }
        
        $data['status'] = $status;
        $this->load->view('users',$data);  
        }
	
        public function quickcontact()
        {
        $data['page'] = "Quick Profiles";
        $data['register'] = $this->General_Model->GetQuickcalls();
        $this->load->view('quick_contact',$data);
        }
        
        public function quickregister()
        {
        $data['page'] = "Quick Register";
        $data['register'] = $this->General_Model->GetQuickregister();
        $this->load->view('quick_register',$data);
        }
        
        public function otherstate()
        {
        $data['page'] = "Other State";
        $data['register'] = $this->General_Model->Getotherstate();
        $this->load->view('other_state',$data);
        }
        
        public function stage_three()
        {
        $data['page'] = "Stage Three";
        $data['register'] = $this->General_Model->Getstage3();
        $this->load->view('stage_three',$data);
        }
        
        public function approvels()
        {
        $data['page'] = "Approvels";
        $data['register'] = $this->General_Model->Getapproveldata();
        $this->load->view('approvels',$data);
        }
        
        public function smsotp($msg,$mobilenumber,$name)
        {
        
        $url = 'https://2factor.in/API/R1/?module=TRANS_SMS&apikey=7a8571c8-ed69-11ec-9c12-0200cd936042&to=' . $mobilenumber . '&from=SYSOLS&templatename=OTP+Template&var1=' . $msg . '&var2=' . $name . '&var3=happynikah.com';
        
        file_get_contents($url); 
        return 1;
        }
    
        public function uploadDoc()
        {
        $uploadPath = 'assets/upload/imports/';
        if(!is_dir($uploadPath))
        {
        mkdir($uploadPath,0777,TRUE);
        }
        
        $config['upload_path']=$uploadPath;
        $config['allowed_types'] = 'csv|xlsx|xls';
        $config['max_size'] = 1000000;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('upload_excel'))
        {
        $fileData = $this->upload->data();
        return $fileData['file_name'];
        }
        else
        {
        return false;
        }
        }
        
        public function photoapprove()
        {
        
        $data['photo'] = $this->General_Model->unapprovephoto();
        $this->load->view('photoapprove',$data);
        }
        
        public function photoapprove_2()
        {
        $data['photo'] = $this->General_Model->unapprovephoto_2();
        $this->load->view('photoapprove_2',$data);
        }
        
        public function photoapprove_3()
        {
        $data['photo'] = $this->General_Model->unapprovephoto_3();
        $this->load->view('photoapprove_3',$data);
        }
        
        public function photoapprove_4()
        {
        $data['photo'] = $this->General_Model->unapprovephoto_4();
        $this->load->view('photoapprove_4',$data);
        }
        
        public function delete_photo()
        {
        $data['comment'] = $this->input->post('delete_comment');
        $data['status'] = '1';
        $user_image_id = $this->input->post('user_image_id');
        $data['delete_datetime'] = date('Y-m-d H:i:s');
        $data['staff_id'] = $this->session->userdata('user_id_admin');
        $goto= $this->input->post('goto');
        
        $user_id = $this->input->post('user_id');
        $photodelete=$this->db->select('*')->from('tbl_userimages')->where('user_id',$user_id)->where('status','0')->get()->num_rows();
        
        if($photodelete=='1')
        {
        
        $this->General_Model->UpdateData($table = 'tbl_userimages',$column_name = 'user_image_id',$user_image_id,$data);
        
        $log_photo_delete = array('photo'=>'',);
        $this->db->where('id', $user_id);
        $this->db->update('tbl_registration',$log_photo_delete);
        }
        
        $multideletephoto =  $this->db->select('*')->from('tbl_userimages')->where('user_id',$user_id)
        ->where('status','0')->get()->result_array();
        
        if($photodelete >'1')
        {
        
        $this->General_Model->UpdateData($table = 'tbl_userimages',$column_name = 'user_image_id',$user_image_id,$data);
        $log_photo_delete = array();
        
        foreach($multideletephoto as $val)
        {
        
        $user_image=$val['user_image'];
        $log_photo_delete[] = $user_image;
        }
        
        $this->db->select('user_image')->from('tbl_userimages')->where('user_id',$user_id)
        ->where('status', '0')->where('user_image_id !=', $user_image_id);
        
        $otherPhotosQuery = $this->db->get();
        $otherPhotos = $otherPhotosQuery->result_array();
        
        $otherPhotoList = implode(',',array_column($otherPhotos, 'user_image'));
        
        $this->db->where('id',$user_id);
        $this->db->set('photo',$otherPhotoList);
        $this->db->update('tbl_registration');
        $this->db->trans_commit();
        
        }
        
        if($goto==0)
        {
        redirect('admin/photoapprove',$data);
        }
        
        if($goto==1)
        {
        redirect('admin/photoapprove_gotonikah',$data);
        }
        
        if($goto==2)
        {
        redirect('admin/photoapprove_mangalyam',$data);
        }
        
        }
	
        public function approve_photo()
        {
        $data['status'] = '2';
        $user_image_id = $this->input->post('user_image_id');
        $data['approve_datetime'] = date('Y-m-d H:i:s');
        
        $data['staff_id'] = $this->session->userdata('user_id_admin');
        $this->General_Model->UpdateData($table = 'tbl_userimages',$column_name = 'user_image_id',$user_image_id,$data);
        
        echo 1;
        }
        
        public function watermark_image()
        { 	
        $photo = $this->input->post('photo');
        $user_image_id=$this->input->post('user_image_id');	
        
        $base64img = str_replace('data:image/jpeg;base64,', '', $photo);
        $base64img = str_replace(' ', '+', $base64img);
        $data = base64_decode($base64img);
        $newfilename = '../../HappyNikah/assets/images/croppedimage/'.$user_image_id.'.jpg';
        file_put_contents($newfilename, $data);
        
        //watermarking images
        $watermarkImagePath = 'hn_wtrmark.png';
        $watermarkImg = imagecreatefrompng('../../HappyNikah/assets/images/'.$watermarkImagePath);
        $watermarkImg1= '../../HappyNikah/assets/images/hn_wtrmark.png';
        $im = imagecreatefromjpeg($newfilename); 
        $imgs= '../../HappyNikah/assets/photo_storage/'.$user_image_id.'.jpg';
        
        $water_info = getimagesize($watermarkImg1);        
        $image_info = getimagesize($newfilename);
        $fileName = $user_image_id. mt_rand(1111, 9999) . date('Y-m-d') . '.jpg';
        
        $flag = false;
        if ($image_info[0] < $water_info[0]) 
        {
        $flag = true;
        //Resize Image code
        $imgConfigwatermark = array();
        $imgConfigwatermark['image_library'] = 'gd2';
        $imgConfigwatermark['source_image'] = $watermarkImg1;
        $imgConfigwatermark['create_thumb'] = FALSE;
        $imgConfigwatermark['maintain_ratio'] = TRUE;
        $imgConfigwatermark['new_image'] = '../../HappyNikah/assets/images/res_hnwtrmark.png';
        $imgConfigwatermark['width'] = round($image_info[0] / 2)+50;
        $imgConfigwatermark['height'] = round($water_info[1]);
        $this->load->library('image_lib', $imgConfigwatermark);           
        
        if(!$this->image_lib->resize()) 
        {
        echo $this->image_lib->display_errors();
        }
        
        $watermarkname = ($flag) ? "res_hnwtrmark.png" : "hn_wtrmark.png";
        $imgConfig = array();
        $imgConfig['image_library'] = 'GD2';
        $imgConfig['source_image'] =$newfilename;
        $imgConfig['new_image'] =  '../../HappyNikah/assets/photo_storage/'.$fileName;
        $imgConfig['wm_overlay_path'] = '../../HappyNikah/assets/images/'.$watermarkname;
        $imgConfig['wm_type'] = 'overlay';
        $imgConfig['wm_vrt_alignment'] = 'middle';
        $imgConfig['wm_hor_alignment'] = 'right';
        $imgConfig['wm_hor_offset'] = -4;
        $imgConfig['wm_vrt_offset'] = 100;
        $this->load->library('image_lib', $imgConfig);
        $this->image_lib->initialize($imgConfig);
        $tmppath = '../../assets/photo_storage/'.$fileName;
        $watermarkImg1=$this->image_lib->watermark();
        
        echo $tmppath;
        return $tmppath;  
        
        }
        }
        
        public function paymentsetting()
        {
        $this->load->view('paymentsetting');
        }
        
        public function GetHeight()
        {
        
        $HeightFrom = $this->input->post('partner_height');
        $result = $this->General_Model->GetFullData('tbl_height','',$HeightFrom);
        
        if($result != "") 
        {
        $data1 = '<option value="" selected disabled>--Select--</option>';
        for($i = 0; $i < count($result); $i++) 
        {
        $data = '<option value = "' . $result[$i]->height_id . '" textvalue="' . $result[$i]->height . '">' . $result[$i]->height . '</option>';
        if(empty($i))
        {
        print_r($data1);
        }
        print_r($data);
        }
        
        }
        }
   
        public function GetEducation()
        {
        $high_education = $this->input->post('high_education');
        $result = $this->General_Model->GetFullData('tbl_education','high_edu_id',$high_education);
        
        if($result != "") 
        {
        $data1 = '<option value="" selected disabled>--Select--</option>';
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
        
        public function GetCast()
        {
        $religion = $this->input->post('religion');
        $result = $this->General_Model->GetFullData('tbl_caste','rel_id',$religion);
        if($result != "") 
        {
        $data1 = '<option value="">--Select--</option>';
        for ($i = 0; $i < count($result); $i++) 
        {
        $data = '<option value = "' . $result[$i]->cid . '" textvalue="' . $result[$i]->caste . '">' . $result[$i]->caste . '</option>';
        if (empty($i)) 
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
        $present_states = $this->input->post('states');
        $result = $this->General_Model->GetFullData('tbl_states','country_id',$country);
        
        if($present_states !="")
        {
        if($result != "") 
        {
        $res=$this->db->select('id,name')->from('tbl_states')->where('id',$present_states)->get()->row_array();	 	  
        $data2 = '<option value="'.$present_states.'" textvalue="' .$res['name']. '">'.$res['name'].'</option>';
        
        print_r($data2);
        }
        }
        else
        {
        
        if($result != "") 
        {
        $data1 = '<option textvalue="" selected disabled>--Select--</option>';
        
        for ($i = 0; $i < count($result); $i++) 
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
        }
        
        public function GetStates2()
        {
        $country = $this->input->post('partner_country');
        $present_states = $this->input->post('partner_state');
        $result = $this->General_Model->GetFullData('tbl_states','country_id',$country);
        
        if($present_states !="") 
        {
        if ($result != "") 
        {
        $res=$this->db->select('id,name')->from('tbl_states')->where('id',$present_states)->get()->row_array();	 	  
        $data2 = '<option value="'.$present_states.'" textvalue="' .$res['name']. '">'.$res['name'].'</option>';
        
        print_r($data2);
        }
        }
        else
        {	 
        if($result != "") 
        {
        $data1 = '<option textvalue="" selected disabled>--Select--</option>';
        for ($i = 0; $i < count($result); $i++)
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
        }
   
        public function GetDistrict()
        {
        $states = $this->input->post('states');
        $present_district=$this->input->post('districts');
        $result = $this->General_Model->GetFullData('tbl_district','state_id',$states);
        
        if($present_district !="")
        {
        if ($result != "") 
        {
        $res=$this->db->select('district_id,district')->from('tbl_district')->where('district_id',$present_district)->get()->row_array();
        print_r($res);	 	  
        $data2 = '<option value="'.$present_district.'" textvalue="' .$res['district']. '">'.$res['district'].'</option>';
        
        print_r($data2);
        }
        }
        
        else
        {
        
        if ($result != "") 
        {
        $data1 = '<option value="" selected disabled>--Select--</option>';
        
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
        } 
        
       public function GetDistrict2()
       {
        $states = $this->input->post('partner_state');
        $present_district=$this->input->post('partner_district');
        $result = $this->General_Model->GetFullData('tbl_district','state_id',$states);
        
        if($present_district !="")
        {
        if ($result != "") 
        {
           $res=$this->db->select('district_id,district')->from('tbl_district')->where('district_id',$present_district)->get()->row_array();
           print_r($res);	 	  
           $data2 = '<option value="'.$present_district.'" textvalue="' .$res['district']. '">'.$res['district'].'</option>';
        
        print_r($data2);
        }
        }
        
        else
        {
        
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
        } 
        
        public function GetDistrict_checkvalues()
        {
        $states = $this->input->post('states');
        $result = $this->General_Model->GetFullData('tbl_district','state_id',$states);
        $data="    <input type='checkbox' value='' name='partner_district[]'> select district  ";
        
        if ($result != "") 
        {
        for ($i = 0; $i < count($result); $i++) 
        {
        $data2 = $data2.'<div class="form-check mb-3"><input type="checkbox" class="form-check-input" name="partner_district[]" value = "' . $result[$i]->district_id . '" ><label class="form-check-label">' . $result[$i]->district . '</label></div>';
        if(empty($i)) 
        {
        print_r($data1);
        }
        
        }
        print_r($data.$data2);
        }
        }
        
        public function GetCity()
        {
            
        $distrct = $this->input->post('districts');
        $present_city =$this->input->post('city');
        $result = $this->General_Model->GetFullData('tbl_city','district_id',$distrct);
        
        if($present_city!="")
        {
        if($result != "") 
        {
        $res=$this->db->select('id,name')->from('tbl_city')->where('id',$present_city)->get()->row_array();
        print_r($res);	 	  
        $data2 = '<option value="'.$present_city.'" textvalue="' .$res['name']. '">'.$res['name'].'</option>';
        print_r($data2);
        }
        }
        
        else
        {
        if($result != "") 
        {
        $data1 = '<option value="">--Select--</option>';
        for ($i = 0; $i < count($result); $i++) 
        {
        $data = '<option value = "' . $result[$i]->name . '" textvalue="' . $result[$i]->name . '">' . $result[$i]->name . '</option>';
        if(empty($i))
        {
        print_r($data1);
        }
        print_r($data);
        }
        }
        }
        } 
        
        public function GetPartnerStates()
        {
        $country = $this->input->post('partner_country');
        
        $result = $this->General_Model->GetFullData('tbl_states','country_id',$country);
        
        if($result != "")
        {
        $data1 = '<option value="">--Select--</option>';
        
        for ($i = 0; $i < count($result); $i++) 
        {
        $data = '<option value = "' . $result[$i]->id . '" textvalue="' . $result[$i]->name . '">' . $result[$i]->name . '</option>';
        if (empty($i)) 
        {
        print_r($data1);
        }
        print_r($data);
        }
        }	
        }
        
        public function GetPartnerDistrict()
        {
        $states = $this->input->post('partner_state');
        
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
        
        public function GetPartnerCity()
        {
        $distrct = $this->input->post('districts');
        $result = $this->General_Model->GetFullData('tbl_city','district_id',$distrct);
        
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

        public function search_profiles()
        {
        $search_profile = $this->input->post('search_profile');
        $UserID3 = $this->session->userdata('user_id');
        $data['user_id']=$UserID3;
        $data['payment_done'] = $this->General_Model->payment_done($UserID3);
        
        if($search_profile != "")
        {
            
        $data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
        $data['get_search']=$this->General_Model->search_prof($search_profile);
        $data['get_search_phone']=$this->General_Model->search_profphone($search_profile);
        $data['get_search_phoneno']=$this->General_Model->search_profphoneno($search_profile);
        
        }
        
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");
        $this->load->view('search_profiles',$data);
        
        }

        public function getplan()
        { 
        
        $postData = $this->input->post();
        
        $data = $this->General_Model->getplandata($postData);
        echo json_encode($data); 
        }
        
        public function getplanactiveoffer()
        { 
        $postData = $this->input->post();
        
        $data = $this->General_Model->getplandata_active($postData);
        echo json_encode($data); 
        }
        
        public function approve_pay()
        {
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");
        $this->load->view('search_profiles',$data);
        }
        
        public function addcontacts()
        {
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");
        $this->load->view('search_profiles',$data);
        }
        
        public function leftcontacts()
        {
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");
        $this->load->view('search_profiles',$data);
        }

        public function profile($type = '',$user_id = '')
        {
        $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($user_id);
        $data['FamilyDetails'] = $this->General_Model->GetFamilyDetails($user_id);
        $data['OtherDetails'] = $this->General_Model->GetOtherDetails($user_id);
        $data['ProfileDeta'] = $this->General_Model->GetProfileDeta($user_id);
        $data['user_id'] = $user_id;
        $data['userimages']  = $this->General_Model->GetFullData('tbl_userimages','user_id',$user_id);
        $data['profilepic']  = $this->General_Model->GetFullData('tbl_registration','id',$user_id);
        
        if($type == 'view')
        {
        // $this->load->view('profile',$data);
        $high_education=$ProfileDetails->highest_education;
        $home_country=$ProfileDetails->home_country;
        $country=$ProfileDetails->country;
        $state=$ProfileDetails->state;
        $home_state=$ProfileDetails->home_state;
        $partner_country=$OtherDetails['partner_country'];
        $partner_state=$OtherDetails['partner_state'];
        $code=$OtherDetails['code'];
        
        $data['user_id'] = $user_id;
        $data['userimages']  = $this->General_Model->GetFullData('tbl_userimages','user_id',$user_id);
        $data['profilepic']  = $this->General_Model->GetFullData('tbl_registration','id',$user_id);
        $data['homestates']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$home_country);
        $data['homedistricts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$home_state);
        $data['homecity']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$home_state);
        $data['country']=$this->General_Model->GetFullData($table = "tbl_country");
        $data['states']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$country);
        $data['districts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state);
        $data['partner_states']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$partner_country);
        $data['partner_district']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$partner_state);
        $data['education'] = $this->General_Model->GetFullData($table = "tbl_education");
        $data['city']=$this->General_Model->GetFullData($table = "tbl_city",$column="state_id",$column_value=$state);
        $data['edu_data']=$this->General_Model->GetFullData($table = "tbl_education",$column="high_edu_id",$column_value=$high_education);
        $data['maritalstatus'] = $this->General_Model->GetFullData($table = "tbl_maritalstatus");
        $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");
        $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 
        $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");
        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");
        $data['district'] = $this->General_Model->GetFullData($table = "tbl_district");
        $data['qualification'] = $this->General_Model->GetFullData($table = "tbl_qualification");
        $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");
        $data['job'] = $this->General_Model->GetFullData($table = "tbl_jobs");
        $data['religion'] = $this->General_Model->GetFullData($table = "tbl_religion");
        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");
        $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");
        $data['professiontype'] = $this->General_Model->GetFullData($table = " tbl_professiontype");
        $data['profession'] = $this->General_Model->GetFullData($table = " tbl_profession");
        $data['income'] = $this->General_Model->GetFullData($table = " tbl_professional_income");
        $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 
        $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 
        $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 
        $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 
        $data['familytype'] = $this->General_Model->GetFullData($table = "tbl_familytype"); 
        $data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus"); 
        $data['hometype'] = $this->General_Model->GetFullData($table = "tbl_hometype"); 
        $data['countryCode'] = $this->General_Model->GetFullData($table = "tbl_countrycode");
        $data['madrassa_education'] = $this->General_Model->GetFullData($table = "tbl_madrassa_education");
        
        $this->load->view('profile_edit',$data);
        
        }
        
        elseif ($type == 'edit') 
        {
        $data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");
        $data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 
        $data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");
        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");
        $data['district'] = $this->General_Model->GetFullData($table = "tbl_district");
        $data['qualification'] = $this->General_Model->GetFullData($table = "tbl_qualification");
        $data['job'] = $this->General_Model->GetFullData($table = "tbl_jobs");
        $data['countryCode'] = $this->General_Model->GetFullData($table = "tbl_countrycode");
        $data['maritalstatus'] = $this->General_Model->GetFullData($table = "tbl_maritalstatus");
        $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");
        $data['religion'] = $this->General_Model->GetFullData($table = "tbl_religion");
        $data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");
        $data['states'] = $this->General_Model->GetFullData($table = "tbl_states");
        $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");
        $data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 
        $data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 
        $data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 
        $data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 
        $data['professiontype'] = $this->General_Model->GetFullData($table = "tbl_professiontype");
        $data['profession'] = $this->General_Model->GetFullData($table = "tbl_profession");
        $data['income'] = $this->General_Model->GetFullData($table = "tbl_professional_income");
        $data['job'] = $this->General_Model->GetFullData($table = "tbl_jobs");
        $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");
        $data['contacttype'] = $this->General_Model->GetFullData($table = "tbl_contacttype");
        $data['familytype'] = $this->General_Model->GetFullData($table = "tbl_familytype");
        $data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus");
        $data['hometype'] = $this->General_Model->GetFullData($table = "tbl_hometype");
        $data['fatherdetails'] = $this->General_Model->GetFullData($table = "tbl_fatherdetails");
        $data['motherdetails'] = $this->General_Model->GetFullData($table = "tbl_motherdetails");
        $data['maritalstatus'] = $this->General_Model->GetFullData($table = "tbl_maritalstatus");
        $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");
        $data['secondary_code'] = $this->General_Model->GetFullData($table = "tbl_countrycode");
        $data['madrassa_education'] = $this->General_Model->GetFullData($table = "tbl_madrassa_education");
        $data['education'] = $this->General_Model->GetFullData($table = "tbl_education");
        $this->load->view('register',$data);
        }
        
        }
        
        public function deletepic()
        {
        $image = $this->input->post('image');
        $userid = $this->input->post('user_image_id');
        $user_image_photo = $this->input->post('user_image_photo');
        $data = array('photo' => NULL);
        $this->General_Model->UpdateData('tbl_registration','id',$userid,$data);
        $data2 = array('status'=>'1');
        $this->General_Model->UpdateData('tbl_userimages','user_image',$user_image_photo,$data2);
        }
        
        public function deleteprofilepic()
        {
        $image_id = $this->input->post('image_id');
        $data2 = array('status'=>'1');
        
        $this->General_Model->UpdateData('tbl_userimages','user_image_id',$image_id,$data2);
        $data = array('photo' => NULL);
        $this->General_Model->UpdateData('tbl_registration','photo',$image_id,$data);
        
        echo 1;
        }
        
        public function setprofilepic()
        {
        $image = $this->input->post('image');
        $userid = $this->input->post('userid');
        $data = array('photo' => $image);
        $this->General_Model->UpdateData('tbl_registration','id',$userid,$data);
        echo 1;
        }
        
        public function uploadphoto()
        {
        $imagevalue = $this->input->post('imagevalue');
        $userid = $this->input->post('userid');
        $picnum = $this->input->post('picnum');
        
        if($picnum >= 3)
        {
        echo 0;
        }
        else
        {
        
        $imagenewname = $userid.mt_rand(1111,9999).date('Y-m-d').'.jpg';
        $base64img = str_replace('data:image/jpeg;base64,', '', $_POST['imagevalue']);
        $base64img = str_replace(' ', '+', $base64img);
        $data = base64_decode($base64img);
        //   $newfilename = '/home2/happynikah/assets/photo_storage/'.$imagenewname;
        $newfilename = '../assets/photo_storage/'.$imagenewname;
        file_put_contents($newfilename, $data);
        
        //watermarking images
        $watermarkImagePath = 'hn_wtrmark.png';
        $watermarkImg = imagecreatefrompng('../assets/images/'.$watermarkImagePath); 
        $im = imagecreatefromjpeg('../assets/photo_storage/'.$imagenewname);
        
        //blurring image
        $this->blur_images($imagenewname,$imagevalue);
        
        // Set the margins for the watermark 
        $marge_right = 10; 
        $marge_bottom = 280; 
        
        // Get the height/width of the watermark image 
        $sx = imagesx($watermarkImg); 
        $sy = imagesy($watermarkImg); 
        // Copy the watermark image onto our photo using the margin offsets and  
        // the photo width to calculate the positioning of the watermark. 
        
        imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));
        
        // Save image and free memory 
        imagepng($im, $newfilename); 
        imagedestroy($im);
        
        $uploaddata = array(
        'user_id' => $userid,
        'user_image' => $imagenewname,
        'status'=>'2',
        'datetime'=>date('Y-m-d H:i:s'),
        );
        $this->General_Model->AddRecord('tbl_userimages',$uploaddata);
        
        if($picnum == 0)
        {
        $data = array('photo' => $imagenewname);
        
        $this->General_Model->UpdateData('tbl_registration','id',$userid,$data);
        }
        echo 1;
        }     
        }
   
 	  public function viewUserprofiles($type = '',$user_id = '')
	  {
		$ProfileDetails = $this->General_Model->GetProfileDetails($user_id);
		$data['ProfileDetails']=$ProfileDetails;
		$data['FamilyDetails']=$this->General_Model->GetFamilyDetails($user_id);
		$OtherDetails=$this->General_Model->GetOtherDetails($user_id);
		$data['OtherDetails']=$OtherDetails;
		$data['user_id'] = $user_id;
		
		if($type == 'view')
		{
		    
        $pmstatus=$OtherDetails['partner_maritalstatus'];
        $phstatus=$OtherDetails['partner_physicalstatus'];
        $pmothertoungue=$OtherDetails['mother_tongue'];
        $pappearance=$OtherDetails['partner_appearance'];
        $pskincolor=$OtherDetails['partner_skincolor'];
        $planguage=$OtherDetails['partner_languagespoken'];
        $poccupation=$OtherDetails['partner_occupation'];
        $pedu=$OtherDetails['partner_education'];
				
		$mstatus_data=$this->General_Model->GetFullData($table = "tbl_maritalstatus",$column="id",$value=$pmstatus,$valtype="arrayvals");
		$phstatus_data=$this->General_Model->GetFullData($table = "tbl_physicalstatus",$column="id",$value=$phstatus,$valtype="arrayvals");
		$mothertongue_data=$this->General_Model->GetFullData($table = "tbl_mothertongue",$column="mothertongue_id",$value=$pmothertoungue,$valtype="arrayvals");
		$appearance_data=$this->General_Model->GetFullData($table = "tbl_appearance",$column="id",$value=$pmothertoungue,$valtype="arrayvals");
		$skincolor_data=$this->General_Model->GetFullData($table = "tbl_skincolor",$column="id",$value=$pskincolor,$valtype="arrayvals");
		$language_data=$this->General_Model->GetFullData($table = "tbl_mothertongue",$column="mothertongue_id",$value=$planguage,$valtype="arrayvals");
		$education_data=$this->General_Model->GetFullData($table = "tbl_highest_education",$column="id",$value=$pedu,$valtype="arrayvals");
		$occupation_data=$this->General_Model->GetFullData($table = "tbl_profession",$column="profession_id",$value=$poccupation,$valtype="arrayvals");
			
			
		$values="";
		
			foreach($mstatus_data as $vals)
			{
			 $values=$vals->maritalstatus.",".$values;
			}
			$data['partner_mstatus']= $values;
			$values="";
			
			foreach($phstatus_data as $vals)
			{
			 $values=$vals->physicalstatus.",".$values;
			}
			
			$data['partner_phstatus']= $values;
			
			$values="";
			
			foreach($education_data as $vals)
			{
			 $values=$vals->high_education.",".$values;
			}
			
			$data['partner_education']= $values;
			
			$values="";
			
			foreach($occupation_data as $vals)
			{
			 $values=$vals->profession_name.",".$values;
			}
			
			$data['partner_occupation']= $values;
			
			$values="";
			
			
			foreach($mothertongue_data as $vals)
			{
			 $values=$vals->mothertongue.",".$values;
			}
			
			$data['partner_mothertongue']= $values;

			$values="";
			
			foreach($appearance_data as $vals)
			{
			 $values=$vals->appearance.",".$values;
			}
			
			$data['partner_appearance']= $values;
			$values="";
			
			foreach($skincolor_data as $vals)
			{
			 $values=$vals->skincolor.",".$values;
			}
			
			$data['partner_skincolor']= $values;
			$values="";
			
			foreach($language_data as $vals)
			{
			 $values=$vals->mothertongue.",".$values;
			}
			
			$data['partner_language']= $values;
			$this->load->view('profile',$data);
		}
		
		elseif ($type == 'edit') 
		{
			$high_education=$ProfileDetails->highest_education;
			$home_country=$ProfileDetails->home_country;
			$country=$ProfileDetails->country;
			$state=$ProfileDetails->state;
			$home_state=$ProfileDetails->home_state;
			$partner_country=$OtherDetails['partner_country'];
			$partner_state=$OtherDetails['partner_state'];
			$data['homestates']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$home_country);
			$data['homedistricts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$home_state);
			$data['homecity']=$this->General_Model->GetFullData($table = "tbl_city",$column="district_id",$column_value=$home_state);
			$data['country']=$this->General_Model->GetFullData($table = "tbl_country");
			$data['states']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$country);
			$data['districts']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$state);
			$data['partner_states']=$this->General_Model->GetFullData($table = "tbl_states",$column="country_id",$column_value=$partner_country);
			$data['partner_district']=$this->General_Model->GetFullData($table = "tbl_district",$column="state_id",$column_value=$partner_state);
			$data['city']=$this->General_Model->GetFullData($table = "tbl_city",$column="state_id",$column_value=$state);
			$data['edu_data']=$this->General_Model->GetFullData($table = "tbl_education",$column="high_edu_id",$column_value=$high_education);
			$data['maritalstatus'] = $this->General_Model->GetFullData($table = "tbl_maritalstatus");
			$data['Height'] = $this->General_Model->GetFullData($table = "tbl_height");
			$data['weight'] = $this->General_Model->GetFullData($table = "tbl_weight"); 
			$data['mothertongue'] = $this->General_Model->GetFullData($table = "tbl_mothertongue");
			$data['belief'] = $this->General_Model->GetFullData($table = "tbl_subcaste");
			$data['district'] = $this->General_Model->GetFullData($table = "tbl_district");
			$data['qualification'] = $this->General_Model->GetFullData($table = "tbl_qualification");
			$data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");
			$data['job'] = $this->General_Model->GetFullData($table = "tbl_jobs");
			$data['country'] = $this->General_Model->GetFullData($table = "tbl_country");
			$data['religion'] = $this->General_Model->GetFullData($table = "tbl_religion");
			$data['belief'] = $this->General_Model->GetFullData($table = "tbl_caste");
			$data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");
			$data['professiontype'] = $this->General_Model->GetFullData($table = " tbl_professiontype");
			$data['profession'] = $this->General_Model->GetFullData($table = " tbl_profession");
			$data['income'] = $this->General_Model->GetFullData($table = " tbl_professional_income");
			$data['skin_color'] = $this->General_Model->GetFullData($table = "tbl_skincolor"); 
			$data['bloodgroup'] = $this->General_Model->GetFullData($table = "tbl_bloodgroup"); 
			$data['bodytype'] = $this->General_Model->GetFullData($table = "tbl_bodytype"); 
			$data['appearance'] = $this->General_Model->GetFullData($table = "tbl_appearance"); 
			$data['familytype'] = $this->General_Model->GetFullData($table = "tbl_familytype"); 
			$data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus"); 
			$data['hometype'] = $this->General_Model->GetFullData($table = "tbl_hometype"); 
			$this->load->view('profile_edit',$data);
		}
		
   }
        public function change_status()
        {
        $status = $this->input->post('status');
        $old_status = $this->input->post('old_status');
        $id = $this->input->post('id');
        $comment = $this->input->post('comment');
        
        if($status == '1')
        {
        $checkphone = $this->db->select('phone')->from('tbl_registration')->where('id',$id)->get()->row_array()['phone'];

        $checkexist = $this->db->select('*')->from('tbl_registration')->where('phone',$checkphone)->where('status !=','3')->get()->num_rows();

        if($checkexist <= 1)
        {
        $data=array('status'=>$status,'verified_date'=>date('Y-m-d'));
        $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$id,$data);   
        }
        else
        {   
        $this->session->set_flashdata('existing',$checkphone.' is already registered!');
        redirect('happy_admin/profile/edit/'.$id);   
        }
        }
        else
        {
        $data=array('status'=>$status);
        $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$id,$data);
        }
        
        $log_data = array(
        'admin_id' => $this->session->userdata('user_id_admin'),
        'activity' => 'Chnaged status of user with user id '.$id. ' to '.$status,
        'log_desc' => $comment,
        'log_date' => date('d-m-Y H:i:s'),);
        $this->General_Model->AddRecord($table = 'tbl_adminlog',$data = $log_data);
        
        redirect('happy_admin/users/'.$old_status);
        }
        
        public function logout() 
        {
        $this->session->unset_userdata("user_id_admin");
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("user_type");
        redirect('admin/index');
        }
        
        public function approvetopaid5()
        {
        $plan = $this->input->post('sel_plan');
        $sessid=$this->session->userdata('user_id_admin');
        $payment_mode=$this->input->post('payment_mode');
        $physical_status=$this->input->post('physical_status');
        
        $staff_id=$this->input->post('staff_id');
        
        if(empty($physical_status))
        {
        $payment_status="Paid";  
        }
        
        if(!empty($physical_status))
        {
        $payment_status=$physical_status;  
        }
        
        $ss=$this->db->select('*')->from('tbl_plan')->where('plan_id',$plan)->get()->result_array();
        
        foreach($ss as $val)
        {
        
        $plan_name=$val['plan_name'];
        $expiry_date=date('Y-m-d', strtotime($date. ' + '.$val['months'].' days'));
        
        $contactbalance = $val['contacts'];
        $messagebalance = $val['messages'];
        }
        
        $date=date('Y-m-d');
        
        $uid=$this->input->post('user_id');
        
        $tbl_payment=$this->db->select('*')->from('tbl_payement')->where('user_id',$uid)->where('status',1)->get()->result_array();
        $tbl_payment_rows=$this->db->select('*')->from('tbl_payement')->where('user_id',$uid)->get()->num_rows();
        $tbl_payment_rows11=$this->db->select('*')->from('tbl_payement')->where('status',0)->where('user_id',$uid)->get()->num_rows();
        
        foreach($tbl_payment as $value)
        {
        $planid=$value['plan_id'];
        $sts=$value['status'];
        $iduser=$value['id'];
        
        if($sts=='1')
        {
        
        $log_data20 = array('status'=>'0',
        'ctime'=>date('Y-m-d H:i:s'),);
        
        $this->db->where('id', $iduser);
        $this->db->update('tbl_payement',$log_data20);
        
        $log_data = array(
        'session_id' => $sessid,
        'payment'=> $this->input->post('payment_mode'),
        'user_id' => $this->input->post('user_id'),
        'plan_id' => $plan,
        'description'=>$plan_name,
        'expiry_date'=>$expiry_date,
        'contactbalance'=>$contactbalance,
        'messagebalance'=>$messagebalance,
        'amount'=>$this->input->post('sel_amount'),
        'final_amount'=>$this->input->post('final_amount2'),
        'payment_mode'=>$payment_mode,
        'status'=>'1',
        'date'=>$date,
        'ctime'=>date('Y-m-d H:i:s'),
        'payment_status'=>$payment_status,
        'payment_staff_id'=>$staff_id,
        'comment'=>$this->input->post('details'),
        );
        
        $this->db->insert('tbl_payement',$log_data);
        }
        }
        
        
        $log_data = array(
        'session_id' => $sessid,
        'payment'=> $this->input->post('payment_mode'),
        'user_id' => $this->input->post('user_id'),
        'plan_id' => $plan,
        'description'=>$plan_name,
        'expiry_date'=>$expiry_date,
        'contactbalance'=>$contactbalance,
        'messagebalance'=>$messagebalance,
        'amount'=>$this->input->post('sel_amount'),
        'final_amount'=>$this->input->post('final_amount2'),
        'payment_mode'=>$payment_mode,
        'status'=>'1',
        'date'=>$date,
        'ctime'=>date('Y-m-d H:i:s'),
        'payment_status'=>$payment_status,
        'payment_staff_id'=>$staff_id,
        'comment'=>$this->input->post('details'),
        );
        
        
        if($tbl_payment_rows=='0' || $tbl_payment_rows11 > '0')
        {
        $this->db->insert('tbl_payement',$log_data);
        }
        
        
        $userid_paid=$this->input->post('user_id');
        $postpone_paid = array('paid_status'=>'Paid');
        $this->db->where('payment_id',$userid_paid);
        $this->db->update('tbl_paymentrequest',$postpone_paid);
        
        $userid_paid4=$this->input->post('user_id');
        $followup_status = array('delete_status'=>'Inactive');
        $this->db->where('uid',$userid_paid4);
        $this->db->update('tbl_followup',$followup_status);
        
        $dataassignapprove = array('active_status' =>'Inactive');
        $this->db->set('active_status', 'Inactive');
        $this->db->where('action_check',$userid_paid4);
        $this->db->update('tbl_assign_approve_calls', $dataassignapprove);
        
        $dataassignregister = array('assign_status' =>'Inactive');
        $this->db->set('assign_status', 'Inactive');
        $this->db->where('id',$userid_paid4);
        $this->db->update('tbl_registration',$dataassignregister);
        
        redirect('admin/search_profiles');
        }

    public function filterData()
    {
       
        $selectedCategory = $this->input->post('selected_category');
        $data['filteredData'] = $this->General_Model->getFilteredData($selectedCategory);
        $data['page'] = "Total Filter Data";
        $this->load->view('filtered_data_view', $data);
    }
    
    public function stafffilterData()
    {
        $selectedCategory = $this->input->post('selected_category');
        $data['filteredData'] = $this->General_Model->getstaffFilteredData($selectedCategory);
        $data['filteredtotal'] = $this->General_Model->getstaffFilteredDatatotalamount($selectedCategory);
        $data['page'] = "Total Filter Data";
        $this->load->view('filtered_staff_data_view', $data);
    }
    
    public function today_staff_filter()
    {
        // $selectedCategory = $this->input->post('selected_category');
        // $data['filteredData'] = $this->General_Model->getstaffFilteredDatatoday($selectedCategory);
        // $data['filteredtotal'] = $this->General_Model->getstaffFilteredDatatodayamount($selectedCategory);
        
       $selectedCategory = $this->input->post('selected_category');
       $selected_status =$this->input->post('selected_status');
       $data['filteredData'] = $this->General_Model->getstaffFilteredDatatoday($selectedCategory,$selected_status);
       $data['filteredtotal'] = $this->General_Model->getstaffFilteredDatatodayamount($selectedCategory,$selected_status);
       
        $data['page'] = "Today Filtered Data";
        $this->load->view('today_filtered_staff_data_view', $data);
    }
    
    public function filterDatatoday()
    {
        $selectedCategory = $this->input->post('selected_category');
        $data['filteredData'] = $this->General_Model->getFilteredDatatoday($selectedCategory);
        $data['filteredtotal'] = $this->General_Model->getstaffFilteredDatatodayamount_status($selectedCategory);
        $data['page'] = "Today Filter Data";
        $this->load->view('filtered_data__today_view', $data);
    }
    
    public function approvetocontacts()
    {
    $plan = $this->input->post('sel_plan');
    $sessid=$this->session->userdata('user_id_admin');
    $payment_mode=$this->input->post('payment_mode');
    $add_contacts=$this->input->post('sel_contact');
    $add_message=$this->input->post('sel_message');
    $add_durartion=$this->input->post('sel_duration');
    $id=$this->input->post('user_id');    
    $payment_status="Add Contacts";
    
    $ss=$this->db->select('*')->from('tbl_plan')->where('plan_id',$plan)->get()->result_array();
    
    foreach($ss as $val)
    {
    
    $plan_name=$val['plan_name'];
    $expiry_date=date('Y-m-d', strtotime($date. ' + '.$val['months'].' days'));
    
    $contactbalance = $val['contacts'];
    $messagebalance = $val['messages'];
    
    }
    
    $date=date('Y-m-d');
    $addcontacts=$this->db->select('*')->from('tbl_payement')->where('user_id',$id)->where('status','1')->get()->num_rows();
    $addcontacts2=$this->db->select('*')->from('tbl_payement')->where('user_id',$id)->where('status','0')->get()->num_rows();
    $tbl_payment = $this->db->select('*')->from('tbl_payement')->where('user_id',$id)->where('status',1)->get()->result_array();
    
    
    foreach($tbl_payment as $val)
    {
    
    $sts = $val['status'];
    $pid=$val['id'];
    $existing_contact=$val['addoncontact'];
    $existing_message=$val['addonmessage'];
    
    if($sts=='1')
    {
    
    $totalContacts = $existing_contact + $add_contacts;
    $totalmessages = $existing_message + $add_message;
    
    $log_data2 = array(
    'session_id' => $sessid,
    'addoncontact'=>$totalContacts,
    'addonmessage'=>$totalmessages,
    'expiry_date'=>$add_durartion,
    'status'=>'1',
    'add_contact'=>$date,
    'payment_status'=>$payment_status,
    );
    
    $this->db->where('id', $pid);
    $this->db->update('tbl_payement',$log_data2);
    }
    }	
    
    redirect('admin/search_profiles');
    }
    
    
    public function removetocontacts()
    {
    $plan = $this->input->post('sel_plan');
    $sessid=$this->session->userdata('user_id_admin');
    $payment_mode=$this->input->post('payment_mode');
    $left_contacts=$this->input->post('sel_contact');
    $left_message=$this->input->post('sel_message');
    $left_durartion=$this->input->post('sel_duration');
    $id=$this->input->post('user_id');    

	$ss=$this->db->select('*')->from('tbl_plan')->where('plan_id',$plan)->get()->result_array();

	foreach($ss as $val)
	{

	$plan_name=$val['plan_name'];
	$expiry_date=date('Y-m-d', strtotime($date. ' + '.$val['months'].' days'));

	$contactbalance = $val['contacts'];
	$messagebalance = $val['messages'];
	}
	
	$date=date('Y-m-d');
	$addcontacts=$this->db->select('*')->from('tbl_payement')->where('user_id',$id)->where('status','1')->get()->num_rows();
 	$addcontacts2=$this->db->select('*')->from('tbl_payement')->where('user_id',$id)->where('status','0')->get()->num_rows();
	$tbl_payment = $this->db->select('*')->from('tbl_payement')->where('user_id',$id)->where('status',1)->get()->result_array();
  
	foreach($tbl_payment as $val)
	{
    
     $sts = $val['status'];
     $pid=$val['id'];
     $existing_contact=$val['leftcontact'];
	 $existing_message=$val['leftmessage'];
	 
    if($sts=='1')
    {
        
    $totalContacts = $existing_contact + $left_contacts;
    $totalmessages = $existing_message + $left_message;
    
	
	$log_data = array(
	'session_id' => $sessid,
	'user_id' => $id,
	'leftcontact'=>$totalContacts,
	'leftmessage'=>$totalmessages,
	'expiry_date'=>$left_durartion,
	'status'=>'1',
	);
	  $this->db->where('user_id', $id);
	$this->db->update('tbl_payement',$log_data);
    }
    }

    redirect('admin/search_profiles');
    }
    
    public function approvetopaidactive()
    {
     $plan = $this->input->post('sel_plan');
	$ss=$this->db->select('*')->from('tbl_plan')->where('plan_id',$plan)->get()->result_array();

	foreach($ss as $val)
	{

	$plan_name=$val['plan_name'];
	$expiry_date=date('Y-m-d', strtotime($date. ' + '.$val['months'].' days'));
	$contactbalance = $val['contacts'];
	$messagebalance = $val['messages'];
	}

	$date=date('Y-m-d');

	$log_data = array(
	'session_id' => $this->session->userdata('user_id_admin'),
	'user_id' => $this->input->post('user_id'),
	'plan_id' => $plan,
	'description'=>$plan_name,
	'expiry_date'=>$expiry_date,
	'contactbalance'=>$contactbalance,
	'messagebalance'=>$messagebalance,
	'final_amount'=>$this->input->post('final_amount'),
	'status'=>'1',
	'date'=>$date,
	);
	
	$this->db->insert('tbl_payement',$log_data);
	
	  redirect('admin/search_profiles');
    }
    
    public function showcontactsdata()
    {
        
     $log_data = array(
	'session_id' => $this->session->userdata('user_id_admin'),
	'receiver_id' => $this->input->post('receiver_id'),
	'cdate'=>date('Y-m-d H:i:s')
	);
	$this->db->insert('tbl_contactsview',$log_data);  
    }
    
	public function approvecalls()
	{
	$this->load->view('approvecalls');
	}
	
    public function target()
    {    
    $data['page'] = "Target";
    $this->load->view('target',$data);
    }
    
    public function total_calls()
    {    
    $data['page'] = "Total Calls";
    $this->load->view('total_calls',$data);
    }
    
    public function total_postpone()
    {    
    $data['page'] = "Total Postpone";
    $data['que']=$this->General_Model->total_postponealldata();
    $this->load->view('total_postpone',$data);
    }
    
    
     public function payvisit_customer()
    {    
    $data['page'] = "Pay Visit List";
    $data['que']=$this->General_Model->total_payvisitcustomers();
    $this->load->view('payvisit_customer',$data);
    }
    
    
    
    public function assign_approve_calls()
    {    
    $data['page'] = "Assign Approve Calls";
    $data['isHRDepartment'] = true;
    $data['isITDepartment'] = true;
    $this->load->view('assign_approve_calls',$data);
    }
    
    public function assign_active_calls()
    {    
    $data['page'] = "Assign Active Calls";
    $this->load->view('assign_active_calls',$data);
    }
    
    public function profile_approvals_all()
    {    
    $data['page'] = "Profile Approved";
    $this->load->view('profile_approvals_all',$data);
    }
    
    public function profile_deleted_all()
    {    
    $data['page'] = "Profile Deleted";
    $this->load->view('profile_deleted_all',$data);
    }
    
    public function profilephoto_unavailable()
    {    
    $data['page'] = "Profile Photo Unavailable";
    $this->load->view('profilephoto_unavailable',$data);
    }
    
    public function bucket_change()
    {    
    $data['page'] = "Bucket Change";
    $this->load->view('bucket_change',$data);
    }
    
	public function activecalls()
	 {
      
        $limit = 20;
        $offset = 0;
        $data['results'] = $this->General_Model->fetchData($limit,$offset);
        $this->load->view('activecalls', $data);
    }
    
    public function get_data($offset)
    {
        $limit = 20;
        $data['items'] = $this->General_Model->get_data_items($limit, $offset);
        $this->load->view('items_table',$data);
    }

	public function activecallsdata($offset)
	{
	    $limit = 20;
	    
	    $data['results'] = $this->General_Model->fetchData($limit,$offset);
		$this->load->view('activecalls',$data);
	}
	
	public function todayfollowup()
	{

	$search_profile = $this->input->post('search_profile');
	if($search_profile != "")
	{
	$data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
	}

	$data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
	$this->load->view('todayfollowup',$data);
	}
	
	public function todayfollowup_all()
	{

	$search_profile = $this->input->post('search_profile');
	
	if($search_profile != "")
	{
	$data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
	}

	$data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
	$this->load->view('todayfollowupall',$data);
	}
	
	public function pendingfollowup_all()
	{

	$search_profile = $this->input->post('search_profile');
	
	if($search_profile != "")
	{
	$data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
	}
	$data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
	$this->load->view('pendingfollowupall',$data);
	}
	
	
	public function approvecalls_all()
	{
	$search_profile = $this->input->post('search_profile');

	if($search_profile != "")
	{
	$data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
	}

	$data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
	$this->load->view('approvecallsall',$data);
	}
	
	public function activecalls_all()
	{

	$search_profile = $this->input->post('search_profile');
	if($search_profile != "")
	{
	$data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
	}

	$data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
	$this->load->view('activecallsall',$data);
	}
	
	public function pendingfollowup()
	{

	$search_profile = $this->input->post('search_profile');
	
	if($search_profile != "")
	{
	$data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
	}

	$data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
    $this->load->view('pendingfollowup',$data);
	}
	
	public function calllogs()
	{
	$this->load->view('calllogs');
	}
	
	public function calllogs_all()
	{
	$this->load->view('calllogsall');
	}
	
    public function calllogschatsupport()
	{
	$this->load->view('calllogs');
	}
	
	public function todaypostpone()
	{
	$this->load->view('todaypostpone');
	}
	
    public function todaypostpone_all()
	{
	$this->load->view('todaypostponeall');
	}
	public function paymentdetails()
	{
    $data['page'] = "Payment Details";
    $this->load->view('paymentdetails',$data);
	}
	
	public function expirycalls()
	{
	$this->load->view('expirycalls');
	}
	
	public function paymentcalls()
	{
	$this->load->view('paymentcalls');
	}
	
	public function profile_approve_all()
    {    
    $data['page'] = "Profile Approved";
    $this->load->view('profile_approved_all',$data);
    }
    
    public function hide_profile()
    {

    $emp_id =$this->input->post('session');
    $user_id = $this->input->post('user_id');
    $hide_status='0'; 
    $hide_description=$this->input->post('hide_description');   	 
    $hide_date=date('Y-m-d H:i:s');
    $result = $this->General_Model->AddHideProfile($user_id,$hide_status,$emp_id,$hide_date,$hide_description);
    
    redirect('admin/search_profiles');
    }
    
    public function unhide_profile()
    { 
    $emp_id =$this->input->post('session');
    $user_id = $this->input->post('user_id');
    $hide_status='1';
    $hide_date=date('Y-m-d H:i:s');
    $hide_description=$this->input->post('hide_description');
    
    $result = $this->General_Model->AddHideProfile($user_id,$hide_status,$emp_id,$hide_date,$hide_description); 
    redirect('admin/search_profiles');
    }

    public function block_profile_todayfollowup()
    {
    $emp_id =$this->input->post('session');
    $id = $this->input->post('user_id2');
    $block_description=$this->input->post('block_description');
    $block_status=$this->input->post('block_status');
    $status='4';
    $block_phone = $this->db->select('id,phone')->from('tbl_registration')->where('id',$id)->get()->row_array();
    $block_date=date('Y-m-d');
    
    $resu=$this->General_Model->BlockProfile($id,$status,$block_status,$block_description,$emp_id,$block_date);
    redirect('admin/search_profiles');
    }
    
    public function block_profile()
    {
    $emp_id = $this->input->post('emp_id');
    $id = $this->input->post('id');
    $block_description=$this->input->post('block_description');
    $block_status=$this->input->post('block_status');
    $status='4';
    $block_phone = $this->db->select('id,phone')->from('tbl_registration')->where('id',$id)->get()->row_array();
    $block_date=date('Y-m-d H:i:s');
    $userid= $this->input->post('user_id2');
    
    $data3 = array('delete_status' =>'Inactive','status'=>$block_status,'message'=>$block_description,'cdate'=>date('Y-m-d H:i:s'),'cur_date'=>date('Y-m-d'));
    $this->db->set('delete_status', 'Inactive');
    $this->db->where('uid',$userid);
    $this->db->update('tbl_followup', $data3);
    
    $resu=$this->General_Model->BlockProfile($id,$status,$block_status,$block_description,$emp_id,$block_date);
    redirect('admin/search_profiles');
    }
      
      
    public function block_profile_approve_calls()
    {
    $emp_id =$this->input->post('session');
    $id = $this->input->post('user_id2');
    $block_description=$this->input->post('block_description');
    $block_status=$this->input->post('block_status');
    $status='4';
    $block_phone = $this->db->select('id,phone')->from('tbl_registration')->where('id',$id)->get()->row_array();
    $block_date=date('Y-m-d H:i:s');
    
    $data2 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$id);
    $this->db->update('tbl_assign_active_calls', $data2);
    
    $resu=$this->General_Model->BlockProfile($id,$status,$block_status,$block_description,$emp_id,$block_date);
    redirect('admin/search_profiles');
    }

    public function unblock_profile()
    {
    $emp_id =$this->input->post('emp_id');
    $id = $this->input->post('id');
    $block_description=$this->input->post('block_description');
    $block_status=$this->input->post('block_status');
    $block_phone = $this->db->select('id,phone')->from('tbl_registration')->where('id',$id)->get()->row_array();
    $status='5';
    $block_date=date('Y-m-d H:i:s');
    
    $resu=$this->General_Model->BlockProfile($id,$status,$block_status,$block_description,$emp_id,$block_date);
    redirect('admin/search_profiles');
    }
      
    public function checkstatus()
    {
    $phone=$this->input->post('phone');
    $data['check_status'] = $this->db->select('status')->from('tbl_registration')
    ->where('phone',$phone)->get()->row_array();
    return $data['check_status'];
    }


    public function downgrade_payment()
    {
    $downgrade_reason =$this->input->post('downgrade_reason');
    $user_id = $this->input->post('user_id');
    $comment=$this->input->post('comment');
   
    $data2 = array('status' =>'0','comment'=>$comment,'downgrade_reason'=>$downgrade_reason);
    $this->db->set('status', '0');
    $this->db->where('user_id',$user_id);
    $this->db->update('tbl_payement', $data2);
    redirect('admin/search_profiles');
    }
    
    public function changepassword()
    {
    $emp_id =$this->input->post('emp_id');
    $id = $this->input->post('id');
    $password=md5($this->input->post('password'));
    $date=date('Y-m-d H:i:s');
    $status='1';
    $msg="Password Changed";
    
    $data2 = array('active_status' =>'Inactive');
    $this->db->set('active_status', 'Inactive');
    $this->db->where('action_check',$id);
    $this->db->update('tbl_assign_active_calls', $data2);
    
    $res=$this->General_Model->ChangePassword($id,$password,$emp_id,$date,$status,$msg);
    redirect('admin/search_profiles');
    }
    
    public function assign_target()
    {
    $data['page'] = "Target Assign";
    $this->load->view('assign_target',$data);
    }
    
    public function update_logs()
    {
    
    $data['page'] = "Pending Profile Update";
    $update_id =$this->input->post('update_id');
    $update_by=$this->input->post('update_by');
    $update_date=date('Y-m-d H:i:s');
    $data2 = array('update_data' =>'2','update_date'=>$update_date,'update_by'=>$update_by);
    $this->db->set('update_data', '2');
    $this->db->set('update_date', $data2['update_date']);
    $this->db->set('update_by', $data2['update_by']);
    $this->db->where('id',$update_id);
    $this->db->update('tbl_registration', $data2);
    $this->load->view('update_logs',$data);
    }
    
    public function update_logs_delete()
    {
    
    $data['page'] = "Pending Profile Update";
    $update_id =$this->input->post('update_id');
    $data2 = array('status' =>'3');
    $this->db->set('status', '3');
    $this->db->where('id',$update_id);
    $this->db->update('tbl_registration', $data2);
    $this->load->view('update_logs',$data);
    }
    
    public function update_logs2()
    {
    $data['page'] = "Pending Profile Update";
    $update_id =$this->input->post('update_id');
    $data2 = array('update_data' =>'2');
    $this->db->set('update_data', '2');
    $this->db->where('id',$update_id);
    $this->db->update('tbl_registration', $data2);
    $this->load->view('update_logs2',$data);
    }
    
    public function profilephoto_deleted()
    {
    $data['page'] = "Profile Photo Deleted";
    $this->load->view('profilephoto_deleted',$data);
    }
    
    public function profilephoto($user_id)
    {
    $data['user_id'] = $user_id;
    $data['ProfileDetails'] = $this->General_Model->GetProfileDetails($user_id);
    $data['userimages']  = $this->General_Model->GetFullData('tbl_userimages','user_id',$user_id);
    $data['profilepic']  = $this->General_Model->GetFullData('tbl_registration','id',$user_id);
    $this->load->view('uploadphoto',$data);
    }
    
    public function assign_target_form()
    {
    
    if ($this->input->server('REQUEST_METHOD') === 'POST')
    {
    
    $data = array(
    'user_id' => $this->input->post('user_id'),
    'target_amount' => $this->input->post('target_amount'),
    'date'=>date('Y-m-d'),
    'status'=>'0',
    );
    
    if (!$this->isDataDuplicate($data)) 
    {
    
    $this->insertDataToDatabase($data);
    redirect('admin/assign_target');
    }
    
    else 
    {
    redirect('admin/assign_target');
    }
    } 
    
    else 
    {
    redirect('admin/assign_target');
    }
    }

    private function isDataDuplicate($data)
    {
     return $this->General_Model->isDataDuplicate($data);
    }
    
    private function insertDataToDatabase($data)
    {
     $this->General_Model->insertData($data);
    }
    
    public function getCustomerData() 
    {
        $customerId = $this->input->post('customer_id');
        $fromDate = $this->input->post('from_date');
        $toDate = $this->input->post('to_date');

        $data['customer_data'] = $this->General_Model->getCustomerData($customerId, $fromDate, $toDate);
        $data['total_rows'] = count($data['customer_data']);
        
        $date_ymd = date('Y-m-d', strtotime($fromDate));
        $date_ymd2 = date('Y-m-d', strtotime($toDate));
        
        $data['customer_data2'] = $this->General_Model->getCustomer2Data($customerId, $fromDate, $toDate);
        $data['total_rows2'] = count($data['customer_data2']);

        $data['customer_data3'] = $this->General_Model->getCustomer3Data($customerId, $fromDate, $toDate);
        $data['total_rows3'] = count($data['customer_data3']);

        $data['customer_data4'] = $this->General_Model->getCustomer4Data($customerId, $fromDate, $toDate);
        $data['total_rows4'] = count($data['customer_data4']);

        $data['customer_data5'] = $this->General_Model->getCustomer5Data($customerId, $fromDate, $toDate);
        $data['total_rows5'] = count($data['customer_data5']);

        $data['customer_data6'] = $this->General_Model->getCustomer6Data($customerId, $fromDate, $toDate);
        $data['total_rows6'] = count($data['customer_data6']);
        
        $data['total_amount'] = $this->General_Model->getTotalAmount($customerId, $fromDate, $toDate);
        $data['total_list'] = $this->General_Model->getTotalFollowupList($customerId,$fromDate, $toDate);
    
        $date_ymd_his=date('Y-m-d H:i:s', strtotime($fromDate));   
        $date_ymd_his2=date('Y-m-d H:i:s', strtotime($toDate));
        
        $data['total_list2'] = $this->General_Model->getTotalDeleteList($customerId,$date_ymd_his,$date_ymd_his2);
        
        $this->load->view('customer_data_view', $data);
    }
    
    public function getFilter_assign_approvecallsData()
    {
    $postData = $this->input->post();
    $data = $this->General_Model->getUsers($postData);
    
    if (is_array($data)) 
    {
    echo json_encode($data);
    } 
    
    else 
    {
    echo json_encode(array('data' => []));
    }
    }
    
    public function getFilter_approvecallsData()
    {
    $postData = $this->input->post();
    
    $data = $this->General_Model->getUsersall($postData);
    
    if (is_array($data)) 
    {
    echo json_encode($data);
    } 
    
    else 
    {
    echo json_encode(array('data' => []));
    }
    }
    
     public function quickregister_excel()
    {
    try 
    {
    $all = $this->General_Model->GetQuickregister();
    
    if(!empty($all)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'HN ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Reg Date');
    $sheet->setCellValue('D1', 'Mobile');
    $sheet->setCellValue('E1', 'District');
    
    $cellRange = 'A1:E1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    $row = 2;
    $i = 1;
    
    foreach($all as $item) 
    {
    $formattedDate = date('d-m-Y', strtotime($item->reg_date));
    
    $sheet->setCellValue('A' . $row, $item->happynikah_id);
    $sheet->setCellValue('B' . $row, $item->name);
    $sheet->setCellValue('C' . $row, $formattedDate);
    $sheet->setCellValue('D' . $row, $item->phone);
    $sheet->setCellValue('E' . $row, $item->district); 
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'quickregister.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    else 
    {
    $response = array('success' => false, 'error' => 'No data to export');
    echo json_encode($response);
    }
    } 
    
    catch (Exception $e) 
    {
    log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
    
    $response = array('success' => false, 'error' => 'Error exporting Excel file');
    echo json_encode($response);
    }
    }
    
    
    public function stagethree_excel()
    {
    try 
    {
    $all = $this->General_Model->Getstage3();
    
    if(!empty($all)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'HN ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Reg Date');
    $sheet->setCellValue('D1', 'Mobile');
    $sheet->setCellValue('E1', 'District');
    
    $cellRange = 'A1:E1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    $row = 2;
    $i = 1;
    
    foreach($all as $item) 
    {
    $formattedDate = date('d-m-Y', strtotime($item->reg_date));
    
    $sheet->setCellValue('A' . $row, $item->happynikah_id);
    $sheet->setCellValue('B' . $row, $item->name);
    $sheet->setCellValue('C' . $row, $formattedDate);
    $sheet->setCellValue('D' . $row, $item->phone); 
    $sheet->setCellValue('E' . $row, $item->district); 
    
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'stagethree.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    else 
    {
    $response = array('success' => false, 'error' => 'No data to export');
    echo json_encode($response);
    }
    } 
    
    catch (Exception $e) 
    {
    log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
    
    $response = array('success' => false, 'error' => 'Error exporting Excel file');
    echo json_encode($response);
    }
    }
    
    
    
    public function otherstate_excel()
    {
    try 
    {
    $all = $this->General_Model->Getotherstate();
    
    if(!empty($all)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'HN ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Reg Date');
    $sheet->setCellValue('D1', 'Mobile');
    // $sheet->setCellValue('E1', 'District');
    
    $cellRange = 'A1:D1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    $row = 2;
    $i = 1;
    
    foreach($all as $item) 
    {
    $formattedDate = date('d-m-Y', strtotime($item->reg_date));
    
    $sheet->setCellValue('A' . $row, $item->happynikah_id);
    $sheet->setCellValue('B' . $row, $item->name);
    $sheet->setCellValue('C' . $row, $formattedDate);
    $sheet->setCellValue('D' . $row, $item->phone);
    // $sheet->setCellValue('E' . $row, $item->district); 
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'otherstate.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    else 
    {
    $response = array('success' => false, 'error' => 'No data to export');
    echo json_encode($response);
    }
    } 
    
    catch (Exception $e) 
    {
    log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
    
    $response = array('success' => false, 'error' => 'Error exporting Excel file');
    echo json_encode($response);
    }
    }
    
    
    
    public function todaycreationall_excel()
    {
    try 
    {
    $all = $this->General_Model->Gettodaycreation();
    
    if(!empty($all)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'HN ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Reg Date');
    $sheet->setCellValue('D1', 'Mobile');
    $sheet->setCellValue('E1', 'District');
    
    $cellRange = 'A1:E1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    $row = 2;
    $i = 1;
    
    foreach($all as $item) 
    {
    $formattedDate = date('d-m-Y', strtotime($item->reg_date));
    
    $sheet->setCellValue('A' . $row, $item->happynikah_id);
    $sheet->setCellValue('B' . $row, $item->name);
    $sheet->setCellValue('C' . $row, $formattedDate);
    $sheet->setCellValue('D' . $row, $item->phone);
    $sheet->setCellValue('E' . $row, $item->district); 
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'todaycreationall.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    else 
    {
    $response = array('success' => false, 'error' => 'No data to export');
    echo json_encode($response);
    }
    } 
    
    catch (Exception $e) 
    {
    log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
    
    $response = array('success' => false, 'error' => 'Error exporting Excel file');
    echo json_encode($response);
    }
    }
    
    
    public function gulfdata_excel()
    {
    try 
    {
    $all = $this->General_Model->GetGulfData();
    
    if(!empty($all)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'HN ID');
    $sheet->setCellValue('B1', 'Name');
 
    $sheet->setCellValue('C1', 'Reg Date');
    $sheet->setCellValue('D1','Mobile');
    $cellRange = 'A1:D1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    $row = 2;
    $i = 1;
    
    foreach($all as $item) 
    {
    $formattedDate = date('d-m-Y', strtotime($item->reg_date));
    
    // $countryCode= $item->countryCode;
    // $fullPhoneNumber = '+' . $countryCode . $item->phone;

    $countryCode = $item->countryCode;
    $fullPhoneNumber = '+' . $countryCode .$item->phone;

    $sheet->setCellValue('A' . $row, $item->happynikah_id);
    $sheet->setCellValue('B' . $row, $item->name);
    $sheet->setCellValue('C' . $row, $formattedDate);
    $sheet->setCellValue('D' . $row, $fullPhoneNumber);    
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'gulfdata.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    else 
    {
    $response = array('success' => false, 'error' => 'No data to export');
    echo json_encode($response);
    }
    } 
    
    catch (Exception $e) 
    {
    log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
    
    $response = array('success' => false, 'error' => 'Error exporting Excel file');
    echo json_encode($response);
    }
    }
    
    
    public function createExcel() 
    {
    $postData = $this->input->post();
    
    $data = $this->General_Model->getUsersForExport($postData);
    
    if(!empty($data)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'HN ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Reg Date');
    $sheet->setCellValue('D1', 'Gender');
    $sheet->setCellValue('E1', 'Mobile');
    $sheet->setCellValue('F1', 'Education');
    $sheet->setCellValue('G1', 'Profession');
    $sheet->setCellValue('H1', 'District');
    $sheet->setCellValue('I1', 'Photo Status');
    $cellRange = 'A1:I1';
    
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);

    $row = 2;
    foreach ($data as $item) 
    {
    
    $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
    $sheet->setCellValue('A' . $row, $item['happynikah_id']);
    $sheet->setCellValue('B' . $row, $item['name']);
    $sheet->setCellValue('C' . $row, $formattedDate);
    $sheet->setCellValue('D' . $row, $item['gender']);
    $sheet->setCellValue('E' . $row, $item['phone']);
    $sheet->setCellValue('F' . $row, $item['edu']);
    $sheet->setCellValue('G' . $row, $item['profession_name']);
    $sheet->setCellValue('H' . $row, $item['district']);
    $sheet->setCellValue('I' . $row, $item['photo_status']);
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/'; 
    $fileName = 'employee.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    
    else 
    {
        
    $response = array('success' => false);
    echo "Invalid";
    }
    }
    
    
    public function createExcel_nophoto() 
    {
    $postData = $this->input->post();
    
    $data = $this->General_Model->getUsersForExport_nophoto($postData);
    
    if(!empty($data)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'HN ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Reg Date');
    $sheet->setCellValue('D1', 'Gender');
    $sheet->setCellValue('E1', 'Mobile');
    $sheet->setCellValue('F1', 'Education');
    $sheet->setCellValue('G1', 'Profession');
    $sheet->setCellValue('H1', 'District');
    
    $cellRange = 'A1:H1';
    
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);

    $row = 2;
    foreach ($data as $item) 
    {
    
    $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
    $sheet->setCellValue('A' . $row, $item['happynikah_id']);
    $sheet->setCellValue('B' . $row, $item['name']);
    $sheet->setCellValue('C' . $row, $formattedDate);
    $sheet->setCellValue('D' . $row, $item['gender']);
    $sheet->setCellValue('E' . $row, $item['phone']);
    $sheet->setCellValue('F' . $row, $item['edu']);
    $sheet->setCellValue('G' . $row, $item['profession_name']);
    $sheet->setCellValue('H' . $row, $item['district']);
    
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/'; 
    $fileName = 'employee.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    
    else 
    {
        
    $response = array('success' => false);
    echo "Invalid";
    }
    }
    

    public function getFilter_approveprofile_Data()
    {
    $postData = $this->input->post();
    
    
    $data = $this->General_Model->getUsers_approve_all($postData);
    
    if (is_array($data)) 
    {
    echo json_encode($data);
    } 
    else 
    {
        
    echo json_encode(array('data' => []));
    }
    }
    
    public function getFilter_deleteprofile_Data()
    {
    $postData = $this->input->post();
    $data = $this->General_Model->getUsers_delete_all($postData);
    
    if(is_array($data)) 
    {
    echo json_encode($data);
    } 
    else 
    {
    echo json_encode(array('data' => []));
    }
    }
    
    public function getFilter_noprofilephoto_Data()
    {
    $postData = $this->input->post();
    
    $data = $this->General_Model->getUsers_no_profile_pic_all($postData);
    
    if(is_array($data)) 
    {
    echo json_encode($data);
    } 
    else 
    {
    echo json_encode(array('data' => []));
    }
    }
    
    public function getFilter_assign_activecallsData()
    {
    $postData = $this->input->post();
    $data = $this->General_Model->getUsers2($postData);
    if(is_array($data)) 
    {
    echo json_encode($data);
    } 
    else 
    {
    echo json_encode(array('data' => []));
    }
    }
    
    public function assign_approve_calls_form()
    {
    $user_id = $this->input->post('user_id'); 
    $assign_id = $this->input->post('assign_id');
    $checkboxValues = $this->input->post('action_check');
    $cdate = date('Y-m-d');
    $status="0";
    
    if(is_array($checkboxValues) && count($checkboxValues) > 0) 
    {
    foreach ($checkboxValues as $value) 
    {
    $data = array(
    'action_check' => $value,
    'user_id' => $user_id,
    'assign_id'=>$assign_id,
    'date'=>$cdate,
    'goto_status'=>$status
    );
    
    
    $data5[] = array(
    'action_check' => $value,
    'user_id' => $user_id,
    'assign_id'=>$assign_id,
    'date'=>$cdate,
    'goto_status'=>$status
    );
    
    $this->db->update_batch('tbl_assign_approve_calls', $data5, 'action_check');
    $this->db->delete('tbl_assign_approve_calls', array('action_check' =>$value));
    
    $data_payment_viewed = array('delete_status' =>'Inactive');
    $this->db->set('delete_status', 'Inactive');
    $this->db->where('sender_id',$value);
    $this->db->update('tbl_payment_viewed', $data_payment_viewed);
    
    if(!$this->db->insert('tbl_assign_approve_calls', $data)) 
    {
    
    $error = $this->db->error();
    log_message('error', 'Error inserting data: ' . $error['message']);
    }
    
    $data2[] = array(
    'id' => $value,
    'direct'=>$assign_id
    );
    }
    
    if (!$this->db->update_batch('tbl_registration', $data2, 'id')) 
    {
    $error = $this->db->error();
    log_message('error', 'Error updating data: ' . $error['message']);
    }
    }
    return redirect('admin/assign_approve_calls');
    }
        
    public function getCustomerOrderCount($customerId) 
    {
    $orderCount = $this->General_Model->getCustomerOrderCount($customerId);
    echo $orderCount;
    }
    
    public function getTotalsaleAmount($customerId) 
    {
    $totalAmount = $this->General_Model->getTotalsaleAmount($customerId);
    echo $totalAmount;
    }
        
    public function getPostponeCount($customerId) 
    {
    $userCount = $this->General_Model->getPostponeCount($customerId);
    echo $userCount;
    }

    public function getRingCount($customerId) 
    {
    $orderCount4 = $this->General_Model->getRingCount($customerId);
    echo $orderCount4;
    }
         
    public function assign_active_calls_form()
    {

        $user_id = $this->input->post('user_id'); 
        $assign_id = $this->input->post('assign_id');
        $checkboxValues = $this->input->post('action_check');
        $cdate = date('Y-m-d');
        $status = "0";
        
        if(is_array($checkboxValues) && count($checkboxValues) > 0) 
        {
        foreach ($checkboxValues as $value) 
        {
        $data786 = array(
        'action_check' => $value,
        'user_id' => '2',
        'assign_id' => $assign_id,
        'date' => $cdate,
        'goto_status'=>$status
        );
        
        $data2 = array(
        'id' => $value,
        // 'assign_status' => 'Inactive',
        'direct' => $assign_id,
        'activecalls_status' => '2'
        );
        
        $this->db->insert('tbl_assign_active_calls', $data786);
        
        $this->db->where('id', $value);
        $this->db->update('tbl_registration', $data2);
        }
        }

        return redirect('admin/assign_active_calls');
        }
        
        public function changepass()
        {
        $user_id =$this->input->post('user_id');
        $password=md5($this->input->post('pass_super'));
        $date=date('Y-m-d');
        $res=$this->General_Model->changeadminpassword($user_id,$password,$date); 
        
        $this->load->view('changepassword');
        }
    
        public function changepass2()
        {
        $user_id =$this->input->post('user_id');
        $password=md5($this->input->post('pass_super'));
        $date=date('Y-m-d');
        $res=$this->General_Model->changeadminpassword($user_id,$password,$date); 
        $this->load->view('changesalespassword');
        }
    
        public function changesalespass()
        {
        $user_id =$this->input->post('user_id');
        $password=md5($this->input->post('pass_sales'));
        $date=date('Y-m-d');
        $res=$this->General_Model->changeadminpassword($user_id,$password,$date); 
        $this->load->view('changepassword');
        }
    
        public function changechatsupportpass()
        {
        $user_id =$this->input->post('user_id');
        $password=md5($this->input->post('pass_chat'));
        $date=date('Y-m-d');
        $res=$this->General_Model->changeadminpassword($user_id,$password,$date); 
        $this->load->view('changepassword');
        }
    
        public function changeservicepass()
        {
        $user_id =$this->input->post('user_id');
        $password=md5($this->input->post('pass_service'));
        $date=date('Y-m-d');
        $res=$this->General_Model->changeadminpassword($user_id,$password,$date); 
        $this->load->view('changepassword');
        }
        
        public function changesupportpass()
        {
        $user_id =$this->input->post('user_id');
        $password=md5($this->input->post('pass_support'));
        $date=date('Y-m-d');
        $res=$this->General_Model->changeadminpassword($user_id,$password,$date); 
        
        $this->load->view('changepassword');
        }
        
        public function lastlogin()
        {
        $this->load->view('lastlogin');
        }
        
        public function salesdash()
        {
        $this->load->view('dashboardsales');
        }
        public function payvisitcount()
        {
        $this->load->view('payvisitcount');
        }
        
        public function reportid()
        {
        $this->load->view('reportid');
        }
        
        public function tdycreation()
        {
        $data['page'] = "Today's Creation";
        $data['todaycreation'] = $this->General_Model->Gettdycreation();
        $this->load->view('todaycreation',$data);
        }
    
       
        
        public function todaycreation()
        {
        $data['page'] = "Today's Creation";
        $data['todaycreation'] = $this->General_Model->Gettodaycreation();
        $this->load->view('todaycreationall',$data);
        }

        public function totalcreation()
        {
        $data['page'] = "Total Creation";
        $data['totalcreation'] = $this->General_Model->Gettotalcreation();
        $this->load->view('totalcreation',$data);
        }
        
        public function totalcreationall()
        {
        $data['page'] = "Total Creation";
        $data['totalcreation'] = $this->General_Model->Gettotalcreationall();
        $this->load->view('totalcreationall',$data);
        }
        
        public function tdypaymentcreation()
        {
        $data['page'] = "Today's Sale";
        $data['todaycreation'] = $this->General_Model->Gettdypaymentcreation();
        $this->load->view('todaypaymentcreation',$data);
        }
    
        public function totalpaymentcreation()
        {
        $data['page'] = "Total Sale";
        $data['totalcreation'] = $this->General_Model->Gettotalpaymentcreation();
        $this->load->view('totalpaymentcreation',$data);
        }
        
        public function filterpaymentcreation()
        {
        
        $data['page'] = "Filtered Data";
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $selected_category=$this->input->post('selected_category');
        $selected_status=$this->input->post('selected_status');
        
        $data['result'] = $this->General_Model->getDataBetweenDates($start_date,$end_date,
        $selected_category,$selected_status);
        $data['filteredtotal'] = $this->General_Model->getDataBetweenDatescount($start_date, $end_date,$selected_category,$selected_status);
       
        $this->load->view('totalpaymentcreation2', $data);
        }

        public function todayfollowupcreation()
        {   
        $data['page'] = "Today Followup";
        $data['todayfollowup'] = $this->General_Model->Gettodayfollowup();
        $this->load->view('todayfollowupcreation',$data);
        }
        
        public function multiple_contacts()
        {
        $data['page'] = "Customer Viewed Count";
        $this->load->view('multiple_contacts_form', $data);
        }
        
        public function district_date_staff_count()
        {
        $data['user_id']=$this->input->post('user_id'); 
        $data['from_date']=$this->input->post('from_date');
        $data['to_date']=$this->input->post('to_date');
        $data['gender']=$this->input->post('gender');
        $this->load->view('district_date_staff_count',$data);  
        }

        public function district_date_staff_count_form()
        {
        $data['page'] = "Date Vise District Count";
        $this->load->view('district_date_staff_count_form',$data);  
        }
        
        public function district_date_staff_count_gotonikah()
        {
        $data['user_id']=$this->input->post('user_id'); 
        $data['from_date']=$this->input->post('from_date');
        $data['to_date']=$this->input->post('to_date');
        $data['gender']=$this->input->post('gender');
        $this->load->view('district_date_staff_count_gotonikah',$data);  
        }

        public function district_date_staff_count_form_gotonikah()
        {
        $data['page'] = "Date Vise District Count";
        $this->load->view('district_date_staff_count_form_gotonikah',$data);  
        }

	    public function multiple_contacts_form()
        {
      
        $selected_date = $this->input->post('selected_date');
        if (!empty($selected_date)) 
        {
        $selected_date_formatted = date('Y-m-d H:i:s', strtotime($selected_date));
        $data['records'] = $this->General_Model->getmultiple_contacts($selected_date_formatted);
        $data['counts'] = $this->General_Model->getSenderCounts($selected_date_formatted);
        $data['selected_date'] = $selected_date_formatted;
        } 
       
        else
        {
        $data['records'] = [];
        $data['counts'] = [];
        $data['selected_date'] = ''; 
        }
        $this->load->view('multiple_contacts', $data);
        }
        
        public function pdfcreation()
        {
        $search_profile = $this->input->post('search_profile');
        
        if($search_profile != "")
        {
        $data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
        $data['get_search']=$this->General_Model->search_prof($search_profile);
        
        }
        
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");
        $this->load->view('pdfcreation',$data); 
        }
        
        public function invoice_creation()
        {
        $search_profile = $this->input->post('search_profile');
        
        if($search_profile != "")
        {
        $data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
        $data['get_search']=$this->General_Model->search_prof($search_profile);
        }
        
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");
        $this->load->view('invoice_creation',$data); 
        }

        public function generatePDFFile() 
        {
        
        $data = array(); 
        $htmlContent='';
        $search_profile = $this->input->post('search_profile');
        
        if($search_profile != "")
        {
        $data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
        }
        
        $htmlContent = $this->load->view('pdf/file', $data, TRUE);       
        $createPDFFile = time().'.pdf';
        $this->createPDF(ROOT_FILE_PATH.$createPDFFile, $htmlContent);
        redirect(HTTP_FILE_PATH.$createPDFFile);
        }
        
        public function generateInvoiceFile() 
        {
        
        $data = array(); 
        $htmlContent='';
        $search_profile = $this->input->post('search_profile');
        
        if($search_profile != "")
        {
        $data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
        }
        
        $htmlContent = $this->load->view('pdf/invoice_file', $data, TRUE);       
        $createPDFFile = time().'.pdf';
        $this->createPDF(ROOT_FILE_PATH_INVOICE.$createPDFFile, $htmlContent);
        redirect(HTTP_FILE_PATH_INVOICE.$createPDFFile);
        }

       public function createPDF($fileName,$html) 
       {
        
        ob_start(); 
        $this->load->library('Pdf');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('HappyNikah');
        $pdf->SetTitle('HappyNikah');
        $pdf->SetSubject('HappyNikah');
        $pdf->SetKeywords('HappyNikah');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);

        $pdf->SetAutoPageBreak(TRUE, 0);

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) 
        {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }       

        $pdf->SetFont('dejavusans', '', 10);
        $pdf->AddPage();

      
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->lastPage();       
        ob_end_clean();
        $pdf->Output($fileName, 'F');        
        
    }
	
	public function datas()
	{
	    $data['page'] = "Full Data";
	    $data['fulldata'] = $this->General_Model->Getdatas();
		$this->load->view('datas',$data);
	}
	
    public function calllogspostpone_update()
	{	
		
    $membership_plan = $this->input->post('membership_plan');
	$postpone_date  = $this->input->post('postpone_date');
	$plantype  = $this->input->post('plantype');
    $login_id = $this->session->userdata('user_id_admin');
	$message = $this->input->post('message');
	$id= $this->input->post('user_id');   
    $cdate=date('Y-m-d');
    $cdate_time=date('Y-m-d H:i:s');

	$this->General_Model->todaypostpone_update($id,$membership_plan,
    $postpone_date,$plantype,$message,$cdate,$login_id,$cdate_time);

	}
	
	public function paymentvisit_delete()
	{
    $delete_status="Inactive";
    $login_id = $this->session->userdata('user_id_admin');
	$id= $this->input->post('delete_id');
    $cdate=date('Y-m-d H:i:s');
    $this->General_Model->paymentvisit_delete2($id,$delete_status,$login_id,$cdate);
    redirect('admin/payvisitcount');
	}
	
	public function paymentvisit_delete_sale()
	{
    $delete_status="Inactive";
    $login_id = $this->session->userdata('user_id_admin');
	$id= $this->input->post('delete_id');
    $cdate=date('Y-m-d H:i:s');
    $this->General_Model->paymentvisit_delete_sale($id,$delete_status,$login_id,$cdate);
    redirect('admin/payvisit_customer');
	}
	
	
	public function doorstepcollection()
	{
	 $this->load->view('doorstep');
	}
	
    public function doorstep_delete()
	{
    $delete_status="Inactive";
    $login_id = $this->session->userdata('user_id_admin');
	$id= $this->input->post('user_id2');
    $cdate=date('Y-m-d H:i:s');
    
    $this->General_Model->doorstep_delete2($id,$delete_status,$login_id,$cdate);
	}
	
	public function paymentsupport()
	{
	$this->load->view('paymentsupport');   
	}
	
	public function delete_photo_search()
	{
	$data['status'] = '1';
	$user_image_id = $this->input->post('user_image_id');
	$this->General_Model->UpdateData($table = 'tbl_userimages',$column_name = 'user_image_id',$user_image_id,$data);
	redirect('admin/profile_edit',$data);
	}
	
	public function direct_list()
	{
	  $data['page'] = "Direct Registeration List";
	  $this->load->view('direct_list',$data);   
	}
	
	public function staff_register_list()
	{
	  $data['page'] = "Staff Registeration List";
	  $this->load->view('staff_register_list',$data);   
	}
	
	public function staff_create()
	{
	   $data['page'] = "Staff Creation";
       $this->load->view('staff_create',$data);
    }
    
     public function staff_create_form() 
     {
        $user_data = array('user_name' => $this->input->post('user_name'),
        'user_address' => "SYSOL SYSTEM SOLUTIONS Pvt. Ltd",
        'user_type' => $this->input->post('user_type'),
        'emp_id' => $this->input->post('emp_id'),);
        
        $user_id = $this->General_Model->insert_user($user_data);
        
        $employee_data = array(
        'username' => $this->input->post('user_name'),
        'password' => md5($this->input->post('password')),
        'user_id' => $user_id,
        'emp_id' => $this->input->post('emp_id'),
        'usertype_id' => $this->input->post('user_type'),
        );
        
        $this->General_Model->insert_employee($employee_data);
        redirect('admin/staff_create');
    }
    
       public function bucket_list()
    	{
    	 $user_id=$this->input->post('user_id');	
    	 $login_id= $this->session->userdata('user_id_admin');
    	 $staff_id= $this->input->post('staff_id'); 
    	 $message=trim($this->input->post('message'));
    	 $cdate=date('Y-m-d H:i:s');	 
    	 $this->General_Model->Bucketchange($user_id,$login_id,$staff_id,$message,$cdate);
    	}
    	
        public function total_postponeall()
    	{
         $emp_id= $this->input->post('emp_id'); 
         $data['totalpostpone']=$this->General_Model->total_postponeall($emp_id);
         $data['page'] = "Filtered Postpone";
         $this->load->view('total_postpone2',$data);
    	}
    	
        public function search_criteria()
        {
        $this->load->view('search_criteria');
        }
        
        public function Get_States()
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
    
        public function Get_District()
        {
        $states = $this->input->post('states');
        $result = $this->General_Model->GetFullData('tbl_district','state_id',$states);
        
        if ($result != "")
        {
        $data1 = '<option value="">--Select--</option>';
        for ($i = 0; $i < count($result); $i++) 
        {
        $data = '<option value = "' . $result[$i]->district_id . '" textvalue="' . $result[$i]->district . '">' . $result[$i]->district . '</option>';
        if (empty($i)) {
        print_r($data1);
        }
        print_r($data);
        }
        }
        }
       
        public function Get_City()
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
    
         public function search_profile_common()
         {
    
            if($this->input->post('searchtype')!="")
            { 
            $Details['gender'] =!empty($this->input->post('gender'))?$this->input->post('gender'):'';
            $Details['AgeFrom'] =!empty($this->input->post('age_from'))?$this->input->post('age_from'):'';
            $Details['AgeTo'] = !empty($this->input->post('age_to'))?$this->input->post('age_to'):'';
            $Details['HeightFrom'] = !empty($this->input->post('height_from'))?$this->input->post('height_from'):'';
            $Details['HeightTo']=  !empty($this->input->post('height_to'))?$this->input->post('height_to'):'';
            $Details['highest_education']= !empty($this->input->post('highest_education'))?$this->input->post('highest_education'):'';
            $Details['country']= !empty($this->input->post('country'))?$this->input->post('country'):'';
            $Details['state']= !empty($this->input->post('state'))?$this->input->post('state'):'';
            $Details['district']= !empty($this->input->post('district'))?$this->input->post('district'):'';
            $Details['marital_status']= !empty($this->input->post('marital_status'))?$this->input->post('marital_status'):'';
            $Details['caste']= !empty($this->input->post('belief'))?$this->input->post('belief'):'';
            $Details['profile_with_photo']= !empty($this->input->post('profile_with_photo'))?$this->input->post('profile_with_photo'):'';
            $gender=$this->session->set_userdata('gender', $Details['gender']);
            $age_from=$this->session->set_userdata('age_from', $Details['AgeFrom']);
            $age_to=$this->session->set_userdata('age_to', $Details['AgeTo']);
            $height_from=$this->session->set_userdata('height_from', $Details['HeightFrom']);
            $height_to=$this->session->set_userdata('height_to', $Details['HeightTo']);
            $highest_education=$this->session->set_userdata('highest_education', $Details['highest_education']);
            $country=$this->session->set_userdata('country',$Details['country']);
            $state=$this->session->set_userdata('state',$Details['state']);
            $district=$this->session->set_userdata('district',$Details['district']);
            $marital_status=$this->session->set_userdata('marital_status',$Details['marital_status']);
            $caste=$this->session->set_userdata('belief',$Details['caste']);
            $photo=$this->session->set_userdata('profile_with_photo',$Details['profile_with_photo']); 
            $this->load->view('search_listing',$Details);
            }
        }
        
      public function search_profile_id()
      {
        if($this->input->post('searchtype') != "")
        {
            $Details['nikah_id'] = !empty($this->input->post('happy_id')) ? $this->input->post('happy_id') : '';
            $_SESSION['adv_nikah_id'] = !empty($this->input->post('happy_id')) ? $this->input->post('happy_id') : '';
    
            $this->load->view('search_listing_byid', $Details);
        }
      }
      
      public function search_profile_advance()
      {
    
          if($this->input->post('searchtype')!="")
          { 
            $Details['gender'] =!empty($this->input->post('adv_gender'))?$this->input->post('adv_gender'):'';
            $Details['AgeFrom'] =!empty($this->input->post('adv_age_from'))?$this->input->post('adv_age_from'):'';
            $Details['AgeTo'] = !empty($this->input->post('adv_age_to'))?$this->input->post('adv_age_to'):'';
            $Details['HeightFrom'] = !empty($this->input->post('adv_height_from'))?$this->input->post('adv_height_from'):'';
            $Details['HeightTo']=  !empty($this->input->post('adv_height_to'))?$this->input->post('adv_height_to'):'';
            $Details['WeightFrom'] = !empty($this->input->post('adv_weight_from'))?$this->input->post('adv_weight_from'):'';
            $Details['WeightTo']=  !empty($this->input->post('adv_weight_to'))?$this->input->post('adv_weight_to'):'';
            $Details['highest_education']= !empty($this->input->post('adv_highest_education'))?$this->input->post('adv_highest_education'):'';
            $Details['country']= !empty($this->input->post('adv_country'))?$this->input->post('adv_country'):'';
            $Details['state']= !empty($this->input->post('adv_state'))?$this->input->post('adv_state'):'';
            $Details['district']= !empty($this->input->post('adv_district'))?$this->input->post('adv_district'):'';
            $Details['city']= !empty($this->input->post('adv_city'))?$this->input->post('adv_city'):'';
            $Details['marital_status1']= !empty($this->input->post('marital_status1'))?$this->input->post('marital_status1'):'';
            $Details['bodytype']= !empty($this->input->post('bodytype'))?$this->input->post('bodytype'):'';
            $Details['skin_color']= !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'';
            $Details['financialstatus']= !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'';
            $Details['caste']= !empty($this->input->post('adv_belief'))?$this->input->post('adv_belief'):'';
            $Details['physical_status']= !empty($this->input->post('physical_status'))?$this->input->post('physical_status'):'';
            $Details['profession_type']= !empty($this->input->post('profession_type'))?$this->input->post('profession_type'):'';
            $Details['adv_profile_with_photo']= !empty($this->input->post('adv_profile_with_photo'))?$this->input->post('adv_profile_with_photo'):'';
            
            $gender=$this->session->set_userdata('adv_gender', $Details['gender']);
            $age_from=$this->session->set_userdata('adv_age_from', $Details['AgeFrom']);
            $age_to=$this->session->set_userdata('adv_age_to', $Details['AgeTo']);
            $height_from=$this->session->set_userdata('adv_height_from', $Details['HeightFrom']);
            $height_to=$this->session->set_userdata('adv_height_to', $Details['HeightTo']);
            $weight_from=$this->session->set_userdata('adv_weight_from', $Details['WeightFrom']);
            $weight_to=$this->session->set_userdata('adv_weight_to', $Details['WeightTo']);
            $highest_education=$this->session->set_userdata('adv_highest_education', $Details['highest_education']);
            $country=$this->session->set_userdata('adv_country',$Details['country']);
            $state=$this->session->set_userdata('adv_state',$Details['state']);
            $district=$this->session->set_userdata('adv_district',$Details['district']);
            $city=$this->session->set_userdata('adv_city',$Details['city']);
            $maritalstatus=$this->session->set_userdata('marital_status1',$Details['marital_status1']);
            $bodytype=$this->session->set_userdata('bodytype',$Details['bodytype']);
            $skin_color=$this->session->set_userdata('skin_color',$Details['skin_color']);
            $financialstatus=$this->session->set_userdata('financialstatus',$Details['financialstatus']);
            $physical_status=$this->session->set_userdata('physical_status',$Details['physical_status']);
            $profession_type=$this->session->set_userdata('profession_type',$Details['profession_type']);
            $caste=$this->session->set_userdata('adv_belief',$Details['caste']);
            $photo=$this->session->set_userdata('adv_profile_with_photo',$Details['adv_profile_with_photo']);
            $this->load->view('search_listing_advance',$Details);
            }
        }
      
      public function solved_profile()
      {
      $delete_status="Inactive";
      $solved_status='1';
      $emp_id = $this->session->userdata('user_id_admin');
      $sender_id= $this->input->post('user_id');
      $interest_id= $this->input->post('interest_id');
      $solveddate=date('Y-m-d H:i:s');
      $this->General_Model->solved_profile2($solved_status,$delete_status,$interest_id,$emp_id,$solveddate);
      }
    
    public function contact_viewed_search()
    {
    $data['page'] = "Viewed Contacts";
    $this->load->view('contact_viewed_search',$data);  
    }
    
    public function contact_viewed_listing()
    {
    $data['hn_id']=$this->input->post('search_profile');  
    $this->load->view('contact_viewed_listing',$data);  
    }
    
    public function refer_and_earn()
    {
    $this->load->view('refer');  
    }
    
    public function refer_and_earn_approve()
    {
        
    $reference_id = $this->input->post('reference_id');
    $goto = $this->input->post('goto');
    
    $data11 = array('status' =>'1');
    $this->db->set('status', '1');
    $this->db->where('id',$reference_id);
    $this->db->update('tbl_refer', $data11);
    
    if($goto==0)
    {
    redirect('admin/refer_and_earn');
    }
    
    if($goto==1)
    {
    redirect('admin/refer_and_earn_gotonikah');
    }
    
    if($goto==2)
    {
    redirect('admin/refer_and_earn_mangalyam');
    }
   
    }
    
    public function refer_and_earn_delete()
    {
    $reference_id = $this->input->post('reference_id');
    $goto = $this->input->post('goto');
    
    $data2 = array('status' =>'2');
    $this->db->set('status', '2');
    $this->db->where('id',$reference_id);
    $this->db->update('tbl_refer', $data2);
    
    if($goto==0)
    {
    redirect('admin/refer_and_earn');
    }
    
    if($goto==1)
    {
    redirect('admin/refer_and_earn_gotonikah');
    }
    
    if($goto==2)
    {
    redirect('admin/refer_and_earn_mangalyam');
    }
    
    }
    
    public function refer_and_earn_claim()
    {
    
    $reference_id = $this->input->post('reference_ids');
    $goto = $this->input->post('goto');
    
    $data2 = array('status' =>'4');
    $this->db->set('status', '4');
    $this->db->where_in('id',$reference_id);
    $this->db->update('tbl_refer', $data2);
  
    if($goto==0)
    {
    redirect('admin/refer_and_earn');
    }
    
    if($goto==1)
    {
    redirect('admin/refer_and_earn_gotonikah');
    }
    
    if($goto==2)
    {
    redirect('admin/refer_and_earn_mangalyam');
    }
    
    }
    
    public function Gulfdata()
    {
    $this->load->view('gulfapprovels');  
    }
    
    public function district_count_female()
    {
    $data['page'] = "District Female Count";
    $this->load->view('district_countfemale',$data);  
    }
    
    public function district_count_male()
    {
    $data['page'] = "District Male Count";
    $this->load->view('district_countmale',$data);  
    }
    
    public function get_femalecount()
    {
  
     $districts=$this->input->post('districts');   
     $data['total_female'] = $this->General_Model->get_female_count($districts);
     $data['total_rows2'] = count($data['total_female']);
     $this->load->view('female_count',$data);
    }
    
    public function get_malecount()
    {  
    $districts=$this->input->post('districts');
    $data['total_male'] = $this->General_Model->get_male_count($districts);
    $data['total_rows3'] = count($data['total_male']);
    $this->load->view('male_count',$data);
    }
    
    public function add_comments()
    {  
    $this->form_validation->set_rules('message','Message','required');
    $message  = trim($this->input->post('message'));
    $user_id  = $this->input->post('user_id');
    $cmmt_date=date('Y-m-d H:i:s'); 
    $this->General_Model->addcmment($message,$user_id,$cmmt_date);
    redirect('admin/search_profiles');
    }
    
    public function allexcel()
    {
    try 
    {
    $all = $this->General_Model->get_all_excel();
    
    if(!empty($all)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'HN ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Age');
    $sheet->setCellValue('D1', 'Gender');
    $sheet->setCellValue('E1', 'Caste');
    $sheet->setCellValue('F1', 'Reg Date');
    $sheet->setCellValue('G1', 'Maritial Status');
    $sheet->setCellValue('H1', 'Place');
    $sheet->setCellValue('I1', 'Height');
    $sheet->setCellValue('J1', 'Weight');
    $sheet->setCellValue('K1', 'District');
    $sheet->setCellValue('L1', 'Education');
    $sheet->setCellValue('M1', 'Financial Status');
    $sheet->setCellValue('N1', 'Photo Status');
    
    $cellRange = 'A1:N1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    $row = 2;
    $i = 1;
    
    foreach ($all as $item) {
    $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
    
    $sheet->setCellValue('A' . $row, $item['happynikah_id']);
    $sheet->setCellValue('B' . $row, $item['name']);
    $sheet->setCellValue('C' . $row, $item['age']);
    $sheet->setCellValue('D' . $row, $item['gender']);
    $sheet->setCellValue('E' . $row, $item['caste']);
    $sheet->setCellValue('F' . $row, $formattedDate);
    $sheet->setCellValue('G' . $row, $item['marital_status']);
    $sheet->setCellValue('H' . $row, $item['native_place']);
    $sheet->setCellValue('I' . $row, $item['height']);
    $sheet->setCellValue('J' . $row, $item['weight']);
    $sheet->setCellValue('K' . $row, $item['district']);
    $sheet->setCellValue('L' . $row, $item['education']);
    $sheet->setCellValue('M' . $row, $item['financial_status']);
    $sheet->setCellValue('N' . $row, $item['photo_status']);
    
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'total.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    else 
    {
    $response = array('success' => false, 'error' => 'No data to export');
    echo json_encode($response);
    }
    } 
    
    catch (Exception $e) 
    {
    log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
    
    $response = array('success' => false, 'error' => 'Error exporting Excel file');
    echo json_encode($response);
    }
    }

    
    public function exportToExcel()
    {
    $districts = $this->input->post('districts');
    $total_female = $this->General_Model->get_female_count($districts);
    
    if(!empty($total_female)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'Sl No');
    $sheet->setCellValue('B1', 'HN ID');
    $sheet->setCellValue('C1', 'Name');
    $sheet->setCellValue('D1', 'Reg Date');
    $sheet->setCellValue('E1', 'Place');
    
    $cellRange = 'A1:E1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    
    $row = 2;
    $i = 1;
    
    foreach ($total_female as $item) 
    {
    
    $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
    $sheet->setCellValue('A' . $row, $i++);
    $sheet->setCellValue('B' . $row, $item['happynikah_id']);
    $sheet->setCellValue('C' . $row, $item['name']);
    $sheet->setCellValue('D' . $row, $formattedDate);
    $sheet->setCellValue('E' . $row, $item['native_place']);
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'female_list.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    }
    
    else
    {
    $response = array('success' => false);
    echo "Invalid";
    }
    }


    public function exportToExcel_male()
    {
    $districts = $this->input->post('districts');
    $total_male = $this->General_Model->get_male_count($districts);
    
    if(!empty($total_male))
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'Sl No');
    $sheet->setCellValue('B1', 'HN ID');
    $sheet->setCellValue('C1', 'Name');
    $sheet->setCellValue('D1', 'Reg Date');
    $sheet->setCellValue('E1', 'Place');
    
    $cellRange = 'A1:E1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    
    $row = 2;
    $i = 1;
    
    foreach ($total_male as $item)
    {
    
    $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
    $sheet->setCellValue('A' . $row, $i++);
    $sheet->setCellValue('B' . $row, $item['happynikah_id']);
    $sheet->setCellValue('C' . $row, $item['name']);
    $sheet->setCellValue('D' . $row, $formattedDate);
    $sheet->setCellValue('E' . $row, $item['native_place']);
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'male_list.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    }
    
    else 
    {
    $response = array('success' => false);
    echo "Invalid";
    }
    }
    public function date_count_female()
    {
    $data['page'] = "Female Profile";
    $this->load->view('date_countfemale',$data);  
    }
    
    public function date_count_male()
    {
    $data['page'] = "Male Profile";
    $this->load->view('date_countmale',$data);  
    }
    
    public function get_date_female()
    {
    $from_date=$this->input->post('from_date'); 
    $to_date=$this->input->post('to_date');     
    $data['total_female_date'] = $this->General_Model->get_femaledate($from_date,$to_date);
    $data['total_rows4'] = count($data['total_female_date']);
    $this->load->view('female_date',$data);
    }
    
    
    public function get_date_male()
    {
    $from_date=$this->input->post('from_date'); 
    $to_date=$this->input->post('to_date');   
    $data['total_male_date'] = $this->General_Model->get_maledate($from_date,$to_date);
    $data['total_rows5'] = count($data['total_male_date']);
    $this->load->view('male_date',$data);
    } 

    public function exportToExcel_date()
    {
    $from_date=$this->input->post('from_date'); 
    $to_date=$this->input->post('to_date'); 
    $total_female_date=$this->General_Model->get_femaledate($from_date,$to_date);  
    
    if (!empty($total_female_date))
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Sl No');
    $sheet->setCellValue('B1', 'HN ID');
    $sheet->setCellValue('C1', 'Name');
    $sheet->setCellValue('D1', 'Reg Date');
    $sheet->setCellValue('E1', 'Place');
    
    $cellRange = 'A1:E1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    
    $row = 2;
    $i = 1;
    foreach ($total_female_date as $item) 
    {
    
    $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
    
    $sheet->setCellValue('A' . $row, $i++);
    $sheet->setCellValue('B' . $row, $item['happynikah_id']);
    $sheet->setCellValue('C' . $row, $item['name']);
    $sheet->setCellValue('D' . $row, $formattedDate);
    $sheet->setCellValue('E' . $row, $item['native_place']);
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'female_list_date.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    }
    else 
    {
    $response = array('success' => false);
    echo "Invalid";
    }
    }

    public function exportToExcel_male_date()
    {
    $from_date=$this->input->post('from_date'); 
    $to_date=$this->input->post('to_date'); 
    $total_male_date=$this->General_Model->get_maledate($from_date,$to_date);  
    
    if(!empty($total_male_date)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'Sl No');
    $sheet->setCellValue('B1', 'HN ID');
    $sheet->setCellValue('C1', 'Name');
    $sheet->setCellValue('D1', 'Reg Date');
    $sheet->setCellValue('E1', 'Place');
    
    $cellRange = 'A1:E1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    $row = 2;
    $i = 1;
    foreach ($total_male_date as $item)
    {
    
    $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
    
    $sheet->setCellValue('A' . $row, $i++);
    $sheet->setCellValue('B' . $row, $item['happynikah_id']);
    $sheet->setCellValue('C' . $row, $item['name']);
    $sheet->setCellValue('D' . $row, $formattedDate);
    $sheet->setCellValue('E' . $row, $item['native_place']);
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'male_list_date.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    else
    {
    $response = array('success' => false);
    echo "Invalid";
    }
    }
    
######################################### Go TO Nikah #####################################################

    public function dashboard_gotonikah()
    {
        
        if($_SESSION['user_type']==='0')
        {
        
        $UserID=$this->session->userdata('user_id');
        $data['all'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->get()->num_rows();
        $data['pending'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','0')->get()->num_rows();
        $data['approved'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','1')->get()->num_rows();
        $data['rejected'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','2')->get()->num_rows();
        $data['deleted'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','3')->get()->num_rows();
        $data['male'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('gender','1')->get()->num_rows();
        $data['female'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('gender','2')->get()->num_rows();
        $data['website'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','0')->get()->num_rows();
        $data['admin'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','1')->get()->num_rows();
        $data['mobile'] =$this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','2')->get()->num_rows();
        $data['daily_all'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->get()->num_rows();
        $data['daily_pending'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','0')->get()->num_rows();
        $data['daily_approved'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','1')->get()->num_rows();
        $data['daily_rejected'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','2')->get()->num_rows();
        $data['daily_deleted'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','3')->get()->num_rows();
        $data['daily_male'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('gender','1')->get()->num_rows();
        $data['daily_female'] =  $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('gender','2')->get()->num_rows();
        $data['daily_website'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','0')->get()->num_rows();
        $data['daily_admin'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','1')->get()->num_rows();
        $data['daily_mobile'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','2')->get()->num_rows();
        $this->load->view('dashboard_gotonikah_sales_super',$data);  
        }
        
        elseif($_SESSION['user_type']==='1')
        {
            
        $data['all'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->get()->num_rows();
        $data['pending'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','0')->get()->num_rows();
        $data['approved'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','1')->get()->num_rows();
        $data['rejected'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','2')->get()->num_rows();
        $data['deleted'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','3')->get()->num_rows();
        $data['male'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('gender','1')->get()->num_rows();
        $data['female'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('gender','2')->get()->num_rows();
        $data['website'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','0')->get()->num_rows();
        $data['admin'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','1')->get()->num_rows();
        $data['mobile'] =$this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','2')->get()->num_rows();
        $data['daily_all'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->get()->num_rows();
        $data['daily_pending'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','0')->get()->num_rows();
        $data['daily_approved'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','1')->get()->num_rows();
        $data['daily_rejected'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','2')->get()->num_rows();
        $data['daily_deleted'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','3')->get()->num_rows();
        $data['daily_male'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('gender','1')->get()->num_rows();
        $data['daily_female'] =  $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('gender','2')->get()->num_rows();
        $data['daily_website'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','0')->get()->num_rows();
        $data['daily_admin'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','1')->get()->num_rows();
        $data['daily_mobile'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','2')->get()->num_rows();
        
        $this->load->view('dashboardadmin',$data);
        }
        
        elseif($_SESSION['user_type']=='3')
        {
        $data['all'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->get()->num_rows();
        $data['pending'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','0')->get()->num_rows();
        $data['approved'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','1')->get()->num_rows();
        $data['rejected'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','2')->get()->num_rows();
        $data['deleted'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','3')->get()->num_rows();
        $data['male'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('gender','1')->get()->num_rows();
        $data['female'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('gender','2')->get()->num_rows();
        $data['website'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','0')->get()->num_rows();
        $data['admin'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','1')->get()->num_rows();
        $data['mobile'] =$this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','2')->get()->num_rows();
        $data['daily_all'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->get()->num_rows();
        $data['daily_pending'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','0')->get()->num_rows();
        $data['daily_approved'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','1')->get()->num_rows();
        $data['daily_rejected'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','2')->get()->num_rows();
        $data['daily_deleted'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','3')->get()->num_rows();
        $data['daily_male'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('gender','1')->get()->num_rows();
        $data['daily_female'] =  $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('gender','2')->get()->num_rows();
        $data['daily_website'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','0')->get()->num_rows();
        $data['daily_admin'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','1')->get()->num_rows();
        $data['daily_mobile'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','2')->get()->num_rows();
        $this->load->view('dashboardsales_gotonikah',$data);
        }
        
        elseif($_SESSION['user_type']=='4') 
        {
        $UserID=$this->session->userdata('user_id');
        $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','1'));
	  	$pending_all=array('status'=>'0','goto_nikah'=>'1');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$pending_all));
        $approve_all=array('status'=>'1','goto_nikah'=>'1');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$approve_all));
        $reject_all=array('status'=>'2','goto_nikah'=>'1');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$reject_all));
        $delete_all=array('status'=>'3','goto_nikah'=>'1');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$delete_all));
        $where_male = array('gender'=>'1','goto_nikah'=>'1');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'1');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'1');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'1');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'1');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
		
		$sessid= $this->session->userdata('user_id_admin');
		$wheredailyall = array('reg_date'=>date('Y-m-d'),'staff_id'=>$sessid,'status'=>'1');
		 
		$wheremonthall = array('MONTH(reg_date)'=>date('m'),'staff_id'=>$sessid,'status'=>'1');
		$data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",$wheredailyall));
		$data['month_all'] = count($this->General_Model->GetFullData1("tbl_registration",$wheremonthall));
				
	    $where1 = array('status'=>'0','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        $where10 = array('reg_through'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
        $this->load->view('dashboardcreation_gotonikah',$data);
        }
        
        elseif($_SESSION['user_type']=='5')
        {
        $data['all'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->get()->num_rows();
        $data['pending'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','0')->get()->num_rows();
        $data['approved'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','1')->get()->num_rows();
        $data['rejected'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','2')->get()->num_rows();
        $data['deleted'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('status','3')->get()->num_rows();
        $data['male'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('gender','1')->get()->num_rows();
        $data['female'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('gender','2')->get()->num_rows();
        $data['website'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','0')->get()->num_rows();
        $data['admin'] = $this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','1')->get()->num_rows();
        $data['mobile'] =$this->db->select('*')->from('tbl_registration')->where('goto_nikah','1')->where('reg_through','2')->get()->num_rows();
        $data['daily_all'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->get()->num_rows();
        $data['daily_pending'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','0')->get()->num_rows();
        $data['daily_approved'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','1')->get()->num_rows();
        $data['daily_rejected'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','2')->get()->num_rows();
        $data['daily_deleted'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('status','3')->get()->num_rows();
        $data['daily_male'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('gender','1')->get()->num_rows();
        $data['daily_female'] =  $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('gender','2')->get()->num_rows();
        $data['daily_website'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','0')->get()->num_rows();
        $data['daily_admin'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','1')->get()->num_rows();
        $data['daily_mobile'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('goto_nikah','1')->where('reg_through','2')->get()->num_rows();
        
        $this->load->view('dashboardapproval',$data);
        }
        
        
        elseif($_SESSION['user_type']==='6')
        {
        
        $UserID=$this->session->userdata('user_id');
        
        $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','1'));
        $where_pendingall = array('status'=>'0','goto_nikah'=>'1');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where_pendingall));
        $where_approveall = array('status'=>'1','goto_nikah'=>'1');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where_approveall));
        $where_rejectall = array('status'=>'2','goto_nikah'=>'1');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where_rejectall));
        $where_deleteall = array('status'=>'3','goto_nikah'=>'1');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where_deleteall));
        $where_male = array('gender'=>'1','goto_nikah'=>'1');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'1');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'1');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'1');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'1');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        $where_daily = array('goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
           
        $data['daily_all'] = count($this->General_Model->GetFullData1($table = "tbl_registration",$where_daily));
        $where1 = array('status'=>'0','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        
        $reg_date=date('Y-m-d');
        $data['daily_admin2'] =$this->db->select('*')->from('tbl_registration')->where('reg_through','1')->where('goto_nikah','1')->where('reg_date',$reg_date)->get();
        
        $where10 = array('reg_through'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
        
        $this->load->view('dashboardsupport_gotonikah',$data);  
        }
        
        elseif($_SESSION['user_type']=='7')
        {
        $this->load->view('dashboardchatsupport_gotonikah');
        }
        
        elseif($_SESSION['user_type']=='8')
        {
        $this->load->view('dashboardservice');
        }
        
        elseif($_SESSION['user_type']=='13')
        {
        
        $UserID=$this->session->userdata('user_id');
        
       
        $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','1'));
        $where_pendingall = array('status'=>'0','goto_nikah'=>'1');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where_pendingall));
        $where_approveall = array('status'=>'1','goto_nikah'=>'1');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where_approveall));
        $where_rejectall = array('status'=>'2','goto_nikah'=>'1');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where_rejectall));
        $where_deleteall = array('status'=>'3','goto_nikah'=>'1');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where_deleteall));
        $where_male = array('gender'=>'1','goto_nikah'=>'1');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'1');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'1');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'1');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'1');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        $where_daily = array('goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
           
        $data['daily_all'] = count($this->General_Model->GetFullData1($table = "tbl_registration",$where_daily));
        $where1 = array('status'=>'0','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        
        $reg_date=date('Y-m-d');
        $data['daily_admin2'] =$this->db->select('*')->from('tbl_registration')->where('reg_through','1')->where('goto_nikah','1')->where('reg_date',$reg_date)->get();
        
        $where10 = array('reg_through'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
        
        $this->load->view('dashboardsuperadmin',$data);
        }
        
        elseif($_SESSION['user_type']=='14')
        {
            
       
        $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'goto_nikah','1'));
        $where_pendingall = array('status'=>'0','goto_nikah'=>'1');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where_pendingall));
        $where_approveall = array('status'=>'1','goto_nikah'=>'1');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where_approveall));
        $where_rejectall = array('status'=>'2','goto_nikah'=>'1');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where_rejectall));
        $where_deleteall = array('status'=>'3','goto_nikah'=>'1');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where_deleteall));
        $where_male = array('gender'=>'1','goto_nikah'=>'1');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','goto_nikah'=>'1');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','goto_nikah'=>'1');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','goto_nikah'=>'1');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','goto_nikah'=>'1');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        $where_daily = array('goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
           
        $data['daily_all'] = count($this->General_Model->GetFullData1($table = "tbl_registration",$where_daily));
        $where1 = array('status'=>'0','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        
        $reg_date=date('Y-m-d');
        $data['daily_admin2'] =$this->db->select('*')->from('tbl_registration')->where('reg_through','1')->where('goto_nikah','1')->where('reg_date',$reg_date)->get();
        
        $where10 = array('reg_through'=>'2','goto_nikah'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
      
        
        $this->load->view('dashboardaccountsadmin',$data);
        }
        
        elseif($_SESSION['user_type']=='16')
        {
        $this->load->view('directdashboard');  
        }
        elseif($_SESSION['user_type']=='17')
        {
        $this->load->view('staffdashboard');  
        }
        
        else
        {
        $this->load->view('dashboard3');
        }
        }

     public function register_gotonikah($page = '')
     {
      if($page == 'Register_gotonikah')
       {
       
            $UserDetails['name'] = !empty($this->input->post('name'))?$this->input->post('name'):'NULL';
            $UserDetails['gender'] = !empty($this->input->post('gender'))?$this->input->post('gender'):'NULL';
            $UserDetails['countryCode'] =!empty($this->input->post('country_code'))?$this->input->post('country_code'):'NULL';
            $UserDetails['phone'] =!empty($this->input->post('phone'))?$this->input->post('phone'):'NULL';
            $UserDetails['source'] = !empty($this->input->post('source'))?$this->input->post('source'):'NULL';
            $UserDetails['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
            $UserDetails['dob'] = !empty($this->input->post('dob'))?$this->input->post('dob'):'NULL';
            $UserDetails['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';
            $UserDetails['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';
            $UserDetails['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';
            $UserDetails['marital_status'] = $this->input->post('marital_status');
            $UserDetails['no_of_children'] = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'NULL';
            $UserDetails['physical_status'] = $this->input->post('physically_challenged');
            $UserDetails['registration_phychallenge'] =$this->input->post('disability');
            $UserDetails['disability'] =$this->input->post('physical_status');
            $UserDetails['mother_tongue'] = !empty($this->input->post('mothertongue'))?$this->input->post('mothertongue'):'NULL';
            $UserDetails['nationality'] =$this->input->post('nationality');
            $UserDetails['religion'] = 2;
            $UserDetails['caste'] = $this->input->post('belief');
            $UserDetails['highest_education'] = $this->input->post('highest_education');
            $UserDetails['education'] = $this->input->post('education');
            $UserDetails['blood_group'] =$this->input->post('bloodgroup');
            $UserDetails['goto_nikah'] = 1;
            $UserDetails['madrassa_education'] = $this->input->post('madrassa_education');
            $UserDetails['code'] =$this->input->post('code');
            $UserDetails['financialstatus'] =$this->input->post('financialstatus');
            $UserDetails['job_category'] = $this->input->post('profession_type');
            $UserDetails['occupation'] = $this->input->post('profession');
            $UserDetails['present_country'] = $this->input->post('present_country');
            $UserDetails['home_state'] = $this->input->post('present_states');
            $UserDetails['home_district'] =$this->input->post('present_district');
            $UserDetails['home_city'] = $this->input->post('present_city');
            $UserDetails['country'] = $this->input->post('country');
            $UserDetails['home_country'] = $this->input->post('country');
            $UserDetails['photopassword'] = $this->input->post('photopassword');
            $UserDetails['photo_visibility'] = !empty($this->input->post('photo_visibility'))?$this->input->post('photo_visibility'):'0';
            $UserDetails['annual_income'] = $this->input->post('annual_income');  
            $UserDetails['state'] = $this->input->post('states');
            $UserDetails['native_district'] = $this->input->post('districts');
            $UserDetails['native_place'] = $this->input->post('native_place');
            $UserDetails['bodytype'] =$this->input->post('bodytype');
            $UserDetails['appearance'] = $this->input->post('appearance');
            $UserDetails['mail'] = $this->input->post('email');
            $UserDetails['address'] = $this->input->post('address');
            $UserDetails['secondary_code'] = !empty($this->input->post('secondary_code'))?$this->input->post('secondary_code'):'NULL';
            $UserDetails['other_contact_number'] = $this->input->post('secondary_number');
            $UserDetails['job_details'] = $this->input->post('job_details');
            $UserDetails['reg_date'] = date('Y-m-d');
            $UserDetails['verified_date'] = date('Y-m-d');
            $UserDetails['staff_id'] = $this->session->userdata('user_id_admin');
            $UserDetails['about'] = "I'm ".$UserDetails['name'].". I'm ".$UserDetails['age']." Years old";
            $UserDetails['status'] = "1";
            $UserDetails['reg_through'] = "1";
            $UserDetails['direct'] = "32";
            $UserDetails['stage']="4";
   
    
            $FamilyDetails['familytype'] = !empty($this->input->post('familytype'))?$this->input->post('familytype'):'NULL';
            $FamilyDetails['financial_status'] = !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'NULL';        
            $FamilyDetails['hometype'] = !empty($this->input->post('hometype'))?$this->input->post('hometype'):'NULL';
            $FamilyDetails['fatherdetails'] = !empty($this->input->post('fatherdetails'))?$this->input->post('fatherdetails'):'NULL';
            $FamilyDetails['fathers_occupation'] = !empty($this->input->post('fathers_occupation'))?$this->input->post('fathers_occupation'):'NULL';
            $FamilyDetails['motherdetails'] = !empty($this->input->post('motherdetails'))?$this->input->post('motherdetails'):'NULL';
            $FamilyDetails['mothers_occupation'] = !empty($this->input->post('mothers_occupation'))?$this->input->post('mothers_occupation'):'NULL';
            $FamilyDetails['total_members'] = !empty($this->input->post('total_members'))?$this->input->post('total_members'):'NULL';
            
         
            $ProfileDetails['partner_age_from'] = !empty($this->input->post('partner_age_from'))?$this->input->post('partner_age_from'):'NULL';
            $ProfileDetails['aboutme'] = $this->input->post('description');
            $ProfileDetails['partner_age_to'] = !empty($this->input->post('partner_age_to'))?$this->input->post('partner_age_to'):'NULL';
            $ProfileDetails['partner_height'] = !empty($this->input->post('partner_height_from'))?$this->input->post('partner_height_from'):'NULL';
            $ProfileDetails['partner_height_to'] = !empty($this->input->post('partner_height_to'))?$this->input->post('partner_height_to'):'NULL';
            $partner_physicalstatus = !empty($this->input->post('partner_physical_statusnew'))?$this->input->post('partner_physical_statusnew'):'';
            $ProfileDetails['partner_physicalstatus'] =!empty($partner_physicalstatus)?implode(',',$partner_physicalstatus):'0';
            $partner_maritalstatus = !empty($this->input->post('partner_marital_status'))?$this->input->post('partner_marital_status'):'';
            $ProfileDetails['partner_maritalstatus'] =!empty($partner_maritalstatus)?implode(',',$partner_maritalstatus):'0';
            $partner_mothertongue = !empty($this->input->post('partner_mother_tongue'))?$this->input->post('partner_mother_tongue'):'';
            $ProfileDetails['partner_mother_tongue'] =!empty($partner_mothertongue)?implode(',',$partner_mothertongue):'0';
            $partner_languagespoken = !empty($this->input->post('partner_language_spoken'))?$this->input->post('partner_language_spoken'):'';
            $ProfileDetails['partner_languagespoken'] =!empty($partner_languagespoken)?implode(',',$partner_languagespoken):'0';
            $partner_skincolor = !empty($this->input->post('partner_skin_color'))?$this->input->post('partner_skin_color'):'';
            $ProfileDetails['partner_skincolor'] =!empty($partner_skincolor)?implode(',',$partner_skincolor):'0';
            $partner_appearance = !empty($this->input->post('partner_appearance'))?$this->input->post('partner_appearance'):'';
            $ProfileDetails['partner_appearance'] =!empty($partner_appearance)?implode(',',$partner_appearance):'0';
            $ProfileDetails['partner_caste'] = !empty($this->input->post('partner_caste'))?$this->input->post('partner_caste'):'NULL';
            $ProfileDetails['partner_religion'] = !empty($this->input->post('partner_religion'))?$this->input->post('partner_religion'):'NULL';
            $ProfileDetails['partner_physicalstatus'] = !empty($this->input->post('partner_physically_challenged'))?$this->input->post('partner_physically_challenged'):'NULL';    
            $partner_occupation=!empty($this->input->post('partner_occupation'))?$this->input->post('partner_occupation'):'';
            $OtherDetails['partner_occupation'] = !empty($partner_occupation)?implode(',',$partner_occupation):'0';
            $ProfileDetails['partner_annualincome'] = !empty($this->input->post('partner_annualincome'))?$this->input->post('partner_annualincome'):'NULL';
            $ProfileDetails['aboutme'] = !empty($this->input->post('description'))?$this->input->post('description'):'NULL';
            $ProfileDetails['partner_country'] = !empty($this->input->post('partner_country'))?$this->input->post('partner_country'):'NULL';
            
            $ProfileDetails['partner_state'] = !empty($this->input->post('partner_state'))?$this->input->post('partner_state'):'NULL';
            $partner_district= !empty($this->input->post('partner_district'))?$this->input->post('partner_district'):'';
            $ProfileDetails['partner_district'] =!empty($partner_district)?implode(',',$partner_district):'0';
            
            $OtherDetails['partner_nationality'] = !empty($this->input->post('partner_nationality'))?$this->input->post('partner_nationality'):'NULL';
            $ProfileDetails['demands'] = !empty($this->input->post('partner_expectation'))?$this->input->post('partner_expectation'):'NULL';   
            
            $partner_education = !empty($this->input->post('partner_education'))?$this->input->post('partner_education'):'';
            $ProfileDetails['partner_education'] = !empty($partner_education)?implode(',',$partner_education):'NULL';
            $ProfileDetails['partner_financial'] = !empty($this->input->post('partnerfinancialstatus'))?$this->input->post('partnerfinancialstatus'):'NULL';
         
    
            $partner_profession = !empty($this->input->post('partner_occupation'))?$this->input->post('partner_occupation'):'NULL';
             $ProfileDetails['partner_occupation']= !empty($partner_profession)?implode(',',$partner_profession):'NULL';
    
            $partner_district2= !empty($this->input->post('district_preference'))?$this->input->post('district_preference'):'NULL';
            $PartnerDetails['partner_district'] =!empty($partner_district2)?implode(',',$partner_district2):'NULL';
    
            if($this->session->userdata('user_id'))
            $UserID = $this->session->userdata('user_id');
            else
            $UserID="";
                    
            if(!empty($UserID))
            {
            $_SESSION['name'] = $BasicDetails['name'];
            $_SESSION['phone'] = $BasicDetails['phone'];
            $_SESSION['age'] = $BasicDetails['age'];
            $exist = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);
            }
           
            $submit_value = $this->input->post('submit');
            if($submit_value == 'Save User Details')
            {
              $checkexist = $this->db->select('*')->from('tbl_registration')->where('phone',$UserDetails['phone'])
              ->where('status !=','3')->get()->num_rows();
               if($checkexist == 0)
               {
    
                 $_SESSION['name'] = $UserDetails['name'];
                 $_SESSION['phone'] = $UserDetails['phone'];
                 $_SESSION['age'] = $UserDetails['age'];
                
                 $UserID = $this->General_Model->AddRecord('tbl_registration', $UserDetails);
                 $_SESSION['user_id'] =$UserID;
                
                    $FamilyDetails['user_id'] = !empty($UserID)?$UserID:'NULL';
                    $ProfileDetails['user_id'] = !empty($UserID)?$UserID:'NULL';
                    $this->General_Model->AddRecord('tbl_familyprofile', $FamilyDetails);
                    $this->General_Model->AddRecord('tbl_otherdetails', $ProfileDetails);
                    
    
                 $string="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
                 $password=substr(str_shuffle($string),0,8);  
                 
                 $PartnerDetails['user_id'] = $UserID;
                 $empsess_id=$this->session->userdata('user_id_admin');
                 $loginDetails['password']=md5($password);
                 $loginDetails['user_id'] = $UserID;
                
                 $loginDetails['date'] = date('Y-m-d');
                 $loginDetails['emp_id'] = $empsess_id;
                 $loginDetails['username'] = $UserDetails['phone'];
                 $loginDetails['originalpass'] = $password;  
                 $happynikah_id = $this->General_Model->fetch_hnID($UserID)['happynikah_id'];
                 $this->General_Model->AddRecord('tbl_userlogin',$loginDetails);
                 
                 
                  if($UserDetails['countryCode'] == '91')
                    {
                    $countryCode = $UserDetails['countryCode'];
                    }
                    else
                    {
                    $countryCode = "+".$UserDetails['countryCode'];
                    }
                    
                    $mobilenumber = $countryCode.$UserDetails['phone'];
           
                $name=$UserDetails['name'];
            
                       
            $msg="UserID:$happynikah_id%20Password:$password";
           
          $this->smsotp($msg,$mobilenumber,$name);
              
            }
            else
            {   
            $UserDetails['name'] = !empty($this->input->post('name'))?$this->input->post('name'):'NULL';
            $UserDetails['gender'] = !empty($this->input->post('gender'))?$this->input->post('gender'):'NULL';
            $UserDetails['countryCode'] =!empty($this->input->post('country_code'))?$this->input->post('country_code'):'NULL';
            $UserDetails['phone'] =!empty($this->input->post('phone'))?$this->input->post('phone'):'NULL';
            $UserDetails['source'] = !empty($this->input->post('source'))?
            $this->input->post('source'):'NULL';
            $UserDetails['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
            $UserDetails['dob'] = !empty($this->input->post('dob'))?$this->input->post('dob'):'NULL';
            $UserDetails['height'] = !empty($this->input->post('height'))?
            $this->input->post('height'):'NULL';
            $UserDetails['weight'] = !empty($this->input->post('weight'))?
            $this->input->post('weight'):'NULL';
            $UserDetails['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';
            $UserDetails['marital_status'] = $this->input->post('marital_status');
            $UserDetails['no_of_children'] = !empty($this->input->post('no_of_children'))?$this->input->post('no_of_children'):'NULL';
            $UserDetails['physical_status'] = $this->input->post('physically_challenged');
            $UserDetails['registration_phychallenge'] =$this->input->post('disability');
            $UserDetails['disability'] =$this->input->post('physical_status');
            $UserDetails['mother_tongue'] = !empty($this->input->post('mothertongue'))?$this->input->post('mothertongue'):'NULL';
            $UserDetails['nationality'] =$this->input->post('nationality');
            $UserDetails['religion'] = 2;
            $UserDetails['caste'] = $this->input->post('belief');
            $UserDetails['photo_visibility'] = $this->input->post('photo_visibility');
            $UserDetails['highest_education'] = $this->input->post('highest_education');
            $UserDetails['education'] = $this->input->post('education');
            $UserDetails['job_category'] = $this->input->post('profession_type');
            $UserDetails['occupation'] = $this->input->post('profession');
            $UserDetails['present_country'] = $this->input->post('present_country');
            $UserDetails['present_state'] = $this->input->post('present_states');
            $UserDetails['present_district'] =$this->input->post('present_district');
            $UserDetails['present_city'] = $this->input->post('present_city');
            $UserDetails['country'] = $this->input->post('country');
            $UserDetails['state'] = $this->input->post('states');
            $UserDetails['native_district'] = $this->input->post('districts');
            $UserDetails['native_place'] = $this->input->post('native_place');
            $UserDetails['bodytype'] =$this->input->post('bodytype');
            $UserDetails['appearance'] = $this->input->post('appearance');
            $UserDetails['mail'] = $this->input->post('email');
            $UserDetails['address'] = $this->input->post('address');
            $UserDetails['secondary_code'] = $this->input->post('secondary_code');
            $UserDetails['other_contact_number'] = $this->input->post('secondary_number');
            $ProfileDetails['aboutme'] = $this->input->post('description');
            $UserDetails['home_country'] = $this->input->post('country');
            $UserDetails['reg_date'] = date('Y-m-d');
            $UserDetails['verified_date'] = date('Y-m-d');
            $UserDetails['staff_id'] = $this->session->userdata('user_id_admin');
            $UserDetails['about'] = "I'm ".$UserDetails['name'].". I'm ".$UserDetails['age']." Years old";
            $UserDetails['status'] = "1";
            $UserDetails['stage'] = "4";
            $UserDetails['reg_through'] = "1";
            $UserDetails['blood_group'] = $this->input->post('bloodgroup');
            $UserDetails['job_details'] = $this->input->post('job_details');
    
            $config['upload_path'] = '../../assets/photo_storage/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '*';
            $config['max_width'] = '*';
            $config['max_height'] = '*';
            
            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload('photo')) 
            {
            $error = $this->upload->display_errors();
            }
            else
            {
            $filename = $this->upload->data();
            $UserDetails['photo']= $filename['file_name'];
            
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,
            $UserDetails);
            
            $this->session->set_flashdata('existing',$UserDetails['phone'].'is already registered!');
            redirect('admin/register_gotonikah');    
                
            }
            }            
    
           }
            else
            {
    
            $UserID = $this->input->post('userid');
            
            $UserDetails_update['name'] = !empty($this->input->post('name'))?$this->input->post('name'):'NULL';
            $UserDetails_update['gender'] = !empty($this->input->post('gender'))?$this->input->post('gender'):'NULL';
            $UserDetails_update['countryCode'] =!empty($this->input->post('country_code'))?$this->input->post('country_code'):'NULL';
            $UserDetails_update['phone'] =!empty($this->input->post('phone'))?$this->input->post('phone'):'NULL';
            $UserDetails_update['source'] = !empty($this->input->post('source'))?$this->input->post('source'):'NULL';
            $UserDetails_update['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
            $UserDetails_update['dob'] = !empty($this->input->post('dob'))?$this->input->post('dob'):'NULL';
            $UserDetails_update['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';
            $UserDetails_update['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';
            $UserDetails_update['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';
            $UserDetails_update['marital_status'] = $this->input->post('marital_status');
            $UserDetails_update['no_of_children'] = $this->input->post('no_of_children');
            $UserDetails_update['physical_status'] = $this->input->post('physically_challenged');
            $UserDetails_update['registration_phychallenge'] =$this->input->post('disability');
            $UserDetails_update['disability'] =$this->input->post('physical_status');
            $UserDetails_update['mother_tongue'] =$this->input->post('mothertongue');
            $UserDetails_update['nationality'] =$this->input->post('nationality');
            $UserDetails_update['religion'] = 2;
            $UserDetails_update['caste'] = $this->input->post('belief');
            $UserDetails_update['highest_education'] = $this->input->post('highest_education');
            $UserDetails_update['education'] = $this->input->post('education');
            $UserDetails_update['blood_group'] =$this->input->post('bloodgroup');
            $UserDetails_update['madrassa_education'] = $this->input->post('madrassa_education');
            $UserDetails_update['code'] =$this->input->post('code');
            $UserDetails_update['financialstatus'] =$this->input->post('financialstatus');
            $UserDetails_update['job_category'] = $this->input->post('profession_type');
            $UserDetails_update['occupation'] = $this->input->post('profession');
            $UserDetails_update['present_country'] = $this->input->post('present_country');
            $UserDetails_update['home_state'] = $this->input->post('present_states');
            $UserDetails_update['home_district'] =$this->input->post('present_district');
            $UserDetails_update['home_city'] = $this->input->post('present_city');
            $UserDetails_update['country'] = $this->input->post('country');
            $UserDetails_update['home_country'] = $this->input->post('country');
            $UserDetails_update['photopassword'] = $this->input->post('photopassword');
            $UserDetails_update['photo_visibility'] = !empty($this->input->post('photo_visibility'))?$this->input->post('photo_visibility'):'0';
            $UserDetails_update['annual_income'] = $this->input->post('annual_income');  
            $UserDetails_update['state'] = $this->input->post('states');
            $UserDetails_update['native_district'] = $this->input->post('districts');
            $UserDetails_update['native_place'] = $this->input->post('native_place');
            $UserDetails_update['bodytype'] =$this->input->post('bodytype');
            $UserDetails_update['appearance'] = $this->input->post('appearance');
            $UserDetails_update['mail'] = $this->input->post('email');
            $UserDetails_update['address'] = $this->input->post('address');
            $UserDetails_update['secondary_code'] = !empty($this->input->post('secondary_code'))?$this->input->post('secondary_code'):'NULL';
            $UserDetails_update['other_contact_number'] = $this->input->post('secondary_number');
            $UserDetails_update['job_details'] = $this->input->post('job_details');
            $UserDetails_update['edit_admin_date'] = date('Y-m-d H:i:s');
            $UserDetails_update['emp_id'] = $this->session->userdata('user_id_admin');
            $UserDetails_update['about'] = "I'm ".$UserDetails['name'].". I'm ".$UserDetails['age']." Years old";
    
            
            $PartnerDetails['partner_country'] = !empty($this->input->post('partner_country'))?$this->input->post('partner_country'):'NULL';
            $PartnerDetails['partner_state'] = !empty($this->input->post('partner_state'))?$this->input->post('partner_state'):'NULL';
            
            $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$UserDetails_update);
            
            $this->General_Model->UpdateData($table = 'tbl_otherdetails',$column_name = 'user_id',$UserID,$ProfileDetails);
            
            $this->General_Model->UpdateData($table = 'tbl_familyprofile',$column_name = 'user_id',$UserID,$FamilyDetails);
            
            
            $checkexistfam = $this->db->select('*')->from('tbl_familyprofile')->where('user_id',
            $UserID)->get()->num_rows();
            
            if($checkexistfam == 0)
            {
            
            $FamilyDetails['user_id'] = $UserID;
            $this->General_Model->AddRecord('tbl_familyprofile', $FamilyDetails);
            }
            else
            {
            
            $this->General_Model->UpdateData($table = 'tbl_familyprofile',$column_name = 'user_id',
            $UserID,$FamilyDetails);
            }
            
            }
            
            if($UserID != "") 
            {
            $this->session->set_flashdata('added','Data!');
            redirect('admin/register_gotonikah');
            }
            else
            {
            $this->session->set_flashdata('error','Data!');
            redirect('admin/register_gotonikah');
            }
            
            }   
            else
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
                $data['states'] = $this->General_Model->GetFullData($table = "tbl_states");
                $data['madrassa_education'] = $this->General_Model->GetFullData($table = "tbl_madrassa_education");
                $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");
                $data['professiontype'] = $this->General_Model->GetFullData($table = "tbl_professiontype");
                $data['profession'] = $this->General_Model->GetFullData($table = "tbl_profession");
                $data['income'] = $this->General_Model->GetFullData($table = "tbl_professional_income");
                $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");
                $data['contacttype'] = $this->General_Model->GetFullData($table = "tbl_contacttype");
                $data['familytype'] = $this->General_Model->GetFullData($table = "tbl_familytype");
                $data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus");
                $data['hometype'] = $this->General_Model->GetFullData($table = "tbl_hometype");
                $data['maritalstatus'] = $this->General_Model->GetFullData($table = "tbl_maritalstatus");
                $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");
                $data['secondary_code'] = $this->General_Model->GetFullData($table = "tbl_countrycode");
                $data['countryCode'] = $this->General_Model->GetFullData($table = "tbl_countrycode");
             
                $this->load->view('register_gotonikah',$data);  
             }
          }

        public function users_gotonikah($status = '')
        {
            
        if($status == '0')
        {
        $data['page'] = "Total Pending Calls";
        $data['users'] = $this->General_Model->GetFullData_goto('tbl_registration','status','0');
        }
        
        if($status == '1')
        {
        $data['page'] = "Approved Profiles";
        $data['users'] = $this->General_Model->GetFullData_goto('tbl_registration','status','1');
        }
        
        if($status == '2')
        {
        $data['page'] = "Rejected Calls";
        }
        
        if($status == '3')
        {
        $data['page'] = "Deleted Profiles";
        $data['users'] = $this->General_Model->GetFullData_goto('tbl_registration','status','3');
        }
        
        if($status == 'profile_approval')
        {
        $data['page'] = "Profile Approvals";
        $data['users'] = $this->General_Model->GetPendingcalls_gotonikah();
        }
        
        if($status == 'quick_calls')
        {
        $data['page'] = "Quick Calls";
        $data['users'] = $this->General_Model->GetQuickcalls_gotonikah();
        }
    
        $data['status'] = $status;
        $this->load->view('users_gotonikah',$data);  
        }

    
        public function quickregister_gotonikah()
        {
        $data['page'] = "Quick Register";
        $data['register'] = $this->General_Model->GetQuickregister_goto();
        $this->load->view('quick_register_gotonikah',$data);
       
        }
    
         public function stagethree_gotonikah()
        {
        $data['page'] = "Stage Three";
        $data['register'] = $this->General_Model->Getstage3_goto();
        $this->load->view('stage_three_gotonikah',$data);
        }
    
        public function photoapprove_gotonikah()
        {
    
        $data['photo'] = $this->General_Model->unapprovephoto_gotonikah();
        $this->load->view('photoapprove_gotonikah',$data);
    
        }
        
         public function assign_approve_calls_gotonikah()
        {    
        $data['page'] = "Assign Approve Calls";
        $data['isHRDepartment'] = true;
        $data['isITDepartment'] = true;
        $this->load->view('assign_approve_calls_gotonikah',$data);
        }

         public function assign_target_gotonikah()
        {
        $data['page'] = "Target Assign";
        $this->load->view('assign_target_gotonikah',$data);
        }

        public function assign_target_form_gotonikah()
        {
            
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            
        $data = array(
        'user_id' => $this->input->post('user_id'),
        'target_amount' => $this->input->post('target_amount'),
        'date'=>date('Y-m-d'),
         'status'=>'1',
        );
        
        if (!$this->isDataDuplicate_gotonikah($data)) 
        {
        $this->insertDataToDatabase_gotonikah($data);
        
        redirect('admin/assign_target_gotonikah');
        }
        
        else 
        {
        redirect('admin/assign_target_gotonikah');
        }
        } 
        
        else 
        {
        
        redirect('admin/assign_target_gotonikah');
        }
        
        }
    
        private function isDataDuplicate_gotonikah($data)
        {
        return $this->General_Model->isDataDuplicate_gotonikah($data);
        }
        
        private function insertDataToDatabase_gotonikah($data)
        {
        $this->General_Model->insertData_gotonikah($data);
        }

        public function getFilter_assign_approvecallsData_gotonikah()
        {
        $postData = $this->input->post();
        $data = $this->General_Model->getUsers_gotonikah($postData);
        
        if (is_array($data)) 
        {
        echo json_encode($data);
        } 
        else 
        {
        
        echo json_encode(array('data' => []));
        }
        }

        public function tdycreation_gotonikah()
        {
        $data['page'] = "Today's Creation";
        $data['todaycreation'] = $this->General_Model->Gettdycreation_goto();
        $this->load->view('todaycreation_gotonikah',$data);
        }
        
        public function totalcreation_gotonikah()
        {
        $data['page'] = "Total Creation";
        $data['totalcreation'] = $this->General_Model->Gettotalcreation_goto();
        $this->load->view('totalcreation_gotonikah',$data);
        }
    
        public function approvecalls_gotonikah()
        {
        $this->load->view('approvecalls_gotonikah');
        }
        
        public function activecalls_gotonikah()
        {
        
        $limit = 20;
        $offset = 0;
        $data['results'] = $this->General_Model->fetchData($limit,$offset);
        
        $this->load->view('activecalls_gotonikah', $data);
        }
    
        public function todayfollowup_gotonikah()
        {
        
        $search_profile = $this->input->post('search_profile');
        
        if($search_profile != "")
        {
        $data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
        
        }
        
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
        
        $this->load->view('todayfollowup_gotonikah',$data);
        } 
    
        public function pendingfollowup_gotonikah()
        {
        
        $search_profile = $this->input->post('search_profile');
        
        if($search_profile != "")
        {
        $data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
        
        }
        
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
        
        $this->load->view('pendingfollowup_gotonikah',$data);
        }  

        public function calllogs_gotonikah()
        {
        $this->load->view('calllogs_gotonikah');
        }
        
        public function todaypostpone_gotonikah()
        {
        $this->load->view('todaypostpone_gotonikah');
        }
        
        public function update_logs_gotonikah()
        {
        $data['page'] = "Pending Profile Update";
        $update_id =$this->input->post('update_id');
        $update_by=$this->input->post('update_by');
        $update_date=date('Y-m-d H:i:s');
        $data2 = array('update_data' =>'2','update_date'=>$update_date,'update_by'=>$update_by);
        $this->db->set('update_data', '2');
        $this->db->set('update_date', $data2['update_date']);
        $this->db->set('update_by', $data2['update_by']);
        $this->db->where('id',$update_id);
        $this->db->update('tbl_registration', $data2);
        
        $this->load->view('update_logs_gotonikah',$data);
        }
    
        public function otherstate_gotonikah()
        {
        $data['page'] = "Other State";
        $data['register'] = $this->General_Model->Getotherstate_gotonikah();
        $this->load->view('other_state_gotonikah',$data);
        }
        
        public function refer_and_earn_gotonikah()
        {
        $this->load->view('refer_gotonikah');  
        }
        
         public function multiple_contacts_gotonikah()
        {
        $data['page'] = "Customer Viewed Count";
        $this->load->view('multiple_contacts_form_gotonikah', $data);
        }
	
	    public function multiple_contacts_form_gotonikah()
        {
      
        $selected_date = $this->input->post('selected_date');
        if (!empty($selected_date)) 
        {
        $selected_date_formatted = date('Y-m-d H:i:s', strtotime($selected_date));
        $data['records'] = $this->General_Model->getmultiple_contacts($selected_date_formatted);
        $data['counts'] = $this->General_Model->getSenderCounts_gotonikah($selected_date_formatted);
        $data['selected_date'] = $selected_date_formatted; 
        } 
        
        else
        {
        $data['records'] = [];
        $data['counts'] = [];
        $data['selected_date'] = ''; 
        }

        $this->load->view('multiple_contacts_gotonikah', $data);
        }

        public function update_logs_delete_gotonikah()
        {
        
        $data['page'] = "Pending Profile Update";
        $update_id =$this->input->post('update_id');
        $data2 = array('status' =>'3');
        $this->db->set('status', '3');
        $this->db->where('id',$update_id);
        $this->db->update('tbl_registration', $data2);
        
        $this->load->view('update_logs_gotonikah',$data);
        }
        
        
        public function filterpaymentcreation_gotonikah()
        {
        
        $data['page'] = "Filtered Data";
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $selected_category=$this->input->post('selected_category');
        $selected_status=$this->input->post('selected_status');
        
       
        $data['result'] = $this->General_Model->getDataBetweenDates_gotonikah($start_date,$end_date,
        $selected_category,$selected_status);
        $data['filteredtotal'] = $this->General_Model->getDataBetweenDatescount_gotonikah($start_date, 
        $end_date,$selected_category,$selected_status);
        
        $this->load->view('totalpaymentcreation2_gotonikah', $data);
        }
        
        public function stafffilterData_gotonikah()
        {
        $selectedCategory = $this->input->post('selected_category');
        $data['filteredData'] = $this->General_Model->getstaffFilteredData_gotonikah($selectedCategory);
        $data['page'] = "Total Filter Data";
        $this->load->view('filtered_staff_data_view_gotonikah', $data);
        }
        
        public function today_staff_filter_gotonikah()
        {
        $selectedCategory = $this->input->post('selected_category');
        $selected_status =$this->input->post('selected_status');
        $data['filteredData'] = $this->General_Model->getstaffFilteredDatatoday_gotonikah($selectedCategory,$selected_status);
        $data['filteredtotal'] = $this->General_Model->getstaffFilteredDatatodayamount_gotonikah($selectedCategory,$selected_status);
        
        $data['page'] = "Today Filtered Data";
        $this->load->view('today_filtered_staff_data_view_gotonikah', $data);
        }
        
        public function filterDatatoday_gotonikah()
        {
            
        $selectedCategory = $this->input->post('selected_category');
        $data['filteredData'] = $this->General_Model->getFilteredDatatoday_gotonikah($selectedCategory);
        $data['filteredtotal'] = $this->General_Model->getstaffFilteredDatatodayamount_status_gotonikah($selectedCategory);
        
        $data['page'] = "Today Filter Data";
        $this->load->view('filtered_data__today_view_gotonikah', $data);
        }
        
        public function contact_viewed_search_gotonikah()
        {
        $data['page'] = "Viewed Contacts";
        $this->load->view('contact_viewed_search_gotonikah',$data);  
        }
        
        public function contact_viewed_listing_gotonikah()
        {
        $data['hn_id']=$this->input->post('search_profile');  
        $this->load->view('contact_viewed_listing_gotonikah',$data);  
        }
        
        public function Gulfdata_gotonikah()
        {
        $this->load->view('gulfapprovels_gotonikah');  
        }
        
        public function district_count_female_gotonikah()
        {
        $data['page'] = "District Female Count";
        $this->load->view('district_countfemale_gotonikah',$data);  
        }

        public function district_count_male_gotonikah()
        {
        $data['page'] = "District Male Count";
        $this->load->view('district_countmale_gotonikah',$data);  
        }
        
        public function assign_approve_calls_form_gotonikah()
        {
        
        $user_id = $this->input->post('user_id'); 
        $assign_id = $this->input->post('assign_id');
        $checkboxValues = $this->input->post('action_check');
        $cdate = date('Y-m-d');
        $status="1";
        
        if(is_array($checkboxValues) && count($checkboxValues) > 0) 
        {
        foreach ($checkboxValues as $value) 
        {
        $data = array('action_check' => $value,
        'user_id' => $user_id,
        'assign_id'=>$assign_id,
        'date'=>$cdate,
        'goto_status'=>$status);
        
        $data5[] = array(
        'action_check' => $value,
        'user_id' => $user_id,
        'assign_id'=>$assign_id,
        'date'=>$cdate,
        'goto_status'=>$status);
        
        $this->db->update_batch('tbl_assign_approve_calls', $data5, 'action_check');
        $this->db->delete('tbl_assign_approve_calls', array('action_check' =>$value));
        
        if(!$this->db->insert('tbl_assign_approve_calls', $data)) 
        {
        
        $error = $this->db->error();
        log_message('error', 'Error inserting data: ' . $error['message']);
        }
        
        $data2[] = array(
        'id' => $value,
        // 'assign_status' => 'Inactive'
        'direct'=>$assign_id
        );
        }
        
        if (!$this->db->update_batch('tbl_registration', $data2, 'id')) 
        {
        
        $error = $this->db->error();
        log_message('error', 'Error updating data: ' . $error['message']);
        }
        }
        return redirect('admin/assign_approve_calls_gotonikah');
        }
        
        public function get_femalecount_gotonikah()
        {
        $districts=$this->input->post('districts');   
        $data['total_female1'] = $this->General_Model->get_female_count_gotonikah($districts);
        $data['total_rows6'] = count($data['total_female1']);
        $this->load->view('female_count_gotonikah',$data);
        }
        
        public function get_malecount_gotonikah()
        {  
        $districts=$this->input->post('districts');
        $data['total_male1'] = $this->General_Model->get_male_count_gotonikah($districts);
        $data['total_rows7'] = count($data['total_male1']);
        $this->load->view('male_count_gotonikah',$data);
        }
        
        public function filterData_gotonikah()
        {
        $selectedCategory = $this->input->post('selected_category');
        
        $data['filteredData'] = $this->General_Model->getFilteredData_gotonikah($selectedCategory);
        $data['page'] = "Total Filter Data";
        
        $this->load->view('filtered_data_view_gotonikah', $data);
        }
    
        public function exportToExcel_gotonikah()
        {
        
        $districts = $this->input->post('districts');
        $total_female1 = $this->General_Model->get_female_count_gotonikah($districts);
        
        
        if(!empty($total_female1))
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Sl No');
        $sheet->setCellValue('B1', 'GN ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Reg Date');
        $sheet->setCellValue('E1', 'Place');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach ($total_female1 as $item) 
        {
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        $sheet->setCellValue('A' . $row, $i++);
        $sheet->setCellValue('B' . $row, $item['happynikah_id']);
        $sheet->setCellValue('C' . $row, $item['name']);
        $sheet->setCellValue('D' . $row, $formattedDate);
        $sheet->setCellValue('E' . $row, $item['native_place']);
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'female_list_goto.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        }
        else 
        {
        $response = array('success' => false);
        echo "Invalid";
        }
        }
  
        public function paymentvisit_goto_delete()
        {
        $delete_status="Inactive";
        $login_id = $this->session->userdata('user_id_admin');
        $id= $this->input->post('delete_id');
        $cdate=date('Y-m-d H:i:s');
        $this->General_Model->paymentvisit_delete2($id,$delete_status,$login_id,$cdate);
        redirect('admin/paymentvisitcount_gotonikah');
        }
        
        public function doorstepcollection_gotonikah()
        {
        $this->load->view('doorstep_gotonikah');
        }
        
        public function total_postponeall_gotonikah()
        {
        $emp_id= $this->input->post('emp_id'); 
        $data['totalpostpone']=$this->General_Model->total_postponeall_gotonikah($emp_id);
        $data['page'] = "Filtered Postpone";
        $this->load->view('total_postpone2_gotonikah',$data);
        }

        public function exportToExcel_malegotonikah()
        {
        $districts = $this->input->post('districts');
        $total_male1 = $this->General_Model->get_male_count_gotonikah($districts);
        
        if(!empty($total_male1))
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Sl No');
        $sheet->setCellValue('B1', 'GN ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Reg Date');
        $sheet->setCellValue('E1', 'Place');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach ($total_male1 as $item) 
        {
        
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        
        $sheet->setCellValue('A' . $row, $i++);
        $sheet->setCellValue('B' . $row, $item['happynikah_id']);
        $sheet->setCellValue('C' . $row, $item['name']);
        $sheet->setCellValue('D' . $row, $formattedDate);
        $sheet->setCellValue('E' . $row, $item['native_place']);
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'male_list_goto.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        }
        else 
        {
        $response = array('success' => false);
        echo "Invalid";
        }
        }
        
        
        
        
        public function otherstate_excel_gotonikah()
        {
        try 
        {
        $all = $this->General_Model->Getotherstate_gotonikah();
        
        if(!empty($all)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'GN ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Reg Date');
        $sheet->setCellValue('D1', 'Mobile');
        // $sheet->setCellValue('E1', 'District');
        
        $cellRange = 'A1:D1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach($all as $item) 
        {
        $formattedDate = date('d-m-Y', strtotime($item->reg_date));
        
        $sheet->setCellValue('A' . $row, $item->happynikah_id);
        $sheet->setCellValue('B' . $row, $item->name);
        $sheet->setCellValue('C' . $row, $formattedDate);
        $sheet->setCellValue('D' . $row, $item->phone);
        // $sheet->setCellValue('E' . $row, $item->district); 
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'otherstate.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false, 'error' => 'No data to export');
        echo json_encode($response);
        }
        } 
        
        catch (Exception $e) 
        {
        log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
        
        $response = array('success' => false, 'error' => 'Error exporting Excel file');
        echo json_encode($response);
        }
        }
    
        
        
        public function total_calls_gotonikah()
        {    
        $data['page'] = "Total Calls";
        $this->load->view('total_calls_gotonikah',$data);
        }
        
        
        public function total_postpone_gotonikah()
        {    
        $data['page'] = "Total Postpone";
        $data['que']=$this->General_Model->total_postponealldata_gotonikah();
        $this->load->view('total_postpone_gotonikah',$data);
        }
        
        public function profile_deleted_all_gotonikah()
        {    
        $data['page'] = "Profile Deleted";
        $this->load->view('profile_deleted_all_gotonikah',$data);
        }
        
        public function assign_active_calls_gotonikah()
        {    
        $data['page'] = "Assign Active Calls";
        $this->load->view('assign_active_calls_gotonikah',$data);
        }
        
        public function profilephoto_unavailable_gotonikah()
        {    
        $data['page'] = "Profile Photo Unavailable";
        $this->load->view('profilephoto_unavailable_gotonikah',$data);
        }
        
        public function totalpaymentcreation_gotonikah()
        {
        $data['page'] = "Total Sale";
        $data['totalcreation'] = $this->General_Model->Gettotalpaymentcreation_gotonikah();
        $this->load->view('totalpaymentcreation_gotonikah',$data);
        }
        
        public function tdypaymentcreation_gotonikah()
        {
        $data['page'] = "Today's Sale";
        $data['todaycreation'] = $this->General_Model->Gettdypaymentcreation_gotonikah();
        $this->load->view('todaypaymentcreation_gotonikah',$data);
        }
        
        public function paymentdetails_gotonikah()
        {
        $data['page'] = "Payment Details";
        $this->load->view('paymentdetails_gotonikah',$data);
        }
        
        public function expirycalls_gotonikah()
        {
        $this->load->view('expirycalls_gotonikah');
        }
        
        public function getCustomerData_gotonikah() 
        {
        $customerId = $this->input->post('customer_id');
        $fromDate = $this->input->post('from_date');
        $toDate = $this->input->post('to_date');
        
        $data['customer_data'] = $this->General_Model->getCustomerData_gotonikah($customerId, $fromDate, $toDate);
        $data['total_rows'] = count($data['customer_data']);
        
        $date_ymd = date('Y-m-d', strtotime($fromDate));
        $date_ymd2 = date('Y-m-d', strtotime($toDate));
        
        $data['customer_data2'] = $this->General_Model->getCustomer2Data_gotonikah($customerId, $fromDate, $toDate);
        $data['total_rows2'] = count($data['customer_data2']);
        
        $data['customer_data3'] = $this->General_Model->getCustomer3Data_gotonikah($customerId, $fromDate, $toDate);
        $data['total_rows3'] = count($data['customer_data3']);
        
        $data['customer_data4'] = $this->General_Model->getCustomer4Data_gotonikah($customerId, $fromDate, $toDate);
        $data['total_rows4'] = count($data['customer_data4']);
        
        $data['customer_data5'] = $this->General_Model->getCustomer5Data_gotonikah($customerId, $fromDate, $toDate);
        $data['total_rows5'] = count($data['customer_data5']);
        
        $data['customer_data6'] = $this->General_Model->getCustomer6Data_gotonikah($customerId, $fromDate, $toDate);
        $data['total_rows6'] = count($data['customer_data6']);
        
        $data['total_amount'] = $this->General_Model->getTotalAmount_gotonikah($customerId, $fromDate, $toDate);
        
        $data['total_list'] = $this->General_Model->getTotalFollowupList_gotonikah($customerId,$fromDate, $toDate);
        
        $date_ymd_his=date('Y-m-d H:i:s', strtotime($fromDate));   
        $date_ymd_his2=date('Y-m-d H:i:s', strtotime($toDate));
        $data['total_list2'] = $this->General_Model->getTotalDeleteList_gotonikah($customerId,$date_ymd_his,$date_ymd_his2);
        
        $this->load->view('customer_data_view_gotonikah', $data);
        }
        
        public function paymentvisitcount_gotonikah()
        {
        $this->load->view('paymentvisitcount_gotonikah');
        }
        
        public function reportid_gotonikah()
        {
        $this->load->view('reportid_gotonikah');
        }
        
        public function profile_approve_all_gotonikah()
        {    
        $data['page'] = "Profile Approved";
        $this->load->view('profile_approved_all_gotonikah',$data);
        }
        
        public function lastlogin_gotonikah()
        {
        $this->load->view('lastlogin_gotonikah');
        }
        
	
        public function date_count_female_goto()
        {
        $data['page'] = "Female Profile";
        $this->load->view('date_countfemale_goto',$data);  
        }
        
        public function getFilter_approveprofile_Data_gotonikah()
        {
        $postData = $this->input->post();
        $data = $this->General_Model->getUsers_approve_all_gotonikah($postData);
        
        if (is_array($data)) 
        {
        echo json_encode($data);
        } 
        else 
        {
        echo json_encode(array('data' => []));
        }
        }
        
        public function getFilter_noprofilephoto_Data_gotonikah()
        {
        $postData = $this->input->post();
        
        $data = $this->General_Model->getUsers_no_profile_pic_all_gotonikah($postData);
        
        if (is_array($data)) 
        {
        echo json_encode($data);
        } 
        else 
        {
        echo json_encode(array('data' => []));
        }
        }
        
        public function getFilter_assign_activecallsData_gotonikah()
        {
        $postData = $this->input->post();
        $data = $this->General_Model->getUsers2_gotonikah($postData);
        
        if(is_array($data)) 
        {
        echo json_encode($data);
        } 
        else 
        {
        echo json_encode(array('data' => []));
        }
        }
        
        public function assign_active_calls_form_gotonikah()
        {
            
        $user_id = $this->input->post('user_id'); 
        $assign_id = $this->input->post('assign_id');
        $checkboxValues = $this->input->post('action_check');
        $cdate = date('Y-m-d');
        $status = "1";
        
        if(is_array($checkboxValues) && count($checkboxValues) > 0) 
        {
        foreach ($checkboxValues as $value) 
        {
        $data786 = array(
        'action_check' => $value,
        'user_id' => '2',
        'assign_id' => $assign_id,
        'date' => $cdate,
        'goto_status'=>$status
        );
        
        $data2 = array(
        'id' => $value,
        'direct' => $assign_id,
        'activecalls_status' => '2'
        );
        
        $this->db->insert('tbl_assign_active_calls', $data786);
        
        $this->db->where('id', $value);
        $this->db->update('tbl_registration', $data2);
        }
        }
        
        return redirect('admin/assign_active_calls_gotonikah');
        }

        public function date_count_male_goto()
        {
        $data['page'] = "Male Profile";
        $this->load->view('date_countmale_goto',$data);  
        }
        
        public function getFilter_deleteprofile_Data_gotonikah()
        {
        $postData = $this->input->post();
        $data = $this->General_Model->getUsers_delete_all_gotonikah($postData);
        
        if (is_array($data)) 
        {
        echo json_encode($data);
        } 
        else 
        {
        echo json_encode(array('data' => []));
        }
        }

        public function get_date_female_goto()
        {
        $from_date=$this->input->post('from_date'); 
        $to_date=$this->input->post('to_date');     
        
        $data['total_female_date_goto'] = $this->General_Model->get_femaledategoto($from_date,$to_date);
        $data['total_rows6'] = count($data['total_female_date_goto']);
        $this->load->view('female_dategoto',$data);
        }   
        
        public function get_date_male_goto()
        {
        $from_date=$this->input->post('from_date'); 
        $to_date=$this->input->post('to_date');   
        
        $data['total_male_date_goto'] = $this->General_Model->get_maledategoto($from_date,$to_date);
        $data['total_rows7'] = count($data['total_male_date_goto']);
        $this->load->view('male_dategoto',$data);
        } 

        public function exportToExcel_dategoto()
        {
        $from_date=$this->input->post('from_date'); 
        $to_date=$this->input->post('to_date'); 
        $total_female_date_goto=$this->General_Model->get_femaledategoto($from_date,$to_date);  
        
        if(!empty($total_female_date_goto)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Sl No');
        $sheet->setCellValue('B1', 'GN ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Reg Date');
        $sheet->setCellValue('E1', 'Place');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        foreach ($total_female_date_goto as $item) 
        {
        
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        
        $sheet->setCellValue('A' . $row, $i++);
        $sheet->setCellValue('B' . $row, $item['happynikah_id']);
        $sheet->setCellValue('C' . $row, $item['name']);
        $sheet->setCellValue('D' . $row, $formattedDate);
        $sheet->setCellValue('E' . $row, $item['native_place']);
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'female_list_dategoto.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false);
        echo "Invalid";
        }
        }
        
        public function allexcel_gotonikah()
        {
        try 
        {
        $all = $this->General_Model->get_all_excel_gotonikah();
        
        if(!empty($all)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'GN ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Age');
        $sheet->setCellValue('D1', 'Gender');
        $sheet->setCellValue('E1', 'Caste');
        $sheet->setCellValue('F1', 'Reg Date');
        $sheet->setCellValue('G1', 'Maritial Status');
        $sheet->setCellValue('H1', 'Place');
        $sheet->setCellValue('I1', 'Height');
        $sheet->setCellValue('J1', 'Weight');
        $sheet->setCellValue('K1', 'District');
        $sheet->setCellValue('L1', 'Education');
        $sheet->setCellValue('M1', 'Financial Status');
        $sheet->setCellValue('N1', 'Photo Status');
        
        $cellRange = 'A1:N1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach ($all as $item) {
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        
        $sheet->setCellValue('A' . $row, $item['happynikah_id']);
        $sheet->setCellValue('B' . $row, $item['name']);
        $sheet->setCellValue('C' . $row, $item['age']);
        $sheet->setCellValue('D' . $row, $item['gender']);
        $sheet->setCellValue('E' . $row, $item['caste']);
        $sheet->setCellValue('F' . $row, $formattedDate);
        $sheet->setCellValue('G' . $row, $item['marital_status']);
        $sheet->setCellValue('H' . $row, $item['native_place']);
        $sheet->setCellValue('I' . $row, $item['height']);
        $sheet->setCellValue('J' . $row, $item['weight']);
        $sheet->setCellValue('K' . $row, $item['district']);
        $sheet->setCellValue('L' . $row, $item['education']);
        $sheet->setCellValue('M' . $row, $item['financial_status']);
        $sheet->setCellValue('N' . $row, $item['photo_status']);
        
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'total.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false, 'error' => 'No data to export');
        echo json_encode($response);
        }
        } 
        
        catch (Exception $e) 
        {
        log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
        
        $response = array('success' => false, 'error' => 'Error exporting Excel file');
        echo json_encode($response);
        }
        }
        
        
        public function quickregister_excel_gotonikah()
        {
        try 
        {
        $all = $this->General_Model->GetQuickregister_goto();
        
        if(!empty($all)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'GN ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Reg Date');
        $sheet->setCellValue('D1', 'Mobile');
        $sheet->setCellValue('E1', 'District');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach($all as $item) 
        {
        $formattedDate = date('d-m-Y', strtotime($item->reg_date));
        
        $sheet->setCellValue('A' . $row, $item->happynikah_id);
        $sheet->setCellValue('B' . $row, $item->name);
        $sheet->setCellValue('C' . $row, $formattedDate);
        $sheet->setCellValue('D' . $row, $item->phone); 
        $sheet->setCellValue('E' . $row, $item->district); 
        
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'quickregister.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false, 'error' => 'No data to export');
        echo json_encode($response);
        }
        } 
        
        catch (Exception $e) 
        {
        log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
        
        $response = array('success' => false, 'error' => 'Error exporting Excel file');
        echo json_encode($response);
        }
        }
    
    
    public function stagethree_excel_gotonikah()
    {
    try 
    {
    $all = $this->General_Model->Getstage3_goto();
    
    if(!empty($all)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'GN ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Reg Date');
    $sheet->setCellValue('D1', 'Mobile');
    $sheet->setCellValue('E1', 'District');
    
    $cellRange = 'A1:E1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    $row = 2;
    $i = 1;
    
    foreach($all as $item) 
    {
    $formattedDate = date('d-m-Y', strtotime($item->reg_date));
    
    $sheet->setCellValue('A' . $row, $item->happynikah_id);
    $sheet->setCellValue('B' . $row, $item->name);
    $sheet->setCellValue('C' . $row, $formattedDate);
    $sheet->setCellValue('D' . $row, $item->phone);
    $sheet->setCellValue('E' . $row, $item->district);
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'stagethree.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    else 
    {
    $response = array('success' => false, 'error' => 'No data to export');
    echo json_encode($response);
    }
    } 
    
    catch (Exception $e) 
    {
    log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
    
    $response = array('success' => false, 'error' => 'Error exporting Excel file');
    echo json_encode($response);
    }
    }


    public function gulfdata_excel_gotonikah()
    {
    try 
    {
    $all = $this->General_Model->GetGulfData_gotonikah();
    
    if(!empty($all)) 
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'GN ID');
    $sheet->setCellValue('B1', 'Name');
 
    $sheet->setCellValue('C1', 'Reg Date');
    $sheet->setCellValue('D1','Mobile');
    $cellRange = 'A1:D1';
    $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
    
    $row = 2;
    $i = 1;
    
    foreach($all as $item) 
    {
    $formattedDate = date('d-m-Y', strtotime($item->reg_date));
    
    // $countryCode= $item->countryCode;
    // $fullPhoneNumber = '+' . $countryCode . $item->phone;

    $countryCode = $item->countryCode;
    $fullPhoneNumber = '+' . $countryCode .$item->phone;

    $sheet->setCellValue('A' . $row, $item->happynikah_id);
    $sheet->setCellValue('B' . $row, $item->name);
    $sheet->setCellValue('C' . $row, $formattedDate);
    $sheet->setCellValue('D' . $row, $fullPhoneNumber);    
    $row++;
    }
    
    $uploadDirectory = FCPATH . 'upload/';
    $fileName = 'gulfdata.xlsx';
    $filePath = $uploadDirectory . $fileName;
    
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
    
    $response = array('success' => true, 'filePath' => $filePath);
    echo json_encode($response);
    } 
    else 
    {
    $response = array('success' => false, 'error' => 'No data to export');
    echo json_encode($response);
    }
    } 
    
    catch (Exception $e) 
    {
    log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
    
    $response = array('success' => false, 'error' => 'Error exporting Excel file');
    echo json_encode($response);
    }
    }
        

        public function exportToExcel_male_dategoto()
        {
            
        $from_date=$this->input->post('from_date'); 
        $to_date=$this->input->post('to_date'); 
        $total_male_date_goto=$this->General_Model->get_maledategoto($from_date,$to_date);  
        
        if (!empty($total_male_date_goto)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Sl No');
        $sheet->setCellValue('B1', 'GN ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Reg Date');
        $sheet->setCellValue('E1', 'Place');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        foreach ($total_male_date_goto as $item) 
        {
        
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        $sheet->setCellValue('A' . $row, $i++);
        $sheet->setCellValue('B' . $row, $item['happynikah_id']);
        $sheet->setCellValue('C' . $row, $item['name']);
        $sheet->setCellValue('D' . $row, $formattedDate);
        $sheet->setCellValue('E' . $row, $item['native_place']);
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'male_list_dategoto.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        
        else 
        {
        $response = array('success' => false);
        echo "Invalid";
        }
        }  
        
        
        
        
// ***************************** HappyManagalyam**************************************//


        public function dashboard_happymangalyam()
        {


         if($_SESSION['user_type']==='0')
        {
        
        $UserID=$this->session->userdata('user_id');
        $data['all'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->get()->num_rows();
        $data['pending'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('status','0')->get()->num_rows();
        $data['approved'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('status','1')->get()->num_rows();
        $data['rejected'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('status','2')->get()->num_rows();
        $data['deleted'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('status','3')->get()->num_rows();
        $data['male'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('gender','1')->get()->num_rows();
        $data['female'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('gender','2')->get()->num_rows();
        $data['website'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('reg_through','0')->get()->num_rows();
        $data['admin'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('reg_through','1')->get()->num_rows();
        $data['mobile'] =$this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('reg_through','2')->get()->num_rows();
        $data['daily_all'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->get()->num_rows();
        $data['daily_pending'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('status','0')->get()->num_rows();
        $data['daily_approved'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('status','1')->get()->num_rows();
        $data['daily_rejected'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('status','2')->get()->num_rows();
        $data['daily_deleted'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('status','3')->get()->num_rows();
        $data['daily_male'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('gender','1')->get()->num_rows();
        $data['daily_female'] =  $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('gender','2')->get()->num_rows();
        $data['daily_website'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('reg_through','0')->get()->num_rows();
        $data['daily_admin'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('reg_through','1')->get()->num_rows();
        $data['daily_mobile'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('reg_through','2')->get()->num_rows();
        $this->load->view('dashboard_happymangalyam_sales_super',$data);  
        }

         elseif($_SESSION['user_type']=='3')
        {
        $data['all'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->get()->num_rows();
        $data['pending'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('status','0')->get()->num_rows();
        $data['approved'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('status','1')->get()->num_rows();
        $data['rejected'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('status','2')->get()->num_rows();
        $data['deleted'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('status','3')->get()->num_rows();
        $data['male'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('gender','1')->get()->num_rows();
        $data['female'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('gender','2')->get()->num_rows();
        $data['website'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('reg_through','0')->get()->num_rows();
        $data['admin'] = $this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('reg_through','1')->get()->num_rows();
        $data['mobile'] =$this->db->select('*')->from('tbl_registration')->where('hmangalyam','1')->where('reg_through','2')->get()->num_rows();
        $data['daily_all'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->get()->num_rows();
        $data['daily_pending'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('status','0')->get()->num_rows();
        $data['daily_approved'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('status','1')->get()->num_rows();
        $data['daily_rejected'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('status','2')->get()->num_rows();
        $data['daily_deleted'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('status','3')->get()->num_rows();
        $data['daily_male'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('gender','1')->get()->num_rows();
        $data['daily_female'] =  $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('gender','2')->get()->num_rows();
        $data['daily_website'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('reg_through','0')->get()->num_rows();
        $data['daily_admin'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('reg_through','1')->get()->num_rows();
        $data['daily_mobile'] = $this->db->select('*')->from('tbl_registration')->where('reg_date',date('Y-m-d'))->where('hmangalyam','1')->where('reg_through','2')->get()->num_rows();
        $this->load->view('dashboardsales_mangalyam',$data);
        }


        elseif($_SESSION['user_type']=='4') 
        {
        $UserID=$this->session->userdata('user_id');
        $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",
            'hmangalyam','1'));
        $pending_all=array('status'=>'0','hmangalyam'=>'1');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",
            $pending_all));
        $approve_all=array('status'=>'1','hmangalyam'=>'1');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",
            $approve_all));
        $reject_all=array('status'=>'2','hmangalyam'=>'1');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",
            $reject_all));
        $delete_all=array('status'=>'3','hmangalyam'=>'1');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",
            $delete_all));
        $where_male = array('gender'=>'1','hmangalyam'=>'1');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where_male));
        $where_female = array('gender'=>'2','hmangalyam'=>'1');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where_female));
        $where_website = array('reg_through'=>'0','hmangalyam'=>'1');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where_website));
        $where_admin = array('reg_through'=>'1','hmangalyam'=>'1');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where_admin));
        $where_mobile = array('reg_through'=>'2','hmangalyam'=>'1');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where_mobile));
        
        $sessid= $this->session->userdata('user_id_admin');
        $wheredailyall = array('reg_date'=>date('Y-m-d'),'staff_id'=>$sessid,'status'=>'1');
         
        $wheremonthall = array('MONTH(reg_date)'=>date('m'),'staff_id'=>$sessid,'status'=>'1');
        $data['daily_all'] = count($this->General_Model->GetFullData1("tbl_registration",
            $wheredailyall));
        $data['month_all'] = count($this->General_Model->GetFullData1("tbl_registration",
            $wheremonthall));
                
        $where1 = array('status'=>'0','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where1));
        $where2 = array('status'=>'1','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where2));
        $where3 = array('status'=>'2','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where3));
        $where5 = array('status'=>'3','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where5));
        $where6 = array('gender'=>'1','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where6));
        $where7 = array('gender'=>'2','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where7));
        $where8 = array('reg_through'=>'0','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where8));
        $where9 = array('reg_through'=>'1','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where9));
        $where10 = array('reg_through'=>'2','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",
            $where10));
        $this->load->view('dashboardcreation_happymangalyam',$data);
        }


        elseif($_SESSION['user_type']==='6')
        {
        
        $UserID=$this->session->userdata('user_id');
        
        $data['all'] = count($this->General_Model->GetFullData($table = "tbl_registration",'hmangalyam','1'));
        $where_pendingall = array('status'=>'0','goto_nikah'=>'1');
        $data['pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where_pendingall));
        $where_approveall = array('status'=>'1','hmangalyam'=>'1');
        $data['approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where_approveall));
        $where_rejectall = array('status'=>'2','hmangalyam'=>'1');
        $data['rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where_rejectall));
        $where_deleteall = array('status'=>'3','hmangalyam'=>'1');
        $data['deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where_deleteall));
        $where_male = array('gender'=>'1','hmangalyam'=>'1');
        $data['male'] = count($this->General_Model->GetFullData1("tbl_registration",$where_male));
        $where_female = array('gender'=>'2','hmangalyam'=>'1');
        $data['female'] = count($this->General_Model->GetFullData1("tbl_registration",$where_female));
        $where_website = array('reg_through'=>'0','hmangalyam'=>'1');
        $data['website'] = count($this->General_Model->GetFullData1("tbl_registration",$where_website));
        $where_admin = array('reg_through'=>'1','hmangalyam'=>'1');
        $data['admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where_admin));
        $where_mobile = array('reg_through'=>'2','hmangalyam'=>'1');
        $data['mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where_mobile));
        $where_daily = array('hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
           
        $data['daily_all'] = count($this->General_Model->GetFullData1($table = "tbl_registration",$where_daily));
        $where1 = array('status'=>'0','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_pending'] = count($this->General_Model->GetFullData1("tbl_registration",$where1));
        $where2 = array('status'=>'1','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_approved'] = count($this->General_Model->GetFullData1("tbl_registration",$where2));
        $where3 = array('status'=>'2','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_rejected'] = count($this->General_Model->GetFullData1("tbl_registration",$where3));
        $where5 = array('status'=>'3','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_deleted'] = count($this->General_Model->GetFullData1("tbl_registration",$where5));
        $where6 = array('gender'=>'1','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_male'] = count($this->General_Model->GetFullData1("tbl_registration",$where6));
        $where7 = array('gender'=>'2','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_female'] = count($this->General_Model->GetFullData1("tbl_registration",$where7));
        $where8 = array('reg_through'=>'0','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_website'] = count($this->General_Model->GetFullData1("tbl_registration",$where8));
        $where9 = array('reg_through'=>'1','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_admin'] = count($this->General_Model->GetFullData1("tbl_registration",$where9));
        
        $reg_date=date('Y-m-d');
        $data['daily_admin2'] =$this->db->select('*')->from('tbl_registration')->where('reg_through','1')->where('hmangalyam','1')->where('reg_date',$reg_date)->get();
        
        $where10 = array('reg_through'=>'2','hmangalyam'=>'1','reg_date'=>date('Y-m-d'));
        $data['daily_mobile'] = count($this->General_Model->GetFullData1("tbl_registration",$where10));
        
        $this->load->view('dashboardsupport_mangalyam',$data);  
        }

        elseif($_SESSION['user_type']=='7')
        {
        $this->load->view('dashboardchatsupport_mangalyam');
        }

        }


        public function register_mangalyam($page = '')
        {
        if($page == 'Register_mangalyam')
        {
        
        $UserDetails['name'] = !empty($this->input->post('name'))?$this->input->post('name'):'NULL';
        $UserDetails['gender'] = !empty($this->input->post('gender'))?$this->input->post('gender'):'NULL';
        $UserDetails['countryCode'] =!empty($this->input->post('country_code'))?$this->input->post('country_code'):'NULL';
        $UserDetails['phone'] =!empty($this->input->post('phone'))?$this->input->post('phone'):'NULL';
        $UserDetails['source'] = !empty($this->input->post('source'))?$this->input->post('source'):'NULL';
        $UserDetails['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
        $UserDetails['zodiac'] = !empty($this->input->post('zodiac'))?$this->input->post('zodiac'):'NULL';
        $UserDetails['dob'] = !empty($this->input->post('dob'))?$this->input->post('dob'):'NULL';
        $UserDetails['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';
        $UserDetails['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';
        $UserDetails['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';
        $UserDetails['marital_status'] = $this->input->post('marital_status');
        $UserDetails['no_of_children'] = $this->input->post('no_of_children');
        $UserDetails['physical_status'] = $this->input->post('physically_challenged');
        $UserDetails['registration_phychallenge'] =$this->input->post('disability');
        $UserDetails['disability'] =$this->input->post('physical_status');
        $UserDetails['mother_tongue'] =$this->input->post('mothertongue');
        $UserDetails['nationality'] =$this->input->post('nationality');
        $UserDetails['religion'] = 2;
        $UserDetails['caste'] = $this->input->post('belief');
        $UserDetails['highest_education'] = $this->input->post('highest_education');
        $UserDetails['education'] = $this->input->post('education');
        $UserDetails['blood_group'] =$this->input->post('bloodgroup');
        $UserDetails['madrassa_education'] = $this->input->post('madrassa_education');
        $UserDetails['code'] =$this->input->post('code');
        $UserDetails['financialstatus'] =$this->input->post('financialstatus');
        $UserDetails['job_category'] = $this->input->post('profession_type');
        $UserDetails['occupation'] = $this->input->post('profession');
        $UserDetails['home_country'] = $this->input->post('country');
        $UserDetails['home_state'] = $this->input->post('present_states');
        $UserDetails['home_district'] =$this->input->post('present_district');
        $UserDetails['home_city'] = $this->input->post('present_city');
        $UserDetails['country'] = $this->input->post('country');
        $UserDetails['photopassword'] = $this->input->post('photopassword');
        $UserDetails['annual_income'] = $this->input->post('annual_income');  
        $UserDetails['state'] = $this->input->post('states');
        $UserDetails['native_district'] = $this->input->post('districts');
        $UserDetails['native_place'] = $this->input->post('native_place');
        $UserDetails['bodytype'] =$this->input->post('bodytype');
        $UserDetails['appearance'] = $this->input->post('appearance');
        $UserDetails['mail'] = $this->input->post('email');
        $UserDetails['address'] = $this->input->post('address');
        $UserDetails['secondary_code'] = !empty($this->input->post('secondary_code'))?$this->input->post('secondary_code'):'NULL';
        $UserDetails['other_contact_number'] = $this->input->post('secondary_number');
        $UserDetails['job_details'] = $this->input->post('job_details');
        $UserDetails['reg_date'] = date('Y-m-d');
        $UserDetails['verified_date'] = date('Y-m-d');
        $UserDetails['staff_id'] = $this->session->userdata('user_id_admin');
        $UserDetails['about'] = "I'm ".$UserDetails['name'].". I'm ".$UserDetails['age']." Years old";
        $UserDetails['status'] = "1";
        $UserDetails['reg_through'] = "1";
        $UserDetails['hmangalyam'] = "1";
        $UserDetails['stage']="4";
       
        $FamilyDetails['familytype'] = !empty($this->input->post('familytype'))?$this->input->post('familytype'):'NULL';
        $FamilyDetails['financial_status'] = !empty($this->input->post('financialstatus'))?$this->input->post('financialstatus'):'NULL';        
        $FamilyDetails['hometype'] = !empty($this->input->post('hometype'))?$this->input->post('hometype'):'NULL';
        $FamilyDetails['fatherdetails'] = !empty($this->input->post('fatherdetails'))?$this->input->post('fatherdetails'):'NULL';
        $FamilyDetails['fathers_occupation'] = !empty($this->input->post('fathers_occupation'))?$this->input->post('fathers_occupation'):'NULL';
        $FamilyDetails['motherdetails'] = !empty($this->input->post('motherdetails'))?$this->input->post('motherdetails'):'NULL';
        $FamilyDetails['mothers_occupation'] = !empty($this->input->post('mothers_occupation'))?$this->input->post('mothers_occupation'):'NULL';
        $FamilyDetails['total_members'] = !empty($this->input->post('total_members'))?$this->input->post('total_members'):'NULL';
        
    
        $ProfileDetails['aboutme'] = $this->input->post('description');
        $ProfileDetails['partner_age_from'] = !empty($this->input->post('partner_age_from'))?$this->input->post('partner_age_from'):'NULL';
        $ProfileDetails['partner_age_to'] = !empty($this->input->post('partner_age_to'))?$this->input->post('partner_age_to'):'NULL';
        $ProfileDetails['partner_height'] = !empty($this->input->post('partner_height_from'))?$this->input->post('partner_height_from'):'NULL';
        $ProfileDetails['partner_height_to'] = !empty($this->input->post('partner_height_to'))?$this->input->post('partner_height_to'):'NULL';
        $partner_physicalstatus = !empty($this->input->post('partner_physical_statusnew'))?$this->input->post('partner_physical_statusnew'):'';
        $ProfileDetails['partner_physicalstatus'] =!empty($partner_physicalstatus)?implode(',',$partner_physicalstatus):'0';
        
        $partner_maritalstatus = !empty($this->input->post('partner_marital_status'))?$this->input->post('partner_marital_status'):'';
        $ProfileDetails['partner_maritalstatus'] =!empty($partner_maritalstatus)?implode(',',$partner_maritalstatus):'0';
        
        $partner_mothertongue = !empty($this->input->post('partner_mother_tongue'))?$this->input->post('partner_mother_tongue'):'';
        $ProfileDetails['partner_mother_tongue'] =!empty($partner_mothertongue)?implode(',',$partner_mothertongue):'0';
        
        $partner_languagespoken = !empty($this->input->post('partner_language_spoken'))?$this->input->post('partner_language_spoken'):'';
        $ProfileDetails['partner_languagespoken'] =!empty($partner_languagespoken)?implode(',',$partner_languagespoken):'0';
        
        $partner_skincolor = !empty($this->input->post('partner_skin_color'))?$this->input->post('partner_skin_color'):'';
        $ProfileDetails['partner_skincolor'] =!empty($partner_skincolor)?implode(',',$partner_skincolor):'0';
        
        $partner_appearance = !empty($this->input->post('partner_appearance'))?$this->input->post('partner_appearance'):'';
        $ProfileDetails['partner_appearance'] =!empty($partner_appearance)?implode(',',$partner_appearance):'0';
            
        $ProfileDetails['partner_caste'] = !empty($this->input->post('partner_caste'))?$this->input->post('partner_caste'):'NULL';
        $ProfileDetails['partner_religion'] = !empty($this->input->post('partner_religion'))?$this->input->post('partner_religion'):'NULL';
        $ProfileDetails['partner_physicalstatus'] = !empty($this->input->post('partner_physically_challenged'))?$this->input->post('partner_physically_challenged'):'NULL';    
        
        $partner_occupation=!empty($this->input->post('partner_occupation'))?$this->input->post('partner_occupation'):'';
        $OtherDetails['partner_occupation'] = !empty($partner_occupation)?implode(',',$partner_occupation):'0';
        
        $ProfileDetails['partner_annualincome'] = !empty($this->input->post('partner_annualincome'))?$this->input->post('partner_annualincome'):'NULL';
        $ProfileDetails['aboutme'] = !empty($this->input->post('description'))?$this->input->post('description'):'NULL';
        $ProfileDetails['partner_country'] = !empty($this->input->post('partner_country'))?$this->input->post('partner_country'):'NULL';
        $ProfileDetails['partner_state'] = !empty($this->input->post('partner_state'))?$this->input->post('partner_state'):'NULL';
        $partner_district= !empty($this->input->post('partner_district'))?$this->input->post('partner_district'):'';
        $ProfileDetails['partner_district'] =!empty($partner_district)?implode(',',$partner_district):'0';
        
        $OtherDetails['partner_nationality'] = !empty($this->input->post('partner_nationality'))?$this->input->post('partner_nationality'):'NULL';
        $ProfileDetails['demands'] = !empty($this->input->post('partner_expectation'))?$this->input->post('partner_expectation'):'NULL';   
        $partner_education = !empty($this->input->post('partner_education'))?$this->input->post('partner_education'):'';
        $ProfileDetails['partner_education'] = !empty($partner_education)?implode(',',$partner_education):'NULL';
        $ProfileDetails['partner_financial'] = !empty($this->input->post('partnerfinancialstatus'))?$this->input->post('partnerfinancialstatus'):'NULL';
        
        $partner_profession = !empty($this->input->post('partner_occupation'))?$this->input->post('partner_occupation'):'NULL';
        $ProfileDetails['partner_occupation']= !empty($partner_profession)?implode(',',$partner_profession):'NULL';
        
        $partner_district2= !empty($this->input->post('district_preference'))?$this->input->post('district_preference'):'NULL';
        $PartnerDetails['partner_district'] =!empty($partner_district2)?implode(',',$partner_district2):'NULL';
        
        if($this->session->userdata('user_id'))
        $UserID = $this->session->userdata('user_id');
        else
        $UserID="";
                
        if(!empty($UserID))
        {
        $_SESSION['name'] = $BasicDetails['name'];
        $_SESSION['phone'] = $BasicDetails['phone'];
        $_SESSION['age'] = $BasicDetails['age'];
        $exist = $this->General_Model->GetFullData($table = "tbl_registration",'id',$UserID);
        }
        
        
        $submit_value = $this->input->post('submit');
        if($submit_value == 'Save User Details')
        {
        $checkexist = $this->db->select('*')->from('tbl_registration')->where('phone',$UserDetails['phone'])
        ->where('status !=','3')->get()->num_rows();
        if($checkexist == 0)
        {
        
        $_SESSION['name'] = $UserDetails['name'];
        $_SESSION['phone'] = $UserDetails['phone'];
        $_SESSION['age'] = $UserDetails['age'];
        
        $UserID = $this->General_Model->AddRecord('tbl_registration', $UserDetails);
        $_SESSION['user_id'] =$UserID;
        
        $FamilyDetails['user_id'] = !empty($UserID)?$UserID:'NULL';
        $ProfileDetails['user_id'] = !empty($UserID)?$UserID:'NULL';
        $this->General_Model->AddRecord('tbl_familyprofile', $FamilyDetails);
        $this->General_Model->AddRecord('tbl_otherdetails', $ProfileDetails);
        
        
        $string="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
        $password=substr(str_shuffle($string),0,8);  
        
        $PartnerDetails['user_id'] = $UserID;
        $empsess_id=$this->session->userdata('user_id_admin');
        
        $loginDetails['password']=md5($password);
        $loginDetails['user_id'] = $UserID;
        $loginDetails['date'] = date('Y-m-d');
        $loginDetails['emp_id'] = $empsess_id;
        $loginDetails['username'] = $UserDetails['phone'];
        $loginDetails['originalpass'] = $password;  
        $happynikah_id = $this->General_Model->fetch_hnID($UserID)['happynikah_id'];
        
        $this->General_Model->AddRecord('tbl_userlogin',$loginDetails);
        
        
        if($UserDetails['countryCode'] == '91')
        {
        $countryCode = $UserDetails['countryCode'];
        }
        else
        {
        $countryCode = "+".$UserDetails['countryCode'];
        }
        $mobilenumber = $countryCode.$UserDetails['phone'];
        
        $name=$UserDetails['name'];
        $msg="UserID:$happynikah_id%20Password:$password";
        $this->smsotp($msg,$mobilenumber,$name);
        
        }
        else
        {   
        
        $UserDetails['name'] = !empty($this->input->post('name'))?$this->input->post('name'):'NULL';
        $UserDetails['gender'] = !empty($this->input->post('gender'))?$this->input->post('gender'):'NULL';
        $UserDetails['countryCode'] =!empty($this->input->post('country_code'))?$this->input->post('country_code'):'NULL';
        $UserDetails['phone'] =!empty($this->input->post('phone'))?$this->input->post('phone'):'NULL';
        $UserDetails['source'] = !empty($this->input->post('source'))?$this->input->post('source'):'NULL';
        $UserDetails['age'] = !empty($this->input->post('age'))?$this->input->post('age'):'NULL';
        $UserDetails['dob'] = !empty($this->input->post('dob'))?$this->input->post('dob'):'NULL';
        $UserDetails['height'] = !empty($this->input->post('height'))?$this->input->post('height'):'NULL';
        $UserDetails['weight'] = !empty($this->input->post('weight'))?$this->input->post('weight'):'NULL';
        $UserDetails['color'] = !empty($this->input->post('skin_color'))?$this->input->post('skin_color'):'NULL';
        $UserDetails['marital_status'] = $this->input->post('marital_status');
        $UserDetails['no_of_children'] = $this->input->post('no_of_children');
        $UserDetails['physical_status'] = $this->input->post('physically_challenged');
        $UserDetails['registration_phychallenge'] =$this->input->post('disability');
        $UserDetails['disability'] =$this->input->post('physical_status');
        $UserDetails['mother_tongue'] =$this->input->post('mothertongue');
        $UserDetails['nationality'] =$this->input->post('nationality');
        $UserDetails['religion'] = 2;
        $UserDetails['caste'] = $this->input->post('belief');
        $UserDetails['highest_education'] = $this->input->post('highest_education');
        $UserDetails['education'] = $this->input->post('education');
        $UserDetails['job_category'] = $this->input->post('profession_type');
        $UserDetails['occupation'] = $this->input->post('profession');
        $UserDetails['present_country'] = $this->input->post('present_country');
        $UserDetails['present_state'] = $this->input->post('present_states');
        $UserDetails['present_district'] =$this->input->post('present_district');
        $UserDetails['present_city'] = $this->input->post('present_city');
        $UserDetails['state'] = $this->input->post('states');
        $UserDetails['native_district'] = $this->input->post('districts');
        $UserDetails['native_place'] = $this->input->post('native_place');
        $UserDetails['bodytype'] =$this->input->post('bodytype');
        $UserDetails['appearance'] = $this->input->post('appearance');
        $UserDetails['mail'] = $this->input->post('email');
        $UserDetails['address'] = $this->input->post('address');
        $UserDetails['secondary_code'] = $this->input->post('secondary_code');
        $UserDetails['other_contact_number'] = $this->input->post('secondary_number');
        $ProfileDetails['aboutme'] = $this->input->post('description');
        $UserDetails['home_country'] = $this->input->post('country');
        $UserDetails['reg_date'] = date('Y-m-d');
        $UserDetails['verified_date'] = date('Y-m-d');
        $UserDetails['staff_id'] = $this->session->userdata('user_id_admin');
        $UserDetails['about'] = "I'm ".$UserDetails['name'].". I'm ".$UserDetails['age']." Years old";
        $UserDetails['status'] = "1";
        $UserDetails['stage'] = "4";
        $UserDetails['reg_through'] = "1";
        $UserDetails['blood_group'] = $this->input->post('bloodgroup');
        $UserDetails['job_details'] = $this->input->post('job_details');
        
        $config['upload_path'] = '../../assets/photo_storage/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '*';
        $config['max_width'] = '*';
        $config['max_height'] = '*';
        
        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload('photo')) 
        {
        $error = $this->upload->display_errors();
        }
        else
        {
        $filename = $this->upload->data();
        $UserDetails['photo']= $filename['file_name'];
        
        $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,
        $UserDetails);
        
        $this->session->set_flashdata('existing',$UserDetails['phone'].'is already registered!');
        redirect('admin/register_mangalyam');    
            
        }
        }            
        }
        else
        {
        
        $UserID = $this->input->post('userid');
        $UserDetails['blood_group'] = $this->input->post('bloodgroup');
        $UserDetails['job_details'] = $this->input->post('job_details');
        
        $PartnerDetails['partner_country'] = !empty($this->input->post('partner_country'))?$this->input->post('partner_country'):'NULL';
        $PartnerDetails['partner_state'] = !empty($this->input->post('partner_state'))?$this->input->post('partner_state'):'NULL';
        
        $this->General_Model->UpdateData($table = 'tbl_registration',$column_name = 'id',$UserID,$UserDetails);
        $this->General_Model->UpdateData($table = 'tbl_otherdetails',$column_name = 'user_id',$UserID,$ProfileDetails);
        $this->General_Model->UpdateData($table = 'tbl_familyprofile',$column_name = 'user_id',$UserID,$FamilyDetails);
        
        $checkexistfam = $this->db->select('*')->from('tbl_familyprofile')->where('user_id',$UserID)->get()->num_rows();
        if($checkexistfam == 0)
        {
        
        $FamilyDetails['user_id'] = $UserID;
        $this->General_Model->AddRecord('tbl_familyprofile',$FamilyDetails);
        }
        else
        {
        
        $this->General_Model->UpdateData($table = 'tbl_familyprofile',$column_name = 'user_id',$UserID,$FamilyDetails);
        }
        }
        
        if($UserID != "") 
        {
        $this->session->set_flashdata('added','Data!');
        redirect('admin/register_mangalyam');
        }
        else
        {
        $this->session->set_flashdata('error','Data!');
        redirect('admin/register_mangalyam');
        }
        }  
        
        else
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
        $data['states'] = $this->General_Model->GetFullData($table = "tbl_states");
        $data['madrassa_education'] = $this->General_Model->GetFullData($table = "tbl_madrassa_education");
        $data['highest_education'] = $this->General_Model->GetFullData($table = "tbl_highest_education");
        $data['professiontype'] = $this->General_Model->GetFullData($table = "tbl_professiontype");
        $data['profession'] = $this->General_Model->GetFullData($table = "tbl_profession");
        $data['income'] = $this->General_Model->GetFullData($table = "tbl_professional_income");
        $data['country'] = $this->General_Model->GetFullData($table = "tbl_country");
        $data['contacttype'] = $this->General_Model->GetFullData($table = "tbl_contacttype");
        $data['familytype'] = $this->General_Model->GetFullData($table = "tbl_familytype");
        $data['financialstatus'] = $this->General_Model->GetFullData($table = "tbl_financialstatus");
        $data['hometype'] = $this->General_Model->GetFullData($table = "tbl_hometype");
        $data['maritalstatus'] = $this->General_Model->GetFullData($table = "tbl_maritalstatus");
        $data['zodiac'] = $this->General_Model->GetFullData($table = "tbl_zodiac");
        $data['physicalstatus'] = $this->General_Model->GetFullData($table = "tbl_physicalstatus");
        $data['secondary_code'] = $this->General_Model->GetFullData($table = "tbl_countrycode");
        $data['countryCode'] = $this->General_Model->GetFullData($table = "tbl_countrycode");
    
        $this->load->view('register_mangalyam',$data);  
        }
        }

        public function tdycreation_mangalyam()
        {
        $data['page'] = "Today's Creation";
        $data['todaycreation'] = $this->General_Model->Gettdycreation_mangalyam();
        $this->load->view('todaycreation_mangalyam',$data);
        }
        
        public function totalcreation_mangalyam()
        {
        $data['page'] = "Total Creation";
        $data['totalcreation'] = $this->General_Model->Gettotalcreation_mangalyam();
        $this->load->view('totalcreation_mangalyam',$data);
        }

      
        public function tdypaymentcreation_mangalyam()
        {
        $data['page'] = "Today's Sale";
        $data['todaycreation'] = $this->General_Model->Gettdypaymentcreation_mangalyam();
        $this->load->view('todaypaymentcreation_mangalyam',$data);
        }

         public function totalpaymentcreation_mangalyam()
        {
        $data['page'] = "Total Sale";
        $data['totalcreation'] = $this->General_Model->Gettotalpaymentcreation_mangalyam();
        $this->load->view('totalpaymentcreation_mangalyam',$data);
        }

        public function today_staff_filter_mangalyam()
        {
        $selectedCategory = $this->input->post('selected_category');
        $selected_status =$this->input->post('selected_status');
        $data['filteredData'] = $this->General_Model->getstaffFilteredDatatoday_mangalyam($selectedCategory,$selected_status);
        $data['filteredtotal'] = $this->General_Model->getstaffFilteredDatatodayamount_mangalyam($selectedCategory,$selected_status);
        
        $data['page'] = "Today Filtered Data";
        $this->load->view('today_filtered_staff_data_view_mangalyam', $data);
        }

        public function filterpaymentcreation_mangalyam()
        {
        
        $data['page'] = "Filtered Data";
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $selected_category=$this->input->post('selected_category');
        $selected_status=$this->input->post('selected_status');
        
       
        $data['result'] = $this->General_Model->getDataBetweenDates_mangalyam($start_date,
                          $end_date,$selected_category,$selected_status);

        $data['filteredtotal'] = $this->General_Model->getDataBetweenDatescount_mangalyam($start_date,$end_date,$selected_category,$selected_status);
        
        $this->load->view('totalpaymentcreation2_mangalyam', $data);
        }

        public function assign_target_mangalyam()
        {
        $data['page'] = "Target Assign";
        $this->load->view('assign_target_mangalyam',$data);
        }

        public function assign_target_form_mangalyam()
        {
            
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            
        $data = array(
        'user_id' => $this->input->post('user_id'),
        'target_amount' => $this->input->post('target_amount'),
        'date'=>date('Y-m-d'),
        'status'=>'2',
        );
        
        if (!$this->isDataDuplicate_mangalyam($data)) 
        {
        $this->insertDataToDatabase_mangalyam($data);
        
        redirect('admin/assign_target_mangalyam');
        }
        
        else 
        {
        redirect('admin/assign_target_mangalyam');
        }
        } 
        
        else 
        {
        
        redirect('admin/assign_target_mangalyam');
        }
        
        }
    
        private function isDataDuplicate_mangalyam($data)
        {
        return $this->General_Model->isDataDuplicate_mangalyam($data);
        }
        
        private function insertDataToDatabase_mangalyam($data)
        {
        $this->General_Model->insertData_mangalyam($data);
        }

        public function assign_approve_calls_mangalyam()
        {    
        $data['page'] = "Assign Approve Calls";
        $data['isHRDepartment'] = true;
        $data['isITDepartment'] = true;
        $this->load->view('assign_approve_calls_mangalyam',$data);
        }

        public function getFilter_assign_approvecallsData_mangalyam()
        {
        $postData = $this->input->post();
        $data = $this->General_Model->getUsers_mangalyam($postData);

        if (is_array($data)) 
        {
        echo json_encode($data);
        } 

        else 
        {
        echo json_encode(array('data' => []));
        }
        }

        public function assign_approve_calls_form_mangalyam()
        {
        $user_id = $this->input->post('user_id'); 
        $assign_id = $this->input->post('assign_id');
        $checkboxValues = $this->input->post('action_check');
        $cdate = date('Y-m-d');
        $status="2";

        if(is_array($checkboxValues) && count($checkboxValues) > 0) 
        {
        foreach ($checkboxValues as $value) 
        {
        $data = array(
        'action_check' => $value,
        'user_id' => $user_id,
        'assign_id'=>$assign_id,
        'date'=>$cdate,
        'goto_status'=>$status);
        

        $data5[] = array(
        'action_check' => $value,
        'user_id' => $user_id,
        'assign_id'=>$assign_id,
        'date'=>$cdate,
        'goto_status'=>$status);
        

        $this->db->update_batch('tbl_assign_approve_calls', $data5, 'action_check');
        $this->db->delete('tbl_assign_approve_calls', array('action_check' =>$value));

        $data_payment_viewed = array('delete_status' =>'Inactive');
        $this->db->set('delete_status', 'Inactive');
        $this->db->where('sender_id',$value);
        $this->db->update('tbl_payment_viewed', $data_payment_viewed);

        if(!$this->db->insert('tbl_assign_approve_calls', $data)) 
        {

        $error = $this->db->error();
        log_message('error', 'Error inserting data: ' . $error['message']);
        }

        $data2[] = array(
        'id' => $value,
        'direct'=>$assign_id
        );
        }

        if (!$this->db->update_batch('tbl_registration', $data2, 'id')) 
        {
        $error = $this->db->error();
        log_message('error', 'Error updating data: ' . $error['message']);
        }
        }
        return redirect('admin/assign_approve_calls_mangalyam');
        }

        public function assign_active_calls_mangalyam()
        {    
        $data['page'] = "Assign Active Calls";
        $this->load->view('assign_active_calls_mangalyam',$data);
        }

        

        public function getFilter_assign_activecallsData_mangalyam()
        {
        $postData = $this->input->post();
        $data = $this->General_Model->getUsers2_mangalyam($postData);
        
        if(is_array($data)) 
        {
        echo json_encode($data);
        } 
        else 
        {
        echo json_encode(array('data' => []));
        }
        }


         public function assign_active_calls_form_mangalyam()
        {
            
        $user_id = $this->input->post('user_id'); 
        $assign_id = $this->input->post('assign_id');
        $checkboxValues = $this->input->post('action_check');
        $cdate = date('Y-m-d');
        $status = "2";
        
        if(is_array($checkboxValues) && count($checkboxValues) > 0) 
        {
        foreach ($checkboxValues as $value) 
        {
        $data786 = array(
        'action_check' => $value,
        'user_id' => '2',
        'assign_id' => $assign_id,
        'date' => $cdate,
        'goto_status'=>$status
        );
        
        $data2 = array(
        'id' => $value,
        'direct' => $assign_id,
        'activecalls_status' => '2'
        );
        
        $this->db->insert('tbl_assign_active_calls', $data786);
        
        $this->db->where('id', $value);
        $this->db->update('tbl_registration', $data2);
        }
        }

        return redirect('admin/assign_active_calls_mangalyam');
        }

         public function total_calls_mangalyam()
        {    
        $data['page'] = "Total Calls";
        $this->load->view('total_calls_mangalyam',$data);
        }

        public function getCustomerData_mangalyam() 
        {
        $customerId = $this->input->post('customer_id');
        $fromDate = $this->input->post('from_date');
        $toDate = $this->input->post('to_date');
        
        $data['customer_data'] = $this->General_Model->getCustomerData_mangalyam($customerId, $fromDate, $toDate);
        $data['total_rows'] = count($data['customer_data']);
        
        $date_ymd = date('Y-m-d', strtotime($fromDate));
        $date_ymd2 = date('Y-m-d', strtotime($toDate));
        
        $data['customer_data2'] = $this->General_Model->getCustomer2Data_mangalyam($customerId, $fromDate, $toDate);
        $data['total_rows2'] = count($data['customer_data2']);
        
        $data['customer_data3'] = $this->General_Model->getCustomer3Data_mangalyam($customerId, $fromDate, $toDate);
        $data['total_rows3'] = count($data['customer_data3']);
        
        $data['customer_data4'] = $this->General_Model->getCustomer4Data_mangalyam($customerId, $fromDate, $toDate);
        $data['total_rows4'] = count($data['customer_data4']);
        
        $data['customer_data5'] = $this->General_Model->getCustomer5Data_mangalyam($customerId, $fromDate, $toDate);
        $data['total_rows5'] = count($data['customer_data5']);
        
        $data['customer_data6'] = $this->General_Model->getCustomer6Data_mangalyam($customerId, $fromDate, $toDate);
        $data['total_rows6'] = count($data['customer_data6']);
        
        $data['total_amount'] = $this->General_Model->getTotalAmount_mangalyam($customerId, $fromDate, $toDate);
        
        $data['total_list'] = $this->General_Model->getTotalFollowupList_mangalyam($customerId,$fromDate, $toDate);
        
        $date_ymd_his=date('Y-m-d H:i:s', strtotime($fromDate));   
        $date_ymd_his2=date('Y-m-d H:i:s', strtotime($toDate));
        $data['total_list2'] = $this->General_Model->getTotalDeleteList_mangalyam($customerId,$date_ymd_his,$date_ymd_his2);
        
        $this->load->view('customer_data_view_mangalyam', $data);
        }

        public function total_postpone_mangalyam()
        {    
        $data['page'] = "Total Postpone";
        $data['que']=$this->General_Model->total_postponealldata_mangalyam();
        $this->load->view('total_postpone_mangalyam',$data);
        }

        public function total_postponeall_mangalyam()
        {
        $emp_id= $this->input->post('emp_id'); 
        $data['totalpostpone']=$this->General_Model->total_postponeall_mangalyam($emp_id);
        $data['page'] = "Filtered Postpone";
        $this->load->view('total_postpone2_mangalyam',$data);
        }

         public function quickregister_mangalyam()
        {
        $data['page'] = "Quick Register";
        $data['register'] = $this->General_Model->GetQuickregister_mangalyam();
        $this->load->view('quick_register_mangalyam',$data);
       
        }


        public function quickregister_excel_mangalyam()
        {
        try 
        {
        $all = $this->General_Model->GetQuickregister_mangalyam();
        
        if(!empty($all)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'HM ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Reg Date');
        $sheet->setCellValue('D1', 'Mobile');
        $sheet->setCellValue('E1', 'District');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach($all as $item) 
        {
        $formattedDate = date('d-m-Y', strtotime($item->reg_date));
        
        $sheet->setCellValue('A' . $row, $item->happynikah_id);
        $sheet->setCellValue('B' . $row, $item->name);
        $sheet->setCellValue('C' . $row, $formattedDate);
        $sheet->setCellValue('D' . $row, $item->phone);  
        $sheet->setCellValue('E' . $row, $item->district);  
        
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'quickregister.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false, 'error' => 'No data to export');
        echo json_encode($response);
        }
        } 
        
        catch (Exception $e) 
        {
        log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
        
        $response = array('success' => false, 'error' => 'Error exporting Excel file');
        echo json_encode($response);
        }
        }

        public function stagethree_mangalyam()
        {
        $data['page'] = "Stage Three";
        $data['register'] = $this->General_Model->Getstage3_mangalyam();
        $this->load->view('stage_three_mangalyam',$data);
        }

        public function calllogs_mangalyam()
        {
        $this->load->view('calllogs_mangalyam');
        }

        public function todaypostpone_mangalyam()
        {
        $this->load->view('todaypostpone_mangalyam');
        }


        public function stagethree_excel_mangalyam()
        {
        try 
        {
        $all = $this->General_Model->Getstage3_mangalyam();

        if(!empty($all)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'HM ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Reg Date');
        $sheet->setCellValue('D1', 'Mobile');
        $sheet->setCellValue('E1', 'District');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);

        $row = 2;
        $i = 1;

        foreach($all as $item) 
        {
        $formattedDate = date('d-m-Y', strtotime($item->reg_date));

        $sheet->setCellValue('A' . $row, $item->happynikah_id);
        $sheet->setCellValue('B' . $row, $item->name);
        $sheet->setCellValue('C' . $row, $formattedDate);
        $sheet->setCellValue('D' . $row, $item->phone);
        $sheet->setCellValue('E' . $row, $item->district); 
        
        $row++;
        }

        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'stagethree.xlsx';
        $filePath = $uploadDirectory . $fileName;

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false, 'error' => 'No data to export');
        echo json_encode($response);
        }
        } 

        catch (Exception $e) 
        {
        log_message('error', 'Error exporting Excel file: ' . $e->getMessage());

        $response = array('success' => false, 'error' => 'Error exporting Excel file');
        echo json_encode($response);
        }
        }

        public function Gulfdata_mangalyam()
        {
        $this->load->view('gulfapprovels_mangalyam');  
        }

         public function photoapprove_mangalyam()
        {
    
        $data['photo'] = $this->General_Model->unapprovephoto_mangalyam();
        $this->load->view('photoapprove_mangalyam',$data);
    
        }


         public function profile_deleted_all_mangalyam()
        {    
        $data['page'] = "Profile Deleted";
        $this->load->view('profile_deleted_all_mangalyam',$data);
        }

        public function getFilter_deleteprofile_Data_mangalyam()
        {
        $postData = $this->input->post();
        $data = $this->General_Model->getUsers_delete_all_mangalyam($postData);
        
        if (is_array($data)) 
        {
        echo json_encode($data);
        } 
        else 
        {
        echo json_encode(array('data' => []));
        }
        }

        

        public function profile_approve_all_mangalyam()
        {    
        $data['page'] = "Profile Approved";
        $this->load->view('profile_approved_all_mangalyam',$data);
        }

         public function reportid_mangalyam()
        {
        $this->load->view('reportid_mangalyam');
        }

        public function update_logs_mangalyam()
        {
        $data['page'] = "Pending Profile Update";
        $update_id =$this->input->post('update_id');
        $update_by=$this->input->post('update_by');
        $update_date=date('Y-m-d H:i:s');
        $data2 = array('update_data' =>'2','update_date'=>$update_date,
        'update_by'=>$update_by);
        $this->db->set('update_data', '2');
        $this->db->set('update_date', $data2['update_date']);
        $this->db->set('update_by', $data2['update_by']);
        $this->db->where('id',$update_id);
        $this->db->update('tbl_registration', $data2);

        $this->load->view('update_logs_mangalyam',$data);
        }

         public function update_logs_delete_mangalyam()
        {
        
        $data['page'] = "Pending Profile Update";
        $update_id =$this->input->post('update_id');
        $data2 = array('status' =>'3');
        $this->db->set('status', '3');
        $this->db->where('id',$update_id);
        $this->db->update('tbl_registration', $data2);
        
        $this->load->view('update_logs_mangalyam',$data);
        }

        public function otherstate_mangalyam()
        {
        $data['page'] = "Other State";
        $data['register'] = $this->General_Model->Getotherstate_mangalyam();
        $this->load->view('other_state_mangalyam',$data);
        }
        
        public function refer_and_earn_mangalyam()
        {
        $this->load->view('refer_mangalyam');  
        }


        public function doorstepcollection_mangalyam()
        {
        $this->load->view('doorstep_mangalyam');
        }

        public function paymentvisit_mangalyam_delete()
        {

        $delete_status="Inactive";
        $login_id = $this->session->userdata('user_id_admin');
        $id= $this->input->post('delete_id');
        $cdate=date('Y-m-d H:i:s');
        $this->General_Model->paymentvisit_delete2($id,$delete_status,$login_id,$cdate);
        redirect('admin/paymentvisitcount_mangalyam');

        }


        public function paymentvisitcount_mangalyam()
        {
        $this->load->view('paymentvisitcount_mangalyam');
        }
        
        public function district_count_female_mangalyam()
        {
        $data['page'] = "District Female Count";
        $this->load->view('district_countfemale_mangalyam',$data);  
        }
        

        public function get_femalecount_mangalyam()
        {
        $districts=$this->input->post('districts');   
        $data['total_female1'] = $this->General_Model->get_female_count_mangalyam($districts);
        $data['total_rows6'] = count($data['total_female1']);
        $this->load->view('female_count_mangalyam',$data);
        }

         public function exportToExcel_mangalyam()
        {
        
        $districts = $this->input->post('districts');
        $total_female1 = $this->General_Model->get_female_count_mangalyam($districts);
        
        
        if(!empty($total_female1))
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Sl No');
        $sheet->setCellValue('B1', 'HM ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Reg Date');
        $sheet->setCellValue('E1', 'Place');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach ($total_female1 as $item) 
        {
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        $sheet->setCellValue('A' . $row, $i++);
        $sheet->setCellValue('B' . $row, $item['happynikah_id']);
        $sheet->setCellValue('C' . $row, $item['name']);
        $sheet->setCellValue('D' . $row, $formattedDate);
        $sheet->setCellValue('E' . $row, $item['native_place']);
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'female_list_mangalyam.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        }
        else 
        {
        $response = array('success' => false);
        echo "Invalid";
        }
        }
  

         public function district_count_male_mangalyam()
        {
        $data['page'] = "District Male Count";
        $this->load->view('district_countmale_mangalyam',$data);  
        }

    public function get_malecount_mangalyam()
        {  
        $districts=$this->input->post('districts');
        $data['total_male1'] = $this->General_Model->get_male_count_mangalyam($districts);
        $data['total_rows7'] = count($data['total_male1']);
        $this->load->view('male_count_mangalyam',$data);
        }
        



        public function exportToExcel_malemangalyam()
        {
        $districts = $this->input->post('districts');
        $total_male1 = $this->General_Model->get_male_count_mangalyam($districts);
        
        if(!empty($total_male1))
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Sl No');
        $sheet->setCellValue('B1', 'HM ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Reg Date');
        $sheet->setCellValue('E1', 'Place');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach ($total_male1 as $item) 
        {
        
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        
        $sheet->setCellValue('A' . $row, $i++);
        $sheet->setCellValue('B' . $row, $item['happynikah_id']);
        $sheet->setCellValue('C' . $row, $item['name']);
        $sheet->setCellValue('D' . $row, $formattedDate);
        $sheet->setCellValue('E' . $row, $item['native_place']);
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'male_list_goto.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        }
        else 
        {
        $response = array('success' => false);
        echo "Invalid";
        }
        }

        public function date_count_female_mangalyam()
        {
        $data['page'] = "Female Profile";
        $this->load->view('date_countfemale_mangalyam',$data);  
        }


        public function get_date_female_mangalyam()
        {
        $from_date=$this->input->post('from_date'); 
        $to_date=$this->input->post('to_date');     
        
        $data['total_female_date_mangalyam'] = 
        $this->General_Model->get_femaledatemangalyam($from_date,$to_date);
        $data['total_rows6'] = count($data['total_female_date_mangalyam']);
        $this->load->view('female_datemangalyam',$data);
        } 

        public function district_date_staff_count_form_mangalyam()
        {
        $data['page'] = "Date Vise District Count";
        $this->load->view('district_date_staff_count_form_mangalyam',$data);  
        }


        public function district_date_staff_count_mangalyam()
        {
        $data['user_id']=$this->input->post('user_id'); 
        $data['from_date']=$this->input->post('from_date');
        $data['to_date']=$this->input->post('to_date');
        $data['gender']=$this->input->post('gender');
        $this->load->view('district_date_staff_count_mangalyam',$data);  
        }

        public function exportToExcel_datemangalyam()
        {
        $from_date=$this->input->post('from_date'); 
        $to_date=$this->input->post('to_date'); 
        $total_female_date_goto=$this->General_Model->get_femaledatemangalyam($from_date,$to_date);  
        
        if(!empty($total_female_date_goto)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Sl No');
        $sheet->setCellValue('B1', 'HM ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Reg Date');
        $sheet->setCellValue('E1', 'Place');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        foreach ($total_female_date_goto as $item) 
        {
        
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        
        $sheet->setCellValue('A' . $row, $i++);
        $sheet->setCellValue('B' . $row, $item['happynikah_id']);
        $sheet->setCellValue('C' . $row, $item['name']);
        $sheet->setCellValue('D' . $row, $formattedDate);
        $sheet->setCellValue('E' . $row, $item['native_place']);
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'female_list_datemangalyam.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false);
        echo "Invalid";
        }
        }

         public function date_count_male_mangalyam()
        {
        $data['page'] = "Male Profile";
        $this->load->view('date_countmale_mangalyam',$data);  
        }

        public function get_date_male_mangalyam()
        {
        $from_date=$this->input->post('from_date'); 
        $to_date=$this->input->post('to_date');   
        
        $data['total_male_date_mangalyam'] = $this->General_Model->get_maledatemangalyam($from_date,$to_date);
        $data['total_rows7'] = count($data['total_male_date_mangalyam']);
        $this->load->view('male_datemangalyam',$data);
        } 

        
        
        public function getFilter_approveprofile_Data_mangalyam()
        {
        $postData = $this->input->post();
        $data = $this->General_Model->getUsers_approve_all_mangalyam($postData);
        
        if (is_array($data)) 
        {
        echo json_encode($data);
        } 
        else 
        {
        echo json_encode(array('data' => []));
        }
        }

        public function profilephoto_unavailable_mangalyam()
        {    
        $data['page'] = "Profile Photo Unavailable";
        $this->load->view('profilephoto_unavailable_mangalyam',$data);
        }
        
        public function getFilter_noprofilephoto_Data_mangalyam()
        {
        $postData = $this->input->post();
        
        $data = $this->General_Model->getUsers_no_profile_pic_all_mangalyam($postData);

        if (is_array($data)) 
        {
        echo json_encode($data);
        } 

        else 
        {
        echo json_encode(array('data' => []));
        }

        }

        public function allexcel_mangalyam()
        {
        try 
        {
        $all = $this->General_Model->get_all_excel_mangalyam();
        
        if(!empty($all)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'HM ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Age');
        $sheet->setCellValue('D1', 'Gender');
        $sheet->setCellValue('E1', 'Caste');
        $sheet->setCellValue('F1', 'Reg Date');
        $sheet->setCellValue('G1', 'Maritial Status');
        $sheet->setCellValue('H1', 'Place');
        $sheet->setCellValue('I1', 'Height');
        $sheet->setCellValue('J1', 'Weight');
        $sheet->setCellValue('K1', 'District');
        $sheet->setCellValue('L1', 'Education');
        $sheet->setCellValue('M1', 'Financial Status');
        $sheet->setCellValue('N1', 'Photo Status');
        
        $cellRange = 'A1:N1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach ($all as $item) {
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        
        $sheet->setCellValue('A' . $row, $item['happynikah_id']);
        $sheet->setCellValue('B' . $row, $item['name']);
        $sheet->setCellValue('C' . $row, $item['age']);
        $sheet->setCellValue('D' . $row, $item['gender']);
        $sheet->setCellValue('E' . $row, $item['caste']);
        $sheet->setCellValue('F' . $row, $formattedDate);
        $sheet->setCellValue('G' . $row, $item['marital_status']);
        $sheet->setCellValue('H' . $row, $item['native_place']);
        $sheet->setCellValue('I' . $row, $item['height']);
        $sheet->setCellValue('J' . $row, $item['weight']);
        $sheet->setCellValue('K' . $row, $item['district']);
        $sheet->setCellValue('L' . $row, $item['education']);
        $sheet->setCellValue('M' . $row, $item['financial_status']);
        $sheet->setCellValue('N' . $row, $item['photo_status']);
        
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'total.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false, 'error' => 'No data to export');
        echo json_encode($response);
        }
        } 
        
        catch (Exception $e) 
        {
        log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
        
        $response = array('success' => false, 'error' => 'Error exporting Excel file');
        echo json_encode($response);
        }
        }


       public function multiple_contacts_mangalyam()
        {
        $data['page'] = "Customer Viewed Count";
        $this->load->view('multiple_contacts_form_mangalyam', $data);
        }

        public function contact_viewed_search_mangalyam()
        {
        $data['page'] = "Viewed Contacts";
        $this->load->view('contact_viewed_search_mangalyam',$data);  
        }

           public function contact_viewed_listing_mangalyam()
        {
        $data['hn_id']=$this->input->post('search_profile');  
        $this->load->view('contact_viewed_listing_mangalyam',$data);  
        }

        public function multiple_contacts_form_mangalyam()
        {
      
        $selected_date = $this->input->post('selected_date');
        if (!empty($selected_date)) 
        {
        $selected_date_formatted = date('Y-m-d H:i:s', strtotime($selected_date));
        $data['records'] = $this->General_Model->getmultiple_contacts($selected_date_formatted);
        $data['counts'] = $this->General_Model->getSenderCounts_mangalyam($selected_date_formatted);
        $data['selected_date'] = $selected_date_formatted; 
        } 
        
        else
        {
        $data['records'] = [];
        $data['counts'] = [];
        $data['selected_date'] = ''; 
        }

        $this->load->view('multiple_contacts_mangalyam', $data);
        }


        public function todayfollowup_mangalyam()
        {
        
        $search_profile = $this->input->post('search_profile');
        
        if($search_profile != "")
        {
        $data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
        
        }
        
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
        
        $this->load->view('todayfollowup_mangalyam',$data);
        } 


        public function users_mangalyam($status = '')
        {
            
        if($status == '0')
        {
        $data['page'] = "Total Pending Calls";
        $data['users'] = $this->General_Model->GetFullData_mangalyam('tbl_registration',
        'status','0');
        }
        
        if($status == '1')
        {
        $data['page'] = "Approved Profiles";
        $data['users'] = 
        $this->General_Model->GetFullData_mangalyam('tbl_registration','status','1');
        }

        if($status == '2')
        {
        $data['page'] = "Rejected Calls";
        }

        if($status == '3')
        {
        $data['page'] = "Deleted Profiles";
        $data['users'] = 
        $this->General_Model->GetFullData_mangalyam('tbl_registration','status','3');
        }

        if($status == 'profile_approval')
        {
        $data['page'] = "Profile Approvals";
        $data['users'] = $this->General_Model->GetPendingcalls_mangalyam();
        }

        if($status == 'quick_calls')
        {
        $data['page'] = "Quick Calls";
        $data['users'] = $this->General_Model->GetQuickcalls_mangalyam();
        }
    
        $data['status'] = $status;
        $this->load->view('users_mangalyam',$data);  
        }



        public function pendingfollowup_mangalyam()
        {
        
        $search_profile = $this->input->post('search_profile');
        
        if($search_profile != "")
        {
        $data['get_search_profiles'] = $this->General_Model->search_profiles($search_profile);
        
        }
        
        $data['plan'] = $this->General_Model->GetFullData($table = "tbl_plan");   
        
        $this->load->view('pendingfollowup_mangalyam',$data);
        }  


        public function approvecalls_mangalyam()
        {
        $this->load->view('approvecalls_mangalyam');
        }

        public function activecalls_mangalyam()
        {
        
        $limit = 20;
        $offset = 0;
        $data['results'] = $this->General_Model->fetchData($limit,$offset);
        
        $this->load->view('activecalls_mangalyam', $data);
        }

        public function paymentdetails_mangalyam()
        {
        $data['page'] = "Payment Details";
        $this->load->view('paymentdetails_mangalyam',$data);
        }

        public function expirycalls_mangalyam()
        {
        $this->load->view('expirycalls_mangalyam');
        }
    

        public function lastlogin_mangalyam()
        {
        $this->load->view('lastlogin_mangalyam');
        }
        
        public function exportToExcel_male_datemangalyam()
        {
            
        $from_date=$this->input->post('from_date'); 
        $to_date=$this->input->post('to_date'); 
        $total_male_date_goto=$this->General_Model->get_maledatemangalyam($from_date,$to_date);  
        
        if (!empty($total_male_date_goto)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Sl No');
        $sheet->setCellValue('B1', 'HM ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Reg Date');
        $sheet->setCellValue('E1', 'Place');
        
        $cellRange = 'A1:E1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        foreach ($total_male_date_goto as $item) 
        {
        
        $formattedDate = date('d-m-Y', strtotime($item['reg_date']));
        $sheet->setCellValue('A' . $row, $i++);
        $sheet->setCellValue('B' . $row, $item['happynikah_id']);
        $sheet->setCellValue('C' . $row, $item['name']);
        $sheet->setCellValue('D' . $row, $formattedDate);
        $sheet->setCellValue('E' . $row, $item['native_place']);
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'male_list_datemangalyam.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        
        else 
        {
        $response = array('success' => false);
        echo "Invalid";
        }
        }  
        
        
        
        public function otherstate_excel_mangalyam()
        {
        try 
        {
        $all = $this->General_Model->Getotherstate_mangalyam();
        
        if(!empty($all)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'HM ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Reg Date');
        $sheet->setCellValue('D1', 'Mobile');
        // $sheet->setCellValue('E1', 'District');
        
        $cellRange = 'A1:D1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);
        
        $row = 2;
        $i = 1;
        
        foreach($all as $item) 
        {
        $formattedDate = date('d-m-Y', strtotime($item->reg_date));
        
        $sheet->setCellValue('A' . $row, $item->happynikah_id);
        $sheet->setCellValue('B' . $row, $item->name);
        $sheet->setCellValue('C' . $row, $formattedDate);
        $sheet->setCellValue('D' . $row, $item->phone);
        // $sheet->setCellValue('E' . $row, $item->district); 
        $row++;
        }
        
        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'otherstate.xlsx';
        $filePath = $uploadDirectory . $fileName;
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
        
        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false, 'error' => 'No data to export');
        echo json_encode($response);
        }
        } 
        
        catch (Exception $e) 
        {
        log_message('error', 'Error exporting Excel file: ' . $e->getMessage());
        
        $response = array('success' => false, 'error' => 'Error exporting Excel file');
        echo json_encode($response);
        }
        }
    
    
        public function gulfdata_excel_mangalyam()
        {
        try 
        {
        $all = $this->General_Model->GetGulfData_mangalyam();

        if(!empty($all)) 
        {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'HM ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Reg Date');
        $sheet->setCellValue('D1','Mobile');
        
        $cellRange = 'A1:D1';
        $sheet->getStyle($cellRange)->getFont()->setBold(true)->setSize(12);

        $row = 2;
        $i = 1;

        foreach($all as $item) 
        {
        $formattedDate = date('d-m-Y', strtotime($item->reg_date));

        // $countryCode= $item->countryCode;
        // $fullPhoneNumber = '+' . $countryCode . $item->phone;

        $countryCode = $item->countryCode;
        $fullPhoneNumber = '+' . $countryCode .$item->phone;

        $sheet->setCellValue('A' . $row, $item->happynikah_id);
        $sheet->setCellValue('B' . $row, $item->name);
        $sheet->setCellValue('C' . $row, $formattedDate);
        $sheet->setCellValue('D' . $row, $fullPhoneNumber);    
        $row++;
        }

        $uploadDirectory = FCPATH . 'upload/';
        $fileName = 'gulfdata.xlsx';
        $filePath = $uploadDirectory . $fileName;

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        $response = array('success' => true, 'filePath' => $filePath);
        echo json_encode($response);
        } 
        else 
        {
        $response = array('success' => false, 'error' => 'No data to export');
        echo json_encode($response);
        }
        } 

        catch (Exception $e) 
        {
        log_message('error', 'Error exporting Excel file: ' . $e->getMessage());

        $response = array('success' => false, 'error' => 'Error exporting Excel file');
        echo json_encode($response);
        }
        }
        
        }
