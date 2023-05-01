<?php include "admin_includes/admin_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "admin_includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>



                    <div class="col-xs-6">

                        <?php

                        if (isset($_POST["submit"])) {
                            $cat_title = $_POST["cat_title"];
                            if (empty($cat_title)) {
                                echo "<p>This field should not be empty</p>";
                            } else {
                                $query = "INSERT INTO categories(`cat_title`)";
                                $query .= "VALUES('{$cat_title}')";

                                $create_category_query = mysqli_query($connection, $query);

                                if (!$create_category_query) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                            }
                        }

                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Find all categories query

                                // if want to show all categories from the db
                                $query = "SELECT * FROM categories";


                                // if want to show limited categories from the db
                                // $query = "SELECT * FROM categories LIMIT 3";

                                $select_all_categories = mysqli_query($connection, $query);

                                // fetch the resulting rows as an array
                                $rows = mysqli_fetch_all($select_all_categories, MYSQLI_ASSOC);




                                // print_r($rows);

                                if ($rows) {
                                    foreach ($rows as $row) {
                                        $cat_id = $row["cat_id"];
                                        $cat_title = $row["cat_title"];

                                        echo "<tr>";
                                        echo "<td>{$cat_id}</td>";
                                        echo "<td>{$cat_title}</td>";
                                        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>

                                <?php
                                if (isset($_GET["delete"])) {
                                    $the_cat_id = $_GET["delete"];
                                    echo $the_cat_id;

                                    $query = "DELETE FROM categories WHERE `cat_id` = {$the_cat_id} ";

                                    $delete_query = mysqli_query($connection, $query);

                                    if (!$delete_query) {
                                        die("QUERY FAILED" . mysqli_error($connection));
                                    }
                                    // redirect to refresh the page after deleting the category
                                    header("Location: categories.php");
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "admin_includes/admin_footer.php" ?>