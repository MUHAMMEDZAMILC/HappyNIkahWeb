
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<?php include('includes/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $page?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Photo</th>
                      <th>Profile ID</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1;
                  foreach($photo as $val){
                    $profile= $this->db->select('happynikah_id,name')->from('tbl_registration')->where('id',$val->user_id)->get()->row_array();
                    ?>
                    <tr>
                      <td><?= $i++ ?></td>  
                      <td><img src="https://happynikah.com/assets/photo_storage/<?php echo $val->user_image; ?>" style="width:50px;">
                        
                        <!-- <input type="file" value="C:/wamp64/www/happynikah/assets/photo_storage/<?php echo $val->user_image; ?>"> -->
                      </td>
                      <td><?php echo $profile['happynikah_id']; ?></td>
                      <td><?php echo $profile['name']; ?></td>
                      <td><a target="_blank" href="https://happynikah.com/assets/photo_storage/<?php echo $val->user_image; ?>" class="badge bg-warning">View Large Photo</a></td>

                      <td>
                        <!-- <a href="<?php echo base_url();?>admin/profilephoto/<?= $val->user_image_id?>"><button class="btn btn-success"> Edit Photo</button></a> -->
                        <!-- <a onclick="uploadphoto('<?= $val->user_image_id?>','C:/wamp64/www/happynikah/assets/photo_storage/<?php echo $val->user_image; ?>')"><button class="btn btn-success"> Edit Photo</button></a> -->

                          <a onclick="approve_photo('<?= $val->user_image_id?>')"><button class="btn btn-primary"> Approve Photo</button></a>
                          
                           <!-- <a onclick="return confirm('Are you sure to Delete this data Premenently?')" href="<?php echo site_url('/admin/delete_profile/');?>"><button class="btn btn-primary" style="background: red;  border: red;"> Delete Photo</button></a> -->

                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletephoto_<?= $val->user_image_id ?>">Delete Photo</button>
                      </td>
                    </tr>
                  <?php }?>
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

  <!-- modals start -->
  <?php foreach($photo as $val){?>
  <div class="modal fade" id="deletephoto_<?= $val->user_image_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url()?>admin/delete_photo">
          <div class="form-group">
            <div class="col-lg-3"><label for="inputName">Comment: <font color="red">*</font></label></div>
            
            <div class="col-lg-6">
              <textarea name="delete_comment" id="delete_comment" width="10" class="form-control"></textarea>
            </div>
            
          </div>
          <!-- <textarea name="delete_comment" id="delete_comment"></textarea> -->
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <input type="hidden" name="user_image_id" value="<?= $val->user_image_id?>">
          <button type="submit" name="delete_photo" class="btn btn-danger">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <div class="clk-popup" style="display:none;">
    <div  id="CommonDatadiv" >
       
    <input type="hidden" id="imagecatno" value=""/>
    <input type="hidden" id="imagetitleen" value=""/>
    <input type="hidden" id="imagetitlear" value=""/>
    <input type="hiddden" id="userid" value="<?= $val->user_image_id?>" style="display:none;">
    
    <div id="vanilla-demo"></div>
    <div class="divphotobottom"><button class="vanilla-rotate rotateleft" data-deg="90"><i class="fa fa-undo" aria-hidden="true"></i> Rotate Left</button>
        <button class="basic-result" id="saveimages">Save Image</button>
    <button class="vanilla-rotate rotateright" data-deg="-90"><i class="fa fa-repeat" aria-hidden="true"></i> Rotate Right</button>
    </div>   
    </div>
  </div>
<?php }?>




  <!-- modals end -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/croppie.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/jquery.bpopup.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  function onclickin(){
            
            $('.clk-popup').bPopup({
      escClose: true,
      modal: true,
      modalClose: true,
    });
            
    }

    // $(document).ready(function(){
    //   $image_crop = $('#vanilla-demo').croppie({
    //            enableExif: true,
    //                   viewport: {
    //                     width:169,
    //                     height:300,
    //                     type:'square' //circle
    //                   },
    //                   boundary: {
    //           width: 100+'%',
    //           height: 300,
    //         },
                       
    //     });
    // });


    function uploadphoto(img_id,file){
      alert(file)
 // var reader = new FileReader();
 //    reader.onload = function (event) {
 //      $image_crop.croppie('bind', {
 //        url: 'http://localhost/happynikah/assets/photo_storage/161994782022-07-20.jpg'
 //      }).then(function(){
 //       $image_crop.croppie('setZoom', 0)
 //      });
 //    }
    
 //    reader.readAsDataURL(this.files[0]);


 //    onclickin().click();

    var el = document.getElementById('vanilla-demo');
var vanilla = new Croppie(el, {
    viewport: { width: 100, height: 100 },
    boundary: { width: 300, height: 300 },
    showZoomer: false,
    enableOrientation: true
});
vanilla.bind({
    url: 'http://localhost/happynikah/assets/photo_storage/161994782022-07-20.jpg',
    orientation: 4
});
//on button click
vanilla.result('blob').then(function(blob) {
    // do something with cropped blob
});

}


  $('#uploadimage').on('change', function(){
      
      
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
         $image_crop.croppie('setZoom', 0)
      });
    }

    reader.readAsDataURL(this.files[0]);
    
           

     onclickin().click();
    
  });
  


$('#saveimages').click(function(event){

$path = 'fileupload_fashion';

var size = { width: 1080, height: 1440 }; 
var userid = $('#userid').val();
var picnum = $('#picnum').val();


$image_crop.croppie('result', {
      type: 'canvas',
      size: size,
      format:'jpeg'
    }).then(function(response){
        $.ajax({
         url: '<?php echo base_url()?>admin/uploadphoto',
         type: 'post',
         data: "imagevalue="+response+"&userid="+userid+"&picnum="+picnum,
         dataType: 'json',
         success: function (data) { 
            if(data == 0){
                alert('You Have already uploaded 4 Images...')
            }
            else{
                $('.clk-popup').bPopup().close();
                window.location.reload();
            }
             
          } 
      });     
    });
});
   var url = '<?php echo base_url()?>'
  function approve_photo(img_id)
  {
    var approve = confirm('Confirm Photo Approval');
    if(approve)
    {
      $.ajax({
        dataType: 'json',
        type: 'POST',
        url: url+'admin/approve_photo',
        data: {img_id:img_id},
        success: function (data) { 
            location.reload();
        },
      })
    }
    
  }
</script>
</body>
</html>
