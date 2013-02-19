<?php
define('XTMCMS', true);
define('ROOT_DIR', '../..');
define('ENGINE_DIR', '..');
error_reporting(7);
ini_set('display_errors', true);
ini_set('html_errors', false);
include ENGINE_DIR . '/data/config.php';
if ($config['http_home_url'] == "") {
    $config['http_home_url'] = explode("lib/editor/emotions.php", $_SERVER['PHP_SELF']);
    $config['http_home_url'] = reset($config['http_home_url']);
    $config['http_home_url'] = "http://" . $_SERVER['HTTP_HOST'] . $config['http_home_url'];
}
$i = 0;
$output = "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr>";
$smilies = explode(",", $config['smilies']);
foreach ($smilies as $smile) {
    $i++;
    $smile = trim($smile);
    $output .= "<td style=\"padding:5px;\" align=\"center\"><a href=\"#\" onClick=\"xtm_smiley(' :$smile: '); return false;\"><img style=\"border: none;\" alt=\"$smile\" src=\"" . $config['http_home_url'] . "lib/data/emoticons/$smile.gif\" /></a></td>";
    if ($i % 5 == 0) $output .= "</tr><tr>";
}
$output .= "</tr></table>";
echo <<<HTML
<HTML>
<HEAD>
	<title>Smiles</title>
	<base target="_self" />
<script language='javascript'>
    function xtm_smiley(finalImage) {
		var obj = parent.oUtil.obj;
        obj.insertHTML(finalImage);
	}
</script>
</HEAD>
<BODY bgcolor="#ededed" topmargin="0" marginheight="0" leftmargin="0" marginwidth="0">
{$output}
</BODY>
</HTML>
HTML;
?>