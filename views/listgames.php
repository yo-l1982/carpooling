<?php
require_once('lib/Database.class.php');
require_once('lib/Template.class.php');
include_once('conf/config.inc.php');
class listgames {
    function render($cmd, $id) {

        if (!empty($id)) {
            $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
            //Check if db is present. Redirect to install db page if not.
            if (!$db->isSetDatabase(DB_NAME)) {
                // redirect to installdb!
            }
            // get the game
            $query = sprintf("SELECT * FROM games WHERE id= '%s'",
                    mysql_real_escape_string($id));

            $result = $db->fetchQuery($query, 'hash');
            print $result[0]['id'] . ',' . $result[0]['hometeam'] . " - " . $result[0]['awayteam'] . "(". $result[0]['date'] .")";
        }
        else {

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
}