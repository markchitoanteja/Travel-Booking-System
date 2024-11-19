<?php $database = new Database() ?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/images/<?= session("page") ?>.png');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact us <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Contact Us</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> Can-Avid, Eastern Samar</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>Phone:</span> <a href="tel://09123456789">+63 912 345 6789</a></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:support@travelbooking.ph">support@travelbooking.ph</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
                <form action="javascript:void(0)" class="bg-light p-5 contact-form" id="contact_form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="contact_name" placeholder="Your Name" value="<?= session("user_id") ? $database->select_one("users", ["id" => session("user_id")])["name"] : null ?>" required <?= session("user_id") ? "readonly" : null ?>>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="contact_email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="contact_subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea rows="7" class="form-control" id="contact_message" placeholder="Message" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" id="contact_submit" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.6952719734827!2d125.44131357410467!3d11.99557493552667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3309130f0495af71%3A0x78fd50ec1e2ded7d!2sEastern%20Samar%20State%20University%20-%20Can-Avid%20Campus!5e0!3m2!1sen!2sph!4v1731547978719!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>