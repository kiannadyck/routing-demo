<?php
// Require the autoload file
require_once('vendor/autoload.php');

// Create an instance of the Base class
$f3 = Base::instance();

// Set debug level 0 = off, 3 = max level
$f3->set('DEBUG', 3);

// Define a default route
$f3->route('GET /', function() {
    echo '<h1>Routing Demo</h1>';
});

// Define a page1 route
$f3->route('GET /page1', function() {
    echo '<h1>This is page1</h1>';
});

// Define a page1 route
$f3->route('GET /page1/subpage1', function() {
    echo '<h1>This is page1, subpage1</h1>';
});

// Define a page2 route
$f3->route('GET /page2', function() {
    echo '<h1>This is page2</h1>';
});

// Run fat free
$f3->run();