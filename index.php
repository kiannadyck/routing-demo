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

// Define a page1 subpage route
$f3->route('GET /page1/subpage1', function() {
    echo '<h1>This is page1, subpage1</h1>';
});

// Define a page2 route
$f3->route('GET /page2', function() {
    echo '<h1>This is page2</h1>';
});

// practice instantiating a template for a route
$f3->route('GET /jewelry/rings/toe-rings', function() {
//    echo '<h1>Toe-Rings</h1>';
    $template = new Template();
    echo $template->render('views/toe-rings.html');
});

// practice using tokens; need the f3 object and params array passed to anonymous function
$f3->route('GET /hello/@name', function($f3, $params) {
    /*$name = $params['name'];
    echo "<h1>Hello, $name</h1>";*/

    $f3->set('name', $params['name']);

    $template = new Template();
    echo $template->render('views/hello.html');

});

$f3->route('GET /hi/@first/@last', function($f3, $params) {

    $f3->set('first', $params['first']);
    $f3->set('last', $params['last']);
    $f3->set('message', 'Hi');

    $template = new Template();
    echo $template->render('views/hi.html');

});

$f3->route('GET /language/@lang', function($f3, $params) {
    switch($params['lang']) {
        case 'swahili' :
            echo 'Jumbo!'; break;
        case 'spanish' :
            echo 'Hola!'; break;
        case 'russian':
            echo 'Privit!'; break;
        case 'farsi' :
            echo 'Salam!'; break;
        case 'french' :
            $f3->reroute('/');
        default:
            $f3->error(404);
    }
});

// Run fat free
$f3->run();