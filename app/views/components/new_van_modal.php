<!-- New Modal -->
<div class="modal fade" id="new_van_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Van</h5>
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
                    <div class="alert alert-danger text-center d-none" id="new_van_alert">This van is already registered in the database</div>

                    <form id="new_van_form" action="javascript:void(0)">
                        <div class="form-group text-center">
                            <img id="new_van_image_display" src="uploads/vans/default-item-image.png" class="img-thumbnail mb-3" style="width: 200px; height: 150px;">
                            <input type="file" id="new_van_image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="new_van_model">Model</label>
                                    <input type="text" class="form-control" id="new_van_model" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="new_van_brand">Brand</label>
                                    <input type="text" class="form-control" id="new_van_brand" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="new_van_capacity">Capacity</label>
                                    <input type="number" min="2" class="form-control" id="new_van_capacity" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="new_van_status">Status</label>
                                    <select class="form-control" id="new_van_status">
                                        <option value selected disabled></option>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" form="new_van_form" class="btn btn-primary" id="new_van_submit">Submit</button>
            </div>
        </div>
    </div>
</div>