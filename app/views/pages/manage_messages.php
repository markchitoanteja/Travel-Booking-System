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
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Manage Messages <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Manage Messages</h1>
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
                                <h3 class="card-title">List of Messages</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered w-100 datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">Date and Time</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $database = new Database();
                                $messages = $database->select_all("messages", "id", "DESC");
                                ?>

                                <?php if ($messages): ?>
                                    <?php foreach ($messages as $message): ?>
                                        <tr class="text-center">
                                            <td><?= date("F j, Y g:i A", strtotime($message["created_at"])) ?></td>
                                            <td><?= $message["name"] ?></td>
                                            <td><?= $message["email"] ?></td>
                                            <td><?= $message["subject"] ?></td>
                                            <td>
                                                <a href="javascript:void(0)" title="View Message Information" class="view_message" message_id="<?= $message["id"] ?>"><i class="fa fa-eye text-primary mr-1"></i></a>
                                                <a href="javascript:void(0)" title="Delete Message" class="delete_message" message_id="<?= $message["id"] ?>"><i class="fa fa-trash text-danger"></i></i></a>
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

<?php include_once "../app/views/components/view_message_modal.php" ?>