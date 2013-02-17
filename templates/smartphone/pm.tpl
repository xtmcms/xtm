<div class="title"><h2>站内短消息</h2></div>
<div class="post">
    <div class="news">[inbox]收件箱[/inbox] <br/> [outbox]发件箱[/outbox] <br/> [new_pm]发送新消息[/new_pm]</div>
</div>
<div class="panel">
    &nbsp;
</div>

[pmlist]
<div class="title"><h2>消息列表</h2></div>
<div class="post">
    <div class="news">{pmlist}</div>
</div>
<div class="panel">
    &nbsp;
</div>
[/pmlist]
[newpm]
<div class="title"><h2>发送新消息</h2></div>
<div class="post">
    <table width="450" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="25">收件人:</td>
            <td height="25"><input type="text" name="name" value="{author}" class="f_input"/></td>
        </tr>
        <tr>
            <td height="25">标题:</td>
            <td height="25"><input type="text" name="subj" value="{subj}" class="f_input"/></td>
        </tr>
        <tr>
            <td colspan="2"><textarea name="comments" id="comments" cols="40" style="height:80px;"/>{text}</textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="news"><input type="checkbox" name="outboxcopy" value="1"/> 保存邮件到 "发件箱"</td>
        </tr>
        [sec_code]
        <tr>
            <td height="25">验证码:</td>
            <td height="25"><br/>{sec_code}</td>
        </tr>
        <tr>
            <td height="25">填写验证码:</td>
            <td height="25"><input type="text" name="sec_code" id="sec_code" style="width:115px" class="f_input"/></td>
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
            <td colspan="2"><br/><input class="bbcodes" type="submit" name="add" value="发送"/>&nbsp;&nbsp;<input
                    class="bbcodes" type="button" onclick="xtmPMPreview()" value="预览"/></td>
        </tr>
    </table>
</div>
<div class="panel">
    &nbsp;
</div>
[/newpm]
[readpm]
<div class="title"><strong>{subj}</strong></div>
<div class="post">
    <div class="news">{text}</div>
</div>
<div class="panel">
    作者: <strong>{author}</strong> | [reply]回复[/reply] | [del]删除[/del]
</div>
[/readpm]