<?php
header('Content-Type: text/html; charset=utf-8');
/////пользование системой
require("classes/classes.php");
require("functions/functions.php");
ini_set("display_errors","On");
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
use Twilio\Rest\Client;

function check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from) {

	$db=new connect_db();
	if($db->state=="connected") {
	
	echo "<br>check...";
	
	$client = new Client($twillo_sid, $twillo_auth_token);
	
	////проверка всех тревог
		$sql="SELECT id,plan,alert_timer,gps_long,gps_lat,name from mobile_users where del='' and alert>0 and plan=1";
				foreach ($db->dbo->query($sql) as $row){
					$id_user=$row[0]*1;
					$plan=$row[1]*1;
					$alert_timer=$row[2]*1;
					$gps_long=$row[3]*1;
					$gps_lat=$row[4]*1;
					$name=$row[5];
					
					////просто уменьшаем таймер
	
						$alert_timer=$alert_timer-1;
						$sqls="UPDATE mobile_users set alert_timer='$alert_timer' where id=$id_user";
						$db->dbo->exec($sqls);
				
					
					////таймер истек, запускаем рассылку
					if($alert_timer==0) {
						
						echo "запуск рассылки для спасения $name";
						
						////получаем список спасателей
						$sql_savers="SELECT phone from savers where id_user=$id_user";
						foreach ($db->dbo->query($sql_savers) as $row_savers){
							$phone=$row_savers[0];
							////отправка смс
							
							//////генерация ссылки и карты
							$map="https://".$_SERVER["HTTP_HOST"]."/map.php?gps_long=$gps_long&gps_lat=$gps_lat";
							
							////подстановка имени
							$sms_shablon=str_replace("[name]",$name,$sms_shablon);
							$sms_shablon=str_replace("[map]",$map,$sms_shablon);
							
							
							$client->messages->create(
							// the number you'd like to send the message to
							$phone,
							array(
								// A Twilio phone number you purchased at twilio.com/console
								'from' => $twillo_from,
								// the body of the text message you'd like to send
								'body' => $sms_shablon
							)
							);
							
						}
						
					}
					
					if($alert_timer<=-60) {
					/////и по истечению 1 минуты все возращаем назад
					$sqls="UPDATE mobile_users set alert_timer='',alert='' where id=$id_user";
					$db->dbo->exec($sqls);
					}
				}
	
	}

}

$db=new connect_db();
	if($db->state=="connected") {
	////получаем настройки таймера тревоги
	$sql="SELECT alert_timer_value,twillo_sid,twillo_auth_token,sms_shablon,twillo_from from settings where id='1'";
				foreach ($db->dbo->query($sql) as $row){
					$alert_timer_value=$row[0]*1;
					$twillo_sid=$row[1];
					$twillo_auth_token=$row[2];
					$sms_shablon=$row[3];
					$twillo_from=$row[4];
	}
	
	
	////запуск проверки всех тревог
	
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	
		check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	
		check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	
		check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	
		check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	
		check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);
	check_alert($alert_timer_value,$twillo_sid,$twillo_auth_token,$sms_shablon,$twillo_from);
	sleep(1);


}
?>
