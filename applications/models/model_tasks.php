<?
class ModelTasks extends Model 
{
    public function getTasks() {
        $resultSet = $this->pdo->query("SELECT * FROM tasks")->fetchAll();
        
		return $resultSet;
	}
    
	public function deleteTask($id_task) {
        $stmt = $this->pdo->prepare("DELETE FROM `tasks` WHERE `id_task` = ?");
        $stmt->execute([$id_task]);
        
        return;
	}
    
    public function saveTask() {
		//в базе данных будет храниться путь к картинке для html атрибута src
        $pictureSrc = 'images/'. $_FILES['picture']['name'];

        $stmt = $this->pdo->prepare("INSERT INTO tasks (name, email, picture, description) VALUES (?, ?, ?, ?)");
        $stmt->execute([ $_POST['name'], $_POST['email'], $pictureSrc, $_POST['description']]);
        
        return;
	}
    
    public function getTask($id_task) {
        $stmt = $this->pdo->prepare("SELECT * FROM `tasks` WHERE `id_task` = ?");
        $stmt->execute([$id_task]);
        
        return $stmt->fetch();
    }
    
    public function editTask($id_task) {
        $stmt = $this->pdo->prepare("UPDATE `tasks` SET `status` = ?, `description` = ? WHERE `tasks`.`id_task` = ?");
        $stmt->execute([$_POST['status'], $_POST['description'], $id_task]);
        
        return;
    }
}
