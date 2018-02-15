<?//если сессия была уже запущена (например после авторизации)
if(isset($_COOKIE['PHPSESSID'])) {
    session_start();//то стартовать её и здесь
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Задачник</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/style.css">
	<!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap.min.js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="navbar-brand"><a href="/">Taskmanager</a></div>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
			    <li><a href="/tasks/create">Создать задачу</a></li>
                <? require_once "applications/includes/nav.php"; ?>
			</ul>
		</div>
	</div>
</div>
<?//поключение контента в шаблон
require_once "applications/views/".$content_view; 
?>
<div class="navbar-bottom row-fluid footer">
    <div class="navbar-inner">
        <div class="container text-center">
            Copyright 2017
        </div>
    </div>
</div>
</body>
</html>