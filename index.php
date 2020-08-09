<?php ob_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Donatsadiko</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=f1d2fef1b7b619906014980fa4fbbe13">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=a58bdd5400a2ea0e459cc7f413d2b4e9">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body class="clean-block clean-form dark">
    <?php include ('nav.php') ?>
    <main class="page login-page">
        <section>
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Customer Log In</h2>
                    <p>To see your orders, you must login first.</p>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["sql_select_login_student.php"]);?>" method="POST">
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="text"
                            id="email" name="email" placeholder="Email"></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control"
                            type="password" id="password" name="password" placeholder="Password"></div>
                    <div class="form-group">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label
                                class="form-check-label" for="checkbox">Remember me</label></div>
                    </div><button class="btn btn-primary btn-block" type="submit">Log In</button>
                </form>
            </div>
        </section>
        <?php include ("sql_select_login_student.php"); ?>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js?h=a600b8e7e9619265383470da5f98b4f6"></script>
</body>

</html>