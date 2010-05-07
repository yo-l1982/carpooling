<?php
require_once('lib/Template.class.php');
include_once('conf/config.inc.php');
require_once('lib/Database.class.php');
require_once('views/userinfo.php');

class login {
    function render($cmd) {

        if (isset($_SESSION['user_id'])) {
            // get template
            
            $userinfo = new userinfo();
            // print processed page.
            $userinfo->render('');
        }
        else {
            if($cmd == 'login') {
                $user = $_POST['user'];
                $password = $_POST['password'];

                $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
                //Check if db is present. Redirect to install db page if not.
                if (!$db->isSetDatabase(DB_NAME)) {
                    // redirect to installdb!
                }
                // get the game
                $query = sprintf("SELECT * FROM user WHERE name like '%s' AND password like '%s'",
                        mysql_real_escape_string($user),
                        mysql_real_escape_string($password));
                $result = $db->fetchQuery($query, 'hash');

                $db->close();

                if (count($result) > 0) {

                    $_SESSION['user_id'] = $result[0]['id'];
                    $userinfo = new userinfo();
                    // print processed page.
                    $userinfo->render('');
                }
                else {
                    print 'false';
                }
            }
            else {
                // get template
                $page = new Template('html/login.html');
                // print processed page.
                print $page->fetch();
            }
        }
    }
}