п
»
їfunction
loadTxt()
{
    document.getElementById("tab0").innerHTML = "插入表";
    document.getElementById("tab1").innerHTML = "调整表";
    document.getElementById("tab2").innerHTML = "预定义格式";
    document.getElementById("btnDelTable").value = "删除选定的表";
    document.getElementById("btnIRow1").value = "在上面插入一行";
    document.getElementById("btnIRow2").value = "在下面插入一行";
    document.getElementById("btnICol1").value = "在左侧插入一列";
    document.getElementById("btnICol2").value = "在右侧插入一列";
    document.getElementById("btnDelRow").value = "删除整行";
    document.getElementById("btnDelCol").value = "删除整列";
    document.getElementById("btnMerge").value = "合并单元格";
    document.getElementById("lblFormat").innerHTML = "格式:";
    document.getElementById("lblTable").innerHTML = "整张表格";
    document.getElementById("lblEven").innerHTML = "偶数行";
    document.getElementById("lblOdd").innerHTML = "奇数行";
    document.getElementById("lblCurrRow").innerHTML = "当前行";
    document.getElementById("lblCurrCol").innerHTML = "当前列";
    document.getElementById("lblBg").innerHTML = "背景颜色:";
    document.getElementById("lblText").innerHTML = "文字颜色:";
    document.getElementById("lblBorder").innerHTML = "边框:";
    document.getElementById("lblThickness").innerHTML = "边框厚度:";
    document.getElementById("lblBorderColor").innerHTML = "边框颜色:";
    document.getElementById("lblCellPadding").innerHTML = "单元格内边距:";
    document.getElementById("lblFullWidth").innerHTML = "铺满";
    document.getElementById("lblAutofit").innerHTML = "自适应";
    document.getElementById("lblFixedWidth").innerHTML = "指定宽度:";
    document.getElementById("lnkClean").innerHTML = "清空";
    document.getElementById("lblTextAlign").innerHTML = "文字排列方式:";
    document.getElementById("btnAlignLeft").value = "居左";
    document.getElementById("btnAlignCenter").value = "居中";
    document.getElementById("btnAlignRight").value = "居右";
    document.getElementById("btnAlignTop").value = "居上";
    document.getElementById("btnAlignMidxtm").value = "居中";
    document.getElementById("btnAlignBottom").value = "居下";

    document.getElementById("lblColor").innerHTML = "颜色:";
    document.getElementById("lblCellSize").innerHTML = "单元格尺寸:";
    document.getElementById("lblCellWidth").innerHTML = "宽度:";
    document.getElementById("lblCellHeight").innerHTML = "高度:";

}
function writeTitle() {
    document.write("<title>" + "表格" + "</title>")
}
function getTxt(s) {
    switch (s) {
        case "Clean Formatting":
            return "清空格式";
    }
}