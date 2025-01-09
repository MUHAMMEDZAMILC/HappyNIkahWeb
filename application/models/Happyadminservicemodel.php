<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Happyadminservicemodel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        ini_set('display_errors', 1);
        error_reporting(0);
    }
    public function Testx()
    {
        echo "hiiiiiii";
    }

    public function LoginStaff()
    {
        // Proper error handling should be used instead of suppressing errors.
        try {
            $json = file_get_contents('php://input');
            if ($json === false) {
                throw new Exception("Failed to get input");
            }

            $data = json_decode($json, true);
            if (!isset($data['username'], $data['password'], $data['usertype'])) {
                throw new Exception("Invalid input data");
            }

            // Use prepared statements and parameterized queries to prevent SQL injection
            $this->db->select("user_id AS empid, usertype_id, deleted");
            $this->db->from("tbl_employees1");
            $this->db->where("username", $data['username']);
            $this->db->where("password", md5($data['password'])); // Replace this with password_hash in your DB
            $query = $this->db->get();
            // echo $this->db->last_query();
            // print_r( $query->row_array());
            $json = array();

            if ($query->num_rows() > 0) {
                $json = $query->row_array();
                if ($json['deleted'] == 1) {
                    $json["empid"] = 0;
                    $json["usertype_id"] = 0;
                    $json["error"] = true;
                    $json["msg"] = "Your Account was Deleted";
                } else if ((int) $json['usertype_id'] !== (int) $data['usertype']) {
                    $json["empid"] = 0;
                    $json["usertype_id"] = 0;
                    $json["error"] = true;
                    $json["msg"] = "You are not authorized to login";
                } else {
                    $json['empid'] = (int) $json['empid'];
                    $json['usertype_id'] = (int) $json['usertype_id'];
                    $json["error"] = false;
                    $json["msg"] = "Successfully Login";
                }
            } else {
                $json["empid"] = 0;
                $json["usertype_id"] = 0;
                $json["error"] = true;
                $json["msg"] = "Invalid Username Or Password";
            }

            return json_encode($json);

        } catch (Exception $e) {
            return json_encode([
                "empid" => 0,
                "usertype_id" => 0,
                "error" => true,
                "msg" => $e->getMessage()
            ]);
        }
    }
    public function DashDetail()
    {
        // Proper error handling should be used instead of suppressing errors.
        try {
            $json = file_get_contents('php://input');
            if ($json === false) {
                throw new Exception("Failed to get input");
            }

            $data = json_decode($json, true);
            if (!isset($data['empid'])) {
                throw new Exception("Invalid input data");
            }

            // get target
            $this->db->select("sum(ifnull(tt.target_amount,0)) AS targetamt");
            $this->db->from("tbl_target tt");
            $this->db->where("tt.user_id", $data['empid']);
            $query = $this->db->get();
            $json1 = array();
            $json1 = $query->row_array();

            // total achievement
            $this->db->select("ifnull(sum(tp.final_amount),0) AS achieveamt");
            $this->db->from("tbl_payement tp");
            $this->db->join("tbl_registration r", "r.id=tp.user_id");
            $this->db->where("tp.status", 1);
            $this->db->where("tp.payment_staff_id", $data['empid']);
            $this->db->where("tp.payment_status", 'Paid');
            $this->db->where("MONTH(tp.date)", date('m'));  // Filter by current month
            $this->db->where("YEAR(tp.date)", date('Y'));

            $query2 = $this->db->get();
            $json2 = array();
            $json2 = $query2->row_array();

            // BALANCE AMOUNT
            $balaceamt = $json1['targetamt'] - $json2['achieveamt'];

            // DAYS LEFT
            $today = new DateTime();
            $endOfMonth = new DateTime('last day of this month');
            $interval = $today->diff($endOfMonth);
            $daysLeft = $interval->days;


            // TODAY TOTAL CREATION
            $this->db->select("COUNT(*) AS todaycreation");
            $this->db->from("tbl_registration r");
            $this->db->where("r.staff_id", $data['empid']);
            $this->db->where("r.status!=", 3);
            $this->db->where("DATE(r.reg_date) = CURDATE()");
            $query3 = $this->db->get();
            $json3 = array();
            $json3 = $query3->row_array();

            // MONTH TOTAL CREATION
            $this->db->select("COUNT(*) AS monthcreation");
            $this->db->from("tbl_registration r");
            $this->db->where("r.staff_id", $data['empid']);
            $this->db->where("r.status!=", 3);
            $this->db->where("YEAR(r.reg_date) = YEAR(CURDATE())");
            $this->db->where("MONTH(r.reg_date) = MONTH(CURDATE())");
            $query4 = $this->db->get();
            $json4 = array();
            $json4 = $query4->row_array();
            // echo $this->db->last_query();
            $return = array();
            $return = [
                "targetamt" => $json1['targetamt'],
                "achieveamt" => $json2['achieveamt'],
                "balanceamt" => (string) $balaceamt,
                "dayleft" => (string) $daysLeft,
                "todaycreation" => $json3['todaycreation'],
                "monthcreation" => $json4['monthcreation'],
                "error" => false,
                "msg" => "Get Data",
            ];

            return json_encode($return);

        } catch (Exception $e) {
            return json_encode([
                "targetamt" => 0,
                "achieveamt" => 0,
                "balanceamt" => 0,
                "dayleft" => 0,
                "todaycreation" => 0,
                "monthcreation" => 0,
                "error" => true,
                "msg" => "Server Down",
            ]);
        }
    }


    public function Lead()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $mode = $_GET['mode'];
        // print_r($data);
        if ($mode == 0) {
            // get today task -> Lead Assign Self
            try {
                $this->db->select("tl.id id,tl.lead_id leadid,user_phone phone,tl.staff_id,tl.data_source,tl.created_on date");
                $this->db->from("tbl_lead tl");
                $this->db->where("tl.staff_id", $data['emp_id']);
                $this->db->where("tl.status", "active");
                $query1 = $this->db->get();
                $query1arr = array();
                $query1arr = $query1->result_array();
                // get today task -> Lead Assign Other
                $this->db->select("tl.id id,tl.lead_id leadid,user_phone phone,tl.staff_id,tl.data_source,tl.created_on date");
                $this->db->from("tbl_lead tl");
                $this->db->join("tbl_assign_leads tal", "tal.action_check =tl.id");
                $this->db->where("tal.assign_id", $data['emp_id']);
                $this->db->where("tl.staff_id", $data['emp_id']);
                $this->db->where("tl.status", "active");
                $query2 = $this->db->get();
                $query2arr = array();
                $query2arr = $query2->result_array();
                $result['data'] = array_merge($query1arr, $query2arr);
                if (empty($result['data'])) {
                    $result['error'] = false;
                    $result['msg'] = 'Data Not Found';
                    $result['fun'] = 'Enter Message';

                } else {

                    $result['error'] = false;
                    $result['msg'] = 'Get Data';
                    $result['fun'] = 'Enter Message';

                }

                return json_encode($result);
            } catch (Exception $e) {
                return json_encode([
                    "error" => true,
                    "msg" => "Server Down",
                    "fun" => "Enter Message",
                ]);
            }

        } else if ($mode == 1) {
            // update lead Call status
            try {
                $updatearr = array();
                $updatearr['user_name'] = $data['user_name'];
                $updatearr['user_email'] = $data['user_email'];
                $updatearr['status'] = "inactive";
                $updatearr['call_type'] = $data['call_type'];
                $updatearr['user_gender'] = $data['user_gender'];
                $updatearr['message'] = $data['message'];
                $updatearr['lead_status'] = $data['lead_status'];
                $updatearr['updated_on'] = $data['updated_on'];
                $updatearr['update_id'] = $data['update_id'];
                $updatearr['happynikah_id'] = $data['happynikah_id'];
                $this->db->where("id", $data['leadid']);
                $this->db->update("tbl_lead", $updatearr);
                if ($this->db->affected_rows() > 0) {
                    $result = array('error' => false, 'msg' => 'Lead updated successfully');
                } else {
                    $result = array('error' => true, 'msg' => 'Failed to update lead');
                }
                return json_encode($result);
            } catch (Exception $e) {
                return json_encode([
                    "error" => true,
                    "msg" => "Server Down",
                ]);
            }

        } else if ($mode == 2) {
            // get today task -> Approve Calls
            try {
                $this->db->select("r.id,r.happynikah_id hnid,r.name,case when r.gender=1 then 'Male' else 'Female' end gender,r.phone,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(d.district,'') native_district,tap.date date,CASE when r.reg_through=0 then 'Website' ELSE CASE when r.reg_through=1 then 'Admin' ELSE 'Mobile App' end end platform");
                $this->db->from("tbl_assign_approve_calls tap");
                $this->db->join("tbl_registration r", "r.id=tap.action_check");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->where("tap.assign_id", $data['emp_id']);
                $this->db->where("tap.active_status", "active");
                $this->db->where("tap.goto_status", 0);
                $query = $this->db->get();
                $json = array();
                if ($query->num_rows() > 0) {
                    $json["data"] = $query->result_array();
                    $json["error"] = false;
                    $json["msg"] = "Get Data";
                    $json['fun'] = 'Postpond Payment';
                } else {
                    $json["error"] = false;
                    $json["msg"] = "Data Not Found";
                    $json['fun'] = 'Postpond Payment';
                }

                return json_encode($json);
            } catch (Exception $e) {
                return json_encode([
                    "error" => true,
                    "msg" => "Server Down",
                    "fun" => 'Postpond Payment'
                ]);
            }

        } else if ($mode == 3) {
            // get today task -> Active Calls
            try {
                $this->db->select("r.id,r.happynikah_id hnid,r.name,case when r.gender=1 then 'Male' else 'Female' end gender,r.phone,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(d.district,'') native_district,taa.date date,CASE when r.reg_through=0 then 'Website' ELSE CASE when r.reg_through=1 then 'Admin' ELSE 'Mobile App' end end platform");
                $this->db->from("tbl_assign_active_calls taa");
                $this->db->join("tbl_registration r", "r.id=taa.action_check");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->where("taa.assign_id", $data['emp_id']);
                $this->db->where("taa.active_status", "active");
                $this->db->where("taa.goto_status", 0);
                $query = $this->db->get();
                $json = array();
                if ($query->num_rows() > 0) {
                    $json["data"] = $query->result_array();
                    $json["error"] = false;
                    $json["msg"] = "Get Data";
                    $json['fun'] = 'Postpond Payment';
                } else {
                    $json["error"] = false;
                    $json["msg"] = "Data Not Found";
                    $json['fun'] = 'Postpond Payment';
                }

                return json_encode($json);
            } catch (Exception $e) {
                return json_encode([
                    "error" => true,
                    "msg" => "Server Down",
                    "fun" => 'Postpond Payment'
                ]);
            }

        }
    }

    public function Payment()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $mode = $_GET['mode'];

        if ($mode == 0) {

        } else if ($mode == 1) {
            // post pond payment 
            try {
                $currentDate = new DateTime();
                $updatearr = array();
                $updatearr['plan_id'] = $data['plan_id'];
                $updatearr['plan_type'] = $data['plan_type'];
                $updatearr['postpone_date'] = $data['postpone_date'];
                $updatearr['cdate'] = date("Y-m-d H:i:s");
                $updatearr['message'] = $data['message'];
                $updatearr['login_id'] = $data['emp_id'];
                $updatearr['payment_id'] = $data['payment_id'];//reg id 
                $updatearr['reason'] = $data['reason'];
                $updatearr['delete_status'] = $data['dstatus'];
                $updatearr['paid_status'] = $data['pstatus'];
                $updatearr['crnt_date'] = date("Y-m-d");
                if (isset($data['paymentreq_id']) && $data['paymentreq_id'] != '') {
                    $this->db->select("*");
                    $this->db->from("tbl_paymentrequest");
                    $this->db->where("id", $data['paymentreq_id']);
                    $query = $this->db->get();
                    $result = array();
                    if ($query->num_rows() > 0) {
                        $this->db->where("id", $data['paymentreq_id']);
                        $this->db->update("tbl_paymentrequest", $updatearr);
                        if ($this->db->affected_rows() > 0) {

                            $result['error'] = false;
                            $result['msg'] = 'Payment Postpond updated successfully';
                        } else {

                            $result['error'] = true;
                            $result['msg'] = 'Failed to update Payment Postpond';
                        }
                    } else {
                        $res = $this->db->insert("tbl_paymentrequest", $updatearr);
                        if ($res) {

                            $result['error'] = false;
                            $result['msg'] = 'Payment Postpond Upload successfully';

                        } else {

                            $result['error'] = true;
                            $result['msg'] = 'Failed to Upload Payment Postpond';

                        }
                    }
                } else {

                    $res = $this->db->insert("tbl_paymentrequest", $updatearr);
                    if ($res) {
                        $result['error'] = false;
                        $result['msg'] = 'Payment Postpond Upload successfully';

                    } else {
                        $result['error'] = true;
                        $result['msg'] = 'Failed to Upload Payment Postpond';

                    }
                }
                return json_encode($result);
            } catch (Exception $e) {
                return json_encode([
                    "error" => true,
                    "msg" => "Server Down",
                ]);
            }


        }
    }
    public function AdsManage()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $mode = $_GET['mode'];
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $res = 0;
        if ($mode == 0) {
            $path = "assets/photo_storage_blur";
            $data = $_POST;
            $fileName = mt_rand(1111, 9999) . date('Y-m-d') . '.jpg';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $fileName;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $d = array('error' => $this->upload->display_errors());
                $res = false;
            } else {
                $flag = true;
                $response = $this->uploadtoadsstorage($fileName);
                if ($response['status'] == true) {
                    $uploaddata['adimage'] = $fileName;
                    $uploaddata['adstatus'] = 1;
                    $uploaddata['btn_color'] = $data['color'];
                    $this->db->update("tbl_help_support", $uploaddata);
                    $res = true;
                } else {
                    $res = false;
                }
                $tmppath = "./assets/photo_storage_blur/" . $filename;
                if (file_exists($tmppath)) {
                    unlink($tmppath);
                }
            }

        } else if ($mode == 1) {
            $ardata['adstatus'] = 1;
            $res = $this->db->update("tbl_help_support", $ardata);
        } else if ($mode == 2) {
            $ardata['adstatus'] = 0;
            $res = $this->db->update("tbl_help_support", $ardata);
        } else if ($mode == 3) {
            $ardata['adstatus'] = 0;
            $ardata['adimage'] = '';
            $ardata['btn_color'] = 0;
            $res = $this->db->update("tbl_help_support", $ardata);
        } else if ($mode == 4) {
            $this->db->select("ifnull(ths.btn_color,'') color");
            $this->db->from("tbl_help_support ths");
            $query = $this->db->get();
            $json = $query->row_array();
            if ($json[color] == 1) {
                $ardata['btn_color'] = 0;
                $res = $this->db->update("tbl_help_support", $ardata);
            } else {
                $ardata['btn_color'] = 1;
                $res = $this->db->update("tbl_help_support", $ardata);
            }
        }

        $jsonres = array();
        if ($res) {
            $jsonres["status"] = "1";
            $this->db->select("ifnull(ths.adimage,'') condent,ifnull(ths.adstatus,'') status,ifnull(ths.btn_color,'') color");
            $this->db->from("tbl_help_support ths");
            $query = $this->db->get();
            $json = $query->row_array();
            $jsonres["data"] = $json;
        } else {
            $jsonres["error"] = true;
            $jsonres["msg"] = "Data Not Found";
        }
        return json_encode($jsonres);

    }

    public function uploadtoadsstorage($filename)
    {

        $uploadUrl = "https://happynikah.azurewebsites.net/api/Files/blur_image";
        $file_path = './assets/photo_storage_blur/' . $filename;
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


    public function GetData()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $mode = $_GET['mode'];
        $head = $_GET['head'];
        // echo $mode;
        if ($mode == 0) {
            $this->db->select("ifnull(ths.adimage,'') condent,ifnull(ths.adstatus,'') status,ifnull(ths.btn_color,'') color");
            $this->db->from("tbl_help_support ths");
            $query = $this->db->get();
            $json = $query->row_array();
            return json_encode($json);
        } else if ($mode == 1) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,name value");
            $this->db->from("tbl_country");
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } elseif ($mode == 2) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
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
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } elseif ($mode == 3) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
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
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } elseif ($mode == 4) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,name value");
            $this->db->from("tbl_city");
            if (!empty($_GET['head']) && $_GET['head'] != 'null') {
                $this->db->where("district_id", $_GET['head']);
            }
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } else if ($mode == 5) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,country value");
            $this->db->from("tbl_countrycode");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } else if ($mode == 6) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,contacttype value");
            $this->db->from("tbl_contacttype");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 7) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,maritalstatus value");
            $this->db->from("tbl_maritalstatus");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 8) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("cid id,caste value");
            $this->db->from("tbl_caste");
            $this->db->where("rel_id", 2);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 9) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = [
                ["id" => "0", "value" => "Normal"],
                ["id" => "1", "value" => "Physically Challenged"]

            ];


            return json_encode($json);
        } else if ($mode == 10) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,physicalstatus value");
            $this->db->from("tbl_physicalstatus");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 11) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("mothertongue_id id,mothertongue value");
            $this->db->from("tbl_mothertongue");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 12) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,high_education value");
            $this->db->from("tbl_highest_education");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 13) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("edu_id id,education value");
            $this->db->from("tbl_education");
            if (!empty($_GET['head']) && $_GET['head'] != 'null') {
                $this->db->where("high_edu_id", $_GET["head"]);
            }
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 14) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,professiontype value");
            $this->db->from("tbl_professiontype");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 15) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("profession_id id,profession_name value");
            $this->db->from("tbl_profession");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 16) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,madr_education value");
            $this->db->from("tbl_madrassa_education");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 17) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("income_id id,income value");
            $this->db->from("tbl_professional_income");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 18) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,familytype value");
            $this->db->from("tbl_familytype");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 19) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,financialstatus value");
            $this->db->from("tbl_financialstatus");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 20) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,hometype value");
            $this->db->from("tbl_hometype");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } else if ($mode == 21) {
            $json = array();
            $json['error'] = false;
            $json['msg'] = "";
            $json['data'] = [array("id" => "1", "value" => "Alive"), array("id" => "2", "value" => "Died")];
            return json_encode($json);
        } else if ($mode == 22) {
            $json = array();
            $json['error'] = false;
            $json['msg'] = "";
            for ($i = 18; $i <= 70; $i++) {

                $json['data'][] = array("id" => "$i", "value" => "$i");
            }
            return json_encode($json);
        } else if ($mode == 23) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("height_id id,height value");
            $this->db->from("tbl_height");
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } else if ($mode == 24) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("weight_id id,weight value");
            $this->db->from("tbl_weight");
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } else if ($mode == 25) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,skincolor value");
            $this->db->from("tbl_skincolor");
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } else if ($mode == 26) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = [
                ["id" => "0", "value" => "Interest to Login"],
                ["id" => "1", "value" => "Others"]

            ];

            return json_encode($json);
        } else if ($mode == 27) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("id,reason value");
            $this->db->from("tbl_deletereason");
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } else if ($mode == 28) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("plan_id id,plan_name pname,duration, plan_strick_amount pamt,contacts,messages,months days");
            $this->db->from("tbl_plan");
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } else if ($mode == 29) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json["data"] = array();
            $this->db->select("user_id id, user_name value");
            $this->db->where("user_type", 3);
            $this->db->from("tbl_users1");
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }

            return json_encode($json);
        } else if ($mode == 30) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $json['data'] = [
                array("id" => "0", "value" => "Office Payment"),
                array("id" => "1", "value" => "Back Deposit"),
                array("id" => "3", "value" => "Online Payment"),
                array("id" => "4", "value" => "Door Step"),
                array("id" => "5", "value" => "Money Exchange"),
                array("id" => "6", "value" => "Free Activation")
            ];
            return json_encode($json);
        } else if ($mode == 31) {
            $json = array();
            $json["error"] = false;
            $json["msg"] = "";
            $this->db->select("usertype_id id, user_type value");
            $this->db->where("status", 1);
            $this->db->from("tbl_usertype");
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $json["data"] = $query->result_array();
            } else {
                $json["error"] = true;
                $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        }
    }

    public function SendActivity()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $mode = $_GET['mode'];
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $res = 0;
        $ardata = array();
        if ($mode == 0) {
            $ardata['status'] = 2;
            $this->db->where("user_image_id", $data["user_id"]);
            $res = $this->db->update("tbl_userimages", $ardata);
        } else if ($mode == 1) {
            $ardata['status'] = 1;
            $ardata['profile_pic'] = 0;
            $this->db->where("user_image_id", $data["user_id"]);
            $res = $this->db->update("tbl_userimages", $ardata);
        } else if ($mode == 2) {
            $ardata['status'] = 1;
            $ardata['approve_id'] = $data['emp_id'];
            $ardata['reason_status'] = $data['reason'];
            $ardata['message'] = $data['message'];
            $ardata['delete_date'] = date('Y-m-d');
            $ardata['pending_status'] = 2;
            $this->db->where("id", $data["user_id"]);
            $res = $this->db->update("tbl_registration", $ardata);
        } else if ($mode == 3) {
            $ardata['status'] = 3;
            $ardata['delete_id'] = $data['emp_id'];
            $ardata['reason_status'] = $data['reason'];
            $ardata['message'] = $data['message'];
            $ardata['delete_date'] = date('Y-m-d');
            $ardata['pending_status'] = 2;
            $this->db->where("id", $data["user_id"]);
            $res = $this->db->update("tbl_registration", $ardata);
        } else if ($mode == 4) {
            $ardata['status'] = 4;
            $ardata['block_id'] = $data['emp_id'];
            $ardata['block_status'] = $data['reason'];
            $ardata['block_description'] = $data['message'];
            $ardata['block_date'] = date('Y-m-d');
            $this->db->where("id", $data["user_id"]);
            $res = $this->db->update("tbl_registration", $ardata);
        } else if ($mode == 5) {
            $ardata['status'] = 1;
            $ardata['block_id'] = $data['emp_id'];
            $ardata['block_description'] = $data['message'];
            $ardata['block_date'] = date('Y-m-d');
            $this->db->where("id", $data["user_id"]);
            $res = $this->db->update("tbl_registration", $ardata);
        } else if ($mode == 6) {

            // hide profile
            $this->db->select("*");
            $this->db->from("tbl_hideprofile th");
            $this->db->where("th.user_id", $data["user_id"]);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json = $query->row_array();
                $this->db->where("id", $json["id"]);
                if ($json["hide_status"] == 1) {
                    $arrdata["hide_status"] = 0;
                    $res = $this->db->update("tbl_hideprofile", $arrdata);
                } else {
                    $arrdata["hide_status"] = 1;
                    $res = $this->db->update("tbl_hideprofile", $arrdata);
                }

            } else {
                $arrdata['user_id'] = $data["user_id"];
                $arrdata['hide_status'] = 1;
                $arrdata['emp_id'] = $data['emp_id'];
                $arrdata['hide_date'] = date('Y-m-d');
                $arrdata['hide_description'] = $data['message'];
                $res = $this->db->insert("tbl_hideprofile", $arrdata);
            }

        } else if ($mode == 7) {
            // payment to user
            $this->db->select("*");
            $this->db->from("tbl_payement tp");
            $this->db->where("tp.user_id", $data["user_id"]);
            $this->db->where("tp.status", 1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $json = $query->row_array();
                // print_r($json);
                $arrdata['status'] = 0;
                $this->db->where("id", $json["id"]);
                // $this->db->where("user_id",$data["user_id"]);
                $this->db->update("tbl_payement", $arrdata);
            }
            $arrdata['user_id'] = $data["user_id"];
            $arrdata['session_id'] = $data["emp_id"];
            $arrdata['payment_staff_id'] = $data["emp_id"];
            $arrdata['payment'] = $data["paymode"];
            $arrdata['description'] = $data['planname'];
            $arrdata['date'] = $data['date'];
            $arrdata['plan_id'] = $data['planid'];
            $arrdata['expiry_date'] = $data['expdate'];
            $arrdata['ctime'] = date('Y-m-d h:i:s');
            $arrdata['status'] = 1;
            $arrdata['contactbalance'] = $data['contacts'];
            $arrdata['messagebalance'] = $data['messages'];
            $arrdata['comment'] = $data['comment'];
            $arrdata['reason_status'] = $data['reason'];
            $arrdata['discount'] = $data['discount'];
            $arrdata['final_amount'] = $data['finalamt'];
            $arrdata['amount'] = $data['planamt'];
            $arrdata['payment_mode'] = $data['paymode'];
            $arrdata['payment_status'] = $data['paystatus'];
            $res = $this->db->insert("tbl_payement", $arrdata);
        }

        $jsonres = array();
        if ($res) {
            $jsonres["status"] = "1";
        } else {
            $jsonres["error"] = true;
            $jsonres["msg"] = "Data Not Found";
        }
        return json_encode($jsonres);
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
                $json["msg"] = "User id not found";

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

            //print_r($arr_family);
            //die('ere');
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
            $this->db->where("phone", $data['phone']);
            $this->db->where("status !=", 3);
            $checkexist = $this->db->get();
            if ($checkexist->num_rows() > 0) {
                $json = array();
                $json["error"] = true;
                $json["msg"] = "Already Registered";

                return json_encode($json);
            }



            $reg_data = $data;
            unset($reg_data["about"]);
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
            $reg_data['home_district'] = (isset($data['native_district'])) ? $data['native_district'] : '';
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
            $password = 'Pass' . rand(10, 10000);
            $loginDetails['password'] = md5($password);
            $loginDetails['user_id'] = $insert_id;
            $this->db->insert("tbl_userlogin", $loginDetails);
            $mobile = (($reg_data["countryCode"] != "0") ? (($reg_data["countryCode"] != "91") ? "+" . $reg_data["countryCode"] : $reg_data["countryCode"]) : "91") . $reg_data['phone'];
            $otherdetails = array();
            $otherdetails['user_id'] = $insert_id;
            $otherdetails['aboutme'] = $data['about'];
            $this->db->insert('tbl_otherdetails', $otherdetails);
            $jsondata = array();
            $jsondata['user_id'] = $otherdetails['user_id'];

            $this->db->select("r.happynikah_id id,r.name,case when r.countryCode!=0 then case when r.countryCode!='91' then concat('+',r.countryCode,r.phone) else  concat(r.countryCode,r.phone) end else concat('91',r.phone) end phone");
            $this->db->from("tbl_registration r");
            $this->db->where("id", $insert_id);
            $query = $this->db->get()->row_array();
            $msg = "Your Happy Nikah Id :" . $query["id"] . " Password:" . $password . "
                    Hi " . $query["name"] . ", Welcome to happynikah. To know your  details through online on happynikah.com. SYSOL SYSTEM SOLUTIONS PRIVATE LIMITED";
            $ret = $this->smsotp(urlencode($msg), $query["phone"]);
            echo $ret;
            return json_encode($jsondata);
        }
    }

    function smsotp($msg, $mobile)
    {
        // $templateid = 1607100000000205213;
        // $url = 'https://2factor.in/API/V1/7a8571c8-ed69-11ec-9c12-0200cd936042/SMS/' . $mobile . '/OTP+VERIFICATION';
        $url = 'https://2factor.in/API/R1/?module=TRANS_SMS&apikey=7a8571c8-ed69-11ec-9c12-0200cd936042&to=' . $mobile . '&from=SYSOLS&templatename=OTP+Template&var1=' . $msg . '&var3=happynikah.com';
        echo $url;
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        echo $data;
        return 1;
        // file_get_contents($url);
        // return 1;

    }

    function PhotoApproveList()
    {
        $this->db->select("r.name 'Name',r.happynikah_id 'ID',u.user_image_id 'imgid',u.user_image 'photo'");
        $this->db->from("tbl_userimages u");
        $this->db->join("tbl_registration r", "r.id=u.user_id", "left");
        $this->db->where("r.status!=", 3);
        $this->db->where("u.status", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $json = $query->result_array();
        } else {
            $json["error"] = true;
            $json["msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    function ProfilepproveList()
    {
        $this->db->select("r.name 'Name',r.id,r.happynikah_id 'hnid',r.countryCode 'code',r.phone 'phone',r.reg_date 'regdate',case when r.reg_through=0 then 'website' else 'application' end 'reg_through' ");
        $this->db->from("tbl_registration r");
        $this->db->where("r.status", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $json = $query->result_array();
        } else {
            $json["error"] = true;
            $json["msg"] = "Data Not Found";
        }

        return json_encode($json);
    }

    public function Search()
    {
        $json = file_get_contents('php://input');
        //print_r($json);
        //echo "Name:".$json["Name"];
        $data = json_decode($json, true);

        $maritalStatus = [0 => "All", 1 => "Unmarried", 2 => "Divorced", 3 => "Widow"];


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
                            ifnull(c.caste,'') belief,case when photo='' then case when r.gender =1 then 'male.png' else 'female.png' end else case when u.status=2 then  photo else '$photo' end end photo ,
                            ifnull(r.marital_status,'') marital_status,r.phone,r.happynikah_id,ifnull(imgcount.imgcount,0) totimages,case when ifnull(py.user_id,0)!=0 then 1 else 0 end premium,
                            ul.is_online online,r.status,r.badge_status badge,case when thp.user_id IS NULL then 0 else thp.hide_status end 'hidestatus'", FALSE);
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

            $this->db->join("tbl_highest_education he", "he.id=r.highest_education and he.high_education in (" . $reshigheducation . ")");
        } else {

            $this->db->join("tbl_highest_education he", "he.id=r.highest_education", "left");
        }

        // ============== join jobs =====================
        if ($resprofession != "") {
            $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation and tp.profession_name in (" . $resprofession . ")");
        } else {
            $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
        }


        if ($resdistrict != "" && $anybooldist != "") {
            $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        } else if ($resdistrict != "") {
            $this->db->join("tbl_district d", "d.district_id=r.native_district and d.district in (" . $resdistrict . ")");
        } else {
            $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
        }
        $this->db->join("tbl_height h", "h.height_id=r.height", "left");
        $this->db->join("tbl_weight w", "w.weight_id=r.weight", "left");
        $this->db->join("tbl_religion tr", "tr.rid=r.religion", "left");
        $this->db->join("tbl_states tbs", "tbs.id=r.state", "left");
        $this->db->join("tbl_userimages u", "u.user_id=r.id and r.photo=u.user_image", "left");
        $this->db->join("(select count(user_id) imgcount,user_id from tbl_userimages where status =2 group by user_id) imgcount", "imgcount.user_id=r.id", "left");
        $this->db->join("tbl_payement py", "py.user_id=r.id and py.expiry_date>NOW() and py.status!=0", "left");
        $this->db->join("tbl_hideprofile thp", "thp.user_id=r.id", "left");
        $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");
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


            if ($resmaritalstatus != "") {
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

        //$this->db->order_by("r.name");
        $this->db->order_by("convert(case when u.status=2 then  1 else 2 end,decimal),r.age");
        $this->db->group_by('r.id');
        //$this->db->order_by("r.age");

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
        $json = array();
        if ($query->num_rows() > 0) {
            $json = $query->result_array();
        } else {
            $json = [
                array("error" => true, "msg" => "Data Not Found")
            ];
            // $json["error"] = true;
            // $json["msg"] = "Data Not Found";
        }
        return json_encode($json);

    }
}
