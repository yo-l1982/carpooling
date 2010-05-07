<?php
require_once('lib/Template.class.php');
include_once('conf/config.inc.php');
class footer {
    function render($cmd) {
        // get template
        $page = new Template('html/footer.html');
        // print processed page.
        print $page->fetch();
    }
}