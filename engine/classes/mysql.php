<?php
if (!defined('XTMCMS')) {
    die("Hacking attempt!");
}
if (extension_loaded('mysqli')) {
    include_once(ENGINE_DIR . "/classes/mysqli.class.php");
} else {
    include_once(ENGINE_DIR . "/classes/mysql.class.php");
}
?>