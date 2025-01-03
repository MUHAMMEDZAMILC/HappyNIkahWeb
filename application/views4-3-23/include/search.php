<div class="searchBox">
                        <form class="customForm" action="<?php echo site_url('user/search_profile'); ?>" method="post" autocomplete="off">
                            <div class="row">
                                <!--<div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">-->
                                <!--    <label class="form-label">I'm looking for</label>-->
                                <!--    <select class="form-select form-control" aria-label="" name="gender">-->
                                <!--        <option value="">Select</option>-->
                                <!--        <option value="2">Women</option>-->
                                <!--        <option value="1">Man</option>-->
                                <!--    </select>-->
                                <!--</div>-->
                                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                                    <label class="form-label">Aged</label>
                                    <select class="form-select form-control" aria-label="" name="age">
                                        <option value="">Select</option>
                                        <option value="18-25">18-25</option>
                                        <option value="25-30">25-30</option>
                                        <option value="30-35">30-35</option>
                                        <option value="35-40">35-40</option>
                                        <option value="40-45">40-45</option>
                                        <option value="45-50">45-50</option>
                                        <option value="50-55">50-55</option>
                                        <option value="55-60">55-60</option>
                                        <option value="60-65">60-65</option>
                                        <option value="65-70">65-70</option>
                                        <option value="70-75">70-75</option>
                                        <option value="75-80">75-80</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                                    <label class="form-label">Belief</label>
                                    <select class="form-select form-control" aria-label="" name="caste">
                                        <option value="">Select</option>
                                        <?php foreach ($belief as $value) { ?>
                                        <option value="<?php echo $value->sid ?>"><?php echo $value->sub_caste; ?></option>  
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                                    <label class="form-label" style="opacity:0;">I'm looking for</label>
                                    <button type="submit" class="btn cstmBtnColr w-100" ><img src="<?php echo base_url() ?>assets/images/search.png"><span>Search</span></button>
                                </div>
                            </div>
                        </form>
                    </div>