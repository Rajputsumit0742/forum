<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "SELECT * FROM users WHERE users_email = '$email'";
    $result = mysqli_query($conn ,$sql);
    $numRow = mysqli_num_rows($result);

    if ($numRow == 1) {
        $row = mysqli_fetch_array($result);
            if (password_verify($pass, $row['users_pass'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['sr.no'] = $row['sr.no'];
                $_SESSION['username'] = $email;
                echo "logged in" . $email;
                // header("Location:/forum/index.php");
            }
            header("Location:/forum/index.php");
    } header("Location:/forum/index.php");
}

?>