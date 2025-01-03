<!-- application/views/customer_data_view.php -->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">-->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">-->

</head>
<body>

    <h4 style="margin-top: 35px;margin-left: 27px;margin-bottom: 23px;font-size:28px;">Filtered Staff Data</h4>

    <div style="display: flex; flex-direction: row;">
        
      
      
        <p style="margin-left: 30px;margin-right: 30px;
        font-size: 16px;
        font-weight: 550;
        border-radius: 10px;
        background-color: lightblue;
        border: 2px solid navy;padding: 10px;">RNR <?php echo $total_rows2; ?></p>
        
        <p style="margin-left: 30px;margin-right: 30px;
        font-size: 16px;
        font-weight: 550;
        border-radius: 10px;
        background-color: lightblue;
        border: 2px solid navy;padding: 10px;">Postpone <?php echo $total_rows3; ?></p>
        
        <p style="margin-left: 30px;margin-right: 30px;
        font-size: 16px;
        font-weight: 550;
        border-radius: 10px;
        background-color: lightblue;
        border: 2px solid navy;padding: 10px;">Deleted <?php echo $total_rows4; ?></p>
        
        <p style="margin-left:30px;margin-right: 30px;
        font-size: 16px;
        font-weight: 550;
        border-radius: 10px;
        background-color: lightblue;
        border: 2px solid navy;padding: 10px;">Whatsapp Connect <?php echo $total_rows5; ?></p>
        
        
        <p style="margin-left: 30px;margin-right: 30px;
        font-size: 16px;
        font-weight: 550;
        border-radius: 10px;
        background-color: lightblue;
        border: 2px solid navy;padding: 10px;">Interset Followup <?php echo $total_rows6; ?></p>
        
        
        <p style="margin-left: 30px;margin-right: 30px;
        font-size: 16px;
        font-weight: 550;
        border-radius: 10px;
        background-color: lightblue;
        border: 2px solid navy;padding: 10px;">Total Calls <?php echo $total_rows; ?></p>
        
        
        <p style="margin-left: 30px;margin-right: 30px;
        font-size: 16px;
        font-weight: 550;
        border-radius: 10px;
        background-color: lightblue;
        border: 2px solid navy;padding: 10px;">Total Sale Amount <?php echo $total_amount['final_total_amount']; ?></p>
        
        </div>
        
        <br/>
        
        <br/>
                
                <h4 style="text-align: center;">RNR,Whatsapp Connect and Interest Followup</h4>
                <div class="table-responsive">
                <table id="example" class="display dataTable">
                
                <thead>
                <tr>
                <th class="">Sl No</th>
                <th class="">GN ID</th> 
                <th class="">Date</th>
                <th class="">Comments</th>
                <th class="">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach($total_list as $value){ ?>
                <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $value['happynikah_id']; ?></td> 
                <td>
                    <?php $mdate= $value['cur_date']; ?>
                    <?php $newdate=date('d-m-Y',strtotime($mdate));?>
                    <?php echo $newdate;?>
                    
                    </td>
                <td><?php echo $value['message']; ?></td>
                <td><?php echo $value['status']; ?></td>
                </tr> 
                <?php } ?>
                
                </tbody>
                </table>  
                
                </div><br>
<!-- 
               <div class="table-responsive">
                    <table id="example1" class="display dataTable">
                                 
                    <thead>
                      <tr>
                        <th class="">Sl No</th>
                        <th class="">HN ID</th> 
                        <th class="">Date</th>
                        <th class="">Comments</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
                      $i=1;
                     foreach($total_list1 as $value){ ?>
                       <tr>
                        <td><?php echo $i++; ?></td>
                          <td><?php echo $value['happynikah_id']; ?></td> 
                          <td><?php echo $value['crnt_date']; ?></td>
                            <td><?php echo $value['message']; ?></td>
                        </tr> 
                        <?php } ?>

                    </tbody>
                  </table>  
                   
                </div> -->
                <br/>
                <h4 style="text-align: center;">Deleted Profiles</h4>
                    
                 <div class="table-responsive">
                   <table id="example2" class="display dataTable">
                                 
                    <thead>
                      <tr>
                        <th class="">Sl No</th>
                        <th class="">GN ID</th> 
                        <th class="">Delete Date</th>
                         <th class="">Reason</th> 
                         
                        <th class="">Message</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
                      $i=1;
                     foreach($total_list2 as $value){ ?>
                       <tr>
                        <td><?php echo $i++; ?></td>
                          <td><?php echo $value['happynikah_id']; ?></td> 
                          <td>
                              
                        <?php $mdate_convert = $value['delete_date']; ?>
                              
                    <?php $newdate11=date('d-m-Y',strtotime($mdate_convert));?>
                     <?php echo $newdate11;?>
                              
                              
                              </td>
                           <td><?php echo $value['reason_status']; ?></td> 
                            <td><?php echo $value['message']; ?></td> 
                        </tr> 
                        <?php } ?>

                    </tbody>
                  </table>  
                   
                </div>
              
              
              
           
                
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
    <script>
    
    
    // $(document).ready(function() 
    // {
    // $('#example').DataTable();
    // $('#example2').DataTable();
    // });
    
    $(document).ready(function() {
    $('#example').DataTable({
    // Add minimal or default options here
    });
    $('#example2').DataTable({
    // Add minimal or default options here
    });
    });
    
    
    // window.addEventListener('load', function() 
    // {
    // if($('#example').length > 0) 
    // {
    // $('#example').DataTable();
    // }
    // if($('#example2').length > 0) 
    // {
    // $('#example2').DataTable();
    // }
    // });

    
    
    
    // window.addEventListener('load', function() 
    // {
    // $('#example').DataTable();
    // $('#example2').DataTable();
    // });

   
   </script> 
  
    <script>
    // $(document).ready(function() 
    // {
    // $('#example2').DataTable();
    // });
   </script>  
   
</body>
</html>

