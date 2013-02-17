<div class="pheading"><h2>站点统计</h2></div>
<div class="basecont statistics">
    <ul class="lcol reset">
        <li><h5 class="blue">新闻统计:</h5></li>
        <li>全部新闻数量: <b class="blue">{news_num}</b></li>
        <li>发布的文章数量: <b class="blue">{news_allow}</b></li>
        <li>发布到主页的文章数量: <b class="blue">{news_main}</b></li>
        <li>待审核的文章数量: <b class="blue">{news_moder}</b></li>
    </ul>
    <ul class="lcol reset">
        <li><h5 class="blue">用户统计:</h5></li>
        <li>站点总用户数量: <b class="blue">{user_num}</b></li>
        <li>禁止访问的用户数量: <b class="blue">{user_banned}</b></li>
    </ul>
    <ul class="lcol reset">
        <li><h5 class="blue">评论统计:</h5></li>
        <li>评论数量: <b class="blue">{comm_num}</b></li>
        <li><a href="/?do=lastcomments">最新评论</a></li>
    </ul>
    <br clear="all"/>

    <div class="dpad infoblock radial">
        <ul class="reset">
            <li>今天: <span class="blue">新增文章 {news_day} 篇，新增评论 {comm_day} 条，新增用户 {user_day} 人。</span></li>
            <li>本周: <span class="blue">新增文章 {news_week} 篇，新增评论 {comm_week} 条，新增用户 {user_week} 人。</span></li>
            <li>本月: <span class="blue">新增文章 {news_month} 篇，新增评论 {comm_month} 条，新增用户 {user_month} 人。</span></li>
        </ul>
    </div>
</div>
<div class="pheading"><p><b>数据库大小: {datenbank}</b></p></div>
<div class="basecont">
    <div class="pheading">
        <h3 class="heading">最佳作者</h3>
        <table width="100%" class="userstop">{topusers}</table>
    </div>
</div>