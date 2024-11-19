<?php $database = new Database() ?>

<!-- New Booking Modal -->
<div class="modal fade" id="new_booking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Booking</h5>
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
                    <div class="alert alert-danger text-center d-none" id="new_booking_alert">Invalid Username or Password</div>

                    <form id="new_booking_modal_form" action="javascript:void(0)">
                        <div class="row">
                            <div class="col-6">
                                <strong>Passenger Name: </strong> <?= $database->select_one("users", ["id" => session("user_id")])["name"] ?>
                            </div>
                            <div class="col-6">
                                <strong>Total Fare: </strong> ₱<span id="new_booking_modal_fare"></span>.00
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="new_booking_modal_origin">Origin</label>
                                    <input type="text" class="form-control" id="new_booking_modal_origin" placeholder="Enter pick-up location" required readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="new_booking_modal_destination">Destination</label>
                                    <select class="form-control" id="new_booking_modal_destination" required>
                                        <option value selected disabled>Select drop-off location</option>
                                        <option value="Oras">Oras</option>
                                        <option value="Dolores">Dolores</option>
                                        <option value="Taft">Taft</option>
                                        <option value="Sulat">Sulat</option>
                                        <option value="San Julian">San Julian</option>
                                        <option value="Borongan">Borongan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="new_booking_modal_trip_date">Trip Date</label>
                                    <input type="text" class="form-control trip_date" id="new_booking_modal_trip_date" placeholder="Select Date" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="new_booking_modal_trip_time">Trip Time</label>
                                    <input type="text" class="form-control trip_time" id="new_booking_modal_trip_time" placeholder="Select Time" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="new_booking_modal_van_id">Van</label>
                                    <select id="new_booking_modal_van_id" class="form-control" required>
                                        <option value selected disabled>Select your Van</option>
                                        <?php $vans = $database->select_all("vans") ?>
                                        <?php if ($vans): ?>
                                            <?php foreach ($vans as $van): ?>
                                                <option value="<?= $van["id"] ?>"><?= $van["brand"] ?> <?= $van["model"] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="new_booking_modal_passenger_id" value="<?= session("user_id") ?>">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" form="new_booking_modal_form" class="btn btn-primary" id="new_booking_modal_submit">Submit</button>
            </div>
        </div>
    </div>
</div>