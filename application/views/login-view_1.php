<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Clinuvel</title>
        <link href="<?php echo static_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo static_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="wrapper">
            <div class="signin-page">
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
                        <img src="<?php echo static_url(); ?>assets/images/logo-sm-1.png" alt="" title="" />
                    </div>
                    <form action="<?php echo base_url('login/process_login'); ?>" method="post">
                        <input name="name" type="text" placeholder="Login" />
                        <input name="password" type="password" value="" placeholder="*****" />
                        <input name="submit-login" type="submit" value="Sign In" />
                    </form>
                    <p>Forgot <a href="#">username or password</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
