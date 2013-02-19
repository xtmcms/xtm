<link rel="stylesheet" type="text/css" href="lib/skins/chosen/chosen.css"/>
<script type="text/javascript" src="lib/skins/chosen/chosen.js"></script>
<script type="text/javascript">
    $(function () {
        $('#category').chosen({allow_single_deselect:true, no_results_text: '没有相关分类'});
    });
</script>
<div class="pheading"><h2>发布文章</h2></div>
<div class="baseform">
    <table class="tableform">
        <tr>
            <td class="label">
                标题:<span class="impot">*</span>
            </td>
            <td><input type="text" name="title" value="{title}" maxlength="150" class="f_input"/></td>
        </tr>
        [urltag]
        <tr>
            <td class="label">URL 链接:</td>
            <td><input type="text" name="alt_name" value="{alt-name}" maxlength="150" class="f_input"/></td>
        </tr>
        [/urltag]
        <tr>
            <td class="label">
                选择分类:<span class="impot">*</span>
            </td>
            <td>{category}</td>
        </tr>
        <tr>
            <td colspan="2">
                <b>文章摘要: <span class="impot">*</span></b> (必填)
                [not-wysywyg]
                <div class="bb-editor">
                {bbcode}
                    <textarea name="short_story" id="short_story" onfocus="setFieldName(this.name)" rows="15"
                              class="f_textarea">{short-story}</textarea>
                </div>
                [/not-wysywyg]
            {shortarea}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b>文章全文:</b> (选填)
                [not-wysywyg]
                <div class="bb-editor">
                {bbcode}
                    <textarea name="full_story" id="full_story" onfocus="setFieldName(this.name)" rows="20"
                              class="f_textarea">{full-story}</textarea>
                </div>
                [/not-wysywyg]
            {fullarea}
            </td>
        </tr>
    {xfields}
        <tr>
            <td class="label">添加文章标签:</td>
            <td><input type="text" name="tags" id="tags" value="{tags}" maxlength="150" class="f_input"
                       autocomplete="off"/></td>
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
                <div>{sec_code}</div>
                <div><input type="text" name="sec_code" id="sec_code" style="width:115px" class="f_input"/></div>
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
        <tr>
            <td colspan="2">{admintag}</td>
        </tr>
    </table>
    <div class="fieldsubmit">
        <button name="add" class="fbutton" type="submit"><span>提交</span></button>
        <button name="nview" onclick="preview()" class="fbutton" type="submit"><span>预览</span></button>
    </div>
</div>