<? 
if(isset($_COOKIE['message'])) 
    echo '<div class="alert text-center alert-success">'.$_COOKIE['message'].'</div>';
?>
<form action="/tasks/edit/<? echo $data['id_task']; ?>" method="post">
<div class="panel panel-default">
    <div class="panel-heading text-center"><h3>Задача</h3></div>
    <div class="panel-body">
        <p>Имя: <? echo $data['name']; ?></p>
        <p>Email: <? echo $data['email']; ?></p>
        <div class="form-group">
            <label for="select-list">Статус:</label>
            <br>
             <select name="status" id="select-list">
                <option value="Не определен" <? if($data['status'] == 'Не определен') echo 'selected'; ?>>Не определен</option>
                <option value="В процессе" <? if($data['status'] == 'В процессе') echo 'selected'; ?>>В процессе</option>
                <option value="Завершена" <? if($data['status'] == 'Завершена') echo 'selected'; ?>>Завершена</option>
             </select>
        </div>
        <br>
        <div class="form-group">        
        <img src="/<? echo $data['picture']; ?>" class="img-responsive img-thumbnail col-md-3">
        <div class="col-md-9">
            <textarea name="description" rows="11" class="form-control"><? echo $data['description']; ?></textarea>
        </div>
        </div>
        <div class="col-md-12 text-right">
            <br>
            <input type="submit" value="Изменить" class="btn btn-success">
        </div>
    </div>
</div>
</form>