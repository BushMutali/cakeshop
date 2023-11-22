<?php

$conn = mysqli_connect('localhost', 'root', '', 'cakehaven');
if (!$conn) {
    die("Failed to connect to database");
}