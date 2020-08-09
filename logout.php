<?php
// Destroying the session clears the $_SESSION variable
session_start();
session_destroy();
// Redirect users back to login page
header("Location: index.php");  
?>