<script>


function list_of_users() {
	document.getElementById('list_of_users').submit();
	}


function current_calc() {
	document.getElementById('current_calc').submit();
	}
function type_functions() {
	document.getElementById('type_functions').submit();
	}
	
function character_function() {
	document.getElementById('character_function').submit();
	}
	
function devices() {
	document.getElementById('devices').submit();
	}	
function calc_functions() {
	document.getElementById('calc_functions').submit();
	}

function private() {
	document.getElementById('private').submit();
	}




function users() {
	document.getElementById('users').submit();
	}



function controller_interfaces() {
	document.getElementById('controller_interfaces').submit();
	}


function settings() {
	document.getElementById('settings').submit();
	}


function butovki_sources() {
	document.getElementById('butovki_sources').submit();
	}



function telegram_users() {
	document.getElementById('telegram_users').submit();
	}





function open_group(block_id,theme_id,group_id,sub_group_id) {
	
	document.getElementById('block_id_open').value=block_id;
	document.getElementById('theme_id_open').value=theme_id;
	document.getElementById('group_id_open').value=group_id;
	document.getElementById('sub_group_open').value=sub_group_id;
	document.getElementById('open_lessons').submit();
	

}

</script>   




<form action="<?=$_SERVER["PHP_SELF"];?>" id='telegram_users' method='POST'>
<input type='hidden' name='step' value='telegram_users'>
<input type='hidden' name='sub_step' value='lidu'>
</form>


<form action="<?=$_SERVER["PHP_SELF"];?>" id='current_calc' method='POST'>
<input type='hidden' name='step' value='current_calc'>
<input type='hidden' name='sub_step' value='lidu'>
</form>


<form action="<?=$_SERVER["PHP_SELF"];?>" id='type_functions' method='POST'>
<input type='hidden' name='step' value='type_functions'>
<input type='hidden' name='sub_step' value='lidu'>
</form>


<form action="<?=$_SERVER["PHP_SELF"];?>" id='controller_interfaces' method='POST'>
<input type='hidden' name='step' value='controller_interfaces'>
<input type='hidden' name='sub_step' value='lidu'>
</form>

<form action="<?=$_SERVER["PHP_SELF"];?>" id='character_function' method='POST'>
<input type='hidden' name='step' value='character_function'>
<input type='hidden' name='sub_step' value='lidu'>
</form>

<form action="<?=$_SERVER["PHP_SELF"];?>" id='devices' method='POST'>
<input type='hidden' name='step' value='devices'>
<input type='hidden' name='sub_step' value='lidu'>
</form>


<form action="<?=$_SERVER["PHP_SELF"];?>" id='calc_functions' method='POST'>
<input type='hidden' name='step' value='calc_functions'>
<input type='hidden' name='sub_step' value='lidu'>
</form>


<form action="<?=$_SERVER["PHP_SELF"];?>" id='settings' method='POST'>
<input type='hidden' name='step' value='settings'>
<input type='hidden' name='sub_step' value='lidu'>
</form>


<form action="<?=$_SERVER["PHP_SELF"];?>" id='users' method='POST'>
<input type='hidden' name='step' value='users'>
<input type='hidden' name='sub_step' value=''>
</form>


<script>
	function hide_menu() {
		if(document.body.classList.contains('mini-navbar')) {
			document.body.classList.remove('mini-navbar');
			
		} else {
			document.body.classList.add('mini-navbar');
		}
	}
</script>





<!-- Header -->
        <header id="header">
            <div class="logo" style="padding-top:10px;">
                
				<img src="/img/EVO_logo.svg" style="cursor:pointer" onCLick="javascript:document.getElementById('current_calc').submit()">
				
				
				
                <i class="logo__trigger zmdi zmdi-menu" data-mae-action="block-open" data-mae-target="#navigation"></i>
            </div>

            <ul class="top-menu">
                
                <li class="dropdown hidden-xs">
                    <a data-toggle="dropdown" href=""><i class="zmdi zmdi-more-vert"></i></a>
                    <ul class="dropdown-menu dropdown-menu--icon pull-right">
                        <li class="hidden-xs">
                            <a data-mae-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> Полноэкранный режим</a>
							<a href="javascript:document.getElementById('exit').submit()"><i class="zmdi zmdi-time-restore"></i> Выйти</a>
                        </li>
                       
                    </ul>
                </li>
                <li class="top-menu__alerts" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__messages">
                    <a href=""><i class="zmdi zmdi-notifications"></i></a>
                </li>
                <li class="top-menu__profile dropdown">
                   
                </li>
            </ul>

            <form class="top-search">
                <input type="text" class="top-search__input" placeholder="Поиск">
                <i class="zmdi zmdi-search top-search__reset"></i>
            </form>
        </header>
		
		
<section id="main">
            <aside id="notifications">
                <ul class="tab-nav tab-nav--justified tab-nav--icon">
                    <li><a class="user-alert__messages" href="#notifications__messages" data-toggle="tab"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a class="user-alert__notifications" href="#notifications__updates" data-toggle="tab"><i class="zmdi zmdi-notifications"></i></a></li>
                    <li><a class="user-alert__tasks" href="#notifications__tasks" data-toggle="tab"><i class="zmdi zmdi-playlist-plus"></i></a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane" id="notifications__messages">
                        <div class="list-group">
                            <a href="" class="list-group-item media">
                                <div class="pull-left">
                                    <img class="avatar-img" src="demo/img/profile-pics/1.jpg" alt="">
                                </div>

                                <div class="media-body">
                                    <div class="list-group__heading">тест</div>
                                    <small class="list-group__text">Какое-то уведомление</small>
                                </div>
                            </a>

                         
                        </div>

                        <a href="" class="btn btn--float">
                            <i class="zmdi zmdi-plus"></i>
                        </a>
                    </div>

                    <div class="tab-pane" id="notifications__updates">
                        <div class="list-group">
						
                            <a href="" class="list-group-item media">
                                <div class="pull-right">
                                    <img class="avatar-img" src="/img/electric.png" alt="">
                                </div>

                                <div class="media-body">
                                    <div class="list-group__heading">тест</div>
                                    <small class="list-group__text">Какое-то уведомление</small>
                                </div>
                            </a>
						<!--

                            <a href="" class="list-group-item media">
                                <div class="pull-right">
                                    <img class="avatar-img" src="demo/img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="list-group__heading">Darla Mckinney</div>
                                    <small class="list-group__text">Duis tincidunt augue nec sem dignissim scelerisque. Vestibulum rhoncus sapien sed nulla aliquam lacinia</small>
                                </div>
                            </a>

                            <a href="" class="list-group-item media">
                                <div class="pull-right">
                                    <img class="avatar-img" src="demo/img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="list-group__heading">Rudolph Perez</div>
                                    <small class="list-group__text">Phasellus a ullamcorper lectus, sit amet viverra quam. In luctus tortor vel nulla pharetra bibendum</small>
                                </div>
                            </a>
							-->
                        </div>
						
                    </div>

                    <div class="tab-pane" id="notifications__tasks">
                        <div class="list-group">
						<div class="list-group-item">
                                <div class="list-group__heading m-b-5">Расчет 1</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% выполнено</span>
                                    </div>
                                </div>
                            </div>
						<!---
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">HTML5 Validation Report</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                        <span class="sr-only">95% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">Google Chrome Extension</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">Social Intranet Projects</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">Bootstrap Admin Template</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">Youtube Client App</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="" class="btn btn--float">
                            <i class="zmdi zmdi-plus"></i>
                        </a>
						-->
                    </div>
                </div>
            </aside>




<aside id="navigation">
                <div class="navigation__header">
                    <i class="zmdi zmdi-long-arrow-left" data-mae-action="block-close"></i>
                </div>

                <div class="navigation__toggles">
                  <!---
                    <a href="" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__updates">
                        <i class="zmdi zmdi-notifications"></i>
                    </a>
					----><br><br>
                </div>
				
					<? if($_SESSION["group"]==1) { ?>	

                <div class="navigation__menu c-overflow">
                    <ul>
                        
							<li <? if($step=='current_calc') echo 'class="navigation__active"'; else echo ''; ?>>
                                        <a href="javascript:document.getElementById('current_calc').submit();"><i class="zmdi zmdi-format-underlined"></i>Текущий расчет</a>
                             </li>
						
						
					
									
							<? if($_SESSION["group"]==1) { ?>			
						 <li class="navigation__sub  <? if($step=='type_functions' or $step=='controller_interfaces' or $step=='character_function' or $step=='calc_functions' or $step=='devices') echo 'navigation__sub--active navigation__sub--toggled"'; else echo ''; ?>">
                            <a href="" data-mae-action="submenu-toggle"><i class="zmdi zmdi-view-list"></i> База данных</a>

                            <ul>
							
									
								<li <? if($step=='calc_functions') echo 'class="navigation__active"'; else echo ''; ?>>
                                        <a href="javascript:document.getElementById('calc_functions').submit();">Функции для расчета</a>
                                    </li>
						
													
								<li <? if($step=='devices') echo 'class="navigation__active"'; else echo ''; ?>>
                                        <a href="javascript:document.getElementById('devices').submit();">Устройства</a>
                                    </li>	
								
								<li <? if($step=='type_functions') echo 'class="navigation__active"'; else echo ''; ?>><a href="javascript:type_functions()">Типы функций</a></li>
										
										
								<li <? if($step=='character_function') echo 'class="navigation__active"'; else echo ''; ?>><a href="javascript:character_function()">Характеристики функций</a></li>
											
											
								<li <? if($step=='controller_interfaces') echo 'class="navigation__active"'; else echo ''; ?>><a href="javascript:controller_interfaces()">Интерфейсы (временно)</a></li>
									
								<li <? if($step=='settings') echo 'class="navigation__active"'; else echo ''; ?>><a href="javascript:settings()">Настройки расчета</a></li>
									
							
							
                            </ul>
                        </li>			
									
							<? } ?>		
				

				
					<? if($_SESSION["group"]==1) { ?>
							
					<li <? if($step=='users') echo 'class="navigation__active"'; else echo ''; ?>>
												<a href="javascript:document.getElementById('users').submit();"><i class="zmdi zmdi-format-underlined"></i>Пользователи</a>
											</li>

					<? } ?>

		
                      
                    </ul>
					
					
                </div>
				
				<? } else { ?>
				
					<?	
					$sql="SELECT id,naim from calculations where user_id='".$_SESSION["id_user"]."' ";
					foreach ($db->dbo->query($sql) as $row){
						$id_calc=$row[0];
						$naim_calc=$row[1];
				
					
				?>
				
				
				
				<? } ?>
					
					
                <div class="navigation__menu c-overflow">
                    <ul>
				
					<?	
					$sql="SELECT id,naim from calculations where user_id='".$_SESSION["id_user"]."' ";
					foreach ($db->dbo->query($sql) as $row){
						$id_calc=$row[0];
						$naim_calc=$row[1];
				
					
				?>
					<form action="<?=$_SERVER["PHP_SELF"];?>" method='POST' id='show_calc_<?=$id_calc?>'>
				<input type='hidden' name='sub_step' value='lidu'>
				<input type='hidden' name='step' value='<?=$step;?>'>
				<input type='hidden' name='selected_calc' value='<?=$id_calc;?>'>
				</form>	
								<li><a href="javascript:document.getElementById('show_calc_<?=$id_calc?>').submit()"><?=$naim_calc?></a></li>
				
				
				<? }?>
				</ul>
				</div>
				<?} ?>
            </aside>



  <section id="content">
                <div class="content__header">
			
	
                  