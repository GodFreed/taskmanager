<div class="panel panel-default">
    <div class="panel-heading text-center"><h3>Задача</h3></div>
    <div class="panel-body">
        <p>Имя: <? echo $data['name']; ?></p>
        <p>Email: <? echo $data['email']; ?></p>
        <p>Cтатус: <? echo $data['status']; ?></p>
        <img src="/<? echo $data['picture']; ?>" class="img-responsive img-thumbnail col-md-3">
        <div class="col-md-9 text-center">
            <p><? echo $data['description']; ?></p>
        </div>
    </div>
</div>