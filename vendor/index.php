<html>
<head><title>Загрузка объявлений в рекламные аккаунты Facebook</title>
  <script src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
	<br><br>
	<table>
	<tr>
	<td>Страны:</td><td width="5"></td><td>
		<input type="text" name="countries" id="countries" value="" placeholder="Страны">
	</td><td width="5"></td>
	<td>Бюджет:</td><td width="5"></td><td>
		<input type="text" name="budget" id="budget" value="" placeholder="Бюджет">
	</td><td width="5"></td>
	<td>Мин. возраст:</td><td width="5"></td><td>
		<select name="min_vozrast" id="min_vozrast">
		<? for($age=14;$age<=100;$age++) { ?>
			<option value="<?=$age?>"><?=$age?></option>
		<? } ?>
		</select>
	</td><td width="5"></td>	
	<td>Макс. возраст:</td><td width="5"></td><td>
		<select name="max_vozrast" id="max_vozrast">
		<? for($age=14;$age<=100;$age++) { ?>
			<option value="<?=$age?>"><?=$age?></option>
		<? } ?>
		</select>
	</td><td width="5"></td>	
	<td>Пол:</td><td width="5"></td><td>
		<select name="pol" id="pol">
			<option value="1">Женский</option>
			<option value="2">Мужской</option>
			<option value="">Оба</option>
		</select>
	</td><td width="5"></td>
		<td></td><td width="5"></td><td>
			<table>
				<tr><td><input type="checkbox" name="facebook_lenta" id="facebook_lenta" value="1"></td>
				<td width="5"></td>
				<td>Фейсбук лента</td>
				</tr>
				<tr><td><input type="checkbox" name="network_audience" id="network_audience" value="1"></td>
				<td width="5"></td>
				<td>Network Audience</td>
				</tr>
				<tr><td><input type="checkbox" name="instagram" id="instagram" value="1"></td>
				<td width="5"></td>
				<td>Instagram</td>
				</tr>
			</table>
	</td><td width="5"></td></tr>
	</table>
	
	<table><tr><td>
		<textarea name="ads_text" id="ads_text" placeholder="Тескт и заголовок объявлений" style="width:250px;height:100px"></textarea>
	</td><td width="5"></td><td>
		<input id="sortpicture" type="file" name="file" />
		<button id="upload">Загрузить картинку к creativ-ам</button>
		<br>
		<br>
		<textarea name="images_links" id="images_links" style="width:500px;height:60px" placeholder="Список картинок для creativ-ов"></textarea>
	</td></tr></table>
	<br>
	<table>
		<tr><td valign="top">Ссылки на сайты:<br>
		<textarea name="urls" id="urls" placeholder="Ссылки на сайты  (по одной на строку)" style="width:250px;height:250px;white-space:nowrap;"></textarea>
		</td><td width="5"></td>
		<td valign="top">
		Токены:<br>
		<textarea name="tokens" id="tokens" placeholder="Токены (по одному на строку)" style="width:250px;height:250px;white-space:nowrap;"></textarea>
		</td><td width="5"></td>
		<td valign="top">
		Список рекламных аккаунтов:<br>
		<textarea name="ads_accs" id="ads_accs" placeholder="Список рекламных аккаунтов  (по одному на строку)" style="width:250px;height:250px;white-space:nowrap;"></textarea>
		</td><td width="5"></td>
		<td valign="top">
		Page_id страниц аккаунтов:<br>
		<textarea name="page_ids" id="page_ids" placeholder="Список страниц аккаунтов (по одному на строку)" style="width:250px;height:250px;white-space:nowrap;"></textarea>
		</td><td width="5"></td>
		<td valign="top">
		Список пикселей:<br>
		<textarea name="pixels" id="pixels" placeholder="Список пикселей (по одному на строку)" style="width:250px;height:250px;white-space:nowrap;"></textarea><br><center><br>
		<input type="button" value="Создать пиксели" onClick="gen_pixels()">
		</td><td width="5"></td>
		</tr>
	</table>
		<center>
		<input type="button" value="Залить" onClick="upload_ads()">
		
		<br>
		<br>
		<table style="width:100%">
		
			<tr><td>Ответы от сервера facebook для анализа (по одному для каждой строки):<br>
			<textarea id="responses" style="width:100%;height:300px;white-space:nowrap;"></textarea>
		</table>
		
<script>

	$('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
		$.ajax({
					url: 'upload_images.php',
					dataType: 'text',
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					type: 'post',
					success: function(res_data){
					
						document.getElementById('images_links').value=document.getElementById('images_links').value+res_data+'\r\n';	
						
					}
		 });
	});


	function gen_pixels() {
	
		///получаем список рекламных аккаунтов
		var tokens=document.getElementById('tokens').value;
		var ads_accs=document.getElementById('ads_accs').value;
		
		document.getElementById('responses').value='Отправка запроса, пожалуйста, подождите...';
		document.getElementById('pixels').value='';
		
		$.ajax({
			type: "POST",
			url: "generate_pixels.php",
			data: "tokens="+tokens+"&ads_accs="+ads_accs,
			dataType: 'json',
			success: function(data){
						
						document.getElementById('responses').value='Отправка запроса, пожалуйста, подождите...';
						
						for (var i=0; i<=data.length-1; i++) {
							var result = data[i];
							document.getElementById('pixels').value=document.getElementById('pixels').value+result.pixel_id+'\r\n';	
							//////ответы от сервера
							document.getElementById('responses').value=document.getElementById('responses').value+result.server_output+'\r\n';	
						}
								
										
					}
		});
	
	}
	
	
	function upload_ads() {
		
		var countries=document.getElementById('countries').value;
		var budget=document.getElementById('budget').value;
		var min_vozrast=document.getElementById('min_vozrast').value;
		var max_vozrast=document.getElementById('max_vozrast').value;
		var pol=document.getElementById('pol').value;
		
		if(document.getElementById('facebook_lenta').checked) {
			var facebook_lenta=1;
		} else {
			var facebook_lenta=0;
		}
		
		if(document.getElementById('network_audience').checked) {
			var network_audience=1;
		} else {
			var network_audience=0;
		}
		
		if(document.getElementById('instagram').checked) {
			var instagram=1;
		} else {
			var instagram=0;
		}
		
		
		var ads_text=document.getElementById('ads_text').value;
		var urls=document.getElementById('urls').value;
		var tokens=document.getElementById('tokens').value;
		var ads_accs=document.getElementById('ads_accs').value;
		var page_ids=document.getElementById('page_ids').value;
		var pixels=document.getElementById('pixels').value;
		
		////список картинок///////////////
		var images_links=document.getElementById('images_links').value;
		
		document.getElementById('responses').value='Отправка запроса, пожалуйста, подождите...';
		
		$.ajax({
			type: "POST",
			url: "upload_ads.php",
			data: "countries="+countries+"&budget="+budget+"&min_vozrast="+min_vozrast+"&max_vozrast="+max_vozrast+"&pol="+pol+"&facebook_lenta="+facebook_lenta+"&network_audience="+network_audience+"&instagram="+instagram+"&ads_text="+ads_text+"&urls="+urls+"&tokens="+tokens+"&ads_accs="+ads_accs+"&page_ids="+page_ids+"&pixels="+pixels+"&images_links="+images_links,
			dataType: 'json',
			success: function(data){
						
						document.getElementById('responses').value='';
						
						for (var i=0; i<=data.length-1; i++) {
							var result = data[i];

							//////ответы от сервера
							document.getElementById('responses').value=document.getElementById('responses').value+'========================================================\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Создание кампании: '+result.result_campaign+'\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Ответ сервера: '+JSON.stringify(result.server_output_campaign)+'\r\n';	
							
							document.getElementById('responses').value=document.getElementById('responses').value+'\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Создание AdSet-a: '+result.result_adset+'\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Ответ сервера: '+JSON.stringify(result.server_output_adset)+'\r\n';	
							
							document.getElementById('responses').value=document.getElementById('responses').value+'\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Загрузка картинки: '+result.result_image+'\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Ответ сервера: '+JSON.stringify(result.server_output_image)+'\r\n';	
							
							document.getElementById('responses').value=document.getElementById('responses').value+'\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Создание Creativ-a: '+result.result_creative+'\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Ответ сервера: '+JSON.stringify(result.server_output_creative)+'\r\n';	
							
							document.getElementById('responses').value=document.getElementById('responses').value+'\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Создание AD: '+result.result_ad+'\r\n';	
							document.getElementById('responses').value=document.getElementById('responses').value+'Ответ сервера: '+JSON.stringify(result.server_output_ad)+'\r\n';	
						}
								
										
					}
		});
	
	}

</script>		
</body>
</html>