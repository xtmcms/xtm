[short-preview]
<div class="base shortstory">
    <div class="infbtn">
        <span class="thide" title="Article info">Article info</span>
    </div>
    <span class="argbox">[day-news]<i>{date}</i>[/day-news]</span>

    <h3 class="btl">[full-link]{title}[/full-link]</h3>

    <p class="argcat"><i>Category: {link-category}</i></p>

    <div class="maincont">
    {short-story}
        <div class="clr"></div>
        [tags]<p class="basetags"><i>Tags: {tags}</i></p>[/tags]
    </div>
    <div class="mlink">
        <span class="argmore">[full-link]<b>Read More</b>[/full-link]</span>
        [not-group=5]<span class="argedit">[edit]<i>Edit</i>[/edit]</span>[/not-group]
        <span class="argcoms"><i>Comments: [com-link]{comments-num}[/com-link]</i></span>
    </div>
</div>
[/short-preview]
[full-preview]
<div class="base fullstory">
    <div class="infbtn">
        <span class="thide" title="Article info">Article info</span>
    </div>
    <span class="argbox">[day-news]<i>{date}</i>[/day-news]</span>

    <h3 class="btl">{title}</h3>

    <p class="argcat"><i>Category: {link-category}</i></p>

    <div class="maincont">
    {full-story}
        <div class="clr"></div>
        [tags]<p class="basetags"><i>Tags: {tags}</i></p>[/tags]
    </div>
    <div class="mlink">
        <span class="argback"><a href="javascript:history.go(-1)"><b>Go Back</b></a></span>
        [not-group=5]<span class="argedit">[edit]<i>Edit</i>[/edit]</span>[/not-group]
        <span class="argcoms"><i>Comments: {comments-num}</i></span>
    </div>
</div>
[/full-preview]
[static-preview]
<h2 class="heading">{description}</h2>
<div class="basecont">
{static}
    <br clear="all"/>

    <div class="storenumber">{pages}</div>
</div>
[/static-preview]
