п
»
їfunction
loadTxt()
{
    document.getElementById("lblSearch").innerHTML = "搜索:";
    document.getElementById("lblReplace").innerHTML = "替换为:";
    document.getElementById("lblMatchCase").innerHTML = "区分字面大小写";
    document.getElementById("lblMatchWhole").innerHTML = "完整匹配搜索词";

    document.getElementById("btnSearch").value = "搜索下一个";
    document.getElementById("btnReplace").value = "替换";
    document.getElementById("btnReplaceAll").value = "替换全部";
}
function getTxt(s) {
    switch (s) {
        case "Finished searching":
            return "已经搜索完整个文档.\n要再次从头搜索吗?";
        default:
            return "";
    }
}
function writeTitle() {
    document.write("<title>搜索 & 替换</title>")
}