<?php
// did the user's browser send a cookie for the session?
if( isset( $_COOKIE[ session_name() ] ) ) {

    // empty the cookie
    setcookie( session_name(), '', time()-86400, '/' );

}

include('includes/connection.php');

$query = "SELECT * FROM users";
$result = mysqli_query( $conn, $query );

if( mysqli_num_rows($result) > 0 ) {
        
    // we have data!
    // output the data
    
    while( $row = mysqli_fetch_assoc($result) ) {
        $name = $row['name'];
    }
} 

// clear all session variables
session_unset();

// destroy the session
session_destroy();

include('includes/header.php');
?>

<h1>Logged out</h1>

<p class="lead">You've been logged out. See you next time <?php echo $name ?>!</p>

<?php
include('includes/footer.php');
?>