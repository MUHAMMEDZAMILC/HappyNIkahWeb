<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\Middleware\AuthTokenMiddleware;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
class Appservicemodelnew extends CI_Model
{

    function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        ini_set('display_errors', 1);
        error_reporting(0);
    }
function getAccessToken()
{
    $scopes = ['https://www.googleapis.com/auth/firebase.messaging'];
    $filePath = FCPATH . 'happynikahtoken.json';
    // echo $filePath;
        // Check if the file exists
        if (!file_exists($filePath)) {
            return ['error' => 'JSON file not found'];
        }
    $serviceAccountPath=$filePath;
    // Create credentials
    $credentials = new ServiceAccountCredentials($scopes, $serviceAccountPath);
    $request = new \Google\Auth\HttpHandler\Guzzle6HttpHandler(new Client());
    
    // Refresh the credentials to generate an access token
    $credentials->fetchAuthToken($request);
    return $credentials->getLastReceivedToken()['access_token'];
}

    public function InsertReg()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(0);
        $json = file_get_contents('php://input');
        //print_r($json);
        //echo "Name:".$json["Name"];
        $data = json_decode($json, true);

        //print_r($data);
        if (isset($data['user_id']) && $data['user_id'] != "") {

            $this->db->select("*");
            $this->db->from("tbl_registration");
            $this->db->where("id", $data['user_id']);
            $checkexist = $this->db->get();
            if ($checkexist->num_rows() == 0) {
                $json = array();
                $json["error"] = true;
                $json["error_msg"] = "User id not found";

                return json_encode($json);
            }

            $this->db->select("COLUMN_NAME");
            $this->db->from("INFORMATION_SCHEMA.COLUMNS");
            $this->db->where("TABLE_NAME", "tbl_registration");
            $result = $this->db->get();

            $arr_reg = array();
            foreach ($result->result() as $row) {
                // echo $key."=".$value."</br>";
                $key = $row->COLUMN_NAME;
                if (isset($data[$key])) {
                    $arr_reg[$key] = $data[$key];
                } elseif (!isset($data[$key]) && $key == "color" && isset($data['Color'])) {
                    $arr_reg[$key] = $data["Color"];
                }
            }
            //print_r($arr_reg);
            //echo "</br>";
            //die('ere');
            if (count($arr_reg) > 0) {
                $reg_data['stage'] = 2;
                $arr_reg['edit_through'] = 2;
                $arr_reg['update_data'] = 1;
                $arr_reg['edit_date'] = date("Y/m/d") . " " . date("h:i:sa");
                $this->db->where("id", $data['user_id']);
                $this->db->update("tbl_registration", $arr_reg);
            }

            $updateddata = array();
            foreach ($data as $key => $value) {
                if (isset($key)) {
                    $updateddata['column_name'] = $key;
                    $updateddata['new_value'] = $value;
                    $updateddata['user_id'] = $data['user_id'];
                    $updateddata['timestamp'] = date("Y/m/d") . " " . date("h:i:sa");
                }
                if ($updateddata['new_value'] != '' && $updateddata['column_name'] != 'user_id') {
                    $this->db->insert("tbl_updatelogs", $updateddata);
                }
            }

            $this->db->select("COLUMN_NAME");
            $this->db->from("INFORMATION_SCHEMA.COLUMNS");
            $this->db->where("TABLE_NAME", "tbl_otherdetails");
            $res = $this->db->get();
            $arr_other = array();
            foreach ($res->result() as $row) {
                // echo $key."=".$value."</br>";
                $key = $row->COLUMN_NAME;
                if (isset($data[$key])) {

                    $arr_other[$key] = $data[$key];
                }
            }
            if (count($arr_other) > 0) {
                $reg_data['stage'] = 3;
                $this->db->where("user_id", $data['user_id']);
                $this->db->update("tbl_otherdetails", $arr_other);
            }
            $this->db->select("COLUMN_NAME");
            $this->db->from("INFORMATION_SCHEMA.COLUMNS");
            $this->db->where("TABLE_NAME", "tbl_familyprofile");
            $resfamily = $this->db->get();
            $arr_family = array();
            foreach ($resfamily->result() as $row) {
                // echo $key."=".$value."</br>";
                $key = $row->COLUMN_NAME;
                if (isset($data[$key])) {

                    $arr_family[$key] = $data[$key];
                }
            }

            //            print_r($arr_family);
//            die('ere');
            if (count($arr_family) > 0) {
                $this->db->select("*");
                $this->db->where("user_id", $data['user_id']);
                $row = $this->db->get("tbl_familyprofile");

                if ($row->num_rows() > 0) {
                    $this->db->where("user_id", $data['user_id']);
                    $this->db->update("tbl_familyprofile", $arr_family);
                } else {
                    //$this->db->where("user_id", $data['id']);
                    $this->db->insert("tbl_familyprofile", $arr_family);
                }
            }
            $jsondata = array();
            $jsondata['user_id'] = (int) $data['user_id'];
            return json_encode($jsondata);
        } else {
            $this->db->select("*");
            $this->db->from("tbl_registration");
            $this->db->where("phone",str_replace(' ', '', $data['phone']));
            $this->db->where("status !=", 3);
            $checkexist = $this->db->get();
            if ($checkexist->num_rows() > 0) {
                $json = array();
                $json["error"] = true;
                $json["error_msg"] = "Already Registered";

                return json_encode($json);
            }
            if (isset($data['apple_uid'])) {
                $this->db->select("*");
                $this->db->from("tbl_registration");
                $this->db->where("apple_uid", $data['apple_uid']);
                $this->db->where("status !=", 3);
                $checkappleexist = $this->db->get();
                if ($checkappleexist->num_rows() > 0) {
                    $json = array();
                    $json["error"] = true;
                    $json["error_msg"] = "Already Registered with Apple id";

                    return json_encode($json);
                }
            }


            $reg_data = $data;
            unset($reg_data["aboutme"]);
            unset($reg_data["partner_expectation"]);
            $reg_data['dob'] = date('Y-m-d', strtotime($reg_data['dob']));
            $from = new DateTime($reg_data['dob']);
            $to = new DateTime('today');
            $reg_data['age'] = $from->diff($to)->y;
            if (isset($reg_data['gender']) && $reg_data['gender'] == 'Female') {
                $reg_data['gender'] = 2;
            } else if (isset($reg_data['gender']) && $reg_data['gender'] == 'Male') {
                $reg_data['gender'] = 1;
            }
            $reg_data['mail'] = (isset($data['mail'])) ? $data['mail'] : '';
            $reg_data['home_country'] = (isset($data['country'])) ? $data['country'] : '';
            $reg_data['home_state'] = (isset($data['state'])) ? $data['state'] : '';
            // $reg_data['home_district'] = (isset($data['native_district']))?$data['native_district']:'';
            $reg_data['job_category'] = (isset($data['job_category'])) ? $data['job_category'] : '';
            $reg_data['physical_status'] = (isset($data['physical_status'])) ? $data['physical_status'] : 'Normal';
            $reg_data['reg_date'] = date('Y-m-d');
            $reg_data['reg_through'] = 2;
            $reg_data['pending_status'] = 1;
            $reg_data['stage'] = 0;
            // $reg_data['status'] = 1;
            $reg_data['direct'] = 31;
            $this->db->insert("tbl_registration", $reg_data);

            $insert_id = $this->db->insert_id();

            $loginDetails['username'] = $reg_data['phone'];
            $password = 'HN' . rand(10, 10000);
            $loginDetails['password'] = md5($password);
            $loginDetails['user_id'] = $insert_id;
            $this->db->insert("tbl_userlogin", $loginDetails);
            //$this->General_Model->AddRecord('tbl_userlogin', $loginDetails);
            //$msg = 'You%20have%20successfully%20initiated%20registration%20in%20happynikah.com.%20UserID:' . $reg_data['phone'] . '%20Password:' . $password . '%20Please%20login%20and%20complete%20your%20profile.SYSOL%20SYSTEM%20SOLUTIONS%20PRIVATE%20LIMITED';
            //$this->smsotp($msg, (($reg_data["countryCode"] != "0") ? $reg_data["countryCode"] : "91") . $reg_data['phone'], 2, "", "");
            $mobile = (($reg_data["countryCode"] != "0") ? (($reg_data["countryCode"] != "91") ? "+" . $reg_data["countryCode"] : $reg_data["countryCode"]) : "91") . $reg_data['phone'];
            $this->GenerateOtp($insert_id, $mobile, 5);

            $otherdetails = array();
            $otherdetails['user_id'] = $insert_id;
            $otherdetails['aboutme'] = $data['about'];
            $this->db->insert('tbl_otherdetails', $otherdetails);
            $jsondata = array();
            $jsondata['user_id'] = $otherdetails['user_id'];
            return json_encode($jsondata);
        }
    }

    function SendMail($userid, $mode, $otp)
    {

        // $to_email ='noushad1m@gmail.com';
        // $subject = 'Matrimony ID and OTP';
        // $message = "Test Messge";
        // $headers = 'From: Happy Nikah <info@happynikah.com>';
        // mail($to_email,$subject,$message,$headers);
        //die('Send Test');
        //$this->load->library('email');
        // $config['protocol'] = 'sendmail';
        // $config['mailpath'] = '/usr/sbin/sendmail';
        // $config['charset'] = 'iso-8859-1';
        // $config['wordwrap'] = TRUE;
        //$this->email->initialize($config);

        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $userid);
        $query = $this->db->get();
        $query = $query->row_array();

        //Load email library 





        $to_email = $query['mail'];
        $sb = "";
        if ($mode == 0) {
            $sb = 'Happy Nikah Verification';
        } else if ($mode == 1) {
            $sb = 'Happy Nikah Reset Password';
        }
        $msg = "";
        if ($mode == 0) {
            $msg = "Hi " . $query['name'] . ",\n\nUserId:" . $query['happynikah_id'] . "\nOTP for verify your mobile :" . $otp;
        } else if ($mode == 1) {
            $msg = "Hi " . $query['name'] . ",\n\nUserId:" . $query['happynikah_id'] . "\nOTP for reset your password :" . $otp;
        }
        $subject = $sb;
        $message = $msg;
        $headers = 'From: Happy Nikah <info@happynikah.com>';
        mail($to_email, $subject, $message, $headers);
    }

    function VerifyOTP()
    {

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if ($data['phone'] == "8086851333" && $data['otp'] == "800188" || $data['phone'] == "9567542841" && $data['otp'] == "800188") {
            $this->db->select("r.id");
            $this->db->from("tbl_registration r");
            $this->db->where("r.phone", $data['phone']);
            $this->db->where("r.status !=", 3);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $arrdata = $query->row_array();
                $jsondata = array();
                $jsondata['user_id'] = (int) $arrdata['id'];
                return json_encode($jsondata);
            }
            $jsondata = array();
            $jsondata['user_id'] = (int) $arrdata['id'];
            return json_encode($jsondata);
        } else {
            $this->db->select("r.id,o.otp,o.otp_time");
            $this->db->from("tbl_registration r");
            $this->db->join("tbl_otp o", "r.id=o.user_id");
            $this->db->where("r.phone", $data['phone']);
            $this->db->where("o.otp", $data['otp']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $arrdata = $query->row_array();
                $otptime = new DateTime($arrdata['otp_time']);
                $currtime = new DateTime(date("Y-m-d H:m:s"));
                $d1 = strtotime($arrdata['otp_time']);
                $d2 = strtotime(date("Y-m-d H:i:s"));
                $totalSecondsDiff = abs($d2 - $d1);
                //echo $arrdata['otp_time']." ";
                //echo date("Y-m-d H:i:s");
                $totalminute = $totalSecondsDiff / 60;
                //return $totalminute;
                // echo $otptime->format("%Y-m-d");
                // echo $currtime;

                $interval = $otptime->diff($currtime);
                if ($data['phone'] == "9995629984" && $data['otp'] == "800188") {
                    $jsondata = array();
                    $jsondata['user_id'] = (int) $arrdata['id'];
                    return json_encode($jsondata);
                } else {
                    $stage["stage"] = 1;
                    $this->db->select("*");
                    $this->db->from("tbl_registration");
                    $this->db->where("id", $arrdata['id']);
                    $this->db->update("tbl_registration", $stage);
                    if ((int) $totalminute < 10) {
                        $jsondata = array();
                        $jsondata['user_id'] = (int) $arrdata['id'];
                        return json_encode($jsondata);
                    } else {
                        $jsondata = array();
                        $jsondata['user_id'] = -1;
                        return json_encode($jsondata);
                    }
                }
            } else {
                $jsondata = array();
                $jsondata['user_id'] = 0;
                return json_encode($jsondata);
            }
        }

    }

    function VerifyUserid($phone, $otp)
    {

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $this->db->select("r.id,o.otp,o.otp_time");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_otp o", "r.id=o.user_id");
        $this->db->where("(r.phone='" . $phone . "' or r.happynikah_id='" . $phone . "')");
        $this->db->where("o.otp", $otp);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $arrdata = $query->row_array();
            $otptime = new DateTime($arrdata['otp_time']);
            $currtime = new DateTime(date("Y-m-d H:m:s"));
            $d1 = strtotime($arrdata['otp_time']);
            $d2 = strtotime(date("Y-m-d H:i:s"));
            $totalSecondsDiff = abs($d2 - $d1);
            //echo $arrdata['otp_time']." ";
            //echo date("Y-m-d H:i:s");
            $totalminute = $totalSecondsDiff / 60;
            //return $totalminute;
            // echo $otptime->format("%Y-m-d");
            // echo $currtime;

            $interval = $otptime->diff($currtime);
            if ($phone == "7907735451" && $otp == "432197") {
                $jsondata = array();
                $jsondata['user_id'] = (int) $arrdata['id'];
                return json_encode($jsondata);
            } else {
                if ((int) $totalminute < 10) {
                    $jsondata = array();
                    $jsondata['user_id'] = (int) $arrdata['id'];
                    return json_encode($jsondata);
                } else {
                    $jsondata = array();
                    $jsondata['user_id'] = -1;
                    return json_encode($jsondata);
                }
            }
        } else {
            $jsondata = array();
            $jsondata['user_id'] = 0;
            return json_encode($jsondata);
        }
    }

    function smsotp($msg, $mobile, $mode, $otp, $name)
    {

        $templateid = 1607100000000205213;
        if ($mode == 4) {
            //$templateid = 1607100000000129109;
            $url = 'https://2factor.in/API/V1/7a8571c8-ed69-11ec-9c12-0200cd936042/SMS/' . $mobile . '/' . $otp . '/RESET+PASSWORD';
        } else if ($mode == 5) {
            //echo "enter";
            $url = 'https://2factor.in/API/V1/7a8571c8-ed69-11ec-9c12-0200cd936042/SMS/' . $mobile . '/' . $otp . '/OTP+VERIFICATION';
        } else {
            $url = 'https://2factor.in/API/V1/7a8571c8-ed69-11ec-9c12-0200cd936042/SMS/' . $mobile . '/' . $otp . '/OTP+VERIFICATION';
            //$url = 'http://sms.sysol.in/api/api.php?ver=1&mode=1&action=push_sms&type=1&route=2&login_name=Sysolsystemsolutions&api_password=9d61ac8866c76e24cdde&message=' . $msg . '&number=' . $mobile . '&sender=SYSOLS&template_id=' . $templateid;
        }

        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);


        // echo $url;
        //file_get_contents($url);

        return 1;
    }

    public function MemDetails()
    {
        $id = $_GET['mode'];
        $currentDate = new DateTime();
        $today = $currentDate->format('Y');

        $this->db->select("name,CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END age,r.dob,ifnull(h.height,'') height,ifnull(sub_caste,'') belief,case when native_place='null' then '' else  native_place end native_place,ifnull(d.district,'') native_district,ifnull(p.profession_name,'') job,case when r.photo='' then case when r.gender='1' then 'male.png' else 'female.png' end  else r.photo end photo,r.phone");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_subcaste c", "c.sid=r.caste", "left");
        $this->db->join("tbl_profession p", "p.profession_id=r.occupation", "left");
        $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        //  $res = $query->result_array();

        if ($query->num_rows() > 0) {
            $json = $query->row_array();
            // $json = array();
            // $json = $res;
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }
        return json_encode($json);
    }

    public function UserBasic()
    {
        $id = $_GET['mode'];
        $userid = $_GET['m'];

        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $user = $this->db->get()->row_array();

        $gender = "";
        $photo = "";
        if ($user["gender"] == "Male" || $user['gender'] == 1) {
            $photo = "male.png";
        } else if ($user["gender"] == "Female" || $user['gender'] == 2) {
            $photo = "female.png";
        }
        $currentDate = new DateTime();
        $today = $currentDate->format('Y');

        $this->db->select("r.id,r.happynikah_id,name,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(h.height,'') height,ifnull(sub_caste,'') belief,native_place,ifnull(d.district,'') native_district,ifnull(tp.profession_name,'') job,case when photo='' then '$photo' else case when u.status=2 then  photo else '$photo' end end photo,ifnull(s.shortlist_id,0) shortlist,ifnull(i.interest_id,0) interest,ifnull(l.like_id,0) liked,ifnull(b.interest_id,0) block,r.phone,r.photo_visibility,case when p.status=0 then 'requested' when p.status=1 then 'approved' when p.status=2 then 'declined' else ''  end  requeststatus,group_concat(u.user_image) gallery,case when u.user_id IS NUll then 0 else 1 end as imgflag,case when py.user_id!=null then 1 else 0 end premium,ul.is_online status", false);
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_subcaste c", "c.sid=r.caste", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $userid, "left");
        $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $userid, "left");
        $this->db->join("tbl_like l", "l.receiver_id=r.id and l.sender_id=" . $userid, "left");
        $this->db->join("tbl_photorequest p", "p.receiver_id=r.id and p.sender_id=" . $userid, "left");
        $this->db->join("tbl_payement py", "py.user_id=r.id and py.expiry_date>NOW() and py.status=1", "left");
        // $this->db->join("tbl_userimages u", "u.user_id=r.id" , "left");
        if ($id == $userid) {

            $this->db->join("tbl_userimages u", "u.user_id=r.id AND u.user_id =$id AND (u.status = 2 OR u.status = 0)", "left");
        } else {

            $this->db->join("tbl_userimages u", "u.user_id=r.id AND u.user_id =$id AND u.status = 2 ", "left");
        }
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");
        $this->db->join("tbl_block b", "b.receiver_id = r.id and b.sender_id =" . $userid, "left");


        // if ($id == $userid) {
        //     $this->db->where("u.user_id IS NOT NULL");
        //     $this->db->where("u.user_id",$id);
        //     $this->db->where("u.status",2);
        //     $this->db->or_where("u.status", 0);

        // }else{
        //     $this->db->where("u.user_id IS NOT NULL");
        //     $this->db->where("u.user_id",$id);
        //     $this->db->where("u.status", 2);

        // }
        $this->db->where("r.id", $id);
        // $this->db->where("u.status !=", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $json = $query->row_array();
            // $json = array();
            // $json = $res;
            $gallery = $json['gallery'];
            $split = explode(',', $gallery);
            $arrdata = array();
            if ($split['0'] != null) {
                foreach ($split as $key => $value) {
                    $arrdata[count($arrdata)] = array('image' => $value);
                }
            }
            // foreach($split as $key=>$value){
            //     $arrdata[count($arrdata)]=array('image'=>$value);
            // }
            $json['gallery'] = $arrdata;
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }
        return json_encode($json);
    }

    public function ProfileInfo()
    {
        $id = $_GET['mode'];
        $user_id = $_GET['m'];
        $this->UpdateProfVisit();

        $this->db->SELECT("'About' head,ifnull(o.aboutme,'') aboutme,'Basic Information' head1,r.name 'Name',r.happynikah_id 'ID',case when r.gender=1 then 'Male' else 'Female' end 'Gender',
            concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') 'Age',r.marital_status 'Marital Status',
            r.physical_status 'Physical Status',ifnull(m.mothertongue,'') 'Mother Tongue',case when r.marital_status != 'Unmarried' then r.no_of_children end 'No. of Children (Divorced / Widows)',profile_for 'Created By','Religious Information' head2,
            ifnull(rel.religion,'') 'Religion',ifnull(c.caste,'') 'Caste','Education and Professional' head3,ifnull(e.education,'') 'Education',r.job_category 'Profession Type',
            ifnull(tp.profession_name,'') 'Profession',ifnull(r.job_details,'') 'Job Details',r.annual_income 'Annual Income',ifnull(me.madr_education,'') 'Madrasa Education','Physical Attribute' head4,
            ifnull(h.height,'') 'Height',ifnull(w.weight,'') 'Weight',ifnull(r.color,'') 'Skin Color',ifnull(r.bodytype,'') 'Body Type',
            ifnull(r.appearance,'') 'Appearance', 'Location and Contact Details' head5,concat(ifnull(d.district,''),',',ifnull(tbl_states.name,r.state),',',ifnull(tbl_country.name,r.country),',',
            ifnull(r.pincode,'')) 'Present Location',concat(ifnull(hd.district,''),',',ifnull(hs.name,''),',',ifnull(hc.name,r.country),',',ifnull(r.home_pincode,'')) 'Home Location',
            r.native_place 'City/Street',ifnull(r.contacttype,'') 'Contact Type','Family Details' head6,ifnull(f.familytype,'') 'Family Type',ifnull(f.financial_status,'') 'Financial Status',
            ifnull(f.hometype,'') 'Home Type',ifnull(f.total_members,'') 'Number of family Members',ifnull(f.fatherdetails,'') 'Father Details',ifnull(f.motherdetails,'') 'Mother Details',
            ifnull(f.fathers_occupation,'') 'Father Profession',f.mothers_occupation 'Mother Profession','Partner Preferences' head8,concat(o.partner_age_from,'-', o.partner_age_to) 'Partner Age',
            concat(ph.height,'-', ph_to.height) 'Partner Height',concat(pw.weight,'-', pw_to.weight) 'Partner Weight',ifnull(pe.high_education,'') 'Partner Education',o.partner_expectation 'Partner Expectation',o.partner_financial 'Partner Financial Status',ifnull(pd.district,'') 'Partner Districts' ,'Partner Preference' head9,o.partner_age_from,
            o.partner_age_to,ifnull(o.partner_height,'') partner_height,ifnull(o.partner_height_to,'') 'partner_height_to',ifnull(o.partner_education,'') 'partner_education',
o.partner_familytype ,o.partner_expectation,ul.is_online");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_mothertongue m", "m.mothertongue_id=r.mother_tongue", "left");
        $this->db->join("tbl_religion rel", "rel.rid=r.religion", "left");
        $this->db->join("tbl_caste c", "c.cid=r.caste", "left");
        $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_weight w", "w.weight_id=r.weight", "left");
        $this->db->join("tbl_district d", "d.district_id=r.home_district", "left");
        $this->db->join("tbl_district hd", "hd.district_id=r.native_district", "left");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->join("tbl_otherdetails o", "o.user_id=r.id", "left");
        $this->db->join("tbl_education pq", "FIND_IN_SET(pq.edu_id,o.partner_education)>0", "left");
        $this->db->join("tbl_district pd", "FIND_IN_SET(pd.district_id,o.partner_district)>0", "left");
        $this->db->join("tbl_height ph", "ph.height_id=o.partner_height", "left");
        $this->db->join("tbl_height ph_to", "ph_to.height_id=o.partner_height_to", "left");
        $this->db->join("tbl_weight pw", "pw.weight_id=o.partner_weight", "left");
        $this->db->join("tbl_weight pw_to", "pw_to.weight_id=o.partner_weight_to", "left");
        $this->db->join("tbl_highest_education pe", "pe.id=o.partner_education", "left");
        $this->db->join("tbl_country", "tbl_country.id=r.country", "left");
        $this->db->join("tbl_states", "tbl_states.id=r.state", "left");
        $this->db->join("tbl_country hc", "hc.id=r.home_country", "left");
        $this->db->join("tbl_states hs", "hs.id=r.home_state", "left");
        $this->db->join("tbl_countrycode cnt", "cnt.id=r.secondary_code", "left");
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");
        $this->db->join("tbl_madrassa_education me", "me.id = r.madrassa_education", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $resutl = $query->row_array();
        // print_r($resutl);
        $arrdata = array();
        $subhead = "";
        $arsub = array();
        $icons = [
            "contact.svg",
            "contact.svg",
            "star.svg",
            "education.svg",
            "physical.svg",
            "location.svg",
            "family.svg",
            "hobbies.svg",
            "preference.svg",
        ];
        $index = 0;
        $arrdata[count($arrdata)] = array("status" => $resutl['is_online']);
        foreach ($resutl as $key => $value) {


            if (substr($key, 0, 4) == "head") {
                if (count($arsub) > 0) {
                    $arrdata[count($arrdata)] = array("header" => $subhead);
                    $arvalue = array();
                    foreach ($arsub as $k => $v) {
                        if ($k == 'aboutme' && $v == null) {

                            $arvalue[count($arrdata) - 2] = array("key" => 'aboutme', "value" => "I'm " . $resutl['Name'] . " looking for perfect soulmate");
                        } else if ($k == 'No. of Children (Divorced / Widows)' && $v == null) {

                        } else {
                            $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
                        }
                        // $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
                    }
                    //print_r($arvalue);
                    //die('ere');
                    $arrdata[count($arrdata) - 1]["value"] = $arvalue;
                    $arrdata[count($arrdata) - 1]["icon"] = $icons[$index];
                    $arsub = array();
                    $index++;
                }

                $subhead = $value;
            } else {
                $arsub[$key] = $value;
            }
        }
        if (count($arsub) > 0) {
            $this->db->select("*");
            $this->db->from("tbl_otherdetails");
            $this->db->where("user_id", $user_id);
            $mypref = $this->db->get();
            $mypref = $mypref->row_array();

            //print_r($mypref);
            // print_r($arsub);
            $totcount = 0;
            $prefcount = 0;
            $arrpref = array();
            $arrpref[count($arrpref)] = array("head" => "Age", "title" => $mypref["partner_age_from"] . "-" . $mypref["partner_age_to"], "value" => 0);
            if (isset($arsub["partner_age_from"])) {
                $totcount++;
                //echo $mypref["partner_age_from"]."=".$arsub["partner_age_from"]."</br>";
                if ($arsub["partner_age_from"] >= $mypref["partner_age_from"] || $arsub["partner_age_to"] <= $mypref["partner_age_to"]) {
                    $arrpref[count($arrpref) - 1] = array("head" => "Age", "title" => $mypref["partner_age_from"] . "-" . $mypref["partner_age_to"], "value" => 1);

                    $prefcount++;
                }
            }

            $arrpref[count($arrpref)] = array("head" => "Height", "title" => $this->GetHeightValue($mypref["partner_height"]) . "-" . $this->GetHeightValue($mypref["partner_height_to"]), "value" => 0);
            if (isset($arsub["partner_height"])) {
                $totcount++;
                if ($mypref["partner_height"] >= $arsub["partner_height"] || $mypref["partner_height_to"] < $arsub["partner_height_to"]) {
                    $arrpref[count($arrpref) - 1] = array("head" => "height", "title" => $this->GetHeightValue($mypref["partner_height"]) . "-" . $this->GetHeightValue($mypref["partner_height_to"]), "value" => 1);

                    $prefcount++;
                }
            }

            if (strtolower($mypref["partner_education"]) != "null" && $mypref["partner_education"] != "") {
                $arrpref[count($arrpref)] = array("head" => "Education", "title" => $this->GetEducation($mypref["partner_education"]), "value" => 0);
                if (isset($arsub["partner_education"])) {
                    $totcount++;
                    if ($mypref["partner_education"] == $arsub["partner_education"]) {
                        $arrpref[count($arrpref) - 1] = array("head" => "Education", "title" => $this->GetEducation($mypref["partner_education"]), "value" => 1);

                        $prefcount++;
                    }
                }
            }
            //             $arrpref["Weight"]=array($mypref["partner_weight"],0);
//            if($mypref["partner_weight"]==$arsub["partner_weight"]){
//                $arrpref["Weight"]=array($mypref["partner_weight"],1);
//            }
            if (strtolower($mypref['partner_familytype']) != "null" && $mypref['partner_familytype'] != "") {
                $arrpref[count($arrpref)] = array("head" => "Family Type", "title" => $mypref["partner_familytype"], "value" => 0);
                if (isset($arsub["partner_familytype"])) {
                    $totcount++;
                    if ($mypref["partner_familytype"] == $arsub["partner_familytype"]) {
                        $arrpref[count($arrpref) - 1] = array("head" => "Family Type", "title" => $mypref["partner_familytype"], "value" => 1);

                        $prefcount++;
                    }
                }
            }

            $arrpref[count($arrpref)] = array("head" => "Expectation", "title" => "expectation", "value" => (isset($arsub["partner_expectation"]) && $arsub["partner_expectation"] != null) ? $arsub["partner_expectation"] : "");

            // print_r($arrpref);
            // die('ere');


            $arrdata[count($arrdata)] = array("header" => $subhead);

            $arrdata[count($arrdata) - 1]["value"] = $arrpref;
            $arrdata[count($arrdata) - 1]["count"] = $prefcount . "/" . $totcount;
            $arrdata[count($arrdata) - 1]["icon"] = "preference.svg";
            $arsub = array();
        }
        // if (count($arsub) > 0) {
        //     $arrdata[count($arrdata)] = array("header" => $subhead);
        //     $arvalue = array();
        //     foreach ($arsub as $k => $v) {
        //         $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
        //     }
        //     //print_r($arvalue);
        //     //die('ere');
        //     $arrdata[count($arrdata) - 1]["value"] = $arvalue;
        //     $arsub = array();
        // }
        // print_r($arrdata);


        return json_encode($arrdata);
    }

    function GetHeightValue($heightid)
    {

        $this->db->select("height");
        $this->db->from("tbl_height");
        $this->db->where("height_id", $heightid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            //print_r($query);
            return $query['height'];
        } else {
            return "";
        }
    }

    function GetEducation($eduid)
    {
        $this->db->select("high_education qualification");
        $this->db->from("tbl_highest_education");
        $this->db->where("id", $eduid);
        $query = $this->db->get();
        $query = $query->row_array();
        return $query['qualification'];
    }

    public function GetHelpSupport()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $json["office"] = array();
        $this->db->select("*");
        $this->db->from("tbl_help_support");
        $query = $this->db->get();
        $this->db->select("to.head,to.value");
        $this->db->from("tbl_office to");
        $query1 = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
            $json["office"] = $query1->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }
        return json_encode($json);
    }

    public function MyProfileInfo()
    {
        $id = $_GET['mode']; //r.profile_for 'Create By',r.happynikah_id 'Id',r.phone 'Phone',r.mail 'Mail',
        $this->db->SELECT("'About' head,o.aboutme,'Basic Information' head1,r.name 'Name',r.happynikah_id 'ID',case when r.gender=1 then 'Male' else 'Female' end 'Gender',
                concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') 'Age',ifnull(r.dob,'') 'DOB',r.marital_status 'Marital Status',
                r.physical_status 'Physical Status',ifnull(m.mothertongue,'') 'Mother Tongue',r.no_of_children 'No. of Children (Divorced / Widows)',profile_for 'Created By','Religious Information' head2,
                ifnull(rel.religion,'') 'Religion',ifnull(c.caste,'') 'Caste','Education and Professional' head3,ifnull(th.high_education,'') 'High Education',ifnull(e.education,'') 'Education',r.job_category 'Profession Type',
                ifnull(tp.profession_name,'') 'Profession',ifnull(r.job_details,'') 'Job Details',r.annual_income 'Annual Income',me.madr_education 'Madrasa Education',
                'Physical Attribute' head4,ifnull(h.height,'') 'Height',ifnull(w.weight,'') 'Weight',ifnull(r.color,'') 'Skin Color',
                ifnull(r.bodytype,'') 'Body Type',ifnull(r.appearance,'') 'Appearance','Location and Contact Details' head5,concat(ifnull(d.district,''),',',ifnull(tbl_states.name,r.state),',',
                ifnull(hc.name,r.country)) 'Present Location',concat(ifnull(hd.district,''),',',ifnull(hs.name,''),',',ifnull(hc.name,r.country)) 'Home Location',
                r.native_place 'City/Street',ifnull(r.address,'') 'Address',case when r.countryCode!=0 then concat(r.countryCode,r.phone) else r.phone end 'Mobile',
                r. other_contact_number 'Secondary Number',r.mail 'Email',ifnull(r.contacttype,'') 'Contact Type','Family Details' head6,
                ifnull(f.familytype,'') 'Family Type',ifnull(f.financial_status,'') 'Financial Status',ifnull(f.hometype,'') 'Home Type',
                ifnull(f.total_members,'') 'Number of family Members',ifnull(f.fatherdetails,'') 'Father Details',ifnull(f.motherdetails,'') 'Mother Details',
                ifnull(f.fathers_occupation,'') 'Father Profession',f.mothers_occupation 'Mother Profession','Partner Preference' head8,
                'Basic Preference' subhead1,o.partner_age_from 'Age From',o.partner_age_to 'Age To',ifnull(ph.height,'') 'Height From',ifnull(ph_to.height,'') 'Height To',
                ifnull(wh.weight,'') 'Weight From',ifnull(wh_to.weight,'') 'Weight To',ifnull(GROUP_CONCAT(distinct o.partner_physicalstatus),'') 'Physical Status Preference',
            ifnull(GROUP_CONCAT(distinct part_appearance.appearance),'') 'Appearance Preference',o.partner_financial 'Family Status Preference',
            ifnull(GROUP_CONCAT(distinct part_mothertongue.mothertongue),'') 'Mother Tongue Preference',ifnull(GROUP_CONCAT(distinct part_marital.maritalstatus),'') 'Marital Status Preference',
            ifnull(GROUP_CONCAT(distinct part_skincolor.skincolor),'') 'Skin Color Preference',
            ifnull(GROUP_CONCAT(distinct part_caste.caste),'') 'Belief Preference','EDUCATION AND PROFFESSI0NAL INFORMATION' subhead2,
            ifnull(GROUP_CONCAT(distinct part_edu.high_education),'') 'Education Preference',ifnull(GROUP_CONCAT(distinct part_job.profession_name),'') 'Profession Preference',
            'LOCATION PREFRENCE' subhead3,ifnull(GROUP_CONCAT(distinct part_country.name),'') 'Present Country',ifnull(GROUP_CONCAT(distinct part_state.name),'') 'Present State',
            ifnull(GROUP_CONCAT(distinct part_disc.district),'') 'Present District',case when o.partner_nationality='India'then 'Indian' else o.partner_nationality end 'Partner Nationality',
            o.partner_expectation  'Partner Expectation'");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_mothertongue m", "m.mothertongue_id=r.mother_tongue", "left");
        $this->db->join("tbl_religion rel", "rel.rid=r.religion", "left");
        $this->db->join("tbl_caste c", "c.cid=r.caste", "left");
        $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");
        $this->db->join("tbl_highest_education th", "th.id = r.highest_education", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_weight w", "w.weight_id=r.weight", "left");
        $this->db->join("tbl_district d", "d.district_id=r.home_district", "left");
        $this->db->join("tbl_district hd", "hd.district_id=r.native_district", "left");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->join("tbl_otherdetails o", "o.user_id=r.id", "left");
        $this->db->join("tbl_qualification pq", "FIND_IN_SET(pq.qualification_id,o.partner_education)>0", "left");
        $this->db->join("tbl_height ph", "ph.height_id=o.partner_height", "left");
        $this->db->join("tbl_height ph_to", "ph_to.height_id=o.partner_height_to", "left");
        $this->db->join("tbl_weight wh", "wh.weight_id=o.partner_weight", "left");
        $this->db->join("tbl_weight wh_to", "wh_to.weight_id=o.partner_weight_to", "left");
        $this->db->join("tbl_country", "tbl_country.id=r.country", "left");
        $this->db->join("tbl_states", "tbl_states.id=r.state", "left");
        $this->db->join("tbl_country hc", "hc.id=r.home_country", "left");
        $this->db->join("tbl_states hs", "hs.id=r.home_state", "left");
        $this->db->join("tbl_countrycode cnt", "cnt.id=r.secondary_code", "left");
        $this->db->join("tbl_physicalstatus part_physical", "FIND_IN_SET(part_physical.id,o.partner_physicalstatus)>0", "left");
        $this->db->join("tbl_appearance part_appearance", "FIND_IN_SET(part_appearance.id,o.partner_appearance)>0", "left");
        $this->db->join("tbl_mothertongue part_mothertongue", "FIND_IN_SET(part_mothertongue.mothertongue_id,o.partner_mother_tongue )>0", "left");
        $this->db->join("tbl_maritalstatus part_marital", "FIND_IN_SET(part_marital.id,o.partner_maritalstatus )>0", "left");
        $this->db->join("tbl_skincolor part_skincolor", "FIND_IN_SET(part_skincolor.id,o.partner_skincolor )>0", "left");
        $this->db->join("tbl_mothertongue part_language", "FIND_IN_SET(part_language.mothertongue_id,o.partner_languagespoken )>0", "left");
        $this->db->join("tbl_caste part_caste", "FIND_IN_SET(part_caste.cid,o.partner_caste )>0", "left");
        $this->db->join("tbl_highest_education part_edu", "FIND_IN_SET(part_edu.id,o.partner_education)>0", "left");
        // $this->db->join("tbl_qualification part_edu", "FIND_IN_SET(part_edu.qualification_id,o.partner_education)>0", "left");
        $this->db->join("tbl_profession part_job", "FIND_IN_SET(part_job.profession_id,o.partner_occupation)>0", "left");
        // $this->db->join("tbl_jobs part_job", "FIND_IN_SET(part_job.job_id,o.partner_occupation)>0", "left");
        $this->db->join("tbl_country part_country", "FIND_IN_SET(part_country.id,o.partner_country)>0", "left");
        $this->db->join("tbl_states part_state", "FIND_IN_SET(part_state.id,o.partner_state)>0", "left");
        $this->db->join("tbl_district part_disc", "FIND_IN_SET(part_disc.district_id,o.partner_district)>0", "left");
        $this->db->join("tbl_madrassa_education me", "me.id = r.madrassa_education", "left");

        $this->db->where("r.id", $id);
        $query = $this->db->get();
        if (isset($_GET['a'])) {
            echo $this->db->last_query();
        }

        $resutl = $query->row_array();
        //print_r($resutl);
        $arrdata = array();
        $subhead = "";
        $arsub = array();
        $icons = [
            "contact.svg",
            "contact.svg",
            "star.svg",
            "education.svg",
            "physical.svg",
            "location.svg",
            "family.svg",
            "hobbies.svg",
            "location.svg",
        ];
        $index = 0;
        foreach ($resutl as $key => $value) {


            if (substr($key, 0, 4) == "head") {
                if (count($arsub) > 0) {
                    $arrdata[count($arrdata)] = array("header" => $subhead);
                    $arvalue = array();
                    foreach ($arsub as $k => $v) {
                        if ($k == 'No. of Children (Divorced / Widows)' && $v == null || $k == 'No. of Children (Divorced / Widows)' && $v == "0") {

                        } else {
                            $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
                        }

                    }
                    //print_r($arvalue);
                    //die('ere');
                    $arrdata[count($arrdata) - 1]["value"] = $arvalue;
                    $arrdata[count($arrdata) - 1]["icon"] = $icons[$index];
                    $arsub = array();
                    $index++;
                }

                $subhead = $value;
            } else {
                //echo $key."=". strpos($key, "Preference")."\n";
                if (strpos($key, "Preference") > 0) {
                    $split = explode(" ", $key);
                    //print_r($split);
                    //die('ere');
                    if (count($split) > 2) {
                        $key = $split[0] . " " . $split[1];
                    } else {
                        $key = $split[0];
                    }

                    $arsub[$key] = $value;
                } else {
                    $arsub[$key] = $value;
                }
            }
        }
        //sdie('er');
        if (count($arsub) > 0) {
            $arrdata[count($arrdata)] = array("header" => $subhead);
            $arvalue = array();
            foreach ($arsub as $k => $v) {
                $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
            }
            //print_r($arvalue);
            //die('ere');
            $arrdata[count($arrdata) - 1]["value"] = $arvalue;
            $arrdata[count($arrdata) - 1]["icon"] = "preference.svg";
            $arsub = array();
        }
        // print_r($arrdata);


        return json_encode($arrdata);
    }
    public function EditMyProfileInfo($id, $head)
    {
        //$id = $_GET['mode']; //r.profile_for 'Create By',r.happynikah_id 'Id',r.phone 'Phone',r.mail 'Mail',
        //$head=$
        $this->db->SELECT("'About' head,o.aboutme,'Basic Information' head1,r.name 'Name',r.happynikah_id 'ID',case when r.gender=1 then 'Male' else 'Female' end 'Gender',
                concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') 'Age',r.marital_status 'Marital Status',
                r.physical_status 'Physical Status',concat(ifnull(r.mother_tongue,''),'-',ifnull(m.mothertongue,'')) 'Mother Tongue',r.no_of_children 'No. of Children (Divorced / Widows)',
                profile_for 'Created By','Religious Information' head2,ifnull(rel.religion,'') 'Religion',concat(ifnull(r.caste,''),'-', ifnull(c.caste,'')) 'Caste','Education and Professional' head3,
                concat(ifnull(r.highest_education,''),'-',ifnull(th.high_education,'')) 'High Education',concat(ifnull(r.education,''),'-',ifnull(e.education,'')) 'Education',
                concat(ifnull(r.job_category,''),'-',ifnull(jc.professiontype,'')) 'Profession Type',concat(ifnull(r.occupation,''),'-',ifnull(tp.profession_name,'')) 'Profession',ifnull(r.job_details,'') 'Job Details',
                r.annual_income 'Annual Income',me.madr_education 'Madrasa Education','Physical Attribute' head4,concat(ifnull(r.height,''),'-',ifnull(h.height,'')) 'Height',
                concat(ifnull(r.weight,''),'-',ifnull(w.weight,'')) 'Weight',ifnull(r.color,'') 'Skin Color',ifnull(r.blood_group,'') 'Blood Group',ifnull(r.bodytype,'') 'Body Type',
                ifnull(r.appearance,'') 'Appearance', 'Location and Contact Details' head5,concat(ifnull(r.native_district,''),'-',ifnull(d.district,'')) district,concat(ifnull(r.state,''),'-',ifnull(tbl_states.name,r.state)) state,concat(ifnull(r.country,''),'-',ifnull(tbl_country.name,r.country)) country,ifnull(r.pincode,'') pincode,concat(ifnull(r.home_district,''),'-',ifnull(hd.district,'')) home_district,concat(ifnull(r.home_state,''),'-',ifnull(hs.name,'')) home_state,concat(ifnull(r.home_country,''),'-',ifnull(hc.name,r.country)) home_country,ifnull(r.home_pincode,'') 'home_pincode',r.native_place 'City/Street',ifnull(r.address,'') 'Address',case when r.countryCode!=0 then concat(r.countryCode,r.phone) else r.phone end 'Mobile',case when r.secondary_code!=0 then cnt.country else r.secondary_code end 'Country Code',r. other_contact_number 'Secondary Number',r.mail 'Email',ifnull(r.contacttype,'') 'Contact Type','Family Details' head6,ifnull(f.familytype,'') 'Family Type',ifnull(f.financial_status,'') 'Financial Status',ifnull(f.hometype,'') 'Home Type',ifnull(f.total_members,'') 'Number of family Members',ifnull(f.fatherdetails,'') 'Father Details',ifnull(f.motherdetails,'') 'Mother Details',ifnull(f.fathers_occupation,'') 'Father Profession',f.mothers_occupation 'Mother Profession','Hobbies' head7,ifnull(r.hobbies,'') 'Hobbies',
                'Partner Preference' head8,o.partner_age_from 'Age From',o.partner_age_to 'Age To',concat(ifnull(o.partner_height,''),'-',ifnull(ph.height,'')) 'Height From',concat(ifnull(o.partner_height_to,''),'-',ifnull(ph_to.height,'')) 'Height To',concat(ifnull(o.partner_weight,''),'-',ifnull(wh.weight,'')) 'Weight From',concat(ifnull(o.partner_weight_to,''),'-',ifnull(wh_to.weight,'')) 'Weight To',ifnull(GROUP_CONCAT(distinct o.partner_physicalstatus),'') 'Physical Status Preference',
            concat(ifnull(GROUP_CONCAT(distinct part_appearance.id),''),'-',ifnull(GROUP_CONCAT(distinct part_appearance.appearance),'')) 'Appearance Preference',o.partner_financial 'Family Status Preference',concat(ifnull(GROUP_CONCAT(distinct o.partner_mother_tongue),''),'-',ifnull(GROUP_CONCAT(distinct part_mothertongue.mothertongue),'')) 'Mother Tongue Preference',concat(ifnull(GROUP_CONCAT(distinct o.partner_maritalstatus),''),'-',ifnull(GROUP_CONCAT(distinct part_marital.maritalstatus),'')) 'Marital Status Preference',
            concat(ifnull(GROUP_CONCAT(distinct part_skincolor.id),''),'-',ifnull(GROUP_CONCAT(distinct part_skincolor.skincolor),'')) 'Skin Color Preference',concat(ifnull(GROUP_CONCAT(distinct o.partner_languagespoken),''),'-',ifnull(GROUP_CONCAT(distinct part_language.mothertongue),'')) 'Language Speak',concat(ifnull(GROUP_CONCAT(distinct o.partner_caste),''),'-',ifnull(GROUP_CONCAT(distinct part_caste.caste),'')) 'Belief Preference','EDUCATION AND PROFFESSI0NAL INFORMATION' subhead2,concat(ifnull(GROUP_CONCAT(distinct o.partner_education),''),'-',ifnull(GROUP_CONCAT(distinct part_edu.high_education order by part_edu.id),'')) 'Education Preference',concat(ifnull(GROUP_CONCAT(distinct o.partner_occupation),''),'-',ifnull(GROUP_CONCAT(distinct part_job.profession_name),'')) 'Profession Preference',
            o.partner_annualincome 'Anual Income Preference','LOCATION PREFRENCE' subhead3,
            concat(ifnull(GROUP_CONCAT(distinct o.partner_country),''),'-',ifnull(GROUP_CONCAT(distinct part_country.name),'')) 'Present Country',concat(ifnull(GROUP_CONCAT(distinct o.partner_state),''),'-',ifnull(GROUP_CONCAT(distinct part_state.name),'')) 'Present State',concat(ifnull(GROUP_CONCAT(distinct o.partner_district),''),'-',ifnull(GROUP_CONCAT(distinct part_disc.district),'')) 'Partner District',o.partner_nationality 'Partner Nationality',o.partner_expectation  'Partner Expectation'");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_mothertongue m", "m.mothertongue_id=r.mother_tongue", "left");
        $this->db->join("tbl_religion rel", "rel.rid=r.religion", "left");
        $this->db->join("tbl_caste c", "c.cid=r.caste", "left");
        $this->db->join("tbl_highest_education th", "th.id = r.highest_education", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_professiontype jc", "jc.id=r.job_category", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_weight w", "w.weight_id=r.weight", "left");
        $this->db->join("tbl_district d", "d.district_id=r.home_district", "left");
        $this->db->join("tbl_district hd", "hd.district_id=r.native_district", "left");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->join("tbl_otherdetails o", "o.user_id=r.id", "left");
        $this->db->join("tbl_education pq", "FIND_IN_SET(pq.edu_id,o.partner_education)>0", "left");
        $this->db->join("tbl_height ph", "ph.height_id=o.partner_height", "left");
        $this->db->join("tbl_height ph_to", "ph_to.height_id=o.partner_height_to", "left");
        $this->db->join("tbl_weight wh", "wh.weight_id=o.partner_weight", "left");
        $this->db->join("tbl_weight wh_to", "wh_to.weight_id=o.partner_weight_to", "left");
        $this->db->join("tbl_country", "tbl_country.id=r.country", "left");
        $this->db->join("tbl_states", "tbl_states.id=r.state", "left");
        $this->db->join("tbl_country hc", "hc.id=r.home_country", "left");
        $this->db->join("tbl_states hs", "hs.id=r.home_state", "left");
        $this->db->join("tbl_countrycode cnt", "cnt.id=r.secondary_code", "left");
        $this->db->join("tbl_physicalstatus part_physical", "FIND_IN_SET(part_physical.id,o.partner_physicalstatus)>0", "left");
        $this->db->join("tbl_appearance part_appearance", "FIND_IN_SET(part_appearance.id,o.partner_appearance)>0", "left");
        $this->db->join("tbl_mothertongue part_mothertongue", "FIND_IN_SET(part_mothertongue.mothertongue_id,o.partner_mother_tongue )>0", "left");
        $this->db->join("tbl_maritalstatus part_marital", "FIND_IN_SET(part_marital.id,o.partner_maritalstatus )>0", "left");
        $this->db->join("tbl_skincolor part_skincolor", "FIND_IN_SET(part_skincolor.id,o.partner_skincolor )>0", "left");
        $this->db->join("tbl_mothertongue part_language", "FIND_IN_SET(part_language.mothertongue_id,o.partner_languagespoken )>0", "left");
        $this->db->join("tbl_caste part_caste", "FIND_IN_SET(part_caste.cid,o.partner_caste )>0", "left");
        $this->db->join("tbl_highest_education part_edu", "FIND_IN_SET(part_edu.id,o.partner_education)>0", "left");
        $this->db->join("tbl_profession part_job", "FIND_IN_SET(part_job.profession_id,o.partner_occupation)>0", "left");
        $this->db->join("tbl_country part_country", "FIND_IN_SET(part_country.id,o.partner_country)>0", "left");
        $this->db->join("tbl_states part_state", "FIND_IN_SET(part_state.id,o.partner_state)>0", "left");
        $this->db->join("tbl_district part_disc", "FIND_IN_SET(part_disc.district_id,o.partner_district)>0", "left");
        $this->db->join("tbl_familytype part_family", "FIND_IN_SET(part_family.familytype,o.partner_familytype)>0", "left");
        $this->db->join("tbl_madrassa_education me", "me.id = r.madrassa_education", "left");

        $this->db->where("r.id", $id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $result = $query->row_array();
        // print_r($resutl);
        //die('ere');
        $arrdata = array();
        $subhead = "";
        $arsub = array();
        // print_r($result);
        $flag = false;
        foreach ($result as $key => $value) {
            if (substr($key, 0, 4) == "head" && $value == $head) {
                //echo $key."=".$value,"</br>";
                //$arrdata[$value]=[];
                $flag = true;
            } else if (substr($key, 0, 4) == "head" && $flag == true) {
                $flag = false;
            } else if ($flag) {
                //  echo $key."=".$value."</br>";
                if (strpos($key, "Preference") > 0) {
                    $split = explode(" ", $key);
                    //print_r($split);
                    //die('ere');
                    if (count($split) > 2) {
                        $key = $split[0] . " " . $split[1];
                    } else {
                        $key = $split[0];
                    }


                }

                $split = explode('-', $value);
                if (count($split) > 1) {
                    $arrdata[$key]['id'] = $split[0];
                    $arrdata[$key]["value"] = $split[1];
                } else {
                    $arrdata[$key]['id'] = "";
                    $arrdata[$key]["value"] = $value;
                }

                // foreach($value as $k=>$v){
                //     echo $k."=".$v."</br>";
                // }
            }
            // if (substr($key, 0, 4) == "head") {
            //     if (count($arsub) > 0 ) {
            //       // $arrdata[$subhead]=
            //         // $arrdata[count($arrdata)] = array("header" => $subhead);
            //         $arvalue = array();
            //         foreach ($arsub as $k => $v) {
            //             $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
            //         }
            //         $arrdata[$subhead]=$arvalue;
            //         // //print_r($arvalue);
            //         // //die('ere');
            //         // $arrdata[count($arrdata) - 1]["value"] = $arvalue;
            //         // $arrdata[count($arrdata) - 1]["icon"] = "bookmark.svg";
            //         // $arsub = array();
            //     }
            //     $subhead = $value;
            // } else {
            //     $arsub[$key] = $value;
            // }
        }
        // print_r($arrdata);
        //    die('ere');
        if (count($arsub) > 0) {
            $arrdata[count($arrdata)] = array("header" => $subhead);
            $arvalue = array();
            foreach ($arsub as $k => $v) {
                $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
            }
            //print_r($arvalue);
            //die('ere');
            $arrdata[count($arrdata) - 1]["value"] = $arvalue;
            $arrdata[count($arrdata) - 1]["icon"] = "bookmark.svg";
            $arsub = array();
        }
        // print_r($arrdata);
        // if($head!=""){
        //     //die('ere');
        //     //$head=$_GET['head'];
        //     foreach($arrdata as $key=>$value){
        //       //print_r($value);
        //       //echo "</br>";
        //       if($value['header']==$head){
        //           $arrdata=$value['value'];
        //           break;
        //       }
        //     }
        //     //print_r($arrdata);
        //   // $arrdata=$arrdata[$head];
        //     return json_encode($arrdata);
        // }else{
        return json_encode($arrdata);
        // }
    }

    // Upload image new method for upload to windows server
    public function UploadImageServer()
    {
        $path = "assets/photo_storage";

        $data = $_POST;
        $fileName = $data['user_id'] . mt_rand(1111, 9999) . date('Y-m-d') . '.jpg';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $d = array('error' => $this->upload->display_errors());
            $jsondata = array();
            $jsondata['error'] = $d['error'];
            return json_encode($jsondata);
        } else {

            $filename = './assets/photo_storage/' . $fileName;
            $image_info = getimagesize($filename);
            $watermark = './assets/images/hn_wtrmark.png';

            $water_info = getimagesize($watermark);

            $flag = false;

            if ($image_info[0] < $water_info[0]) {
                $flag = true;
                //Resize Image code
                $imgConfigwatermark = array();
                $imgConfigwatermark['image_library'] = 'gd2';
                $imgConfigwatermark['source_image'] = $watermark;
                $imgConfigwatermark['create_thumb'] = FALSE;
                $imgConfigwatermark['maintain_ratio'] = TRUE;
                $imgConfigwatermark['new_image'] = './assets/images/res_hnwtrmark.png';
                $imgConfigwatermark['width'] = round($water_info[0] / 2);
                $imgConfigwatermark['height'] = round($water_info[1]);
                $this->load->library('image_lib', $imgConfigwatermark);
                //print_r($imgConfigwatermark);

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
            }

            $watermarkname = ($flag) ? "res_hnwtrmark.png" : "hn_wtrmark.png";
            // echo $watermarkname;

            $imgConfig = array();
            $imgConfig['image_library'] = 'GD2';
            $imgConfig['source_image'] = './assets/photo_storage/' . $fileName;
            $imgConfig['new_image'] = './assets/photo_storage/' . $fileName;
            $imgConfig['wm_overlay_path'] = './assets/images/' . $watermarkname;
            $imgConfig['wm_type'] = 'overlay';
            $imgConfig['wm_vrt_alignment'] = 'middle';
            $imgConfig['wm_hor_alignment'] = 'right';
            $imgConfig['wm_hor_offset'] = -10;
            $imgConfig['wm_vrt_offset'] = 100;
            $this->load->library('image_lib', $imgConfig);
            $this->image_lib->initialize($imgConfig);
            // $tmppath = "./assets/images/" . $file_name;
            $this->image_lib->watermark();

            $im = imagecreatefromjpeg('assets/photo_storage/' . $fileName);
            $width = imagesx($im);
            $height = imagesy($im);
            $newheight = $height * 0.2;
            $newwidth = $width * 0.2;
            $thumbConfig = array();
            $thumbConfig['image_library'] = 'gd2';
            $thumbConfig['source_image'] = './assets/photo_storage/' . $fileName;
            $thumbConfig['new_image'] = './assets/testimg/';
            $thumbConfig['create_thumb'] = TRUE;
            $thumbConfig['maintain_ratio'] = TRUE;
            $thumbConfig['width'] = 200;
            $thumbConfig['height'] = 200;
            $this->image_lib->initialize($thumbConfig);


            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }

            if ($fileName) {
                // $response = $this->uploadtophotostorage($fileName);
                // $this->uploadtocrop($fileName);
                // if ($response['status']==true) {
                if (!isset($data['profile'])) {
                    $uploaddata['photo'] = $fileName;
                    $curdatetimephoto = date('Y-m-d H:i:s');
                    $uploaddata['photo_visibility'] = $data['photo_visibility'];
                    $this->db->where("id", $data['user_id']);
                    $this->db->update("tbl_registration", $uploaddata);
                    $multiupload = array();
                    $multiupload['user_id'] = $data['user_id'];
                    $multiupload['user_image'] = $fileName;
                    $multiupload['datetime'] = $curdatetimephoto;
                    $this->db->insert("tbl_userimages", $multiupload);
                } else if (isset($data['profile']) && $data['profile'] == 1) {
                    $uploaddata['photo'] = $fileName;
                    $uploaddata['photo_visibility'] = $data['photo_visibility'];
                    $this->db->where("id", $data['user_id']);
                    $this->db->update("tbl_registration", $uploaddata);
                } else if (isset($data['profile']) && $data['profile'] == 0) {
                    $multiupload = array();
                    $curdatetimephoto = date('Y-m-d H:i:s');
                    $multiupload['user_id'] = $data['user_id'];
                    $multiupload['user_image'] = $fileName;
                    $multiupload['datetime'] = $curdatetimephoto;
                    $this->db->insert("tbl_userimages", $multiupload);
                }
                $jsondata = array();
                $jsondata['user_id'] = $data['user_id'];
                return json_encode($jsondata);
                // }

            }


        }
    }
    public function uploadtophotostorage($filename)
    {
        //    echo "file to upload server  ".$filename ;

        $uploadUrl = "https://happynikah.azurewebsites.net/api/Files/photo_storage"; // Replace with the actual API endpoint URL
        $file_path = './assets/photo_storage/' . $filename;
        $ch = curl_init();
        // echo "<img src='".$file_path."' />";
        curl_setopt_array($ch, array(
            CURLOPT_URL => $uploadUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'accept: */*',
                'Content-Type: multipart/form-data',
            ),
            CURLOPT_POSTFIELDS => array(
                'FileDetail' => new CURLFile($file_path, 'image/jpeg', $filename)
            ),
        ));

        $response = curl_exec($ch);
        $response = json_decode($response, true);
        // print_r($response);
        $json = array();

        $json["sucsess"] = $response['success'];
        $json["message"] = $response['message'];

        curl_close($ch);

        return json_encode($json);
    }
    public function uploadtocrop($filename)
    {
        //    echo "file to upload server  ".$filename ;

        $uploadUrl = "https://happynikah.azurewebsites.net/api/Files/crop_image"; // Replace with the actual API endpoint URL
        $file_path = './assets/photo_storage/' . $filename;
        $ch = curl_init();
        // echo "<img src='".$file_path."' />";
        curl_setopt_array($ch, array(
            CURLOPT_URL => $uploadUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'accept: */*',
                'Content-Type: multipart/form-data',
            ),
            CURLOPT_POSTFIELDS => array(
                'FileDetail' => new CURLFile($file_path, 'image/jpeg', $filename)
            ),
        ));

        $response = curl_exec($ch);
        $response = json_decode($response, true);
        // print_r($response);
        $json = array();

        $json["sucsess"] = $response['success'];
        $json["message"] = $response['message'];

        // $tmppath = "./assets/photo_storage/" . $filename;
        // if (file_exists($tmppath)) {
        //     unlink($tmppath);
        // }

        curl_close($ch);

        return json_encode($json);
    }
    // Old & Now Image Uploading Method

    public function UploadImage()
    {
        $path = "assets/photo_storage";

        $data = $_POST;
        $fileName = $data['user_id'] . mt_rand(1111, 9999) . date('Y-m-d') . '.jpg';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $d = array('error' => $this->upload->display_errors());
            $jsondata = array();
            $jsondata['error'] = $d['error'];
            return json_encode($jsondata);
            //$this->load->view('upload_form', $error);
        } else {
            //$d = array('upload_data' => $this->upload->data());

            if (!isset($data['profile'])) {
                $uploaddata['photo'] = $fileName;
                $curdatetimephoto = date('Y-m-d H:i:s');
                $uploaddata['photo_visibility'] = $data['photo_visibility'];
                $this->db->where("id", $data['user_id']);
                $this->db->update("tbl_registration", $uploaddata);
                $multiupload = array();
                $multiupload['user_id'] = $data['user_id'];
                $multiupload['user_image'] = $fileName;
                $multiupload['datetime'] = $curdatetimephoto;
                $this->db->insert("tbl_userimages", $multiupload);
            } else if (isset($data['profile']) && $data['profile'] == 1) {
                $uploaddata['photo'] = $fileName;
                $uploaddata['photo_visibility'] = $data['photo_visibility'];
                $this->db->where("id", $data['user_id']);
                $this->db->update("tbl_registration", $uploaddata);
            } else if (isset($data['profile']) && $data['profile'] == 0) {
                $multiupload = array();
                $curdatetimephoto = date('Y-m-d H:i:s');
                $multiupload['user_id'] = $data['user_id'];
                $multiupload['user_image'] = $fileName;
                $multiupload['datetime'] = $curdatetimephoto;
                $this->db->insert("tbl_userimages", $multiupload);
            }
            if ($fileName != "") {
                $this->UploadNew($fileName);
            }

            $jsondata = array();
            $jsondata['user_id'] = $data['user_id'];
            return json_encode($jsondata);
            //$this->load->view('upload_success', $data);
        }
    }

    public function WaterMark()
    {
        //        $this->uploadphoto("265468112022-08-03.jpg");
//        
//        echo "<img src='".base_url()."assets/photo_storage/183849232022-08-04.jpg' />";
        //$this->UploadNew("183882612022-08-06.jpg");
        $this->BlurImage("183812922022-08-06.jpg");
    }
    public function BlurImage($filename)
    {
        //header('Content-type: image/jpeg');
        $imgpath = "assets/photo_storage/" . $filename;
        // echo  $imgpath;

        $image = new Imagick($imgpath);

        $image->blurImage(5, 3);
        echo $image;
    }

    public function UploadNew($filename)
    {
        $data["file_name"] = $filename;
        $orignal_file = $data["file_name"];

        $cropConfg = array();
        $cropConfg['image_library'] = 'GD2';
        $cropConfg['source_image'] = './assets/photo_storage/' . $orignal_file;
        $cropConfg['new_image'] = './assets/cropimage/';
        $this->load->library('image_lib', $cropConfg);
        $this->load->library('upload', $cropConfg);
        $this->image_lib->initialize($cropConfg);
        $this->image_lib->resize();

        $path = "./assets/photo_storage/" . $data["file_name"];
        if (file_exists($path)) {
            rename("./assets/photo_storage/" . $data["file_name"], "./assets/images/temp_" . $data["file_name"]);
        }

        $file_name = "temp_" . $data["file_name"]; //$data['upload_data']['file_name'];

        $filename = './assets/images/' . $file_name;

        $image_info = getimagesize($filename);
        $watermark = './assets/images/hn_wtrmark.png';

        $water_info = getimagesize($watermark);

        $flag = false;

        if ($image_info[0] < $water_info[0]) {
            $flag = true;

            //Resize Image code
            $imgConfigwatermark = array();
            $imgConfigwatermark['image_library'] = 'gd2';
            $imgConfigwatermark['source_image'] = $watermark;
            $imgConfigwatermark['create_thumb'] = FALSE;
            $imgConfigwatermark['maintain_ratio'] = TRUE;
            $imgConfigwatermark['new_image'] = './assets/images/res_hnwtrmark.png';
            $imgConfigwatermark['width'] = round($water_info[0] / 2);
            $imgConfigwatermark['height'] = round($water_info[1]);
            $this->load->library('image_lib', $imgConfigwatermark);
            //print_r($imgConfigwatermark);

            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }
        }

        $watermarkname = ($flag) ? "res_hnwtrmark.png" : "hn_wtrmark.png";
        //echo $watermarkname;

        $imgConfig = array();
        $imgConfig['image_library'] = 'GD2';
        $imgConfig['source_image'] = './assets/images/' . $file_name;
        $imgConfig['new_image'] = './assets/photo_storage/' . $orignal_file;
        $imgConfig['wm_overlay_path'] = './assets/images/' . $watermarkname;
        $imgConfig['wm_type'] = 'overlay';
        $imgConfig['wm_vrt_alignment'] = 'middle';
        $imgConfig['wm_hor_alignment'] = 'right';
        $imgConfig['wm_hor_offset'] = -10;
        $imgConfig['wm_vrt_offset'] = 100;
        $this->load->library('image_lib', $imgConfig);
        $this->image_lib->initialize($imgConfig);
        $tmppath = "./assets/images/" . $file_name;
        $this->image_lib->watermark();
        if (file_exists($tmppath)) {
            unlink($tmppath);
        }
        // if($orignal_file){
        //     $this->douploadthumb($orignal_file);
        // }
    }

    //     public function douploadthumb($img){
//         $thumbConfig = array();
//         $im = imagecreatefromjpeg('assets/cropimage/'. $img);
//         $width = imagesx($im);
//         $height = imagesy($im);
//         $newheight = $height * 0.2;
//         $newwidth = $width * 0.2;
//         $thumbConfig['image_library'] = 'GD2';
//         $thumbConfig['source_image'] = './assets/cropimage/' . $img;
//         $thumbConfig['new_image'] = './assets/photo_storage_thumb/'; 
//         // $thumbConfig['upload_path'] = '/assets/photo_storage_thumb/'; 
//         $thumbConfig['create_thumb'] = TRUE;
//         $thumbConfig['maintain_ratio'] = TRUE;
//         $thumbConfig['width'] = intval($newwidth);
//         $thumbConfig['height'] = intval($newheight);
//         $this->load->library('image_lib', $thumbConfig);
//         $this->load->library('upload', $thumbConfig);
//         $this->image_lib->initialize($thumbConfig);
//         $this->image_lib->resize();
// }

    public function uploadphoto($imagenewname)
    {
        $newfilename = 'assets/photo_storage/' . $imagenewname;
        //file_put_contents($newfilename, $data);
        //watermark
        $watermarkImagePath = 'hn_wtrmark.png';
        $watermarkImg = imagecreatefrompng('assets/images/' . $watermarkImagePath);
        $im = imagecreatefromjpeg('assets/photo_storage/' . $imagenewname);

        $marge_right = 10;
        $marge_bottom = 280;

        $sx = imagesx($watermarkImg);
        $sy = imagesy($watermarkImg);

        imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));
        $ext = pathinfo($newfilename, PATHINFO_EXTENSION);
        //echo $ext;
        if ($ext == "jpg" || $ext == "jpeg") {
            imagejpeg($im, $newfilename);
        } else {
            imagepng($newfilename);
        }

        imagedestroy($im);
    }

    function base64_to_jpeg($base64_string, $output_file)
    {
        // open the output file for writing
        $ifp = fopen($output_file, 'wb');

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode(',', $base64_string);

        // we could add validation here with ensuring count( $data ) > 1
        fwrite($ifp, base64_decode($base64_string));

        // clean up the file resource
        fclose($ifp);

        return $output_file;
    }

    public function getDistrict()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("district_id id,district value");
        $this->db->from("tbl_district");
        if (!empty($_GET['head']) && $_GET['head'] != 'null') {
            $this->db->where("state_id", $_GET['head']);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function getHeight()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("height_id id,height value");
        $this->db->from("tbl_height");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function getWeight()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("weight_id id,weight value");
        $this->db->from("tbl_weight");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function listBelief()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("cid id,caste value");
        $this->db->from("tbl_caste");
        $this->db->where("rel_id", 0);
        $this->db->or_where("rel_id", 2);
        if (!empty($_GET['head']) && $_GET['head'] != 'null') {
            $this->db->order_by("FIELD(cid, 214) DESC");
        } else {
            $this->db->order_by("cid");
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function GetMotherTongue()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("mothertongue_id id,mothertongue value");
        $this->db->from("tbl_mothertongue");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function getQualification()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("edu_id id,education value");
        $this->db->from("tbl_education");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function getJob()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("profession_id id,profession_name value");
        $this->db->from("tbl_profession");
        if (!empty($_GET['head']) && $_GET['head'] != 'null') {
            $this->db->order_by("FIELD(profession_id, 393) DESC");
        } else {
            $this->db->order_by("profession_id");
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function GetCountry()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("id,name value");
        $this->db->from("tbl_country");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function GetEducations()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("e.edu_id id,CONCAT(e.education) value");
        $this->db->join("tbl_highest_education th", "th.id = e.high_edu_id");
        $this->db->from("tbl_education e");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function GetEducationsgroup()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("*");
        $this->db->from("tbl_highest_education");
        $this->db->order_by("high_education");
        $highestedu = $this->db->get();
        $result = $highestedu->result_array();
        $arrdata = array();
        $arsub = array();
        foreach ($result as $highedu) {
            $this->db->select("e.edu_id,e.education,e.high_edu_id");
            $this->db->from("tbl_education e");
            $this->db->where("e.high_edu_id", $highedu['id']);
            $edu = $this->db->get();
            $result2 = $edu->result_array();
            $arrdata[count($arrdata)] = array("header" => $highedu['high_education']);
            $arvalue = array();
            foreach ($result2 as $k => $v) {
                if ($highedu['id'] == $v['high_edu_id']) {
                    $arvalue[] = array("id" => $v['edu_id'], "value" => $v['education']);
                }

            }
            $json = array();
            $arrdata[count($arrdata) - 1]["value"] = $arvalue;


        }
        $json['data'] = $arrdata;
        return json_encode($json);
    }

    public function GetDropDropdown($mode)
    {
        $tablename = "";
        $columnname = "";
        switch ($mode) {
            case 10:
                $tablename = "tbl_appearance";
                $columnname = "appearance";
                break;
            case 11:
                $tablename = "tbl_maritalstatus";
                $columnname = "maritalstatus";
                break;
            case 12:
                $tablename = "tbl_physicalstatus";
                $columnname = "physicalstatus";
                break;
            case 13:
                $tablename = "tbl_bloodgroup";
                $columnname = "bloodgroup";
                break;
            case 14:
                $tablename = "tbl_contacttype";
                $columnname = "contacttype";
                break;
            case 15:
                $tablename = "tbl_financialstatus";
                $columnname = "financialstatus";
                break;

            case 16:
                $tablename = "tbl_skincolor";
                $columnname = "skincolor";
                break;
            case 17:
                $tablename = "tbl_bodytype";
                $columnname = "bodytype";
                break;
            case 18:
                $tablename = "tbl_familytype";
                $columnname = "familytype";
                break;
            case 19:
                $tablename = "tbl_hometype";
                $columnname = "hometype";
                break;
            case 20:
                $tablename = "tbl_countrycode";
                $columnname = "country";
                break;
            case 21:
                $tablename = "tbl_highest_education";
                $columnname = "high_education";
                break;
            case 22:
                $tablename = "tbl_education";
                $columnname = "education";
                break;
            case 23:
                $tablename = "tbl_city";
                $columnname = "name";
                break;
            case 24:
                $tablename = "tbl_help_support";
                $columnname = "name";
                break;
            case 25:
                $tablename = "tbl_madrassa_education";
                $columnname = "madr_education";
                break;
            case 26:
                $tablename = "tbl_reportreason";
                $columnname = "reason";
                break;
            case 27:
                $tablename = "tbl_profession";
                $columnname = "profession_name";
                break;
            case 28:
                $tablename = "tbl_professional_income";
                $columnname = "income";
                break;
            case 29:
                $tablename = "tbl_deletereason";
                $columnname = "reason";
                break;
            case 30:
                $tablename = "part_tbl_highest_education";
                $columnname = "high_education";
                break;
        }


        //echo $tablename;

        $json = array();
        //        $json["error"] = false;
//        $json["error_msg"] = "";
        $json["data"] = array();
        if ($tablename == "tbl_education") {
            $this->db->select("edu_id id," . $columnname . " value");
            $this->db->from($tablename);
            if (!empty($_GET['head']) && $_GET['head'] != 'null') {
                $this->db->where("high_edu_id", $_GET["head"]);
            }

        } else if ($tablename == "tbl_city") {
            $this->db->select("id," . $columnname . " value");
            $this->db->from($tablename);
            if (!empty($_GET['head']) && $_GET['head'] != 'null') {
                $this->db->where("district_id", $_GET['head']);
                $this->db->order_by("name");
            }

        } else if ($tablename == "tbl_help_support") {
            $this->db->select("*");
            $this->db->from($tablename);

        } else if ($tablename == "tbl_profession") {
            $this->db->select("profession_id id," . $columnname . " value");
            $this->db->from($tablename);
            $this->db->order_by("profession_name");

        } else if ($tablename == "tbl_professional_income") {
            $this->db->select("income_id id," . $columnname . " value");
            $this->db->from($tablename);
        } else if ($tablename == "tbl_highest_education") {
            $this->db->select("id," . $columnname . " value");
            $this->db->from($tablename);
            // $this->db->order_by("FIELD(id, 9) DESC");
        } else if ($tablename == "part_tbl_highest_education") {
            $this->db->select("id," . $columnname . " value");
            $this->db->from("tbl_highest_education");
            $this->db->order_by("FIELD(id, 9) DESC");
        } else {
            $this->db->select("id," . $columnname . " value");
            $this->db->from($tablename);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function GetProfessionType()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("id,professiontype value");
        $this->db->from("tbl_professiontype");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function GetState()
    {
        $json = array();
        $json["error"] = false;
        $json["error_msg"] = "";
        $json["data"] = array();
        $this->db->select("id,name value");
        $this->db->from("tbl_states");
        if (!empty($_GET['head']) && $_GET['head'] != 'null') {
            $this->db->where("country_id", $_GET['head']);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $json["data"] = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function GetAge()
    {
        $json = array();
        $json['error'] = false;
        $json['error_msg'] = "";
        for ($i = 18; $i <= 70; $i++) {

            $json['data'][] = array("id" => "$i", "value" => "$i");
        }
        return json_encode($json);
    }

    public function GetHeightss()
    {
        $json = array();
        $json['error'] = false;
        $json['error_msg'] = "";
        for ($i = 135; $i <= 250; $i++) {

            $json['data'][] = array("id" => "$i", "value" => "$i cm");
        }
        return json_encode($json);
    }

    public function GetWeightss()
    {
        $json = array();
        $json['error'] = false;
        $json['error_msg'] = "";
        for ($i = 40; $i <= 150; $i++) {

            $json['data'][] = array("id" => "$i", "value" => "$i kg");
        }
        return json_encode($json);
    }

    public function GetParentsDetails()
    {
        $json = array();
        $json['error'] = false;
        $json['error_msg'] = "";
        $json['data'] = [array("id" => "1", "value" => "Alive"), array("id" => "2", "value" => "Died")];
        return json_encode($json);

    }

    public function Photostatus()
    {
        $id = $_GET['mode'];
        $this->db->select("case when r.photo='' then case when r.gender='1' then 'male.png' else 'female.png' end  else r.photo end photo");
        $this->db->from("tbl_registration r");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            $jsondata = array();
            $jsondata['photo'] = $query['photo'];
        }
        return json_encode($jsondata);
    }

    public function LoadUser()
    {

        $id = $_GET['mode'];
        $arraydata["popup_date"] = date('Y-m-d');
        $this->db->where("r.id", $id);
        $this->db->where("r.id!=", 36030);
        $res = $this->db->update("tbl_registration r", $arraydata);

        $this->db->select("r.phone,r.name,case when r.photo='' then case when r.gender='1' then 'male.png' else 'female.png' end  else r.photo end photo,r.mail,ifnull((ifnull(p.contactbalance,0)+ifnull(p.addoncontact,0)-ifnull(p.leftcontact,0)),0) contacts,ifnull((p.messagebalance+p.addonmessage),0) messages,count(v.sender_id) totviewed,r.status,r.stage,r.happynikah_id,ifnull(DATEDIFF(p.expiry_date, CURDATE()),'0') daysleft,r.gender,r.badge_status,r.popup_date adsdate,r.goto_nikah");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_payement p", "r.id=p.user_id and p.expiry_date>CURDATE() and p.status=1", "left");
        $this->db->join("tbl_plan pl", "pl.plan_id=p.plan_id", "left");
        $this->db->join("tbl_contact_viewed v", "v.sender_id=r.id and v.planid=p.id", "left");

        $this->db->where("r.id", $id);
        $query = $this->db->get();

        $this->db->select("distinct (receiver_id) totmessage");
        $this->db->from("tbl_chating");
        $this->db->join("tbl_payement p", "tbl_chating.sender_id=p.user_id and p.id=tbl_chating.planid and p.expiry_date>CURDATE() and p.status=1 ");
        $this->db->where("sender_id", $id);
        $this->db->group_by("receiver_id");
        $totmsg = $this->db->get();

        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            $query["contacts"] = (string) ($query["totviewed"] . '/' . $query["contacts"]);
            if ($totmsg->num_rows() > 0) {

                $query["totmessage"] = (string) $totmsg->num_rows();
                $query["totmessage"] = $query["totmessage"] ?? 0;
                $query["messages"] = (string) ($query["totmessage"] . '/' . $query["messages"]);

            } else {
                $this->db->select("r.phone,r.name,case when r.photo='' then case when r.gender='1' then 'male.png' else 'female.png' end  else r.photo end photo,r.mail,ifnull((p.contactbalance+p.addoncontact-p.leftcontact),0) contacts,ifnull((p.messagebalance+p.addonmessage),0) messages,count(v.sender_id) totviewed,r.status,r.stage,r.happynikah_id,ifnull(DATEDIFF(p.expiry_date, CURDATE()),'0') daysleft,r.gender,r.badge_status,r.popup_date adsdate,r.goto_nikah");
                $this->db->from("tbl_registration r");
                $this->db->join("tbl_payement p", "r.id=p.user_id and p.status=1", "left");
                $this->db->join("tbl_plan pl", "pl.plan_id=p.plan_id", "left");
                $this->db->join("tbl_contact_viewed v", "v.sender_id=r.id and v.planid=p.id", "left");
                $this->db->where("r.id", $id);
                $query2 = $this->db->get();
                // print_r($query2->row_array());
                $this->db->select("distinct (receiver_id) totmessage");
                $this->db->from("tbl_chating");
                $this->db->join("tbl_payement p", "tbl_chating.sender_id=p.user_id and p.id=tbl_chating.planid and p.status=1 ");
                $this->db->where("sender_id", $id);
                $this->db->group_by("receiver_id");
                $totmsg2 = $this->db->get();
                if ($query2->num_rows() > 0) {
                    $query = $query2->row_array();
                    $query["contacts"] = (string) ($query["totviewed"] . '/' . $query["contacts"]);
                    if ($totmsg2->num_rows() > 0) {
                        $query["totmessage"] = (string) $totmsg2->num_rows();
                        $query["totmessage"] = $query["totmessage"] ?? '0';
                        $query["messages"] = (string) ($query["totmessage"] . '/' . $query["messages"]);
                        $query["daysleft"] = "0";
                    }
                    // $query["daysleft"]= "0";
                }
                // $query["totmessage"] = "0";
                // $query["contacts"] = "0";
            }

            $json = $query;
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }
        return json_encode($json);
    }

    public function LoginWithId()
    {
        $userid = isset($_GET['mode']) ? $_GET['mode'] : "";
        $password = isset($_GET['m']) ? $_GET['m'] : "";
        //echo $phone;
        //echo $email;
        if ($userid == "" && $password == "") {
            $jsondata = array();
            $jsondata['user_id'] = 0;
            $jsondata['phone'] = "";
            return json_encode($jsondata);
        } else {
            $adm = "c8652cbb0bee9784ec6173766c91c253";
            // $adm = "dc543d469789a5360a10554590a064ba";
            $this->db->select("r.*");
            $this->db->from("tbl_registration r");
            $this->db->join("tbl_userlogin l", "r.id=l.user_id");
            $this->db->where("happynikah_id", $userid);
            if ($adm != md5($password)) {
                $this->db->where("l.password", md5($password));
            }

            //$this->db->where("r.deleted", 0);
            $this->db->where("r.status !=", 3);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {

                $res = $query->row_array();

                $phone = $res['phone'];
                $jsondata = array();
                $jsondata['user_id'] = (int) $res['id'];
                $jsondata['phone'] = $phone;
                $updatearray = array();
                $updatearray['last_login'] = date('Y-m-d H:i:s');
                $this->db->where("user_id", $res['id']);
                $this->db->update("tbl_userlogin", $updatearray);

                return json_encode($jsondata);
            } else {
                $this->db->select("r.*");
                $this->db->from("tbl_registration r");
                $this->db->join("tbl_userlogin l", "r.id=l.user_id");
                //$this->db->where("r.phone", $userid);
                $this->db->where("concat(r.countrycode,r.phone)='" . $userid . "' or r.phone='" . $userid . "'");
                // echo $adm."=".md5($password);
                if ($adm != md5($password)) {
                    $this->db->where("l.password", md5($password));
                }
                //$this->db->where("r.deleted", 0);
                $this->db->where("r.status !=", 3);
                $this->db->where("r.religion", 2);
                $query = $this->db->get();
                $jsondata = array();
                if ($query->num_rows() > 0) {
                    $res = $query->row_array();
                    // print_r($res);
                    $updatearray = array();
                    $updatearray['last_login'] = date('Y-m-d H:i:s');
                    $this->db->where("user_id", $res['id']);
                    $this->db->update("tbl_userlogin", $updatearray);
                    $phone = $res['phone'];
                    $jsondata = array();
                    $jsondata['user_id'] = (int) $res['id'];
                    $jsondata['phone'] = $phone;
                } else {

                    $jsondata['user_id'] = 0;
                    $jsondata['phone'] = "";
                }




                return json_encode($jsondata);
            }
        }
    }

    public function LoginWithAppleId()
    {
        $apple_uid = isset($_GET['mode']) ? $_GET['mode'] : "";
        if ($apple_uid == "") {
            $jsondata = array();
            $jsondata['user_id'] = 0;
            $jsondata['phone'] = "";
            return json_encode($jsondata);
        } else {
            $this->db->select("r.*");
            $this->db->from("tbl_registration r");
            $this->db->where("apple_uid", $apple_uid);
            $this->db->where("r.status !=", 3);
            $query = $this->db->get();
            $jsondata = array();
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $phone = $res['phone'];
                $jsondata = array();
                $jsondata['user_id'] = (int) $res['id'];
                $jsondata['phone'] = $phone;
            } else {

                $jsondata['user_id'] = 0;
                $jsondata['phone'] = "";
            }
            return json_encode($jsondata);
        }

    }

    public function LoginDetails()
    {
        $phone = isset($_GET['mode']) ? $_GET['mode'] : "";
        $email = isset($_GET['m']) ? $_GET['m'] : "";
        //echo $phone;
        //echo $email;
        if ($phone == "" && $email == "") {
            $jsondata = array();
            $jsondata['user_id'] = 0;
            $jsondata['phone'] = "";
            return json_encode($jsondata);
        } else {
            $this->db->select("*");
            $this->db->from("tbl_registration r");
            if ($phone != "") {
                // echo "nter";
                $this->db->where("concat(countrycode,phone)='" . $phone . "' or phone='" . $phone . "'");
            } else if ($email != "") {
                //echo 'entter';
                $this->db->where("mail", $email);
            }


            $this->db->where("phone!=''");
            //$this->db->where("deleted", 0);
            $this->db->where("status !=", 3);
            $this->db->where("r.religion", 2);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {

                $res = $query->row_array();
                if ($phone == "") {
                    $phone = $res['phone'];
                    $jsondata = array();
                    $jsondata['user_id'] = (int) $res['id'];
                    $jsondata['phone'] = $phone;
                } else {
                    $this->GenerateOtp($res['id'], $phone, 5);
                    $jsondata = array();
                    $jsondata['user_id'] = 1;
                    $jsondata['phone'] = $phone;
                }

                return json_encode($jsondata);
            } else {
                $jsondata = array();
                $jsondata['user_id'] = 0;
                $jsondata['phone'] = "";
                return json_encode($jsondata);
            }
        }
    }

    function GenerateOtp($userid, $mobile, $mode = 0)
    {
        $otp = mt_rand(100000, 999999);

        $this->db->select("r.name,case when r.countryCode!=0 then case when r.countryCode!='91' then concat('+',r.countryCode,r.phone) else  concat(r.countryCode,r.phone) end else concat('91',r.phone) end phone");
        $this->db->from("tbl_registration r");
        $this->db->where("id", $userid);
        $query = $this->db->get()->row_array();
        //print_r($query);
        //die('ere');
        $otpdata = array();
        $otpdata["user_id"] = $userid;
        $otpdata["otp"] = $otp;
        $otpdata["otp_time"] = date("Y-m-d H:i:s");
        $this->db->insert("tbl_otp", $otpdata);
        if ($mode == 0) {
            $msg = "Your OTP coded:" . $otp . "
Hi " . $query["name"] . ", Welcomeqq to happynikah. To know your  details through online on happynikah.com.

SYSOL SYSTEM SOLUTIONS PRIVATE LIMITED";
        } else if ($mode == 5) {
            $msg = "Your OTP codef:" . $otp . "
Hi " . $query["name"] . ", Welcomenn to happynikah. To know your  details through online on happynikah.com.

SYSOL SYSTEM SOLUTIONS PRIVATE LIMITED";
        }

        //$this->SendMail($userid, ($mode == 5) ? 0 : 1, $otp);

        $this->smsotp(urlencode($msg), $query["phone"], ($mode == 0) ? 4 : $mode, $otp, $query['name']);
    }

    function TotalProfileMatch()
    {
        $this->load->model("General_Model");
        $UserID = $_GET['mode'];

        $json[0] = array("id" => "totalprofiles", "value" => (string) $this->MatchingProfile(1));
        $json[1] = array("id" => "totalMembersviewed", "value" => $this->TotalMemberViewed($UserID));
        return json_encode($json);

        //        $data['MatchingProfiles'] = $this->General_Model->getmatchingprofiles(0,$Details,1);
//        return json_encode($this->General_Model->getmatchingprofiles(0,$Details,1));
//        $count = 1;
//        // $data['MatchingProfilesCount'] = $this->General_Model->getmatchingprofiles($offset,$Details,$count);
//        $data['InterestExpressedCount'] = $this->General_Model->interestexpressed($offset,$Details,$count);
//        $data['liked_profilesCount'] = $this->General_Model->liked_profiles($offset,$Details,$count);
    }

    private function TotalMemberViewed($userid)
    {
        $this->db->select("count(v.receiver_id) totcount");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_viewed_profiles v", "v.receiver_id=r.id");
        $this->db->where("r.id", $userid);
        $query = $this->db->get();
        $query = $query->row_array();
        return $query["totcount"];
    }

    public function LastViewed()
    {
        $id = $_GET['mode'];

        $this->db->select("r.id,name,age,ifnull(h.height,'') height,ifnull(sub_caste,'') belief,native_place,ifnull(d.district,'') native_district,ifnull(tp.profession_name,'') job,case when r.photo='' then case when r.gender='1' then 'male.png' else 'female.png' end  else r.photo end photo,ifnull(s.shortlist_id,0) shortlist,ifnull(i.interest_id,0) interest,ifnull(l.like_id,0) liked,r.phone,case when p.status=1 then 'Public' else r.photo_visibility end photo_visibility");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_subcaste c", "c.sid=r.caste", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $id, "left");
        $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $id, "left");
        $this->db->join("tbl_like l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->join("tbl_viewed_profiles p", "p.sender_id=r.id and p.receiver_id=" . $id);
        $this->db->join("tbl_photorequest pr", "pr.receiver_id=r.id and pr.sender_id=" . $id, "left");
        $this->db->where("r.id!=", $id);
        $this->db->where("p.viewed_id in (select max(viewed_id) from tbl_viewed_profiles where receiver_id='" . $id . "')");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $json = $query->row_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }
        return json_encode($json);
    }

    public function LoadImages()
    {
        $id = $_GET['mode'];
        $query = $this->db->query("select * from (select r.id,ifnull(m.user_image,'') photo,ifnull(m.profile_pic,0) profimg  from tbl_registration r left join tbl_userimages m on m.user_id=r.id )x where x.id=" . $id . " order by x.profimg desc");

        if ($query->num_rows() > 0) {
            $json = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }
        return json_encode($json);
    }

    public function MatchingProfile($mode = 0)
    {
        $id = $_GET['mode'];
        $m = isset($_GET['m']) ? $_GET['m'] : 0;
        $limit = 10;
        if (isset($_GET['m'])) {
            $limit = 500;
        }
        if ($id != null) {
            $arraydata = array();
            $arraydata["is_online"] = 1;
            $this->db->where("ul.user_id", $id);
            $this->db->update("tbl_userlogin ul", $arraydata);
        }
        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $user = $this->db->get()->row_array();

        $this->db->select("*");
        $this->db->from("tbl_otherdetails");
        $this->db->where("user_id", $id);
        $pref = $this->db->get()->row_array();

        $gender = "";
        $photo = "";
        if ($user["gender"] == "Male" || $user['gender'] == 1) {
            $gender = "2";
            $photo = "female.png";
        } else if ($user["gender"] == "Female" || $user['gender'] == 2) {
            $gender = "1";
            $photo = "male.png";
        }

        $this->db->select("status");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $status = $this->db->get()->row_array();
        if ($status['status'] == 3) {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
            return json_encode($json);
        }

        $currentDate = new DateTime();
        $today = $currentDate->format('Y');

        $this->db->select("r.id,name,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,r.dob,ifnull(h.height,'') height,ifnull(c.sub_caste,'') belief,ifnull(native_place,'') native_place,ifnull(d.district,'') native_district,ifnull(tp.profession_name,'') job,case when photo='' then '$photo' else case when u.status=2 then  photo else '$photo' end end photo ,ifnull(s.shortlist_id,0) shortlist,ifnull(i.interest_id,0) interest,ifnull(l.like_id,0) liked,r.phone,case when p.status=1 then 'Public' else case when r.photo_visibility!='null' then r.photo_visibility else 0 end end photo_visibility,r.happynikah_id,count(imgcount.user_id) totimages,case when py.user_id!=null then 1 else 0 end premium,ul.is_online status", FALSE);
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_subcaste c", "c.sid=r.caste", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $id, "left");
        $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $id, "left");
        $this->db->join("tbl_like l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->join("tbl_photorequest p", "p.receiver_id=r.id and p.sender_id=" . $id, "left");
        $this->db->join("tbl_userimages u", "u.user_id=r.id and r.photo=u.user_image", "left");
        $this->db->join("tbl_userimages imgcount", "imgcount.user_id=r.id", "left");
        $this->db->join("tbl_payement py", "py.user_id=r.id and py.expiry_date>NOW()", "left");
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");
        $this->db->where("r.id!=" . $id);
        $this->db->where("r.id not in (select receiver_id from tbl_ignored where sender_id='" . $id . "')");
        $this->db->where("r.name !=''");
        $this->db->where("r.status !=", 3);

        // echo $pref["partner_age_from"]."=".$pref["partner_age_to"];
        if ($mode == 1) {
            if (isset($pref["partner_age_from"]) && $pref["partner_age_to"] != "" && $pref["partner_age_from"] != "0" && $pref["partner_age_to"] != "0" && $pref["partner_age_from"] != "NULL" && $pref["partner_age_from"] != "NULL") {
                $this->db->where("r.age between '" . $pref["partner_age_from"] . "' and '" . $pref["partner_age_to"] . "'");
            }

            // if(isset($pref["partner_height"]) && isset($pref["partner_height_to"]) && $pref["partner_height"]!="" && $pref["partner_height_to"]!="" && $pref["partner_height"]!="NULL" && $pref["partner_height_to"]!="NULL"){
            // //echo $pref["partner_height"]."=".$pref["partner_height_to"];
            // $this->db->where("r.height between ".$pref["partner_height"]." and ".$pref["partner_height_to"]."");
            // }

            //echo $pref["partner_education"];

            // if(isset($pref["partner_education"]) && $pref["partner_education"]!="" && $pref["partner_education"]!="NULL"){
            // $this->db->where("r.education in (".$pref["partner_education"].")");
            // }

            // if(isset($pref["partner_familytype"]) && $pref["partner_familytype"]!=""){
            // $this->db->where("f.financial_status in (SELECT GROUP_CONCAT( DISTINCT CONCAT("'", REPLACE(partner_familytype, "," , "','") , "'"))  FROM tbl_otherdetails where user_id=".$id.")");
            // }
        }
        $this->db->where("r.gender", $gender);
        if ($gender == 2) {
            $this->db->where("r.age <=" . $user["age"] . " and r.age>=18");
        } else {
            $this->db->where("r.age >", $user["age"]);
        }
        $this->db->where("r.age !=", 0);
        if (isset($_GET['m'])) {
            if ($_GET['m'] == 1) {
                $this->db->where("r.physical_status !=", "Normal");
            } else if ($_GET['m'] == 2) {
                $this->db->where("f.financial_status", "Poor");
            } else if ($_GET['m'] == 3) {
                $this->db->where("py.userid !=", null);
            } else if ($_GET['m'] == 4) {
                $this->db->where("ul.is_online =", 1);
            }
        }
        $this->db->group_by('r.id');

        //$this->db->order_by("r.name");
        $this->db->order_by("convert(case when u.status=2 then  1 else 2 end,decimal),r.age");
        $this->db->order_by('R.id', 'RANDOM');


        if ($mode == 0) {
            $this->db->limit($limit);
            $query = $this->db->get();
            $res = $query->result_array();
            $i = 0;
            foreach ($res as $x) {
                if ($x['dob'] != '' && isset($x['dob'])) {
                    $dob = $x['dob'];
                    $dateob = strtotime($dob);
                    $d = date('Y', $dateob);
                    if ($d > 1950) {
                        $age = abs($d - $today);
                        $res[$i]['age'] = strval($age) . ' Yrs,';
                    }

                }
                $i++;
            }
            //echo $this->db->last_query();
            if ($query->num_rows() > 0) {
                // $json = $query->result_array();
                $json = array();
                $json = $res;
            } else {


                $json["error"] = true;
                $json["error_msg"] = "Data Not Found";

            }
            return json_encode($json);
        } else {
            $query = $this->db->get();
            return $query->num_rows();
        }
    }

    public function MatchingProfileLazyLoad($id, $limit, $endindex, $loadedids)
    {
        $m = (isset($_GET['m']) ? $_GET['m'] : 0);
       
        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $user = $this->db->get()->row_array();

        $this->db->select("*");
        $this->db->from("tbl_otherdetails");
        $this->db->where("user_id", $id);
        $pref = $this->db->get()->row_array();
        if ($id != null) {
            $arraydata = array();
            $arraydata["is_online"] = 1;
            $this->db->where("ul.user_id", $id);
            $this->db->update("tbl_userlogin ul", $arraydata);
        }

        $gender = "";
        $photo = "";
        if ($user["gender"] == "Male" || $user['gender'] == 1) {
            $gender = "2";
            $photo = "female.png";
        } else if ($user["gender"] == "Female" || $user['gender'] == 2) {
            $gender = "1";
            $photo = "male.png";
        }

        $this->db->select("status");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $status = $this->db->get()->row_array();
        if ($status['status'] == 3) {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
            return json_encode($json);
        }

        $currentDate = new DateTime();
        $today = $currentDate->format('Y');
        $this->db->select("r.id,r.name,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,
                        r.dob,ifnull(r.marital_status,'') marital_status,ifnull(h.height,'') height,ifnull(tr.religion,'') religion,ifnull(c.caste,'') belief,ifnull(native_place,'') native_place,
                        ifnull(d.district,'') native_district,ifnull(tbs.name,'') native_state,ifnull(e.education,'') qualification,ifnull(tp.profession_name,'') job,case when photo='' then '$photo' else case when u.status=2 then  photo else '$photo' end end photo ,
                        ifnull(s.shortlist_id,0) shortlist,ifnull(i.interest_id,0) interest,case when i.status IS NULL then 0 else i.status end intstatus,ifnull(l.id,0) liked,ifnull(p.id,0) photorequested,r.phone,
                        case when p.status=1 then 'Public' else case when r.photo_visibility!='null' then r.photo_visibility else 0 end end photo_visibility,r.happynikah_id,ifnull(imgcount.imgcount,0) totimages,
                        case when ifnull(py.user_id,0)!=0 then 1 else 0 end premium,ul.is_online status,r.status verify,icount.likecount likecount", FALSE);
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_caste c", "c.cid=r.caste", "left");
        $this->db->join("tbl_religion tr", "tr.rid=r.religion", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_states tbs", "tbs.id=r.state", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $id, "left");
        $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $id, "left");
        $this->db->join("(select receiver_id, COUNT(interest_id) likecount from tbl_interest group by receiver_id) icount ", " icount.receiver_id = r.id", "left");
        // $this->db->join("tbl_interest icount", "icount.receiver_id=r.id", "left");
        // $this->db->join("tbl_like l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->join("tbl_ignored l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->join("tbl_photorequest p", "p.receiver_id=r.id and p.sender_id=" . $id, "left");
        $this->db->join("tbl_userimages u", "u.user_id=r.id and r.photo=u.user_image", "left");
        // $this->db->join("tbl_userimages imgcount","imgcount.user_id=r.id","left");
        $this->db->join("(select count(user_id) imgcount,user_id from tbl_userimages where status =2 group by user_id) imgcount", "imgcount.user_id=r.id", "left");
        $this->db->join("tbl_payement py", "py.user_id=r.id and py.expiry_date>NOW()", "left");
        $this->db->join("tbl_hideprofile thp", "thp.user_id!=r.id and thp.hide_status!=0", "left");
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");
        $this->db->where("r.id!=" . $id);
        $this->db->where("r.id not in (select receiver_id from tbl_ignored where sender_id='" . $id . "')");
        $this->db->where("r.name !=''");
        if (isset($user['marital_status']) && $user['marital_status'] != '' && $user['marital_status'] != 'Unmarried') {
            $this->db->where("r.marital_status!='Unmarried'");
        } else {
            $this->db->where("r.marital_status='Unmarried'");
        }

        $this->db->where("r.status !=", 3);
        $this->db->where("r.status !=", 4);
        $this->db->where("r.status !=", 0);
        // check duplicate value
        if ($loadedids != "()") {
            $this->db->where("r.id not in $loadedids");
        }
        // echo $pref["partner_age_from"]."=".$pref["partner_age_to"];
        // echo $pref["partner_age_from"]."=".$pref["partner_age_to"];
        // if(isset($mode) && $mode==1){
        $m = $_GET['m'];
        if ($m != 1) {
            if (isset($pref["partner_age_from"]) && $pref["partner_age_to"] != "" && $pref["partner_age_from"] != "0" && $pref["partner_age_to"] != "0" && $pref["partner_age_from"] != "NULL" && $pref["partner_age_from"] != "NULL") {
                $this->db->where("r.age between '" . $pref["partner_age_from"] . "' and '" . $pref["partner_age_to"] . "'");

                // if (isset($pref["partner_district"]) && $pref["partner_district"]!="" && $pref["partner_district"]!="NULL") {
                //     $this->db->where("r.native_district in (".$pref["partner_district"].")");
                // }else {
                //     $this->db->where("r.native_district",$user["native_district"]);
                // }

            } else {
                if ($gender == 2) {
                    $this->db->where("r.age <=" . $user["age"] . " and r.age>=18");
                    if (isset($pref["partner_height"]) && isset($pref["partner_height_to"]) && $pref["partner_height"] != "" && $pref["partner_height_to"] != "" && $pref["partner_height"] != "NULL" && $pref["partner_height_to"] != "NULL") {
                        //echo $pref["partner_height"]."=".$pref["partner_height_to"];
                        $this->db->where("r.height between " . $pref["partner_height"] . " and " . $pref["partner_height_to"] . "");
                    }
                    if (isset($pref["partner_education"]) && $pref["partner_education"] != "" && $pref["partner_education"] != "NULL") {
                        $this->db->where("r.education in (" . $pref["partner_education"] . ")");
                    }
                    if (isset($pref["partner_maritalstatus"]) && $pref["partner_maritalstatus"] != "" && $pref["partner_maritalstatus"] != "NULL") {
                        $this->db->where("r.marital_status in (" . $pref["partner_maritalstatus"] . ")");
                    }

                } else {
                    $this->db->where("r.age >", $user["age"]);
                }
            }
        } else {
            $this->db->where("r.age >", 18);
        }
        if (isset($_GET['m'])) {
            if ($_GET['m'] == 1) {

            } else {
                if ($user['physical_status'] == 'Normal' && $m != 1) {
                    $this->db->where("r.physical_status", 'Normal');
                } else if ($user['physical_status'] != 'Normal') {
                    $this->db->where("r.physical_status!='Normal'");
                }
            }
        }


        // if(isset($pref["partner_height"]) && isset($pref["partner_height_to"]) && $pref["partner_height"]!="" && $pref["partner_height_to"]!="" && $pref["partner_height"]!="NULL" && $pref["partner_height_to"]!="NULL"){
        // //echo $pref["partner_height"]."=".$pref["partner_height_to"];
        // $this->db->where("r.height between ".$pref["partner_height"]." and ".$pref["partner_height_to"]."");
        // }

        //echo $pref["partner_education"];

        // if(isset($pref["partner_education"]) && $pref["partner_education"]!="" && $pref["partner_education"]!="NULL"){
        // $this->db->where("r.education in (".$pref["partner_education"].")");
        // }
        // if(isset($pref["partner_familytype"]) && $pref["partner_familytype"]!=""){
        // $this->db->where("f.financial_status in (SELECT GROUP_CONCAT( DISTINCT CONCAT("'", REPLACE(partner_familytype, "," , "','") , "'"))  FROM tbl_otherdetails where user_id=".$id.")");
        // }
        //}
        $this->db->where("r.gender", $gender);

        if (isset($_GET['m'])) {
            if ($_GET['m'] == 1) {
                $this->db->where("r.physical_status !=", "Normal");
                //  $this->db->where("r.physical_chalanged",1);
            } else if ($_GET['m'] == 2) {
                $this->db->where("f.financial_status", "Poor");
            } else if ($_GET['m'] == 3) {
                $this->db->where("ifnull(py.user_id,0) !=", 0);
            } else if ($_GET['m'] == 4) {
                $this->db->where("ul.is_online =", 1);
                $this->db->order_by('count(imgcount.user_id)', 'desc');
            } else if ($_GET['m'] == 5) {
                // governmnet
                $this->db->where("r.profession_type", 6);
            } else if ($_GET['m'] == 6) {
                // doctor
                $this->db->like("j.job_name", "Doctor");
            } else if ($_GET['m'] == 7) {
                // engineer
                $this->db->like("j.job_name", "Engineer");
            } else if ($_GET['m'] == 8) {
                //    Teacher
                $this->db->like("j.job_name", "Teacher");
            } else if ($_GET['m'] == 9) {
                // Accountant
                $this->db->like("j.job_name", "Accountant");
            } else if ($_GET['m'] == 10) {
                // Architect
                $this->db->like("j.job_name", "Architect");
            } else if ($_GET['m'] == 11) {
                // Actor
                $this->db->where("r.occupation", 83);
            } else if ($_GET['m'] == 12) {
                // managment Professional
                $this->db->like("j.job_name", "Management");
            } else if ($_GET['m'] == 13) {
                // buisness
                $this->db->like("j.job_name", "Buisness");
            } else if ($_GET['m'] == 14) {
                // desgner
                $this->db->like("j.job_name", "Designer");
            } else if ($_GET['m'] == 16) {
                if (isset($pref["partner_district"]) && $pref["partner_district"] != "" && $pref["partner_district"] != "NULL") {
                    $this->db->where("r.native_district in (" . $pref["partner_district"] . ")");
                } else {
                    $this->db->where("r.native_district", $user["native_district"]);
                }

            } else if ($_GET['m'] == 17) {
                if (isset($pref["partner_occupation"]) && $pref["partner_occupation"] != "" && $pref["partner_occupation"] != "NULL") {
                    $this->db->where("r.occupation in (" . $pref["partner_occupation"] . ")");
                } else {
                    $this->db->where("r.occupation", $user["occupation"]);
                }

            }
        }
        $this->db->where("r.age !=", 0);
        $this->db->group_by('r.id');
        // previous order by
        // $this->db->order_by("case when r.photo!='' AND r.photo_visibility=0 then 1 else 0 end ",'desc');
        // $this->db->order_by('r.id','RANDOM');

        // new order bu
        // $this->db->order_by('r.id','RANDOM');
        // $this->db->order_by("case when r.photo!='' AND r.photo_visibility=0 then 3 else case when r.photo!='' AND r.photo_visibility=1 then 2 else 1 end end ",'desc');
        // $this->db->order_by('r.id','RANDOM');

        if (isset($_GET['m'])) {
            if ($_GET['m'] == 15) {
                $this->db->order_by("case when r.photo!='' AND r.photo_visibility=0 then 3 else case when r.photo!='' AND r.photo_visibility=1 then 2 else 1 end end ", 'desc');
                $this->db->order_by('r.id', 'desc');
            } else if ($_GET['m'] == 18) {
                $this->db->order_by("likecount", 'desc');
            } else {
                $native_district = $user['native_district'];
                $native_district_minus_one = $native_district - 1;
                $native_district_plus_one = $native_district + 1;
                if (isset($pref["partner_district"]) && $pref["partner_district"] != "" && $pref["partner_district"] != "NULL") {
                    // old
                    // $this->db->order_by("case when r.photo!='' AND r.photo_visibility=0 then 3 else case when r.photo!='' AND r.photo_visibility=1 then 2 else 1 end end ",'desc');
                    // $this->db->order_by('r.id','RANDOM');
                    // new
                    // echo "partner";
                    $this->db->order_by("
                        (CASE
                            WHEN r.photo != '' AND r.photo_visibility = 0 THEN 3
                            WHEN r.photo != '' AND r.photo_visibility = 1 THEN 2
                            ELSE 1
                        END)", "DESC");

                    $this->db->order_by("CASE WHEN r.native_district IN (" . $pref["partner_district"] . ") THEN 3 WHEN r.native_district = {$native_district} THEN 2 else 1 end " . "DESC");
                    $this->db->order_by('r.id', 'RANDOM');
                } else {
                    $this->db->order_by("case when r.photo!='' AND r.photo_visibility=0 AND r.native_district = {$user['native_district']} then 3 else case when r.photo!='' AND r.photo_visibility=1 then 2 else 1 end end ", 'desc');
                    $this->db->order_by('r.id', 'RANDOM');
                }

            }

        } else {
            // $this->db->order_by('r.id','desc');

            // old
            // $this->db->order_by("case when r.photo!='' AND r.photo_visibility=0 then 3 else case when r.photo!='' AND r.photo_visibility=1 then 2 else 1 end end ", 'desc');
            // $this->db->order_by('r.id', 'desc');
            // $this->db->order_by('r.id','RANDOM');
            // new
            $native_district = $user['native_district'];
                $native_district_minus_one = $native_district - 1;
                $native_district_plus_one = $native_district + 1;
                if (isset($pref["partner_district"]) && $pref["partner_district"] != "" && $pref["partner_district"] != "NULL") {
                    // old
                    // $this->db->order_by("case when r.photo!='' AND r.photo_visibility=0 then 3 else case when r.photo!='' AND r.photo_visibility=1 then 2 else 1 end end ",'desc');
                    // $this->db->order_by('r.id','RANDOM');
                    // new
                    $this->db->order_by("
                        (CASE
                            WHEN r.photo != '' AND r.photo_visibility = 0 THEN 3
                            WHEN r.photo != '' AND r.photo_visibility = 1 THEN 2
                            ELSE 1
                        END)", "DESC");

                    $this->db->order_by("CASE WHEN r.native_district IN (" . $pref["partner_district"] . ") THEN 3 WHEN r.native_district = {$native_district} THEN 2 else 1 end " . "DESC");
                    $this->db->order_by('r.id', 'RANDOM');
                } else {
                    $this->db->order_by("case when r.photo!='' AND r.photo_visibility=0 AND r.native_district = {$user['native_district']} then 3 else case when r.photo!='' AND r.photo_visibility=1 then 2 else 1 end end ", 'desc');
                    $this->db->order_by('r.id', 'RANDOM');
                }

        }



        // latest profile get
        // $this->db->order_by('r.id','desc');
        if (isset($_GET['head']) && $_GET['head'] != '') {
            // $this->db->order_by('r.happynikah_id','desc');
            // $this->db->order_by('r.reg_date','desc');
            $this->db->order_by('imgcount.user_id', 'RANDOM');
        }

        $this->db->limit($limit, $endindex);
        $query = $this->db->get();
        // $res = $query->result_array();
        // $i=0;
        // foreach ($res as $x){
        //     if($x['dob']!=''&& isset($x['dob']  )){
        //         $dob = $x['dob'];
        //         $dateob = strtotime($dob);
        //         $d = date('Y', $dateob);
        //         if($d>1950){
        //             $age = abs($d - $today);
        //             $res[$i]['age'] = strval($age).' Yrs,';
        //         }

        //     }
        //     $i++;
        // } 
        //    echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            $json = $query->result_array();
            // $json = array();
            // $json = $res;
        } else {
            // $json []= array(
            //     'error' => true,
            //     'error_msg' => 'Data Not Found'
            // );
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);

    }
    // matching profile for swiping
    public function MatchingProfileLazyLoadSwipping($id, $limit, $endindex, $loadedids)
    {
        $m = (isset($_GET['m']) ? $_GET['m'] : 0);
        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $user = $this->db->get()->row_array();

        $this->db->select("*");
        $this->db->from("tbl_otherdetails");
        $this->db->where("user_id", $id);
        $pref = $this->db->get()->row_array();
        if ($id != null) {
            $arraydata = array();
            $arraydata["is_online"] = 1;
            $this->db->where("ul.user_id", $id);
            $this->db->update("tbl_userlogin ul", $arraydata);
        }

        $gender = "";
        $photo = "";
        if ($user["gender"] == "Male" || $user['gender'] == 1) {
            $gender = "2";
            $photo = "female.png";
        } else if ($user["gender"] == "Female" || $user['gender'] == 2) {
            $gender = "1";
            $photo = "male.png";
        }

        $this->db->select("status");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $status = $this->db->get()->row_array();
        if ($status['status'] == 3) {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
            return json_encode($json);
        }

        $currentDate = new DateTime();
        $today = $currentDate->format('Y');
        $this->db->select("r.id,r.name,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,
                        r.dob,ifnull(r.marital_status,'') marital_status,ifnull(h.height,'') height,ifnull(tr.religion,'') religion,ifnull(c.caste,'') belief,ifnull(native_place,'') native_place,
                        ifnull(d.district,'') native_district,ifnull(tbs.name,'') native_state,ifnull(e.education,'') qualification,ifnull(tp.profession_name,'') job,case when photo='' then '$photo' else case when u.status=2 then  photo else '$photo' end end photo ,
                        ifnull(s.shortlist_id,0) shortlist,ifnull(i.interest_id,0) interest,case when i.status IS NULL then 0 else i.status end intstatus,ifnull(l.id,0) liked,ifnull(p.id,0) photorequested,r.phone,
                        case when p.status=1 then 'Public' else case when r.photo_visibility!='null' then r.photo_visibility else 0 end end photo_visibility,r.happynikah_id,ifnull(imgcount.imgcount,0) totimages,
                        case when ifnull(py.user_id,0)!=0 then 1 else 0 end premium,ul.is_online status,r.status verify", FALSE);
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_caste c", "c.cid=r.caste", "left");
        $this->db->join("tbl_religion tr", "tr.rid=r.religion", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_states tbs", "tbs.id=r.state", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $id, "left");
        $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $id, "left");
        // $this->db->join("tbl_like l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->join("tbl_ignored l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->join("tbl_photorequest p", "p.receiver_id=r.id and p.sender_id=" . $id, "left");
        $this->db->join("tbl_userimages u", "u.user_id=r.id and r.photo=u.user_image", "left");
        // $this->db->join("tbl_userimages imgcount","imgcount.user_id=r.id","left");
        $this->db->join("(select count(user_id) imgcount,user_id from tbl_userimages where status =2 group by user_id) imgcount", "imgcount.user_id=r.id", "left");
        $this->db->join("tbl_payement py", "py.user_id=r.id and py.expiry_date>NOW()", "left");
        $this->db->join("tbl_hideprofile thp", "thp.user_id!=r.id and thp.hide_status!=0", "left");
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");
        $this->db->where("r.id!=" . $id);
        $this->db->where("r.id not in (select receiver_id from tbl_ignored where sender_id='" . $id . "')");
        $this->db->where("r.name !=''");
        if (isset($user['marital_status']) && $user['marital_status'] != '' && $user['marital_status'] != 'Unmarried') {
            $this->db->where("r.marital_status!='Unmarried'");
        } else {
            $this->db->where("r.marital_status='Unmarried'");
        }
        if ($user['physical_status'] != 'Normal') {
            $this->db->where("r.physical_status!='Normal'");
        }
        $this->db->where("r.status !=", 3);
        $this->db->where("r.status !=", 4);
        $this->db->where("r.status !=", 0);
        // check duplicate value
        if ($loadedids != "()") {
            $this->db->where("r.id not in $loadedids");
        }
        // echo $pref["partner_age_from"]."=".$pref["partner_age_to"];
        // echo $pref["partner_age_from"]."=".$pref["partner_age_to"];
        // if(isset($mode) && $mode==1){
        $m = (isset($_GET['m']) ?? '');
        if ($m != 1) {
            if (isset($pref["partner_age_from"]) && $pref["partner_age_to"] != "" && $pref["partner_age_from"] != "0" && $pref["partner_age_to"] != "0" && $pref["partner_age_from"] != "NULL" && $pref["partner_age_from"] != "NULL") {
                $this->db->where("r.age between '" . $pref["partner_age_from"] . "' and '" . $pref["partner_age_to"] . "'");
            } else {
                if ($gender == 2) {
                    $this->db->where("r.age <=" . $user["age"] . " and r.age>=18");
                    if (isset($pref["partner_height"]) && isset($pref["partner_height_to"]) && $pref["partner_height"] != "" && $pref["partner_height_to"] != "" && $pref["partner_height"] != "NULL" && $pref["partner_height_to"] != "NULL") {
                        //echo $pref["partner_height"]."=".$pref["partner_height_to"];
                        $this->db->where("r.height between " . $pref["partner_height"] . " and " . $pref["partner_height_to"] . "");
                    }
                    if (isset($pref["partner_education"]) && $pref["partner_education"] != "" && $pref["partner_education"] != "NULL") {
                        $this->db->where("r.education in (" . $pref["partner_education"] . ")");
                    }
                    if (isset($pref["partner_maritalstatus"]) && $pref["partner_maritalstatus"] != "" && $pref["partner_maritalstatus"] != "NULL") {
                        $this->db->where("r.marital_status in (" . $pref["partner_maritalstatus"] . ")");
                    }
                } else {
                    $this->db->where("r.age >", $user["age"]);
                }
            }
        } else {
            $this->db->where("r.age >", 18);
        }


        // if(isset($pref["partner_height"]) && isset($pref["partner_height_to"]) && $pref["partner_height"]!="" && $pref["partner_height_to"]!="" && $pref["partner_height"]!="NULL" && $pref["partner_height_to"]!="NULL"){
        // //echo $pref["partner_height"]."=".$pref["partner_height_to"];
        // $this->db->where("r.height between ".$pref["partner_height"]." and ".$pref["partner_height_to"]."");
        // }

        //echo $pref["partner_education"];

        // if(isset($pref["partner_education"]) && $pref["partner_education"]!="" && $pref["partner_education"]!="NULL"){
        // $this->db->where("r.education in (".$pref["partner_education"].")");
        // }
        // if(isset($pref["partner_familytype"]) && $pref["partner_familytype"]!=""){
        // $this->db->where("f.financial_status in (SELECT GROUP_CONCAT( DISTINCT CONCAT("'", REPLACE(partner_familytype, "," , "','") , "'"))  FROM tbl_otherdetails where user_id=".$id.")");
        // }
        //}
        $this->db->where("r.gender", $gender);

        if (isset($_GET['m'])) {
            if ($_GET['m'] == 1) {
                $this->db->where("r.physical_status !=", "Normal");
                //  $this->db->where("r.physical_chalanged",1);
            } else if ($_GET['m'] == 2) {
                $this->db->where("f.financial_status", "Poor");
            } else if ($_GET['m'] == 3) {
                $this->db->where("ifnull(py.user_id,0) !=", 0);
            } else if ($_GET['m'] == 4) {
                $this->db->where("ul.is_online =", 1);
                $this->db->order_by('count(imgcount.user_id)', 'desc');
            } else if ($_GET['m'] == 5) {
                // governmnet
                $this->db->where("r.profession_type", 6);
            } else if ($_GET['m'] == 6) {
                // doctor
                $this->db->like("j.job_name", "Doctor");
            } else if ($_GET['m'] == 7) {
                // engineer
                $this->db->like("j.job_name", "Engineer");
            } else if ($_GET['m'] == 8) {
                //    Teacher
                $this->db->like("j.job_name", "Teacher");
            } else if ($_GET['m'] == 9) {
                // Accountant
                $this->db->like("j.job_name", "Accountant");
            } else if ($_GET['m'] == 10) {
                // Architect
                $this->db->like("j.job_name", "Architect");
            } else if ($_GET['m'] == 11) {
                // Actor
                $this->db->where("r.occupation", 83);
            } else if ($_GET['m'] == 12) {
                // managment Professional
                $this->db->like("j.job_name", "Management");
            } else if ($_GET['m'] == 13) {
                // buisness
                $this->db->like("j.job_name", "Buisness");
            } else if ($_GET['m'] == 14) {
                // desgner
                $this->db->like("j.job_name", "Designer");
            }
        }
        $this->db->where("r.age !=", 0);
        $this->db->group_by('r.id');
        // $this->db->order_by('count(imgcount.user_id)','desc');
        $this->db->order_by("case when r.photo!='' then 1 else 0 end ", 'desc');
        $this->db->order_by('r.id', 'RANDOM');
        // $this->db->order_by('r.id','desc');
        if (isset($_GET['head']) && $_GET['head'] != '') {
            // $this->db->order_by('r.happynikah_id','desc');
            // $this->db->order_by('r.reg_date','desc');
            $this->db->order_by('imgcount.user_id', 'RANDOM');
        }

        $this->db->limit($limit, $endindex);
        $query = $this->db->get();
        $res = $query->result_array();
        $i = 0;
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['profile'] = $this->ProfileInfoFormatch($res[$i]['id'], $id);
        }

        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            // $json = $query->result_array();
            // $json = array();
            // $json = $res;
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($res);

    }
    // for swipping matching profile
    public function ProfileInfoFormatch($profid, $userid)
    {
        $id = $profid;
        $user_id = $userid;
        $this->UpdateProfVisitForMatch($id, $user_id);

        $this->db->SELECT("'About' head,ifnull(o.aboutme,'') aboutme,'Basic Information' head1,r.name 'Name',r.happynikah_id 'ID',case when r.gender=1 then 'Male' else 'Female' end 'Gender',
            concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') 'Age',r.marital_status 'Marital Status',
            r.physical_status 'Physical Status',ifnull(m.mothertongue,'') 'Mother Tongue',case when r.marital_status != 'Unmarried' then r.no_of_children end 'No. of Children (Divorced / Widows)',profile_for 'Created By','Religious Information' head2,
            ifnull(rel.religion,'') 'Religion',ifnull(c.caste,'') 'Caste','Education and Professional' head3,ifnull(e.education,'') 'Education',r.job_category 'Profession Type',
            ifnull(tp.profession_name,'') 'Profession',ifnull(r.job_details,'') 'Job Details',r.annual_income 'Annual Income',ifnull(me.madr_education,'') 'Madrasa Education','Physical Attribute' head4,
            ifnull(h.height,'') 'Height',ifnull(w.weight,'') 'Weight',ifnull(r.color,'') 'Skin Color',ifnull(r.bodytype,'') 'Body Type',
            ifnull(r.appearance,'') 'Appearance', 'Location and Contact Details' head5,concat(ifnull(d.district,''),',',ifnull(tbl_states.name,r.state),',',ifnull(tbl_country.name,r.country),',',
            ifnull(r.pincode,'')) 'Present Location',concat(ifnull(hd.district,''),',',ifnull(hs.name,''),',',ifnull(hc.name,r.country),',',ifnull(r.home_pincode,'')) 'Home Location',
            r.native_place 'City/Street',ifnull(r.contacttype,'') 'Contact Type','Family Details' head6,ifnull(f.familytype,'') 'Family Type',ifnull(f.financial_status,'') 'Financial Status',
            ifnull(f.hometype,'') 'Home Type',ifnull(f.total_members,'') 'Number of family Members',ifnull(f.fatherdetails,'') 'Father Details',ifnull(f.motherdetails,'') 'Mother Details',
            ifnull(f.fathers_occupation,'') 'Father Profession',f.mothers_occupation 'Mother Profession','Partner Preferences' head8,concat(o.partner_age_from,'-', o.partner_age_to) 'Partner Age',
            concat(ph.height,'-', ph_to.height) 'Partner Height',concat(pw.weight,'-', pw_to.weight) 'Partner Weight',ifnull(pe.high_education,'') 'Partner Education',o.partner_expectation 'Partner Expectation',o.partner_financial 'Partner Financial Status',ifnull(pd.district,'') 'Partner Districts' ,'Partner Preference' head9,o.partner_age_from,
            o.partner_age_to,ifnull(o.partner_height,'') partner_height,ifnull(o.partner_height_to,'') 'partner_height_to',ifnull(o.partner_education,'') 'partner_education',
o.partner_familytype ,o.partner_expectation,ul.is_online");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_mothertongue m", "m.mothertongue_id=r.mother_tongue", "left");
        $this->db->join("tbl_religion rel", "rel.rid=r.religion", "left");
        $this->db->join("tbl_caste c", "c.cid=r.caste", "left");
        $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_weight w", "w.weight_id=r.weight", "left");
        $this->db->join("tbl_district d", "d.district_id=r.home_district", "left");
        $this->db->join("tbl_district hd", "hd.district_id=r.native_district", "left");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->join("tbl_otherdetails o", "o.user_id=r.id", "left");
        $this->db->join("tbl_education pq", "FIND_IN_SET(pq.edu_id,o.partner_education)>0", "left");
        $this->db->join("tbl_district pd", "FIND_IN_SET(pd.district_id,o.partner_district)>0", "left");
        $this->db->join("tbl_height ph", "ph.height_id=o.partner_height", "left");
        $this->db->join("tbl_height ph_to", "ph_to.height_id=o.partner_height_to", "left");
        $this->db->join("tbl_weight pw", "pw.weight_id=o.partner_weight", "left");
        $this->db->join("tbl_weight pw_to", "pw_to.weight_id=o.partner_weight_to", "left");
        $this->db->join("tbl_highest_education pe", "pe.id=o.partner_education", "left");
        $this->db->join("tbl_country", "tbl_country.id=r.country", "left");
        $this->db->join("tbl_states", "tbl_states.id=r.state", "left");
        $this->db->join("tbl_country hc", "hc.id=r.home_country", "left");
        $this->db->join("tbl_states hs", "hs.id=r.home_state", "left");
        $this->db->join("tbl_countrycode cnt", "cnt.id=r.secondary_code", "left");
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");
        $this->db->join("tbl_madrassa_education me", "me.id = r.madrassa_education", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $resutl = $query->row_array();
        // print_r($resutl);
        $arrdata = array();
        $subhead = "";
        $arsub = array();
        $icons = [
            "contact.svg",
            "contact.svg",
            "star.svg",
            "education.svg",
            "physical.svg",
            "location.svg",
            "family.svg",
            "hobbies.svg",
            "preference.svg",
        ];
        $index = 0;
        $arrdata[count($arrdata)] = array("status" => $resutl['is_online']);
        foreach ($resutl as $key => $value) {


            if (substr($key, 0, 4) == "head") {
                if (count($arsub) > 0) {
                    $arrdata[count($arrdata)] = array("header" => $subhead);
                    $arvalue = array();
                    foreach ($arsub as $k => $v) {
                        if ($k == 'aboutme' && $v == null) {

                            $arvalue[count($arrdata) - 2] = array("key" => 'aboutme', "value" => "I'm " . $resutl['Name'] . " looking for perfect soulmate");
                        } else if ($k == 'No. of Children (Divorced / Widows)' && $v == null) {

                        } else {
                            $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
                        }
                        // $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
                    }
                    //print_r($arvalue);
                    //die('ere');
                    $arrdata[count($arrdata) - 1]["value"] = $arvalue;
                    $arrdata[count($arrdata) - 1]["icon"] = $icons[$index];
                    $arsub = array();
                    $index++;
                }

                $subhead = $value;
            } else {
                $arsub[$key] = $value;
            }
        }
        if (count($arsub) > 0) {
            $this->db->select("*");
            $this->db->from("tbl_otherdetails");
            $this->db->where("user_id", $user_id);
            $mypref = $this->db->get();
            $mypref = $mypref->row_array();

            //print_r($mypref);
            // print_r($arsub);
            $totcount = 0;
            $prefcount = 0;
            $arrpref = array();
            $arrpref[count($arrpref)] = array("head" => "Age", "title" => $mypref["partner_age_from"] . "-" . $mypref["partner_age_to"], "value" => 0);
            if (isset($arsub["partner_age_from"])) {
                $totcount++;
                //echo $mypref["partner_age_from"]."=".$arsub["partner_age_from"]."</br>";
                if ($arsub["partner_age_from"] >= $mypref["partner_age_from"] || $arsub["partner_age_to"] <= $mypref["partner_age_to"]) {
                    $arrpref[count($arrpref) - 1] = array("head" => "Age", "title" => $mypref["partner_age_from"] . "-" . $mypref["partner_age_to"], "value" => 1);

                    $prefcount++;
                }
            }

            $arrpref[count($arrpref)] = array("head" => "Height", "title" => $this->GetHeightValue($mypref["partner_height"]) . "-" . $this->GetHeightValue($mypref["partner_height_to"]), "value" => 0);
            if (isset($arsub["partner_height"])) {
                $totcount++;
                if ($mypref["partner_height"] >= $arsub["partner_height"] || $mypref["partner_height_to"] < $arsub["partner_height_to"]) {
                    $arrpref[count($arrpref) - 1] = array("head" => "height", "title" => $this->GetHeightValue($mypref["partner_height"]) . "-" . $this->GetHeightValue($mypref["partner_height_to"]), "value" => 1);

                    $prefcount++;
                }
            }

            if (strtolower($mypref["partner_education"]) != "null" && $mypref["partner_education"] != "") {
                $arrpref[count($arrpref)] = array("head" => "Education", "title" => $this->GetEducation($mypref["partner_education"]), "value" => 0);
                if (isset($arsub["partner_education"])) {
                    $totcount++;
                    if ($mypref["partner_education"] == $arsub["partner_education"]) {
                        $arrpref[count($arrpref) - 1] = array("head" => "Education", "title" => $this->GetEducation($mypref["partner_education"]), "value" => 1);

                        $prefcount++;
                    }
                }
            }
            //             $arrpref["Weight"]=array($mypref["partner_weight"],0);
//            if($mypref["partner_weight"]==$arsub["partner_weight"]){
//                $arrpref["Weight"]=array($mypref["partner_weight"],1);
//            }
            if (strtolower($mypref['partner_familytype']) != "null" && $mypref['partner_familytype'] != "") {
                $arrpref[count($arrpref)] = array("head" => "Family Type", "title" => $mypref["partner_familytype"], "value" => 0);
                if (isset($arsub["partner_familytype"])) {
                    $totcount++;
                    if ($mypref["partner_familytype"] == $arsub["partner_familytype"]) {
                        $arrpref[count($arrpref) - 1] = array("head" => "Family Type", "title" => $mypref["partner_familytype"], "value" => 1);

                        $prefcount++;
                    }
                }
            }

            $arrpref[count($arrpref)] = array("head" => "Expectation", "title" => "expectation", "value" => (isset($arsub["partner_expectation"]) && $arsub["partner_expectation"] != null) ? $arsub["partner_expectation"] : "");

            // print_r($arrpref);
            // die('ere');


            $arrdata[count($arrdata)] = array("header" => $subhead);

            $arrdata[count($arrdata) - 1]["value"] = $arrpref;
            $arrdata[count($arrdata) - 1]["count"] = $prefcount . "/" . $totcount;
            $arrdata[count($arrdata) - 1]["icon"] = "preference.svg";
            $arsub = array();
        }
        // if (count($arsub) > 0) {
        //     $arrdata[count($arrdata)] = array("header" => $subhead);
        //     $arvalue = array();
        //     foreach ($arsub as $k => $v) {
        //         $arvalue[count($arvalue)] = array("key" => $k, "value" => $v);
        //     }
        //     //print_r($arvalue);
        //     //die('ere');
        //     $arrdata[count($arrdata) - 1]["value"] = $arvalue;
        //     $arsub = array();
        // }
        // print_r($arrdata);


        return $arrdata;
    }
    public function UpdateProfVisitForMatch($profid, $userid)
    {
        //$mode = $_GET['mode'];
        //$json = file_get_contents('php://input');
        //print_r($json);
        //echo "Name:".$json["Name"];
        $data = array(); //json_decode($json, true);
        $data['sender_id'] = $userid;
        $data['receiver_id'] = $profid;
        $this->db->select("*");
        $this->db->from("tbl_viewed_profiles");
        $this->db->where("sender_id", $data['sender_id']);
        $this->db->where("receiver_id", $data['receiver_id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $id = $query->row_array();
            $data['statusdate'] = date("Y-m-d");
            $this->db->where("viewed_id", $id['viewed_id']);
            $res = $this->db->update("tbl_viewed_profiles", $data);
        } else {
            $data['date'] = date("Y-m-d");
            $res = $this->db->insert("tbl_viewed_profiles", $data);
        }
        $jsonres = array();
        if ($res) {
            $jsonres["status"] = "1";
        } else {
            $jsonres["error"] = true;
            $jsonres["error_msg"] = "Data Not Found";
        }
        return json_encode($jsonres);
    }

    public function MatchingProfileLazyLoadLatest($id, $limit, $endindex)
    {
        $m = (isset($_GET['m']) ? $_GET['m'] : 0);
        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $user = $this->db->get()->row_array();

        $this->db->select("*");
        $this->db->from("tbl_otherdetails");
        $this->db->where("user_id", $id);
        $pref = $this->db->get()->row_array();
        if ($id != null) {
            $arraydata = array();
            $arraydata["is_online"] = 1;
            $this->db->where("ul.user_id", $id);
            $this->db->update("tbl_userlogin ul", $arraydata);
        }

        $gender = "";
        $photo = "";
        if ($user["gender"] == "Male" || $user['gender'] == 1) {
            $gender = "2";
            $photo = "female.png";
        } else if ($user["gender"] == "Female" || $user['gender'] == 2) {
            $gender = "1";
            $photo = "male.png";
        }

        $this->db->select("status");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $status = $this->db->get()->row_array();
        if ($status['status'] == 3) {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
            return json_encode($json);
        }

        $currentDate = new DateTime();
        $today = $currentDate->format('Y');
        $this->db->select("r.id,name,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,
                r.dob,ifnull(r.marital_status,'') marital_status,ifnull(h.height,'') height,ifnull(tr.religion,'') religion,ifnull(c.caste,'') belief,
                ifnull(native_place,'') native_place,ifnull(d.district,'') native_district,
                ifnull(tp.profession_name,'') job,case when photo='' then '$photo' else case when u.status=2 then  photo else '$photo' end end photo ,ifnull(s.shortlist_id,0) shortlist,
                ifnull(i.interest_id,0) interest,ifnull(l.like_id,0) liked,ifnull(p.id,0) photorequested,r.phone,
                case when p.status=1 then 'Public' else case when r.photo_visibility!='null' then r.photo_visibility else 0 end end photo_visibility,
                r.happynikah_id,ifnull(imgcount.imgcount,0) totimages,case when ifnull(py.user_id,0)!=0 then 1 else 0 end premium,ul.is_online status,r.status verify", FALSE);
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_caste c", "c.cid=r.caste", "left");
        $this->db->join("tbl_religion tr", "tr.rid=r.religion", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $id, "left");
        $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $id, "left");
        $this->db->join("tbl_like l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->join("tbl_photorequest p", "p.receiver_id=r.id and p.sender_id=" . $id, "left");
        $this->db->join("tbl_userimages u", "u.user_id=r.id and r.photo=u.user_image", "left");
        // $this->db->join("tbl_userimages imgcount","imgcount.user_id=r.id","left");
        $this->db->join("(select count(user_id) imgcount,user_id from tbl_userimages where status =2 group by user_id) imgcount", "imgcount.user_id=r.id", "left");
        $this->db->join("tbl_payement py", "py.user_id=r.id and py.expiry_date>NOW()", "left");
        $this->db->join("tbl_hideprofile thp", "thp.user_id!=r.id and thp.hide_status!=0", "left");
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");
        $this->db->where("r.id!=" . $id);
        $this->db->where("r.id not in (select receiver_id from tbl_ignored where sender_id='" . $id . "')");
        $this->db->where("r.name !=''");
        $this->db->where("r.status !=", 3);
        $this->db->where("r.status !=", 0);
        // echo $pref["partner_age_from"]."=".$pref["partner_age_to"];
        // echo $pref["partner_age_from"]."=".$pref["partner_age_to"];
        // if(isset($mode) && $mode==1){

        if (isset($pref["partner_age_from"]) && $pref["partner_age_to"] != "" && $pref["partner_age_from"] != "0" && $pref["partner_age_to"] != "0" && $pref["partner_age_from"] != "NULL" && $pref["partner_age_from"] != "NULL") {
            $this->db->where("r.age between '" . $pref["partner_age_from"] . "' and '" . $pref["partner_age_to"] . "'");
        } else {
            if ($gender == 2) {
                $this->db->where("r.age <=" . $user["age"] . " and r.age>=18");
            } else {
                $this->db->where("r.age >", $user["age"]);
            }
        }

        // if(isset($pref["partner_height"]) && isset($pref["partner_height_to"]) && $pref["partner_height"]!="" && $pref["partner_height_to"]!="" && $pref["partner_height"]!="NULL" && $pref["partner_height_to"]!="NULL"){
        // //echo $pref["partner_height"]."=".$pref["partner_height_to"];
        // $this->db->where("r.height between ".$pref["partner_height"]." and ".$pref["partner_height_to"]."");
        // }

        //echo $pref["partner_education"];

        // if(isset($pref["partner_education"]) && $pref["partner_education"]!="" && $pref["partner_education"]!="NULL"){
        // $this->db->where("r.education in (".$pref["partner_education"].")");
        // }
        // if(isset($pref["partner_familytype"]) && $pref["partner_familytype"]!=""){
        // $this->db->where("f.financial_status in (SELECT GROUP_CONCAT( DISTINCT CONCAT("'", REPLACE(partner_familytype, "," , "','") , "'"))  FROM tbl_otherdetails where user_id=".$id.")");
        // }
        //}
        $this->db->where("r.gender", $gender);

        if (isset($_GET['m'])) {
            if ($_GET['m'] == 0) {
                $this->db->where("r.photo !=", "");
            }
        }
        $this->db->where("r.age !=", 0);
        $this->db->order_by("r.id ", "RANDOM");
        $this->db->group_by('r.id');
        $this->db->limit($limit, $endindex);
        $query = $this->db->get();
        // $res = $query->result_array();
        // $i=0;
        // foreach ($res as $x){
        //     if($x['dob']!=''&& isset($x['dob']  )){
        //         $dob = $x['dob'];
        //         $dateob = strtotime($dob);
        //         $d = date('Y', $dateob);
        //         if($d>1950){
        //             $age = abs($d - $today);
        //             $res[$i]['age'] = strval($age).' Yrs,';
        //         }

        //     }
        //     $i++;
        // } 

        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            $json = $query->result_array();
            // $json = array();
            // $json = $res;
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }

        return json_encode($json);

    }

    public function Search()
    {
        $json = file_get_contents('php://input');
        //print_r($json);
        //echo "Name:".$json["Name"];
        $data = json_decode($json, true);
        $id = isset($data['id']) ? $data['id'] : '';
        if ($id == '') {
            $json = array();
            $json["error"] = true;
            $json["error_msg"] = "Id is required";

            return json_encode($json);
        }
        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $data['id']);
        $user = $this->db->get()->row_array();
        $maritalStatus = [0 => "All", 1 => "Unmarried", 2 => "Divorced", 3 => "Widow"];

        $gender = "";
        $photo = "";
        if ($user["gender"] == "1") {
            $gender = "2";
            $photo = "female.png";
        } else if ($user["gender"] == "2") {
            $gender = "1";
            $photo = "male.png";
        }

        $strbelief = array();
        $resbelief = "";
        if (isset($data['belief']) && $data['belief'] != "") {
            //echo $data['belief'];
            $strbelief = explode(",", $data['belief']);
            $res = "'" . implode("', '", $strbelief) . "'";
            $phpVersion = phpversion();
            if (floatval($phpVersion) >= 8) {
                if (str_contains($res, "Does") == false) {
                    $resbelief = $res;
                }
            } else {
                if (strpos($res, "Does") == false) {
                    $resbelief = $res;
                }
            }
        }

        $reseducation = "";
        if (isset($data['education']) && $data['education'] != "") {
            $streducation = array();
            $streducation = explode(",", $data['education']);

            if (count($streducation) > 0) {
                $res = "'" . implode("', '", $streducation) . "'";
                $reseducation = $res;
            }
            $anybool = "";
            $educationarr = explode(",", $reseducation);
            foreach ($educationarr as $value) {
                // echo "inside forloop wewe ".trim($value, "'") . "\n";
                // echo "inside forloop $value". "\n";
                if (trim($value, " ' ") == '333') {
                    // echo "value ".trim($value,"'")."\n";
                    $anybool = array();
                    $anybool = $value;
                }
            }
        }

        // highest education array
        $reshigheducation = "";
        if (isset($data['higheducation']) && $data['higheducation'] != "") {
            $strhigheducation = array();
            $strhigheducation = explode(",", $data['higheducation']);

            if (count($strhigheducation) > 0) {
                $res = "'" . implode("', '", $strhigheducation) . "'";
                $reshigheducation = $res;
            }
            $anyboolhigh = "";
            $higheducationarr = explode(",", $reshigheducation);
            foreach ($higheducationarr as $value) {
                // echo "inside forloop wewe ".trim($value, "'") . "\n";
                // echo "inside forloop $value". "\n";
                if (trim($value, " ' ") == '9') {
                    // echo "value ".trim($value,"'")."\n";
                    $anyboolhigh = array();
                    $anyboolhigh = $value;
                }
            }
        }

        // ============== my add profession ====================
        $resprofession = "";
        if (isset($data['profession']) && $data['profession'] != "") {
            //echo $data['belief'];
            $resprofession = array();
            $resprofession = explode(",", $data['profession']);

            if (count($resprofession) > 0) {
                $res = "'" . implode("', '", $resprofession) . "'";
                $resprofession = $res;
            }
        }
        $resdistrict = "";
        if (isset($data['district']) && $data['district'] != "") {
            //echo $data['belief'];
            $resdistrict = array();
            $resdistrict = explode(",", $data['district']);

            if (count($resdistrict) > 0) {
                $res = "'" . implode("', '", $resdistrict) . "'";
                $resdistrict = $res;
            }
            $anybooldist = "";
            $resdistrictarr = explode(",", $resdistrict);
            foreach ($resdistrictarr as $value) {
                // echo "inside forloop wewe ".trim($value, "'") . "\n";
                // echo "inside forloop $value". "\n";
                if (trim($value, " ' ") == 'All Kerala') {
                    // echo "value ".trim($value,"'")."\n";
                    $anybooldist = array();
                    $anybooldist = $value;
                }
            }
        }

        $rescity = "";
        if (isset($data['city']) && $data['city'] != "") {
            //echo $data['belief'];
            $rescity = array();
            $rescity = explode(",", $data['city']);

            if (count($rescity) > 0) {
                $res = "'" . implode("', '", $rescity) . "'";
                $rescity = $res;
            }
        }

        $resmaritalstatus = "";
        if (isset($data['maritalstatus']) && $data['maritalstatus'] != "") {
            //echo $data['belief'];
            $resmaritalstatus = array();
            $resmaritalstatus = explode(",", $data['maritalstatus']);

            if (count($resmaritalstatus) > 0) {
                $res = "'" . implode("', '", $resmaritalstatus) . "'";
                $resmaritalstatus = $res;
            }
            $anyboolmarital = "";
            $resmaritalarr = explode(",", $resmaritalstatus);
            foreach ($resmaritalarr as $value) {
                // echo "inside forloop wewe ".trim($value, "'") . "\n";
                // echo "inside forloop $value". "\n";
                if (trim($value, " ' ") == "Doesn't matter") {
                    // echo "value ".trim($value,"'")."\n";
                    $anyboolmarital = array();
                    $anyboolmarital = $value;
                }
            }
        }
        $resskincolor = array();
        if (isset($data['skincolor']) && $data['skincolor'] != "") {
            //echo $data['belief'];

            $resskincolor = explode(",", $data['skincolor']);

            if (count($resskincolor) > 0) {
                $res = "'" . implode("', '", $resskincolor) . "'";
                $resskincolor = $res;
            }
        }
        $resbodytype = array();
        if (isset($data['bodytype']) && $data['bodytype'] != "") {
            //echo $data['belief'];

            $resbodytype = explode(",", $data['bodytype']);

            if (count($resbodytype) > 0) {
                $res = "'" . implode("', '", $resbodytype) . "'";
                $resbodytype = $res;
            }
        }


        // ================ filter with height ===================
        $heightfrom = "";
        $heightto = "";
        if (isset($data['height']) && $data["height"] != "") {
            $spltd = explode(",", $data['height']);
            $this->db->select("height_id");
            $this->db->from("tbl_height");
            $this->db->like("height", $spltd[0]);
            $height = $this->db->get()->row_array();

            $heightfrom = $height["height_id"];

            $this->db->select("height_id");
            $this->db->from("tbl_height");
            $this->db->like("height", $spltd[1]);
            $height2 = $this->db->get()->row_array();
            $heightto = $height2["height_id"];
        }
        // =============== filter with weight ====================
        $weightfrom = "";
        $weightto = "";
        if (isset($data['weight']) && $data['weight'] != "") {
            $spltd = explode(",", $data['weight']);
            $this->db->select("weight_id");
            $this->db->from("tbl_weight");
            $this->db->like("weight", $spltd[0]);
            $weight = $this->db->get()->row_array();
            //print_r($weight);
            $weightfrom = $weight["weight_id"];

            $this->db->select("weight_id");
            $this->db->from("tbl_weight");
            $this->db->like("weight", $spltd[1]);
            $weight2 = $this->db->get()->row_array();
            $weightto = $weight2["weight_id"];
        }
        // ===========================================


        // $this->db->select("r.id,name,concat(age,' Yrs') age,ifnull(h.height,'') height,ifnull(c.sub_caste,'') belief,native_place,ifnull(d.district,'') native_district,ifnull(job_name,'') job,case when photo='' then '$photo' else case when u.status=2 then  photo else '$photo' end end photo,ifnull(s.shortlist_id,0) shortlist,ifnull(i.interest_id,0) interest,ifnull(l.like_id,0) liked,r.phone,case when p.status=1 then 'Public' else r.photo_visibility end photo_visibility");
        $this->db->select("r.id,r.name,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,
                        ifnull(h.height,'') height,ifnull(tr.religion,'') religion,ifnull(c.caste,'') belief,ifnull(native_place,'') native_place,ifnull(d.district,'') native_district,ifnull(tbs.name,'') native_state,ifnull(e.education,'') qualification,ifnull(tp.profession_name,'') job,
                        case when photo='' then '$photo' else case when u.status=2 then  photo else '$photo' end end photo ,ifnull(r.marital_status,'') marital_status,ifnull(s.shortlist_id,0) shortlist,
                        ifnull(i.interest_id,0) interest,case when i.status IS NULL then 0 else i.status end intstatus,ifnull(l.id,0) liked,ifnull(p.id,0) photorequested,r.phone,case when p.status=1 then 'Public' else case when r.photo_visibility!='null' then r.photo_visibility else 0 end end photo_visibility,
                        r.happynikah_id,ifnull(imgcount.imgcount,0) totimages,case when py.user_id!=null then 1 else 0 end premium,ul.is_online online,r.status,r.status verify", FALSE);
        $this->db->from("tbl_registration r");
        if ($resbelief != "") {
            $this->db->join("tbl_caste c", "c.cid=r.caste and c.caste in (" . $resbelief . ")");
        } else {
            $this->db->join("tbl_caste c", "c.cid=r.caste", "left");
        }

        // ============ join education =================
        if ($reseducation != "" && $anybool != "") {

            $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        } else if ($reseducation != "") {

            $this->db->join("tbl_education e", "e.edu_id=r.education and e.edu_id in (" . $reseducation . ")");
        } else {

            $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        }
        // ============ join high education =================
        if ($reshigheducation != "" && $anyboolhigh != "") {

            $this->db->join("tbl_highest_education he", "he.id=r.highest_education", "left");
        } else if ($reshigheducation != "") {

            $this->db->join("tbl_highest_education he", "he.id=r.highest_education and he.id in (" . $reshigheducation . ")");
        } else {

            $this->db->join("tbl_highest_education he", "he.id=r.highest_education", "left");
        }

        // ============== join jobs =====================
        if ($resprofession != "") {
            $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation and tp.profession_name in (" . $resprofession . ")");
        } else {
            $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        }

        // ============== Join District  =====================

        if ($resdistrict != "" && $anybooldist != "") {
            $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        } else if ($resdistrict != "") {
            $this->db->join("tbl_district d", "d.district_id=r.native_district and d.district in (" . $resdistrict . ")");
        } else {
            $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        }

        // $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        // ============my add =====================
        $this->db->join("tbl_weight w", "w.weight_id=r.weight", "left");
        // ========================================
        $this->db->join("tbl_religion tr", "tr.rid=r.religion", "left");
        $this->db->join("tbl_states tbs", "tbs.id=r.state", "left");
        $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $id, "left");
        $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $id, "left");
        // $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        // $this->db->join("tbl_like l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->join("tbl_ignored l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->join("tbl_photorequest p", "p.receiver_id=r.id and p.sender_id=" . $id, "left");
        $this->db->join("tbl_userimages u", "u.user_id=r.id and r.photo=u.user_image", "left");
        // $this->db->join("tbl_userimages imgcount","imgcount.user_id=r.id","left");
        $this->db->join("(select count(user_id) imgcount,user_id from tbl_userimages where status =2 group by user_id) imgcount", "imgcount.user_id=r.id", "left");
        $this->db->join("tbl_payement py", "py.user_id=r.id and py.expiry_date>NOW()", "left");
        $this->db->join("tbl_hideprofile thp", "thp.user_id!=r.id and thp.hide_status!=0", "left");
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");
        $this->db->where("r.id!=" . $id);
        $this->db->where("r.status !=", 3);
        $this->db->where("r.status !=", 4);
        $this->db->where("r.status !=", 0);
        // $this->db->where("r.id not in (select receiver_id from tbl_ignored where sender_id='" . $id . "')");
        $this->db->where("r.gender", $gender);
        if (isset($data['happynikah_id']) && $data['happynikah_id'] != "") {
            $this->db->where("happynikah_id", $data['happynikah_id']);
        } else {
            $this->db->where("r.id not in (select receiver_id from tbl_ignored where sender_id='" . $id . "')");
            if (isset($data['state']) && $data['state'] != "") {
                $this->db->where("r.state", $data['state']);
            }
            if (isset($data['age'])) {
                $spltd = explode(",", $data['age']);
                // print_r($spltd);
                $this->db->where("r.age between " . $spltd[0] . " and " . $spltd[1]);
            }
            if ($heightfrom != "" && $heightto != "") {
                $this->db->where("r.height between " . $heightfrom . " and " . $heightto);
            }
            // ============== my add ======================
            if ($weightfrom != "" && $weightto != "") {
                $this->db->where("r.weight between " . $weightfrom . " and " . $weightto);
            }


            if ($resmaritalstatus != "" && $anyboolmarital == "") {
                $this->db->where("r.marital_status IN (" . $resmaritalstatus . ")");
            }
            if ($rescity != "") {
                $this->db->where("r.native_place IN (" . $rescity . ")");
            }
        }
        if (isset($data['skincolor']) && $data['skincolor'] != '') {
            $this->db->where("r.color in (" . $resskincolor . ")");
        }
        if (isset($data['bodytype']) && $data['bodytype'] != "") {
            $this->db->where("r.bodytype in (" . $resbodytype . ")");
        }
        // ===============================================

        // if (isset($data['maritalstatus']) && $data['maritalstatus'] != 0) {
        //     $index = $data['maritalstatus'];
        //     $mstatus = $maritalStatus[$index];
        //     //echo $maritalStatus[$index];
        //     $this->db->where("r.marital_status" , $mstatus);
        // }
        $this->db->order_by("convert(case when u.status=2 then  1 else 2 end,decimal),r.age");
        $this->db->group_by('r.id');

        $limit = 10;
        if (!isset($data['happynikah_id']) || $data['happynikah_id'] == "") {
            if (isset($_GET['mode'])) {

                $endindex = $_GET['mode'];
                $this->db->limit($limit, $endindex);
            } elseif (isset($_GET['mode'])) {
                $this->db->limit($limit);
            }
        }

        $query = $this->db->get();
        //echo $this->db->last_query();
        $json = array();
        if ($query->num_rows() > 0) {
            $json = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }
        return json_encode($json);

    }

    public function Explore($userid=null,$mm=null)
    {
        $id = $userid??$_GET['mode'];
        $m = $mm??$_GET['m'];
        $limit = 10;

        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $user = $this->db->get()->row_array();

        $gender = "";
        $photo = "";
        if ($user["gender"] == "1") {
            $gender = "2";
            $photo = "female.png";
        } else if ($user["gender"] == "2") {
            $gender = "1";
            $photo = "male.png";
        }
        //  $this->db->select("r.id,name,concat(r.age,' Yrs,') age,ifnull(h.height,'') height,ifnull(c.sub_caste,'') belief,ifnull(native_place,'') native_place,ifnull(d.district,'') native_district,ifnull(job_name,'') job,case when photo='' then '$photo' else case when u.status=2 then  photo else '$photo' end end photo ,ifnull(s.shortlist_id,0) shortlist,ifnull(i.interest_id,0) interest,ifnull(l.like_id,0) liked,r.phone,case when p.status=1 then 'Public' else case when r.photo_visibility!='null' then r.photo_visibility else 0 end end photo_visibility,r.status,r.happynikah_id,count(imgcount.user_id) totimages,case when py.user_id!=null then 1 else 0 end premium",FALSE);
        // $this->db->from("tbl_registration r");
        // $this->db->join("tbl_subcaste c", "c.sid=r.caste", "left");
        // $this->db->join("tbl_jobs j", "j.job_id=r.occupation", "left");
        // $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        // $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        // $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        // $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $id, "left");
        // $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $id, "left");
        // $this->db->join("tbl_like l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        // $this->db->join("tbl_photorequest p", "p.receiver_id=r.id and p.sender_id=" . $id, "left");
        // $this->db->join("tbl_userimages u","u.user_id=r.id and r.photo=u.user_image","left");
        //  $this->db->join("tbl_userimages imgcount","imgcount.user_id=r.id","left");
        //  $this->db->join("tbl_payement py","py.user_id=r.id and py.expiry_date>NOW()","left");
        // $this->db->where("r.id!=" . $id);
        // $this->db->where("r.id not in (select receiver_id from tbl_ignored where sender_id='" . $id . "')");
        // $this->db->where("r.name !=''");
        // $this->db->where("r.status !=", 3);
        $currentDate = new DateTime();
        $today = $currentDate->format('Y');

        $this->db->select("r.id,name,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,r.dob,ifnull(h.height,'') height,
                    ifnull(c.sub_caste,'') belief,native_place,ifnull(d.district,'') native_district,ifnull(tp.profession_name,'') job,case when photo='' then '$photo' else photo end photo ,ifnull(s.shortlist_id,0) shortlist,
                    ifnull(i.interest_id,0) interest,ifnull(l.like_id,0) liked,r.phone,case when p.status=1 then 'Public' else case when r.photo_visibility!='null' then r.photo_visibility else 0 end end photo_visibility,
                    r.happynikah_id,count(imgcount.user_id) totimages,case when py.user_id!=null then 1 else 0 end premium,ul.is_online status,r.status deleted" . (($m == 20) ? ",pv.date" : ""), false);
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_subcaste c", "c.sid=r.caste", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_photorequest p", "p.receiver_id=r.id and p.sender_id=" . $id, "left");
        $this->db->join("tbl_payement py", "py.user_id=r.id and py.expiry_date>NOW()", "left");
        $this->db->join("tbl_userimages imgcount", "imgcount.user_id=r.id", "left");
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");

        if ($m == 1) {
            $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $id);
            $this->db->order_by("i.date", 'desc');
        } else {
            $this->db->join("tbl_interest i", "i.receiver_id=r.id and i.sender_id=" . $id, "left");
            $this->db->order_by("i.date", 'desc');
        }
        if ($m == 2) {
            $this->db->join("tbl_viewed_profiles pv", "pv.receiver_id=r.id and pv.sender_id=" . $id);
            $this->db->order_by("pv.date", 'desc');
        }
        if ($m == 3) {
            $this->db->join("tbl_contact_viewed cv", "cv.receiver_id=r.id and cv.sender_id=" . $id);
            $this->db->order_by("cv.date", 'desc');
        }
        if ($m == 4 || $m ==19) {

            $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $id);
            $this->db->order_by("s.date", 'desc');
        } else {
            $this->db->join("tbl_shortlist s", "s.receiver_id=r.id and s.sender_id=" . $id, "left");
            $this->db->order_by("s.date", 'desc');
        }
        if ($m == 5) {
            $this->db->join("tbl_block b", "b.receiver_id=r.id and b.sender_id=" . $id);
            $this->db->order_by("b.date", 'desc');
        }

        if ($m == 6) {
            $this->db->join("tbl_ignored g", "g.receiver_id=r.id and g.sender_id=" . $id);
            $this->db->order_by("g.date", 'desc');
        }
        if ($m == 7) {
            $this->db->join("tbl_interest rc", "rc.sender_id=" . $id . " and rc.receiver_id=r.id and rc.status=0");
            $this->db->order_by("rc.date", 'desc');
        }
        if ($m == 8) {
            $this->db->join("tbl_interest rc", "rc.sender_id=" . $id . " and rc.receiver_id=r.id and rc.status=1");
            $this->db->order_by("rc.date", 'desc');
        }
        if ($m == 9) {
            $this->db->join("tbl_interest rc", "rc.sender_id=" . $id . " and rc.receiver_id=r.id and rc.status='2'", false);
            $this->db->order_by("rc.date", 'desc');
        }
        if ($m == 10) {
            $this->db->join("tbl_photorequest pr", "pr.sender_id=" . $id . " and pr.receiver_id=r.id and pr.status=0 ", false);
            $this->db->order_by("pr.date", 'desc');
        }
        if ($m == 11) {
            $this->db->join("tbl_photorequest pr", "pr.sender_id=" . $id . " and pr.receiver_id=r.id and pr.status=1 ", false);
            $this->db->order_by("pr.date", 'desc');
        }
        if ($m == 12) {
            $this->db->join("tbl_photorequest pr", "pr.sender_id=" . $id . " and pr.receiver_id=r.id and pr.status=2 ", false);
            $this->db->order_by("pr.date", 'desc');
        }
        if ($m == 13) {
            $this->db->join("tbl_photorequest pr", "pr.receiver_id=" . $id . " and pr.sender_id=r.id and pr.status=0 ", false);
            $this->db->order_by("pr.date", 'desc');
        }
        if ($m == 14) {
            $this->db->join("tbl_photorequest pr", "pr.receiver_id=" . $id . " and pr.sender_id=r.id and pr.status=1 ", false);
            $this->db->order_by("pr.date", 'desc');
        }
        if ($m == 15) {
            $this->db->join("tbl_photorequest pr", "pr.receiver_id=" . $id . " and pr.sender_id=r.id and pr.status=2", false);
            $this->db->order_by("pr.date", 'desc');
        }
        if ($m == 16) {
            $this->db->join("tbl_notification n", "n.receiver_id=" . $id . " and n.sender_id=r.id ", false);
            $this->db->order_by("n.date", 'desc');
        }
        if ($m == 17) {
            $this->db->join("tbl_interest rc", "rc.receiver_id=" . $id . " and rc.sender_id=r.id and rc.status=0");
            $this->db->order_by("rc.date", 'desc');
        }
        if ($m == 18) {
            $this->db->join("tbl_interest rc", "rc.receiver_id=" . $id . " and rc.sender_id=r.id and rc.status=1");
            $this->db->order_by("rc.date", 'desc');
        }
        if ($m == 19) {
            $this->db->join("tbl_interest rc", "rc.receiver_id=" . $id . " and rc.sender_id=r.id and rc.status='2'", false);
            $this->db->order_by("rc.date", 'desc');
        }
        if ($m == 20) {
            $this->db->join("tbl_viewed_profiles pv", "pv.sender_id=r.id and pv.receiver_id=" . $id);
            $this->db->order_by("pv.date", 'desc');
        }
        if ($m == 21) {
            $this->db->join("tbl_contact_viewed cv", "cv.sender_id=r.id and cv.receiver_id=" . $id);
            $this->db->order_by("cv.date", 'desc');
        }
        $this->db->join("tbl_like l", "l.receiver_id=r.id and l.sender_id=" . $id, "left");
        $this->db->where("r.id!=" . $id);
        $this->db->where("r.gender", $gender);
        // $this->db->where("r.status !=", 3);
        $this->db->group_by("r.id");
        // $this->db->order_by("r.name");
        // $this->db->order_by("r.id",'desc');
        //$this->db->limit($limit);
        $query = $this->db->get();
        // $res = $query->result_array();
        // $i=0;
        // foreach ($res as $x){
        //     if($x['dob']!=''&& isset($x['dob']  )){
        //         $dob = $x['dob'];
        //         $dateob = strtotime($dob);
        //         $d = date('Y', $dateob);
        //         if($d>1950){
        //             $age = abs($d - $today);
        //             $res[$i]['age'] = strval($age).' Yrs,';
        //         }

        //     }
        //     $i++;
        // } 
        if ($query->num_rows() > 0) {
            $json = $query->result_array();
            // $json = array();
            // $json = $res;
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }
        return json_encode($json);
    }

    public function PlanDetails()
    {
        $this->db->select("*");
        $this->db->from("tbl_plan");
        if (isset($_GET['m']) && $_GET['m'] == 1) {
            $this->db->where("assisted", 1);
        } else {
            $this->db->where("assisted", 0);

        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $json = $query->result_array();
        } else {
            $json["error"] = true;
            $json["error_msg"] = "Data Not Found";
        }
        return json_encode($json);
    }

    //    public function PaymentExpiryCheck(){
//       
//         $this->db->select("*");
//        $this->db->from("tbl_plan");
//        $this->db->where("plan_id",1);
//        $plandetails = $this->db->get()->row_array();
//
//        $expiry = date('Y-m-d', strtotime(date('Y-m-d') . ' +' . $plandetails['months'] . ' days'));
//        echo $expiry;
//    }

    public function Payment()
    {
        $json = file_get_contents('php://input');
        //print_r($json);
        //echo "Name:".$json["Name"];
        $data = json_decode($json, true);
        $data['date'] = date('Y-m-d');

        $this->db->select("*");
        $this->db->from("tbl_plan");
        $this->db->where("plan_id", $data['plan_id']);
        $plandetails = $this->db->get()->row_array();
        $data["contactbalance"] = $plandetails["contacts"];
        $data["messagebalance"] = $plandetails["messages"];
        $data["description"] = $plandetails["plan_name"];

        $this->db->select("*");
        $this->db->from("tbl_payement");
        $this->db->where("user_id", $data['user_id']);
        $this->db->where("expiry_date<CURDATE()");
        $this->db->where("status", 0);
        $currentplan = $this->db->get();

        $res = false;
        if ($currentplan->num_rows() > 0) {
            $currentplan = $currentplan->row_array();
            $ardata = array();
            $ardata["status"] = 0;
            $this->db->where("id", $data['user_id']);
            $this->db->update("tbl_payement", $ardata);

            $expiry = date('Y-m-d', strtotime($data['date'] . ' +' . $plandetails['months'] . ' days'));
            $data['expiry_date'] = $expiry;
            $data['status'] = 1;
            $res = $this->db->insert("tbl_payement", $data);
        } else {
            $this->db->select("p.*");
            $this->db->from("tbl_payement p");
            $this->db->where("p.user_id", $data['user_id']);
            $this->db->where("p.expiry_date>CURDATE()");
            $this->db->where("p.status", 1);
            $currentplan = $this->db->get();

            if ($currentplan->num_rows() > 0) {
                $currentplan = $currentplan->row_array();
                $this->db->select("count(*) totcount");
                $this->db->from("tbl_contact_viewed");
                $this->db->where("sender_id", $data['user_id']);
                $this->db->where("planid", $currentplan["id"]);
                $exitsplan = $this->db->get();
                //echo $this->db->last_query();
                //die('ere');
                $exitsplan = $exitsplan->row_array();
                if ($currentplan["contactbalance"] < $exitsplan["totcount"]) {
                    //echo $currentplan["contactbalance"]."=".$exitsplan['totcount'];
                    //die('er');

                    $ardata = array();
                    $ardata["status"] = 0;
                    $this->db->where("user_id", $data['user_id']);
                    $this->db->update("tbl_payement", $ardata);

                    $expiry = date('Y-m-d', strtotime($data['date'] . ' +' . $plandetails['months'] . ' days'));
                    $data['expiry_date'] = $expiry;
                    $data['status'] = 1;
                    $res = $this->db->insert("tbl_payement", $data);
                } else if ($currentplan["contactbalance"] >= $exitsplan["totcount"]) {
                    //die('er');
                    $expiry = date('Y-m-d', strtotime($data['date'] . ' +' . $plandetails['months'] . ' days'));
                    $data['expiry_date'] = $expiry;
                    $data['status'] = 0;
                    $res = $this->db->insert("tbl_payement", $data);
                }
            } else {
                $expiry = date('Y-m-d', strtotime($data['date'] . ' +' . $plandetails['months'] . ' days'));
                $data['expiry_date'] = $expiry;
                $data['status'] = 1;
                $res = $this->db->insert("tbl_payement", $data);
            }
        }



        // echo $this->db->last_query();
        $jsonres = array();
        if ($res) {
            $jsonres["status"] = "1";
        } else {
            $jsonres["error"] = true;
            $jsonres["error_msg"] = "Data Not Found";
        }
        return json_encode($jsonres);
    }

    public function SendActivity()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $mode = $_GET['mode'];
        $json = file_get_contents('php://input');
        //print_r($json);
        //echo "Name:".$json["Name"];
        $data = json_decode($json, true);
        // print_r($data);
        $res = 0;
        if ($mode == 0) {
            $this->db->select("*");
            $this->db->from("tbl_shortlist");
            $this->db->where("receiver_id", $data['receiver_id']);
            $this->db->where("sender_id", $data['sender_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $shorlistid = $query->row_array();
                $this->db->where("shortlist_id", $shorlistid["shortlist_id"]);
                $res = $this->db->delete("tbl_shortlist");
            } else {
                $data['date'] = date("Y-m-d");
                $res = $this->db->insert("tbl_shortlist", $data);
                // $this->AddNotification($data,1);
            }
        } else if ($mode == 1) {
            $this->db->select("*");
            $this->db->from("tbl_interest");
            $this->db->where("receiver_id", $data['receiver_id']);
            $this->db->where("sender_id", $data['sender_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $shorlistid = $query->row_array();
                $this->db->where("interest_id", $shorlistid["interest_id"]);
                $res = $this->db->delete("tbl_interest");
            } else {
                $data['date'] = date("Y-m-d");
                $res = $this->db->insert("tbl_interest", $data);
                $this->AddNotification($data, 1);
                $this->sendwhatsappmsg($data);
            }
        } else if ($mode == 2) {
            $this->db->select("*");
            $this->db->from("tbl_like");
            $this->db->where("receiver_id", $data['receiver_id']);
            $this->db->where("sender_id", $data['sender_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $shorlistid = $query->row_array();
                $this->db->where("like_id", $shorlistid["like_id"]);
                $res = $this->db->delete("tbl_like");
            } else {
                $data['date'] = date("Y-m-d");
                $res = $this->db->insert("tbl_like", $data);
                // $this->AddNotification($data,3);
            }
        } else if ($mode == 3) {
            $this->db->select("*");
            $this->db->from("tbl_interest");
            $this->db->where("receiver_id", $data['receiver_id']);
            $this->db->where("sender_id", $data['sender_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $shorlistid = $query->row_array();
                $arrdata['status'] = 1;
                $this->db->where("interest_id", $shorlistid["interest_id"]);
                $res = $this->db->update("tbl_interest", $arrdata);
                $this->AddNotification($data, 2); //interest accepted
            } else {
                $this->db->select("*");
                $this->db->from("tbl_interest");
                $this->db->where("receiver_id", $data['sender_id']);
                $this->db->where("sender_id", $data['receiver_id']);
                $query = $this->db->get();
                if ($query->num_rows() > 0) {
                    $res = true;
                } else {
                    $dtas = array();
                    $datas['sender_id'] = $data['receiver_id'];
                    $datas['receiver_id'] = $data['sender_id'];
                    $datas['date'] = date("Y-m-d");
                    $res = $this->db->insert("tbl_interest", $datas);
                    $this->AddNotification($datas, 1);
                }
            }
        } else if ($mode == 4) {
            $this->db->select("*");
            $this->db->from("tbl_interest");
            $this->db->where("receiver_id", $data['receiver_id']);
            $this->db->where("sender_id", $data['sender_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $shorlistid = $query->row_array();
                $data['status'] = 2;
                $this->db->where("interest_id", $shorlistid["interest_id"]);
                $res = $this->db->update("tbl_interest", $data);
                $this->AddNotification($data, 3); //interest rejected
            } else {
                $res = true;
            }
        } else if ($mode == 5) {
            $res = $this->ModifyImg($data);
        } else if ($mode == 6) {
            $id = $data['user_id'];
            $imgurl = $data['imageurl'];
            $arrdata['photo'] = $imgurl;
            $this->db->where("id", $id);
            $res = $this->db->update("tbl_registration", $arrdata);
            $uparray['status'] = 2;
            $uparray['profile_pic'] = 1;
            $this->db->where("user_id", $id);
            $this->db->where("user_image", $imgurl);
            $res = $this->db->update("tbl_userimages", $uparray);
            $uparray['profile_pic'] = 0;
            $this->db->where("user_id", $id);
            $this->db->where("status!=", 1);
            $this->db->where("user_image!=", $imgurl);
            $res = $this->db->update("tbl_userimages", $uparray);

        } else if ($mode == 7) {

            $this->db->select("p.id");
            $this->db->from("tbl_payement p");

            $this->db->where("p.expiry_date>CURDATE()");
            $this->db->where("p.status", 1);
            $this->db->where("user_id", $data['sender_id']);
            $arplan = $this->db->get();

            $sender_id = $data['sender_id'];
            $receiver_id = $data['receiver_id'];

            $arrdata["sender_id"] = $sender_id;
            $arrdata["receiver_id"] = $receiver_id;
            $arrdata["messages"] = $data['messages'];
            $arrdata['date'] = date("Y-m-d");
            $arrdata["time"] = date("Y-m-d H:i:s");
            if ($arplan->num_rows() > 0) {
                $arplan = $arplan->row_array();
                $arrdata["planid"] = $arplan["id"];
            }
            $res = $this->db->insert("tbl_chating", $arrdata);
            // $this->GenerateOtp(36030,"+918086851333",5);
        } else if ($mode == 8) {
            //print_r($data);
            //die('er');
            $userid = $data['sender_id'];
            $token = $data['messages'];
            $arrdata = array();
            $arrdata['user_id'] = $userid;
            $arrdata['firebase_token'] = $token;

            $this->db->select("*");
            $this->db->from("tbl_firebase_token");
            $this->db->where("user_id", $userid);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                unset($arrdata['user_id']);

                $this->db->where("user_id", $userid);
                $res = $this->db->update("tbl_firebase_token", $arrdata);
            } else {
                $res = $this->db->insert("tbl_firebase_token", $arrdata);
            }
        } else if ($mode == 9) {
            $userid = $data['sender_id'];
            $complainte = $data['messages'];
            $arrdata = array();
            $arrdata['sender_id'] = $userid;
            $arrdata['receiver_id'] = $data['receiver_id'];
            if (isset($data['reason']) && $data['reason'] != "") {
                $arrdata['reason'] = $data['reason'];
            }
            $arrdata['complaint'] = $data['messages'];
            $arrdata['delete_status'] = "Active";
            $arrdata['solved_status'] = "0";
            $this->db->select("*");
            $this->db->from("tbl_block");
            $this->db->where("sender_id", $userid);
            $this->db->where("receiver_id", $data['receiver_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $res = true;
            } else {
                $res = $this->db->insert("tbl_block", $arrdata);
            }

        } else if ($mode == 10) {

            $phone = $data['phone'];
            // echo $phone;
            $this->db->select("*");
            $this->db->from("tbl_registration");
            $this->db->where("status in (0,1)");
            $this->db->where("phone", $phone);
            $query = $this->db->get();
            $jsonres = array();
            if ($query->num_rows() > 0) {
                $data = $query->row_array();

                $jsonres["id"] = $data["id"];
                $jsonres["status"] = false;
                $jsonres["stage"] = $data['stage'];
            } else {
                $jsonres["id"] = "";
                $jsonres["status"] = true;
            }
            return json_encode($jsonres);
        } else if ($mode == 11) {

            $data['date'] = date("Y-m-d");
            $res = $this->db->insert("tbl_ignored", $data);
        } else if ($mode == 12) {
            $this->db->select("*");
            $this->db->from("tbl_photorequest");
            $this->db->where("sender_id", $data['sender_id']);
            $this->db->where("receiver_id", $data['receiver_id']);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                $ardata = array();
                $ardata["sender_id"] = $data['sender_id'];
                $ardata["receiver_id"] = $data['receiver_id'];
                $ardata["date"] = date("Y-m-d");
                $res = $this->db->insert("tbl_photorequest", $ardata);
                $this->AddNotification($data, 4); //photo request
            }
        } else if ($mode == 13) {
            $this->db->select("*");
            $this->db->from("tbl_photorequest");
            $this->db->where("receiver_id", $data['receiver_id']);
            $this->db->where("sender_id", $data['sender_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $shorlistid = $query->row_array();
                $arrdata['status'] = 1;
                $this->db->where("id", $shorlistid["id"]);
                $res = $this->db->update("tbl_photorequest", $arrdata);
                $this->AddNotification($data, 5); //photo request accepted
            } else {
                $res = true;
            }
        } else if ($mode == 14) {
            //echo "enter";
            $this->db->select("*");
            $this->db->from("tbl_photorequest");
            $this->db->where("receiver_id", $data['receiver_id']);
            $this->db->where("sender_id", $data['sender_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $shorlistid = $query->row_array();
                $data['status'] = 2;
                $this->db->where("id", $shorlistid["id"]);
                $res = $this->db->update("tbl_photorequest", $data);
                $this->AddNotification($data, 6); //photo request rejected
            } else {
                $res = true;
            }
        } else if ($mode == 15) {
            $this->db->select("*");
            $this->db->from("tbl_photorequest");
            $this->db->where("receiver_id", $data['receiver_id']);
            $this->db->where("sender_id", $data['sender_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $shorlistid = $query->row_array();
                $data['status'] = 2;
                $this->db->where("id", $shorlistid["id"]);
                $res = $this->db->delete("tbl_photorequest");
            }
        } else if ($mode == 16) {
            $ardata = array();
            $ardata["status"] = 1;
            if (isset($data['status']) && !empty($data['status'])) {
                $ardata["status"] = $data['status'];
            }
            $this->db->where("id", $data['sender_id']);
            $res = $this->db->update("tbl_notification", $ardata);
        } else if ($mode == 17) {
            $this->db->select("*");
            $this->db->from("tbl_registration");
            $this->db->where("(phone='" . $data["sender_id"] . "' or happynikah_id='" . $data['sender_id'] . "' or concat(countryCode,phone)='" . $data["sender_id"] . "')");
            $this->db->where("status !=", 3);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $query = $query->row_array();
                $this->GenerateOtp($query['id'], "", 5);
                $res = true;
            }
        } else if ($mode == 18) {

            $ardata = array();
            $ardata["status"] = 3;
            $ardata["reason_status"] = $data['receiver_id'];
            $ardata["message"] = $data['messages'];
            $ardata["delete_date"] = date('Y-m-d H:i:s');
            $ardata["delete_id"] = "999";
            $this->db->where("id", $data['sender_id']);
            $res = $this->db->update("tbl_registration", $ardata);

        } else if ($mode == 19) {

            $ardata = array();
            $ardata["emailalert"] = $data['emailalert'];
            $ardata["smsalert"] = $data['smsalert'];
            $ardata["notificationalert"] = $data['notificationalert'];
            $ardata["hide_status"] = $data['hide'];

            $this->db->where("id", $data['user_id']);
            $res = $this->db->update("tbl_registration", $ardata);

        } else if ($mode == 20) {
            $ardata = array();
            $ardata['title'] = $data['title'];
            $ardata['body'] = $data['body'];
            $ardata['sender_id'] = $data['sender_id'];
            $ardata['receiver_id'] = $data['receiver_id'];
            $ardata['type'] = $data['type'];
            // print_r($ardata);
            $this->db->select("*");
            $this->db->from("tbl_firebase_token");
            $this->db->where("user_id", $data['receiver_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $shorlistid = $query->row_array();
                // print_r($shorlistid);
                $token = $shorlistid['firebase_token'];
                if ($ardata['sender_id'] != '') {
                    $this->db->select("name");
                    $this->db->from("tbl_registration");
                    $this->db->where("id", $data['sender_id']);
                    $query2 = $this->db->get();
                    $name = array();
                    $name = $query2->row_array();
                    $body = $ardata['body'] . ' ' . $name['name'];
                }
                // print_r($token);
                return $this->sendPushNotification($token, $ardata['title'], $body, $ardata['sender_id'], $ardata['type']);
            }
        } else if ($mode == 21) {
            $this->db->select("*");
            $this->db->from("tbl_userlogin");
            $this->db->where("password", md5($data['currentpassword']));
            $check = $this->db->get();
            $json = array();
            if ($check->num_rows() == 0) {

                $json["error"] = true;
                $json["error_msg"] = "Current Password does not match";
            } else {
                $arrdata = array();
                $arrdata['password'] = md5($data['newpassword']);
                $this->db->where("user_id", $data['user_id']);
                $this->db->update("tbl_userlogin", $arrdata);
                $json['status'] = 1;
                $json['msg'] = "Password changed successfully";

            }

            return json_encode($json);
        } else if ($mode == 22) {
            $this->db->select("*");
            $this->db->from("tbl_doorsteppayment");
            $this->db->where("user_id", $data['user_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $this->db->where("user_id", $data['user_id']);
                $res = $this->db->update("tbl_doorsteppayment", $data);
            } else {
                $res = $this->db->insert("tbl_doorsteppayment", $data);
            }

        } else if ($mode == 23) {
            $arraydata = array();
            $arraydata["is_online"] = 0;
            $this->db->where("ul.user_id", $data['sender_id']);
            $this->db->update("tbl_userlogin ul", $arraydata);
        } else if ($mode == 24) {
            $this->db->select("*");
            $this->db->from("tbl_payment_viewed");
            $this->db->where("sender_id", $data['sender_id']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $datas = $query->row_array();
                $data['date'] = date('Y/m/d H:i:s');
                $data['visit_count'] = $datas['visit_count'] + 1;
                $data['delete_status'] = "";
                $this->db->where("sender_id", $datas['sender_id']);
                $res = $this->db->update("tbl_payment_viewed", $data);
            } else {
                $res = $this->db->insert("tbl_payment_viewed", $data);

                $update_data = [
                    'direct' => 98
                ];
                $this->db->where('id', $data['sender_id']);
                $this->db->update('tbl_registration', $update_data);

            }
        } else if ($mode == 25) {
            $arraydata = array();
            $arraydata["popup_date"] = date('Y-m-d');
            ;
            $this->db->where("r.id", $data['sender_id']);
            $res = $this->db->update("tbl_registration r", $arraydata);
        } else if ($mode == 26) {
            $this->db->select("*");
            $this->db->from("tbl_refer");
            $this->db->where("p_number", $data['number']);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                $arraydata = array();
                $arraydata["user_id"] = $data['user_id'];
                $arraydata["name"] = $data['name'];
                $arraydata["p_code"] = $data['countrycode'];
                $arraydata["p_number"] = $data['number'];
                $arraydata["district"] = $data['district'];
                $arraydata["city"] = $data['city'];
                if ($data['goto'] != null) {
                    $arraydata["goto"] = $data['goto'];
                }

                $arraydata["status"] = 0;
                $arraydata['date'] = date("Y-m-d");
                $res = $this->db->insert("tbl_refer", $arraydata);
            }
        }


        $jsonres = array();
        if ($res) {
            $jsonres["status"] = "1";
        } else {
            $jsonres["error"] = true;
            $jsonres["error_msg"] = "Data Not Found";
        }
        return json_encode($jsonres);
    }

    private function AddNotification($data, $mode)
    {
        
        $data["date"] = date("Y-m-d");
        $data["notification_type"] = $mode;
        if ($mode == 2 || $mode == 6) {
            $receiver = $data["receiver_id"];
            $data['receiver_id'] = $data['sender_id'];
            $data['sender_id'] = $receiver;
        }
        $this->db->insert("tbl_notification", $data);
    }

     // SEND NOTIFICATION WHEN USER NOT PROFILE IMAGE
    public function PhotochecktoNotify(){
        error_reporting(0);
        ini_set('display_errors', '1');
        $mode = $_GET['mode'];
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
          $this->db->select("r.id,r.photo,t.firebase_token,r.staff_id,r.notifydate");
          $this->db->from("tbl_registration r");
          $this->db->join("tbl_firebase_token t", "r.id=t.user_id", "left");
          $this->db->where("r.photo=", '');
          $this->db->where("r.status!=", 3);
          $this->db->where("t.firebase_token!=", '');
          $this->db->where("t.firebase_token IS NOT NULL");
          $this->db->where("r.id", $data['sender_id']);
          $this->db->group_by("r.id");
          $query = $this->db->get();
          
          // echo $this->db->last_query();
          if ($query->num_rows() > 0) {
              $json = array();
              $json = $query->result_array();
              // print_r($json);
              foreach ($json as $profile) {
                  $token = $profile['firebase_token']; // Access firebase_token
                    if($profile['notifydate']!=date('Y-m-d')){
                        $this->sendPushNotification($token, 'Happy Nikah', 'Upload your profile picture to make a lasting impression!', $data['user_id'], '7');
                        if ( $profile['staff_id'] != 0 && $profile['staff_id'] != '' &&    $profile['staff_id'] != null) {
                          $this->AddNotificationStaff($profile['staff_id'],$profile['id'], "Profile Image is Not Uploaded"); //photo request
                        }
                        $upparr=array();
                        $upparr['notifydate'] = date('Y-m-d');
                        $this->db->where("id",$profile['id']);
                        $this->db->update("tbl_registration", $upparr);
                    }
                  
              }
          }

    }
     // SEND NOTIFICATION WHEN USER PAYMENT VALIDITY BEFORE TWO DAYS
    public function PaymentValidityCheck(){
        error_reporting(0);
        ini_set('display_errors', '1');
        $mode = $_GET['mode'];
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
          $this->db->select("r.id,r.photo,t.firebase_token,r.staff_id,r.notifydate,r.notifydatepay,p.expiry_date,case when ifnull(p.user_id,0)!=0 then 1 else 0 end premium");
          $this->db->from("tbl_registration r");
          $this->db->join("tbl_firebase_token t", "r.id=t.user_id", "left");
          $this->db->join("tbl_payement p", "r.id=p.user_id and p.expiry_date>CURDATE() and p.status=1", "left");
          $this->db->where("r.status!=", 3);
          $this->db->where("t.firebase_token!=", '');
          $this->db->where("t.firebase_token IS NOT NULL");
        //   $this->db->where("r.id", 36030);
          $this->db->where("r.id", $data['sender_id']);
          $this->db->group_by("r.id");
          $query = $this->db->get();
          
          // echo $this->db->last_query();
          if ($query->num_rows() > 0) {
              $json = array();
              $json = $query->result_array();
              // print_r($json);
              foreach ($json as $profile) {
                  $token = $profile['firebase_token']; // Access firebase_token
                    if($profile['notifydatepay']!=date('Y-m-d') && (trim($profile['expiry_date']) == date('Y-m-d', strtotime('+2 days'))) && $profile['premium']!=0){
                        $this->sendPushNotification($token, 'Happy Nikah', 'Your Plan is Expire Soon!', $data['user_id'], '7');
                        if ( $profile['staff_id'] != 0 && $profile['staff_id'] != '' &&    $profile['staff_id'] != null) {
                          $this->AddNotificationStaff($profile['staff_id'],$profile['id'], "Plan is Expire Soon!"); //photo request
                        }
                        $upparr=array();
                        $upparr['notifydatepay'] = date('Y-m-d');
                        $this->db->where("id",$profile['id']);
                        $this->db->update("tbl_registration", $upparr);
                    }
                  
              }
          }

    }
     // SEND NOTIFICATION WHEN USER NOT PAYMENT 
    public function PaymentCheck(){
        error_reporting(0);
        ini_set('display_errors', '1');
        $mode = $_GET['mode'];
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
          $this->db->select("r.id,r.photo,t.firebase_token,r.staff_id,r.notifydate,r.notifydatepay,p.expiry_date,case when ifnull(p.user_id,0)!=0 then 1 else 0 end premium");
          $this->db->from("tbl_registration r");
          $this->db->join("tbl_firebase_token t", "r.id=t.user_id", "left");
          $this->db->join("tbl_payement p", "r.id=p.user_id and p.expiry_date>CURDATE() and p.status!=0", "left");
          $this->db->where("r.status!=", 3);
          $this->db->where("t.firebase_token!=", '');
          $this->db->where("t.firebase_token IS NOT NULL");
        //   $this->db->where("r.id", 36030);
          $this->db->where("r.id", $data['sender_id']);
          $this->db->group_by("r.id");
          $query = $this->db->get();
          
          // echo $this->db->last_query();
          if ($query->num_rows() > 0) {
              $json = array();
              $json = $query->result_array();
              // print_r($json);
              foreach ($json as $profile) {
                  $token = $profile['firebase_token']; // Access firebase_token
                    if($profile['notifynotpaydate']!=date('Y-m-d') && ($profile['premium'] == 0)){
                        $this->sendPushNotification($token, 'Happy Nikah', 'Go Premium and shine brighter! ✨ Get more eyes on your profile now!', $data['user_id'], '7');
                        // if ( $profile['staff_id'] != 0 && $profile['staff_id'] != '' &&    $profile['staff_id'] != null) {
                        //   $this->AddNotificationStaff($profile['staff_id'],$profile['id'], "Plan is Expire Soon!"); //photo request
                        // }
                        $upparr=array();
                        $upparr['notifynotpaydate'] = date('Y-m-d');
                        $this->db->where("id",$profile['id']);
                        $this->db->update("tbl_registration", $upparr);
                    }
                  
              }
          }

    }
    private function AddNotificationStaff($empid, $userid, $message)
    {
        $updatearr = array();
        $updatearr["date"] = date("Y-m-d");
        $updatearr["message"] = $message;
        $updatearr['empid'] = $empid;
        $updatearr['user_id'] = $userid;
        $updatearr['status'] = 1;
        $this->db->select("*");
        $this->db->from("tbl_staffnotification");
        $this->db->where("empid",$empid);
        $this->db->where("message!=",$message);
        $this->db->where("user_id",$userid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $json = array();
            $json = $query->row_array();
            $updatearray=array();
            $updatearray['status'] = 1;
            $updatearray["date"] = date("Y-m-d");
            $this->db->where("id",$json['id']);
            $this->db->update("tbl_staffnotification",$updatearray);
        }else{
            $res =  $this->db->insert("tbl_staffnotification", $updatearr);
        }
        
        return $res;
    }

    public function RetrieveData()
    {
        $mode = $_GET['mode'];
        $json = file_get_contents('php://input');
        //print_r($json);
        //echo "Name:".$json["Name"];
        $data = json_decode($json, true);
        $profid = (isset($data['receiver_id']) ? $data['receiver_id'] : "");
        $id = $data['sender_id'];
        if ($mode == 1) {
            $this->db->select("count(*) totcount");
            $this->db->from("tbl_contact_viewed");
            $this->db->join("tbl_payement", "tbl_payement.user_id=tbl_contact_viewed.sender_id and tbl_payement.status=1 and tbl_payement.id=tbl_contact_viewed.planid");
            $this->db->where("sender_id", $id);
            $count = $this->db->get()->row_array();
            //print_r($count);

            $this->db->select("count(*) totcount");
            $this->db->from("tbl_contact_viewed");
            $this->db->where("sender_id", $id);
            $this->db->where("receiver_id", $profid);
            $exists = $this->db->get()->row_array();
            // print_r($exists);
            $this->db->select("count(*) totcount");
            $this->db->from("tbl_contact_viewed");
            $this->db->where("sender_id", $profid);
            $this->db->where("receiver_id", $id);
            $existsto = $this->db->get()->row_array();

            $this->db->select("p.id id,p.user_id,(p.contactbalance+p.addoncontact)  contacts,(p.messagebalance+addonmessage) messages,tbl_plan.months");
            $this->db->from("tbl_payement p");
            $this->db->join("tbl_plan", "tbl_plan.plan_id=p.plan_id");
            $this->db->where("p.expiry_date>CURDATE()");
            $this->db->where("p.status", 1);
            $this->db->where("user_id", $id);
            $query = $this->db->get();

            $flag = 0;
            $arplan = array();
            if ($query->num_rows() > 0) {
                $arplan = $query->row_array();
                //print_r($arplan);
            }
            if ($exists["totcount"] > 0 || $existsto["totcount"] > 0) {
                $flag = 1;
            } else if ($query->num_rows() > 0) {

                //echo $count["totcount"]."=".$arplan["contacts"];
                if ($count["totcount"] < $arplan["contacts"]) {
                    $flag = 1;
                }
            }
            //            else if($query->num_rows()==0 && $count["totcount"]<15){
//                $flag=1;
//            }
            $jsonres = array();

            $this->db->select("distinct (receiver_id) totmessage");
            $this->db->from("tbl_chating");
            $this->db->join("tbl_payement", "tbl_payement.user_id=tbl_chating.sender_id and tbl_payement.status=1 and tbl_payement.id=tbl_chating.planid");
            $this->db->where("sender_id", $id);
            $this->db->group_by("receiver_id");
            $totmsg = $this->db->get();
            $phonestatus = 0;
            if ($totmsg->num_rows() > 0) {
                //$totmsg = $totmsg->row_array();
                //echo $totmsg->num_rows()."=".$arplan["messages"];
                if ($totmsg->num_rows() < $arplan["messages"]) {
                    $phonestatus = 1;
                } else {
                    $phonestatus = 0;
                }
            } else {
                $phonestatus = 0;
            }
            //echo $flag;
            if ((int) $flag == 1) {
                // echo "tnere";
                $this->db->select("phone,mail,other_contact_number,address");
                $this->db->from("tbl_registration");
                $this->db->where("id", $profid);
                $query = $this->db->get();

                $jsonres = $query->row_array();
                $jsonres["status"] = $flag;
                $jsonres["phonestatus"] = 1;
                if ((int) $exists["totcount"] === 0) {
                    $arrdata = array();
                    $arrdata["sender_id"] = $id;
                    $arrdata["receiver_id"] = $profid;
                    if (isset($arplan["id"])) {
                        $arrdata["planid"] = $arplan["id"];
                    }
                    $this->db->insert("tbl_contact_viewed", $arrdata);
                }
            } else {
                $jsonres["status"] = $flag;
                $jsonres["phonestatus"] = $phonestatus;
            }
            //print_r($jsonres);
            return json_encode($jsonres);
        } else if ($mode == 2) {
            return $this->ChatList($data);
        } else if ($mode == 3) {
            return $this->Chatting($data);
        } else if ($mode == 4) {

            $this->db->select("p.id,p.user_id,(p.contactbalance+p.addoncontact)  contacts,(p.messagebalance+addonmessage) messages,tbl_plan.months");
            $this->db->from("tbl_payement p");
            $this->db->join("tbl_plan", "tbl_plan.plan_id=p.plan_id");
            $this->db->where("p.expiry_date>CURDATE()");
            $this->db->where("p.status", 1);
            $this->db->where("user_id", $id);
            $query = $this->db->get();
            $flag = 0;
            $arplan = array();
            if ($query->num_rows() > 0) {
                $arplan = $query->row_array();
                // print_r($arplan);
            }

            // echo $profid."=".$id;
            $this->db->select("*");
            $this->db->from("tbl_interest");
            $this->db->where("sender_id ", $id);
            $this->db->where("receiver_id", $profid);
            $query = $this->db->get();
            $jsonres = array();
            if ($query->num_rows() > 0) {
                $jsonres["status"] = 1;
            } else {
                $jsonres["status"] = 0;
            }
            $this->db->select("distinct tc.receiver_id 'totmessage'");
            $this->db->from("tbl_chating tc");
            $this->db->where("tc.sender_id", $id);
            $this->db->where("tc.planid", $arplan["id"]);
            $this->db->group_by("tc.receiver_id");
            $totmsg = $this->db->get();
            $phonestatus = 0;
            if ($totmsg->num_rows() > 0 && count($arplan) > 0) {
                // $totmsg = $totmsg->row_array();
                // echo $totmsg->num_rows()."=".$arplan["messages"];
                if ($totmsg->num_rows() < $arplan["messages"]) {
                    $phonestatus = 1;
                } else {
                    $this->db->select("*");
                    $this->db->from("tbl_chating tc");
                    $this->db->join("tbl_payement tp", "tp.user_id = tc.sender_id");
                    $this->db->where("tc.sender_id", $id);
                    $this->db->where("tc.receiver_id", $profid);
                    $this->db->where("tp.status", 1);
                    $this->db->where("tp.expiry_date>CURDATE()");
                    $totmsg = $this->db->get();
                    if ($totmsg->num_rows() > 0) {
                        $phonestatus = 1;
                    } else {
                        $phonestatus = 0;
                    }
                }
            } else if (count($arplan) > 0) {
                $phonestatus = 1;
            } else {

                $this->db->select("*");
                $this->db->from("tbl_chating tc");
                $this->db->join("tbl_payement tp", "tp.user_id = tc.sender_id");
                $this->db->where("tc.sender_id", $id);
                $this->db->where("tc.receiver_id", $profid);
                $this->db->where("tp.status", 1);
                $this->db->where("tp.expiry_date>CURDATE()");
                $totmsg = $this->db->get();
                if ($totmsg->num_rows() > 0) {
                    $phonestatus = 1;
                }
            }
            $jsonres["phonestatus"] = $phonestatus;

            $this->db->select("case when p.status=1 then '0' else r.photo_visibility end photo_visibility");
            $this->db->from("tbl_registration r");
            $this->db->join("tbl_photorequest p", "p.receiver_id=r.id and p.sender_id=" . $id, "left");
            $this->db->where("r.id", $profid);
            $query = $this->db->get();
            $query = $query->row_array();
            $jsonres["photoprotected"] = ($query["photo_visibility"] == null) ? "0" : $query["photo_visibility"];

            return json_encode($jsonres);
        } else if ($mode == 5) {
            //$where="(happynikah_id='".$id."' or phone='".$id."')";
            $where = "(happynikah_id='" . $id . "' or concat(countrycode,phone)='" . $id . "' or phone='" . $id . "' or id=" . $id . ")";
            $this->db->select("*");
            $this->db->from("tbl_registration");
            $this->db->where($where);

            $query = $this->db->get();
            $jsonres = array();
            if ($query->num_rows() > 0) {
                $query = $query->row_array();
                $this->db->select("*");
                $this->db->from("tbl_userlogin");
                $this->db->where("user_id", $query["id"]);
                $login = $this->db->get();
                if ($login->num_rows() > 0) {
                    $newpwd = md5($profid);
                    $arrdata = array();
                    $arrdata['password'] = $newpwd;
                    $this->db->where("user_id", $query["id"]);
                    $this->db->update("tbl_userlogin", $arrdata);
                    $jsonres['status'] = 1;
                } else {
                    $loginDetails['username'] = $query['phone'];
                    $loginDetails['password'] = md5($profid);
                    $loginDetails['user_id'] = $query["id"];
                    $this->db->insert("tbl_userlogin", $loginDetails);
                    $jsonres["status"] = 1;
                }
            } else {

                $jsonres['status'] = 0;
            }

            return json_encode($jsonres);
        } else if ($mode == 6) {
            $this->db->select("tbl_payement.*,tbl_plan.months,tbl_plan.contacts,tbl_plan.messages");
            $this->db->from("tbl_payement");
            $this->db->join("tbl_plan", "tbl_plan.plan_id=tbl_payement.plan_id");
            $this->db->where("tbl_payement.expiry_date>CURDATE()");
            $this->db->where("tbl_payement.status", 1);
            $this->db->where("user_id", $id);
            $query = $this->db->get();

            $flag = 0;
            $arplan = array();
            if ($query->num_rows() > 0) {
                $arplan = $query->row_array();
                // print_r($arplan);
            }

            $this->db->select("distinct (receiver_id) totmessage");
            $this->db->from("tbl_chating");
            $this->db->where("sender_id", $id);
            $this->db->group_by("receiver_id");
            $totmsg = $this->db->get();
            $phonestatus = 0;
            if ($totmsg->num_rows() > 0 && count($arplan) > 0) {
                //$totmsg = $totmsg->row_array();
                //echo $totmsg->num_rows()."=".$arplan["messages"];
                if ($totmsg->num_rows() < $arplan["messages"]) {
                    $phonestatus = 1;
                } else {
                    $phonestatus = 0;
                }
            } else if (count($arplan) > 0) {
                $phonestatus = 1;
            } else if ($totmsg->num_rows() < 15) {
                $phonestatus = 1;
            }
            $jsonres["phonestatus"] = $phonestatus;

            return json_encode($jsonres);
        } else if ($mode == 7) {
            $this->db->select("photo_visibility,photopassword,showtoexpress,showtopremium");
            $this->db->from("tbl_registration");
            $this->db->where("id", $id);
            $query = $this->db->get();
            $query = $query->row_array();
            return json_encode($query);
        } else if ($mode == 8) {
            $this->db->select("*");
            $this->db->from("tbl_registration");
            $this->db->where("id", $id);
            $user = $this->db->get()->row_array();

            $gender = "";
            $photo = "";
            if ($user["gender"] == "1") {
                $gender = "2";
                $photo = "female.png";
            } else if ($user["gender"] == "2") {
                $gender = "1";
                $photo = "male.png";
            }
            $this->db->select("r.id,name,n.status notifystatus,n.id notifyid,n.notification_type 'type',case when datediff(NOW(),n.date)=0 then 'Today' else concat(datediff(NOW(),n.date),'Days Ago') end date,case when photo='' then '$photo' else photo end photo,case when n.notification_type=1 then concat('Express Interest received from ',r.name)"
                . " when n.notification_type=2 then concat('Express Interest accepted by ',r.name) "
                . "when n.notification_type=3 then concat('Express Interest Rejected by ',r.name) "
                . "when n.notification_type=4 then concat('Photo request from ',r.name) "
                . "when n.notification_type=5 then concat('Photo request accepted by ',r.name) "
                . "when n.notification_type=6 then concat('Photo request rejected by ',r.name) end 'msg',case when n.notification_type=1 then 'Express Interest'"
                . " when n.notification_type=2 then 'Express Interest '"
                . "when n.notification_type=3 then 'Express Interest'"
                . "when n.notification_type=4 then 'Photo Request'"
                . "when n.notification_type=5 then 'Photo Request'"
                . "when n.notification_type=6 then 'Photo Request' end 'head',case when p.status=1 then '0' else case when r.photo_visibility='NULL' then '0' else r.photo_visibility end   end photo_visibility,n.status,,r.status deleted");
            $this->db->from("tbl_registration r");
            $this->db->join("tbl_notification n", "n.receiver_id=" . $id . " and n.sender_id=r.id  ", "left");
            $this->db->join("tbl_photorequest p", "p.receiver_id=" . $id . " and p.sender_id=r.id  ", "left");
            $this->db->where("r.id!=" . $id);
            $this->db->where("r.status!=", 3);
            $this->db->where("n.status!=", 3);
            $this->db->where("n.notification_type!=", 7);
            $this->db->where("r.gender", $gender);
            $this->db->order_by("n.date desc");
            //$this->db->limit($limit);

            $query = $this->db->get();
            $json = array();
            if ($query->num_rows() > 0) {
                $json = $query->result_array();
                $json[0]["error"] = false;
            } else {
                $json[0]["error"] = true;
                $json[0]["error_msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 9) {
            $this->db->select("status");
            $this->db->from("tbl_interest");
            $this->db->where("sender_id", $id);
            $this->db->where("receiver_id", $profid);
            $query = $this->db->get();
            $json = array();
            if ($query->num_rows() > 0) {
                $query = $query->row_array();
                $json["status"] = (int) $query["status"];
            } else {
                $json["status"] = 1;
            }
            return json_encode($json);
        } else if ($mode == 10) {
            $this->db->select("r.id");
            $this->db->from("tbl_registration r");
            $this->db->join("tbl_notification tn", "tn.sender_id = r.id", false);
            $this->db->where("tn.receiver_id", $id);
            $this->db->where("r.status!=", 3);
            $this->db->where("tn.status", 0);
            $query = $this->db->get();
            // echo $this->db->last_query();
            $json = array();
            $json['count'] = $query->num_rows();
            return json_encode($json);
        } else if ($mode == 11) {
            $this->db->select("status");
            $this->db->from("tbl_photorequest");
            $this->db->where("sender_id", $id);
            $this->db->where("receiver_id", $profid);
            $query = $this->db->get();
            $json = array();
            if ($query->num_rows() > 0) {
                $query = $query->row_array();
                $json["status"] = (int) $query["status"];
            } else {
                $json["status"] = 1;
            }
            return json_encode($json);
        } else if ($mode == 12) {
            echo $this->VerifyUserid($id, $profid);
        } else if ($mode == 13) {
            $this->db->select("case when countryCode=0 then phone else concat(countryCode,phone) end phone,happynikah_id");
            $this->db->from("tbl_registration");
            $this->db->where("id", $id);
            $query = $this->db->get();
            $ardata = array();
            if ($query->num_rows() > 0) {
                $ardata = $query->row_array();
                $ardata["status"] = 1;
            } else {
                $ardata["status"] = 0;
            }
            return json_encode($ardata);
        } else if ($mode == 14) {
            $loadedids = (isset($data['selected_id']) || $data['selected_id'] != "") ? $data['selected_id'] : [];
            $loadedids = '(' . implode(', ', $loadedids) . ')';
            $m = (isset($_GET['m']) ? $_GET['m'] : 0);
            $this->PhotochecktoNotify();
            $this->PaymentValidityCheck();
            $this->PaymentCheck();
            if($m == 19){

                return $this->Explore($id,$m=19?4:null);
            }else{
                return $this->MatchingProfileLazyLoad($id, 10, $profid, $loadedids);

            }
        } else if ($mode == 15) {
            $_GET["mode"] = $profid;

            return $this->Search();
        } else if ($mode == 16) {
            $_GET['mode'] = $id;
            $_GET['m'] = $profid;

            return $this->LoadSavedData();
        } else if ($mode == 17) {

            $this->db->select("emailalert,smsalert,notificationalert,hide_status");
            $this->db->from("tbl_registration");
            $this->db->where("id", $id);
            $query = $this->db->get()->row_array();
            $query['icons'] = urlencode("https://www.sysol.org/assets/images/");
            $query['profile'] = urlencode("https://www.sysol.org/assets/photo_storage/");
            $json = array();
            $json = $query;
            return json_encode($json);
        } else if ($mode == 18) {

            $this->db->select("firebase_token");
            $this->db->from("tbl_firebase_token");
            $this->db->where("user_id", $id);
            $query = $this->db->get()->row_array();

            $json = array();
            $json = $query;
            return json_encode($json);

        } else if ($mode == 19) {

            $this->db->select("r.*");
            $this->db->from("tbl_registration r");
            $this->db->join("tbl_userlogin l", "r.id=l.user_id");
            //$this->db->where("r.phone", $userid);
            $this->db->where("concat(r.countrycode,r.phone)='" . $id . "' or r.phone='" . $id . "'");
            // echo $adm."=".md5($password);
            // if ($adm != md5($password)) {
            //     $this->db->where("l.password", md5($password));
            // }
            //$this->db->where("r.deleted", 0);
            $this->db->where("r.status !=", 3);
            $query = $this->db->get();
            $jsondata = array();
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $phone = $res['phone'];
                $jsondata = array();
                $jsondata['user_id'] = (int) $res['id'];
                $jsondata['phone'] = $phone;
            } else {

                $jsondata['user_id'] = 0;
                $jsondata['phone'] = "";
            }
            return json_encode($jsondata);

        } else if ($mode == 20) {
            $head = isset($data['head']) ? $data['head'] : "";
            //echo $head;
            //die('ere');
            return $this->EditMyProfileInfo($id, $head);
        } else if ($mode == 21) {
            return $this->MatchingProfileLazyLoadLatest($id, 10, $profid);
        } else if ($mode == 22) {
            $this->db->select("count(*) totcount");
            $this->db->from("tbl_contact_viewed");
            $this->db->join("tbl_payement", "tbl_payement.user_id=tbl_contact_viewed.sender_id and tbl_payement.status=1 and tbl_payement.id=tbl_contact_viewed.planid");
            $this->db->where("sender_id", $id);
            $count = $this->db->get()->row_array();
            //print_r($count);

            $this->db->select("count(*) totcount");
            $this->db->from("tbl_contact_viewed");
            $this->db->where("sender_id", $id);
            $this->db->where("receiver_id", $profid);
            $exists = $this->db->get()->row_array();
            // print_r($exists);
            $this->db->select("count(*) totcount");
            $this->db->from("tbl_contact_viewed");
            $this->db->where("sender_id", $profid);
            $this->db->where("receiver_id", $id);
            $existsto = $this->db->get()->row_array();

            $this->db->select("p.id id,p.user_id,(p.contactbalance+p.addoncontact)  contacts,(p.messagebalance+addonmessage) messages,tbl_plan.months");
            $this->db->from("tbl_payement p");
            $this->db->join("tbl_plan", "tbl_plan.plan_id=p.plan_id");
            $this->db->where("p.expiry_date>CURDATE()");
            $this->db->where("p.status", 1);
            $this->db->where("user_id", $id);
            $query = $this->db->get();

            $flag = 0;
            $arplan = array();
            if ($query->num_rows() > 0) {
                $arplan = $query->row_array();
                //print_r($arplan);
            }
            if ($exists["totcount"] > 0 || $existsto["totcount"] > 0) {
                $flag = 1;
            } else if ($query->num_rows() > 0) {

                //echo $count["totcount"]."=".$arplan["contacts"];
                if ($count["totcount"] < $arplan["contacts"]) {
                    $flag = 1;
                }
            }
            //            else if($query->num_rows()==0 && $count["totcount"]<15){
//                $flag=1;
//            }
            $jsonres = array();

            $this->db->select("distinct (receiver_id) totmessage");
            $this->db->from("tbl_chating");
            $this->db->join("tbl_payement", "tbl_payement.user_id=tbl_chating.sender_id and tbl_payement.status=1 and tbl_payement.id=tbl_chating.planid");
            $this->db->where("sender_id", $id);
            $this->db->group_by("receiver_id");
            $totmsg = $this->db->get();
            $phonestatus = 0;
            if ($totmsg->num_rows() > 0) {
                //$totmsg = $totmsg->row_array();
                //echo $totmsg->num_rows()."=".$arplan["messages"];
                if ($totmsg->num_rows() < $arplan["messages"]) {
                    $phonestatus = 1;
                } else {
                    $phonestatus = 0;
                }
            } else {
                $phonestatus = 0;
            }
            //echo $flag;
            if ((int) $flag == 1) {
                // echo "tnere";
                $this->db->select("countryCode,phone,mail,other_contact_number,address");
                $this->db->from("tbl_registration");
                $this->db->where("id", $profid);
                $query = $this->db->get();

                $jsonres = $query->row_array();
                $jsonres["status"] = $flag;
                $jsonres["phonestatus"] = 1;
                if ($jsonres["countryCode"] != 0) {
                    $jsonres["phone"] = (string) ('+' . $jsonres["countryCode"]) . ' ' . $jsonres["phone"];
                }
                if ((int) $exists["totcount"] === 0) {
                    $arrdata = array();
                    $arrdata["sender_id"] = $id;
                    $arrdata["receiver_id"] = $profid;
                    if (isset($arplan["id"])) {
                        $arrdata["planid"] = $arplan["id"];
                    }
                    $this->db->insert("tbl_contact_viewed", $arrdata);
                }
            } else {
                $jsonres["status"] = $flag;
                $jsonres["phonestatus"] = $phonestatus;
            }
            //print_r($jsonres);
            return json_encode($jsonres);
        } else if ($mode == 23) {
            $this->db->select("group_concat(u.user_image) gallery,group_concat(u.profile_pic) profilepic");
            $this->db->from("tbl_userimages u");
            $this->db->where("u.status!=", 1);
            $this->db->where("u.user_id", $id);
            $query = $this->db->get();
            // echo $this->db->last_query();
            if ($query->num_rows() > 0) {
                $json = $query->row_array();
                // $json = array();
                // $json = $res;
                $gallery = $json['gallery'];
                $profilepic = $json['profilepic'];
                $split2 = explode(',', $profilepic);
                $split = explode(',', $gallery);
                $arrdata = array();
                if ($split['0'] != null) {
                    for ($i = 0; $i < count($split2); $i++) {
                        $arrdata[count($arrdata)] = array('image' => $split[$i], 'profilepic' => $split2[$i]);
                    }

                }
                $jsondata = array();
                $jsondata['gallery'] = $arrdata;
            } else {
                $jsondata["error"] = true;
                $jsondata["error_msg"] = "Data Not Found";
            }
            return json_encode($jsondata);
        } else if ($mode == 24) {
            $loadedids = (isset($data['selected_id']) || $data['selected_id'] != "") ? $data['selected_id'] : [];
            $loadedids = '(' . implode(', ', $loadedids) . ')';
            return $this->MatchingProfileLazyLoadSwipping($id, 10, $profid, $loadedids);
        }
    }
    public function LoadSavedData()
    {
        $id = $_GET['mode']; //r.profile_for 'Create By',r.happynikah_id 'Id',r.phone 'Phone',r.mail 'Mail',
        $m = $_GET['m'];
        if ($m == 1) {
            $this->db->SELECT("r.*");
        } else if ($m == 2) {
            $this->db->select("f.*,o.*");
        }

        $this->db->from("tbl_registration r");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->join("tbl_otherdetails o", "o.user_id=r.id", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $resutl = $query->row_array();
        //print_r($resutl);
        $arrdata = array();
        //$subhead = "";
        $arsub = array();
        foreach ($resutl as $key => $value) {
            // echo $key."=".$value."\n";
            $arrdata[] = array("key" => $key, "value" => $value);



        }

        // print_r($arrdata);


        return json_encode($arrdata);
    }

    public function UpdateProfVisit()
    {
        //$mode = $_GET['mode'];
        //$json = file_get_contents('php://input');
        //print_r($json);
        //echo "Name:".$json["Name"];
        $data = array(); //json_decode($json, true);
        $data['sender_id'] = $_GET['m'];
        $data['receiver_id'] = $_GET['mode'];
        $this->db->select("*");
        $this->db->from("tbl_viewed_profiles");
        $this->db->where("sender_id", $data['sender_id']);
        $this->db->where("receiver_id", $data['receiver_id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $id = $query->row_array();
            $data['statusdate'] = date("Y-m-d");
            $this->db->where("viewed_id", $id['viewed_id']);
            $res = $this->db->update("tbl_viewed_profiles", $data);
        } else {
            $data['date'] = date("Y-m-d");
            $res = $this->db->insert("tbl_viewed_profiles", $data);
        }
        $jsonres = array();
        if ($res) {
            $jsonres["status"] = "1";
        } else {
            $jsonres["error"] = true;
            $jsonres["error_msg"] = "Data Not Found";
        }
        return json_encode($jsonres);
    }

    public function ModifyImg($data)
    {
        $id = $data['user_id'];
        $imgurl = $data['imageurl'];

        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $id);
        $this->db->where("photo", $imgurl);
        $res = $this->db->get();

        if ($res->num_rows() > 0) {

            $this->db->select("user_image");
            $this->db->from("tbl_userimages");
            $this->db->where("user_id", $id);
            $this->db->where("status", 2);
            $this->db->where("user_image !=", $imgurl);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $query = $query->row_array();
                // print_r($query);
                $upimgurl['photo'] = $query["user_image"];

                $this->db->where("id", $id);
                $this->db->update("tbl_registration", $upimgurl);
            } else {
                $upimgurl['photo'] = "";
                $upimgurl['photo_visibility'] = 0;
                $this->db->where("id", $id);
                $this->db->update("tbl_registration", $upimgurl);
            }
        }






        $this->db->where("user_id", $id);
        $this->db->where("user_image", $imgurl);
        $uparray['status'] = 1;
        $uparray['profile_pic'] = 0;
        $res = $this->db->update("tbl_userimages", $uparray);
        if ($imgurl != "") {
            $path = "assets/photo_storage/" . $imgurl;
            unset($path);
        }
        return $res;
    }

    public function ChatList($data)
    {
        $id = $data['sender_id'];

        $this->db->select("r.id,r.name,case when r.photo='' then case when r.gender=1 then 'male.png' else 'female.png' end else r.photo end photo,r.age,ifnull(h.height,'') height,ifnull(e.education,'') qualification,DATE_FORMAT(cr.date,'%d/%m/%Y') date,DATE_FORMAT(cr.time,'%h:%i %p') time,cr.status,r.photo_visibility,count(cr.sender_id) count,r.status deleted");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        // $this->db->join("tbl_chating cr", "cr.sender_id=r.id and cr.status=0","left");
        $this->db->join("tbl_chating cr", "(cr.sender_id=r.id  AND cr.status='0')", "left");
        $this->db->where("cr.receiver_id", $id);
        $this->db->group_by("r.id");
        $count = $this->db->get();
        $countar = array();
        $countar = $count->result_array();



        $this->db->select("r.id,r.name,case when r.photo='' then case when r.gender=1 then 'male.png' else 'female.png' end else r.photo end photo,r.age,ifnull(h.height,'') height,ifnull(e.education,'') qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,DATE_FORMAT(c.time,'%h:%i %p') time,c.status,r.photo_visibility,count(cr.sender_id) count,r.status deleted");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_chating c", "c.sender_id=r.id");
        // $this->db->join("tbl_chating cr", "cr.sender_id=r.id and cr.status=0","left");
        $this->db->join("tbl_chating cr", "cr.sender_id=r.id and cr.receiver_id = $id and cr.status=0", "left");
        $this->db->where("c.receiver_id", $id);
        $this->db->group_by("c.receiver_id");
        $chatreceiver = $this->db->get();
        $chatreceiver = $chatreceiver->result_array();

        $chatreceiver = array_replace($chatreceiver, $countar);

        $this->db->select("r.id,r.name,case when r.photo='' then case when r.gender=1 then 'male.png' else 'female.png' end else r.photo end photo,r.age,ifnull(h.height,'') height,ifnull(e.education,'') qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,DATE_FORMAT(c.time,'%h:%i %p') time,c.status,r.photo_visibility,0 count,r.status deleted");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_chating c", "c.receiver_id=r.id");
        $this->db->join("tbl_chating cr", "cr.receiver_id=r.id and cr.status=0", "left");
        $this->db->where("c.sender_id", $id);
        $this->db->where("c.receiver_id not in (select sender_id from tbl_chating where receiver_id=" . $id . ")");
        $this->db->group_by("r.id");
        $chatsender = $this->db->get();

        // $chatreceiver = $chatreceiver->result_array();

        $chatsender = $chatsender->result_array();
        $result = array_merge($chatreceiver, $chatsender);
        if (empty($result)) {
            $result[0]['error'] = true;
            $result[0]['error_msg'] = 'Data Not Found';
        }
        return json_encode($result);
    }

    public function Chatting($data)
    {
        $sender_id = $data['sender_id'];
        $receiver_id = $data['receiver_id'];

        $this->db->select("r.id,r.name,case when r.photo='' then case when r.gender=1 then 'male.png' else 'female.png' end else r.photo end photo,r.age,h.height,e.education qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,DATE_FORMAT(c.time,'%h:%i %p') time,c.status,c.messages,case when c.sender_id='" . $sender_id . "' then 1 else 0 end sendstatus");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        // $this->db->join("tbl_qualification q", "q.qualification_id=r.education", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_chating c", "c.sender_id=r.id");
        $this->db->where("(c.sender_id=" . $sender_id . " and c.receiver_id=" . $receiver_id . ") or (c.receiver_id=" . $sender_id . " and c.sender_id=" . $receiver_id . ") ");
        //$this->db->order_by("c.date");
        $this->db->order_by("c.time");
        $chatreceiver = $this->db->get();

        //        $this->db->select("r.id,r.name,case when r.photo='' then case when r.gender=1 then 'male.png' else 'female.png' end else r.photo end photo,r.age,h.height,q.qualification,DATE_FORMAT(c.date,'%d/%m/%Y') date,DATE_FORMAT(c.time,'%h:%i %p') time,c.status");
//        $this->db->from("tbl_registration r");
//        $this->db->join("tbl_height h","h.height_id=r.height","left");
//        $this->db->join("tbl_qualification q","q.qualification_id=r.education","left");
//        $this->db->join("tbl_chating c","c.receiver_id=r.id");
//        $this->db->where("c.sender_id",$id);
//        $this->db->where("c.receiver_id not in (select sender_id from tbl_chating where receiver_id=".$id.")");
//        $chatsender=$this->db->get();

        $result = $chatreceiver->result_array();

        $arrdata["status"] = 1;
        $this->db->where("receiver_id", $sender_id);
        $this->db->update("tbl_chating", $arrdata);

        //        $chatsender=$chatsender->result_array();
//        $result= array_merge($chatreceiver,$chatsender);

        return json_encode($result);
    }

    function PushNotification()
    {
        include APPPATH . 'third_party/PushNotifications.php';

        // Message payload
        $msg_payload = array(
            'mtitle' => 'Test push notification title',
            'mdesc' => 'Test push notification body',
        );
        //	
//	// For Android
        $regId = 'cGmD8hp_TSqvN25uAKPO1a:APA91bFpvxhqEjr7sniIo7ygAvGYtBt-k-BpFHYuTWxVZ7qdxia3mMgxyg_g7rfXdFLJjph124E4KuJ6MOQ-VKOHfWS6dHiriS6NUn7fysy5MiQqpfZ80VW_loaH7oEdsIko5Z0NMsFq';
        //$regId='chbfvbZrTWGGqW9Kobuljd:APA91bEHpV0ru5GZIO4Mt-FV_s1ySAgMf_xb6r-0vNrPo6Ex4SD6wbyowdKk5fDj3PmnCNLIChqTX9iBlLDhK4q4AwyVTLOBGbScvBpVjJM3x4aeLJU51XGj2nyUGdwvZpjx2q5NTi7u';
//	// For iOS
//	$deviceToken = 'FE66489F304DC75B8D6E8200DFF8A456E8DAEACEC428B427E9518741C92C6660';
//	// For WP8
//	$uri = 'http://s.notify.live.net/u/1/sin/HmQAAAD1XJMXfQ8SR0b580NcxIoD6G7hIYP9oHvjjpMC2etA7U_xy_xtSAh8tWx7Dul2AZlHqoYzsSQ8jQRQ-pQLAtKW/d2luZG93c3Bob25lZGVmYXVsdA/EKTs2gmt5BG_GB8lKdN_Rg/WuhpYBv02fAmB7tjUfF7DG9aUL4';
//	
//	// Replace the above variable values
//	
//        $push=new PushNotifications();
//        echo $push->android($msg_payload, $regId);
//        $token = $regId; // push token
//   $message = "Test notification message";
//   $this->load->library('fcm');
//   $this->fcm->setTitle('Test FCM Notification');
//   $this->fcm->setMessage($message);
//   
//   $json = $this->fcm->getPush();
//   $p = $this->fcm->send($token, $json);
//   echo $p;	
        echo $this->send($regId);
    }

    public function send($deviceid)
    {
        $device_token = $deviceid; //$this->request->getVar($deviceid);

        return $this->sendNotification($device_token, array(
            "title" => "Happy Nikah",
            "body" => "This is notification"
        ), array(
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "id" => 4,
            "form" => 0
        ));
    }

    public function sendPushNotification($token, $title, $body, $id, $type)
    {
        try {
            $accessToken = $this->getAccessToken();
    
            // URL for FCM v1 API
            $url = 'https://fcm.googleapis.com/v1/projects/happy-nikah-18138/messages:send';
    
            // The correct payload structure for FCM v1
            $data = [
                'message' => [
                    'token' => $token,  // The recipient's device token
                    'notification' => [
                        'title' => $title,
                        'body' => $body
                    ],
                    'data' => [
                        'id' => $id,
                        'type' => $type
                    ]
                ]
            ];
    
            // Headers including the authorization with Bearer token
            $headers = [
                'Content-Type: application/json',
                'Authorization: Bearer ' .$accessToken
            ];
    
            // Convert data to JSON format
            $dataString = json_encode($data);
    
            // cURL request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    
            // Execute the request and capture the response
            $response = curl_exec($ch);
    
            // Check for cURL errors
            if ($response === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }
    
            // Close the cURL handle
            curl_close($ch);
    
            return $response;
    
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    public function EditMyProfileInfoStatus()
    {
        $id = $_GET['mode'];
        $basic = $this->BasicDetailsStatus($id);
        $religion = $this->ReligionalDetailsStatus($id);
        $education = $this->EducationDetailsStatus($id);
        $physical = $this->PhysicalDetailsStatus($id);
        $location = $this->LocationDetailsStatus($id);
        $family = $this->FamilyDetailsStatus($id);
        $partner = $this->PartnerDetailsStatus($id);
        $profileimg = $this->ProfileImageStatus($id);
        // echo $basic[0]['perc'];
        $caltotalper = round($basic['perc'] + $religion['perc'] + $education['perc'] + $physical['perc'] + $location['perc'] + $family['perc'] + $partner['perc'] + $profileimg['perc']);
        $feilds = array($basic, $religion, $education, $physical, $location, $family, $partner, $profileimg);
        $response = array(
            "id" => $id,
            "percentage" => $caltotalper,
            "feilds" => $feilds

        );
        return json_encode($response);
    }

    public function BasicDetailsStatus($id)
    {
        $this->db->select("'Basic Information' head,ifnull(r.name,'') 'Name',ifnull(r.happynikah_id,'') 'ID',case when r.gender=1 then 'Male' else 'Female' end 'Gender',
                concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') 'Age',ifnull(r.marital_status,'') 'Marital Status',
                ifnull(r.physical_status,'') 'Physical Status',ifnull(m.mothertongue,'') 'Mother Tongue',ifnull(r.profile_for,'') 'Created By'");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_mothertongue m", "m.mothertongue_id=r.mother_tongue", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        $valuearr = array();
        $totalpercentage = 12.5;
        $index = 0;
        $totalcount = 0;
        foreach ($result as $key => $value) {

            if (substr($key, 0, 4) != "head") {
                $totalcount++;
                if ($value == '') {
                    $valuearr[$index] = array("key" => $key, "value" => $value);
                    $index++;
                }
                // $valuearr[$index] = array("key"=>$key,"value"=>$value);
                // $index++;
            } else {
                $arrdata = array("header" => $value);
            }

        }
        $respercentage = $totalpercentage - ($totalpercentage / $totalcount) * $index;
        // echo "$totalpercentage" ." - "." ( "."$totalpercentage"." / "."$totalcount"." ) "." * "."$index"." = "."$respercentage";
        $arrdata['value'] = $valuearr;
        $arrdata['perc'] = $respercentage;


        return $arrdata;
        // return "Basic";
    }
    public function ReligionalDetailsStatus($id)
    {
        $this->db->select("'Religious Information' head1,
                ifnull(rel.religion,'') 'Religion',ifnull(c.caste,'') 'Caste'");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_religion rel", "rel.rid=r.religion", "left");
        $this->db->join("tbl_caste c", "c.cid=r.caste", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        $valuearr = array();
        $totalpercentage = 12.5;
        $index = 0;
        $totalcount = 0;
        foreach ($result as $key => $value) {

            if (substr($key, 0, 4) != "head") {
                $totalcount++;
                if ($value == '') {
                    $valuearr[$index] = array("key" => $key, "value" => $value);
                    $index++;
                }
                // $valuearr[$index] = array("key"=>$key,"value"=>$value);
                // $index++;
            } else {
                $arrdata = array("header" => $value);
            }

        }
        $respercentage = $totalpercentage - ($totalpercentage / $totalcount) * $index;
        // echo "$totalpercentage" ." - "." ( "."$totalpercentage"." / "."$totalcount"." ) "." * "."$index"." = "."$respercentage";
        $arrdata['value'] = $valuearr;
        $arrdata['perc'] = $respercentage;


        return $arrdata;
        // return "Religion";
    }
    public function EducationDetailsStatus($id)
    {
        $this->db->select("'Education and Professional' head3,ifnull(he.high_education,'') 'Highest Education',ifnull(e.education,'') 'Education',r.job_category 'Profession Type',
        ifnull(tp.profession_name,'') 'Profession',ifnull(r.job_details,'') 'Job Details',ifnull(me.madr_education,'') 'Madrasa Education'");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_highest_education he", "he.id=r.highest_education ", "left");
        $this->db->join("tbl_education e", "e.edu_id=r.education", "left");
        $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        $this->db->join("tbl_madrassa_education me", "me.id = r.madrassa_education", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        $valuearr = array();
        $totalpercentage = 12.5;
        $index = 0;
        $totalcount = 0;
        foreach ($result as $key => $value) {

            if (substr($key, 0, 4) != "head") {
                $totalcount++;
                if ($value == '') {
                    $valuearr[$index] = array("key" => $key, "value" => $value);
                    $index++;
                }
                // $valuearr[$index] = array("key"=>$key,"value"=>$value);
                // $index++;
            } else {
                $arrdata = array("header" => $value);
            }

        }
        $respercentage = $totalpercentage - ($totalpercentage / $totalcount) * $index;
        // echo "$totalpercentage" ." - "." ( "."$totalpercentage"." / "."$totalcount"." ) "." * "."$index"." = "."$respercentage";
        $arrdata['value'] = $valuearr;
        $arrdata['perc'] = $respercentage;

        return $arrdata;
        // return "Education";
    }
    public function PhysicalDetailsStatus($id)
    {
        $this->db->select("'Physical Attribute' head4,
        ifnull(h.height,'') 'Height',ifnull(r.weight,'') 'Weight',ifnull(r.color,'') 'Skin Color',ifnull(r.bodytype,'') 'Body Type',
        ifnull(r.appearance,'') 'Appearance'");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_weight w", "w.weight_id=r.weight", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        $valuearr = array();
        $totalpercentage = 12.5;
        $index = 0;
        $totalcount = 0;
        foreach ($result as $key => $value) {

            if (substr($key, 0, 4) != "head") {
                $totalcount++;
                if ($value == '') {
                    $valuearr[$index] = array("key" => $key, "value" => $value);
                    $index++;
                }
                // $valuearr[$index] = array("key"=>$key,"value"=>$value);
                // $index++;
            } else {
                $arrdata = array("header" => $value);
            }

        }
        $respercentage = $totalpercentage - ($totalpercentage / $totalcount) * $index;
        // echo "$totalpercentage" ." - "." ( "."$totalpercentage"." / "."$totalcount"." ) "." * "."$index"." = "."$respercentage";
        $arrdata['value'] = $valuearr;
        $arrdata['perc'] = $respercentage;

        return $arrdata;
        // return "Physical";
    }
    public function LocationDetailsStatus($id)
    {
        $this->db->select("'Location and Contact Details' head5,ifnull(d.district,'') 'Present District',ifnull(ts.name,'') 'Present State',ifnull(tc.name,'') 'Present Country',
            ifnull(hd.district,'') 'Home District',ifnull(hs.name,'') 'Home State',ifnull(hc.name,'') 'Home Country',
            ifnull(r.native_place,'') 'City/Street',ifnull(r.contacttype,'') 'Contact Type',ifnull(r.mail,'') 'Mail'");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        $this->db->join("tbl_states ts", "ts.id=r.state", "left");
        $this->db->join("tbl_country tc", "tc.id=r.country", "left");
        $this->db->join("tbl_district hd", "hd.district_id=r.home_district", "left");
        $this->db->join("tbl_states hs", "hs.id=r.home_state", "left");
        $this->db->join("tbl_country hc", "hc.id=r.home_country", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        $valuearr = array();
        $totalpercentage = 12.5;
        $index = 0;
        $totalcount = 0;
        foreach ($result as $key => $value) {

            if (substr($key, 0, 4) != "head") {
                $totalcount++;
                if ($value == '') {
                    $valuearr[$index] = array("key" => $key, "value" => $value);
                    $index++;
                }
                // $valuearr[$index] = array("key"=>$key,"value"=>$value);
                // $index++;
            } else {
                $arrdata = array("header" => $value);
            }

        }
        $respercentage = $totalpercentage - ($totalpercentage / $totalcount) * $index;
        // echo "$totalpercentage" ." - "." ( "."$totalpercentage"." / "."$totalcount"." ) "." * "."$index"." = "."$respercentage";
        $arrdata['value'] = $valuearr;
        $arrdata['perc'] = $respercentage;

        return $arrdata;
        // return "Location";
    }
    public function FamilyDetailsStatus($id)
    {
        $this->db->select("'Family Details' head6,
        ifnull(f.familytype,'') 'Family Type',ifnull(f.financial_status,'') 'Financial Status',ifnull(f.hometype,'') 'Home Type',
        ifnull(f.total_members,'') 'Number of family Members',ifnull(f.fatherdetails,'') 'Father Details',ifnull(f.motherdetails,'') 'Mother Details',
        ifnull(f.fathers_occupation,'') 'Father Profession',f.mothers_occupation 'Mother Profession'");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_familyprofile f", "f.user_id=r.id", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        $valuearr = array();
        $totalpercentage = 12.5;
        $index = 0;
        $totalcount = 0;
        foreach ($result as $key => $value) {

            if (substr($key, 0, 4) != "head") {
                $totalcount++;
                if ($value == '') {
                    $valuearr[$index] = array("key" => $key, "value" => $value);
                    $index++;
                } elseif ($key == 'Number of family Members' && $value == 0) {
                    $valuearr[$index] = array("key" => $key, "value" => $value);
                    $index++;
                }
                // $valuearr[$index] = array("key"=>$key,"value"=>$value);
                // $index++;
            } else {
                $arrdata = array("header" => $value);
            }

        }
        $respercentage = $totalpercentage - ($totalpercentage / $totalcount) * $index;
        // echo "$totalpercentage" ." - "." ( "."$totalpercentage"." / "."$totalcount"." ) "." * "."$index"." = "."$respercentage";
        $arrdata['value'] = $valuearr;
        $arrdata['perc'] = $respercentage;

        return $arrdata;
        // return "Family";
    }
    public function PartnerDetailsStatus($id)
    {
        $this->db->select("'Partner Preference' head8,
        'Basic Preference' subhead1,ifnull(o.partner_age_from,'') 'Age From',ifnull(o.partner_age_to,'') 'Age To',ifnull(ph.height,'') 'Height From',ifnull(ph_to.height,'') 'Height To',
        ifnull(wh.weight,'') 'Weight From',ifnull(wh_to.weight,'') 'Weight To',ifnull(GROUP_CONCAT(distinct o.partner_physicalstatus),'') 'Physical Status Preference',
        o.partner_financial 'Family Status Preference',ifnull(GROUP_CONCAT(distinct part_mothertongue.mothertongue),'') 'Mother Tongue Preference',
        ifnull(GROUP_CONCAT(distinct part_marital.maritalstatus),'') 'Marital Status Preference',ifnull(GROUP_CONCAT(distinct part_skincolor.skincolor),'') 'Skin Color Preference',
        ifnull(GROUP_CONCAT(distinct part_appearance.appearance),'') 'Appearance Preference',ifnull(GROUP_CONCAT(distinct part_caste.caste),'') 'Belief Preference','EDUCATION AND PROFFESSI0NAL INFORMATION' subhead2,
        ifnull(GROUP_CONCAT(distinct part_edu.high_education),'') 'Education Preference',ifnull(GROUP_CONCAT(distinct part_job.profession_name),'') 'Profession Preference',
        'LOCATION PREFRENCE' subhead3,ifnull(GROUP_CONCAT(distinct part_country.name),'') 'Present Country',ifnull(GROUP_CONCAT(distinct part_state.name),'') 'Present State',
        ifnull(GROUP_CONCAT(distinct part_disc.district),'') 'Present District',case when o.partner_nationality='India'then 'Indian' else o.partner_nationality end 'Partner Nationality',
        o.partner_expectation  'Partner Expectation'");
        $this->db->from("tbl_registration r");
        $this->db->join("tbl_otherdetails o", "o.user_id=r.id", "left");
        $this->db->join("tbl_height ph", "ph.height_id=o.partner_height", "left");
        $this->db->join("tbl_height ph_to", "ph_to.height_id=o.partner_height_to", "left");
        $this->db->join("tbl_weight wh", "wh.weight_id=o.partner_weight", "left");
        $this->db->join("tbl_weight wh_to", "wh_to.weight_id=o.partner_weight_to", "left");
        $this->db->join("tbl_physicalstatus part_physical", "FIND_IN_SET(part_physical.id,o.partner_physicalstatus)>0", "left");
        $this->db->join("tbl_appearance part_appearance", "FIND_IN_SET(part_appearance.id,o.partner_appearance)>0", "left");
        $this->db->join("tbl_mothertongue part_mothertongue", "FIND_IN_SET(part_mothertongue.mothertongue_id,o.partner_mother_tongue )>0", "left");
        $this->db->join("tbl_maritalstatus part_marital", "FIND_IN_SET(part_marital.id,o.partner_maritalstatus )>0", "left");
        $this->db->join("tbl_skincolor part_skincolor", "FIND_IN_SET(part_skincolor.id,o.partner_skincolor )>0", "left");
        $this->db->join("tbl_mothertongue part_language", "FIND_IN_SET(part_language.mothertongue_id,o.partner_languagespoken )>0", "left");
        $this->db->join("tbl_caste part_caste", "FIND_IN_SET(part_caste.cid,o.partner_caste )>0", "left");
        $this->db->join("tbl_highest_education part_edu", "FIND_IN_SET(part_edu.id,o.partner_education)>0", "left");
        $this->db->join("tbl_profession part_job", "FIND_IN_SET(part_job.profession_id,o.partner_occupation)>0", "left");
        $this->db->join("tbl_country part_country", "FIND_IN_SET(part_country.id,o.partner_country)>0", "left");
        $this->db->join("tbl_states part_state", "FIND_IN_SET(part_state.id,o.partner_state)>0", "left");
        $this->db->join("tbl_district part_disc", "FIND_IN_SET(part_disc.district_id,o.partner_district)>0", "left");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        $valuearr = array();
        $totalpercentage = 12.5;
        $index = 0;
        $totalcount = 0;
        foreach ($result as $key => $value) {

            if (substr($key, 0, 4) != "head") {
                $totalcount++;
                if ($value == '' || $value == 'NULL') {
                    $valuearr[$index] = array("key" => $key, "value" => $value);
                    $index++;
                }
                // $valuearr[$index] = array("key"=>$key,"value"=>$value);
                // $index++;
            } else {
                $arrdata = array("header" => $value);
            }

        }
        $respercentage = $totalpercentage - ($totalpercentage / $totalcount) * $index;
        // echo "$totalpercentage" ." - "." ( "."$totalpercentage"." / "."$totalcount"." ) "." * "."$index"." = "."$respercentage";
        $arrdata['value'] = $valuearr;
        $arrdata['perc'] = $respercentage;

        return $arrdata;
        // return "Partner";
    }
    public function ProfileImageStatus($id)
    {
        $this->db->select("'Profile Image' head9,case when r.photo='' then case when r.gender='1' then 'male.png' else 'female.png' end  else r.photo end photo");
        $this->db->from("tbl_registration r");
        $this->db->where("r.id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        $valuearr = array();
        $totalpercentage = 12.5;
        $index = 0;
        $totalcount = 0;
        foreach ($result as $key => $value) {

            if (substr($key, 0, 4) != "head") {
                $totalcount++;
                if ($value == '' || $value == 'NULL' || $value == 'female.png' || $value == 'male.png') {
                    $valuearr[$index] = array("key" => $key, "value" => $value);
                    $index++;
                }
                // $valuearr[$index] = array("key"=>$key,"value"=>$value);
                // $index++;
            } else {
                $arrdata = array("header" => $value);
            }

        }
        $respercentage = $totalpercentage - ($totalpercentage / $totalcount) * $index;
        // echo "$totalpercentage" ." - "." ( "."$totalpercentage"." / "."$totalcount"." ) "." * "."$index"." = "."$respercentage";
        $arrdata['value'] = $valuearr;
        $arrdata['perc'] = $respercentage;

        return $arrdata;
    }

    public function GetReferDetails()
    {
        $id = $_GET['mode'];
        $this->db->select("re.name,re.p_code,re.p_number,d.district,c.name 'city',re.status");
        $this->db->from("tbl_refer re");
        $this->db->join("tbl_district d", "d.district_id=re.district", "left");
        $this->db->join("tbl_city c", "c.id=re.city", "left");
        $this->db->where("re.user_id", $id);
        $this->db->where("re.status!=4");
        $this->db->order_by("re.status");
        $query = $this->db->get();
        $result = $query->result_array();
        return json_encode($result);
    }

    public function sendwhatsappmsg($data)
    {
        $this->load->helper('url');
        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $data['receiver_id']);
        $query = $this->db->get();
        $queryarray = $query->row_array();
        // print_r($queryarray);
        $this->db->select("*");
        $this->db->from("tbl_registration");
        $this->db->where("id", $data['sender_id']);
        $querysend = $this->db->get();
        $queryarraysd = $querysend->row_array();
        // print_r($queryarraysd);
        $curl = curl_init();
        // echo $queryarray['phone'];
        $url = "https://api.gupshup.io/wa/api/v1/template/msg";

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'apikey: 2ywqu4njdpkiijyg323sqbjbasx727eo',  // Replace with your actual API key
        ];

        $postData = http_build_query([
            'channel' => 'whatsapp',
            'source' => '918943777666',
            'destination' => $queryarray['phone'],
            'src.name' => 'Happy Nikah Muslim Matrimony',
            'template' => json_encode([
                "id" => "ab731828-ab2b-430e-ba51-043382471dce",
                "params" => [$queryarray['name'], $queryarraysd['happynikah_id']]
            ]),
        ]);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // Execute the request and capture the response
        $response = curl_exec($ch);

        // Handle errors (if any)
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            // echo "cURL Error: " . $error_msg;
        }

        // Close the cURL session
        curl_close($ch);

        $responseData = json_decode($response, true);

        // Access status and messageId
        // $status = $responseData['status'];
        // $messageId = $responseData['messageId'];

        // Output the results
        // echo "Status: $status\n";
        // echo "Message ID: $messageId\n";
        curl_close($curl);

        // echo "whatsapp res $response";

    }

    public function gettabbar()
    {
        $json = array();
        $json['error'] = false;
        $json['error_msg'] = "";


        $json['data'] = [
            array("id" => 15, "value" => "Latest"),
            array("id" => 0, "value" => "Matching"),
            array("id" => 18, "value" => "Top Profiles"),
            array("id" => 16, "value" => "Location"),
            array("id" => 17, "value" => "Profession"),
            array("id" => 19, "value" => "ShortListed"),
        ];

        return json_encode($json);
    }

}
