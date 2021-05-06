<?
class connect_db {
   public $state="";
   public $i="";
   public $dbo=null;
   
   function __construct() {
   try {
		require("./config_2.php");
		////подключение к базе
		$conn=DB_DRIVER.":host=".DB_HOSTNAME.";dbname=".DB_DATABASE;
		$db=new PDO($conn,DB_USERNAME,DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$this->dbo=$db;
		$db->exec("set character set ".DB_CHARACTER);
		$db->exec("set character_set_client=".DB_CHARACTER);
		$db->exec("set character_set_results=".DB_CHARACTER);
		$result=$db->exec("set collation_connection=".DB_COLLATION);
		$this->state="connected";
	} catch(PDOException $e) {
	////ошибка доступа к базе ланных
	$this->state="";
	////логируем ошибку
	new db_error($e->getMessage());
	}
   }
   
   function __destruct() {
	$this->sbo=null;
   }
}


class db_error {
   ///ошибка базы данных, записываем в файл
   function __construct($error) {
   ///создаем файл-ошибку
   file_put_contents("./db_erros/db_error_".date("d_m_Y_H_i_s",time()),$error, FILE_APPEND | LOCK_EX);
   }
}

class log {
		private $dbos;
		private $state;
   ////лог действий пользователей
      function __construct() {
     $db=new connect_db();
	 if($db->state=="connected") {
	   $this->dbos=$db;
	   ///чистим логи?
	   
	   
	   } 
	}
	
	function add($action) {
	if($this->dbos->state=="connected") {
	///вставляем лог в базу данных
	$action=$this->dbos->dbo->quote($action);
	///смотрим что за пользователь
	if($_SESSION['id_user']=="") $user="1"; else $user=$_SESSION['id_user'];
	///получаем ip, данные браузера, дату и время
	$ip=$_SERVER['REMOTE_ADDR'];
	$browser=$_SERVER['HTTP_USER_AGENT'];
	$data=date("d.m.Y H:i:s",time());
	$sql="INSERT INTO log(id_user,action,data,ip,http_client,timestamp) values('$user',$action,'$data','$ip','$browser','".time()."')";
	$this->dbos->dbo->exec($sql);
	}
	}
}


class backup {
		private $dbos;
		private $dump_dir="";
		private $dump_name="";
		
		
	function __construct() {
		////берем данные из настроек и смотрим, когда бекапитсяъ
		  $db=new connect_db();
		if($db->state=="connected") 
		{ 
		$this->dbos=$db;
		$this->dump_dir="backup";
		$this->dump_name=date("d-m-Y-h-i-s",time()).".sql";
		  ///если надо - делаем бекап
		$sett=$this->dbos->dbo->query("SELECT period_backup,last_backup,period_del_backup from settings where id=1")->fetch(PDO::FETCH_BOTH);
	    $period_backup=$sett[0]*1;
	    $last_backup=$sett[1]*1;
	    $period_del_backup=$sett[2]*1;
		if($period_del_backup==0) $period_del_backup=2592000;
		if((time()-$last_backup)>=$period_backup) $this->make();
		////теперь удаляем старые бэкапы
		$files=scandir($this->dump_dir);
		$cnt_files=count($files);
		foreach($files as $fl) {
		if($fl!="." and $fl!="..") {
			if((filemtime($this->dump_dir."/".$fl))<=time()-$period_del_backup) unlink($this->dump_dir."/".$fl);
		}
		}		
		}
	}
	
	function make() {
	if($this->dbos->state=="connected") {
	////принудительный бэкап базы данных
		$insert_records = 50; //записей в одном INSERT
		$gzip = true; 		//упаковать файл дампа
		$stream = false;		//вывод файла в поток

		$fp = fopen( $this->dump_dir."/".$this->dump_name, "w" );
		foreach ($this->dbos->dbo->query("SHOW TABLES") as $table){
				
		$query="";
			if ($fp)
			{
				///$res1 = mysql_query("SHOW CREATE TABLE ".$table[0]);
				$res1=$this->dbos->dbo->query("SHOW CREATE TABLE ".$table[0]);
				$row1=$res1->fetch(PDO::FETCH_BOTH);
				$query="\nDROP TABLE IF EXISTS ".$table[0].";\n".$row1[1].";\n";
				fwrite($fp, $query); $query="";
				////получаем число записей в таблице
					foreach ($this->dbos->dbo->query('SELECT count(*) FROM `'.$table[0].'`') as $count_row){
					$count=$count_row[0];
					}
				if($count>0){
				$query_ins = "\nINSERT INTO `".$table[0]."` VALUES ";
				fwrite($fp, $query_ins);
				$i=1;
				foreach ($this->dbos->dbo->query('SELECT * FROM `'.$table[0].'`') as $row){
				$query="";
					foreach ( $row as $field )
					{
						if ( is_null($field) )$field = "NULL";
						else $field = $this->dbos->dbo->quote( $field );
						if ( $query == "" ) $query = $field;
						else $query = $query.', '.$field;
					}
					if($i>$insert_records){
									$query_ins = ";\nINSERT INTO `".$table[0]."` VALUES ";
									fwrite($fp, $query_ins);
									$i=1;
									}
					if($i==1){$q="(".$query.")";}else $q=",(".$query.")";
					fwrite($fp, $q); $i++;
				}
				fwrite($fp, ";\n");
			}
			}
		} 
		
		fclose ($fp);

		if($gzip||$stream){ $data=file_get_contents($this->dump_dir."/".$this->dump_name);
		$ofdot="";
		if($gzip){
			$data = gzencode($data, 9);
			unlink($this->dump_dir."/".$this->dump_name);
			$ofdot=".gz";
		}

		if($stream){
				header('Content-Disposition: attachment; filename='.$this->dump_name.$ofdot);
				if($gzip) header('Content-type: application/x-gzip'); else header('Content-type: text/plain');
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				header("Pragma: public");
				echo $data;
		}else{
				$fp = fopen($this->dump_dir."/".$this->dump_name.$ofdot, "w");
				fwrite($fp, $data);
				fclose($fp);
			}
		}
	////отмечаем о том, что мы сделали бэкап в базу
	$this->dbos->dbo->exec("UPDATE settings set last_backup='".time()."'");
	}
	}
}

	


class keys {
   ////генерация уникального ключа пользователя
		private $dbos;
		private $state;
		private $key_dir="";
		private $ley_name="";
   ////лог действий пользователей
      function __construct() {
     $db=new connect_db();
	 if($db->state=="connected") {
	   $this->dbos=$db;
	   $this->key_dir="user_keys";
	   $this->key_name=md5(time()).".key";
	   } 
	}


	function set_key($login_user) {
	if($this->dbos->state=="connected") {

	////генерация ключа
	$key=md5(md5($login_user).time().md5($login_user)).md5(md5($login_user).md5($login_user).time());

	///вставляем лог в базу данных
	$key=$this->dbos->dbo->quote($key);
	$login_user=$this->dbos->dbo->quote($login_user);
	$sql="UPDATE users set key_value=$key where login=$login_user";
	$this->dbos->dbo->exec($sql);
	}
	}


	function get_key($login_user) {
	if($this->dbos->state=="connected") {
	$login_user=$this->dbos->dbo->quote($login_user);
		$sql="SELECT key_value,login from users where login=$login_user";
			foreach ($this->dbos->dbo->query($sql) as $row){
				$key=$row[0];
				$login=$row[1];
				}
	////сохранение его в файл
		$fp = fopen($this->key_dir."/$login"."_".$this->key_name, "w");
		fwrite($fp, $key);
		fclose($fp);
		return $this->key_dir."/$login"."_".$this->key_name;
	}
	}
}




class balance {
   ////генерация уникального ключа пользователя
		private $dbos;
		private $state;
		private $balance_naim;
   ////лог действий пользователей
      function __construct() {
     $db=new connect_db();
	 if($db->state=="connected") {
	   $this->dbos=$db;

		////получение наименование баланса
		$sql="SELECT balance_naim from settings where id=1";
				foreach ($this->dbos->dbo->query($sql) as $row){
					$balance_naim=$row[0];
				}
		$this->balance_naim=$balance_naim;
	   } 
	}


	/////запрос баланса
	function get_balance($id_user,$type='') {
	if($this->dbos->state=="connected") {
		$id_user=$this->dbos->dbo->quote($id_user);
		$balance=0;

		if($type=='')   $sql="SELECT current from balance where id_user=$id_user";
		if($type=='vk') $sql="SELECT current from balance where id_user in (SELECT id from users where social_id=$id_user)";

				foreach ($this->dbos->dbo->query($sql) as $row){
				$balance=$row[0]*1;
				}
		return $balance.$this->balance_naim;

	}
	}


	/////пополнение баланса
	function add_balance($summa,$id_user,$prichina,$type='') {
	if($this->dbos->state=="connected") {
		$id_user=$this->dbos->dbo->quote($id_user);
		$summa=$summa*1;

		///а есть ли такая запись о балансе с этим пользователем?
		if($type=='')   $sql="SELECT id,history from balance where id_user=$id_user";
		if($type=='vk') $sql="SELECT id,history from balance where id_user in (SELECT id from users where social_id=$id_user)";

				foreach ($this->dbos->dbo->query($sql) as $row){
					$id_balance=$row[0];
					$history=$row[1];
				}

		if($id_balance*1==0) {
			////такого пользователя еще нет в таблице, добавляем
		if($type=='') $sql="INSERT INTO balance(id_user) values($id_user)";
		if($type=='vk') $sql="INSERT INTO balance(id_user) values((SELECT id from users where social_id=$id_user LIMIT 0,1))";
		$this->dbos->dbo->exec($sql);
		} else {

			if($history!="") $history=unserialize($history);
		}


		////пополняем баланс
		if($type=='')   $sql="UPDATE balance set current=current+$summa where id_user=$id_user";
		if($type=='vk') $sql="UPDATE balance set current=current+$summa where id_user in (SELECT id from users where social_id=$id_user)";
		$this->dbos->dbo->exec($sql);
		////заносим запись в историю
		
		///начинаем историю движения денежных средств
		$history[time()]="На ваш счет внесено $summa".$this->balance_naim." $prichina";
		$history=serialize($history);
		$history=$this->dbos->dbo->quote($history);

		if($type=='')   $sql="UPDATE balance set history=$history where id_user=$id_user";
		if($type=='vk') $sql="UPDATE balance set history=$history where id_user in (SELECT id from users where social_id=$id_user)";
		$this->dbos->dbo->exec($sql);

	}
	}

	function from_referals($id_user,$type='') {
		if($type=='')   $sql="SELECT id,history from balance where id_user=$id_user";
		if($type=='vk') $sql="SELECT id,history from balance where id_user in (SELECT id from users where social_id=$id_user)";
		
		foreach ($this->dbos->dbo->query($sql) as $row){
					$id_balance=$row[0];
					$history=$row[1];
				}

		if($history!="") $history=unserialize($history); else $history=array();
		////смотрим все что есть со словами от вашего реферала

		$all_summ=0;
		foreach($history as $hs) {
			if(strpos($hs,"от вашего реферала")>0) {
				////это доход от реферала, смотрим сумму
				$summ_ref = preg_replace("/[^,.0-9]/", '', $hs);
				$all_summ=$all_summ+$summ_ref;
			}
		}

		return ($all_summ*1).$this->balance_naim;

	}

	/////пополнение баланса
	function minus_balance($summa,$id_user,$prichina,$type='') {
	if($this->dbos->state=="connected") {
		$id_user=$this->dbos->dbo->quote($id_user);
		$summa=$summa*1;
		///а есть ли такая запись о балансе с этим пользователем?
		if($type=='')   $sql="SELECT id,history from balance where id_user=$id_user";
		if($type=='vk') $sql="SELECT id,history from balance where id_user in (SELECT id from users where social_id=$id_user)";

				foreach ($this->dbos->dbo->query($sql) as $row){
					$id_balance=$row[0];
					$history=$row[1];
				}
		if($id_balance*1==0) {
			////такого пользователя еще нет в таблице, добавляем
		if($type=='') $sql="INSERT INTO balance(id_user) values($id_user)";
		if($type=='vk') $sql="INSERT INTO balance(id_user) values((SELECT id from users where social_id=$id_user LIMIT 0,1))";
		$this->dbos->dbo->exec($sql);
		} else {

			if($history!="") $history=unserialize($history);
		}
		
		////получаем текущий баланс пользователя
		if($type=='')   $sql="SELECT id,current from balance where id_user=$id_user";
		if($type=='vk') $sql="SELECT id,current from balance where id_user in (SELECT id from users where social_id=$id_user)";
		
				foreach ($this->dbos->dbo->query($sql) as $row){
					$id_balance=$row[0];
					$current=$row[1]*1;
				}
		/////проверяем, можно ли выполнить данную операцию
		$may_do=false;
		if($current>=$summa) $may_do=true; else $may_do=false;
		if(MINUS_BALANCE==true) $may_do=true;

		if($may_do==true) {
		////снимаем средства
		if($type=='')   $sql="UPDATE balance set current=current-$summa where id_user=$id_user";
		if($type=='vk') $sql="UPDATE balance set current=current-$summa where id_user in (SELECT id from users where social_id=$id_user)";
		$this->dbos->dbo->exec($sql);
		////заносим запись в историю
		
		///начинаем историю движения денежных средств
		$history[time()]="С вашего счета списана сумма ".$summa.$this->balance_naim." $prichina";
		$history=serialize($history);
		$history=$this->dbos->dbo->quote($history);

		if($type=='')   $sql="UPDATE balance set history=$history where id_user=$id_user";
		if($type=='vk') $sql="UPDATE balance set history=$history where id_user in (SELECT id from users where social_id=$id_user)";
		$this->dbos->dbo->exec($sql);
			return "success";
		} else {
			return "error";
		}

	}
	}



	
}

		
	
?>
