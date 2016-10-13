<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_array($result['siteData']);
$siteData = $result['siteData'];
$siteImplants = $result['siteImplants'];
$siteDeliveries = $result['siteDeliveries'];
?>

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
<tbody target="">
    <?php
    if ($siteData) {
            ?>
            <tr>
                <td><?php echo $siteData['site_title']; ?></td>
                <td><?php echo $siteData['site_deliveries']; ?></td>
                <td><?php echo $siteData['site_implants']; ?></td>
                <td><?php echo $siteData['site_wastages']; ?></td>
                <td><?php echo ($siteData['site_deliveries']-($siteData['site_implants']+$siteData['site_wastages'])); ?></td>
            </tr>
        <?php
    } else {
        ?>
        <tr><td  colspan="20">NO DATA</td></tr>
<?php } ?>
</tbody>
</table>


<!--imp administration-->
<table class="table table-striped table-hover users-table report-sortable-table">
    <thead>   
        <tr>
            <th colspan="15"><h2>Site Implant Administrations</h2></th>
</tr>
<tr class="titles">
    <th class="top-title">Study Subject ID</th>
    <th class="top-title">Sex</th>
    <th class="top-title" title="Batch Number">Batch #</th>
    <th class="top-title" title="Date of implant administration">Date</th>
    <th class="top-title" title="Asked by the physician: Is the patient eligible to receive SCENESSE® as per the approved SmPC (including absence of contraindications)?"> Symptoms</th>
    <th class="top-title" title="Asked by the physician: If appropriate, have you confirmed with the patient that a) they are not pregnant and/or b) they are taking appropriate contraception measures?">Pregnancy</th>
    <th class="top-title" title="Asked of the physician: Were there any problems during the implant administration?">Problems</th>
</tr>
</thead>
<tbody>
    <?php
    if (sizeof($siteImplants)) {
        foreach ($siteImplants as $ia) {
            ?>
            <tr item_id="<?php echo $ia['study_id']; ?>">
                <td><span><?php echo $ia['study_subject_id']; ?></span></td>
                <td><span><?php echo $ia['sex']; ?></span></td>
                <td><?php echo get_batch_map($ia['implant_batch']); ?></td>
                <td><span><?php echo date('d/m/Y', $ia['implant_date']); ?></span></td>
                <td><span><?php echo ($ia['epp_symptoms'] == 1) ? 'Yes' : 'No'; ?></span></td>
                <td><span><?php echo ($ia['epp_pregnant'] == 1) ? 'Yes' : 'No'; ?></span></td>
                <td><span><?php echo ($ia['implant_prob'] == 1) ? 'Yes' : 'No'; ?></span></td>
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

<!--site deliveries-->
<table class="table table-striped table-hover users-table ">
    <thead>
        <tr>
            <th colspan="15"><h2>Site Deliveries</h2></th>
</tr>
<tr class="titles" >
    <th class="text-center top-title">Deliver date</th>
    <th class="top-title" title="">Batch number</th>
    <th class="top-title" title="">Number of implants</th>
    <th class="top-title" title="">Delivery confirmed by</th>
    <th class="top-title" title="">Delivery Notes</th>

</tr>
</thead>
<tbody target="">
    <?php
    if ($siteDeliveries) {
        foreach($siteDeliveries as $sd){
            ?>
            <tr>
                <td><?php echo $sd['delivery_date']; ?></td>
                <td><?php echo get_batch_map($sd['batch_number']); ?></td>
                <td><?php echo $sd['number_implants']; ?></td>
                <td><?php echo $sd['confirmed_by']; ?></td>
                <td><?php echo $sd['delivery_notes']; ?></td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr><td  colspan="20">NO DATA</td></tr>
<?php } ?>
</tbody>
</table>
