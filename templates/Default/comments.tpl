<div class="bcomment">
    <div class="dtop">
        <div class="lcol"><span><img src="{foto}" alt=""/></span></div>
        <div class="rcol">
            <span class="reply">[fast]<b>回复</b>[/fast]</span>
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
            [not-group=5]
            <div class="comedit">
                <div class="selectmass">{mass-action}</div>
                <ul class="reset">
                    <li>[spam]举报[/spam]</li>
                    <li>[complaint]反馈[/complaint]</li>
                    <li>[com-edit]编辑[/com-edit]</li>
                    <li>[com-del]删除[/com-del]</li>
                </ul>
            </div>
            [/not-group]
            <ul class="cominfo reset">
                <li>注册日期: {registration}</li>
                <li>状态: [online]<img src="{THEME}/images/online.png" style="vertical-align: middle;" title="当前在线"
                                     alt="当前在线"/>[/online][offline]<img src="{THEME}/images/offline.png"
                                                                        style="vertical-align: middle;" title="已经下线"
                                                                        alt="已经下线"/>[/offline]
                </li>
                <li>评论数量: {comm-num}</li>
                <li>文章数量: {news-num}</li>
            </ul>
        </div>
        <span class="thide">^</span>
    </div>
    <div class="dcont">
        [aviable=lastcomments]<h3 style="margin-bottom: 0.4em;">{news_title}</h3>[/aviable]
    {comment}
        [signature]<br clear="all"/>

        <div class="signature">--------------------</div>
        <div class="slink">{signature}</div>
        [/signature]
        <div class="clr"></div>
    </div>
</div>