<?php
$routes = [
    // Normal Pages
    '' => '../app/views/pages/home.php',
    'home' => '../app/views/pages/home.php',
    'about' => '../app/views/pages/about.php',
    'vans' => '../app/views/pages/vans.php',
    'contact' => '../app/views/pages/contact.php',
    'manage_bookings' => '../app/views/pages/manage_bookings.php',
    'manage_vans' => '../app/views/pages/manage_vans.php',
    'manage_messages' => '../app/views/pages/manage_messages.php',
    'my_bookings' => '../app/views/pages/my_bookings.php',
    
    // Server
    'server' => '../app/controllers/Controller.php',

    // Error Pages
    '403' => '../app/views/errors/403.php',
    '404' => '../app/views/errors/404.php',
    '500' => '../app/views/errors/500.php',
];
