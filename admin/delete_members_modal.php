<div class="modal fade" id="deletemember<?php echo $row['userID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete STUDENT</h4></center>
            </div>
            <div class="modal-body">
           
                <div class="alert alert-danger">Are you Sure you Want to <strong>Delete &nbsp;</strong> "<?php echo $row['fname']; ?>"?</div>
                                                          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="icon-remove icon-large"></i>&nbsp; Close</button>
                <a href="delete_members.php?userID=<?php echo $row['userID']; ?>" class="btn btn-danger"><i class="icon-check icon-large"></i>&nbsp; Yes</a>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>