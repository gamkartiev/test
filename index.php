<html>
<head>
	<title>Test</title>
</head>
<body>
	<form action='index.php' method='post'>
		<input name='login'>
		<input name='password' type='password'>
		<input type='submit' value='Отправить'>
	</form>



<?php 
error_reporting(E_ALL);
$ip_local=$_SERVER['REMOTE_ADDR'];
$ip_local = ip2long($ip_local);  //Переводим ip-адресс в целое число

require_once ("database.php");

$link = db_connect();
$users = users($link);

//Если форма авторизации отправлена...
	if ( !empty($_REQUEST['password']) and !empty($_REQUEST['login']) ) {
		//Пишем логин и пароль из формы в переменные (для удобства работы):
		$login = $_REQUEST['login'];
		$password = $_REQUEST['password'];

		/*
			Формируем и отсылаем SQL запрос:
			ВЫБРАТЬ ИЗ таблицы_users ГДЕ поле_логин = $login И поле_пароль = $password.
		*/
		$query = 'SELECT*FROM users WHERE login="'.$login.'" AND password="'.$password.'"';
		$result = mysqli_query($link, $query); //ответ базы запишем в переменную $result

		$user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP
		//$ip = $user['ip1'];


		//Если база данных вернула не пустой ответ - значит пара логин-пароль правильная
		if (!empty($user) and in_array($ip_local, $user)) {
			echo "$user[login] Вы успешно авторизировались";
			include "admin.php";	
			//Пользователь прошел авторизацию, выполним какой-то код.
		} elseif (!empty($user) and $ip_local!=$user['ip1']||$user['ip2']||$user['ip3']) //Пользователь все верно ввел, но не запрещенный ip-адрес
		 {
			echo $ip_local;
			echo "Вход для Вашего адреса не разрешен";
		}
		else {
			//Пользователь неверно ввел логин или пароль, выполним какой-то код.
			echo "Неверная комбинация логина-пароля";
		}
	}

 ?>
</body>
</html>