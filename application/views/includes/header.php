<?php
$CI = & get_instance();
$curUser = currentuser_session();
$loggedIn = $curUser['loggedIn'];
$success = $CI->session->flashdata('success');
$error = $CI->session->flashdata('error');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Clinuvel Admin</title>
        <!--<link href='http://fonts.googleapis.com/css?family=Lato:100,400,700' rel='stylesheet' type='text/css'>-->

        <!-- Bootstrap -->
        <link href="<?php echo static_url(); ?>assets/jquery/css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
        <link href="<?php echo static_url(); ?>assets/jquery/css/qtip.css" rel="stylesheet">
        <link href="<?php echo static_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo static_url(); ?>assets/pagination/simplePagination.css" rel="stylesheet">
        <link href="<?php echo static_url(); ?>assets/bootstrap/bootstrap-helper/css/bootstrap-formhelpers.css" rel="stylesheet">

        <!-- Custom Css  -->
        <link href="<?php echo static_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo static_url(); ?>assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="<?php echo static_url(); ?>assets/jquery/js/jquery-1.11.1.min.js"></script>

        <script>
            window.base_url = "<?php echo SITE_URL; ?>";
        </script>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo static_url(); ?>assets/images/logo.png" alt="" title=""></a></div>
                <form class="search-cont" id="search-form" method="post" action="<?php echo base_url('generic/search'); ?>" >
                    <input name="search" type="text" id="search-text" value="" placeholder="Search (Batch reports, Sites etc)">
                    <input name="" id="search-btn" type="button" value="">
                    <div class="clearfix"></div>
                </form>
                <div class="right-cont">
                    <ul>
                        <li><a href="<?php echo base_url('welcome'); ?>">Dashboard</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">About</a></li>
                        <?php if ($loggedIn) { ?>
                            <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
                        <?php } ?>
                        <li>
                            <a class="user" href="<?php echo base_url('users/user_profile'); ?>">
                                <div class="user-img"><img src="<?php echo static_url(); ?>assets/images/user-img.png" alt="" title=""></div>
                                <div class="user-name"><?php echo $curUser['user_name']; ?></div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="clearfix"></div>
                <div class="row text-center">
                    <div class="col-xs-8"  style="float: none;margin: 0 auto;">
                            <!--<div class="alert alert-success  messages">Operation successfully completed.</div>-->
                        <?php if ($error) { ?>
                            <div class="alert alert-danger messages"><?php echo $error; ?></div>
                        <?php }if ($success) { ?>
                            <div class="alert alert-success  messages"><?php echo $success; ?></div>
                        <?php } ?>
                    </div>
                </div>
            </header>

