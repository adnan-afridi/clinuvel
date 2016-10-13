<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table class="table table-striped table-hover users-table report-sortable-table">
    <thead>   
        <tr>
            <th colspan="3"><h2>Patient's implants report</h2></th>
<th colspan="5" class="text-right"><h2>Patient ID : <?php echo $result[0]['person_id']; ?></h2></th>
</tr>
<tr class="titles">
    <th class="top-title">Site</th>
    <th class="top-title">Batch number</th>
    <th class="top-title">Date of implantation</th>
    <th class="top-title">Implant time</th>
    <th class="top-title">eCRF Version</th>
    <th class="top-title">EPP symptoms</th>
    <th class="top-title">Pregnancy</th>
    <th class="top-title">Implant problems</th>
</tr>
</thead>
<tbody>
    <?php
    if (sizeof($result)) {
        foreach ($result as $patient) {
            ?>
            <tr >
                <td><span><?php echo get_site_map($patient['site_id']); ?></span></td>
                <td><?php echo get_batch_map($patient['implant_batch']); ?></td>
                <td><?php echo $patient['date']; ?></td>
                <td><?php echo leading_zero($patient['implant_time']).':'.leading_zero($patient['implant_min']); ?></td>
                <td>null</td>
                <td><?php echo $patient['epp_symptoms']; ?></td>
                <td><?php echo $patient['epp_pregnant']; ?></td>
                <td><?php echo $patient['implant_prob']; ?></td>
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
