<?
////CRON задача для отправки почты
/////пользование системой
require("classes/classes.php");
require("functions/functions.php");

$db=new connect_db();
if($db->state=="connected") {


	/////здесь расположим главные медиа крон задачи. Контроль запущенности службы идентификации аудио дейвайса и т.д.

	
}
?>