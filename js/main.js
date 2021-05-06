function close_call() {
 document.getElementById('lidu_call_form').submit();
}


function block_photo(id) {
if (confirm('Вы действительно хотите удалить данное фото из базы фото-доноров?')) {
 document.getElementById('lid').value=id;
 document.getElementById('del_lid').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function block_video(id) {
if (confirm('Вы действительно хотите удалить данное видео из базы видео-доноров?')) {
 document.getElementById('lid').value=id;
 document.getElementById('del_lid').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function block_group(id) {
if (confirm('Вы действительно хотите удалить данную группу из базы групп-доноров?')) {
 document.getElementById('lid').value=id;
 document.getElementById('del_lid').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function block_posts(id) {
if (confirm('Вы действительно хотите удалить данный пост из базы постов-доноров?')) {
 document.getElementById('lid').value=id;
 document.getElementById('del_lid').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function check_call() {
var sel = document.getElementById("status_call");
var val = sel.options[sel.selectedIndex].value;

if(val==0) { 
	alert('Пожалуйста, выберите статус!');
	} else {
	document.getElementById("add_call").submit();	
	}

}

function check_del(id,name) {
if (confirm('Вы действительно хотите удалить данного бота из системы? Бот будет также удален и с компьютера пользователя!')) {
 document.getElementById('lid').value=id;
 document.getElementById('del_lid').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function check_soft_del(id,name) {
if (confirm('Вы действительно хотите удалить данного персонажа из базы инфо-доноров?')) {
 document.getElementById('lid').value=id;
 document.getElementById('del_lid').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function check_del_rekl(id,name) {
if (confirm('Вы действительно хотите удалить данную рекламу из системы?')) {
 document.getElementById('id_reklam').value=id;
 document.getElementById('del_reklam').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function check_del_companies(id) {
if (confirm('Вы действительно хотите удалить эту компанию?')) {
 document.getElementById('id_company').value=id;
 document.getElementById('del_company').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function gotopage(pg) {
document.getElementById('to_page').value=pg;
document.getElementById('sort_form').submit();
}

function view_details_company(id) {
 document.getElementById('id_view_company').value=id;
 document.getElementById('view_company').submit();
}

function check_edit_company() {

 document.getElementById('edit_company').submit();
 
}

function del_file(id) {
if (confirm('Вы действительно хотите удалить этот файл?')) {
document.getElementById('id_del_file').value=id;
document.getElementById('del_file_f').submit();
}
}



		var count=1;

		 function check_add_lid() {

 var org1 = document.getElementById("org1").value;
 var name1=document.getElementById("name1").value;
 var mobile1=document.getElementById("mobile_phone1").value;

 var name2=document.getElementById("name2").value;
 var dolgn2=document.getElementById("dolgn2").value;
 var mobile2=document.getElementById("mobile_phone2").value;
 var email2=document.getElementById("email2").value;
 
  var name3=document.getElementById("name3").value;
 var dolgn3=document.getElementById("dolgn3").value;
 var mobile3=document.getElementById("mobile_phone3").value;
 var email3=document.getElementById("email3").value;
 
  var name4=document.getElementById("name4").value;
 var dolgn4=document.getElementById("dolgn4").value;
 var mobile4=document.getElementById("mobile_phone4").value;
 var email4=document.getElementById("email4").value;
 
  var name5=document.getElementById("name5").value;
 var dolgn5=document.getElementById("dolgn5").value;
 var mobile5=document.getElementById("mobile_phone5").value;
 var email5=document.getElementById("email5").value;

    if(count==1) {
		/////проверка по первому слою
		if((org1!="")&&(name1!="")&&(mobile1!="")) {
		document.getElementById('add_lid').submit();
		} else {
		alert('Вы не заполнили все необходимые поля!');
		}
	} else
	if(count==2) {
		if((org1!="")&&(name1!="")&&(mobile1!="")&&(name2!="")&&(dolgn2!="")&&(mobile2!="")&&(email2!="")) {
		document.getElementById('add_lid').submit();
		} else {
		alert('Вы не заполнили все необходимые поля!');
		}
	} else
	if(count==3) {
			if((org1!="")&&(name1!="")&&(mobile1!="")&&(name2!="")&&(mobile2!="")&&(name3!="")&&(mobile3!="")) {
		document.getElementById('add_lid').submit();
		} else {
		alert('Вы не заполнили все необходимые поля!');
		}
	
	} else
	if(count==4) {
				if((org1!="")&&(name1!="")&&(mobile1!="")&&(name2!="")&&(mobile2!="")&&(name3!="")&&(mobile3!="")&&(name4!="")&&(mobile4!="")) {
		document.getElementById('add_lid').submit();
		} else {
		alert('Вы не заполнили все необходимые поля!');
		}
	}
	else
	if(count==5) {
				if((org1!="")&&(name1!="")&&(mobile1!="")&&(name2!="")&&(mobile2!="")&&(name3!="")&&(mobile3!="")&&(name4!="")&&(mobile4!="")&&(name5!="")&&(mobile5!="")) {
		document.getElementById('add_lid').submit();
		} else {
		alert('Вы не заполнили все необходимые поля!');
		}
	
	
	}

 }
		
		
 function add_contact() {
	if(count==1) {
	var elm = document.getElementById("contact2");
	elm.style.visibility = "visible";
	elm.style.height = "260px";
	var eid = document.getElementById("add1");
	eid.style.visibility = "hidden";
	var eid2 = document.getElementById("add2");
	eid2.style.visibility = "visible";
	count=2;
	} else
	if(count==2) {
	var elm = document.getElementById("contact3");
	elm.style.visibility = "visible";
	elm.style.height = "260px";
	var eid = document.getElementById("add2");
	eid.style.visibility = "hidden";
	var eid2 = document.getElementById("add3");
	eid2.style.visibility = "visible";
	count=3;
	} else
	if(count==3) {
	var elm = document.getElementById("contact4");
	elm.style.visibility = "visible";
	elm.style.height = "260px";
	var eid = document.getElementById("add3");
	eid.style.visibility = "hidden";
	var eid2 = document.getElementById("add4");
	eid2.style.visibility = "visible";
	count=4;
	} else
	if(count==4) {
	var elm = document.getElementById("contact5");
	elm.style.visibility = "visible";
	elm.style.height = "260px";
	var eid = document.getElementById("add4");
	eid.style.visibility = "hidden";
	var eid2 = document.getElementById("add5");
	eid2.style.visibility = "visible";
	count=5;
	}
 }
 
 
 
  function del_contact() {
  
	if(count==2) {
	var elm = document.getElementById("contact2");
	elm.style.visibility = "hidden";
	elm.style.height = "1px";
	var eid = document.getElementById("add1");
	eid.style.visibility = "visible";
	var eid2 = document.getElementById("add2");
	eid2.style.visibility = "hidden";
	count=1;
	
	 document.getElementById("name2").value="";
	 document.getElementById("dolgn2").value="";
	 document.getElementById("mobile2").value="";
	 document.getElementById("phone2").value="";
	 document.getElementById("email2").value="";
	 
	} else
	if(count==3) {
	var elm = document.getElementById("contact3");
	elm.style.visibility = "hidden";
	elm.style.height = "1px";
	var eid = document.getElementById("add2");
	eid.style.visibility = "visible";
	var eid2 = document.getElementById("add3");
	eid2.style.visibility = "hidden";
	count=2;
	
	 document.getElementById("name3").value="";
	 document.getElementById("dolgn3").value="";
	 document.getElementById("mobile3").value="";
	 document.getElementById("email3").value="";
	 document.getElementById("phone3").value="";
	} else
	if(count==4) {
	var elm = document.getElementById("contact4");
	elm.style.visibility = "hidden";
	elm.style.height = "1px";
	var eid = document.getElementById("add3");
	eid.style.visibility = "visible";
	var eid2 = document.getElementById("add4");
	eid2.style.visibility = "hidden";
	count=3;
	
	 document.getElementById("name4").value="";
	 document.getElementById("dolgn4").value="";
	 document.getElementById("mobile4").value="";
	 document.getElementById("email4").value="";
	 document.getElementById("phone4").value="";
	} else
	if(count==5) {
	var elm = document.getElementById("contact5");
	elm.style.visibility = "hidden";
	elm.style.height = "1px";
	var eid = document.getElementById("add4");
	eid.style.visibility = "visible";
	var eid2 = document.getElementById("add5");
	eid2.style.visibility = "hidden";
	count=4;
	
	 document.getElementById("name5").value="";
	 document.getElementById("dolgn5").value="";
	 document.getElementById("mobile5").value="";
	 document.getElementById("email5").value="";
	 document.getElementById("phone5").value="";
	}	
 }

 function check_prihod() {
  var summ = document.getElementById("summ").value;
	if(summ=="") {
	alert('Необходимо обязательно указать сумму!');
	} else {
	document.getElementById("add_prihod_form").submit();
	}
 }
 
 function change_type() {
 
 var sel = document.getElementById("type_rashod");
var val = sel.options[sel.selectedIndex].value;

	if(val==0) {
		var elm = document.getElementById("div_prihod1");
		elm.style.visibility = "visible";
		elm.style.height = "25px";
		
		var elm2 = document.getElementById("div_prihod2");
		elm2.style.visibility = "visible";
		elm2.style.height = "25px";
		
		var elm3 = document.getElementById("div_rashod");
		elm3.style.visibility = "hidden";
		elm3.style.height = "1px";
		
		var company = document.getElementById("company");
		company.style.visibility = "visible";
		company.style.height = "30px";
		
		var other_prihod = document.getElementById("other_prihod");
		other_prihod.style.visibility = "visible";
		other_prihod.style.height = "50px";
		
		var target = document.getElementById("target");
		target.style.visibility = "hidden";
		target.style.height = "1px";
		
		
	} else {
		var elm = document.getElementById("div_prihod1");
		elm.style.visibility = "hidden";
		elm.style.height = "1px";
		
		var elm2 = document.getElementById("div_prihod2");
		elm2.style.visibility = "hidden";
		elm2.style.height = "1px";
		
		var elm3 = document.getElementById("div_rashod");
		elm3.style.visibility = "visible";
		elm3.style.height = "25px";
		
		
		var company = document.getElementById("company");
		company.style.visibility = "hidden";
		company.style.height = "1px";
		
		var other_prihod = document.getElementById("other_prihod");
		other_prihod.style.visibility = "hidden";
		other_prihod.style.height = "1px";
		
		var target = document.getElementById("target");
		target.style.visibility = "visible";
		target.style.height = "50px";
	}
 
 }
 
 
 function del_pr(id) {
if (confirm('Вы действительно хотите удалить эту запись о приходе/расходе?')) {
document.getElementById('id_zap').value=id;
document.getElementById('del_pr').submit();
}
}


 function change_type_companies() {
 
 var sel = document.getElementById("type_rashod");
var val = sel.options[sel.selectedIndex].value;

	if(val==0) {

				
		var elm3 = document.getElementById("div_rashod");
		elm3.style.visibility = "hidden";
		elm3.style.height = "1px";
		
		
		var target = document.getElementById("target");
		target.style.visibility = "hidden";
		target.style.height = "1px";
		
		
	} else {
		
				var elm3 = document.getElementById("div_rashod");
		elm3.style.visibility = "visible";
		elm3.style.height = "25px";
		
		var target = document.getElementById("target");
		target.style.visibility = "visible";
		target.style.height = "50px";
	}
 
 }
 
 
 
 function showFile() {
  var files =document.getElementById('file_photo');
     f=files;
	//// alert(f.value);

   ////      document.getElementById("photo_preview").src = f.value;
 
  }
  
  
function check_add_work() {

var fio=document.getElementById('fio').value;
var region=document.getElementById('region').value;
var data_rogd=document.getElementById('data_rogd').value;
var vozrast=document.getElementById('vozrast').value;
var phone=document.getElementById('phone').value;


 if((fio!="")&&(region!="")&&(data_rogd!="")&&(vozrast!="")&&(phone!="")) {
 document.getElementById('add_worker').submit();
 } else {
 alert('Вы не указали все обязательные поля!');
 }

}

function check_del_work(id) {
if (confirm('Вы действительно хотите удалить эту запись из системы?')) {
	
	$.ajax({
                type: 'POST',
                url: '/del_zap.php',
                data: 'id_del='+id,
                // Выводим то что вернул PHP
                success: function(html) {
						get_table();
                 }
        });
	
	}
}


function view_details_work(id,fio) {
document.getElementById('id_view_work').value=id;
document.getElementById('fio_edit_work').value=fio;
document.getElementById('view_work_form').submit();
}


function check_edit_work() {
var fio=document.getElementById('fio').value;
var region=document.getElementById('region').value;
var data_rogd=document.getElementById('data_rogd').value;
var vozrast=document.getElementById('vozrast').value;
var phone=document.getElementById('phone').value;


 if((fio!="")&&(region!="")&&(data_rogd!="")&&(vozrast!="")&&(phone!="")) {
 document.getElementById('edit_worker').submit();
 } else {
 alert('Вы не указали все обязательные поля!');
 }

}

function del_file_w(id) {
if (confirm('Вы действительно хотите удалить этот файл?')) {
document.getElementById('id_del_file_w').value=id;
document.getElementById('del_file_f_w').submit();
}
}


function check_add_zayav() {
var dolgn=document.getElementById('dolgn').value;

var kolvo=document.getElementById('kolvo').value;
var reserv=document.getElementById('reserv').value;
var region=document.getElementById('region').value;
var period1=document.getElementById('period1').value;
var period2=document.getElementById('period2').value;
var time_start=document.getElementById('time_start').value;
var time_all=document.getElementById('time_all').value;
var stavka=document.getElementById('stavka').value;
var sdelka=document.getElementById('sdelka').value;


 if((dolgn!="")&&(kolvo!="")&&(region!="")&&(period1!="")&&(period2!="")&&(time_start!="")&&(time_all!="")&&((stavka!="")||(sdelka!=""))) {
 document.getElementById('add_zayav').submit();
 } else {
 alert('Вы не указали все обязательные поля!');
 }

}


////////////////////////////////////////////////////////////////
/////////////////////Подбор персонала///////////////////////////

function view_podbor(id_company,id_zayav) {
document.getElementById('id_company_view').value=id_company;
document.getElementById('id_zayav_view').value=id_zayav;
document.getElementById('view_podbor_f').submit();

}

function vubor_w(id,id_zayav,den) {

if(document.getElementById('vubor_w'+id).checked==true) {
var type="add";
///////убираем check у резерва если он есть
if(document.getElementById('vubor_r'+id).checked==true) {
document.getElementById('vubor_r'+id).checked=false;
		$.ajax({
                type: 'POST',
                url: '/select_for_reserv.php',
                data: 'id_work='+id+'&id_zayav='+id_zayav+'&den='+den+'&type=del',
                // Выводим то что вернул PHP
                success: function(html) {
				if(html!="cancel") {
				document.getElementById('all_reserv').innerHTML=html*1;
				if(html*1==0) {
				document.getElementById('status_res').style.visibility="visible";
				} else {
				document.getElementById('status_res').style.visibility="hidden";
				}
				}
				
				if(html=="cancel") {
					////снимаем галочку выбора у этого чекбокса
					document.getElementById('vubor_r'+id).checked=false;
									//////человек свободен
				document.getElementById('status_'+id).style.visibility="visible";
				document.getElementById('work_status_'+id).style.visibility="hidden";
					}
					
			  if((document.getElementById('all_reserv').innerHTML*1==0)&&(document.getElementById('all_kolvo').innerHTML*1==0)) {
			  document.getElementById('status_zayav').style.visibility="visible";
			  } else {
			   document.getElementById('status_zayav').style.visibility="hidden";
			  }
                 }
				 
        });
}
} else {
var type="del";

}

$.ajax({
                type: 'POST',
                url: '/select_for_work.php',
                data: 'id_work='+id+'&id_zayav='+id_zayav+'&den='+den+'&type='+type,
                // Выводим то что вернул PHP
                success: function(html) {
				if(html!="cancel") {
				document.getElementById('all_kolvo').innerHTML=html*1;
								if(html*1==0) {
				document.getElementById('status_all').style.visibility="visible";
				} else {
				document.getElementById('status_all').style.visibility="hidden";
				}
				}
				
				if(html=="cancel") {
					////снимаем галочку выбора у этого чекбокса
					document.getElementById('vubor_w'+id).checked=false;
									//////человек свободен
				document.getElementById('status_'+id).style.visibility="visible";
				document.getElementById('work_status_'+id).style.visibility="hidden";
					}
			if((document.getElementById('all_reserv').innerHTML*1==0)&&(document.getElementById('all_kolvo').innerHTML*1==0)) {
			  document.getElementById('status_zayav').style.visibility="visible";
			  } else {
			   document.getElementById('status_zayav').style.visibility="hidden";
			  }
                 }
				 
        });

////теперь по итогам смотрим, свободен ли этот рабочий или уже нет
if((document.getElementById('vubor_w'+id).checked==false)&&(document.getElementById('vubor_r'+id).checked==false)) {
//////человек свободен
document.getElementById('status_'+id).style.visibility="visible";
document.getElementById('work_status_'+id).style.visibility="hidden";
} else {
//////человек работает
document.getElementById('status_'+id).style.visibility="hidden";
document.getElementById('work_status_'+id).style.visibility="visible";
}

}


function vubor_r(id,id_zayav,den) {

if(document.getElementById('vubor_r'+id).checked==true) {
var type="add";
///////убираем check у работы если он есть
if(document.getElementById('vubor_w'+id).checked==true) {
document.getElementById('vubor_w'+id).checked=false;
		$.ajax({
                type: 'POST',
                url: '/select_for_work.php',
                data: 'id_work='+id+'&id_zayav='+id_zayav+'&den='+den+'&type=del',
                // Выводим то что вернул PHP
                success: function(html) {
				if(html!="cancel") {
				document.getElementById('all_kolvo').innerHTML=html*1;
				////////надпись что все укомплектовано
				if(html*1==0) {
				document.getElementById('status_all').style.visibility="visible";
				} else {
				document.getElementById('status_all').style.visibility="hidden";
				}
				
				}
				
				if(html=="cancel") {
					////снимаем галочку выбора у этого чекбокса
					document.getElementById('vubor_w'+id).checked=false;
									//////человек свободен
				document.getElementById('status_'+id).style.visibility="visible";
				document.getElementById('work_status_'+id).style.visibility="hidden";
					}
					
						  if((document.getElementById('all_reserv').innerHTML*1==0)&&(document.getElementById('all_kolvo').innerHTML*1==0)) {
			  document.getElementById('status_zayav').style.visibility="visible";
			  } else {
			   document.getElementById('status_zayav').style.visibility="hidden";
			  }
                 }
				 
        });
}
} else {
var type="del";
}

$.ajax({
                type: 'POST',
                url: '/select_for_reserv.php',
                data: 'id_work='+id+'&id_zayav='+id_zayav+'&den='+den+'&type='+type,
                // Выводим то что вернул PHP
                success: function(html) {
				if(html!="cancel") {
				document.getElementById('all_reserv').innerHTML=html*1;
												if(html*1==0) {
				document.getElementById('status_res').style.visibility="visible";
				} else {
				document.getElementById('status_res').style.visibility="hidden";
				}
				}
				
				if(html=="cancel") {
					////снимаем галочку выбора у этого чекбокса
					document.getElementById('vubor_r'+id).checked=false;
					//////человек свободен
					document.getElementById('status_'+id).style.visibility="visible";
					document.getElementById('work_status_'+id).style.visibility="hidden";
					}
						  if((document.getElementById('all_reserv').innerHTML*1==0)&&(document.getElementById('all_kolvo').innerHTML*1==0)) {
			  document.getElementById('status_zayav').style.visibility="visible";
			  } else {
			   document.getElementById('status_zayav').style.visibility="hidden";
			  }
                 }
				 
        });
		
////теперь по итогам смотрим, свободен ли этот рабочий или уже нет
if((document.getElementById('vubor_w'+id).checked==false)&&(document.getElementById('vubor_r'+id).checked==false)) {
//////человек свободен
document.getElementById('status_'+id).style.visibility="visible";
document.getElementById('work_status_'+id).style.visibility="hidden";
} else {
//////человек работает
	if(document.getElementById('vubor_r'+id).checked==true) {
		document.getElementById('status_'+id).style.visibility="visible";
		document.getElementById('work_status_'+id).style.visibility="hidden";
	/////	document.getElementById('status_'+id).innerHTML='<font size=\"-1\" color=\"green\">В резерве';
		} else {
document.getElementById('status_'+id).style.visibility="hidden";
document.getElementById('work_status_'+id).style.visibility="visible";
////document.getElementById('status_'+id).innerHTML='<font size=\"-1\" color=\"green\">Свободен';
}


}

}

function now_work_check(id,den_select) {
var sel = document.getElementById("work_status_sel_"+id);
var val = sel.options[sel.selectedIndex].value;


if(val=="0") {
document.getElementById("id_is_worker").value=id;
document.getElementById("den_select_worker").value=den_select;
document.getElementById("is_work").submit();
}

if((val=="1")) {
document.getElementById("id_no_worker_bad").value=id;
document.getElementById("den_select_worker_bad").value=den_select;
document.getElementById("no_work").submit();

}


if((val=="12")) {
document.getElementById("id_is_worker_good").value=id;
document.getElementById("status_no_work").value=val;
document.getElementById("den_select_worker_good").value=den_select;
document.getElementById("no_work_good").submit();
}



if((val=="4")||(val=="5")||(val=="7")||(val=="8")||(val=="9")||(val=="10")||(val=="11")) {
document.getElementById("id_work_zvonok").value=id;
document.getElementById("zvonok").value=val;
document.getElementById("status_dop").submit();
}

}

function show_shtraf() {
if(document.getElementById("is_find").checked==true) {
document.getElementById("finds").disabled=false;
} else {
document.getElementById("finds").disabled=true;
document.getElementById("finds").value=0;
}
}

function check_shtraf() {

if(document.getElementById("is_find").checked==true) {
	if((document.getElementById("comment_no_work").value!="")&&(document.getElementById("finds").value!="")) {
	document.getElementById("no_work_complete").submit();
	} else {
	alert('Заполните пожалуйста причину не выхода на работу и размер штрафа!');
	}
} else {

	if((document.getElementById("comment_no_work").value!="")) {
	document.getElementById("no_work_complete").submit();
	} else {
	alert('Заполните пожалуйста причину не выхода на работу!');
	}


}

}

function check_del_zayav(id) {
if (confirm('Вы действительно хотите удалить эту заявку ?')) {
 document.getElementById('del_zayav_id').value=id;
 document.getElementById('del_zayav_form').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function edit_zayav(id) {
 document.getElementById('id_zayav_edit').value=id;
 document.getElementById('edit_zayav').submit();

}

function check_edit_zayav() {
var dolgn=document.getElementById('dolgn').value;

var kolvo=document.getElementById('kolvo').value;
var reserv=document.getElementById('reserv').value;
var region=document.getElementById('region').value;
var period1=document.getElementById('period1').value;
var period2=document.getElementById('period2').value;
var time_start=document.getElementById('time_start').value;
var time_all=document.getElementById('time_all').value;
var stavka=document.getElementById('stavka').value;
var sdelka=document.getElementById('sdelka').value;


 if((dolgn!="")&&(kolvo!="")&&(region!="")&&(period1!="")&&(period2!="")&&(time_start!="")&&(time_all!="")&&((stavka!="")||(sdelka!=""))) {
 document.getElementById('edit_zayav_form').submit();
 } else {
 alert('Вы не указали все обязательные поля!');
 }
}


function del_shtraf(id) {

if (confirm('Вы действительно хотите удалить эту запись о штрафе?')) {
document.getElementById('id_zap_del_shtraf').value=id;
document.getElementById('del_shtraf').submit();
}
}


function validate(inp) { 
inp.value = inp.value.replace(/[^\d,.]*/g, '') 
.replace(/([,.])[,.]+/g, '$1') 
.replace(/^[^\d]*(\d+([.,]\d{0,5})?).*$/g, '$1'); 
}




function calc_summ_days(id,i,mes,year,type) {
////сохраняем все данные в базе, все часы отработанные в этот день и новый штраф

var zapr="mes="+mes+"&year="+year+"&id_work="+id+"&type="+type+"&shtraf="+document.getElementById("shtraf_"+id+"_"+i+mes+year).value*1;

var k=1;
////здесь перебираем значение поля со штрафом и всех существующих полей с часами работы и формируем строку запроса
for(k=1;k<=32;k++) {
if(document.getElementById("time_day_"+k+"_"+id)) {///////такое поле существует
	////смотрим ставка это или сделка
	zapr=zapr+"&day"+k+"="+document.getElementById("time_day_"+k+"_"+id).value*1;
	}
}


////сохраняем в базу

$.ajax({
                type: 'POST',
                url: '/save_hours.php',
                data: zapr,
                // Выводим то что вернул PHP
                success: function(html) {
				////все часы и штрафы сохранили, теперь собственно считаем получившуюся сумму
				calc_summ(id,mes,year,type);	
				}
 });

}




function calc_summ(id,mes,year,type) {
$.ajax({
							type: 'POST',
							url: '/calc_summ.php',
							data: 'id_work='+id+'&mes='+mes+'&year='+year,
							// Выводим то что вернул PHP
							success: function(html) {
							////alert(html);
							document.getElementById('res_id_'+id).innerHTML=html*1;
							document.getElementById('zar_id_'+id).innerHTML=html*1;
							
							if(html*1>0) {
							////покажем кнопку зарплата
							document.getElementById('zarplata_button_'+id).style.visibility="visible";
							} else {
							document.getElementById('zarplata_button_'+id).style.visibility="hidden";
							}
							 }
					});
					
$.ajax({
							type: 'POST',
							url: '/calc_hours.php',
							data: 'id_work='+id+'&mes='+mes+'&year='+year,
							// Выводим то что вернул PHP
							success: function(html) {
						///	alert(html);
						if(type!='1') {
							document.getElementById('hours_'+id).innerHTML="<font size='-1'>"+html*1;
						} else {
						document.getElementById('hours_night_'+id).innerHTML="<font size='-1'>"+html*1;
						}
							 }
					});

}

function show_contacts(id) {

	var elm = document.getElementById("contacts_"+id);
	if(elm.style.visibility=="hidden") {
		elm.style.visibility = "visible";
	} else {
		elm.style.visibility = "hidden";
	}

}


function show_call_history(id) {
var elm = document.getElementById("history_"+id);
	/////var but = document.getElementById("button_"+id);
	if(elm.style.visibility=="hidden") {
		elm.style.visibility = "visible";
	//////	but.value="Скрыть контакты";
	} else {
		elm.style.visibility = "hidden";
	//////	but.value="Показать контакты";
	}

}


function check_del_lid_contact(id,name) {

if (confirm('Вы действительно хотите удалить контакт '+name+'?')) {
 document.getElementById('lid_contact').value=id;
 document.getElementById('del_contact_lid').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }


}

function calc_vozract() {
var data_rogd=document.getElementById('data_rogd').value;
if(data_rogd!="") {
var god=data_rogd.substring(data_rogd.length-4)*1;
if(document.getElementById('now_year').value*1-god>0) {
document.getElementById('vozrast').value=document.getElementById('now_year').value*1-god; 
} else {
document.getElementById('vozrast').value=0;
}
} else {
document.getElementById('vozrast').value=0;
}
}

function open_info_work(id,fio) {
var str="/show_info.php?id_view_work="+id+"&fio_edit_work="+fio;
window.open(str,'Данные '+fio,'width=1400,height=1000,location=no,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=yes');
}

function show_history(id) {
var str="/show_history.php?id_view_work="+id;
window.open(str,'История звонков','width=1400,height=1000,location=no,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=yes');
}

function show_smens(id) {
var str="/show_smens.php?id_view_work="+id;
window.open(str,'История смен','width=1400,height=1000,location=no,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=yes');
}

function close_info_zayav() {
var elm = document.getElementById("popup_info_zayav");
		elm.style.visibility = "hidden";
}

function show_work_info(id) {
document.getElementById(id).style.visibility="visible";
}

function close_work_info(id) {
document.getElementById(id).style.visibility="hidden";
}

function show_work_history(id) {
document.getElementById(id).style.visibility="visible";
}

function close_work_history(id) {
document.getElementById(id).style.visibility="hidden";
}

function form_correct(id) {
 document.getElementById('lid_edit_contact').value=id;
 document.getElementById('edit_contact_lid').submit();
}

function check_edit_contact() {
var fio=document.getElementById('fio_contact').value;
if(fio!="") {
 document.getElementById('edit_contact').submit();
 } else {
 alert('У контакта должна быть фамилия!');
 }
}

function get_address() {

var sel = document.getElementById("company");
var val = sel.options[sel.selectedIndex].value;

		$.ajax({
                type: 'POST',
                url: '/get_company_adress.php',
                data: 'id='+val,
                // Выводим то что вернул PHP
                success: function(html) {
				document.getElementById('address').value=html;
				
                 }
				 
        });

}

function show_main_data() {
var elm = document.getElementById("main_data");
elm.style.visibility = "visible";

var phones_data = document.getElementById("phones_data");
phones_data.style.visibility = "hidden";
}

function show_foto_data() {
var elm = document.getElementById("main_data");
elm.style.visibility = "hidden";

var phones_data = document.getElementById("phones_data");
phones_data.style.visibility = "hidden";
}

function show_phones_data() {
var elm = document.getElementById("main_data");
elm.style.visibility = "hidden";

var phones_data = document.getElementById("phones_data");
phones_data.style.visibility = "visible";
}

function make_zaveden() {
if (confirm('Вы действительно хотите отметить эти сим-карты как зведенные? Отменить действие потом будет невозможно. ')) {
 document.getElementById('make_zaveden').submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function setSelect(id, value){
//alert(value);
//document.write('<br />'+id+'::'+value);
var i,o,
sel = document.getElementById(id),
opt=sel.options;

for(i=0;i<opt.length;i++){
	o=opt[i];
	if(o.value==value) {
		o.selected=true;
		break;
		}
	}

sel.style.display='none';
sel.style.display='';
}


function edit_zap(id,cassa,operation,opis,fio,prihod,rashod,zb,zalivka) {

	if(id!=0) {
		document.getElementById("edit_zapis").style.visibility = "visible";
		document.getElementById("add_zapis").style.visibility = "hidden";
		document.getElementById("edit_id").value=id;
		
		setSelect('cassa_edit',cassa);
		setSelect('operation_edit',operation);
		document.getElementById("opis_edit").value=opis;
		document.getElementById("fio_edit").value=fio;
		document.getElementById("prihod_edit").value=prihod;
		document.getElementById("rashod_edit").value=rashod;
		document.getElementById("zb_edit").value=zb;

		setSelect('zalivka_edit',zalivka);
		
	} else {
		document.getElementById("edit_zapis").style.visibility = "hidden";
		document.getElementById("add_zapis").style.visibility = "visible";
	}
}


function send_edit_data()  {
	
var opis = document.getElementById("opis_edit").value;
var edit_id = document.getElementById("edit_id").value;
var fio = document.getElementById("fio_edit").value;
var prihod = document.getElementById("prihod_edit").value;
var rashod = document.getElementById("rashod_edit").value;
var zb = document.getElementById("zb_edit").value;
var zalivka = document.getElementById("zalivka_edit").options[document.getElementById("zalivka_edit").selectedIndex].value;
var operation = document.getElementById("operation_edit").options[document.getElementById("operation_edit").selectedIndex].value;
var cassa=document.getElementById("cassa_edit").options[document.getElementById("cassa_edit").selectedIndex].value;

if((opis!="")&&(fio!="")&&((prihod!="")||(rashod!=""))) {
		$.ajax({
                type: 'POST',
                url: '/edit_zap.php',
                data: 'edit_id='+edit_id+'&cassa='+cassa+'&opis='+opis+'&fio='+fio+'&prihod='+prihod+'&rashod='+rashod+'&zb='+zb+'&zalivka='+zalivka+'&operation='+operation,
                // Выводим то что вернул PHP
                success: function(html) {
					get_table();
					document.getElementById("edit_zapis").style.visibility = "hidden";
					document.getElementById("add_zapis").style.visibility = "visible";
                 }
        });
} else {
	alert('Для продолжения заполните пожалуйста все поля!');
}	
}


function send_add_data()  {
	
var opis = document.getElementById("opis").value;
var fio = document.getElementById("fio").value;
var prihod = document.getElementById("prihod").value;
var rashod = document.getElementById("rashod").value;
var zb = document.getElementById("zb").value;
var zalivka = document.getElementById("zalivka").options[document.getElementById("zalivka").selectedIndex].value;
var operation = document.getElementById("operation").options[document.getElementById("operation").selectedIndex].value;
var cassa=document.getElementById("cassa_add").options[document.getElementById("cassa_add").selectedIndex].value;

	
if((opis!="")&&(fio!="")&&((prihod!="")||(rashod!=""))) {
		$.ajax({
                type: 'POST',
                url: '/add_new_zap.php',
                data: 'cassa='+cassa+'&add=add&opis='+opis+'&fio='+fio+'&prihod='+prihod+'&rashod='+rashod+'&zb='+zb+'&zalivka='+zalivka+'&operation='+operation,
                // Выводим то что вернул PHP
                success: function(html) {
					get_table();
					document.getElementById("opis").value='';
					document.getElementById("fio").value='';
					document.getElementById("prihod").value='';
					document.getElementById("rashod").value='';
					document.getElementById("zb").value='';
                 }
        });
} else {
	alert('Для продолжения заполните пожалуйста все поля!');
}	
}


function send_cassa_add_data()  {
	
var opis = document.getElementById("opis").value;
var fio = document.getElementById("fio").value;
var prihod = document.getElementById("prihod").value;
var rashod = document.getElementById("rashod").value;
var zb = document.getElementById("zb").value;
var zalivka = document.getElementById("zalivka").options[document.getElementById("zalivka").selectedIndex].value;
var operation = document.getElementById("operation").options[document.getElementById("operation").selectedIndex].value;
	

if((opis!="")&&(fio!="")&&((prihod!="")||(rashod!=""))) {
		$.ajax({
                type: 'POST',
                url: '/add_new_zap_cassa.php',
                data: '&add=add&opis='+opis+'&fio='+fio+'&prihod='+prihod+'&rashod='+rashod+'&zb='+zb+'&zalivka='+zalivka+'&operation='+operation,
                // Выводим то что вернул PHP
                success: function(html) {
					get_table();
					document.getElementById("opis").value='';
					document.getElementById("fio").value='';
					document.getElementById("prihod").value='';
					document.getElementById("rashod").value='';
					document.getElementById("zb").value='';
                 }
        });
} else {
	alert('Для продолжения заполните пожалуйста все поля!');
}	
}



function edit_zap_cassa(id,operation,opis,fio,prihod,rashod,zb,zalivka) {

	if(id!=0) {
		document.getElementById("edit_zapis").style.visibility = "visible";
		document.getElementById("add_zapis").style.visibility = "hidden";
		document.getElementById("edit_id").value=id;
		
		setSelect('operation_edit',operation);
		document.getElementById("opis_edit").value=opis;
		document.getElementById("fio_edit").value=fio;
		document.getElementById("prihod_edit").value=prihod;
		document.getElementById("rashod_edit").value=rashod;
		document.getElementById("zb_edit").value=zb;

		setSelect('zalivka_edit',zalivka);
		
	} else {
		document.getElementById("edit_zapis").style.visibility = "hidden";
		document.getElementById("add_zapis").style.visibility = "visible";
	}
}


function send_cassa_edit_data()  {
	
var opis = document.getElementById("opis_edit").value;
var edit_id = document.getElementById("edit_id").value;
var fio = document.getElementById("fio_edit").value;
var prihod = document.getElementById("prihod_edit").value;
var rashod = document.getElementById("rashod_edit").value;
var zb = document.getElementById("zb_edit").value;
var zalivka = document.getElementById("zalivka_edit").options[document.getElementById("zalivka_edit").selectedIndex].value;
var operation = document.getElementById("operation_edit").options[document.getElementById("operation_edit").selectedIndex].value;
	
if((opis!="")&&(fio!="")&&((prihod!="")||(rashod!=""))) {
		$.ajax({
                type: 'POST',
                url: '/edit_zap_cassa.php',
                data: 'edit_id='+edit_id+'&opis='+opis+'&fio='+fio+'&prihod='+prihod+'&rashod='+rashod+'&zb='+zb+'&zalivka='+zalivka+'&operation='+operation,
                // Выводим то что вернул PHP
                success: function(html) {
					get_table();
					document.getElementById("edit_zapis").style.visibility = "hidden";
					document.getElementById("add_zapis").style.visibility = "visible";
                 }
        });
} else {
	alert('Для продолжения заполните пожалуйста все поля!');
}	
}

