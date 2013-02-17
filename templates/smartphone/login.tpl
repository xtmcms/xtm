[not-group=5]
<div class="panel">
    <div style="padding-top:2px; padding-left:5px;">欢迎您, <b>{login}</b>!</div>
    <div style="padding-top:5px; padding-bottom:5px; padding-left:22px;">
        <a href="{profile-link}">个人信息</a><br/>
        <a href="{pm-link}">短信息 ({new-pm} | {all-pm})</a><br/>
        <a href="{favorites-link}">收藏夹</a><br/>
        <a href="{stats-link}">站点统计</a><br/>
        <a href="{newposts-link}">最新文章</a>
    </div>
    <div style="padding-top:2px; padding-bottom:5px;"><a href="{logout-link}"><b>退出!</b></a></div>
    <div style="padding-bottom:5px;">您正在访问我们的手机视图. <a href="/index.php?action=mobiledisable">点击此处</a>查看完整视图.</div>
</div>
[/not-group]
[group=5]
<div class="panel">
    <form method="post">
    {login-method}&nbsp;&nbsp;&nbsp;<input type="text" name="login_name"
                                           style="width:103px; font-family:tahoma; font-size:11px;"><br/>
        密码: <input type="password" name="login_password" style="width:103px; font-family:tahoma; font-size:11px;">
        <input type="submit" value=" 提交 "><br/>
        <input name="login" type="hidden" id="login" value="submit">
    </form>
    <div style="padding-top:8px; padding-bottom:5px;"><a href="{registration-link}">加入我们!</a> <a
            href="{lostpassword-link}">忘记密码?</a></div>
    <div style="padding-bottom:5px;">您正在访问我们的手机视图. <a href="/index.php?action=mobiledisable">点击此处</a>查看完整视图.</div>
</div>
[/group]