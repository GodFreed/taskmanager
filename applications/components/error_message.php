<?//скрипт для вывода ошибок подключаемый в файлах create_task_view.php и login_view
$errors = explode(',', $_COOKIE['errors']);
array_pop($errors);
if($errors[0] != '') {
    echo '<div class="alert alert-danger"><ul>';
        foreach($errors as $error) {
        echo '<li>'.$error.'</li>';
    }
    echo '</ul></div>';
}
unset($errors);
?>