<?php
 if (! defined('XTMCMS')) {
    die("Hacking attempt!");
} 
if (!$_SESSION['step_update']) {
    $tableSchema = array();
    $tableSchema[] = "CREATE TABLE IF NOT EXISTS " . PREFIX . "_post_extras (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL DEFAULT '0',
  `news_read` mediumint(8) NOT NULL DEFAULT '0',
  `allow_rate` tinyint(1) NOT NULL DEFAULT '1',
  `rating` mediumint(8) NOT NULL DEFAULT '0',
  `vote_num` mediumint(8) NOT NULL DEFAULT '0',
  `votes` tinyint(1) NOT NULL DEFAULT '0',
  `view_edit` tinyint(1) NOT NULL DEFAULT '0',
  `disable_index` tinyint(1) NOT NULL DEFAULT '0',
  `related_ids` varchar(255) NOT NULL DEFAULT '',
  `access` varchar(150) NOT NULL DEFAULT '',
  `editdate` int(11) NOT NULL DEFAULT '0',
  `editor` varchar(40) NOT NULL DEFAULT '',
  `reason` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eid`),
  KEY `news_id` (`news_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "ALTER TABLE `" . PREFIX . "_static`  ADD `disable_index` TINYINT(1) NOT NULL DEFAULT '0'";
    $tableSchema[] = "ALTER TABLE `" . PREFIX . "_usergroups` ADD `disable_news_captcha` SMALLINT(6) NOT NULL DEFAULT '0'";
    $tableSchema[] = "ALTER TABLE `" . PREFIX . "_usergroups` ADD `disable_comments_captcha` SMALLINT(6) NOT NULL DEFAULT '0'";
    $tableSchema[] = "ALTER TABLE `" . PREFIX . "_banners` ADD `fpage` TINYINT(1) NOT NULL DEFAULT '0'";
    foreach($tableSchema as $table) {
        $db -> query ($table);
    } 
    if ($db -> error_count) {
        $error_info = "Total queries executed: <b>" . $db -> query_num . "</b> Failed to execute the query: <b>" . $db -> error_count . "</b>. Perhaps they have already been implemented previously.<br /><br /><div class=\"quote\"><b>Following queries cannot execute:</b><br /><br />";
        foreach ($db -> query_list as $value) {
            $error_info .= $value['query'] . "<br /><br />";
        } 
        $error_info .= "</div>";
    } else $error_info = "";
    $sql_info = "<div style=\"background:#F2DDDD;border:1px solid #992A2A;padding:5px;color: #992A2A;text-align: justify;\"><b>Important Information:</b><br /><br />The next step is updating the system must perform heavy xtm request to the news table. On some large sites, the process of this request may take a long time and may not be able to be done with PHP. If the script hangs and the request is made, you will need to run this query manually by via SSH. Copy the query that you will need to do if it will not run automatically:<br/><br/><b>INSERT INTO `" . PREFIX . "_post_extras` (`news_id`, `news_read`, `allow_rate`, `rating`, `vote_num`, `votes`, `view_edit`, `access`, `editdate`, `editor`, `reason`, `user_id`) SELECT `id`, `news_read`, `allow_rate`, `rating`, `vote_num`, `votes`, `view_edit`, `access`, `editdate`, `editor`, `reason`, `user_id` FROM `" . PREFIX . "_post` LEFT JOIN " . PREFIX . "_users ON (" . PREFIX . "_post.autor=" . PREFIX . "_users.name)</b><br /><br />Before the manually query, make sure that the table `" . PREFIX . "_post_extras` is empty and contains no records.</div>";
    $_SESSION['step_update'] = 1;
    if ($error_info) {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\">{$error_info}<br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step1\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } else {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\"><br /><br /><div style=\"border: 1px solid #475936; background: #6F8F52; color: #FFFFFF;padding:8px;text-align: justify;\">Process has been successfully carried out <b>5 MySQL</b> requests.</div><br /><br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step1\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } 
    die();
} 
if ($_SESSION['step_update'] == 1) {
    $row = $db -> super_query("SELECT COUNT(*) as count FROM " . PREFIX . "_post_extras");
    if (!$row['count']) {
        $db -> query ("INSERT INTO `" . PREFIX . "_post_extras` (`news_id`, `news_read`, `allow_rate`, `rating`, `vote_num`, `votes`, `view_edit`, `access`, `editdate`, `editor`, `reason`, `user_id`) SELECT `id`, `news_read`, `allow_rate`, `rating`, `vote_num`, `votes`, `view_edit`, `access`, `editdate`, `editor`, `reason`, `user_id` FROM `" . PREFIX . "_post` LEFT JOIN " . PREFIX . "_users ON (" . PREFIX . "_post.autor=" . PREFIX . "_users.name)");
    } 
    if ($db -> error_count) {
        $error_info = "Total queries executed: <b>" . $db -> query_num . "</b> Failed to execute the query: <b>" . $db -> error_count . "</b>. Perhaps they have already been implemented previously.<br /><br /><div class=\"quote\"><b>Following queries cannot execute:</b><br /><br />";
        foreach ($db -> query_list as $value) {
            $error_info .= $value['query'] . "<br /><br />";
        } 
        $error_info .= "</div>";
    } else $error_info = "";
    $_SESSION['step_update'] = 2;
    $sql_info = "<div style=\"background:#F2DDDD;border:1px solid #992A2A;padding:5px;color: #992A2A;text-align: justify;\"><b>Important Information:</b><br /><br />The next step is updating the system must perform heavy xtm request to the news table. On some large sites, the process of this request may take a long time and may not be able to be done with PHP. If the script hangs and the request is made, you will need to run this query manually by via SSH. Copy the query that you will need to do if it will not run automatically:<br/><br/><b>ALTER TABLE `" . PREFIX . "_post` DROP `allow_rate`, DROP `rating`, DROP `vote_num`, DROP `news_read`, DROP `votes`, DROP `access`, DROP `editdate`, DROP `editor`, DROP `reason`, DROP `view_edit`, DROP `flag`</b><br /><br /></div>";
    if ($error_info) {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\">{$error_info}<br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step2\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } else {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\"><br /><br /><div style=\"border: 1px solid #475936; background: #6F8F52; color: #FFFFFF;padding:8px;text-align: justify;\">Query has been executed successfully <b>1 MySQL</b> requests.</div><br /><br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step2\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } 
    die();
} 
if ($_SESSION['step_update'] == 2) {
    $db -> query ("ALTER TABLE `" . PREFIX . "_post` DROP `allow_rate`, DROP `rating`, DROP `vote_num`, DROP `news_read`, DROP `votes`, DROP `access`, DROP `editdate`, DROP `editor`, DROP `reason`, DROP `view_edit`, DROP `flag`");
    if ($db -> error_count) {
        $error_info = "Total queries executed: <b>" . $db -> query_num . "</b> Failed to execute the query: <b>" . $db -> error_count . "</b>. Perhaps they have already been implemented previously.<br /><br /><div class=\"quote\"><b>Following queries cannot execute:</b><br /><br />";
        foreach ($db -> query_list as $value) {
            $error_info .= $value['query'] . "<br /><br />";
        } 
        $error_info .= "</div>";
    } else $error_info = "";
    $_SESSION['step_update'] = 3;
    $sql_info = "<div style=\"background:#F2DDDD;border:1px solid #992A2A;padding:5px;color: #992A2A;text-align: justify;\"><b>Important Information:</b><br /><br />The next step is updating the system must perform heavy xtm request to the news table. On some large sites, the process of this request may take a long time and may not be able to be done with PHP. If the script hangs and the request is made, you will need to run this query manually by via SSH. Copy the query that you will need to do if it will not run automatically:<br/><br/><b>ALTER TABLE `" . PREFIX . "_post` ADD INDEX `fixed` (`fixed`)</b><br /><br /></div>";
    if ($error_info) {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\">{$error_info}<br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step3\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } else {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\"><br /><br /><div style=\"border: 1px solid #475936; background: #6F8F52; color: #FFFFFF;padding:8px;text-align: justify;\">Query has been executed successfully <b>1 MySQL</b> requests.</div><br /><br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step3\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } 
    die();
} 
if ($_SESSION['step_update'] == 3) {
    $db -> query ("ALTER TABLE `" . PREFIX . "_post` ADD INDEX `fixed` (`fixed`)");
    if ($db -> error_count) {
        $error_info = "Total queries executed: <b>" . $db -> query_num . "</b> Failed to execute the query: <b>" . $db -> error_count . "</b>. Perhaps they have already been implemented previously.<br /><br /><div class=\"quote\"><b>Following queries cannot execute:</b><br /><br />";
        foreach ($db -> query_list as $value) {
            $error_info .= $value['query'] . "<br /><br />";
        } 
        $error_info .= "</div>";
    } else $error_info = "";
    $_SESSION['step_update'] = 4;
    $sql_info = "";
    if ($error_info) {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\">{$error_info}<br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step4\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } else {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\"><br /><br /><div style=\"border: 1px solid #475936; background: #6F8F52; color: #FFFFFF;padding:8px;text-align: justify;\">Query has been executed successfully <b>1 MySQL</b> request.</div><br /><br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step4\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } 
    die();
} 
if ($_SESSION['step_update'] == 4) {
    $tableSchema = array();
    $tableSchema[] = "UPDATE " . PREFIX . "_pm SET pm_read='1' WHERE pm_read='yes'";
    $tableSchema[] = "ALTER TABLE `" . PREFIX . "_pm` CHANGE `pm_read` `pm_read` TINYINT(1) NOT NULL DEFAULT '0', ADD `sendid` INT(10) UNSIGNED NOT NULL DEFAULT '0'";
    $tableSchema[] = "ALTER TABLE `" . PREFIX . "_pm` ADD INDEX `pm_read` (`pm_read`)";
    foreach($tableSchema as $table) {
        $db -> query ($table);
    } 
    if ($db -> error_count) {
        $error_info = "Total queries executed: <b>" . $db -> query_num . "</b> Failed to execute the query: <b>" . $db -> error_count . "</b>. Perhaps they have already been implemented previously.<br /><br /><div class=\"quote\"><b>Following queries cannot execute:</b><br /><br />";
        foreach ($db -> query_list as $value) {
            $error_info .= $value['query'] . "<br /><br />";
        } 
        $error_info .= "</div>";
    } else $error_info = "";
    $_SESSION['step_update'] = 5;
    $sql_info = "";
    if ($error_info) {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\">{$error_info}<br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step5\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } else {
        msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\"><br /><br /><div style=\"border: 1px solid #475936; background: #6F8F52; color: #FFFFFF;padding:8px;text-align: justify;\">Query has been executed successfully <b>3 MySQL</b> requests.</div><br /><br />{$sql_info}<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"step5\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
    } 
    die();
} 
if ($_SESSION['step_update'] == 5) {
    $config['version_id'] = "9.6";
    $config['allow_comments_cache'] = "1";
    $handler = fopen(ENGINE_DIR . '/data/config.php', "w") or die("Sorry, but cannot write the data in the file <b>engine/data/config.php</b>, it is not writable.<br />Please check the file permission (CHMOD)!");
    fwrite($handler, "<?PHP \n\n//System Configurations\n\n\$config = array (\n\n");
    foreach($config as $name => $value) {
        fwrite($handler, "'{$name}' => \"{$value}\",\n\n");
    } 
    fwrite($handler, ");\n\n?>");
    fclose($handler);
    $fdir = opendir(ENGINE_DIR . '/cache/system/');
    while ($file = readdir($fdir)) {
        if ($file != '.' and $file != '..' and $file != '.htaccess') {
            @unlink(ENGINE_DIR . '/cache/system/' . $file);
        } 
    } 
    @unlink(ENGINE_DIR . '/data/snap.db');
    clear_cache();
    $_SESSION['step_update'] = false;
    msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\">Updating the database from version <b>9.5</b> to version <b>9.6</b> is successfully completed.<br /><br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"next\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
} 
?>