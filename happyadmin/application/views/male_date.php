<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

<!--     <h4 style="margin-top: 35px;margin-left: 27px;margin-bottom: 23px;font-size:28px;">Female List</h4> -->

    <div style="display: flex; flex-direction: row;">     
    <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 10px;">Count: <?php echo $total_rows5; ?></p>    
    </div>

<br/><br/>
                
                <h4 style="text-align: center;">Male List</h4>
                <div class="table-responsive">
                <table id="example" class="display dataTable">
                
                <thead>
                <tr>
                <th class="">Sl No</th>
                <th class="">HN ID</th>
                <th class="">Name</th> 
                <th class="">Reg Date</th>
                <th class="">Place</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach($total_male_date as $value){ ?>
                <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $value['happynikah_id']; ?></td> 
                <td><?php echo $value['name'];?></td>
                <td>
                    <?php $reg_date=$value['reg_date']; ?>
                    
            <?php $convert_date=date('d-m-Y',strtotime($reg_date));?>
                    
              <?php   echo $convert_date;?>    
                    </td>
                 <td><?php echo $value['native_place']; ?></td>
                </tr> 
                <?php } ?>
                
                </tbody>
                </table>  
                
                </div>
                               
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
   <script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
</body>
</html>

