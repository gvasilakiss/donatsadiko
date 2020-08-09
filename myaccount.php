<?php include ("redirect_login.php"); ?>
<?php ob_start(); ?>
<?php include ("dbconnect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=, initial-scale=1.0">
     <title>Summary of all orders for <?php echo $_SESSION['user_mail'] ?></title>

     <!-- CSS Files -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=f1d2fef1b7b619906014980fa4fbbe13">
     <link rel="stylesheet" href="style.css">

     <!-- JS Files -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

</head>

<body>
     <?php include ('nav.php') ?>
     <br /><br />
     <div class="container-fluid">
          <h1 style="text-align: center;">Summary of all orders for <?php echo $_SESSION['user_mail'] ?> </h1><br />
          <div id="order_table">

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
                                   <th scope="col">Modify Order</th>
                                   <th scope="col">Delete Order</th>
                              </tr>
                         </thead>
                         <?php  
                        $user_id = $_SESSION["user_mail"];

                        $sql = $conn ->prepare("SELECT Order_ID, Order_Name, sprinkles, chocolate, caramel, raspberry, strawberry, blueberry, Total_Price, Order_Date FROM donut WHERE User_ID = '$user_id' ORDER BY Order_ID");
                        $sql -> execute();
                     while($row = $sql->fetch())  
                     {   
                     ?>
                         <!-- Get ID -->
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

                              <td><?php echo '<a href="edit_order.php?Order_ID='.$row["Order_ID"].'" class="btn btn-outline-primary" type="submit"><i class="fa fa-wrench"></i>'?>Modify
                                   Order</td>
                              <td><?php echo '<a class="btn btn-outline-danger remove_order" type="submit" id="'.$row["Order_ID"].'"><i class="fa fa-trash"></i>'?>Delete
                              </td>
                         </tr>
                         <?php  
                     }  
                     ?>
                    </table>
               </div>
               <input type="hidden" name="Order_ID" value="<?php echo $row['Order_ID'];?>">
          </div>
     </div><br>

     <!-- Core JS Files -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="assets/js/remove-order.js"></script>
</body>

</html>