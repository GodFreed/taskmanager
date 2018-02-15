<?//файл динамической навигации
//не отображать ссылку на вход если пользователь уже вошёл или находиться на странице входа
    if(!isset($_SESSION['admin']) && 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] != 'http://taskmanager/login')  echo '<li><a href="/auth/login">Вход</a></li>';
//не отображать ссылку на выход если пользователь не авторизован
    if(isset($_SESSION['admin'])) echo '<li><a href="/auth/logout">Выход</a></li>';
?>