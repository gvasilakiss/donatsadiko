<?php include ("redirect_login.php"); ?>
<?php ob_start(); ?>
<?php include ("dbconnect.php"); ?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=, initial-scale=1.0">
     <title>Summary of all orders</title>

     <!-- CSS Files -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=f1d2fef1b7b619906014980fa4fbbe13">
     <link rel="stylesheet" href="style.css">

     <!-- JS Files -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
</head>

<body>
     <!-- Check to see if a user is an admin -->
     <?php if($_SESSION["user_type"] == "Admin") : ?>
     <?php include ('nav.php') ?>
     <br /><br />
     <div class="container-fluid">
          <h1 style="text-align: center;">Summary of all orders</h1><br />
          <div id="order_table">

               <div class="text-center">
                    <label for="liveSearchOrders">Search orders by name</label>
               </div>
               <input type="text" class="form-control" id="liveSearchOrders" placeholder="Enter order name"><br>

               <div class="table-responsive-xl">
                    <table class="table table-bordered table-dark table-striped">
                         <thead class="thead-dark">
                              <tr>
                                   <th scope="col">ID</th>
                                   <th scope="col">Order Name</th>
                                   <th scope="col">Sprinkles</th>
                                   <th scope="col">Chocolate</th>
                                   <th scope="col">Caramel</th>
                                   <th scope="col">Raspberry</th>
                                   <th scope="col">Strawberry</th>
                                   <th scope="col">Blueberry</th>
                                   <th scope="col">Total Cost</th>
                                   <th scope="col">Order Date</th>
                                   <th scope="col">Customer Name</th>
                                   <th scope="col">Modify Order</th>
                                   <th scope="col">Delete Order</th>
                              </tr>
                         </thead>
                         <?php  
                        $sql = $conn ->prepare("SELECT Order_ID, Order_Name, sprinkles, chocolate, caramel, raspberry, strawberry, blueberry, Total_Price, Order_Date, User_ID FROM donut ORDER BY Order_ID");
                        $sql -> execute();
                     while($row = $sql->fetch())  
                     {   
                     ?>
                         <tbody id="allOrders" class="table table-bordered table-dark table-striped">
                              <tr id="<?php echo $row["Order_ID"]; ?>">

                                   <td><?php echo $row["Order_ID"]; ?></td>
                                   <td><?php echo $row["Order_Name"]; ?></td>
                                   <td><?php echo $row["sprinkles"]; ?></td>
                                   <td><?php echo $row["chocolate"]; ?></td>
                                   <td><?php echo $row["caramel"]; ?></td>
                                   <td><?php echo $row["raspberry"]; ?></td>
                                   <td><?php echo $row["strawberry"]; ?></td>
                                   <td><?php echo $row["blueberry"]; ?></td>
                                   <td>&pound<?php echo $row["Total_Price"]; ?></td>
                                   <td><?php echo $row["Order_Date"]; ?></td>
                                   <td><?php echo $row["User_ID"]; ?></td>

                                   <td><?php echo '<a href="edit_order.php?Order_ID='.$row["Order_ID"].'" class="btn btn-outline-primary" type="submit" value="Update"><i class="fa fa-wrench"></i>'?>Modify
                                        Order</td>
                                   <td><?php echo '<a class="btn btn-outline-danger remove_order" type="submit" id="'.$row["Order_ID"].'" value="Delete"><i class="fa fa-trash"></i>'?>Delete
                                   </td>
                              </tr>
                         </tbody>
                         <?php  
                     }  
                     ?>
                    </table>
               </div>
               <br><br>
               <input type="hidden" name="Order_ID" value="<?php echo $row['Order_ID'];?>">
          </div>
     </div>

     <!-- If the user is admin show more details -->
     <?php if($_SESSION["user_type"] == "Admin") : ?>
     <h1 style="text-align: center;">Statistics for store</h1><br />
     <?php

// Get total revenue

$stmt = $conn->prepare("SELECT SUM(Total_Price) AS revenue_sum FROM donut");
$stmt->execute();

// Declare global variable
$revenue;

for($i=0; $rows = $stmt->fetch(); $i++){
    $revenue = $rows['revenue_sum'];
    }
?>
     <?php

// Get total orders

$stmt = $conn->prepare("SELECT COUNT(*) as total_orders FROM donut");
$stmt->execute();

// Declare global variable
$total_orders;

for($i=0; $rows = $stmt->fetch(); $i++){
    $total_orders = $rows['total_orders'];
    }
?>
     <?php

// Get total customers number

$stmt = $conn->prepare("SELECT COUNT(*) as total_customers FROM users WHERE user_type = 'Customer' ");
$stmt->execute();

// Declare global variable
$total_customers;

for($i=0; $rows = $stmt->fetch(); $i++){
    $total_customers = $rows['total_customers'];
    }
?>


     <?php

// Get highest and lowest number

$query_ = $conn->prepare("SELECT 
SUM(`sprinkles`) as 'sprinkles_sum',
SUM(`chocolate`) as 'chocolate_sum',
SUM(`caramel`) as 'caramel_sum',
SUM(`raspberry`) as 'raspberry_sum',
SUM(`strawberry`) as 'strawberry_sum',
SUM(`blueberry`) as 'blueberry_sum'
FROM donut");

$query_->execute();

// Declare global variable
$sprinkles_sum;
$chocolate_sum;
$caramel_sum;
$raspberry_sum;
$strawberry_sum;
$blueberry_sum;

for($i=0; $rows = $query_->fetch(); $i++){
     $sprinkles_sum = $rows['sprinkles_sum'];
     $chocolate_sum = $rows['chocolate_sum'];
     $caramel_sum = $rows['caramel_sum'];
     $raspberry_sum = $rows['raspberry_sum'];
     $strawberry_sum = $rows['strawberry_sum'];
     $blueberry_sum = $rows['blueberry_sum'];
    }

    // Array to be sorted
    $arr = array('Sprinkles' => $sprinkles_sum, 'Chocolate' => $chocolate_sum, 'Caramel' => $caramel_sum, 'Raspberry' => $raspberry_sum, 'Strawberry' => $strawberry_sum, 'Blueberry' => $blueberry_sum);

    // Bubble Sort Algorithm
    function bubbleSort(array $array) {
     $array_size = count($array);
     for($i = 0; $i < $array_size; $i ++) {
         for($j = 0; $j < $array_size; $j ++) {
             if ($array[$i] < $array[$j]) {
                 $tem = $array[$i];
                 $array[$i] = $array[$j];
                 $array[$j] = $tem;
             }
         }
     }
     return $array;
 }

// Comparison function
 function cmp($a, $b) {
     if ($a == $b) {
         return 0;
     }
     return ($a < $b) ? -1 : 1;
 }

// Sorts array
//$arr = bubbleSort($arr);

// Sort array with a user-defined comparison function and maintain index association
uasort($arr, 'cmp');

echo("After sorting by using bubble sort");
echo "<br>";

print_r($arr);

?>


     <div class="container">
          <div class="row">
               <div class="col-sm">
                    <div id="canvas-holder" style="width:100%">
                         <canvas id="statisticsChart"></canvas>
                         <br><br>
                    </div>
               </div>

               <div class="col-sm">
                    <div id="canvas-holder" style="width:100%">
                         <canvas id="moneyChart"></canvas>
                    </div>
               </div>
          </div>
     </div>

     <!--
     <div class="container">
          <div class="row">
               <div class="col-sm">
                    <?php echo  "<h1> Total Users: " . $total_customers . "</h1>"; ?>
               </div>
          </div>
     </div>

     <div class="container">
          <div class="row">
               <div class="col-sm">
                    <?php echo  "<h1> Total Orders: " . $total_orders . "</h1>"; ?>
               </div>
          </div>
     </div>

     <div class="container">
          <div class="row">
               <div class="col-sm">
                    <?php echo  "<h1> Total Revenue: " . intval($revenue) . "&pound" . "</h1>"; ?>
               </div>
          </div>
     </div>
-->

     <script>
          var users = "<?php echo $total_customers ?>";
          var totalOrders = "<?php echo $total_orders ?>";
          var ctx = document.getElementById('statisticsChart').getContext('2d');
          var myChart = new Chart(ctx, {
               type: 'bar',
               data: {
                    labels: ['Total Customers', 'Total Orders'],
                    datasets: [{
                         label: 'Statistics',
                         data: [users, totalOrders],
                         backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                         ],
                         borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                         ],
                         borderWidth: 1
                    }]
               },
               options: {
                    scales: {
                         yAxes: [{
                              ticks: {
                                   beginAtZero: true
                              }
                         }]
                    }
               }
          });
     </script>

     <script>
          var revenueTotal = "<?php echo intval($revenue) ?>";
          var ctx = document.getElementById('moneyChart').getContext('2d');
          var myChart = new Chart(ctx, {
               type: 'doughnut',
               data: {
                    labels: ['Total Revenue (£)'],
                    datasets: [{
                         data: [revenueTotal],
                         backgroundColor: [
                              'rgba(153, 102, 255, 0.2)'
                         ],
                         borderColor: [
                              'rgba(153, 102, 255, 1)'
                         ],
                         borderWidth: 1
                    }]
               },
               options: {
                    scales: {
                         yAxes: [{
                              ticks: {
                                   beginAtZero: true
                              }
                         }]
                    }
               }
          });
     </script>


     <!-- Else show nothing -->
     <?php else :?>
     <?php endif ?>


     <!-- Else show error message -->
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

     <!-- Core JS Files -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="assets/js/remove-order.js"></script>

     <!-- JS Script to Filter Live Search Orders -->
     <script>
          $(document).ready(function () {
               $("#liveSearchOrders").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#allOrders tr").filter(function () {
                         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
               });
          });
     </script>

</body>

</html>