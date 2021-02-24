<?php
$host = 'localhost'; 
$database = 'amasty'; 
$user = 'root'; 
$password = ''; 

$startSum = 100;

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
 
    // b)
    $SQL1 ="SELECT persons.fullname, transactions.amount FROM persons, transactions
             WHERE persons.id = transactions.from_person_id AND persons.id = 1";

    $result1 = mysqli_query($link, $SQL1);
    $row = $result->fetch_assoc();

    $balance = $startSum - $row['amount'];
    print("Имя: " . $row['fullname'] . "; Баланс: " . $balance . "<br>");

    // c)

    // d)
     
// закрываем подключение
mysqli_close($link);


?>