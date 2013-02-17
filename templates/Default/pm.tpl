[pmlist]
<div class="pheading"><h2>信息列表</h2></div>
[/pmlist]
[newpm]
<div class="pheading"><h2>新信息</h2></div>
[/newpm]
[readpm]
<div class="pheading"><h2>阅读信息</h2></div>
[/readpm]
<div class="basecont">
    <div class="dpad">
        <div class="pm_status">
            <div class="pm_status_head">信息使用状态</div>
            <div class="pm_status_content">目前您的信息使用情况:
            {pm-progress-bar}
                您的账户已经用了{pm-limit}条信息的{proc-pm-limit}%
            </div>
        </div>
        <div style="padding-top:10px;">[inbox]收件箱[/inbox]<br/><br/>
            [outbox]发件箱[/outbox]<br/><br/>
            [new_pm]发送新信息[/new_pm]
        </div>
    </div>
    <br/>

    <div class="clr"></div>
    <br/>
    [pmlist]
    <div class="dpad">{pmlist}</div>
    [/pmlist]
    [newpm]
    <div class="baseform">
        <table class="tableform">
            <tr>
                <td class="label">
                    名称:
                </td>
                <td><input type="text" name="name" value="{author}" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label">
                    标题:<span class="impot">*</span>
                </td>
                <td><input type="text" name="subj" value="{subj}" class="f_input"/></td>
            </tr>
            <tr>
                <td class="label">
                    内容:<span class="impot">*</span>
                </td>
                <td class="editorcomm">
                {editor}<br/>

                    <div class="checkbox"><input type="checkbox" id="outboxcopy" name="outboxcopy" value="1"/> <label
                            for="outboxcopy">同时保存邮件到 "发件箱"</label></div>
                </td>
            </tr>
            [sec_code]
            <tr>
                <td class="label">
                    验证码:<span class="impot">*</span>
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
                    输入图片中的两组字母:<span class="impot">*</span>
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
            <button type="submit" name="add" class="fbutton"><span>提交</span></button>
            <input type="button" class="fbutton" onclick="xtmPMPreview()" title="预览" value="预览"/>
        </div>
    </div>
    [/newpm]
    [readpm]
    <div class="bcomment">
        <div class="dtop">
            <div class="lcol"><span><img src="{foto}" alt=""/></span></div>
            <div class="rcol">
                <span class="reply">[reply]<b>回复</b>[/reply]</span>
                <ul class="reset">
                    <li><h4>{author}</h4></li>
                    <li>{date}</li>
                </ul>
                <ul class="cmsep reset">
                    <li>用户组: {group-name}</li>
                    <li>QQ号: {icq}</li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>
        <div class="cominfo">
            <div class="dpad">
                <div class="comedit">
                    <ul class="reset">
                        <li>[complaint]反馈[/complaint]</li>
                        <li>[ignore]忽略[/ignore]</li>
                        <li>[del]删除[/del]</li>
                    </ul>
                </div>
                <ul class="cominfo reset">
                    <li>注册日期: {registration}</li>
                    <li>评论数量: {comm-num}</li>
                    <li>文章数量: {news-num}</li>
                </ul>
            </div>
            <span class="thide">^</span>
        </div>
        <div class="dcont">
            <h3 style="margin-bottom: 0.4em;">[reply]{subj}[/reply]</h3>
        {text}
            [signature]<br clear="all"/>

            <div class="signature">--------------------</div>
            <div class="slink">{signature}</div>
            [/signature]
            <div class="clr"></div>
        </div>
    </div>
    [/readpm]
</div>