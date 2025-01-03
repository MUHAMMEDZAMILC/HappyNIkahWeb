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
            <h1>Login Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php if($this->session->flashdata('added')){?>          <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Successfully Updated. </h4>
     
    </div> <?php } ?>   
     <?php if($this->session->flashdata('error')){?>          <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Unable to add Data!!</h4>
     
    </div> <?php } ?>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Login Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="<?php echo site_url('admin/reset'); ?>" method="post" autocomplete="off">
            <div class="card-body">
             <div class="form-group">
                <label for="inputName">User ID/Registered Mobile <font color="red">*</font></label>
                <input type="text" id="inputName" class="form-control" name="mobile" required="" value="">
              </div>
              <!--<div class="form-group">-->
              <!--  <label for="inputName">User Name<font color="red">*</font></label>-->
              <!--  <input type="text" id="inputName" class="form-control" name="username" required="" value="">-->
              <!--</div>-->
              <div class="form-group">
                <label for="inputName">Password <font color="red">*</font></label>
                <input type="password" id="inputName" class="form-control" name="password" required="" value="">
              </div>
              
              
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="row">
        <div class="col-12">
          <input type="reset" value="Reset" class="btn btn-secondary">
          
              <input type="submit" value="Update Username & Password" class="btn btn-success float-right" name="submit">
          
        </div>
    
      
      </div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('includes/footer.php'); ?>
</body>

</html>