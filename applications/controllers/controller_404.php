<?
class Controller404 extends Controller 
{
	public function actionShow() {
		$this->view->generateView("404_view.php", "Страница не найдена");
	}
}