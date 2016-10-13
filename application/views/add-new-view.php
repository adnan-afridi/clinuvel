
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-sm-12 col-md-12 col-lg-12">
                    <div class="form-lable">
                        <h2>Add batch</h2>
                    </div>
                    <div class="form-control-div">
                        <form action="<?php echo base_url('batch/add_batch'); ?>" method="post">
                            <div class="form-inner">
                                <div class="form-group" id="section-1">
                                    <label>Batch number</label>
                                    <input name="batch_number" type="text" width="100px;">
                                </div>
                                <div class="form-group" id="section-2">
                                    <label>Total implants</label>
                                    <input name="total_implants"  type="text">
                                </div>
                                <div class="form-group" id="section-1">
                                    <label>Implants allocated to quality control</label>
                                    <input name="imp_alloc_qc"  type="text">
                                </div>
                                <div class="form-group" id="section-2">
                                    <label>Implants allocated to clinical trials</label>
                                    <input name="imp_alloc_ct"  type="text">
                                </div>
                                <div class="form-group has-feedback" id="section-1">
                                    <label>Manufacturing date</label>
                                    <input name="manufacture_date"  type="text" class="datetime ">
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                </div>
                                <div class="form-group  has-feedback" id="section-2">
                                    <label>Release date</label>
                                    <input name="release_date"  type="text" class="datetime">
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback" id="section-1">
                                    <label>Expiry date</label>
                                    <input name="expiry_date"  type="text" class="datetime">
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback" id="section-2">
                                    <label>Extended expiry date</label>
                                    <input name="extended_expiry_date"  type="text" class="datetime">
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                </div>
                                <div class="form-group" id="section-3">
                                    <label>Notes</label>
                                    <textarea cols="15" name="notes" placeholder="Notes" rows="10">
                                    </textarea>
                                </div>
                                <div class="sub-btn" >
                                    <input id="submit" type="submit" value="Add Batch">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>

