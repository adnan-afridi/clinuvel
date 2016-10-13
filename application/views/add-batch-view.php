
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-sm-12 col-md-12 col-lg-12">
                    <div class=" col-xs-7">
                        <div class="form-lable">
                            <h2>Add batch</h2>
                        </div>
                        <form action="http://localhost/clinuvel/batch/add_batch" method="post" class="form" id="add_batch_form" novalidate="novalidate">
                            <div class="form-inner">
                                <div class="form-group" id="section-1">
                                    <label>Batch number</label>
                                    <select name="batch_number" id="batch_number"><option value="">-- Select Batch --</option><option value="0">ML1154</option><option value="1">ML1234</option></select>                                    </div>
                                <div class="form-group" id="section-2">
                                    <label>Total implants</label>
                                    <input name="total_implants" id="total_implants" type="text">
                                </div>
                                <div class="form-group" id="section-1">
                                    <label>Implants allocated to quality control</label>
                                    <input name="imp_alloc_qc" id="implant_all_qc" type="text">
                                </div>
                                <div class="form-group" id="section-2">
                                    <label>Implants allocated to clinical trials</label>
                                    <input name="imp_alloc_ct" id="implant_all_ct" type="text">
                                </div>
                                <div class="form-group has-feedback" id="section-1">
                                    <label>Manufacturing date</label>
                                    <input name="manufacture_date" type="text" class="hasDatepicker" id="dp1441736700195">
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                </div>
                                <div class="form-group  has-feedback" id="section-2">
                                    <label>Release date</label>
                                    <input name="release_date" type="text" class="hasDatepicker" id="dp1441736700196">
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback" id="section-1">
                                    <label>Expiry date</label>
                                    <input name="expiry_date" type="text" class="hasDatepicker" id="dp1441736700197">
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback" id="section-2">
                                    <label>Extended expiry date</label>
                                    <input name="extended_expiry_date" type="text" class="hasDatepicker" id="dp1441736700198">
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                </div>
                                <div class="form-group" id="section-2">
                                    <label>Notes</label>
                                    <textarea cols="15" name="notes" placeholder="Notes" rows="10">                                        </textarea>
                                </div>
                                <div class="sub-btn">
                                    <input id="submit" type="submit" value="Add">
                                </div>
                                <div class="clearfix"></div>
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

