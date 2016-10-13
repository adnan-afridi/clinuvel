<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$curUser = currentuser_session();
$userRole = $curUser['user_role'];
$readOnly = 'readonly="readonly"';
if ($userRole == 1)
    $readOnly = "";
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-sm-12 col-md-12 col-lg-8">
                    <div class=" col-xs-8">
                        <div class="edit-sec">
                        <h5>Edit Site Mapping<a href="<?php echo base_url('manage_sites'); ?>">Cancel</a><div class="clearfix"></div></h5>

                        <div class="form-inner">
                            <?php if ($userRole == 1) { ?>
                                <form action="<?php echo base_url('manage_sites/update_site_map'); ?>" method="post" class="form">
                                    <input type="hidden" name="site_map_id" value="<?php echo $siteMapData['site_map_id']; ?>" >
                                <?php } ?>
                                <div class="form-group" id="section-1">
                                    <label>OC Value</label>
                                    <input name="site_oc_value" type="text" width="100px;" value="<?php echo $siteMapData['site_oc_value']; ?>">
                                </div>
                                <div class="form-group" id="section-2">
                                    <label>Site Title</label>
                                    <input name="site_title"  type="text" value="<?php echo $siteMapData['site_title'];?>">
                                </div>
                                
                                <?php if ($userRole == 1) { ?>
                                    <div class="sub-btn" >
                                        <input id="submit" type="submit" value="Update Site">
                                    </div>
                                </form>
                            <?php } ?>
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

