<?php if (!session_id() && !headers_sent()) {
   session_start();
}   
?>
<link rel="stylesheet" href="assets/css/styles.min.css">
<script src="https://kit.fontawesome.com/5f94efdc58.js" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand img-size" href="order.php"><img src="img/logo.png" alt="logo" style="height: auto;
    width: 200px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php include ("nav_control.php"); ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['loggedin'])) : ?>
            <button class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Welcome back,
                <?php echo $_SESSION['user_mail'] ?> </button>
            <a class="btn btn-primary btn-space" href="myaccount.php" role="button"><i class="fa fa-user"
                    aria-hidden="true"></i> My account</a>

            <a class="btn btn-primary btn-space" href="logout.php" role="button"><i class="fa fa-sign-in"
                    aria-hidden="true"></i>
                Logout</a>
            <?php else: ?>
            <a class="btn btn-primary btn-space" href="index.php" role="button"><i class="fa fa-sign-in"
                    aria-hidden="true"></i> Login</a>
            <a class="btn btn-primary btn-space" href="registration_form.php" role="button"><i
                    class="fa fa-plus-circle"></i></i>
                Register</a>
            <?php endif ?>
        </ul>
    </div>
</nav>