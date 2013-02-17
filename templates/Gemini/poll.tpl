<div class="brdform">
    <div class="baseform">
        <div class="dcont">
            <h2 class="heading">{question}</h2>
        {list}
            [voted]
            <div align="center">Total Votes: {votes}</div>
            [/voted]
            [not-voted]
            <button class="fbutton" type="submit" onclick="doPoll('vote'); return false;"><span>Vote</span></button>
            <button class="fbutton" type="submit" onclick="doPoll('results'); return false;"><span>Results</span>
            </button>
            [/not-voted]
        </div>
    </div>
</div>