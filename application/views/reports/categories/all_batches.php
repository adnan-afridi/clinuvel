<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_array($result);
$batchesData = $result['allBatchesData'][0];
$sitesSummary = $result['sitesSummary'];
$sitesImplants = $result['sitesReport'];
//print_array($siteImplants);
?>

<table class="table table-striped table-hover users-table">
    <thead>
        <tr   >
            <th  colspan="5" ><h2>All Batches</h2></th>
<th colspan="20" class="right-align"><span class="text-white">Date : <?php echo date('d/m/Y'); ?></span></th>
</tr>
<tr class="titles">
    <th class="text-center top-title">Total Batches</th>
    <th class="top-title" title="">Total Implants</th>
    <th class="top-title">Imp All QC</th>
    <th class="top-title" >Imp All CT</th>
    <th class="top-title">Delivered to sites</th>
    <th class="top-title">Administered to Patients</th>
    <th class="top-title">Wasted</th>
    <th class="top-title">Remaining</th>

</tr>
</thead>
<tbody>
    <tr>
        <td><?php echo $batchesData['total_batches']; ?></td>
        <td><?php echo $batchesData['total_implants']; ?></td>
        <td><?php echo $batchesData['total_qc']; ?></td>
        <td><?php echo $batchesData['total_ct']; ?></td>
        <td><?php echo $batchesData['total_deliveries']; ?></td>
        <td><?php echo $batchesData['total_implants_administered']; ?></td>
        <td><?php echo $batchesData['total_wastages']; ?></td>
        <td><?php echo $batchesData['total_implants'] - ($batchesData['total_qc'] + $batchesData['total_ct'] + $batchesData['total_deliveries']); ?></td>
    </tr>
</tbody>
</table>

<!--imp administration-->
<?php
if ($sitesSummary) {
    foreach ($sitesSummary as $site) {
        ?>
        <table class="table table-striped table-hover users-table ">
            <thead>
                <tr>
                    <th colspan="15"><h2><?php echo get_site_map($site['site']); ?> Summary</h2></th>
        </tr>
        <tr class="titles" >
            <th class="top-title" title="">Total Deliveries</th>
            <th class="top-title" title="">Implants delivered to pharmacy</th>
            <th class="top-title">Implants administered to patients</th>
            <th class="top-title">Implants wasted</th>
            <th class="top-title">Remaining</th>

        </tr>
        </thead>
        <tbody target="">
            <tr>
                <td><?php echo $site['num_deliveries']; ?></td>
                <td><?php echo $site['site_deliveries']; ?></td>
                <td><?php echo $site['site_implants']; ?></td>
                <td><?php echo $site['site_wastages']; ?></td>
                <td><?php echo $site['site_deliveries'] - ($site['site_implants'] + $site['site_wastages']); ?></td>
            </tr>
        </tbody>
        </table>
        <?php
    }
}
?>
<!--site report-->
<?php
if ($sitesImplants) {
    foreach ($sitesImplants as $index => $siteImp) {
        ?>
        <table class="table table-striped table-hover users-table ">
            <thead>
                <tr>
                    <th colspan="15"><h2><?php echo get_site_map($index); ?> Administration</h2></th>
        </tr>
        <tr class="titles" >
            <th class="top-title" title="">Study subject ID</th>
            <th class="top-title" title="">Batch number</th>
            <th class="top-title" title="">Date of implant administration</th>

        </tr>
        </thead>
        <tbody target="">
            <?php foreach ($siteImp as $si) {
                ?>
                <tr>
                    <td><?php echo $si['study_subject_id']; ?></td>
                    <td><?php echo get_batch_map($si['implant_batch']); ?></td>
                    <td><?php echo date('d/m/Y', $si['implant_date']); ?></td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
        <?php }
    }
    ?>