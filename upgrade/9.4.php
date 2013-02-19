<?php
 if (! defined('XTMCMS')) {
    die("Hacking attempt!");
} 
$config['version_id'] = "9.5";
$config['smtp_helo'] = "HELO";
$config['news_future'] = "0";
$config['cache_type'] = "0";
$config['memcache_server'] = "localhost:11211";
$tableSchema = array();
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_static` ADD `sitemap` TINYINT(1) NOT NULL DEFAULT '1'";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_usergroups` ADD `max_comment_day` SMALLINT(6) NOT NULL DEFAULT '0'";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_usergroups` ADD `max_images` SMALLINT(6) NOT NULL DEFAULT '0'";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_usergroups` ADD `max_files` SMALLINT(6) NOT NULL DEFAULT '0'";
foreach($tableSchema as $table) {
    $db -> query ($table);
} 
$handler = fopen(ENGINE_DIR . '/data/config.php', "w") or die("Sorry, but cannot write the data in the file <b>lib/data/config.php</b>, it is not writable.<br />Please check the file permission (CHMOD)!");
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
if ($db -> error_count) {
    $error_info = "Total queries executed: <b>" . $db -> query_num . "</b> Failed to execute the query: <b>" . $db -> error_count . "</b>. Perhaps they have already been implemented previously.<br /><br /><div class=\"quote\"><b>Following queries cannot execute:</b><br /><br />";
    foreach ($db -> query_list as $value) {
        $error_info .= $value['query'] . "<br /><br />";
    } 
    $error_info .= "</div>";
} else $error_info = "";
msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\">Upgrading database from version <b>9.4</b> to version <b>9.5</b> is  successfully completed.<br />{$error_info}<br />Click \"Next\" to continue<br /><br /><input type=\"hidden\" name=\"next\" value=\"next\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
?>