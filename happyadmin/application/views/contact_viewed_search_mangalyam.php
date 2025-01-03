<!DOCTYPE html>
<?php 
   include('header.php'); 
    
    if($_SESSION['user_type']==='0' && $_SESSION['nikah_type']=='happymangalyam') 
    {
    include('happymangalyam_sales_super.php');
    }
?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

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
				<h1 class="app-page-title mb-0" style="margin-left: 20px;">Viewed Contact</h1>
				</div>

				<!-- Main content -->
				<section class="content">
				<div class="container-fluid">
				<div class="row">
				<div class="col-12">

				<div class="card">
				<!-- /.card-header -->
				<div class="card-body">

				<div class="row">
				<div class="col-lg-4" style="margin-left: 25px;">
				    
			<form method="post" action="<?= base_url() ?>admin/contact_viewed_listing_mangalyam">
			<div class="form-group">
			<label for="inputName">ID/Contact No. <font color="red">*</font></label>
			<input type="text" id="inputName" class="form-control" name="search_profile" required>
			<span id="error" style="color:red;display:none;">Please insert Gotonikah ID/Mobile No.</span>
			</div>
			</div>
			<div class="col-lg-6" style="margin-top: -6px;">
			<!-- <div class="form-group"> -->

			<label for="inputName">&nbsp;</label>

			<button type="submit" name="search_profile_btn" class="btn btn-success" id="search_button" style="margin-top: 32px;">
			<i class="fas fa-search"></i>
			</button>
			</form>

			<button onclick="window.location.href='<?= base_url() ?>admin/contact_viewed_listing_mangalyam'" name="search_profile_btn" class="btn btn-danger" style="margin-top: 32px;">
			<i class="fa fa-undo" aria-hidden="true"></i>
			</button>
			<!-- </div> -->
			</div>
			</div>
			<br>
			<?php
			if(empty($get_search_profiles)){
			echo "<label style='margin-left: 26px;'>Please Enter Valid Phone Number / ID<label>";
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
			             
			</div>
			</div>

			</div>


			</td>
			</tr>
			</tbody>
			</table>

			</div>

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


			<!-- end modal for Interest details  -->
			<?php include('footer.php'); ?>






			</html>