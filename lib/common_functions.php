<?php
require_once 'conf/config.inc';
require_once('lib/Database.class.php');

function is_user($login, $password) {
    // set up db.
    $db = new Database(DB_USERNAME, DB_PASSWORD, DB_HOST);
    //Check if db is present. Redirect to install db page if not.
    if (!$db->isSetDatabase(DB_NAME)) {
        // redirect to installdb!
    }

    $query = sprintf('SELECT * FROM user WHERE login = "%s" AND password = "%s"',
                    mysql_real_escape_string($login),
                    mysql_real_escape_string($password));


    $result = $db->fetchQuery($query);

    if (count($result) > 0){
        return true;
    }
    else {
        return false;
    }

}

?>
