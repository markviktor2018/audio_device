


 <div class="login">

            <!-- Login -->
			  <form class="m-t" role="form" action="<? echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="login__block toggled" id="l-login">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                   Пожалуйста, авторизуйтесь

                   
                </div>

                <div class="login__block__body">
                    <div class="form-group form-group--float form-group--centered form-group--centered">
                        <input type="text" class="form-control" name="login" id="login">
                        <label>Имя пользователя</label>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group form-group--float form-group--centered form-group--centered">
                        <input type="password" class="form-control"  name="pass" id="password">
                        <label>Пароль</label>
                        <i class="form-group__bar"></i>
                    </div>

                    <button type="submit" class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-long-arrow-right"></i></button>
                </div>
            </div>
			<input type="hidden" name="savepref">
							<input type="hidden" name="step" value="current_calc">
							
		</form>
        

            
        </div>



    
