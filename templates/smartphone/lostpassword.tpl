<div class="title"><h2>找回密码</h2></div>
<div class="post">
    <div class="news">
        <table width="100">
            <tr align="left">
                <td width="70" height="25">
                    <nobr>用户名或邮件:  </nobr>
                </td>
                <td height="25"><input type="text" name="lostname"
                                       style="width:165px; font-family:tahoma; font-size:11px;"></td>
                <td height="25"></td>
            </tr>
            [sec_code]
            <tr>
                <td align="left">验证码:</td>
                <td>{code}</td>
            </tr>
            <tr>
                <td align="left">填写验证码:</td>
                <td><input style="font-family:tahoma; font-size:11px;" name="sec_code" size="7"></td>
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
            <tr>
                <td></td>
                <td height="25"><input type="submit" value=" 提交 "></td>
            </tr>
        </table>
    </div>
</div>