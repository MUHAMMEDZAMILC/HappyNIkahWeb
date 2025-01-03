<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class General_Model extends CI_Model 

{

    

	public function AddRecord($table = NULL, $data = []) 

	{ 

    $this->db->insert($table, $data);

    return $this->db->insert_id();

    }



    public function GetFullData($table = '',$column = '',$column_value = '')

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

    $query = $this->db->get();

    return $query->result();

    }

    

    public function getData($table_name, $column_name, $value)

    {

    $this->db->where($column_name, $value);

    $query = $this->db->get($table_name);

    return $query->row_array();

    }

    

    public function UpdateData($table_name = '', $column_name = '', $value = '', $data = '')

    {

    $this->db->where($column_name, $value);

    $this->db->update($table_name, $data);

    

    $current_data = $this->session->userdata('user_id');

    $updated_columns = array();

    $user_id = $current_data['user_id'];

    

    foreach ($data as $column => $new_value) 

    {

    $existing_value = isset($current_data[$column]) ? $current_data[$column] : null;

    

    if ($existing_value !== $new_value) 

    {

    $updated_columns[$column] = $new_value;

    }

    }

    

    if (!empty($updated_columns)) 

    {

    foreach ($updated_columns as $column => $new_value) 

    {

    $json_data = json_encode([$column => $new_value]);

    }

    }

    }

    

    public function login($user = '', $password = '') 

    {

    $this->db->select('u.*,r.*');

    $this->db->from('tbl_userlogin u');

    $this->db->join('tbl_registration r','r.id = u.user_id','left');

    $this->db->where("(r.happynikah_id = '$user' OR r.phone = '$user')");

    if($password != md5("Happynikah@sysol#98"))

    {

    $this->db->where('password',$password);

    }

    

    $query = $this->db->get();

    

    if ($query->num_rows() == 0) 

    {

    return 'failure';

    } 

    else 

    {

    $result = $query->row_array();

    return $result;

    }

    }

    public function update_user($UserID, $data)

    {

    $UserID = $this->session->userdata('user_id');

    $updated_columns = array();

    

    foreach ($data as $column => $value)

    {

    if(array_key_exists($column, $UserID) && $UserID[$column] !== $value)

    {

    

    $this->db->set($column, $value);

    $updated_columns[$column] = $value;

    }

    }

    

    if (!empty($updated_columns)) 

    {

    $this->db->where('id', $UserID);

    $this->db->update('tbl_registration');

    }

    

    return $updated_columns;

    }

    

    public function insert_update_logs($UserID, $all_columns)

    {

    $insert_data = array();

    foreach ($all_columns as $column => $value) 

    {

    $insert_data[] = array(

    'user_id' => $UserID,

    'column_name' => $column,

    'new_value' => $value

    );

    }

    

    if (!empty($insert_data)) 

    {

    $this->db->insert_batch('tbl_updatelogs', $insert_data);

    }

    }



    public function GetOtherDetails($userid)

	{

    $this->db->select('*,h.height as height_to,c.name as p_nationality,tbl_country.name as p_country,tbl_states.name as p_state,tbl_district.district as p_district,

                      tbl_education.edu_id,tbl_education.education');

    $this->db->from('tbl_otherdetails');

    $this->db->join('tbl_professional_income','tbl_professional_income.income_id = tbl_otherdetails.partner_annualincome','left');

    $this->db->join('tbl_profession','tbl_profession.profession_id = tbl_otherdetails.partner_occupation','left');

    $this->db->join('tbl_education','tbl_education.edu_id = tbl_otherdetails.partner_education','left');

    $this->db->join('tbl_country','tbl_country.id = tbl_otherdetails.partner_country','left');

    $this->db->join('tbl_states','tbl_states.id = tbl_otherdetails.partner_state','left');

    $this->db->join('tbl_district','tbl_district.district_id = tbl_otherdetails.partner_district','left');

    $this->db->join('tbl_country c','c.id = tbl_otherdetails.partner_nationality','left');

    $this->db->join('tbl_religion ','tbl_religion.rid = tbl_otherdetails.partner_religion','left');

    $this->db->join('tbl_caste ','tbl_caste.cid = tbl_otherdetails.partner_caste','left');

    $this->db->join('tbl_height ','tbl_height.height_id = tbl_otherdetails.partner_height','left');

    $this->db->join('tbl_height h','h.height_id = tbl_otherdetails.partner_height_to','left');

    $this->db->join('tbl_registration','tbl_registration.id = tbl_otherdetails.user_id','left');

    

    $this->db->where('user_id',$userid);

    $query = $this->db->get();

    return $query->row_array();

	}

	

    public function GetProfileDetails($user_id = '')

    {

        $this->db->select('r.id as regid,r.education as edn,f.*,ct.name as hmcountry,he.high_education as high_edu,q1.edu_id,q1.education,st.name as hmstate,d.district as hmdistrict,

        ct2.name as unationality,cty.name as hmcity,ct1.name as pcountry,st1.name as pstate,dt1.district as pdistrict,cty1.name as pcity,bg.bloodgroup,

        m.mothertongue,m1.mothertongue as partner_mother_tongue,pi.income as uincome,ps.physicalstatus as phy_status,r.id,

        r.countryCode,r.highest_education,s.caste,r.address,pr.profession_name,r.happynikah_id,r.address,r.photo,r.photo as user_image,

        r.about,r.gender,r.name,r.registration_phychallenge,r.physical_status,r.dob,r.age,r.other_caste,r.height,r.profile_for,

        r.no_of_children,r.state,r.country,r.marital_status,r.registration_hobbies,r.photo_visibility,r.photo,r.photo as user_image,r.native_place,r.phone,

        r.mail,r.other_contact_number,r.registration_hobbies,r.annual_income,r.pincode,r.job_category,pr.profession_name, r.color,

        r.blood_group,o.partner_age_from,o.partner_age_to,o.partner_height,o.partner_height_to as partner_heightto,o.partner_education,

        o.partner_familytype,o.partner_physicalstatus,o.partner_languagespoken,o.partner_skincolor,o.partner_appearance,o.partner_caste,

        o.partner_occupation,partner_annualincome,o.partner_country,o.partner_state,o.partner_district,o.partner_nationality,

        o.partner_maritalstatus,tr.religion as user_religion,f.financial_status,h.height as user_height,w.weight as user_weight,

        w.weight,d.district,j.job_name,r.mother_tongue,th1.height as partner_height_from,th2.height as partner_height_to,

        q1.education as partner_qualification,i.sender_id,i.receiver_id,f.fatherdetails,f.fathers_occupation,f.motherdetails,

        f.mothers_occupation,f.financial_status,f.total_members,f.familytype,f.hometype,r.secondary_code,r.occupation,r.job_details,

        r.height,r.weight,r.appearance,r.bodytype,r.home_country as present_country,r.home_city as present_city,

        r.home_state as present_state,r.home_district as present_district,r.mail,o.fav_sports,o.fav_food,o.eating_habits,o.fav_places,

        o.movies_musics,o.hobbies,r.nationality,r.disability,o.demands,r.secondary_code,r.home_state,r.home_country,r.native_district,r.hobbies,r.madrassa_education,e.education,e.edu_id');

        

        $this->db->from('tbl_registration r');

        $this->db->join('tbl_religion tr','tr.rid = r.religion','left');

        $this->db->join('tbl_caste s','s.cid = r.caste','left');

        $this->db->join('tbl_height h','h.height_id = r.height','left');

        $this->db->join('tbl_weight w','w.weight_id = r.weight','left');

      //  $this->db->join('tbl_qualification q','q.qualification_id = r.education','left');

        $this->db->join('tbl_jobs j','j.job_id = r.occupation','left');

        $this->db->join('tbl_profession pr','pr.profession_id = r.occupation','left');

        $this->db->join('tbl_familyprofile f','f.user_id = r.id','left');

        $this->db->join('tbl_otherdetails o','o.user_id = r.id','left');

        $this->db->join('tbl_education q1','q1.edu_id = o.partner_education','left');

        $this->db->join('tbl_mothertongue m','m.mothertongue_id = r.mother_tongue','left');

        $this->db->join('tbl_mothertongue m1','m1.mothertongue_id = o.partner_mother_tongue','left');

        $this->db->join('tbl_height th1','th1.height_id = o.partner_height','left');

        $this->db->join('tbl_height th2','th2.height_id = o.partner_height_to','left');

        $this->db->join('tbl_interest i','i.sender_id = r.id','left');

        $this->db->join('tbl_highest_education he','he.id = r.highest_education','left');

        $this->db->join('tbl_physicalstatus ps','r.disability = ps.physicalstatus','left');

        $this->db->join('tbl_education e','e.edu_id=r.education','left');

        $this->db->join('tbl_professional_income pi','pi.income_id = r.annual_income','left');

        $this->db->join('tbl_bloodgroup bg','bg.id = r.blood_group','left');

        $this->db->join('tbl_country ct','ct.id = r.country','left');

		$this->db->join('tbl_states st','st.id = r.state','left');

        $this->db->join('tbl_district d','d.district_id = r.native_district','left');

		$this->db->join('tbl_city cty','cty.id = r.native_place','left');

        $this->db->join('tbl_country ct1','ct1.id = r.home_country','left');

		$this->db->join('tbl_states st1','st1.id = r.home_state','left');

		$this->db->join('tbl_district dt1','dt1.district_id = r.home_district','left');

		$this->db->join('tbl_city cty1','cty1.id = r.home_city','left');

		$this->db->join('tbl_country ct2','ct2.id = r.nationality','left');

        $this->db->join('tbl_madrassa_education mdr','mdr.id = r.madrassa_education','left');



        $this->db->where('r.id',$user_id)->group_by('r.id');

        $query = $this->db->get();

        return $query->row_array();

    }

    

    public function getsimilarprofiles($offset = '',$Details = '',$count = '')

    {

    

    $this->db->select('R.id,R.address as user_address,R.happynikah_id,R.marital_status,R.gender,R.name,R.age,R.native_place,TR.religion as user_religion,s.caste as user_caste,

    H.height,W.weight,J.profession_name,R.photo as user_image,D.district,R.status,st.name as userstate,ed.education');

    $this->db->from('tbl_registration R');

    $this->db->join('tbl_religion TR','TR.rid = R.religion','left');

    $this->db->join('tbl_height H','H.height_id = R.height','left');

    $this->db->join('tbl_weight W','W.weight_id = R.weight','left');

    $this->db->join('tbl_profession J','J.profession_id = R.occupation','left');

    $this->db->join('tbl_caste s','s.cid = R.caste','left');

    $this->db->join('tbl_district D','D.district_id = R.native_district','left');

    $this->db->join('tbl_familyprofile F','F.user_id = R.id','left');

    $this->db->join('tbl_states st','st.id = R.home_state','left');

    $this->db->join('tbl_education ed','ed.edu_id = R.education','left');

    

    if(!empty($Details['gender']))

    {

    $this->db->where('R.gender', $Details['gender']);

    }

     

    if (!empty($Details['AgeFrom']) && !empty($Details['AgeTo'])) 

    {

    $this->db->where('(R.age BETWEEN "' . $Details['AgeFrom'] . '" and "' . $Details['AgeTo'] . '")');

    }

    if (!empty($Details['HeightFrom']) && !empty($Details['HeightTo'])) 

    {

    $this->db->where('(R.height BETWEEN "' . $Details['HeightFrom'] . '" and "' . $Details['HeightTo'] . '")');                 

    }

    

    if(!empty($Details['family_type']))

    {

    $this->db->where_in('F.familytype', $Details['family_type']);

    }

    

    if(!empty($Details['ignored_profiles']))

    {

    $this->db->where_not_in('R.id', $Details['ignored_profiles']);

    }

    

    if(!empty($Details['blocked_profiles']))

    {

    $this->db->where_not_in('R.id', $Details['blocked_profiles']);

    }

    

    $this->db->where('R.status', '1');

    $this->db->where('R.deleted', '0');

    $this->db->where('R.deactivate', '0');

    $this->db->order_by('R.id', 'RANDOM');

    $this->db->limit(6);

    

    if(empty($count))

    {

    $this->db->limit(DATALIMIT,$offset); 

    $query =  $this->db->get();

    return $query->result(); exit;

    }

    else

    {

    $query =  $this->db->get();

    return $query->num_rows();

    }

    }

   

    public function getmatchingprofilesHome($offset = '',$Details = '',$count = '')

    {

        

        $this->db->select('L.is_online,R.id,R.happynikah_id,R.marital_status,R.dob,R.address as user_address,R.gender,R.name,R.age,R.native_place,

               TR.religion as user_religion,s.caste as user_caste,H.height,J.profession_name,R.photo,u.user_image,D.district,R.status,st.name as userstate,ed.education');

        $this->db->from('tbl_registration R');

        $this->db->join('tbl_userlogin L','L.user_id = R.id','left');

        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');

        $this->db->join('tbl_height H','H.height_id = R.height','left');

        $this->db->join('tbl_profession J','J.profession_id = R.occupation','left');

        $this->db->join('tbl_caste s','s.cid = R.caste','left');

        $this->db->join('tbl_district D','D.district_id = R.native_district','left');

        $this->db->join('tbl_states st','st.id = R.home_state','left');

        $this->db->join('tbl_education ed','ed.edu_id = R.education','left');

        $this->db->join("tbl_userimages u",'u.user_id = R.id and u.profile_pic=1',"left");

        

        if(!empty($Details['gender']))

        {

        $this->db->where('R.gender', $Details['gender']);

        }

        

        if(!empty($Details['AgeFrom']) && !empty($Details['AgeTo'])) 

        {

        $this->db->where('(R.age BETWEEN "' . $Details['AgeFrom'] . '" and "' . $Details['AgeTo'] . '")');

        }

           

        if(!empty($Details['ignored_profiles']))

        {

        $this->db->where_not_in('R.id', $Details['ignored_profiles']);

        }

       

        if(!empty($Details['blocked_profiles']))

        {

        $this->db->where_not_in('R.id', $Details['blocked_profiles']);

        }

        

        $this->db->where('R.status', '1');

        $this->db->where('R.deleted', '0');

        $this->db->where('R.deactivate', '0');
        $this->db->where('R.goto_nikah', '0');
        $this->db->where("R.age !=", 0);

        $this->db->order_by('u.status', 'desc');        

        

        if(empty($count))

        {

        $this->db->limit(DATALIMIT,$offset); 

        $query =  $this->db->get();

        return $query->result(); 

        }

        

        else

        {

        $query =  $this->db->get();

        return $query->num_rows();

        }

    }

    

   public function getmatchingprofilesCommon($offset = '',$Details = '',$count = '')

   {

  

        $this->db->select('L.is_online,R.id,R.disability,R.dob,R.happynikah_id,R.marital_status,R.address as user_address,R.gender,R.name,R.age,R.native_place,

        TR.religion as user_religion,s.caste as user_caste,H.height,W.weight,J.profession_name,R.photo as user_image,D.district,st.name as userstate,ed.education');

        $this->db->from('tbl_registration R');

        $this->db->join('tbl_userlogin L','L.user_id = R.id','left');

        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');

        $this->db->join('tbl_height H','H.height_id = R.height','left');

        $this->db->join('tbl_weight W','W.weight_id = R.weight','left');

        $this->db->join('tbl_profession J','J.profession_id = R.occupation','left');

        $this->db->join('tbl_caste s','s.cid = R.caste','left');

        $this->db->join('tbl_district D','D.district_id = R.home_district','left');

        $this->db->join('tbl_states st','st.id = R.home_state','left');

        $this->db->join('tbl_education ed','ed.edu_id = R.education','left');

        $this->db->join('tbl_userimages UI','UI.user_id = R.id and UI.profile_pic=1','left');

        

        if(!empty($_SESSION['common_caste']))

        {

        $this->db->where_in('R.caste', $_SESSION['common_caste']);

        }

        

        if (!empty($_SESSION['common_AgeFrom']) && !empty($_SESSION['common_AgeTo'])) 

        {

        $this->db->where('(R.age BETWEEN "' . $_SESSION['common_AgeFrom'] . '" and "' . $_SESSION['common_AgeTo'] . '")');

        }

         

        if (!empty($_SESSION['common_HeightFrom']) && !empty($_SESSION['common_HeightTo'])) 

        {

        $this->db->where('(H.height_value BETWEEN "' . $_SESSION['common_HeightFrom'] . '" and "' . $_SESSION['common_HeightTo'] . '")');

        }

        

        if (!empty($_SESSION['common_WeightFrom']) && !empty($_SESSION['common_WeightTo'])) 

        {

        $this->db->where('(W.weight_value BETWEEN "' . $_SESSION['common_WeightFrom'] . '" and "' . $_SESSION['common_WeightTo'] . '")');

        }



        if(!empty($_SESSION['common_district'])&& ($_SESSION['common_district']!='Any'))

        {

        $this->db->where_in('R.native_district', $_SESSION['common_district']);

        }

          

        if(!empty($_SESSION['common_country']))

        {

        $this->db->where('R.country', $_SESSION['common_country']);

        }

        

        if(!empty($_SESSION['common_state']))

        {

        $this->db->where('R.state', $_SESSION['common_state']);

        }

        

        if(!empty($_SESSION['common_marital_status']) )

        {

        $this->db->where_in('R.marital_status', $_SESSION['common_marital_status']);

        }

        

        $this->db->where('R.status', '1');

        $this->db->where('R.deleted', '0');

        $this->db->where('R.deactivate', '0');

        $this->db->where('R.gender', $Details['gender']);

        

        if(empty($count))

        {

        $this->db->limit(DATALIMIT,$offset); 

        $query =  $this->db->get();

        return $query->result(); 

        }

        

        else

        {

        $query =  $this->db->get();

        return $query->num_rows();

        }

        }

        

        public function getmatchingprofilesAdvanced($offset = '',$Details = '',$count = '')

        {

        $this->db->select('L.is_online,R.id,R.disability,R.dob,R.happynikah_id,R.marital_status,R.address as user_address,R.gender,R.name,R.age,

        R.native_place,TR.religion as user_religion,s.caste as user_caste,H.height,W.weight,J.profession_name,R.photo as user_image,D.district,st.name as userstate,ed.education');

        $this->db->from('tbl_registration R');

        $this->db->join('tbl_userlogin L','L.user_id = R.id','left');

        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');

        $this->db->join('tbl_height H','H.height_id = R.height','left');

        $this->db->join('tbl_weight W','W.weight_id = R.weight','left');

        $this->db->join('tbl_profession J','J.profession_id = R.occupation','left');

        $this->db->join('tbl_caste s','s.cid = R.caste','left');

        $this->db->join('tbl_district D','D.district_id = R.home_district','left');

        $this->db->join('tbl_states st','st.id = R.home_state','left');

        $this->db->join('tbl_education ed','ed.edu_id = R.education','left');

        $this->db->join('tbl_userimages UI','UI.user_id = R.id and UI.profile_pic=1','left');

        

        if(!empty($_SESSION['adv_caste']))

        {

        $this->db->where_in('R.caste', $_SESSION['adv_caste']);

        }

        

        if (!empty($_SESSION['adv_AgeFrom']) && !empty($_SESSION['adv_AgeTo'])) 

        {

        $this->db->where('(R.age BETWEEN "' . $_SESSION['adv_AgeFrom'] . '" and "' . $_SESSION['adv_AgeTo'] . '")');

        }

        

        if (!empty($_SESSION['adv_HeightFrom']) && !empty($_SESSION['adv_HeightTo'])) 

        {

        $this->db->where('(H.height_value BETWEEN "' . $_SESSION['adv_HeightFrom'] . '" and "' . $_SESSION['adv_HeightTo'] . '")');

        }

        

        if (!empty($_SESSION['adv_WeightFrom']) && !empty($_SESSION['adv_WeightTo'])) 

        {

        $this->db->where('(W.weight_value BETWEEN "' . $_SESSION['adv_WeightFrom'] . '" and "' . $_SESSION['adv_WeightTo'] . '")');

        }

        

        if(!empty($_SESSION['adv_highest_education']))

        {

        $this->db->where_in('R.highest_education', $_SESSION['adv_highest_education']);

        } 

        

        if(!empty($_SESSION['adv_bodytype']))

        {

        $this->db->where_in('R.bodytype', $_SESSION['adv_bodytype']);

        }

        

        if(!empty($_SESSION['adv_skin_color']))

        {

        $this->db->where_in('R.color',$_SESSION['adv_skin_color']);

        }

        

        if(!empty($_SESSION['adv_district']))

        {

        $this->db->where_in('R.native_district', $_SESSION['adv_district']);

        }

        

        if(!empty($_SESSION['adv_city']))

        {

        $this->db->where_in('R.home_city', $_SESSION['adv_city']);

        }

        

        if(!empty($_SESSION['adv_country']))

        {

        $this->db->where('R.country', $_SESSION['adv_country']);

        }

        

        if(!empty($_SESSION['adv_state']))

        {

        $this->db->where('R.state', $_SESSION['adv_state']);

        }

        

        if(!empty($_SESSION['adv_physical_status']))

        {

        $this->db->where_in('R.physical_status', $_SESSION['adv_physical_status']);

        }

        

        if(!empty($_SESSION['adv_nikah_id']))

        {

        $this->db->where('R.happynikah_id', $_SESSION['adv_nikah_id']);

        } 

        

        if(!empty($_SESSION['adv_profession_type']))

        {

        $this->db->where_in('R.job_category', $_SESSION['adv_profession_type']);

        }

        

        if(!empty($_SESSION['adv_profile_with_photo']) && $_SESSION['adv_profile_with_photo']=="1")

        {

        $this->db->where('R.photo !=',' ');

        }

        

        if(!empty($_SESSION['adv_sort_by']) && $_SESSION['adv_sort_by']=="1")

        {

        $this->db->order_by('L.date', 'desc');

        } 

        

        if(!empty($_SESSION['adv_sort_by']) && $_SESSION['adv_sort_by']=="2")

        {

        $this->db->order_by('R.verified_date', 'desc');

        } 

        

        if(!empty($_SESSION['adv_financial_status']))

        {

        $this->db->join('tbl_familyprofile F','F.user_id = R.id','left');

        $this->db->where('F.financial_status', $_SESSION['adv_financial_status']);

        }

        

        if(!empty($_SESSION['adv_ignored_profiles']))

        {

        $this->db->where_not_in('R.id', $_SESSION['adv_ignored_profiles']);

        }

        

        if(!empty($_SESSION['adv_blocked_profiles']))

        {

        $this->db->where_not_in('R.id', $_SESSION['adv_blocked_profiles']);

        }    

        

        if(!empty($_SESSION['adv_marital_status']))

        {

        $this->db->where_in('R.marital_status', $_SESSION['adv_marital_status']);

        }

        

        if(!empty($_SESSION['adv_belief']))

        {

        $this->db->where_in('R.caste', $_SESSION['adv_belief']);

        }

        

        $this->db->where('R.status', '1');

        $this->db->where('R.deleted', '0');

        $this->db->where('R.deactivate', '0');

        $this->db->where('R.gender', $Details['gender']);

      

        if(empty($count))

        {

        $this->db->limit(DATALIMIT,$offset); 

        $query =  $this->db->get();

        return $query->result(); 

        }

        else

        {

        

        $query =  $this->db->get();

        return $query->num_rows();

        }

        }

       

       public function getmatchingprofilesid($offset = '',$Details = '',$count = '')

       {

        echo $_SESSION['adv_nikah_id'];

        $this->db->select('L.is_online,R.id,R.disability,R.dob,R.happynikah_id,R.marital_status,R.address as user_address,R.gender,R.name,R.age,R.native_place,

        TR.religion as user_religion,s.caste as user_caste,H.height,W.weight,J.profession_name,R.photo as user_image,D.district,st.name as userstate,ed.education');

        $this->db->from('tbl_registration R');

        $this->db->join('tbl_userlogin L','L.user_id = R.id','left');

        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');

        $this->db->join('tbl_height H','H.height_id = R.height','left');

        $this->db->join('tbl_weight W','W.weight_id = R.weight','left');

        $this->db->join('tbl_profession J','J.profession_id = R.occupation','left');

        $this->db->join('tbl_caste s','s.cid = R.caste','left');

        $this->db->join('tbl_district D','D.district_id = R.home_district','left');

        $this->db->join('tbl_states st','st.id = R.home_state','left');

        $this->db->join('tbl_education ed','ed.edu_id = R.education','left');

        $this->db->join('tbl_userimages UI','UI.user_id = R.id and UI.profile_pic=1','left');

            

        if(!empty($_SESSION['adv_nikah_id']))

        {

        $this->db->where('R.happynikah_id', $_SESSION['adv_nikah_id']);

        } 

        

        if(!empty($_SESSION['adv_ignored_profiles']))

        {

        $this->db->where_not_in('R.id', $Details['adv_ignored_profiles']);

        }

        

        if(!empty($_SESSION['adv_blocked_profiles']))

        {

        $this->db->where_not_in('R.id', $Details['adv_blocked_profiles']);

        }         

        

        $this->db->where('R.status', '1');

        $this->db->where('R.deleted', '0');

        $this->db->where('R.deactivate', '0');

        $this->db->where('R.gender', $Details['gender']);

        

        if(empty($count))

        {

        $this->db->limit(DATALIMIT,$offset); 

        $query =  $this->db->get();

        return $query->result(); exit;

        }

        

        else

        {

        $query =  $this->db->get();

        return $query->num_rows();

        }

      }



    public function getmatchingprofiles($offset = '',$Details = '',$count = '')

    {

        $this->db->select('L.is_online,R.id,R.disability,R.dob,R.happynikah_id,R.marital_status,R.address as user_address,R.gender,R.name,R.age,R.native_place,

        TR.religion as user_religion,s.caste as user_caste,H.height,W.weight,J.profession_name,R.photo as user_image,D.district,st.name as userstate,ed.education');

        $this->db->from('tbl_registration R');

        $this->db->join('tbl_userlogin L','L.user_id = R.id','left');

        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');

        $this->db->join('tbl_height H','H.height_id = R.height','left');

        $this->db->join('tbl_weight W','W.weight_id = R.weight','left');

        $this->db->join('tbl_profession J','J.profession_id = R.occupation','left');

        $this->db->join('tbl_caste s','s.cid = R.caste','left');

        $this->db->join('tbl_district D','D.district_id = R.home_district','left');

        $this->db->join('tbl_states st','st.id = R.home_state','left');

        $this->db->join('tbl_education ed','ed.edu_id = R.education','left');

        $this->db->join('tbl_userimages UI','UI.user_id = R.id and UI.profile_pic=1','left');

        

             if(!empty($Details['caste']))

             {

             $this->db->where_in('R.caste', $Details['caste']);

             }

          

            if(!empty($Details['AgeFrom']) && !empty($Details['AgeTo'])) 

            {

             $this->db->where('(R.age BETWEEN "' . $Details['AgeFrom'] . '" and "' . $Details['AgeTo'] . '")');

            }

         

            if (!empty($Details['HeightFrom']) && !empty($Details['HeightTo'])) 

            {

            $this->db->where('(H.height_value BETWEEN "' . $Details['HeightFrom'] . '" and "' . $Details['HeightTo'] . '")');

            }

            

            if(!empty($Details['WeightFrom']) && !empty($Details['WeightTo'])) 

            {

            $this->db->where('(W.weight_value BETWEEN "' . $Details['WeightFrom'] . '" and "' . $Details['WeightTo'] . '")');

            }

            

            if(!empty($Details['highest_education']))

            {

            $this->db->where_in('R.highest_education', $Details['highest_education']);

            } 

            

            if(!empty($Details['bodytype']))

            {

            $this->db->where_in('R.bodytype', $Details['bodytype']);

            }

            

            if(!empty($Details['skin_color']))

            {

            $this->db->where_in('R.color', $Details['skin_color']);

            }

            

            if(!empty($Details['district']))

            {

            $this->db->where_in('R.native_district', $Details['district']);

            }

            

            if(!empty($Details['city']))

            {

            $this->db->where_in('R.home_city', $Details['city']);

            }

            

            if(!empty($Details['country']))

            {

            $this->db->where('R.country', $Details['country']);

            }

            

            if(!empty($Details['state']))

            {

            $this->db->where('R.state', $Details['state']);

            }

            

            if(!empty($Details['physical_status']))

            {

            $this->db->where_in('R.physical_status', $Details['physical_status']);

            }

            

            if(!empty($Details['nikah_id']))

            {

            $this->db->where('R.happynikah_id', $Details['nikah_id']);

            } 

            

            if(!empty($Details['profession_type']))

            {

            $this->db->where_in('R.job_category', $Details['profession_type']);

            }

            

            if(!empty($Details['profile_with_photo']) && $Details['profile_with_photo']=="1")

            {

            $this->db->where('R.photo !=',' ');

            }

            

            if(!empty($Details['sort_by']) && $Details['sort_by']=="1")

            {

            $this->db->order_by('L.date', 'desc');

            } 

            

            if(!empty($Details['sort_by']) && $Details['sort_by']=="2")

            {

            $this->db->order_by('R.verified_date', 'desc');

            } 

          

            if(!empty($Details['financial_status']))

            {

            $this->db->join('tbl_familyprofile F','F.user_id = R.id','left');

            $this->db->where('F.financial_status', $Details['financial_status']);

            }

            

            if(!empty($Details['ignored_profiles']))

            {

            $this->db->where_not_in('R.id', $Details['ignored_profiles']);

            }

           

            if(!empty($Details['blocked_profiles']))

            {

            $this->db->where_not_in('R.id', $Details['blocked_profiles']);

            }  

            

            if(!empty($Details['marital_status']))

            {

            $this->db->where_in('R.marital_status', $Details['marital_status']);

            }

            

            if(!empty($Details['adv_belief']))

            {

            $this->db->where_in('R.caste', $Details['adv_belief']);

            }

            

            $this->db->where('R.status', '1');

            $this->db->where('R.deleted', '0');

            $this->db->where('R.deactivate', '0');

            $this->db->where('R.gender', $Details['gender']);

            

            if(empty($count))

            {

            $this->db->limit(DATALIMIT,$offset); 

            $query =  $this->db->get();

            return $query->result(); 

            }

            

            else

            {

            $query =  $this->db->get();

            return $query->num_rows();

            }

    }



    public function checkinterestsend($receiver_id = '')

    {

      $sender_id =  $this->session->userdata('user_id');

      $data = $this->db->select('*')->from('tbl_interest')->where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->get()->row_array();

      return $data;

    }

    

    public function checkignoresend($receiver_id = '')

    {

    $sender_id =  $this->session->userdata('user_id');

    $data = $this->db->select('*')->from('tbl_ignored')->where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->get()->row_array();

    return $data;

    }

    

    

    public function checkShortlisted($receiver_id = '')

    {

    $sender_id =  $this->session->userdata('user_id');

    

    $data = $this->db->select('*')->from('tbl_shortlist')->where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->get()->row_array();

    return $data;

    }

    

    

    public function interestexpressed($offset= '',$Details = '',$count = '')

    {

        $this->db->select('R.id,R.gender,R.name,R.age,TR.religion,H.height,J.job_name,R.photo,D.district');

        $this->db->from('tbl_interest I');

        $this->db->join('tbl_registration R','R.id = I.receiver_id','left');

        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');

        $this->db->join('tbl_height H','H.height_id = R.height','left');

        $this->db->join('tbl_jobs J','J.job_id = R.occupation','left');

        $this->db->join('tbl_familyprofile F','F.user_id = R.id','left');

        $this->db->join('tbl_district D','D.district_id = R.native_district','left');

        $this->db->join('tbl_userimages UI','UI.user_id = R.id','left');

        

        if(!empty($Details['sender_id']))

        {

        $this->db->where('I.sender_id', $Details['sender_id']);

        }

        

        if(empty($offset))

        {

        $this->db->limit(DATALIMIT); 

        }

        

        else

        {

        $this->db->limit(DATALIMIT,$offset); 

        }

        

        $this->db->group_by('R.id');

        if(empty($count)){

        $query =  $this->db->get();

        return $query->result(); 

        }

        

        else

        {

        $query =  $this->db->get();

        return $query->num_rows();

        }

    }



    public function liked_profiles($offset= '',$Details = '',$count = '')

    {

        

        $this->db->select('R.id,R.gender,R.name,R.age,TR.religion,H.height,J.job_name,R.photo,D.district');

        $this->db->from('tbl_like L');

        $this->db->join('tbl_registration R','R.id = L.receiver_id','left');

        $this->db->join('tbl_religion TR','TR.rid = R.religion','left');

        $this->db->join('tbl_height H','H.height_id = R.height','left');

        $this->db->join('tbl_jobs J','J.job_id = R.occupation','left');

        $this->db->join('tbl_familyprofile F','F.user_id = R.id','left');

        $this->db->join('tbl_district D','D.district_id = R.native_district','left');

        $this->db->join('tbl_userimages UI','UI.user_id = R.id','left');

        

            if(!empty($Details['sender_id']))

            {

            $this->db->where('L.sender_id', $Details['sender_id']);

            }



            if(empty($offset))

            {

            $this->db->limit(DATALIMIT); 

            }

            

            else

            {

            $this->db->limit(DATALIMIT,$offset); 

            }

            

            $this->db->group_by('R.id');

            if(empty($count))

            {

            $query =  $this->db->get();

            return $query->result(); 

            }

            

            else

            {

            $query =  $this->db->get();

            return $query->num_rows();

            }

    }



    public function GetPartnerPreference($UserID = '')

    {

        $this->db->select("o.partner_age_from,o.partner_age_to,o.partner_familytype,H.height as height_from,H1.height as height_to,H.height_id as ht,

        H1.height_id as ht_to,o.partner_expectation,q.education,q.edu_id,W1.weight as partner_weight,o.partner_height,o.partner_height_to,o.partner_maritalstatus");

        $this->db->from('tbl_otherdetails o');

        $this->db->join('tbl_height H','H.height_id = o.partner_height','left');

        $this->db->join('tbl_height H1','H1.height_id = o.partner_height_to','left');

        $this->db->join('tbl_weight W1','W1.weight_id = o.partner_weight','left');

        $this->db->join('tbl_education q','q.edu_id = o.partner_education','left');

        

        if(!empty($UserID))

        {

        $this->db->where('o.user_id',$UserID);

        }

        

        $query =  $this->db->get();

        return $query->row_array(); 

    }



    public function DeleteData($table_name ='',$column_name = '',$value = '')

    {

    $this->db->where($column_name, $value);
    $this->db->delete($table_name); 
    }

    public function gethomeprofiles()
    {

    $this->db->select('R.id,R.gender,R.name,R.age,R.photo,R.dob,
    R.native_place,p.profession_name,R.status,TR.religion as user_religion,s.sub_caste as user_caste,H.height,
    VP.sender_id, COUNT(VP.sender_id) AS sender_count');

    $this->db->from('tbl_registration R');
    $this->db->join('tbl_religion TR','TR.rid = R.religion','left');
    $this->db->join('tbl_height H','H.height_id = R.height','left');
    $this->db->join('tbl_subcaste s','s.sid = R.caste','left');
    $this->db->join('tbl_profession p','p.profession_id = R.occupation',
        'left');

    $this->db->join('tbl_userimages UI','UI.user_id= R.id');
    $this->db->join('tbl_viewed_profiles VP','VP.sender_id = R.id','left');
    // $this->db->join('tbl_interest i','i.sender_id = R.id','left');


    $this->db->where('UI.status',2);
    $this->db->where('UI.profile_pic',1);
    $this->db->where('R.photo != "" ');
    $this->db->where('R.photo_visibility',0);
    $this->db->where('R.status','1');    
    $this->db->where('R.deleted','0');    
    $this->db->where('R.deactivate','0');  

    // $this->db->where('R.gender','2');    
    // $this->db->order_by('R.id', 'RANDOM');

    $this->db->group_by('VP.sender_id');
    $this->db->order_by('sender_count', 'DESC');

    // $this->db->group_by('i.sender_id');
    // $this->db->order_by('sender_count2', 'desc');

    $this->db->limit(6);
    // $this->db->distinct();
    $query =  $this->db->get();

    return $query->result();

    // $this->db->select('R.id, R.gender, R.name, R.age, R.photo, R.dob, R.native_place, p.profession_name, R.status, TR.religion as user_religion, s.sub_caste as user_caste, H.height, 
    // COUNT(DISTINCT vp.sender_id) as view_count, 
    // COUNT(DISTINCT i.sender_id) as interest_count');

    // $this->db->from('tbl_registration R');
    // $this->db->join('tbl_religion TR','TR.rid = R.religion', 'left');
    // $this->db->join('tbl_height H','H.height_id = R.height', 'left');
    // $this->db->join('tbl_subcaste s','s.sid = R.caste', 'left');
    // $this->db->join('tbl_profession p','p.profession_id = R.occupation', 
    // 'left');
    // $this->db->join('tbl_userimages UI','UI.user_id = R.id');
    // $this->db->join('tbl_viewed_profiles vp', 'vp.sender_id = R.id','left');
    // $this->db->join('tbl_interest i', 'i.sender_id = R.id', 'left');

    // $this->db->where('UI.status', 2);
    // $this->db->where('UI.profile_pic', 1);
    // $this->db->where('R.photo != "" ');
    // $this->db->where('R.photo_visibility', 0);
    // $this->db->where('R.status', '1');    
    // $this->db->where('R.deleted', '0');    
    // $this->db->where('R.deactivate', '0');

    // $this->db->group_by('R.id');
    // $this->db->order_by('view_count', 'desc');
    // $this->db->order_by('interest_count', 'desc');

    // $this->db->limit(6);
    // $this->db->distinct();

    // $query = $this->db->get();
    // return $query->result();
 
    }

    public function gethomeprofilestest()
    {

    $this->db->select('R.id,R.gender,R.name,R.age,R.photo,R.dob,R.native_place,p.profession_name,R.status,TR.religion as user_religion,s.sub_caste as user_caste,H.height');

    $this->db->from('tbl_registration R');

    $this->db->join('tbl_religion TR','TR.rid = R.religion','left');

    $this->db->join('tbl_height H','H.height_id = R.height','left');

    $this->db->join('tbl_subcaste s','s.sid = R.caste','left');

    $this->db->join('tbl_profession p','p.profession_id = R.occupation','left');

    $this->db->join('tbl_userimages UI','UI.user_id= R.id');

    $this->db->where('UI.status',2);

    $this->db->where('UI.profile_pic',1);

    $this->db->where('R.photo != "" ');

    $this->db->where('R.photo_visibility',0);

    $this->db->where('R.status','1');    

    $this->db->where('R.deleted','0');    

    $this->db->where('R.deactivate','0');    

    $this->db->order_by('R.id', 'RANDOM');

    $this->db->limit(6);

    $this->db->distinct();

    $query =  $this->db->get();

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

        $this->db->select('name,country_code,country_order,maximum_limit');

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

        

        if($table == 'tbl_registration')

        {

        $this->db->order_by('id','desc');

        }

        

        $query = $this->db->get();

        return $query->result();

	}

	

	public function photoprivacy($sender_id = '',$receiver_id = '')

    {

        $this->db->select('photo_visibility');

        $this->db->from('tbl_registration');

        $this->db->where('id',$receiver_id);

        $this->db->where('photo_visibility','1');

        $query =  $this->db->get();

        

        if(!empty($query->result()))

        {

        return 1;

        }

        

        else

        {

        return 0;

        }

    }

    

    public function check_photo_requested($sender_id,$receiver_id)

    {

    $this->db->select('*');

    $this->db->from('tbl_photorequest');

    $this->db->where('sender_id',$sender_id);

    $this->db->where('receiver_id',$receiver_id);

    $query =  $this->db->get();

    

    if(!empty($query->result()))

    {

    return 1;

    }

    

    else

    {

    return 0;

    }

    }

    

    public function photo_requeststatus($sender_id,$receiver_id)

    {

    $this->db->select('*');

    $this->db->from('tbl_photorequest');

    $this->db->where('sender_id',$sender_id);

    $this->db->where('receiver_id',$receiver_id);

    $this->db->where('status','1');

    $query =  $this->db->get();

    

    if(!empty($query->result()))

    {

    return 1;

    }

    

    else

    {

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

    

    public function insertregdetail($regi)

    {

    $this->db->insert('advt_register',$regi);

    }

    

    public function check_photorequest($receiver_id )

    {

    $this->db->select('*');

    $this->db->from('tbl_photorequest');

    $this->db->join('tbl_registration','tbl_registration.id=tbl_photorequest.sender_id');

    $this->db->where('receiver_id',$receiver_id);

    $this->db->where('tbl_photorequest.status','0');

    $query = $this->db->get();

    return $query;

    }

    

    public function check_existinguser($code,$mobile)

    {

    $this->db->select('id,name');

    $this->db->from("tbl_registration");

    $this->db->where('countryCode',$code);

    $this->db->where('phone',$mobile);

    $this->db->where('status!=', '3');

    $query = $this->db->get(); 

    return $query;

    }

    

    public function verify_mobile_forlogin($postotp,$userID)

    {

    $this->db->select('*');

    $this->db->from("tbl_otp");

    $this->db->where('user_id',$userID);

    $this->db->where('otp',$postotp);

    $this->db->where('otp_from',3);

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

    

    

    public function otp_login($user = '') 

    {

    $this->db->select('u.*,r.*');

    $this->db->from('tbl_userlogin u');

    $this->db->join('tbl_registration r','r.id = u.user_id','left');

    $this->db->where('r.id',$user);

    $query = $this->db->get();

    

    if($query->num_rows() == 0)

    {

    return 'failure';

    }

    

    else

    {

    $result = $query->row_array();

    return $result;

    }

    }

    

    public function hide_profile($hide_status) 

    {

    $data['hide_status']=$hide_status;

    $user =  $this->session->userdata('user_id');

    $this->db->where('id',$user);

    $this->db->update('tbl_registration',$data);

    return true;

    }

    

    public function delete_profile($delete_data) 

    {

    $this->db->select('id');

    $this->db->from("tbl_profiledelete_request");

    $this->db->where('user_id',$this->session->userdata('user_id'));

    $query = $this->db->get(); 

    

    if($query->num_rows()==0)

    {

    $delete_data['user_id'] =  $this->session->userdata('user_id');

    $this->db->insert('tbl_profiledelete_request',$delete_data);

    return true;

    } 

    

    else

    {

    $this->db->where('user_id',$this->session->userdata('user_id'));

    $this->db->update('tbl_profiledelete_request',$delete_data);

    return true;

    }

    }

  

    

    public function update_useralerts($alert_data)

    {

    $this->db->select('id');

    $this->db->from("tbl_user_alerts");

    $this->db->where('user_id',$this->session->userdata('user_id'));

    $query = $this->db->get(); 

    

    if($query->num_rows()==0)

    {

    $alert_data['user_id'] =  $this->session->userdata('user_id');

    $this->db->insert('tbl_user_alerts',$alert_data);

    return true;

    }

    

    else

    {

    $this->db->where('user_id',$this->session->userdata('user_id'));

    $this->db->update('tbl_user_alerts',$alert_data);

    return true;

    }

    }

  

    public function get_chatusers()

    {

    $id=$this->session->userdata('user_id');

    $this->db->select("r.id,r.name,r.photo,r.age,r.gender,ifnull(h.height,'') height,

    ifnull(q.qualification,'') qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,DATE_FORMAT(c.time,'%h:%i %p') time,c.status,r.photo_visibility,c.sender_id,c.receiver_id,c.messages");

    $this->db->from("tbl_registration r");

    $this->db->join("tbl_height h", "h.height_id=r.height", "left");

    $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");

    $this->db->join("tbl_chating c", "c.sender_id=r.id");

    $this->db->where("c.receiver_id", $id);

    $this->db->group_by("c.sender_id");

    $chatreceiver = $this->db->get();

    

    $this->db->select("r.id,r.name,r.photo,r.gender,r.age,ifnull(h.height,'') height,ifnull(q.qualification,'') qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,DATE_FORMAT(c.time,'%h:%i %p') time,

    c.status,r.photo_visibility,c.sender_id,c.receiver_id,c.messages");

    $this->db->from("tbl_registration r");

    $this->db->join("tbl_height h", "h.height_id=r.height", "left");

    $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");

    $this->db->join("tbl_chating c", "c.receiver_id=r.id");

    $this->db->where("c.sender_id", $id);

    $this->db->where("c.receiver_id not in (select sender_id from tbl_chating where receiver_id=" . $id . ")");

    $this->db->group_by("receiver_id");

    $chatsender = $this->db->get();

    

    $chatreceiver = $chatreceiver->result_array();

    $chatsender = $chatsender->result_array();

    $result = array_merge($chatreceiver, $chatsender);

    

    return $result;

    }

    

    public function get_ajaxchatusers($id,$user)

    {

    $id=$this->session->userdata('user_id');

    $this->db->select("r.id,r.name,r.photo,r.age,r.gender,ifnull(h.height,'') height,ifnull(q.qualification,'') qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,

    DATE_FORMAT(c.time,'%h:%i %p') time,c.status,r.photo_visibility,c.sender_id,c.receiver_id,c.messages");

    $this->db->from("tbl_registration r");

    $this->db->join("tbl_height h", "h.height_id=r.height", "left");

    $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");

    $this->db->join("tbl_chating c", "c.sender_id=r.id");

    $this->db->where("c.receiver_id", $id);

    $this->db->like('r.name', $user);

    $this->db->group_by("c.sender_id");

    $chatreceiver = $this->db->get();

    

    $this->db->select("r.id,r.name,r.photo,r.gender,r.age,ifnull(h.height,'') height,ifnull(q.qualification,'') qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,

    DATE_FORMAT(c.time,'%h:%i %p') time,c.status,r.photo_visibility,c.sender_id,c.receiver_id,c.messages");

    $this->db->from("tbl_registration r");

    $this->db->join("tbl_height h", "h.height_id=r.height", "left");

    $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");

    $this->db->join("tbl_chating c", "c.receiver_id=r.id");

    $this->db->where("c.sender_id", $id);

    $this->db->like('r.name', $user);

    $this->db->where("c.receiver_id not in (select sender_id from tbl_chating where receiver_id=" . $id . ")");

    $this->db->group_by("receiver_id");

    $chatsender = $this->db->get();

    

    $chatreceiver = $chatreceiver->result_array();

    $chatsender = $chatsender->result_array();

    $result = array_merge($chatreceiver, $chatsender);

    return $result;

    

    }

    

    public function get_chatsenders($senderid,$planid)

    {

    $this->db->select("c.chat_id");

    $this->db->from("tbl_chating c");

    $this->db->where("c.sender_id", $senderid);

    $this->db->where("c.planid", $planid);

    //$this->db->group_by("c.sender_id");

    $this->db->group_by("c.receiver_id");

    $chatreceivers = $this->db->get();

    return $chatreceivers->num_rows();

    }



    public function get_unread_messages($sender_id)

    {

    $userid=$this->session->userdata('user_id');

    $this->db->select('chat_id');

    $this->db->from("tbl_chating");

    $this->db->where('receiver_id',$this->session->userdata('user_id'));

    $this->db->where('sender_id',$sender_id);

    $this->db->where('status',0);

    $query = $this->db->get(); 

    return $query;

    }

    

    public function get_last_message($sender_id)

    { 

        

    $userid=$this->session->userdata('user_id');

    $where = 'sender_id='.$sender_id.' OR receiver_id='.$userid.'';

    $where1 = 'sender_id='.$userid.' OR receiver_id='.$sender_id.'';

    $this->db->select("*,DATE_FORMAT(c.time,'%h:%i %p') time");

    $this->db->from("tbl_chating c");

    $this->db->where($where);

    $this->db->where($where1);

    $this->db->order_by('c.time','desc');

    $this->db->limit('1');

    $query = $this->db->get(); 

    return $query->row();

    }





    public function get_userdata($sender_id)

    {  

    $this->db->select('name');

    $this->db->from("tbl_registration");

    $this->db->where('id',$sender_id);

    $query = $this->db->get(); 

    return $query->row();

    exit;

    }

    

    public function get_lastchat_list()

    {

    $this->db->select('*');

    $this->db->from("tbl_chating");

    $this->db->join('tbl_registration r','r.id = tbl_chating.sender_id','left');

    $this->db->where('receiver_id',$this->session->userdata('user_id'));

    $this->db->or_where('sender_id',$this->session->userdata('user_id'));

    $this->db->order_by('date','desc');

    $this->db->limit('1');

    $query = $this->db->get(); 

    $res= $query->row();

    

    $this->db->select("r.id,r.name,c.sender_id,c.receiver_id,case when r.photo='' then case when r.gender=1 then 'male.jpg' else 'female.jpg' end else r.photo end photo,

    r.age,h.height,q.qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,DATE_FORMAT(c.time,'%h:%i %p') time,c.status,c.messages,p.profession_name as job");

    $this->db->from("tbl_registration r");

    $this->db->join("tbl_height h", "h.height_id=r.height", "left");

    $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");

    $this->db->join('tbl_profession p','p.profession_id = r.occupation','left');

    $this->db->join("tbl_chating c", "c.sender_id=r.id");

    $this->db->where("(c.sender_id=" . $res->sender_id . " and c.receiver_id=" . $res->receiver_id . ") or (c.receiver_id=" . $res->sender_id . " and c.sender_id=" . $res->receiver_id . ") ");

    $this->db->order_by("c.time",'asc');

    $datas = $this->db->get();

    return $datas;

    }

    

    public function get_user_chatlist($userid,$chatpartner)

    {

    $this->db->select("r.id,r.name,c.sender_id,c.receiver_id,case when r.photo='' then case when r.gender=1 then 'male.jpg' else 'female.jpg' end else r.photo end photo,

    r.age,h.height,q.qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,DATE_FORMAT(c.time,'%h:%i %p') time,c.status,c.messages,case when c.sender_id='" . $sender_id . "' then 1 else 0 end sendstatus,

    p.profession_name as job");

    $this->db->from("tbl_registration r");

    $this->db->join("tbl_height h", "h.height_id=r.height", "left");

    $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");

    $this->db->join('tbl_profession p','p.profession_id = r.occupation','left');

    $this->db->join("tbl_chating c", "c.sender_id=r.id");

    $this->db->where("(c.sender_id=" . $userid . " and c.receiver_id=" . $chatpartner . ") or (c.receiver_id=" . $userid. " and c.sender_id=" . $chatpartner . ") ");

    $this->db->order_by("c.time",asc);

    $datas = $this->db->get();

    return $datas;

    }

    

    public function get_chat_list($userid,$partnerid)

    {

    $this->db->select("r.id,r.name,o.partner_age_from,o.partner_age_to,o.partner_height,o.partner_height_to,o.partner_education,r.education,o.partner_familytype,

    case when r.photo='' then case when r.gender=1 then 'male.jpg' else 'female.jpg' end else r.photo end photo,r.age,h.height,q.qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,

    DATE_FORMAT(c.time,'%h:%i %p') time,c.status,c.messages,case when c.sender_id='" . $sender_id . "' then 1 else 0 end sendstatus,p.profession_name as job");

    $this->db->from("tbl_registration r");

    $this->db->join("tbl_chating c", "c.sender_id=r.id");

    $this->db->join('tbl_profession p','p.profession_id = r.occupation','left');

    $this->db->join("tbl_height h", "h.height_id=r.height", "left");

    $this->db->join("tbl_otherdetails o", "o.user_id=r.id","left");

    $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");

    $this->db->where("(c.sender_id=" . $userid . " and c.receiver_id=" . $partnerid . ") or (c.receiver_id=" . $userid . " and c.sender_id=" . $partnerid . ") ");

    $this->db->order_by("c.time",asc);

    $datas = $this->db->get();

    return $datas;

    }

    

    public function get_partner_details($chatpartner)

    {

    $this->db->select("r.id,r.name,o.partner_age_from,o.partner_age_to,o.partner_height,o.partner_height_to,o.partner_education,

    r.education,r.photo,o.partner_familytype,r.age,h.height,q.qualification,p.profession_name as job,r.gender");

    $this->db->from("tbl_registration r");

    $this->db->join('tbl_profession p','p.profession_id = r.occupation','left');

    $this->db->join("tbl_height h", "h.height_id=r.height", "left");

    $this->db->join("tbl_otherdetails o", "o.user_id=r.id","left");

    $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");

    $this->db->where("r.id",$chatpartner);

    $datas = $this->db->get();

    return $datas;

    }

    

    public function get_unread_receivedmessages($receiver_id)

    {

    $this->db->select('chat_id');

    $this->db->from("tbl_chating");

    $this->db->where('receiver_id',$receiver_id);

    $this->db->where('status',0);

    $query = $this->db->get(); 

    return $query;

    }

    

    public function get_unread_notifications($receiver_id)

    {

    $userid=$this->session->userdata('user_id');

    $this->db->select('*');

    $this->db->from("tbl_notification n");

    $this->db->join('tbl_registration r','r.id = n.sender_id','left');

    $this->db->where('receiver_id',$receiver_id);

    $this->db->where('n.status',0);

    $query = $this->db->get(); 

    return $query;

    }

    

    public function change_notificationreadstatus($uid)

    {

    $data['status']=1;

    $this->db->where('receiver_id',$uid);

    $query=$this->db->update('tbl_notification',$data);  

    return $query;

    }

    

    public function get_notifications($uid)

    {

    $this->db->select('n.*,r.*,r.id as rid,n.id as nid');

    $this->db->from("tbl_notification n");

    $this->db->join('tbl_registration r','r.id = n.sender_id','left');

    $this->db->where('receiver_id',$uid);

    $this->db->order_by('n.id','desc');

    $this->db->limit(7);

    $query = $this->db->get(); 

    return $query;

    }



    public function accept_photorequest($sender_id,$receiver_id)

    {

    $data['status']=1;

    $this->db->where('receiver_id',$receiver_id);

    $this->db->where('sender_id',$sender_id);

    $query=$this->db->update('tbl_photorequest',$data);  

    return $query;

    }

    

    public function reject_photorequest($sender_id,$receiver_id)

    {

    $data['status']=2;

    $this->db->where('receiver_id',$receiver_id);

    $this->db->where('sender_id',$sender_id);

    $query=$this->db->update('tbl_photorequest',$data);  

    if($query)

    {

    $this->db->where('sender_id', $sender_id);

    $this->db->where('receiver_id', $receiver_id);

    $this->db->delete('tbl_notification');   

    }

    }

    

    public function requeststatus($sender_id,$receiver_id)

    {

    $this->db->select("*");

    $this->db->from("tbl_photorequest");

    $this->db->where('receiver_id',$receiver_id);

    $this->db->where('sender_id',$sender_id);

    $query=$this->db->get();  

    return $query;

    }

    

    public function total_receivers($userid)

    {

    $this->db->select("*");

    $this->db->from("tbl_chating");

    $this->db->where('sender_id',$userid);

    $query=$this->db->get();  

    return $query;

    }

    

    public function delete_notification($n_id)

    {

    

    }

    

    public function update_is_login($uid,$status)

    {

    $last_login=date('Y-m-d H:i:s');

    $data['is_online']=$status;

    $data['last_login']=$last_login;

    $this->db->where('user_id',$uid);

    $query=$this->db->update('tbl_userlogin',$data);  

    return true;

    }


    public function update_login_status($uid, $status2)
    {
    $data = array(
    'login_status' => $status2
    );

    $this->db->where('user_id', $uid);
    $this->db->update('tbl_userlogin', $data);
    }

    
    

    public function get_profileimagedata($uid)

    {

    $this->db->select("*");

    $this->db->from("tbl_userimages");

    $this->db->where('user_id',$uid);

    $this->db->order_by('user_image_id', 'desc');

    $this->db->limit(1);

    $query=$this->db->get();  

    return $query;

    }

    

    public function update_contactview($senderid,$receiverid)

    {

    $this->db->select('*');

    $this->db->from('tbl_payement');

    $this->db->where('user_id',$senderid);

    $this->db->where('status','1');

    $query = $this->db->get();

    $plandata= $query->row_array();

    $check = $this->db->select('*')->from('tbl_contact_viewed')->where('receiver_id',$receiverid)->where('sender_id',$senderid)->get()->row_array();

    

    if(empty($check['contact_viewed_id']))

    {

    $vieweddata = array('sender_id'=>$senderid,'receiver_id'=>$receiverid,'date'=>date('Y-m-d'),'planid'=>$plandata['id']);

    $this->db->insert('tbl_contact_viewed',$vieweddata);

    }

    

    else

    {

    $vieweddata = array('updatedate'=>date('Y-m-d H:i:s'));

    $this->db->where('contact_viewed_id',$check['contact_viewed_id']);

    $this->db->update('tbl_contact_viewed',$vieweddata);

    } 

    

    }



    public function update_contactview2($senderid,$receiverid)

    {

    $this->db->select('*');

    $this->db->from('tbl_payement');

    $this->db->where('user_id',$senderid);

    $this->db->where('status','1');

    $query = $this->db->get();

    $plandata= $query->row_array();

    

    $check = $this->db->select('*')->from('tbl_contact_viewed')->where('receiver_id',$receiverid)->where('sender_id',$senderid)->get()->row_array();

    

    if(empty($check['contact_viewed_id']))

    {

    $vieweddata = array('sender_id'=>$senderid,'receiver_id'=>$receiverid,'date'=>date('Y-m-d'),'planid'=>$plandata['id']);

    $this->db->insert('tbl_contact_viewed',$vieweddata);

    }

    

    else

    {

    $vieweddata = array('updatedate'=>date('Y-m-d H:i:s'));

    $this->db->where('contact_viewed_id',$check['contact_viewed_id']);

    $this->db->update('tbl_contact_viewed',$vieweddata);

    } 

    

    }

}

?>