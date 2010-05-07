<?php
require_once('lib/Template.class.php');
include_once('conf/config.inc.php');
class help {
    function render($cmd) {

        if($cmd != '') {
            $help_header = 'fsdfs';
            $help_text = 'fsdfDSF SDGSDG innd';
            // get template
            $page = new Template('html/help.html');
            $page->set('help_header', $help_header);
            $page->set('help_text', $help_text);
            // print processed page.
            print $page->fetch();
        }
    }
}