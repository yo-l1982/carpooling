<?php
require_once('lib/Database.class.php');
require_once('lib/Template.class.php');
include_once('conf/config.inc.php');
class registerdriver {
    function render($cmd, $id) {

        // still needed????? Oh yes.
        if (!empty($id)) {

        }
        else {
            // save driver
            if ($cmd == 'save') {
                // set up db.
                $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
                // get POST info

                //todo: fix gameid instead!!!
                $game_id = $_POST['game_id'];
                $seats = $_POST['seats'];
                $meetingpoint = $_POST['meetingpoint'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phonenumber = $_POST['phonenumber'];
                $message = $_POST['message'];
                $password = $_POST['password'];

                $delete_user = $_POST['save_user'];
                $delete_date = '';
                // Todo fix time aswell or add a day to date.
                if ($delete_user) {
                    $delete_date = $date;
                }
                // create user
                $query = sprintf("INSERT INTO user (name, phonenumber, deletedate, password, email)VALUES ('%s', '%s', '%s', '%s', '%s')",
                        mysql_real_escape_string($name),
                        mysql_real_escape_string($phonenumber),
                        mysql_real_escape_string($delete_date),
                        mysql_real_escape_string($password),
                        mysql_real_escape_string($email));


                $db->query($query);
                // get created user id.
                $userid = $db->getLastId();

                // create driver
                $query = sprintf("INSERT INTO driver (userid, meetingpoint, gameid, date, time, message, seats)VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
                        mysql_real_escape_string($userid),
                        mysql_real_escape_string($meetingpoint),
                        mysql_real_escape_string($game_id),
                        mysql_real_escape_string($date),
                        mysql_real_escape_string($time),
                        mysql_real_escape_string($message),
                        mysql_real_escape_string($seats));

                $db->query($query);

                $_SESSION['user_id'] = $db->getLastId();

                $db->close();

                //redirect after save to list drivers
                include('views/listdrivers.php');
                $listdrivers = new listdrivers();
                $listdrivers->render('');
            }
            // first time in just print page
            else {
                $page = new Template('html/registerdriver.html');
                $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
                // user logged in
                if (isset($_SESSION['user_id'])) {

                    $user_id = $_SESSION['user_id'];
                    // create driver
                    $query = sprintf("SELECT * FROM user WHERE id = '%s'",
                            mysql_real_escape_string($user_id));

                    $result = $db->fetchQuery($query, 'hash');

                    $name = '';
                    $phonenumber = '';
                    $email = '';
                    $name = $result[0]['name'];
                    $phonenumber = $result[0]['phonenumber'];
                    $email = $result[0]['email'];

                    $db->close();

                }
                else {
                    $name = '';
                    $phonenumber = '';
                    $email = '';

                }

                $page->set('name', $name);
                $page->set('phonenumber', $phonenumber);
                $page->set('email', $email);

                print $page->fetch();
            }
        }
    }
}