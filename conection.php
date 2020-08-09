<?php ob_start(); ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=f1d2fef1b7b619906014980fa4fbbe13">

<?php include ('dbconnect.php') ?>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){ //has the user submitted the form


                    if(empty($_POST["order_name"]) && strlen($_POST["order_name"]) == 0 || empty($_POST["Sprinkles"]) && strlen($_POST["Sprinkles"]) == 0 || empty($_POST["Chocolate"]) && strlen($_POST["Chocolate"]) == 0 || empty($_POST["Caramel"]) && strlen($_POST["Caramel"]) == 0 || empty($_POST["Raspberry"]) && strlen($_POST["Raspberry"]) == 0 || empty($_POST["Strawberry"]) && strlen($_POST["Strawberry"]) == 0 || empty($_POST["Blueberry"]) && strlen($_POST["Blueberry"]) == 0)  
                    {  
                        echo '
                        <script type="text/javascript">
                
                        $(document).ready(function(){
                
                        swal({
                            icon: "error",
                            title: "Oups, something is missing!",
                            text: "Check again for missing input"
                        })
                        });
                
                        </script>
                ';  
                    } 
                    else{
//dummy form data to insert into the database - imagine this was sent from a HTML form submission using POST method
$order_name = $_POST['order_name'];
$sprinkles = $_POST['Sprinkles'];
$chocolate = $_POST['Chocolate'];
$caramel = $_POST['Caramel'];
$raspberry = $_POST['Raspberry'];
$strawberry = $_POST['Strawberry'];
$blueberry = $_POST['Blueberry'];

// get user id
$user_id = $_SESSION["user_mail"];


// Declare Variables
$sprinkles_price = 1;
$chocolate_price = 1.20;
$caramel_price = 1;
$raspberry_price = 0.80;
$strawberry_price = 0.80;
$blueberry_price = 0.80;

// Calculate total items
$total = $sprinkles + $chocolate + $caramel + $raspberry + $strawberry + $blueberry;

// Get Current date function
$Date = Date("Y/m/d");

$sprinkles_total = ($sprinkles * $sprinkles_price);
$chocolate_total = ($chocolate * $chocolate_price);
$caramel_total = ($caramel * $caramel_price);
$raspberry_total = ($raspberry * $raspberry_price);
$strawberry_total = ($strawberry * $strawberry_price);
$blueberry_total = ($blueberry * $blueberry_price);

// Calculate total price
$total_price = $sprinkles_total + $chocolate_total + $caramel_total + $raspberry_total + $strawberry_total + $blueberry_total;

$total_price = number_format($total_price, 2);

if($total == 12){

$sql = "INSERT INTO donut (Order_Name, sprinkles, chocolate, caramel, raspberry, strawberry, blueberry, Total_Price, Order_Date, User_ID) VALUES ('$order_name', '$sprinkles', '$chocolate', '$caramel', '$raspberry', '$strawberry', '$blueberry', '$total_price', '$Date', '$user_id')";

// use exec() because no results are returned
$conn->exec($sql);
$last_id = $conn->lastInsertId();

echo '
    <script type="text/javascript">

    $(document).ready(function(){

    swal({
        icon: "success",
        title: "Order was placed successfully",
        text: "Total Donuts: 12",
        text: "Total Price: '.$total_price.' " ,
    })
    });

    </script>
';
//echo "Ordered donuts successfully, Last ID inserted: ID ". $last_id . '<br>';  // If successful we will see this
//echo "Total Items: " . $total . '<br>';
//echo "Total Price: " . $total_price;
}

else{
echo '
<script type="text/javascript">

$(document).ready(function(){

swal({
    icon: "error",
    title: "Oups, you reached the limit of 12 donuts",
    text: "You are allowed to place an order only for 12 donuts!"
})
});

</script>
';
}

}
} 
else{
    echo '
<script type="text/javascript">

$(document).ready(function(){



</script>
';
} 
?>