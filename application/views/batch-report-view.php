<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="table-outer table-responsive">
                        <table class="table table-striped">
                            <tbody><tr>
                                    <th colspan="3"><h2>Drug batches</h2></th>
                            <th colspan="10" class="right-align"> <a href="#" class="view-all">View all</a> <a href="#" class="edit-spec">View/edit specific batch</a> <a href="<?php echo base_url('batch'); ?>" class="add-new">Add new</a> </th>
                            </tr>
                            <tr>
                                <td class="top-first">SS ID</td>
                                <td class="top-title">Protocol ID</td>
                                <td class="top-title">Version</td>
                                <td class="top-title">Implant Date</td>
                                <td class="top-title">Implant Time</td>
                                <td class="top-title">Implant Prob</td>
                                <td class="top-title">EPP Symp</td>
                                <td class="top-title">EPP Age</td>
                                <td class="top-title">EPP Contras</td>
                                <td class="top-title">Implant Batch</td>
                            </tr>
                            <?php foreach ($clinicalData as $cdata) { ?>
                                <tr>
                                    <td><?php echo $cdata['study_subject_id'] ?></td>
                                    <td><?php echo $cdata['protocol_id'] ?></td>
                                    <td><?php echo $cdata['version'] ?></td>
                                    <td><?php echo $cdata['implant_date'] ?></td>
                                    <td><?php echo $cdata['implant_time'] ?></td>
                                    <td><?php echo $cdata['implant_prob'] ?></td>
                                    <td><?php echo $cdata['epp_symptoms'] ?></td>
                                    <td><?php echo $cdata['epp_age'] ?></td>
                                    <td><?php echo $cdata['epp_contras'] ?></td>
                                    <td><?php echo $cdata['implant_batch'] ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="10" class="table-footer"><nav>
                                        <ul class="pagination">
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">Next</a></li>
                                        </ul>
                                    </nav></td>
                            </tr>


                            </tbody></table>
                    </div>
                </div>
           
            </div>
        </div>
    </div>
</section>