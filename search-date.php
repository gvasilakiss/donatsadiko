<?php include ("redirect_login.php"); ?>

<?php ob_start(); ?>
<?php include ("dbconnect.php"); ?>
<!DOCTYPE html>
<html>

<head>
     <title>Search Donut</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=f1d2fef1b7b619906014980fa4fbbe13">

     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
          integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
     </script>
     <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>

<body>
     <?php include ('nav.php') ?>
     <br /><br />
     <div class="container">
          <h3 style="text-align: center;">Order Data</h3><br />
          <div class="col-md-3">
               <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
          </div>
          <div class="col-md-3">
               <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
          </div>
          <div class="col-md-5">
               <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />
          </div>
          <div style="clear:both"></div>
          <br />
          <div id="order_table">
               <table class="table table-bordered table-dark table-striped">
                    <tr>
                         <th width="5%">ID</th>
                         <th width="30%">Order Name</th>
                         <th width="15%">Sprinkles</th>
                         <th width="15%">Chocolate</th>
                         <th width="15%">Caramel</th>
                         <th width="15%">Raspberry</th>
                         <th width="15%">Strawberry</th>
                         <th width="15%">Blueberry</th>
                         <th width="15%">Total Cost</th>
                         <th width="15%">Order Date</th>
                         <th width="15%">Customer Name</th>
                    </tr>
                    <?php  
                        $sql = $conn ->prepare("SELECT Order_ID, Order_Name, sprinkles, chocolate, caramel, raspberry, strawberry, blueberry, Total_Price, Order_Date, User_ID FROM donut ORDER BY Order_ID");
                        $sql -> execute();
                     while($row = $sql->fetch())  
                     {  
                     ?>
                    <tr>
                         <td><?php echo $row["Order_ID"]; ?></td>
                         <td><?php echo $row["Order_Name"]; ?></td>
                         <td><?php echo $row["sprinkles"]; ?></td>
                         <td><?php echo $row["chocolate"]; ?></td>
                         <td><?php echo $row["caramel"]; ?></td>
                         <td><?php echo $row["raspberry"]; ?></td>
                         <td><?php echo $row["strawberry"]; ?></td>
                         <td><?php echo $row["blueberry"]; ?></td>
                         <td><?php echo $row["Total_Price"]; ?></td>
                         <td><?php echo $row["Order_Date"]; ?></td>
                         <td><?php echo $row["User_ID"]; ?></td>
                    </tr>
                    <?php  
                     }  
                     ?>
               </table>
          </div>
     </div>
</body>

</html>
<script>
     $(document).ready(function () {
          $.datepicker.setDefaults({
               dateFormat: 'yy-mm-dd'
          });
          $(function () {
               $("#from_date").datepicker();
               $("#to_date").datepicker();
          });
          $('#filter').click(function () {
               var from_date = $('#from_date').val();
               var to_date = $('#to_date').val();
               if (from_date != '' && to_date != '') {
                    $.ajax({
                         url: "filter.php",
                         method: "POST",
                         data: {
                              from_date: from_date,
                              to_date: to_date
                         },
                         success: function (data) {
                              $('#order_table').html(data);
                         }
                    });
               } else {
                    alert("Please Select Date");
               }
          });
     });
</script>