<?php

$conn = mysqli_connect('localhost', 'root', '', 'cakeshop');
if (!$conn) {
    die("Failed to connect to database");
}