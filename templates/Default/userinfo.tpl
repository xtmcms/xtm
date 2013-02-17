<div class="pheading">
    <h2 class="lcol">个人信息: <span>{usertitle}</span></h2>

    <div class="ratebox">
        <div class="rate">{rate}</div>
        <span>评级:</span></div>
    <div class="clr"></div>
</div>
<div class="basecont">
    <div class="dpad">
        <div class="userinfo">
            <div class="lcol">
                <div class="avatar"><img src="{foto}" alt=""/></div>
                <ul class="reset">
                    <li>{email}</li>
                    [not-group=5]
                    <li>{pm}</li>
                    [/not-group]
                </ul>
            </div>
            <div class="rcol">
                <ul>
                    <li><span class="grey">全名:</span> <b>{fullname}</b></li>
                    <li><span class="grey">用户组:</span> {status} [time_limit]&nbsp;到期日: {time_limit}[/time_limit]</li>
                    <li><span class="grey">QQ号:</span> <b>{icq}</b></li>
                </ul>
                <ul class="ussep">
                    <li><span class="grey">文章数量:</span> <b>{news-num}</b> [ {news} ][rss]<img
                            src="{THEME}/images/rss.png" alt="rss" style="vertical-align: middle; margin-left: 5px;"/>[/rss]
                    </li>
                    <li><span class="grey">评论数量:</span> <b>{comm-num}</b> [ {comments} ]</li>
                    <li><span class="grey">注册日期:</span> <b>{registration}</b></li>
                    <li><span class="grey">最新登录:</span> <b>{lastdate}</b></li>
                    <li><span class="grey">状态:</span> [online]<img src="{THEME}/images/online.png"
                                                                   style="vertical-align: middle;" title="当前在线"
                                                                   alt="当前在线"/>[/online][offline]<img
                            src="{THEME}/images/offline.png" style="vertical-align: middle;" title="已经下线" alt="已经下线"/>[/offline]
                    </li>
                </ul>
                <ul class="ussep">
                    <li><span class="grey">居住地:</span> {land}</li>
                    <li><span class="grey">个人信息:</span> {info}</li>
                </ul>
                <span class="small">[not-logged] [ {edituser} ] [/not-logged]</span>
            </div>
            <div class="clr"></div>
        </div>
    </div>
</div>
[not-logged]
<div id="options" style="display:none;">
    <br/><br/>

    <div class="pheading"><h2>编辑账户</h2></div>
    <div class="baseform">
        <table class="tableform">
            <tr>
                <td class="label">全名:</td>
                <td><input type="text" name="fullname" value="{fullname}" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label">E-Mail:</td>
                <td><input type="text" name="email" value="{editmail}" class="f_input"/><br/>

                    <div class="checkbox">{hidemail}</div>
                    <div class="checkbox"><input type="checkbox" id="subscribe" name="subscribe" value="1"/> <label
                            for="subscribe">取消全部订阅</label></div>
                </td>
            </tr>
            <tr>
                <td class="label">居住地:</td>
                <td><input type="text" name="land" value="{land}" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label">忽略名单:</td>
                <td>{ignore-list}</td>
            </tr>
            <tr>
                <td class="label">QQ号:</td>
                <td><input type="text" name="icq" value="{icq}" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label">旧密码:</td>
                <td><input type="password" name="altpass" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label">新密码:</td>
                <td><input type="password" name="password1" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label">重复密码:</td>
                <td><input type="password" name="password2" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label" valign="top">锁定登录 IP:<br/>当前 IP: {ip}</td>
                <td>
                    <div><textarea name="allowed_ip" style="width:98%;" rows="5"
                                   class="f_textarea">{allowed-ip}</textarea></div>
                    <div>
					<span class="small" style="color:red;">
					* 警告! 如果你不清楚该功能，请不要填写任何信息.
					通过本功能，可以对您账户添加登录限制，只有通过指定ip才能登录站点.
					你可以添加多个ip地址，每行一个ip地址或ip段，如下例所示.
					<br/>
					示例: 192.48.25.71 或 129.42.*.*</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="label">头像:</td>
                <td>添加头像: <input type="file" name="image" class="f_input"/><br/><br/>
                    使用 <a href="http://www.gravatar.com/" target="_blank">Gravatar</a>: <input type="text"
                                                                                               name="gravatar"
                                                                                               value="{gravatar}"
                                                                                               class="f_input"/>
                    (请输出你在Gravatar注册的E-Mail)
                    <br/><br/>

                    <div class="checkbox"><input type="checkbox" name="del_foto" id="del_foto" value="yes"/> <label
                            for="del_foto">删除头像</label></div>
                </td>
            </tr>
            <tr>
                <td class="label">个人信息:</td>
                <td><textarea name="info" style="width:98%;" rows="5" class="f_textarea">{editinfo}</textarea></td>
            </tr>
            <tr>
                <td class="label">签名:</td>
                <td><textarea name="signature" style="width:98%;" rows="5" class="f_textarea">{editsignature}</textarea>
                </td>
            </tr>
        {xfields}
        </table>
        <div class="fieldsubmit">
            <input class="fbutton" type="submit" name="submit" value="提交"/>
        </div>
    </div>
</div>
[/not-logged]