<h2 class="heading">Site Statistics</h2>
<div class="lines">
    <ul class="reset">
        <li>Today: Total <b>{news_day} posts</b> and <b>{comm_day} commants</b>, total <b>{user_day} registered
            users</b></li>
        <li>This Week: Total <b>{news_week} posts</b> and <b>{comm_week} commants</b>, total <b>{user_week} registered
            users</b></li>
        <li>This Month: Total <b>{news_month} posts</b> and <b>{comm_month} commants</b>, total <b>{user_month}
            registered users</b></li>
    </ul>
</div>
<div class="basecont statistics">
    <ul class="lcol reset">
        <li><h5 class="red">Posts:</h5></li>
        <li>Total Posts: <b class="blue">{news_num}</b></li>
        <li>Published Posts: <b class="blue">{news_allow}</b></li>
        <li>Published in Main Page: <b class="blue">{news_main}</b></li>
        <li>Waiting Approval: <b class="blue">{news_moder}</b></li>
    </ul>
    <ul class="lcol reset">
        <li><h5 class="red">Users:</h5></li>
        <li>Total Users: <b class="blue">{user_num}</b></li>
        <li>Banned users: <b class="blue">{user_banned}</b></li>
    </ul>
    <ul class="lcol reset">
        <li><h5 class="red">Comments:</h5></li>
        <li>Total Comments: <b class="blue">{comm_num}</b></li>
        <li><a href="/?do=lastcomments">Latest Comments</a></li>
    </ul>
    <br clear="all"/>
</div>
<p><b>Database Size: {datenbank}</b></p>
<br/><br/><br/>
<div class="basecont">
    <h2 class="heading">Top Users</h2>
    <table width="100%" class="userstop">{topusers}</table>
</div>