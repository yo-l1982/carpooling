<?php
require_once('lib/Database.class.php');
require_once('lib/Template.class.php');
include_once('conf/config.inc');
class registerdriver {
    function render($cmd, $id) {
        // if id is sent. then a game has been choosen.
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
            $db->close();
            // fetch template
            $page = new Template('html/registerdriver.html');
            // send game info to template
            $page->set('game', $result);
            // print filled info.
            print $page->fetch();
        }
        else {
            // save driver
            if ($cmd == 'save') {
                // set up db.
                $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
                // get POST info
                $game = $_POST['game'];
                $seats = $_POST['seats'];
                $meetingpoint = $_POST['meetingpoint'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phonenumber = $_POST['phonenumber'];
                $message = $_POST['message'];
                $password = $_POST['password'];
                // insert driver in db.
                $query = sprintf("INSERT INTO driver (name, phonenumber, meetingpoint, game, date, time, email, message, password, seats)VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
                        mysql_real_escape_string($name),
                        mysql_real_escape_string($phonenumber),
                        mysql_real_escape_string($meetingpoint),
                        mysql_real_escape_string($game),
                        mysql_real_escape_string($date),
                        mysql_real_escape_string($time),
                        mysql_real_escape_string($email),
                        mysql_real_escape_string($message),
                        mysql_real_escape_string($password),
                        mysql_real_escape_string($seats));

                $db->query($query);
                $db->close();

                //redirect after save to list drivers
                include('views/listdrivers.php');
                $listdrivers = new listdrivers();
                $listdrivers->render('');
            }
            // first time in just print page
            else {

                $result = array(0 => array('hometeam' => '', 'awayteam' => ''));

                $page = new Template('html/registerdriver.html');
                $page->set('game', $result);
                print $page->fetch();
            }
        }
    }
}