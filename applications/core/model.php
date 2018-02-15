<?
class Model 
{
	protected $pdo;
	
	public function __construct() {
		//подключение используемое всеми дочерними классами
		$this->pdo = new PDO("mysql:host=127.0.0.1;dbname=taskmanager;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	}
}