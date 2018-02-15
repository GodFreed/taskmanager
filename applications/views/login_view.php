<?//если есть ошибки ввода подключаем файл который их выведет
if(isset($_COOKIE['errors']))
    require_once "applications/includes/error_message.php";
?>
<br><br>
<div class="container login-container">
	<form method="post" action="" class="form-horizontal">
		<div class="form-group">
			<label for="login" class="label-control col-md-2 col-lg-2">Логин</label>
			<div class="col-md-10 col-lg-10">
				<input type="text" class="form-control" id="login" data-toggle="tooltip" title="Введите ваш логин" name="login">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="label-control col-md-2 col-lg-2">Пароль</label>
			<div class="col-md-10 col-lg-10">
				<input type="password" class="form-control" id="password" data-toggle="tooltip" title="Введите ваш пароль" name="password">
			</div>
		</div>
        <input type="submit" value="Отправить" class="btn btn-success">
	</form>
</div>
