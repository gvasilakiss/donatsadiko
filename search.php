<?php include ("redirect_login.php"); ?>

<?php ob_start(); ?>
<?php include ("dbconnect.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Search Donut</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=f1d2fef1b7b619906014980fa4fbbe13">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Check to see if a user is an admin -->
    <?php if($_SESSION["user_type"] == "Admin") : ?>
    <?php include ('nav.php') ?>
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Search Order (by Name): <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form>
    <br>

    <?php
    $query = $_POST['query']; 
    // gets value sent over search form
     
        $sql = "SELECT * FROM `donut` WHERE `Order_Name` = '$query'";
         
            foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                echo "<table border='1'>
                <tr>
                <th>Order ID</th>
                <th>Order Name</th>
                <th>Field 1</th>
                <th>Field 2</th>
                <th>Field 3</th>
                <th>Field 4</th>
                <th>Field 5</th>
                <th>Field 6</th>

                </tr>";
                echo "<tr>";
                echo  "<td>" . $row['Order_ID'] . '<br>' . "</td>";
                echo  "<td>" . $row['Order_Name'] . '<br>' . "</td>";
                echo  "<td>" . $row['field1'] . '<br>' . "</td>";
                echo  "<td>" . $row['field2'] . '<br>' . "</td>";
                echo  "<td>" . $row['field3'] . '<br>' . "</td>";
                echo  "<td>" . $row['field4'] . '<br>' . "</td>";
                echo  "<td>" . $row['field5'] . '<br>' . "</td>";
                echo  "<td>" . $row['field6'] . '<br>' . "</td>";
                echo "</tr>";
            }
            echo "</table>";
?>

    <br>
    <br>

    <?php

$sql= "SELECT Order_Name, Order_ID FROM donut order by Order_Name"; 

echo "<select name=student value=''>Orders</option>"; 

echo "DropDown"; 
foreach ($conn->query($sql, PDO::FETCH_ASSOC) as $row){


echo "<option value=$row[Order_ID]>$row[Order_Name]</option>"; 

}

 echo "</select>";// Closing of list box
?>
    </select>
    <?php else:                     echo '
                        <script type="text/javascript">

                        $(document).ready(function(){

                        swal({
                            icon: "warning",
                            title: "Oups, something is wrong!",
                            text: "You are here by mistake, sending you back to your account area" ,
                        }).then(function() {
                            // Redirect the user
                            window.location.href = "myaccount.php";
                        })
                        });

                        </script>
                    ';?>
    <?php endif ?>
</body>

</html>