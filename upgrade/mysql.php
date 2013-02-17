<?php
 if (!defined('XTMCMS')) {
    die("Hacking attempt!");
} 
if (extension_loaded('mysqli') AND version_compare("5.0.5", phpversion(), "!=")) {
    include_once("mysqli.class.php");
} else {
    include_once("mysql.class.php");
} 
?>