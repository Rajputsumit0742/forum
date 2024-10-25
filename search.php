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
    <!-- Search Results -->
        <div class="Container my-3">
            <h1> Search Results for <em>"<?php echo $_GET['search']?>"</em></h1> 
        <div class="result"> 
            <h3> <a href="/categories/ddf" class="text=dark">Cannot install Pyaudio</a> </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta est assumenda, minima aliquid dolores corrupti alias nostrum voluptas eius nisi earum quidem nesciunt sunt quam harum commodi? Possimus officia ducimus vitae, reprehenderit, mollitia dolores quidem recusandae cupiditate atque dolore ipsa delectus rem sint culpa expedita, nisi distinctio quasi quo impedit ipsum nihil unde officiis. Sapiente ad doloremque deserunt distinctio vero assumenda, a laudantium quasi natus. Laborum odio nobis similique officiis. Recusandae sed possimus natus placeat ut, pariatur, rerum praesentium quae vitae commodi totam corporis velit eligendi officiis amet vel distinctio fugiat enim. Accusamus fugit voluptates minima obcaecati explicabo. Deleniti doloribus numquam dolores iusto aut recusandae possimus, sit dicta quo ab corporis perferendis qui quis nemo nam! Dignissimos, quaerat! Qui suscipit enim libero sit at aperiam excepturi a sequi sint impedit atque, nulla nihil unde, consectetur molestiae fuga et accusantium praesentium? Dignissimos magni inventore voluptatum similique unde enim quo, delectus sed dolor cum impedit? Fugiat nostrum nulla quod doloribus deserunt corporis voluptate eos maxime natus, voluptatibus fugit optio recusandae voluptatum laudantium numquam quae in ex aliquid excepturi quidem perspiciatis illum praesentium provident. Suscipit cumque cum quaerat eligendi aliquam, nesciunt eius? Perspiciatis vero, dignissimos quisquam, quam cumque fugiat asperiores expedita, excepturi exercitationem voluptatum earum optio soluta molestiae aut nisi amet repellendus consequuntur eius delectus tenetur. Error tenetur soluta id fugit deleniti. Ad!</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A, iste numquam accusamus tenetur mollitia esse ducimus, ex quos dignissimos veniam repellat eligendi suscipit corrupti tempora. Ipsum eligendi et suscipit voluptatum eveniet. Tempora ex accusamus, quam a qui sunt similique odit soluta, quae ab rerum, sapiente consequuntur blanditiis quis ducimus! Quia ipsa nesciunt illum velit saepe harum, numquam non quis quasi in quo illo architecto, ipsam eius, iste maiores. Consequatur iusto voluptatibus nostrum ex tempore et natus delectus veniam, nam officia sit ad aliquam quasi reiciendis modi velit a totam ducimus animi dignissimos optio. Neque quaerat dolorum sequi fugiat animi explicabo, eaque molestias maiores mollitia! Officiis quisquam neque obcaecati voluptatem vitae iure ad quod! Dolorum suscipit totam nesciunt ipsa culpa, sunt accusantium expedita ipsam officia corporis at blanditiis atque beatae omnis, ipsum quo repudiandae molestias. Porro consequatur et quasi amet inventore numquam dolorum alias vero obcaecati exercitationem cumque facilis, laudantium consequuntur voluptatem? Quos quasi officiis facere harum, suscipit necessitatibus sit, amet architecto, labore sapiente libero at aut commodi asperiores totam fugiat in culpa tempore iure pariatur! Laboriosam culpa, repellat debitis est, sed nobis ipsa accusamus incidunt asperiores neque corporis blanditiis autem aut, sunt esse assumenda voluptatum molestias. Accusamus magni ipsam inventore dolorum excepturi quis iste quam accusantium amet fuga optio, rerum praesentium aperiam veniam minima repudiandae aliquid dolorem a veritatis quaerat unde earum dolores? Earum quibusdam eligendi dolore necessitatibus exercitationem quia. </p>
        </div>
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