<?php include ("dbconnect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Doughnut Delete Order</title>
</head>

<body>
<?php

$order_id = $_GET['Order_ID'];

try{
    $sql = $conn ->prepare("DELETE FROM `donut` WHERE `Order_ID`= $order_id");
    $sql -> execute();
    echo "<h1>Order Deleted </h1>";
}
catch(PDOException $e)
{
echo $sql . "<br>" . $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
}


?>

</body>

</html>