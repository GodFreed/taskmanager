<?//скрипт для выхода с аккаунта
session_start();
if($_SESSION['admin'] == true) {//проверка статуса авторизации
    session_destroy();//уничножение сессии
}
//переход после окончания работы скрипта
header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
    