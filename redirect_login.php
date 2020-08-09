<?php
// Always start this first
session_start();

if (isset( $_SESSION['loggedin'])) {
} 
else {
    // Redirect them to the login page
    header("Location: index.php");
}
?>