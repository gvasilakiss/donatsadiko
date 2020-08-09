<?php require "dbconnect.php"?>

<?php
// Attempt search query execution
try{
    if(isset($_REQUEST["term"])){
        // create prepared statement
        $sql = "SELECT * FROM donut WHERE Order_Name LIKE :term";
        $stmt = $conn->prepare($sql);
        $term = $_REQUEST["term"] . '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                echo "<p>" . $row["Order_Name"] . "</p>";
            }
        } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
?>