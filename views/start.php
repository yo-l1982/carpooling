<?php
require_once('lib/Template.class.php');
include_once('conf/config.inc');
class start {
    function render($cmd) {
        // get template
        $page = new Template('html/start.html');
        // print processed page.
        print $page->fetch();
    }
}