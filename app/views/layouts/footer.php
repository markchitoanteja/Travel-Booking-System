    <?php include_once "../app/views/components/account_settings_modal.php" ?>
    <?php include_once "../app/views/components/developers_modal.php" ?>
    <?php include_once "../app/views/components/login_modal.php" ?>
    <?php include_once "../app/views/components/register_modal.php" ?>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="#" class="logo">Travel<span>Booking</span></a></h2>
                        <p>Your reliable partner for booking Public Utility Vans across the Can-Avid. Safe, convenient, and trustworthy service for every journey.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="javascript:void(0)" class="no-function"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="javascript:void(0)" class="no-function"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="javascript:void(0)" class="no-function"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="/" class="py-2 d-block">Home</a></li>
                            <li><a href="about" class="py-2 d-block">About</a></li>
                            <li><a href="vans" class="py-2 d-block">Vans</a></li>
                            <li><a href="contact" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Customer Support</h2>
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0)" class="py-2 d-block no-function">FAQ</a></li>
                            <li><a href="javascript:void(0)" class="py-2 d-block no-function">Payment Options</a></li>
                            <li><a href="javascript:void(0)" class="py-2 d-block no-function">Booking Tips</a></li>
                            <li><a href="javascript:void(0)" class="py-2 d-block no-function">How It Works</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Can-Avid, Eastern Samar</span></li>
                                <li><a href="tel://09123456789"><span class="icon icon-phone"></span><span class="text">+63 912 345 6789</span></a></li>
                                <li><a href="mailto:support@travelbooking.ph"><span class="icon icon-envelope"></span><span class="text">support@travelbooking.ph</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Travel Booking System.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <script>
        var notification = <?= session("notification") ? json_encode(session("notification")) : json_encode(null) ?>;
        var user_id = <?= session("user_id") ? json_encode(session("user_id")) : json_encode(null) ?>;
        var user_type = <?= session("user_type") ? json_encode(session("user_type")) : json_encode(null) ?>;
        var page = <?= session("page") ? json_encode(session("page")) : json_encode(null) ?>;
    </script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.animateNumber.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/jquery.timepicker.min.js"></script>
    <script src="assets/js/scrollax.min.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/js/dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap4.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>

<?php session("notification", "unset") ?>