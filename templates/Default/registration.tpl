<div class="pheading"><h2>
    [registration]加入我们[/registration]
    [validation]完成注册[/validation]
</h2></div>
<div class="baseform">
    <table class="tableform">
        <tr>
            <td colspan="2">
                [registration]
                <b>欢迎加入我们的网站!</b><br/>
                我们的网站是一个活跃、和谐的交流社区，加入我们：
                你可以获得评论，查看隐藏文字，上传下载附件，发布文章等权利.
                <br/>如果在注册过程中出现任何问题，请<a href="/index.php?do=feedback">点击此处</a>联系网站管理员.
                [/registration]
                [validation]
                <b>非常感谢您加入我们,</b><br/>
                您已经完成了我们网站的验证系统,请继续选填下面的个人信息。
                请点击下面的【确定】按钮完成整个注册过程，谢谢.
                [/validation]
            </td>
        </tr>
        [registration]
        <tr>
            <td class="label">
                名称:<span class="impot">*</span>
            </td>
            <td>
                <input type="text" name="name" id='name' style="width:175px; margin-right: 6px;" class="f_input"/><input
                    class="bbcodes" style="height: 22px; font-size: 11px;" title="检查用户名是否可用"
                    onclick="CheckLogin(); return false;" type="button" value="检查用户名"/>

                <div id='result-registration'></div>
            </td>
        </tr>
        <tr>
            <td class="label">
                密码:<span class="impot">*</span>
            </td>
            <td><input type="password" name="password1" class="f_input"/></td>
        </tr>
        <tr>
            <td class="label">
                重复密码:<span class="impot">*</span>
            </td>
            <td><input type="password" name="password2" class="f_input"/></td>
        </tr>
        <tr>
            <td class="label">E-Mail:<span class="impot">*</span></td>
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
            <td class="label">
                填写<br/>验证码:<span class="impot">*</span>
            </td>
            <td>
                <div>{reg_code}</div>
                <div><input type="text" name="sec_code" style="width:115px" class="f_input"/></div>
            </td>
        </tr>
        [/sec_code]
        [recaptcha]
        <tr>
            <td class="label">
                填写图片中的两组字母:<span class="impot">*</span>
            </td>
            <td>
                <div>{recaptcha}</div>
            </td>
        </tr>
        [/recaptcha]
        [/registration]
        [validation]
        <tr>
            <td class="label">全名:</td>
            <td><input type="text" name="fullname" class="f_input"/></td>
        </tr>
        <tr>
            <td class="label">居住地:</td>
            <td><input type="text" name="land" class="f_input"/></td>
        </tr>
        <tr>
            <td class="label">QQ号:</td>
            <td><input type="text" name="icq" class="f_input"/></td>
        </tr>
        <tr>
            <td class="label">头像:</td>
            <td><input type="file" name="image" style="width:304px; height:18px" class="f_input"/></td>
        </tr>
        <tr>
            <td class="label">个人简介:</td>
            <td><textarea name="info" style="width: 98%;" rows="8" class="f_textarea"/></textarea></td>
        </tr>
    {xfields}
        [/validation]
    </table>
    <div class="fieldsubmit">
        <button name="submit" class="fbutton" type="submit"><span>提交</span></button>
    </div>
</div>