<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
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

                            <form class="form" method="post" action="<?php echo base_url('users/update_password'); ?>">
                                <inpu type="hidden" name="update-pw" value="1"/>
                                <label>Old Password</label>
                                <input  type="password" name="old_password" id="old_password">
                                <label>New Password </label>
                                <input name="new_password" type="password" id="new_password">
                                <label>Confirm Password </label>
                                <input name="confirm_password" type="password"  id="confirm_password">
                                <div>
                                    <input  type="submit" value="Change">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>