<!-- Register Modal -->
<div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
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
                    <div class="alert alert-danger text-center d-none" id="register_alert">Username is already in use!</div>

                    <form id="register_form" action="javascript:void(0)">
                        <div class="form-group">
                            <label for="register_name">Name</label>
                            <input type="text" class="form-control" id="register_name" required>
                        </div>
                        <div class="form-group">
                            <label for="register_username">Username</label>
                            <input type="text" class="form-control" id="register_username" required>
                        </div>
                        <div class="form-group">
                            <label for="register_password">Password</label>
                            <input type="password" class="form-control" id="register_password" required>
                        </div>
                        <div class="form-group">
                            <label for="register_confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="register_confirm_password" required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" form="register_form" class="btn btn-primary" id="register_submit">Submit</button>
            </div>
        </div>
    </div>
</div>