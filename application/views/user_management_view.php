<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$curUser = currentuser_session();
$userRole = $curUser['user_role'];
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="table-outer table-responsive">
                        <table class="table table-striped table-hover users-table">
                            <thead>   
                                <tr>
                                    <th colspan="3"><h2>Users</h2></th>
                            <th colspan="4" class="right-align"> <a href="#" class="view-all remove">Remove User</a> </th>
                            </tr>
                            <tr class="titles">
                                <th class="top-first"><input type="checkbox" name="check_all"></th>
                                <th class="text-center top-title">User ID</th>
                                <th class="top-title">Email Address</th>
                                <th class="top-title">Role</th>
                                <th class="top-title">User Created</th>
                                <?php if ($userRole == 1) { ?>
                                    <th class="top-title">Operations</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody target="users">
                                <?php
                                if (sizeof($users)) {
                                    foreach ($users as $user) {
                                        if($user['user_id'] == $curUser['user_id']){
                                            continue;
                                        }
                                        $addClass = "";
                                        if($user['user_status'] == 'inactive'){
                                            $addClass = "danger";
                                        }
                                        
                                        ?>
                                        <tr item_id="<?php echo $user['user_id']; ?>" class="user-row <?php echo $addClass;?>">
                                            <td ><input class="item_checkbox" type="checkbox" ></td>
                                            <td><span><?php echo $user['user_id']; ?></span></td>
                                            <td><?php echo $user['user_email']; ?></td>
                                            <td><?php echo $user['role_title']; ?></td>
                                            <td><?php echo date('M, d, Y', $user['created']); ?></td>
                                            <?php if ($userRole == 1) { ?>
                                                <td>
                                                    <a href="users/user_log?uid=<?php echo $user['user_id']; ?>">View log</a>
                                                    |
                                                    <a href="users/edit_log?uid=<?php echo $user['user_id']; ?>">Edit log</a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>


                            </tbody></table>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-12 col-lg-4">
                    <div class="form-lable"><h2>Add New User</h2></div>
                    <div class="form-control editor">
                        <form action="<?php echo base_url('users/add_user'); ?>" method="post" class="add_user_form form">
                            <div class="form-inner">

                                <div class="form-group" id="section-3">
                                    <label>User Name</label>
                                    <input name="user_name" id="user_name" type="text" value="" placeholder="User Name" >
                                </div>
                                <div class="form-group" id="section-3">
                                    <label>Email address</label>
                                    <input name="user_email" id="user_email" type="text" value="" placeholder="i.e new_user@test.com" >
                                </div>
                                <div class="form-group" id="section-3">
                                    <label>Address</label>
                                    <input name="user_address" type="text" value="" placeholder="i.e 4115 Lake Otis Parkway" >
                                </div>
                                <div class="form-group" id="section-3">
                                    <label>Phone Number</label>
                                    <input name="user_phone" id="user_phone" class="phone_number" type="text" placeholder="i.e +012345678" value="" >
                                </div>

                                <div class="form-group" id="section-3">
                                    <label>Select Role</label>
                                    <select name="user_role" id="user_role" >
                                        <option value="">--Select a Role --</option>
                                        <?php foreach ($userRoles as $role) { ?>
                                            <option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_title']; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="sub-btn"><input id="submit" type="submit" value="Save"></div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="delModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger confirm-del">Confirm</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>

