<?php

///отображаем список пользователей
$sub_step=clear($_POST["sub_step"]);
$add=clear($_POST["add"]);
$del=clear($_POST["del"]);
$edit=clear($_POST["edit"]);
$naim=clear($_POST["naim"]);
$code=clear($_POST["code"]);
$lang=$_POST["lang"];

$id_izm=clear($_POST["id_izm"]);
$filt_user=clear($_POST["filt_user"]);
$id_user=clear($_POST["id_user"]);
$name=clear($_POST["name"]);
$line=clear($_POST["line"]);

$size=clear($_POST["size"]);
$d3=clear($_POST["d3"]);
$tok=clear($_POST["tok"]);
$voltage=clear($_POST["voltage"]);

$type_function=clear($_POST["type_function"]);
$interface=clear($_POST["interface"]);
$character_function=clear($_POST["character_function"]);
$uid=clear($_POST["uid"]);


$type_reg=clear($_POST["type_reg"]);
$name=clear($_POST["name"]);
$email=clear($_POST["email"]);
$password=clear($_POST["password"]);
$auth_token=clear($_POST["auth_token"]);
$address=clear($_POST["address"]);
$paid=clear($_POST["paid"]);
$status=clear($_POST["status"]);
$comment=clear($_POST["comment"]);


$tok_type=clear($_POST["tok_type"]);
$tok_work=clear($_POST["tok_work"]);
$voltage_work=clear($_POST["voltage_work"]);
$interface=clear($_POST["interface"]);
$din_count=clear($_POST["din_count"]);
$png=clear($_POST["png"]);

ini_set("display_errors","On");
if($sub_step=="") $sub_step="lidu";


//////////////// добавление категории
if($add!="") {

	//////сразу добавляем в базу без проверок, это режим администратора
	$naim=$db->dbo->quote($naim);
	$tok=$db->dbo->quote($tok);
	$voltage=$db->dbo->quote($voltage);
	$type_function=$db->dbo->quote($type_function);
	$interface=$db->dbo->quote($interface);
	$character_function=$db->dbo->quote($character_function);
	$line=$db->dbo->quote($line);
	
	
	

	$sql="INSERT INTO calc_functions(naim,tok,voltage,type_function,interface,character_function,line) values($naim,$tok,$voltage,$type_function,$interface,$character_function,$line)";
	$db->dbo->exec($sql);


	$id_inserted=$db->dbo->lastInsertId();
	
							
							$sql="UPDATE func_devices set update_id='$id_inserted' where update_id='$uid'";
								$db->dbo->exec($sql);
	
	?>
		<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
			<!-- Toastr script -->
		<script src="js/plugins/toastr/toastr.min.js"></script>
		<script>
			toastr.clear();
			$('.custom-alert').fadeOut();
			toastr.success('Новая функция для расчета успешно добавлена!','Добавление новой функции для расчета!');
		</script>
		
	
	<?
}


//////редактирование категории

if($edit!="") {

	$naim=$db->dbo->quote($naim);
	$tok=$db->dbo->quote($tok);
	$voltage=$db->dbo->quote($voltage);
	$type_function=$db->dbo->quote($type_function);
	$interface=$db->dbo->quote($interface);
	$character_function=$db->dbo->quote($character_function);
	$line=$db->dbo->quote($line);
	


	$sql="UPDATE calc_functions set naim=$naim,tok=$tok,voltage=$voltage,type_function=$type_function,interface=$interface,character_function=$character_function,line=$line where id=$id_izm";
	$db->dbo->exec($sql);
	
	?>
		<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
			<!-- Toastr script -->
		<script src="js/plugins/toastr/toastr.min.js"></script>
		<script>
			toastr.clear();
			$('.custom-alert').fadeOut();
			toastr.success('Свойства функции для расчета изменены','Свойства функции для расчета изменены!');
		</script>
		
	
	<?

}

///////////////////////удаление категории
if($del!="") {

	
	
		$sql="DELETE from calc_functions where id=$id_izm";
	$db->dbo->exec($sql);
	?>
		<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
			<!-- Toastr script -->
		<script src="js/plugins/toastr/toastr.min.js"></script>
		<script>
			toastr.clear();
			$('.custom-alert').fadeOut();
			toastr.success('','Функция для расчета успешно удалена!');
		</script>
		
	
	<?
}
	
	
?>

     


<?
if($sub_step=="lidu") { 
?>
<form action="<?=$_SERVER["PHP_SELF"];?>" id='sort_form' method='POST'>
<table><tr><td><font size="-1">
<input type="hidden" name="to_page" id="to_page" value="">
<input type='hidden' name='step' value='<?=$step?>'>
<input type='hidden' name='sub_step' value='<?=$sub_step?>'>
</form>


 

<form action="<?=$_SERVER["PHP_SELF"];?>" id='del_form' method='POST'>
<input type='hidden' name='step' value='<?=$step?>'>
<input type='hidden' name='sub_step' value='<?=$sub_step?>'>
<input type='hidden' name='del' value='del'>
<input type='hidden' name='id_izm' id='id_izm_del' value=''>
</form>
	
	
	



 <script src="js/plugins/sweetalert/sweetalert.min.js"></script>
<link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<script type="text/javascript">


	function PopUpHide(id){
		document.getElementById('popup'+id).style.visibility="hidden";
	}

	function PopUpShow(id){
		document.getElementById('popup'+id).style.visibility="visible";
	}

	function redakt(id) {
		document.getElementById('id_izm_edit').value=id;
		document.getElementById('edit_form').submit();
		
	}
	
	function del_item(id) {
	
	
	swal({
        title: "Вы уверены?",
        text: "Вы уверены, что хотите удалить эту функцию для расчета?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Да, я уверен!",
        closeOnConfirm: false
    }, function () {
         document.getElementById('id_izm_del').value=id;
			 document.getElementById('del_form').submit();
    });
	
	

}

</script>

<form action="<?=$_SERVER["PHP_SELF"];?>" id='edit_form' method='POST'>
<input type='hidden' name='step' value='<?=$step?>'>
<input type='hidden' name='sub_step' value='edit'>
<input type='hidden' name='id_izm' id='id_izm_edit' value=''>
</form>

	<style>
table.t1 {
     border: solid 1px #000;
     border-collapse: collapse; /*чтобы borders накладывались друг на друга*/
}

th.t1, td.t1 {
     border: solid 1px #000;
     padding:5px; /*отступ от краев ячейки*/
}
</style>

<?php
$filt="";
if($filt_user!="") {
	$filt_user=$filt_user*1;
	$filt=" where id_user=$filt_user";
}

?>
		<div class="ibox-title">
		<h3>Выбранные функции</h3>
		
		<table>
		<tr>
		<td>
			<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='add_new_form'>
			<input type='hidden' name='sub_step' value='add_new'>
			<input type='hidden' name='step' value='<?=$step;?>'>
			</form>
		</td>
		
		</tr></table>
		
		<br>
	
			</div>
			
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
	<form action="<?=$_SERVER["PHP_SELF"];?>" id='set_pro_form' method='POST'>
		<input type='hidden' name='step' value='<?=$step?>'>
		<input type='hidden' name='sub_step' value='<?=$sub_step?>'>
		<input type='hidden' name='set_pro' value='set_pro'>
		<input type='hidden' name='id_izm' id='id_izm_pro' value=''>
		</form>
		
		<form action="<?=$_SERVER["PHP_SELF"];?>" id='set_basic_form' method='POST'>
		<input type='hidden' name='step' value='<?=$step?>'>
		<input type='hidden' name='sub_step' value='<?=$sub_step?>'>
		<input type='hidden' name='set_basic' value='set_basic'>
		<input type='hidden' name='id_izm' id='id_izm_basic' value=''>
		</form>

   
                        <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover dataTables-example">
			<thead>
			<tr>  
				<th>№</th>
				<th><b>Название функции</th>
				<th><b>Тип функции</th>
				<th><b>Тип интерфейса</th>
				<th><b>Характеристика</th>
				<th><b>Оборудование</th>
				<th><b>Длина линии</th>
				
				<th></th>
			
			</tr>
			</thead>

<?
////сначала показываем те, у которых есть переносы
$per=1;
$noms=1;


$sql="SELECT id,naim,(SELECT naim from type_functions where type_functions.id=type_function),(SELECT naim from controller_interfaces where controller_interfaces.id=interface),(SELECT naim from character_function where character_function.id=character_function),tok,voltage,line from calc_functions";
foreach ($db->dbo->query($sql) as $row){
	$id=$row[0];
	$naim=$row[1];
	$type_functions=$row[2];
	$interface=$row[3];
	$character_function=$row[4];
	$tok=$row[5];
	$voltage=$row[6];
	$line=$row[7];
	
	$devices="";
	////поздзапрос для списка устройства
	$sql_device="SELECT id,(SELECT naim from devices where id=device_id),count from func_devices where update_id='$id'";
		foreach ($db->dbo->query($sql_device) as $row_device){
			$id_device=$row_device[0];
			$naim_device=$row_device[1];
			$count=$row_device[2];
			
			$devices=$devices."$naim_device ($count) <br>";
			
		}

	
	
?>
			<tr class="<?=$ncolor?>"  style="cursor:pointer;">
			        
			<td><?=$noms?></td>
				<td onClick="redakt('<?=$id?>');">  <? echo $naim; ?> </td>
				<td onClick="redakt('<?=$id?>');">  <? echo $type_functions; ?> </td>
				<td onClick="redakt('<?=$id?>');">  <? echo $interface; ?> </td>
				<td onClick="redakt('<?=$id?>');">  <? echo $character_function; ?> </td>
				<td onClick="redakt('<?=$id?>');">  <? echo $line; ?> </td>
				
				
			
				<td> 
								<div class="btn btn-default btn-xs" onClick="redakt('<?=$id?>');" >Изменить</button></div>
								<div class="btn btn-default btn-xs" onClick="del_item('<?=$id?>');" >Удалить</button></div>
 							

																																														
				</td>
				
			</tr>
		

<? 
$nom++;
$noms++;
} 																																			
?>

</table>

<input type="button"  class="btn btn-primary" style="width:350px" onClick="document.getElementById('add_new_form').submit();" value="Добавить новую функцию">
<br><br><br><br>
</div>


<?
}
?>


<?


///////////////////добавление категории////////////////////////////////////
if($sub_step=="add_new") { 
	
	?>
<div class="row wrapper white-bg">

<script>

function add_new() {

	
	var naim=document.getElementById('naim').value;
	
	
		document.getElementById('add_new').submit();
	
}
</script>

<?php

$uid=gen_uuid();

?>

<h3>Добавление новой функции</h3>

</div>

		<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='add_new'  enctype='multipart/form-data'>
		<input type='hidden' name='sub_step' value=''>
		<input type='hidden' name='step' value='<?=$step;?>'>
		<input type='hidden' name='add' value='add'>
		<input type='hidden' name='uid' value='<?=$uid?>'>

<div class="ibox">
	<div class="ibox-content">
	<script src='/calend.js' type='text/javascript'>
				</script>
<script>
function TAKeyDown_comment(event) {  
    event = event || window.event;
    if(event.keyCode == 13) { 
		document.getElementById('comment').value=document.getElementById('comment').value+'\r\n';
	}
	}
	</script>
			
<script src="/js/scriptjava.js"></script><br>
<table class="tab-2" border='0' cellspacing='0' cellpadding='0'>


			
			<tr>
				<td>Название функции:
					
				</td><td width="5"></td>
				<td>
				
				
				<input type="text" name="naim" id="naim" value="<?=$naim?>" style="width:200px">
				
				</td>
			</tr>
			<tr><td height="5">	</td><td width="5"></td><td></td></tr>
	
	
	<tr>
				<td>Тип функции:
					
				</td><td width="5"></td>
				<td>
				
				<select name="type_function" id="type_function" style="width:200px">
<option value=''>< нет типа ></option>
				<?	
					$sql="SELECT id,naim from type_functions ";
					foreach ($db->dbo->query($sql) as $row){
						$id_function=$row[0];
						$naim_function=$row[1];
						
					?>
					<option value='<?=$id_function?>'<? if($id_function==$type_function) echo " selected"; ?>><?=$naim_function?></option>
				<?
					}
		?>
				</select>
				</td>
			</tr>
			<tr><td height="5">	</td><td width="5"></td><td></td></tr>
	
			
			<tr>
				<td>Интерфейс:
					
				</td><td width="5"></td>
				<td>
				
				<select name="interface" id="interface" style="width:200px">
<option value=''>< нет интерфейса ></option>
				<?	
					$sql="SELECT id,naim from controller_interfaces ";
					foreach ($db->dbo->query($sql) as $row){
						$id_interface=$row[0];
						$naim_interface=$row[1];
						
					?>
					<option value='<?=$id_interface?>'<? if($id_interface==$interface) echo " selected"; ?>><?=$naim_interface?></option>
				<?
					}
		?>
					
				</select>
				
				
				</td>
			</tr>
			<tr><td height="5">	</td><td width="5"></td><td></td></tr>
			
			
			
			<tr>
				<td>Характеристика функции:
					
				</td><td width="5"></td>
				<td>
				
				<select name="character_function" id="character_function" style="width:200px">
<option value=''>< нет типа ></option>
				<?	
					$sql="SELECT id,naim from character_function ";
					foreach ($db->dbo->query($sql) as $row){
						$id_character=$row[0];
						$naim_character=$row[1];
						
					?>
					<option value='<?=$id_character?>'<? if($id_character==$character_function) echo " selected"; ?>><?=$naim_character?></option>
				<?
					}
		?>
				</select>
				</td>
			</tr>
			<tr><td height="5">	</td><td width="5"></td><td></td></tr>
	
			
	
			
	<tr>
				<td>Длина линии, м:
					
				</td><td width="5"></td>
				<td>
				
				
				<input type="text" name="line" id="line" value="<?=$line?>" style="width:200px">
				
				</td>
			</tr>
			
				<tr><td height="5">	</td><td width="5"></td><td></td></tr>		
	
</table><br>



<br>
			<h3>Оборудование</h3>
		<iframe src="/add_devices.php?id_update=<?=$uid?>" width="1500px" height="423" frameborder="0" scrolling="yes"></iframe>	
			
		<br>
		
		
		<br>

<input type="button" class="btn btn-primary" onClick="add_new();" value="Добавить функцию для расчета">

<input type="button" class="btn btn-primary" onClick="document.getElementById('back').submit();" value="<< Назад">

</div>
</div>
</form>
</div>

<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='back'>
		<input type='hidden' name='sub_step' value=''>
		<input type='hidden' name='step' value='<?=$step;?>'>


	</form>
	


<br>
<br>
<br>

</form>
<?
}



///////////////////редактирование////////////////////////////////////
if($sub_step=="edit") { 
	
	?>
<div class="row wrapper white-bg">

<script>

function edit_izm() {

	
		document.getElementById('edit_izm').submit();
	
}
</script>

<h3>Редактирование свойств устройства</h3>

<?

$sql="SELECT naim,type_function,interface,character_function,voltage,tok,line from calc_functions where id='$id_izm'";
	foreach ($db->dbo->query($sql) as $row){
			$naim=$row[0];
			$type_function=$row[1];
			$interface=$row[2];
			$character_function=$row[3];
			$voltage=$row[4];
			$tok=$row[5];
			$line=$row[6];
			
			
		}


?>

</div>

		<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='edit_izm' enctype='multipart/form-data'>
		<input type='hidden' name='sub_step' value=''>
		<input type='hidden' name='step' value='<?=$step;?>'>
		<input type='hidden' name='edit' value='edit'>
		<input type='hidden' name='id_izm' value='<?=$id_izm?>'>

<div class="ibox">
	<div class="ibox-content">
	<script src='/calend.js' type='text/javascript'>
				</script>
	
<script src="/js/scriptjava.js"></script><br>
<table class="tab-2" border='0' cellspacing='0' cellpadding='0'>
		
			
			<tr>
				<td>Название функции:
					
				</td><td width="5"></td>
				<td>
				
				
				<input type="text" name="naim" id="naim" value="<?=$naim?>" style="width:200px">
				
				</td>
			</tr>
			<tr><td height="5">	</td><td width="5"></td><td></td></tr>
	
	
	<tr>
				<td>Тип функции:
					
				</td><td width="5"></td>
				<td>
				
				<select name="type_function" id="type_function" style="width:200px">
<option value=''>< нет типа ></option>
				<?	
					$sql="SELECT id,naim from type_functions ";
					foreach ($db->dbo->query($sql) as $row){
						$id_function=$row[0];
						$naim_function=$row[1];
						
					?>
					<option value='<?=$id_function?>'<? if($id_function==$type_function) echo " selected"; ?>><?=$naim_function?></option>
				<?
					}
		?>
				</select>
				</td>
			</tr>
			<tr><td height="5">	</td><td width="5"></td><td></td></tr>
	
			
			<tr>
				<td>Интерфейс:
					
				</td><td width="5"></td>
				<td>
				
				<select name="interface" id="interface" style="width:200px">
<option value=''>< нет интерфейса ></option>
				<?	
					$sql="SELECT id,naim from controller_interfaces ";
					foreach ($db->dbo->query($sql) as $row){
						$id_interface=$row[0];
						$naim_interface=$row[1];
						
					?>
					<option value='<?=$id_interface?>'<? if($id_interface==$interface) echo " selected"; ?>><?=$naim_interface?></option>
				<?
					}
		?>
					
				</select>
				
				
				</td>
			</tr>
			<tr><td height="5">	</td><td width="5"></td><td></td></tr>
			
			
			
			<tr>
				<td>Характеристика функции:
					
				</td><td width="5"></td>
				<td>
				
				<select name="character_function" id="character_function" style="width:200px">
<option value=''>< нет типа ></option>
				<?	
					$sql="SELECT id,naim from character_function ";
					foreach ($db->dbo->query($sql) as $row){
						$id_character=$row[0];
						$naim_character=$row[1];
						
					?>
					<option value='<?=$id_character?>'<? if($id_character==$character_function) echo " selected"; ?>><?=$naim_character?></option>
				<?
					}
		?>
				</select>
				</td>
			</tr>
			<tr><td height="5">	</td><td width="5"></td><td></td></tr>
	
			
			
	<tr>
				<td>Длина линии, м:
					
				</td><td width="5"></td>
				<td>
				
				
				<input type="text" name="line" id="line" value="<?=$line?>" style="width:200px">
				
				</td>
			</tr>
			
				<tr><td height="5">	</td><td width="5"></td><td></td></tr>		
		
</table><br>


<br>
			<h3>Оборудование</h3>
		<iframe src="/add_devices.php?id_update=<?=$id_izm?>" width="1500px" height="423" frameborder="0" scrolling="yes"></iframe>	
			
		<br>
		
		
		<br>

<input type="button"  class="btn btn-primary" onClick="edit_izm();" value="Редактировать свойства функции для расчета">

<input type="button"  class="btn btn-primary" onClick="document.getElementById('back').submit();" value="<< Назад">


</div>
</div>
</form>
</div>

<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='back'>
		<input type='hidden' name='sub_step' value=''>
		<input type='hidden' name='step' value='<?=$step;?>'>


	</form>
	


<br>
<br>
<br>

</form>
<?
}






?>
</td></tr></table>
