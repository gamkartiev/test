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
                            //Не забыть изменить ip1/ip2/ip3 с int на unsigned int!!
        return $link;
    }


    function users($link){
        //Вывод всех аккаунтов для админки
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
    
    function user($link, $login, $password){
        //Вывод аккаунта если совпадают логин и пароль

        $query = 'SELECT*FROM users WHERE login="'.$login.'" AND password="'.$password.'"';
        $result = mysqli_query($link, $query); //ответ базы запишем в переменную $result
            if(!$result) die(mysqli_error($link));

        $user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP

        return $user;
    }
?>
