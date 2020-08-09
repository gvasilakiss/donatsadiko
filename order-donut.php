<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Doughnut orders</title>
</head>

<body>
    <div class="text-center">
        <?php include ('nav.php') ?>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["conection.php"]);?>" method="POST">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="Name" name="order_name"
                value="<?php echo htmlspecialchars($name);?>" placeholder="Name">
            <span class="error"><?php echo $nameerr;?></span>
            <br>

            <label for="Sprinkles">Sprinkles - £1 </label>
            <input type="number" class="form-control" inputmode="numeric" id="Sprinkles" name="Sprinkles"
                value="<?php echo htmlspecialchars($sprinkles);?>" placeholder="Sprinkles Quantity">
            <span class="error"><?php echo $sprinkleserr;?></span>
            <br>

            <label for="Chocolate">Chocolate - £1.20</label>
            <input type="number" class="form-control" inputmode="numeric" id="Chocolate" name="Chocolate"
                value="<?php echo htmlspecialchars($chocolate);?>" placeholder="Chocolate Quantity">
            <span class="error"><?php echo $chocolateerr;?></span>
            <br>

            Caramel - £1 <br>
            <input type="number" class="form-control" inputmode="numeric" id="Caramel" name="Caramel"
                value="<?php echo htmlspecialchars($caramel);?>" placeholder="Caramel Quantity">
            <span class="error"><?php echo $caramelerr;?></span>
            <br>

            Raspberry - 80p <br>
            <input type="number" class="form-control" inputmode="numeric" id="Raspberry" name="Raspberry"
                value="<?php echo htmlspecialchars($raspberry);?>" placeholder="Raspberry Quantity">
            <span class="error"><?php echo $raspberryerr;?></span>
            <br>

            Strawberry - 80p <br>
            <input type="number" class="form-control" inputmode="numeric" id="Strawberry" name="Strawberry"
                value="<?php echo htmlspecialchars($strawberry);?>" placeholder="Strawberry Quantity">
            <span class="error"><?php echo $strawberryerr;?></span>
            <br>

            Blueberry - 80p <br>
            <input type="number" class="form-control" inputmode="numeric" id="Blueberry" name="Blueberry"
                value="<?php echo htmlspecialchars($blueberry);?>" placeholder="Blueberry Quantity">
            <span class="error"><?php echo $blueberryerr;?></span>
            <br>
            <br>

            <input id="btn" onclick="Alert();" type="submit" name="submit" value="submit"
                class="btn btn-primary btn-lg" />
            <input type="reset" value="Reset" class="btn btn-primary btn-lg" />
            <a href="index.php" type="button" class="btn btn-primary btn-lg">Back</a>
        </form>
        <br>
        <br>
        <?php include ('checker.php') ?>
    </div>
    </div>
    </div>
</body>

</html>