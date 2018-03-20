<?
//основной класс в котором происходит вся маршрутизация
class Route 
{
	public static function start() {
        //стандартные controller и action, которые будут вызваны при переходе на адреcс taskmanager/
		$controllerName = "tasks";
		$actionName = "show";
    
		$routes = explode("/", $_SERVER["REQUEST_URI"]);
        
		if(!empty($routes[1])) {
			$controllerName = $routes[1];
		}
		
		if(!empty($routes[2])) {
			$actionName = $routes[2];
		}
        
        if(!empty($routes[3])) {//если в конце адресной строки идёт идентификатор,
			$id = $routes[3];//то сохранить его в переменную
		}
		
		$modelFileName = "model_".strtolower($controllerName);
		$controllerFileName = "controller_".strtolower($controllerName);
        
        $modelName = "Model".ucfirst($controllerName);
        if($controllerName !="404") {
            $controllerName = "Controller".ucfirst($controllerName);
        } else {
            $controllerName = "Controller404";
        }
		$actionName = "action".ucfirst($actionName);
		
		$controllerPath = "applications/controllers/".$controllerFileName.".php";
		if(file_exists($controllerPath)) {
			require_once $controllerPath;
		} else {
			Route::ErrorPage404();
		}
		
		$modelPath = "applications/models/".$modelFileName.".php";
		if(file_exists($modelPath)) {
			require_once $modelPath;
		}
        
        //Использовать внедрение зависимости для передачи объета модели в контроллер
        if(class_exists($modelName)) {
            $model = new $modelName();
            $controller = new $controllerName($model);
        } else {
            $controller = new $controllerName();
        }
		
        //Вызов action-a
		if(method_exists($controller, $actionName)) {
            if(isset($id)) {
                //передать идетификатор для роута вида: domain/class/action/id
                $controller->$actionName($id);
            } else {
                $controller->$actionName();
            }
		}
	}
	
	public static function ErrorPage404() {
		$host = $_SERVER["HTTP_HOST"];
		header("Location: http://{$host}/404");
	}
}