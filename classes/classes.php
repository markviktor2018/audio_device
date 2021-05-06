<?php
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
		//$db->exec("set character set ".DB_CHARACTER_PG);
		//$db->exec("set character_set_client=".DB_CHARACTER_PG);
		//$db->exec("set character_set_results=".DB_CHARACTER_PG);
		///$result=$db->exec("set collation_connection=".DB_COLLATION_PG);
		$this->state="connected";
	} catch(PDOException $e) {
	////ошибка доступа к базе ланных
	$this->state="";
	////логируем ошибку
	echo $e->getMessage();
	}
   }
   
   function __destruct() {
	$this->sbo=null;
   }
}

//////////////////////////////////pgsql///////////////////////////////////
class connect_db_pg {
   public $state="";
   public $i="";
   public $dbo=null;
   
   function __construct() {
   try {
		require("./config_2.php");
		////подключение к базе
		$conn=DB_DRIVER_PG.":host=".DB_HOSTNAME_PG.";dbname=".DB_DATABASE_PG;
		$db=new PDO($conn,DB_USERNAME_PG,DB_PASSWORD_PG);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$this->dbo=$db;
		//$db->exec("set character set ".DB_CHARACTER_PG);
		//$db->exec("set character_set_client=".DB_CHARACTER_PG);
		//$db->exec("set character_set_results=".DB_CHARACTER_PG);
		///$result=$db->exec("set collation_connection=".DB_COLLATION_PG);
		$this->state="connected";
	} catch(PDOException $e) {
	////ошибка доступа к базе ланных
	$this->state="";
	////логируем ошибку
	echo $e->getMessage();
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

class save_calc_result {
		private $dbos;
		private $state;
		
		public $client;
		public $type_calc;
		public $type_lesa;
		public $type_oplata;
		public $address_dostavki;
		public $distance;
		public $type_price;
		public $first_period;
		public $count_nabors;

		public $op_col;
		public $op_price_ud;
		public $op_vozm_ud;
		public $op_col_price;
		public $op_col_price_vozm;

		public $rles_col;
		public $rles_price_ud;
		public $rles_vozm_ud;
		public $rles_col_price_vozm;
		public $rles_col_ves;

		public $rbez_col;
		public $rbez_price_ud;
		public $rbez_vozm_ud;
		public $rbez_col_price;
		public $rbez_col_price_vozm;
		public $rbez_col_ves;

		public $rig_col;
		public $rig_price_ud;
		public $rig_vozm_ud;
		public $rig_col_price;
		public $rig_col_price_vozm;
		public $rig_col_ves;

		public $nas_col;
		public $nas_price_ud;
		public $nas_vozm_ud;
		public $nas_col_price;
		public $nas_col_price_vozm;
		public $nas_col_ves;

		public $kr_col;
		public $kr_price_ud;
		public $kr_vozm_ud;
		public $kr_col_price;
		public $kr_col_price_vozm;
		public $kr_col_ves;

		public $sdia_col;
		public $sdia_price_ud;
		public $sdia_vozm_ud;
		public $sdia_col_price;
		public $sdia_col_price_vozm;
		public $sdia_col_ves;

		public $sgor_col;
		public $sgor_price_ud;
		public $sgor_vozm_ud;
		public $sgor_col_price;
		public $sgor_col_price_vozm;
		public $sgor_col_ves;

		public $ves_total;
		public $total_zakup;
		public $total_vozm;
		public $price_dostav;
		public $price_pogruz;
		public $first_period_val;

		public $height;
		public $dlina;
		public $yarusov;
		
		public $dostav1;
		public $dostav2;
		public $dostav3;
		public $dostav4;
		public $dostav5;
		public $dostav6;
		public $dostav7;
		public $dostav8;
		public $dostav9;
		public $add_400;
		public $add_4002;
		public $add_5000;
		public $add_12000;
		public $add_20000;
		public $pogruzka_5000_koef;
		public $pogruzka_5001_koef;
		public $pogruzka_5001_add;
		public $pogruzka_10001_add;
		public $pogruzka_15001_add;
		public $op_col_ves;
		public $rles_col_price;
		public $butovki_zalog;
		public $type_dogovor;
		public $client_schet;
		public $schet;
		public $butovki;
		public $total_s;
		
   ////лог действий пользователей
      function __construct() {
     $db=new connect_db();
	 if($db->state=="connected") {
	   $this->dbos=$db;
			////////ничего
	   } 
	}
	
	function save() {
	if($this->dbos->state=="connected") {
		///экранировка данных
		$client=$this->dbos->dbo->quote($this->client);
		$type_calc=$this->dbos->dbo->quote($this->type_calc);
		$type_lesa=$this->dbos->dbo->quote($this->type_lesa);
		$type_oplata=$this->dbos->dbo->quote($this->type_oplata);
		$address_dostavki=$this->dbos->dbo->quote($this->address_dostavki);
		$distance=$this->dbos->dbo->quote($this->distance);
		$type_price=$this->dbos->dbo->quote($this->type_price);
		$first_period=$this->dbos->dbo->quote($this->first_period);
		$count_nabors=$this->dbos->dbo->quote($this->count_nabors);

		$op_col=$this->dbos->dbo->quote($this->op_col);
		$op_price_ud=$this->dbos->dbo->quote($this->op_price_ud);
		$op_vozm_ud=$this->dbos->dbo->quote($this->op_vozm_ud);
		$op_col_price=$this->dbos->dbo->quote($this->op_col_price);
		$op_col_price_vozm=$this->dbos->dbo->quote($this->op_col_price_vozm);

		$rles_col=$this->dbos->dbo->quote($this->rles_col);
		$rles_price_ud=$this->dbos->dbo->quote($this->rles_price_ud);
		$rles_vozm_ud=$this->dbos->dbo->quote($this->rles_vozm_ud);
		$rles_col_price_vozm=$this->dbos->dbo->quote($this->rles_col_price_vozm);
		$rles_col_ves=$this->dbos->dbo->quote($this->rles_col_ves);

		$rbez_col=$this->dbos->dbo->quote($this->rbez_col);
		$rbez_price_ud=$this->dbos->dbo->quote($this->rbez_price_ud);
		$rbez_vozm_ud=$this->dbos->dbo->quote($this->rbez_vozm_ud);
		$rbez_col_price=$this->dbos->dbo->quote($this->rbez_col_price);
		$rbez_col_price_vozm=$this->dbos->dbo->quote($this->rbez_col_price_vozm);
		$rbez_col_ves=$this->dbos->dbo->quote($this->rbez_col_ves);

		$rig_col=$this->dbos->dbo->quote($this->rig_col);
		$rig_price_ud=$this->dbos->dbo->quote($this->rig_price_ud);
		$rig_vozm_ud=$this->dbos->dbo->quote($this->rig_vozm_ud);
		$rig_col_price=$this->dbos->dbo->quote($this->rig_col_price);
		$rig_col_price_vozm=$this->dbos->dbo->quote($this->rig_col_price_vozm);
		$rig_col_ves=$this->dbos->dbo->quote($this->rig_col_ves);

		$nas_col=$this->dbos->dbo->quote($this->nas_col);
		$nas_price_ud=$this->dbos->dbo->quote($this->nas_price_ud);
		$nas_vozm_ud=$this->dbos->dbo->quote($this->nas_vozm_ud);
		$nas_col_price=$this->dbos->dbo->quote($this->nas_col_price);
		$nas_col_price_vozm=$this->dbos->dbo->quote($this->nas_col_price_vozm);
		$nas_col_ves=$this->dbos->dbo->quote($this->nas_col_ves);

		$kr_col=$this->dbos->dbo->quote($this->kr_col);
		$kr_price_ud=$this->dbos->dbo->quote($this->kr_price_ud);
		$kr_vozm_ud=$this->dbos->dbo->quote($this->kr_vozm_ud);
		$kr_col_price=$this->dbos->dbo->quote($this->kr_col_price);
		$kr_col_price_vozm=$this->dbos->dbo->quote($this->kr_col_price_vozm);
		$kr_col_ves=$this->dbos->dbo->quote($this->kr_col_ves);

		$sdia_col=$this->dbos->dbo->quote($this->sdia_col);
		$sdia_price_ud=$this->dbos->dbo->quote($this->sdia_price_ud);
		$sdia_vozm_ud=$this->dbos->dbo->quote($this->sdia_vozm_ud);
		$sdia_col_price=$this->dbos->dbo->quote($this->sdia_col_price);
		$sdia_col_price_vozm=$this->dbos->dbo->quote($this->sdia_col_price_vozm);
		$sdia_col_ves=$this->dbos->dbo->quote($this->sdia_col_ves);

		$sgor_col=$this->dbos->dbo->quote($this->sgor_col);
		$sgor_price_ud=$this->dbos->dbo->quote($this->sgor_price_ud);
		$sgor_vozm_ud=$this->dbos->dbo->quote($this->sgor_vozm_ud);
		$sgor_col_price=$this->dbos->dbo->quote($this->sgor_col_price);
		$sgor_col_price_vozm=$this->dbos->dbo->quote($this->sgor_col_price_vozm);
		$sgor_col_ves=$this->dbos->dbo->quote($this->sgor_col_ves);

		$ves_total=$this->dbos->dbo->quote($this->ves_total);
		$total_zakup=$this->dbos->dbo->quote($this->total_zakup);
		$total_vozm=$this->dbos->dbo->quote($this->total_vozm);
		$price_dostav=$this->dbos->dbo->quote($this->price_dostav);
		$price_pogruz=$this->dbos->dbo->quote($this->price_pogruz);
		$first_period_val=$this->dbos->dbo->quote($this->first_period_val);
		$samovuvoz=$this->dbos->dbo->quote($this->samovuvoz);
		
		$dostav1=$this->dbos->dbo->quote($this->dostav1);
		$dostav2=$this->dbos->dbo->quote($this->dostav2);
		$dostav3=$this->dbos->dbo->quote($this->dostav3);
		$dostav4=$this->dbos->dbo->quote($this->dostav4);
		$dostav5=$this->dbos->dbo->quote($this->dostav5);
		$dostav6=$this->dbos->dbo->quote($this->dostav6);
		$dostav7=$this->dbos->dbo->quote($this->dostav7);
		$dostav8=$this->dbos->dbo->quote($this->dostav8);
		$dostav9=$this->dbos->dbo->quote($this->dostav9);
		$add_400=$this->dbos->dbo->quote($this->add_400);
		$add_4002=$this->dbos->dbo->quote($this->add_4002);
		$add_5000=$this->dbos->dbo->quote($this->add_5000);
		$add_12000=$this->dbos->dbo->quote($this->add_12000);
		$add_20000=$this->dbos->dbo->quote($this->add_20000);
		$pogruzka_5000_koef=$this->dbos->dbo->quote($this->pogruzka_5000_koef);
		$pogruzka_5001_koef=$this->dbos->dbo->quote($this->pogruzka_5001_koef);
		$pogruzka_5001_add=$this->dbos->dbo->quote($this->pogruzka_5001_add);
		$pogruzka_10001_add=$this->dbos->dbo->quote($this->pogruzka_10001_add);
		$pogruzka_15001_add=$this->dbos->dbo->quote($this->pogruzka_15001_add);
		$op_col_ves=$this->dbos->dbo->quote($this->op_col_ves);
		$rles_col_price=$this->dbos->dbo->quote($this->rles_col_price);
		$butovki_zalog=$this->dbos->dbo->quote($this->butovki_zalog);
		$type_dogovor=$this->dbos->dbo->quote($this->type_dogovor);
		$client_schet=$this->dbos->dbo->quote($this->client_schet);
		$schet=$this->dbos->dbo->quote($this->schet);
		$total_s=$this->dbos->dbo->quote($this->total_s);
		
		$height=$this->dbos->dbo->quote(serialize($this->height));
		$dlina=$this->dbos->dbo->quote(serialize($this->dlina));
		$yarusov=$this->dbos->dbo->quote(serialize($this->yarusov));
		$butovki=$this->dbos->dbo->quote(serialize($this->butovki));
		
		///смотрим что за пользователь
		$sql="INSERT INTO calc_saved(client,type_calc,type_lesa,type_oplata,address_dostavki,distance,type_price,first_period,count_nabors,op_col,op_price_ud,op_vozm_ud,op_col_price,op_col_price_vozm,rles_col,rles_price_ud,rles_vozm_ud,rles_col_price_vozm,rles_col_ves,rbez_col,rbez_price_ud,rbez_vozm_ud,rbez_col_price,rbez_col_price_vozm,rbez_col_ves,rig_col,rig_price_ud,rig_vozm_ud,rig_col_price,rig_col_price_vozm,rig_col_ves,nas_col,nas_price_ud,nas_vozm_ud,nas_col_price,nas_col_price_vozm,nas_col_ves,kr_col,kr_price_ud,kr_vozm_ud,kr_col_price,kr_col_price_vozm,kr_col_ves,sdia_col,sdia_price_ud,sdia_vozm_ud,sdia_col_price,sdia_col_price_vozm,sdia_col_ves,sgor_col,sgor_price_ud,sgor_vozm_ud,sgor_col_price,sgor_col_price_vozm,sgor_col_ves,ves_total,total_zakup,total_vozm,price_dostav,price_pogruz,height,dlina,yarusov,data_add,first_period_val,dostav1,dostav2,dostav3,dostav4,dostav5,dostav6,dostav7,dostav8,dostav9,add_400,add_4002,add_5000,add_12000,add_20000,pogruzka_5000_koef,pogruzka_5001_koef,pogruzka_5001_add,pogruzka_10001_add,pogruzka_15001_add,op_col_ves,rles_col_price,butovki_zalog,type_dogovor,client_schet,schet,butovki,total_s,samovuvoz) values($client,$type_calc,$type_lesa,$type_oplata,$address_dostavki,$distance,$type_price,$first_period,$count_nabors,$op_col,$op_price_ud,$op_vozm_ud,$op_col_price,$op_col_price_vozm,$rles_col,$rles_price_ud,$rles_vozm_ud,$rles_col_price_vozm,$rles_col_ves,$rbez_col,$rbez_price_ud,$rbez_vozm_ud,$rbez_col_price,$rbez_col_price_vozm,$rbez_col_ves,$rig_col,$rig_price_ud,$rig_vozm_ud,$rig_col_price,$rig_col_price_vozm,$rig_col_ves,$nas_col,$nas_price_ud,$nas_vozm_ud,$nas_col_price,$nas_col_price_vozm,$nas_col_ves,$kr_col,$kr_price_ud,$kr_vozm_ud,$kr_col_price,$kr_col_price_vozm,$kr_col_ves,$sdia_col,$sdia_price_ud,$sdia_vozm_ud,$sdia_col_price,$sdia_col_price_vozm,$sdia_col_ves,$sgor_col,$sgor_price_ud,$sgor_vozm_ud,$sgor_col_price,$sgor_col_price_vozm,$sgor_col_ves,$ves_total,$total_zakup,$total_vozm,$price_dostav,$price_pogruz,$height,$dlina,$yarusov,'".time()."',$first_period_val,$dostav1,$dostav2,$dostav3,$dostav4,$dostav5,$dostav6,$dostav7,$dostav8,$dostav9,$add_400,$add_4002,$add_5000,$add_12000,$add_20000,$pogruzka_5000_koef,$pogruzka_5001_koef,$pogruzka_5001_add,$pogruzka_10001_add,$pogruzka_15001_add,$op_col_ves,$rles_col_price,$butovki_zalog,$type_dogovor,$client_schet,$schet,$butovki,$total_s,$samovuvoz)";
		$this->dbos->dbo->exec($sql);
		
		/////получить ид
		$sql="SELECT max(id) from calc_saved";
			foreach ($this->dbos->dbo->query($sql) as $row){
				$id_saved=$row[0];
		}
		
		return $id_saved;
	}
	}
}



class permissions {
		private $dbos;
		private $state;
   ////лог действий пользователей
      function __construct() {
     $db=new connect_db();
	 if($db->state=="connected") {
	   $this->dbos=$db;
	   ///
	  
	   
	   } 
	}
	
	function check($code,$id_user=0) {
	if($this->dbos->state=="connected") {
	///проверяем рзрешение на это действие
	$code=$this->dbos->dbo->quote($code);
	///смотрим что за пользователь
	
	if($id_user==0) {
		if($_SESSION['id_user']=="") $user="0"; else $user=$_SESSION['id_user'];
	} else {
		$user=$id_user;
	}
	
		$is_access=0;
		//////запрос к базе
		 $sql="SELECT is_access from access_list where id_user=$user and id_role in (SELECT id from roles where code=$code)";
			foreach ($this->dbos->dbo->query($sql) as $row){
				$is_access=$row[0];
				}
		if($is_access!=0) return true; else return false;
	
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
