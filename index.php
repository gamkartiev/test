<html>
<title>Тестовое задание доделанное</title>
<link rel="stylesheet" href="main.css">
<body>
<a href="index.php" class="link"> На главную </a>
	<?php 
error_reporting(E_ALL);
$ip_local=$_SERVER['REMOTE_ADDR'];
$ip_local = sprintf('%u', ip2long($ip_local));  //Переводим ip-адресс в целое число

require_once ("database.php");
$link = db_connect();
$users = users($link);  //Функция для вывода всех данных при загрузки админки


if(isset ($_POST['login']) and ($_POST['password'])){	//Если значения login и password установлены, то...
	$login = $_POST['login'];
	$password = $_POST['password'];
	$user = user($link, $login, $password);				//...Вызываем функцию, которая вытащит соответствующий аккаунт

	if(!empty($user) and in_array($ip_local, $user)){   //Если переменная не пуста и ip с компьютера сходится с указанным в базе, то...
		include "admin.php";							//..подключаем админку с таблицей инфы про юзеров,а если нет и...
	} elseif(!empty($user)){							// ..если переменная не пуста, а ip не совпадает, то выводим сообщение о заперете
		echo "Вход с вашего ip-адреса запрещен!";
	} else{
		echo "Неправильная комбинация логина-пароля";  //Если переменная юзер пуста, то выводим о неправильном логине или пароле
	}
}else{													//Если значения логин и пароль не установлены, то выводим форму для авторизации
	?>

	<form action='index.php' method='post'>
		<input name='login'> <br>
		<input name='password' type='password'> <br>
		<input type='submit' value='Отправить'>
	</form>

	<?php 
}
	 ?>
</body>
</html>
