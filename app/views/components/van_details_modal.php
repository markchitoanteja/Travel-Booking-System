<!-- Van Details Modal -->
<div class="modal fade" id="van_details_modal" tabindex="-1" role="dialog" aria-labelledby="vanDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vanDetailsLabel">Van Details</h5>
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
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">
                                    <strong>Brand:</strong>
                                </div>
                                <div class="col-7">
                                    <span id="van_details_brand"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <strong>Model:</strong>
                                </div>
                                <div class="col-7">
                                    <span id="van_details_model"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <strong>Capacity:</strong>
                                </div>
                                <div class="col-7">
                                    <span id="van_details_capacity"></span> Seats
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <strong>Status:</strong>
                                </div>
                                <div class="col-7">
                                    <span id="van_details_status"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <img src="" alt="Van Image" id="van_details_image" class="img-thumbnail" style="width: 200px; height: 150px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>