<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$curUser = currentuser_session();
$userRole = $curUser['user_role'];

?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="edit-sec">
                        <h5>Add New Wastage<a href="<?php echo base_url('manage_wastage'); ?>">Cancel</a><div class="clearfix"></div></h5>
                        <div class="form-control editor manage-wastage">
                            <form class="form check_wastage" action="<?php echo base_url('manage_wastage/add_wastage'); ?>" method="post">
                                <div class="form-inner">
                                    <div class="form-group" id="section-3">
                                        <p><strong>Note</strong>: Wastage is the loss of a single implant at a specific site. If multiple implants are reported lost then a wastage report must be logged for each individual implant in the system.</p>
                                    </div>
                                    <div class="info"></div>
                                    <div class="form-group" id="section-3">
                                        <label>Site</label>
                                        <?php echo $siteDropDown = get_site_dropdown(); ?>
                                    </div>
                                    <div class="form-group" id="section-3">
                                        <label>Batch Number</label>
                                        <?php echo $batchDropDown = get_batch_dropdown(); ?>
                                    </div>
                                    <div class="form-group  has-feedback" id="section-3">
                                        <label>Date Reported</label>
                                        <input name="date_reported"  type="text" id="date_reported" class="datetime" >
                                        <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                    </div>

                                    <div class="form-group" id="section-3">
                                        <label>Reason</label>
                                        <input name="reason" id="reason" type="text" placeholder="Reason" value="" >
                                    </div>
                                    <div class="form-group" id="section-3">
                                        <label>Notes</label>
                                        <textarea name="notes" id="notes" rowspan="8"></textarea>
                                    </div>

                                    <div class="sub-btn"><input id="submit" type="submit" value="Save"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>