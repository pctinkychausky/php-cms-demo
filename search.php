<?php

include "includes/db.php";

?>
<?php

include "includes/header.php";

?>

<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if (isset($_POST["submit"])) {

                $search = $_POST["search"];

                //bad example
                // $query = `SELECT * FROM posts WHERE post_tags LIKE "%$search%"`;
                // $search_query = mysqli_query($connection, $query);
                // if (!$search_query) {
                //     die("QUERY FAILED" . mysqli_error($connection));
                // }
            
                // $count = mysqli_num_rows($search_query);
            
                // if ($count == 0) {
                //     echo "<h1> NO RESULT </h1>";
                // } else {
                //     echo "SOME RESULT";
                // }
            
                //good example
                try {
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    $search_query = mysqli_query($connection, $query);

                    if (!$search_query) {
                        throw new Exception(mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);

                    if ($count == 0) {
                        echo "<h1> NO RESULT </h1>";
                    } else {

                        $posts = mysqli_fetch_all($search_query, MYSQLI_ASSOC);

                        if ($posts) {
                            foreach ($posts as $post) {
                                $post_title = $post["post_title"];
                                $post_author = $post["post_author"];
                                $post_date = $post["post_date"];
                                $post_image = $post["post_image"];
                                $post_content = $post["post_content"];



                                ?>
                                <h1 class="page-header">
                                    Page Heading
                                    <small>Secondary Text</small>
                                </h1>

                                <!-- First Blog Post -->
                                <h2>
                                    <a href="#">
                                        <?php echo $post_title ?>
                                    </a>
                                </h2>
                                <p class="lead">
                                    by <a href="index.php">
                                        <?php echo $post_author ?>
                                    </a>
                                </p>
                                <p><span class="glyphicon glyphicon-time"></span>
                                    <?php echo $post_date ?>
                                </p>
                                <hr>
                                <img class="img-responsive" src="img/<?php echo $post_image ?>" alt="">
                                <hr>
                                <p>
                                    <?php echo $post_content ?>
                                </p>
                                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                                <hr>

                            <?php }
                        }

                    }
                } catch (Exception $e) {
                    echo "QUERY FAILED: " . $e->getMessage();
                }


            } ?>


















        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php

    include("includes/footer.php")


        ?>