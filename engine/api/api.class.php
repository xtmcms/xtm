<?php
if (!defined('XTMCMS')) {
    define('XTMCMS', true);
}
if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', substr(dirname(__FILE__), 0, -11));
}
if (!defined('ENGINE_DIR')) {
    define('ENGINE_DIR', ROOT_DIR . '/engine');
}
if (!class_exists('xtm_API')) {
    class xtm_API
    {
        var $db = false;
        var $version = '0.07';
        var $xtm_config = array();
        var $cache_dir = false;
        var $cache_files = array();

        function xtm_API()
        {
            if (!$this->cache_dir) {
                $this->cache_dir = ENGINE_DIR . "/cache/";
            }
            return true;
        }

        function take_user_by_id($id, $select_list = "*")
        {
            $id = intval($id);
            if ($id == 0) return false;
            $row = $this->load_table(USERPREFIX . "_users", $select_list, "user_id = '$id'");
            if (count($row) == 0) return false;
            else return $row;
        }

        function take_user_by_name($name, $select_list = "*")
        {
            $name = $this->db->safesql($name);
            if ($name == '') return false;
            $row = $this->load_table(USERPREFIX . "_users", $select_list, "name = '$name'");
            if (count($row) == 0) return false;
            else return $row;
        }

        function take_user_by_email($email, $select_list = "*")
        {
            $email = $this->db->safesql($email);
            if ($email == '') return false;
            $row = $this->load_table(USERPREFIX . "_users", $select_list, "email = '$email'");
            if (count($row) == 0) return false;
            else return $row;
        }

        function take_users_by_group($group, $select_list = "*", $limit = 0)
        {
            $group = intval($group);
            $data = array();
            if ($group == 0) return false;
            $data = $this->load_table(USERPREFIX . "_users", $select_list, "user_group = '$group'", true, 0, $limit);
            if (count($data) == 0) return false;
            else return $data;
        }

        function take_users_by_ip($ip, $like = false, $select_list = "*", $limit = 0)
        {
            $ip = $this->db->safesql($ip);
            $data = array();
            if ($ip == '') return false;
            if ($like) $condition = "logged_ip like '$ip%'";
            else $condition = "logged_ip = '$ip'";
            $data = $this->load_table(USERPREFIX . "_users", $select_list, $condition, true, 0, $limit);
            if (count($data) == 0) return false;
            else return $data;
        }

        function change_user_name($user_id, $new_name)
        {
            $user_id = intval($user_id);
            $new_name = $this->db->safesql($new_name);
            $count_arr = $this->load_table(USERPREFIX . "_users", "count(user_id) as count", "name = '$new_name'");
            $count = $count_arr['count'];
            if ($count > 0) return false;
            $old_name_arr = $this->load_table(USERPREFIX . "_users", "name", "user_id = '$user_id'");
            $old_name = $old_name_arr['name'];
            $this->db->query("UPDATE " . PREFIX . "_post SET autor='$new_name' WHERE autor='{$old_name}'");
            $this->db->query("UPDATE " . PREFIX . "_comments SET autor='$new_name' WHERE autor='{$old_name}' AND is_register='1'");
            $this->db->query("UPDATE " . USERPREFIX . "_pm SET user_from='$new_name' WHERE user_from='{$old_name}'");
            $this->db->query("UPDATE " . PREFIX . "_vote_result SET name='$new_name' WHERE name='{$old_name}'");
            $this->db->query("UPDATE " . PREFIX . "_images SET author='$new_name' WHERE author='{$old_name}'");
            $this->db->query("update " . USERPREFIX . "_users set name = '$new_name' where user_id = '$user_id'");
            return true;
        }

        function change_user_password($user_id, $new_password)
        {
            $user_id = intval($user_id);
            $new_password = md5(md5($new_password));
            $this->db->query("update " . USERPREFIX . "_users set password = '$new_password' where user_id = '$user_id'");
        }

        function change_user_email($user_id, $new_email)
        {
            $user_id = intval($user_id);
            if ((!preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])' . '(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', $new_email)) or (empty($new_email))) {
                return -2;
            }
            $new_email = $this->db->safesql($new_email);
            $email_exist_arr = $this->load_table(USERPREFIX . "_users", "count(user_id) as count", "email = '$new_email'");
            if ($email_exist_arr['count'] > 0) return -1;
            $q = $this->db->query("update " . USERPREFIX . "_users set email = '$new_email' where user_id = '$user_id'");
            return 1;
        }

        function change_user_group($user_id, $new_group)
        {
            $user_id = intval($user_id);
            $new_group = intval($new_group);
            if ($this->checkGroup($new_group) === false) return false;
            $this->db->query("update " . USERPREFIX . "_users set user_group = '$new_group' where user_id = '$user_id'");
            return true;
        }

        function external_auth($login, $password)
        {
            $login = $this->db->safesql($login);
            $password = md5(md5($password));
            $arr = $this->load_table(USERPREFIX . "_users", "user_id", "name = '$login' AND password = '$password'");
            if (!empty($arr['user_id'])) return true;
            else return false;
        }

        function external_register($login, $password, $email, $group)
        {
            $login = $this->db->safesql($login);
            if (preg_match("/[\||\'|\<|\>|\[|\]|\"|\!|\?|\$|\@|\/|\\\|\&\~\*\{\+]/", $login)) return -1;
            $password = md5(md5($password));
            $not_allow_symbol = array("\x22", "\x60", "\t", '\n', '\r', "\n", "\r", '\\', ",", "/", "¬", "#", ";", ":", "~", "[", "]", "{", "}", ")", "(", "*", "^", "%", "$", "<", ">", "?", "!", '"', "'", " ");
            $email = $db->safesql(trim(str_replace($not_allow_symbol, '', strip_tags(stripslashes($email)))));
            $group = intval($group);
            $login_exist_arr = $this->load_table(USERPREFIX . "_users", "count(user_id) as count", "name = '$login'");
            if ($login_exist_arr['count'] > 0) return -1;
            $email_exist_arr = $this->load_table(USERPREFIX . "_users", "count(user_id) as count", "email = '$email'");
            if ($email_exist_arr['count'] > 0) return -2;
            if (empty($email) OR strlen($email) > 50 OR @count(explode("@", $email)) != 2) {
                return -3;
            }
            if ($this->checkGroup($group) === false) return -4;
            $now = time();
            $q = $this->db->query("insert into " . USERPREFIX . "_users (email, password, name, user_group, reg_date) VALUES ('$email', '$password', '$login', '$group', '$now')");
            return 1;
        }

        function send_pm_to_user($user_id, $subject, $text, $from)
        {
            $user_id = intval($user_id);
            $count_arr = $this->load_table(USERPREFIX . "_users", "count(user_id) as count", "user_id = '$user_id'");
            if ($count_arr['count'] == 0) return -1;
            $subject = $this->db->safesql($subject);
            $text = $this->db->safesql($text);
            $from = $this->db->safesql($from);
            $now = time();
            $q = $this->db->query("insert into " . PREFIX . "_pm (subj, text, user, user_from, date, pm_read, folder) VALUES ('$subject', '$text', '$user_id', '$from', '$now', '0', 'inbox')");
            if (!$q) return 0;
            $this->db->query("update " . USERPREFIX . "_users set pm_unread = pm_unread + 1, pm_all = pm_all+1  where user_id = '$user_id'");
            return 1;
        }

        function load_table($table, $fields = "*", $where = '1', $multirow = false, $start = 0, $limit = 0, $sort = '', $sort_order = 'desc')
        {
            if (!$table) return false;
            if ($sort != '') $where .= ' order by ' . $sort . ' ' . $sort_order;
            if ($limit > 0) $where .= ' limit ' . $start . ',' . $limit;
            $q = $this->db->query("Select " . $fields . " from " . $table . " where " . $where);
            if ($multirow) {
                while ($row = $this->db->get_row()) {
                    $values[] = $row;
                }
            } else {
                $values = $this->db->get_row();
            }
            if (count($values) > 0) return $values;
            return false;
        }

        function save_to_cache($fname, $vars)
        {
            $filename = $fname . ".tmp";
            $f = @fopen($this->cache_dir . $filename, "w+");
            @chmod('0777', $this->cache_dir . $filename);
            if (is_array($vars)) $vars = serialize($vars);
            @fwrite($f, $vars);
            @fclose($f);
            return $vars;
        }

        function load_from_cache($fname, $timeout = 300, $type = 'text')
        {
            $filename = $fname . ".tmp";
            if (!file_exists($this->cache_dir . $filename)) return false;
            if ((filemtime($this->cache_dir . $filename)) < (time() - $timeout)) return false;
            if ($type == 'text') {
                return file_get_contents($this->cache_dir . $filename);
            } else {
                return unserialize(file_get_contents($this->cache_dir . $filename));
            }
        }

        function clean_cache($name = "GLOBAL")
        {
            $this->get_cached_files();
            if ($name == "GLOBAL") {
                foreach ($this->cache_files as $cached_file) {
                    @unlink($this->cache_dir . $cached_file);
                }
            } elseif (in_array($name . ".tmp", $this->cache_files)) {
                @unlink($this->cache_dir . $name . ".tmp");
            }
        }

        function get_cached_files()
        {
            $handle = opendir($this->cache_dir);
            while (($file = readdir($handle)) !== false) {
                if ($file != '.' && $file != '..' && (!is_dir($this->cache_dir . $file) && $file != '.htaccess')) {
                    $this->cache_files [] = $file;
                }
            }
            closedir($handle);
        }

        function edit_config($key, $new_value = '')
        {
            $find[] = "'\r'";
            $replace[] = "";
            $find[] = "'\n'";
            $replace[] = "";
            $config = $this->xtm_config;
            if (is_array($key)) {
                foreach ($key as $ckey => $cvalue) {
                    if ($config[$ckey]) {
                        $config[$ckey] = $cvalue;
                    }
                }
            } else {
                if ($config[$key]) {
                    $config[$key] = $new_value;
                }
            }
            $handle = @fopen(ENGINE_DIR . '/data/config.php', 'w');
            fwrite($handle, "<?PHP \n\n//System Configurations\n\n\$config = array (\n\n");
            foreach ($config as $name => $value) {
                if ($name != "offline_reason") {
                    $value = trim(stripslashes($value));
                    $value = htmlspecialchars($value);
                    $value = preg_replace($find, $replace, $value);
                    $name = trim(stripslashes($name));
                    $name = htmlspecialchars($name, ENT_QUOTES);
                    $name = preg_replace($find, $replace, $name);
                }
                $value = str_replace("$", "&#036;", $value);
                $value = str_replace("{", "&#123;", $value);
                $value = str_replace("}", "&#125;", $value);
                $name = str_replace("$", "&#036;", $name);
                $name = str_replace("{", "&#123;", $name);
                $name = str_replace("}", "&#125;", $name);
                fwrite($handle, "'{$name}' => \"{$value}\",\n\n");
            }
            fwrite($handle, ");\n\n?>");
            fclose($handle);
            $this->clean_cache();
        }

        function take_news($cat, $fields = "*", $start = 0, $limit = 10, $sort = 'id', $sort_order = 'desc')
        {
            if ($this->xtm_config['allow_multi_category'] == 1) {
                $condition = 'category regexp "[[:<:]](' . str_replace(',', '|', $cat) . ')[[:>:]]"';
            } else {
                $condition = 'category IN (' . $cat . ')';
            }
            return $this->load_table(PREFIX . "_post", $fields, $condition, $multirow = true, $start, $limit, $sort, $sort_order);
        }

        function checkGroup($group)
        {
            $row = $this->db->super_query('SELECT group_name FROM ' . USERPREFIX . '_usergroups WHERE id = ' . intval($group));
            return isset($row['group_name']);
        }

        function install_admin_module($name, $title, $descr, $icon, $perm = '1')
        {
            $name = $this->db->safesql($name);
            $title = $this->db->safesql($title);
            $descr = $this->db->safesql($descr);
            $icon = $this->db->safesql($icon);
            $perm = $this->db->safesql($perm);
            $this->db->query("Select name from `" . PREFIX . "_admin_sections` where name = '$name'");
            if ($this->db->num_rows() > 0) {
                $this->db->query("UPDATE `" . PREFIX . "_admin_sections` set title = '$title', descr = '$descr', icon = '$icon', allow_groups = '$perm' where name = '$name'");
                return true;
            } else {
                $this->db->query("INSERT INTO `" . PREFIX . "_admin_sections` (`name`, `title`, `descr`, `icon`, `allow_groups`) VALUES ('$name', '$title', '$descr', '$icon', '$perm')");
                return true;
            }
            return false;
        }

        function uninstall_admin_module($name)
        {
            $name = $this->db->safesql($name);
            $this->db->query("DELETE FROM `" . PREFIX . "_admin_sections` where name = '$name'");
        }

        function change_admin_module_perms($name, $perm)
        {
            $name = $this->db->safesql($name);
            $perm = $this->db->safesql($perm);
            $this->db->query("UPDATE `" . PREFIX . "_admin_sections` set allow_groups = '$perm' where name = '$name'");
        }
    }
}
$xtm_api = new xtm_API ();
if (!$config['version_id']) include_once (ENGINE_DIR . '/data/config.php');
$xtm_api->xtm_config = $config;
if (!isset($db)) {
    include_once (ENGINE_DIR . '/classes/mysql.php');
    include_once (ENGINE_DIR . '/data/dbconfig.php');
}
$xtm_api->db = $db;
?>