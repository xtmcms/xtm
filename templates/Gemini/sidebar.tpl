<script type="text/javascript">//<![CDATA[
$(function () {
    $("#slidemenu").UlMenu();
});
//]]></script>
<div id="rightmenu" class="block">
    <div class="dtop"><h4 class="btl"><span>Main</span> Category</h4></div>
    <ul id="slidemenu" class="reset">
        <li><a href="#">Software</a></li>
        <li><a href="#">Movie</a></li>
        <li><span class="sublnk">Music</span></li>
        <li class="submenu">
            <ul>
                <li><a href="#">Sub-item 3.1</a></li>
                <li><a href="#">Sub-item 3.2</a></li>
                <li><a href="#">Sub-item 3.3</a></li>
            </ul>
        </li>
        <li><span class="sublnk">Game</span></li>
        <li class="submenu">
            <ul>
                <li><a href="#">Sub-item 4.1</a></li>
                <li><a href="#">Sub-item 4.2</a></li>
                <li><a href="#">Sub-item 4.3</a></li>
            </ul>
        </li>
        <li><a href="#">Ebook</a></li>
        <li><a href="#">Template</a></li>
        <li><a href="#">Script</a></li>
        <li><a href="#">Wallpaper</a></li>
    </ul>
    <div class="linesbg">
        <ul class="reset">
            <li><a href="http://xtm-news.ru">xtm Official Site</a></li>
            <li><a href="/index.php?do=search&amp;mode=advanced">Advanced Search</a></li>
            <li><a href="/index.php?do=lastnews">Latest News</a></li>
            <li><a href="/index.php?action=mobile">Mobile Version</a></li>
            <li><a href="http://www.xtmstarter.com" target="_blank">xtm Userguide</a></li>
        </ul>
    </div>
</div>

<div id="popular" class="block redb">
    <div class="dcont">
        <h4 class="btl">Popular Posts</h4>
        <ul>{topnews}</ul>
    </div>
    <div class="thide dbtm">------</div>
</div>

<div id="bcalendar" class="block">
    <div class="dtop"><h4 class="btl">Calendar</h4></div>
    <div class="dcont">{calendar}</div>
</div>

<div id="change-skin" class="block">
    <div class="change-skin">
        <div class="rcol">{changeskin}</div>
        <h4 class="btl">Theme:</h4>
    </div>
</div>

{vote}

<div id="news-partner" class="block">
    <div class="dtop"><h4 class="btl"><span>xtmStarter</span> News</h4></div>
{inform_xtm}
</div>