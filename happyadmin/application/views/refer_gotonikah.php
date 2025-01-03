<!DOCTYPE html>
<?php include('header.php');  
     
    $user_id=$this->session->userdata('user_id_admin');
    
    if($_SESSION['user_type']==='6' && $_SESSION['nikah_type']=='gotonikah')
    {
    include('menusupport_gotonikah.php');
    }
    
    if($_SESSION['user_type']==='0' && $_SESSION['nikah_type']=='gotonikah')
    {
    include('gotonikah_sales_super.php');	
    }
    
    
    ?>
    
     <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        
        
        <div class="app-wrapper">
        
        <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
        
        <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
        <h1 class="app-page-title mb-0">Refer And Earn</h1>
        </div>
        <div class="col-auto">
        <div class="page-utilities">
        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
        
        </div><!--//row-->
        </div><!--//table-utilities-->
        </div><!--//col-auto-->
        </div><!--//row-->
        
        <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
        <div class="table-responsive">
                                    
                                    
                                    
                <?php 
                
                $this->db->select('r.id as refer_id,r.user_id, r.name as refer_name, r.p_number, r.district, r.city, r.status, r.goto, r.date as refer_date, re.id, 
                re.status as restatus, re.happynikah_id,re.goto_nikah,d.district_id, d.district AS dist, re.name as reg_name, c.id, c.name AS refercity');
                $this->db->from('tbl_refer as r');
                $this->db->join('tbl_registration as re', 're.id = r.user_id', 'left');
                $this->db->join('tbl_district as d', 'd.district_id = r.district', 'left');
                $this->db->join('tbl_city as c', 'c.id = r.city', 'left');
                $this->db->where_in('r.status', array('0', '1'));
                $this->db->where('r.goto', '1');
                $this->db->where('re.status', '1');
                $this->db->where('re.goto_nikah', '1');
                
                $query = $this->db->get();
                $refer = $query->result_array();
                
                $groupedData = [];
                foreach ($refer as $row) 
                {
                $groupedData[$row['happynikah_id']][$row['reg_name']]['refer_date'] = $row['refer_date'];
                $groupedData[$row['happynikah_id']][$row['reg_name']]['references'][] = array(
                'refer_name' => $row['refer_name'],
                'p_number' => $row['p_number'],
                'status' => $row['status'],
                'refer_id' => $row['refer_id'],
                'goto' => $row['goto']
                );
                }
                
                
                echo '<table id="example" class="table app-table-hover mb-0 text-left">';
                echo '<thead style="background-color: grey;border:1px solid black;">';
                echo '<tr>';
                echo '<th style="color:#fff;">Sl No</th>';
                echo '<th style="color:#fff;">Date</th>';
                echo '<th style="color:#fff;">GN ID</th>';
                echo '<th style="color:#fff;">Name</th>';
                echo '<th style="color:#fff;">Reference 1</th>';
                echo '<th style="color:#fff;">Reference 2</th>';
                echo '<th style="color:#fff;">Reference 3</th>';
                echo '<th style="color:#fff;">Action</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                
                $i = 1;
                foreach ($groupedData as $happynikah_id => $happynikah_data) 
                {
                foreach ($happynikah_data as $reg_name => $data) 
                {
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . htmlspecialchars($data['refer_date']) . '</td>';
                
                echo '<td>' . $happynikah_id . '</td>';
                echo '<td>' . $reg_name . '</td>';
                
                
                for ($j = 0; $j < 3; $j++) 
                {
                
                echo '<td>';
                if (isset($data['references'][$j])) 
                {
                echo $data['references'][$j]['refer_name'] . '<br/>';
                echo $data['references'][$j]['p_number'] . '<br/>';
                
                echo '<br/>';
                 
                if ($data['references'][$j]['status'] === '0') 
                {
                echo '<span style="border-radius: 50%; width: 14px; height: 14px; padding: 10px; background: hsl(197, 98%, 54%); padding-top: 6px; padding-bottom: 6px; color: #ffffff; text-align: center; font: 14px Arial, sans-serif;">' . "Pending" . '</span>';
                } 
                
                elseif ($data['references'][$j]['status'] === '1')
                {
                echo '<span style="border-radius: 50%; width: 14px; height: 14px; padding: 10px; background: hsl(112.75deg 92.76% 39.51%); padding-top: 6px; padding-bottom: 6px; color: #ffffff; text-align: center; font: 14px Arial, sans-serif;">' . "Approved" . '</span>';
                }
                
                echo '<br/>';
                
                echo '<br/>';
                       
                if ($data['references'][$j]['status'] === '0') 
                {
                echo '<form action="' . base_url('admin/refer_and_earn_approve') . '" method="post">';
                echo '<input type="hidden" name="reference_id" value="' . $data['references'][$j]['refer_id'] . '">';
                echo '<input type="hidden" name="goto" value="' . $data['references'][$j]['goto'] . '">';
                echo '<button type="submit" name="approve" class="btn btn-primary" style="color:#fff;margin-bottom:10px;">Approve</button>';
                echo '</form>';
                
                echo '<form action="' . base_url('admin/refer_and_earn_delete') . '" method="post">';
                echo '<input type="hidden" name="reference_id" value="' . $data['references'][$j]['refer_id'] . '">';
                echo '<input type="hidden" name="goto" value="' . $data['references'][$j]['goto'] . '">';
                echo '<button type="submit" class="btn btn-danger" style="color:#fff;margin-left: 0px;width: 57%;">Delete</button>';
                echo '</form>';
                }
                }
                echo '</td>';
                }
                        
                echo '<td>';   
                $statusFlag = true;
                $count = count($data['references']);
                if ($count === 3) 
                {
                foreach ($data['references'] as $reference) 
                {
                if ($reference['status'] !== '1') 
                {
                $statusFlag = false;
                break;
                }
                }
                } 
                else 
                {
                $statusFlag = false;
                }
                
                if ($statusFlag) 
                {
                echo '<form action="' . base_url('admin/refer_and_earn_claim') . '" method="post">';
                foreach ($data['references'] as $reference) 
                {
                echo '<input type="hidden" name="reference_ids[]" value="' . $reference['refer_id'] . '">';
                echo '<input type="hidden" name="goto" value="' . $data['references'][$j]['goto'] . '">';
                }
                echo '<button type="submit" name="claim" class="btn btn-primary" style="color:#fff;margin-bottom:10px;">Claim</button>';
                echo '</form>';
                }
                
                echo '</td>';
                
                echo '</tr>';
                $i++;
                }
                }
                
                echo '</tbody>';
                echo '</table>';
                
                ?>
            
        </div>
        </div>      
        </div>
        
        
        </div><!--//tab-pane-->
        
        </div><!--//tab-content-->
        
        </div><!--//container-fluid-->
        </div><!--//app-content-->
        
        <?php include('footer.php'); ?>
        
        
        <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
        
        </script>
        
        
        
        <script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js">
        
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js">
        
        </script>


       <script type="text/javascript">
        $(function() {
        $("#example").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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


</html>