п
»
їfunction
loadTxt()
{
    document.getElementById("tab0").innerHTML = "预览图";
    document.getElementById("tab1").innerHTML = "MPEG4视频（MP4）";
    document.getElementById("tab2").innerHTML = "Ogg视频";
    document.getElementById("tab3").innerHTML = "WebM视频";
    document.getElementById("lbImage").innerHTML = "预览图片(支持.png或.jpg格式):";
    document.getElementById("lblMP4").innerHTML = "MPEG4视频 (.mp4):";
    document.getElementById("lblOgg").innerHTML = "Ogg视频 (.ogv):";
    document.getElementById("lblWebM").innerHTML = "WebM视频 (.webm):";
    document.getElementById("lblDimension").innerHTML = "输入视频尺寸 (宽度 x 高度):";
    document.getElementById("divNote1").innerHTML = "点击链接查看关于 HTML5 视频的更多详情: <a href='http://www.w3schools.com/html5/html5_video.asp' target='_blank'>www.w3schools.com/html5/html5_video.asp</a>." +
        "目前支持3种视频格式: MP4, WebM(如IE9+浏览器支持这种格式)以及 Ogg (如FireFox支持这种格式). 浏览器将使用第一个可识别的格式." +
        "另外，你需要添加一个视频预览图片";
    document.getElementById("divNote2").innerHTML = "将一段视频转码为HTML5视频 (MP4, WebM & Ogg)，你可以使用此工具: <a href='http://www.mirovideoconverter.com/' target='_blank'>www.mirovideoconverter.com</a>";

    document.getElementById("btnCancel").value = "关闭";
    document.getElementById("btnInsert").value = "插入";
}
function writeTitle() {
    document.write("<title>" + "HTML5视频播放器" + "</title>")
}