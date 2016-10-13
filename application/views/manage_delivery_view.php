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
                                    <th colspan="3"><h2>Manage Delivery</h2></th>
                        <th colspan="4" class="right-align"> <?php if(ADMIN){ ?><a href="#" class="view-all remove">Remove Deliery</a><?php } ?></th>
                            </tr>
                            <tr class="titles">
                                <th class="top-first"><?php if(ADMIN){ ?><input type="checkbox" name="check_all"><?php } ?></th>
                                <th class="top-title">Site</th>
                                <th class="top-title">Delivery Date</th>
                                <th class="top-title">Batch Number</th>
                                <th class="top-title">Number of Implants</th>
                                <th class="top-title">Confirmed By</th>
                            </tr>
                            </thead>
                            <tbody target="deliveries">
                                <?php
                                if (sizeof($deliveries)) {
                                    foreach ($deliveries as $delivery) {
                                        ?>
                                        <tr item_id="<?php echo $delivery['id']; ?>" class="delivery-row">
                                            <td ><?php if(ADMIN){ ?><input class="item_checkbox" type="checkbox" ><?php } ?></td>
                                            <td><span><?php echo get_site_map($delivery['site']); ?></span></td>
                                            <td><?php echo $delivery['delivery_date']; ?></td>
                                            <td><?php echo get_batch_map($delivery['bt_num']); ?></td>
                                            <td><?php echo $delivery['number_implants']; ?></td>
                                            <td><?php echo $delivery['confirmed_by']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>


                            </tbody></table>
                    </div>
                </div>
                <?php if(ADMIN || QP){ ?>
                <div class=" col-sm-12 col-md-12 col-lg-4">
                    <div class="form-lable"><h2>Add New Delivery</h2></div>
                    <div class="form-control editor">
                        <form action="<?php echo base_url('manage_delivery/add_delivery_process'); ?>" method="post" class="delivery_implant_form form">
                            <div class="form-inner">

                                <div class="form-group" id="section-3">
                                    <label>Site</label>
                                    <?php echo get_site_dropdown();?>
                                </div>
                                <div class="form-group manage-delivery" id="section-3">
                                    <label>Batch Number</label>
                                    <?php echo $batchDropDown = get_batch_dropdown(); ?>
                                </div>

                                <div class="form-group  has-feedback" id="section-2">
                                    <label>Delivery Date</label>
                                    <input name="delivery_date" id="delivery_date" class="datetime"  type="text"  >
                                    <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                </div>

                                <div class="form-group" id="section-3">
                                    <label>Number of Implants</label>
                                    <input name="number_implants" id="number_implants" type="text" placeholder="Number Implants" value="" >
                                </div>

                                <div class="form-group" id="section-3">
                                    <label>Delivery Confirmed by</label>
                                    <input name="confirmed_by" id="confirmed_by"  type="text" placeholder="Delivery Confirmed by" value="" >
                                </div>

                                <div class="form-group" id="section-3">
                                    <label>Delivery Notes</label>
                                    <textarea name="delivery_notes" id="delivery_notes" rowspan="8"></textarea>
                                </div>


                                <div class="sub-btn"><input id="submit" type="submit" value="Save"></div>
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

