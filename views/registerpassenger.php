<?php
require_once('lib/Database.class.php');
require_once('lib/Template.class.php');
include_once('conf/config.inc.php');

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

            $delete_user = $_POST['save_user'];
            
            $delete_date = '';
            if ($delete_user) {
                $delete_date = '';
            }
            $query = sprintf("INSERT INTO user (name, phonenumber, deletedate, password, email)VALUES ('%s', '%s', '%s', '%s', '%s')",
                    mysql_real_escape_string($name),
                    mysql_real_escape_string($phonenumber),
                    mysql_real_escape_string($delete_date),
                    mysql_real_escape_string($password),
                    mysql_real_escape_string($email));


            $db->query($query);
            // get created user id.
            $userid = $db->getLastId();

            //insert passenger info in db
            $query = sprintf("INSERT INTO passenger (userid)VALUES ('%s')",
                    mysql_real_escape_string($userid));

            $db->query($query);

            $db->close();

            $_SESSION['user_id'] = $db->getLastId();
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