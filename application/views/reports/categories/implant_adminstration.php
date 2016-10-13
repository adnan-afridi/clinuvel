<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table class="table table-striped table-hover users-table">
    <thead>   
        <tr>
            <th colspan="15"><h2>Manage administrations</h2></th>
</tr>
<tr class="titles">
    <th class="top-title">Dataset Name</th>
    <th class="top-title">Study Subject ID</th>
    <th class="top-title">Sex</th>
    <th class="top-title" title="Asked by the physician: Is the patient eligible to receive SCENESSE® as per the approved SmPC (including absence of contraindications)?"> Symptoms</th>
    <th class="top-title" title="Asked by the physician: If appropriate, have you confirmed with the patient that a) they are not pregnant and/or b) they are taking appropriate contraception measures?">Pregnancy</th>
    <th class="top-title" title="Asked of the physician: Were there any problems during the implant administration?">Problems</th>
    <th class="top-title" title="Date of implant administration">Date</th>
    <th class="top-title" title="Time of implant administration">Time</th>
    <th class="top-title" title="Batch Number">Batch #</th>
</tr>
</thead>
<tbody>
    <?php
    if (sizeof($result)) {
        foreach ($result as $ia) {
            ?>
            <tr item_id="<?php echo $ia['study_id']; ?>">
                <td><span><?php echo $ia['dataset_name']; ?></span></td>
                <td><span><?php echo $ia['study_subject_id']; ?></span></td>
                <td><span><?php echo $ia['sex']; ?></span></td>
                <td><span><?php echo ($ia['epp_symptoms'] == 1) ? 'Yes' : 'No'; ?></span></td>
                <td><span><?php echo ($ia['epp_pregnant'] == 1) ? 'Yes' : 'No'; ?></span></td>
                <td><span><?php echo ($ia['implant_prob'] == 1) ? 'Yes' : 'No'; ?></span></td>
                <td><span><?php echo date('d-m-Y', $ia['implant_date']); ?></span></td>
                <td><span><?php echo leading_zero($ia['implant_time']) . ':' . leading_zero($ia['implant_min']); ?></span></td>
                <td><?php echo get_batch_map($ia['implant_batch']); ?></td>
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
