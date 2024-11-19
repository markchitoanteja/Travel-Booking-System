<!-- View Message Modal -->
<div class="modal fade" id="view_message_modal" tabindex="-1" role="dialog" aria-labelledby="viewMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewMessageModalLabel">Message Details</h5>
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
                    <div class="row mb-3">
                        <div class="col-2">
                            <strong>Date:</strong>
                        </div>
                        <div class="col-10">
                            <span id="view_message_created_at">November 19, 2024 12:22 AM</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2">
                            <strong>Name:</strong>
                        </div>
                        <div class="col-10">
                            <span id="view_message_name">Mark Chito Anteja</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2">
                            <strong>Email:</strong>
                        </div>
                        <div class="col-10">
                            <span id="view_message_email">antejamarkchito@gmail.com</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2">
                            <strong>Subject:</strong>
                        </div>
                        <div class="col-10">
                            <span id="view_message_subject">Request to Cancel Booking</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <strong>Message:</strong>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body py-2 text-justify">
                                    <span id="view_message_message">We provide a reliable platform to book Public Utility Vans across the Can-Avid. Our mission is to make travel easier, safer, and more convenient, connecting you to quality transport options wherever you need to go.</span>
                                </div>
                            </div>
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