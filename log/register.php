

    <?php

    // Include config file

    require_once 'connexion.php';

     

    // Define variables and initialize with empty values

    $username = $password = $confirm_password = "";

    $username_err = $password_err = $confirm_password_err = "";

     

    // Processing form data when form is submitted

    if($_SERVER["REQUEST_METHOD"] == "POST"){

     

        // Validate username

        if(empty(trim($_POST["pseudo"]))){

            $username_err = "Please enter a username.";

        } else{

            // Prepare a select statement

            $sql = "SELECT id FROM joueurs WHERE pseudo = :pseudo";

            

            if($stmt = $pdo->prepare($sql)){

                // Bind variables to the prepared statement as parameters

                $stmt->bindParam(':pseudo', $param_username, PDO::PARAM_STR);

                

                // Set parameters

                $param_username = trim($_POST["pseudo"]);

                

                // Attempt to execute the prepared statement

                if($stmt->execute()){

                    if($stmt->rowCount() == 1){

                        $username_err = "This username is already taken.";

                    } else{

                        $username = trim($_POST["pseudo"]);

                    }

                } else{

                    echo "Oops! Something went wrong. Please try again later.";

                }

            }

             

            // Close statement

            unset($stmt);

        }

        

        // Validate password

        if(empty(trim($_POST['passw']))){

            $password_err = "Please enter a password.";     

        } elseif(strlen(trim($_POST['passw'])) < 6){

            $password_err = "Password must have atleast 6 characters.";

        } else{

            $password = trim($_POST['passw']);

        }

        

        // Validate confirm password

        if(empty(trim($_POST["confirm_password"]))){

            $confirm_password_err = 'Please confirm password.';     

        } else{

            $confirm_password = trim($_POST['confirm_password']);

            if($password != $confirm_password){

                $confirm_password_err = 'Password did not match.';

            }

        }

        

        // Check input errors before inserting in database

        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

            

            // Prepare an insert statement

            $sql = "INSERT INTO joueurs (pseudo, passw) VALUES (:pseudo, :passw)";

             

            if($stmt = $pdo->prepare($sql)){

                // Bind variables to the prepared statement as parameters

                $stmt->bindParam(':pseudo', $param_username, PDO::PARAM_STR);

                $stmt->bindParam(':passw', $param_password, PDO::PARAM_STR);

                

                // Set parameters

                $param_username = $username;

                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                

                // Attempt to execute the prepared statement

                if($stmt->execute()){

                    // Redirect to login page

                    header("location: index.html");

                } else{

                    echo "Something went wrong. Please try again later.";

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

        <title>Sign Up</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link href="welcome.css" rel="stylesheet">
        

    </head>

    <body>
    <div class="logo"><img src="street.png" alt="logo" /></div>
        <div class="wrapper">

            <h2></h2>

           

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

                    <label>Pseudo:<sup>*</sup></label>

                    <input type="text" name="pseudo"class="form-control" value="<?php echo $username; ?>">

                    <span class="help-block"><?php echo $username_err; ?></span>

                </div>    

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                    <label>Mot de passe:<sup>*</sup></label>

                    <input type="password" name="passw" class="form-control" value="<?php echo $password; ?>">

                    <span class="help-block"><?php echo $password_err; ?></span>

                </div>

                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

                    <label>Confirmer le mot de passe:<sup>*</sup></label>

                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">

                    <span class="help-block"><?php echo $confirm_password_err; ?></span>

                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="Créer">

                    <input type="reset" class="btn btn-default" value="Annuler">

                </div>

                <p>Vous avez déjà un compte? <a href="index.html">Connectez vous ici</a>.</p>

            </form>

        </div>    

    </body>

    </html>

