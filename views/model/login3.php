
<div class="login-reg-panel">
		<!-- <div class="login-info-box">
			<h2>Have an account?</h2>
			<p>Lorem ipsum dolor sit amet</p>
			<label id="label-register" for="log-reg-show">Login</label>
			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
		</div>
-->


		<div class="register-info-box">

			<h2>Bienvenido al sitio de Autopesquisaje para la comunidad Universitaria</h2>
			<h1 class="uni">BICU</h1>

			<!--<label id="label-login" for="log-login-show">Register</label>
			<input type="radio" name="active-log-panel" id="log-login-show"> -->
		</div>

	<div class="white-panel">
		<form onsubmit="return validarIngreso()" method="post">
			<div class="login-show">
				<h2>LOGIN</h2>
				<input type="text" placeholder="Numero de Carnet|Cedula" name="usuarioIngreso">
				<input type="password" placeholder="Password" name="passwordIngreso">

				<?php
	 			$ingreso = new Ingreso();
	 			$ingreso -> ingresoController();

				?>
				<input type="submit" value="Login">
			<!-- <a href="">Forgot password?</a> -->
			<br>
			<div class="brand_logo_container">
				<img src="views/img/logo/bicu.jpg" class="brand_logo" alt="Logo">
			</div>
			</div>
	</form>
	<!--
			<div class="register-show">
				<h2>REGISTER</h2>
				<input type="text" placeholder="Email">
				<input type="password" placeholder="Password">
				<input type="password" placeholder="Confirm Password">
				<input type="button" value="Register">
			</div>
		-->

		</div>
	</div>
