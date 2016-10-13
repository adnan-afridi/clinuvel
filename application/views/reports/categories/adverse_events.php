<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table class="table table-striped table-hover ae-table">
    <thead>   
        <tr>
            <th colspan="15"><h2>Adverse Events</h2></th>
</tr>
<tr class="titles">
    <th class="top-title">Dataset name</th>
    <!--<th class="top-title">Study name</th>-->
    <th class="top-title">Site</th>
    <th class="top-title">Study subject ID</th>
    <th class="top-title">Sex</th>
    <th class="top-title">Description</th>
    <th class="top-title">Intermittent</th>
    <th class="top-title">Severity</th>
    <th class="top-title">Action taken</th>
    <th class="top-title">Outcome</th>
    <th class="top-title" title="Relationship to SCENESSE®">Relationship</th>
    <th class="top-title">SAE</th>
    <th class="top-title">Last dose</th>
    <th class="top-title">Relation</th>
</tr>
</thead>
<tbody>
    <?php
    if (sizeof($result)) {
        foreach ($result as $ia) {
            ?>
            <tr item_id="<?php echo $ia['dataset_name']; ?>">
                <td><span><?php echo $ia['dataset_name']; ?></span></td>
                <!--<td><span><?php echo $ia['study_name']; ?></span></td>-->
                <td><span><?php echo $ia['site_number']; ?></span></td>
                <td><span><?php echo $ia['study_subject_id']; ?></span></td>
                <td><span><?php echo $ia['sex']; ?></span></td>
                <td><span><?php echo $ia['advevent_desc']; ?></span></td>
                <td><span><?php echo ($ia['advevent_inter'] == 1)?'Yes':'No'; ?></span></td>
                <td><span><?php echo $ia['advevent_severity']; ?></span></td>
                <td><span><?php echo $ia['advevent_action']; ?></span></td>
                <td><span><?php echo $ia['advevent_outcome']; ?></span></td>
                <td><span><?php echo $ia['advevent_related']; ?></span></td>
                <td><span><?php echo $ia['advevent_SAE']; ?></span></td>
                <td><span><?php echo ($ia['advevent_lastdosedate'] != '-')?date('d/m/Y',$ia['advevent_lastdosedate']):'-'; ?></span></td>
                <td><span><?php echo $ia['advevent_related']; ?></span></td>
                
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="20">
                <em>No Data yet.</em>
            </td>
        </tr>
    <?php }
    ?>
</tbody></table>
