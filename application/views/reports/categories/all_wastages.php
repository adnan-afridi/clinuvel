<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//print_array($siteImplants);
?>

<table class="table table-striped table-hover users-table report-sortable-table">
    <thead>
        <tr   >
            <th  colspan="2" ><h2>All Wastages</h2></th>
<th colspan="3" class="right-align"><span class="text-white">Date : <?php echo date('d/m/Y'); ?></span></th>
</tr>
<tr class="titles">
    <th class="text-center top-title">Site</th>
    <th class="top-title">Batch number</th>
    <th class="top-title">Date Reported</th>
    <th class="top-title">Reason</th>
    <th class="top-title">Notes</th>

</tr>
</thead>
<tbody>
    <?php
    if ($wastages) {
        foreach ($wastages as $wastage) {
            ?>
            <tr>
                <td><?php echo $wastage['site_title']; ?></td> 
                <td><?php echo get_batch_map($wastage['batch_number']); ?></td> 
                <td><?php echo $wastage['date_reported']; ?></td>
                <td><?php echo $wastage['reason']; ?></td> 
                <td><?php echo $wastage['notes']; ?></td> 
            </tr>
    <?php }
} ?>
</tbody>
</table>
