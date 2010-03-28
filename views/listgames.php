<?php
require_once('lib/Database.class.php');
require_once('lib/Template.class.php');
include_once('conf/config.inc');
class listgames {
    function render($cmd) {
        $page = new Template('html/listgames.html');

        $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
        //Check if db is present. Redirect to install db page if not.
        if (!$db->isSetDatabase(DB_NAME)) {
            // redirect to installdb!
        }

        $query = sprintf("SELECT * FROM games");

        $result = $db->fetchQuery($query ,'hash');
        // send games to template for listing
        $page->set('games', $result);

        echo $page->fetch();
    }
}