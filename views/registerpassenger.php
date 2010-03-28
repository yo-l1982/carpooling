<?php
require_once('lib/Database.class.php');
require_once('lib/Template.class.php');
include_once('conf/config.inc');

class registerpassenger {
    function render($cmd) {
        // if cmd is save (submitbutton pressed)
        if ($cmd == 'save') {
            // set up db.
            $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
            //Check if db is present. Redirect to install db page if not.
            if (!$db->isSetDatabase(DB_NAME)) {
                // redirect to installdb!
            }
            // get POST data
            $name = $_POST['name'];
            $phonenumber = $_POST['phonenumber'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            //insert passenger info in db
            $query = sprintf("INSERT INTO passenger (name, phonenumber, email, password)VALUES ('%s', '%s', '%s', '%s')",
                    mysql_real_escape_string($name),
                    mysql_real_escape_string($phonenumber),
                    mysql_real_escape_string($email),
                    mysql_real_escape_string($password));

            $db->query($query);

            $db->close();
            session_start();

            $_SESSION['passenger_id'] = $db->getLastId();
            //redirect after save
            include('views/listdrivers.php');
            $listdrivers = new listdrivers();
            print $listdrivers->render('');
        }
        else {
            // first load of page.
            $page = new Template('html/registerpassenger.html');
            print $page->fetch();
        }
    }
}