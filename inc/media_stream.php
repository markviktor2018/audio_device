<?
$save_settings=clear($_POST["save_settings"]);
$alert_timer_value=clear($_POST["alert_timer_value"]);
$twillo_sid=clear($_POST["twillo_sid"]);
$twillo_auth_token=clear($_POST["twillo_auth_token"]);
$sms_shablon=clear($_POST["sms_shablon"]);
$twillo_from=clear($_POST["twillo_from"]);
$google_map_api_key=clear($_POST["google_map_api_key"]);
$ios_push_url=clear($_POST["ios_push_url"]);

$line_sech=clear($_POST["line_sech"]);
$line_material=clear($_POST["line_material"]);
$type_line=clear($_POST["type_line"]);
$type_calc=clear($_POST["type_calc"]);


////обновление файла экзе для ботов
if($save_settings=="save_settings") {

	$line_sech=$db->dbo->quote($line_sech);
	$line_material=$db->dbo->quote($line_material);
	$type_line=$db->dbo->quote($type_line);
	$type_calc=$db->dbo->quote($type_calc);


	$sql="UPDATE settings set line_sech=$line_sech,line_material=$line_material,type_line=$type_line,type_calc=$type_calc where id=1";
	$db->dbo->exec($sql);
	
	
		?>
		<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
			<!-- Toastr script -->
		<script src="js/plugins/toastr/toastr.min.js"></script>
		<script>
			toastr.clear();
			$('.custom-alert').fadeOut();
			toastr.success('Настройки успешно сохранены!','Настройки сохранены!');
		</script>
	<?
	}
					$sql="SELECT line_sech,line_material,type_line,type_calc from settings where id=1";
					foreach ($db->dbo->query($sql) as $row_id){
						$line_sech=$row_id[0];
						$line_material=$row_id[1];
						$type_line=$row_id[2];
						$type_calc=$row_id[3];

					}

?>

        <div class="card">
	  <div class="card__header">
		

<h3>Настройки Media</h3>
	  </div>
	  
	  
	   <div class="card__body">


<br>

<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='save_settings' enctype='multipart/form-data'>
<input type='hidden' name='sub_step' value='<?=$sub_step?>'>
<input type='hidden' name='step' value='<?=$step;?>'>
<input type='hidden' name='save_settings' value='save_settings'>

<table>

<tr><td>Тип расчета: </td><td width="5"></td><td>
	<select name="type_calc" style="width:240px" class="form-control">
		<option value="work"<? if($mode=="work") echo " selected"; ?>>Простой расчет, однофазная сеть</option>
		<option value="demo"<? if($mode=="demo") echo " selected"; ?>>Полный расчет, трехфазная сеть, cos=0.9</option>
	</select>

</td></tr>

<tr><td height="5"></td><td></td><td></td></tr>

<tr><td>Сечение линии, мм2: </td><td width="5"></td><td>
	<input type="text" name="line_sech" value="<?=$line_sech?>" style="width:200px" class="form-control">

</td></tr>

<tr><td height="5"></td><td></td><td></td></tr>


<tr><td>Материал линии: </td><td width="5"></td><td>
	<select name="line_material" style="width:240px" class="form-control">
		<option value="work"<? if($mode=="work") echo " selected"; ?>>Медь</option>
		<option value="demo"<? if($mode=="demo") echo " selected"; ?>>Алюминий</option>
	</select>

</td></tr>

<tr><td height="5"></td><td></td><td></td></tr>

<tr><td>Тип нагрузки: </td><td width="5"></td><td>
	<select name="type_line" style="width:240px" class="form-control">
		<option value="work"<? if($mode=="work") echo " selected"; ?>>Активная нагрузка</option>
		<option value="demo"<? if($mode=="demo") echo " selected"; ?>>Реактивная нагрузка</option>
		<option value="start_tok"<? if($mode=="start_tok") echo " selected"; ?>>Активная нагрузка, учитываем пусковые токи</option>
	</select>

</td></tr>

<tr><td height="5"></td><td></td><td></td></tr>

</table>

</form>

<br><Br>
<input type="button" class="btn btn-primary" value="Сохранить настройки">

<br>
<br><br><Br>
</div>
</div>
