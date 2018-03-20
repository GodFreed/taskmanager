<?
class ControllerAuth extends Controller
{
	public function actionLogin() {
		//проверка были ли отправлены данные, иначе множественные редиректы
        if(isset($_POST['login']) && isset($_POST['password'])) {
            //вызов модели через объект созданый в конструкторе
            $data = $this->model->getUser($_POST['login'], $_POST['password']);
			
            //true - если данные были переданы, иначе - false
            if($data) {
                session_start();
				//присвоение пользователю статуса админа
                $_SESSION['admin'] = true;
				//одноразовое оповещение об успешном входе
                $_SESSION['message'] = 'Вы вошли как: '.$data['login'];
				
				//перенаправление на главную со статусом админа
                header("Location: http://{$_SERVER["HTTP_HOST"]}/");
                exit;
            }
			
            //создание отчёта об ошибках, запятая в конце строки выступает разделителем в applications/components/error_message.php
            setcookie('errors', 'Такого пользователя не существует,', time() + 1);
			//в случае неудачи перезагрузить страницу с отображённым оповещением
            header("Location: http://{$_SERVER["HTTP_HOST"]}/auth/login");
            exit;
        }
        //если никаких данных для входа ещё не было отправлено, то - отобразить страницу входа
        $this->view->generateView("template_view.php", "login_view.php");
	}
    
    public function actionLogout() {
		require_once "applications/components/logout.php";
	}
}