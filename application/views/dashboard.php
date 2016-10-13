
<section class="mid-cont">
    <div class="nav-icon">
        <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
    </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">

                    <!--Implant administration-->
                    <div class="table-outer table-responsive">	
                        <div class="table-head">
                            <span class="table-title">Implant administration</span>
                            <span class="table-head-links  right-align pull-right">
                                <a href="<?php echo base_url('imp_administration/all_implants'); ?>" class="edit-spec">View all administrations</a>
                                <a href="<?php echo base_url('parser'); ?>" class="add-new">Upload data</a>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <table class="table table-striped pagination-table">
                            <thead>
                                <tr>
                                    <th class="top-first">ID</th>
                                    <th class="top-title">Dataset Name</th>
                                    <th class="top-title">Subjects</th>
                                    <th class="top-title">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (sizeof($impAdmin)) {
                                    foreach ($impAdmin as $impRow) {
                                        ?>
                                        <tr>
                                            <td><?php echo $impRow['study_id']; ?></td>
                                            <td><?php echo $impRow['dataset_name']; ?></td>
                                            <td><?php echo $impRow['subjects']; ?></td>
                                            <td><?php echo $impRow['date']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!--drug batch-->
                    <div class="table-outer table-responsive">	
                        <div class="table-head">
                            <span class="table-title">Drug batches</span>
                            <span class="table-head-links  right-align pull-right">
                                <a href="<?php echo base_url('batch'); ?>" class="view-all">View all</a>
                                <a href="<?php echo base_url('batch/add_new_batch'); ?>" class="add-new">Add new</a>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <table class="table table-striped pagination-table">
                            <thead>
                                <tr>
                                    <th class="top-first">Batch No</th>
                                    <th class="top-title">Total Implants</th>
                                    <th class="top-title">Imp All QC</th>
                                    <th class="top-title">Imp All CT</th>
                                    <th class="top-title">Man Dt</th>
                                    <th class="top-title">Release</th>
                                    <th class="top-title">Expiry</th>
                                    <th class="top-title">Ext Expiry</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (sizeof($batchData)) {
                                    foreach ($batchData as $batch) {
                                        ?>
                                        <tr>
                                            <td><?php echo $batch['local_value']; ?></td>
                                            <td><?php echo $batch['total_implants']; ?></td>
                                            <td><?php echo $batch['imp_alloc_qc']; ?></td>
                                            <td><?php echo $batch['imp_alloc_ct']; ?></td>
                                            <td><?php echo date('M,d,Y', strtotime($batch['manufacture_date'])); ?></td>
                                            <td><?php echo date('M,d,Y', strtotime($batch['release_date'])); ?></td>
                                            <td><?php echo date('M,d,Y', strtotime($batch['expiry_date'])); ?></td>
                                            <td><?php echo date('M,d,Y', strtotime($batch['extended_expiry_date'])); ?></td>
                                        </tr>
                                        <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!--Implant wastage-->
                    <div class="table-outer table-responsive">	
                        <div class="table-head">
                            <span class="table-title" >Implant wastage</span>
                            <span class="table-head-links  right-align pull-right">
                                <a href="<?php echo base_url('manage_wastage'); ?>" class="edit-spec">View all wastage</a>
                                <a href="<?php echo base_url('manage_wastage/new_wastage'); ?>" class="add-new">Add wastage</a>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <table class="table table-striped pagination-table">
                            <thead>
                                <tr>
                                    <th class="top-first">Batch</th>
                                    <th class="top-title">Site</th>
                                    <th class="top-title">Date reported</th>
                                    <th class="top-title">Reason</th>
                                    <th class="top-title">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (sizeof($wastage)) {
                                    foreach ($wastage as $row) {
                                        ?>
                                        <tr item_id="<?php echo $row['id']; ?>">
                                            <td><?php echo $row['local_value']; ?></td>
                                            <td><?php echo $row['site']; ?></td>
                                            <td><?php echo date('M,d,Y', strtotime($row['date_reported'])); ?></td>
                                            <td><?php echo trim(character_limiter($row['reason'], 20)); ?></td>
                                            <td><?php echo trim(character_limiter($row['notes'], 20), ' '); ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--implant delivery-->
                <div class=" col-sm-12 col-md-12 col-lg-4">
                    <div class="table-outer table-responsive">
                        <div class="table-head">
                            <span class="table-title" >Implant delivery</span>
                            <span class="table-head-links  right-align pull-right">
                                <a href="<?php echo base_url('manage_delivery'); ?>" class="edit-spec">View All</a>
                                <a href="<?php echo base_url('manage_delivery/add_delivery'); ?>" class="add-new">Add new</a>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <table class="table table-striped pagination-table">

                            <thead>
                                <tr>
                                    <th class="top-first">Batch</th>
                                    <th class="top-title">Site</th>
                                    <th class="top-title">Implants</th>
                                    <th class="top-title">Delivery date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (sizeof($deliveries)) {
                                    foreach ($deliveries as $delivery) {
                                        ?>
                                        <tr item_id="<?php echo $delivery['id']; ?>" >
                                            <td><?php echo get_batch_map($delivery['batch_number']); ?></td>
                                            <td><?php echo get_site_map($delivery['site']); ?></td>
                                            <td><?php echo $delivery['number_implants']; ?></td>
                                            <td><?php echo date('M, d,Y', strtotime(str_replace('/', '-', $delivery['delivery_date']))); ?></td>
                                        </tr>
                                        <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>

                    <!--sites-->
                    <div class="table-outer table-responsive">	
                        <div class="table-head">
                            <span class="table-title" >Sites</span>
                            <span class="table-head-links  right-align pull-right">
                                <a href="<?php echo base_url('manage_sites/add_site'); ?>" class="add-new">Add new</a>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <table class="table table-striped table-hover sites-table  pagination-table">
                            <thead>
                                <tr>
                                    <th class="top-first"><span class="paddingLeft20">Site</span></th>
                                    <th class="top-title">Country</th>
                                    <th class="top-title">Contact number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (sizeof($sites)) {
                                    foreach ($sites as $site) {
                                        ?>
                                        <tr item_id="<?php echo $site['site_id']; ?>" class="site-row">
                                            <td><span><?php echo $site['site']; ?></span></td>
                                            <td><?php echo $this->config->item($site['country'], 'countries'); ?></td>
                                            <td><?php echo $site['contact_number']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
