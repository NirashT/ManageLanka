<?php
$link = mysqli_connect('localhost', 'root', '', 'user_form');

if (!$link) {
    die('Connection error' . mysqli_connect_error());
}
