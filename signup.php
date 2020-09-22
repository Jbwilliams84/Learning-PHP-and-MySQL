<?php
session_start();

// // if user is not logged in
// if( !$_SESSION['loggedInUser'] ) {
    
//     // send them to the login page
//     header("Location: index.php");
// }

// connect to database
include('includes/connection.php');

// include functions file
include('includes/functions.php');

// if sign up button was submitted
if( isset( $_POST['signup'] ) ) {
    
    // set all variables to empty by default
    $username = $useremail = $userpassword = $passwordconfirm = "";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with function
    
    if( !$_POST["username"] ) {
        $nameError = "Please enter a name <br>";
    } else {
        $username = validateFormData( $_POST["username"] );
    }

    if( !$_POST["useremail"] ) {
        $emailError = "Please enter an email <br>";
    } else {
        $useremail = validateFormData( $_POST["useremail"] );
    }

    if( !$_POST["userpassword"] ) {
        $passwordError = "Please enter a password <br>";
    } else {
        $userpassword = validateFormData( $_POST["userpassword"] );
    }

    if( !$_POST["passwordconfirm"] ) {
        $passwordError = "Please enter a password <br>";
    } else {
        $passwordconfirm = validateFormData( $_POST["passwordconfirm"] );
    }

    if( $username && $useremail && ($userpassword == $passwordconfirm)) {
               
            $hashedpassword = password_hash($userpassword, PASSWORD_DEFAULT);
            
    
            // create query
            $query = "INSERT INTO users (id, email, name, password) VALUES (NULL, '$useremail', '$username', '$hashedpassword')";
            
            $result = mysqli_query( $conn, $query );
            
            // if query was successful
            if( $result ) {
                
                // refresh page with query string
                header( "Location: index.php?alert=success" );
            } else {
                
                // something went wrong
                echo "Error: ". $query ."<br>" . mysqli_error($conn);
            }
            
        
    }

    else {
        $passwordMatchError = "Passwords do not match <br>";
    }
}


// close the mysql connection
mysqli_close($conn);


include('includes/header.php');
?>

<h1 style="display: flex; justify-content: center;">Welcome to Client Manager</h1>

<h5 style="color: green; margin: 2rem 0; display: flex; justify-content: center;"> Create a login to start using our newest client manager to manage your customers! </h5>


<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" class="row">
    <div class="form-group col-sm-6">
    <small class="text-danger"> * <?php echo $nameError; ?></small>
        <label for="client-name">Name *</label>
        <input type="text" class="form-control input-lg" id="user-name" name="username" value="">
    </div>
    <div class="form-group col-sm-6">
    <small class="text-danger"> * <?php echo $emailError; ?></small>
        <label for="client-email">Email *</label>
        <input type="text" class="form-control input-lg" id="user-email" name="useremail" value="">
    </div>
    <div class="form-group col-sm-6">
    <small class="text-danger"> * <?php echo $passwordError; ?></small>
        <label for="client-phone">Password *</label>
        <input type="password" class="form-control input-lg" id="user-password" name="userpassword" value="">
    </div>
    <div class="form-group col-sm-6">
        <small class="text-danger"> * <?php echo $passwordError; ?></small>
        <small class="text-danger"> <?php echo $passwordMatchError; ?></small>
        <label for="client-address">Retype Password *</label>
        <input type="password" class="form-control input-lg" id="password-confirm" name="passwordconfirm" value="">
    </div>
       <div class="col-sm-12">
       <input type="submit" name="signup" value="Sign Up" class="btn btn-lg btn-success">
    </input>
</form>

<?php
include('includes/footer.php');
?>