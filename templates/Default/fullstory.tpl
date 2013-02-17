{poll}
<div class="base fullstory">
    <div class="dpad">
        <h3 class="btl"><span id="news-title">{title}</span></h3>

        <div class="bhinfo">
            [not-group=5]
            <ul class="isicons reset">
                <li>[edit]<img src="{THEME}/xtmimages/editstore.png" title="编辑" alt="编辑"/>[/edit]</li>
                <li>{favorites}</li>
                <li>[complaint]<img src="{THEME}/images/complaint.png" title="反馈" alt="反馈"/>[/complaint]</li>
            </ul>
            [/not-group]
			<span class="baseinfo radial">
				作者: {author} 日期： [day-news]{date}[/day-news]
			</span>
            [rating]
            <div class="ratebox">
                <div class="rate">{rating}</div>
            </div>
            [/rating]
        </div>
        <div class="maincont">
        {full-story}
            <div class="clr"></div>
            [edit-date]<p class="editdate"><br/><i>编辑者: <b>{editor}</b> - {edit-date}
            <br/>[edit-reason]编辑原因: {edit-reason}[/edit-reason]</i></p>[/edit-date]
            [tags]<br/>

            <p class="basetags"><i>标签: {tags}</i></p>[/tags]
        </div>
        [pages]
        <div class="storenumber">{pages}</div>
        [/pages]
    </div>
    [related-news]
    <div class="related">
        <div class="dtop"><span><b>相关文章:</b></span></div>
        <ul class="reset">
        {related-news}
        </ul>
        <br/>
    </div>
    [/related-news]
    <div class="mlink">
        <span class="argback"><a href="javascript:history.go(-1)"><b>返回上页</b></a></span>
        <span class="argviews"><span title="浏览次数: {views}"><b>{views}</b></span></span>
        <span class="argcoms">[com-link]<span
                title="评论数量: {comments-num}"><b>{comments-num}</b></span>[/com-link]</span>

        <div class="mlarrow">&nbsp;</div>
        <p class="lcol argcat">文章分类: {link-category}</p>
    </div>
    [group=5]
    <div class="clr berrors" style="margin: 0;">
        亲爱的访客，你还没有登录我们的站点.<br/>
        欢迎你 <a href="/index.php?do=register">加入我们</a> 或者登录站点 来获得更多的访问和交流权限.
    </div>
    [/group]
</div>
<div class="pheading">
    <h2 class="lcol">评论:</h2>
    <a class="addcombtn" href="#" onclick="$('#addcform').toggle();return false;"><b>添加评论</b></a>

    <div class="clr"></div>
</div>
{addcomments}
{comments}
{navigation}