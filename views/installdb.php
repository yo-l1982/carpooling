<?php
require_once('lib/Template.class.php');
require_once('lib/Database.class.php');
require_once('lib/mysql_dump.class.php');
require_once('conf/config.inc');

//Installs db from sql dump.
class installdb {
    function render($cmd) {

        if ($cmd == 'installdb'){
            
            $db = new MYSQL_DUMP(DB_HOST, DB_USERNAME, DB_PASSWORD);

            if (!$db->restoreDB(SQL_FILENAME_PATH)) {
                print $db->error;
            }
            else {
                print 'Success! Databasen installerad <a href="index.php">Tillbaks till Carpooling</a>';
            }

            
             

        }
        else {
            $page = new Template('html/installdb.html');
            print $page->fetch();
        }
    }
}