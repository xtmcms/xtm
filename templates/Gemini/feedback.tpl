<h2 class="heading">Contact Form</h2>
<div class="brdform">
    <div class="baseform">
        <table class="tableform">
            [not-logged]
            <tr>
                <td class="label">
                    Your Name:<span class="impot">*</span>
                </td>
                <td><input type="text" maxlength="35" name="name" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label">
                    Your E-Mail:<span class="impot">*</span>
                </td>
                <td><input type="text" maxlength="35" name="email" class="f_input"/></td>
            </tr>
            [/not-logged]
            <tr>
                <td class="label">
                    Recipient:<span class="impot">*</span>
                </td>
                <td>{recipient}</td>
            </tr>
            <tr>
                <td class="label">
                    Subject:<span class="impot">*</span>
                </td>
                <td><input type="text" maxlength="45" name="subject" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label" valign="top">
                    Message:
                </td>
                <td><textarea name="message" style="width: 380px; height: 160px" class="f_textarea"/></textarea></td>
            </tr>
            [sec_code]
            <tr>
                <td class="label">
                    Security Code:<span class="impot">*</span>
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
                    Security Code: <span class="impot">*</span>
                </td>
                <td>
                    <div>{recaptcha}</div>
                </td>
            </tr>
            [/recaptcha]
            [question]
            <tr>
                <td class="label">
                    Security Question:
                </td>
                <td>
                    <div>{question}</div>
                </td>
            </tr>
            <tr>
                <td class="label">
                    Answer:<span class="impot">*</span>
                </td>
                <td>
                    <div><input type="text" name="question_answer" id="question_answer" class="f_input"/></div>
                </td>
            </tr>
            [/question]
        </table>
        <div class="fieldsubmit">
            <button name="send_btn" class="fbutton" type="submit"><span>Send</span></button>
        </div>
    </div>
</div>