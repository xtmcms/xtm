<?php
class antivirus
{
    var $bad_files = array();
    var $snap_files = array();
    var $track_files = array();
    var $snap = false;
    var $checked_folders = array();
    var $dir_split = '/';
    var $cache_files = array("./lib/cache/system/usergroup.php", "./lib/cache/system/category.php", "./lib/cache/system/vote.php", "./lib/cache/system/banners.php", "./lib/cache/system/banned.php", "./lib/cache/system/cron.php", "./lib/cache/system/informers.php", "./lib/data/config.php", "./lib/data/videoconfig.php", "./lib/data/wordfilter.db.php",);
    var $good_files = array("./.htaccess", "./backup/.htaccess", "./lib/cache/.htaccess", "./lib/cache/system/.htaccess", "./lib/data/.htaccess", "./lib/data/emoticons/.htaccess", "./language/.htaccess", "./uploads/files/.htaccess", "./uploads/.htaccess", "./lib/modules/fonts/.htaccess", "./lib/ajax/vote.php", "./lib/ajax/feedback.php", "./lib/ajax/sitemap.php", "./lib/ajax/templates.php", "./lib/ajax/find_relates.php", "./lib/ajax/deletecomments.php", "./lib/ajax/calendar.php", "./lib/ajax/editcomments.php", "./lib/ajax/editnews.php", "./lib/ajax/favorites.php", "./lib/ajax/newsletter.php", "./lib/ajax/rating.php", "./lib/ajax/registration.php", "./lib/ajax/addcomments.php", "./lib/ajax/antivirus.php", "./lib/ajax/updates.php", "./lib/ajax/clean.php", "./lib/ajax/poll.php", "./lib/ajax/rss.php", "./lib/ajax/keywords.php", "./lib/ajax/pm.php", "./lib/ajax/bbcode.php", "./lib/ajax/upload.php", "./lib/ajax/typograf.php", "./lib/ajax/profile.php", "./lib/ajax/find_tags.php", "./lib/ajax/search.php", "./lib/ajax/message.php", "./lib/ajax/adminfunction.php", "./lib/ajax/allvotes.php", "./lib/ajax/rebuild.php", "./lib/ajax/complaint.php", "./lib/ajax/comments.php", "./lib/cache/system/usergroup.php", "./lib/cache/system/category.php", "./lib/cache/system/vote.php", "./lib/cache/system/banners.php", "./lib/cache/system/banned.php", "./lib/cache/system/cron.php", "./lib/cache/system/informers.php", "./lib/data/config.php", "./lib/data/videoconfig.php", "./lib/data/dbconfig.php", "./lib/data/wordfilter.db.php", "./lib/skins/default.skin.php", "./lib/editor/fullnews.php", "./lib/editor/fullsite.php", "./lib/editor/newsletter.php", "./lib/editor/shortnews.php", "./lib/editor/shortsite.php", "./lib/editor/comments.php", "./lib/editor/static.php", "./lib/editor/emotions.php", "./lib/editor/jscripts/tiny_mce/tiny_mce_gzip.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/rpc.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/includes/general.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/config.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/classes/EnchantSpell.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/classes/utils/Logger.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/classes/utils/JSON.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/classes/SpellChecker.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/classes/PSpellShell.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/classes/PSpell.php", "./lib/editor/jscripts/tiny_mce/plugins/spellchecker/classes/GoogleSpell.php", "./lib/editor/jscripts/tiny_mce/plugins/emotions/emotions.php", "./lib/editor/jscripts/tiny_mce/plugins/typograf/handler.php", "./lib/editor/jscripts/tiny_mce/plugins/typograf/typographus.php", "./lib/classes/typograf.class.php", "./lib/classes/min/config.php", "./lib/classes/min/lib/JSMin.php", "./lib/classes/min/lib/Solar/Dir.php", "./lib/classes/min/lib/JSMinPlus.php", "./lib/classes/min/lib/Minify/Lines.php", "./lib/classes/min/lib/Minify/Cache/Memcache.php", "./lib/classes/min/lib/Minify/Cache/APC.php", "./lib/classes/min/lib/Minify/Cache/File.php", "./lib/classes/min/lib/Minify/Logger.php", "./lib/classes/min/lib/Minify/Packer.php", "./lib/classes/min/lib/Minify/CSS.php", "./lib/classes/min/lib/Minify/Controller/Groups.php", "./lib/classes/min/lib/Minify/Controller/Page.php", "./lib/classes/min/lib/Minify/Controller/Base.php", "./lib/classes/min/lib/Minify/Controller/MinApp.php", "./lib/classes/min/lib/Minify/Controller/Files.php", "./lib/classes/min/lib/Minify/Controller/Version1.php", "./lib/classes/min/lib/Minify/Build.php", "./lib/classes/min/lib/Minify/YUICompressor.php", "./lib/classes/min/lib/Minify/Source.php", "./lib/classes/min/lib/Minify/CommentPreserver.php", "./lib/classes/min/lib/Minify/ImportProcessor.php", "./lib/classes/min/lib/Minify/CSS/Compressor.php", "./lib/classes/min/lib/Minify/CSS/UriRewriter.php", "./lib/classes/min/lib/Minify/HTML.php", "./lib/classes/min/lib/FirePHP.php", "./lib/classes/min/lib/HTTP/Encoder.php", "./lib/classes/min/lib/HTTP/ConditionalGet.php", "./lib/classes/min/lib/MrClay/Cli/Arg.php", "./lib/classes/min/lib/MrClay/Cli.php", "./lib/classes/min/lib/Minify/JS/ClosureCompiler.php", "./lib/classes/min/lib/Minify/Cache/ZendPlatform.php", "./lib/classes/min/lib/Minify/YUI/CssCompressor.php", "./lib/classes/min/lib/Minify/HTML/Helper.php", "./lib/classes/min/lib/Minify/DebugDetector.php", "./lib/classes/min/lib/Minify.php", "./lib/classes/min/index.php", "./lib/classes/min/groupsConfig.php", "./lib/modules/vote.php", "./lib/modules/addnews.php", "./lib/modules/antibot.php", "./lib/modules/banned.php", "./lib/modules/bbcode.php", "./lib/modules/calendar.php", "./lib/modules/comments.php", "./lib/modules/favorites.php", "./lib/modules/feedback.php", "./lib/modules/functions.php", "./lib/modules/gzip.php", "./lib/modules/lastcomments.php", "./lib/modules/lostpassword.php", "./lib/modules/offline.php", "./lib/modules/pm.php", "./lib/modules/pm_alert.php", "./lib/modules/profile.php", "./lib/modules/register.php", "./lib/modules/search.php", "./lib/modules/show.custom.php", "./lib/modules/show.full.php", "./lib/modules/show.short.php", "./lib/modules/sitelogin.php", "./lib/modules/static.php", "./lib/modules/stats.php", "./lib/modules/topnews.php", "./lib/modules/addcomments.php", "./lib/modules/poll.php", "./lib/modules/cron.php", "./lib/modules/banners.php", "./lib/modules/rssinform.php", "./lib/modules/deletenews.php", "./lib/modules/tagscloud.php", "./lib/modules/changemail.php", "./lib/api/api.class.php", "./lib/inc/iptools.php", "./lib/classes/mysql.class.php", "./lib/classes/mysqli.class.php", "./lib/classes/mail.class.php", "./lib/inc/mass_user_actions.php", "./lib/inc/addvote.php", "./lib/inc/blockip.php", "./lib/inc/categories.php", "./lib/inc/dboption.php", "./lib/inc/dumper.php", "./lib/inc/editnews.php", "./lib/inc/editusers.php", "./lib/inc/editvote.php", "./lib/inc/email.php", "./lib/inc/files.php", "./lib/inc/include/functions.inc.php", "./lib/inc/help.php", "./lib/inc/include/inserttag.php", "./lib/inc/main.php", "./lib/inc/videoconfig.php", "./lib/inc/tagscloud.php", "./lib/inc/complaint.php", "./lib/classes/thumb.class.php", "./lib/classes/comments.class.php", "./lib/classes/antivirus.class.php", "./lib/classes/uploads/upload.class.php", "./lib/inc/massactions.php", "./lib/classes/mysql.php", "./lib/inc/newsletter.php", "./lib/inc/options.php", "./lib/classes/parse.class.php", "./lib/inc/preview.php", "./lib/inc/static.php", "./lib/classes/templates.class.php", "./lib/inc/templates.php", "./lib/inc/userfields.php", "./lib/inc/usergroup.php", "./lib/inc/wordfilter.php", "./lib/inc/xfields.php", "./lib/inc/addnews.php", "./lib/inc/comments.php", "./lib/inc/banners.php", "./lib/inc/clean.php", "./lib/inc/rss.php", "./lib/inc/question.php", "./lib/inc/mass_static_actions.php", "./lib/inc/include/init.php", "./lib/classes/rss.class.php", "./lib/classes/recaptcha.php", "./lib/inc/search.php", "./lib/classes/download.class.php", "./lib/inc/cmoderation.php", "./lib/inc/rssinform.php", "./lib/inc/rebuild.php", "./lib/inc/logs.php", "./lib/classes/google.class.php", "./lib/inc/googlemap.php", "./lib/inc/check.php", "./lib/preview.php", "./lib/init.php", "./lib/opensearch.php", "./lib/lib.php", "./lib/print.php", "./lib/rss.php", "./lib/download.php", "./lib/go.php", "./index.php", "./cron.php",);

    function antivirus()
    {
        global $config;
        if (@file_exists(ENGINE_DIR . '/data/snap.db')) {
            $filecontents = file(ENGINE_DIR . '/data/snap.db');
            foreach ($filecontents as $name => $value) {
                $filecontents[$name] = explode("|", trim($value));
                $this->track_files[$filecontents[$name][0]] = $filecontents[$name][1];
            }
            $this->snap = true;
        }
        $this->good_files[] = "./{$config['admin_path']}";
    }

    function scan_files($dir, $snap = false, $access = false)
    {
        $this->checked_folders[] = $dir . $this->dir_split . $file;
        if ($dh = @opendir($dir)) {
            while (false !== ($file = readdir($dh))) {
                if ($file == '.' or $file == '..' or $file == '.svn' or $file == '.DS_store') {
                    continue;
                }
                if (is_dir($dir . $this->dir_split . $file)) {
                    if ($dir != ROOT_DIR) $this->scan_files($dir . $this->dir_split . $file, $snap, $access);
                } else {
                    if ($this->snap OR $snap) $templates = "|tpl|js|lng|htaccess";
                    elseif ($access) $templates = "|htaccess"; else $templates = "";
                    if (preg_match("#.*\.(php|cgi|pl|perl|php3|php4|php5|php6" . $templates . ")#i", $file)) {
                        $folder = str_replace(ROOT_DIR, ".", $dir);
                        $file_size = filesize($dir . $this->dir_split . $file);
                        $file_crc = md5_file($dir . $this->dir_split . $file);
                        $file_date = date("d.m.Y H:i:s", filectime($dir . $this->dir_split . $file));
                        if ($snap) {
                            $this->snap_files[] = array('file_path' => $folder . $this->dir_split . $file, 'file_crc' => $file_crc);
                        } else {
                            if ($this->snap) {
                                $contin = false;
                                if ($folder == "./lib/cache/system" AND strpos($file, "minify_") === 0 AND preg_match("#.*\.(js)#i", $file)) $contin = true;
                                if ($this->track_files[$folder . $this->dir_split . $file] != $file_crc AND !in_array($folder . $this->dir_split . $file, $this->cache_files) AND !$contin) $this->bad_files[] = array('file_path' => $folder . $this->dir_split . $file, 'file_name' => $file, 'file_date' => $file_date, 'type' => 1, 'file_size' => $file_size);
                            } else {
                                if (!in_array($folder . $this->dir_split . $file, $this->good_files)) $this->bad_files[] = array('file_path' => $folder . $this->dir_split . $file, 'file_name' => $file, 'file_date' => $file_date, 'type' => 0, 'file_size' => $file_size);
                            }
                        }
                    }
                }
            }
        }
    }
}

?>