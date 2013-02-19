п
»
їfunction
loadTxt()
{
    document.getElementById("tab0").innerHTML = "FLICKR";
    document.getElementById("tab1").innerHTML = "图片信息;
    document.getElementById("tab2").innerHTML = "风格";
    document.getElementById("tab3").innerHTML = "特效";
    document.getElementById("lblTag").innerHTML = "标签:";
    document.getElementById("lblFlickrUserName").innerHTML = "Flickr用户名:";
    document.getElementById("lnkLoadMore").innerHTML = "加载更多";
    document.getElementById("lblImgSrc").innerHTML = "图片源:";
    document.getElementById("lblWidthHeight").innerHTML = "宽度 x 高度:";

    var optAlign = document.getElementsByName("optAlign");
    optAlign[0].text = "无"
    optAlign[1].text = "居左"
    optAlign[2].text = "居右"

    document.getElementById("lblTitle").innerHTML = "标题:";
    document.getElementById("lblAlign").innerHTML = "位置:";
    document.getElementById("lblMargin").innerHTML = "边距(Margin): (上 / 右 / 下 / 左)";
    document.getElementById("lblSize1").innerHTML = "微缩图";
    document.getElementById("lblSize2").innerHTML = "缩略图";
    document.getElementById("lblSize3").innerHTML = "小号";
    document.getElementById("lblSize5").innerHTML = "中号";
    document.getElementById("lblSize6").innerHTML = "大号";

    document.getElementById("lblOpenLarger").innerHTML = "在弹框中打开大图，或者";
    document.getElementById("lblLinkToUrl").innerHTML = "图片指向的URL链接:";
    document.getElementById("lblNewWindow").innerHTML = "在新窗口中打开大图。";
    document.getElementById("btnCancel").value = "关闭";
    document.getElementById("btnSearch").value = " 搜索 ";

    document.getElementById("btnRestore").value = "原图";
    document.getElementById("btnSaveAsNew").value = "保存为新图";
}
function writeTitle() {
    document.write("<title>" + "图片" + "</title>")
}
function getTxt(s) {
    switch (s) {
        case "insert":
            return "插入";
        case "change":
            return "更新";
        case "notsupported":
            return "不支持外部图片.";
    }
}