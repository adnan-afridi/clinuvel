
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-sm-12 col-md-12 col-lg-12">
                    <div class=" col-xs-5">
                        <div class="form-lable">
                            <h2>Upload file to parse</h2>
                        </div>
                        <form action="<?php echo base_url('parser/parse'); ?>" method="post" class="form" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <label>File</label>
                                <input name="file" type="file"/>
                            </div>
                            <div class="form-group" id="section-1">
                                <input type="submit" class="btn btn-success btn-sm"/>
                            </div>                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>

