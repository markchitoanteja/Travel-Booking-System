<!-- Register Modal -->
<div class="modal fade" id="account_settings_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Account Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="loading text-center py-5 d-none">
                    <img src="assets/images/loading.gif" alt="Loading GIF" class="mb-3">
                    <h5 class="text-muted">Please Wait...</h5>
                </div>
                <div class="main-form">
                    <div class="alert alert-danger text-center d-none" id="account_settings_alert">Username is already in use!</div>

                    <form id="account_settings_form" action="javascript:void(0)">
                        <div class="form-group">
                            <label for="account_settings_name">Name</label>
                            <input type="text" class="form-control" id="account_settings_name" required>
                        </div>
                        <div class="form-group">
                            <label for="account_settings_username">Username</label>
                            <input type="text" class="form-control" id="account_settings_username" required>
                        </div>
                        <div class="form-group">
                            <label for="account_settings_password">Password</label>
                            <input type="password" class="form-control" id="account_settings_password">
                            <small class="text-muted">Leave blank to keep your current password.</small>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="account_settings_id">
                <input type="hidden" id="account_settings_old_password">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" form="account_settings_form" class="btn btn-primary" id="account_settings_submit">Save changes</button>
            </div>
        </div>
    </div>
</div>