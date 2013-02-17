<?php

if( ! defined( 'XTMCMS' ) ) {
	die( "Hacking attempt!" );
}

$config['version_id'] = "9.8";
$config['allow_share'] = "1";
$config['auth_domain'] = "1";

$tableSchema = array();

$tableSchema[] = "ALTER TABLE `" . PREFIX . "_vote` ADD `grouplevel` VARCHAR(250) NOT NULL DEFAULT 'all'";

foreach($tableSchema as $table) {
	$db->query ($table);
}
$handler = fopen(ENGINE_DIR . '/data/config.php', "w") or die("Sorry, but cannot write the data in the file <b>engine/data/config.php</b>, it is not writable.<br />Please check the file permission (CHMOD)!");

fwrite($handler, "<?PHP \n\n//System Configurations\n\n\$config = array (\n\n");
foreach($config as $name => $value)
{
	fwrite($handler, "'{$name}' => \"{$value}\",\n\n");
}
fwrite($handler, ");\n\n?>");
fclose($handler);


$fdir = opendir( ENGINE_DIR . '/cache/system/' );
while ( $file = readdir( $fdir ) ) {
	if( $file != '.' and $file != '..' and $file != '.htaccess' ) {
		@unlink( ENGINE_DIR . '/cache/system/' . $file );
		
	}
}

@unlink(ENGINE_DIR.'/data/snap.db');

clear_cache();

if ($db->error_count) {
    $error_info = "All scheduled queries: <b>" . $db -> query_num . "</b> Failed to execute queries: <b>" . $db -> error_count . "</b>. Perhaps they have already performed earlier.<br /><br /><div class=\"quote\"><b>List of failed queries:</b><br /><br />";

	foreach ($db->query_list as $value) {

		$error_info .= $value['query']."<br /><br />";

	}

	$error_info .= "</div>";

} else $error_info = "";
msgbox("info", "Information", "<form action=\"index.php\" method=\"GET\">Updating the database from version <b>9.7</b> to version <b>9.8</b> is successfully completed.<br />{$error_info}<br />Click Next to continue the script upgrade process<br /><br /><input type=\"hidden\" name=\"next\" value=\"next\"><input class=\"edit\" type=\"submit\" value=\"Next ...\"></form>");
?>