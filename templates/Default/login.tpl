[not-group=5]
<ul class="reset loginbox">
    <li class="loginava">
        <a href="{profile-link}">
            <img src="{foto}" alt="{login}"/>
            <b>&nbsp;</b>
        </a>
    </li>
    <li class="loginbtn">
        <a class="lbn" id="logbtn" href="#"><b>{login}</b></a>
        <a class="thide lexit" href="{logout-link}">登出</a>

        <div id="logform" class="radial">
            <ul class="reset loginenter">
                [admin-link]
                <li><a href="{admin-link}" target="_blank"><b>管理面板</b></a></li>
                [/admin-link]
                <li><a href="{profile-link}">个人信息</a></li>
                <li><a href="{favorites-link}">收藏夹 ({favorite-count})</a></li>
                <li><a href="{newposts-link}">未读文章</a></li>
                <li><a href="/?do=lastcomments">最新评论</a></li>
                <li><a href="{stats-link}">站点统计</a></li>
            </ul>
        </div>
    </li>
    <li class="lvsep"><a href="{addnews-link}">添加文章</a></li>
    <li class="lvsep"><a class="radial" href="{pm-link}">{new-pm}</a><a href="{pm-link}">短消息</a></li>
</ul>
[/not-group]
[group=5]
<ul class="reset loginbox">
    <li class="loginbtn">
        <a class="lbn" id="logbtn" href="#"><b>登录</b></a>

        <form method="post" action="">
            <div id="logform" class="radial">
                <ul class="reset">
                    <li class="lfield"><label for="login_name">{login-method}</label><input type="text"
                                                                                            name="login_name"
                                                                                            id="login_name"/></li>
                    <li class="lfield lfpas"><label for="login_password">密码 (<a
                            href="{lostpassword-link}">忘记了?</a>):</label><input type="password" name="login_password"
                                                                                id="login_password"/></li>
                    <li class="lfield lfchek"><input type="checkbox" name="login_not_save" id="login_not_save"
                                                     value="1"/><label for="login_not_save">&nbsp;不保留登录信息</label></li>
                    <li class="lbtn">
                        <button class="fbutton" onclick="submit();" type="submit" title="登录"><span>登录</span></button>
                    </li>
                </ul>
                <input name="login" type="hidden" id="login" value="submit"/>
            </div>
        </form>
    </li>
    <li class="lvsep"><a href="{registration-link}">加入我们</a></li>
</ul>
[/group]