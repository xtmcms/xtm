<div class="title"><h2>{title}</h2></div>
<div class="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        [not-logged]
        <tr>
            <td height="25">名称:</td>
            <td><input type="text" name="name" id="name" class="f_input"/></td>
        </tr>
        <tr>
            <td height="25">E-Mail:</td>
            <td><input type="text" name="mail" id="mail" class="f_input"/></td>
        </tr>
        [/not-logged]
        <tr>
            <td colspan="2"><textarea style="width:97%;height:80px;" name="comments" id="comments"
                                      class="f_textarea"/>{text}</textarea><br/></td>

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
                <div><input type="text" name="question_answer" id="question_answer" class="f_input"/></div>
            </td>
        </tr>
        [/question]
        [sec_code]
        <tr>
            <td>验证码:</td>
            <td><br/>{sec_code}</td>
        </tr>
        <tr>
            <td height="35">输入验证码:</td>
            <td><input type="text" name="sec_code" id="sec_code" style="width:115px" class="f_input"/></td>
        </tr>
        [/sec_code]
        [recaptcha]
        <tr>
            <td colspan="2" height="25"><strong>输入图片中的两组字母:</strong></td>
        </tr>
        <tr>
            <td colspan="2" height="25">{recaptcha}</td>
        </tr>
        [/recaptcha]
        <tr>
            <td colspan="2"><br/>

                <input name="submit" type="submit" value=" 提交 "/></td>
        </tr>
    </table>
</div>