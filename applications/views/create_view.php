<?//если есть ошибки ввода то подключаем файл который их выведет
if(isset($_COOKIE['errors']))
    require_once "applications/components/error_message.php";
?>
<br><br>
<div class="container create-task">
	<form enctype="multipart/form-data" method="post" action="/tasks/create" class="form-horizontal">
		<div class="form-group">
			<label for="name" class="label-control col-md-2 col-lg-2">Имя</label>
			<div class="col-md-10 col-lg-10">
				<input type="text" class="form-control" id="name" data-toggle="tooltip" title="Введите ваше имя" name="name" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="label-control col-md-2 col-lg-2">Email</label>
			<div class="col-md-10 col-lg-10">
				<input type="email" class="form-control" id="email" data-toggle="tooltip" title="Введите ваш email" name="email" maxlength="50">
			</div>
		</div>
		<div class="form-group">
            <label for="picture" class="label-control col-md-2 col-lg-2">Изображение</label>
            <div class="col-md-10 col-lg-10">
		        <input type="file" class="form-control" name="picture" id="picture" accept="image/*,image/jpeg">
            </div>
        </div>
        <div class="form-group">
            <label for="text" class="label-control col-md-2 col-lg-2">Текст</label>
            <div class="col-md-10 col-lg-10">
                <textarea name="description" id="text" cols="132" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-6 button">
            <input type="submit" value="Отправить" class="btn btn-danger">
        </div>
	</form>
	<div class="col-md-6 text-right button">
        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-overview" id="previousView">Предварительный просмотр</button>
     </div>
</div>

<!--Модальное окно для предварительного просмотра-->
<div id="modal-overview" class="modal fade task" tabindex="-1">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">х</button>
            <h3 class="modal-title text-center">Задача</h3>
        </div>
        <div class="modal-body">
            <p>Имя: </p>
            <p>Email: </p>
            <p>Cтатус: Не определён</p>
            <p>Текс задачи:</p>
            <div></div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal">Закрыть</button>
        </div>
    </div>
    </div>
</div>

<!--скрипт для работы модального окна-->
<script src="/applications/components/modal_window.js"></script>