<div class="panel">
    [registration]站点注册[/registration][validation]完成注册[/validation]
</div>
<div class="post">
    [registration]
    <strong>欢迎加入我们!</strong><br/><br/>加入我们可以更好的与其他用户交流，并且获得发布文章，评论，站内信息，收藏夹等更多权限.<br/><br/>如果在注册过程中遇到问题，请通过联系我们页面反馈给我们.<br/><br/>
    [/registration]

    [validation]
    <strong>即将完成注册</strong>,<br/><br/>感谢您验证了您的邮箱地址，请选填下面的选项并按确定按钮完成注册.<br/><br/>
    [/validation]
</div>
<div class="panel">&nbsp;</div>
<table width="100%">
    [registration]
    <tr>
        <td height="25" width="150">用户名:</td>
        <td><input type="text" name="name" id='name' class="f_input"/><br/><input
                style="height:18px; font-family:tahoma; font-size:11px; border:1px solid #DFDFDF; background: #FFFFFF"
                title="验证用户名是否可用" onclick="CheckLogin(); return false;" type="button" value="检查用户名"/>

            <div id='result-registration'></div>
        </td>
    </tr>
    <tr>
        <td height="25">密码:</td>
        <td><input type="password" name="password1" class="f_input"/></td>
    </tr>
    <tr>
        <td height="25">重复密码:</td>
        <td><input type="password" name="password2" class="f_input"/></td>
    </tr>
    <tr>
        <td height="25">E-Mail:</td>
        <td><input type="text" name="email" class="f_input"/></td>
    </tr>
    [question]
    <tr>
        <td class="label">
            验证问题:
        </td>
        <td>
            <div>{question}</div>
        </td>
    </tr>
    <tr>
        <td class="label">
            填写答案:<span class="impot">*</span>
        </td>
        <td>
            <div><input type="text" name="question_answer" class="f_input"/></div>
        </td>
    </tr>
    [/question]
    [sec_code]
    <tr>
        <td colspan="2" height="25"><strong>验证码</strong></td>
    </tr>
    <tr>
        <td height="25">验证码:</td>
        <td>{reg_code}</td>
    </tr>
    <tr>
        <td height="25">填写验证码:</td>
        <td><input type="text" name="sec_code" style="width:115px" class="f_input"/></td>
    </tr>
    [/sec_code]
    [recaptcha]
    <tr>
        <td colspan="2" height="25"><strong>填写图片中的两组字母:</strong></td>
    </tr>
    <tr>
        <td colspan="2" height="25">{recaptcha}</td>
    </tr>
    [/recaptcha]
    [/registration]
    [validation]
    <tr>
        <td height="25">全名:</td>
        <td><input type="text" name="fullname" class="f_input"/></td>
    </tr>
    <tr>
        <td height="25">
            <nobr>居住地:  </nobr>
        </td>
        <td><input type="text" name="land" class="f_input"/></td>
    </tr>
    <tr>
        <td height="25">QQ号:</td>
        <td><input type="text" name="icq" class="f_input"/></td>
    </tr>
    <tr>
        <td height="25">头像:</td>
        <td><input type="file" name="image" style="width:304px; height:18px" class="f_input"/></td>
    </tr>
    <tr>
        <td height="25">个人信息:</td>
        <td><textarea name="info" style="width:98%; height:70px"/></textarea></td>
    </tr>
{xfields}
    [/validation]
    </div>
    <tr>
        <td height="25">&nbsp;</td>
        <td>
            <div style="padding-top:2px; padding-left:0px;">
                <input type="submit" value=" 提交 "></div>
        </td>
    </tr>
</table>