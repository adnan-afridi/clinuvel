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
        <div class="container-fluid">
            <div class="row marginTop20">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="table-outer table-responsive">
                        <table class="table table-striped table-hover user-log-pagination-table users-table">
                            <thead>   
                                <tr>
                                    <th colspan="10"><h2>Log</h2></th>
                            </tr>
                            <tr class="titles">
                                <th class="top-title">S.No</th>
                                <th class="top-title">Activity</th>
                                <th class="top-title">Date time</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (sizeof($logs)) {
                                    $i = 1;
                                    foreach ($logs as $log) {
                                        ?>
                                        <tr >
                                            <td><span><?php echo $i; ?></span></td>
                                            <td><?php echo $log['activity']; ?></td>
                                            <td><?php echo date('m-d-y H:i', $log['date_time']); ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                }  ?>


                            </tbody></table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



