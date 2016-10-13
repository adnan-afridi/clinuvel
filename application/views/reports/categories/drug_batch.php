<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_array($result);
$batch = $result['batch'][0];
$impAdministrtion = $result['impAdminData'];
$sitesData = $result['sitesData'];
?>
<table class="table table-striped table-hover users-table">
    <thead>
        <tr   >
            <th  colspan="5" ><h2>Drug batches</h2></th>
<th colspan="20" class="right-align"><span class="text-white">Date : <?php echo date('d/m/Y'); ?></span></th>
</tr>
<tr class="titles">
    <th class="text-center top-title">Batch No</th>
    <th class="top-title" title="">Total Implants</th>
    <th class="top-title" title="Implants allocated to quality control">Imp All QC</th>
    <th class="top-title" title="Implants allocated to clinical trials">Imp All CT</th>
    <th class="top-title">Delivered to sites</th>
    <th class="top-title">Administered to Paitents</th>
    <th class="top-title">Wasted</th>
    <th class="top-title">Undelivered</th>
    <th class="top-title">Remaining</th>
    <th class="top-title" title="Manufacturing date">Manuf. Date</th>
    <th class="top-title">Release</th>
    <th class="top-title">Expiry</th>
    <th class="top-title" title="Extended expiry date">Ext Expiry</th>
    <th class="top-title">Notes</th>

</tr>
</thead>
<tbody>
    <tr>
        <td><?php echo get_batch_map($batch['batch_number']); ?></td>
        <td><?php echo $batch['total_implants']; ?></td>
        <td><?php echo $batch['imp_alloc_qc']; ?></td>
        <td><?php echo $batch['imp_alloc_ct']; ?></td>
        <td><?php echo $batch['total_imp_delivered']; ?></td>
        <td><?php echo $batch['total_imp_admin']; ?></td>
        <td><?php echo $batch['total_wastages']; ?></td>
        <td><?php echo $batch['total_implants'] - ($batch['imp_alloc_qc'] + $batch['imp_alloc_ct'] + $batch['total_imp_delivered']); ?></td>
        <td><?php echo $batch['total_implants'] - ($batch['imp_alloc_qc'] + $batch['imp_alloc_ct'] + $batch['total_wastages']); ?></td>
        <td><?php echo $batch['manufacture_date']; ?></td>
        <td><?php echo $batch['release_date']; ?></td>
        <td><?php echo $batch['expiry_date']; ?></td>
        <td><?php echo $batch['extended_expiry_date']; ?></td>
        <td><?php echo $batch['notes']; ?></td>
    </tr>
</tbody>
</table>

<!--imp administration-->
<table class="table table-striped table-hover users-table report-imp-administration-table">
    <thead>
        <tr>
            <th colspan="15"><h2>Implant Administration</h2></th>
</tr>
<tr class="titles" >
    <th class="text-center top-title">Study Subject ID</th>
    <th class="top-title" title="">Site</th>
    <th class="top-title">Date of implant administration</th>

</tr>
</thead>
<tbody target="drug_batch">
    <?php
    if ($impAdministrtion) {
        foreach ($impAdministrtion as $impAdmin) {
            ?>
            <tr>
                <td><?php echo $impAdmin['study_subject_id']; ?></td>
                <td><?php echo get_site_map((int) $impAdmin['site_id']); ?></td>
                <td><?php echo $impAdmin['date']; ?></td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr><td  colspan="20">NO DATA</td></tr>
    <?php } ?>
</tbody>
</table>

<!--site report-->
<table class="table table-striped table-hover users-table report-imp-administration-table">
    <thead>
        <tr>
            <th colspan="15"><h2>Site Report</h2></th>
</tr>
<tr class="titles" >
    <th class="text-center top-title">Site</th>
    <th class="top-title" title="">Implants delivered</th>
    <th class="top-title" title="">Implants administered</th>
    <th class="top-title" title="">Implants wasted</th>
    <th class="top-title" title="">Implants remaining at pharmacy</th>

</tr>
</thead>
<tbody target="drug_batch">
    <?php
    if ($sitesData) {
        foreach ($sitesData as $sd) {
            ?>
            <tr>
                <td><?php echo $sd['site_title']; ?></td>
                <td><?php echo $sd['total_imp_delivered']; ?></td>
                <td><?php echo $sd['total_imp_administered']; ?></td>
                <td><?php echo $sd['total_wastages']; ?></td>
                <td><?php echo ($sd['total_imp_delivered'] - ($sd['total_imp_administered'] + $sd['total_wastages'])); ?></td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr><td  colspan="20">NO DATA</td></tr>
    <?php } ?>
</tbody>
</table>