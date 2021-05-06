
	<div class="container">
		<div class="table-1">
			<div class="warning">
				<span>	Здесь вы можете увидеть и скачать резервные копии данной системы, они делаются согласно Настройкам системы и всегда перед важными изменениями в записях базы данных. После скачивания выбранной резервной копии базы данных вы можете вручную загрузить ее на свой сервер, выбрав самостоятельно при необходимости нужную таблицу и параметры загрузки данных.</span>
			</div>
			 <table class="table table-hover margin bottom" style="width:100%">
                                                 
				<thead>
				<tr>
					<td>Дата резервной копии</td>
					<td>Имя файла</td>
					<td>Размер файла</td>

				</tr>
				</thead>

<?
		$files=scandir("backup");
		$cnt_files=count($files);
		foreach($files as $fl) {
		if($fl!="." and $fl!="..") {
		echo "<tr><td><font size='-1'>".date("d.m.Y H:i:s",filemtime("backup"."/".$fl))."</font></td>
		<td><a href='backup/$fl'><font size='-1'>$fl</a></td>
		<td><font size='-1'>".round(filesize("backup"."/".$fl)/1024)." Кб.</td>
		</tr>";
			////if((filemtime($this->dump_dir."/".$fl))<=time()-$period_del_backup) unlink($this->dump_dir."/".$fl);
		}
		}
?>

</table>

