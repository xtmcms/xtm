<?php
 if (! defined('XTMCMS')) {
    die("Hacking attempt!");
} 
msgbox("info", "Upgrade is completed", "Congratulation! Your website has been completely upgraded to the current version <b>$version_id</b>.<br /><br /> Please delete folder <b>/upgrade/</b> from your server! You can now view the page <a href=\"../index.php\">Home Page</a> and make sure that you have have upgraded your theme to support and compatible with xtm <b>$version_id</b>!");
?>