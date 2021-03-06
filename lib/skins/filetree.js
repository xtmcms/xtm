// jQuery File Tree Plugin
//
// 2008 A Beautiful Site, LLC. (http://abeautifulsite.net/blog/2008/03/jquery-file-tree/)
//
//
jQuery && function (b) {
    b.extend(b.fn, {fileTree:function (a, f) {
        a || (a = {});
        if (a.root == undefined)a.root = "/";
        if (a.script == undefined)a.script = "jqueryFileTree.php";
        if (a.folderEvent == undefined)a.folderEvent = "click";
        if (a.expandSpeed == undefined)a.expandSpeed = 500;
        if (a.collapseSpeed == undefined)a.collapseSpeed = 500;
        if (a.expandEasing == undefined)a.expandEasing = null;
        if (a.collapseEasing == undefined)a.collapseEasing = null;
        if (a.multiFolder == undefined)a.multiFolder = true;
        if (a.loadMessage == undefined)a.loadMessage = "Loading...";
        b(this).each(function () {
            function d(c, e) {
                b(c).addClass("wait");
                b(".jqueryFileTree.start").remove();
                b.post(a.script, {dir:e}, function (g) {
                    b(c).find(".start").html("");
                    b(c).removeClass("wait").append(g);
                    a.root == e ? b(c).find("UL:hidden").show() : b(c).find("UL:hidden").slideDown({duration:a.expandSpeed, easing:a.expandEasing});
                    h(c)
                })
            }

            function h(c) {
                b(c).find("LI A").bind(a.folderEvent, function () {
                    if (b(this).parent().hasClass("directory"))if (b(this).parent().hasClass("collapsed")) {
                        if (!a.multiFolder) {
                            b(this).parent().parent().find("UL").slideUp({duration:a.collapseSpeed,
                                easing:a.collapseEasing});
                            b(this).parent().parent().find("LI.directory").removeClass("expanded").addClass("collapsed")
                        }
                        b(this).parent().find("UL").remove();
                        d(b(this).parent(), escape(b(this).attr("rel").match(/.*\//)));
                        b(this).parent().removeClass("collapsed").addClass("expanded")
                    } else {
                        b(this).parent().find("UL").slideUp({duration:a.collapseSpeed, easing:a.collapseEasing});
                        b(this).parent().removeClass("expanded").addClass("collapsed")
                    } else f(b(this).attr("rel"));
                    return false
                });
                a.folderEvent.toLowerCase !=
                    "click" && b(c).find("LI A").bind("click", function () {
                    return false
                })
            }

            b(this).html('<ul class="jqueryFileTree start"><li class="wait">' + a.loadMessage + "<li></ul>");
            d(b(this), escape(a.root))
        })
    }})
}(jQuery);