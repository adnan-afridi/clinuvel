<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$readOnly = 'readonly="readonly"';
if (ALLOW_EDIT == true) {
    $readOnly = "";
}
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-sm-12 col-md-12 col-lg-8">
                    <div class=" col-xs-12">
                        <div class="edit-sec">
                            <h5>Edit Batch<a href="<?php echo base_url('batch'); ?>">Cancel</a><div class="clearfix"></div></h5>

                            <div class="form-inner">

                                <form action="<?php echo base_url('batch/update_batch'); ?>" method="post" class="form" id="edit_batch_form" >
                                    <input type="hidden" name="id" value="<?php echo $batchData['drug_batch_id']; ?>" >

                                    <div class="form-group" id="section-1">
                                        <label>Batch number</label>
                                        <?php if(ADMIN){
                                        echo $batchList = get_batch_dropdown($batchData['batch_number']);
                                        } else { ?>
                                        <input  id="batch_number" type="text" width="100px;" readonly="readonly" value="<?php echo get_batch_map($batchData['batch_number']); ?>">
                                        <?php } ?>
                                    </div>
                                    <div class="form-group" id="section-2">
                                        <label>Total implants</label>
                                        <input <?php if (ALLOW_EDIT) { ?> name="total_implants" <?php } ?> id="total_implants"  type="text" <?php echo $readOnly; ?> value="<?php echo $batchData['total_implants']; ?>">
                                    </div>
                                    <div class="form-group" id="section-1">
                                        <label>Implants allocated to quality control</label>
                                        <input name="imp_alloc_qc" id="implant_all_qc"  type="text" <?php echo $readOnly; ?> value="<?php echo $batchData['imp_alloc_qc']; ?>">
                                    </div>
                                    <div class="form-group" id="section-2">
                                        <label>Implants allocated to clinical trials</label>
                                        <input name="imp_alloc_ct" id="implant_all_ct"  type="text" <?php echo $readOnly; ?> value="<?php echo $batchData['imp_alloc_ct']; ?>" >
                                    </div>
                                    <div class="form-group has-feedback" id="section-1">
                                        <label>Manufacturing date</label>
                                        <input   type="text" class="manufacture_date" <?php if (ALLOW_EDIT) { ?> name="manufacture_date" <?php } echo $readOnly; ?> value="<?php echo $batchData['manufacture_date']; ?>">
                                        <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                    </div>
                                    <div class="form-group  has-feedback" id="section-2">
                                        <label>Release date</label>
                                        <input   type="text" class="release_date" <?php if (ALLOW_EDIT) { ?> name="release_date" <?php } echo $readOnly; ?> value="<?php echo $batchData['release_date']; ?>">
                                        <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback" id="section-1">
                                        <label>Expiry date</label>
                                        <input   type="text" class="expiry_date" <?php if (ALLOW_EDIT) { ?> name="expiry_date" <?php } echo $readOnly; ?> value="<?php echo $batchData['expiry_date']; ?>">
                                        <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback" id="section-2">
                                        <label>Extended expiry date</label>
                                        <input type="text" class="extended_expiry_date" name="extended_expiry_date"<?php echo $readOnly; ?> value="<?php echo $batchData['extended_expiry_date']; ?>">
                                        <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                    </div>
                                    <div class="form-group" id="section-3">
                                        <label>Notes</label>
                                        <textarea cols="15" <?php if (ALLOW_EDIT) { ?> name="notes" <?php } ?> placeholder="Notes" <?php echo $readOnly; ?> rows="10"> <?php echo $batchData['notes']; ?>
                                        </textarea>
                                    </div>
                                    <div class="sub-btn" >
                                        <input id="submit" type="submit" class="submit-btn" value="Update Batch">
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>

