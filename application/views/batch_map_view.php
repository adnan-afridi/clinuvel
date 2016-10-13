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
                                    <th colspan="3"><h2>Manage Batches Mapping</h2></th>
                            <th colspan="20" class="right-align"> <a href="#" class="view-all remove">Remove</a></th>
                            </tr>
                            <tr class="titles">
                                <th class="top-first"><input type="checkbox" name="check_all"></th>
                                <th class="top-title">ID</th>
                                <th class="top-title">OC value</th>
                                <th class="top-title">Local Value</th>
                                <th class="top-title">Date Created</th>
                            </tr>
                            </thead>
                            <tbody target="batch_mapping">
                                <?php
                                if (sizeof($batchMapData)) {
                                    foreach ($batchMapData as $batch) {
                                        ?>
                                        <tr item_id="<?php echo $batch['id']; ?>" class="batch-map-row">
                                            <td ><input class="item_checkbox" type="checkbox" ></td>
                                            <td><?php echo $batch['id']; ?></td>
                                            <td><?php echo $batch['oc_value']; ?></td>
                                            <td><?php echo $batch['local_value']; ?></td>
                                            <td><?php echo date('Y-m-d',$batch['date_created']); ?></td>
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
                <div class=" col-sm-12 col-md-12 col-lg-4">
                    <div class="form-lable"><h2>Add Batch Mapping</h2></div>
                    <div class="form-control editor">
                        <form action="<?php echo base_url('batch/add_batch_map'); ?>" method="post" class="form">
                            <div class="form-inner">
                                <div class="form-group" id="section-2">
                                    <label>OC Value</label>
                                    <input name="oc_value"  type="text">
                                </div>
                                <div class="form-group" id="section-1">
                                    <label>Batch Title</label>
                                    <input name="local_value"  type="text">
                                </div>

                                <div class="sub-btn" >
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
</section>

