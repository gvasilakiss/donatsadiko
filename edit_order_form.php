<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=f1d2fef1b7b619906014980fa4fbbe13">

    <link rel="stylesheet" href="style.css">

    <title>Update Order</title>
</head>

<body>
    <div class="text-center">
        <form action="<?php echo htmlspecialchars($_SERVER["edit_order.php"]);?>" method="POST">
            <h1>Modify Order</h1>
            <br>
            <label for="Name">Order Name</label>
            <input class="form-control" type="text" id="order_name" name="order_name"
                value="<?php echo $row['Order_Name'];?>"> <br>

            <label for="Sprinkles">Sprinkles - £1 </label>
            <input class="form-control" type="number" id="Sprinkles" name="Sprinkles"
                value="<?php echo $row['sprinkles'];?>"> <br>

            <label for="Chocolate">Chocolate - £1.20</label>
            <input class="form-control" type="number" id="Chocolate" name="Chocolate"
                value="<?php echo $row['chocolate'];?>"> <br>

            <label for="Caramel">Caramel - £1</label>
            <input class="form-control" type="number" id="Caramel" name="Caramel" value="<?php echo $row['caramel'];?>">

            <label for="Raspberry">Raspberry - 80p</label>
            <input class="form-control" type="number" id="Raspberry" name="Raspberry"
                value="<?php echo $row['raspberry'];?>"> <br>

            <label for="Strawberry">Strawberry - 80p</label>
            <input class="form-control" type="number" id="Strawberry" name="Strawberry"
                value="<?php echo $row['strawberry'];?>"> <br>

            <label for="Blueberry">Blueberry - 80p </label>
            <input class="form-control" type="number" id="Blueberry" name="Blueberry"
                value="<?php echo $row['blueberry'];?>"> <br>

            <input type="hidden" name="Order_ID" value="<?php echo $row['Order_ID'];?>">

            <input class="btn btn-primary btn-lg" type="submit" value="Update Order">

        </form>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>