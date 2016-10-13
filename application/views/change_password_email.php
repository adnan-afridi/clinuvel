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
                        <h5>Change Password Email
                            <a href="<?php echo base_url('users'); ?>">Cancel</a>
                            <div class="clearfix"></div>
                        </h5>
                        <div class="inner-edit">

                            <form class="form" method="post" action="<?php echo base_url('users/email_for_password'); ?>">
                                <?php if (!empty($userId)) { ?>
                                    <input  type="hidden" name="user_id" value="<?php echo $userId; ?>">
                                <?php } ?>
                                <label>An Email will be sent to the user to change password. Please proceed.</label>
                                
                                <div>
                                    <input  type="submit" value="Email user">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>