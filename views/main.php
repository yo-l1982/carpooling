<?php
require_once('lib/Template.class.php');
include_once('conf/config.inc');
class main {
    // main file contains header etc for page.
    function render($cmd) {
        // get template
        $page = new Template('html/main.html');
        // print processed page.
        print $page->fetch();
    }
}