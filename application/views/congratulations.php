<!DOCTYPE html>
<html>
<?php include('include/header.php'); ?>

    <section id="registerPage" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-xxl-6 mx-auto text-center">
                    <!--<img src="images/congrtsIcon.png" class="congrtsIcon" alt="Congratulations" width="auto" height="auto">-->
                    <h2 class="congrtsHead">Congratulations !</h2>
                    <p class="congrtsPara mb-4">Your profile has been successfully Created. You will redirected to Home page.</p>
                    <p class="congrtsPara mb-5">Your registration will be effective only after admin approval. Username and password will be send to you via email.</p>
                    <div class="pwSetBox">
                        <h3 class="setPwHead">Set Profile Password</h3>
                        <?php if(isset($errormessage) && $errormessage==1)
                        {
                            ?>
                            <span style="color:red;font-size:16px;">Passwords dont match.</span>
                            <?php
                        }?>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <div class="w-100">
                                    <p><span class="me-3">Name :</span><?= $userdetails->name?></p>
                                    <p><span class="me-3">Profile Id :</span><?= $userdetails->happynikah_id?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <div class="w-100">
                                    <form class="customForm" action="<?php echo site_url('user/create_password'); ?>?currentpage=1" method="post" autocomplete="off">
                                        <div class="mb-3">
                                            <label class="form-label">Enter password</label>
                                            <input type="password" class="form-control" placeholder="" name="set_password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm your password</label>
                                            <input type="password" class="form-control" placeholder=""  name="confirm_password" required >
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 ms-auto">
                                <button type="submit" class="btn cstmBtnColr w-100" >Submit</button>
                            </div>
                        </div>
                    </div> </form>
                    <!-- <button class="btn cstmBtnColr" type="button" onclick="window.location.href='index.html'">Back to Home</button> -->
                </div>
            </div>
        </div>
    </section>
    <?php include('include/footer.php'); ?>

</body>
</html>