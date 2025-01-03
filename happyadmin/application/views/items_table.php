<!DOCTYPE html>
<?php include('header.php'); ?>
<?php if($_SESSION['user_type']==='3')
{
include('menusales.php');
}
?>

<?php $user_id=$this->session->userdata('user_id_admin');
     if($user_id=='26')
    {
     include('menusales.php');     
    }
    
     if($user_id=='8')
    {
     include('menusales.php');     
    }
    
    ?>
    
<?php if($_SESSION['user_type']==='13')
{
include('menusuperadmin.php');
}


?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">






<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h6 style="color:darkgrey;">Active Calls</h1>
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
                                        <h1 class="app-page-title mb-0">Active Calls</h1>
                                        <div>
                     
             <br/>        
  <!--   <button class="btn btn-danger" style="margin-bottom: -26px;" id="fetchDataButton">Get Data</button>   -->
              
  
                                        <h6 style="float: right;">Total records : 20</h6>
                                        </div>
                                        
                                        
                                        <br>
                                        <br>


                          <div class="table-scroll-y my-custom-scrollbar" style="height: 645px;">
                          <table id="example" class="table table-bordered">
                          <thead style="background-color: grey;border:1px solid black;">
                          <tr>
                          <th style="color:#fff;">HN ID</th>
                          <th style="color:#fff;">Description</th>
                          <!-- <th>Gender</th> -->
                          <th style="color:#fff;">Name/Age/Gender</th>
                          <th style="color:#fff;">Address</th>

                          <!--<th style="color:#fff;">Location</th>-->
                          <th style="color:#fff;">Action</th>
                          <!-- <th>Profile Description</th> -->
                          <!-- <th>Registered on </th> -->
                          <!-- <th>Registration Through </th> -->
                          </tr>
                          </thead>
                          <tbody>
                          <tr>

                          <?php $activecalls = $this->db->select('*')->from('tbl_registration')->where('status','1')
                          ->where('reg_date !=',date('Y-m-d'))
                          ->limit(20)->get()->result_array();?>

                          <?php foreach($items as $item)
                          {?>

                          <td>
                          <li style="list-style-type:none;">
                          <br>
                          <a  class="asm" style="color: #128c54;" data-id="<?php echo $item->id;?>">Enter Message</a>


                         <!-- <button type="button" class="btn btn-primary open-modal">Open Modal</button> -->

 
                          </li>
                          <hr>
                          <li style="list-style-type:none;">
                          <div>

                          <span>
                          <!--HN10041-->
                          <?php echo $item->happynikah_id?>   
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>


                          <hr>
                          <?php if($item->reg_through=='0')
                          {
                          $regthrough='Website';
                          }
                          ?>
                          <?php if($item->reg_through=='1')
                          {
                          $regthrough='Admin';
                          }
                          ?>
                          <?php if($item->reg_through=='2')
                          {
                          $regthrough='Mobile';
                          }
                          ?>
                          <span> <?php echo $regthrough;?>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </span>
                          <hr>
                          <div style="background-color: lightgreen;">



                          <?php $reg_date= $item->reg_date;?>
                          <?php $regnew=date('d-m-Y',strtotime($reg_date));?>
                          <?php echo $regnew;?>

                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </div>
                          <!--<hr>-->
                          <!--<div style="background-color: lightblue;">26-01-2023 10:00 AM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>-->
                          <!--<hr>-->
                          <!--<button class="btn btn-danger" style="border-radius: 2px;"> Duplicate Profile</button>-->
                          </div>
                          </li>
                          <!--<hr>-->


                          </td>
                          <td>
                          <h6><u>Profile Description</u></h6>
                          <br>
                          <p align="justify">

                          <!--I do have some concepts .. only send request people who have 33-36 years old age , Dont send request if you have children-->
                          <!--partner must be a person who like travelling , partner must be looking good , good thing if he have good job and education-->
                          <!--not needed over weight and height , must be religious , My name is shamar coming from Thonnipadam in palakkad district-->
                          <!--, 4 children in my family , 3 sisters and me , all of the sisters are married , iam divorced , only spended 1 month , divorce reason-->
                          <!--is he have drinking problem and also bad attitude and behaviour ..-->

                          <?php echo $item->about;?>   


                          </p>
                          </td>
                          <td>
                          <li style="list-style-type:none;">
                          <br>
                          <br> <br>
                          <br> <br>
                          <br>
                          <span> <?php echo $item->name;?>   </span><br>
                          <span>  <?php echo $item->age;?>  </span><br>
                          <span><?php if($item->gender=='1')
                          {?>
                          <?php $gender_name="Male";?>
                          <?php }?>

                          <?php if($item->gender=='2')
                          {?>
                          <?php $gender_name="Female";?>
                          <?php }?>

                          <?php echo $gender_name;?> 

                          </span>


                          </li>
                          </td>
                          <td>
                          <li style="list-style-type:none;">
                          <br> <br>
                          <br> <br>
                          <br> <br>
                          <br>
                          <span> <?php echo $item->address;?> </span>
                          </li>
                          </td>
                          <!--<td>-->
                          <!--    <li style="list-style-type:none;">-->
                          <!--        <br>-->
                          <!--        <br>-->
                          <!--        <br>-->
                          <!--        <br>-->
                          <!--        <br>-->
                          <!--        <br>-->
                          <!--        <span>Alathur , palakkad</span>-->
                          <!--    </li>-->
                          <!--</td>-->
                          <td>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>

                          <br>


                <form method="post" action="<?= base_url() ?>admin/search_profiles">
                <div class="form-group">
                
                <input type="hidden" id="inputName" class="form-control" name="search_profile"  value="<?php echo $item->happynikah_id;?>"  required >
                <!--<span id="error" style="color:red;display:none;">Please insert Happynikah ID/Mobile No.</span>-->
                </div>
                </div>
                <div class="col-lg-6">
                <!-- <div class="form-group"> -->

                <label for="inputName">&nbsp;</label>
                <!-- <button onclick="search_profiles()" name="search_profile_btn" class="btn btn-success" style="margin-top: 32px;"> -->
                <button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button" style="">
                    <i class="fa-sharp fa-solid fa-share"></i>
                </button>
                </form>
                   
                   <!--<button class="btn btn-primary" onclick="window.location.href = '<?php echo base_url();?>admin/search_profiles/'">-->
    
       <!--                <i class="fa-sharp fa-solid fa-share"></i></button>-->
                                                        </td>
                                                    </tr>
                                                    <?php }?>

                                                    <!-- second tr  -->
                                                   





                                                </tbody>
                                            </table>







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




        <!-- Modal for enter message -->
                <div class="modal fade" id="enterMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Enter Message

                <!--  <?php echo $this->session->userdata('user_id_admin');?>  -->
                
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form id="contact" method="post" action="<?php echo base_url(); ?>admin/followup_register" onsubmit="setTimeout(function(){window.location.reload();},700);">

               <input type="hidden" name="update_id" id="update_id">

                

              <!--   <input type="hidden" name="update_id" id="update_id"/> -->

                <div class="modal-body">
                <div class="mb-3">
                <label for="inputName" class="form-label">Status</label>
                
                <select id="status" class="form-control custom-select" name="status" required style="padding-bottom: 2px;">
                <option value="">--select--</option>
                <option value="Interested" name="status">Interested / Follow up</option>
                <option value="Ring" name="status">Ring not respond (RNR) </option>
                <option value="busy" name="status">Busy / call back</option>
                <option value="Add comments" name="status">Add Comments</option>
                <option value="Switched" name="status">Switched off</option>
                </select>
                </div>


                <div class="mb-3" id="follow">
                <label for="setting-input-3" class="form-label">Follow up date</label>          
                <input type="text" id="noSunday" class="datepicker" name="fdate">
                </div>


                <div class="mb-3" id="follow2" style="display:none">
                <label for="setting-input-3" class="form-label">Follow up date</label>      
                <input type="text" id="noSunday2"  class="datepicker" name="fdate">
                </div>

                <div class="mb-3">
                <label for="inputName" class="form-label">Message</label>
                <textarea id="message" class="form-control"  required name="message" style="height: 160px;"></textarea>

<!--<?php echo $this->session->userdata('user_id_admin');?>-->
               
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  id="save-project-btn3"  name="register" class="btn btn-primary">Save changes</button>
                
                </div>
                </div>
                </div>
                 </form>
                </div>


<!-- Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal header -->
      <div class="modal-header">
        <h5 class="modal-title">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p>This is the modal content.</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

 

            <!-- end modal for Interest details  -->
           

     <script>
     
            $(function() {
            $("a[class='asm']").click(function() {
            $("#enterMessage").modal("show");
            
            const update_id = $(this).attr('data-id');
            const field = $('#update_id');
            field.val(update_id);
            console.log(field[0]); 
            
            return false;
            });
            });
            
            
             $(document).ready(function()
            {
            $(function() 
            {
            $("#my_date_picker").datepicker();
            });
            })

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
            maxDate: "+4d",
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
            maxDate: "+4d",
            minDate:0
            });

            function noSunday2(date)
            { 
            var day = date.getDay(); 
            return [(day > 0), '']; 
            }; 
            });



            $(document).ready(function () 
            {
            $('#contact select[name="status"]').change(function () 
            {
            if($('#contact select[name="status"] option:selected').val() == 'Ring')
            {
            $('#follow').hide();
            $('#follow2').show();
            } 
            if($('#contact select[name="status"] option:selected').val() == 'Interested')
            {
            $('#follow2').hide();
            $('#follow').show();
            }
            if($('#contact select[name="status"] option:selected').val() == 'busy')
            {
            $('#follow').hide();
            $('#follow2').show();
            } 

            if($('#contact select[name="status"] option:selected').val() == 'Add comments')
            {
            $('#follow').hide();
            $('#follow2').show();
            } 

            if($('#contact select[name="status"] option:selected').val() == 'Switched')
            {
            $('#follow').hide();
            $('#follow2').show();
            }  

            // else {
            //     $('#follow').hide();
            // }
            });
            });


          

  $(document).ready(function() {
    $('.datepicker').datepicker();
  });




  //             $(document).ready(function() {
  //   $('.open-modal').click(function() {
  //     $('#myModal').modal('show');
  //   });
  // });


        </script>   
        
        
<!--        <script>-->
<!--    $(document).ready(function() {-->
        
        
            
<!--        $('#fetchDataButton').click(function() {-->
<!--            $.ajax({-->
<!--                url: '<?php echo base_url('Admin/activecalls'); ?>',-->
<!--                type: 'GET',-->
<!--                success: function(response) {-->
<!--                    $('#dataContainer').html(response);-->
<!--                },-->
<!--                error: function() {-->
<!--                    alert('Error occurred while fetching data.');-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->


    
           
      <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
                
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
                
            </script>
            


<script>
var jqOld = jQuery.noConflict();
jqOld(function() {
jqOld(".datepicker" ).datepicker();
})
</script>

            
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" 
            crossorigin="anonymous">
            
            <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous">
            
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" 
            crossorigin="anonymous">
            
            </script>
        
        
            <!-- Bootstrap 4 -->
            <!-- <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
            <!-- DataTables  & Plugins -->
            <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
            <!-- <script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script> -->
            <!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->

            </html>