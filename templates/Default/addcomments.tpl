<div id="addcform" class="baseform"
     style="display:[not-aviable=comments]none[/not-aviable][aviable=comments]block[/aviable];">
    <table class="tableform">
        [not-logged]
        <tr>
            <td class="label">
                名称:<span class="impot">*</span>
            </td>
            <td><input type="text" name="name" id="name" class="f_input"/></td>
        </tr>
        <tr>
            <td class="label">
                E-Mail:
            </td>
            <td><input type="text" name="mail" id="mail" class="f_input"/></td>
        </tr>
        [/not-logged]
        <tr>
            <td class="label">
                评论:
            </td>
            <td class="editorcomm">{editor}</td>
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
            <td class="label">
                验证码: <span class="impot">*</span>
            </td>
            <td>
                <div>{sec_code}</div>
                <div><input type="text" name="sec_code" id="sec_code" style="width:115px" class="f_input"/></div>
            </td>
        </tr>
        [/sec_code]
        [recaptcha]
        <tr>
            <td class="label">
                输入图片中的字母: <span class="impot">*</span>
            </td>
            <td>
                <div>{recaptcha}</div>
            </td>
        </tr>
        [/recaptcha]
    </table>
    <div class="fieldsubmit">
        <button type="submit" name="submit" class="fbutton"><span>[not-aviable=comments]提交[/not-aviable][aviable=comments]编辑[/aviable]</span>
        </button>
    </div>
</div>