<?php $database = new Database() ?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/images/<?= session("page") ?>.png');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Vans <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Vans</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php $vans = $database->select_all("vans") ?>
            <?php if ($vans): ?>
                <?php foreach ($vans as $van): ?>
                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end" style="background-image: url(uploads/vans/<?= $van["image"] ?>);">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="javascript:void(0)"><?= $van["brand"] ?> <?= $van["model"] ?></a></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat text-<?= $van["status"] == "available" ? "success" : "danger" ?>"><?= ucfirst($van["status"]) ?></span>
                                    <p class="price ml-auto"><?= $van["capacity"] ?> <span> Seats</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    <a href="javascript:void(0)" van_id="<?= $van["id"] ?>" class="btn btn-primary py-2 mr-1 <?= $van["status"] == "available" ? "book_now" : "unavailable" ?>">Book now</a>
                                    <a href="javascript:void(0)" van_id="<?= $van["id"] ?>" class="btn btn-secondary py-2 ml-1 van_details">Details</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>

<?php include_once "../app/views/components/new_booking_modal.php" ?>
<?php include_once "../app/views/components/van_details_modal.php" ?>