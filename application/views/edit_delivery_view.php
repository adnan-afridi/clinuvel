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
                        <h5>Edit Delivery<a href="<?php echo base_url('manage_delivery'); ?>">Cancel</a><div class="clearfix"></div></h5>
                        <div class="inner-edit">
                            <h6>Delivery ID: <?php echo $deliveryData['id']; ?></h6>
                            <div class="edit-form">
                                <?php if (ADMIN || QP) { ?>
                                    <form method="post" action="<?php echo base_url('manage_delivery/update_delivery'); ?>" class="form delivery_implant_form">
                                        <input type="hidden" name="id" value="<?php echo $deliveryData['id']; ?>" >
                                    <?php } ?>
                                    <label>Site</label>

                                    <?php
                                    if (ADMIN) {
                                        echo $siteDropDown = get_site_dropdown($deliveryData['site']);
                                    } else {
                                        ?>
                                    <input name="site" id="site" type="text" value="<?php echo get_site_map($deliveryData['site']); ?>" placeholder="Site" <?php echo $readOnly; ?>>
                                    <?php } ?>


                                    <label>Batch</label>
                                    <?php
                                    if (ADMIN) {
                                        echo $batchList = get_batch_dropdown($deliveryData['batch_number']);
                                    } else {
                                        ?>
                                        <input  id="batch_number" type="text" width="100px;" readonly="readonly" value="<?php echo get_batch_map($deliveryData['batch_number']); ?>">
                                    <?php } ?>

                                    <label>Delivery Date</label>
                                    <input  type="text" <?php if (ADMIN) { ?> name="delivery_date" class="datetime" <?php } else { ?> class="date_picker" <?php } ?> value="<?php echo $deliveryData['delivery_date']; ?>" <?php echo $readOnly; ?>>
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>


                                    <label>Number of Implants</label>
                                    <input <?php if (ADMIN) { ?> name="number_implants" <?php } ?> id="number_implants" type="text" placeholder="Number Implants" value="<?php echo $deliveryData['number_implants']; ?>" <?php echo $readOnly; ?>>


                                    <label>Delivery Confirmed by</label>
                                    <input <?php if (ADMIN) { ?> name="confirmed_by" <?php } ?> id="confirmed_by"  type="text" placeholder="Delivery Confirmed by" value="<?php echo $deliveryData['confirmed_by']; ?>" <?php echo $readOnly; ?>>


                                    <label>Delivery Notes</label>
                                    <textarea rows="6" name="delivery_notes" id="delivery_notes" rowspan="8" <?php echo (ADMIN || QP) ? "" : $readOnly; ?>><?php echo $deliveryData['delivery_notes']; ?></textarea>
                                    <?php if (ADMIN || QP) { ?>
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