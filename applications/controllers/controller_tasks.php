<?
class ControllerTasks extends Controller
{
    public function actionShow() {
		$data = $this->model->getTasks();
		$this->view->generateView("tasks_view.php", "Список задач", $data);
	}
    
	public function actionDelete($task) {
		//ограничить доступ не авторизованому пользователю (в случае перехода по адресной строке)
		$this->checkAdmin();
		
		//$task - идентификатор задачи, который передаётся через route.php
        $this->model->deleteTask($task);
        
        header("Location: http://".$_SERVER['HTTP_HOST']."/");
        exit;
	}
    
    public function actionCreate() {
		//по адресу /task/create происходит и создание задачи и её отправка
		//поэтому if() опредеяет какая часть функционала должна отработать сейчас
		if(!empty($_POST)) {
			$this->checkData();
			//saveTask() отработает в случае отсутствия ошибок проверяемых в checkData()
			$this->model->saveTask();
			//редирект на главную после добавления новой задачи задачи
			header("Location: http://{$_SERVER["HTTP_HOST"]}/");
			exit;
		}
       	//отобразить представление для создания новой задачи
		$this->view->generateView("create_view.php", "Создание задачи");
	}
    
    public function actionOverview($task) {
        $taskData = $this->model->getTask($task);

        $this->view->generateView("overview_view.php", "Просмотр задачи", $taskData);
    }
    
    public function actionEdit($task) {
		//ограничить доступ не авторизованому пользователю (в случае перехода по адресной строке)
		$this->checkAdmin();
		
        if(empty($_POST)) {
			//данный блок кода отображает представлние редактирования задачи
            $taskData = $this->model->getTask($task);
            $this->view->generateView("edit_view.php", "Редактирование задачи", $taskData);
            exit;
        }
		//данный блок кода вносит изменения в БД
		//одноразовое оповещение, которое отобразиться после обновления задачи
        setcookie('message', 'Изменения успешно сохранены', time() + 1);
        $this->model->editTask($task);
		//отображаем страницу с обновлёнными данными
        header("Location: http://{$_SERVER["HTTP_HOST"]}/tasks/edit/{$task}");
        exit;
    }
    
    private function checkAdmin() {
        //если сессия уже была запущена
        if(isset($_COOKIE['PHPSESSID'])) {
            //то запустить её и здесь
            session_start();
            //и если есть права админа в этой сессии
            if(isset($_SESSION['admin'])) {
                //то вернуться к выполнению функции
                return;
            }
        }
       	//иначе - вернуться на главную
        header("Location: http://".$_SERVER['HTTP_HOST']."/");
        exit;
    }
    
	//функция проверки данных перед их отправкой в БД
    private function checkData() {
		$this->checkInputData();
        $this->checkImage($_FILES['picture']['type'], $_FILES['picture']['name']);
        $this->checkCopyFile();
        $this->checkImageNameLength($_FILES['picture']['name']);
        
		//в случае наличия ошибок вернутьcя на /create_task
        if($this->errors != '') {
            //создание отчёта об ошибках
            setcookie('errors', $this->errors, time() + 1);
			
            //перенаправление на страницу для повторного ввода данных
            header("Location: http://{$_SERVER["HTTP_HOST"]}/tasks/create");
            exit;
        }
        //если ошибок нет то продолжить работу actionCreate()
        return;
    }
	
    //функция проверки полноты введённых данных
    private function checkInputData() {
        if(empty($_POST['name']) || empty($_POST['email']) 
            || empty($_POST['description'])) {
            
            $this->errors .= 'Заполните все поля ниже,';
            return;
        }
        return;
    }
    
	//определяет доступные типы файлов
    private function checkImage($fileType, $fileName) {
        //$fileName == '' означает что файл и вовсе не был загружен, поэтому не проверять тип даных
        if($fileName == '' || ($fileType == 'image/jpeg' || $fileType == 'image/gif' || $fileType == 'image/png')) {
            return;
        }
        $this->errors .= 'Вы загрузили изображение с недоступным типом даных,';
        return;
    }
    
	//проверяет на успешность сохранения изображения
    private function checkCopyFile() {
        //копирование файла из временной директории в постоянную
        if(@copy($_FILES['picture']['tmp_name'], 'images/' . $_FILES['picture']['name'])) {
            return;
        }
        
        $this->errors .= 'Ошибка загрузки файла,';
        return;
    }
    
    private function checkImageNameLength($fileName) {
         if(strlen($fileName) < 50) {
             return;
         } 
        
        $this->errors .= 'Слишком большое имя изображения,';
        return;
    }
}