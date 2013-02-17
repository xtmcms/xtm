<?php
if (!defined('XTMCMS')) {
    die("Hacking attempt!");
}
if ($mod != "editnews") {
    $row['id'] = "";
    $row['autor'] = $member_id['name'];
}
if (!isset ($row['full_story'])) $row['full_story'] = "";
echo <<<HTML
<tr>
	<td valign="top">
	<br />$lang[addnews_full]&nbsp;<br /><span class="navigation">($lang[addnews_alt])</span></td>
	<td><br />
    <textarea id="full_story" name="full_story" class="wysiwygeditor" style="width:98%;height:300px;">{$row['full_story']}</textarea>
</td></tr>
HTML;
?>