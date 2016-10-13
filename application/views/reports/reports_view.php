<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once APPPATH . 'views/includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid cursor-pointer">
            <div class="row">
                <div class=" col-sm-12 col-md-12 col-lg-12">
                    <div class=" col-xs-8">
                        <div class="form-lable">
                            <h2>Reports</h2>
                        </div>
                        <div class="panel-group" id="accordion">
    <!--Implant Administration-->
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#impAdmin">
                                    <h4 class="panel-title">
                                        <a> Implant Administration</a>
                                    </h4>
                                </div>
                                <div id="impAdmin" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover users-table implants-table">
                                            <thead>   
                                                <tr>
                                                    <th class="top-title">ID</th>
                                                    <th class="top-title">Dataset Name</th>
                                                    <th class="top-title">Subjects</th>
                                                    <th class="top-title">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody target="implant_adminstration">
                                                <?php foreach ($impAdmin as $imp) { ?>
                                                    <tr class="report-row" row_id="<?php echo $imp['study_id']; ?>">
                                                        <td><?php echo $imp['study_id']; ?></td>
                                                        <td><?php echo $imp['dataset_name']; ?></td>
                                                        <td><?php echo $imp['subjects']; ?></td>
                                                        <td><?php echo date('d-m-Y', strtotime($imp['date'])); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
    <!--batches-->
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseBatches">
                                    <h4 class="panel-title">
                                        <a >Batches</a>
                                    </h4>
                                </div>
                                <div id="collapseBatches" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <a href="<?php echo base_url('reports/show_all_batches'); ?>"><button class="btn btn-default pull-right  marginBottom5">All Batches Report</button></a>
                                        <table class="table table-striped table-hover users-table batches-table">
                                            <thead>   
                                                <tr>
                                                    <th class="top-title" title="">Total Batches</th>
                                                    <th class="top-title" title="">Total Implants</th>
                                                    <th class="top-title" title="Implants allocated to quality control">Total Imp All QC</th>
                                                    <th class="top-title" title="Implants allocated to clinical trials">Total Imp All CT</th>
                                                </tr>
                                            </thead>
                                            <tbody target="drug_batch">
                                                <?php foreach ($batches as $batch) { ?>
                                                    <tr class="report-row" row_id="<?php echo $batch['drug_batch_id']; ?>">
                                                        <td><?php echo get_batch_map($batch['batch_number']); ?></td>
                                                        <td><?php echo $batch['total_implants']; ?></td>
                                                        <td><?php echo $batch['imp_alloc_qc']; ?></td>
                                                        <td><?php echo $batch['imp_alloc_ct']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
    <!--wastages-->
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseWastages">
                                    <h4 class="panel-title">
                                        <a >Wastages</a>
                                    </h4>
                                </div>
                                <div id="collapseWastages" class="panel-collapse collapse ">
                                    <div class="panel-body">

                                        <a href="<?php echo base_url('reports/all_wastages'); ?>"><button class="btn btn-default col-sm-5">All wastages</button></a>

                                    </div>
                                </div>
                            </div> 
    <!--patients-->
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapsePatients">
                                    <h4 class="panel-title">
                                        <a >Patients</a>
                                    </h4>
                                </div>
                                <div id="collapsePatients" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <table class="table table-striped table-hover users-table patients-table">
                                            <thead>   
                                                <tr>
                                                    <th class="top-title" title="">Site</th>
                                                    <th class="top-title" title="">Patient ID</th>
                                                </tr>
                                            </thead>
                                            <tbody target="patient">
                                                <?php foreach ($patients as $patient) { ?>
                                                    <tr class="report-row" row_id="<?php echo $patient['person_id']; ?>" site_id="<?php echo $patient['site_id']; ?>">
                                                        <td><?php echo get_site_map($patient['site_id']); ?></td>
                                                        <td><?php echo $patient['person_id']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> 
    <!--sites-->
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseSites">
                                    <h4 class="panel-title">
                                        <a >Sites</a>
                                    </h4>
                                </div>
                                <div id="collapseSites" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <table class="table table-striped table-hover users-table patients-table">
                                            <thead>   
                                                <tr>
                                                    <th class="top-title" title="">Site Title</th>
                                                </tr>
                                            </thead>
                                            <tbody target="sites">
                                                <?php foreach ($sites as $site) { ?>
                                                    <tr class="report-row" row_id="<?php echo $site['site_oc_value']; ?>">
                                                        <td><?php echo $site['site_title']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> 
    <!--AE-->
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#ae">
                                    <h4 class="panel-title">
                                        <a> Adverse Events</a>
                                    </h4>
                                </div>
                                <div id="ae" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover users-table ae-table">
                                            <thead>   
                                                <tr>
                                                    <th class="top-title">ID</th>
                                                    <th class="top-title">Dataset Name</th>
                                                    <th class="top-title">Subjects</th>
                                                    <th class="top-title">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody target="adverse_events">
                                                <?php foreach ($adverseEvents as $ae) { ?>
                                                    <tr class="report-row" row_id="<?php echo $ae['ae_id']; ?>">
                                                        <td><?php echo $ae['ae_id']; ?></td>
                                                        <td><?php echo $ae['dataset_name']; ?></td>
                                                        <td><?php echo $ae['subjects']; ?></td>
                                                        <td><?php echo date('d-m-Y', strtotime($imp['date'])); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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

