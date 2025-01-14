<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); ?> 
<?php include('includes/menu.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class=" img-fluid " src="<?php echo 'https://happynikah.com/assets/photo_storage/'.$ProfileDetails['photo']; ?>"
                       alt="User profile picture" style="border-radius: 4px;">
                </div>
                <h3 class="profile-username text-center"><?= !empty($ProfileDetails['name'])? $ProfileDetails['name'] : '----------' ?></h3>

                <p class="text-muted text-center"><?= !empty($ProfileDetails['mail']) && $ProfileDetails['mail'] != 'NULL' ? $ProfileDetails['mail'] : '----------' ?><br><?= !empty($ProfileDetails['country_code']) && $ProfileDetails['country_code'] != 'NULL' ? $ProfileDetails['country_code'] : '----------' ?>
                  <?= !empty($ProfileDetails['phone']) && $ProfileDetails['phone'] != 'NULL' ? $ProfileDetails['phone'] : '----------' ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right"><?= ($ProfileDetails['gender'] == 1)? 'Male' : 'Female' ?></a>
                  </li> 
                  <li class="list-group-item">
                    <b>Religion</b> <a class="float-right"><?= !empty($ProfileDetails['user_religion']) && $ProfileDetails['user_religion'] != 'NULL' ? $ProfileDetails['user_religion'] : '----------' ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Caste</b> <a class="float-right"><?= !empty($ProfileDetails['user_caste']) && $ProfileDetails['user_caste'] != 'NULL' ? $ProfileDetails['user_caste'] : '----------' ?></a>
                  </li>
                 <li class="list-group-item">
                  <b>Status</b> <a class="float-right">
                <?php if( $ProfileDetails['status'] == 0 ){ ?>
                    Pending
                <?php }
                 elseif( $ProfileDetails['status'] == 1 ){ ?>
                    Approved
                <?php }
                 else if( $ProfileDetails['status'] == 2 ){ ?>
                    Rejected
                <?php }
                 elseif( $ProfileDetails['status'] == 3 ){ ?>
                    Deleted
                <?php }?></a>
                </li>
                  
                </ul> 
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default">
                Update Status
                </button>
                <br>
                <a href="<?php echo site_url('admin/profile/edit/'.$user_id); ?>">
                <button type="button" class="btn btn-primary btn-block">
                Edit Profile
                </button>
                </a>
                <br>
                <a href="<?php echo site_url('admin/profilephoto/'.$user_id); ?>">
                <button type="button" class="btn btn-primary btn-block">
                Edit Image
                </button>
                </a>
                <br>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?= !empty($ProfileDetails['qualification']) && $ProfileDetails['qualification'] != 'NULL' ? $ProfileDetails['qualification'] : '----------' ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted"><?= !empty($ProfileDetails['address']) && $ProfileDetails['address'] != 'NULL' ? $ProfileDetails['address'] : '----------' ?>,<?= !empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] != 'NULL' ? $ProfileDetails['native_place'] : '----------' ?>,<?= !empty($ProfileDetails['district']) && $ProfileDetails['district'] != 'NULL' ? $ProfileDetails['district'] : '----------' ?>,PIN :<?= !empty($ProfileDetails['pincode']) && $ProfileDetails['pincode'] != 'NULL' ? $ProfileDetails['pincode'] : '----------' ?> </p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Occupation</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?= !empty($ProfileDetails['job_name']) && $ProfileDetails['job_name'] != 'NULL' ? $ProfileDetails['job_name'] : '----------' ?></span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Profile Created on <?= date('d-m-Y',strtotime($ProfileDetails['reg_date'])) ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#user_details" data-toggle="tab">User Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#family_details" data-toggle="tab">Family Details</a></li>
                  
                  <li class="nav-item"><a class="nav-link " href="#other_details" data-toggle="tab">Partner Preference</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                <div class="tab-pane active" id="user_details">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Created By</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['profile_for']) && $ProfileDetails['profile_for'] != 'NULL'? $ProfileDetails['profile_for'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['name']) && $ProfileDetails['name'] != 'NULL'? $ProfileDetails['name'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= ($ProfileDetails['gender'] == 1) && $ProfileDetails['gender'] != 'NULL'? 'Male' : 'Female' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['age']) && $ProfileDetails['age'] != 'NULL'? $ProfileDetails['age'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Marital Status</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['marital_status']) && $ProfileDetails['marital_status'] != 'NULL'? $ProfileDetails['marital_status'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['address']) && $ProfileDetails['address'] != 'NULL'? $ProfileDetails['address'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['phone']) && $ProfileDetails['phone'] != 'NULL'? $ProfileDetails['phone'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Other Contact Number</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['other_contact_number']) && $ProfileDetails['other_contact_number'] != 'NULL'? $ProfileDetails['other_contact_number'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Mail</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['mail']) && $ProfileDetails['mail'] != 'NULL'? $ProfileDetails['mail'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['dob']) && $ProfileDetails['dob'] != 'NULL'? $ProfileDetails['dob'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Height</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['user_height']) && $ProfileDetails['user_height'] != 'NULL'? $ProfileDetails['user_height'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Color</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['color']) && $ProfileDetails['color'] != 'NULL'? $ProfileDetails['color'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Weight</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['weight']) && $ProfileDetails['weight'] != 'NULL'? $ProfileDetails['weight'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Blood Group</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['blood_group']) && $ProfileDetails['blood_group'] != 'NULL'? $ProfileDetails['blood_group'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Mother Tongue</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['mothertongue']) && $ProfileDetails['mothertongue'] != 'NULL'? $ProfileDetails['mothertongue'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Native Place</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['native_place']) && $ProfileDetails['native_place'] != 'NULL'? $ProfileDetails['native_place'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Native District</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['district']) && $ProfileDetails['district'] != 'NULL'? $ProfileDetails['district'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['qualification']) && $ProfileDetails['qualification'] != 'NULL'? $ProfileDetails['qualification'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Occupation</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['job_name']) && $ProfileDetails['job_name'] != 'NULL'? $ProfileDetails['job_name'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Job Category</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['job_category']) && $ProfileDetails['job_category'] != 'NULL'? $ProfileDetails['job_category'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Annual Income</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['annual_income']) && $ProfileDetails['annual_income'] != 'NULL'? $ProfileDetails['annual_income'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Hobbies</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['registration_hobbies']) && $ProfileDetails['registration_hobbies'] != 'NULL'? $ProfileDetails['registration_hobbies'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Physical Status</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['physical_status']) && $ProfileDetails['physical_status'] != 'NULL'? $ProfileDetails['physical_status'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Photo visibility</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['photo_visibility']) && $ProfileDetails['photo_visibility'] != 'NULL'? ($ProfileDetails['photo_visibility']=='option1')? 'Private':'Public' : '----------' ?></label>
                        </div>
                      </div>
                      
                      

                      
                      
                    </form>
                  </div>



                  <div class=" tab-pane" id="family_details">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Father Name</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['fathers_name']) && $ProfileDetails['fathers_name'] != 'NULL'? $ProfileDetails['fathers_name'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Fathers Occupation</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['fathers_occupation']) && $ProfileDetails['fathers_occupation'] != 'NULL'? $ProfileDetails['fathers_occupation'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Mother Name</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['mothers_name']) && $ProfileDetails['mothers_name'] != 'NULL'? $ProfileDetails['mothers_name'] : '----------' ?></label>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Mothers Occupation</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['mothers_occupation']) && $ProfileDetails['mothers_occupation'] != 'NULL'? $ProfileDetails['mothers_occupation'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Number of Family Members</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['total_members']) && $ProfileDetails['total_members'] != 'NULL'? $ProfileDetails['total_members'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Financial Status</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['financial_status']) && $ProfileDetails['financial_status'] != 'NULL'? $ProfileDetails['financial_status'] : '----------' ?></label>
                        </div>
                      </div>
                      
                      
                      
                    </form>
                  </div>





                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="other_details">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Age From</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['partner_age_from']) && $ProfileDetails['partner_age_from'] != 'NULL'? $ProfileDetails['partner_age_from'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Age To</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['partner_age_to']) && $ProfileDetails['partner_age_to'] != 'NULL'? $ProfileDetails['partner_age_to'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Partner Height From</label>
                        <div class="col-sm-10">
                          <label for="inputName" class=" col-form-label">: <?= !empty($ProfileDetails['partner_height_from']) && $ProfileDetails['partner_height_from'] != 'NULL'? $ProfileDetails['partner_height_from'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Partner Height To</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['partner_age_to']) && $ProfileDetails['partner_age_to'] != 'NULL'? $ProfileDetails['partner_age_to'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Partner Qualification</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['partner_qualification']) && $ProfileDetails['partner_qualification'] != 'NULL'? $ProfileDetails['partner_qualification'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Family Type Preference</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['partner_familytype']) && $ProfileDetails['partner_familytype'] != 'NULL'? $ProfileDetails['partner_familytype'] : '----------' ?></label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Expectations</label>
                        <div class="col-sm-10">
                          <label for="inputName" class="col-form-label">: <?= !empty($ProfileDetails['partner_expectation']) && $ProfileDetails['partner_expectation'] != 'NULL'? $ProfileDetails['partner_expectation'] : '----------' ?></label>
                        </div>
                      </div>
                      

                      
                      
                    </form>
                  </div>
                  <!-- /.tab-pane -->



                  
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  <div class="modal fade" id="modal-default">
  <form action="<?php echo site_url('admin/change_status'); ?>" method="post">
            
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="inputName"> </label>
                <input type="hidden" name="id" value="<?= $user_id ?>">
                <input type="hidden" name="old_status" value="<?= $ProfileDetails['status']; ?>">
                <select id="inputStatus" class="form-control custom-select" name="status">
                  <option value="">--Select--</option>
                    <?php if( $ProfileDetails['status'] == 0 ){ ?>
                    <option value="1">Approve</option>
                    <option value="2">Reject</option>
                    <option value="3">Delete</option>
                    <?php } 
                     elseif( $ProfileDetails['status'] == 1 ){ ?>
                    <option value="2">Reject</option>
                    <option value="3">Delete</option>
                    <?php } 
                    elseif ($ProfileDetails['status'] == 2) { ?>
                      <option value="1">Approve</option>
                      <option value="3">Delete</option>
                    <?php } 
                    elseif ($ProfileDetails['status'] == 3){ ?>
                      <option value="1">Approve</option>
                    <?php } ?>
                    ?>
                  
                  
                  
                  
                </select>
              </div>
           

            <div class="form-group">
                <label for="inputName">Comment </label>
                <textarea id="inputName" class="form-control" name="comment"></textarea>
              </div>
           </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </form>
      </div>
      <!-- /.modal -->


  <?php include('includes/footer.php'); ?>
</body>
</html>
