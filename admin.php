<html>
<head>
	<title>table</title>
	<link rel="stylesheet" href="main.css">
	<meta charset="utf-8">
</head>
<body>
<h2><?php echo "$user[login]"; ?> Добро пожаловать! </h2>
<table class='table'>
  <tr>
  	<th>Логин</th>
  	<th>Пароль</th>
  	<th>ip-адрес 1</th>
  	<th>ip-адрес 2</th>
  	<th>ip-адрес 3</th>
  </tr>
  <?php foreach ($users as $a): ?>
  	<tr>
  		<td> <?= $a['login']; ?> </td>
  		<td> <?= $a['password']; ?> </td>
  		<td> <?= long2ip($a['ip1']); ?> </td>
  		<td> <?= long2ip($a['ip2']); ?> </td>
  		<td> <?= long2ip($a['ip3']); ?> </td>  
  	</tr>
  <?php endforeach ?>
</table>
</body>	
</html>
