<?php

include 'con.php';
extract($_REQUEST);
if (isset($submit) && $submit == 'create') {
    $fname = $_FILES['profilepic']['name'];
    $tr = explode('.', $fname);
    $ext = strtolower(end($tr));
    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {

        $dir = 'profilepic';
        $newfname = $empid . '.' . $ext;
        $profilepic_path = $dir . '/' . $newfname;
        move_uploaded_file($_FILES['profilepic']['tmp_name'], $profilepic_path);

        $query = "INSERT INTO emp(id,name,email,profilepic) values('$empid','$empname','$empemail','$profilepic_path')";
        $result = mysqli_query($link, $query);
        if ($result) {
            //header('location:create.php');
            echo 'success';
        } else {
            echo mysqli_error($link);
        }
    } else {
        echo 'You have choosen ' . $ext . ' file. Please choose png or jpg or jpeg file.';
    }
} else if (isset($submit) && $submit == 'update') {

    if ($_FILES['profilepic']['size'] == 0) {
        $query = "UPDATE emp set name='$empname',email='$empemail' where id='$empid'";
        $result = mysqli_query($link, $query);
        if ($result) {
            echo 'success';
            // header('location:retrive.php');
        } else {
            echo mysqli_error($link);
        }
    } else {
        $fname = $_FILES['profilepic']['name'];
        $dd = explode('.', $fname);
        $ext = strtolower(end($dd));

        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
            $dir = 'profilepic';
            $newfname = $empid . '.' . $ext;
            $profilepic_path = $dir . '/' . $newfname;
            move_uploaded_file($_FILES['profilepic']['tmp_name'], $profilepic_path);

            $query = "UPDATE emp set name='$empname',email='$empemail',profilepic='$profilepic_path' where id='$empid'";
            $result = mysqli_query($link, $query);
            if ($result) {
                //header('location:retrive.php');
                echo 'success';
            } else {
                echo mysqli_error($link);
            }
        } else {
            echo 'You have choosen ' . $ext . ' file. Please choose png or jpg or jpeg file.';
        }
    }
} else if (isset($submit) && $submit == 'delete') {
    $query = "SELECT profilepic from emp where id=$empid";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $profilepic_path = $row['profilepic'];
    if (file_exists($profilepic_path)) {
        unlink($profilepic_path);
    }
    $dquery = "delete from emp where id=$empid";
    $result = mysqli_query($link, $dquery);
    if ($result) {
        ///header('location:retrive.php');
        echo 'success';
    }
}
