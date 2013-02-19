<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{headers}
    <link rel="shortcut icon" href="{THEME}/images/favicon.ico"/>
    <link media="screen" href="{THEME}/style/styles.css" type="text/css" rel="stylesheet"/>
    <link media="screen" href="{THEME}/style/lib.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="{THEME}/js/libs.js"></script>
</head>
<body>
{AJAX}
<div id="toolbar" class="wwide">
    <div class="wrapper">
        <div class="dpad">
            <span class="htmenu"><a href="#"
                                    onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.xtmseo.com');">设为首页</a><span>|</span><a
                    href="#" rel="sidebar"
                    onclick="window.external.AddFavorite(location.href,'xtmseo.com'); return false;">加入收藏</a></span>
        {login}
        </div>
    </div>
    <div class="shadow">&nbsp;</div>
</div>
<div class="wrapper">
    <div id="header" class="dpad">
        <h1><a class="thide" href="/index.php" title="DataLife Engine 中文演示网站">DataLife Engine 中文演示网站</a></h1>

        <form action="" name="searchform" method="post">
            <input type="hidden" name="do" value="search"/>
            <input type="hidden" name="subaction" value="search"/>
            <ul class="searchbar reset">
                <li class="lfield"><input id="story" name="story" value="搜索..."
                                          onblur="if(this.value=='') this.value='搜索...';"
                                          onfocus="if(this.value=='搜索...') this.value='';" type="text"/></li>
                <li class="lbtn"><input title="搜索" alt="搜索" type="image" src="{THEME}/images/spacer.gif"/></li>
            </ul>
        </form>
        <div class="headlinks">
            <ul class="reset">
                <li><a href="/index.php">首页</a></li>
                [group=5]
                <li><a href="/index.php?do=register">注册</a></li>
                [/group]
                <li><a href="/index.php?do=feedback">联系我们</a></li>
                <li><a href="/index.php?do=rules">站规</a></li>
            </ul>
        </div>
    </div>
    <div class="himage">
        <div class="himage">
            <div class="himage dpad">
                <h2>欢迎使用Datalife Engine,<br/>
                    xtm是一款支持富媒体的多用户内容管理系统<br/>
                    如果在使用中遇到任何问题，请访问www.xtmseo.com.</h2>
            </div>
        </div>
    </div>
    <div class="mbar" id="menubar">
        <div class="mbar">
            <div class="mbar dpad">
                <div class="menubar">
                {include file="topmenu.tpl"}
                </div>
            </div>
        </div>
    </div>
    <div class="wtop wsh">
        <div class="wsh">
            <div class="wsh">&nbsp;</div>
        </div>
    </div>
    <div class="shadlr">
        <div class="shadlr">
            <div class="container">
                <div class="vsep">
                    <div class="vsep">
                        <div id="midside" class="rcol">
                            [not-aviable=main]{speedbar}[/not-aviable]
                            <div class="hbanner">
                                <div class="dpad" align="center">{banner_header}</div>
                                <div class="dbtm"><span class="thide">站点广告</span></div>
                            </div>
                            [sort]
                            <div class="sortn dpad">
                                <div class="sortn">{sort}</div>
                            </div>
                            [/sort]
                        {info}
                        {content}
                        </div>
                        <div id="sidebar" class="lcol">
                        {include file="sidebar.tpl"}
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
                <div class="footbox">
                    <div class="rcol">
                        <div class="btags">
                        {tags}
                            <div class="shadow">&nbsp;</div>
                        </div>
                    </div>
                    <div class="lcol">
                        <p>您目前访问的网站<br/>
                            正在使用最优秀的内容管系统<br/>
                            <b>DataLife Engine</b>.<br/>
                            当前版本 9.8.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wbtm wsh">
        <div class="wsh">
            <div class="wsh">&nbsp;</div>
        </div>
    </div>
</div>
<div id="footmenu" class="wwide">
    <div class="wrapper">
        <div class="dpad">
            <ul class="reset">
                <li><a href="/index.php">首页</a></li>
                [group=5]
                <li><a href="/index.php?do=register">加入我们</a></li>
                [/group]
                [not-group=5]
                <li><a href="/addnews.html">发布文章</a></li>
                [/not-group]
                <li><a href="/newposts/">最新文章</a></li>
                <li><a href="/statistics.html">站点统计</a></li>
                <li><a href="http://www.xtmseo.com">网站支持</a></li>
            </ul>
        </div>
    </div>
    <div class="shadow">&nbsp;</div>
</div>
<div id="footer" class="wwide">
    <div class="wrapper">
        <div class="dpad">
		<span class="copyright">
			Copyright &copy; 2004-2013 <a href="http://www.xtmseo.com">xtm中文支持</a> All Rights Reserved.<br/>
			Powered by DataLife Engine &copy; 2013
		</span>

            <div class="counts">
                <ul class="reset">
                    <li><img src="{THEME}/images/count.png" alt="count 88x31px"/></li>
                    <li><img src="{THEME}/images/count.png" alt="count 88x31px"/></li>
                    <li><img src="{THEME}/images/count.png" alt="count 88x31px"/></li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>
    </div>
</div>
</body>
</html>