<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Список компаний</title>
   <link rel="stylesheet"
				href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
				integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
				crossorigin="anonymous">
	<link rel="stylesheet" href="/css/global_styles.css">

	<link rel="icon" href="/img/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon"/>

</head>
<body>

<div class="container-fluid">
	<div class="row">&nbsp;</div>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<div class="col-sm-5">
			<?php
			   if( !$this->session->userdata('isLogined') ){
			?>
				<!-- header with login form -->
				<form method="POST" id="loginForm">
					<input type="text" class="form-control login-input" placeholder="ваш логин">
					<button type="submit" class="btn btn-primary">Войти</button>
					<div class="hrd_error">
						Такого пользователя не существует
					</div>
				</form>
			<?php } ?>
			<button class="btn btn-outline-primary btn-sm" onclick="document.location = '/'">Вернуться к списку компаний</button>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-3">
				<p class="float-right">
					<?php
						if($this->session->userdata('isLogined')){
					?>
							Вы вошли как<br />
							<b>
								<?=$this->session->userdata('userName')?>
							</b>
							<button type="button" id="logoutBtn" class="btn btn-outline-secondary btn-sm">Выйти</button>
					<?php } ?>
				</p>
				</form>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
   <script
     src="http://code.jquery.com/jquery-3.3.1.min.js"
     integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
     crossorigin="anonymous"></script>
	<hr />
