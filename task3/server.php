<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $bills = test_input($_POST["bills"]);
    $sum = test_input($_POST["sum"]);
}

$bills = explode(',', $bills);
sort($bills);
array_unique($bills);

$originBills = $bills;
$originSum = $sum;

while(count($bills) != 0)
{
    $denomination = $bills[count($bills) - 1];

    $number = floor($sum / $denomination);
    $response[$denomination] = $number;

    $sum = $sum % $denomination;
    array_pop($bills);
}

if ($sum != 0) 
{
    $response = [
        "isCorrectSum" => false,
        "first" => $originSum - $sum, 
        "second" => $originSum - $sum + min($originBills)
    ];
    
    $json = json_encode($response);
    echo $json;
} else 
{
    $response["isCorrectSum"] = true;
    $json = json_encode($response);
    echo $json;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>