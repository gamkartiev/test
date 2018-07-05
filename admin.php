<html>
<head>
	<title>table</title>
	<link rel="stylesheet" href="main.css">
	<meta charset="utf-8">
</head>
<body>

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
  		<td> <?=$a['login'] ?> </td>
  		<td> <?=$a['password'] ?> </td>
  		<td> <?=$a['ip1'] ?> </td>
  		<td> <?=$a['ip2'] ?> </td>
  		<td> <?=$a['ip3'] ?> </td>
  	</tr>
  <?php endforeach ?>
</table>
</body>	
</html>