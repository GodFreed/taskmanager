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
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <!-- bootstrap.min.css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/style.css">
	<!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap.min.js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- Fort Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<!-- Навигация -->
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
                <? require_once "applications/components/nav.php"; ?>
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