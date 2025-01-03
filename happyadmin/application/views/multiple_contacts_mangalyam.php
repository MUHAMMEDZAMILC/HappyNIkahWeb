<!DOCTYPE html>
<?php include('header.php');
if($_SESSION['user_type']==='0')
{
include('happymangalyam_sales_super.php'); 
}

?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<!-- Content Wrapper. Contains page content -->
  
  <body>

                  <br><br>
                  <div class="table-responsive">


                  <table id="example" class="display dataTable">
                  <thead>
                  <tr>
                  <th class="cell">Sl No</th>
                  <th class="cell">HM ID</th>
                  <th class="cell">Name</th>
                  <th class="cell">Contact Viewed Count</th>
                  <!-- <th class="cell">Name</th>
                  <th class="cell">Postpone Date</th>
                  <th class="cell">Staff Name </th> -->
                  </tr>
                  </thead>

                  <tbody>
                  <?php
                  $i = 1;
                  foreach ($counts as $value)
                  { ?>
                  <tr>
                  <td class="cell"><?php echo $i; ?></td>
                  <td class="cell"><?php echo $value['hn_id']; ?></td>
                  <td class="cell"><?php echo $value['name']; ?></td>
                        <td  class="cell"  style="color: red; font-size: 18px;"> 
        <?php echo $value['count']; ?>
          
        </td>
                          <!--   <td class="cell"><?php echo $value['name']; ?></td>
                            <td class="cell"><?php echo $value['postpone_date'];?></td>
                            <td class="cell"><?php echo $value['user_name'];?></td> -->
                            </tr>
                            <?php
                            $i++;
                            } ?>
                            </tbody>
                            
                             </table>    

                          

         
                  
                </div>
                <!-- /.card-body -->
           
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
      
    <script>   
    $(document).ready(function() {
    $('#example').DataTable({
    });
    });
  
   </script>  
   
</body>
</html>