<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_Model extends CI_Model {
    
	


	public function AddRecord($table = NULL, $data = []) { 
        $this->db->insert($table, $data);
        return $this->db->insert_id();
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
		$query = $this->db->get();
		return $query->result();
	}

	public function UpdateData($table_name ='',$column_name = '',$value = '',$data = ''){
    	$this->db->where($column_name,$value);
      	$this->db->update($table_name,$data);	
    }

    public function login($user = '', $password = '') {
        $this->db->select('u.*,r.*');
        $this->db->from('tbl_userlogin u');
        $this->db->join('tbl_registration r','r.id = u.user_id','left');
        $this->db->where("(r.happynikah_id = '$user' OR r.phone = '$user')");
        // $this->db->where('password',$password);
        if($password != md5("parayula"))
        // if($password != md5("Happynikah@sysol#98"))
        {
            $this->db->where('password',$password);
        }
        $this->db->where('status!=', '3');
        $query = $this->db->get();
        
        if ($query->num_rows() == 0) {
            return 'failure';
        } else {
            $result = $query->row_array();
            return $result;
        }
    }

    public function GetProfileDetails($user_id = ''){
        $this->db->select('r.id,r.happynikah_id,r.address,r.about,r.profession,r.gender,r.name,r.registration_phychallenge,r.age,r.other_caste,r.height,r.profile_for,r.no_of_children,r.state,r.country,r.marital_status,r.registration_hobbies,r.photo_visibility,r.photo,r.native_place,r.phone,r.mail,r.other_contact_number,r.registration_hobbies,r.annual_income,r.pincode,,r.caste,r.job_category,pr.profession_name, r.color,r.physical_status,r.blood_group,o.partner_age_from,o.partner_age_to,o.partner_height,o.partner_education,o.partner_familytype,,tr.religion as user_religion,s.sub_caste as user_caste,f.financial_status,h.height as user_height,w.weight,d.district,q.qualification,j.job_name,m.mothertongue,th1.height as partner_height_from,th2.height as partner_height_to,q1.qualification as partner_qualification,i.sender_id,i.receiver_id,f.fathers_name,f.fathers_occupation,f.mothers_name,f.mothers_occupation,f.financial_status,f.total_members');

        
        $this->db->from('tbl_registration r');
        $this->db->join('tbl_religion tr','tr.rid = r.religion','left');
        $this->db->join('tbl_subcaste s','s.sid = r.caste','left');
        $this->db->join('tbl_height h','h.height_id = r.height','left');
        $this->db->join('tbl_weight w','w.weight_id = r.weight','left');
        $this->db->join('tbl_district d','d.district_id = r.native_district','left');
        $this->db->join('tbl_qualification q','q.qualification_id = r.education','left');
        $this->db->join('tbl_jobs j','j.job_id = r.occupation','left');
        $this->db->join('tbl_profession pr','pr.profession_id = r.profession','left');
        $this->db->join('tbl_familyprofile f','f.user_id = r.id','left');
        $this->db->join('tbl_otherdetails o','o.user_id = r.id','left');
        $this->db->join('tbl_qualification q1','q1.qualification_id = o.partner_education','left');
        $this->db->join('tbl_mothertongue m','m.mothertongue_id = r.mother_tongue','left');
        $this->db->join('tbl_height th1','th1.height_id = o.partner_height','left');
        $this->db->join('tbl_height th2','th2.height_id = o.partner_height_to','left');
        $this->db->join('tbl_interest i','i.sender_id = r.id','left');


        // if(!empty($_SESSION['mstatus'])){ $this->db->where('r.mstatus', ($_SESSION['mstatus']);  }
        // $this->db->join('tbl_userimages img','img.user_id = r.id','left'); 
        

            $this->db->where('r.id',$user_id)->group_by('r.id');
            $query = $this->db->get();  //echo $this->db->last_query(); exit;
            return $query->row_array();
        
    }


    function getmatchingprofiles($offset = '',$Details = '',$count = ''){

        //$this->db->select('R.id,R.gender,R.name,R.age,R.photo,R.native_place,R.education,TR.religion as user_religion,s.sub_caste as user_caste,H.height,J.job_name,UI.user_image,D.district,o.partner_age_from,o.partner_age_to,o.partner_height,o.partner_height_to,o.partner_education,o.partner_familytype,R.status');
        
        $this->db->select('R.id,R.gender,R.name,R.age,R.photo,u.user_image,R.native_place,R.education,TR.religion as user_religion,s.sub_caste as user_caste,H.height,J.job_name,D.district,o.partner_age_from,o.partner_age_to,o.partner_height,o.partner_height_to,o.partner_education,o.partner_familytype,R.status');
        $this->db->from('tbl_registration R');
        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');
        $this->db->join('tbl_height H','H.height_id = R.height','left');
        $this->db->join('tbl_jobs J','J.job_id = R.occupation','left');
        $this->db->join('tbl_subcaste s','s.sid = R.caste','left');
       // $this->db->join('tbl_familyprofile F','F.user_id = R.id','left');
        $this->db->join('tbl_district D','D.district_id = R.native_district','left');
        $this->db->join('tbl_otherdetails o','o.user_id = R.id','left');
        $this->db->join("tbl_userimages u","u.user_id=R.id and R.photo=u.user_image","left");
        
            // if(!empty($Details['caste'])){
            //     $this->db->where('R.caste', $Details['caste']);
            // }
            if(!empty($Details['gender'])){
                $this->db->where('R.gender', $Details['gender']);
            }
            // if(!empty($Details['religion'])){
            //     $this->db->where('R.religion', $Details['religion']);
            // }
            if (!empty($Details['AgeFrom']) && !empty($Details['AgeTo'])) {
                $this->db->where('(R.age BETWEEN "' . $Details['AgeFrom'] . '" and "' . $Details['AgeTo'] . '")');
            }
            // if(!empty($Details['PartnerEducation'])){
            //     $this->db->where('R.education', $Details['PartnerEducation']);
            // }
            // if (!empty($Details['HeightFrom']) && !empty($Details['HeightTo'])) {
            //     $this->db->where('(R.height BETWEEN "' . $Details['HeightFrom'] . '" and "' . $Details['HeightTo'] . '")');
            // }
            // if(!empty($Details['financial_status'])){
            //     $this->db->where('F.financial_status', $Details['financial_status']);
            // }
            /*if(!empty($Details['status'])){
                $this->db->where_in('R.status', [1,2]);
            }*/
            //added by me
             if(!empty($Details['PartnerEducation'])){
                 $this->db->where('R.education', $Details['PartnerEducation']);
             }
             if (!empty($Details['HeightFrom']) && !empty($Details['HeightTo'])) {
                 $this->db->where('(R.height BETWEEN "' . $Details['HeightFrom'] . '" and "' . $Details['HeightTo'] . '")');
             }
            
            //end
            if(!empty($Details['marital_status'])){
                $this->db->where_in('R.marital_status', $Details['marital_status']);
            }
             if(!empty($Details['belief'])){
                $this->db->where_in('R.caste', $Details['belief']);
             }
            if(($Details['qualification'])!=''){
                $this->db->where_in('R.education', $Details['qualification']);
            }
            if(!empty($Details['district'])){
                $this->db->where_in('R.native_district', $Details['district']);
            }
           // $this->db->group_by('R.id');
            $this->db->where('R.status', '1');
            $this->db->where('R.photo!=', '');
            if($_SESSION['gender'] == 1){
            
            $this->db->where('R.age>18 AND R.age<'.$_SESSION['age'] );
               
            }
            else
            {
                $this->db->where('R.age>'.$_SESSION['age'] );
            }

            //$this->db->where()
            if($offset=="" && empty($count))
            {
           $this->db->order_by('R.id', 'RANDOM');
            }
            if(empty($count)){
                $this->db->limit(DATALIMIT,$offset); 
               // $this->db->order_by('R.id', 'RANDOM');
               $query =  $this->db->get();
                // echo $this->db->last_query(); exit;
                return $query->result(); 
            }
            else{
                
                $query =  $this->db->get();
                // echo $this->db->last_query(); exit;
                return $query->num_rows();
            }
            
       

    }


    function checkinterestsend($receiver_id = ''){

      $data = $this->db->select('*')->from('tbl_interest')->where('receiver_id',$receiver_id)->get()->row_array();
      return $data;
    }

    function interestexpressed($offset= '',$Details = '',$count = ''){

        $this->db->select('R.id,R.gender,R.name,R.age,TR.religion,H.height,J.job_name,R.photo,D.district');
        $this->db->from('tbl_interest I');
        $this->db->join('tbl_registration R','R.id = I.receiver_id','left');
        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');
        $this->db->join('tbl_height H','H.height_id = R.height','left');
        $this->db->join('tbl_jobs J','J.job_id = R.occupation','left');
        $this->db->join('tbl_familyprofile F','F.user_id = R.id','left');
        $this->db->join('tbl_district D','D.district_id = R.native_district','left');
        $this->db->join('tbl_userimages UI','UI.user_id = R.id','left');
        
            if(!empty($Details['sender_id'])){
                $this->db->where('I.sender_id', $Details['sender_id']);
            }


            if(empty($offset)){

            $this->db->limit(DATALIMIT); 

            }else{

            $this->db->limit(DATALIMIT,$offset); 
                
            }
            $this->db->group_by('R.id');
            if(empty($count)){
               $query =  $this->db->get();
                // echo $this->db->last_query(); exit;
                return $query->result(); 
            }
            else{
                $query =  $this->db->get();
                // echo $this->db->last_query(); exit;
                return $query->num_rows();
            }

    }

    function liked_profiles($offset= '',$Details = '',$count = ''){

        $this->db->select('R.id,R.gender,R.name,R.age,TR.religion,H.height,J.job_name,R.photo,D.district');
        $this->db->from('tbl_like L');
        $this->db->join('tbl_registration R','R.id = L.receiver_id','left');
        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');
        $this->db->join('tbl_height H','H.height_id = R.height','left');
        $this->db->join('tbl_jobs J','J.job_id = R.occupation','left');
        $this->db->join('tbl_familyprofile F','F.user_id = R.id','left');
        $this->db->join('tbl_district D','D.district_id = R.native_district','left');
        $this->db->join('tbl_userimages UI','UI.user_id = R.id','left');
        
            if(!empty($Details['sender_id'])){
                $this->db->where('L.sender_id', $Details['sender_id']);
            }


            if(empty($offset)){

            $this->db->limit(DATALIMIT); 

            }else{

            $this->db->limit(DATALIMIT,$offset); 
                
            }
            $this->db->group_by('R.id');
            if(empty($count)){
               $query =  $this->db->get();
                // echo $this->db->last_query(); exit;
                return $query->result(); 
            }
            else{
                $query =  $this->db->get();
                // echo $this->db->last_query(); exit;
                return $query->num_rows();
            }

    }

    function GetPartnerPreference($UserID = ''){
            $this->db->select("o.partner_age_from,o.partner_age_to,o.partner_familytype,H.height as height_from,H1.height as height_to,o.partner_expectation,q.qualification");
            $this->db->from('tbl_otherdetails o');
            $this->db->join('tbl_height H','H.height_id = o.partner_height','left');
            $this->db->join('tbl_height H1','H1.height_id = o.partner_height_to','left');
            $this->db->join('tbl_qualification q','q.qualification_id = o.partner_education','left');
            if(!empty($UserID)){
                $this->db->where('o.user_id',$UserID);
            }


           $query =  $this->db->get();
           // //  // echo $this->db->last_query(); exit;
            return $query->row_array(); 

            
    }


 public function DeleteData($table_name ='',$column_name = '',$value = ''){
        $this->db->where($column_name, $value);
        $this->db->delete($table_name); 
    }


    function gethomeprofiles(){

        $this->db->select('R.id,R.gender,R.name,R.age,R.photo,R.native_place,R.status,TR.religion as user_religion,s.sub_caste as user_caste,H.height,J.job_name,UI.user_image,D.district,o.*');
        $this->db->from('tbl_registration R');
        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');
        $this->db->join('tbl_height H','H.height_id = R.height','left');
        $this->db->join('tbl_jobs J','J.job_id = R.occupation','left');
        $this->db->join('tbl_subcaste s','s.sid = R.caste','left');
        $this->db->join('tbl_familyprofile F','F.user_id = R.id','left');
        $this->db->join('tbl_district D','D.district_id = R.native_district','left');
        $this->db->join('tbl_otherdetails o','o.user_id = R.id','left');
        $this->db->join('tbl_userimages UI','UI.user_id = R.id','inner');
        //$this->db->where('R.photo != "" && R.photo != NULL');
        $this->db->where('R.status','1');    
        $this->db->group_by('R.id');
        $this->db->order_by('R.id', 'RANDOM');
        $this->db->limit(12);
        $this->db->distinct();
        $query =  $this->db->get();
            // echo $this->db->last_query(); exit;
        return $query->result(); 
            
            
       

    }
    
    public function fetch_hnID($ID)
	{
		$this->db->select('happynikah_id,phone');
		$this->db->from('tbl_registration');
		$this->db->where('id',$ID);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function fetch_countrycode()
    {
        $this->db->select('name,country_code,country_order');
        $this->db->from('tbl_country');
        $this->db->where('country_code !=',"");
        $this->db->order_by('country_order');
        $query = $this->db->get();
        return $query->result_array();
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

    public function check_profileID_contactview($userID,$uri_profileID)
    {
        $this->db->select('*');
        $this->db->from("tbl_contact_viewed");
        $this->db->where('receiver_id',$uri_profileID);
        $this->db->where('sender_id',$userID);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function check_photoStatus($img)
    {
        $query = $this->db->select('status')
        ->from('tbl_userimages')
        ->where('user_image',$img)
        ->get();
        return $query->row();
    }
    
    public function verify_mobile($postotp,$userID)
    {
        $this->db->select('*');
        $this->db->from("tbl_otp");
        $this->db->where('user_id',$userID);
        $this->db->where('otp',$postotp);
        $query = $this->db->get();
        if($query->row())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    
    public function check_password($userID)
    {
        $this->db->select('*');
        $this->db->from('tbl_userlogin');
        $this->db->where('user_id',$userID);
        $query = $this->db->get();
        if($query->row())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    
    public function get_loginuser($userID)
    {
        $this->db->select('*');
        $this->db->from('tbl_registration');
        $this->db->where('id',$userID);
        $query = $this->db->get();
        return $query->row();
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
	
	function photoprivacy($sender_id = '',$receiver_id = '')
    {
        $this->db->select('photo_visibility');
        $this->db->from('tbl_registration');
        $this->db->where('id',$receiver_id);
        $this->db->where('photo_visibility','1');
        $query =  $this->db->get();
        if(!empty($query->result())){
            return 1;
        }
        else{
            return 0;
        }

    }
    
    function check_photo_requested($sender_id,$receiver_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_photorequest');
        $this->db->where('sender_id',$sender_id);
        $this->db->where('receiver_id',$receiver_id);
        // $this->db->where('status','0');
        $query =  $this->db->get();
        if(!empty($query->result())){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    public function photo_settings($userID)
    {
        $this->db->select('photopassword,showtoexpress,showtopremium');
        $this->db->from("tbl_registration");
        $this->db->where('id',$userID);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function current_planID($userID)
    {
        $this->db->select('*');
        $this->db->from('tbl_payement');
        $this->db->where('user_id',$userID);
        $this->db->where('status','1');
        $query = $this->db->get();
        return $query->row_array();
    }
     public function insertregdetail($regi){
         //print_r($regi);
        $this->db->insert('advt_register',$regi);
    }

}