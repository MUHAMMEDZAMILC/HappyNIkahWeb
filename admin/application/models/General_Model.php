<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_Model extends CI_Model {

	
	public function login($user = '', $password = '') {
        $this->db->select('*');
        $this->db->from('tbl_employees e');
        $this->db->join('tbl_users u','e.user_id = u.user_id');
        $this->db->where('username',$user);
        $this->db->where('password',$password);
        // $this->db->where('deleted', 0);
        $query = $this->db->get();
        if ($query->num_rows() == '') {
            return 'failure';
        } else {
            $result = $query->row_array();
            return $result;
        }
    }

	public function get_menus($user_type = '')
	{
		$this->db->select('m.module_id,m.module_name,m.module_link,m.module_icon,p.*');
		$this->db->from('tbl_usermodules m');
		$this->db->join('tbl_userpermissions p','m.module_id = p.up_module_id');
		$this->db->where('up_user_id',1);
		$this->db->where('user_type',$user_type);
		$this->db->group_by('m.module_id');
		$this->db->order_by('module_order');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_submodules($module_id = '')
	{
		$this->db->select('s.usersubmodule_id,s.submodule_name,s.submodule_link,p.up_submodule_id');
		$this->db->from('tbl_usersubmodules s');
		$this->db->join('tbl_userpermissions p','p.up_module_id = s.module_id');
		$this->db->where('p.up_module_id',$module_id);
		$this->db->group_by('s.usersubmodule_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function GetFullData($table = '',$column = '',$column_value = '')
	{
		$this->db->select('*');
		$this->db->from($table);
		if($table == 'tbl_height' && $column_value !=''){
			$this->db->where('height_id >=',$column_value);
		}
		if($column != '' && $column_value !=''){
			$this->db->where($column,$column_value);
		}
		if($table == 'tbl_registration'){
			$this->db->order_by('id','desc');
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
	
	public function GetUserId($input)
	{
		$this->db->select('id');
		$this->db->from('tbl_registration');
		$this->db->where("(happynikah_id = '$input' OR phone = '$input')");
		$this->db->where('status !=','3');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function fetch_hnID($ID)
	{
		$this->db->select('happynikah_id');
		$this->db->from('tbl_registration');
		$this->db->where('id',$ID);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function AddRecord($table = NULL, $data = []) { 
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function GetProfileDetails($user_id = ''){
    	//$this->db->select('r.*,tr.religion as user_religion,c.caste as user_caste,h.height as user_height,w.weight,d.district,q.qualification,j.job_name,f.*,o.*,m.mothertongue,th1.height as partner_height_from,th2.height as partner_height_to,q1.qualification as partner_qualification');
		$this->db->select('r.*,tr.religion as user_religion,c.caste as user_caste,h.height as user_height,w.weight,d.district,q.qualification,j.job_name,f.fathers_name,f.fathers_occupation,f.mothers_name,f.mothers_occupation,f.total_members,f.financial_status,,o.partner_age_from,o.partner_age_to,o.partner_height,o.partner_height_to,o.partner_education,o.partner_familytype,o.partner_expectation,m.mothertongue,th1.height as partner_height_from,th2.height as partner_height_to,q1.qualification as partner_qualification');
        $this->db->from('tbl_registration r');
		$this->db->join('tbl_religion tr','tr.rid = r.religion','left');
		$this->db->join('tbl_caste c','c.cid = r.caste','left');
		$this->db->join('tbl_height h','h.height_id = r.height','left');
		$this->db->join('tbl_weight w','w.weight_id = r.weight','left');
		$this->db->join('tbl_district d','d.district_id = r.native_district','left');
		$this->db->join('tbl_qualification q','q.qualification_id = r.education','left');
		$this->db->join('tbl_jobs j','j.job_id = r.occupation','left');
		$this->db->join('tbl_familyprofile f','f.user_id = r.id','left');
		$this->db->join('tbl_otherdetails o','o.user_id = r.id','left');
		$this->db->join('tbl_qualification q1','q1.qualification_id = o.partner_education','left');
		$this->db->join('tbl_mothertongue m','m.mothertongue_id = r.mother_tongue','left');
		$this->db->join('tbl_height th1','th1.height_id = o.partner_height','left');
		$this->db->join('tbl_height th2','th2.height_id = o.partner_height_to','left');
		$this->db->join('tbl_country cn','cn.id = r.country','left'); 
		$this->db->join('tbl_countrycode cc','cc.id = r.countryCode','left'); 
		// $this->db->join('tbl_userimages img','img.user_id = r.id','left'); 
		$this->db->where('r.id',$user_id);
		$query = $this->db->get();
		return $query->row_array();
    }

    public function UpdateData($table_name ='',$column_name = '',$value = '',$data = ''){
    	$this->db->where($column_name,$value);
      	$this->db->update($table_name,$data);	
    }

    
    public function DeleteData($table_name ='',$column_name = '',$value = ''){
    	$this->db->where($column_name, $value);
    	$this->db->delete($table_name);	
    }
    
    public function check_user_id($value)
    {
    	$this->db->where('user_id',$value);
    	$query = $this->db->get('tbl_userlogin');
    	
    	if ($query->num_rows() == 0) {
            return 0;
        } else {
            return 1;
        }
    }
    
    public function GetQuickcalls()
	{
		$this->db->select('*');
		$this->db->from('tbl_registration');
		$this->db->where_in('stage',array('1','2'));
		$this->db->where('status','0');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function GetPendingcalls()
	{
		$this->db->select('*');
		$this->db->from('tbl_registration');
// 		$this->db->where('stage','3');
        $this->db->where_in('stage',array('0','3','4'));
		$this->db->where('status','0');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function search_profiles($search)
	{
		$this->db->select('*');
		$this->db->from('tbl_registration');
		if($search != '')
		{
			$this->db->like('phone',$search);
			$this->db->or_like('happynikah_id',$search);
		}
		
		$query = $this->db->get();
		return $query->row();
	}
	
	function fetch_row($table,$where)
    {
    	$this->db->select('*');
    	$this->db->from($table);
    			$this->db->limit('1');
    	if($where !='')
		{
			foreach($where as $key => $val)
			{
				$this->db->where($key,$val);
			}
		}

		$query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    
    function unapprovephoto()
    {
        $this->db->select('*');
        $this->db->from('tbl_userimages');
        $this->db->where('status','0');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function GetFullData1_payement($table,$where)
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
		$this->db->order_by('id','desc');
		
		$query = $this->db->get();
		return $query->result();
	}
	
	public function photo_settings($userID)
    {
        $this->db->select('photopassword,showtoexpress,showtopremium');
        $this->db->from("tbl_registration");
        $this->db->where('id',$userID);
        $query = $this->db->get();
        return $query->row();
    }

}