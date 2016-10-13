<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo $this->config->item('US', 'countries');

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
                                    <th colspan="3"><h2>Manage Sites</h2></th>
                            <th colspan="4" class="right-align"> <a href="#" class="view-all remove">Remove Site</a></th>
                            </tr>
                            <tr class="titles">
                                <th class="top-first"><input type="checkbox" name="check_all"></th>
                                <th class="text-center top-title">ID</th>
                                <th class="top-title">Site Title</th>
                                <th class="top-title">Pharmacy Contact</th>
                                <th class="top-title">Contact</th>
                                <th class="top-title">Country</th>
                            </tr>
                            </thead>
                            <tbody target="sites">
                                <?php
                                if (sizeof($sites)) {
                                    foreach ($sites as $site) {
                                        ?>
                                <tr item_id="<?php echo $site['site_id']; ?>" class="site-row">
                                            <td ><input class="item_checkbox" type="checkbox" ></td>
                                            <td><span><?php echo $site['site_id']; ?></span></td>
                                            <td><span><?php echo get_site_map($site['site']); ?></span></td>
                                            <td><?php echo $site['main_pharmacy_contact']; ?></td>
                                            <td><?php echo $site['contact_number']; ?></td>
                                            <td><?php echo $this->config->item($site['country'], 'countries'); ?></td>
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
                                <?php }
                                ?>


                            </tbody></table>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-12 col-lg-4">
                    <div class="form-lable"><h2>Add New Site</h2></div>
                    <div class="form-control editor">
                        <form action="<?php echo base_url('manage_sites/add_site_process'); ?>" method="post" class="site_form form">
                            <div class="form-inner">

                                <div class="form-group" id="section-3">
                                    <label>Site Title</label>
                                    <?php echo get_site_dropdown();?>
                                    <!--<input name="site_title" id="site_title" type="text" value="" placeholder="Site Title" >-->
                                </div>
                                <div class="form-group" id="section-3">
                                    <label>Institution Name</label>
                                    <input name="institution" id="institution" type="text" value="" placeholder="Institution Name" >
                                </div>
                                <div class="form-group" id="section-3">
                                    <label>Main Pharmacy Contact</label>
                                    <input name="main_pharmacy_contact" id="main_pharmacy_contact"  type="text" value="" placeholder="Main Pharmacy Contact" >
                                </div>
                                <div class="form-group" id="section-3">
                                    <label>Contact Number</label>
                                    <input name="contact_number" id="contact_number"  type="text" value="" placeholder="Contact Number" >
                                </div>
                              
                                <div class="form-group" id="section-3">
                                    <label for="country">Country</label>
                                    <select id="country" name="country" class="bfh-countries col-xs-6" data-country="GB"></select>
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
</section>

<!-- Modal -->
<div id="delModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger confirm-del">Confirm</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>