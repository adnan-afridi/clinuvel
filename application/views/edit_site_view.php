<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$curUser = currentuser_session();
$userRole = $curUser['user_role'];
$readOnly = 'readonly="readonly"';
$pageTitle = 'Site Info';
if (ADMIN || PM){
    $readOnly = "";
$pageTitle = 'Edit Stie';  
}
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="edit-sec">
                        <h5><?php echo $pageTitle; ?><a href="<?php echo base_url('manage_sites'); ?>">Cancel</a><div class="clearfix"></div></h5>
                        <div class="inner-edit">
                            <h6>Site ID: <?php echo $siteData['site_id']; ?></h6>
                            <div class="edit-form">
                                <?php if (ADMIN || PM) { ?>
                                    <form method="post" action="<?php echo base_url('manage_sites/update_site'); ?>" class="form">
                                        <input type="hidden" name="site_id" value="<?php echo $siteData['site_id']; ?>">
                                    <?php } ?>
                                    <label>Site Title</label>
                                    <?php echo get_site_dropdown($siteData['site']); ?>
                                    <!--<input name="site_title" id="site_title" type="text" value="<?php //echo $siteData['site_title']; ?>" placeholder="Site Title" <?php //echo $readOnly; ?>>-->
                                    
                                    <label>Institution Name</label>
                                    <input name="institution" id="institution" type="text" value="<?php echo $siteData['institution']; ?>" placeholder="Institution Name" <?php echo $readOnly; ?>>

                                    <label>Main Pharmacy Contact</label>
                                    <input name="main_pharmacy_contact" id="main_pharmacy_contact"  type="text" value="<?php echo $siteData['main_pharmacy_contact']; ?>" placeholder="Main Pharmacy Contact" <?php echo $readOnly; ?> >

                                    <label>Contact Number</label>
                                    <input name="contact_number" id="contact_number" class="phone_number" type="text" value="<?php echo $siteData['contact_number']; ?>" placeholder="Contact Number" <?php echo $readOnly; ?>>

                                    <label for="country">Country</label>
                                    <?php if ($userRole == 1) { ?>
                                        <select id="country" name="country" class="bfh-countries" data-country="<?php echo $siteData['country']; ?>"></select>
                                    <?php } else {
                                        ?>
                                        <input id="country" name="country" type="text" value="<?php echo $this->config->item($siteData['country'], 'countries'); ?>"  <?php echo $readOnly; ?>>

                                        <?php
                                    }
                                    if (ADMIN || PM) {
                                        ?>
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