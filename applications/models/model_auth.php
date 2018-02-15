<?
class ModelAuth extends Model 
{
	public function getUser($login, $password) {
        $stmt = $this->pdo->prepare("SELECT login FROM `users` WHERE `login`=? AND `password`=MD5(?)");
        
        $stmt->execute([$login, $password]);
        //возращает результат который в случае успеха == login, иначе == false
        return $stmt->fetch();
	}
}
