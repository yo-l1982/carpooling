<?php
require_once('lib/Template.class.php');
include_once('conf/config.inc');
class menu {
    function render($cmd) {
        // get template
        $page = new Template('html/menu.html');
        // print processed page.
        print $page->fetch();
    }
}