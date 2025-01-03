<!DOCTYPE html>
<?php include('header.php'); ?>


 <?php 
 if($_SESSION['user_type']==='13')
{
 include('menusuperadmin.php');	   
}

else
{
 include('menuservice.php');   
}
?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

<style>
.msginput{
    height:500px;
    width:500px;
    word-break: break-word;
}
</style>

<style>
            
            .liststyle {
            list-style: none;
            font-size: 20px;
            color: #292727;
        }
        
        li span .content {
            color: black;
        }
        
        .afour {
            background: #ffffff url('../images/icon2.png') center;
            background-repeat: no-repeat;
            /* background-blend-mode: light; */
        }
        
        .co {
            justify-content: end;
        }
        
        .printbutton {
            width: 200px;
            height: 60;
            border-radius: 0;
            justify-content: end;
            right: 0;
            margin-left: 600px;
        }
        
        .please h5 {
            color: #484343;
        }
        
        </style>

<div class="app-wrapper">

				<div class="app-content pt-3 p-md-3 p-lg-4">
				<div class="container-xl">

				<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
				<h1 class="app-page-title mb-0" style="margin-left: 50px;">PDF Creation</h1>
				</div>

				<!-- Main content -->
				<section class="content">
				<div class="container-fluid">
				<div class="row">
				<div class="col-12">

				<div class="card">
				<!-- <div class="card-header">
				<h3 class="card-title">DataTable with default features</h3>
				</div> -->
				<!-- /.card-header -->
				<div class="card-body">

				<div class="row">
				<div class="col-lg-4" style="margin-left: 25px;">
				    
				<form method="post" action="<?= base_url() ?>admin/pdfcreation">
				<div class="form-group">
				<label for="inputName">ID/Contact No. <font color="red">*</font></label>
				<input type="text" id="inputName" class="form-control" name="search_profile" required>
				<span id="error" style="color:red;display:none;">Please insert Happynikah ID/Mobile No.</span>
				</div>
				</div>
				<div class="col-lg-6" style="margin-top: -6px;">
				<!-- <div class="form-group"> -->

				<label for="inputName">&nbsp;</label>
				<!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
				<button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button" style="margin-top: 32px;">
				<i class="fas fa-search"></i>
				</button>
				</form>
				
				<button onclick="window.location.href='<?= base_url() ?>admin/pdfcreation'" name="search_profile_btn" class="btn btn-danger" style="margin-top: 32px;">
				<i class="fa fa-undo" aria-hidden="true"></i>
				</button>
				<!-- </div> -->
				</div>
				</div>
				<br>
				<?php
		   	if(empty($get_search_profiles)){
            echo "Please Enter Valid Phone Number / ID";
			} 
			else
			{  
			    $r_id = $get_search_profiles->id;
				$happynikah_id = $get_search_profiles->happynikah_id;
				$name = $get_search_profiles->name;
				$age = $get_search_profiles->age;
				$phone = $get_search_profiles->phone;
				$add= $get_search_profiles->address;
				$add= $get_search_profiles->age;
				$marital_status = $get_search_profiles->marital_status;
                $color = $get_search_profiles->color;
                $appearance = $get_search_profiles->appearance;
                $photo = $get_search_profiles->photo;
                 
				if($get_search_profiles->gender == '1')
				{
				$gender = "Male";
				}
				else
				{
				$gender = "Female";
				}
				$address = $get_search_profiles->address;
				$reg_date = $get_search_profiles->reg_date;

				if($get_search_profiles->reg_through == '0' || 
				$get_search_profiles->reg_through == '2')
				{
				$reg_through = "Customer Registered";
				}
				else 
				{
				$reg_through = "Staff Registered";
				}

				if($get_search_profiles->status == '0')
				{
				$status = "Pending";
				} 
				elseif ($get_search_profiles->status == '1')
				{
				$status = "Approved";
				} 
				elseif ($get_search_profiles->status == '2') 
				{
				$status = "Rejected";
				} 
				elseif ($get_search_profiles->status == '3') 
				{
				$status = "Deleted";
				}
				elseif ($get_search_profiles->status == '4') 
				{
				$status = "Block";
				}
				elseif ($get_search_profiles->status == '5')
				{
				$status = "UnBlock";
				}

				?>
				
				
				
				
				
			
				
				  <div class="card m-4 afour"  style="width: 21cm;height:17.9cm">
                          <div class="card-body">
                            <div class="container ">
                                <div class="row d-flex align-items-baseline">
                                    <div class="col-xl-9">
                                    <p style="color: #7e8d9f;font-size: 20px;">Happy Nikah </strong></p>
                                    </div>
                                </div>
                                   
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="container">
                                                <img src="<?php echo base_url();?>../assets/photo_storage/<?php echo $photo;?>"
                                                    class="w-100px rounded-3" width = "130px" height="auto" alt="happy nikah profile" />
                                                <!-- <img src="https://play-lh.googleusercontent.com/1HAD9v4Umebo3CutyVGITAdhMygd6ewxTrwpKgYjrEK_6L4C96Str_t38KPFW1iGOKAs=w240-h480-rw"
                                                    class="w-100px rounded-3" width = "120px" height="160px" alt="happy nikah profile" /> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="container">
                                                <ul class="liststyle">
                                                    <li class=" text1"><span class ="content" style="color:#8f8061 ;"><b> <?php echo $name;?></b></span></li>
                                                    <li class=" text1"> <span  class ="content"><?php echo $happynikah_id;?></span> </li>
                                                    <li class=" text1"> <span  class ="content"><?php echo $phone;?></span></li>
                                                    <li class=" text1"> <span  class ="content"><?php echo $add;?></span></li>
                                                    <li class=" text1"> <span  class ="content"><?php echo $gender;?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                               <div class="row" style="margin-top: 50px;">
                                <div class="col-sm-4">
                                    <ul  class="liststyle">
                                        <li class=" text1"><span class ="title"><b> Age </b></span></li>
                                      
                                        <li class=" text1"><span class ="title"><b>Belief </b></span></li>
                                        <li class=" text1"><span class ="title"><b>Marital Status</b></span></li>
                                        <li class=" text1"><span class ="title"><b>Height </b></span></li>
                                        <li class=" text1"><span class ="title"><b>Weight </b></span></li>
                                        <li class=" text1"><span class ="title"><b>Skin Color </b></span</li>
                                        <li class=" text1"><span class ="title"><b>Appearance</b> </span></li>
                                        <li class=" text1"><span class ="title"><b>Family Type </b></span></li>
                                        <li class=" text1"><span class ="title"><b>Financial Status</b></span></li>
                                         <li class=" text1"><span class ="title"><b>Education</b></span></li>
                                          <li class=" text1"><span class ="title"><b>Profession</b></span></li>
                                    </ul>
                                </div>
                                <div class="col-sm-1">
                                  
                                    <ul  class="liststyle">
                                        <li class=" text1">:</li>
                                    
                                        <li class=" text1">:</li>
                                        <li class=" text1">:</li>
                                        <li class=" text1">:</li>
                                        <li class=" text1">:</li>
                                        <li class=" text1">:</li>
                                        <li class=" text1">:</li>
                                        <li class=" text1">:</li>
                                        <li class=" text1">:</li>
                                         <li class=" text1">:</li>
                                        <li class=" text1">:</li>
                                    </ul>
                                    
                                </div>
                                <div class="col-sm-7">
                                    <ul  class="liststyle">
                                
                        <?php  $dataothers= $this->db->select('r.*, ed.edu_id, ed.education as edn, p.profession_id, p.profession_name, c.cid, c.caste as castename, 
                        h.height_id, h.height as hname, w.weight_id, w.weight as wname, f.user_id, f.familytype, f.financial_status')
                        ->from('tbl_registration as r')
                        ->join('tbl_education as ed', 'ed.edu_id = r.education', 'left')
                        ->join('tbl_profession as p', 'p.profession_id = r.occupation', 'left')
                        ->join('tbl_caste as c', 'c.cid = r.caste', 'left')
                        ->join('tbl_height as h', 'h.height_id = r.height', 'left')
                        ->join('tbl_weight as w', 'w.weight_id = r.weight', 'left')
                        ->join('tbl_familyprofile as f', 'f.user_id = r.id', 'left')
                        ->where('r.happynikah_id', $happynikah_id)
                        ->where('r.phone', $phone)
                        ->get()->result_array();?>
                                        
                                        <?php foreach($dataothers as $others)
                                        {?>
                                        <li class=" text1"><span class ="data"><?php echo $age;?></span></li>
                                        
                                        
                                   
                                        <li class=" text1"><span class ="data">
                                            
                                        <?php if (!empty($others['castename'])) {?>
                                            <?php echo $others['castename'];?>
                                             <?php }?>
                                             
                                             <?php if (empty($others['castename'])) {?>
                                            <?php echo "NULL";?>
                                             <?php }?>
                                        
                                        </span></li>
                                        <li class=" text1"><span class ="data"><?php echo $marital_status;?></span></li>
                                        <li class=" text1"><span class ="data">
                                            <?php if (!empty($others['hname'])) {?>
                                            <?php echo $others['hname'];?>
                                             <?php }?>
                                             
                                             <?php if (empty($others['hname'])) {?>
                                            <?php echo "NULL";?>
                                             <?php }?>
                                             
                                            </span>
                                            
                                           
                                            </li>
                                        <li class=" text1"><span class ="data">
                                            
                                         <?php if (!empty($others['wname'])) {?>
                                        <?php echo $others['wname'];?>
                                        <?php }?>
                                             
                                             <?php if (empty($others['wname'])) {?>
                                            <?php echo "NULL";?>
                                             <?php }?>
                                             
                                            </span></li>
                                        <li class=" text1"><span class ="data">
                                        <?php echo $color;?>
                                        
                                        </span></li>
                                        <li class=" text1"><span class ="data"><?php echo $appearance;?></span></li>
                                        <li class=" text1"><span class ="data">
                                           
                                             <?php if (!empty($others['familytype'])) {?>
                                        <?php echo $others['familytype'];?>
                                        <?php }?>
                                        
                                           <?php if (empty($others['familytype'])) {?>
                                        <?php echo "NULL";?>
                                        <?php }?>
                                        
                                           
                                      
                                            
                                            </span></li>
                                        <li class=" text1"><span class ="data">
                                            
                                            
                                    <?php if (!empty($others['financial_status'])) {?>
                                    <?php echo $others['financial_status'];?>
                                    <?php }?>
                                    
                                    <?php if (empty($others['financial_status'])) {?>
                                    <?php echo "NULL";?>
                                    <?php }?>
                                        
                                    
                                            
                                            </span></li>
                                        
                                         <li class=" text1"><span class ="data">
                                             
                                          <?php if (!empty($others['edn'])) {?>
                                    <?php echo $others['edn'];?>
                                    <?php }?>
                                    
                                    <?php if (empty($others['edn'])) {?>
                                    <?php echo "NULL";?>
                                    <?php }?>
                                             
                                             </span></li>
                                        <li class=" text1"><span class ="data">
                                            
                                            
                                              <?php if (!empty($others['profession_name'])) {?>
                                    <?php echo $others['profession_name'];?>
                                    <?php }?>
                                    
                                    <?php if (empty($others['profession_name'])) {?>
                                    <?php echo "NULL";?>
                                    <?php }?>
                                             
                                             
                                          </span></li>
                                        
                                        <?php }?>
                                        
                                    </ul>
                                </div>
                               </div>
                                
                            </div>
                        </div>
                       
                    </div>
                    
	
				</td>
				</tr>
				</tbody>
				</table>


				<!-- <a target="_blank" id="verifyemail" class="btn btn-success">verify email</a> -->
				<!-- <a target="_blank" id="hideprofile" class="btn btn-success">hide profile</a> -->
				<!-- <a target="_blank" id="message" class="btn btn-success">enter message</a> -->
				<!-- <a target="_blank" id="blockuser" class="btn btn-success">block</a> -->
				<!-- <a target="_blank" id="deleteuser" class="btn btn-success">delete</a> -->

				<!-- <a target="_blank" id="changepassword" class="btn btn-success">change password</a> -->
				<!-- <a target="_blank" id="interest" class="btn btn-success">interest details</a> -->

				</div>
				
			
				<form method="post" action="<?= base_url() ?>admin/generate-pdf-file">
			
			
				<input type="hidden" id="inputName" class="form-control" name="search_profile" value="<?php echo $happynikah_id;?>" required>
				
				<!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
				<button type="submit" name="search_profile_btn" target="_blank" class="pull-right btn btn-success" id="search_button"  
				style="margin: 2px;width: 142px;margin-top: 0px;margin-bottom: 30px;color: white;margin-right: 340px;">
			    Download PDF
				</button>
				</form>	
				
				
              <!-- <a href="<?php site_url();?>generate-pdf-file/" target="_blank"  class="pull-right btn btn-primary btn-xs" -->
              <!-- style="margin: 2px;width: 142px;margin-top: 22px;margin-bottom: 33px;color: white;margin-left: 700px;">-->
              <!--<i class="fa fa-plus"></i> -->
              <!-- Download PDF</a> -->


				<?php
				}  
				?>

				</div>
				<!-- /.card-body -->
				</div>
				<!-- /.card -->
				</div>
				<!-- /.col -->
				</div>
				<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
				</section>
				<!-- /.content -->
				</div>
				<!-- /.content-wrapper -->

				<!-- modals of search page  -->




            
            <!--<div class="co">-->
            <!--<button onclick="" name="print" class="btn btn-primary printbutton" style="margin-top: 5px; color:white;"><svg xmlns="http://www.w3.org/2000/svg" fill="white" height="30" viewBox="0 96 960 960" width="30"><path d="M644 430.615v-124H316v124h-66v-190h460v190h-66Zm-480.923 66h633.846-633.846Zm522.038 120q20.5 0 35-15t14.5-35.5q0-20.5-14.375-35t-35.625-14.5q-20 0-35 14.375t-15 35.625q0 20 15 35t35.5 15ZM644 870V736.462H316V870h328Zm66 66H250V782H97.077V536.615q0-44 31.077-75t74.923-31h553.846q44 0 75 31t31 75V782H710v154Zm86.923-220V537q0-17.385-11.212-28.885-11.213-11.5-27.788-11.5H203.077q-17 0-28.5 11.5t-11.5 28.5V716H250v-45.539h460V716h86.923Z"/></svg> &nbsp;print</button>-->
            <!--</div>-->


               

                <!-- Modal for enter message -->
                
                <form id="contact"  method="post" action="<?php echo base_url(); ?>admin/followup_register" onsubmit="setTimeout(function(){window.location.reload();},10);">
                <div class="modal fade" id="enterMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                
                <h5 class="modal-title" id="exampleModalLongTitle">Enter Message
                
                <!--  <?php echo $this->session->userdata('user_id_admin');?>  -->
                
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
     
                <!--   <input type="hidden" name="update_id" id="update_id"/> -->
                
                <div class="modal-body">
                <div class="mb-3">
                <label for="inputName" class="form-label">Status</label>
                <select id="status" class="form-control custom-select" name="status">
                <option value="Interested" name="status">Interested / Follow up</option>
                <option value="Ring" name="status">Ring not respond (RNR) </option>
                <option value="busy" name="status">Busy / call back</option>
                <option value="Add comments" name="status">Add Comments</option>
                <option value="Switched" name="status">Switched off</option>
                </select>
                </div>
                
                <div class="mb-3" id="follow">
                <label for="setting-input-3" class="form-label">Follow up date</label>			
                <input type="text" id="noSunday" name="fdate">
                </div>
                
                
                <div class="mb-3" id="follow2" style="display:none">
                <label for="setting-input-3" class="form-label">Follow up date</label>		
                <input type="text" id="noSunday2" name="fdate">
                </div>
                
                <div class="mb-3">
                <label for="inputName" class="form-label">Message</label>
                <textarea id="message" class="form-control"
                required="" name="message"
                style="height: 160px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>
                </textarea>
                
                <!--<?php echo $this->session->userdata('user_id_admin');?>-->
                
                </div>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="update_id" id="update_id"  
                value="<?php echo $get_search_profiles->id;?>">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit"  id="save-project-btn3"  name="register" class="btn btn-primary">Save changes</button>
                
                </div>
                </div>
                </div>
            
                </div>
                </form>
                    

		<script type="text/javascript">
		$(document).ready(function() {

		$(function() {
		$( "#my_date_picker" ).datepicker();
		});
		})
		</script>

		<!-- end modal for enter message  -->
		<!-- modal for delete  -->
		<form id="contactdelete" method="post" action="<?php echo base_url(); ?>admin/profile_delete" onsubmit="setTimeout(function(){window.location.reload();},800);">
        <div class="modal fade" id="deletecnt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Profile Delete</h5>

        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body"> 
            
        <div class="mb-3">
        <label for="inputName" class="form-label">Status</label>
        <select id="reason_status" class="form-control custom-select" name="reason_status">
        <option value="">--select--</option>
        <option value="Profile Contains Abusive Contents(Vulgar or racist)">Profile Contains Abusive Contents(Vulgar or racist)</option>
        <option value="Vulgar/Invalid Photos">Vulgar/Invalid Photos</option>
        <option value="Invalid Data">Invalid Data</option>
        <option value="Invalid Contact Details">Invalid Contact Details</option>
        <option value="Contact number/link mentioned in restricted fields">Contact number/link mentioned in restricted fields</option>
        <option value="Multiple/Duplicate profiles">Multiple/Duplicate profiles</option>
        <option value="Fake Profiles">Fake Profiles</option>
        <option value="Abnormal Activity Found">Abnormal Activity Found</option>
        <option value="Marriage Fixed">Marriage Fixed</option>
        <option value="Minor Profiles">Minor Profiles</option>
        <option value="Others">Others</option>
        </select>
        </div>

        <div class="mb-3">
        <label for="inputName" class="form-label">Message</label>
        <textarea id="message" class="form-control" required="" name="message">
    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>
   
    
        </textarea>
        </div>
        </div>
        <div class="modal-footer">

        <input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
       <input type="hidden" name="session" 
       value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
        </button>
       <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->

       <button type="submit" class="btn btn-primary"  id="btn_update<?php echo $get_search_profiles->id; ?>"
       >Save changes
       </button>

        </div>
       
        </div>
        </div>
        </div>
        </div>
        </form>
        
        <!--Modal for Approve profile-->
        <form id="approveprofiledata" method="post" action="<?php echo base_url(); ?>admin/profile_approvel" onsubmit="setTimeout(function(){window.location.reload();},800);">
        <div class="modal fade" id="approveprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Approve Profile</h5>

        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body"> 
            
        <div class="mb-3">
        <!--<label for="inputName" class="form-label">Status</label>-->
        <!--<select id="reason_status" class="form-control custom-select" name="reason_status">-->
        <!--<option value="">--select--</option>-->
        <!--<option value="Profile Contains Abusive Contents(Vulgar or racist)">Profile Contains Abusive Contents(Vulgar or racist)</option>-->
        <!--<option value="Vulgar/Invalid Photos">Vulgar/Invalid Photos</option>-->
        <!--<option value="Invalid Data">Invalid Data</option>-->
        <!--<option value="Invalid Contact Details">Invalid Contact Details</option>-->
        <!--<option value="Contact number/link mentioned in restricted fields">Contact number/link mentioned in restricted fields</option>-->
        <!--<option value="Multiple/Duplicate profiles">Multiple/Duplicate profiles</option>-->
        <!--<option value="Fake Profiles">Fake Profiles</option>-->
        <!--<option value="Abnormal Activity Found">Abnormal Activity Found</option>-->
        <!--<option value="Marriage Fixed">Marriage Fixed</option>-->
        <!--<option value="Minor Profiles">Minor Profiles</option>-->
        <!--<option value="Others">Others</option>-->
        <!--</select>-->
        
        <label for="inputName" class="form-label">Status</label>
		<select id="reason_status" class="form-control custom-select reason_status" name="reason_status" required="required">
		<option value="">--select--</option>
		<option value="Interested To Login">Interested To Login</option>
		<option value="Others">Others</option>
		</select>
		
        </div>

        <div class="mb-3">
        <label for="inputName" class="form-label">Message</label>
        <textarea id="message" class="form-control" required="" name="message">
    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>
   
    
        </textarea>
        </div>
        </div>
        <div class="modal-footer">

        <input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
       <input type="hidden" name="session" 
       value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
        </button>
       <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->

       <button type="submit" class="btn btn-primary"  id="btn_update<?php echo $get_search_profiles->id; ?>"
       >Save changes
       </button>

        </div>
       
        </div>
        </div>
        </div>
        </div>
        </form>

		<!-- modal for block -->
		<div class="modal fade" id="block_" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">Block Profile</h5>
		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<div class="mb-3">

		<label for="inputName" class="form-label">Status</label>
		<select id="block_status" class="form-control custom-select" name="block_status"
		required="required">
		<option value="">---select---</option>
		<option value="Profile Contains Abusive Contents ( Vulgar or racist )">Profile Contains Abusive Contents ( Vulgar or racist )</option>
		<option value="Vulgar / Invalid Photos">Vulgar / Invalid Photos </option>
		<option value="Invalid Data">Invalid Data </option>
		<option value="Invalid Contact Details">Invalid Contact Details</option>
		<option value="Contact number / link mentioned in restricted fields">Contact number / link mentioned in restricted fields </option>
		<option value="Multiple / Duplicate profiles">Multiple / Duplicate profiles </option>
		<option value="Fake Profiles">Fake Profiles</option>
		<option value="Abnormal Activity Found">Abnormal Activity Found </option>
		<option value="Marriage Fixed">Marriage Fixed</option>
		<option value="Minor Profiles">Minor Profiles</option>
		<option value="Others">Others</option>
		</select>

		</div>

		<div class="mb-3">
		<label for="inputName" class="form-label">Message</label>
		<textarea id="block_description" class="form-control" required="" name="block_description" value="" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?></textarea>
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary btnblk_<?php echo $get_search_profiles->id; ?>" id="btnblk_<?php echo $get_search_profiles->id; ?>">Save changes</button>
		</div>
		</div>
		</div>
		</div>
		<!-- end of block modal  -->
		<!-- modal for change password  -->


		<!-- modal for unblock -->
		<div class="modal fade" id="unblock_" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">Unblock Profile</h5>
		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<div class="mb-3">
		<label for="inputName" class="form-label">Status</label>
		<select id="block_status" class="form-control custom-select block_status" name="block_status" required="required">
		<option value="">--select--</option>
		<option value="Interested To Login">Interested To Login</option>
		<option value="Others">Others</option>
		</select>
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
		<input type="hidden" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">
		<input type="hidden" name="phone" id="phone" value="<?php echo $get_search_profiles->phone; ?>">
		</div>

		<div class="mb-3">
		<label for="inputName" class="form-label">Message</label>
		<textarea id="block_description" class="form-control block_description" required="required" name="block_description" value="" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo $this->session->userdata('username');?></textarea>
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" id="btnunblk_<?php echo $get_search_profiles->id; ?>">Save changes</button>
		</div>
		</div>
		</div>
		</div>
		<!-- end of unblock modal  -->
       
        <div class="modal fade" id="dispear" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Hide Profile 								

			</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>

			<div class="modal-body">
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
			<input type="hidden" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session"> 
			<div class="mb-3">
			<p>
			Are you sure to hide this profile ..!
			</p>
			<label for="inputName" class="form-label">Message</label>	 
	          <textarea id="hide_description" class="form-control" required="" name="hide_description" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>		
			</textarea>
			</div>

			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary btnhide_<?php echo $get_search_profiles->id; ?>" 
			id="btnhide_<?php echo $get_search_profiles->id; ?>">Hide</button>
			</div>
			</div>
			</div>
			</div>
		<!-- end of hide modal  -->
		<!-- modal for unhide -->

		<div class="modal fade" id="display" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Unhide Profile 								

						 </h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

			<div class="modal-body">
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
			<input type="hidden" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session"> 
			<div class="mb-3">
			<p> Are you sure to unhide this profile ..! </p>
			<label for="inputName" class="form-label">Message</label>
			<textarea id="hide_description" class="form-control hide_description" required="" name="hide_description" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?></textarea>

			</div>

			</div>

		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" id="btnunhide_<?php echo $get_search_profiles->id; ?>">UnHide</button>
		</div>
		</div>
		</div>
		</div>
        <!-- end modal for unhide -->
		<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">Change password</h5>
		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">

		<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
		<input type="hidden" value="<?php echo $this->session->userdata('user_id_admin');?>" id="session"> 
		<div class="mb-3">
		<label for="inputName" class="form-label">Enter Password</label>
		<input id="password" class="form-control" required="" name="password" value="" type="text"></input>
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" id="changepassbtn_<?php echo $get_search_profiles->id;?>">Save changes</button>
		</div>
		</div>
		</div>
		</div>


		<?php $msg=$this->db->select('*')->from('tbl_payement')->where('user_id',$r_id)->where('status','1')->get()->result_array();?>

		<!-- end modal for change password -->
		<!-- modal for approved to pay  -->


			<form id="contactpaid" method="post" action="<?php echo base_url();?>admin/approvetopaid5"
			onsubmit="setTimeout(function(){window.location.reload();},500);">
			<div class="modal fade" id="approvetopaid" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Approve to Paid</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<br>
			<div>


			<span style="margin-left: 14px;border:2px solid black;color:black;background-color:#FEEAEA;">
			&nbsp;&nbsp; 
			<?php foreach ($msg as  $value) {
			?>
			<?php $paymentstatus=$value['status'];?>



			<?php if($paymentstatus=='1')
			{?>
			<?php echo "Paid";?>
			<?php }?>


			<?php if($paymentstatus=='0')
			{?>
			<?php echo "Expired";?>
			<?php }?>


			&nbsp;&nbsp;&nbsp;
			<?php }?>
			</span>



			<span style="margin-left: 30px;border:2px solid black;color:black;background-color:#FEEAEA;">
			&nbsp;&nbsp; 
			<?php foreach ($msg as $msg5) {
			?>

			<?php $msg8=$msg5['messagebalance'];?>	


			<?php echo $msg8;?>

			&nbsp;&nbsp;<?php }?>
			</span>
			<span 
			style="margin-left:20px;border:2px solid black;color:black;background-color:#FEEAEA;">
			&nbsp;&nbsp;
			<?php foreach ($msg as $msg5) {
			?>
			<?php $msg9=$msg5['contactbalance'];?>	
			<?php echo $msg9;?>&nbsp;&nbsp;<?php }?>

			</span>
			<span style="margin-left: 30px;border:2px solid black;color:black;
			background-color:#FEEAEA;">

			<?php $exp=$this->db->select('*')->from('tbl_payement')->where('user_id',$r_id)
			->where('status','1')->get()->result_array();?>

			&nbsp;    <?php foreach ($exp as $msdata) {
			?>
			<!-- Expired on  -->
			<?php $msg10=$msdata['expiry_date'];?>	
			<?php $regdateold=date('d-m-Y',strtotime($msg10));?>




			<?php echo $regdateold;?>
			&nbsp;&nbsp; 

			<?php }?>
			</span>

			</div>
			<br>
			<div style="border:2px solid black;color:white;margin-top:10px;background-color:grey;">
			&nbsp;&nbsp; <b>Paid Membership</b>
			</div>

			<div class="modal-body">
			<table class="table table-bordered">

			<tbody>
			<tr>
			<td><b>Order ID :</b> </td>
			<td>
			<!-- AMIT 1635 -->
			<?php echo $r_id;?>
			</td>

			</tr>
			<tr>
			<td><b>HN ID :</b></td>
			<td>

			<!-- HN10001 -->
			<?php echo	$happynikah_id;?>
			</td>

			</tr>
			<tr>
			<td><b>Activation Date :</b></td>
			<td>
			<?php $tdate=date('d-m-Y');?>
			<?php echo $tdate;?>
			</td>

			</tr>
			<tr>
			<td><b>Plan :</b></td>
			<td>

			<?php $plandata=$this->db->select('*')->from('tbl_plan')->get()->result_array();?>

			<select class="form-control" id="sel_plan" name="sel_plan">
			<option>-- Select --</option>
			<?php
			foreach($plandata as $plan2){
			echo "<option value='".$plan2['plan_id']."'>".$plan2['plan_name']."</option>";
			}
			?>
			</select>

											<!-- <option>
												--select--
											</option>
											<option value="">
												Bronze
											</option>
											<option value="">
												Diamond
											</option>
											<option value="">
												Crown
											</option>
											<option value="">
												Master
											</option>
											<option value="">
												Assisted
											</option>
											<option value="">
												Assisted Pro
											</option>
											<option value="">
												Elite
											</option> -->

					</td>

					</tr>
					<tr>
					<td><b>Duration :</b></td>
					<td>

					<!-- 45 days -->

					<select class="form-control" id="sel_duration" name="sel_duration">
					<option hidden></option>

					</select>


					</td>

					</tr>
					<tr>
					<td><b>No of Contacts :</b></td>
					<td>
					<!-- 20 -->
					<select class="form-control" id="sel_contact" name="sel_contact">
					<option hidden></option>
					</select>
					</td>

					</tr>
					<tr>
					<td><b>No of Messages :</b></td>
					<td>
					<!-- 20 -->
					<select class="form-control" id="sel_message" name="sel_message">
					<option hidden></option>
					</select>
					</td>

					</tr>
					<tr>
					<td><b>Amount :</b></td>
					<td>
					<!-- 1800 -->
					<select class="form-control" id="sel_amount" name="sel_amount">
					<option hidden></option>
					</select>
					</td>

					</tr>
					<tr>
					<td><b>Discount :</b></td>
					<td>
					<input type="number" name="chDiscount" id="chDiscount" class="form-control">
					</td>

					</tr>


					<!-- <tr>
					<td><b>Result :</b></td>
					<td>
					<input type="number" id="result">
					</td>

					</tr> -->


					<tr>
					<td><b>Final Amount :</b></td>
					<td>

					<!-- 999 -->
					<input class="form-control" type="number" id="final_amount" 
					name="final_amount" readonly="readonly">
					<!-- <option hidden></option>
					</select> -->
					</td>

					</tr>
					<tr>
					<td><b>Sale Amount :</b></td>
					<td>
					<!-- 999 -->

					<!-- <select class="form-control" id="final_amount2" name="final_amount2">
					<option hidden></option>
					</select> -->

				    <input class="form-control" type="number" id="final_amount2" 
					name="final_amount2" readonly="readonly">

					</td>

					</tr>
					<tr>
					<td><b>Details :</b></td>
					<td>
					<textarea class="form-control"  name="details" 
					id="details" style="height: 0px;">

					</textarea>
					</td>

					</tr>
					<tr>
					<td><b>Payment Mode :</b></td>
					<td>
					<select class="form-control" name="payment_mode" id="payment_mode">
					<option>
					--Select--
					</option>
					<option name="payment_mode" id="payment_mode" value="Office payment">
					Office payment
					</option>
					<option name="payment_mode" id="payment_mode" value="Bank Deposit">
					Bank Deposit
					</option>
					<option name="payment_mode" id="payment_mode" value="Online Payment">
					Online Payment
					</option>
					<option name="payment_mode" id="payment_mode" value="Door Step">
					Door Step
					</option>
					<option name="payment_mode" id="payment_mode" value="Money Exchange">
					Money Exchange
					</option>
					</select>
					</td>

					</tr>
					<tr  id="office">
					<td><b>Office Name :</b></td>
					<td>
					<select class="form-control">
					<option>
					kakkanchery
					</option>
					</select>
					</td>

					</tr>
					<tr id="bank">
					<td><b>Bank Deposit :</b></td>
					<td>
					<select class="form-control" >
					<option>
					Direct
					</option>
					</select>
					</td>

					</tr>
					<tr id="bank2">
					<td><b>Bank Name :</b></td>
					<td>
					<select class="form-control">
					<option>
					Indian Bank
					</option>
					</select>
					</td>

					</tr>
					<tr id="bank3">
					<td><b>Online Payment :</b></td>
					<td>
					<select class="form-control">
					<option value="Razor Pay" name="">
					Razor Pay
					</option>
					<option value="Iphone Payment" name="">
					Iphone Payment
					</option>

					</select>
					</td>


					</tr>
					<tr id="bank4">
					<td><b>Staff Name :</b></td>
					<td>
					<select class="form-control" name="staff_name">
					<option name="staff_name" value="asif">
					Asif - Vadakara
					</option>
					<option name="staff_name" value="other">
					others
					</option>
					</select>
					</td>

					</tr>
					<tr id="bank5">
					<td><b>Number :</b></td>
					<td>
					<input class="form-control" type="text" name="number" placeholder="Enter number">
					</td>

					</tr>


					</tbody>
					</table>
					

					</div>
				<div class="modal-footer">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
				<input type="hidden" name="session" 
				value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					</div>
					</div>
					</div>
				    </form>
				    
			
			
		<!--Modal for active offer-->
		
		
			<form id="activeofferform" method="post" action="<?php echo base_url();?>admin/approvetopaidactive" onsubmit="setTimeout(function(){window.location.reload();},600);">
			<div class="modal fade" id="activeoffer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Active Offer</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<br>
			<div>


		

			</div>
			<br>
			<div style="border:2px solid black;color:white;margin-top:10px;background-color:grey;">
			&nbsp;&nbsp; <b>Paid Membership</b>
			</div>

			<div class="modal-body">
			<table class="table table-bordered">

			<tbody>
			
			<tr>
			<td><b>HN ID :</b></td>
			<td>

			<!-- HN10001 -->
			<?php echo	$happynikah_id;?>
			</td>

			</tr>
			<tr>
			<td><b>Activation Date :</b></td>
			<td>
			<?php $tdate=date('d-m-Y');?>
			<?php echo $tdate;?>
			</td>

			</tr>
			<tr>
			<td><b>Plan :</b></td>
			<td>

			<?php $plandata=$this->db->select('*')->from('tbl_plan as pl')->get()->result_array();?>

			<select class="form-control" id="sel_plan_active_offer" name="sel_plan">
			<option>-- Select --</option>
			<?php
			foreach($plandata as $plan2){
			echo "<option value='".$plan2['plan_id']."'>".$plan2['plan_name']."</option>";
			}
			?>
			</select>

											<!-- <option>
												--select--
											</option>
											<option value="">
												Bronze
											</option>
											<option value="">
												Diamond
											</option>
											<option value="">
												Crown
											</option>
											<option value="">
												Master
											</option>
											<option value="">
												Assisted
											</option>
											<option value="">
												Assisted Pro
											</option>
											<option value="">
												Elite
											</option> -->

					</td>

					</tr>
				
				
					
					<tr>
					<td><b>Amount :</b></td>
					<td>
					<!-- 1800 -->
				<select class="form-control" id="sel_amount2" name="sel_amount2">
					<!--<option hidden></option>-->
					<option>-- Select Amount --</option>
					</select>
					</td>

					</tr>
				
				


					<!-- <tr>
					<td><b>Result :</b></td>
					<td>
					<input type="number" id="result">
					</td>

					</tr> -->


					</tbody>
					</table>
					

					</div>
				<div class="modal-footer">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $get_search_profiles->id;?>">
				<input type="hidden" name="session" 
				value="<?php echo $this->session->userdata('user_id_admin');?>" id="session">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					</div>
					</div>
					</div>
				    </form>
				    
				    
				    
		<!-- end modal of approve to paid  -->
		<!-- modal for postpone  -->
		
				<form id="contact" method="post" action="<?php echo base_url(); ?>admin/payment_request" onsubmit="setTimeout(function(){window.location.reload();},600);">
				    
		<div class="modal fade" id="postpone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Payment Request</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					
	

               <input type="hidden" name="payment_id" id="payment_id"  
               value="<?php echo $get_search_profiles->id;?>">
               
					<div class="modal-body">
						<div class="mb-3">
							<label for="inputName" class="form-label" style="color:black;"><b>Plan Type</b></label>
							<select id="plantype" class="form-control custom-select" 
							name="plantype">
								<option value="">--select--</option>
								<option value="normal">Normal</option>
								<option value="premium">Premium</option>

						</select>
						</div>
						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;">
						<b>Membership Plan</b></label>
						<select id="membership_plan" class="form-control custom-select" name="membership_plan">
								<option value="">--select--</option>
								<option value="1">Bronze</option>
								<option value="2">Diamond</option>
								<option value="3">Crown</option>
								<option value="4">Master</option>
								<option value="5">Assisted</option>
								<option value="6">Assited Pro</option>
								<!--<option value="">Elite</option>-->
							</select>
						</div>
						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;"><b>PostPone Date</b></label>
						<input type="date" name="postpone_date" class="form-control">
						</div>

						<div class="mb-3">
						<label for="inputName" class="form-label" style="color: black;">
							<b>Message</b></label>
							<textarea id="message" class="form-control" required="" name="message">
								
								    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>
								    
							</textarea>
						</div>
					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Sumbit</button>
					</div>
				</div>
			</div>
		</div>
		</form>
		
		<!--Invalid ID/phone-->
		
<!--		<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title text-success" id="searchModalLabel"></h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		        </div>
		        <div class="modal-body">
		            
               
		        <h5>Please Enter Valid ID or Phone Number </h5>
		      
		       </div>
		       <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>-->
		
		
		<!-- end of postpone modal  -->
		<!-- modal for Duplicate profile  -->
		<div class="modal fade" id="duplicate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Duplicate Profile
					</h5>
					<button type="button" class="close" data-bs-dismiss="modal" 
					aria-label="Close">
					
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
				<div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 375px;">
				<div>
				<table class="table table-bordered">

				<tbody>
             
             <?php if($get_search_profiles->status == '1' || $get_search_profiles->status == '2' || 
             $get_search_profiles->status == '3')
            
            {?> 
             
			<?php $nh=$this->db->select('*')->from('tbl_registration')->order_by('id','desc')->where('phone',$phone)
			->get()->result_array();?>
			<?php  foreach ($nh as  $value)
			 {

				$k=$value['phone'];?>
				<?php $k2=$value['status'];?>
				<?php $k3=$value['happynikah_id'];?>
				<?php $k4=$value['reg_date'];?>
				<?php $k5=$value['name'];?>
				<?php $k6=$value['gender'];?>
				<?php $k7=$value['age'];?>
				<?php $k8=$value['marital_status'];?>
				<?php $k9=$value['photo'];?>
				<?php $k10=$value['dob'];?>

	<!--  <?php echo $k;?> -->

  <?php 
                if ($k2 == '0')
				{
				$status = "Pending";
				} 
				elseif ($k2 == '1')
				{
				$status = "Approved";
				} 
				elseif ($k2 == '2') 
				{
				$status = "Rejected";
				} 
				elseif ($k2 == '3') 
				{
				$status = "Deleted";
				}
				elseif ($k2 == '4') 
				{
				$status = "Block";
				}
				elseif ($k2 == '5')
				{
				$status = "UnBlock";
				}

				?>

				<tr>
				<td>

		<?php $url="https://happynikah.com/";?>
         
         <img class="profile-image" src="<?php echo $url.'assets/photo_storage/'. $k9;?>" alt="" 
         width="150" height="auto" alt="Select Image">
			
				</td>
				<td style="color: red;">

				Status: <?php echo $status; ?> 
				</td>
				<td style="color: red;" colspan="2"> 

				Display Status :
				<?php echo $status; ?>
				</td>

				</tr>
				<tr>
				<td>
				<b>HN ID :</b>
				</td>
				<td><?php echo $k3; ?></td>
				<td><b>Register Date & Time :</b></td>
				<td><?php echo $k4; ?></td>
				</tr>
				<tr>
				<td><b>Name<font style="color: red;">*</font> :</b></td>
				<td><?php echo $k5; ?></td>
				<td><b>Gender<font style="color: red;">*</font> :</b></td>
				<td><?php echo $gender; ?></td>
				</tr>
				<tr>
				<td><b>Age :</b></td>
				<td><?php echo $k7; ?></td>
				<td><b>Date of Birth<font style="color: red;">*</font> :
				</b></td>
				<td>
				  <?php $k11=date('d-m-Y',strtotime($k10)); ?>   
				<?php echo $k11; ?></td>

				</tr>
				<tr>
				<td><b>Mobile :</b></td>
				<td><?php echo $k; ?></td>
				<td><b>Marital Status :</b></td>
				<td><?php echo $k8; ?></td>

				</tr>


<!-- <?php $df="SELECT * FROM tbl_registration GROUP BY phone HAVING COUNT(*)>1";?>
<?php print_r($df);?> -->

            <?php }?>
            
            <?php }?>
			</tbody>
			</table>

			</div>

			</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
			Close
		    </button>
						<!-- <button type="button" class="btn btn-primary">Sumbit</button> -->
			</div>
			</div>
			</div>
			</div>
		<!-- end of Duplicate profile modal  -->
		<!-- modal for interest details  -->
		<div class="modal fade" id="interestdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Interest Details 
					</h5>
				
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="table-wrapper-scroll-y my-custom-scrollbar">

							<table class="table table-bordered table-striped mb-0">
								<thead>
		<h3 style="height: 50px;background-color:#a0d9ff;padding-top:7px;">
		    
		 <?php $interest=$this->db->select('*')->from('tbl_interest')->where('sender_id',$r_id)->where('status',0)->get()->num_rows();?>
	    Pending Interest: <?php echo $interest;?></h3>
								</thead>

								<br>
								<tbody>
								    
					<?php $interest_details=$this->db->select('tbl_interest.*,tbl_registration.*')->from('tbl_interest')
					->join('tbl_registration','tbl_registration.id=tbl_interest.receiver_id')
					->where('tbl_interest.sender_id',$r_id)->where('tbl_interest.status',0)->get()->result_array();?>
					
					<?php foreach($interest_details as $interstdata)
					{?>
									<tr>

										<td><?php echo $interstdata['happynikah_id'];?> - <?php echo $interstdata['date'];?></td>
										<!--<td>HB100002- 21-01-2023 10:00 PM</td>-->

									</tr>
                                 <?php }?>
								</tbody>
							</table>

						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>
	
		<!-- end modal for Interest details  -->
		<?php include('footer.php'); ?>


    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>


		<!-- jQuery -->
<!-- 		<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
 -->		<!-- Bootstrap 4 -->
		<!-- <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
		<!-- DataTables  & Plugins -->
	   <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js">
			
	</script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
			
		</script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
			
		</script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
			
		</script>

		<!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
		<script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js">
			
		</script>
		<script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js">
			
		</script>
		<script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js">
			
		</script>
		<!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->


		<script>
		   function ShowPayment() {
			const targetDiv = document.getElementById("prepaymentdetails");
				if (targetDiv.style.display !== "none") 
			 	{
		 		 targetDiv.style.display = "none";
				} 
				else
				 {
					targetDiv.style.display = "block";
				}
			
			}	
			var url = '<?php echo base_url() ?>'

			function approve_pay(r_id) {
				$.ajax({
					type: 'POST',
					url: url + 'admin/approve_pay',
					data: {
						r_id: r_id
					},
					success: function(data) {
						$('#approveform').html(data)
					},
				})
			}


			//datatable for message
			function openCity(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("btn btn-primary");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			//entermessage modal jquery//

			$(function() {
				$("a[class='asm']").click(function() {
					$("#enterMessage").modal("show");
					return false;
				});
			});
			$(function() {
				$("a[class='asms']").click(function() {
				$("#deletecnt").modal("show");
				// const deleteId = $(this).attr('data-id');
				// const field = $('#deleteId');
				// field.val(deleteId);
				// console.log(field[0]); 

				return false;
				});
			});
			
            $(function() {
            $("a[class='asms5']").click(function() {
            
            $("#approveprofile").modal("show");
            // const deleteId = $(this).attr('data-id');
            // const field = $('#deleteId');
            // field.val(deleteId);
            // console.log(field[0]); 
            
            return false;
            });
			});
			
			$(function() {
				$("a[class='bl']").click(function() {
					$("#block").modal("show");
					return false;
				});
			});

			$(function() {
				$("a[class='ps']").click(function() {
					$("#changepassword").modal("show");
					return false;
				});
			});
			
			$(function() {
				$("a[class='ap']").click(function() {
					$("#approvetopaid").modal("show");
					return false;
				});
			});
			
				$(function() {
				$("a[class='active_offer']").click(function() {
					$("#activeoffer").modal("show");
					return false;
				});
			});
			
			
			$(function() {
				$("a[class='pp']").click(function() {
					$("#postpone").modal("show");
					return false;
				});
			});
			
			$(function() {
				$("button[class='btn btn-danger dp']").click(function() {
					$("#duplicate").modal("show");
					return false;
				});
			});
            
            $(function() {
		$("a[class='bbb']").click(function() {
		$("#block_").modal("show");
		return false;
		});
		});
		$(function() {
		$("a[class='bbc']").click(function() {
		$("#unblock_").modal("show");
		return false;
		});
		});

			$(function() {
			//var id = $("")
			$("a[class='hi']").click(function() {
			$("#dispear").modal('show');
			return false;
			});
			});
			$(function() {
			$("a[class='hello']").click(function() {
			$("#display").modal('show');
			return false;
			});
			});

			$(function() {
			$("a[class='id']").click(function() {
			$("#interestdetails").modal("show");
			return false;
			});

			});

  $(document).ready(function(){
	  // City change
    $('#sel_plan').change(function(){
      var plandata_id5 = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/getplan',
        method: 'post',
        data: {plandata_id: plandata_id5},
        dataType: 'json',
        success: function(response){

          // Remove options 
          // $('#sel_user').find('option').not(':first').remove();
		$('#sel_duration').find('option').not(':first').remove();
		$('#sel_contact').find('option').not(':first').remove();
		$('#sel_message').find('option').not(':first').remove();
		$('#sel_amount').find('option').not(':first').remove();
		$('#final_amount').find('option').not(':first').remove();
		$('#final_amount2').find('option').not(':first').remove();
          // Add options
          $.each(response,function(index,data){
            // $('select>option:eq(1)').prop('selected', true);
           
            
            $('#sel_duration').append('<option selected value="'+data['plan_id']+'">'+data['duration']+'</option>');
            $('#sel_contact').append('<option selected value="'+data['plan_id']+'">'+data['contacts']+'</option>');
            
            $('#sel_message').append('<option selected value="'+data['plan_id']+'">'+data['messages']+'</option>');
            
            $('#sel_amount').append('<option selected value="'+data['plan_strick_amount']+'">'+data['plan_strick_amount']+'</option>');
            $('#final_amount').append('<option selected value="'+data['plan_id']+'">'+data['plan_amount']+'</option>');
            
            $('#final_amount2').append('<option selected value="'+data['plan_id']+'">'+data['plan_amount']+'</option>');

			});
			}
			});
			});
			});
			
			
		
		
		$(document).ready(function(){
	  // City change
    $('#sel_plan_active_offer').change(function(){
      var plandata_id7 = $(this).val();
    
    
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/getplanactiveoffer',
        method: 'post',
        data: {planid: plandata_id7},
        dataType: 'json',
        success: function(response){

          // Remove options 
          // $('#sel_user').find('option').not(':first').remove();
	
		$('#sel_amount2').find('option').not(':first').remove();
	
          // Add options
          $.each(response,function(index,data){
            // $('select>option:eq(1)').prop('selected', true);
           
            $('#sel_amount2').append('<option value="'+data['amount']+'">'+data['amount']+'</option>');
          

			});
			}
			});
			});
			});	
			
			
    
			// $(document).ready(function() 
			// {

			// $(function() {

			// // $('#date').datepicker({
			// // maxDate: "+2d",
			// // minDate:0
			// // });

			// });
			// })

		
			$(document).ready(function () 
			{   
			// $('body').on('change','#status', function() 
			// $('#status').change(function() {
			// {
			// $('#show_only').val(this.value==);


			// var status=$("#status").val();
			// $( "#noSunday" ).datepicker({ 
			// beforeShowDay: noSunday,
			// maxDate: "+2d",
			// minDate:0
			// });

			// function noSunday(date)
			// { 
			// var day = date.getDay(); 
			// return [(day > 0), '']; 
			// }; 

			$("#noSunday").datepicker({ 
			beforeShowDay: noSunday,
			dateFormat: 'dd-mm-yy',
			maxDate: "+2d",
			minDate:0
			});

			function noSunday(date)
			{ 
			var day = date.getDay(); 
			return [(day > 0), '']; 
			}; 

			$("#noSunday2").datepicker({ 
			beforeShowDay: noSunday2,
			 dateFormat: 'dd-mm-yy',
			 
			maxDate: "+1d",
			minDate:0
			});

			function noSunday2(date)
			{ 
			var day = date.getDay(); 
			return [(day > 0), '']; 
			}; 

			});
			// }); 

	// $('#status').change(function()
	// {
	// if($(this).val() == 'Interested')
	// { 

	// $('#follow2').hide();
	// }

	// if($(this).val() == 'Ring')
	// { 
	// $('#follow2').show();

	// }
	// });

 // $("#save-project-btn").click(function(event )
 //    {
 //        event.preventDefault();
 //        if($("#update_id").val() == null || $("#update_id").val() == "")
 //        {
           
        
 //            updateProject();
 //        }
 //    })

	//  function updateProject()
 //    {
 //        $("#save-project-btn").prop('disabled', true);
 //        let url = $('meta[name=app-url]').attr("content") + "index.php/admin/followup_register/" + $("#update_id").val();
 //        let data = {
 //            // id: $("#update_id").val(),
 //            status: $("#status").val(),
 //            noSunday: $("#noSunday").val(),
 //            noSunday2: $("#noSunday2").val(),
 //            message: $("#message").val(),
 //            uid: $("#update_id").val(),
 //        };
 //        $.ajax({
 //            url: url,
 //            type: "POST",
 //            data: data,
 //            success: function(response) {
 //                $("#save-project-btn").prop('disabled', false);
 //                let successHtml = '<div class="alert alert-success" role="alert"><b>Project Updated Successfully</b></div>';
 //                $("#alert-div").html(successHtml);
 //                $("#status").val("");
 //                $("#message").val("");
 //                $("#update_id").val("");
 //                $("#noSunday").val("");

 //                // showAllProjects();
 //                $("#form-modal").modal('hide');
 //            },
 //            error: function(response) {
 //                /*
 //                    show validation error
 //                */
 //                $("#save-project-btn").prop('disabled', false);
            
 //                let responseData = JSON.parse(response.responseText);
 //                console.log(responseData.errors);
 
 //                if (typeof responseData.errors !== 'undefined') 
 //                {
 //                    let errorHtml = '<div class="alert alert-danger" role="alert">' +
 //                                        '<b>Validation Error!</b>' +
 //                                        responseData.errors +
 //                                    '</div>';
 //                    $("#modal-alert-div").html(errorHtml);      
 //                }
 //            }
 //        });
 //    }

     $(document).ready(function () 
     {
     $('#contact select[name="status"]').change(function () 
     {
        if ($('#contact select[name="status"] option:selected').val() == 'Ring')
        {
            $('#follow').hide();
            $('#follow2').show();
        } 
         if ($('#contact select[name="status"] option:selected').val() == 'Interested')
        {
            $('#follow2').hide();
            $('#follow').show();
        }
         if ($('#contact select[name="status"] option:selected').val() == 'busy')
        {
            $('#follow').hide();
            $('#follow2').show();
        } 

         if ($('#contact select[name="status"] option:selected').val() == 'Add comments')
        {
          $('#follow').hide();
          $('#follow2').show();
        } 

		if ($('#contact select[name="status"] option:selected').val() == 'Switched')
		{
		$('#follow').hide();
		$('#follow2').show();
		}  

		// else {
		//     $('#follow').hide();
		// }
		});

       
        $('#contactpaid select[name="payment_mode"]').change(function () 
       {
        if ($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Office payment')
        {
            $('#office').show();
			$('#bank').hide();
			$('#bank2').hide();
			$('#bank3').hide();
			$('#bank4').hide();
			$('#bank5').hide();
            // $('#follow2').show();
        } 

      if($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Bank Deposit')
        {
            $('#office').hide();
			$('#bank').show();
			$('#bank2').show();
			$('#bank3').hide();
			$('#bank4').hide();
			$('#bank5').hide();
            // $('#follow2').show();
        } 

   if ($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Online Payment')
        {
            $('#office').hide();
			$('#bank').hide();
			$('#bank2').hide();
			$('#bank3').show();
            // $('#follow2').show();
        } 

        if ($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Door Step')
        {
            $('#office').hide();
			$('#bank').hide();
			$('#bank2').hide();
			$('#bank3').hide();
			$('#bank4').show();
			$('#bank5').show();
            // $('#follow2').show();
        } 

          if ($('#contactpaid select[name="payment_mode"] option:selected').val() == 'Money Exchange')
        {
            $('#office').hide();
			$('#bank').hide();
			$('#bank2').hide();
			$('#bank3').hide();
			$('#bank4').hide();
			$('#bank5').show();
            // $('#follow2').show();
        } 
       });
	   
	   });


		$(document).on("change keyup blur", "#chDiscount", function() 
		{
		var amd = $('#sel_amount').val();
		var disc = $('#chDiscount').val();
		

		if (disc != '' && amd != '')
		{
		$('#final_amount').val((parseInt(amd)) - (parseInt(disc)));
		$('#final_amount2').val((parseInt(amd)) - (parseInt(disc)));
		}
		else
		{
		$('#final_amount').val(parseInt(amd));
		$('#final_amount2').val(parseInt(amd));
		}
		});

   </script>

   <script type="text/javascript">
	function hideprofile(){
		var url = '<?php echo base_url() ?>'
		var user_id = $('#user_id').val();
		var emp_id= $('#session').val();
		
	 $("#btnhide_"+user_id).click(function(){
		var hide_description= $('#hide_description').val();
	//	console.log(hide_description);
		$("#dispear").modal('hide');
		setTimeout(function(){
		location.reload(); 
		}, 1000);

		$.ajax({
		dataType: 'text',
		type: 'POST',
		url: url + 'admin/hide_profile',
		data: {
		user_id: user_id,
		emp_id: emp_id,
		hide_description:hide_description	
		},
		success: function(result2) {
		},
		})
		});				
		}

	</script>
	<script type="text/javascript">
		function unhideprofile(){
		var url = '<?php echo base_url() ?>'
		var user_id = $('#user_id').val();
		var emp_id= $('#session').val();
		
		$("#btnunhide_"+user_id).click(function()
		{
		
		var hide_description = $('.hide_description').val();
		console.log(hide_description);

		$("#display").modal('hide');
		setTimeout(function(){
		location.reload(); 
		}, 1000);

		$.ajax({
		dataType: 'text',
		type: 'POST',
		url: url + 'admin/unhide_profile',
		data: {
		user_id: user_id,
		emp_id: emp_id,
		hide_description:hide_description
		},

		success: function(result3) {

		},
		})
		});				
		}
		</script>

	<script type="text/javascript">
	function unblockprofile(){
	var url = '<?php echo base_url() ?>'
	var id = $('#user_id').val();
	var emp_id= $('#session').val();
	var phone=$('#phone').val();
//	console.log(phone);
	$("#btnunblk_" + id).click(function(){
	var block_description= $('.block_description').val();
	var block_status=$('.block_status').val();
	//console.log(block_status);
	//console.log(block_description);
	$("#unblock_").modal('hide');
	setTimeout(function(){
	location.reload(); 
	}, 1000);
	$.ajax({
	dataType: 'json',
	type: 'POST',
	url: url + 'admin/unblock_profile',
	data: {
	id: id,
	emp_id: emp_id,
	phone:phone,
	block_description:block_description,
	block_status:block_status
	},

	success: function(result5) {

	},
	})
	});
	}
	</script>

	<script type="text/javascript">
	function blockprofile(){
	var url = '<?php echo base_url() ?>'
	var id = $('#user_id').val();
	var emp_id= $('#session').val();
	var phone=$('#phone').val();

	$('#btnblk_' + id).click(function()
	{
	var block_description=$('#block_description').val();
	var block_status=$('#block_status').val();
	$("#block_").modal('hide');
	setTimeout(function(){
	location.reload(); 
	}, 1000);
	$.ajax({
	dataType: 'json',
	type: 'POST',
	url: url + 'admin/block_profile',
	data: {
	id: id,
	emp_id: emp_id,
	phone:phone,
	block_description:block_description,
	block_status:block_status
	},

	success: function(result4) 
	{

	},
	})
	});
	}
	</script>
	
	<script type="text/javascript">
	function change_pass(){
	var url = '<?php echo base_url() ?>'  
	var id = $('#user_id').val();
	console.log(id);
	var emp_id= $('#session').val();
	$('#changepassbtn_' + id).click(function() {

	var password = $('#password').val();
	console.log(password);
	$('#changepassword').modal('hide');
	$.ajax({
	dataType: 'json',
	type: 'POST',
	url: url + 'admin/changepassword',
	data: {
	id: id,
	emp_id: emp_id,
	password:password
	},

	success: function(result6) 
	{

	},

	});
	});
	}
	
	
    </script>
   
   </html>