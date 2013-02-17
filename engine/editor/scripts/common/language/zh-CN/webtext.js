п
»
їfunction
loadTxt()
{
    document.getElementById("tab0").innerHTML = "基本";
    document.getElementById("tab1").innerHTML = "特效";
    document.getElementById("tab2").innerHTML = "段落";
    document.getElementById("tab3").innerHTML = "列表";
    document.getElementById("tab4").innerHTML = "尺寸";

    document.getElementById("lblColor").innerHTML = "颜色:";
    document.getElementById("lblHighlight").innerHTML = "背景色:";
    document.getElementById("lblLineHeight").innerHTML = "行高度:";
    document.getElementById("lblLetterSpacing").innerHTML = "字符间距:";
    document.getElementById("lblWordSpacing").innerHTML = "词语间距:";
    document.getElementById("lblNote").innerHTML = "IE浏览器不支持这些特效";
}
function writeTitle() {
    document.write("<title>" + "文字" + "</title>")
}
function getTxt(s) {
    switch (s) {
        case "DEFAULT SIZE":
            return "默认大小";
        case "Heading 1":
            return "大标题H1";
        case "Heading 2":
            return "二级标题H2";
        case "Heading 3":
            return "三级标题H3";
        case "Heading 4":
            return "四级标题H4";
        case "Heading 5":
            return "五级标题H5";
        case "Heading 6":
            return "六级标题H6";
        case "Preformatted":
            return "预置";
        case "Normal":
            return "正常";
    }
}