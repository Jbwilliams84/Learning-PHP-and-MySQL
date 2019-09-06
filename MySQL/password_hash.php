<?php 

include('connection.php');

?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Password Hashing</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container">
            <h1>Password Hashing</h1>
        
            <?php
                // $password = password_hash("mypassword", PASSWORD_DEFAULT);
                // echo $password;

            $hashedPassword = '$2y$10$QO64fse9ccOMjn3hgrkk8.DjXq5WOFqBk7/QdQKJIsgJzOP/1GKM2';

          

            if( isset( $_POST['login']) ) {
              if( password_verify( $_POST['password'], $hashedPassword ) ) {
                    echo "Password is correct!";
            } else {
                echo "Incorrect password!";
            }
            }

            ?>

            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="POST">
            <label> * Password </label>
            <input type="password" placeholder="Password" name="password"><br><br>

            <input type="submit" name="login" value="Log In" class="btn btn-default">

            </form>
         
            
        </div>
        
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>