<?php
require_once('lib/Template.class.php');
require_once('lib/Database.class.php');
include_once('conf/config.inc');
require_once('views/login.php');
class userinfo {
    function render($cmd) {
        error_reporting(E_NOTICE);
        if ($cmd == 'logout') {
            session_start();
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


            // print processed page.
            $page->set('result', $result);
            print $page->fetch();
        }
    }
}