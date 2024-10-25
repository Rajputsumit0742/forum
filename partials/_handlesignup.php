<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];
    
    // Check whether this email exists 
    // Fixed: Use single quotes around the email in the query
    $existSql = "SELECT * FROM `users` WHERE `users_email` = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);

    if($numRows > 0) {
        $showError = "Email already in use";
    } else {
        if($pass == $cpass) {
            // Hashing the password
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            // Inserting user into the database
            // Fixed: $users_email should be $user_email
            $sql = "INSERT INTO `users` (`users_email`, `users_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql); // Fixed: Use mysqli_query instead of mysql_query

            if ($result) {
                // Redirect to success page if insertion is successful
                header("Location:/Forum/index.php?signupsuccess=true");
                exit();
            }
        } else {
            // If passwords don't match
            $showError = "Passwords do not match";
        }
    }

    // Redirect back to the signup page with an error message
    header("Location:/Forum/index.php?signupsuccess=false&error=$showError");
}
?>
