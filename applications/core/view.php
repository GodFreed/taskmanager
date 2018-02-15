<?
class View 
{
	public function generateView($template_view, $content_view, $data = null) {
		require_once "applications/views/".$template_view;
	}
}