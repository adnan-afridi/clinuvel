<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$curUser = currentuser_session();
$userRole = $curUser['user_role'];
$readOnly = 'readonly="readonly"';
if (ADMIN)
    $readOnly = "";
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="edit-sec">
                        <h5>Edit Wastage<a href="<?php echo base_url('manage_wastage'); ?>">Cancel</a><div class="clearfix"></div></h5>
                        <div class="inner-edit">
                            <h6>Wastage ID: <?php echo $wastageData['id']; ?></h6>
                            <div class="edit-form">
                                <?php if (ADMIN) { ?>
                                    <form method="post" action="<?php echo base_url('manage_wastage/update_wastage'); ?>" class="form">
                                        <input type="hidden" name="id" value="<?php echo $wastageData['id']; ?>" >
                                    <?php } ?>

                                    <label>Site</label>
                                    <?php
                                    if (ADMIN) {
                                        echo $siteDropDown = get_site_dropdown($wastageData['site']);
                                    } else {
                                        ?>
                                        <input name="" id="site" type="text" value="<?php echo get_site_map($wastageData['site']); ?>" placeholder="Site" <?php echo $readOnly; ?>>
                                    <?php } ?>
                                    <label>Batch Number</label>
                                    <?php
                                    if (ADMIN) {
                                        echo $batchList = get_batch_dropdown($wastageData['batch_number']);
                                    } else {
                                        ?>
                                    <input name="" id="batch_number" type="text" width="100px;" <?php echo $readOnly; ?> value="<?php echo get_batch_map($wastageData['batch_number']); ?>">
                                    <?php } ?>


                                    <label>Date Reported</label>
                                    <input  type="text" <?php if(ALLOW_EDIT){ ?> name="date_reported" class="datetime" <?php } else {?> class="date_picker" <?php } ?> value="<?php echo $wastageData['date_reported']; ?>" <?php echo $readOnly; ?>>
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>


                                    <label>Reason</label>
                                    <input name="reason" id="number_implants" type="text" placeholder="Reason" value="<?php echo $wastageData['reason']; ?>" <?php echo $readOnly; ?>>


                                    <label>Notes</label>
                                    <textarea rows="6" name="notes" id="notes" rowspan="8" <?php echo $readOnly; ?>><?php echo $wastageData['notes']; ?></textarea>
                                    <?php if (ADMIN) { ?>
                                        <div>
                                            <input name="" type="submit" class="submit-btn" value="Update">
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>