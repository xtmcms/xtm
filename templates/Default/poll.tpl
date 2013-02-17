<div class="dpad infoblock radial">
    <div align="center">
        <div class="pollvotelist">
            <h1 class="heading">{question}</h1>
        {list}
        </div>
    </div>
    <br/>
    [voted]
    <div align="center">投票: {votes}</div>
    [/voted]
    [not-voted]
    <div align="center">
        <button class="fbutton" type="submit" onclick="doPoll('vote'); return false;"><span>投票</span></button>
        <button class="fbutton" type="submit" onclick="doPoll('results'); return false;"><span>结果</span></button>
    </div>
    [/not-voted]
</div>