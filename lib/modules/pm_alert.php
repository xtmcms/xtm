<?php
if (!defined('XTMCMS')) {
    die("Hacking attempt!");
}
$row = $db->super_query("SELECT subj, text, user_from FROM " . USERPREFIX . "_pm WHERE user = '$member_id[user_id]' AND folder = 'inbox' ORDER BY pm_read ASC, date DESC LIMIT 0,1");
$lang['pm_alert'] = str_replace("{user}", $member_id['name'], str_replace("{num}", intval($member_id['pm_unread']), $lang['pm_alert']));
$row['subj'] = xtm_substr(stripslashes($row['subj']), 0, 45, $config['charset']) . " ...";
$row['text'] = str_replace("<br />", " ", $row['text']);
$row['text'] = xtm_substr(strip_tags(stripslashes($row['text'])), 0, 340, $config['charset']) . " ...";
$pm_alert = <<<HTML
<div id="newpm" title="{$lang['pm_atitle']}" style="display:none;" ><br />{$lang['pm_alert']}
<br /><br />
{$lang['pm_asub']} <b>{$row['subj']}</b><br />
{$lang['pm_from']} <b>{$row['user_from']}</b><br /><br /><i>{$row['text']}</i></div>
<script type="text/javascript">    
$(function(){

    $('#newpm').dialog({
		autoOpen: true,
		show: 'fade',
		hide: 'fade',
		width: 450,
		height: 270,
		buttons: {
			"{$lang['pm_close']}" : function() { 
				$(this).dialog("close");						
			}, 
			"{$lang['pm_aread']}": function() {
				document.location='{$PHP_SELF}?do=pm';			
			}
		}
	});
});
</script>
HTML;
?>