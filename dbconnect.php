<?php 
// Create PDO Connection
$servername = "INSERT_SERVER_IP";
$username = "INSERT_SERVER_USERNAME";
$password = "INSERT_SERVER_PASSWORD";
$dbname = "INSERT_DB_NAME";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //building a new connection object
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
    {
        // Catch eny error
        echo "Connection failed: " . $e->getMessage();
    }
?>