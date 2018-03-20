<?
class Controller 
{
	protected $model;
	protected $view;
	
	public function __construct(Model $model = null) {//внедрение зависимости
		$this->view = new View();
        
        //создание объекта для работы с БД, подключённой в route.php модели
        if($model !== null) {
            $this->model = new $model();
        }
	}
}