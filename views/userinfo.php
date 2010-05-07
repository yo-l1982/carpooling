<?php
require_once('lib/Template.class.php');
require_once('lib/Database.class.php');
include_once('conf/config.inc.php');
require_once('views/login.php');
class userinfo {
    function render($cmd) {
        if ($cmd == 'logout') {
            session_unset();
            $login = new login();
            // print processed page.
            $login->render('');
        }
        else {
            $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);

            $user_id = $_SESSION['user_id'];
            // get template
            $page = new Template('html/userinfo.html');
            // get userinfo
            $query = sprintf("SELECT * FROM user WHERE id = '%s'",
                    mysql_real_escape_string($user_id));

            $result = $db->fetchQuery($query, 'hash');
            $page = new Template('html/userinfo.html');

            // print processed page.
            $page->set('user', $result);
            $query = sprintf("SELECT * FROM user
                                JOIN driver ON driver.userid = user.id
                                LEFT JOIN driver_passenger ON driver.id = driver_passenger.passenger_id
                                LEFT JOIN passenger ON passenger.id = driver_passenger.passenger_id
                                JOIN games ON games.id = driver.gameid
                                WHERE user.id = '%s'",
                    mysql_real_escape_string($user_id));

            $result = $db->fetchQuery($query, 'hash');

            $page->set('driver_set', $result);

            $query = sprintf("SELECT * FROM user
                                JOIN passenger ON passenger.userid = user.id
                                LEFT JOIN driver_passenger ON passenger.id = driver_passenger.passenger_id
                                LEFT JOIN driver ON driver.id = driver_passenger.driver_id
                                JOIN games ON games.id = driver.gameid
                                WHERE user.id = '%s'",
                    mysql_real_escape_string($user_id));

            $result = $db->fetchQuery($query, 'hash');
            
            $page->set('passenger_set', $result);

            print $page->fetch();
        }
    }
}