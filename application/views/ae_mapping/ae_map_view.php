<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once APPPATH . 'views/includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                  <!--fields-->
                    <div class="table-outer table-responsive">
                        <table class="table table-striped table-hover users-table">
                            <thead>   
                                <tr >
                                    <th colspan="3"><h2>A.E Mapping</h2></th>
                            </tr>
                            <tr class="titles">
                                <th class="top-title">S.No</th>
                                <th class="top-title">Field</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="ae-category" id="crf_version_status">
                                    <td>1</td>
                                    <td>CRF Version Status</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>advevent_desc</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    
                  <!--field data listing-->
                     <div class="table-outer table-responsive">
                        <table class="table table-striped table-hover users-table">
                            <thead>   
                                <tr>
                                    <th colspan="3"><h2>Data Listing</h2></th>
                            </tr>
                            <tr class="titles">
                                <th class="top-title">S.No</th>
                                <th class="top-title">OC value</th>
                                <th class="top-title">PLG value</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>data entry complete</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>initial data entry</td>
                                    <td>No</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-12 col-lg-4" id="add-section">
                    
                </div>
            </div>
        </div>
    </div>
</section>

