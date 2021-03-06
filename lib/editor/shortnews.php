<?php
if (!defined('XTMCMS')) {
    die("Hacking attempt!");
}
if ($mod != "editnews") {
    $row['id'] = "";
    $row['autor'] = $member_id['name'];
}
if (!isset ($row['short_story'])) $row['short_story'] = "";
$lang['wysiwyg_language'] = totranslit($lang['wysiwyg_language'], false, false);
$p_name = urlencode($row['autor']);
if ($config['allow_admin_wysiwyg'] == 1) {
    echo <<<HTML
<tr>
	<td width="140" valign="top">
	<br />$lang[addnews_short]</td>
	<td>
<script type="text/javascript" src="lib/editor/scripts/language/{$lang['wysiwyg_language']}/editor_lang.js"></script>
<script type="text/javascript" src="lib/editor/scripts/innovaeditor.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($){

	create_editor('');

	setTimeout(function() {
		
	    for(var i = 0;i < oUtil.arrEditor.length;i++) {
	      var oEditor = eval("idContent" + oUtil.arrEditor[i]);
	      var sHTML;
	      if(navigator.appName.indexOf("Microsoft") != -1) {
	        sHTML = oEditor.document.documentElement.outerHTML
	      }else {
	        sHTML = getOuterHTML(oEditor.document.documentElement)
	      }
	      sHTML = sHTML.replace(/FONT-FAMILY/g, "font-family");
	      var urlRegex = /font-family?:.+?(\;|,|")/g;
	      var matches = sHTML.match(urlRegex);
	      if(matches) {
	        for(var j = 0, len = matches.length;j < len;j++) {
	          var sFont = matches[j].replace(/font-family?:/g, "").replace(/;/g, "").replace(/,/g, "").replace(/"/g, "");
			  sFont=sFont.split("'").join('');
	          sFont = jQuery.trim(sFont);
	          var sFontLower = sFont.toLowerCase();
	          if(sFontLower != "serif" && sFontLower != "arial" && sFontLower != "arial black" && sFontLower != "bookman old style" && sFontLower != "comic sans ms" && sFontLower != "courier" && sFontLower != "courier new" && sFontLower != "garamond" && sFontLower != "georgia" && sFontLower != "impact" && sFontLower != "lucida console" && sFontLower != "lucida sans unicode" && sFontLower != "ms sans serif" && sFontLower != "ms serif" && sFontLower != "palatino linotype" && sFontLower != "tahoma" && sFontLower != 
	          "times new roman" && sFontLower != "trebuchet ms" && sFontLower != "verdana") {
	            sURL = "http://fonts.googleapis.com/css?family=" + sFont + "&subset=latin,cyrillic";
	            var objL = oEditor.document.createElement("LINK");
	            objL.href = sURL;
	            objL.rel = "StyleSheet";
	            oEditor.document.documentElement.childNodes[0].appendChild(objL)
	          }
	        }
	      }
	    }
	}, 100);

});

function create_editor( root ) {

	var use_br = false;
	var use_div = true;
	if ($.browser.mozilla || $.browser.webkit) { use_br = true; use_div = false; }
	
	oUtil.initializeEditor("wysiwygeditor",  {
		width: "98%", 
		height: "400", 
		css: root + "lib/editor/scripts/style/default.css",
		useBR: use_br,
		useDIV: use_div,
		groups:[
			["grpEdit1", "", ["FullScreen", "TextDialog", "FontDialog", "Subscript", "Superscript", "ForeColor", "BackColor", "BRK", "Bold", "Italic", "Underline", "Strikethrough", "xtmPasteText", "Styles", "RemoveFormat"]],
			["grpEdit2", "", ["JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull", "BRK", "Bullets", "Numbering", "Indent", "Outdent"]],
			["grpEdit3", "", ["TableDialog", "xtmSmiles", "FlashDialog", "CharsDialog", "Line", "BRK", "LinkDialog", "xtmLeech", "ImageDialog", "xtmUpload", "YoutubeDialog"]],
			["grpEdit4", "", ["xtmQuote", "xtmCode", "xtmHide", "xtmSpoiler", "CustomTag", "BRK", "xtmVideo", "xtmAudio", "xtmMedia", "HTML5Video", "xtmTypograf"]],
			["grpEdit5", "", ["SearchDialog", "SourceDialog", "BRK", "Undo", "Redo"]]
	    ],
		arrCustomButtons:[
			["xtmUpload", "media_upload('short_story', '{$p_name}', '{$row['id']}', '1')", "{$lang['bb_t_up']}", "xtm_upload.gif"],
			["xtmSmiles", "modalDialog('"+ root +"lib/editor/emotions.php',250,160)", "{$lang['bb_t_emo']}", "btnEmoticons.gif"],
			["xtmPasteText", "modalDialog('"+ root +"lib/editor/scripts/common/webpastetext.htm',450,380)", "{$lang['paste_text']}", "btnPaste.gif"],
			["xtmTypograf", "tag_typograf()", "{$lang['bb_t_t']}", "xtm_tt.gif"],
			["xtmQuote", "xtmcustomTag('[quote]', '[/quote]')", "{$lang['bb_t_quote']}", "xtm_quote.gif"],
			["xtmCode", "xtmcustomTag('[code]', '[/code]')", "{$lang['bb_t_code']}", "xtm_code.gif"],
			["xtmHide", "xtmcustomTag('[hide]', '[/hide]')", "{$lang['bb_t_hide']}", "xtm_hide.gif"],
			["xtmSpoiler", "xtmcustomTag('[spoiler]', '[/spoiler]')", "{$lang['bb_t_spoiler']}", "xtm_spoiler.gif"],
			["xtmLeech", "xtmcustomTag('[leech=http://]', '[/leech]')", "{$lang['bb_t_leech']}", "xtm_leech.gif"],
			["HTML5Video", "modalDialog('"+ root +"lib/editor/scripts/common/webvideo.htm',690,330)", "HTML5 Video", "btnMedia.gif"],
			["xtmVideo", "modalDialog('"+ root +"lib/editor/scripts/common/webbbvideo.htm',400,250)", "{$lang['bb_t_video']} (BB Codes)", "xtm_video.gif"],
			["xtmAudio", "modalDialog('"+ root +"lib/editor/scripts/common/webbbaudio.htm',400,200)", "{$lang['bb_t_audio']} (BB Codes)", "xtm_mp3.gif"],
			["xtmMedia", "modalDialog('"+ root +"lib/editor/scripts/common/webbbmedia.htm',400,250)", "{$lang['bb_t_yvideo']} (BB Codes)", "xtm_media.gif"]
		],
		arrCustomTag: [
			["{$lang['bb_t_br']}", "{PAGEBREAK}"],
	        ["{$lang['bb_t_p']}", "[page=1][/page]"]
		]
		}
	);	
};

function tag_typograf() {

	ShowLoading('');

	var oEditor = oUtil.oEditor;
	var obj = oUtil.obj;

	obj.saveForUndo();
    oEditor.focus();
    obj.setFocus();

	var txt = obj.getXHTMLBody();

	$.post("lib/ajax/typograf.php", {txt: txt}, function(data){
	
		HideLoading('');
	
		obj.loadHTML(data); 
	
	});

};
</script>
    <textarea id="short_story" name="short_story" class="wysiwygeditor" style="width:98%;height:300px;">{$row['short_story']}</textarea>
</td></tr>
HTML;
} else {
    echo <<<HTML
<tr>
	<td width="140" valign="top">
	<br />$lang[addnews_short]</td>
	<td>
<script type="text/javascript" src="lib/editor/jscripts/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
$(function(){

	$('textarea.wysiwygeditor').tinymce({
		script_url : 'lib/editor/jscripts/tiny_mce/tiny_mce_gzip.php',
		theme : "advanced",
		skin : "cirkuit",
		language : "{$lang['wysiwyg_language']}",
		width : "98%",
		height : "400",
		plugins : "table,style,advhr,spellchecker,advimage,advlist,emotions,inlinepopups,insertdatetime,media,searchreplace,paste,typograf",
		relative_urls : false,
		convert_urls : false,
		remove_script_host : false,
		media_strict : false,
		paste_auto_cleanup_on_paste : false,
		paste_text_use_dialog: true,

		dialog_type : 'window',
		extended_valid_elements : "noindex,div[align|class|style|id|title]",
		custom_elements : 'noindex',

		// Theme options
		theme_advanced_buttons1 : "formatselect,fontselect,fontsizeselect,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,forecolor,backcolor,|,code",
		theme_advanced_buttons2 : "tablecontrols,|,styleprops,spellchecker,typograf,|,sub,sup,|,charmap,advhr,visualaid,|,insertdate,inserttime,|,removeformat,cleanup",
		theme_advanced_buttons3 : "pastetext,pasteword,|,search,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,xtm_leech,|,xtm_upload,image,media,xtm_mp,xtm_mp3,emotions,xtm_spoiler,|,xtm_tube,xtm_quote,xtm_code,xtm_hide,xtm_break,xtm_page",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
	   	plugin_insertdate_dateFormat : "%d-%m-%Y",
	    plugin_insertdate_timeFormat : "%H:%M:%S",
		spellchecker_languages : "+Russian=ru,Ukrainian=uk,English=en",
		// Example content CSS (should be your site CSS)
		content_css : "{$config['http_home_url']}lib/editor/css/content.css",

		setup : function(ed) {
		        // Add a custom button
			ed.addButton('xtm_quote', {
			title : '{$lang['bb_t_quote']}',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_quote.gif',
			onclick : function() {
				// Add you own code to execute something on click
				ed.execCommand('mceReplaceContent',false,'[quote]' + ed.selection.getContent() + '[/quote]');
			}
	           });

			ed.addButton('xtm_hide', {
			title : '{$lang['bb_t_hide']}',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_hide.gif',
			onclick : function() {
				// Add you own code to execute something on click
				ed.execCommand('mceReplaceContent',false,'[hide]' + ed.selection.getContent() + '[/hide]');
			}
	           });

			ed.addButton('xtm_code', {
			title : '{$lang['bb_t_code']}',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_code.gif',
			onclick : function() {
				// Add you own code to execute something on click
				ed.execCommand('mceReplaceContent',false,'[code]' + ed.selection.getContent() + '[/code]');
			}
	           });

			ed.addButton('xtm_break', {
			title : '{$lang['bb_t_br']}',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_break.gif',
			onclick : function() {
				// Add you own code to execute something on click
				ed.execCommand('mceInsertContent',false,'{PAGEBREAK}');
			}
	           });

			ed.addButton('xtm_page', {
			title : '{$lang['bb_t_p']}',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_page.gif',
			onclick : function() {
				ed.execCommand('mceReplaceContent',false,"[page=1]{\$selection}[/page]");
			}
	           });

			ed.addButton('xtm_leech', {
			title : '{$lang['bb_t_leech']}',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_leech.gif',
			onclick : function() {
				ed.execCommand('mceReplaceContent',false,"[leech=http://]{\$selection}[/leech]");
			}
	           });

			ed.addButton('xtm_mp', {
			title : '{$lang['bb_t_video']} (BB Codes)',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_mp.gif',
			onclick : function() {
				ed.execCommand('mceInsertContent',false,"[video=http://]");
			}
	           });

			ed.addButton('xtm_tube', {
			title : '{$lang['bb_t_yvideo']} (BB Codes)',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_tube.gif',
			onclick : function() {
				ed.execCommand('mceInsertContent',false,"[media=http://]");
			}
	           });

			ed.addButton('xtm_upload', {
			title : '{$lang['bb_t_up']}',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_upload.gif',
			onclick : function() {
				media_upload('short_story', '{$p_name}', '{$row['id']}', '2');
			}
	           });

			ed.addButton('xtm_spoiler', {
			title : '{$lang['bb_t_spoiler']}',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_spoiler.gif',
			onclick : function() {
				// Add you own code to execute something on click
				ed.execCommand('mceReplaceContent',false,'[spoiler]' + ed.selection.getContent() + '[/spoiler]');
			}
	           });

			ed.addButton('xtm_mp3', {
			title : '{$lang['bb_t_audio']}',
			image : '{$config['http_home_url']}lib/editor/jscripts/tiny_mce/themes/advanced/img/xtm_mp3.gif',
			onclick : function() {
				ed.execCommand('mceInsertContent',false,"[audio=http://]");
			}
	           });
   		 }


	});

});
</script>

    <textarea id="short_story" name="short_story" class="wysiwygeditor" style="width:98%;height:300px;">{$row['short_story']}</textarea>
</td></tr>
HTML;
}
?>