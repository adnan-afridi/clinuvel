<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section class="mid-cont marginBottom20 ">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="view-type">
            <ol class="breadcrumb report-actions  col-xs-3 text-center">
                <li id="print-html-edit-log">Print</li>
                <li id="pdf-edit-log">PDF</li>
                <li id="excel-edit-log">Excel</li>
            </ol>
        </div>
        <div class="clearfix"></div>
        <div class="container-fluid">
            <div class="row marginTop20">
                <div class="col-sm-12 col-md-12 col-lg-8">

                    <div class="table-outer table-responsive">
                        <div class="table-head">
                            <span class="table-title">Edit data log</span>
                        </div>
                        <div class="clearfix"></div>
                        <div id="log-view">
                        <table class="table table-striped table-hover user-log-pagination-table users-table"  style="margin-top: 0;">
                            <thead>   
                                <tr class="titles">
                                    <th class="top-title">S.No</th>
                                    <th class="top-title">Table</th>
                                    <th class="top-title">Date time</th>
                                    <th class="top-title">Operation</th>
                                    <th class="hidden"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (sizeof($logs)) {
                                    $i = 1;
                                    foreach ($logs as $log) {
                                        ?>
                                        <tr class="edit-log-row">
                                            <td><span><?php echo $i; ?></span></td>
                                            <td><?php echo $log['table']; ?></td>
                                            <td><?php echo date('m-d-y H:i', $log['date_time']); ?></td>
                                            <td ><i class="glyphicon glyphicon-edit edit-log-icon" target="<?php echo $log['table']; ?>" ></i></td>
                                            <td class="data-hidden hidden" > <?php echo $log['data']; ?></td>
                                        </tr>



                                        <?php
                                        $i++;
                                    }
                                } else {
                                    ?>
                                    <tr><td colspan="10">No Data Yet</td></tr>
                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>


