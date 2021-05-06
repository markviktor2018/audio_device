var editor_timeout = 0;
var editor_range = null;

function editor_button_on(what) {
    what.className = 'editor_button_hover';
}
function editor_button_off(what) {
    what.className = 'editor_button';
}

function editor_refresh_html() {
	document.all('edited_html').value = editor_frame.document.body.innerHTML;
}

function editor_refresh_normal() {
	editor_frame.document.body.innerHTML = document.all('edited_html').value;
}

function editor_show_html() {
	editor_close_submenu();
	document.all("editor_mode_norm").className = 'show0';
	document.all("editor_normal").className = 'show0';
	editor_refresh_html();
	document.all("editor_mode_html").className = 'show1';
	document.all("editor_html").className = 'show1';
	edited_html.focus();
}

function editor_show_normal() {
	editor_close_submenu();
	document.all("editor_mode_html").className = 'show0';
	document.all("editor_html").className = 'show0';
	editor_refresh_normal();
	document.all("editor_mode_norm").className = 'show1';
	document.all("editor_normal").className = 'show1';
	editor_frame.focus();
}

function editor_open_submenu(obj) {
	if (document.all(obj).style.display == "block") {
		document.all(obj).style.display = "none";
	} else {
		editor_close_submenu();
		document.all(obj).style.display = "block";
	}
}

function editor_close_submenu() {
	document.all.div_colors.style.display = "none";
	document.all.div_symbols.style.display = "none";
	clearTimeout(editor_timeout);
    editor_timeout = 0;
}

function editor_keep_hide() {
    if (editor_timeout == 0) {
        editor_timeout = setTimeout('editor_close_submenu()', 1000);
    }
}

function editor_keep_show() {
    if (editor_timeout != 0) {
        clearTimeout(editor_timeout);
        editor_timeout = 0;
    }
}

function editor_loaded() {
	f = document.getElementById("editor_frame");
	f.contentWindow.document.designMode = "on";
	if (f.contentWindow.document.body) {
		f.contentWindow.document.body.innerHTML = document.all("text_to_edit").innerHTML;
		document.all("edited_html").value = document.all("text_to_edit").innerHTML;
	}
}

function editor_FormatText(command, option) {
	editor_close_submenu();
	editor_frame.focus();
	editor_frame.document.execCommand(command, false, option);
}

function editor_get_range() {
	if (document.selection) {
		editor_frame.focus();
		editor_range = editor_frame.document.selection.createRange();
	} else if (document.getSelection) {
		editor_range = document.getElementById("editor_frame").contentWindow.getSelection().getRangeAt(0).cloneRange();
	} else {
		alert('Браузер не поддерживает эту функцию');
		editor_range = false;
	}
}

function editor_PasteHTML(html) {
	if (editor_range.pasteHTML) {
		editor_frame.focus();
		editor_range.pasteHTML(html);
		editor_range.select();
	} else {
		editor_FormatText('insertHTML', html);
	}
}

function editor_createlink() {
	if (document.getSelection) {
		editor_FormatText('CreateLink', prompt('Адрес','http://'));
	} else {
		editor_FormatText('CreateLink');
	}
}

function editor_open_dialog(dialog, first_field) {
	document.all('editor_blocking').style.display = "block";
	document.all('editor_select_style').disabled = "disabled";
	document.all('editor_dialog_'+dialog).style.display = "block";
	document.all(first_field).focus();
	document.all(first_field).select();
}
function editor_close_dialog(dialog) {
	document.all('editor_blocking').style.display = "none";
	document.all('editor_select_style').disabled = "";
	document.all('editor_dialog_'+dialog).style.display = "none";
}


function editor_insert_table() {
	CTD = '';
	for (i=0; i<document.all.editor_addtable_cols.value; i++) {
		CTD = CTD+'<td>&nbsp;</td>';
	}
	CTR = '';
	for (i=0; i<document.all.editor_addtable_rows.value; i++) {
		CTR = CTR+'<tr>'+CTD+'</tr>';
	}
	editor_PasteHTML('<table width='+document.all.editor_addtable_width.value+' border='+document.all.editor_addtable_border.value+'>'+CTR+'</table>');
}

function editor_get_parent(tag) {
	if (document.selection) {
		if (editor_frame.document.selection.type == "Control") {
			return null;
		} else {
			var obj = editor_frame.document.selection.createRange().parentElement();
			while (obj.tagName != tag && obj.tagName != "BODY") {
				obj = obj.parentElement;
			}
			if (obj.tagName == "BODY") {
				return null;
			} else {
				return obj;
			}
		}
	} else if (document.getSelection) {
		startRangeNode = document.getElementById('editor_frame').contentWindow.getSelection().getRangeAt(0).startContainer;
		var obj = startRangeNode.parentNode;
		while (obj.nodeName != tag && obj.nodeName != "BODY") {
			obj = obj.parentNode;
		}
		if (obj.tagName == "BODY") {
			return null;
		} else {
			return obj;
		}
	} else {
		alert('Браузер не поддерживает эту функцию.');
		return null;
	}
}

function editor_insert_col() {
	td = editor_get_parent('TD');
	if (td != null) {
		pos = td.cellIndex;
		table = editor_get_parent('TABLE');
		for (i=0; i<table.rows.length; i++) {
			td = table.rows[i].insertCell(pos);
			td.innerHTML = "&nbsp;";
		}
	}
	editor_frame.focus();
}

function editor_delete_col() {
	td = editor_get_parent('TD');
	if (td != null) {
		pos = td.cellIndex;
		table = editor_get_parent('TABLE');
		for (i=0; i<table.rows.length; i++) {
			td = table.rows[i].deleteCell(pos);
		}
	}
	editor_frame.focus();
}

function editor_insert_row() {
	table = editor_get_parent('TABLE');
	if (table != null) {
		tr = editor_get_parent('TR');
		newtr = table.insertRow(tr.rowIndex);
		for (i=0; i<tr.cells.length; i++){
			td = newtr.insertCell(i);
			td.innerHTML = "&nbsp;";
		}
	}
	editor_frame.focus();
}

function editor_delete_row() {
	tr = editor_get_parent('TR');
	if (tr != null) {
		table = editor_get_parent('TABLE');
		table.deleteRow(tr.rowIndex);
	}
	editor_frame.focus();
}

function editor_split_cell() {
	td = editor_get_parent('TD');
	if (td != null) {
		tr = editor_get_parent('TR');
		pos = td.cellIndex;
		newtd = tr.insertCell(pos+1);
		newtd.innerHTML = "&nbsp;";
		table = editor_get_parent('TABLE');
		for (i=0; i<table.rows.length; i++) {
			if (i != tr.rowIndex && table.rows[i].cells[pos]) {
				table.rows[i].cells[pos].colSpan += 1;
			}
		}
	}
	editor_frame.focus();
}

function editor_get_cell() {
	td = editor_get_parent('TD');
	if (td != null) {
		editor_range = td;
		editor_open_dialog('cell','editor_cell_width');
		document.all.editor_cell_width.value = td.width;
		document.all.editor_cell_height.value = td.height;
	}
}

function editor_set_cell() {
	if ((editor_range != null) && (editor_range.tagName == 'TD')) {
		editor_range.width = document.all.editor_cell_width.value;
		editor_range.height = document.all.editor_cell_height.value;
	}
	editor_range = null;
}

function editor_insert_image() {
	editor_PasteHTML('<img src="'+document.all.editor_addimage_url.value+'" alt="'+document.all.editor_addimage_alt.value+'" align='+document.all.editor_addimage_align.value+'>');
}