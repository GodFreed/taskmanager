<!--вспомогательный скрипт для сортировки полей таблицы-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.29.3/js/jquery.tablesorter.min.js"></script>

<?//вывод сообщения об успешной авторизации
if($_SESSION['admin'] == true && isset($_SESSION['message'])) 
    echo '<div class="alert text-center alert-success"><p>'.$_SESSION['message'].'</p></div>';
    unset($_SESSION['message']);
?>

<br><br>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
			    <th></th>
				<th>Имя</th>
				<th>Email</th>
				<th>Описание</th>
				<th>Статус</th>
			</tr>
		</thead>
		<tbody>
<?
foreach($data as $row) {
    echo "<tr>".
            "<td>".
            "<a href='tasks/overview/".$row["id_task"]."'>".
                "<img src=".$row['picture']." class='img-responsive'>".
            "</a>".
            "</td>".
            "<td>".$row["name"]."</td>".
            "<td>".$row["email"]."</td>".
            "<td>".$row["description"]."</td>".
            "<td>".$row["status"]."<br><br>".
            "<a class='btn btn-default' href='tasks/overview/".$row["id_task"]."'>Просмотр</a>";
            if($_SESSION['admin'] == true) {//добавляем возможность удаления и изменения задачи для администратора
            echo "<br><br>".
            "<a class='btn btn-danger' href='tasks/delete/".$row["id_task"]."'>Удалить</a>".
            "<br><br>".
            "<a class='btn btn-success' href='tasks/edit/".$row["id_task"]."'>Изменить</a>";
            }
   echo "</td>".
      "</tr>";
}
?>
		</tbody>
	</table>
</div>
<script>
//запуск функции сортировки для скрипта jquery.tablesorter
$(document).ready(function() {
    $('.table').tablesorter();
});
</script>