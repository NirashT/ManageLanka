<!--dump truck schedule-->
<?php
session_start();
require 'dbcon.php';


if(isset($_POST['delete_schedule']))
{
    $schedule_id = mysqli_real_escape_string($con, $_POST['delete_schedule']);

    $query = "DELETE FROM schedule WHERE id='$schedule_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "schedule Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "schedule Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_schedule']))
{
    $schedule_id = mysqli_real_escape_string($con, $_POST['schedule_id']);

    $truck_name = mysqli_real_escape_string($con, $_POST['truck_name']);
    $area = mysqli_real_escape_string($con, $_POST['area']);
    $division = mysqli_real_escape_string($con, $_POST['division']);
    $clock = mysqli_real_escape_string($con, $_POST['clock']);

    $query = "UPDATE schedule SET truck_name='$truck_name', area='$area', division='$division', clock='$clock' WHERE id='$schedule_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "schedule Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "schedule Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_schedule']))
{
    $truck_name = mysqli_real_escape_string($con, $_POST['truck_name']);
    $area = mysqli_real_escape_string($con, $_POST['area']);
    $division = mysqli_real_escape_string($con, $_POST['division']);
    $clock = mysqli_real_escape_string($con, $_POST['clock']);

    $query = "INSERT INTO schedule (truck_name,area,division,clock) VALUES ('$truck_name','$area','$division','$clock')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "schedule Created Successfully";
        header("Location: schedule-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "schedule Not Created";
        header("Location: schedule-create.php");
        exit(0);
    }
}


/*bulk truck order */
if(isset($_POST['delete_req']))
{
    $req_id = mysqli_real_escape_string($con, $_POST['delete_req']);

    $query = "DELETE FROM bulkreq WHERE id='$req_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "req Deleted Successfully";
        header("Location: municipal.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "req Not Deleted";
        header("Location: municipal.php");
        exit(0);
    }
}


if(isset($_POST['update_req']))
{
    $req_id = mysqli_real_escape_string($con, $_POST['req_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $type = mysqli_real_escape_string($con, $_POST['type']);

    $query = "UPDATE bulkreq SET name='$name', email='$email', contact='$contact', address='$address' , type='$type'WHERE id='$req_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "schedule Updated Successfully";
        header("Location: municipal.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "schedule Not Updated";
        header("Location: municipal.php");
        exit(0);
    }

}


if(isset($_POST['save_req']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $type = mysqli_real_escape_string($con, $_POST['type']);

    $query = "INSERT INTO bulkreq (name,email,contact,address,type) VALUES ('$name','$email','$contact','$address','$type')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Order request sent! Await a confirmation email in 5 minutes";
        header("Location: req-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "order failed. please try again";
        header("Location: req-create.php");
        exit(0);
    }
}

?>

