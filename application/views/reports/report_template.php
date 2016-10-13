<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section class="mid-cont marginBottom20">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once APPPATH. 'views/includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="view-type">
                        <ol class="breadcrumb report-actions  col-xs-3 text-center">
                            <li id="print-html">Print</li>
                            <li id="pdf-report">PDF</li>
                            <li id="excel-report">Excel</li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                    <div class="report" id="report-view">
                        <?php $this->load->view('reports/categories/'.$target); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>