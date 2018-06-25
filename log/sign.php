

    <?php
session_start();
    // Include config file

    require_once 'connexion.php';

     

    // Define variables and initialize with empty values

    $username = $password = "";

    $username_err = $password_err = "";

     

    // Processing form data when form is submitted

    if($_SERVER["REQUEST_METHOD"] == "POST"){

     

        // Check if username is empty

        if(empty(trim($_POST["username"]))){

            $username_err = 'Please enter username.';

        } else{

            $username = trim($_POST["username"]);

        }

        

        // Check if password is empty

        if(empty(trim($_POST['password']))){

            $password_err = 'Please enter your password.';

        } else{

            $password = trim($_POST['password']);

        }

        

        // Validate credentials

        if(empty($username_err) && empty($password_err)){

            // Prepare a select statement

            $sql = "SELECT * FROM joueurs WHERE pseudo = :pseudo" ;

            

            if($stmt = $pdo->prepare($sql)){

                // Bind variables to the prepared statement as parameters

                $stmt->bindParam(':pseudo', $param_username, PDO::PARAM_STR);

                

                // Set parameters

                $param_username = trim($_POST["pseudo"]);

                

                // Attempt to execute the prepared statement

                if($stmt->execute()){

                    // Check if username exists, if yes then verify password

                    if($stmt->rowCount() == 1){

                        if($row = $stmt->fetch()){

                            $hashed_password = $row['passw'];

                            if(password_verify($password, $hashed_password)){

                                /* Password is correct, so start a new session and

                                save the username to the session */

                                

                                $_SESSION['pseudo'] = $row['pseudo'];      
                                $_SESSION['user_id']= $row['id'];
                                
                                header("location: welcome.php");
                                $sql = "INSERT INTO matchs (pseudo_id) VALUES('".$_SESSION['pseudo_id']."')";
                            } else{

                                // Display an error message if password is not valid

                                $password_err = 'The password you entered was not valid.';

                            }

                        }

                    } else{

                        // Display an error message if username doesn't exist

                        $username_err = 'No account found with that username.';

                    }

                } else{

                    echo "Oops! Something went wrong. Please try again later.";

                }

            }

            

            // Close statement

            unset($stmt);

        }

        

        // Close connection

        unset($pdo);

    }

    ?>

     

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Connexion</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link href="welcome.css" rel="stylesheet">
        

    </head>

    <body>
    <div class="logo"><img src="street.png" alt="logo" /></div>

    <h1>Bienvenue.</h1>
        <div class="wrapper">
        
            <h2></h2>

            

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

                    <label>Pseudo:<sup>*</sup></label>

                    <input type="text" name="pseudo"class="form-control" value="<?php echo $pseudo; ?>">

                    <span class="help-block"><?php echo $username_err; ?></span>

                </div>    

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                    <label>Mot de passe:<sup>*</sup></label>

                    <input type="password" name="passw" class="form-control">

                    <span class="help-block"><?php echo $password_err; ?></span>

                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="Submit">

                </div>

                <p>Vous n'avez pas de compte? <a href="register.php">Créez-en un ici</a>.</p>

            </form>

        </div>

    </body>

    </html>

