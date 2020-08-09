<?php ob_start(); ?>
<?php require "dbconnect.php"?>
<?php
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST') //has the user submitted the form
            {      
                $email = $_POST['email']; // email the user submitted from $_POST
                $password = $_POST['password'];// password the user submitted from $_POST and dencrypts it with BCrypt

                $hashed_pass; // Variable to store hashed password

                $sql_get_hash = $conn->prepare("SELECT user_password FROM `users` WHERE user_email = ?");
                $sql_get_hash -> bindValue(1, "$email"); //we bind this variable to the first ? in the sql statement
                $sql_get_hash -> execute(); //execute the statement

                $result = $sql_get_hash->fetchColumn(); // fetch results
                $hashed_pass = $result; // Assign hashed password to variable
                
                // If the password is verified successfully, log in the user
                if(password_verify($password, $hashed_pass) == true){

                //preparing an sql statement to search user_email and user_password for whatever the user has typed. Also match to a user_type of admin
                $sql = $conn->prepare("SELECT * FROM `users` WHERE user_email = ?");

                $sql -> bindValue(1, "$email"); //we bind this variable to the first ? in the sql statement

                $sql -> execute(); //execute the statement
                
                if($sql->rowCount()) 
                    {
                        // Fetch results
                        $row = $sql->fetch();

                        // Check if user is an admin
                        if($row['user_type'] == 'admin'){
                            // Start  session
                            ob_start();
                            session_start();

                            // store the type of the user
                            $_SESSION["user_type"] = "Admin";
                            // store the user id
                            $_SESSION["user_id"] = $row['id'];
                            // store user name
                            $_SESSION["user_mail"] = $row['user_email'];
                            // Set login to true
                            $_SESSION['loggedin'] = true;

                            //redirect the user once they have logged in
                            header("Location: check_login.php");
                        }

                        // If user not admin set user to customer
                        else if ($row['user_type'] == 'customer'){
                            // Start  session
                            ob_start();
                            session_start();

                            // store the type of the user
                            $_SESSION["user_type"] = "Customer";
                            // store the user id
                            $_SESSION["user_id"] = $row['id'];
                            // store user name
                            $_SESSION["user_mail"] = $row['user_email'];
                            // Set login to true
                            $_SESSION['loggedin'] = true;

                            //redirect the user once they have logged in
                            header("Location: check_login.php");
                        }
                    }
                }
                else
                {
                    echo '
                    <script type="text/javascript">
            
                    $(document).ready(function(){
            
                    swal({
                        icon: "error",
                        title: "Oups, we have an error",
                        text: "Username and / or password are incorrect!"
                    })
                    });
            
                    </script>
            ';  //message to display if we did not match a user
                }

            }
            else 
            {
                // Redirect Users to another page
            }
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>