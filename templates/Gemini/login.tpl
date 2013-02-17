[not-group=5]
<ul class="reset loginbox">
    <li class="lvsep"><a id="loginlink" href="#"><i>Hello, {login}!</i></a></li>
    <li class="loginbtn"><a href="{logout-link}"><b>Logout</b></a></li>
</ul>
<div id="logindialog" title="{login}" style="display:none;">
    <div class="userinfo">
        <div class="lcol">
            <div style="margin: 0" class="avatar"><a href="{profile-link}"><img src="{foto}" alt="{login}"/></a></div>
        </div>
        <div class="rcol">
            <ul class="reset">
                [admin-link]
                <li><a href="{admin-link}" target="_blank"><b>Admin CP</b></a></li>
                [/admin-link]
                <li><a href="{addnews-link}"><b>Add News</b></a></li>
                <li><a href="{pm-link}">PM: ({new-pm} | {all-pm})</a></li>
                <li><a href="{profile-link}">My Profile</a></li>
                <li><a href="{favorites-link}">My Bookmarks</a></li>
                <li><a href="{stats-link}">Statistics</a></li>
            </ul>
        </div>
        <div class="clr"></div>
    </div>
</div>
[/not-group]
[group=5]
<ul class="reset loginbox">
    <li class="lvsep"><a href="{registration-link}"><i>Register</i></a></li>
    <li class="loginbtn"><a id="loginlink" href="#"><b>Login</b></a></li>
</ul>
<div id="logindialog" title="Member Login" style="display:none;">
    <form method="post" action="">
        <div class="logform">
            <ul class="reset">
                <li class="lfield"><label for="login_name">{login-method}</label><br/><input type="text"
                                                                                             name="login_name"
                                                                                             id="login_name"/></li>
                <li class="lfield lfpas"><label for="login_password">Password (<a href="{lostpassword-link}">Forgot?</a>):</label><br/><input
                        type="password" name="login_password" id="login_password"/></li>
                <li class="lfield lfchek"><input type="checkbox" name="login_not_save" id="login_not_save"
                                                 value="1"/><label for="login_not_save">&nbsp;Do not remember me</label>
                </li>
                <li class="lbtn">
                    <button class="fbutton" onclick="submit();" type="submit" title="Login"><span>Login</span></button>
                </li>
            </ul>
            <input name="login" type="hidden" id="login" value="submit"/>
        </div>
    </form>
</div>
[/group]