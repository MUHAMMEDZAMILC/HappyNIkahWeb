<!DOCTYPE html>
<?php include('header.php'); 

if($_SESSION['user_type']==='0' &&  $_SESSION['nikah_type']=='happymangalyam')
{
include('happymangalyam_sales_super.php'); 
}

if($_SESSION['user_type']==='6' && $_SESSION['nikah_type']=='happymangalyam')
{
include('menusupport_mangalyam.php');   
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
        
        <select id="searchGender" name="searchGender" style="margin-left: 33px;">
        <option value="">All</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
        </select>
        
        
        
        <div class="app-card-body" style="margin-top: 50px;">
        <div class="table-responsive">
        
        
        <table id="example" class="display dataTable">
        <!--<button class="btn btn-secondary" style="margin-left:10px;margin-top:10px;" >Back</button>-->
        <thead>
        <tr>
        
        <th class="">Sl No</th>
        <th class="">HM ID</th>
        <th class="">Name</th>
        <th class="">Mobile</th>
        <th class="">Action</th>
        
        <!--<th class="cell">Balance </th>-->
        </tr>
        </thead>
        <tbody>
        
        
        
        </tbody>
        </table>
                  
    <!--              <div id="paginationLinks" style="font-size: 25px;-->
    <!--margin-left: 500px;">-->
   
    <!--</div>-->
                    
        </div>
        
                
        <script>
        $(document).ready(function() {
        var userDataTable = $('#example').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
        'url': '<?= base_url() ?>admin/getFilter_noprofilephoto_Data_mangalyam',
        'data': function(data) {
        data.searchCity = $('#user_id').val();
        data.searchGender = $('#searchGender').val();
        
        // data.searchName = $('#searchName').val();
        
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
        { data: 'phone' },
        
        
        {
        data: 'happynikah_id', 
        render: function(data, type, row) {
        console.log('data:', data); // Log the data value to the console
        
        return '<form action="<?= base_url() ?>admin/search_profiles" method="POST">' +
        '<input type="hidden" id="inputName" class="form-control" name="search_profile" value="' + data + '">'+
        '<button type="submit" class="btn btn-primary">Profile View</button>' +
        '</form>';
        }
        }
        
        
        ]
        });
        
        $('#user_id').change(function()
        {
        userDataTable.draw();
        });
        
        
        $('#searchGender').change(function() 
        { 
        userDataTable.draw();
        });
    
        });
        
        </script>

    
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
    
    
    
    
    <!-- AdminLTE App -->
    
    <!-- AdminLTE for demo purposes -->
    
    <!-- Page specific script -->
    
    </body>
    
    </html>