<?php
    define('MYSQL_SERVER', 'localhost');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', '');
    define('MYSQL_DB', 'test');

    function db_connect(){
        $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die("Error: ".mysqli_error($link));
        
        if(!mysqli_set_charset($link, "utf8")){
            printf("Error: ".mysqli_error($link));
        }
        
        return $link;
    }


    function users($link){

        //Запрос
        $query = "SELECT * FROM users ";
        $result = mysqli_query($link, $query);

        if(!$result) die(mysqli_error($link));

        //Извлечение из БД
        $n = mysqli_num_rows($result);   //Общее число строк
        $users = array();             //Создание пустого массива

        for ($i=0; $i<$n; $i++) { 
            $row = mysqli_fetch_assoc($result);  //
            $users[] = $row;                  //Запись в массив $articles всех данных из $row
        }
        return $users;                       
    }
    /*if ($user['login']==$login and $user['password']==$password and $ip_local==$user['ip1']||$user['ip2']||$user['ip3']) {
                echo "Вы успешно авторизировались";
            }elseif ($user['login']==$login and $user['password']==$password and $ip_local!=$user['ip1']||$user['ip2']||$user['ip3']) {
                echo "Ваш ip-адресс не найден";
            }else{
                echo "Неверная комбинация логина-пароля";
            }
    */
?>