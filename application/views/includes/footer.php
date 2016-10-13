</div>    

<script src="<?php echo static_url(); ?>assets/jquery/js/qtip.js"></script>
<script src="<?php echo static_url(); ?>assets/jquery/js/jquery.validate.js"></script>
<script src="<?php echo static_url(); ?>assets/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo static_url(); ?>assets/jquery/js/printThis.js"></script>
<script src="<?php echo static_url(); ?>assets/pagination/simplePagination.js"></script>
<script src="<?php echo static_url(); ?>assets/jquery/js/number-mask.js"></script>
<script src="<?php echo static_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo static_url(); ?>assets/bootstrap/bootstrap-helper/js/bootstrap-formhelpers-countries.en_US.js"></script>
<script type="text/javascript" src="<?php echo static_url(); ?>assets/bootstrap/bootstrap-helper/js/bootstrap-formhelpers-countries.js"></script>
<script src="<?php echo static_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo static_url(); ?>assets/js/header.js"></script>

<script>
    $(document).ready(function() {
        $('.nav-icon').click(function() {
            $('.leftmenu-inner').slideToggle('slow');

        });
        //hide the messages
        setTimeout(function() {
            $(".messages").hide('blind', {}, 500)
        }, 5000);
    });
</script>

<!-- Delete Modal -->
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

</body>
</html>