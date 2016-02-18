<?php
require_once 'is_admin.php';
require_once 'header.php';
?>

<div class="admin">
    <div class="admin_welcome"><h2> Welcome Admin </h2>
    </div>
    <br/>
    <table id="grid"></table>
    <div id="perpage"></div><br/>
</div>
<div class="well">
<p id="test"> </p>
</div>
<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Tweets</h4>
                </div>
                <div class="modal-body" id ="modal_content">
                <!-- Modal Content here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" 
                        data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php require 'footer.html'; ?>