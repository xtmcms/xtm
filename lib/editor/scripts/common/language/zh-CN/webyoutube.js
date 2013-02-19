п
»
їfunction
loadTxt()
{
    document.getElementById("tab0").innerHTML = "YOUTUBE";
    document.getElementById("tab1").innerHTML = "风格";
    document.getElementById("tab2").innerHTML = "维度";
    document.getElementById("lnkLoadMore").innerHTML = "加载更多";
    document.getElementById("lblUrl").innerHTML = "链接URL:";
    document.getElementById("btnCancel").value = "取消";
    document.getElementById("btnInsert").value = "插入";
    document.getElementById("btnSearch").value = " 搜索 ";
}
function writeTitle() {
    document.write("<title>" + "Youtube视频" + "</title>")
}