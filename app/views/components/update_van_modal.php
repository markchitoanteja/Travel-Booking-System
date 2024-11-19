<!-- Update Modal -->
<div class="modal fade" id="update_van_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Van</h5>
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
                    <div class="alert alert-danger text-center d-none" id="update_van_alert">This van is already registered in the database</div>

                    <form id="update_van_form" action="javascript:void(0)">
                        <div class="form-group text-center">
                            <img id="update_van_image_display" src="uploads/vans/default-item-image.png" class="img-thumbnail mb-3" style="width: 200px; height: 150px;">
                            <input type="file" id="update_van_image" class="form-control" accept="image/*">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="update_van_model">Model</label>
                                    <input type="text" class="form-control" id="update_van_model" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="update_van_brand">Brand</label>
                                    <input type="text" class="form-control" id="update_van_brand" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="update_van_capacity">Capacity</label>
                                    <input type="number" min="2" class="form-control" id="update_van_capacity" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="update_van_status">Status</label>
                                    <select class="form-control" id="update_van_status">
                                        <option value="available">Available</option>
                                        <option value="unavailable">Unavailable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="update_van_id">
                <input type="hidden" id="update_van_old_image">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" form="update_van_form" class="btn btn-primary" id="update_van_submit">Submit</button>
            </div>
        </div>
    </div>
</div>