<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function array_find($needle, array $haystack) {

    foreach ($haystack as $key => $value) {

        if (strpos(strtolower($value), strtolower($needle)) !== false) {

            return $key;
        }
    }
}
?>
<section class="mid-cont">
    <div class="nav-icon"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </div>
    <?php include_once 'includes/leftmenu.php'; ?>
    <div class="center-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="table-outer table-responsive col-xs-5">
                        <h2>Search Result</h2>
                        <?php
                        if (sizeof($search_result)) {
                            foreach ($search_result as $tableName => $data) {
                                switch ($tableName) {
                                    case "sites":
                                        $rowClass = 'site-row';
                                        continue;
                                    case "deliveries":
                                        $rowClass = 'delivery-row';
                                        continue;
                                    case "wastage":
                                        $rowClass = 'wastage-row';
                                        continue;
                                    default :
                                        $rowClass = "";
                                        continue;
                                }
                                ?>
                                <h2><?php echo ucwords($tableName); ?></h2>
                                <table class="table table-striped table-hover users-table" style="margin: 0;">
                                    <tbody target="<?php echo $tableName; ?>">
                                        <?php
                                        foreach ($data as $index => $row) {
                                            $keys = array_keys($row);
                                            $key = array_find($search_text, $row);
                                            if ($key == FALSE)
                                                continue;
                                            if ($index == 0) {
                                                ?>
                                                <tr>
                                                    <th class="text-center" style="border-right: 1px solid #ccc;color:#fff;">S.No</th>
                                                    <th class="text-center" style="border-right: 1px solid #ccc;color:#fff;"><?php echo ucwords(str_replace("_", ' ', $key)); ?></th>
                                                </tr>
                                            <?php } ?>
                                            <tr item_id="<?php echo $row[$keys[0]]; ?>" class="<?php echo $rowClass; ?>">
                                                <td style="display: none;">hidden</td>
                                                <td class="text-center"><?php echo $index + 1; ?></td>  
                                                <td class="text-center"><?php echo highlight_phrase($row[$key],$search_text,'<span style="font-weight:bold;background-color:yellow;">','</span>'); ?></td>  
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                        } else {
                            ?>
                            <h4> No Matches Found.</h4>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

