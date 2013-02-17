<?php
 session_start();
@error_reporting (E_ALL ^ E_WARNING ^ E_NOTICE);
@ini_set ('display_errors', true);
@ini_set ('html_errors', false);
@ini_set ('error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE);
define('XTMCMS', true);
define('ROOT_DIR', dirname (__FILE__));
define('ENGINE_DIR', ROOT_DIR . '/engine');
$config['charset'] = "utf-8";
require_once(ROOT_DIR . '/language/Chinese/adminpanel.lng');
require_once(ENGINE_DIR . '/inc/include/functions.inc.php');
require_once(ENGINE_DIR . '/skins/default.skin.php');
extract($_REQUEST, EXTR_SKIP);
if ($_REQUEST['action'] == "eula") {
    if (!$_SESSION['xtm_install']) msg("", "错误", "程序安装过程存在问题，请先点击下面链接重新开始安装程序: <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>");
    echoheader("", "");
    echo <<<HTML
<form id="check-eula" method="post" action="">
<script language='javascript'>
check_eula = function()
{
	if( document.getElementById( 'eula' ).checked == true )
	{
		return true;
	}
	else
	{
		alert( '在安装进行之前，您必须接受本系统的许可协议。' );
		return false;
	}
}
document.getElementById( 'check-eula' ).onsubmit = check_eula;
</script>
<div style="padding-top:5px;">
<table width="100%">
    <tr>
        <td width="4"><img src="engine/skins/images/tl_lo.gif" width="4" height="4" border="0"></td>
        <td background="engine/skins/images/tl_oo.gif"><img src="engine/skins/images/tl_oo.gif" width="1" height="4" border="0"></td>
        <td width="6"><img src="engine/skins/images/tl_ro.gif" width="6" height="4" border="0"></td>
    </tr>
    <tr>
        <td background="engine/skins/images/tl_lb.gif"><img src="engine/skins/images/tl_lb.gif" width="4" height="1" border="0"></td>
        <td style="padding:5px;" bgcolor="#FFFFFF">
<table width="100%">
    <tr>
        <td bgcolor="#EFEFEF" height="29" style="padding-left:10px;"><div class="navigation">授权许可协议</div></td>
    </tr>
</table>
<div class="unterline"></div>
<table width="100%">
    <tr>
        <td style="padding:2px;">请仔细阅读并接受Datalife Engine系统的使用条款。<br /><br /><div style="height: 300px; border: 1px solid #76774C; background-color: #FDFDD3; padding: 5px; overflow: auto;"><b>最终用户许可协议</b><br /><br /><b>许可协议标的</b><br /><br />本协议的标的即为一则有权使用<b>Datalife Engine</b>的许可副本的条款及条件载于本协议。<br /><br /><b>内容达成协议</b><br /><br />标准权限的用户，您的程序许可副本的有效期为建立程序后的 <b>一年</b> 时间。一旦过期且您不打算更新许可副本，您仍具有本版本的所有操作权限，但是将不再享有我们的技术支持、版本更新（关键及安全性更新除外）等服务。<br /><br />对于标准权限的用户，在许可副本有效期间，我们仅提供标准服务：提供软件的更新信息发布，持续研发新版本并允许您免费更新，不断修复程序bug并提供关键及安全更新。除此之外，我们不提供更多的技术支持。如果您需要更多的技术支持，可以购买我们的高级服务或者对系统的更新和研发提供一定的支持。<br /><br />我们保留公布系统选择的用户名单的权利。 我们保留在任何时间更改本合同的条款的权利，但这并不具有追溯效力。本合同的更改将被发送给用户注册时指定的电子邮件地址。<br /><br /><b>使用限制</b><br /><br />购买 <b>Datalife Engine</b> 系统,您并不具有本系统的版权，而是<b>使用权</b>。系统只能运用到一个站点（一级域名及子域名或二级域名），且这个站点完全属于您或者您的客户端。当您打算使用本系统建立新的站点时，您必须重新购买许可副本。系统不能用于二次销售给第三方，并且如果您已经在客户端建立了本系统，您必须遵循本协议并告知您的用户。如果您购买了本系统的许可副本，但不是自用，而是为您的客户安装，我们不对您的客户提供任何技术支持。<br /><br /><b>权利和义务的当事人</b><br /><br /><b>购买者权利::</b><ul><li>根据您的网站的设计和代码的结构的需要更改代码。</li><li>制作和分发有关教程说明如何设置您的模板和语言文件的修改，这将为您修改源代码提供方向。 基于您自己对系统代码做出的修改，且不属于本系统的部分，归您所有。</li><li>基于本系统的自建模块归原创作者所有。</li><li>如果希望将站点转移到其他站点，请事先通知我们，并在原站点清除程序，否则许可副本将暂时失效。</li></ul><br /><b>购买不具备的权利:</b><ul><li>向第三方二次销售本程序</li><li>基于本系代码或统架构开发相关产品</li><li>基于我们的系统代码开发自己的独立产品</li><li>将一个许可副本运用到多个站点(包括二级目录或子域名)</li><li>刊登广告，出售或在其网站上发布我们的盗版系统</li><li>发布或促销Datalife Engine的未授权版本或盗版</li><li>破解系统并使其可以通过许可验证</li></ul><b>担保限制</b><br /><br />我们声明，<b>Datalife Engine</b>已经内置了安全验证机制，并且我们也在尽最大可能的完善其安全体制，所以除非您对站点结构非常熟悉，建议您不要擅自更改系统。我们的保证和技术支持不负责对系统代码，风格，语言包等部分的擅自更改或添加第三方代码造成的后果。如果您在系统内加入了第三方代码，我们甚至有可能拒绝对您提供技术支持。您应该注意到，<b>Datalife Engine</b>系统是基于许可副本授权的，所有不能退换许可副本。<br /><br /><b>知识产权</b><br /><br /><b>Datalife Engine</b>, 包括其中的任何代码版权归 <b>Datalife Engine</b>所有, 除非组件系统使用了不同类型的许可证。同时本系统受版权法律保护。任何基于本程序开发的原创内容及相关权利归原作者所有并受法律保护。Datalife Engine并不对系统用户站点的内容负责。<br /><br /><b>合同义务提前终止</b><br /><br />如果您不同意合同的内容，本合同将自动终止。如果违反了EULA相关内容，本许可协议可以由我们单方面终止。对于提前终止服务的情况，您将同意在3周内删除站点的所有内容。</div>
		<input type='checkbox' name='eula' id='eula'><b>我同意</b>
		<br />
</td>
    </tr>
    <tr>
        <td style="padding:2px;"><input type=hidden name=action value="function_check"><input class=buttons type=submit value=" 下一步 >> "></td>
    </tr>
</table>
</td>
        <td background="engine/skins/images/tl_rb.gif"><img src="engine/skins/images/tl_rb.gif" width="6" height="1" border="0"></td>
    </tr>
    <tr>
        <td><img src="engine/skins/images/tl_lu.gif" width="4" height="6" border="0"></td>
        <td background="engine/skins/images/tl_ub.gif"><img src="engine/skins/images/tl_ub.gif" width="1" height="6" border="0"></td>
        <td><img src="engine/skins/images/tl_ru.gif" width="6" height="6" border="0"></td>
    </tr>
</table>
</div></form>
HTML;
    } elseif ($_REQUEST['action'] == "function_check") {
    if (!$_SESSION['xtm_install']) msg("", "错误", "程序安装过程存在问题，请先点击下面链接重新开始安装程序: <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>");
    echoheader("", "");
    echo <<<HTML
<form method="post" action="">
<div style="padding-top:5px;">
<table width="100%">
    <tr>
        <td width="4"><img src="engine/skins/images/tl_lo.gif" width="4" height="4" border="0"></td>
        <td background="engine/skins/images/tl_oo.gif"><img src="engine/skins/images/tl_oo.gif" width="1" height="4" border="0"></td>
        <td width="6"><img src="engine/skins/images/tl_ro.gif" width="6" height="4" border="0"></td>
    </tr>
    <tr>
        <td background="engine/skins/images/tl_lb.gif"><img src="engine/skins/images/tl_lb.gif" width="4" height="1" border="0"></td>
        <td style="padding:5px;" bgcolor="#FFFFFF">
<table width="100%">
    <tr>
        <td bgcolor="#EFEFEF" height="29" style="padding-left:10px;"><div class="navigation">检查PHP安装的组件</div></td>
    </tr>
</table>
<div class="unterline"></div>
<table width="100%">
HTML;
    echo"<tr>
<td height=\"25\" width=\"250\">&nbsp;脚本的最低要求
<td height=\"25\" colspan=2>&nbsp;当前的配置
<tr><td colspan=3><div class=\"hr_line\"></div></td></tr>";
    $status = phpversion() < '5.1' ? '<font color=red><b>否</b></font>' : '<font color=green><b>是</b></font>';
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;PHP版本 5.1及以上</td>
         <td>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = function_exists('mysql_connect') ? '<font color=green><b>是</b></font>' : '<font color=red><b>否</b></font>';;
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;MySQL 支持</td>
         <td colspan=2>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = extension_loaded('zlib') ? '<font color=green><b>是</b></font>' : '<font color=red><b>否</b></font>';
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;ZLib 压缩支持</td>
         <td colspan=2>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = extension_loaded('xml') ? '<font color=green><b>是</b></font>' : '<font color=red><b>否</b></font>';
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;XML 支持</td>
         <td colspan=2>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = function_exists('iconv') ? '<font color=green><b>是</b></font>' : '<font color=red><b>否</b></font>';;
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;Iconv 支持</td>
         <td colspan=2>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    echo"<tr>
         <td colspan=3 class=\"navigation\"><br />如果以上任何条目出现红色标记，请按以下步骤来纠正其状态。因为有可能存在因系统操作原因出现低于脚本最低配置的情况。<br /><br /></td>
         </tr>";
    echo"<tr><td colspan=3><div class=\"hr_line\"></div></td></tr><tr>
<td height=\"25\">&nbsp;建议的设置
<td height=\"25\" width=\"200\">&nbsp;建议的配置
<td height=\"25\">&nbsp;当前配置
<tr><td colspan=3><div class=\"hr_line\"></div></td></tr>";
    $status = ini_get('safe_mode') ? '<font color=red><b>开启</b></font>' : '<font color=green><b>关闭</b></font>';;
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;安全模式（Safe Mode）</td>
         <td>&nbsp;关闭</td>
         <td>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = function_exists('mysqli_connect') ? '<font color=green><b>是</b></font>' : '<font color=red><b>否</b></font>';;
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;MySQLi 支持</td>
         <td>&nbsp;是</td>
         <td>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = ini_get('file_uploads') ? '<font color=green><b>开启</b></font>' : '<font color=red><b>关闭</b></font>';;
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;文件上传</td>
         <td>&nbsp;开启</td>
         <td>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = ini_get('output_buffering') ? '<font color=red><b>开启</b></font>' : '<font color=green><b>关闭</b></font>';;
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;输出缓冲(Output Buffering)</td>
         <td>&nbsp;关闭</td>
         <td>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = ini_get('magic_quotes_runtime') ? '<font color=red><b>开启</b></font>' : '<font color=green><b>关闭</b></font>';;
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;Magic Quotes Runtime</td>
         <td>&nbsp;关闭</td>
         <td>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = ini_get('register_globals') ? '<font color=red><b>开启</b></font>' : '<font color=green><b>关闭</b></font>';;
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;全局注册(Register Globals)</td>
         <td>&nbsp;关闭</td>
         <td>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    $status = ini_get('session.auto_start') ? '<font color=red><b>开启</b></font>' : '<font color=green><b>关闭</b></font>';;
    echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;模块自动启动(Session auto start)</td>
         <td>&nbsp;关闭</td>
         <td>&nbsp;$status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    echo"<tr>
         <td colspan=3 class=\"navigation\"><br />建议尽量使服务器完全兼容以上建议的配置，不过出现不兼容时，程序仍然可以运行(部分功能可能会失效)。<br /><br /></td>
         </tr>";
    echo <<<HTML
     <tr>
     <td height="40" colspan=3 align="right">&nbsp;&nbsp;
     <input class=buttons type=submit value="&nbsp;&nbsp;下一步  >>&nbsp;&nbsp;">&nbsp;&nbsp;<input type=hidden name="action" value="chmod_check">
     </tr>
</table>
</td>
        <td background="engine/skins/images/tl_rb.gif"><img src="engine/skins/images/tl_rb.gif" width="6" height="1" border="0"></td>
    </tr>
    <tr>
        <td><img src="engine/skins/images/tl_lu.gif" width="4" height="6" border="0"></td>
        <td background="engine/skins/images/tl_ub.gif"><img src="engine/skins/images/tl_ub.gif" width="1" height="6" border="0"></td>
        <td><img src="engine/skins/images/tl_ru.gif" width="6" height="6" border="0"></td>
    </tr>
</table>
</div></form>
HTML;
    } elseif ($_REQUEST['action'] == "chmod_check") {
    if (!$_SESSION['xtm_install']) msg("", "错误", "程序安装过程存在问题，请先点击下面链接重新开始安装程序:  <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>");
    echoheader("", "");
    echo <<<HTML
<form method="post" action="">
<div style="padding-top:5px;">
<table width="100%">
    <tr>
        <td width="4"><img src="engine/skins/images/tl_lo.gif" width="4" height="4" border="0"></td>
        <td background="engine/skins/images/tl_oo.gif"><img src="engine/skins/images/tl_oo.gif" width="1" height="4" border="0"></td>
        <td width="6"><img src="engine/skins/images/tl_ro.gif" width="6" height="4" border="0"></td>
    </tr>
    <tr>
        <td background="engine/skins/images/tl_lb.gif"><img src="engine/skins/images/tl_lb.gif" width="4" height="1" border="0"></td>
        <td style="padding:5px;" bgcolor="#FFFFFF">
<table width="100%">
    <tr>
        <td bgcolor="#EFEFEF" height="29" style="padding-left:10px;"><div class="navigation">检测文件夹/文件的读写权限 (CHMOD)</div></td>
    </tr>
</table>
<div class="unterline"></div>
<table width="100%">
HTML;
    echo"<tr>
<td height=\"25\">&nbsp;文件夹/文件
<td width=\"100\" height=\"25\">&nbsp;当前读写权限CHMOD
<td width=\"100\" height=\"25\">&nbsp;状态</tr><tr><td colspan=3><div class=\"hr_line\"></div></td></tr>";
    $important_files = array('./backup/', './engine/data/', './engine/cache/', './engine/cache/system/', './uploads/', './uploads/files/', './uploads/fotos/', './uploads/posts/', './uploads/posts/thumbs/', './uploads/thumbs/', './templates/', './templates/Default/',);
    $chmod_errors = 0;
    $not_found_errors = 0;
    foreach($important_files as $file) {
        if (!file_exists($file)) {
            $file_status = "<font color=red>没有找到!</font>";
            $not_found_errors ++;
        } elseif (is_writable($file)) {
            $file_status = "<font color=green>可写</font>";
        } else {
            @chmod($file, 0777);
            if (is_writable($file)) {
                $file_status = "<font color=green>可写</font>";
            } else {
                @chmod("$file", 0755);
                if (is_writable($file)) {
                    $file_status = "<font color=green>可写</font>";
                } else {
                    $file_status = "<font color=red>不可写</font>";
                    $chmod_errors ++;
                } 
            } 
        } 
        $chmod_value = @decoct(@fileperms($file)) % 1000;
        echo"<tr>
         <td height=\"22\" class=\"tableborder main\">&nbsp;$file</td>
         <td>&nbsp; $chmod_value</td>
         <td>&nbsp; $file_status</td>
         </tr><tr><td background=\"engine/skins/images/mline.gif\" height=1 colspan=3></td></tr>";
    } 
    if ($chmod_errors == 0 and $not_found_errors == 0) {
        $status_report = '成功完成读写权限检测!您可以继续安装!';
    } else {
        if ($chmod_errors > 0) {
            $status_report = "<font color=red>注意!!!</font><br /><br />检测中发现错误: <b>$chmod_errors</b>。 禁止进入文件<br />您必须为文件夹设置读写权限 CHMOD 777 , 为文件设置读写权限 CHMOD 666 通过FTP客户端或其他工具。<br /><br /><font color=red><b>不建议</b></font> 在文件/文件夹权限修改正确之前继续安装。<br />";
        } 
        if ($not_found_errors > 0) {
            $status_report .= "<font color=red>注意!!!</font><br />检测中发现错误: <b>$not_found_errors</b>。 文件不存在!<br /><br /><font color=red><b>不建议</b></font> 在缺少文件的情况下继续安装。<br />";
        } 
    } 
    echo"<tr><td colspan=3><div class=\"hr_line\"></div></td></tr><tr><td height=\"25\" colspan=3>&nbsp;&nbsp;文件夹/文件 系统检测</td></tr><tr><td style=\"padding: 5px\" colspan=3>$status_report</td></tr><tr><td colspan=3><div class=\"hr_line\"></div></td></tr>";
    echo <<<HTML
     <tr>
     <td height="40" colspan=3 align="right">&nbsp;&nbsp;
     <input class=buttons type=submit value="&nbsp;&nbsp;下一步 >>&nbsp;&nbsp;">&nbsp;&nbsp;<input type=hidden name="action" value="doconfig">
     </tr>
</table>
</td>
        <td background="engine/skins/images/tl_rb.gif"><img src="engine/skins/images/tl_rb.gif" width="6" height="1" border="0"></td>
    </tr>
    <tr>
        <td><img src="engine/skins/images/tl_lu.gif" width="4" height="6" border="0"></td>
        <td background="engine/skins/images/tl_ub.gif"><img src="engine/skins/images/tl_ub.gif" width="1" height="6" border="0"></td>
        <td><img src="engine/skins/images/tl_ru.gif" width="6" height="6" border="0"></td>
    </tr>
</table>
</div></form>
HTML;
    } elseif ($_REQUEST['action'] == "doconfig") {
    if (!$_SESSION['xtm_install']) msg("", "错误", "程序安装过程存在问题，请先点击下面链接重新开始安装程序: <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>");
    $url = preg_replace("'/install.php'", "", $_SERVER['HTTP_REFERER']);
    $url = preg_replace("'\?(.*)'", "", $url);
    if (substr("$url", -1) == "/") {
        $url = substr($url, 0, -1);
    } 
    echoheader("", "");
    echo <<<HTML
<form method="post" action="">
<div style="padding-top:5px;">
<table width="100%">
    <tr>
        <td width="4"><img src="engine/skins/images/tl_lo.gif" width="4" height="4" border="0"></td>
        <td background="engine/skins/images/tl_oo.gif"><img src="engine/skins/images/tl_oo.gif" width="1" height="4" border="0"></td>
        <td width="6"><img src="engine/skins/images/tl_ro.gif" width="6" height="4" border="0"></td>
    </tr>
    <tr>
        <td background="engine/skins/images/tl_lb.gif"><img src="engine/skins/images/tl_lb.gif" width="4" height="1" border="0"></td>
        <td style="padding:5px;" bgcolor="#FFFFFF">
<table width="100%">
    <tr>
        <td bgcolor="#EFEFEF" height="29" style="padding-left:10px;"><div class="navigation">配置系统参数</div></td>
    </tr>
</table>
<div class="unterline"></div>
<table width="100%">
HTML;
    echo'<tr>
<td width="175" style="padding: 5px;">站点链接URL:
<td style="padding: 5px;"><input name=url value="' . $url . '/" size=38 type=text class="edit"><br><span class="navigation">站点链接（不包含文件名），必须在结尾添加斜杠线 <font color="red">/</font> </span></tr>
<tr><td colspan="3" height="40">&nbsp;&nbsp;<b>服务器 MySQL 数据库信息</b><td></tr>
<tr><td style="padding: 5px;">服务器 MySQL:<td style="padding: 5px;"><input class="edit" type=text size="28" name="dbhost" value="localhost"><span class="navigation">多数服务器默认为：localhost </span></tr>
<tr><td style="padding: 5px;">数据库名称:<td style="padding: 5px;"><input class="edit" type=text size="28" name="dbname"></tr>
<tr><td style="padding: 5px;">数据库用户名:<td style="padding: 5px;"><input class="edit" type=text size="28" name="dbuser"></tr>
<tr><td style="padding: 5px;">数据库密码:<td style="padding: 5px;"><input class="edit" type=text size="28" name="dbpasswd"></tr>
<tr><td style="padding: 5px;">数据表前缀:<td style="padding: 5px;"><input class="edit" type=text size="28" name="dbprefix" value="xtm"> <span class="navigation">如果您对此不熟悉，请不要改动。</span></tr>
<tr><td style="padding: 5px;">MySQL数据库编码:<td style="padding: 5px;"><input class="edit" type=text size="28" name="dbcollate" value="utf8"> <span class="navigation">如果您对此不熟悉，请不要改动。</span></tr>
<tr><td colspan="3"  height="40">&nbsp;&nbsp;<b>站点原始管理员信息</b><td></tr>
<tr><td style="padding: 5px;">管理员用户名:<td style="padding: 5px;"><input class="edit" type=text size="28" name="reg_username" ></tr>
<tr><td style="padding: 5px;">管理员密码:<td style="padding: 5px;"><input class="edit" type=password size="28" name="reg_password1"> <span class="navigation"><b>千万不要</b>忘记密码!</span></tr>
<tr><td style="padding: 5px;">再次输入密码:<td style="padding: 5px;"><input class="edit" type=password size="28" name="reg_password2"></tr>
<tr><td style="padding: 5px;">邮箱E-mail:<td style="padding: 5px;"><input class="edit" type=text size="28" name="reg_email"></tr>
<tr><td colspan="3"  height="40">&nbsp;&nbsp;<b>附加设置</b><td></tr>
<tr><td style="padding: 5px;">开启搜索引擎优化 SEO:
<td style="padding: 5px;">
<select class=rating name="alt_url"><option value="yes">是</option><option value="no">否</option></select>&nbsp;&nbsp;<span class="navigation">如果您想关闭 SEO 链接, 请不要忘记删除站点根目录下的 .htaccess 文件</span>
</tr>';
    echo <<<HTML
     <tr>
     <td height="40" colspan=3 align="right">&nbsp;&nbsp;
     <input class=buttons type=submit value="&nbsp;&nbsp;下一步  >>&nbsp;&nbsp;">&nbsp;&nbsp;<input type=hidden name="action" value="doinstall">
     </tr>
</table>
</td>
        <td background="engine/skins/images/tl_rb.gif"><img src="engine/skins/images/tl_rb.gif" width="6" height="1" border="0"></td>
    </tr>
    <tr>
        <td><img src="engine/skins/images/tl_lu.gif" width="4" height="6" border="0"></td>
        <td background="engine/skins/images/tl_ub.gif"><img src="engine/skins/images/tl_ub.gif" width="1" height="6" border="0"></td>
        <td><img src="engine/skins/images/tl_ru.gif" width="6" height="6" border="0"></td>
    </tr>
</table>
</div></form>
HTML;
    } elseif ($_REQUEST['action'] == "doinstall") {
    if (!$_SESSION['xtm_install']) msg("", "错误", "程序安装过程存在问题，请先点击下面链接重新开始安装程序:  <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>");
    if (!$reg_username or !$reg_email or !$reg_password1 or !$url or $reg_password1 != $reg_password2) {
        msg("error", "错误!!!" , "请填写必填项!", "javascript:history.go(-1)");
    } 
    if (preg_match("/[\||\'|\<|\>|\"|\!|\$|\@|\&\~\*\+]/", $reg_username)) {
        msg("error", "错误!!!" , "此管理员用户名不能用于注册!", "javascript:history.go(-1)");
    } 
    $reg_password = md5(md5($reg_password1));
    $url = htmlspecialchars($url, ENT_QUOTES, 'ISO-8859-1');
    $reg_email = htmlspecialchars($reg_email, ENT_QUOTES, 'ISO-8859-1');
    $alt_url = htmlspecialchars($alt_url, ENT_QUOTES, 'ISO-8859-1');
    $url = str_replace("$", "&#036;", $url);
    $reg_email = str_replace("$", "&#036;", $reg_email);
    $alt_url = str_replace("$", "&#036;", $alt_url);
    $config = <<<HTML
<?PHP

//System Configurations

\$config = array (

'version_id' => "9.7",

'home_title' => "DataLife Engine 9.7 汉化版",

'http_home_url' => "$url",

'charset' => "utf-8",

'admin_mail' => "$reg_email",

'description' => "DataLife Engine 9.7 版，优秀的SEO优化、稳定、低负载的CMS内容管理系统。",

'keywords' => "DataLife, Engine, 内容管理系统,PHP CMS 建站程序,SEO最好的CMS, CMS, PHP engine",

'date_adjust' => "0",

'site_offline' => "no",

'allow_alt_url' => "$alt_url",

'langs' => "Chinese",

'skin' => "Default",

'allow_gzip' => "no",

'allow_admin_wysiwyg' => "0",

'allow_static_wysiwyg' => "0",

'news_number' => "10",

'smilies' => "wink,winked,smile,am,belay,feel,fellow,laughing,lol,love,no,recourse,request,sad,tongue,wassat,crying,what,bully,angry",

'timestamp_active' => "j-m-Y, H:i",

'news_sort' => "date",

'news_msort' => "DESC",

'hide_full_link' => "no",

'allow_site_wysiwyg' => "0",

'allow_comments' => "yes",

'comm_nummers' => "30",

'comm_msort' => "ASC",

'flood_time' => "30",

'auto_wrap' => "80",

'timestamp_comment' => "j F Y H:i",

'allow_comments_wysiwyg' => "0",

'allow_registration' => "yes",

'allow_cache' => "no",

'allow_votes' => "yes",

'allow_topnews' => "yes",

'allow_read_count' => "yes",

'allow_calendar' => "yes",

'allow_archives' => "yes",

'files_allow' => "yes",

'files_count' => "yes",

'reg_group' => "4",

'registration_type' => "0",

'allow_sec_code' => "yes",

'allow_skin_change' => "yes",

'max_users' => "0",

'max_users_day' => "0",

'max_up_size' => "200",

'max_image_days' => "2",

'allow_watermark' => "yes",

'max_watermark' => "150",

'max_image' => "450",

'jpeg_quality' => "85",

'files_antileech' => "1",

'allow_banner' => "1",

'log_hash' => "0",

'show_sub_cats' => "1",

'tag_img_width' => "0",

'mail_metod' => "php",

'smtp_host' => "localhost",

'smtp_port' => "25",

'smtp_user' => "",

'smtp_pass' => "",

'mail_bcc' => "0",

'speedbar' => "1",

'safe_xfield' => "0",

'extra_login' => "0",

'image_align' => "left",

'ip_control' => "1",

'cache_count' => "0",

'related_news' => "1",

'no_date' => "1",

'mail_news' => "1",

'mail_comments' => "1",

'admin_path' => "admin.php",

'rss_informer' => "1",

'allow_cmod' => "0",

'max_up_side' => "0",

'files_force' => "1",

'short_rating' => "1",

'full_search' => "0",

'allow_multi_category' => "1",

'short_title' => "DataLife Engine 9.8 汉化版",

'allow_rss' => "1",

'rss_mtype' => "0",

'rss_number' => "10",

'rss_format' => "1",

'comments_maxlen' => "3000",

'offline_reason' => "站点维护中，请耐心等待。<br /><br />我们正在努力为您提升更好的服务，我们会很快回来！- DongLiCMS.com",

'catalog_sort' => "date",

'catalog_msort' => "DESC",

'related_number' => "5",

'seo_type' => "2",

'max_moderation' => "0",

'allow_quick_wysiwyg' => "0",

'sec_addnews' => "1",

'mail_pm' => "1",

'allow_change_sort' => "1",

'registration_rules' => "1",

'allow_tags' => "1",

'allow_add_tags' => "1",

'allow_fixed' => "1",

'max_file_count' => "0",

'allow_smartphone' => "1",

'allow_smart_images' => "0",

'allow_smart_video' => "0",

'allow_search_print' => "1",

'allow_search_link' => "1",

'allow_smart_format' => "1",

'thumb_dimming' => "0",

'thumb_gallery' => "1",

'max_comments_days' => "0",

'allow_combine' => "1",

'allow_subscribe' => "1",

'parse_links' => "0",

't_seite' => "0",

'comments_minlen' => "10",

'js_min' => "0",

'outlinetype' => "0",

'fast_search' => "1",

'login_log' => "0",

'allow_recaptcha' => "0",

'recaptcha_public_key' => "6LfoOroSAAAAAEg7PViyas0nRqCN9nIztKxWcDp_",

'recaptcha_private_key' => "6LfoOroSAAAAAMgMr_BTRMZy20PFir0iGT2OQYZJ",

'recaptcha_theme' => "clean",

'search_number' => "10",

'news_navigation' => "1",

'mail_additional' => "",

'smtp_mail' => "",

'seo_control' => "0",

'news_restricted' => "0",

'comments_restricted' => "0",

'auth_metod' => "0",

'comments_ajax' => "0",

'create_catalog' => "0",

'mobile_news' => "10",

'reg_question' => "0",

'smtp_helo' => "HELO",

'news_future' => "0",

'cache_type' => "0",

'memcache_server' => "localhost:11211",

'allow_comments_cache' => "1",

'reg_multi_ip' => "1",

'top_number' => "10",

'tags_number' => "40",

'mail_title' => "",

'o_seite' => "0",

'online_status' => "1",

'avatar_size' => "100",

);

?>
HTML;
    $dbhost = str_replace ('"', '\"', str_replace ("$", "\\$", $dbhost));
    $dbname = str_replace ('"', '\"', str_replace ("$", "\\$", $dbname));
    $dbuser = str_replace ('"', '\"', str_replace ("$", "\\$", $dbuser));
    $dbpasswd = str_replace ('"', '\"', str_replace ("$", "\\$", $dbpasswd));
    $dbprefix = str_replace ('"', '\"', str_replace ("$", "\\$", $dbprefix));
    $dbcollate = str_replace ('"', '\"', str_replace ("$", "\\$", $dbcollate));
    $dbconfig = <<<HTML
<?PHP

define ("DBHOST", "{$dbhost}"); 

define ("DBNAME", "{$dbname}");

define ("DBUSER", "{$dbuser}");

define ("DBPASS", "{$dbpasswd}");  

define ("PREFIX", "{$dbprefix}"); 

define ("COLLATE", "{$dbcollate}"); 

define ("USERPREFIX", "{$dbprefix}"); 

\$db = new db;
 
?>
HTML;
    $video_config = <<<HTML
<?PHP

//Videoplayers Configurations

\$video_config = array (

'width' => "425",

'height' => "325",

'play' => "false",

'progressBarColor' => "0xFFFFFF",

'flv_watermark' => "1",

'tube_related' => "0",

'tube_xtm' => "0",

'startframe' => "0",

'progressBarColor' => "0xFFFFFF",

'preview' => "1",

'buffer' => "3",

'autohide' => "0",

'flv_watermark_pos' => "left",

'flv_watermark_al' => "1",

'youtube_q' => "hd720",

'play' => "0",

'fullsizeview' => "2",

'audio_width' => "300",

);

?>
HTML;
    $con_file = fopen("engine/data/config.php", "w+") or die("抱歉，您不能创建文件 <b>.engine/data/config.php</b>。<br />请检查此文件的权限（CHMOD）!");
    fwrite($con_file, $config);
    fclose($con_file);
    @chmod("engine/data/config.php", 0666);
    $con_file = fopen("engine/data/dbconfig.php", "w+") or die("抱歉，您不能创建文件 <b>.engine/data/dbconfig.php</b>.<br />请检查此文件的权限（CHMOD）!");
    fwrite($con_file, $dbconfig);
    fclose($con_file);
    @chmod("engine/data/dbconfig.php", 0666);
    $con_file = fopen("engine/data/videoconfig.php", "w+") or die("抱歉，您不能创建文件 <b>.engine/data/videoconfig.php</b>.<br />请检查此文件的权限（CHMOD）!");
    fwrite($con_file, $video_config);
    fclose($con_file);
    @chmod("engine/data/videoconfig.php", 0666);
    $con_file = fopen("engine/data/wordfilter.db.php", "w+") or die("抱歉，您不能创建文件 <b>.engine/data/wordfilter.db.php</b>.<br />请检查此文件的权限（CHMOD）!");
    fwrite($con_file, '');
    fclose($con_file);
    @chmod("engine/data/wordfilter.db.php", 0666);
    $con_file = fopen("engine/data/xfields.txt", "w+") or die("抱歉，您不能创建文件 <b>.engine/data/xfields.txt</b>.<br />请检查此文件的权限（CHMOD）!");
    fwrite($con_file, '');
    fclose($con_file);
    @chmod("engine/data/xfields.txt", 0666);
    $con_file = fopen("engine/data/xprofile.txt", "w+") or die("抱歉，您不能创建文件 <b>.engine/data/xprofile.txt</b>.<br />请检查此文件的权限（CHMOD）!");
    fwrite($con_file, '');
    fclose($con_file);
    @chmod("engine/data/xprofile.txt", 0666);
    @unlink(ENGINE_DIR . '/cache/system/usergroup.php');
    @unlink(ENGINE_DIR . '/cache/system/vote.php');
    @unlink(ENGINE_DIR . '/cache/system/banners.php');
    @unlink(ENGINE_DIR . '/cache/system/category.php');
    @unlink(ENGINE_DIR . '/cache/system/banned.php');
    @unlink(ENGINE_DIR . '/cache/system/cron.php');
    @unlink(ENGINE_DIR . '/cache/system/informers.php');
    @unlink(ENGINE_DIR . '/data/snap.db');
    define ("PREFIX", $dbprefix);
    define ("COLLATE", $dbcollate);
    $tableSchema = array();
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_category";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_category (
  `id` smallint(5) NOT NULL auto_increment,
  `parentid` smallint(5) NOT NULL default '0',
  `posi` smallint(5) NOT NULL default '1',
  `name` varchar(50) NOT NULL default '',
  `alt_name` varchar(50) NOT NULL default '',
  `icon` varchar(200) NOT NULL default '',
  `skin` varchar(50) NOT NULL default '',
  `descr` varchar(200) NOT NULL default '',
  `keywords` text NOT NULL,
  `news_sort` varchar(10) NOT NULL default '',
  `news_msort` varchar(4) NOT NULL default '',
  `news_number` smallint(5) NOT NULL default '0',
  `short_tpl` varchar(40) NOT NULL default '',
  `full_tpl` varchar(40) NOT NULL default '',
  `metatitle` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_comments";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_comments (
  `id` int(10) unsigned NOT NULL auto_increment,
  `post_id` int(11) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `autor` varchar(40) NOT NULL default '',
  `email` varchar(40) NOT NULL default '',
  `text` text NOT NULL,
  `ip` varchar(16) NOT NULL default '',
  `is_register` tinyint(1) NOT NULL default '0',
  `approve` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  KEY `approve` (`approve`),
  FULLTEXT KEY `text` (`text`)
  ) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_email";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_email (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(10) NOT NULL default '',
  `template` text NOT NULL,
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_flood";
    $tableSchema[] = "CREATE TABLE  " . PREFIX . "_flood (
  `f_id` int(11) unsigned NOT NULL auto_increment,
  `ip` varchar(40) NOT NULL default '',
  `id` varchar(20) NOT NULL default '',
  `flag` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`f_id`),
  KEY `ip` (`ip`),
  KEY `id` (`id`),
  KEY `flag` (`flag`)
  ) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_images";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_images (
  `id` int(10) unsigned NOT NULL auto_increment,
  `images` text NOT NULL,
  `news_id` int(10) NOT NULL default '0',
  `author` varchar(40) NOT NULL default '',
  `date` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `author` (`author`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_logs";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_logs (
  `id` int(10) unsigned NOT NULL auto_increment,
  `news_id` int(10) NOT NULL default '0',
  `member` varchar(40) NOT NULL default '',
  `ip` varchar(16) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `member` (`member`),
  KEY `ip` (`ip`)
  ) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_vote";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_vote (
  `id` mediumint(8) NOT NULL auto_increment,
  `category` text NOT NULL,
  `vote_num` mediumint(8) NOT NULL default '0',
  `date` varchar(25) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `body` text NOT NULL,
  `approve` tinyint(1) NOT NULL default '1',
  `start` varchar(15) NOT NULL default '',
  `end` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `approve` (`approve`)
  ) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_vote_result";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_vote_result (
  `id` int(10) NOT NULL auto_increment,
  `ip` varchar(16) NOT NULL default '',
  `name` varchar(40) NOT NULL default '',
  `vote_id` mediumint(8) NOT NULL default '0',
  `answer` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `answer` (`answer`),
  KEY `vote_id` (`vote_id`),
  KEY `ip` (`ip`),
  KEY `name` (`name`)
  ) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_lostdb";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_lostdb (
  `id` mediumint(8) NOT NULL auto_increment,
  `lostname` mediumint(8) NOT NULL default '0',
  `lostid` varchar( 40 ) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `lostid` (`lostid`)
  ) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_pm";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_pm (
  `id` int(10) unsigned NOT NULL auto_increment,
  `subj` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `user` MEDIUMINT(8) NOT NULL default '0',
  `user_from` varchar(50) NOT NULL default '',
  `date` varchar(15) NOT NULL default '',
  `pm_read` TINYINT(1) NOT NULL default '0',
  `folder` varchar(10) NOT NULL default '',
  `reply` tinyint(1) NOT NULL default '0',
  `sendid` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `folder` (`folder`),
  KEY `user` (`user`),
  KEY `user_from` (`user_from`),
  KEY `pm_read` (`pm_read`)
  ) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_post";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_post (
  `id` int(11) NOT NULL auto_increment,
  `autor` varchar(40) NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `short_story` text NOT NULL,
  `full_story` text NOT NULL,
  `xfields` text NOT NULL,
  `title` varchar(255) NOT NULL default '',
  `descr` varchar(200) NOT NULL default '',
  `keywords` text NOT NULL,
  `category` varchar(200) NOT NULL default '0',
  `alt_name` varchar(200) NOT NULL default '',
  `comm_num` mediumint(8) unsigned NOT NULL default '0',
  `allow_comm` tinyint(1) NOT NULL default '1',
  `allow_main` tinyint(1) unsigned NOT NULL default '1',
  `approve` tinyint(1) NOT NULL default '0',
  `fixed` tinyint(1) NOT NULL default '0',
  `allow_br` tinyint(1) NOT NULL default '1',
  `symbol` varchar(3) NOT NULL default '',
  `tags` VARCHAR(255) NOT NULL default '',
  `metatitle` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `autor` (`autor`),
  KEY `alt_name` (`alt_name`),
  KEY `category` (`category`),
  KEY `approve` (`approve`),
  KEY `allow_main` (`allow_main`),
  KEY `date` (`date`),
  KEY `symbol` (`symbol`),
  KEY `comm_num` (`comm_num`),
  KEY `tags` (`tags`),
  KEY `fixed` (`fixed`),
  FULLTEXT KEY `short_story` (`short_story`,`full_story`,`xfields`,`title`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_post_extras";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_post_extras (
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
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_static";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_static (
  `id` MEDIUMINT(8) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `descr` varchar(255) NOT NULL default '',
  `template` text NOT NULL,
  `allow_br` tinyint(1) NOT NULL default '0',
  `allow_template` tinyint(1) NOT NULL default '0',
  `grouplevel` varchar(100) NOT NULL default 'all',
  `tpl` varchar(40) NOT NULL default '',
  `metadescr` varchar(200) NOT NULL default '',
  `metakeys` text NOT NULL,
  `views` mediumint(8) NOT NULL default '0',
  `template_folder` varchar(50) NOT NULL default '',
  `date` varchar(15) NOT NULL default '',
  `metatitle` varchar(255) NOT NULL default '',
  `allow_count` tinyint(1) NOT NULL default '1',
  `sitemap` tinyint(1) NOT NULL default '1',
  `disable_index` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  FULLTEXT KEY `template` (`template`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_users";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_users (
  `email` varchar(50) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `name` varchar(40) NOT NULL default '',
  `user_id` int(11) NOT NULL auto_increment,
  `news_num` mediumint(8) NOT NULL default '0',
  `comm_num` mediumint(8) NOT NULL default '0',
  `user_group` smallint(5) NOT NULL default '4',
  `lastdate` varchar(20) default NULL,
  `reg_date` varchar(20) default NULL,
  `banned` varchar(5) NOT NULL default '',
  `allow_mail` tinyint(1) NOT NULL default '1',
  `info` text NOT NULL,
  `signature` text NOT NULL,
  `foto` varchar(30) NOT NULL default '',
  `fullname` varchar(100) NOT NULL default '',
  `land` varchar(100) NOT NULL default '',
  `icq` varchar(20) NOT NULL default '',
  `favorites` text NOT NULL,
  `pm_all` smallint(5) NOT NULL default '0',
  `pm_unread` smallint(5) NOT NULL default '0',
  `time_limit` varchar(20) NOT NULL default '',
  `xfields` text NOT NULL,
  `allowed_ip` varchar(255) NOT NULL default '',
  `hash` varchar(32) NOT NULL default '',
  `logged_ip` varchar(16) NOT NULL default '',
  `restricted` TINYINT(1) NOT NULL default '0',
  `restricted_days` SMALLINT(4) NOT NULL default '0',
  `restricted_date` VARCHAR(15) NOT NULL default '',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_banned";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_banned (
  `id` smallint(5) NOT NULL auto_increment,
  `users_id` mediumint(8) NOT NULL default '0',
  `descr` text NOT NULL,
  `date` varchar(15) NOT NULL default '',
  `days` smallint(4) NOT NULL default '0',
  `ip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`users_id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_files";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_files (
  `id`  MEDIUMINT(8) NOT NULL auto_increment,
  `news_id` int(10) NOT NULL default '0',
  `name` varchar(250) NOT NULL default '',
  `onserver` varchar(250) NOT NULL default '',
  `author` varchar(40) NOT NULL default '',
  `date` varchar(15) NOT NULL default '',
  `dcount` smallint(5) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_usergroups";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_usergroups (
  `id` smallint(5) NOT NULL auto_increment,
  `group_name` varchar(32) NOT NULL default '',
  `allow_cats` text NOT NULL,
  `allow_adds` tinyint(1) NOT NULL default '1',
  `cat_add` text NOT NULL,
  `allow_admin` tinyint(1) NOT NULL default '0',
  `allow_addc` tinyint(1) NOT NULL default '0',
  `allow_editc` tinyint(1) NOT NULL default '0',
  `allow_delc` tinyint(1) NOT NULL default '0',
  `edit_allc` tinyint(1) NOT NULL default '0',
  `del_allc` tinyint(1) NOT NULL default '0',
  `moderation` tinyint(1) NOT NULL default '0',
  `allow_all_edit` tinyint(1) NOT NULL default '0',
  `allow_edit` tinyint(1) NOT NULL default '0',
  `allow_pm` tinyint(1) NOT NULL default '0',
  `max_pm` smallint(5) NOT NULL default '0',
  `max_foto` VARCHAR(10) NOT NULL default '',
  `allow_files` tinyint(1) NOT NULL default '0',
  `allow_hide` tinyint(1) NOT NULL default '1',
  `allow_short` tinyint(1) NOT NULL default '0',
  `time_limit` tinyint(1) NOT NULL default '0',
  `rid` smallint(5) NOT NULL default '0',
  `allow_fixed` tinyint(1) NOT NULL default '0',
  `allow_feed`  tinyint(1) NOT NULL default '1',
  `allow_search`  tinyint(1) NOT NULL default '1',
  `allow_poll`  tinyint(1) NOT NULL default '1',
  `allow_main`  tinyint(1) NOT NULL default '1',
  `captcha`  tinyint(1) NOT NULL default '0',
  `icon` varchar(200) NOT NULL default '',
  `allow_modc`  tinyint(1) NOT NULL default '0',
  `allow_rating` tinyint(1) NOT NULL default '1',
  `allow_offline` tinyint(1) NOT NULL default '0',
  `allow_image_upload` tinyint(1) NOT NULL default '0',
  `allow_file_upload` tinyint(1) NOT NULL default '0',
  `allow_signature` tinyint(1) NOT NULL default '0',
  `allow_url` tinyint(1) NOT NULL default '1',
  `news_sec_code` tinyint(1) NOT NULL default '1',
  `allow_image` tinyint(1) NOT NULL default '0',
  `max_signature` SMALLINT(6) NOT NULL default '0',
  `max_info` SMALLINT(6) NOT NULL default '0',
  `admin_addnews` tinyint(1) NOT NULL default '0',
  `admin_editnews` tinyint(1) NOT NULL default '0',
  `admin_comments` tinyint(1) NOT NULL default '0',
  `admin_categories` tinyint(1) NOT NULL default '0',
  `admin_editusers` tinyint(1) NOT NULL default '0',
  `admin_wordfilter` tinyint(1) NOT NULL default '0',
  `admin_xfields` tinyint(1) NOT NULL default '0',
  `admin_userfields` tinyint(1) NOT NULL default '0',
  `admin_static` tinyint(1) NOT NULL default '0',
  `admin_editvote` tinyint(1) NOT NULL default '0',
  `admin_newsletter` tinyint(1) NOT NULL default '0',
  `admin_blockip` tinyint(1) NOT NULL default '0',
  `admin_banners` tinyint(1) NOT NULL default '0',
  `admin_rss` tinyint(1) NOT NULL default '0',
  `admin_iptools` tinyint(1) NOT NULL default '0',
  `admin_rssinform` tinyint(1) NOT NULL default '0',
  `admin_googlemap` tinyint(1) NOT NULL default '0',
  `allow_html` tinyint(1) NOT NULL default '1',
  `group_prefix` text NOT NULL,
  `group_suffix` text NOT NULL,
  `allow_subscribe` tinyint(1) NOT NULL default '0',
  `allow_image_size` tinyint(1) NOT NULL default '0',
  `cat_allow_addnews` text NOT NULL,
  `flood_news` smallint(6) NOT NULL default '0',
  `max_day_news` smallint(6) NOT NULL default '0',
  `force_leech` tinyint(1) NOT NULL default '0',
  `edit_limit` smallint(6) NOT NULL default '0',
  `captcha_pm` tinyint(1) NOT NULL default '0',
  `max_pm_day` smallint(6) NOT NULL default '0',
  `max_mail_day` smallint(6) NOT NULL default '0',
  `admin_tagscloud` tinyint(1) NOT NULL default '0',
  `allow_vote` tinyint(1) NOT NULL default '0',
  `admin_complaint` tinyint(1) NOT NULL default '0',
  `news_question` tinyint(1) NOT NULL default '0',
  `comments_question` tinyint(1) NOT NULL default '0',
  `max_comment_day` smallint(6) NOT NULL default '0',
  `max_images` smallint(6) NOT NULL default '0',
  `max_files` smallint(6) NOT NULL default '0',
  `disable_news_captcha` smallint(6) NOT NULL default '0',
  `disable_comments_captcha` smallint(6) NOT NULL default '0',
  `pm_question` tinyint(1) NOT NULL default '0',
  `captcha_feedback` tinyint(1) NOT NULL default '1',
  `feedback_question` tinyint(1) NOT NULL default '0',
  `files_type` varchar(255) NOT NULL default '',
  `max_file_size` mediumint(9) NOT NULL default '0',
  `files_max_speed` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_poll";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_poll (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `news_id` int(10) unsigned NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `frage` varchar(200) NOT NULL default '',
  `body` text NOT NULL,
  `votes` mediumint(8) NOT NULL default '0',
  `multiple` tinyint(1) NOT NULL default '0',
  `answer` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_poll_log";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_poll_log (
  `id` int(10) unsigned NOT NULL auto_increment,
  `news_id` int(10) unsigned NOT NULL default '0',
  `member` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`,`member`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_banners";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_banners (
  `id` smallint(5) NOT NULL auto_increment,
  `banner_tag` varchar(40) NOT NULL default '',
  `descr` varchar(200) NOT NULL default '',
  `code` text NOT NULL,
  `approve` tinyint(1) NOT NULL default '0',
  `short_place` tinyint(1) NOT NULL default '0',
  `bstick` tinyint(1) NOT NULL default '0',
  `main` tinyint(1) NOT NULL default '0',
  `category` VARCHAR(255) NOT NULL default '',
  `grouplevel` varchar(100) NOT NULL default 'all',
  `start` varchar(15) NOT NULL default '',
  `end` varchar(15) NOT NULL default '',
  `fpage` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_rss";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_rss (
  `id` smallint(5) NOT NULL auto_increment,
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `allow_main` tinyint(1) NOT NULL default '0',
  `allow_rating` tinyint(1) NOT NULL default '0',
  `allow_comm` tinyint(1) NOT NULL default '0',
  `text_type` tinyint(1) NOT NULL default '0',
  `date` tinyint(1) NOT NULL default '0',
  `search` text NOT NULL,
  `max_news` tinyint(3) NOT NULL default '0',
  `cookie` text NOT NULL,
  `category` smallint(5) NOT NULL default '0',
  `lastdate` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_views";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_views (
  `id` mediumint(8) NOT NULL auto_increment,
  `news_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_rssinform";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_rssinform (
  `id` smallint(5) NOT NULL auto_increment,
  `tag` varchar(40) NOT NULL default '',
  `descr` varchar(255) NOT NULL default '',
  `category` varchar(200) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `template` varchar(40) NOT NULL default '',
  `news_max` smallint(5) NOT NULL default '0',
  `tmax` smallint(5) NOT NULL default '0',
  `dmax` smallint(5) NOT NULL default '0',
  `approve` tinyint(1) NOT NULL default '1',
  `rss_date_format` VARCHAR(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_notice";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_notice (
  `id` mediumint(8) NOT NULL auto_increment,
  `user_id` mediumint(8) NOT NULL default '0',
  `notice` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_static_files";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_static_files (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `static_id` mediumint(8) NOT NULL default '0',
  `author` varchar(40) NOT NULL default '',
  `date` varchar(50) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `onserver` varchar(255) NOT NULL default '',
  `dcount` smallint(5) NOT NULL default '0',
  PRIMARY KEY (`id`),
  KEY `static_id` (`static_id`),
  KEY `onserver` (`onserver`),
  KEY `author` (`author`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_tags";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_tags (
  `id` INT(11) NOT NULL auto_increment,
  `news_id` INT(11) NOT NULL default '0',
  `tag` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `tag` (`tag`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_post_log";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_post_log (
  `id` INT(11) NOT NULL auto_increment,
  `news_id` INT(11) NOT NULL default '0',
  `expires` varchar(15) NOT NULL default '',
  `action` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `expires` (`expires`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_admin_sections";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_admin_sections (
  `id` mediumint(8) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `descr` varchar(255) NOT NULL default '',
  `icon` varchar(255) NOT NULL default '',
  `allow_groups` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_subscribe";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_subscribe (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `name` varchar(40) NOT NULL default '',
  `email`  varchar(50) NOT NULL default '',
  `news_id` int(11) NOT NULL default '0',
  `hash` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `user_id` (`user_id`) 
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_sendlog";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_sendlog (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL DEFAULT '',
  `date` varchar(20) NOT NULL DEFAULT '',
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `date` (`date`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_login_log";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_login_log (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) NOT NULL DEFAULT '',
  `count` smallint(6) NOT NULL DEFAULT '0',
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`),
  KEY `date` (`date`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_mail_log";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_mail_log (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `mail` varchar(50) NOT NULL DEFAULT '',
  `hash` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_complaint";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_complaint (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL DEFAULT '0',
  `c_id` int(11) NOT NULL DEFAULT '0',
  `n_id` int(11) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `from` varchar(40) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `date` int(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`),
  KEY `p_id` (`p_id`),
  KEY `n_id` (`n_id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_ignore_list";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_ignore_list (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL default '0',
  `user_from` VARCHAR(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `user` (`user`),
  KEY `user_from` (`user_from`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_admin_logs";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_admin_logs (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(16) NOT NULL DEFAULT '',
  `action` int(11) NOT NULL DEFAULT '0',
  `extras` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `date` (`date`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_question";
    $tableSchema[] = "CREATE TABLE " . PREFIX . "_question (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_rssinform VALUES (1, 'xtm', 'DataLife Engine 汉化版最新动态', '0', 'http://www.xtmseo.com/rss.xml', 'informer', 3, 0, 200, 1, 'j F Y H:i')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (1, '管理员', 'all', 1, 'all', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, 101, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, '{THEME}/images/icon_1.gif', 0, 1, 1, 1, 1, 1, 1, 0, 1,500,1000,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,1,'<b><span style=\"color:red\">','</span></b>',1,1,'all', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (2, '编辑', 'all', 1, 'all', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 50, 101, 1, 1, 1, 0, 2, 1, 1, 1, 1, 1, 0, '{THEME}/images/icon_2.gif', 0, 1, 0, 1, 1, 1, 1, 0, 1,500,1000,1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,1,'','',1,1,'all', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (3, '作者', 'all', 1, 'all', 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 50, 101, 1, 1, 1, 0, 3, 0, 1, 1, 1, 1, 0, '{THEME}/images/icon_3.gif', 0, 1, 0, 1, 1, 1, 1, 0, 1,500,1000,1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,1,'','',1,1,'all', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (4, '会员', 'all', 1, 'all', 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 20, 101, 1, 1, 1, 0, 4, 0, 1, 1, 1, 1, 0, '{THEME}/images/icon_4.gif', 0, 1, 0, 1, 0, 1, 1, 1, 0,500,1000,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,1,'','',1,0,'all', 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (5, '游客', 'all', 0, 'all', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 5, 0, 1, 1, 1, 0, 1, '{THEME}/images/icon_5.gif', 0, 1, 0, 0, 0, 0, 1, 1, 0,1,1,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0,'','',0,0,'all', 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', 0, 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_rss VALUES (1, 'http://www.xtmseo.com/rss.xml', 'DataLife Engine 汉化版最新动态', 1, 1, 1, 1, 1, '<div id=\"news-id-{skip}\">{get}</div><br /><br />', 5, '', 1, '')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (1, 'reg_mail', '{%username%},\r\n\r\本邮件发送于 $url\r\n\r\n您收到这封邮件是因为此邮件地址被用来注册了我们的站点。如果您没有在我们的站点进行注册，请忽略并删除本邮件。并且您不会再收到来自我们站点的邮件!\r\n\r\n------------------------------------------------\r\n您在我们站点的注册信息:\r\n------------------------------------------------\r\n\r\n用户名: {%username%}\r\n密码: {%password%}\r\n\r\n------------------------------------------------\r\n如何激活账号\r\n------------------------------------------------\r\n\r\n感谢您的注册。\r\n我们需要您的确认, 以验证您输入了真实有效的 e-mail 地址。此步骤可以维持站点正常并预防他人恶意注册和攻击，谢谢您的支持。\r\n\r\n激活您的账号，只需要单击以下的链接:\r\n\r\n{%validationlink%}\r\n\r\n如果此操作没有正常进行，您的账号将不能完成注册并从站点服务器删除。如果出现这种情况，请重新注册或联系站点的管理员来解决此问题。\r\n\r\n祝好运,\r\n\r\n站点 $url.')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (2, 'feed_mail', '{%username_to%},\r\n\r\本邮件发送自 {%username_from%} 于站点 $url\r\n\r\n------------------------------------------------\r\n信息内容\r\n------------------------------------------------\r\n\r\n{%text%}\r\n\r\n发送者的IP地址: {%ip%}\r\n\r\n------------------------------------------------\r\n注意：我们的站点及管理员并不对本邮件内容负责\r\n\r\n祝好运,\r\n\r\n站点 $url')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (3, 'lost_mail', '亲爱的 {%username%},\r\n\r\您刚刚申请找回站点 $url 的账户密码。不过，出于安全考虑，站点会员的密码都进过了加密处理，，所以我们也不能为您提供旧密码，请生成新的账户密码。新密码生成链接: \r\n\r\n{%lostlink%}\r\n\r\n如果您并没有申请过找回密码，请忽略并删除本邮件。您的账户信息都是经加密处理的，不会被未授权的人获取，请放心！\r\n\r\n发送者的IP地址: {%ip%}\r\n\r\n祝好运,\r\n\r\n站点 $url')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (4, 'new_news', '亲爱的管理员,\r\n\r\n站点 $url 有新的文章发布了，正等待您的审核。\r\n\r\n------------------------------------------------\r\n文章摘要信息\r\n------------------------------------------------\r\n\r\n作者: {%username%}\r\n标题: {%title%}\r\n类别: {%category%}\r\n添加日期: {%date%}\r\n\r\n祝好运,\r\n\r\n站点 $url')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (5, 'comments', '亲爱的 {%username_to%},\r\n\r\n站点 $url 您标记过的文章有新的评论了。\r\n\r\n------------------------------------------------\r\n评论摘要\r\n------------------------------------------------\r\n\r\n作者: {%username%}\r\n添加日期: {%date%}\r\n文章链接: {%link%}\r\n\r\n------------------------------------------------\r\n评论内容\r\n------------------------------------------------\r\n\r\n{%text%}\r\n\r\n------------------------------------------------\r\n\r\n如果您不想再收到关于此文章的评论通知，请单击此链接: {%unsubscribe%}\r\n\r\n祝好运,\r\n\r\n站点 $url')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (6, 'pm', '亲爱的 {%username%},\r\n\r\n您在站点 $url 有一条新的短信息等待查看。\r\n\r\n------------------------------------------------\r\n信息内容摘要\r\n------------------------------------------------\r\n\r\n发件人: {%fromusername%}\r\n接收日期: {%date%}\r\n标题: {%title%}\r\n\r\n------------------------------------------------\r\n信息内容\r\n------------------------------------------------\r\n\r\n{%text%}\r\n\r\n祝好运,\r\n\r\n站点 $url')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_category (name, alt_name, keywords) values ('站点新闻', 'main', '')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_banners (banner_tag, descr, code, approve, short_place, bstick, main, category) values ('header', '站点顶部广告', '<div align=\"center\"><a href=\"http://www.xtmseo.com/\" target=\"_blank\"><img src=\"{$url}templates/Default/images/_banner_.gif\" style=\"border: none;\" alt=\"\" /></a></div>', 1, 0, 0, 0, 0)";
    $add_time = time();
    $thistime = date ("Y-m-d H:i:s", $add_time);
    $tableSchema[] = "INSERT INTO " . PREFIX . "_static (`name`, `descr`, `template`, `allow_br`, `allow_template`, `grouplevel`, `tpl`, `metadescr`, `metakeys`, `views`, `template_folder`, `date`) VALUES ('xtm-rules-page', '站点站规', '<b>我们的站点规定:</b><br /><br /><div><div style=\"float:right;padding-left:5px;\"><img src=\"{$url}uploads/honest.png\" style=\"border: none;\" alt=\"\" /></div>
<ul style=\"list-style: square;\">
<li><strong>我们致力于一个和谐的社区交流环境</strong>
<p>成为我们的会员，你将可以自由的发布评论。不过任何涉及敏感话题、诋毁、谩骂、灌水、广告等不和谐内容都会立即删除甚至对你的账号禁言、删除账号！</p>
<p>站点的会员可以通过站内短消息进行交流。同样我们不允许随意散布上述不和谐内容</p>
<p>站点提供非常便捷的反馈和举报功能，同时我们会记录你的登录信息及IP地址，所以请多多发布友好言论，谢谢！</p>
</li>
<li><strong>站点作者规范</strong>
<p>希望成为站点作者，可以通过站点的反馈功能，向站点管理员进行申请。</p>
<p>我们会尽力保护站点作者的权益，我们不允许不同作者重复投递相同内容的文章以保持第一作者获得更多的关注。同时，我们对作者也有更为严格的要求，我们致力于专业的内容网站，所以任何与站点主题相去甚远、讨论无关话题、人身攻击、广告灯内容会根据情况，随时解除作者权利甚至禁言、删除账号。</p>
<p>我们鼓励作者多于其他用户通过评论进行交流，让更多的用户获得更有价值的信息。</p>
</li>

<li><strong>站点用户账户管理</strong>
<p>我们不允许用户注册多个账户，一经发现，立即删除。同时我们会保护用户隐私，不散布任何用户的信息。如果站内会员随意散布其他会员的信息，我们也会立即删除相关信息并删除散布者账户。</p>
</li>
<li><strong>站点内容管理</strong>
<p>我们不允许用户或作者发表任何涉及他人版权、不合法的内容。如果我们的站点内容影响了您的版权，请随时通过站点反馈联系我们，我们会及时删除相关内容并删除散布版权内容用户的账号。</p>
</li>
<li><strong>站点安全</strong>
<p>我们为用户提供安全的密码保护，并提供密码找回功能，不过请保护好你的注册邮箱信息不被窃取。</p>
<p>我们不允许任何注册机的spam，如果你期望通过软件散布广告信息，只会导致你的账号被封，IP地址被屏蔽。</p>
</li>
</ul>
</div><br /><br /><div align=\"center\">{ACCEPT-DECLINE}</div>', 1, 1, 'all', '', '站点站规', '站点站规', 0, '', '{$add_time}')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_users (name, password, email, reg_date, lastdate, user_group, news_num, info, signature, favorites, xfields) values ('$reg_username', '$reg_password', '$reg_email', '$add_time', '$add_time', '1', '4', '', '', '', '')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_vote (category, vote_num, date, title, body) VALUES ('all', '0', '$thistime', '您如何得知 xtmseo.com的呢?', '搜索引擎<br />朋友介绍<br />慕名而来<br />曾经用过xtm<br />其他站点推荐...')";
    $title = "Datalife Engine 9.7";
    $short_story = "<div align=\"center\"><img src=\"" . $url . "uploads/boxsmall.jpg\" alt=\"\" /></div>Datalife Engine is multi-user Content Management System, using the combination of AJAX technology and a cross-browser javascript library (jQuery) which has a lot of features. The engine is intended primarily for the Blogs and News Contents websites with great information content. However, it has a lot of settings that allow you to use it for virtually any purposes. The engine can be integrated into virtually any existing design and has no restrictions on the templates customizations itself. Another key feature of DataLife Engine - is a low load on system resources. Even with a very large contents and visitors website, the server loading will be minimal and you will not experience any problems with the connectivity or mapping and query the contents and information. The engine is Search Engine Optimisation (SEO) that lead or bring visitors and web surfers to your site (or higher ranked on the search results page) and and more frequently a site appears in the search results list, the more visitors it will receive from the search engine\'s users. As mentioned earlier Datalife Engine is Using AJAX advanced technology which will allow you not only to save you on server traffic and resources and traffic of visitors, but also reduces the load on the server. About all the functional features, please visit <a href=\"http://www.xtm-news.ru/\" target=\"_blank\">Datalife Engine Official Website</a>, for English documents and guides please visit our <a href=\"http://www.xtmstarter.com/\" target=\"_blank\">English Documents and User Guides</a>.<br /><br />Datalife Engine Official Support Forum: <a href=\"http://forum.xtm-news.ru/index.php\" target=\"_blank\">http://forum.xtm-news.ru/index.php</a>.";
    $full_story = "";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_post (id, date, autor, short_story, full_story, xfields, title, keywords, category, alt_name, allow_comm, approve, allow_main, tags) values ('1', '$thistime', '$reg_username', '$short_story', '$full_story', '', '$title', '', '1', 'post1', '1', '1', '1', 'xtm, xtmseo')";
    $title = "Script Purchase and Price";
    $short_story = "Dear webmaster,before you ask any questions about script supports, make sure that you carefully read the documentation comes with the scripton the script but if could not find the answer for it, then you can ask for supports. We reserve the right to ignore the questions sending to us regarding to Trial or Demo or Not-Paid versions, which includes technical supports. You can purchase one of two types of licenses for DataLife Engine of your choice:<br /><br />- <b>Basic license.</b> The price of this license is: <span style=\"color:red\">$59</span>. When you purchase this license, you you will receive free new versions of the script which released within <b>one year</b>.<br /><br />- <b>Extended License.</b> The price of this license is: <span style=\"color:red\">$78</span>. When you purchase this license, you get everything included in the <b>basic license</b>, as well as additional script technical support is included and permission to remove the script copyright on your website front page (visible to the general site visitors).<br /><br /><b>License Valid</b> for <span style=\"color:#FF0000\">1 year</span>, which you will receive all script future versions and update free, as well as free supports for those who had purchase an extended license. When the license is expired, you can extend it, or use the version of script athe the license expired free for life. If you want to renew the license to upgrade to the new version, the cost of renew the license is <span style=\"color:red\">39$</span> and it is good for one year<br /><br /><b>To purchase script please visit</b> <a href=\"http://xtm-news.ru/price.html\" target=\"_blank\">http://xtm-news.ru/price.html</a><br /><br />Remember that the license is issued only for 1 domain and can not be used on other sites as well as prohibited to share your licenses file to third parties.<br /><br /><b>Best Regards,<br /><br />SoftNews Media Group</b>";
    $add_time = time()-20;
    $thistime = date ("Y-m-d H:i:s", $add_time);
    $tableSchema[] = "INSERT INTO " . PREFIX . "_post (id, date, autor, short_story, full_story, xfields, title, keywords, category, alt_name, allow_comm, approve, allow_main, tags) values ('2', '$thistime', '$reg_username', '$short_story', '$full_story', '', '$title', '', '1', 'post2', '1', '1', '1', 'xtm, xtmseo')";
    $title = "DataLife Engine Templates";
    $short_story = "<br /><div align=\"center\"><a href=\"http://www.xtmtemplates.com/\" target=\"_blank\"><img src=\"" . $url . "uploads/xtmlogo.gif\" alt=\"\" /></a></div><br />We and our partner <a href=\"http://www.xtmtemplates.com/\" target=\"_blank\">www.xtmtemplates.com</a> are pleased to provide you with high quality templates which will be ready to use with DataLife Engine script. All templates are created on high quality by skilled and experinced designers and programmers. All templates are fully customized and ready to use immediately after it is installed on the server. In addition, all templates have been fully tested on our site, you also get all the original raw materials that were used to create a template.<br /><br />If you are still wondering how it will look like on your site and want to use the professional services for reasonable prices, we recommend that you contact our partners <a href=\"http://www.xtmtemplates.com/\" target=\"_blank\">www.xtmtemplates.com</a>, they will create any templates or layout and customize it to use with engine in short time, also provide ready to purchase and use for your site.";
    $add_time = time()-50;
    $thistime = date ("Y-m-d H:i:s", $add_time);
    $tableSchema[] = "INSERT INTO " . PREFIX . "_post (id, date, autor, short_story, full_story, xfields, title, keywords, category, alt_name, allow_comm, approve, allow_main, tags) values ('3', '$thistime', '$reg_username', '$short_story', '$full_story', '', '$title', '', '1', 'post3', '1', '1', '1', 'xtm, xtmseo')";
    $title = "Script Technical Supports";
    $short_story = "<b>For Script Technical Supports</b> please visit our <a href=\"http://forum.xtm-news.ru/index.php\" target=\"_blank\">Supports Forum</a>, as well as via E-Mail. For all of your questions, we try to answer all your questions, but due to the large number of visitors, it is not always possible. Therefore we may additional fee for script supports may applied. The cost of this service is optional <!--colorstart:#FF0000--><span style=\"color:#FF0000\"><!--/colorstart-->$19<!--colorend--></span><!--/colorend--> and only available with valid license users.<br /><br /><b>Services for additional support include:</b><br /><br />1. Guarantee to answer the questions asked by users for the first time script users and do not know anything or new to script. The purpose of this support is only for direct help only if script not working or non-operational, if the cause of incorrect operation of the script was your template does not meet the requirements of the script, then your support request may be denied.<br /><br />2. You will get free one time script installtion on your server including setting it up for full operation in current server settings (sometimes you need to disable the SEO, we will provide the specific guidelines for Russian Apache, setup upload functions for upload pictures and files ...).<br /><br />3. You will receive consult with support to work with the script structure and instructions, for example, you want to make some small changes to the script for more convenient work for you, you can save time on finding the right piece of code just ask us. You will be given advice where to find, and how general it is better to implement the task. (Please note we do not write additional modules for you, but only help you better understand the script structure, so always ask essential questions, questions such as: \"how can I get this code or module\" may be ignored by customer support).<br /><br />4. Another of the common problems is incorrect script upgrade, for instance during the upgrade process the server has failed, some of the new data was saved into the database and configuration, some data was not saved, which will cause the script stop working at the end. In this case, you will be held respomsible for manually repair damaged database structure.<br /><br />In case you have not subscribed to additional support services, your questions will be ignored and unanswered.<br /><br /><b>Best Regards,<br /><br />SoftNews Media Group</b>";
    $add_time = time()-70;
    $thistime = date ("Y-m-d H:i:s", $add_time);
    $tableSchema[] = "INSERT INTO " . PREFIX . "_post (id, date, autor, short_story, full_story, xfields, title, keywords, category, alt_name, allow_comm, approve, allow_main, tags) values ('4', '$thistime', '$reg_username', '$short_story', '$full_story', '', '$title', '', '1', 'post4', '1', '1', '1', '')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_post_extras (news_id, user_id) values ('1', '1'), ('2', '1'), ('3', '1'), ('4', '1')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_tags (news_id, tag) values ('1', 'xtmseo'), ('2', 'xtmseo'), ('3', 'xtmseo'), ('1', 'xtmseo'), ('2', 'xtmseo'), ('3', 'xtmseo')";
    include ENGINE_DIR . '/classes/mysql.php';
    include ENGINE_DIR . '/data/dbconfig.php';
    foreach($tableSchema as $table) {
        $db -> query($table);
    } 
    echoheader("", "");
    echo <<<HTML
<div style="padding-top:5px;">
<table width="100%">
    <tr>
        <td width="4"><img src="engine/skins/images/tl_lo.gif" width="4" height="4" border="0"></td>
        <td background="engine/skins/images/tl_oo.gif"><img src="engine/skins/images/tl_oo.gif" width="1" height="4" border="0"></td>
        <td width="6"><img src="engine/skins/images/tl_ro.gif" width="6" height="4" border="0"></td>
    </tr>
    <tr>
        <td background="engine/skins/images/tl_lb.gif"><img src="engine/skins/images/tl_lb.gif" width="4" height="1" border="0"></td>
        <td style="padding:5px;" bgcolor="#FFFFFF">
<table width="100%">
    <tr>
        <td bgcolor="#EFEFEF" height="29" style="padding-left:10px;"><div class="navigation">安装成功</div></td>
    </tr>
</table>
<div class="unterline"></div>
<table width="100%">
    <tr>
        <td style="padding:2px;"><br>恭喜您，Datalife Engine CMS系统已经成功安装到了您的服务器。您现在可以查看<a href="index.php" target="_blank">站点首页</a>或者登录 <a href="admin.php">管理后台</a> 查看管理面板并修改系统设置信息。
<br><br><font color="red">警告:安装文件会向服务器注入数据库结构/创建管理员信息/系统基本信息的设定。成功安装后，请马上删除 <b>install.php</b> 文件防止被别人利用来攻击系统!</font><br><br>
享受您的站点Datalife Engine系统<br><br><a href="http://bbs.xtmseo.com"><span style="text-decoration: none">支持网站</span></a><br><br></td>
    </tr>
</table>
</td>
        <td background="engine/skins/images/tl_rb.gif"><img src="engine/skins/images/tl_rb.gif" width="6" height="1" border="0"></td>
    </tr>
    <tr>
        <td><img src="engine/skins/images/tl_lu.gif" width="4" height="6" border="0"></td>
        <td background="engine/skins/images/tl_ub.gif"><img src="engine/skins/images/tl_ub.gif" width="1" height="6" border="0"></td>
        <td><img src="engine/skins/images/tl_ru.gif" width="6" height="6" border="0"></td>
    </tr>
</table>
</div>
HTML;
    } else {
    if (@file_exists(ENGINE_DIR . '/data/config.php')) {
        echoheader("", "");
        echo <<<HTML
<form method="post" action="">
<div style="padding-top:5px;">
<table width="100%">
    <tr>
        <td width="4"><img src="engine/skins/images/tl_lo.gif" width="4" height="4" border="0"></td>
        <td background="engine/skins/images/tl_oo.gif"><img src="engine/skins/images/tl_oo.gif" width="1" height="4" border="0"></td>
        <td width="6"><img src="engine/skins/images/tl_ro.gif" width="6" height="4" border="0"></td>
    </tr>
    <tr>
        <td background="engine/skins/images/tl_lb.gif"><img src="engine/skins/images/tl_lb.gif" width="4" height="1" border="0"></td>
        <td style="padding:5px;" bgcolor="#FFFFFF">
<table width="100%">
    <tr>
        <td bgcolor="#EFEFEF" height="29" style="padding-left:10px;"><div class="navigation">Script Installation automatically locked</div></td>
    </tr>
</table>
<div class="unterline"></div>
<table width="100%">
    <tr>
        <td style="padding:2px;">注意，服务器上已经安装了Datalife Engine副本。如果您想重新安装程序，您必须手工删除 <b>/engine/data/config.php</b> 文件，通过FTP客户端或其他工具。<br /><br /></td>
    </tr>
    <tr>
        <td style="padding:2px;"><input class=buttons type=submit value="&nbsp;&nbsp;刷新&nbsp;&nbsp;"></td>
    </tr>
</table>
</td>
        <td background="engine/skins/images/tl_rb.gif"><img src="engine/skins/images/tl_rb.gif" width="6" height="1" border="0"></td>
    </tr>
    <tr>
        <td><img src="engine/skins/images/tl_lu.gif" width="4" height="6" border="0"></td>
        <td background="engine/skins/images/tl_ub.gif"><img src="engine/skins/images/tl_ub.gif" width="1" height="6" border="0"></td>
        <td><img src="engine/skins/images/tl_ru.gif" width="6" height="6" border="0"></td>
    </tr>
</table>
</div></form>
HTML;
        echofooter();
        die ();
    } 
    $_SESSION['xtm_install'] = 1;
    echoheader("", "");
    echo <<<HTML
<form method="post" action="">
<div style="padding-top:5px;">
<table width="100%">
    <tr>
        <td width="4"><img src="engine/skins/images/tl_lo.gif" width="4" height="4" border="0"></td>
        <td background="engine/skins/images/tl_oo.gif"><img src="engine/skins/images/tl_oo.gif" width="1" height="4" border="0"></td>
        <td width="6"><img src="engine/skins/images/tl_ro.gif" width="6" height="4" border="0"></td>
    </tr>
    <tr>
        <td background="engine/skins/images/tl_lb.gif"><img src="engine/skins/images/tl_lb.gif" width="4" height="1" border="0"></td>
        <td style="padding:5px;" bgcolor="#FFFFFF">
<table width="100%">
    <tr>
        <td bgcolor="#EFEFEF" height="29" style="padding-left:10px;"><div class="navigation">欢迎使用 DataLife Engine 系统安装向导</div></td>
    </tr>
</table>
<div class="unterline"></div>
<table width="100%">
    <tr>
        <td style="padding:2px;">欢迎安装Datalife Engine内容管理系统。本向导将引导您在几分钟的时间内将程序安装到服务器上。不过，我们强烈建议您查看下面的安装提示文档，以更好的安装本系统。<br><br>
安装之前，请确保将程序包内所有文件/文件夹都上传到了服务器正确位置，并为必要的文件/文件夹设置合适的读写权限。<br><br>
如果您想开启 SEO(搜索引擎优化) 功能，您要确保您的服务器支持 <b>modrewrite</b> 模块并允许使用。如果您要关闭此功能，请删除根目录下的 <b>.htaccess</b> 文件，并在安装过程中关闭此功能。<br><br>
<font color="red">警告:安装文件会向服务器注入数据库结构/创建管理员信息及系统基本信息的设定。成功安装后，请马上删除 <b>install.php</b> 文件防止被别人利用来攻击系统!</font><br><br>
享受您的站点，Datalife Engine系统。<br /><br /><a href="http://bbs.xtmseo.com"><span style="text-decoration: none">支持网站</span></a></td>
    </tr>
    <tr>
        <td style="padding:2px;"><input type=hidden name=action value="eula"><input class=buttons type=submit value="&nbsp;&nbsp;开始安装&nbsp;&nbsp;"></td>
    </tr>
</table>
</td>
        <td background="engine/skins/images/tl_rb.gif"><img src="engine/skins/images/tl_rb.gif" width="6" height="1" border="0"></td>
    </tr>
    <tr>
        <td><img src="engine/skins/images/tl_lu.gif" width="4" height="6" border="0"></td>
        <td background="engine/skins/images/tl_ub.gif"><img src="engine/skins/images/tl_ub.gif" width="1" height="6" border="0"></td>
        <td><img src="engine/skins/images/tl_ru.gif" width="6" height="6" border="0"></td>
    </tr>
</table>
</div></form>
HTML;
    } 
echofooter();
?>