<?php
///отображаем список пользователей
$sub_step=clear($_POST["sub_step"]);
$int1=clear($_POST["int1"]);
$int2=clear($_POST["int2"]);
$word=clear($_POST["word"]);
$add=clear($_POST["add"]);
$del=clear($_POST["del"]);
$new_login=clear($_POST["new_login"]);
$new_fio=clear($_POST["new_fio"]);
$new_pass=clear($_POST["new_pass"]);
$new_pass1=clear($_POST["new_pass1"]);
$new_pass2=clear($_POST["new_pass2"]);
$new_prava=clear($_POST["new_prava"],1);
$phone=clear($_POST["phone"]);
$passport=clear($_POST["passport"]);
$propiska=clear($_POST["propiska"]);
$email=clear($_POST["email"]);
$comment=clear($_POST["comment"]);
$relogin=clear($_POST["relogin"]);
$id_user=clear($_POST["id_user"]);
$to_page=clear($_POST["to_page"]);
$repass=clear($_POST["repass"]); 
$pozuv=clear($_POST["pozuv"]); 

ini_set("display_errors","On");
?>



<?

if($add=="add") {
if(!empty($new_login) and !empty($new_fio) and !empty($new_pass1) and !empty($new_prava)) {

///подготовка данных
$new_login_k=$new_login;
$new_login=$db->dbo->quote($new_login);
$new_fio=$db->dbo->quote($new_fio);
$phone=$db->dbo->quote($phone);
$email=$db->dbo->quote($email);
$comment=$db->dbo->quote($comment);

//////////проверяем на сушествование в базе
$sql="SELECT count(id) from users where login=$new_login";
foreach ($db->dbo->query($sql) as $row){
$id=$row[0]*1;
}

///название прав
$sql="SELECT naim from user_groups where id=$new_prava";
foreach ($db->dbo->query($sql) as $row){
$prava=$row[0];
}

//////////добавление в базу
if($id==0) {
$sql="INSERT INTO users(login,name,data_insert,grp,password,phone,email,comment,email_verificated) values($new_login,$new_fio,'".time()."','".$new_prava."','".md5($new_pass1)."',$phone,$email,$comment,'1')";
$db->dbo->exec($sql);

///добавлепние ключа
$keys=new keys();
$keys->set_key($new_login_k);


echo "<br><font color='green' size='-1'>Пользователь <b>$new_login</b> успешно добавлен в систему!<br></font><br>";
} else $err_mess="<font size='-1'>Пользователь <b>$new_login</b> уже существует!<br></font>"; } else { $err_mess="<font size='-1'>Не заполнено одно из обязательных полей, проверьте пожалуйста ввод!<br></font>"; }
}


if($add=="edit") {
if(!empty($new_fio)) {

///подготовка данных
$new_fio=$db->dbo->quote($new_fio);
$phone=$db->dbo->quote($phone);
$email=$db->dbo->quote($email);
$comment=$db->dbo->quote($comment);
$pozuv=$db->dbo->quote($pozuv);

///название прав
$sql="SELECT naim from user_groups where id=$new_prava";
foreach ($db->dbo->query($sql) as $row){
$prava=$row[0];
}

$sql="SELECT login,name from users where id=$id_user";
foreach ($db->dbo->query($sql) as $row){
$new_login=$row[0];
}

//////////изменение в базе
$sql="UPDATE users set name=$new_fio,phone=$phone,email=$email,comment=$comment,grp=$new_prava where id=$id_user";

$db->dbo->exec($sql);
echo "<font color='green' size='-1'>Данные пользователя <b>$new_login</b> успешно обновлены!</font><br>";
} else { $err_mess="<font size='-1'>Не заполнено одно из обязательных полей, проверьте пожалуйста ввод!<br></font>"; }
}



if($add=="repass") {
if($new_pass1==$new_pass2 and !empty($new_pass1)) {

////если это пароль главного администратора, то делаем сразу бекап базы
if($relogin=="admin")
///$backup->make();

$sqlss="UPDATE users set password='".md5($new_pass1)."' where login='".$relogin."'";
$sqlss="UPDATE users set password='".md5($new_pass1)."' where login='".$relogin."'";
$db->dbo->exec($sqlss);

$relogin=$db->dbo->quote($relogin);

$sql="SELECT name,grp from users where login=$relogin";
foreach ($db->dbo->query($sql) as $row){
$name=$row[0];
$grp=$row[1];
}

///название прав
$sql="SELECT naim from user_groups where id=$grp";
foreach ($db->dbo->query($sql) as $row){
$prava=$row[0];
}


echo "<font size='-1'><font color='green'>Пароль пользователя <b>$relogin</b> успешно изменен!</font><br><br>";
} else echo "<br><font size='-1'>Невозможно изменить пароль - введенные вами пароли не совпадают!<br></font>";
}

if($del!="") {
echo "<br><font color='green' size='-1'>Пользователь <b>$del</b> успешно удален!</font><br>";

$del=$db->dbo->quote($del);

$sql="SELECT name,grp from users where login=$del";
foreach ($db->dbo->query($sql) as $row){
$name=$row[0];
$grp=$row[1];
}

///название прав
$sql="SELECT naim from user_groups where id=$grp";
foreach ($db->dbo->query($sql) as $row){
$prava=$row[0];
}


$sql_s="DELETE FROM users where login=$del";
$db->dbo->exec($sql_s);

}

?>
<script>

function cdel(del) {
if (confirm('Вы действительно хотите удалить этого пользователя ?')) {
 document.getElementById(del).submit();
 } else {
 // Если пользователь нажал отмена, то этот код.
 }

}

function gotopage(pg) {
document.getElementById('to_page').value=pg;
document.getElementById('sort_form').submit();

}

function cancel() 
{ 
document.getElementById('users').submit();
}

function sbros() 
{ 
document.getElementById('sbros').submit();
}

function checkp() {
var new_pass1=document.getElementById('new_pass1').value;
var new_pass2=document.getElementById('new_pass2').value;

if((new_pass1!='')&(new_pass2!='')) {
 if(new_pass1==new_pass2) {
 document.getElementById('repass_form').submit();
 } else
  {
 alert('Введенные вами пароли не совпадают!');
 }
} else
{
alert('Не заполнено одно из обязательных полей!');
}

}

function check() 
{ 
var new_login=document.getElementById('new_login').value;
var new_fio=document.getElementById('new_fio').value;
var new_pass1=document.getElementById('new_pass1').value;
var new_pass2=document.getElementById('new_pass2').value;

if((new_login!='')&(new_fio!='')&(new_pass1!='')&(new_pass2!='')) {
 if(new_pass1==new_pass2) {
 document.getElementById('add_user').submit();
 } else
 {
 alert('Введенные вами пароли не совпадают!');
 }
} else
{
alert('Не заполнено одно из обязательных полей!');
}

}


function check_edit() 
{ 

var new_fio=document.getElementById('new_fio').value;

if(new_fio!='') {
 document.getElementById('edit_user').submit();
} else
{
alert('Не заполнено одно из обязательных полей!');
}

}
</script>

<?

/////////////а
if($sub_step=="") {
?>





                <div class="card">
		
  <div class="card__header">
	 <h3>Управление пользователями</h3>

	  </div>
	  
	  
	   <div class="card__body">
				

			  <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
	
	  <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
				stateSave: true,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
		
		
    </script>
	

		<div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover dataTables-example" style="width:100%">                                        
				<thead>
				<tr>
					<th>№</th>
					<th>Логин пользователя</th>
					<th>Имя пользователя</th>
					<th>Последний вход</th>
					<th>Группа</th>
					
					<th></th>
				</tr>
				</thead>

<?
$nom=0;
$sql="SELECT login,name,last_enter,grp,phone,email,id from users order by id asc";
foreach ($db->dbo->query($sql) as $row){
$nom++;
	$login=$row[0];
	$name=$row[1];
	$last_enter=$row[2];
	$grp=$row[3];
	$phone=$row[4];
	$email=$row[5];
	$id=$row[6];
	///название групп пользователей
	$sql="SELECT naim from user_groups where id=$grp";
		foreach ($db->dbo->query($sql) as $grow){
		$grp=$grow[0];
		}
		
		if($last_enter!="") 
		$data=date("d-m-Y H:i:s",$last_enter); else $data="";
		?>
						<tr>
					<td><?=$nom?></td>
					<td><?=$login?> </td>
					<td><?=$name?></td>
					<td><?=$data?></td>
					<td><?=$grp?></td>
					
					<td>
					<div class="btn-group">
					<button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">Действие<span class="caret"></span></button>
 								<ul class="dropdown-menu">
       <li><a href="javascript:document.getElementById('change_pass_<?=$id?>').submit();" class="font-bold">Изменить пароль</a></li>
	<li><a href="javascript:document.getElementById('change_data_<?=$id?>').submit();" class="font-bold">Изменить данные</a></li>
	<li><a href="javascript:document.getElementById('view_logs_<?=$id?>').submit();" class="font-bold">Лог действий</a></li>
				<?php
					if($login!=="admin") { 
						?>
				 <li><a href="javascript:document.getElementById('del_user_<?=$id?>').submit();" class="font-bold">Удалить</a></li>
				<? } ?>
													
                            					</ul>
                            					</div>		

                            	
							<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id="change_pass_<?=$id?>">
							<input type='hidden' name='sub_step' value='repass'>
							<input type='hidden' name='repass' value='<?=$login;?>'>
							<input type='hidden' name='step' value='<?=$step;?>'>
						
							</form>
							
							<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id="change_data_<?=$id?>">
							<input type='hidden' name='sub_step' value='change_data'>
							<input type='hidden' name='id_user' value='<?=$id;?>'>
							<input type='hidden' name='step' value='<?=$step;?>'>
							
							</form>
							
							<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id="view_logs_<?=$id?>">
							<input type='hidden' name='sub_step' value='view_logs'>
							<input type='hidden' name='id_user' value='<?=$id;?>'>
							<input type='hidden' name='step' value='<?=$step;?>'>
						
							</form>
							
							<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id="del_user_<?=$id?>" >
							<input type='hidden' name='sub_step' value=''>
							<input type='hidden' name='del' value='<?=$login;?>'>
							<input type='hidden' name='step' value='<?=$step;?>'>
							</form>
						
					</td>
				</tr>
		

		<?php
		}				
?>
</table>
</div>
</div>
</div>
<br>

<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id="add_user">
							<input type='hidden' name='sub_step' value='add'>
							<input type='hidden' name='step' value='<?=$step;?>'>
						<input type="submit" value="Добавить нового пользователя">
							</form>

<?
} elseif($sub_step=="change_data") {
/////изменение данных пользователя
echo "<table><tr><td width='20'></td><td>";
////////////////////////////////////////////////
   $sql="SELECT grp,login,name,phone,email,comment from users where id=$id_user";
	foreach ($db->dbo->query($sql) as $row){
	$grp=$row[0];
	$login=$row[1];
	$name=$row[2];
	$phone=$row[3];
	$email=$row[4];
	$comment=$row[5];
	
	}	

echo "<br><b>Изменить данные пользователя $login<br><br>"; ?>
<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='edit_user'>
<input type='hidden' name='sub_step' value=''>
<input type='hidden' name='id_user' value='<?=$id_user?>'>
<input type='hidden' name='add' value='edit'>
<input type='hidden' name='step' value='<?=$step;?>'>

<table class="t2" style="border-radius:3px">
<tr><td width="800" height="50">

<table><tr><td><img src="/img/info.png" border="0" width="30"></td><td width="5"></td><td><font size="-2" color="grey">
Здесь вы можете изменить ФИО пользователя, его уровень прав, а также его персональные данные, такие как номер телефона, емайл или комментарий
</td></tr></table>

</td></tr>
</table><br>

<table>
<tr><td>Роль пользователя:</td><td width="20"></td><td><select name='new_prava' style='width:400px;height:25px;'>
<?
   $sql="SELECT id,naim from user_groups";
	foreach ($db->dbo->query($sql) as $row){
	if($row[0]==$grp)
	echo "<option value='".$row[0]."' selected>".$row[1]."</option>"; else
	echo "<option value='".$row[0]."'>".$row[1]."</option>";
	}
	
?></select></td></tr>
<tr><td><font color="red">*</font> ФИО пользователя:</td><td width="20"></td><td><input type='text' name='new_fio' id='new_fio' value="<?=$name?>" style='width:300px;height:25px;'></td></tr>

<tr><td> Телефон:</td><td width="20"></td><td><input type='text' name='phone' id='phone' style='width:300px;height:25px;' value="<?=$phone?>"></td></tr>
<tr><td> Емайл:</td><td width="20"></td><td><input type='text' name='email' id='email' style='width:300px;height:25px;' value="<?=$email?>"></td></tr>
<tr><td valign='top'> Комментарий:</td><td width="20"></td><td><textarea name='comment' id='comment' rows='10' cols='40'><?=$comment?></textarea></td></tr>

</table><br>
<input type='button' class="form-submit" onClick='check_edit();' value='Изменить данные пользователя'> <input type='button' class="form-submit" onClick='cancel();' value='Отмена'>
</form><br><br><br>

<?php echo "</td></tr></table>";
} elseif($sub_step=="add") {
/////добавление пользователя
echo "<table><tr><td width='20'></td><td>";
////////////////////////////////////////////////
echo "<b>Добавить нового пользователя<br><br>"; ?>
<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='add_user'>
<input type='hidden' name='sub_step' value=''>
<input type='hidden' name='add' value='add'>
<input type='hidden' name='step' value='<?=$step;?>'>

<table class="t2" style="border-radius:3px">
<tr><td width="800" height="50">

<table><tr><td><img src="/img/info.png" border="0" width="30"></td><td width="5"></td><td><font size="-2" color="grey">
При добавлении пользователя пожалуйста, будьте внимательны при выборе его уровня прав и логина, логин потом изменить будет невозможно. Поля Телефон, Емайл и Комментарий необязательны для заполнения.

</td></tr></table>

</td></tr>
</table><br>

<table>
<tr><td>Роль пользователя:</td><td width="20"></td><td><select name='new_prava' style='width:400px'>
<?
   $sql="SELECT id,naim from user_groups";
	foreach ($db->dbo->query($sql) as $row){
	echo "<option value='".$row[0]."'>".$row[1]."</option>";
	}
?></select></td></tr>
<tr><td><font color="red">*</font> ФИО пользователя:</td><td width="20"></td><td><input type='text' name='new_fio' id='new_fio' style='width:300px;height:25px;'></td></tr>
	
<tr><td><font color="red">*</font> Логин:</td><td width="20"></td><td><input type='text' name='new_login' id='new_login' style='width:300px;height:25px;'></td></tr>
<tr><td><font color="red">*</font> Пароль:</td><td width="20"></td><td><input type='password' name='new_pass1' id='new_pass1' style='width:300px;height:25px;'></td></tr>
<tr><td><font color="red">*</font> Повторите пароль:</td><td width="20"></td><td><input type='password' name='new_pass2' id='new_pass2' style='width:300px;height:25px;'></td></tr>
<tr><td> Телефон:</td><td width="20"></td><td><input type='text' name='phone' id='phone' style='width:300px;height:25px;'></td></tr>
<tr><td> Емайл:</td><td width="20"></td><td><input type='text' name='email' id='email' style='width:300px;height:25px;'></td></tr>
<tr><td valign='top'> Комментарий:</td><td width="20"></td><td><textarea name='comment' id='comment' rows='10' cols='40'></textarea></td></tr>

</table><br>
<input type='button' class="form-submit" onClick='check();' value='Добавить пользователя'> <input type='button' class="form-submit" onClick='cancel();' value='Отмена'>
</form><br><br><br>
<?php echo "</td></tr></table>";
} 



elseif($sub_step=="repass") {
?>
<table class="t2" style="border-radius:3px">
<tr><td width="800" height="50">

<table><tr><td><img src="/img/info.png" border="0" width="30"></td><td width="5"></td><td><font size="-2" color="grey">
Здесь вы можете сбросить пароль для любого пользователя и установить новый. Будьте пожалуйста внимательны при изменении пароля (особенно при измении пароля Администратора системы), введенные вами пароли должны совпадать!
</td></tr></table>

</td></tr>
</table>
<?
/////изменение пароля пользователя
echo "<br><table><tr><td width='20'></td><td>";
////////////////////////////////////////////////
echo "<b>Изменить пароль пользователя <B>$repass</font></b><br><br>"; ?>
<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='repass_form'>
<input type='hidden' name='sub_step' value=''>
<input type='hidden' name='add' value='repass'>
<input type='hidden' name='relogin' value='<?=$repass;?>'>
<input type='hidden' name='step' value='<?=$step;?>'>
<table>
<tr><td>Новый пароль:</td><td width="20"></td><td><input type='password' name='new_pass1' id='new_pass1' style='width:300px;height:25px;'></td></tr>
<tr><td>Повторите новый пароль:</td><td width="20"></td><td><input type='password' name='new_pass2' id='new_pass2' style='width:300px;height:25px;'></td></tr>
</table><br>
<input type='button' onClick='checkp();' class="form-submit" value='Изменить пароль пользователя'> <input type='button' class="form-submit" onClick='cancel();' value='Отмена'>
</form>
<?php echo "</td></tr></table>";
}
elseif($sub_step=="view_logs") {
///подсказка
?>
<table class="t2" style="border-radius:3px">
<tr><td width="800" height="50">

<table><tr><td><img src="/img/info.png" border="0" width="30"></td><td width="5"></td><td><font size="-2" color="grey">
Здесь вы можете увидеть лог всех действий пользователя, включая вход/выход из системы, действия с лидами, компаниями и т.д.. 
Также с помощью фильтров по дате вы можете отфильтровать записи по времени, а с помощью поля "Ключевое слово" вы можете отфильтровать
записи по тексту события или по HTTP-клиенту пользователя.

</td></tr></table>

</td></tr>
</table><br>

<?
///данные пользователя
$sql="SELECT login,name from users where id=$id_user";
	foreach ($db->dbo->query($sql) as $row){
	$login=$row[0];
	$name=$row[1];
	}
////лог действий
echo "<font size='-1'>Лог действия в системе пользователя <b>$name/$login</b><br><br>";
?>

<form action="<?=$_SERVER["PHP_SELF"];?>" id='sort_form' method='POST'>
<table><tr><td><font size="-1">
<input type="hidden" name="to_page" id="to_page" value="">
<input type='hidden' name='step' value='<?=$step?>'>
<input type='hidden' name='sub_step' value='<?=$sub_step?>'>
<input type='hidden' name='id_user' value='<?=$id_user?>'>
<input type='hidden' name='int1' value='<?=$int1?>'>
<input type='hidden' name='int2' value='<?=$int2?>'>
<input type='hidden' name='word' value='<?=$word?>'>
</form>

<form action="<?=$_SERVER["PHP_SELF"];?>" id='sbros' method='POST'>
<input type='hidden' name='step' value='<?=$step?>'>
<input type='hidden' name='sub_step' value='<?=$sub_step?>'>
<input type='hidden' name='id_user' value='<?=$id_user?>'>
</form>
<table><tr><td>
<form action="<?=$_SERVER["PHP_SELF"];?>" id='search' method='POST'>
<input type='hidden' name='step' value='<?=$step?>'>
<input type='hidden' name='sub_step' value='<?=$sub_step?>'>
<input type='hidden' name='id_user' value='<?=$id_user?>'>
<script src='/calend.js' type='text/javascript'>
</script><font size='-1'>
Показать действия с <input type='text' name='int1' value='<? if($int1=="") echo date("d.m.Y",time()-2592000); else echo $int1;?>' onfocus="this.select();lcs(this)"
    onclick="event.cancelBubble=true;this.select();lcs(this)" style='width:300px;height:25px;'><font size='-1'> по <input type='text' name='int2' value='<?if($int2=="") echo date("d.m.Y",(time())); else echo $int2;?>' onfocus="this.select();lcs(this)"
    onclick="event.cancelBubble=true;this.select();lcs(this)" style='width:300px;height:25px;'>
<font size='-1'> ключевое слово: <input type="text" name="word" value="<?=$word?>" style='width:300px;height:25px;'>
</td><td>
<input type='submit' class="form-submit" value='Отфильтровать'></td><td width="5"></td><td>
<input type='button' class="form-submit" onClick="sbros()" value='Сбросить фильтр'>
</td></tr></table>
</form>
<br>

<?
if($int1!="") {
$dd=explode(".",$int1);
$int1=mktime(0,0,0,$dd[1],$dd[0],$dd[2]);

$dd=explode(".",$int2);
$int2=mktime(0,0,0,$dd[1],$dd[0],$dd[2])+86400;
$filt=" and timestamp>=$int1 and timestamp<=$int2";
} else {
$int1=time()-2592000;
$int2=time()+86400;
}

if($word!="") {
 $filt=$filt." and (action LIKE '%$word%' or http_client LIKE '%$word%')";
}

$nom=1;

if($to_page=="") {
if($_SESSION["to_page"]!="") $to_page=$_SESSION["to_page"]*1; else $to_page=0;	
} else
	{
	////это прямое указание на страницу
	$_SESSION["to_page"]=$to_page;
	}
$nom=$nom+($to_page*50);
$limit=" LIMIT ".($to_page*50).",50";

/////получаем число записей, чтобы сформировать странички внизу
$sql="SELECT count(id) from log where id_user=$id_user $filt ";
foreach ($db->dbo->query($sql) as $row){
$count_list=$row[0];
}

$pages=$count_list/50;

if($count_list>0) {
?>
  <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Custom and plugin javascript -->

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
				stateSave: true,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
		
		
    </script>

 <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover dataTables-example">
			<thead>
			<tr>  
				<th>№</th>
				<th><b>Действие</th>
				<th><b>Дата и время</th>
				<th><b>IP-адрес</th>
				
				<th><b>HTTP-клиент</th>
				
			
			</tr>
			</thead>

<?
$sql="SELECT action,data,ip,http_client from log where id_user=$id_user $filt order by timestamp desc $limit";

	foreach ($db->dbo->query($sql) as $row){
	$action=$row[0];
	$data=$row[1];
	$ip=$row[2];
	$http_client=$row[3];
		echo "<tr>
		<td><font size='-1'><b>$nom</td>
		<td><font size='-1'>$action</td>
		<td><font size='-1'>$data</td>
		<td><font size='-1'>$ip</td>
		<td><font size='-1'>$http_client</td>
		
		</tr>";
	
	$nom++;
	}

?>
</table>
<br>
<?
/////листалка страниц


} else {
echo "<b>Нет логов для данного пользователя за выбранный промежуток времени!</b><br><br>";
}
?>
<Br>
<input type='button' onClick='cancel();' class="form-submit" value='<< Назад'>
<br>
<br>
<?
}
?>
