<!DOCTYPE html>
<html>
<?php include('include/user_header.php'); ?>


<section id="userContent">
        <div class="container cpContent">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-5 d-flex align-items-center">
                    <img src="<?php echo base_url() ?>/assets/images/feedbackIcon.svg" alt="feedback" class="cpIcon mb-md-4" style="width:350px;height:350px;">
                </div>
                <div class="col-12 col-md-1"></div>
                <div class="col-12 col-md-5 d-flex align-items-center">
                    <div class="w-100">
                        <h2 class="mb-3">Feedback
                        <!--<?php echo $message;?>-->
                        </h2>
                        <font color="red"><?php if(isset($message) && $message==1){ echo "Message Sent Successfully..";}?></font>
                                            <span id="form_val" class="validationclass" style="color: red;font-size: 15px;"></span>
<br><br>
                        
                        <form class="customForm" action="<?php echo site_url('user/send_feedback'); ?>" method="post">
                            
                            <div class="row">

                                <div class="col-12 col-md-6 mb-3" >
                                    <!-- <label class="form-label">Name</label> -->
                                    <input type="text" name="name" id="name" class="form-control border-0" placeholder="Name">
                                    <span id="name_val" class="validationclass" style="color: red;font-size: 15px;"></span>

                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <!-- <label class="form-label">Email</label> -->
                                    <input type="email" name="email" id="email" class="form-control border-0" placeholder="Email">
                                    <span id="email_val" class="validationclass" style="color: red;font-size: 15px;"></span>

                                </div>
                            </div>
                            <div class="mb-4">
                                <!-- <label class="form-label">Name</label> -->
                                <textarea class="form-control border-0" rows="4"  name="message" id="message"></textarea>
                                <span id="message_val" class="validationclass" style="color: red;font-size: 15px;"></span>

                            </div>
                            <div>
                                <button type="submit" class="btn cstmBtnColr" id="submitbtn"  onclick="return send_feedback();">Submit</button>
                            </div>
                        </form>
                    </div>                    
                </div>
                <div class="col-12 col-md-1"></div>
            </div>
        </div>
    </section>
    
    <?php include('include/footer.php'); ?>

    <!-- delete profile Modal -->
    <div class="modal fade" id="proDelModal" tabindex="-1" aria-labelledby="proLockModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <form class="customForm">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Select Reason</option>
                              <option value="1">I found my match on Happy Nikkah</option>
                              <option value="2">I found my match on other sites</option>
                              <option value="3">Taking a break</option>
                              <option value="4">I am unhappy with my experience on Happy Nikkah</option>
                              <option value="5">Other Reason</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="button" class="btn cancelBtn" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn cstmBtnColr" data-bs-dismiss="modal">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // burger menu
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
                $('body').toggleClass("is-scroll-disabled");
            });
            // burger menu end

            
            
        });
        function send_feedback()
        {
            var name = $('#name').val();
            var email = $('#email').val();
            var message = $('#message').val();
if(name == "" || email=="" || message==""){ 
    $('#form_val').html('Field Required');  
    return false;
}

    if(name!="" && email !="" && message!="")
    {
 $('#submitbtn').click();
    }
}
    </script>

</body>
</html>