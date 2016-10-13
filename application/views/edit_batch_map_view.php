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
                        <h5>Edit Batch Mapping<a href="<?php echo base_url('batch/batch_mapping'); ?>">Cancel</a><div class="clearfix"></div></h5>

                        <div class="form-inner">
                            <?php if ($userRole == 1) { ?>
                                <form action="<?php echo base_url('batch/update_batch_map'); ?>" method="post" class="form">
                                    <input type="hidden" name="id" value="<?php echo $batchMapData['id']; ?>" >
                                <?php } ?>
                                <div class="form-group" id="section-1">
                                    <label>OC Value</label>
                                    <input name="oc_value" type="text" width="100px;" value="<?php echo $batchMapData['oc_value']; ?>">
                                </div>
                                <div class="form-group" id="section-2">
                                    <label>Batch Title</label>
                                    <input name="local_value"  type="text" value="<?php echo $batchMapData['local_value']; ?>">
                                </div>
                                
                                <?php if ($userRole == 1) { ?>
                                    <div class="sub-btn" >
                                        <input id="submit" type="submit" value="Update Batch">
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

