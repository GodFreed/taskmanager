<table>
<tr>
	<th>Имя</th>
	<th>email</th>
</tr>
<?
foreach($data as $row) {
	echo "<tr>".
			"<td>".$row["name"]."</td>".
			"<td>".$row["email"]."</td>".
		"</tr>";
}
?>
</table>