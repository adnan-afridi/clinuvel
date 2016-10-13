<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$curUser = currentuser_session();
//$userRole = $curUser['user_role'];
//$readOnly = 'readonly="readonly"';
//if ($userRole == 1)
//    $readOnly = "";
//?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="edit-sec">
                        <h5>Edit Delivery<a href="<?php echo base_url('manage_delivery/add_delivery_process'); ?>">Cancel</a><div class="clearfix"></div></h5>
                        <div class="inner-edit">
                            <div class="edit-form">
                                <form method="post" action="<?php echo base_url('manage_delivery/update_delivery'); ?>" class="form">

                                <label>Site</label>
                                <input name="site" id="site" type="text" value="" placeholder="Site" >

                                <label>Batch Number</label>
                                <input name="batch_number" id="batch_number" type="number" value="" placeholder="Batch Number"  >


                                <label>Delivery Date</label>
                                <input name="delivery_date"  type="text" class="datetime" value="" >
                                <i class="glyphicon glyphicon-calendar form-control-feedback"></i>


                                <label>Number of Implants</label>
                                <input name="number_implants" id="number_implants" type="text" placeholder="Number Implants" value="" >


                                <label>Delivery Confirmed by</label>
                                <input name="confirmed_by" id="confirmed_by"  type="text" placeholder="Delivery Confirmed by" value="" >


                                <label>Delivery Notes</label>
                                <textarea rows="6" name="delivery_notes" id="delivery_notes" rowspan="8" ></textarea>
                            
                                    <div>
                                        <input name="" type="submit" value="Add Delivery">
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