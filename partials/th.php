<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> iDiscuss - coding forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include 'partials/_header.php' ?>
    <?php include 'partials/_dbconnect.php' ?>

    <?php
    $id = $_GET['catid'];
    // $sql ="SELECT * FROM `categories` WHERE `idiscuss`.`categort_id` = 1";
    $sql = "SELECT * FROM `categories` WHERE `categories`.`categort_id` =$id";
    $result = mysqli_query($conn, $sql);

    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = false;
        $catname = $row['categort_name'];
        $catdesc = $row['categort_description'];

    } 
    // echo var_dump($noResult);
    if ($noResult) {
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p class="display-4">No Threads Found </p>
            <p class="lead">Be the first person to ask a question </p>
        </div>
        </div>';
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
 // Insert threads into the database
        $th_title = $_POST['title'];
        $th_desc = $_POST['description'];

        // $sr.no = $_POST['sr.no'];
        // $sql = "INSERT INTO `threads` (`threads_title`, `threads_description`, `threads_category_id`, `threads_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sr.no', current_timestamp())";
        $sql = "INSERT INTO `threads` (`threads_title`, `threads_description`, `threads_category_id`, `threads_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success </strong>  Your threads has bees added. Please wait for community to respond.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';}
    }
    ?>

    <!-- category container starts  -->
    <div class="container my-4" id="Ques">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname ; ?> forums</h1>
            <!-- <h1 class="display-4">Welcome to pythons forums</h1> -->
            <p class="lead"> <?php echo $catdesc ;?></p>
            <hr class="my-4">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur officia quidem fuga numquam, ad
                reprehenderit tenetur hic assumenda officiis ullam saepe, sit blanditiis vel fugit, animi sint? Dolorum
                velit tempora iure animi facilis.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
       echo '<div class="container">
            <h1 class="py-2"> Start a Discussions</h1>
    <!-- Form starts -->
                <form action="' . $_SERVER["REQUEST_URI"] . '" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Problem Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                        <small id="title" class="form-text text-muted">Keep your title as short and crisp as possible</small>
                     </div>

                     <input type="hidden" name="sr.no" value="'. $_SESSION["sr.no"] .'">
    
                    <div class="form-group">
                       <label for="exampleFormControlTextarea1">Elaborate your concern </label>
                       <textarea class="form-control" id="exampleFormControlTextarea1" id="description" name="description"
                        rows="3"></textarea>
                     </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>';
        } else {
            echo '
            <div class="container">
            <h1 class="py-2"> Start a Discussions</h1>
            <p class="lead">You are not logged in. Please login to be able to start a Discussion </p>
            </div>
            ';
        }
    ?>

    <div class="container" id="Ques">
        <h1 class="py-2">Browse Questions</h1>
        <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE threads_category_id=$id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['threads_id'];
        $title = $row['threads_title'];
        $desc = $row['threads_description'];
        $thread_time = $row['timestamp'];


        $threads_user_id = $row['threads_user_id'];
        // $sql2 = "SELECT * FROM `users' WHERE sr.no = '$threads_user_id'";
        // $sql2 = "SELECT * FROM `users' WHERE `users_email`.`sr.no` = '$threads_user_id'";
        // $sql2 ="SELECT * FROM users WHERE `sr.no` ='$threads_user_id'";

        $sql2 = "SELECT `users_email` FROM `users` WHERE `sr.no` = '$threads_user_id'";
        // $sql2 = "SELECT * FROM users WHERE `users_email` ='$threads_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        // $row2['users_email'];

         echo '<div class="media my-3">
            <img src="img/userdefault.png" width="54" class="mr-3" alt="img/image4.jpg">
            <div class="media-body">
            <p class="font-weigh-bold my-0">'. $row2['users_email'] .' at '.$thread_time .'</p>
                <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' . $id . '">'. $title .'</a></h5>
                '. $desc .'</div>'.'<div class="font-weigh-bold my-0"> Asked by: '.$row2['users_email'] .' at '.$thread_time .' </div>'.
        '</div>';
         } 
    // echo var_dump($noResult);
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