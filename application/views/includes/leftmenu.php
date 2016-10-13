<?php
$curUrl = end($this->uri->segment_array());
if ($curUrl == 'site_mapping' || $curUrl == 'batch_mapping') {
    $curUrl = end($this->uri->segment_array());
} else {
    $curUrl = $this->uri->segment(1);
}
$activate_link = 'class="active"';
$curUser = currentuser_session();
?>       
<aside class="left-menu">
    <ul class="leftmenu-inner">
        <li <?php echo ($curUrl == "welcome") ? $activate_link : ""; ?>>
            <a href="<?php echo base_url('welcome'); ?>">
                <div class="icon"><img src="<?php echo static_url(); ?>assets/images/icon-1.png" alt=""></div>
                <div class="title">Overview</div>
            </a>
        </li>
        <li <?php echo ($curUrl == "batch") ? $activate_link : ""; ?>>
            <a href="<?php echo base_url('batch'); ?>">
                <div class="icon"><img src="<?php echo static_url(); ?>assets/images/icon-4.png" alt=""></div>
                <div class="title">Manage batches</div>
            </a>
        </li>
        <li <?php echo ($curUrl == "manage_delivery") ? $activate_link : ""; ?>>
            <a href="<?php echo base_url('manage_delivery'); ?>">
                <div class="icon"><img src="<?php echo static_url(); ?>assets/images/icon-2.png" alt=""></div>
                <div class="title">Manage delivery</div>
            </a>
        </li>
        <?php if (!QP) { ?>
            <li <?php echo ($curUrl == "manage_sites") ? $activate_link : ""; ?>>
                <a href="<?php echo base_url('manage_sites'); ?>">
                    <div class="icon"><img src="<?php echo static_url(); ?>assets/images/icon-3.png" alt=""></div>
                    <div class="title">Manage sites</div>
                </a>
            </li>
            <li <?php echo ($curUrl == "manage_wastage") ? $activate_link : ""; ?>>
                <a href="<?php echo base_url('manage_wastage'); ?>">
                    <div class="icon"><img src="<?php echo static_url(); ?>assets/images/icon-4.png" alt=""></div>
                    <div class="title">Manage wastage</div>
                </a>
            </li>
        <?php } ?>
        <li <?php echo ($curUrl == "reports") ? $activate_link : ""; ?>>
            <a href="<?php echo base_url('reports'); ?>">
                <div class="icon"><img src="<?php echo static_url(); ?>assets/images/icon-5.png" alt=""></div>
                <div class="title">Manage reports</div>
            </a>
            <?php if (ADMIN) { ?>
            </li>
            <li <?php echo ($curUrl == "users") ? $activate_link : ""; ?>>
                <a href="<?php echo base_url('users'); ?>">
                    <div class="icon"><img src="<?php echo static_url(); ?>assets/images/icon-6.png" alt=""></div>
                    <div class="title">Manage users</div>
                </a>
            </li>
            <li <?php echo ($curUrl == "batch_mapping") ? $activate_link : ""; ?>>
                <a href="<?php echo base_url('batch/batch_mapping'); ?>">
                    <div class="icon"><img src="<?php echo static_url(); ?>assets/images/icon-4.png" alt=""></div>
                    <div class="title">Batch mapping</div>
                </a>
            </li>
            <li <?php echo ($curUrl == "site_mapping") ? $activate_link : ""; ?>>
                <a href="<?php echo base_url('manage_sites/site_mapping'); ?>">
                    <div class="icon"><img src="<?php echo static_url(); ?>assets/images/icon-4.png" alt=""></div>
                    <div class="title">Site mapping</div>
                </a>
            </li>
<!--            <li <?php //  echo ($curUrl == "ae_mapping") ? $activate_link : ""; ?>>
                <a href="<?php // echo base_url('ae_mapping'); ?>">
                    <div class="icon"><img src="<?php // echo static_url(); ?>assets/images/icon-4.png" alt=""></div>
                    <div class="title">A.E mapping</div>
                </a>
            </li>-->
        <?php } ?>
    </ul>
</aside>