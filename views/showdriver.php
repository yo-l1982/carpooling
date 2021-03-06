<?php
require_once('lib/Database.class.php');
require_once('lib/Template.class.php');
include_once('conf/config.inc.php');
class showdriver {
    function render($cmd, $id) {
        // id needed to show driver.
        if (!empty($id)) {
            if ($cmd == 'join_driver') {
                //todo passenger is not inserted if ogged in as user.
                
                $passenger_id = $_SESSION['user_id'];
                $driver_id = $id;
                // set up db.
                $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
                //Check if db is present. Redirect to install db page if not.
                if (!$db->isSetDatabase(DB_NAME)) {
                    // redirect to installdb!
                }
                //insert connection between pass and drv info in db
                $query = sprintf("INSERT INTO driver_passenger (passenger_id, driver_id)VALUES (%d, %d)",
                        mysql_real_escape_string($passenger_id),
                        mysql_real_escape_string($driver_id));

                $db->query($query);

                $db->close();
                print 'joinded driver';
            }
            else {
                // set up db.

                $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
                //Check if db is present. Redirect to install db page if not.
                if (!$db->isSetDatabase(DB_NAME)) {
                    // redirect to installdb!
                }

                $query = sprintf("SELECT * FROM driver 
                                LEFT JOIN user ON driver.userid = user.id
                                LEFT JOIN games ON games.id = driver.gameid
                                WHERE driver.id = '%s'" ,
                        mysql_real_escape_string($id));

                $result = $db->fetchQuery($query, 'hash');
                $db->close();
                $page = new Template('html/showdriver.html');
                // Send driver to template.
                $page->set('driver', $result);
                // print processed template.
                print $page->fetch();
            }
        }
        else {
            print 'No driver!';
        }
    }
}