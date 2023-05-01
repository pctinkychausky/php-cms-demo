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

            $query = "SELECT * FROM posts";

            $results = mysqli_query($connection, $query);

            $posts = mysqli_fetch_all($results, MYSQLI_ASSOC);

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