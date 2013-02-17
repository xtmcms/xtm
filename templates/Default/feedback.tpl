<div class="pheading"><h2>联系我们</h2></div>
<div class="baseform">
    <table class="tableform">
        [not-logged]
        <tr>
            <td class="label">
                名称:<span class="impot">*</span>
            </td>
            <td><input type="text" maxlength="35" name="name" class="f_input"/></td>
        </tr>
        <tr>
            <td class="label">
                E-Mail:<span class="impot">*</span>
            </td>
            <td><input type="text" maxlength="35" name="email" class="f_input"/></td>
        </tr>
        [/not-logged]
        <tr>
            <td class="label">
                收件人:<span class="impot">*</span>
            </td>
            <td>{recipient}</td>
        </tr>
        <tr>
            <td class="label">
                标题:<span class="impot">*</span>
            </td>
            <td><input type="text" maxlength="45" name="subject" class="f_input"/></td>
        </tr>
        <tr>
            <td class="label" valign="top">
                内容:
            </td>
            <td><textarea name="message" style="width: 380px; height: 160px" class="f_textarea"/></textarea></td>
        </tr>
        [sec_code]
        <tr>
            <td class="label">
                验证码:<span class="impot">*</span>
            </td>
            <td>
                <div>{code}</div>
                <div><input type="text" maxlength="45" name="sec_code" style="width:115px" class="f_input"/></div>
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
    </table>
    <div class="fieldsubmit">
        <button name="send_btn" class="fbutton" type="submit"><span>提交</span></button>
    </div>
</div>