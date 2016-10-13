<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Clinuvel</title>
        <!--<link href="<?php //  echo static_url();        ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo static_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'/> 
        <style>
            .alert-danger{  background-color: pink;
                            line-height: 35px;
                            margin-bottom: 10px;
                            color: #fff;}
            </style>
        </head>
        <body class="signin-page-2-body">

        <section class="mid-cont">
            <div class="logo center-cont">
                <img src="<?php echo static_url(); ?>assets/images/logo-sm-2.png" alt="" title="">
            </div>
            <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>

            <div class="center-cont">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-8">
                            <div class="edit-sec">
                                <h5>Change Password
                                    <a href="<?php echo base_url('users'); ?>">Cancel</a>
                                    <div class="clearfix"></div>
                                </h5>
                                <div class="inner-edit">

                                    <form class="form" method="post" action="<?php echo base_url('change_password/update_password'); ?>">
                                        <?php if (!empty($userId)) { ?>
                                            <input  type="hidden" name="user_id" value="<?php echo $userId; ?>"/>
                                        <?php }
                                        ?>
                                        <label>New Password </label>
                                        <input name="new_password" type="password" id="new_password"/>
                                        <label>Confirm Password </label>
                                        <input name="confirm_password" type="password"  id="confirm_password"/>
                                        <div>
                                            <input  type="submit" value="Change"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?php echo static_url(); ?>assets/jquery/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo static_url(); ?>assets/jquery/js/jquery.validate.js"></script>
        <script src="<?php echo static_url(); ?>assets/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?php echo static_url(); ?>assets/js/header.js"></script>
    </body>
</html>