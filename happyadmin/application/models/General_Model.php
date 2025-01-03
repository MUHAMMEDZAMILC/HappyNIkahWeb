<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_Model extends CI_Model 
{

    public function login($user = '', $password = '',$status='') 
    {
    $this->db->select('*');
    $this->db->from('tbl_employees1 e');
    $this->db->join('tbl_users1 u','e.user_id = u.user_id');
    $this->db->where('username',$user);
    $this->db->where('password',$password);
    $this->db->where('usertype_id',$status);
    $query = $this->db->get();
    
    if ($query->num_rows() == '') 
    {
    return 'failure';
    } 
    else 
    {
    $result = $query->row_array();
    return $result;
    }
    }

    public function isDataDuplicate($data)
    {
        
    $query = $this->db->get_where('tbl_target', array('user_id' => $data['user_id'], 
    'target_amount' => $data['target_amount'],'status'=>'0', 'date' => $data['date']));
    return $query->num_rows() > 0;
    }
    
    public function isDataDuplicate_gotonikah($data)
    {
        
    $query = $this->db->get_where('tbl_target', array('user_id' => $data['user_id'], 
    'target_amount' => $data['target_amount'],'status'=>'1', 'date' => $data['date']));
    return $query->num_rows() > 0;
    }
    
    // public function isDataDuplicate2($data)
    // {
        
    // $query = $this->db->get_where('tbl_assign_approve_calls', array('user_id' => $data['user_id'], 
    // 'assign_id' => $data['assign_id'], 'date' => $data['date']));
    // return $query->num_rows() > 0;
    // }
    
    public function getRowCount() 
    {
       
        $ptoday_date=date('Y-m-d');
        $login_id = $this->session->userdata('user_id_admin');
        $this->db->where('login_id',$login_id);
        $this->db->where('delete_status','Active');
    
        $this->db->where("STR_TO_DATE(postpone_date, '%d-%m-%Y') >=", $ptoday_date); 
        return $this->db->count_all_results('tbl_paymentrequest');
    }
    
    public function getCustomerData($customerId, $fromDate, $toDate) 
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        $this->db->where('emp_id', $customerId);
        $this->db->where('goto_nikah', 0);
        $this->db->where('hmangalyam', 0);
        $this->db->where('reg_date >=', $fromDate);
        $this->db->where('reg_date <=', $toDate);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getCustomerData_gotonikah($customerId, $fromDate, $toDate) 
    {
    // $this->db->select('*');
    // $this->db->from('tbl_registration');
    // $this->db->where('emp_id', $customerId);
    // $this->db->where('goto_nikah', 1);
    // $this->db->where('reg_date >=', $fromDate);
    // $this->db->where('reg_date <=', $toDate);
    // $query = $this->db->get();
    // return $query->result_array();
    
    
     $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('emp_id', $customerId);
    $this->db->where('goto_nikah', 1);

    if ($fromDate !== null) {
        $this->db->where('reg_date >=', $fromDate);
    }

    if ($toDate !== null) {
        $this->db->where('reg_date <=', $toDate);
    }

    $query = $this->db->get();
    return $query->result_array();
    }

    public function getCustomer2Data($customerId, $fromDate, $toDate) 
    {
     
        $this->db->select('tbl_followup.*, tbl_registration.goto_nikah,tbl_registration.hmangalyam'); 
        $this->db->from('tbl_followup');
        $this->db->join('tbl_registration', 'tbl_followup.uid = tbl_registration.id', 'left'); 
        $this->db->where('tbl_followup.login_id', $customerId);
        $this->db->where('tbl_followup.status', 'Ring');
        $this->db->where('tbl_followup.cur_date >=', $fromDate);
        $this->db->where('tbl_followup.cur_date <=', $toDate);
        $this->db->where('tbl_registration.goto_nikah', 0);
        $this->db->where('tbl_registration.hmangalyam', 0);
        $query = $this->db->get();
        return $query->result_array();

    }
    
    public function addcmment($message,$user_id,$cmmt_date)
    {
        $data= array('comments' =>$message,'cmmt_date' =>$cmmt_date);
        $this->db->where('uid',$user_id);
        $this->db->where('delete_status','Active');
        $query=$this->db->update('tbl_followup',$data);       
        return $query;
    }
    
    public function getCustomer2Data_gotonikah($customerId, $fromDate, $toDate) 
    {
      
        $this->db->select('tbl_followup.*, tbl_registration.goto_nikah'); 
        $this->db->from('tbl_followup');
        $this->db->join('tbl_registration', 'tbl_followup.uid = tbl_registration.id', 'left'); 
        $this->db->where('tbl_followup.login_id', $customerId);
        $this->db->where('tbl_followup.status', 'Ring');
        // $this->db->where('tbl_followup.cur_date >=', $fromDate);
        // $this->db->where('tbl_followup.cur_date <=', $toDate);
        
        if($fromDate !== null) 
        {
        $this->db->where('tbl_followup.cur_date >=', $fromDate);
        }
        
        if($toDate !== null) 
        {
        $this->db->where('tbl_followup.cur_date <=', $toDate);
        }
        
        $this->db->where('tbl_registration.goto_nikah', 1);
        
        $query = $this->db->get();
        return $query->result_array();

    }
    
    public function getCustomer3Data($customerId, $fromDate, $toDate) 
    {
       
        $this->db->select('tbl_paymentrequest.*, tbl_registration.goto_nikah,tbl_registration.hmangalyam'); 
        $this->db->from('tbl_paymentrequest');
        $this->db->join('tbl_registration', 'tbl_paymentrequest.payment_id = tbl_registration.id', 'left'); 
        $this->db->where('tbl_paymentrequest.login_id', $customerId);
        $this->db->where('tbl_paymentrequest.crnt_date >=', $fromDate);
        $this->db->where('tbl_paymentrequest.crnt_date <=', $toDate);
        $this->db->where('tbl_registration.goto_nikah', 0);
        $this->db->where('tbl_registration.hmangalyam', 0);
        
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    public function getCustomer3Data_gotonikah($customerId, $fromDate, $toDate) 
    {
     
        $this->db->select('tbl_paymentrequest.*, tbl_registration.goto_nikah'); 
        $this->db->from('tbl_paymentrequest');
        $this->db->join('tbl_registration', 'tbl_paymentrequest.payment_id = tbl_registration.id', 'left'); 
        $this->db->where('tbl_paymentrequest.login_id', $customerId);
        $this->db->where('tbl_paymentrequest.crnt_date >=', $fromDate);
        $this->db->where('tbl_paymentrequest.crnt_date <=', $toDate);
        $this->db->where('tbl_registration.goto_nikah', 1);
        
        $query = $this->db->get();
        return $query->result_array();
        
    }
    public function getCustomer4Data($customerId, $fromDate, $toDate) 
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        $this->db->where('delete_id', $customerId);
        $this->db->where('status','3');
        $this->db->where('goto_nikah','0');
        $this->db->where('hmangalyam','0');
        $this->db->where('delete_date >=', $fromDate);
        $this->db->where('delete_date <=', $toDate);
        $query = $this->db->get();
        return $query->result_array();
    }
    
     public function getCustomer4Data_gotonikah($customerId, $fromDate, $toDate) 
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        $this->db->where('delete_id', $customerId);
        $this->db->where('status','3');
        $this->db->where('goto_nikah','1');
        $this->db->where('delete_date >=', $fromDate);
        $this->db->where('delete_date <=', $toDate);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getCustomer5Data($customerId, $fromDate, $toDate) 
    {
      
        $this->db->select('tbl_followup.*, tbl_registration.goto_nikah,tbl_registration.hmangalyam'); 
        $this->db->from('tbl_followup');
        $this->db->join('tbl_registration', 'tbl_followup.uid = tbl_registration.id', 'left'); 
        
        $this->db->where('tbl_followup.login_id', $customerId);
        $this->db->where('tbl_followup.status', 'Whatsapp connect');
        $this->db->where('tbl_followup.cur_date >=', $fromDate);
        $this->db->where('tbl_followup.cur_date <=', $toDate);
        $this->db->where('tbl_registration.goto_nikah', 0);
        $this->db->where('tbl_registration.hmangalyam', 0);
        
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    public function getCustomer5Data_gotonikah($customerId, $fromDate, $toDate) 
    {
       
        $this->db->select('tbl_followup.*, tbl_registration.goto_nikah'); 
        $this->db->from('tbl_followup');
        $this->db->join('tbl_registration', 'tbl_followup.uid = tbl_registration.id', 'left'); 
        $this->db->where('tbl_followup.login_id', $customerId);
        $this->db->where('tbl_followup.status', 'Whatsapp connect');
        $this->db->where('tbl_followup.cur_date >=', $fromDate);
        $this->db->where('tbl_followup.cur_date <=', $toDate);
        $this->db->where('tbl_registration.goto_nikah', 1);
        
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function getCustomer6Data($customerId, $fromDate, $toDate) 
    {
    
    $this->db->select('tbl_followup.*, tbl_registration.goto_nikah,tbl_registration.hmangalyam'); 
    $this->db->from('tbl_followup');
    $this->db->join('tbl_registration', 'tbl_followup.uid = tbl_registration.id', 'left'); 
    $this->db->where('tbl_followup.login_id', $customerId);
    $this->db->where('tbl_followup.status', 'Interested');
    $this->db->where('tbl_followup.cur_date >=', $fromDate);
    $this->db->where('tbl_followup.cur_date <=', $toDate);
    $this->db->where('tbl_registration.goto_nikah', 0);
    $this->db->where('tbl_registration.hmangalyam', 0);
    
    $query = $this->db->get();
    return $query->result_array();
        
    }
    
    public function getCustomer6Data_gotonikah($customerId, $fromDate, $toDate) 
    {
   
    $this->db->select('tbl_followup.*, tbl_registration.goto_nikah'); 
    $this->db->from('tbl_followup');
    $this->db->join('tbl_registration', 'tbl_followup.uid = tbl_registration.id', 'left'); 
    $this->db->where('tbl_followup.login_id', $customerId);
    $this->db->where('tbl_followup.status', 'Interested');
    $this->db->where('tbl_followup.cur_date >=', $fromDate);
    $this->db->where('tbl_followup.cur_date <=', $toDate);
    $this->db->where('tbl_registration.goto_nikah', 1);
    
    $query = $this->db->get();
    return $query->result_array();
        
    }


    public function getTotalAmount($customerId, $fromDate, $toDate) 
    {
      
    $this->db->select('SUM(tbl_payement.final_amount) as final_total_amount, tbl_payement.*, tbl_registration.goto_nikah,tbl_registration.hmangalyam');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id', 'left');
    $this->db->where('tbl_payement.payment_staff_id', $customerId);
    $this->db->where('tbl_payement.date >=', $fromDate);
    $this->db->where('tbl_payement.date <=', $toDate);
    $this->db->where('tbl_registration.goto_nikah', 0);
    $this->db->where('tbl_registration.hmangalyam', 0);
    
    $query = $this->db->get();
    $result['final_total_amount'] = $query->row()->final_total_amount;
    $result['payment_data'] = $query->result_array(); 
    
    return $result;
    }
    
    public function getTotalAmount_gotonikah($customerId, $fromDate, $toDate) 
    {
       
    $this->db->select('SUM(tbl_payement.final_amount) as final_total_amount, tbl_payement.*, tbl_registration.goto_nikah');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id', 'left');
    $this->db->where('tbl_payement.payment_staff_id', $customerId);
    $this->db->where('tbl_payement.date >=', $fromDate);
    $this->db->where('tbl_payement.date <=', $toDate);
    $this->db->where('tbl_registration.goto_nikah', 1);
    
    $query = $this->db->get();
    $result['final_total_amount'] = $query->row()->final_total_amount;
    $result['payment_data'] = $query->result_array();
    
    return $result;
    }
    
    public function getTotalFollowupList($customerId,$fromDate,$toDate)
    {
        
    $this->db->select('F.uid as followup_uid,F.cur_date,F.message,F.status,F.login_id,R.id,R.happynikah_id,R.name,R.goto_nikah,R.hmangalyam');
    
    $this->db->from('tbl_followup F');
    $this->db->join('tbl_registration R','R.id=F.uid','left');
    $this->db->where('F.login_id', $customerId);
    $this->db->where('R.goto_nikah', 0);
    $this->db->where('R.hmangalyam', 0);
    $this->db->where('F.cur_date >=', $fromDate);
    $this->db->where('F.cur_date <=', $toDate);
    $qu = $this->db->get();
    return $qu->result_array(); 
    }
    
    
    public function getTotalFollowupList_gotonikah($customerId,$fromDate,$toDate)
    {
    $this->db->select('F.uid as followup_uid,F.cur_date,F.message,F.status,F.login_id,
    R.id,R.happynikah_id,R.name,R.goto_nikah');
    $this->db->from('tbl_followup F');
    $this->db->join('tbl_registration R','R.id=F.uid','left');
    $this->db->where('F.login_id', $customerId);
    $this->db->where('R.goto_nikah', 1);
    $this->db->where('F.cur_date >=', $fromDate);
    $this->db->where('F.cur_date <=', $toDate);
    $qu = $this->db->get();
    return $qu->result_array(); 
    }
   
    public function getTotalDeleteList($customerId,$date_ymd_his,$date_ymd_his2)   
    {
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('delete_id', $customerId);
    $this->db->where('status','3');
    $this->db->where('goto_nikah', 0);
    $this->db->where('delete_date >=', $date_ymd_his);
    $this->db->where('delete_date <=', $date_ymd_his2);
    $query = $this->db->get();
    return $query->result_array();
    }
    
    public function getTotalDeleteList_gotonikah($customerId,$date_ymd_his,$date_ymd_his2)   
    {
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('delete_id', $customerId);
    $this->db->where('status','3');
    $this->db->where('goto_nikah', 1);
    $this->db->where('delete_date >=', $date_ymd_his);
    $this->db->where('delete_date <=', $date_ymd_his2);
    $query = $this->db->get();
    return $query->result_array();
    }
   
     public function get_female_count($districts)
    {
    $this->db->select('r.*,d.district_id,d.district');
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_district d','d.district_id = r.native_district');
    $this->db->where('r.gender ','2');
    $this->db->where('d.district', $districts);
    $this->db->where('r.status','1'); 
    $this->db->where('r.goto_nikah','0');
    $this->db->where('r.hmangalyam','0');
    $query = $this->db->get();
    
    return $query->result_array();
    } 
    
    public function get_male_count($districts)
    {
    $this->db->select('r.*,d.district_id,d.district');
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_district d','d.district_id = r.native_district');
    $this->db->where('r.gender ','1');
    $this->db->where('d.district', $districts);
    $this->db->where('r.status','1'); 
    $this->db->where('r.goto_nikah','0');
    $this->db->where('r.hmangalyam','0');
    $query = $this->db->get();
    return $query->result_array();
    }
    
    public function get_female_count_gotonikah($districts)
    {
    $this->db->select('r.*,d.district_id,d.district');
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_district d','d.district_id = r.native_district');
    $this->db->where('r.gender ','2');
    $this->db->where('d.district', $districts);
    $this->db->where('r.status','1'); 
    $this->db->where('r.goto_nikah','1');
    $query = $this->db->get();
    return $query->result_array();
    } 
    
    
    public function get_male_count_gotonikah($districts)
    {
     $this->db->select('r.*,d.district_id,d.district');
     $this->db->from('tbl_registration r');
     $this->db->join('tbl_district d','d.district_id = r.native_district');
     $this->db->where('r.gender ','1');
     $this->db->where('d.district', $districts);
     $this->db->where('r.status','1'); 
     $this->db->where('r.goto_nikah','1');
     $query = $this->db->get();
     return $query->result_array();
    }
    
    public function get_femaledate($from_date,$to_date){
     $this->db->select('*');
     $this->db->from('tbl_registration');
     $this->db->where('gender ','2');
     $this->db->where('reg_date >=',$from_date);
     $this->db->where('reg_date <=',$to_date);
     $this->db->where('status','1'); 
     $this->db->where('goto_nikah','0');
     $this->db->where('hmangalyam','0');
     $this->db->order_by('id','desc');
     $query = $this->db->get();
     return $query->result_array();
    }

    public function get_maledate($from_date,$to_date)
    {
     $this->db->select('*');
     $this->db->from('tbl_registration');
     $this->db->where('gender ','1');
     $this->db->where('reg_date >=',$from_date);
     $this->db->where('reg_date <=',$to_date);
     $this->db->where('status','1'); 
     $this->db->where('goto_nikah','0');
     $this->db->where('hmangalyam','0');
     $this->db->order_by('id','desc');
     
     $query = $this->db->get();
     return $query->result_array();
    }
    
    public function get_femaledategoto($from_date,$to_date)
    {
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('gender ','2');
    $this->db->where('reg_date >=',$from_date);
    $this->db->where('reg_date <=',$to_date);
    $this->db->where('status','1'); 
    $this->db->where('goto_nikah','1');
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_maledategoto($from_date,$to_date)
    {
     $this->db->select('*');
     $this->db->from('tbl_registration');
     $this->db->where('gender ','1');
     $this->db->where('reg_date >=',$from_date);
     $this->db->where('reg_date <=',$to_date);
     $this->db->where('status','1'); 
     $this->db->where('goto_nikah','1');
     $this->db->order_by('id','desc');
     $query = $this->db->get();
     return $query->result_array();
    }  
    
    // public function insertData2($data)
    // {
    // $this->db->insert('tbl_assign_approve_calls', $data);
    // }
    
    
    public function insert_user($data) 
    {
    $this->db->insert('tbl_users1', $data);
    return $this->db->insert_id();
    }
    
    public function insert_employee($data) 
    {
    $this->db->insert('tbl_employees1', $data);
    }

    public function insertData($data)
    {
    $this->db->insert('tbl_target', $data);
    }
    
    public function insertData_gotonikah($data)
    {
     $this->db->insert('tbl_target', $data);
    }
    
    public function GetQuickcalls()
	{
		$this->db->select('*');
		$this->db->from('tbl_registration');
        $this->db->where_in('stage',array('0','1'));
     	$this->db->where_in('reg_through',array('0','2'));
		$this->db->where('status','0');
// 		$this->db->where('state','18');
		$this->db->where('goto_nikah','0');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function GetQuickcalls_gotonikah()
	{
		$this->db->select('*');
		$this->db->from('tbl_registration');
        $this->db->where_in('stage',array('0','1'));
     	$this->db->where_in('reg_through',array('0','2'));
		$this->db->where('status','0');
		$this->db->where('goto_nikah','1');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function GetQuickregister()
	{
        $this->db->select('r.*,d.district,d.district_id');
        $this->db->from('tbl_registration r');
        $this->db->join('tbl_district d', 'd.district_id=r.home_district', 'left');

        $this->db->where('r.stage','0');
        $this->db->where('r.countryCode','91');
        $this->db->group_start();
        $this->db->where('r.state', '18');
        $this->db->or_where('r.state IS NULL', NULL, false);
        $this->db->group_end();
        
        // $this->db->where('state','18');
        // $this->db->or_where('home_state','18');
        
        $this->db->where('r.reg_date >=', '2023-12-20');
        $this->db->where('r.reg_date <=', date('Y-m-d')); 
        $this->db->where_in('r.reg_through',array('0','2'));
        $this->db->where('r.status','0');
        $this->db->where('r.goto_nikah','0');
        $this->db->where('r.hmangalyam','0');
        $this->db->order_by('r.id','desc');
        $query = $this->db->get();
        return $query->result();
	}
	
	public function Getotherstate()
	{
        // $this->db->select('*');
        // $this->db->from('tbl_registration');
        // $this->db->where_in('stage',array('0','1'));
        // $this->db->where_in('reg_through',array('0','2'));
        // $this->db->where('countryCode','91');
        // $this->db->where_not_in('state', array('NULL','18'));
        // $this->db->where('status','0');
        // $this->db->where('goto_nikah','0');
        // $this->db->where('hmangalyam','0');
        // $this->db->order_by('id','desc');
        
        
        $this->db->select('tbl_registration.*, tbl_district.district');
        $this->db->from('tbl_registration');
        $this->db->join('tbl_district', 'tbl_registration.home_district = tbl_district.district_id', 'left');
        $this->db->where_in('tbl_registration.stage', array('0', '1'));
        $this->db->where_in('tbl_registration.reg_through', array('0', '2'));
        $this->db->where('tbl_registration.countryCode', '91');
        $this->db->where_not_in('tbl_registration.state', array('NULL', '18'));
        $this->db->where('tbl_registration.status', '0');
        $this->db->where('tbl_registration.goto_nikah', '0');
        $this->db->where('tbl_registration.hmangalyam', '0');
        $this->db->order_by('tbl_registration.id', 'desc');
// $query = $this->db->get();


		$query = $this->db->get();
		return $query->result();
	}
	
	public function GetQuickregister_goto()
	{
	    
	    $this->db->select('r.*,d.district,d.district_id');
        $this->db->from('tbl_registration r');
        $this->db->join('tbl_district d', 'd.district_id=r.home_district', 'left');

        $this->db->where('r.stage','0');
        $this->db->where('r.countryCode','91');
        $this->db->group_start();
        $this->db->where('r.state', '18');
        $this->db->or_where('r.state IS NULL', NULL, false);
        $this->db->group_end();

        $this->db->where_in('r.reg_through',array('0','2'));
        $this->db->where('r.status','0');
        $this->db->where('r.goto_nikah','1');
        $this->db->order_by('r.id','desc');
        
		$query = $this->db->get();
		return $query->result();
	}
	
	public function Getstage3()
	{
	    
        $this->db->select('r.*,d.district,d.district_id');
        $this->db->from('tbl_registration r');
        $this->db->join('tbl_district d', 'd.district_id=r.home_district', 'left');
    
        $this->db->where('r.stage <>', 0);
        $this->db->where('r.countryCode', '91');
        $this->db->group_start();
        $this->db->where('r.state', '18');
        $this->db->or_where('r.state IS NULL', NULL, false);
        $this->db->group_end();
        $this->db->where('r.reg_date >=', '2023-12-05');
        $this->db->where_in('r.reg_through', array('0', '2'));
        $this->db->where('r.status', '0');
        $this->db->where('r.goto_nikah', '0');
        $this->db->where('r.hmangalyam', '0');
        $this->db->order_by('r.id', 'desc');
		
		$query = $this->db->get();
		return $query->result();
	}
	
	public function GetGulfData()
    {
    $this->db->select('R.id, R.happynikah_id, R.name, R.phone, R.countryCode,R.reg_date, R.reg_through');
    $this->db->from('tbl_registration R');
    $this->db->where_in('R.reg_through', array('0', '2')); 
    $this->db->where_in('R.countryCode', array('973','965','968','974','966','967','971'));
    $this->db->where('R.status','0'); 
    $this->db->where('R.goto_nikah','0');
    $this->db->where('R.hmangalyam','0');
    $query = $this->db->get();    
    return $query->result();
    }
    
    public function GetGulfData_gotonikah()
    {
    $this->db->select('R.id, R.happynikah_id, R.name, R.phone, R.countryCode,R.reg_date, R.reg_through');
    $this->db->from('tbl_registration R');
    $this->db->where_in('R.reg_through', array('0', '2')); 
    $this->db->where_in('R.countryCode', array('973','965','968','974','966','967','971'));
    $this->db->where('R.status','0'); 
    $this->db->where('R.goto_nikah','1');
    $query = $this->db->get();    
    return $query->result();
    }
    
	
	public function Getstage3_goto()
	{
	
    $this->db->select('r.*,d.district,d.district_id');
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_district d', 'd.district_id=r.home_district', 'left');
        
    $this->db->where('r.stage <>', 0);
    $this->db->where('r.countryCode', '91');
    $this->db->group_start();
    $this->db->where('r.state', '18');
    $this->db->or_where('r.state IS NULL', NULL, false);
    $this->db->group_end();
    // $this->db->where('reg_date >=', '2023-12-05');
    $this->db->where_in('r.reg_through', array('0', '2'));
    $this->db->where('r.status', '0');
    $this->db->where('r.goto_nikah', '1');
    $this->db->order_by('r.id', 'desc');
	
	$query = $this->db->get();
	return $query->result();
	}
	
	public function Getapproveldata()
	{
		$this->db->select('*');
		$this->db->from('tbl_registration');
		$this->db->where_in('reg_through',array('0','2'));
        $this->db->where('stage','4');
        $reg_date='2023-09-01';
        $this->db->where('reg_date >=',$reg_date);
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
		
		$query = $this->db->get();
		return $query->result();
	}
	
	
    public function quick_contacts() 
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        $this->db->where('stage',1);
        $this->db->order_by('id','desc');
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function fetchData($limit,$offset)  
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        $this->db->where('status','1');
        $this->db->where('reg_date !=',date('Y-m-d'));
        $this->db->limit($limit,$offset);
        $query = $this->db->get();

        return $query->result();
    }
    
   public function is_phone_available($phone)  
    {  
       
        // $this->db->where('phone', $phone);
        // $this->db->or_where('other_contact_number', $phone);
        // $this->db->where('status','1'); 
        // $query = $this->db->get("tbl_registration");  
        
        // if($query->num_rows() > 0)  
        // {  
        // return true;  
        // }  
        // else  
        // {  
        // return false;  
        // }  
        
    $this->db->select('status');   
    $this->db->where("(phone = '$phone' OR other_contact_number = '$phone')");
    $query = $this->db->get("tbl_registration");

    // echo $this->db->last_query();

    if($query->num_rows() > 0) 
    {
        $result = $query->row();
        //  var_dump($result);
         
        if($result->status=='1') {
        return 'registered';
        } 
        
        elseif($result->status=='3') 
        {
            return 'available';
        }
    }
    return 'available';
        
    }  
    
    
    public function get_data_items($limit, $offset)
    {

        $this->db->select('*');
        $this->db->from('tbl_registration');
        $this->db->limit($limit, $offset);
        $this->db->where('status','1');
        $this->db->where('reg_date !=',date('Y-m-d'));
        $query = $this->db->get();
      
        return $query->result();
    }
    
    
    public function updateNikahType($user_id, $new_nikah_type)
    {
    $data = array('nikah_type' => $new_nikah_type);
    
    $this->db->where('user_id', $user_id);
    $this->db->update('tbl_employees1', $data);
    }
    
    
    public function profile_delete_id($id,$emp_id,$status,$reason_status,$message,$delete_date)
    {
        
    $data1= array('delete_id'=>$emp_id,'status'=>$status,'reason_status'=>$reason_status,'message'=>$message,'delete_date'=>$delete_date);
    $this->db->where('id',$id);
    $query=$this->db->update('tbl_registration',$data1);
        
    return $query;
    }
    
    
    public function profile_approvel_id($id,$emp_id,$status,$reason_status,$message,$delete_date,$pending_status)
    {
 
    $data1= array('approve_id'=>$emp_id,'status'=>$status,'reason_status'=>$reason_status,
                 'message'=>$message,'delete_date'=>$delete_date,'pending_status'=>$pending_status);
    $this->db->where('id',$id);
    $query=$this->db->update('tbl_registration',$data1);
        
    return $query;
    }
    
    
    public function get_all_excel()
    {
    $this->db->select('r.happynikah_id,r.reg_date,r.name,r.native_place,h.height,w.weight,r.status,r.goto_nikah,r.id,r.age');
    $this->db->select('CASE WHEN r.gender = "1" THEN "Male" WHEN r.gender = "2" THEN "Female" ELSE "Unknown" END AS gender', FALSE);
    $this->db->select('c.caste,r.marital_status,d.district,e.education,f.financial_status');
    $this->db->select('CASE WHEN r.photo = "" OR r.photo IS NULL THEN "No Photo" ELSE "Photo Available" END AS photo_status', FALSE);
    $this->db->from('tbl_registration r');
    
    // $this->db->join('tbl_height h', 'r.height = h.height_id');
    // $this->db->join('tbl_weight w', 'r.weight = w.weight_id');
    // $this->db->join('tbl_district d', 'r.native_district = d.district_id');
    // $this->db->join('tbl_education e', 'r.education= e.edu_id');
    // $this->db->join('tbl_caste c', 'r.caste = c.cid');
    // $this->db->join('tbl_familyprofile f', 'r.id =f.user_id');
    
    $this->db->join('tbl_height h', 'r.height = h.height_id', 'LEFT');
    $this->db->join('tbl_weight w', 'r.weight = w.weight_id', 'LEFT');
    $this->db->join('tbl_district d', 'r.native_district = d.district_id', 'LEFT');
    $this->db->join('tbl_education e', 'r.education= e.edu_id', 'LEFT');
    $this->db->join('tbl_caste c', 'r.caste = c.cid', 'LEFT');
    $this->db->join('tbl_familyprofile f', 'r.id =f.user_id', 'LEFT');
    
    $this->db->where('r.status','1'); 
    $this->db->where('r.goto_nikah','0');
    $this->db->order_by('r.id','desc');
    
    $query = $this->db->get();
    return $query->result_array();
    }
    
    
    public function get_all_excel_gotonikah()
    {
    $this->db->select('r.happynikah_id,r.reg_date,r.name,r.native_place,h.height,w.weight,r.status,r.goto_nikah,r.id,r.age');
    $this->db->select('CASE WHEN r.gender = "1" THEN "Male" WHEN r.gender = "2" THEN "Female" ELSE "Unknown" END AS gender', FALSE);
    $this->db->select('c.caste,r.marital_status,d.district,e.education,f.financial_status');
    $this->db->select('CASE WHEN r.photo = "" OR r.photo IS NULL THEN "No Photo" ELSE "Photo Available" END AS photo_status', FALSE);
    
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_height h', 'r.height = h.height_id', 'LEFT');
    $this->db->join('tbl_weight w', 'r.weight = w.weight_id', 'LEFT');
    $this->db->join('tbl_district d', 'r.native_district = d.district_id', 'LEFT');
    $this->db->join('tbl_education e', 'r.education= e.edu_id', 'LEFT');
    $this->db->join('tbl_caste c', 'r.caste = c.cid', 'LEFT');
    $this->db->join('tbl_familyprofile f', 'r.id =f.user_id', 'LEFT');
    
    $this->db->where('r.status','1'); 
    $this->db->where('r.goto_nikah','1');
    $this->db->order_by('r.id','desc');
    
    $query = $this->db->get();
    return $query->result_array();
    }

    
    public function profile_undelete_id($id,$emp_id,$status,$reason_status,$message,$delete_date)
    {

        $data1= array('undelete_id'=>$emp_id,'status'=>$status,'undelete_reason'=>$reason_status,
                       'undelete_message'=>$message,'undelete_date'=>$delete_date);
        $this->db->where('id',$id);
        $query=$this->db->update('tbl_registration',$data1);
            
        return $query;
    }

 
    public function employeeList() 
    {
		$this->db->select(array('id', 'name', 'reg_date', 'phone'));
		$this->db->from('tbl_registration');
		$this->db->limit(10);  
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
    public function unapprovephoto()
    {

        // $this->db->select('*');
        // $this->db->from('tbl_userimages');
        // $this->db->where('status',0);
        // $this->db->order_by('user_image_id','desc');
        // $query = $this->db->get();
        // $result = $query->result();
        // return $result;
        
        $this->db->select('tbl_userimages.*,tbl_registration.goto_nikah,tbl_registration.hmangalyam');
        $this->db->from('tbl_userimages');
        $this->db->join('tbl_registration','tbl_registration.id = tbl_userimages.user_id');
        $this->db->where('tbl_userimages.status', 0);
        $this->db->where('tbl_registration.goto_nikah', 0);
        $this->db->where('tbl_registration.hmangalyam', 0);
        $this->db->order_by('tbl_userimages.user_image_id', 'desc');
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }
    
    public function unapprovephoto_gotonikah()
    {
        $this->db->select('tbl_userimages.*,tbl_registration.goto_nikah');
        $this->db->from('tbl_userimages');
         $this->db->join('tbl_registration','tbl_registration.id = tbl_userimages.user_id');
        $this->db->where('tbl_userimages.status', 0);
        $this->db->where('tbl_registration.goto_nikah', 1);
        // $this->db->or_where('piccount', 1);
        $this->db->order_by('tbl_userimages.user_image_id', 'desc');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function unapprovephoto_2()
    {

        $this->db->select('*');
        $this->db->from('tbl_userimages');
        $this->db->where(array('status' => 0,'piccount' =>2));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function unapprovephoto_3()
    {

        $this->db->select('*');
        $this->db->from('tbl_userimages');
        $this->db->where(array('status' => 0,'piccount' =>3));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function unapprovephoto_4()
    {

        $this->db->select('*');
        $this->db->from('tbl_userimages');
        $this->db->where(array('status' => 0,'piccount' =>4));
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }
    
    public function AddHideProfile($user_id,$hide_status,$emp_id,$hide_date,$hide_description)
    { 
        
       $hide=$this->db->select('*')->from('tbl_hideprofile')->where('user_id',$user_id)->get()->num_rows();
       
        if($hide=='0')
        {
        $data = array('user_id' =>$user_id ,'hide_status'=>$hide_status,'emp_id'=>$emp_id,
        'hide_date'=>$hide_date,'hide_description'=>$hide_description);
        $this->db->insert('tbl_hideprofile',$data); 
        return $this->db->insert_id();
        }
        
        else
        {
        $data= array('hide_status' =>$hide_status,'emp_id'=>$emp_id,'hide_date'=>$hide_date,'hide_description'=>$hide_description);
        $this->db->where('user_id',$user_id);
        $query=$this->db->update('tbl_hideprofile',$data);
        
        return $query;
        }
        
    }

    public function BlockProfile($id,$status,$block_status,$block_description,$emp_id,$block_date)
    {      
        $data1= array('status'=>$status,'block_status'=>$block_status,'block_description'=>$block_description,'block_id'=>$emp_id,'block_date'=>$block_date);
        $this->db->where('id',$id);
        $query=$this->db->update('tbl_registration',$data1);
        
        return $query;
    }
    
    public function ChangePassword($id,$password,$emp_id,$date,$status,$msg)
    {
        
         $data=array('password' => $password,'emp_id' => $emp_id,'changedate'=>$date,'status'=>$status,'message'=>$msg);  
         $this->db->where('user_id',$id);
         $query=$this->db->update('tbl_userlogin',$data); 
    }
    
    public function countFilteredData($selectedDepartment)
    {
        
    if ($selectedDepartment === '31') 
    {
    $this->db->where('direct', '31');
    }
    
    elseif ($selectedDepartment === '32')
    {
    $this->db->where('direct', '32');
    }
    else 
    {
    
    return 0;
    }
    
    $query = $this->db->get('tbl_registration');
    return $query->num_rows();
    }
    
    public function getFilteredDataByDepartment($selectedDepartment, $limit, $start)
    {
    
    if ($selectedDepartment === '31')
    {
    $this->db->where('direct', '31');
    }
    
    elseif($selectedDepartment === '32') 
    {
    $this->db->where('direct', '32');
    } 
    
    else
    {
    
    return array();
    }
    
    $this->db->where('assign_status!=','Inactive');
    $this->db->limit($limit, $start);
    $query = $this->db->get('tbl_registration');
    return $query->result();
    }
    
    public function getFilteredDataByDepartment2()
    {
    $ydate=date('2023-07-26');
    $where=array('tr.status!='=>'3','tr.reg_through'=>'1','tr.assign_status!='=>'Inactive');
    $this->db->select('tr.*, tasp.action_check');
    $this->db->from('tbl_registration as tr');
    $this->db->join('tbl_assign_approve_calls as tasp','tasp.action_check = tr.id','left');
    $this->db->where('tr.direct','32');
    $this->db->where('tr.reg_date>=',$ydate);
    $this->db->where($where);
    return $this->db->get()->result();
    }
    
    
    public function changeadminpassword($user_id,$password,$date)
    {
     $data=array('password' => $password,'date'=>$date);  
     $this->db->where('user_id',$user_id);
     $query=$this->db->update('tbl_employees1',$data); 
    }
    
    public function payment_done($LoggedUserID)
    {
        $this->db->select('tbl_payement.*,tbl_plan.*');
        $this->db->from("tbl_payement");
        $this->db->join('tbl_plan','tbl_plan.plan_id=tbl_payement.plan_id');
        $this->db->where('user_id',$LoggedUserID);
        $this->db->where('tbl_payement.status','1');
        $this->db->order_by('tbl_payement.id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_chatsenders($senderid,$planid)
    {
        
    $this->db->select("c.chat_id");
    $this->db->from("tbl_chating c");
    $this->db->where("c.sender_id", $senderid);
    $this->db->where("c.planid", $planid);
    $this->db->distinct('c.receiver_id');
    $this->db->group_by("c.receiver_id");
    $chatreceivers = $this->db->get();
    
    return $chatreceivers->num_rows();
    }
    
    public function GetFullData($table = '',$column = '',$column_value = '',$valtype='')
    {
        
        $column_values=explode(",",$column_value);
        $this->db->select('*');
        $this->db->from($table);
        
        if($table == 'tbl_height' && $column_value !='')
        {
         $this->db->where('height_id >=',$column_value);
        }
        
        if($column != '' && $column_value !='' && $valtype!="arrayvals")
        {
          $this->db->where($column,$column_value);
        }
        
        if($table == 'tbl_registration')
        {
         $this->db->order_by('id','desc');
        }
        
        if($valtype=="arrayvals")
        {
         $this->db->where_in($column,$column_values);
        }
        
        $query = $this->db->get();
       
        return $query->result();
        
    }
    
    public function GetFullData_goto($table = '',$column = '',$column_value = '',$valtype='')
    {
        
        $column_values=explode(",",$column_value);
        $this->db->select('*');
        $this->db->from($table);
         $this->db->where('goto_nikah','1');
        if($table == 'tbl_height' && $column_value !='')
        {
         $this->db->where('height_id >=',$column_value);
        }
        
        if($column != '' && $column_value !='' && $valtype!="arrayvals")
        {
          $this->db->where($column,$column_value);
        }
        
        if($table == 'tbl_registration')
        {
         $this->db->order_by('id','desc');
        }
        
        if($valtype=="arrayvals")
        {
         $this->db->where_in($column,$column_values);
        }
        
        $query = $this->db->get();
       
        return $query->result();
        
    }
    
    public function GetFullData1($table,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        
        if($where !='')
        {
            foreach($where as $key=>$value)
            {
                $this->db->where($key,$value);
            }
        }
        if($table == 'tbl_registration'){
            $this->db->order_by('id','desc');
        }
        
        $query = $this->db->get();
        return $query->result();
    }
    
    public function AddRecord($table = NULL, $data = []) 
    { 
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    
    public function fetch_hnID($ID)
    {
        $this->db->select('happynikah_id,phone');
        $this->db->from('tbl_registration');
        $this->db->where('id',$ID);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function search_profiles($search)
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        if($search != '')
        {
            $this->db->like('phone',$search);
            // $this->db->or_like('other_contact_number',$search);
            $this->db->or_like('happynikah_id',$search);
        }
        
        $query = $this->db->get();

        return $query->row();
    }
    
    
     public function search_profphoneno($search)
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        if($search != '')
        {
            $this->db->like('phone',$search);
            // $this->db->or_like('other_contact_number',$search);
            // $this->db->or_like('happynikah_id',$search);
        }
        
        $query = $this->db->get();

        return $query->result_array();
    }
    
    
    
     public function search_prof($search)
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        if($search != '')
        {
            $this->db->like('phone',$search);
            // $this->db->or_like('other_contact_number',$search);
            $this->db->or_like('happynikah_id',$search);
        }
        
        $query = $this->db->get();

        return $query->num_rows();
    }
    
    
     public function getUsers($postData = null) 
     {

        $response = array();


        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; 
        $columnIndex = $postData['order'][0]['column']; 
        $columnName = $postData['columns'][$columnIndex]['data']; 
        $columnSortOrder = $postData['order'][0]['dir']; 
        $searchValue = $postData['search']['value']; 

        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
     
      
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if ($searchCity != '') 
        {
        $search_arr[] = " direct='" . $searchCity . "' ";
        }
      
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;

  
        $this->db->select('count(*) as allcount');
        
        if ($searchQuery != '') 
        {
            $this->db->where($searchQuery);
        }
        
        $ydate=date('2023-10-04');
        
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        // $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        $this->db->join('tbl_payement U', 'C.id = U.user_id', 'left');
        $this->db->join('tbl_paymentrequest P', 'C.id = P.payment_id AND P.delete_status = "Active"', 'left');
        $this->db->join('tbl_followup F', 'C.id = F.uid AND F.delete_status = "Active"', 'left');
        $this->db->where('C.status', '1');
        $this->db->where('C.goto_nikah', '0');
        $this->db->where('C.reg_date>=', $ydate);
        $this->db->where('P.payment_id IS NULL');
        $this->db->where('F.uid IS NULL');
       $this->db->where('U.user_id IS NULL');
        $this->db->where('C.assign_status !=', 'Inactive');
        $this->db->order_by('cid', 'desc');
        
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;


        // $this->db->select('*');
        if ($searchQuery != '') 
        
        {
            $this->db->where($searchQuery);
        }
        
        
        $ydate=date('2023-10-04');
        
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        // $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        $this->db->join('tbl_payement U', 'C.id = U.user_id', 'left');
        $this->db->join('tbl_paymentrequest P', 'C.id = P.payment_id AND P.delete_status = "Active"', 'left'); 
        $this->db->join('tbl_followup F', 'C.id = F.uid AND F.delete_status = "Active"', 'left');
        $this->db->where('C.status', '1');
        $this->db->where('C.goto_nikah', '0');
        $this->db->where('C.reg_date>=', $ydate);
        $this->db->where('P.payment_id IS NULL');
        $this->db->where('F.uid IS NULL');
        // $this->db->where('(U.user_id IS NULL OR U.status = 0)');
        $this->db->where('U.user_id IS NULL');

        $this->db->where('C.assign_status !=', 'Inactive');
        $this->db->order_by('cid', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();
        
        
        $data = array();

        foreach ($records as $record) 
        {
        
        $data[] = array(
        "happynikah_id" => $record->happynikah_id,
        "name" => $record->name,
        "reg_date" => $record->reg_date,
        "native_place" => $record->native_place,
        // "city" => $record->city,
        "cid" => $record->cid
        );
        }
        
        
        $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
        );
        
        return $response;
        }
    
    
        public function getUsers_gotonikah($postData = null) 
        {

        $response = array();


        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; 
        $columnIndex = $postData['order'][0]['column']; 
        $columnName = $postData['columns'][$columnIndex]['data']; 
        $columnSortOrder = $postData['order'][0]['dir']; 
        $searchValue = $postData['search']['value']; 
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
     
        $search_arr = array();
        $searchQuery = "";
        
        if ($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if ($searchCity != '') 
        {
        $search_arr[] = " direct='" . $searchCity . "' ";
        }
      
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;

  
        $this->db->select('count(*) as allcount');
        
        if ($searchQuery != '') 
        {
            $this->db->where($searchQuery);
        }

        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        $this->db->join('tbl_paymentrequest P', 'C.id = P.payment_id AND P.delete_status = "Active"', 'left');
        $this->db->join('tbl_followup F', 'C.id = F.uid AND F.delete_status = "Active"', 'left');
        $this->db->where('C.status', '1');
        $this->db->where('C.goto_nikah', '1');
        $this->db->where('C.assign_status !=', 'Inactive');
        $this->db->order_by('cid', 'desc');
        
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;


        // $this->db->select('*');
        if($searchQuery != '') 
        {
        $this->db->where($searchQuery);
        }
        
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        $this->db->join('tbl_paymentrequest P', 'C.id = P.payment_id AND P.delete_status = "Active"', 'left'); 
        $this->db->join('tbl_followup F', 'C.id = F.uid AND F.delete_status = "Active"', 'left');
        $this->db->where('C.status', '1');
        $this->db->where('C.goto_nikah', '1');
        $this->db->where('C.assign_status !=', 'Inactive');
        $this->db->order_by('cid', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();
        
        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
                "happynikah_id" => $record->happynikah_id,
                "name" => $record->name,
                "reg_date" => $record->reg_date,
                "native_place" => $record->native_place,
                // "city" => $record->city,
                "cid" => $record->cid
            );
        }


        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
     }
    
     public function getUsers_approve_all($postData = null) 
     {

        $response = array();
        
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; 
        $columnIndex = $postData['order'][0]['column']; 
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir']; 
        $searchValue = $postData['search']['value'];
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
        
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if ($searchCity != '') 
        {
            $search_arr[] = " direct='" . $searchCity . "' ";
        }
        
        
        if(count($search_arr) > 0) 
        {
            $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        
        $totalRecords = $records[0]->allcount;
        $this->db->select('count(*) as allcount');
        
        if ($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $this->db->where('status', '1');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->where('goto_nikah', '0');
        $this->db->where('hmangalyam', '0');
        $this->db->order_by('id', 'desc');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecordwithFilter = $records[0]->allcount;


        $this->db->select('*');
        if ($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $this->db->where('status','1');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->where('goto_nikah', '0');
        $this->db->where('hmangalyam', '0');
        $this->db->order_by('id', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('tbl_registration')->result();

        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
            "happynikah_id" => $record->happynikah_id,
            "name" => $record->name,
            "reg_date" => $record->reg_date,
            "phone" => $record->phone,
            "id" => $record->id,
            );
        }
        
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }


     public function getUsers_approve_all_gotonikah($postData = null) 
     {

        $response = array();
        
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';

        $search_arr = array();
        
        $searchQuery = "";
        
        if($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if($searchCity != '') 
        {
            $search_arr[] = " direct='" . $searchCity . "' ";
        }
        
        if(count($search_arr) > 0) 
        {
            $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;


        $this->db->select('count(*) as allcount');
        if ($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        
        $this->db->where('status', '1');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->where('goto_nikah', '1');
        $this->db->order_by('id', 'desc');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        $this->db->select('*');
        if ($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        $this->db->where('status','1');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->where('goto_nikah', '1');
        $this->db->order_by('id', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('tbl_registration')->result();

        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
                "happynikah_id" => $record->happynikah_id,
                "name" => $record->name,
                "reg_date" => $record->reg_date,
                "phone" => $record->phone,
                 "id" => $record->id,
            );
        }


        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    
    

    //  public function getUsersall($postData = null) 
    //  {

    //     $response = array();
        
    //     $draw = $postData['draw'];
    //     $start = $postData['start'];
    //     $rowperpage = $postData['length'];
    //     $columnIndex = $postData['order'][0]['column'];
    //     $columnName = $postData['columns'][$columnIndex]['data'];
    //     $columnSortOrder = $postData['order'][0]['dir']; 
    //     $searchValue = $postData['search']['value']; 
    //     $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
    //     $searchEducation = isset($postData['searchEducation']) ? $postData['searchEducation'] : '';
    //     $searchProfession = isset($postData['searchProfession']) ? $postData['searchProfession'] : '';
    //     $searchGender = isset($postData['searchGender']) ? $postData['searchGender'] : '';
        
    //     $search_arr = array();
    //     $searchQuery = "";
        
    //     if ($searchValue != '') 
    //     {
    //         $search_arr[] = " (name like '%" . $searchValue . "%' or 
    //         happynikah_id like '%" . $searchValue . "%' or 
    //         reg_date like'%" . $searchValue . "%' ) ";
    //     }
        
    //     if($searchCity != '') 
    //     {
    //      $search_arr[] = " direct='" . $searchCity . "' ";
    //     }
        
    //     if($searchEducation != '') 
    //     {
    //      $search_arr[] = " r.education='" . $searchEducation . "' ";
    //     }
        
         
    //     if($searchProfession != '') 
    //     {
    //      $search_arr[] = " r.occupation='" . $searchProfession . "' ";
    //     }
        
    //     if ($searchGender != '') 
    //     {
    //      $search_arr[] = " r.gender='" . $searchGender . "' ";
    //     }
        
    //     if(count($search_arr) > 0) 
    //     {
    //       $searchQuery = implode(" and ", $search_arr);
    //     }

    //     $this->db->select('count(*) as allcount');
        
    //     if ($searchQuery != '') 
    //     {
    //     $this->db->where($searchQuery);
    //     }
        
    //     $records = $this->db->get('tbl_registration r')->result();
    //     $totalRecords = $records[0]->allcount;

    //     $this->db->select('count(*) as allcount');
        
    //     if($searchQuery != '') 
    //     {
    //      $this->db->where($searchQuery);
    //     }
        
    //     $this->db->select('r.*'); 
    //     $this->db->from('tbl_registration r');
    //     $this->db->where('r.status', '1');
    //     $this->db->where('r.assign_status !=', 'Inactive');
    //     $this->db->order_by('r.id', 'desc');
    //     $this->db->order_by($columnName, $columnSortOrder);
    //     $this->db->limit($rowperpage, $start);
    //     $records = $this->db->get()->result();
        
    //     $totalRecordwithFilter = $records[0]->allcount;

    //     $this->db->select('*');
        
    //     if($searchQuery != '') 
    //     {
    //      $this->db->where($searchQuery);
    //     }
        
    //     $this->db->select('r.happynikah_id,r.name,r.reg_date,r.phone,r.id,r.education as edn,r.occupation, e.edu_id,e.education as edu,p.profession_id,p.profession_name');
    //     $this->db->from('tbl_registration r');
    //     $this->db->join('tbl_education e', 'r.education=e.edu_id','left');
    //     $this->db->join('tbl_profession p', 'p.profession_id=r.occupation');
        
    //     $this->db->where('r.status', '1');
    //     $this->db->where('r.assign_status !=', 'Inactive');
    //     $this->db->order_by('r.id', 'desc');
    //     $this->db->order_by($columnName, $columnSortOrder);
    //     $this->db->limit($rowperpage, $start);
    //     $records = $this->db->get()->result();

    //     $data = array();

    //     foreach ($records as $record) 
    //     {

    //         $data[] = array(
    //         "happynikah_id" => $record->happynikah_id,
    //         "name" => $record->name,
    //         "reg_date" => $record->reg_date,
    //         "phone" => $record->phone,
    //         "id" => $record->id,
    //         "edu" => $record->education,
    //         "profession_name" => $record->profession_name,
    //         );
    //     }

    //     $response = array(
    //         "draw" => intval($draw),
    //         "iTotalRecords" => $totalRecords,
    //         "iTotalDisplayRecords" => $totalRecordwithFilter,
    //         "aaData" => $data
    //     );

    //     return $response;
    // }
    
    
    
    
        public function getUsersall($postData = null) 
        {
        $response = array();

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir']; 
        $searchValue = $postData['search']['value']; 
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
        $searchEducation = isset($postData['searchEducation']) ? $postData['searchEducation'] : '';
        $searchProfession = isset($postData['searchProfession']) ? $postData['searchProfession'] : '';
        $searchGender = isset($postData['searchGender']) ? $postData['searchGender'] : '';

        $search_arr = array();
        $searchQuery = "";

        if ($searchValue != '') 
        {
        $search_arr[] = " (name like '%" . $searchValue . "%' or 
        happynikah_id like '%" . $searchValue . "%' or 
        reg_date like'%" . $searchValue . "%' ) ";
        }

        if($searchCity != '') 
        {
        $search_arr[] = " direct='" . $searchCity . "' ";
        }

        if($searchEducation != '') 
        {
        $search_arr[] = " r.education='" . $searchEducation . "' ";
        }

        if($searchProfession != '') 
        {
        $search_arr[] = " r.occupation='" . $searchProfession . "' ";
        }

        if ($searchGender != '') 
        {
        $search_arr[] = " r.gender='" . $searchGender . "' ";
        }

        if(count($search_arr) > 0) 
        {
        $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');

        if ($searchQuery != '') 
        {
        $this->db->where($searchQuery);
        }

        $this->db->from('tbl_registration r');
        $this->db->where('r.status', '1');
        $this->db->where('r.goto_nikah', '0');
        $this->db->where('r.hmangalyam', '0');
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        $this->db->select('r.happynikah_id,r.name,r.reg_date,r.phone,r.id,
        r.education as edn,r.occupation, e.edu_id,e.education as edu,p.profession_id,p.profession_name');
        $this->db->from('tbl_registration r');

        $this->db->join('tbl_education e', 'r.education=e.edu_id', 'left');
        $this->db->join('tbl_profession p', 'p.profession_id=r.occupation', 'left');

        if($searchQuery != '') 
        {
        $this->db->where($searchQuery);
        }

        $this->db->where('r.status', '1');
        $this->db->where('r.goto_nikah', '0');
        $this->db->where('r.hmangalyam', '0');
        
        $this->db->order_by('r.id', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();

        foreach ($records as $record) 
        {
        $data[] = array(
        "happynikah_id" => $record->happynikah_id,
        "name" => $record->name,
        "reg_date" => $record->reg_date,
        "phone" => $record->phone,
        "id" => $record->id,
        "edu" => $record->edu,
        "profession_name" => $record->profession_name,
        );
        }

        $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecords,
        "aaData" => $data
        );

        return $response;
        }
        
    
        public function getUsersForExport($postData = null) 
        {
        
        
        $this->db->select('r.happynikah_id, r.name, r.reg_date, r.phone, r.id, r.education as edn,r.native_district,d.district,r.occupation, e.edu_id, e.education as edu, p.profession_id, p.profession_name, 
        (CASE
        WHEN r.gender = 1 THEN "Male"
        WHEN r.gender = 2 THEN "Female"
        ELSE "Other"
        END) as gender,
        (CASE
        WHEN r.photo IS NULL OR r.photo = "" THEN "Unavailable"
        ELSE "Available"
        END) as photo_status');
        $this->db->from('tbl_registration r');
        $this->db->join('tbl_education e', 'r.education=e.edu_id', 'left');
        $this->db->join('tbl_profession p', 'p.profession_id=r.occupation', 'left');
        $this->db->join('tbl_district d', 'd.district_id=r.native_district', 'left');
        
        
        
        $this->db->where('r.status', '1');
        $this->db->where('r.goto_nikah', '0');
        $this->db->where('r.hmangalyam', '0');
        // $this->db->where('r.assign_status !=', 'Inactive');
        
        if(!empty($postData['searchCity'])) 
        {
        $this->db->where('r.city', $postData['searchCity']);
        }
        
        if(!empty($postData['searchEducation'])) 
        {
        $this->db->where('r.education', $postData['searchEducation']);
        }
        
        if(!empty($postData['searchProfession'])) 
        {
        $this->db->where('r.occupation', $postData['searchProfession']);
        }
        
        if(!empty($postData['searchGender']))
        {
        $this->db->where('r.gender', $postData['searchGender']);
        }
        
        $this->db->order_by('r.id', 'desc');
        
        return $this->db->get()->result_array();
        }
        
        
        
        public function getUsersForExport_nophoto($postData = null) 
        {
        
        $this->db->select('r.happynikah_id, r.name, r.reg_date, r.phone, r.id, r.education as edn,r.native_district,d.district,r.occupation, e.edu_id, e.education as edu, p.profession_id, p.profession_name, 
        (CASE
        WHEN r.gender = 1 THEN "Male"
        WHEN r.gender = 2 THEN "Female"
        ELSE "Other"
        END) as gender');
        $this->db->from('tbl_registration r');
        $this->db->join('tbl_education e', 'r.education=e.edu_id', 'left');
        $this->db->join('tbl_profession p', 'p.profession_id=r.occupation', 'left');
        $this->db->join('tbl_district d', 'd.district_id=r.native_district', 'left');
        
        $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE r.id = U.user_id)', null, false); 
        $this->db->where('r.status', '1');
        $this->db->where('r.goto_nikah', '0');
        $this->db->where('r.hmangalyam', '0');                                                                                                                                         
        $this->db->where('r.photo', ' ');
       
        
        
        if(!empty($postData['searchGender']))
        {
        $this->db->where('r.gender', $postData['searchGender']);
        }
        
        $this->db->order_by('r.id', 'desc');
        
        return $this->db->get()->result_array();
        }
        


        private function buildSearchQuery($searchCity, $searchEducation, $searchProfession, $searchGender, $searchValue) 
        {
            $searchConditions = array();
        
            if(!empty($searchCity)) 
            {
                $searchConditions[] = "r.direct = '" . $searchCity . "'";
            }
        
            if(!empty($searchEducation)) 
            {
                $searchConditions[] = "r.education = '" . $searchEducation . "'";
            }
        
            if(!empty($searchProfession)) 
            {
                $searchConditions[] = "r.occupation = '" . $searchProfession . "'";
            }
        
            if(!empty($searchGender)) 
            {
                $searchConditions[] = "r.gender = '" . $searchGender . "'";
            }
        
            if(!empty($searchValue)) 
            {
                $searchConditions[] = "(r.name LIKE '%" . $searchValue . "%' OR 
                                      r.happynikah_id LIKE '%" . $searchValue . "%' OR 
                                      r.reg_date LIKE '%" . $searchValue . "%')";
            }
        
            $searchQuery = implode(' AND ', $searchConditions);
        
            return $searchQuery;
        }
        

     public function getUsers_delete_all($postData = null) 
     {

        $response = array();
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; 
        $columnIndex = $postData['order'][0]['column']; 
        $columnName = $postData['columns'][$columnIndex]['data']; 
        $columnSortOrder = $postData['order'][0]['dir']; 
        $searchValue = $postData['search']['value'];
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
  
  
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if($searchCity != '') 
        {
        $search_arr[] = " direct='" . $searchCity . "' ";
        }
      
        if(count($search_arr) > 0) 
        {
        $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '') 
        {
        $this->db->where($searchQuery);
        }
        
        $this->db->where('status', '3');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->where('goto_nikah', '0');
        $this->db->where('hmangalyam','0');
        $this->db->order_by('id', 'desc');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $this->db->where('status','3');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->where('goto_nikah', '0');
        $this->db->where('hmangalyam','0');
        $this->db->order_by('id', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('tbl_registration')->result();

        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
            "happynikah_id" => $record->happynikah_id,
            "name" => $record->name,
            "reg_date" => $record->reg_date,
            "phone" => $record->phone,
            "id" => $record->id,
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    
    public function getUsers_delete_all_gotonikah($postData = null) 
     {

        $response = array();

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data']; 
        $columnSortOrder = $postData['order'][0]['dir']; 
        $searchValue = $postData['search']['value']; 
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
        $search_arr = array();
        
        $searchQuery = "";
        
        if($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if($searchCity != '') 
        {
          $search_arr[] = " direct='" . $searchCity . "' ";
        }
      
        if(count($search_arr) > 0) 
        {
          $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        
        if($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $this->db->where('status', '3');
        $this->db->where('goto_nikah', '1');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->order_by('id', 'desc');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        
        if($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $this->db->where('status','3');
        $this->db->where('goto_nikah', '1');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->order_by('id', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('tbl_registration')->result();

        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
            "happynikah_id" => $record->happynikah_id,
            "name" => $record->name,
            "reg_date" => $record->reg_date,
            "phone" => $record->phone,
            "id" => $record->id,
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    
    
    
    // public function getUsers_no_profile_pic_all($postData = null) 
    //  {

    //     $response = array();
        
    //     $draw = $postData['draw'];
    //     $start = $postData['start'];
    //     $rowperpage = $postData['length']; 
    //     $columnIndex = $postData['order'][0]['column']; 
    //     $columnName = $postData['columns'][$columnIndex]['data']; 
    //     $columnSortOrder = $postData['order'][0]['dir']; 
    //     $searchValue = $postData['search']['value']; 
    //     $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
    //     $searchGender = isset($postData['searchGender']) ? $postData['searchGender'] : '';
        
    //     $search_arr = array();
    //     $searchQuery = "";
        
    
    //     if($searchValue != '') 
    //     {
    //         $search_arr[] = " (name like '%" . $searchValue . "%' or 
    //         happynikah_id like '%" . $searchValue . "%' or 
    //         reg_date like'%" . $searchValue . "%' ) ";
    //     }
        
    //     if($searchCity != '') 
    //     {
    //      $search_arr[] = " direct='" . $searchCity . "' ";
    //     }
        
    //     if($searchGender != '') 
    //     {
    //      $search_arr[] = " gender='" . $searchGender . "' ";
    //     }
        
    //     if(count($search_arr) > 0) 
    //     {
    //      $searchQuery = implode(" and ", $search_arr);
    //     }

      
    //     $this->db->select('count(*) as allcount');
    //     $records = $this->db->get('tbl_registration')->result();
    //     $totalRecords = $records[0]->allcount;

  
    //     $this->db->select('count(*) as allcount');
        
    //     if ($searchQuery != '') 
    //     {
    //      $this->db->where($searchQuery);
    //     }
        
    //     $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)', null, false);
    //     $this->db->where('R.status', '1');
    //     $this->db->where('R.photo', '');
    //     $this->db->where('R.goto_nikah', '0');
    //     $this->db->order_by('R.id', 'desc');
    //     $this->db->order_by($columnName, $columnSortOrder);
    //     $this->db->limit($rowperpage, $start);
    //     $records = $this->db->get('tbl_registration R')->result();
    //     $totalRecordwithFilter = $records[0]->allcount;

     
    //     $this->db->select('*');
    //     if ($searchQuery != '') 
    //     {
    //      $this->db->where($searchQuery);
    //     }
        
    //     $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)', null, false);
    //     $this->db->where('R.status', '1');
    //     $this->db->where('R.photo', '');
    //     $this->db->where('R.goto_nikah', '0');
    //     $this->db->order_by('R.id', 'desc');
    //     $this->db->order_by($columnName, $columnSortOrder);
    //     $this->db->limit($rowperpage, $start);
    //     $records = $this->db->get('tbl_registration R')->result();
    
    //     $data = array();
        
    //     foreach ($records as $record) 
    //     {

    //         $data[] = array(
    //         "happynikah_id" => $record->happynikah_id,
    //         "name" => $record->name,
    //         "reg_date" => $record->reg_date,
    //         "phone" => $record->phone,
    //         "id" => $record->id,
    //         );
    //     }

      
    //     $response = array(
    //         "draw" => intval($draw),
    //         "iTotalRecords" => $totalRecords,
    //         "iTotalDisplayRecords" => $totalRecordwithFilter,
    //         "aaData" => $data
    //     );

    //     return $response;
    // }
    
    
    public function getUsers_no_profile_pic_all($postData = null) 
    {
    $response = array();
    
    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; 
    $columnIndex = $postData['order'][0]['column']; 
    $columnName = $postData['columns'][$columnIndex]['data']; 
    $columnSortOrder = $postData['order'][0]['dir']; 
    $searchValue = $postData['search']['value']; 
    $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
    $searchGender = isset($postData['searchGender']) ? $postData['searchGender'] : '';
    
    $search_arr = array();
    $searchQuery = "";
    
    if($searchValue != '') 
    {
    $search_arr[] = " (name like '%" . $searchValue . "%' or 
    happynikah_id like '%" . $searchValue . "%' or 
    reg_date like'%" . $searchValue . "%' ) ";
    }
    
    if($searchCity != '') 
    {
    $search_arr[] = " direct='" . $searchCity . "' ";
    }
    
    if($searchGender != '') 
    {
    $search_arr[] = " gender='" . $searchGender . "' ";
    }
    
    if(count($search_arr) > 0) 
    {
    $searchQuery = implode(" and ", $search_arr);
    }
    
    // Total number of records without filtering
    $this->db->from('tbl_registration R');
    $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)', null, false);
    $this->db->where('R.status', '1');
    $this->db->where('R.photo', '');
    $this->db->where('R.hmangalyam', '0');
    $this->db->where('R.goto_nikah', '0');
    $totalRecords = $this->db->count_all_results();
    
    // Total number of records with filtering
    $this->db->from('tbl_registration R');
    $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)', null, false);
    $this->db->where('R.status', '1');
    $this->db->where('R.photo', '');
    $this->db->where('R.goto_nikah', '0');
    $this->db->where('R.hmangalyam', '0');
    
    if($searchQuery != '') 
    {
    $this->db->where($searchQuery);
    }
    $totalRecordwithFilter = $this->db->count_all_results();
    
    // Fetch records
    $this->db->select('*');
    $this->db->from('tbl_registration R');
    $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)', null, false);
    $this->db->where('R.status', '1');
    $this->db->where('R.photo', '');
    $this->db->where('R.goto_nikah', '0');
    $this->db->where('R.hmangalyam', '0');
    
    if($searchQuery != '') 
    {
    $this->db->where($searchQuery);
    }
    
    $this->db->order_by('R.id', 'desc');
    $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage, $start);
    $records = $this->db->get()->result();
    
    $data = array();
    
    foreach ($records as $record) 
    {
    $data[] = array(
    "happynikah_id" => $record->happynikah_id,
    "name" => $record->name,
    "reg_date" => $record->reg_date,
    "phone" => $record->phone,
    "id" => $record->id,
    );
    }
    
    // Response
    $response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
    );
    
    return $response;
    }


    public function getUsers_no_profile_pic_all_gotonikah($postData = null) 
    {
    $response = array();
    
    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; 
    $columnIndex = $postData['order'][0]['column']; 
    $columnName = $postData['columns'][$columnIndex]['data']; 
    $columnSortOrder = $postData['order'][0]['dir']; 
    $searchValue = $postData['search']['value']; 
    $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
    $searchGender = isset($postData['searchGender']) ? $postData['searchGender'] : '';
    
    $search_arr = array();
    $searchQuery = "";
    
    if($searchValue != '') 
    {
    $search_arr[] = " (name like '%" . $searchValue . "%' or 
    happynikah_id like '%" . $searchValue . "%' or 
    reg_date like'%" . $searchValue . "%' ) ";
    }
    
    if($searchCity != '') 
    {
    $search_arr[] = " direct='" . $searchCity . "' ";
    }
    
    if($searchGender != '') 
    {
    $search_arr[] = " gender='" . $searchGender . "' ";
    }
    
    if(count($search_arr) > 0) 
    {
    $searchQuery = implode(" and ", $search_arr);
    }
    
    // Total number of records without filtering
    $this->db->from('tbl_registration R');
    $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)', null, false);
    $this->db->where('R.status', '1');
    $this->db->where('R.photo', '');
    $this->db->where('R.goto_nikah', '1');
    $totalRecords = $this->db->count_all_results();
    
    // Total number of records with filtering
    $this->db->from('tbl_registration R');
    $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)', null, false);
    $this->db->where('R.status', '1');
    $this->db->where('R.photo', '');
    $this->db->where('R.goto_nikah', '1');
    if ($searchQuery != '') {
    $this->db->where($searchQuery);
    }
    $totalRecordwithFilter = $this->db->count_all_results();
    
    // Fetch records
    $this->db->select('*');
    $this->db->from('tbl_registration R');
    $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)', null, false);
    $this->db->where('R.status', '1');
    $this->db->where('R.photo', '');
    $this->db->where('R.goto_nikah', '1');
    if ($searchQuery != '') {
    $this->db->where($searchQuery);
    }
    $this->db->order_by('R.id', 'desc');
    $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage, $start);
    $records = $this->db->get()->result();
    
    $data = array();
    
    foreach ($records as $record) {
    $data[] = array(
    "happynikah_id" => $record->happynikah_id,
    "name" => $record->name,
    "reg_date" => $record->reg_date,
    "phone" => $record->phone,
    "id" => $record->id,
    );
    }
    
    // Response
    $response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
    );
    
    return $response;
    }
    
    
    public function getUsers2($postData = null) 
     {

        $response = array();
        
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = $postData['search']['value'];
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
        $search_arr = array();
        $searchQuery = "";
        
        if($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if($searchCity != '') 
        {
         $search_arr[] = " direct='" . $searchCity . "' ";
        }
      
        if(count($search_arr) > 0) 
        {
         $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;

        $this->db->select('count(*) as allcount');
        if ($searchQuery != '') 
        {
        $this->db->where($searchQuery);
        }
        
        $todaydate = date('Y-m-d');
 
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        $this->db->where('C.status', '1');
        $this->db->where('C.goto_nikah', '0');
        // $this->db->where('C.activecalls_status!=', '2'); 
        $this->db->order_by('cid', 'desc');
        
        
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;


        $this->db->select('*');
        if($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $todaydate = date('Y-m-d');
  
      
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        $subquery = "(SELECT MAX(id) FROM tbl_paymentrequest WHERE payment_id = C.id)";
        $this->db->select($subquery, FALSE);
        $this->db->join('tbl_paymentrequest P', "P.id = ($subquery)", 'left');
      
        $subquery15= "(SELECT MAX(id) FROM tbl_followup WHERE uid = C.id)";
        $this->db->select($subquery15, FALSE);
        $this->db->join('tbl_followup F', "F.id = ($subquery15)", 'left');
        
        $this->db->where('C.status', '1');
        $this->db->where('C.activecalls_status!=', '2'); 
        $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        $this->db->where('C.goto_nikah', '0');
        $this->db->where("(STR_TO_DATE(P.postpone_date, '%d-%m-%Y') < '$todaydate' AND P.paid_status = 'Unpaid')");
        $this->db->where("(STR_TO_DATE(F.fdate, '%d-%m-%Y') < '$todaydate')");
        $this->db->group_by('C.id');
        
        
        // $this->db->select("C.id as cid, C.happynikah_id, C.name, C.reg_date, C.native_place, MAX(P.id) as max_payment_id, MAX(F.id) as max_followup_id");
        // $this->db->from('tbl_registration C');
        // $this->db->join('tbl_paymentrequest P', 'P.payment_id = C.id', 'left');
        // $this->db->join('tbl_followup F', 'F.uid = C.id', 'left');
        // $this->db->join('tbl_payement U', 'U.user_id = C.id', 'left');
        // $this->db->where('C.status', '1');
        // $this->db->where('C.activecalls_status !=', '2');
        // $this->db->where('U.status !=', '1');
        // $this->db->where('C.goto_nikah', '0');
        // $this->db->where("STR_TO_DATE(P.postpone_date, '%d-%m-%Y') < '$todaydate'", NULL, FALSE);
        // $this->db->where("STR_TO_DATE(F.fdate, '%d-%m-%Y') < '$todaydate'", NULL, FALSE);
        // $this->db->group_by('C.id');

        
        
        
        
        
        $this->db->order_by('cid', 'desc');
    
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        
        $records = $this->db->get()->result();

        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
                "happynikah_id" => $record->happynikah_id,
                "name" => $record->name,
                "reg_date" => $record->reg_date,
                "native_place" => $record->native_place,
                // "city" => $record->city,
                "cid" => $record->cid
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    
    
     public function getUsers2_gotonikah($postData = null) 
     {

        $response = array();
        
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = $postData['search']['value'];
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
        $search_arr = array();
        $searchQuery = "";
        
        if($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if($searchCity != '') 
        {
         $search_arr[] = " direct='" . $searchCity . "' ";
        }
      
        if(count($search_arr) > 0) 
        {
         $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;

        $this->db->select('count(*) as allcount');
        if ($searchQuery != '') 
        {
        $this->db->where($searchQuery);
        }
        
        $todaydate = date('Y-m-d');
       
        // $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        // $this->db->from('tbl_registration C');
        // $this->db->where('C.status', '1');
        // $this->db->where('C.goto_nikah', '1');
        // $this->db->order_by('cid', 'desc');
        
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        
        $subquery = "(SELECT MAX(id) FROM tbl_paymentrequest WHERE payment_id = C.id)";
        $this->db->select($subquery, FALSE);
        $this->db->join('tbl_paymentrequest P', "P.id = ($subquery)", 'left');
      
        $subquery15= "(SELECT MAX(id) FROM tbl_followup WHERE uid = C.id)";
        $this->db->select($subquery15, FALSE);
        $this->db->join('tbl_followup F', "F.id = ($subquery15)", 'left');
     
        $this->db->where('C.status', '1');
        $this->db->where('C.activecalls_status!=', '2'); 
        
        $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        $this->db->where('C.goto_nikah', '1');
        $this->db->where("(STR_TO_DATE(P.postpone_date, '%d-%m-%Y') < '$todaydate' AND P.paid_status = 'Unpaid')");
        $this->db->where("(STR_TO_DATE(F.fdate, '%d-%m-%Y') < '$todaydate')");
        $this->db->group_by('C.id');
        $this->db->order_by('cid', 'desc');
        
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;


        $this->db->select('*');
        if($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $todaydate = date('Y-m-d');
  
        // $this->db->distinct();
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        
      
        
        $subquery = "(SELECT MAX(id) FROM tbl_paymentrequest WHERE payment_id = C.id)";
        $this->db->select($subquery, FALSE);
        $this->db->join('tbl_paymentrequest P', "P.id = ($subquery)", 'left');
      
        $subquery15= "(SELECT MAX(id) FROM tbl_followup WHERE uid = C.id)";
        $this->db->select($subquery15, FALSE);
        $this->db->join('tbl_followup F', "F.id = ($subquery15)", 'left');
     
        $this->db->where('C.status', '1');
        $this->db->where('C.activecalls_status!=', '2'); 
  
         $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        
        
        //  $this->db->join('tbl_payement U', 'U.user_id = C.id AND U.status = 1', 'left');
        //  $this->db->where('(U.user_id IS NULL OR U.status != 1)');
         
         
        $this->db->where('C.goto_nikah', '1');
        
        // $this->db->join('tbl_payement U', 'U.user_id = C.id AND U.status = 1', 'left');
        //  $this->db->where('U.user_id IS NULL');

         
        // $this->db->where('C.active_call', '0');
        $this->db->where("(STR_TO_DATE(P.postpone_date, '%d-%m-%Y') < '$todaydate' AND P.paid_status = 'Unpaid')");
        $this->db->where("(STR_TO_DATE(F.fdate, '%d-%m-%Y') < '$todaydate')");
        $this->db->group_by('C.id');
        
        $this->db->order_by('cid', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        
        $records = $this->db->get()->result();

        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
                "happynikah_id" => $record->happynikah_id,
                "name" => $record->name,
                "reg_date" => $record->reg_date,
                "native_place" => $record->native_place,
                // "city" => $record->city,
                "cid" => $record->cid
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    
    public function getCustomerOrderCount($customerId) 
    {
       $this->db->where('staff_id', $customerId);
       return $this->db->count_all_results('tbl_registration');
    }
    
    public function getTotalsaleAmount($customerId)
    {
        $this->db->select_sum('amount');
        $this->db->where('payment_staff_id', $customerId);
        $query = $this->db->get('tbl_payement');
        $result = $query->row();
        return $result->amount;
    }
    
    public function getPostponeCount($customerId) 
    {
       $this->db->where('login_id', $customerId);
       return $this->db->count_all_results('tbl_paymentrequest');
    }
    
    public function getRingCount($customerId) 
    {
        $this->db->where('login_id', $customerId);
        return $this->db->count_all_results('tbl_followup');
    }
    
    public function search_profphone($search)
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        if($search != '')
        {
         $this->db->like('phone',$search);
        }
        
        $query = $this->db->get();
        return $query->num_rows();
    }
    
	public function GetPendingcalls()
    {
	$this->db->select('*');
	$this->db->from('tbl_registration');
    $this->db->where_in('stage',array('2','3','4'));
    $this->db->where('goto_nikah','0');
	$this->db->where('status','0');
	$this->db->order_by('id','desc');
	
	$query = $this->db->get();
	return $query->result();
	}
    	
	public function GetPendingcalls_gotonikah()
    {
	$this->db->select('*');
	$this->db->from('tbl_registration');
    $this->db->where_in('stage',array('2','3','4'));
    $this->db->where('goto_nikah','1');
	$this->db->where('status','0');
	$this->db->order_by('id','desc');
	
	$query = $this->db->get();
	return $query->result();
	}
	
    public function GetProfileDetails($user_id = '')
    {
       
        $this->db->select('r.*,pi.income as income,e.education as user_edu,f.fathers_name,f.fathers_occupation,f.mothers_name,
        o.aboutme,f.mothers_occupation,f.familytype,f.hometype,he.high_education as useredu,cn.name as usernationality,pr.profession_name as job,ct.name as cityname,ct2.name as homecity,
        d1.district as homedistrict,cn1.name as usercountry,st.name as userstate,cn2.name as homecountry,st2.name as homestate,r.weight as wid,tr.religion as user_religion,
        c.caste as user_caste,h.height as user_height,w.weight,d.district,q.qualification,j.job_name,o.demands,f.fathers_name,f.fathers_occupation,f.mothers_name,f.mothers_occupation,
        f.total_members,f.financial_status,o.partner_age_from,o.partner_age_to,o.partner_height,o.partner_height_to,o.partner_education,o.partner_physicalstatus,o.partner_familytype,
        o.partner_expectation,o.partner_country,o.partner_state,o.partner_district,o.partner_city,highed.high_education as partner_education,profess.profession_name as partner_occupation,
        m.mothertongue,th1.height as partner_height_from,th2.height as partner_height_to,q1.qualification as partner_qualification');
        
        $this->db->from('tbl_registration r');
        $this->db->join('tbl_religion tr','tr.rid = r.religion','left');
        $this->db->join('tbl_caste c','c.cid = r.caste','left');
        $this->db->join('tbl_zodiac zc','zc.zodiac = r.zodiac','left');
        $this->db->join('tbl_height h','h.height_id = r.height','left');
        $this->db->join('tbl_weight w','w.weight_id = r.weight','left');
        $this->db->join('tbl_district d','d.district_id = r.native_district','left');
        $this->db->join('tbl_district d1','d1.district_id = r.home_district','left');
        $this->db->join('tbl_qualification q','q.qualification_id = r.education','left');
        $this->db->join('tbl_jobs j','j.job_id = r.occupation','left');
        $this->db->join('tbl_appearance app','app.id = r.appearance','left');
        $this->db->join('tbl_familyprofile f','f.user_id = r.id','left');
        $this->db->join('tbl_otherdetails o','o.user_id = r.id','left');
        $this->db->join('tbl_qualification q1','q1.qualification_id = o.partner_education','left');
        $this->db->join('tbl_mothertongue m','m.mothertongue_id = r.mother_tongue','left');
        $this->db->join('tbl_height th1','th1.height_id = o.partner_height','left');
        $this->db->join('tbl_height th2','th2.height_id = o.partner_height_to','left');
        $this->db->join('tbl_physicalstatus ph','ph.id = o.partner_physicalstatus','left');
        $this->db->join('tbl_familytype fa','fa.id = o.partner_familytype','left');
        $this->db->join('tbl_subcaste su','su.sid = o.partner_caste','left');
        $this->db->join('tbl_country cn3','cn3.id = o.partner_country','left');
        $this->db->join('tbl_states st3','st3.id = o.partner_state','left');
        $this->db->join('tbl_district d2','d2.district_id = o.partner_district','left');
        $this->db->join('tbl_city ci','ci.id = o.partner_city','left');
        $this->db->join('tbl_country cn','cn.id = r.country','left');
        $this->db->join('tbl_country cn1','cn1.id = r.country','left');
        $this->db->join('tbl_country cn8','cn8.id = r.code','left'); 
        $this->db->join('tbl_states st','st.id = r.state','left');
        $this->db->join('tbl_city ct','ct.id = r.native_place','left');
        $this->db->join('tbl_country cn2','cn2.id = r.home_country','left');
        $this->db->join('tbl_states st2','st2.id = r.home_state','left');
        $this->db->join('tbl_city ct2','ct2.id = r.home_city','left');
        $this->db->join('tbl_highest_education he','he.id = r.highest_education','left');
        $this->db->join('tbl_education e','e.edu_id = r.education','left');
        $this->db->join('tbl_bodytype bd','bd.id = r.bodytype','left');
        $this->db->join('tbl_bloodgroup bl','bl.id = r.blood_group','left');
        $this->db->join('tbl_highest_education highed','highed.id = o.partner_education','left');
        $this->db->join('tbl_profession profess','profess.profession_id = o.partner_occupation','left');
        $this->db->join('tbl_madrassa_education mdr','mdr.id = r.madrassa_education','left');
        $this->db->join('tbl_profession pr','pr.profession_id = r.occupation','left');
        $this->db->join('tbl_professional_income pi','pi.income_id = r.annual_income','left');
        $this->db->where('r.id',$user_id);
        
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function GetProfileDeta($user_id = '')
    {
        $this->db->select('r.*,cn7.id as cid,cn7.name as cname,cn7.country_code as ccode');
        $this->db->from('tbl_registration r');
        $this->db->join('tbl_country cn7','cn7.id = r.code','left');  
        $this->db->where('r.id',$user_id);
        
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function GetFullDataRow($table = '',$column = '',$column_value = '')
    {
        $this->db->select('*');
        $this->db->from($table);
        if($table == 'tbl_height' && $column_value !='')
        {
        $this->db->where('height_id >=',$column_value);
        }
        
        if($column != '' && $column_value !='')
        {
        $this->db->where($column,$column_value);
        }
        
        if($table == 'tbl_registration')
        {
        $this->db->order_by('id','desc');
        }
        
        $query = $this->db->get();
        
        return $query->row_array(); 
    }
    
    public function UpdateData($table_name ='',$column_name = '',$value = '',$data = '')
    {
        $this->db->where($column_name,$value);
        $this->db->update($table_name,$data);   
    }
    
    public function GetOtherDetails($userid)
    {
        $this->db->select('*,h.height as height_to,c.name as p_nationality,tbl_country.name as p_country,tbl_states.name as p_state,tbl_district.district as p_district,
        tbl_otherdetails.hobbies as hob,tbl_otherdetails.partner_education,tbl_otherdetails.partner_country,tbl_otherdetails.code');
        $this->db->from('tbl_otherdetails');
        $this->db->join('tbl_professional_income','tbl_professional_income.income_id = tbl_otherdetails.partner_annualincome','left');
        $this->db->join('tbl_profession','tbl_profession.profession_id = tbl_otherdetails.partner_occupation','left');
        $this->db->join('tbl_highest_education','tbl_highest_education.id = tbl_otherdetails.partner_education','left');
        $this->db->join('tbl_registration','tbl_registration.id = tbl_otherdetails.user_id','left');
        $this->db->join('tbl_country','tbl_country.id = tbl_otherdetails.partner_country','left');
        $this->db->join('tbl_country c5','c5.id = tbl_otherdetails.code','left');
        $this->db->join('tbl_states','tbl_states.id = tbl_otherdetails.partner_state','left');
        $this->db->join('tbl_district','tbl_district.district_id = tbl_otherdetails.partner_district','left');
        $this->db->join('tbl_country c','c.id = tbl_otherdetails.partner_nationality','left');
        $this->db->join('tbl_religion ','tbl_religion.rid = tbl_otherdetails.partner_religion','left');
        $this->db->join('tbl_caste ','tbl_caste.cid = tbl_otherdetails.partner_caste','left');
        $this->db->join('tbl_height ','tbl_height.height_id = tbl_otherdetails.partner_height','left');
        $this->db->join('tbl_height h','h.height_id = tbl_otherdetails.partner_height_to','left');
        $this->db->join('tbl_physicalstatus','tbl_physicalstatus.id = tbl_otherdetails.partner_physicalstatus','left');
   
        $this->db->where('user_id',$userid);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function GetFamilyDetails($userid)
    {
    $this->db->select('*');
    $this->db->from('tbl_familyprofile');
    $this->db->join('tbl_familytype','tbl_familytype.id = tbl_familyprofile.familytype','left');
    $this->db->join('tbl_hometype','tbl_hometype.id = tbl_familyprofile.hometype','left');
    $this->db->join('tbl_financialstatus','tbl_financialstatus.id = tbl_familyprofile.financial_status','left');
    $this->db->join('tbl_registration','tbl_registration.id = tbl_familyprofile.user_id','left');
    
    $this->db->where('user_id',$userid);
    $query = $this->db->get();
    return $query->row_array();
    }
        
    public function signup_followup($status,$fdate,$message,$update_id,$login_id)
    {
    $data=array(
    'status'=>$status,
    'fdate'=>$fdate,
    'message'=>$message,
    'cdate'=>date('Y-m-d H:i:s'),
    'uid'=>$update_id,
    'login_id'=>$login_id,
    'delete_status'=>"Active",
    'cur_date'=>date('Y-m-d')
    );
    $query=$this->db->insert('tbl_followup',$data);
    
    if($query)
    {
    $url = $_SERVER['HTTP_REFERER']; 
    
    $this->session->set_flashdata('success','Registration successfull, Now you can login');    
    redirect($url);
    } 
    
    else 
    {
    $this->session->set_flashdata('error','Something went wrong. Please try again');   
    redirect($url);
    }
    }

    public function signup_followup2($status,$fdate,$message,$eventId,$login_id)
    {
    
    $data1= array('delete_status'=>'Active','login_id'=>$login_id,'message'=>$message,'status'=>$status,'fdate'=>$fdate,'cur_date'=>date('Y-m-d'),'cdate'=>date('Y-m-d H:i:s'));
    $this->db->where('uid',$eventId);
    $query=$this->db->update('tbl_followup',$data1);
    
    return $query;
    redirect('admin/search_profiles');
    }

    public function assign_target($uid,$amnt,$date)
    {
        
    $data=array(
    'user_id'=>$uid,
    'amount'=>$amnt,
    'date'=>$date,
    );
    $this->db->insert('tbl_target',$data);
    
    }
        
    public function payment_request($membership_plan,$postpone_date,$plantype,$payment_id,$message,$login_id,$delete_status)
    {
        
    $data=array('plan_id'=>$membership_plan,
    'postpone_date'=>$postpone_date,
    'message'=>$message,
    'cdate'=>date("Y-m-d H:i:s"),
    'plan_type'=>$plantype,
    'payment_id'=>$payment_id,
    'login_id'=>$login_id,
    'delete_status'=>$delete_status);
    
    $query=$this->db->insert('tbl_paymentrequest',$data);
    
    if($query)
    {
    $url = $_SERVER['HTTP_REFERER']; 
    
    $this->session->set_flashdata('success','Registration successfull, Now you can login');    
    redirect($url);
    } 
    
    else 
    {
    $this->session->set_flashdata('error','Something went wrong. Please try again');   
    redirect($url);
    }
    }
        
    public function update_today_followup()
    {
    $id=$this->input->post('user_id');
    $reason_status=$this->input->post('reason_status');
    $status='3';
    $emp_id = $this->session->userdata('user_id_admin');
    $message =$this->input->post('message');

    $this->db->set('reason_status',$reason_status);
    $this->db->set('status',$status);
    $this->db->set('emp_id',$emp_id);
    $this->db->set('message',$message);
    $this->db->where('id',$id);
    $result=$this->db->update('tbl_registration');
    return $result; 
    }
    
    
    public function getmultiple_contacts($selected_date)
    {
    $this->db->where('DATE(date)', $selected_date);
    $query = $this->db->get('tbl_contact_viewed'); 
    return $query->result_array();
    
    }

    public function getSenderCounts($selected_date)
    {

    $this->db->select('tbl_registration.happynikah_id as hn_id, tbl_registration.name,
    COUNT(tbl_contact_viewed.sender_id) as count');
    $this->db->from('tbl_contact_viewed');
    $this->db->join('tbl_registration','tbl_contact_viewed.sender_id = tbl_registration.id');
    $this->db->where('DATE(tbl_contact_viewed.date)', $selected_date);
    $this->db->where('tbl_registration.goto_nikah', 0);
    $this->db->where('tbl_registration.hmangalyam', 0);
    $this->db->group_by('tbl_registration.happynikah_id, tbl_registration.name');
    
    $query = $this->db->get(); 
    return $query->result_array();
    }

    public function getSenderCounts_gotonikah($selected_date)
    {
 
    $this->db->select('tbl_registration.happynikah_id as hn_id, tbl_registration.name,
    COUNT(tbl_contact_viewed.sender_id) as count');
    $this->db->from('tbl_contact_viewed');
    $this->db->join('tbl_registration','tbl_contact_viewed.sender_id = tbl_registration.id');
    $this->db->where('DATE(tbl_contact_viewed.date)', $selected_date);
    $this->db->where('tbl_registration.goto_nikah', 1);
    $this->db->group_by('tbl_registration.happynikah_id, tbl_registration.name');
    
    $query = $this->db->get(); 
    return $query->result_array();
    }
        
    public function update_followup_creation_update($id,$emp_id,$message,$delete_date,$fdate)
    {
        
    $data1= array('login_id'=>$emp_id,
    'message'=>$message,'cdate'=>$delete_date,'fdate'=>date('Y-m-d'));
    $this->db->where('id',$id);
    $query=$this->db->update('tbl_followup',$data1);
    
    return $query;
    }
        
    public function todaypostpone_update($id,$membership_plan,$postpone_date,$plantype,$message,$cdate,$login_id,$cdate_time)
    {
        
     $data1= array('plan_id'=>$membership_plan,
     'postpone_date'=>$postpone_date,'plan_type'=>$plantype,'message'=>$message,
     'crnt_date'=>$cdate,'login_id'=>$login_id,'cdate'=>$cdate_time);
     $this->db->where('id',$id);
     $query=$this->db->update('tbl_paymentrequest',$data1);
    
     return $query;
    }
        
    public function todaypostpone_delete($id,$delete_status,$login_id,$message,$reason,$cdate,$date)
    {
    
     $data1= array('delete_status'=>$delete_status,
    'login_id'=>$login_id,'message'=>$message,'reason'=>$reason,'cdate'=>$cdate,'crnt_date'=>$date);
     $this->db->where('id',$id);
     $query=$this->db->update('tbl_paymentrequest',$data1);
     
     return $query;
    }
        
    public function closependingfollowup($id,$delete_status,$login_id,$message,$reason,$cdate,$crnt_date)
    {
    
    $data1= array('delete_status'=>$delete_status,'login_id'=>$login_id,'message'=>$message,'status'=>$reason,'cdate'=>$cdate,'cur_date'=>$crnt_date);
    $this->db->where('id',$id);
    $query=$this->db->update('tbl_followup',$data1);
    
    return $query;
    }
    
    public function closetodayfollowup($id,$delete_status,$login_id,$message,$reason,$cdate,$crnt_date)
    {
    
    $data1= array('delete_status'=>$delete_status,'login_id'=>$login_id,'message'=>$message,'status'=>$reason,'cdate'=>$cdate,'cur_date'=>$crnt_date);
    $this->db->where('id',$id);
    $query=$this->db->update('tbl_followup',$data1);
    
    return $query;
    }

    public function closeexpirycalls($id,$session_id,$message,$reason,$cdate,$payment_status)
    {
    
    $data1= array('session_id'=>$session_id,'message'=>$message,'reason_status'=>$reason,'date'=>$cdate,'status'=>$payment_status);
    $this->db->where('id',$id);
    $query=$this->db->update('tbl_payement',$data1);
    
    return $query;
    }
    
    public function getplandata($postData)
    {
    $response = array();
    
    $this->db->select('plan_id,plan_name,duration,messages,contacts,plan_strick_amount,plan_amount');
    $this->db->where('plan_id', $postData['plandata_id']);
    $q = $this->db->get('tbl_plan');
    $response = $q->result_array();
    
    return $response;
    }
        
    public function getplandata_active($postData)
    {
    $response = array();
    $this->db->select('planid,id,amount');
    $this->db->where('planid', $postData['planid']);
    $q = $this->db->get('tbl_discount');
    $response = $q->result_array();
    
    return $response;
    }
    
    public function Getdatas()
    {
    
    $f_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    $newDate = date("d-m-Y",strtotime($f_date));
    
    $this->db->select('tr.id,tr.happynikah_id,tr.name,
    tr.reg_date,tr.phone,tf.uid,tf.fdate,tf.id,tf.login_id');
    $this->db->from('tbl_followup as tf');
    $this->db->join('tbl_registration as tr','tr.id=tf.uid');
    $this->db->where('tf.fdate',$newDate);
    $this->db->where('tf.login_id','4');
    $query = $this->db->get();
    return $query->result();
    
    }
        
    public function Gettdycreation()
    {
        
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('user_id_admin');
    
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('reg_date',$reg_date);
    $this->db->where('staff_id',$emp_id);
    $this->db->where('status','1');
    $this->db->where('goto_nikah','0');
    $this->db->where('hmangalyam','0');
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    

    public function Gettdycreation_goto()
    {
    
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('user_id_admin');
    
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('reg_date',$reg_date);
    $this->db->where('status',1);
    $this->db->where('goto_nikah','1');
    $this->db->where('hmangalyam','0');
    $this->db->where('staff_id',$emp_id);
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    return $query->result();
    }
        
 
    public function Gettotalcreation_goto()
    {
    
    $emp_id=$this->session->userdata('user_id_admin');    
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('status',1);
    $this->db->where('goto_nikah','1');
    $this->db->where('staff_id',$emp_id);
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    public function Gettodaycreation()
    {
    
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('user_id_admin');
    
    $this->db->select('r.*,d.district_id,d.district');
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_district d', 'd.district_id=r.native_district', 'left');

    $this->db->where('r.reg_date',$reg_date);
    $this->db->where('r.status','1');
    $this->db->where('r.goto_nikah','0');
    $this->db->where('r.hmangalyam','0');
    $this->db->order_by('r.id','desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    public function Gettdypaymentcreation()
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,
    tbl_payement.addoncontact,tbl_payement.ctime,tbl_payement.description as dt,tbl_payement.final_amount,tbl_registration.*');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.date',$reg_date);
    $this->db->where('tbl_payement.status',1);
    $this->db->where('tbl_registration.goto_nikah',0);
    $this->db->where('tbl_registration.hmangalyam',0);
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }
        
    public function Gettdypaymentcreation_gotonikah()
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,
    tbl_payement.addoncontact,tbl_payement.ctime,tbl_payement.description as dt,tbl_payement.final_amount,tbl_registration.*');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.date',$reg_date);
    $this->db->where('tbl_payement.status',1);
    $this->db->where('tbl_registration.goto_nikah',1);
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }

    public function Gettotalcreation()
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('user_id_admin');
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('MONTH(reg_date)',date('m'));
    $this->db->where('staff_id',$emp_id);
    $this->db->where('goto_nikah',0);
    $this->db->where('hmangalyam',0);
    $this->db->where('status','1');
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    return $query->result();
    }
        
    public function Gettotalcreationall()
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('user_id_admin');
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('status','1');
    $this->db->where('hmangalyam','0');
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    public function getFilteredData($selectedCategory)
    {
    
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.addoncontact,tbl_payement.final_amount,tbl_payement.physical_status as pstatus,
    tbl_payement.payment_status as paystatus,tbl_payement.date,tbl_payement.ctime,tbl_payement.description as dt,tbl_registration.id,
    tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->where('payment_status', $selectedCategory);
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    
    public function getstaffFilteredDatatodayamount($selectedCategory,$selected_status)
    {
    $reg_date=date("Y-m-d"); 
    $this->db->select('SUM(final_amount) as famount');
    $this->db->from('tbl_payement');

    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.status', '1');
    $this->db->where('tbl_payement.payment_staff_id', $selectedCategory);
    $this->db->where('tbl_payement.payment_status', $selected_status);
    $this->db->where('tbl_registration.goto_nikah','0');
    $this->db->where('tbl_registration.hmangalyam','0');
    $this->db->where('tbl_payement.date', $reg_date);

    $query = $this->db->get();
    return $query->row();
    }
    
    public function getstaffFilteredDatatotalamount($selectedCategory)
    {
    $this->db->select('SUM(final_amount) as famount');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.payment_staff_id', $selectedCategory);
    $this->db->where('tbl_payement.status', 1);
    $this->db->where('tbl_registration.goto_nikah', 0);
    $this->db->where('tbl_payement.payment_status', 'Paid');
    $query = $this->db->get();
    return $query->row();
    }
    
    
    public function getstaffFilteredDatatodayamount_gotonikah($selectedCategory,$selected_status)
    {
    $reg_date=date("Y-m-d"); 
    $this->db->select('SUM(final_amount) as famount');
    $this->db->from('tbl_payement');

    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.status', '1');
    $this->db->where('tbl_payement.payment_staff_id', $selectedCategory);
    $this->db->where('tbl_payement.payment_status', $selected_status);
    $this->db->where('tbl_registration.goto_nikah','1');
    $this->db->where('tbl_payement.date', $reg_date);

    $query = $this->db->get();
    return $query->row();
    }
    
    
    public function getstaffFilteredDatatodayamount_status($selectedCategory)
    {
    $reg_date=date("Y-m-d"); 
    $this->db->select('SUM(final_amount) as famount');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.payment_status', $selectedCategory);
    $this->db->where('tbl_payement.status', 1);
    $this->db->where('tbl_registration.goto_nikah', 0);
    $this->db->where('date', $reg_date);  
    $query = $this->db->get();
    return $query->row();
    }
    
    public function getstaffFilteredDatatodayamount_status_gotonikah($selectedCategory)
    {
    $reg_date=date("Y-m-d"); 
    $this->db->select('SUM(final_amount) as famount');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.payment_status', $selectedCategory);
    $this->db->where('tbl_payement.status', 1);
    $this->db->where('tbl_registration.goto_nikah', 1);
    $this->db->where('date', $reg_date);  
    $query = $this->db->get();
    return $query->row();
    }
    
    public function getstaffFilteredData($selectedCategory)
    {
    
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.addoncontact,tbl_payement.payment_staff_id,
    tbl_payement.final_amount,tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,
    tbl_payement.ctime,tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone');
    
    // $this->db->select_sum('tbl_payement.final_amount', 'famount');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->where('payment_staff_id', $selectedCategory);
    $this->db->where('tbl_registration.goto_nikah', 0);
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    public function getstaffFilteredData_gotonikah($selectedCategory)
    {
    
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.addoncontact,tbl_payement.payment_staff_id,
    tbl_payement.final_amount,tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,
    tbl_payement.ctime,tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone,tbl_registration.goto_nikah');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->where('tbl_registration.goto_nikah','1');
    $this->db->where('payment_staff_id', $selectedCategory);
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    
    public function getstaffFilteredDatatoday($selectedCategory,$selected_status)
    {
        
    $emp_id=$this->session->userdata('emp_id');
    $reg_date=date("Y-m-d");                   
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.payment_staff_id,tbl_payement.addoncontact,tbl_payement.final_amount,
    tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,tbl_payement.ctime,
    tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone,tbl_registration.goto_nikah,tbl_registration.hmangalyam');  

    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.status', '1');
    $this->db->where('tbl_payement.payment_staff_id', $selectedCategory);
    $this->db->where('tbl_payement.payment_status', $selected_status);
    $this->db->where('tbl_registration.goto_nikah','0');
    $this->db->where('tbl_registration.hmangalyam','0');
    $this->db->where('tbl_payement.date', $reg_date);
    $this->db->order_by('pid', 'desc');

    $query = $this->db->get();
    return $query->result();
    }
        
   public function getstaffFilteredDatatoday_gotonikah($selectedCategory,$selected_status)
    {
        
    $emp_id=$this->session->userdata('emp_id');
    $reg_date=date("Y-m-d");                   
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.payment_staff_id,tbl_payement.addoncontact,tbl_payement.final_amount,
    tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,tbl_payement.ctime,
    tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone,tbl_registration.goto_nikah');  

    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.status', '1');
    $this->db->where('tbl_payement.payment_staff_id', $selectedCategory);
    $this->db->where('tbl_payement.payment_status', $selected_status);
    $this->db->where('tbl_registration.goto_nikah','1');
    $this->db->where('tbl_payement.date', $reg_date);
    $this->db->order_by('pid', 'desc');

    $query = $this->db->get();
    return $query->result();
    }
        
    public function getFilteredDatatoday($selectedCategory)
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.final_amount,tbl_payement.addoncontact,tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,tbl_payement.ctime,tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone');
    
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->where('payment_status', $selectedCategory);
    $this->db->where('date', $reg_date);
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }
        
    public function getFilteredDatatoday_gotonikah($selectedCategory)
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.final_amount,tbl_payement.addoncontact,tbl_payement.physical_status as pstatus,
    tbl_payement.payment_status as paystatus,tbl_payement.date,tbl_payement.ctime,tbl_payement.description as dt,tbl_registration.id,
    tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone,tbl_registration.goto_nikah');
    
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->where('tbl_registration.goto_nikah','1');
    $this->db->where('payment_status', $selectedCategory);
    $this->db->where('date', $reg_date);
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }
        
    public function Gettotalpaymentcreation()
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.final_amount,tbl_payement.addoncontact,
    tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,tbl_payement.ctime,
    tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone,tbl_registration.goto_nikah,
    tbl_registration.hmangalyam');
    
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->where('tbl_registration.goto_nikah','0');
    $this->db->where('tbl_registration.hmangalyam','0');
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    public function Gettotalpaymentcreation_gotonikah()
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.final_amount,tbl_payement.addoncontact,
    tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,tbl_payement.ctime,
    tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone,tbl_registration.goto_nikah');
    
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->where('tbl_registration.goto_nikah','1');
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    public function getDataBetweenDates($start_date,$end_date,$selected_category,$selected_status) 
    {
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,
    tbl_payement.payment_staff_id,tbl_payement.ctime,tbl_payement.date,tbl_payement.addoncontact,
    tbl_payement.final_amount,tbl_payement.physical_status as pstatus,
    tbl_payement.payment_status as paystatus,tbl_payement.description as dt,
    tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone,tbl_registration.goto_nikah,tbl_registration.hmangalyam');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->order_by('pid','desc');
    $this->db->where('tbl_payement.date >=', $start_date);
    $this->db->where('tbl_payement.date <=', $end_date);
    $this->db->where('tbl_registration.goto_nikah','0');
    $this->db->where('tbl_registration.hmangalyam','0');
    $this->db->where('tbl_payement.payment_staff_id',$selected_category);
    $this->db->where('tbl_payement.payment_status',$selected_status);
    $query = $this->db->get();
    
    return $query->result();
    }
    
    public function getDataBetweenDates_gotonikah($start_date,$end_date,$selected_category,$selected_status) 
    {
        
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,
    tbl_payement.payment_staff_id,tbl_payement.ctime,tbl_payement.date,tbl_payement.addoncontact,
    tbl_payement.final_amount,tbl_payement.physical_status as pstatus,
    tbl_payement.payment_status as paystatus,tbl_payement.description as dt,
    tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,
    tbl_registration.phone');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->order_by('pid','desc');
    $this->db->where('tbl_payement.date >=', $start_date);
    $this->db->where('tbl_payement.date <=', $end_date);
    $this->db->where('tbl_registration.goto_nikah','1');
    $this->db->where('tbl_payement.payment_staff_id',$selected_category);
    $this->db->where('tbl_payement.payment_status',$selected_status);
    $query = $this->db->get();
    
    return $query->result();
    }
    
    public function getDataBetweenDatescount($start_date,$end_date,$selected_category,$selected_status) 
    {
    
    $this->db->select('SUM(final_amount) as famount');
    $this->db->from('tbl_payement');

    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.status', '1');
    $this->db->where('tbl_payement.payment_staff_id', $selected_category);
    $this->db->where('tbl_payement.payment_status', $selected_status);
    $this->db->where('tbl_registration.goto_nikah','0');
    $this->db->where('tbl_registration.hmangalyam','0');
    $this->db->where('tbl_payement.date >=', $start_date);
    $this->db->where('tbl_payement.date <=', $end_date);

    $query = $this->db->get();
    return $query->row();
    }
    
    public function getDataBetweenDatescount_gotonikah($start_date,$end_date,$selected_category,$selected_status) 
    {
    
    $this->db->select('SUM(final_amount) as famount');
    $this->db->from('tbl_payement');

    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.status', '1');
    $this->db->where('tbl_payement.payment_staff_id', $selected_category);
    $this->db->where('tbl_payement.payment_status', $selected_status);
    $this->db->where('tbl_registration.goto_nikah','1');
    $this->db->where('tbl_payement.date >=', $start_date);
    $this->db->where('tbl_payement.date <=', $end_date);

    $query = $this->db->get();
    return $query->row();
    }
    
    public function Gettodayfollowup()
    {
    
    $f_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    $newDate =date('d-m-Y',strtotime('-1 day', strtotime($f_date)));
    $todaydate = date('d-m-Y',strtotime("-1 days"));
    
    $this->db->select('tr.id,tr.happynikah_id,tr.name,
    tr.reg_date,tr.phone,tf.uid,tf.fdate,tf.id,tf.login_id');
    $this->db->from('tbl_followup as tf');
    $this->db->join('tbl_registration as tr','tr.id=tf.uid');
    $this->db->where('tf.fdate',$todaydate);
    $this->db->where('tf.login_id','4');
    $query = $this->db->get();
    return $query->result();
    
    }

    public function paymentvisit_delete2($id,$delete_status,$login_id,$cdate)
    {
    $data = array('delete_status'=>$delete_status,'login_id'=>$login_id,'date'=>$cdate);
    $this->db->where('sender_id',$id);
    $query=$this->db->update('tbl_payment_viewed',$data);
    
    return $query;
    }
    
    
    public function paymentvisit_delete_sale($id,$delete_status,$login_id,$cdate)
    {
    $data = array('delete_status_sale'=>$delete_status,'login_id'=>$login_id,'date'=>$cdate);
    $this->db->where('sender_id',$id);
    $query=$this->db->update('tbl_payment_viewed',$data);
    
    return $query;
    }
    
    
    public function doorstep_delete2($id,$delete_status,$login_id,$cdate)
    {
    $data = array('delete_status'=>$delete_status,'login_id'=>$login_id,'cdate'=>$cdate);
    $this->db->where('id',$id);
    $query=$this->db->update('tbl_doorsteppayment',$data);
    
    return $query;
    }
        
    public function Gettotalpayment($user_id,$start_date,$end_date)
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.final_amount,tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,
                     tbl_payement.date,tbl_payement.ctime,tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,
                     tbl_registration.phone,tbl_registration.emp_id');
    
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }
        
    public function Bucketchange($user_id,$login_id,$staff_id,$message,$cdate)
    {
    $data = array('user_id'=>$user_id,'login_id'=>$login_id,'staff_id'=>$staff_id,'message'=>$message,'bdate'=>$cdate);
    $this->db->insert('tbl_bucket_change',$data);
    }
        
    public function total_postponeall($emp_id)
    {
        
    $postpone_date=date('Y-m-d');
    $this->db->select('tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.goto_nikah,tbl_registration.hmangalyam,
    tbl_paymentrequest.*,tbl_users1.user_id,tbl_users1.user_name');
    $this->db->from('tbl_paymentrequest');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_paymentrequest.payment_id');
    $this->db->join('tbl_users1','tbl_users1.user_id=tbl_paymentrequest.login_id');
    $this->db->where('delete_status','Active');
    $this->db->where('tbl_registration.goto_nikah','0');
    $this->db->where('tbl_registration.hmangalyam','0');
    $this->db->where("STR_TO_DATE(tbl_paymentrequest.postpone_date, '%d-%m-%Y') >=", $postpone_date);
    $this->db->where('tbl_users1.user_id',$emp_id);
    $this->db->group_by('tbl_registration.happynikah_id');
    
    $que= $this->db->get();
    return $que->result_array();
    
    }
      
    public function total_postponeall_gotonikah($emp_id)
    {
        
    $postpone_date=date('Y-m-d');
    $this->db->select('tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.goto_nikah,tbl_paymentrequest.*,tbl_users1.user_id,tbl_users1.user_name');
    $this->db->from('tbl_paymentrequest');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_paymentrequest.payment_id');
    $this->db->join('tbl_users1','tbl_users1.user_id=tbl_paymentrequest.login_id');
    $this->db->where('delete_status','Active');
    $this->db->where('tbl_registration.goto_nikah','1');
    $this->db->where("STR_TO_DATE(tbl_paymentrequest.postpone_date, '%d-%m-%Y') >=", $postpone_date);
    $this->db->where('tbl_users1.user_id',$emp_id);
    $this->db->group_by('tbl_registration.happynikah_id');
    $que= $this->db->get();
    return $que->result_array();
    
    }
    
    public function total_postponealldata()
    {
    $postpone_date=date('Y-m-d');
    $this->db->select('tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.goto_nikah,tbl_registration.hmangalyam,tbl_paymentrequest.*,tbl_users1.user_id,tbl_users1.user_name');
    $this->db->from('tbl_paymentrequest');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_paymentrequest.payment_id');
    $this->db->join('tbl_users1','tbl_users1.user_id=tbl_paymentrequest.login_id');
    $this->db->where('delete_status','Active');
    $this->db->where('tbl_registration.goto_nikah','0');
    $this->db->where('tbl_registration.hmangalyam','0');
    $this->db->where("STR_TO_DATE(tbl_paymentrequest.postpone_date, '%d-%m-%Y') >=", $postpone_date);
    $this->db->group_by('tbl_registration.happynikah_id');
    
    $data= $this->db->get();
    return $data->result_array();
    
    }
    
    
    public function total_payvisitcustomers()
    {
    $postpone_date=date('Y-m-d');
    // $login_id = $this->session->userdata('user_id_admin');
    // $this->db->select('tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.goto_nikah,tbl_registration.phone,tbl_registration.hmangalyam,tbl_paymentrequest.*,tbl_users1.user_id,tbl_users1.user_name');
    // $this->db->from('tbl_paymentrequest');
    // $this->db->join('tbl_registration','tbl_registration.id=tbl_paymentrequest.payment_id');
    // $this->db->join('tbl_users1','tbl_users1.user_id=tbl_paymentrequest.login_id');
    // $this->db->where('tbl_users1.user_id',$login_id);
    // $this->db->where('delete_status','Active');
    // $this->db->where('tbl_registration.goto_nikah','0');
    // $this->db->where('tbl_registration.status!=','3'); 
    // $this->db->where('tbl_registration.hmangalyam','0');
    
    // $this->db->where("STR_TO_DATE(tbl_paymentrequest.postpone_date, '%d-%m-%Y') >=", $postpone_date);
    // $this->db->group_by('tbl_registration.happynikah_id');
    
    
    
    //  $login_id = $this->session->userdata('user_id_admin');
    // $this->db->select('tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.goto_nikah,tbl_registration.phone,tbl_registration.hmangalyam,
    // tbl_payment_viewed.contact_viewed_id,tbl_payment_viewed.sender_id,tbl_payment_viewed.date,tbl_payment_viewed.planid,tbl_payment_viewed.visit_count,tbl_followup.*');
    // $this->db->from('tbl_registration');
    // $this->db->join('tbl_followup','tbl_followup.uid=tbl_registration.id');
    // // $this->db->join('tbl_paymentrequest','tbl_paymentrequest.payment_id=tbl_registration.id');
    // $this->db->join('tbl_payment_viewed', 'tbl_payment_viewed.sender_id=tbl_registration.id');


    // $this->db->where('tbl_followup.login_id',$login_id);
    // $this->db->where('tbl_followup.delete_status','Active');
    // $this->db->where('tbl_followup.status','Interested');
    // $this->db->where('tbl_registration.goto_nikah','0');
    // $this->db->where('tbl_registration.status!=','3'); 
    // $this->db->where('tbl_registration.hmangalyam','0');
    
    // $this->db->where('tbl_paymentrequest.delete_status','Active');
    //  $this->db->where('tbl_paymentrequest.login_id',$login_id);
    // $this->db->where('tbl_payment_viewed.delete_status !=', 'Inactive');
//     $this->db->where('tbl_payment_viewed.from', 'happy');
// //   $this->db->where("STR_TO_DATE(tbl_paymentrequest.postpone_date, '%d-%m-%Y') >=", $postpone_date);
//     $this->db->where("STR_TO_DATE(tbl_followup.fdate, '%d-%m-%Y') >=", $postpone_date);
//     $this->db->group_by('tbl_registration.happynikah_id');



$login_id = $this->session->userdata('user_id_admin');


// First query
$query1 = $this->db->select('r.*, pv.*, pr.payment_id, pr.delete_status, pr.login_id, pr.postpone_date')
    ->from('tbl_registration r')
    ->join('tbl_paymentrequest pr', 'pr.payment_id = r.id')
    ->join('tbl_payment_viewed pv', 'pv.sender_id = r.id')
    ->where('r.goto_nikah', '0')
    ->where('r.status !=', '3')
    ->where('r.hmangalyam', '0')
    ->where('pr.delete_status', 'Active')
    ->where('pr.login_id', $login_id)
    ->where('pv.from', 'happy')
     ->where('pv.delete_status_sale!=','Inactive')
    ->where("STR_TO_DATE(pr.postpone_date, '%d-%m-%Y') >=", $postpone_date)
  
    ->group_by('r.happynikah_id')
    ->get_compiled_select();

// Second query
$query2 = $this->db->select('r.*, pv.*, f.login_id, f.uid, f.fdate, f.delete_status')
    ->from('tbl_registration r')
    ->join('tbl_followup f', 'f.uid = r.id')
    ->join('tbl_payment_viewed pv', 'pv.sender_id = r.id')
    ->where('f.login_id', $login_id)
    
    ->where('f.delete_status', 'Active')
    ->where('f.status', 'Interested')
    ->where('r.goto_nikah', '0')
    ->where('r.status !=', '3')
    ->where('r.hmangalyam', '0')
    ->where('pv.from', 'happy')
     ->where('pv.delete_status_sale!=','Inactive')
    ->where("STR_TO_DATE(f.fdate, '%d-%m-%Y') >=", $postpone_date)

    ->group_by('r.happynikah_id')
    ->get_compiled_select();

// Combine the two queries with UNION
$union_query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY date DESC'); // Apply ORDER BY to the whole UNION

// Return the result as an array
return $union_query->result_array();

    

// $query2 = $this->db->select('r.*, pv.*, f.login_id,f.uid,f.fdate,f.delete_status')
//     ->from('tbl_registration r')
//     ->join('tbl_followup f', 'f.uid = r.id')
//     ->join('tbl_payment_viewed pv', 'pv.sender_id = r.id', 'left')
//     ->where('f.login_id', $login_id)
//     ->where('f.delete_status', 'Active')
//     ->where('f.status', 'Interested')
//     ->where('r.goto_nikah', '0')
//     ->where('r.status !=', '3')
//     ->where('r.hmangalyam', '0')
//     ->where("STR_TO_DATE(f.fdate, '%d-%m-%Y') >=", $postpone_date)
//     ->group_by('r.happynikah_id')
//     ->get_compiled_select();

// $query2 = str_replace("SELECT r.happynikah_id, r.name, r.goto_nikah, r.phone, r.hmangalyam, f.*, COALESCE(pv.contact_viewed_id, 0) as contact_viewed_id, COALESCE(pv.sender_id, 0) as sender_id,", "SELECT r.happynikah_id, r.name, r.goto_nikah, r.phone, r.hmangalyam, f.*, COALESCE(pv.contact_viewed_id, 0) as contact_viewed_id, COALESCE(pv.sender_id, 0) as sender_id, NULL as `date`, NULL as planid, NULL as `visit_count`, NULL as id, NULL as payment_id, NULL as login_id, NULL as postpone_date, NULL as delete_status, NULL as `from_value`, NULL as `status`, NULL as uid, NULL as fdate,", $query2);

// $query = $this->db->query($query1 . ' UNION ' . $query2)->result_array();









    
    // $data= $this->db->get();
    // return $data->result_array();
    
    }
    
    
      
    public function total_postponealldata_gotonikah()
    {
    $postpone_date=date('Y-m-d');
    $this->db->select('tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.goto_nikah,tbl_paymentrequest.*,tbl_users1.user_id,tbl_users1.user_name');
    $this->db->from('tbl_paymentrequest');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_paymentrequest.payment_id');
    $this->db->join('tbl_users1','tbl_users1.user_id=tbl_paymentrequest.login_id');
    $this->db->where('delete_status','Active');
    $this->db->where('tbl_registration.goto_nikah','1');
    $this->db->where("STR_TO_DATE(tbl_paymentrequest.postpone_date, '%d-%m-%Y') >=", $postpone_date);
    $this->db->group_by('tbl_registration.happynikah_id');
    $data= $this->db->get();
    return $data->result_array();
    
    }
      
    public function solved_profile2($solved_status,$delete_status,$interest_id,$emp_id,$solveddate)
    {
    $data = array('delete_status'=>$delete_status,'emp_id'=>$emp_id,'solved_date'=>$solveddate,'solved_status'=>$solved_status);
    $this->db->where('interest_id',$interest_id);
    $query=$this->db->update('tbl_block',$data);
    
    return $query;
    }
    
    public function Getotherstate_gotonikah()
	{
    	$this->db->select('*');
    	$this->db->from('tbl_registration');
        $this->db->where_in('stage',array('0','1'));
     	$this->db->where_in('reg_through',array('0','2'));
     	$this->db->where('countryCode','91');
     	$this->db->where_not_in('state', array('NULL','18'));
    	$this->db->where('status','0');
    	$this->db->where('goto_nikah','1');
    	$this->db->order_by('id','desc');
    	
    	$query = $this->db->get();
    	return $query->result();
	}
	
	
	public function Gettdycreation_mangalyam()
    {
    $reg_date=date("Y-m-d");
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('reg_date',$reg_date);
    $this->db->where('status',1);
    $this->db->where('hmangalyam','1');
    // $this->db->where('staff_id',$emp_id);
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    return $query->result();
    }

    public function unapprovephoto_mangalyam()
    {
    $this->db->select('tbl_userimages.*,tbl_registration.hmangalyam');
    $this->db->from('tbl_userimages');
    $this->db->join('tbl_registration','tbl_registration.id = tbl_userimages.user_id');
    $this->db->where('tbl_userimages.status', 0);
    $this->db->where('tbl_registration.hmangalyam', 1);
    // $this->db->or_where('piccount', 1);
    $this->db->order_by('tbl_userimages.user_image_id', 'desc');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
    }

    public function Gettdypaymentcreation_mangalyam()
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,
   tbl_payement.addoncontact,tbl_payement.ctime,tbl_payement.description as dt,tbl_payement.final_amount,tbl_registration.*');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.date',$reg_date);
    $this->db->where('tbl_payement.status',1);
    $this->db->where('tbl_registration.hmangalyam',1);
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }


    public function getstaffFilteredDatatoday_mangalyam($selectedCategory,$selected_status)
    {
        
    $emp_id=$this->session->userdata('emp_id');
    $reg_date=date("Y-m-d");                   
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.payment_staff_id,tbl_payement.addoncontact,tbl_payement.final_amount,
    tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,tbl_payement.ctime,
    tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,
    tbl_registration.name,tbl_registration.phone,tbl_registration.goto_nikah');  

    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.status', '1');
    $this->db->where('tbl_payement.payment_staff_id', $selectedCategory);
    $this->db->where('tbl_payement.payment_status', $selected_status);
    $this->db->where('tbl_registration.hmangalyam',1);
    $this->db->where('tbl_payement.date', $reg_date);
    $this->db->order_by('pid', 'desc');

    $query = $this->db->get();
    return $query->result();
    }


     public function Gettotalcreation_mangalyam()
    {
        
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('status',1);
    $this->db->where('hmangalyam','1');
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    return $query->result();
    }


    public function getstaffFilteredDatatodayamount_mangalyam($selectedCategory,$selected_status)
    {
    $reg_date=date("Y-m-d"); 
    $this->db->select('SUM(final_amount) as famount');
    $this->db->from('tbl_payement');

    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.status', '1');
    $this->db->where('tbl_payement.payment_staff_id', $selectedCategory);
    $this->db->where('tbl_payement.payment_status', $selected_status);
    $this->db->where('tbl_registration.hmangalyam',1);
    $this->db->where('tbl_payement.date', $reg_date);

    $query = $this->db->get();
    return $query->row();
    }


    public function Gettotalpaymentcreation_mangalyam()
    {
    $reg_date=date("Y-m-d");
    $emp_id=$this->session->userdata('emp_id');
    
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,tbl_payement.final_amount,tbl_payement.addoncontact,
    tbl_payement.physical_status as pstatus,tbl_payement.payment_status as paystatus,tbl_payement.date,tbl_payement.ctime,
    tbl_payement.description as dt,tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,tbl_registration.phone,tbl_registration.hmangalyam');
    
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->where('tbl_registration.hmangalyam',1);
    $this->db->order_by('pid','desc');
    $query = $this->db->get();
    return $query->result();
    }

     public function getDataBetweenDates_mangalyam($start_date,$end_date,$selected_category,$selected_status) 
    {
        
    $this->db->select('tbl_payement.id as pid,tbl_payement.status,
    tbl_payement.payment_staff_id,tbl_payement.ctime,tbl_payement.date,tbl_payement.addoncontact,
    tbl_payement.final_amount,tbl_payement.physical_status as pstatus,
    tbl_payement.payment_status as paystatus,tbl_payement.description as dt,
    tbl_registration.id,tbl_registration.happynikah_id,tbl_registration.name,
    tbl_registration.phone');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_payement.user_id');
    $this->db->where('tbl_payement.status','1');
    $this->db->order_by('pid','desc');
    $this->db->where('tbl_payement.date >=', $start_date);
    $this->db->where('tbl_payement.date <=', $end_date);
    $this->db->where('tbl_registration.hmangalyam',1);
    $this->db->where('tbl_payement.payment_staff_id',$selected_category);
    $this->db->where('tbl_payement.payment_status',$selected_status);
    $query = $this->db->get();
    
    return $query->result();
    }

    public function getDataBetweenDatescount_mangalyam($start_date,$end_date,$selected_category,$selected_status) 
    {
    
    $this->db->select('SUM(final_amount) as famount');
    $this->db->from('tbl_payement');

    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id');
    $this->db->where('tbl_payement.status', '1');
    $this->db->where('tbl_payement.payment_staff_id', $selected_category);
    $this->db->where('tbl_payement.payment_status', $selected_status);
    $this->db->where('tbl_registration.hmangalyam',1);
    $this->db->where('tbl_payement.date >=', $start_date);
    $this->db->where('tbl_payement.date <=', $end_date);

    $query = $this->db->get();
    return $query->row();
    }

      public function isDataDuplicate_mangalyam($data)
    {
        
    $query = $this->db->get_where('tbl_target', array('user_id' => $data['user_id'], 
    'target_amount' => $data['target_amount'],'status'=>'2', 'date' => $data['date'],'status'=>'2'));
    return $query->num_rows() > 0;
    }


    public function insertData_mangalyam($data)
    {
     $this->db->insert('tbl_target', $data);
    }

      public function getUsers_mangalyam($postData = null) 
     {

        $response = array();


        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; 
        $columnIndex = $postData['order'][0]['column']; 
        $columnName = $postData['columns'][$columnIndex]['data']; 
        $columnSortOrder = $postData['order'][0]['dir']; 
        $searchValue = $postData['search']['value']; 

        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
     
      
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if ($searchCity != '') 
        {
        $search_arr[] = " direct='" . $searchCity . "' ";
        }
      
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;

  
        $this->db->select('count(*) as allcount');
        
        if ($searchQuery != '') 
        {
            $this->db->where($searchQuery);
        }
        
        $ydate=date('2023-10-04');
        
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        // $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        $this->db->join('tbl_payement U', 'C.id = U.user_id', 'left');
        $this->db->join('tbl_paymentrequest P', 'C.id = P.payment_id AND P.delete_status = "Active"', 'left');
        $this->db->join('tbl_followup F', 'C.id = F.uid AND F.delete_status = "Active"', 'left');
        $this->db->where('C.status', '1');
        $this->db->where('C.hmangalyam', '1');
        $this->db->where('C.reg_date>=', $ydate);
        $this->db->where('P.payment_id IS NULL');
        $this->db->where('F.uid IS NULL');
       $this->db->where('U.user_id IS NULL');
        $this->db->where('C.assign_status !=', 'Inactive');
        $this->db->order_by('cid', 'desc');
        
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;


        // $this->db->select('*');
        if ($searchQuery != '') 
        
        {
            $this->db->where($searchQuery);
        }
        
        
        $ydate=date('2023-10-04');
        
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        // $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        $this->db->join('tbl_payement U', 'C.id = U.user_id', 'left');
        $this->db->join('tbl_paymentrequest P', 'C.id = P.payment_id AND P.delete_status = "Active"', 'left'); 
        $this->db->join('tbl_followup F', 'C.id = F.uid AND F.delete_status = "Active"', 'left');
        $this->db->where('C.status', '1');
        $this->db->where('C.hmangalyam', '1');
        $this->db->where('C.reg_date>=', $ydate);
        $this->db->where('P.payment_id IS NULL');
        $this->db->where('F.uid IS NULL');
        // $this->db->where('(U.user_id IS NULL OR U.status = 0)');
        $this->db->where('U.user_id IS NULL');

        $this->db->where('C.assign_status !=', 'Inactive');
        $this->db->order_by('cid', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();
        
        
        $data = array();

        foreach ($records as $record) 
        {
        
        $data[] = array(
        "happynikah_id" => $record->happynikah_id,
        "name" => $record->name,
        "reg_date" => $record->reg_date,
        "native_place" => $record->native_place,
        // "city" => $record->city,
        "cid" => $record->cid
        );
        }
        
        
        $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
        );
        
        return $response;
        }

        public function getUsers2_mangalyam($postData = null) 
       {

        $response = array();
        
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = $postData['search']['value'];
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
        $search_arr = array();
        $searchQuery = "";
        
        if($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if($searchCity != '') 
        {
         $search_arr[] = " direct='" . $searchCity . "' ";
        }
      
        if(count($search_arr) > 0) 
        {
         $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;

        $this->db->select('count(*) as allcount');
        if ($searchQuery != '') 
        {
        $this->db->where($searchQuery);
        }
        
        $todaydate = date('Y-m-d');
        // $this->db->distinct();
      
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        
        $subquery = "(SELECT MAX(id) FROM tbl_paymentrequest WHERE payment_id = C.id)";
        $this->db->select($subquery, FALSE);
        $this->db->join('tbl_paymentrequest P', "P.id = ($subquery)", 'left');
      
        $subquery15= "(SELECT MAX(id) FROM tbl_followup WHERE uid = C.id)";
        $this->db->select($subquery15, FALSE);
        $this->db->join('tbl_followup F', "F.id = ($subquery15)", 'left');
     
        $this->db->where('C.status', '1');
        $this->db->where('C.activecalls_status!=', '2'); 
        
        $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        $this->db->where('C.hmangalyam', '1');
        $this->db->where("(STR_TO_DATE(P.postpone_date, '%d-%m-%Y') < '$todaydate' AND P.paid_status = 'Unpaid')");
        $this->db->where("(STR_TO_DATE(F.fdate, '%d-%m-%Y') < '$todaydate')");
        $this->db->group_by('C.id');
        $this->db->order_by('cid', 'desc');
        
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;


        $this->db->select('*');
        if($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $todaydate = date('Y-m-d');
  
        // $this->db->distinct();
        $this->db->select("C.id as cid, C.happynikah_id,C.name, C.reg_date, C.native_place");
        $this->db->from('tbl_registration C');
        
      
        
        $subquery = "(SELECT MAX(id) FROM tbl_paymentrequest WHERE payment_id = C.id)";
        $this->db->select($subquery, FALSE);
        $this->db->join('tbl_paymentrequest P', "P.id = ($subquery)", 'left');
      
        $subquery15= "(SELECT MAX(id) FROM tbl_followup WHERE uid = C.id)";
        $this->db->select($subquery15, FALSE);
        $this->db->join('tbl_followup F', "F.id = ($subquery15)", 'left');
     
        $this->db->where('C.status', '1');
        $this->db->where('C.activecalls_status!=', '2'); 
  
         $this->db->where('NOT EXISTS (SELECT * FROM tbl_payement U WHERE status = 1 AND C.id = U.user_id)');
        
        
        //  $this->db->join('tbl_payement U', 'U.user_id = C.id AND U.status = 1', 'left');
        //  $this->db->where('(U.user_id IS NULL OR U.status != 1)');
         
         
        $this->db->where('C.hmangalyam', '1');
        
        // $this->db->join('tbl_payement U', 'U.user_id = C.id AND U.status = 1', 'left');
        //  $this->db->where('U.user_id IS NULL');

         
        // $this->db->where('C.active_call', '0');
        $this->db->where("(STR_TO_DATE(P.postpone_date, '%d-%m-%Y') < '$todaydate' AND P.paid_status = 'Unpaid')");
        $this->db->where("(STR_TO_DATE(F.fdate, '%d-%m-%Y') < '$todaydate')");
        $this->db->group_by('C.id');
        
        $this->db->order_by('cid', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        
        $records = $this->db->get()->result();

        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
                "happynikah_id" => $record->happynikah_id,
                "name" => $record->name,
                "reg_date" => $record->reg_date,
                "native_place" => $record->native_place,
                // "city" => $record->city,
                "cid" => $record->cid
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }


    public function getCustomerData_mangalyam($customerId, $fromDate, $toDate) 
    {
    
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('emp_id', $customerId);
    $this->db->where('hmangalyam', 1);

    if($fromDate !== null) 
    {
        $this->db->where('reg_date >=', $fromDate);
    }

    if($toDate !== null) 
    {
        $this->db->where('reg_date <=', $toDate);
    }

    $query = $this->db->get();
    return $query->result_array();
    }

     public function getCustomer2Data_mangalyam($customerId, $fromDate, $toDate) 
    {
      
        $this->db->select('tbl_followup.*, tbl_registration.hmangalyam'); 
        $this->db->from('tbl_followup');
        $this->db->join('tbl_registration', 'tbl_followup.uid = tbl_registration.id', 'left'); 
        $this->db->where('tbl_followup.login_id', $customerId);
        $this->db->where('tbl_followup.status', 'Ring');
        $this->db->where('hmangalyam', 1);
        
        if($fromDate !== null) 
        {
        $this->db->where('tbl_followup.cur_date >=', $fromDate);
        }
        
        if($toDate !== null) 
        {
        $this->db->where('tbl_followup.cur_date <=', $toDate);
        }
        
        $this->db->where('tbl_registration.hmangalyam', 1);
        
        $query = $this->db->get();
        return $query->result_array();

    }

      public function getCustomer3Data_mangalyam($customerId, $fromDate, $toDate) 
    {
     
        $this->db->select('tbl_paymentrequest.*, tbl_registration.hmangalyam'); 
        $this->db->from('tbl_paymentrequest');
        $this->db->join('tbl_registration', 'tbl_paymentrequest.payment_id = tbl_registration.id', 'left'); 
        $this->db->where('tbl_paymentrequest.login_id', $customerId);
        $this->db->where('tbl_paymentrequest.crnt_date >=', $fromDate);
        $this->db->where('tbl_paymentrequest.crnt_date <=', $toDate);
        $this->db->where('tbl_registration.hmangalyam', 1);
        
        $query = $this->db->get();
        return $query->result_array();
        
    }

     public function getCustomer4Data_mangalyam($customerId, $fromDate, $toDate) 
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        $this->db->where('delete_id', $customerId);
        $this->db->where('status','3');
        $this->db->where('hmangalyam','1');
        $this->db->where('delete_date >=', $fromDate);
        $this->db->where('delete_date <=', $toDate);
        $query = $this->db->get();
        return $query->result_array();
    }

       public function getCustomer5Data_mangalyam($customerId, $fromDate, $toDate) 
    {
       
        $this->db->select('tbl_followup.*, tbl_registration.hmangalyam'); 
        $this->db->from('tbl_followup');
        $this->db->join('tbl_registration', 'tbl_followup.uid = tbl_registration.id', 'left'); 
        $this->db->where('tbl_followup.login_id', $customerId);
        $this->db->where('tbl_followup.status', 'Whatsapp connect');
        $this->db->where('tbl_followup.cur_date >=', $fromDate);
        $this->db->where('tbl_followup.cur_date <=', $toDate);
        $this->db->where('tbl_registration.hmangalyam', 1);
        
        $query = $this->db->get();
        return $query->result_array();
        
    }

     public function getCustomer6Data_mangalyam($customerId, $fromDate, $toDate) 
    {
   
    $this->db->select('tbl_followup.*, tbl_registration.hmangalyam'); 
    $this->db->from('tbl_followup');
    $this->db->join('tbl_registration', 'tbl_followup.uid = tbl_registration.id', 'left'); 
    $this->db->where('tbl_followup.login_id', $customerId);
    $this->db->where('tbl_followup.status', 'Interested');
    $this->db->where('tbl_followup.cur_date >=', $fromDate);
    $this->db->where('tbl_followup.cur_date <=', $toDate);
    $this->db->where('tbl_registration.hmangalyam', 1);
    
    $query = $this->db->get();
    return $query->result_array();
        
    }

    public function getTotalAmount_mangalyam($customerId, $fromDate, $toDate) 
    {
       
    $this->db->select('SUM(tbl_payement.final_amount) as final_total_amount, tbl_payement.*, tbl_registration.hmangalyam');
    $this->db->from('tbl_payement');
    $this->db->join('tbl_registration', 'tbl_registration.id = tbl_payement.user_id', 'left');
    $this->db->where('tbl_payement.payment_staff_id', $customerId);
    $this->db->where('tbl_payement.date >=', $fromDate);
    $this->db->where('tbl_payement.date <=', $toDate);
    $this->db->where('tbl_registration.hmangalyam', 1);
    
    $query = $this->db->get();
    $result['final_total_amount'] = $query->row()->final_total_amount;
    $result['payment_data'] = $query->result_array();
    
    return $result;
    }


    public function getTotalFollowupList_mangalyam($customerId,$fromDate,$toDate)
    {
    $this->db->select('F.uid as followup_uid,F.cur_date,F.message,F.status,F.login_id,
    R.id,R.happynikah_id,R.name,R.hmangalyam');
    $this->db->from('tbl_followup F');
    $this->db->join('tbl_registration R','R.id=F.uid','left');
    $this->db->where('F.login_id', $customerId);
    $this->db->where('R.hmangalyam', 1);
    $this->db->where('F.cur_date >=', $fromDate);
    $this->db->where('F.cur_date <=', $toDate);
    $qu = $this->db->get();
    return $qu->result_array(); 
    }

    public function getTotalDeleteList_mangalyam($customerId,$date_ymd_his,$date_ymd_his2)   
    {
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('delete_id', $customerId);
    $this->db->where('status','3');
    $this->db->where('hmangalyam', 1);
    $this->db->where('delete_date >=', $date_ymd_his);
    $this->db->where('delete_date <=', $date_ymd_his2);
    $query = $this->db->get();
    return $query->result_array();
    }

    public function total_postponealldata_mangalyam()
    {
    $postpone_date=date('Y-m-d');
    $this->db->select('tbl_registration.happynikah_id,tbl_registration.name,
    tbl_registration.hmangalyam,tbl_paymentrequest.*,tbl_users1.user_id,tbl_users1.user_name');
    $this->db->from('tbl_paymentrequest');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_paymentrequest.payment_id');
    $this->db->join('tbl_users1','tbl_users1.user_id=tbl_paymentrequest.login_id');
    $this->db->where('delete_status','Active');
    $this->db->where('tbl_registration.hmangalyam','1');
    $this->db->where("STR_TO_DATE(tbl_paymentrequest.postpone_date, '%d-%m-%Y') >=", 
    $postpone_date);
    $this->db->group_by('tbl_registration.happynikah_id');
    $data= $this->db->get();
    return $data->result_array();
    
    }

    public function total_postponeall_mangalyam($emp_id)
    {
        
    $postpone_date=date('Y-m-d');
    $this->db->select('tbl_registration.happynikah_id,tbl_registration.name,
    tbl_registration.hmangalyam,tbl_paymentrequest.*,tbl_users1.user_id,tbl_users1.user_name');
    $this->db->from('tbl_paymentrequest');
    $this->db->join('tbl_registration','tbl_registration.id=tbl_paymentrequest.payment_id');
    $this->db->join('tbl_users1','tbl_users1.user_id=tbl_paymentrequest.login_id');
    $this->db->where('delete_status','Active');
    $this->db->where('tbl_registration.hmangalyam','1');
    $this->db->where("STR_TO_DATE(tbl_paymentrequest.postpone_date, '%d-%m-%Y') >=", $postpone_date);
    $this->db->where('tbl_users1.user_id',$emp_id);
    $this->db->group_by('tbl_registration.happynikah_id');
    $que= $this->db->get();
    return $que->result_array();
    
    }

    public function GetQuickregister_mangalyam()
    {
    
    $this->db->select('r.*,d.district,d.district_id');
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_district d', 'd.district_id=r.home_district', 'left');
        
    $this->db->where('r.stage','0');
    $this->db->where('r.countryCode','91');
    $this->db->group_start();
    $this->db->where('r.state', '18');
    $this->db->or_where('r.state IS NULL', NULL, false);
    $this->db->group_end();

    $this->db->where_in('r.reg_through',array('0','2'));
    $this->db->where('r.status','0');
    $this->db->where('r.hmangalyam','1');
    $this->db->order_by('r.id','desc');

    $query = $this->db->get();
    return $query->result();
    }


    public function Getstage3_mangalyam()
    {
    $this->db->select('r.*,d.district,d.district_id');
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_district d', 'd.district_id=r.home_district', 'left');
    
    $this->db->where('r.stage <>', 0);
    $this->db->where('r.countryCode', '91');
    $this->db->group_start();
    $this->db->where('r.state', '18');
    $this->db->or_where('r.state IS NULL', NULL, false);
    $this->db->group_end();
    // $this->db->where('reg_date >=', '2023-12-05');
    $this->db->where_in('r.reg_through', array('0', '2'));
    $this->db->where('r.status', '0');
    $this->db->where('r.hmangalyam', '1');
    $this->db->order_by('r.id', 'desc');
    
    $query = $this->db->get();
    return $query->result();
    }

    public function GetGulfData_mangalyam()
    {
    $this->db->select('R.id, R.happynikah_id, R.name, R.phone, R.countryCode,R.reg_date, R.reg_through');
    $this->db->from('tbl_registration R');
    $this->db->where_in('R.reg_through', array('0', '2')); 
    $this->db->where_in('R.countryCode', array('973','965','968','974','966','967','971'));
    $this->db->where('R.status','0'); 
    $this->db->where('R.hmangalyam','1');
    $query = $this->db->get();    
    return $query->result();
    }


    public function Getotherstate_mangalyam()
    {
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where_in('stage',array('0','1'));
    $this->db->where_in('reg_through',array('0','2'));
    $this->db->where('countryCode','91');
    $this->db->where_not_in('state', array('NULL','18'));
    $this->db->where('status','0');
    $this->db->where('hmangalyam','1');
    $this->db->order_by('id','desc');

    $query = $this->db->get();
    return $query->result();
    }

    public function get_female_count_mangalyam($districts)
    {
    $this->db->select('r.*,d.district_id,d.district');
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_district d','d.district_id = r.native_district');
    $this->db->where('r.gender ','2');
    $this->db->where('d.district', $districts);
    $this->db->where('r.status','1'); 
    $this->db->where('r.hmangalyam','1');
    $query = $this->db->get();
    return $query->result_array();
    } 

    public function GetPendingcalls_mangalyam()
    {
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where_in('stage',array('2','3','4'));
    $this->db->where('hmangalyam','1');
    $this->db->where('status','0');
    $this->db->order_by('id','desc');
    
    $query = $this->db->get();
    return $query->result();
    }


    public function GetQuickcalls_mangalyam()
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        $this->db->where_in('stage',array('0','1'));
        $this->db->where_in('reg_through',array('0','2'));
        $this->db->where('status','0');
        $this->db->where('hmangalyam','1');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result();
    }


public function GetFullData_mangalyam($table = '',$column = '',$column_value = '',$valtype='')
    {
        
        $column_values=explode(",",$column_value);
        $this->db->select('*');
        $this->db->from($table);
         $this->db->where('hmangalyam','1');

        if($table == 'tbl_height' && $column_value !='')
        {
         $this->db->where('height_id >=',$column_value);
        }
        
        if($column != '' && $column_value !='' && $valtype!="arrayvals")
        {
          $this->db->where($column,$column_value);
        }
        
        if($table == 'tbl_registration')
        {
         $this->db->order_by('id','desc');
        }
        
        if($valtype=="arrayvals")
        {
         $this->db->where_in($column,$column_values);
        }
        
        $query = $this->db->get();
       
        return $query->result();
        
    }

     public function get_male_count_mangalyam($districts)
    {
     $this->db->select('r.*,d.district_id,d.district');
     $this->db->from('tbl_registration r');
     $this->db->join('tbl_district d','d.district_id = r.native_district');
     $this->db->where('r.gender ','1');
     $this->db->where('d.district', $districts);
     $this->db->where('r.status','1'); 
     $this->db->where('r.hmangalyam','1');
     $query = $this->db->get();
     return $query->result_array();
    }

    public function get_femaledatemangalyam($from_date,$to_date)
    {
    $this->db->select('*');
    $this->db->from('tbl_registration');
    $this->db->where('gender ','2');
    $this->db->where('reg_date >=',$from_date);
    $this->db->where('reg_date <=',$to_date);
    $this->db->where('status','1'); 
    $this->db->where('hmangalyam','1');
    $this->db->order_by('id','desc');
    $query = $this->db->get();
    return $query->result_array();
    }

    public function getSenderCounts_mangalyam($selected_date)
    {
 
    $this->db->select('tbl_registration.happynikah_id as hn_id, tbl_registration.name,
    COUNT(tbl_contact_viewed.sender_id) as count');
    $this->db->from('tbl_contact_viewed');
    $this->db->join('tbl_registration','tbl_contact_viewed.sender_id = tbl_registration.id');
    $this->db->where('DATE(tbl_contact_viewed.date)', $selected_date);
    $this->db->where('tbl_registration.hmangalyam', 1);
    $this->db->group_by('tbl_registration.happynikah_id, tbl_registration.name');
    
    $query = $this->db->get(); 
    return $query->result_array();
    }


    public function get_maledatemangalyam($from_date,$to_date)
    {
     $this->db->select('*');
     $this->db->from('tbl_registration');
     $this->db->where('gender ','1');
     $this->db->where('reg_date >=',$from_date);
     $this->db->where('reg_date <=',$to_date);
     $this->db->where('status','1'); 
     $this->db->where('hmangalyam','1');
     $this->db->order_by('id','desc');
     $query = $this->db->get();
     return $query->result_array();
    }  


    public function get_all_excel_mangalyam()
    {
    $this->db->select('r.happynikah_id,r.reg_date,r.name,r.native_place,h.height,
    w.weight,r.status,r.hmangalyam,r.id,r.age');
    $this->db->select('CASE WHEN r.gender = "1" THEN "Male" WHEN r.gender = "2" THEN "Female" ELSE "Unknown" END AS gender', FALSE);
    $this->db->select('c.caste,r.marital_status,d.district,e.education,f.financial_status');
    $this->db->select('CASE WHEN r.photo = "" OR r.photo IS NULL THEN "No Photo" ELSE "Photo Available" END AS photo_status', FALSE);
    
    $this->db->from('tbl_registration r');
    $this->db->join('tbl_height h', 'r.height = h.height_id', 'LEFT');
    $this->db->join('tbl_weight w', 'r.weight = w.weight_id', 'LEFT');
    $this->db->join('tbl_district d', 'r.native_district = d.district_id', 'LEFT');
    $this->db->join('tbl_education e', 'r.education= e.edu_id', 'LEFT');
    $this->db->join('tbl_caste c', 'r.caste = c.cid', 'LEFT');
    $this->db->join('tbl_familyprofile f', 'r.id =f.user_id', 'LEFT');
    
    $this->db->where('r.status','1'); 
    $this->db->where('r.hmangalyam','1');
    $this->db->order_by('r.id','desc');
    
    $query = $this->db->get();
    return $query->result_array();
    }


    public function getUsers_delete_all_mangalyam($postData = null) 
     {

        $response = array();

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data']; 
        $columnSortOrder = $postData['order'][0]['dir']; 
        $searchValue = $postData['search']['value']; 
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
        $search_arr = array();
        
        $searchQuery = "";
        
        if($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if($searchCity != '') 
        {
          $search_arr[] = " direct='" . $searchCity . "' ";
        }
      
        if(count($search_arr) > 0) 
        {
          $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        
        if($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $this->db->where('status', '3');
        $this->db->where('hmangalyam', '1');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->order_by('id', 'desc');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        
        if($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        $this->db->where('status','3');
        $this->db->where('hmangalyam', '1');
        // $this->db->where('assign_status!=', 'Inactive');
        $this->db->order_by('id', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('tbl_registration')->result();

        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
            "happynikah_id" => $record->happynikah_id,
            "name" => $record->name,
            "reg_date" => $record->reg_date,
            "phone" => $record->phone,
            "id" => $record->id,
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }


    public function getUsers_no_profile_pic_all_mangalyam($postData = null) 
    {
    $response = array();
    
    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; 
    $columnIndex = $postData['order'][0]['column']; 
    $columnName = $postData['columns'][$columnIndex]['data']; 
    $columnSortOrder = $postData['order'][0]['dir']; 
    $searchValue = $postData['search']['value']; 
    $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';
    $searchGender = isset($postData['searchGender']) ? $postData['searchGender'] : '';
    
    $search_arr = array();
    $searchQuery = "";
    
    if($searchValue != '') 
    {
    $search_arr[] = " (name like '%" . $searchValue . "%' or 
    happynikah_id like '%" . $searchValue . "%' or 
    reg_date like'%" . $searchValue . "%' ) ";
    }
    
    if($searchCity != '') 
    {
    $search_arr[] = " direct='" . $searchCity . "' ";
    }
    
    if($searchGender != '') 
    {
    $search_arr[] = " gender='" . $searchGender . "' ";
    }
    
    if(count($search_arr) > 0) 
    {
    $searchQuery = implode(" and ", $search_arr);
    }
    
    // Total number of records without filtering
    $this->db->from('tbl_registration R');
    $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)',
     null, false);
    $this->db->where('R.status', '1');
    $this->db->where('R.photo', '');
    $this->db->where('R.hmangalyam', '1');
    $totalRecords = $this->db->count_all_results();
    
    // Total number of records with filtering
    $this->db->from('tbl_registration R');
    $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)',
     null, false);
    $this->db->where('R.status', '1');
    $this->db->where('R.photo', '');
    $this->db->where('R.hmangalyam', '1');
    if ($searchQuery != '') {
    $this->db->where($searchQuery);
    }
    $totalRecordwithFilter = $this->db->count_all_results();
    
    // Fetch records
    $this->db->select('*');
    $this->db->from('tbl_registration R');
    $this->db->where('NOT EXISTS (SELECT * FROM tbl_userimages U WHERE R.id = U.user_id)', null, false);
    $this->db->where('R.status', '1');
    $this->db->where('R.photo', '');
    $this->db->where('R.hmangalyam', '1');
    if ($searchQuery != '') {
    $this->db->where($searchQuery);
    }
    $this->db->order_by('R.id', 'desc');
    $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage, $start);
    $records = $this->db->get()->result();
    
    $data = array();
    
    foreach ($records as $record) {
    $data[] = array(
    "happynikah_id" => $record->happynikah_id,
    "name" => $record->name,
    "reg_date" => $record->reg_date,
    "phone" => $record->phone,
    "id" => $record->id,
    );
    }
    
    // Response
    $response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
    );
    
    return $response;
    }
    


    public function getUsers_approve_all_mangalyam($postData = null) 
     {

        $response = array();
        
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
        $searchCity = isset($postData['searchCity']) ? $postData['searchCity'] : '';

        $search_arr = array();
        
        $searchQuery = "";
        
        if($searchValue != '') 
        {
            $search_arr[] = " (name like '%" . $searchValue . "%' or 
            happynikah_id like '%" . $searchValue . "%' or 
            reg_date like'%" . $searchValue . "%' ) ";
        }
        
        if($searchCity != '') 
        {
            $search_arr[] = " direct='" . $searchCity . "' ";
        }
        
        if(count($search_arr) > 0) 
        {
            $searchQuery = implode(" and ", $search_arr);
        }

        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecords = $records[0]->allcount;


        $this->db->select('count(*) as allcount');
        if ($searchQuery != '') 
        {
         $this->db->where($searchQuery);
        }
        
        
        $this->db->where('status', '1');
        $this->db->where('hmangalyam', '1');
        $this->db->order_by('id', 'desc');
        $records = $this->db->get('tbl_registration')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        $this->db->select('*');

        if ($searchQuery != '') 
        {
        $this->db->where($searchQuery);
        }

        $this->db->where('status','1');
        $this->db->where('hmangalyam', '1');
        $this->db->order_by('id', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('tbl_registration')->result();

        $data = array();

        foreach ($records as $record) 
        {

            $data[] = array(
                "happynikah_id" => $record->happynikah_id,
                "name" => $record->name,
                "reg_date" => $record->reg_date,
                "phone" => $record->phone,
                 "id" => $record->id,
            );
        }


        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    
	
    }