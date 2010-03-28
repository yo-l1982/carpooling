<?php
require_once('lib/Template.class.php');
include_once('conf/config.inc');
class login {
    function render($cmd) {

        if($cmd == 'login') {
            $user = $_POST['user'];
            $password = $_POST['password'];
            print 'inloggad';
            //todo check db for user!!
        }
        else {
            // get template
            $page = new Template('html/login.html');
            // print processed page.
            print $page->fetch();
        }
    }
}