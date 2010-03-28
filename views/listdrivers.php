<?php
require_once('lib/Database.class.php');
require_once('lib/Template.class.php');
include_once('conf/config.inc');
class listdrivers {
    function render($cmd) {

        $page = new Template('html/listdrivers.html');

        $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
        //Check if db is present. Redirect to install db page if not.
        if (!$db->isSetDatabase(DB_NAME)) {
            // redirect to installdb!
        }

        $query = sprintf("SELECT * FROM driver");

        $result = $db->fetchQuery($query ,'hash');
        // send drivers to template
        $page->set('drivers', $result);
        // print page

        print $page->fetch();
    }

}