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
                    <div class="edit-sec">
                        <h5>Add Site<a href="<?php echo base_url('manage_sites'); ?>">Cancel</a><div class="clearfix"></div></h5>
                        <div class="inner-edit">
                            <div class="edit-form">
                                <form method="post" action="<?php echo base_url('manage_sites/add_site_process'); ?>" class="form">
                                    <input type="hidden" name="site_id" value="">
                                    <label>Site Title</label>
                                    <input name="site_title" id="site_title" type="text" value="" placeholder="Site Title" >

                                    <label>Institution Name</label>
                                    <input name="institution" id="institution" type="text" value="" placeholder="Institution Name" >
                                    
                                    <label>Main Pharmacy Contact</label>
                                    <input name="main_pharmacy_contact" id="main_pharmacy_contact"  type="text" value="" placeholder="Main Pharmacy Contact"  >

                                    <label>Contact Number</label>
                                    <input name="contact_number" id="contact_number" class="phone_number" type="text" value="" placeholder="Contact Number" >

                                    <div class="form-group" id="section-3">
                                        <label for="country">Country</label>
                                        <select id="country" name="country" class="bfh-countries col-xs-6" data-country="US"></select>
                                    </div>
                                    <div>
                                        <input name="" type="submit" value="Add Site">
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