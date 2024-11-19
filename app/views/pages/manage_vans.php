<?php
if (session("user_type") != "admin") {
    redirect("500", 500);
}
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/images/contact.png');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Manage Bookings <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Manage Vans</h1>
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
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title">List of Vans</h3>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#new_van_modal"><i class="fa fa-plus mr-1"></i> New Van</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered w-100 datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">Model</th>
                                    <th class="text-center">Brand</th>
                                    <th class="text-center">Capacity</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $database = new Database();
                                $vans = $database->select_all("vans", "id", "DESC");
                                ?>

                                <?php if ($vans): ?>
                                    <?php foreach ($vans as $van): ?>
                                        <?php
                                        switch ($van["status"]) {
                                            case "available":
                                                $status_color = "success";
                                                break;
                                            case "unavailable":
                                                $status_color = "danger";
                                                break;
                                        }
                                        ?>

                                        <tr class="text-center">
                                            <td><?= $van["model"] ?></td>
                                            <td><?= $van["brand"] ?></td>
                                            <td><?= $van["capacity"] ?> Seats</td>
                                            <td class="text-<?= $status_color ?>"><?= ucfirst($van["status"]) ?></td>
                                            <td>
                                                <a href="javascript:void(0)" title="Edit Van Information" class="edit_van" van_id="<?= $van["id"] ?>"><i class="fa fa-pencil text-primary mr-1"></i></a>
                                                <a href="javascript:void(0)" title="Delete Van" class="delete_van" van_id="<?= $van["id"] ?>"><i class="fa fa-trash text-danger"></i></i></a>
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

<?php include_once "../app/views/components/new_van_modal.php" ?>
<?php include_once "../app/views/components/update_van_modal.php" ?>