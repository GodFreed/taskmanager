<?
class Controller404 extends Controller 
{
	public function actionShow() {
		$this->view->generateView("template_view.php", "404_view.php");
	}
}