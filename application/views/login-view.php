<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Clinuvel</title>
        <!--<link href="<?php //  echo static_url();  ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
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
        <div class="wrapper">
            <div class="sign-in-page">
                <div class="signin-page signin-page-2">
                    <div class="signin-caption">
                        <div class="row text-center">
                            <div class="row">
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger messages"><?php echo $error; ?></div>
                                <?php }if ($success) { ?>
                                    <div class="alert alert-success  messages"><?php echo $success; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="logo">
                            <img src="<?php echo static_url(); ?>assets/images/logo-sm-2.png" alt="" title="">
                        </div>
                        <form action="<?php echo base_url('login/process_login'); ?>" method="post">
                            <div class="tab">
                                <div class="left-icon">
                                    <img src="<?php echo static_url(); ?>assets/images/user-icon.png" alt="" title="" class="user-icon"/>
                                    <img src="<?php echo static_url(); ?>assets/images/small-arrow.png" alt="" title="" class="arrow"/>
                                </div>
                                <div class="right-input">
                                    <input name="email" type="text" placeholder="User Email"/>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="tab">
                                <div class="left-icon">
                                    <img src="<?php echo static_url(); ?>assets/images/key-icon.png" alt="" title="" class="user-icon"/>
                                    <img src="<?php echo static_url(); ?>assets/images/small-arrow.png" alt="" title="" class="arrow"/>
                                </div>
                                <div class="right-input">
                                    <input name="password" type="password" value="" placeholder="*****" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <p>Forgot <a href="#">username or password?</a></p>
                            <input name="submit-login" type="submit" value="Sign In"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
