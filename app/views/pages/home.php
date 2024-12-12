<?php $database = new Database() ?>

<div class="hero-wrap ftco-degree-bg" style="background-image: url('assets/images/<?= session("page") ?>.png');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4">Quick &amp; Convenient Way to Book Public Transport</h1>
                    <p style="font-size: 18px;">Find and reserve seats on public utility vehicles across the Eastern Samar with ease and comfort. Safe travel is just a few clicks away.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Book your Ride -->
<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12 featured-top">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex align-items-center">
                        <form action="javascript:void(0)" class="request-form ftco-animate bg-primary" id="new_booking_form">
                            <h2>Book Your PUV Ride</h2>
                            <div class="form-group">
                                <label for="new_booking_origin" class="label">Origin</label>
                                <input type="text" class="form-control" id="new_booking_origin" placeholder="Enter pick-up location" value="Oras Terminal" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="new_booking_destination" class="label">Destination</label>
                                <select class="form-control" id="new_booking_destination" required>
                                    <option value selected disabled>Select drop-off location</option>
                                    <option class="text-dark" value="Dolores">Dolores</option>
                                    <option class="text-dark" value="Can-Avid">Can-Avid</option>
                                    <option class="text-dark" value="Taft">Taft</option>
                                    <option class="text-dark" value="Sulat">Sulat</option>
                                    <option class="text-dark" value="San Julian">San Julian</option>
                                    <option class="text-dark" value="Borongan">Borongan</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="new_booking_trip_date" class="label">Travel Date</label>
                                    <input type="text" class="form-control trip_date" id="new_booking_trip_date" placeholder="Select Date" required>
                                </div>
                                <div class="form-group ml-2">
                                    <label for="new_booking_trip_time" class="label">Departure Time</label>
                                    <input type="text" class="form-control trip_time" id="new_booking_trip_time" placeholder="Select time" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="new_booking_fare">

                                <input type="submit" value="Book Your Ride" id="new_booking_submit" class="btn btn-secondary py-3 px-4">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div class="services-wrap rounded-right w-100">
                            <h3 class="heading-section mb-4">Reliable and Affordable Booking</h3>
                            <div class="row d-flex mb-4">
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Choose Your Route</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Get the Best Fare</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Reserve Your Seat</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p><button class="btn btn-primary py-3 px-4" type="submit" form="new_booking_form">Book Your Ride Now</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Vans -->
<section class="ftco-section ftco-no-pt bg-light" id="vans">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What We Offer</span>
                <h2 class="mb-2">Featured Vans</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <?php $vans = $database->select_all("vans") ?>
                    <?php if ($vans): ?>
                        <?php foreach ($vans as $van): ?>
                            <div class="item">
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
                                            <a href="javascript:void(0)" van_id="<?= htmlspecialchars($van['id'], ENT_QUOTES, 'UTF-8') ?>" class="btn btn-primary py-2 mr-1 <?= session('user_id') ? ($van['status'] == 'available' ? 'book_now' : 'unavailable') : 'needs-login' ?>">Book now</a>
                                            <a href="javascript:void(0)" van_id="<?= $van["id"] ?>" class="btn btn-secondary py-2 ml-1 van_details">Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us -->
<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/images/about-van.png);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">About Us</span>
                    <h2 class="mb-4">Welcome to Grand Tours</h2>

                    <p>We provide a reliable platform to book Public Utility Vans across the Eastern Samar. Our mission is to make travel easier, safer, and more convenient, connecting you to quality transport options wherever you need to go.</p>
                    <p>Whether you're planning a family trip, a group outing, or just need a convenient way to travel, Grand Tours is here to help. Enjoy seamless booking, transparent pricing, and trusted service providers, all at your fingertips.</p>
                    <p><a href="vans" class="btn btn-primary py-3 px-4">Find a Van</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-3">Our Van Services</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">City Transfers</h3>
                        <p>Seamless and comfortable transfers within city limits, ideal for daily commutes and errands.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Inter-City Travel</h3>
                        <p>Reliable and safe van services for travel between cities, perfect for work or leisure trips.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Airport Transfers</h3>
                        <p>Efficient pick-up and drop-off services to and from the airport, ensuring a stress-free start or end to your journey.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">City Tours</h3>
                        <p>Enjoy scenic and guided tours around the city in comfort, perfect for tourists and visitors.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial -->
<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-3">Happy Clients</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(assets/images/client-1.png)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">“First time namin mag-book online para sa biyahe sa Baguio. Very convenient at professional ang service. Sulit na sulit!”</p>
                                <p class="name">Maria Santos</p>
                                <span class="position">Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(assets/images/client-2.png)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">“Great service at maayos ang booking. Mabilis din ang proseso kaya nakakatipid kami sa oras. Salamat, Grand Tours!”</p>
                                <p class="name">Juan Dela Cruz</p>
                                <span class="position">Business Traveler</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(assets/images/client-3.png)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">“Perfect for long-distance travels! Maayos at safe ang biyahe namin papuntang Ilocos. Highly recommended ang Grand Tours!”</p>
                                <p class="name">Luis Ramirez</p>
                                <span class="position">Frequent Traveler</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(assets/images/client-4.png)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">“Convenient at mabilis ang booking. Hindi na kami nag-abala sa paghahanap ng van papuntang airport. Thanks, Grand Tours!”</p>
                                <p class="name">Ana Lopez</p>
                                <span class="position">Tourist</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(assets/images/client-5.png)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">“Napaka-convenient at mabilis ang booking process. Hindi na kami nag-abala sa paghahanap ng van papuntang airport!”</p>
                                <p class="name">Jose Manalo</p>
                                <span class="position">Traveler</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "../app/views/components/new_booking_modal.php" ?>
<?php include_once "../app/views/components/van_details_modal.php" ?>