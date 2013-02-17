<div class="pheading"><h2>找回密码</h2></div>
<div class="baseform">
    <table class="tableform">
        <tr>
            <td class="label">
                用户名或 E-Mail:
            </td>
            <td><input class="f_input" type="text" name="lostname"/></td>
        </tr>
        [sec_code]
        <tr>
            <td class="label">
                填写<br/>验证码:<span class="impot">*</span>
            </td>
            <td>
                <div>{code}</div>
                <div><input class="f_input" style="width:115px" maxlength="45" name="sec_code" size="14"/></div>
            </td>
        </tr>
        [/sec_code]
        [recaptcha]
        <tr>
            <td class="label">
                填写图片中,<br/>两组字母:<span class="impot">*</span>
            </td>
            <td>
                <div>{recaptcha}</div>
            </td>
        </tr>
        [/recaptcha]
    </table>
    <div class="fieldsubmit">
        <button name="submit" class="fbutton" type="submit"><span>提交</span></button>
    </div>
</div>