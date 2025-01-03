
<!DOCTYPE html>

<?php include('header.php'); ?>


    <?php 
    if($_SESSION['user_type']==='13')
    {
    include('menusuperadmin.php');
    }
    
     
    // if($_SESSION['user_type']==='6')
    // {
    // include('menusupport.php');     
    // }
    $user_id=$this->session->userdata('user_id_admin');
    
    if($user_id=='10')
    {
    include('menusupport.php');     
    }
    
    $user_id=$this->session->userdata('user_id_admin');
    if($user_id=='26' || $user_id=='8' ||  $user_id=='17')
    {
    include('menusales.php');
    }
    
    else
    { 
    include('menu.php');
    } 
    ?>
    
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->



<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<!-- Content Wrapper. Contains page content -->
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container">
      <div class="row g-3 mb-4 align-items-center justify-content-between">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?= $page ?></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"><?= $page ?></li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
      <div class="tab-content" id="orders-table-tab-content">
          
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="row">
        
        <div class="col-md-6">
        
        </div>
        </div>
        
        <br/><br/>
        

                       
                <?php 
                $this->db->select('*');
                $this->db->from('tbl_education');
                
                $user_type=$this->db->get()->result_array();
                ?>                                     
                <select class=""  id="searchEducation" name="searchEducation"  style="padding-bottom: 4px;margin-left: 33px;">
                <option value="" selected disabled>Please Select Education</option> 
                <?php foreach($user_type as $value){ ?>
                <option value="<?php echo $value['edu_id']; ?>"><?php echo $value['education']; ?></option>
                <?php } ?>
                </select>
                
                
                
                <?php 
                $this->db->select('*');
                $this->db->from('tbl_profession');
                
                $profession_type=$this->db->get()->result_array();
                ?>                                     
                <select class=""  id="searchProfession" name="searchProfession"  style="padding-bottom: 4px;margin-left: 52px;padding-right: 60px;">
                <option value="" selected disabled>Please Select Profession</option> 
                <?php foreach($profession_type as $value2){ ?>
                <option value="<?php echo $value2['profession_id']; ?>"><?php echo $value2['profession_name']; ?></option>
                <?php } ?>
                </select>
                
                
                 <select class=""  id="searchGender" name="searchGender"  style="padding-bottom: 4px;margin-left: 52px;padding-right: 60px;">
                <option value="" selected disabled>Please Select Gender</option> 
                <option value="1">Male</option>
                 <option value="2">Female</option>
                 
                </select>
                
                
              <!--<a class="pull-right btn btn-warning btn-large" style="margin-right: 136px;margin-top: 28px;margin-bottom: 41px;" href="<?php echo site_url(); ?>admin/createexcel">-->
              <!--  <i class="fa fa-file-excel-o"></i> Export to Excel</a>   -->
      
                <button type="button" class="btn btn-success" id="exportButton" style="margin-left: 36px;margin-top: 33px;">Export to Excel</button>              
          
            <div class="app-card-body" style="margin-top: 50px;">
            <div class="table-responsive">
            
            
            <table id="example" class="display dataTable">
            <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
            <thead>
            <tr>
            
            <th class="">Sl No</th>
            <th class="">HN ID</th>
            <th class="">Name</th>
            <th class="">Reg Date</th>
            <th class="">Mobile</th>
            
            <th class="">Education</th>
            
            <th class="">Profession</th>
            
            <th class="">Action</th>
            
            <!--<th class="cell">Balance </th>-->
            </tr>
            </thead>
            <tbody>
                        
                     
                         
                    </tbody>
                  </table>
                  
                   
                </div>
                
                
        
        <script>
        $(document).ready(function()
        {
        var userDataTable = $('#example').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
        'url': '<?= base_url() ?>admin/getFilter_approvecallsData',
        'data': function(data) {
        data.searchCity = $('#user_id').val();
        // data.searchName = $('#searchName').val();
        data.searchEducation = $('#searchEducation').val();
        data.searchProfession = $('#searchProfession').val();
        
         data.searchGender = $('#searchGender').val();
         
        }
        },
        'columns': [
        
        { // Add a new column for auto-increment ID
        data: null,
        render: function(data, type, row, meta) {
        var currentPage = userDataTable.page.info().page;
        var index = meta.row + 1 + currentPage * userDataTable.page.info().length;
        return index;
        }
        },
        
        { data: 'happynikah_id' },
        { data: 'name' },
        { data: 'reg_date',
        
        render: function(data, type, row) {
        // Assuming reg_date is in ISO format like 'yyyy-mm-dd'
        var date = new Date(data);
        var day = date.getDate();
        var month = date.getMonth() + 1; // Months are zero-based
        var year = date.getFullYear();
        return day + '-' + month + '-' + year;
        }
        
        
        },
        { data: 'phone' },
        
        { data: 'edu' },
        
        { data: 'profession_name' },
        {
        data: 'happynikah_id', 
        render: function(data, type, row)
        {
        console.log('data:', data);
        
        return '<form action="<?= base_url() ?>admin/search_profiles" method="POST">' +
        '<input type="hidden" id="inputName" class="form-control" name="search_profile" value="' + data + '">'+
        '<button type="submit" class="btn btn-primary">Profile View</button>' +
        '</form>';
        }
        }
        
        ]
        });
        
        $('#user_id').change(function() {
        userDataTable.draw();
        });
        
        
        $('#searchEducation').change(function() 
        { 
        userDataTable.draw();
        });
        
        $('#searchProfession').change(function() 
        { 
        userDataTable.draw();
        });
        
        $('#searchGender').change(function() 
        { 
        userDataTable.draw();
        });
        
        
        $('#exportButton').click(function()
        {
        var searchCity = $('#searchCity').val();
        var searchEducation = $('#searchEducation').val();
        var searchProfession = $('#searchProfession').val();
        var searchGender = $('#searchGender').val();
        
        $.ajax({
        type: 'POST',
        url: '<?= base_url() ?>admin/createExcel',
        data: {
        searchCity: searchCity,
        searchEducation: searchEducation,
        searchProfession: searchProfession,
        searchGender: searchGender
        },
        success: function(response) 
        {
        if (response.success) 
        {
        
        var cacheBuster = new Date().getTime();
        var downloadUrl = '<?= base_url() ?>upload/employee.xlsx?cb=' + cacheBuster;
        window.location.href = downloadUrl;
        
        } 
        
        else 
        {
        var cacheBuster = new Date().getTime();
        var downloadUrl = '<?= base_url() ?>upload/employee.xlsx?cb=' + cacheBuster;
        window.location.href = downloadUrl;
        
        }
        },
        error: function(error)
        {
        alert('Error exporting Excel file');
        }
        });
        });
        
        });

         </script>

          </form>
                
                
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        
        <!-- /.content -->
        </div>
        </div>
        </div>
        <?php include('footer.php'); ?>
        <!-- jQuery -->
        
        <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
        
        <!-- jQuery Library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        
    
        </body>
        
        </html>