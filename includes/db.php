<?php

$db["db_host"] = "localhost";
$db["db_user"] = "jason";
$db["db_pass"] = "y2756089";
$db["db_name"] = "cms";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

// $connection = mysqli_connect("localhost", "jason", "y2756089", "cms");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//just for test, after that we don't need

// if ($connection) {
//     echo "We are connected";
// }