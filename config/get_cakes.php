<?php
require_once "config/db.php";

$sql = "SELECT * FROM cakes";
$query = mysqli_query($conn, $sql);
if(!$query){
    echo "<script>
    alert('Failed! Try again');
    </script>";
}
$query;

$cakes = mysqli_num_rows($query);

mysqli_close($conn);