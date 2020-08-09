<?php include ("redirect_login.php"); ?>

<?php ob_start(); ?>
<?php require_once "dbconnect.php" ?>

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

    <title>Doughnut orders</title>
</head>

<body>

    <div class="text-center">
        <?php include ('nav.php') ?>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["conection.php"]);?>" method="POST">
            <label for="Name">Order Name</label>
            <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" id="Name"
                name="order_name" value="<?php echo htmlspecialchars($name);?>" placeholder="Name">
            <span class="error"><?php echo $nameerr;?></span>

            <label for="Sprinkles">Sprinkles - £1 </label>
            <input class="form-control" type="number" min="0" inputmode="numeric" id="Sprinkles" name="Sprinkles"
                value="<?php echo htmlspecialchars($sprinkles);?>" placeholder="Sprinkles Quantity">
            <span class="error"><?php echo $sprinkleserr;?></span>


            <label for="Chocolate">Chocolate - £1.20</label>
            <input class="form-control" type="number" min="0" inputmode="numeric" id="Chocolate" name="Chocolate"
                value="<?php echo htmlspecialchars($chocolate);?>" placeholder="Chocolate Quantity">
            <span class="error"><?php echo $chocolateerr;?></span>


            <label for="Caramel">Caramel - £1</label>
            <input class="form-control" type="number" min="0" inputmode="numeric" id="Caramel" name="Caramel"
                value="<?php echo htmlspecialchars($caramel);?>" placeholder="Caramel Quantity">
            <span class="error"><?php echo $caramelerr;?></span>


            <label for="Raspberry">Raspberry - 80p</label>
            <input class="form-control" type="number" min="0" inputmode="numeric" id="Raspberry" name="Raspberry"
                value="<?php echo htmlspecialchars($raspberry);?>" placeholder="Raspberry Quantity">
            <span class="error"><?php echo $raspberryerr;?></span>


            <label for="Strawberry">Strawberry - 80p</label>
            <input class="form-control" type="number" min="0" inputmode="numeric" id="Strawberry" name="Strawberry"
                value="<?php echo htmlspecialchars($strawberry);?>" placeholder="Strawberry Quantity">
            <span class="error"><?php echo $strawberryerr;?></span>


            <label for="Blueberry">Blueberry - 80p </label>
            <input class="form-control" type="number" min="0" inputmode="numeric" id="Blueberry" name="Blueberry"
                value="<?php echo htmlspecialchars($blueberry);?>" placeholder="Blueberry Quantity">
            <span class="error"><?php echo $blueberryerr;?></span>
            <br>
            <br>

            <input id="btn" onclick="Alert();" type="submit" name="submit" value="Place Order"
                class="btn btn-primary btn-lg " />
        </form>
        <br>
        <?php include ('checker.php') ?>
    </div>
    </div>
    </div>
</body>

</html>