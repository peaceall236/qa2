<?php
//load config
require_once 'config/config.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/mail_helper.php';
// auto-load core libraries

spl_autoload_register(function ($className) {
    require_once 'libraries/'. $className .'.php';
});


?>