<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$curUser = currentuser_session();
$userRole = $curUser['user_role'];
$readOnly = 'readonly="readonly"';
$pageTitle = 'Site Info';
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="edit-sec">
                        <h5>Profile
                            <a href="<?php echo base_url('users/change_password'); ?>">Change Password</a>
                            <a href="<?php echo base_url('users'); ?>" class="marginRight1">Cancel</a>
                            <div class="clearfix"></div>
                        </h5>
                        <div class="inner-edit">
                            <h6>User ID: <?php echo $userData['user_id']; ?></h6>
                            <form method="post" action="<?php echo base_url('users/update_user'); ?>">
                                <input type="hidden" name="user_id" value="<?php echo $userData['user_id']; ?>">
                                <label>Email address </label>
                                <input  type="text" readonly="" value="<?php echo $userData['user_email']; ?>">
                                <label>Address </label>
                                <input name="user_address" type="text" value="<?php echo $userData['user_address']; ?>">
                                <label>Phone Number</label>
                                <input name="user_phone" type="text" value="<?php echo $userData['user_phone']; ?>">
                                <label>User Role</label>
                                <?php if ($userRole == 1) { ?>
                                        <select name="user_role">
                                            <?php
                                            foreach ($userRoles as $role) {
                                                $selected = '';
                                                if ($role['role_id'] == $userData['user_role']) {
                                                    $selected = 'selected="selected"';
                                                }
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $role['role_id']; ?>"><?php echo $role['role_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                       
                                    <?php
                                } else {
                                    foreach ($userRoles as $role) {
                                        
                                        if ($role['role_id'] == $userRole) {
                                            $title = $role['role_title'];
                                        }
                                    }
                                    ?>
                                 <input <?php echo $readOnly; ?> name="user_role" type="text" value="<?php echo $title; ?>">
                                <?php } ?>
                                <div>
                                    <input name="" type="submit" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>