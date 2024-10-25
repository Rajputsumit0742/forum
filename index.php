<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - coding forum</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #Ques{
            min-height:433px;
        }
        </style>
</head>
<title>welcome to iDiscuss </title>
<body>

    <?php include 'partials/_dbconnect.php' ;?>
    <?php include 'partials/_header.php' ; ?>

    <!-- slider starts -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.hdqwalls.com/download/river-sunbeam-autumn-4k-av-1366x468.jpg"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slider-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/slider-1.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

<!-- category container starts hare -->
    <div class="container my-4 " id="Ques">
        <h2 class="text-center">icon categories </h2>
        <div class="row">

            <!-- fetch all the categories -->
             <?php 
             $sql = "SELECT * FROM `categories`";
             $result = mysqli_query($conn, $sql);
             while ($row = mysqli_fetch_assoc($result)) {
            // echo $row['categort_id'];
            // echo $row['categort_name'];
            

            $id = $row['categort_id'];
            $cat = $row['categort_name'];
            $desc = $row['categort_description'];
            echo '<div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="img/image-'.$id. '.jpg '. $cat . '"width="54" class="mr-3" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/Forum/threadlist.php ? catid=' . $id. ' "> ' . $cat. '</a></h5>
                        <h5 class="card-title">' . substr($desc, 0, 10) . '</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card\'s content.</p>
                        <a href="/Forum/threaklist.php ? catid=' . $id. ' " class="btn btn-primary my-3">View Threads</a>
                    </div>
                </div>

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