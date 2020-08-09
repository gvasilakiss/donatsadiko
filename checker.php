 <?php 
    /*
    // Check if inputs are empty
    while (empty($name) || empty($sprinkles) || empty($chocolate) || empty($caramel) || empty($raspberry) || empty($strawberry) || empty($blueberry) ) {
        echo '    <script type="text/javascript">
        document.getElementById("btn").onclick = function() {Alert()};

        function Alert() {
            swal("Oups", "Looks like you missed some fields", "warning");
}
    </script>';
        return false;
    }
    */ 
    ?>
 
 <?php 
    // Post form
    if (isset($_POST["submit"])) 
        include 'conection.php'
    ?>