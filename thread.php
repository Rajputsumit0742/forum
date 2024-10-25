<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - coding forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- In this we use css -->
    <style>
    #Ques {
        min-height: 433 px;
    }
    </style>

</head>

<body>

    <?php include 'partials/_header.php' ?>
    <?php include 'partials/_dbconnect.php' ?>

    <?php
    $id = $_GET['threadid'];
    // $sql ="SELECT * FROM `categories` WHERE `idiscuss`.`categort_id` = 1";
    $sql = "SELECT * FROM `threads` WHERE `threads`.`threads_id` =$id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['threads_title'];
        $desc = $row['threads_description'];
        $threads_user_id = $row['threads_user_id'];

        // $sql2 = "SELECT * FROM users WHERE `users_email` ='$threads_user_id'";
        $sql2 = "SELECT users_email FROM `users` WHERE `users`.`sr.no`='$threads_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        // $posted_by = $row2['users_email'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
 // Insert comment into the database
        $comment = $_POST['comments'];
        $comment = str_replace("<","$lt;", $comment);
        $comment = str_replace(">","&gt;", $comment);

        // $sr.no = $_POST['sr.no'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sr.no', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success </strong>  Your comment has bees added.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';}
    }
    ?>

    <!-- category container starts  -->
    <div class="container my-4" id="Ques">
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $title ; ?> </h1>
            <!-- <h1 class="display-4">Welcome to pythons forums</h1> -->
            <p class="lead"> <?php echo $desc ;?></p>
            <hr class="my-4">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur officia quidem fuga numquam, ad
                reprehenderit tenetur hic assumenda officiis ullam saepe, sit blanditiis vel fugit, animi sint? Dolorum
                velit tempora iure animi facilis.</p>

            <p>Posted by : <em><?php echo $posted_by; ?></em></p>
        <!-- <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a> -->
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
       echo '<div class="container">
        <h1 class="py-2">Post a comments </h1>
        <!-- Form starts Post Comments -->
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comments</label>
                <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                <input type="hidden" name="sr.no" value="'. $_SESSION["sr.no"] .'">
            </div>
            <button type="submit" class="btn btn-success">Post comments</button>
        </form>
    </div>';
        } else {
            echo '
            <div class="container">
            <h1 class="py-2"> Post a Comments</h1>
            <p class="lead">You are not logged in. Please login to be able to Post Comments </p>
            </div>';
        }
    ?>

    <div class="container">
        <h1 class="py-2"> Discussions </h1>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);

    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['comment_time'];

        $threads_user_id = $row['comment_by'];
        // $sql2 = "SELECT users_email FROM `users' WHERE sr.no = '$threads_user_id'";
        $sql2 = "SELECT * FROM users WHERE `users_email` ='$threads_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        // $row2['users_email'];

        echo '<div class="media my-3">
            <img src="img/usersdefault.png" width="54" class="mr-3" alt="img/image4.jpg">
            <div class="media-body">
            <p class="font-weigh-bold my-0"><b>'.' at '.$comment_time .'</b></p>
                '. $content .'
            </div>
        </div>';
         }
         if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="display-4">No Threads Found </p>
                <p class="lead">Be the first person to ask a question </p>
            </div>
            </div>';
        }
    ?>

        <?php include'partials/_footer.php' ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>