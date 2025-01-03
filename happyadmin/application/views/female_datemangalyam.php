<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

    <div style="display: flex; flex-direction: row;">     
    <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 10px;">Count: <?php echo $total_rows6; ?></p>    
    </div>

<br/><br/>
                
                <h4 style="text-align: center;">Female List</h4>
                <div class="table-responsive">
                <table id="example" class="display dataTable">
                
                <thead>
                <tr>
                <th class="">Sl No</th>
                <th class="">HM ID</th>
                <th class="">Name</th> 
                <th class="">Reg Date</th>
                <th class="">Place</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach($total_female_date_mangalyam as $value){ ?>
                <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $value['happynikah_id']; ?></td> 
                <td><?php echo $value['name'];?></td>
                
                <td>
                <?php $regdate= $value['reg_date']; ?>
                
                <?php $newdate=date('d-m-Y',strtotime($regdate));?>
                <?php echo $newdate;?>
                
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

