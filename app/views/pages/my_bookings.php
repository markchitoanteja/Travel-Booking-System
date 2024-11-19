<?php
if (session("user_type") != "customer") {
    redirect("500", 500);
}
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/images/contact.png');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Bookings <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">My Bookings</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of my Bookings</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered w-100 datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">Van Model</th>
                                    <th class="text-center">Destination</th>
                                    <th class="text-center">Trip Date and Time</th>
                                    <th class="text-center">Fare</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $database = new Database();
                                $bookings = $database->select_many("bookings", ["passenger_id" => session("user_id")], "AND", "id", "DESC");
                                ?>

                                <?php if ($bookings): ?>
                                    <?php foreach ($bookings as $booking): ?>
                                        <?php
                                        switch ($booking["status"]) {
                                            case "pending":
                                                $status_color = "warning";
                                                break;
                                            case "confirmed":
                                                $status_color = "success";
                                                break;
                                            case "cancelled":
                                                $status_color = "danger";
                                                break;
                                        }
                                        ?>

                                        <tr class="text-center">
                                            <td>
                                                <?php
                                                $van = $database->select_one("vans", ["id" => $booking["van_id"]]);
                                                echo $van["brand"] . " " . $van["model"];
                                                ?>
                                            </td>
                                            <td><?= $booking["destination"] ?></td>
                                            <td><?= date("F j, Y", strtotime($booking["trip_time"])) . " " . $booking["trip_time"] ?></td>
                                            <td>₱<?= $booking["fare"] ?></td>
                                            <td class="text-<?= $status_color ?>"><?= ucfirst($booking["status"]) ?></td>
                                            <td>
                                                <?php if ($booking["status"] == "pending"): ?>
                                                    <a href="javascript:void(0)" title="Cancel Booking" class="btn btn-sm btn-danger confirm_cancel_booking" booking_id="<?= $booking["id"] ?>" status="CANCEL">Cancel Booking</a>
                                                <?php else: ?>
                                                    <small class="text-muted">Unavailable</small>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>