[short-preview]
<div class="base shortstory">
    <div class="dpad">
        <h3 class="btl">[full-link]{title}[/full-link]</h3>

        <div class="bhinfo">
			<span class="baseinfo radial">
				作者: {author} 日期： [day-news]{date}[/day-news]
			</span>
        </div>
        <div class="maincont">
        {short-story}
            <div class="clr"></div>
        </div>
    </div>
    <div class="mlink">
        <span class="argmore">[full-link]<b>全文</b>[/full-link]</span>
        <span class="argviews"><span title="浏览次数: {views}"><b>{views}</b></span></span>
        <span class="argcoms">[com-link]<span
                title="评论数量: {comments-num}"><b>{comments-num}</b></span>[/com-link]</span>

        <div class="mlarrow">&nbsp;</div>
        <p class="lcol argcat">文章分类: {link-category}</p>
    </div>
</div>
[/short-preview]
[full-preview]
<div class="base fullstory">
    <div class="dpad">
        <h3 class="btl">{title}</h3>

        <div class="bhinfo">
			<span class="baseinfo radial">
				作者: {author} 日期： [day-news]{date}[/day-news]
			</span>
        </div>
        <div class="maincont">
        {full-story}
            <div class="clr"></div>
        </div>
    </div>
    <div class="mlink">
        <span class="argback"><a href="javascript:history.go(-1)"><b>返回上页</b></a></span>
        <span class="argviews"><span title="浏览次数: {views}"><b>{views}</b></span></span>
        <span class="argcoms">[com-link]<span
                title="评论数量: {comments-num}"><b>{comments-num}</b></span>[/com-link]</span>

        <div class="mlarrow">&nbsp;</div>
        <p class="lcol argcat">文章分类: {link-category}</p>
    </div>
</div>
[/full-preview]
[static-preview]
<div class="basecont">
    <div class="dpad">
        <h2 class="heading">{description}</h2>
    {static}
        <br clear="all"/>

        <div class="storenumber">{pages}</div>
    </div>
</div>
[/static-preview]
