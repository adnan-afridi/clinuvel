<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="table-outer table-responsive">
                        <table class="table table-striped table-hover users-table">
                            <thead>   
                                <tr>
                                    <th colspan="3"><h2>Manage Batches</h2></th>
                            <th colspan="20" class="right-align"> <a href="#" class="view-all remove">Remove Batch</a></th>
                            </tr>
                            <tr class="titles">
                                <th class="top-first"><input type="checkbox" name="check_all"></th>
                                <th class="text-center top-title">Batch No</th>
                                <th class="top-title" title="">Total Implants</th>
                                <th class="top-title" title="Implants allocated to quality control">Imp All QC</th>
                                <th class="top-title" title="Implants allocated to clinical trials">Imp All CT</th>
                                <th class="top-title" title="Manufacturing date">Manuf. Date</th>
                                <th class="top-title">Release</th>
                                <th class="top-title">Expiry</th>
                                <th class="top-title" title="Extended expiry date">Ext Expiry</th>

                            </tr>
                            </thead>
                            <tbody target="drug_batch">
                                <?php
                                if (sizeof($batchData)) {
                                    foreach ($batchData as $batch) {
                                        ?>
                                        <tr item_id="<?php echo $batch['drug_batch_id']; ?>" class="batch-row">
                                            <td ><input class="item_checkbox" type="checkbox" ></td>
                                            <td><?php echo get_batch_map($batch['batch_number']); ?></td>
                                            <td><?php echo $batch['total_implants']; ?></td>
                                            <td><?php echo $batch['imp_alloc_qc']; ?></td>
                                            <td><?php echo $batch['imp_alloc_ct']; ?></td>
                                            <td><?php echo $batch['manufacture_date']; ?></td>
                                            <td><?php echo $batch['release_date']; ?></td>
                                            <td><?php echo $batch['expiry_date']; ?></td>
                                            <td><?php echo $batch['extended_expiry_date']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="20">
                                            <em>No Data yet.</em>
                                        </td>
                                    </tr>
                                <?php } ?>


                            </tbody></table>
                    </div>
                </div>
                <?php if (ALLOW_ADD) { ?>
                    <div class=" col-sm-12 col-md-12 col-lg-4">
                        <div class="form-lable"><h2>Add Batch</h2></div>
                        <div class="form-control editor">
                            <form action="<?php echo base_url('batch/add_batch'); ?>" method="post" class="form" id="add_batch_form">
                                <div class="form-inner">
                                    <div class="form-group" id="section-1">
                                        <label>Batch number</label>
                                        <?php echo $batchList = get_batch_dropdown(); ?>
                                    </div>
                                    <div class="form-group" id="section-2">
                                        <label>Total implants</label>
                                        <input name="total_implants" id="total_implants"  type="text">
                                    </div>
                                    <div class="form-group" id="section-1">
                                        <label>Implants allocated to quality control</label>
                                        <input name="imp_alloc_qc" id="implant_all_qc"  type="text">
                                    </div>
                                    <div class="form-group" id="section-2">
                                        <label>Implants allocated to clinical trials</label>
                                        <input name="imp_alloc_ct" id="implant_all_ct"  type="text">
                                    </div>
                                    <div class="form-group has-feedback" id="section-1">
                                        <label>Manufacturing date</label>
                                        <input name="manufacture_date"  type="text" class="">
                                        <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                    </div>
                                    <div class="form-group  has-feedback" id="section-2">
                                        <label>Release date</label>
                                        <input name="release_date"  type="text" class="">
                                        <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback" id="section-1">
                                        <label>Expiry date</label>
                                        <input name="expiry_date"  type="text" class="">
                                        <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback" id="section-2">
                                        <label>Extended expiry date</label>
                                        <input name="extended_expiry_date"  type="text" class="">
                                        <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                    </div>
                                    <div class="form-group" id="section-3">
                                        <label>Notes</label>
                                        <textarea cols="15" name="notes" placeholder="Notes" rows="10">
                                        </textarea>
                                    </div>
                                    <div class="sub-btn" >
                                        <input id="submit" type="submit" value="Add">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

