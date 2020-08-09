<?php include ("dbconnect.php"); ?>
<?php
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST') //has the user submitted the form
            {
                     
            if(empty($_POST["email"]) || empty($_POST["password"]))  
            {  
                echo '
                <script type="text/javascript">
                
                $(document).ready(function(){
                
                swal({
                    icon: "error",
                    title: "Oups, you forgot something!",
                    text: "You must complete both inputs to register"
                })
                });
                
                </script>
                '; 
            }  
            else{
                
                // Get values from sumbited form
                $user_email = $_POST['email'];    
                $user_pass = $_POST['password'];

                // Encrypt password with BCrypt 
                $hashToStoreInDb = password_hash($user_pass, PASSWORD_BCRYPT);

                //$user_pass = md5($user_pass);
                $user_type = "customer";       
            
                // Validation and field insertion
                $check_email = "SELECT * FROM users WHERE user_email = :email";
                $check_email = $conn->prepare($check_email);
                $check_email->execute(array(':email'=>$user_email));
                if($check_email->rowCount() >0){
                    echo '
                    <script type="text/javascript">
                    
                    $(document).ready(function(){
                    
                    swal({
                        icon: "error",
                        title: "Oups, we have an error!",
                        text: "User '.$user_email.' already exists"
                    })
                    });
                    
                    </script>
                    ';
                    exit();
                }
            
                $query = "INSERT INTO users(user_password, user_email, user_type) values (?, ?, ?)";
                $query = $conn->prepare($query);
                $query->bindParam('1', $hashToStoreInDb);
                $query->bindParam('2', $user_email);
                $query->bindParam('3', $user_type);
                $query->execute();

                if($query->rowCount() > 0) {
                    echo '
                    <script type="text/javascript">
                    
                    $(document).ready(function(){
                    
                    swal({
                        icon: "success",
                        title: "Registration complete",
                        text: "'.$user_email.', your account has been created successfully!"
                    })
                    });
                    
                    </script>
                    '; 
                    exit();
                }
            }   
        }
        else{
         // Redirect Users to another page
        }
    }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>