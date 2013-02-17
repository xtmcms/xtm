<div id="bvote" class="block">
    <div class="dtop"><h4 class="btl">Vote</h4></div>
    <p class="vtitle"><i>{title}</i><b class="thide">^</b></p>

    <div class="dcont">
        [votelist]
        <form method="post" name="vote" action=''>[/votelist]
        {list}
            <br clear="all"/>
            [voteresult]
            <div>
                <small>Total Votes: {votes}</small>
            </div>
            [/voteresult]
            [votelist]
            <input type="hidden" name="vote_action" value="vote"/>
            <input type="hidden" name="vote_id" id="vote_id" value="{vote_id}"/>
            <button class="fbutton" type="submit" onclick="doVote('vote'); return false;"><span>Vote</span></button>
        </form>
        <form method="post" name="vote_result" action=''>
            <input type="hidden" name="vote_action" value="results"/>
            <input type="hidden" name="vote_id" value="{vote_id}"/>
            <button class="fbutton" type="submit" onclick="doVote('results'); return false;" title="Results"
                    alt="Results"><span>Results</span></button>
            <input class="vresult" src="{THEME}/images/spacer.gif" type="image" onclick="ShowAllVotes(); return false;"
                   title="View All Votes" alt="View All Votes"/>
        </form>
        <div class="clr"></div>
        [/votelist]
    </div>
</div>