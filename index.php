<?php

// todo
// saession start here
session_start();

include_once('conf/config.inc');
require_once('lib/Database.class.php');
//Index.php takes care of all the ajax calls and redirects them to the view.
//Added install db


// cmd from ajax call.
if (!isset($_GET['cmd'])) {
    $cmd = '';
}
else {
    $cmd = $_GET['cmd'];
}

// what page to render
if (!isset($_GET['page'])) {
    $page = '';
}
else {
    $page = $_GET['page'];
}

// id to show on pages.
if (!isset($_GET['id'])) {
    $id = '';
}
else {
    $id = $_GET['id'];
}

$db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
//Check if db is present. Redirect to install db page if not.
if (!$db->isSetDatabase(DB_NAME)) {
    $page = 'installdb';
}



// if page is sent in ajax call,
if (!empty($page)) {
    // get page name
    $class = $page;
    // add php file extension so we dont need to send it.
    $page = 'views/' . $page . '.php';
    // include the view.
    include($page);
    // set metod Standard method is render
    $method = 'render';
    // call render function in the specified page
    print call_user_func(array($class, $method), $cmd, $id);
}
// render main page if no page is received.
else {
    include('views/main.php');
    $main = new main();
    $main->render('');
}

