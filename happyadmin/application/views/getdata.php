    <!DOCTYPE html>
    <?php include('header.php'); ?>
    <?php
    if($_SESSION['user_type']==='4'){
    include('menucreation.php');
    }
    ?>

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
<body>

    <style type="text/css">
        button#load-more {
    margin-left: 1330px;
    margin-bottom: -96px;

}
    </style>
    
     <button id="load-more" class="btn btn-danger">Get Data</button>
    <table id="data-table"> 

    </table>

    <script>
        var offset = 0;
        var limit = 20;

        function loadData() {
            $.ajax({
                url: '<?php echo base_url("admin/get_data"); ?>/' + offset,
                type: 'GET',
                success: function(response) {
                    $('#data-table').html(response);
                    offset += limit;
                }
            });
        }
        $(document).ready(function() {
            loadData();

            $('#load-more').click(function() {
                loadData();
            });
        });
    </script>

<?php include('footer.php'); ?>

    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    
</script>



        <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->

        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
            
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
            
        </script>
        <!-- Bootstrap 4 -->
        <!-- <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <!-- DataTables  & Plugins -->
        <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js">
            
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
            
        </script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
        
    </script>
   <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
       
   </script>
 
</body>
</html>
