<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\Middleware\AuthTokenMiddleware;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
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
            $this->db->select("user_id AS empid, usertype_id,username, deleted");
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
                    $json["empname"] = null;
                    $json["usertype_id"] = 0;
                    $json["error"] = true;
                    $json["msg"] = "Your Account was Deleted";
                } else if ((int) $json['usertype_id'] !== (int) $data['usertype']) {
                    $json["empid"] = 0;
                    $json["empname"] = null;
                    $json["usertype_id"] = 0;
                    $json["error"] = true;
                    $json["msg"] = "You are not authorized to login";
                } else {
                    $json['empid'] = (int) $json['empid'];
                    $json['usertype_id'] = (int) $json['usertype_id'];
                    $json['empname'] = $json['username'];
                    $json["error"] = false;
                    $json["msg"] = "Successfully Login";

                    $updatearr = array();
                    $updatearr['empid'] = $json['empid'];
                    $updatearr['actiondesc'] = ' Login Through Admin App';
                    $updatearr['date'] = date('Y-m-d');
                    $updatearr['status'] = 1;
                    $this->db->insert("tbl_staffupdates", $updatearr);
                }
            } else {
                $json["empid"] = 0;
                $json["usertype_id"] = 0;
                $json["empname"] = null;
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
            $this->db->select("ifnull(sum(ifnull(tt.target_amount,0)),0) AS targetamt");
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

    public function TabBar()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $mode = $_GET['mode'];
        $head = isset($_GET['head']) ? $_GET['head'] : -1;

        if ($mode == 0) {
            // crm tabbar
            try {
                $json = array();
                $json['error'] = false;
                $json['msg'] = "Get Data";

                if ($mode == 0 && $head == 1) {
                    $json['data'] = [
                        array("id" => 0, "value" => "Lead Calls"),
                        array("id" => 2, "value" => "Approve Calls"),
                        array("id" => 3, "value" => "Acticve Calls"),
                        array("id" => 4, "value" => "Direct Register"),
                        array("id" => 5, "value" => "Chat Support"),
                        array("id" => 6, "value" => "Followup Calls"),
                        array("id" => 7, "value" => "Postpond"),
                    ];
                } else if ($mode == 0 && $head == 2) {
                    $json['data'] = [
                        array("id" => 0, "value" => "New Leads"),
                        array("id" => 8, "value" => "Pending Leads"),
                        array("id" => 3, "value" => "Dead Leads"),
                        array("id" => 4, "value" => "Converted Leads"),

                    ];
                } else if ($mode == 0 && $head == 3) {
                    $json['data'] = [
                        array("id" => 2, "value" => "Approve Calls"),
                        array("id" => 3, "value" => "Active Calls"),
                        array("id" => 4, "value" => "Direct Register"),
                        array("id" => 5, "value" => "Chat Support"),
                        array("id" => 6, "value" => "Pending FollowUp Calls"),

                    ];
                } else {
                    $json['data'] = [
                        array("id" => 1, "value" => "Today Tasks"),
                        array("id" => 2, "value" => "Lead Calls"),
                        array("id" => 3, "value" => "Sales Calls"),
                    ];
                }

            } catch (Exception $e) {
                $json = array();
                $json['error'] = true;
                $json['msg'] = "Server Down";
            }


            return json_encode($json);
        }
    }


    public function Lead()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $mode = $_GET['mode'];
        $head = isset($_GET['head']) ? $_GET['head'] : "";
        // print_r($data);
        if ($mode == 0) {
            // get today task -> Lead Assign Self
            try {
                $this->db->select("CAST(tl.id AS UNSIGNED) lid,tl.lead_id leadid,tl.user_name name,CONCAT(IFNULL(countrycode, '+91'), user_phone) phone,CAST(tl.staff_id AS UNSIGNED) staff_id,tl.data_source,tl.created_on date");
                $this->db->from("tbl_lead tl");
                $this->db->where("tl.staff_id", $data['empid']);
                $this->db->where("tl.status", "active");
                $this->db->where("tl.lead_id!=", "");
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(tl.created_on, '%d-%m-%Y') =", date('d-m-Y'), FALSE);
                }

                $query1 = $this->db->get();
                $query1arr = array();
                $query1arr = array_map(function ($item) {
                    $item['lid'] = (int) $item['lid'];  // Convert lid to integer
                    return $item;
                }, $query1->result_array());

                // get today task -> Lead Assign Other
                $this->db->select("CAST(tl.id AS UNSIGNED) lid,tl.lead_id leadid,tl.user_name name,CONCAT(IFNULL(countrycode, '+91'), user_phone) phone, CAST(tl.staff_id AS UNSIGNED) staff_id,tl.data_source,tl.created_on date");
                $this->db->from("tbl_lead tl");
                $this->db->join("tbl_assign_leads tal", "tal.action_check=tl.id");
                $this->db->where("tal.assign_id", $data['empid']);
                $this->db->where("tl.staff_id", $data['empid']);
                $this->db->where("tl.status", "active");
                $this->db->where("tl.lead_id!=", "");
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(tal.date, '%d-%m-%Y') =", date('d-m-Y'), FALSE);
                }
                $query2 = $this->db->get();
                $query2arr = array();
                $query2arr = array_map(function ($item) {
                    $item['lid'] = (int) $item['lid'];  // Convert lid to integer
                    return $item;
                }, $query2->result_array());
                $result['data'] = array_merge($query1arr, $query2arr);
                if (empty($result['data'])) {
                    $result["data"] = [];
                    $result['error'] = false;
                    $result['msg'] = 'Data Not Found';
                    $result['fun'] = 'Enter Details';

                } else {

                    $result['error'] = false;
                    $result['msg'] = 'Get Data';
                    $result['fun'] = 'Enter Details';

                }

                return json_encode($result);
            } catch (Exception $e) {
                return json_encode([
                    "data" => [],
                    "error" => true,
                    "msg" => "Server Down",
                    "fun" => "Enter Details",
                ]);
            }

        } else if ($mode == 1) {
            // create ot update lead Call status
            try {
                if (isset($data['leadid']) && $data['leadid'] != '') {
                    $updatearr = array();
                    $updatearr['user_name'] = $data['user_name'];
                    $updatearr['user_email'] = $data['user_email'];
                    $updatearr['status'] = "inactive";
                    $updatearr['call_type'] = $data['call_type'];
                    $updatearr['user_gender'] = $data['user_gender'];
                    $updatearr['message'] = $data['message'];
                    $updatearr['lead_status'] = $data['lead_status'];
                    $updatearr['user_location'] = $data['user_location'];
                    $updatearr['updated_on'] = date('Y-m-d');
                    $updatearr['update_id'] = $data['update_id'];
                    $updatearr['followdate'] = $data['followdate'];
                    $updatearr['happynikah_id'] = $data['happynikah_id'];
                    $this->db->where("id", $data['leadid']);
                    $this->db->update("tbl_lead", $updatearr);
                    if ($this->db->affected_rows() > 0) {
                        $result = array('error' => false, 'msg' => 'Lead updated successfully');
                    } else {
                        $result = array('error' => true, 'msg' => 'Failed to update lead');
                    }
                    return json_encode($result);
                } else {
                    if (isset($data['user_phone']) && $data['user_phone'] != '') {
                        $this->db->select("tl.*");
                        $this->db->from("tbl_lead tl");
                        $this->db->where("tl.user_phone", $data['user_phone']);
                        $query = $this->db->get();
                        if ($query->num_rows() > 0) {
                            $result['error'] = true;
                            $result['msg'] = 'Already Created with ' . $data['user_phone'];
                        } else {
                            $this->db->select("r.*");
                            $this->db->from("tbl_registration r");
                            $this->db->where("r.phone", $data['user_phone']);
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) {
                                $rdata = $query->row_array();
                                $result['error'] = true;
                                $result['msg'] = 'Already Registered HN ID is ' . $rdata['happynikah_id'];
                            } else {
                                $updatearr = array();
                                $updatearr['user_name'] = $data['user_name'];
                                $updatearr['user_email'] = $data['user_email'];
                                $updatearr['countrycode'] = $data['countrycode'];
                                $updatearr['user_phone'] = $data['user_phone'];
                                $updatearr['age'] = $data['dob'];
                                $updatearr['created_on'] = date("Y-m-d");
                                $updatearr['status'] = "active";
                                $updatearr['staff_id'] = $data['empid'];
                                $updatearr['call_type'] = 7;
                                $updatearr['data_source'] = $data['data_source'];
                                $updatearr['user_gender'] = $data['user_gender'];
                                $updatearr['user_location'] = $data['user_location'];
                                $updatearr['source_value'] = $data['source_value'];
                                $res = $this->db->insert("tbl_lead", $updatearr);
                                if ($res) {
                                    $result['error'] = false;
                                    $result['msg'] = 'Create Lead Upload successfully';

                                } else {
                                    $result['error'] = true;
                                    $result['msg'] = 'Failed to Create Lead';

                                }
                            }
                        }
                    } else {
                        $result['error'] = true;
                        $result['msg'] = 'Failed to Create Lead';
                    }




                    return json_encode($result);

                }
            } catch (Exception $e) {
                return json_encode([
                    "error" => true,
                    "msg" => "Server Down",
                ]);
            }

        } else if ($mode == 2) {
            // get today task -> Approve Calls
            try {
                $this->db->select("r.id,r.happynikah_id hnid,r.name name,case when r.gender=1 then 'Male' else 'Female' end gender,
                case when r.countryCode!=0 then concat(r.countryCode,r.phone) else r.phone end phone,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(d.district,'') native_district,r.reg_date date,CASE when r.reg_through=0 then 'Website' ELSE CASE when r.reg_through=1 then 'Admin' ELSE 'Mobile App' end end platform");
                $this->db->from("tbl_registration r");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->where("r.status", $data['empid']);
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(r.reg_date, '%d-%m-%Y') =", date('d-m-Y'), FALSE);
                }
                $this->db->where("r.goto_nikah", 0);
                $query0 = $this->db->get();
                $query0arr = array();
                $query0arr = $query0->result_array();

                $this->db->select("r.id,r.happynikah_id hnid,r.name name,case when r.gender=1 then 'Male' else 'Female' end gender,case when r.countryCode!=0 then concat(r.countryCode,r.phone) else r.phone end phone,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(d.district,'') native_district,tap.date date,CASE when r.reg_through=0 then 'Website' ELSE CASE when r.reg_through=1 then 'Admin' ELSE 'Mobile App' end end platform");
                $this->db->from("tbl_assign_approve_calls tap");
                $this->db->join("tbl_registration r", "r.id=tap.action_check");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->where("tap.assign_id", $data['empid']);
                $this->db->where("tap.active_status", "active");
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(tap.date, '%d-%m-%Y') =", date('d-m-Y'), FALSE);
                }
                $this->db->where("tap.active_status", "active");
                $this->db->where("tap.goto_status", 0);
                $query = $this->db->get();
                $queryarr = array();
                $queryarr = $query->result_array();
                $json = array();
                if ($query->num_rows() > 0) {
                    $json["data"] = array_merge($query0arr, $queryarr);
                    $json["error"] = false;
                    $json["msg"] = "Get Data";
                    $json['fun0'] = 'Followup';
                    $json['fun'] = 'Postpond Payment';
                } else {
                    $json["data"] = [];
                    $json["error"] = false;
                    $json["msg"] = "Data Not Found";
                    $json['fun0'] = 'Followup';
                    $json['fun'] = 'Postpond Payment';
                }

                return json_encode($json);
            } catch (Exception $e) {
                return json_encode([
                    "data" => [],
                    "error" => true,
                    "msg" => "Server Down",
                    "fun0" => "Followup",
                    "fun" => 'Postpond Payment'
                ]);
            }

        } else if ($mode == 3) {
            // get today task -> Active Calls
            try {
                $this->db->select("r.id,r.happynikah_id hnid,r.name name,case when r.gender=1 then 'Male' else 'Female' end gender,case when r.countryCode!=0 then concat(r.countryCode,r.phone) else r.phone end phone,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(d.district,'') native_district,taa.date date,CASE when r.reg_through=0 then 'Website' ELSE CASE when r.reg_through=1 then 'Admin' ELSE 'Mobile App' end end platform");
                $this->db->from("tbl_assign_active_calls taa");
                $this->db->join("tbl_registration r", "r.id=taa.action_check");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->where("taa.assign_id", $data['empid']);
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(taa.date, '%d-%m-%Y') =", date('d-m-Y'), FALSE);
                }
                $this->db->where("taa.active_status", "active");
                $this->db->where("taa.goto_status", 0);
                $query = $this->db->get();
                $json = array();
                if ($query->num_rows() > 0) {
                    $json["data"] = $query->result_array();
                    $json["error"] = false;
                    $json["msg"] = "Get Data";
                    $json['fun0'] = 'Followup';
                    $json['fun'] = 'Postpond Payment';
                } else {
                    $json["data"] = [];
                    $json["error"] = false;
                    $json["msg"] = "Data Not Found";
                    $json['fun0'] = 'Followup';
                    $json['fun'] = 'Postpond Payment';
                }

                return json_encode($json);
            } catch (Exception $e) {
                return json_encode([
                    "data" => [],
                    "error" => true,
                    "msg" => "Server Down",
                    "fun0" => "Followup",
                    "fun" => 'Postpond Payment'
                ]);
            }

        } else if ($mode == 4) {
            // get today task -> Direct Profiles
            try {
                $this->db->select("r.id,r.happynikah_id hnid,r.name name,case when r.gender=1 then 'Male' else 'Female' end gender,case when r.countryCode!=0 then concat(r.countryCode,r.phone) else r.phone end phone,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(d.district,'') native_district,tap.date date,CASE when r.reg_through=0 then 'Website' ELSE CASE when r.reg_through=1 then 'Admin' ELSE 'Mobile App' end end platform");
                $this->db->from("tbl_assign_approve_calls tap");
                $this->db->join("tbl_registration r", "r.id=tap.action_check");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->where("tap.assign_id", $data['empid']);
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(tap.date, '%d-%m-%Y') =", date('d-m-Y'), FALSE);
                }
                $this->db->where("tap.active_status", "active");
                $this->db->like("tap.goto_status", "quick%");
                $query = $this->db->get();
                $json = array();
                if ($query->num_rows() > 0) {
                    $json["data"] = $query->result_array();
                    $json["error"] = false;
                    $json["msg"] = "Get Data";
                    $json['fun0'] = 'Followup';
                    $json['fun'] = 'Postpond Payment';
                } else {
                    $json["data"] = [];
                    $json["error"] = false;
                    $json["msg"] = "Data Not Found";
                    $json['fun0'] = 'Followup';
                    $json['fun'] = 'Postpond Payment';
                }

                return json_encode($json);
            } catch (Exception $e) {
                return json_encode([
                    "data" => [],
                    "error" => true,
                    "msg" => "Server Down",
                    "fun0" => "Followup",
                    "fun" => 'Postpond Payment'
                ]);
            }
        } else if ($mode == 5) {
            // get today task -> Chat Support 
            try {
                $this->db->select("r.id,r.happynikah_id hnid,r.name name,case when r.gender=1 then 'Male' else 'Female' end gender,case when r.countryCode!=0 then concat(r.countryCode,r.phone) else r.phone end phone,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(d.district,'') native_district,tap.date date,CASE when r.reg_through=0 then 'Website' ELSE CASE when r.reg_through=1 then 'Admin' ELSE 'Mobile App' end end platform");
                $this->db->from("tbl_assign_approve_calls tap");
                $this->db->join("tbl_registration r", "r.id=tap.action_check");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->where("tap.assign_id", $data['empid']);
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(tap.date, '%d-%m-%Y') =", date('d-m-Y'), FALSE);
                }
                $this->db->where("tap.active_status", "active");
                $this->db->like("tap.goto_status", "chat%");
                $query = $this->db->get();
                $json = array();
                if ($query->num_rows() > 0) {
                    $json["data"] = $query->result_array();
                    $json["error"] = false;
                    $json["msg"] = "Get Data";
                    $json['fun0'] = 'Followup';
                    $json['fun'] = 'Postpond Payment';
                } else {
                    $json["data"] = [];
                    $json["error"] = false;
                    $json["msg"] = "Data Not Found";
                    $json['fun0'] = 'Followup';
                    $json['fun'] = 'Postpond Payment';
                }

                return json_encode($json);
            } catch (Exception $e) {
                return json_encode([
                    "data" => [],
                    "error" => true,
                    "msg" => "Server Down",
                    "fun0" => "Followup",
                    "fun" => 'Postpond Payment'
                ]);
            }
        } else if ($mode == 6) {
            // get follow up
            try {
                $this->db->select("r.id,r.happynikah_id hnid,r.name name,case when r.gender=1 then 'Male' else 'Female' end gender,case when r.countryCode!=0 then concat(r.countryCode,r.phone) else r.phone end phone,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(d.district,'') native_district,tf.fdate date,CASE when r.reg_through=0 then 'Website' ELSE CASE when r.reg_through=1 then 'Admin' ELSE 'Mobile App' end end platform");
                $this->db->from("tbl_followup tf");
                $this->db->join("tbl_registration r", "r.id=tf.uid");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->where("tf.login_id", $data['empid']);
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(tf.fdate, '%d-%m-%Y') =", date('d-m-Y'), FALSE);
                }
                $this->db->where("tf.delete_status", "Active");
                $query = $this->db->get();
                $json = array();
                if ($query->num_rows() > 0) {
                    $json["data"] = $query->result_array();
                    $json["error"] = false;
                    $json["msg"] = "Get Data";
                    $json['fun'] = 'Postpond Payment';
                } else {
                    $json["data"] = [];
                    $json["error"] = false;
                    $json["msg"] = "Data Not Found";
                    $json['fun'] = 'Postpond Payment';
                }

                return json_encode($json);
            } catch (Exception $e) {
                return json_encode([
                    "data" => [],
                    "error" => true,
                    "msg" => "Server Down",
                    "fun" => 'Postpond Payment'
                ]);
            }

        } else if ($mode == 7) {
            // get postponds
            try {
                $this->db->select("r.id,r.happynikah_id hnid,r.name name,case when r.gender=1 then 'Male' else 'Female' end gender,case when r.countryCode!=0 then concat(r.countryCode,r.phone) else r.phone end phone,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,ifnull(d.district,'') native_district,tpa.postpone_date date,CASE when r.reg_through=0 then 'Website' ELSE CASE when r.reg_through=1 then 'Admin' ELSE 'Mobile App' end end platform");
                $this->db->from("tbl_paymentrequest tpa");
                $this->db->join("tbl_registration r", "r.id=tpa.payment_id");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->where("tpa.login_id", $data['empid']);
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(tpa.postpone_date, '%d-%m-%Y') =", date('Y-m-d'));
                }
                $this->db->where("tpa.delete_status", "Active");
                $query = $this->db->get();
                $json = array();
                if ($query->num_rows() > 0) {
                    $json["data"] = $query->result_array();
                    $json["error"] = false;
                    $json["msg"] = "Get Data";
                    $json['fun'] = 'Postpond Payment';
                } else {
                    $json["data"] = [];
                    $json["error"] = false;
                    $json["msg"] = "Data Not Found";
                    $json['fun'] = 'Postpond Payment';
                }

                return json_encode($json);
            } catch (Exception $e) {
                return json_encode([
                    "data" => [],
                    "error" => true,
                    "msg" => "Server Down",
                    "fun" => 'Postpond Payment'
                ]);
            }

        } else if ($mode == 8) {
            // pending Leads
            try {
                $this->db->select("CAST(tl.id AS UNSIGNED) lid,tl.lead_id leadid,tl.user_name name,CONCAT(IFNULL(countrycode, '+91'), user_phone) phone,tl.staff_id,tl.data_source,tl.created_on date");
                $this->db->from("tbl_lead tl");
                $this->db->where("tl.staff_id", $data['empid']);
                $this->db->where("tl.call_type IN ('Ring','Busy','Swiched off')");
                $this->db->where("tl.lead_id!=", "");
                if ($head == 1) {
                    $this->db->where("STR_TO_DATE(tl.created_on, '%d-%m-%Y') =", date('d-m-Y'), FALSE);
                }

                $query1 = $this->db->get();
                $query1arr = array();
                $query1arr = array_map(function ($item) {
                    $item['lid'] = (int) $item['lid'];  // Convert lid to integer
                    return $item;
                }, $query1->result_array());
                $result = array();
                if (empty($query1arr)) {
                    $result["data"] = $query1arr;
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
                    "data" => [],
                    "error" => true,
                    "msg" => "Server Down",
                    "fun" => "Enter Message",
                ]);
            }
        } else if ($mode == 9) {
            // enter follow up 
            try {
                $this->db->select("tfp.*");
                $this->db->from("tbl_followup tfp");
                $this->db->where("tfp.uid", $data['leadid']);
                $this->db->where("tfp.login_id", $data['empid']);
                $query = $this->db->get();
                if ($query->num_rows() > 0) {
                    $updatearr = array();
                    $updatearr['fdate'] = date('d-m-Y', strtotime($data['followdate']));
                    ;
                    $updatearr['status'] = $data['lead_status'];
                    $updatearr['message'] = $data['message'];
                    $this->db->where("uid", $data['leadid']);
                    $this->db->where("login_id", $data['empid']);
                    $res = $this->db->update("tbl_followup", $updatearr);
                    if ($res) {
                        $result = array('error' => false, 'msg' => 'Follow Up Updated');
                    } else {
                        $result = array('error' => true, 'msg' => 'Failed to update Follow Up');
                    }
                    return json_encode($result);
                } else {
                    $updatearr = array();
                    $updatearr['fdate'] = date('d-m-Y', strtotime($data['followdate']));
                    $updatearr['status'] = $data['lead_status'];
                    $updatearr['message'] = $data['message'];
                    $updatearr['cdate'] = date("Y-m-d H:i:s");
                    $updatearr['cur_date'] = date("Y-m-d");
                    $updatearr['uid'] = $data['leadid'];
                    $updatearr['login_id'] = $data['empid'];
                    $updatearr['delete_status'] = 'Active';
                    $res = $this->db->insert("tbl_followup", $updatearr);
                    if ($res) {

                        $result['error'] = false;
                        $result['msg'] = 'Follow Up Success';

                    } else {

                        $result['error'] = true;
                        $result['msg'] = 'Failed to Follow Up';

                    }
                    return json_encode($result);
                }


            } catch (Exception $e) {
                return json_encode([
                    "error" => true,
                    "msg" => "Server Down",
                ]);
            }

        } else {
            return json_encode([
                "data" => [],
                "error" => true,
                "msg" => "Server Down",
                "fun0" => "Followup",
                "fun" => 'Postpond Payment'
            ]);
        }
    }

    public function Payment()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $mode = $_GET['mode'];
        $head = $_GET['head'];

        if ($mode == 0) {
            $result = array();
            try {
                if ($head == 0) {
                    // check follow up status
                    $this->db->select("tfp.*");
                    $this->db->from("tbl_followup tfp");
                    $this->db->where("tfp.uid", $data['user_id']);
                    $this->db->where("tfp.login_id", $data['empid']);
                    $this->db->where("tfp.status", 'Interested');
                    $this->db->where("STR_TO_DATE(tfp.fdate, '%d-%m-%Y') >=", date('d-m-Y'), FALSE);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) {
                        $result['error'] = true;
                        $result['msg'] = 'Already Followed';
                    } else {
                        $result['error'] = false;
                        $result['msg'] = 'You have to Follow Up';
                    }
                } else if ($head == 1) {
                    // check post pond check

                    // first check enter messaged
                    $this->db->select("tfp.*");
                    $this->db->from("tbl_followup tfp");
                    $this->db->where("tfp.uid", $data['user_id']);
                    $this->db->where("tfp.login_id", $data['empid']);
                    $this->db->where("tfp.status", 'Interested');
                    $this->db->where("STR_TO_DATE(tfp.fdate, '%d-%m-%Y') >=", date('d-m-Y'), FALSE);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) {
                        // check already postponded
                        $this->db->select("tpr.*");
                        $this->db->from("tbl_paymentrequest tpr");
                        $this->db->where("tpr.payment_id", $data['user_id']);
                        $this->db->where("tpr.login_id", $data['empid']);
                        $this->db->where("STR_TO_DATE(tpr.postpone_date, '%d-%m-%Y') >=", date('d-m-Y'), FALSE);
                        $query1 = $this->db->get();
                        if ($query1->num_rows() > 0) {
                            $result['error'] = true;
                            $result['msg'] = 'Already Payment Postponded';
                        } else {
                            $result['error'] = false;
                            $result['msg'] = 'You Have to Payment Postponded';
                        }
                    } else {
                        $result['error'] = true;
                        $result['msg'] = 'You Must have to Follow Up';
                    }
                }
                return json_encode($result);
            } catch (Exception $th) {
                return json_encode([
                    "error" => true,
                    "msg" => "Server Down",
                ]);
            }



        } else if ($mode == 1) {
            // post pond payment 
            try {
                $currentDate = new DateTime();
                $updatearr = array();
                $updatearr['plan_id'] = $data['plan_id'];
                $updatearr['plan_type'] = $data['plan_type'];
                $updatearr['postpone_date'] = date('d-m-Y', strtotime($data['postpone_date']));
                $updatearr['cdate'] = date("Y-m-d H:i:s");
                $updatearr['message'] = $data['message'];
                $updatearr['login_id'] = $data['empid'];
                $updatearr['payment_id'] = $data['payment_id'];//reg id 
                $updatearr['reason'] = $data['reason'];
                $updatearr['delete_status'] = $data['dstatus'];
                $updatearr['paid_status'] = 'UnPaid';
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
                            $result['msg'] = 'Payment Postpond Updated successfully';

                        } else {

                            $result['error'] = true;
                            $result['msg'] = 'Failed to Update Payment Postpond';
                        }
                    } else {
                        $res = $this->db->insert("tbl_paymentrequest", $updatearr);
                        if ($res) {

                            $result['error'] = false;
                            $result['msg'] = 'Payment Postpond successfully';

                        } else {

                            $result['error'] = true;
                            $result['msg'] = 'Failed to Payment Postpond';

                        }
                    }
                } else {

                    $res = $this->db->insert("tbl_paymentrequest", $updatearr);
                    if ($res) {
                        $result['error'] = false;
                        $result['msg'] = 'Payment Postpond Upload successfully';
                        $updateapparr = array();
                        $updateapparr['active_status'] = 'Inactive';
                        $this->db->where("action_check", $data['payment_id']);
                        $this->db->where("assign_id", $data['empid']);
                        $this->db->update("tbl_assign_approve_calls", $updateapparr);

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


        }else if($mode ==2){
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
            if ($json['color'] == 1) {
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
        try {
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
                $this->db->select("plan_id id,plan_name value,duration, plan_strick_amount pamt,contacts,messages,months days");
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
                try {
                    $json = array();
                    $json["error"] = false;
                    $json["msg"] = "";
                    $this->db->select("usertype_id id, user_type value");
                    $this->db->where("status", 1);
                    $this->db->or_where("status", 3);
                    $this->db->from("tbl_usertype");
                    $query = $this->db->get();

                    if ($query->num_rows() > 0) {
                        $json["data"] = $query->result_array();
                    } else {
                        $json["error"] = true;
                        $json["msg"] = "Data Not Found";
                    }
                    return json_encode($json);
                } catch (Exception $th) {
                    return json_encode([
                        "data" => [],
                        "error" => true,
                        "msg" => "Server Down"
                    ]);
                }


            } else if ($mode == 32) {
                try {
                    $json = array();
                    $json["error"] = false;
                    $json["msg"] = "";
                    $this->db->select("id, bodytype value");
                    $this->db->from("tbl_bodytype");
                    $query = $this->db->get();

                    if ($query->num_rows() > 0) {
                        $json["data"] = $query->result_array();
                    } else {
                        $json["error"] = true;
                        $json["msg"] = "Data Not Found";
                    }
                    return json_encode($json);
                } catch (Exception $th) {
                    return json_encode([
                        "data" => [],
                        "error" => true,
                        "msg" => "Server Down"
                    ]);
                }


            } else if ($mode == 33) {
                try {
                    $json = array();
                    $json["error"] = false;
                    $json["msg"] = "";
                    $this->db->select("id,appearance value");
                    $this->db->from("tbl_appearance");
                    $query = $this->db->get();

                    if ($query->num_rows() > 0) {
                        $json["data"] = $query->result_array();
                    } else {
                        $json["error"] = true;
                        $json["msg"] = "Data Not Found";
                    }
                    return json_encode($json);
                } catch (Exception $th) {
                    return json_encode([
                        "data" => [],
                        "error" => true,
                        "msg" => "Server Down"
                    ]);
                }


            }
        } catch (Exception $th) {
            return json_encode([
                "data" => [],
                "error" => true,
                "msg" => "Server Down"
            ]);
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
            $ardata['approve_id'] = $data['empid'];
            $ardata['reason_status'] = $data['reason'];
            $ardata['message'] = $data['message'];
            $ardata['delete_date'] = date('Y-m-d');
            $ardata['pending_status'] = 2;
            $this->db->where("id", $data["user_id"]);
            $res = $this->db->update("tbl_registration", $ardata);
        } else if ($mode == 3) {
            $ardata['status'] = 3;
            $ardata['delete_id'] = $data['empid'];
            $ardata['reason_status'] = $data['reason'];
            $ardata['message'] = $data['message'];
            $ardata['delete_date'] = date('Y-m-d');
            $this->db->where("id", $data["user_id"]);
            $res = $this->db->update("tbl_registration", $ardata);
            if ($res) {
                $updatearr = array();
                $updatearr['empid'] = $data['empid'];
                $updatearr['user_id'] = $data['user_id'];
                $updatearr['actiondesc'] = 'Deleted Profile By';
                $updatearr['date'] = date('Y-m-d');
                $updatearr['status'] = 1;
                $this->db->insert("tbl_staffupdates", $updatearr);
            }
        } else if ($mode == 4) {
            $ardata['status'] = 4;
            $ardata['block_id'] = $data['empid'];
            $ardata['block_status'] = $data['reason'];
            $ardata['block_description'] = $data['message'];
            $ardata['block_date'] = date('Y-m-d');
            $this->db->where("id", $data["user_id"]);
            $res = $this->db->update("tbl_registration", $ardata);
            if ($res) {
                $updatearr = array();
                $updatearr['empid'] = $data['empid'];
                $updatearr['user_id'] = $data['user_id'];
                $updatearr['actiondesc'] = 'Block Profile By';
                $updatearr['date'] = date('Y-m-d');
                $updatearr['status'] = 1;
                $this->db->insert("tbl_staffupdates", $updatearr);
            }
        } else if ($mode == 5) {
            $ardata['status'] = 1;
            $ardata['block_id'] = $data['empid'];
            $ardata['block_status'] = $data['reason'];
            $ardata['block_description'] = $data['message'];
            $ardata['block_date'] = date('Y-m-d');
            $this->db->where("id", $data["user_id"]);
            $res = $this->db->update("tbl_registration", $ardata);
            if ($res) {
                $updatearr = array();
                $updatearr['empid'] = $data['empid'];
                $updatearr['user_id'] = $data['user_id'];
                $updatearr['actiondesc'] = 'UnBlock Profile By';
                $updatearr['date'] = date('Y-m-d');
                $updatearr['status'] = 1;
                $this->db->insert("tbl_staffupdates", $updatearr);
            }
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
                    if ($res) {
                        $updatearr = array();
                        $updatearr['empid'] = $data['empid'];
                        $updatearr['user_id'] = $data['user_id'];
                        $updatearr['actiondesc'] = 'UnHide Profile By';
                        $updatearr['date'] = date('Y-m-d');
                        $updatearr['status'] = 1;
                        $this->db->insert("tbl_staffupdates", $updatearr);
                    }
                } else {
                    $arrdata["hide_status"] = 1;
                    $res = $this->db->update("tbl_hideprofile", $arrdata);
                    if ($res) {
                        $updatearr = array();
                        $updatearr['empid'] = $data['empid'];
                        $updatearr['user_id'] = $data['user_id'];
                        $updatearr['actiondesc'] = 'Hide Profile By';
                        $updatearr['date'] = date('Y-m-d');
                        $updatearr['status'] = 1;
                        $this->db->insert("tbl_staffupdates", $updatearr);
                    }
                }

            } else {
                $arrdata['user_id'] = $data["user_id"];
                $arrdata['hide_status'] = 1;
                $arrdata['emp_id'] = $data['empid'];
                $arrdata['hide_date'] = date('Y-m-d');
                $arrdata['hide_description'] = $data['message'];
                $res = $this->db->insert("tbl_hideprofile", $arrdata);
                if ($res) {
                    $updatearr = array();
                    $updatearr['empid'] = $data['empid'];
                    $updatearr['user_id'] = $data['user_id'];
                    $updatearr['actiondesc'] = 'Hide Profile';
                    $updatearr['date'] = date('Y-m-d');
                    $updatearr['status'] = 1;
                    $this->db->insert("tbl_staffupdates", $updatearr);
                }
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
            $arrdata['session_id'] = $data["empid"];
            $arrdata['payment_staff_id'] = $data["empid"];
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
        } else if ($mode == 8) {
            // UnDelete Profile
            $ardata['status'] = 1;
            $ardata['delete_id'] = $data['empid'];
            $ardata['reason_status'] = $data['reason'];
            $ardata['message'] = $data['message'];
            $ardata['delete_date'] = date('Y-m-d');
            $this->db->where("id", $data["user_id"]);
            $res = $this->db->update("tbl_registration", $ardata);
            if ($res) {
                $updatearr = array();
                $updatearr['empid'] = $data['empid'];
                $updatearr['user_id'] = $data['user_id'];
                $updatearr['actiondesc'] = 'UnDelete Profile By';
                $updatearr['date'] = date('Y-m-d');
                $updatearr['status'] = 1;
                $this->db->insert("tbl_staffupdates", $updatearr);
            }
        } else if ($mode == 9) {
            // Change Password
            $ardata['status'] = 1;
            $ardata['emp_id'] = $data['empid'];
            $ardata['password'] = md5($data['message']);
            $ardata['message'] = 'Password Changed';
            $ardata['changedate'] = date("Y-m-d H:i:s");
            $this->db->where("user_id", $data["user_id"]);
            $res = $this->db->update("tbl_userlogin", $ardata);
            if ($res) {
                $updatearr = array();
                $updatearr['empid'] = $data['empid'];
                $updatearr['user_id'] = $data['user_id'];
                $updatearr['actiondesc'] = 'Password Changed By';
                $updatearr['date'] = date('Y-m-d');
                $updatearr['status'] = 1;
                $this->db->insert("tbl_staffupdates", $updatearr);
            }
        } else if ($mode == 10) {
            // DELETE Image
            $res = $this->ModifyImg($data);
            if ($res) {
                $updatearr = array();
                $updatearr['empid'] = $data['empid'];
                $updatearr['user_id'] = $data['user_id'];
                $updatearr['actiondesc'] = 'Image Deleted By';
                $updatearr['date'] = date('Y-m-d');
                $updatearr['status'] = 1;
                $this->db->insert("tbl_staffupdates", $updatearr);
            }
        } else if ($mode == 11) {
            // SET Profile Image
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
            if ($res) {
                $updatearr = array();
                $updatearr['empid'] = $data['empid'];
                $updatearr['user_id'] = $data['user_id'];
                $updatearr['actiondesc'] = 'Set Profile Image By';
                $updatearr['date'] = date('Y-m-d');
                $updatearr['status'] = 1;
                $this->db->insert("tbl_staffupdates", $updatearr);
            }
        } else if ($mode == 12) {
            // UPLOAD PROFILE IMAGES
            $res = $this->UploadImageServer();

        } else if ($mode == 13) {
            // SEND NOTIFICATION WHEN USER NOT PROFILE IMAGE
            $this->db->select("r.id,r.photo,t.firebase_token,r.staff_id");
            $this->db->from("tbl_registration r");
            $this->db->join("tbl_firebase_token t", "r.id=t.user_id", "left");
            $this->db->where("r.photo=", '');
            $this->db->where("r.status!=", 3);
            $this->db->where("t.firebase_token!=", '');
            $this->db->where("t.firebase_token IS NOT NULL");
            $this->db->where("r.id", 36030);
            $this->db->group_by("r.id");
            $query = $this->db->get();
            
            echo $this->db->last_query();
            // if ($query->num_rows() > 0) {
            //     $json = array();
            //     $json = $query->result_array();
            //     // print_r($json);
            //     foreach ($json as $profile) {
            //         $token = $profile['firebase_token']; // Access firebase_token
            //          $this->sendPushNotification($token, 'Happy Nikah', 'Upload your profile picture to make a lasting impression!', $data['empid'], '7');
            //         if ( $profile['staff_id'] != 0 && $profile['staff_id'] != '' &&    $profile['staff_id'] != null) {
            //          $res= $this->AddNotification($profile['staff_id'],$profile['id'], "Profile Image is Not Uploaded"); //photo request
            //         }
            //     }
            // }


        }

        $jsonres = array();
        if ($res) {
            $jsonres["status"] = "1";
            $jsonres["error"] = false;
            $jsonres["msg"] = "Success";
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
            $jsondata['error'] = false;
            $jsondata['msg'] = "Profile Updated";

            $updatearr = array();
            $updatearr['empid'] = $data['empid'];
            $updatearr['user_id'] = $data['user_id'];
            $updatearr['actiondesc'] = $data['header'] . ' Profile Part is Updated By ';
            $updatearr['date'] = date('Y-m-d');
            $updatearr['status'] = 1;
            $this->db->insert("tbl_staffupdates", $updatearr);

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

            return json_encode($jsondata);
        }
    }

    function smsotp($msg, $mobile)
    {
        // $templateid = 1607100000000205213;
        // $url = 'https://2factor.in/API/V1/7a8571c8-ed69-11ec-9c12-0200cd936042/SMS/' . $mobile . '/OTP+VERIFICATION';
        $url = 'https://2factor.in/API/R1/?module=TRANS_SMS&apikey=7a8571c8-ed69-11ec-9c12-0200cd936042&to=' . $mobile . '&from=SYSOLS&templatename=OTP+Template&var1=' . $msg . '&var3=happynikah.com';

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

    // SEARCH PROFILE
    public function Search()
    {
        $json = file_get_contents('php://input');
        //print_r($json);
        //echo "Name:".$json["Name"];
        $data = json_decode($json, true);

        $maritalStatus = [0 => "All", 1 => "Unmarried", 2 => "Divorced", 3 => "Widow"];

        try {
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

            $this->db->select("r.id,r.name,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,case when r.gender =1 then 'Male' else 'Female' end gender,
                            ifnull(c.caste,'') belief,case when photo='' then case when r.gender =1 then 'male.png' else 'female.png' end else case when u.status=2 then  photo else 'male.png' end end photo ,
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
                $this->db->or_where("phone", $data['happynikah_id']);
            } else {
                // 
                // $this->db->where("r.id not in (select receiver_id from tbl_ignored where sender_id='" . $id . "')");
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

            $this->db->order_by("convert(case when u.status=2 then  1 else 2 end,decimal),r.age");
            $this->db->group_by('r.id');

            $query = $this->db->get();
            $json = array();
            if ($query->num_rows() > 0) {
                $json['error'] = false;
                $json['msg'] = "Get Data";
                $json['data'] = $query->result_array();
                $id = $json['data'][0]['id'];
                $this->db->select("r.id,pl.plan_name planname,ifnull((p.contactbalance+p.addoncontact-p.leftcontact),0) contacts,ifnull((p.messagebalance+p.addonmessage),0) messages,count(v.sender_id) totviewed,p.date activationdate,p.expiry_date expirydate,CASE WHEN ifnull(DATEDIFF(p.expiry_date, CURDATE()),'0') > 0 THEN ifnull(DATEDIFF(p.expiry_date, CURDATE()),'0') ELSE 0 END daysleft,CASE WHEN p.user_id IS NULL THEN 'Unpaid' WHEN p.expiry_date < CURDATE() THEN 'Expired' ELSE 'Paid'END premium");
                $this->db->from("tbl_registration r");
                $this->db->join("tbl_payement p", "r.id=p.user_id and p.status=1", "left");
                $this->db->join("tbl_plan pl", "pl.plan_id=p.plan_id", "left");
                $this->db->join("tbl_contact_viewed v", "v.sender_id=r.id and v.planid=p.id", "left");
                $this->db->where("r.id", $id);
                $query2 = $this->db->get();
                $this->db->select("distinct (receiver_id) totmessage");
                $this->db->from("tbl_chating");
                $this->db->join("tbl_payement p", "tbl_chating.sender_id=p.user_id and p.id=tbl_chating.planid and p.status=1 ");
                $this->db->where("sender_id", $id);
                $this->db->group_by("receiver_id");
                $totmsg2 = $this->db->get();
                $query2arr = $query2->row_array();
                $premium = array();
                $premium['planname'] = $query2arr["planname"];
                $premium['paymentstatus'] = $query2arr["premium"];
                $premium['contacts'] = (string) ($query2arr["totviewed"] . '/' . $query2arr["contacts"]);
                $premium['messages'] = (string) ($totmsg2->num_rows() . '/' . $query2arr["messages"]);
                $premium["daysleft"] = $query2arr["daysleft"];
                $premium["activationdate"] = $query2arr["activationdate"];
                $premium["expirydate"] = $query2arr["expirydate"];
                $json['premium'] = $premium;
            } else {
                $json = [
                    array("error" => false, "msg" => "Data Not Found")
                ];
                // $json["error"] = true;
                // $json["msg"] = "Data Not Found";
            }
            return json_encode($json);
        } catch (Exception $th) {
            $json = [
                array("error" => true, "msg" => "Server Down")
            ];
            return json_encode($json);
        }


    }

    // PROFILE MODULES 
    public function ProfileModule()
    {
        error_reporting(0);
        ini_set('display_errors', '1');
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $mode = $_GET['mode'];
        $head = isset($_GET['head']) ? $_GET['head'] : "";
        try {
            if ($mode == 0) {
                # PROFILE  HEADER PART


                $this->db->select("r.id,r.happynikah_id,name,concat( CASE WHEN r.dob IS NULL THEN r.age ELSE CASE when YEAR(r.dob) > 1950 THEN TIMESTAMPDIFF(YEAR,r.dob,CURDATE()) ELSE r.age END END,' Yrs') age,case when r.gender =1 then 'Male' else 'Female' end gender,ifnull(h.height,'') height,ifnull(sub_caste,'') belief,native_place,ifnull(d.district,'') native_district,ifnull(tp.profession_name,'') job,case when photo='' then case when r.gender =1 then 'male.png' else 'female.png' end else case when u.status=2 then  photo else 'male.png' end end photo,group_concat(u.user_image) gallery,case when u.user_id IS NUll then 0 else 1 end as imgflag,case when ifnull(py.user_id,0)!=0 then 1 else 0 end premium,ul.is_online status,r.reg_date", false);
                $this->db->from("tbl_registration r");
                $this->db->join("tbl_subcaste c", "c.sid=r.caste", "left");
                $this->db->join("tbl_profession tp", "tp.profession_id=r.occupation", "left");
                $this->db->join("tbl_district d", "d.district_id=r.native_district", "left");
                $this->db->join("tbl_height h", "h.height_id=r.height", "left");
                $this->db->join("tbl_payement py", "py.user_id=r.id and py.expiry_date>NOW() and py.status=1", "left");
                $this->db->join("tbl_userimages u", "u.user_id=r.id AND u.user_id =r.id AND u.status !=1", "left");
                // $this->db->join("tbl_userimages u", "u.user_id=r.id" , "left");
                $this->db->join("tbl_userlogin ul", "ul.user_id=r.id", "left");


                $this->db->where("r.id", $data['user_id']);
                // $this->db->where("u.status !=", 1);
                $result = array();
                $query = $this->db->get();
                if ($query->num_rows() > 0) {
                    $result['data'] = $query->row_array();
                    // $json = array();
                    // $json = $res;
                    $gallery = $result['data']['gallery'];
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
                    $result['gallery'] = $arrdata;
                    $result["error"] = false;
                    $result["msg"] = "Get Data";
                } else {
                    $result["error"] = false;
                    $result["msg"] = "Data Not Found";
                }
                return json_encode($result);

            } else if ($mode == 1) {
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
                $this->db->where("r.id", $data['user_id']);
                $query = $this->db->get();
                $resutl = $query->row_array();
                // print_r($resutl);
                $arrdata = array();
                $subhead = "";
                $result = array();
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
                $result['info'] = $arrdata;
                $result['online'] = $resutl['is_online'];
                $result['error'] = false;
                $result['msg'] = "Get Data";
                return json_encode($result);
            } else if ($mode == 2) {
                $head = isset($data['head']) ? $data['head'] : "";
                //echo $head;
                //die('ere');
                return $this->EditMyProfileInfo($data['user_id'], $head);
            }





        } catch (\Throwable $th) {
            $result = [
                array("error" => true, "msg" => "Server Down")
            ];
            return json_encode($result);
        }

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

    public function UploadImageServer()
    {
        try {
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
                // return json_encode($jsondata);
                return false;
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
                        // $this->db->update("tbl_registration", $uploaddata);
                        $multiupload = array();
                        $multiupload['user_id'] = $data['user_id'];
                        $multiupload['status'] = 2;
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
                    // return json_encode($jsondata);
                    $updatearr = array();
                    $updatearr['empid'] = $data['empid'];
                    $updatearr['user_id'] = $data['user_id'];
                    $updatearr['actiondesc'] = 'Upload Image By';
                    $updatearr['date'] = date('Y-m-d');
                    $updatearr['status'] = 1;
                    $this->db->insert("tbl_staffupdates", $updatearr);
                    return true;
                    // }

                }
                return true;

            }
        } catch (Exception $th) {
            return false;
        }

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
        $serviceAccountPath = $filePath;
        // Create credentials
        $credentials = new ServiceAccountCredentials($scopes, $serviceAccountPath);
        $request = new \Google\Auth\HttpHandler\Guzzle6HttpHandler(new Client());

        // Refresh the credentials to generate an access token
        $credentials->fetchAuthToken($request);
        return $credentials->getLastReceivedToken()['access_token'];
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
                'Authorization: Bearer ' . $accessToken
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

    public function AddNotification($empid, $userid, $message)
    {
        $updatearr = array();
        $updatearr["date"] = date("Y-m-d");
        $updatearr["message"] = $message;
        $updatearr['empid'] = $empid;
        $updatearr['user_id'] = $userid;
        $updatearr['status'] = 1;
        $res =  $this->db->insert("tbl_staffnotification", $updatearr);
        return $res;
    }
    public function Notication(){
        error_reporting(0);
        ini_set('display_errors', '1');
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $mode = $_GET['mode'];
        
    }

}
