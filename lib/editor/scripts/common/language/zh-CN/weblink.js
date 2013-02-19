п
»
їfunction
loadTxt()
{
    document.getElementById("tab0").innerHTML = "链接信息";
    document.getElementById("tab1").innerHTML = "风格";
    document.getElementById("lblUrl").innerHTML = "链接:";
    document.getElementById("lblTitle").innerHTML = "标题:";
    document.getElementById("lblTarget1").innerHTML = "新页面打开";
    document.getElementById("lblTarget2").innerHTML = "新窗口打开";
    document.getElementById("lblTarget3").innerHTML = "弹框中打开";
    document.getElementById("lnkNormalLink").innerHTML = "普通链接 &raquo;";
    document.getElementById("btnCancel").value = "取消";
}
function writeTitle() {
    document.write("<title>" + "链接" + "</title>")
}
function getTxt(s) {
    switch (s) {
        case "insert":
            return "插入";
        case "change":
            return "更新";
    }
}