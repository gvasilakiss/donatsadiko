<?php
/**
 * Start the session.
 */
ob_start();
session_start();
/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['loggedin'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: index.php');
    exit;
}
/**
 * Check who is trying to login and redirect them accordingly
 */
else if(isset($_SESSION['loggedin']) && $_SESSION["user_type"] == "Admin"){
    // Send admins here
    header('Location: all.php');
    exit;
}
else if(isset($_SESSION['loggedin']) && $_SESSION["user_type"] == "Customer"){
    // Send customers here
    header('Location: order.php');
    exit;
}
else{
    echo "eisai edw";
    exit;
}
?>
<?php ob_end_flush(); ?> 