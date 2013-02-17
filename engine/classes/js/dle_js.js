var c_cache = [];
function RunAjaxJS(a, b) {
    var c = new Date, d = !1, c = c.getTime(), e = /<script.*?>(.|[\r\n])*?<\/script>/ig, f = e.exec(b);
    if (null != f) {
        for (var g = Array(f.shift()), d = !0; f;)f = e.exec(b), null != f && g.push(f.shift());
        for (e = 0; e < g.length; e++)b = b.replace(g[e], '<span id="' + c + e + '" style="display:none;"></span>')
    }
    $("#" + a).html(b);
    if (d) {
        d = /<script.*?>((.|[\r\n])*?)<\/script>/ig;
        for (e = 0; e < g.length; e++) {
            var h = document.getElementById(c + "" + e), f = h.parentNode;
            f.removeChild(h);
            d.lastIndex = 0;
            h = d.exec(g[e]);
            f = f.appendChild(document.createElement("script"));
            f.text =
                h[1];
            h = g[e].substring(g[e].indexOf(" ", 0), g[e].indexOf(">", 0)).split(" ");
            if (1 < h.length)for (var j = 0; j < h.length; j++)if (0 < h[j].length) {
                var i = h[j].split("=");
                i[1] = i[1].substr(1, i[1].length - 2);
                f.setAttribute(i[0], i[1])
            }
        }
    }
}
function IPMenu(a, b, c, d) {
    var e = [];
    e[0] = '<a href="https://www.nic.ru/whois/?ip=' + a + '" target="_blank">' + b + "</a>";
    e[1] = '<a href="' + xtm_root + xtm_admin + "?mod=iptools&ip=" + a + '" target="_blank">' + c + "</a>";
    e[2] = '<a href="' + xtm_root + xtm_admin + "?mod=blockip&ip=" + a + '" target="_blank">' + d + "</a>";
    return e
}
function ajax_save_for_edit(a, b) {
    var c = {};
    "1" == quick_wysiwyg && submit_all_data();
    $.each($("#ajaxnews" + a).serializeArray(), function (a, b) {
        -1 != b.name.indexOf("xfield") && (c[b.name] = b.value)
    });
    document.getElementById("allow_br_" + a).checked && (c.allow_br = 1);
    c.news_txt = $("#xtmeditnews" + a).val();
    c.full_txt = $("#xtmeditfullnews" + a).val();
    c.title = $("#edit-title-" + a).val();
    c.reason = $("#edit-reason-" + a).val();
    c.id = a;
    c.field = b;
    c.action = "save";
    ShowLoading("");
    $.post(xtm_root + "engine/ajax/editnews.php", c, function (a) {
        HideLoading("");
        "ok" != a ? xtmalert(a, xtm_info) : ($("#xtmpopup-news-edit").dialog("close"), xtmconfirm(xtm_save_ok, xtm_confirm, function () {
            location.reload(!0)
        }))
    });
    return!1
}
function ajax_prep_for_edit(a, b) {
    for (var c = 0, d = c_cache.length; c < d; c++)c in c_cache && (c_cache[c] || "" != c_cache[c]) && ajax_cancel_comm_edit(c);
    ShowLoading("");
    $.get(xtm_root + "engine/ajax/editnews.php", {id:a, field:b, action:"edit"}, function (c) {
        HideLoading("");
        var d = "none";
        $("#modal-overlay").remove();
        $("body").prepend('<div id="modal-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #666666; opacity: .40;filter:Alpha(Opacity=40); z-index: 999; display:none;"></div>');
        $("#modal-overlay").css({filter:"alpha(opacity=40)"}).fadeIn();
        var g = {};
        g[xtm_act_lang[3]] = function () {
            $(this).dialog("close")
        };
        g[xtm_act_lang[4]] = function () {
            ajax_save_for_edit(a, b)
        };
        $("#xtmpopup-news-edit").remove();
        $("body").prepend("<div id='xtmpopup-news-edit' class='xtmpopupnewsedit' title='" + menu_short + "' style='display:none'></div>");
        $(".xtmpopupnewsedit").html("");
        $("#xtmpopup-news-edit").dialog({autoOpen:!0, width:"800", height:500, buttons:g, dialogClass:"modalfixed", dragStart:function () {
            d = $(".modalfixed").css("box-shadow");
            $(".modalfixed").css("box-shadow",
                "none")
        }, dragStop:function () {
            $(".modalfixed").css("box-shadow", d)
        }, close:function () {
            $(this).dialog("destroy");
            $("#modal-overlay").fadeOut(function () {
                $("#modal-overlay").remove()
            })
        }});
        830 < $(window).width() && 530 < $(window).height() && ($(".modalfixed.ui-dialog").css({position:"fixed"}), $("#xtmpopup-news-edit").dialog("option", "position", ["0", "0"]));
        RunAjaxJS("xtmpopup-news-edit", c)
    });
    return!1
}
function ajax_comm_edit(a, b) {
    for (var c = 0, d = c_cache.length; c < d; c++)c in c_cache && "" != c_cache[c] && ajax_cancel_comm_edit(c);
    if (!c_cache[a] || "" == c_cache[a])c_cache[a] = $("#comm-id-" + a).html();
    ShowLoading("");
    $.get(xtm_root + "engine/ajax/editcomments.php", {id:a, area:b, action:"edit"}, function (c) {
        HideLoading("");
        RunAjaxJS("comm-id-" + a, c);
        setTimeout(function () {
            $("html:not(:animated)" + (!$.browser.opera ? ",body:not(:animated)" : "")).animate({scrollTop:$("#comm-id-" + a).offset().top - 70}, 700)
        }, 100)
    });
    return!1
}
function ajax_cancel_comm_edit(a) {
    "" != c_cache[a] && $("#comm-id-" + a).html(c_cache[a]);
    c_cache[a] = "";
    return!1
}
function ajax_save_comm_edit(a, b) {
    "1" == xtm_wysiwyg && submit_all_data();
    var c = $("#xtmeditcomments" + a).val();
    ShowLoading("");
    $.post(xtm_root + "engine/ajax/editcomments.php", {id:a, comm_txt:c, area:b, action:"save"}, function (c) {
        HideLoading("");
        c_cache[a] = "";
        $("#comm-id-" + a).html(c)
    });
    return!1
}
function DeleteComments(a, b) {
    xtmconfirm(xtm_del_agree, xtm_confirm, function () {
        ShowLoading("");
        $.get(xtm_root + "engine/ajax/deletecomments.php", {id:a, xtm_allow_hash:b}, function (a) {
            HideLoading("");
            a = parseInt(a);
            isNaN(a) || ($("html" + (!$.browser.opera ? ",body" : "")).animate({scrollTop:$("#comment-id-" + a).offset().top - 70}, 700), setTimeout(function () {
                $("#comment-id-" + a).hide("blind", {}, 1400)
            }, 700))
        })
    })
}
function doFavorites(a, b) {
    ShowLoading("");
    $.get(xtm_root + "engine/ajax/favorites.php", {fav_id:a, action:b, skin:xtm_skin}, function (c) {
        HideLoading("");
        $("#fav-id-" + a).html(c)
    });
    return!1
}
function CheckLogin() {
    var a = document.getElementById("name").value;
    ShowLoading("");
    $.post(xtm_root + "engine/ajax/registration.php", {name:a}, function (a) {
        HideLoading("");
        $("#result-registration").html(a)
    });
    return!1
}
function doCalendar(a, b, c) {
    ShowLoading("");
    $.get(xtm_root + "engine/ajax/calendar.php", {month:a, year:b}, function (a) {
        HideLoading("");
        "left" == c ? $("#calendar-layer").hide("slide", {direction:"left"}, 500).html(a).show("slide", {direction:"right"}, 500) : $("#calendar-layer").hide("slide", {direction:"right"}, 500).html(a).show("slide", {direction:"left"}, 500)
    })
}
function doRate(a, b) {
    ShowLoading("");
    $.get(xtm_root + "engine/ajax/rating.php", {go_rate:a, news_id:b, skin:xtm_skin}, function (a) {
        HideLoading("");
        if (a.success) {
            var d = a.rating, d = d.replace(/&lt;/g, "<"), d = d.replace(/&gt;/g, ">"), d = d.replace(/&amp;/g, "&");
            $("#ratig-layer-" + b).html(d);
            $("#vote-num-id-" + b).html(a.votenum)
        }
    }, "json")
}
function doAddComments() {
    var a = document.getElementById("xtm-comments-form");
    if ("1" == xtm_wysiwyg || "2" == xtm_wysiwyg) {
        "1" == xtm_wysiwyg ? submit_all_data() : document.getElementById("comments").value = $("#comments").html();
        var b = "wysiwyg"
    } else b = "";
    if ("" == a.comments.value || "" == a.name.value)return xtmalert(xtm_req_field, xtm_info), !1;
    var c = a.question_answer ? a.question_answer.value : "", d = a.sec_code ? a.sec_code.value : "";
    if (a.recaptcha_response_field)var e = Recaptcha.get_response(), f = Recaptcha.get_challenge(); else f =
        e = "";
    var g = a.allow_subscribe ? !0 == a.allow_subscribe.checked ? "1" : "0" : "0";
    ShowLoading("");
    $.post(xtm_root + "engine/ajax/addcomments.php", {post_id:a.post_id.value, comments:a.comments.value, name:a.name.value, mail:a.mail.value, editor_mode:b, skin:xtm_skin, sec_code:d, question_answer:c, recaptcha_response_field:e, recaptcha_challenge_field:f, allow_subscribe:g}, function (b) {
        a.sec_code && (a.sec_code.value = "", reload());
        HideLoading("");
        RunAjaxJS("xtm-ajax-comments", b);
        "error" != b && document.getElementById("blind-animation") &&
        ($("html" + (!$.browser.opera ? ",body" : "")).animate({scrollTop:$("#xtm-ajax-comments").offset().top - 70}, 1100), setTimeout(function () {
            $("#blind-animation").show("blind", {}, 1500)
        }, 1100))
    })
}
function CommentsPage(a, b) {
    ShowLoading("");
    $.get(xtm_root + "engine/ajax/comments.php", {cstart:a, news_id:b, skin:xtm_skin}, function (c) {
        HideLoading("");
        !isNaN(a) && !isNaN(b) && ($("#xtm-comm-link").unbind("click"), $("#xtm-comm-link").bind("click", function () {
            CommentsPage(a, b);
            return!1
        }));
        scroll(0, $("#xtm-comments-list").offset().top - 70);
        $("#xtm-comments-list").html(c.comments);
        $(".xtm-comments-navigation").html(c.navigation)
    }, "json");
    return!1
}
function xtm_copy_quote(a) {
    xtm_txt = "";
    window.getSelection ? xtm_txt = window.getSelection() : document.selection && (xtm_txt = document.selection.createRange().text);
    "" != xtm_txt && (xtm_txt = "[quote=" + a + "]" + xtm_txt + "[/quote]\n")
}
function xtm_ins(a) {
    if (!document.getElementById("xtm-comments-form"))return!1;
    var b = document.getElementById("xtm-comments-form").comments, c = "";
    "0" == xtm_wysiwyg ? b.value = "" != xtm_txt ? b.value + xtm_txt : b.value + ("[b]" + a + "[/b],\n") : (c = "" != xtm_txt ? xtm_txt : "<b>" + a + "</b>,", "1" == xtm_wysiwyg ? (oUtil.obj.focus(), oUtil.obj.insertHTML(c + "<br />")) : tinyMCE.execInstanceCommand("comments", "mceInsertContent", !1, c, !0))
}
function ShowOrHide(a) {
    var b = $("#" + a), a = document.getElementById("image-" + a) ? document.getElementById("image-" + a) : null, c = 1E3 * (b.height() / 200);
    3E3 < c && (c = 3E3);
    250 > c && (c = 250);
    "none" == b.css("display") ? (b.show("blind", {}, c), a && (a.src = xtm_root + "templates/" + xtm_skin + "/xtmimages/spoiler-minus.gif")) : (2E3 < c && (c = 2E3), b.hide("blind", {}, c), a && (a.src = xtm_root + "templates/" + xtm_skin + "/xtmimages/spoiler-plus.gif"))
}
function ckeck_uncheck_all() {
    for (var a = document.pmlist, b = 0; b < a.elements.length; b++) {
        var c = a.elements[b];
        "checkbox" == c.type && (c.checked = !0 == a.master_box.checked ? !1 : !0)
    }
    a.master_box.checked = !0 == a.master_box.checked ? !1 : !0
}
function confirmDelete(a) {
    xtmconfirm(xtm_del_agree, xtm_confirm, function () {
        document.location = a
    })
}
function setNewField(a, b) {
    a != selField && (fombj = b, selField = a)
}
function xtm_news_delete(a) {
    var b = {};
    b[xtm_act_lang[1]] = function () {
        $(this).dialog("close")
    };
    allow_xtm_delete_news && (b[xtm_del_msg] = function () {
        $(this).dialog("close");
        var b = {};
        b[xtm_act_lang[3]] = function () {
            $(this).dialog("close")
        };
        b[xtm_p_send] = function () {
            if (1 > $("#xtm-promt-text").val().length)$("#xtm-promt-text").addClass("ui-state-error"); else {
                var b = $("#xtm-promt-text").val();
                $(this).dialog("close");
                $("#xtmpopup").remove();
                $.post(xtm_root + "engine/ajax/message.php", {id:a, text:b}, function (b) {
                    "ok" ==
                        b ? document.location = xtm_root + "index.php?do=deletenews&id=" + a + "&hash=" + xtm_login_hash : xtmalert("Send Error", xtm_info)
                })
            }
        };
        $("#xtmpopup").remove();
        $("body").append("<div id='xtmpopup' title='" + xtm_notice + "' style='display:none'><br />" + xtm_p_text + "<br /><br /><textarea name='xtm-promt-text' id='xtm-promt-text' class='ui-widget-content ui-corner-all' style='width:97%;height:100px; padding: .4em;'></textarea></div>");
        $("#xtmpopup").dialog({autoOpen:!0, width:500, dialogClass:"modalfixed", buttons:b});
        $(".modalfixed.ui-dialog").css({position:"fixed"});
        $("#xtmpopup").dialog("option", "position", ["0", "0"])
    });
    b[xtm_act_lang[0]] = function () {
        $(this).dialog("close");
        document.location = xtm_root + "index.php?do=deletenews&id=" + a + "&hash=" + xtm_login_hash
    };
    $("#xtmpopup").remove();
    $("body").append("<div id='xtmpopup' title='" + xtm_confirm + "' style='display:none'><br /><div id='xtmpopupmessage'>" + xtm_del_agree + "</div></div>");
    $("#xtmpopup").dialog({autoOpen:!0, width:500, dialogClass:"modalfixed", buttons:b});
    $(".modalfixed.ui-dialog").css({position:"fixed"});
    $("#xtmpopup").dialog("option",
        "position", ["0", "0"])
}
function MenuNewsBuild(a, b) {
    var c = [];
    c[0] = "<a onclick=\"ajax_prep_for_edit('" + a + "', '" + b + '\'); return false;" href="#">' + menu_short + "</a>";
    "" != xtm_admin && (c[1] = '<a href="' + xtm_root + xtm_admin + "?mod=editnews&action=editnews&id=" + a + '" target="_blank">' + menu_full + "</a>");
    allow_xtm_delete_news && (c[2] = "<a onclick=\"sendNotice ('" + a + '\'); return false;" href="#">' + xtm_notice + "</a>", c[3] = "<a onclick=\"xtm_news_delete ('" + a + '\'); return false;" href="#">' + xtm_del_news + "</a>");
    return c
}
function sendNotice(a) {
    var b = {};
    b[xtm_act_lang[3]] = function () {
        $(this).dialog("close")
    };
    b[xtm_p_send] = function () {
        if (1 > $("#xtm-promt-text").val().length)$("#xtm-promt-text").addClass("ui-state-error"); else {
            var b = $("#xtm-promt-text").val();
            $(this).dialog("close");
            $("#xtmpopup").remove();
            $.post(xtm_root + "engine/ajax/message.php", {id:a, text:b, allowdelete:"no"}, function (a) {
                "ok" == a && xtmalert(xtm_p_send_ok, xtm_info)
            })
        }
    };
    $("#xtmpopup").remove();
    $("body").append("<div id='xtmpopup' title='" + xtm_notice + "' style='display:none'><br />" +
        xtm_p_text + "<br /><br /><textarea name='xtm-promt-text' id='xtm-promt-text' class='ui-widget-content ui-corner-all' style='width:97%;height:100px; padding: .4em;'></textarea></div>");
    $("#xtmpopup").dialog({autoOpen:!0, width:500, dialogClass:"modalfixed", buttons:b});
    $(".modalfixed.ui-dialog").css({position:"fixed"});
    $("#xtmpopup").dialog("option", "position", ["0", "0"])
}
function AddComplaint(a, b) {
    var c = {};
    c[xtm_act_lang[3]] = function () {
        $(this).dialog("close")
    };
    c[xtm_p_send] = function () {
        if (1 > $("#xtm-promt-text").val().length)$("#xtm-promt-text").addClass("ui-state-error"); else {
            var c = $("#xtm-promt-text").val();
            $(this).dialog("close");
            $("#xtmpopup").remove();
            $.post(xtm_root + "engine/ajax/complaint.php", {id:a, text:c, action:b}, function (a) {
                "ok" == a ? xtmalert(xtm_p_send_ok, xtm_info) : xtmalert(a, xtm_info)
            })
        }
    };
    $("#xtmpopup").remove();
    $("body").append("<div id='xtmpopup' title='" +
        xtm_complaint + "' style='display:none'><br /><textarea name='xtm-promt-text' id='xtm-promt-text' class='ui-widget-content ui-corner-all' style='width:97%;height:100px; padding: .4em;'></textarea></div>");
    $("#xtmpopup").dialog({autoOpen:!0, width:500, dialogClass:"modalfixed", buttons:c});
    $(".modalfixed.ui-dialog").css({position:"fixed"});
    $("#xtmpopup").dialog("option", "position", ["0", "0"])
}
function xtmalert(a, b) {
    $("#xtmpopup").remove();
    $("body").append("<div id='xtmpopup' title='" + b + "' style='display:none'><br />" + a + "</div>");
    $("#xtmpopup").dialog({autoOpen:!0, width:470, dialogClass:"modalfixed", buttons:{Ok:function () {
        $(this).dialog("close");
        $("#xtmpopup").remove()
    }}});
    $(".modalfixed.ui-dialog").css({position:"fixed"});
    $("#xtmpopup").dialog("option", "position", ["0", "0"])
}
function xtmconfirm(a, b, c) {
    var d = {};
    d[xtm_act_lang[1]] = function () {
        $(this).dialog("close");
        $("#xtmpopup").remove()
    };
    d[xtm_act_lang[0]] = function () {
        $(this).dialog("close");
        $("#xtmpopup").remove();
        c && c()
    };
    $("#xtmpopup").remove();
    $("body").append("<div id='xtmpopup' title='" + b + "' style='display:none'><br />" + a + "</div>");
    $("#xtmpopup").dialog({autoOpen:!0, width:500, dialogClass:"modalfixed", buttons:d});
    $(".modalfixed.ui-dialog").css({position:"fixed"});
    $("#xtmpopup").dialog("option", "position", ["0", "0"])
}
function xtmprompt(a, b, c, d, e) {
    var f = {};
    f[xtm_act_lang[3]] = function () {
        $(this).dialog("close")
    };
    f[xtm_act_lang[2]] = function () {
        if (!e && 1 > $("#xtm-promt-text").val().length)$("#xtm-promt-text").addClass("ui-state-error"); else {
            var a = $("#xtm-promt-text").val();
            $(this).dialog("close");
            $("#xtmpopup").remove();
            d && d(a)
        }
    };
    $("#xtmpopup").remove();
    $("body").append("<div id='xtmpopup' title='" + c + "' style='display:none'><br />" + a + "<br /><br /><input type='text' name='xtm-promt-text' id='xtm-promt-text' class='ui-widget-content ui-corner-all' style='width:97%; padding: .4em;' value='" +
        b + "'/></div>");
    $("#xtmpopup").dialog({autoOpen:!0, width:500, dialogClass:"modalfixed", buttons:f});
    $(".modalfixed.ui-dialog").css({position:"fixed"});
    $("#xtmpopup").dialog("option", "position", ["0", "0"]);
    0 < b.length ? $("#xtm-promt-text").select().focus() : $("#xtm-promt-text").focus()
}
var xtm_user_profile = "", xtm_user_profile_link = "";
function ShowPopupProfile(a, b) {
    var c = {};
    c[menu_profile] = function () {
        document.location = xtm_user_profile_link
    };
    5 != xtm_group && (c[menu_send] = function () {
        document.location = xtm_root + "index.php?do=pm&doaction=newpm&username=" + xtm_user_profile
    });
    1 == b && (c[menu_uedit] = function () {
        $(this).dialog("close");
        var a = {};
        $("body").append('<div id="modal-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #666666; opacity: .40;filter:Alpha(Opacity=40); z-index: 999; display:none;"></div>');
        $("#modal-overlay").css({filter:"alpha(opacity=40)"}).fadeIn("slow");
        $("#xtmuserpopup").remove();
        $("body").append("<div id='xtmuserpopup' title='" + menu_uedit + "' style='display:none'></div>");
        a[xtm_act_lang[3]] = function () {
            $(this).dialog("close");
            $("#xtmuserpopup").remove()
        };
        a[xtm_act_lang[4]] = function () {
            document.getElementById("edituserframe").contentWindow.document.getElementById("saveuserform").submit()
        };
        $("#xtmuserpopup").dialog({autoOpen:!0, show:"fade", width:560, height:500, dialogClass:"modalfixed",
            buttons:a, open:function () {
                $("#xtmuserpopup").html("<iframe name='edituserframe' id='edituserframe' width='100%' height='400' src='" + xtm_root + xtm_admin + "?mod=editusers&action=edituser&user=" + xtm_user_profile + "&skin=" + xtm_skin + "' frameborder='0' marginwidth='0' marginheight='0' allowtransparency='true'></iframe>")
            }, beforeClose:function () {
                $("#xtmuserpopup").html("")
            }, close:function () {
                $("#modal-overlay").fadeOut("slow", function () {
                    $("#modal-overlay").remove()
                })
            }});
        830 < $(window).width() && 530 < $(window).height() &&
        ($(".modalfixed.ui-dialog").css({position:"fixed"}), $("#xtmuserpopup").dialog("option", "position", ["0", "0"]))
    });
    $("#xtmprofilepopup").remove();
    $("body").append(a);
    $("#xtmprofilepopup").dialog({autoOpen:!0, show:"fade", hide:"fade", buttons:c, width:450});
    return!1
}
function ShowProfile(a, b, c) {
    if (xtm_user_profile == a && document.getElementById("xtmprofilepopup"))return $("#xtmprofilepopup").dialog("open"), !1;
    xtm_user_profile = a;
    xtm_user_profile_link = b;
    ShowLoading("");
    $.get(xtm_root + "engine/ajax/profile.php", {name:a, skin:xtm_skin}, function (a) {
        HideLoading("");
        ShowPopupProfile(a, c)
    });
    return!1
}
function FastSearch() {
    $("#story").attr("autocomplete", "off");
    $("#story").blur(function () {
        $("#searchsuggestions").fadeOut()
    });
    $("#story").keyup(function () {
        var a = $(this).val();
        0 == a.length ? $("#searchsuggestions").fadeOut() : xtm_search_value != a && 3 < a.length && (clearInterval(xtm_search_delay), xtm_search_delay = setInterval(function () {
            xtm_do_search(a)
        }, 600))
    })
}
function xtm_do_search(a) {
    clearInterval(xtm_search_delay);
    $("#searchsuggestions").remove();
    $("body").append("<div id='searchsuggestions' style='display:none'></div>");
    $.post(xtm_root + "engine/ajax/search.php", {query:"" + a + ""}, function (a) {
        $("#searchsuggestions").html(a).fadeIn().css({position:"absolute", top:0, left:0}).position({my:"left top", at:"left bottom", of:"#story", collision:"fit flip"})
    });
    xtm_search_value = a
}
function ShowLoading(a) {
    a && $("#loading-layer").html(a);
    var a = ($(window).width() - $("#loading-layer").width()) / 2, b = ($(window).height() - $("#loading-layer").height()) / 2;
    $("#loading-layer").css({left:a + "px", top:b + "px", position:"fixed", zIndex:"99"});
    $("#loading-layer").fadeTo("slow", 0.6)
}
function HideLoading() {
    $("#loading-layer").fadeOut("slow")
}
function ShowAllVotes() {
    if (document.getElementById("xtmvotespopup"))return $("#xtmvotespopup").dialog("open"), !1;
    $.ajaxSetup({cache:!1});
    ShowLoading("");
    $.get(xtm_root + "engine/ajax/allvotes.php?xtm_skin=" + xtm_skin, function (a) {
        HideLoading("");
        $("#xtmvotespopup").remove();
        $("body").append(a);
        $(".xtmvotebutton").button();
        $("#xtmvotespopup").dialog({autoOpen:!0, show:"fade", hide:"fade", width:600, height:150});
        400 < $("#xtmvotespopupcontent").height() && $("#xtmvotespopupcontent").height(400);
        $("#xtmvotespopup").dialog("option",
            "height", $("#xtmvotespopupcontent").height() + 60);
        $("#xtmvotespopup").dialog("option", "position", "center")
    });
    return!1
}
function fast_vote(a) {
    var b = $("#vote_" + a + " input:radio[name=vote_check]:checked").val();
    ShowLoading("");
    $.get(xtm_root + "engine/ajax/vote.php", {vote_id:a, vote_action:"vote", vote_mode:"fast_vote", vote_check:b, vote_skin:xtm_skin}, function (b) {
        HideLoading("");
        $("#xtm-vote_list-" + a).fadeOut(500, function () {
            $(this).html(b);
            $(this).fadeIn(500)
        })
    });
    return!1
}
function AddIgnorePM(a, b) {
    xtmconfirm(b, xtm_confirm, function () {
        ShowLoading("");
        $.get(xtm_root + "engine/ajax/pm.php", {id:a, action:"add_ignore", skin:xtm_skin}, function (a) {
            HideLoading("");
            xtmalert(a, xtm_info);
            return!1
        })
    })
}
function DelIgnorePM(a, b) {
    xtmconfirm(b, xtm_confirm, function () {
        ShowLoading("");
        $.get(xtm_root + "engine/ajax/pm.php", {id:a, action:"del_ignore", skin:xtm_skin}, function (b) {
            HideLoading("");
            $("#xtm-ignore-list-" + a).html("");
            xtmalert(b, xtm_info);
            return!1
        })
    })
}
function media_upload(a, b, c, d) {
    var e = (new Date).getTime(), f = "none";
    $("#mediaupload").remove();
    $("body").append("<div id='mediaupload' title='" + text_upload + "' style='display:none'></div>");
    $("#mediaupload").dialog({autoOpen:!0, width:680, height:600, dialogClass:"modalfixed", open:function () {
        $("#mediaupload").html("<iframe name='mediauploadframe' id='mediauploadframe' width='100%' height='550' src='" + xtm_root + "engine/ajax/upload.php?area=" + a + "&author=" + b + "&news_id=" + c + "&wysiwyg=" + d + "&skin=" + xtm_skin + "&rndval=" +
            e + "' frameborder='0' marginwidth='0' marginheight='0' allowtransparency='true'></iframe>");
        $(".ui-dialog").draggable("option", "containment", "")
    }, dragStart:function () {
        f = $(".modalfixed").css("box-shadow");
        $(".modalfixed").fadeTo(0, 0.6).css("box-shadow", "none");
        $("#mediaupload").hide()
    }, dragStop:function () {
        $(".modalfixed").fadeTo(0, 1).css("box-shadow", f);
        $("#mediaupload").show()
    }, beforeClose:function () {
        $("#mediaupload").html("")
    }});
    830 < $(window).width() && 530 < $(window).height() && ($(".modalfixed.ui-dialog").css({position:"fixed"}),
        $("#mediaupload").dialog("option", "position", ["0", "0"]));
    return!1
}
function dropdownmenu(a, b, c, d) {
    window.event ? event.cancelBubble = !0 : b.stopPropagation && b.stopPropagation();
    b = $("#dropmenudiv");
    if (b.is(":visible"))return clearhidemenu(), b.fadeOut("fast"), !1;
    b.remove();
    $("body").append('<div id="dropmenudiv" style="display:none;position:absolute;z-index:100;width:165px;"></div>');
    b = $("#dropmenudiv");
    b.html(c.join(""));
    d && b.width(d);
    c = $(document).width() - 30;
    d = $(a).offset();
    c - d.left < b.width() && (d.left -= b.width() - $(a).width());
    b.css({left:d.left + "px", top:d.top + $(a).height() +
        "px"});
    b.fadeTo("fast", 0.9);
    b.mouseenter(function () {
        clearhidemenu()
    }).mouseleave(function () {
        delayhidemenu()
    });
    $(document).one("click", function () {
        hidemenu()
    });
    return!1
}
function hidemenu() {
    $("#dropmenudiv").fadeOut("fast")
}
function delayhidemenu() {
    delayhide = setTimeout("hidemenu()", 1E3)
}
function clearhidemenu() {
    "undefined" != typeof delayhide && clearTimeout(delayhide)
}
jQuery(function (a) {
    a(document).keydown(function (b) {
        if (13 == b.which && b.ctrlKey) {
            if (window.getSelection)var c = window.getSelection(); else document.getSelection ? c = document.getSelection() : document.selection && (c = document.selection.createRange().text);
            "" != c && (255 < c.toString().length ? a.browser.mozilla ? alert(xtm_big_text) : xtmalert(xtm_big_text, xtm_info) : (b = {}, b[xtm_act_lang[3]] = function () {
                a(this).dialog("close")
            }, b[xtm_p_send] = function () {
                if (1 > a("#xtm-promt-text").val().length)a("#xtm-promt-text").addClass("ui-state-error");
                else {
                    var b = a("#xtm-promt-text").val(), c = a("#orfom").text();
                    a(this).dialog("close");
                    a("#xtmpopup").remove();
                    a.post(xtm_root + "engine/ajax/complaint.php", {seltext:c, text:b, action:"orfo", url:window.location.href}, function (b) {
                        "ok" == b ? a.browser.mozilla ? alert(xtm_p_send_ok) : xtmalert(xtm_p_send_ok, xtm_info) : a.browser.mozilla ? alert(b) : xtmalert(b, xtm_info)
                    })
                }
            }, a("#xtmpopup").remove(), a("body").append("<div id='xtmpopup' title='" + xtm_orfo_title + "' style='display:none'><br /><textarea name='xtm-promt-text' id='xtm-promt-text' class='ui-widget-content ui-corner-all' style='width:97%;height:80px; padding: .4em;'></textarea><div id='orfom' style='display:none'>" +
                c + "</div></div>"), a("#xtmpopup").dialog({autoOpen:!0, width:550, dialogClass:"modalfixed", buttons:b}), a(".modalfixed.ui-dialog").css({position:"fixed"}), a("#xtmpopup").dialog("option", "position", ["0", "0"])))
        }
    })
});