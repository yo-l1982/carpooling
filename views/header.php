<?php
require_once('lib/Template.class.php');
include_once('conf/config.inc.php');
class header {
    function render($cmd) {
        // get template
        $page = new Template('html/header.html');
        // print processed page.
        print $page->fetch();
    }
}