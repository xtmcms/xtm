<div class="title"><strong>用户信息: {usertitle}</strong></div>
<div class="panel">
    <div class="news">全名: {fullname}
        <br/>注册日期: {registration}
        <br/>最新登录: {lastdate}
        <br/>用户组:<font color="red">{status}</font>[time_limit] 期限: {time_limit}[/time_limit]
        <br/><br/>居住地: {land}
        <br/>QQ号: {icq}
        <br/>个人信息:<br/>{info}<br/><br/>文章数量:{news-num}<br/>[ {news} ] [rss]<img src="{THEME}/css/rss_icon.gif"
                                                                                border="0"/>[/rss]
        <br/><br/>评论数量: {comm-num}<br/>[ {comments} ]<br/><br/>[ {email} ]<br/>[ {pm} ]<br/>{edituser}</div>
</div>


[not-logged]
<div id="options" style="display:none;">
    <div class="title"><strong>编辑账户</strong></div>
    <div class="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="120" height="25">E-Mail:</td>
                <td><input type="text" name="email" value="{editmail}" class="f_input"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>{hidemail}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="25">全名:</td>
                <td><input type="text" name="fullname" value="{fullname}" class="f_input"/></td>
            </tr>
            <tr>
                <td height="25">
                    <nobr>居住地:  </nobr>
                </td>
                <td><input type="text" name="land" value="{land}" class="f_input"/></td>
            </tr>
            <tr>
                <td height="25">QQ号:</td>
                <td><input type="text" name="icq" value="{icq}" class="f_input"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="25">旧密码:</td>
                <td><input type="password" name="altpass" class="f_input"/></td>
            </tr>
            <tr>
                <td height="25">新密码:</td>
                <td><input type="password" name="password1" class="f_input"/></td>
            </tr>
            <tr>
                <td height="25">重复密码:</td>
                <td><input type="password" name="password2" class="f_input"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="25">锁定 IP:<br/><textarea name="allowed_ip" style="width:97%; height:70px"
                                                     class="f_textarea"/>{allowed-ip}</textarea><br/>当前 IP:
                    <strong>{ip}</strong><br/><br/><font style="color:red;font-size:10px;">* 警告!
                        如果你不清楚该功能，请不要填写任何信息.通过本功能，可以对您账户添加登录限制，只有通过指定ip才能登录站点.你可以添加多个ip地址，每行一个ip地址或ip段，如下例所示.示例:
                        192.48.25.71 或 129.42.*.*</font></td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="25">头像:</td>
                <td><input type="file" name="image" class="f_input"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="checkbox" name="del_foto" value="yes"/>  删除头像</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="25">个人信息:<br/><textarea name="info" style="width:97%; height:70px"
                                                    class="f_textarea"/>{editinfo}</textarea></td>
            </tr>
            <tr>
                <td height="25">签名:<br/><textarea name="signature" style="width:97%; height:70px"
                                                  class="f_textarea"/>{editsignature}</textarea></td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        {xfields}
            <tr>
                <td colspan="2" height="25">
                    <div style="padding-top:2px; padding-left:0px;">
                        <input type="submit" value=" 提交 "/><br/>
                        <input name="submit" type="hidden" id="submit" value="submit"/>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
[/not-logged]