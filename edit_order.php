<?php include ("dbconnect.php"); ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=f1d2fef1b7b619906014980fa4fbbe13">

    <?php
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST') //has the user submitted the form and edited the order
            {
                
                //1. Save the value of the ID of the order by obtaining it from the hidden field in the form
                $order_id = $_POST['Order_ID'];
                
                //2. TODO Save the POST values of the form to local variables to use in the UPDATE statement
                
                $order_name = $_POST['order_name'];
                $sprinkles = $_POST['Sprinkles'];
                $chocolate = $_POST['Chocolate'];
                $caramel = $_POST['Caramel'];
                $raspberry = $_POST['Raspberry'];
                $strawberry = $_POST['Strawberry'];
                $blueberry = $_POST['Blueberry'];

                //3. Perform total price calculation with new values
                
                //Doughnut prices

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

                // Calculate total prices
                $sprinkles_total = ($sprinkles * $sprinkles_price);
                $chocolate_total = ($chocolate * $chocolate_price);
                $caramel_total = ($caramel * $caramel_price);
                $raspberry_total = ($raspberry * $raspberry_price);
                $strawberry_total = ($strawberry * $strawberry_price);
                $blueberry_total = ($blueberry * $blueberry_price);

                // Calculate total price
                $total_price = $sprinkles_total + $chocolate_total + $caramel_total + $raspberry_total + $strawberry_total + $blueberry_total;

                $total_price = number_format($total_price, 2);

                // Total donuts 
                //echo "number of doughnuts ". $total. "<br>";
            

                if ($total != 12) {
                    echo '<script type="text/javascript">';
                    echo 'swal("Oops, you might have forgot some donuts", "You cant place an order for more or less than 12 donuts!", {
                        icon: "error",
                   });';
                    echo '</script>';
                    
                    exit();

                } 
                
                else {
                   
                    $order_id = $_POST['Order_ID'];

                    $total_price = $strawberry_total + $chocolate_total + $caramel_total + $raspberry_total + $strawberry_total + $blueberry_total;

                    $total_price = number_format($total_price, 2); // round to two decimal places

                   // echo "got here";
                   // echo $order_id;
                    
                    //4. TODO Complete the UPDATE statement to include all of the fields
                    $sql = $conn->prepare("UPDATE donut SET Order_Name = ?, sprinkles = ?, chocolate = ?, caramel = ?, raspberry = ?, strawberry = ?, blueberry = ?, Total_Price = ? WHERE Order_ID = ? ");
                    
                    //5. TODO Bind the rest of the values needed
                    $sql -> bindValue(1, "$order_name"); //we bind this variable to the first ? in the sql statement
                    $sql -> bindValue(2, "$sprinkles"); //we bind this variable to the second ? in the sql statement
                    $sql -> bindValue(3, "$chocolate");
                    $sql -> bindValue(4, "$caramel");
                    $sql -> bindValue(5, "$raspberry");
                    $sql -> bindValue(6, "$strawberry");
                    $sql -> bindValue(7, "$blueberry");
                    $sql -> bindValue(8, $total_price);
                    // $sql -> bindValue(9, $Date);
                    $sql -> bindValue(9, $order_id);

                   // $sql -> debugDumpParams();

                    $sql -> execute(); //execute the statement
                    
                    // debug
                    
                    //6. TODO Display a message to the user to say UPDATE has been successful

                    echo '
                        <script type="text/javascript">

                        $(document).ready(function(){

                        swal({
                            icon: "success",
                            title: "Order update was successfully",
                            text: "New Total Price: '.$total_price.' " ,
                        }).then(function() {
                            // Redirect the user
                            window.location.href = "all.php";
                        })
                        });

                        </script>
                    ';
                   
                }
            }
            else{

                //SELECT part
                
                //1. TODO Save the value of the ID of the order by obtaining it from the URL via GET request
                $order_id = $_GET['Order_ID'];
                
                //2. TODO Create an SQL statement that SELECTS all from an order table where the order id equals the order we have just saved
                
                $sql = $conn ->prepare("SELECT Order_ID, Order_Name, sprinkles, chocolate, caramel, raspberry, strawberry, blueberry FROM donut WHERE Order_ID = ?");

                //3. Bind the values to the SQL statement
                $sql -> bindValue(1, $order_id); //we bind this variable to the first ? in the sql statement

                $sql -> execute(); //execute the statement

                //results from the query are assigned to a $row array
                $row = $sql->fetch();

                //4. TODO echo the values of the $row array inside the form so you can populate the input boxes with existing values
                
                include "edit_order_form.php";
            }
            
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
            }
        ?>