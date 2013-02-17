<?php
 if (!defined('E_DEPRECATED')) {
    @error_reporting (E_ALL ^ E_NOTICE);
    @ini_set ('error_reporting', E_ALL ^ E_NOTICE);
} else {
    @error_reporting (E_ALL ^ E_DEPRECATED ^ E_NOTICE);
    @ini_set ('error_reporting', E_ALL ^ E_DEPRECATED ^ E_NOTICE);
} 
@ini_set ('display_errors', true);
@ini_set ('html_errors', false);
$allow_cron = 0;
$max_count_files = 5;
if ($allow_cron) {
    define('XTMCMS', true);
    define('AUTOMODE', true);
    define('LOGGED_IN', true);
    define('ROOT_DIR', dirname (__FILE__));
    define('ENGINE_DIR', ROOT_DIR . '/engine');
    require_once ENGINE_DIR . '/classes/mysql.php';
    require_once ENGINE_DIR . '/data/dbconfig.php';
    require_once ENGINE_DIR . '/data/config.php';
    require_once ENGINE_DIR . '/inc/include/functions.inc.php';
    $cronmode = false;
    if ($_REQUEST['cronmode']) {
        $cronmode = $_REQUEST['cronmode'];
    } elseif (!empty($argc) && $argc > 1) {
        $cronmode = $argv[1];
    } 
    if ($cronmode == "sitemap") {
        $_POST['action'] = "create";
        $_POST['priority'] = "0.5";
        $_POST['stat_priority'] = "0.6";
        $_POST['cat_priority'] = "0.7";
        $_POST['limit'] = 0;
        $member_id = array();
        $user_group = array();
        $member_id['user_group'] = 1;
        $user_group[$member_id['user_group']]['admin_googlemap'] = 1;
        $cat_info = get_vars("category");
        if (! is_array($cat_info)) {
            $cat_info = array ();
            $db -> query("SELECT * FROM " . PREFIX . "_category ORDER BY posi ASC");
            while ($row = $db -> get_row()) {
                $cat_info[$row['id']] = array ();
                foreach ($row as $key => $value) {
                    $cat_info[$row['id']][$key] = stripslashes($value);
                } 
            } 
            set_vars("category", $cat_info);
            $db -> free();
        } 
        if (count($cat_info)) {
            foreach ($cat_info as $key) {
                $cat[$key['id']] = $key['name'];
                $cat_parentid[$key['id']] = $key['parentid'];
            } 
        } 
        include_once ROOT_DIR . '/engine/inc/googlemap.php';
        die ("done");
    } elseif ($cronmode == "optimize") {
        $arr = array();
        $db -> query("SHOW TABLES");
        while ($row = $db -> get_array()) {
            if (substr($row[0], 0, strlen(PREFIX)) == PREFIX) {
                $arr[] = $row[0];
            } 
        } 
        $db -> free();
        reset($arr);
        $tables = "";
        while (list ($key, $val) = each($arr)) {
            $tables .= ", `" . $db -> safesql($val) . "`";
        } 
        $tables = substr($tables, 1);
        $query = "OPTIMIZE TABLE  ";
        $query .= $tables;
        $db -> query($query);
        die ("done");
    } elseif ($cronmode == "antivirus") {
        @include_once ROOT_DIR . '/language/' . $config['langs'] . '/website.lng';
        require_once ENGINE_DIR . '/classes/antivirus.class.php';
        $antivirus = new antivirus();
        $antivirus -> scan_files(ROOT_DIR . "/backup");
        $antivirus -> scan_files(ROOT_DIR . "/engine");
        $antivirus -> scan_files(ROOT_DIR . "/language");
        $antivirus -> scan_files(ROOT_DIR . "/templates");
        $antivirus -> scan_files(ROOT_DIR . "/uploads");
        $antivirus -> scan_files(ROOT_DIR . "/upgrade");
        $antivirus -> scan_files(ROOT_DIR);
        if (count($antivirus -> bad_files)) {
            $found_files = "";
            foreach($antivirus -> bad_files as $idx => $data) {
                if ($data['type']) $type = $lang['anti_modified'];
                else $type = $lang['anti_not'];
                $found_files .= "\n{$data['file_path']} {$type}\n";
            } 
            include_once ENGINE_DIR . '/classes/mail.class.php';
            $mail = new xtm_mail($config);
            $message = $lang['anti_message_1'] . "\n{$found_files}\n{$lang['anti_message_2']}\n\n{$lang['lost_mfg']} " . $config['http_home_url'];
            $mail -> send($config['admin_mail'], $lang['anti_subj'], $message);
        } 
        die ("done");
    } else {
        $files = array();
        if (is_dir(ROOT_DIR . '/backup/') && $handle = opendir(ROOT_DIR . '/backup/')) {
            while (false !== ($file = readdir($handle))) {
                if (preg_match("/^.+?\.sql(\.(gz|bz2))?$/", $file)) {
                    $prefix = explode("_", $file);
                    $prefix = end($prefix);
                    $prefix = explode(".", $prefix);
                    $prefix = reset($prefix);
                    if (strlen($prefix) == 32) $files[] = $file;
                } 
            } 
            closedir($handle);
        } 
        sort($files);
        reset($files);
        if (count($files) >= $max_count_files) {
            @unlink (ROOT_DIR . '/backup/' . $files[0]);
        } 
        $member_id = array();
        $member_id['user_group'] = 1;
        $_REQUEST['action'] = "backup";
        $_POST['comp_method'] = 1;
        include_once ROOT_DIR . '/engine/inc/dumper.php';
        die ("done");
    } 
} 
die ("Cron not allowed");
?>