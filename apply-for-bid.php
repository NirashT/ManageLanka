<?php
include 'con.php';
?>

<DOCTYPE html>

    <head>
        <title>ManageLanka/UserHome</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="CSS/1.css">
        <link rel="stylesheet" href="CSS/2.css">
        <link rel="stylesheet" href="CSS/3.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/crudstyles.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="ml-margin ml-light-green">

        <!-- Navigation bar with links -->
        <div class="navBar ml-dark-greenie blackText" style="max-width:100%">
            <a href="Home.html"><img src="Images/logo-removebg.png" class="left tagML ml-dark-greenie"
                    width="200px"></a>
            <a href="user_page.php" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
                style="margin-top:15px;">USER</a>
            <a href="ContactUs.html" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
                style="margin-top:15px;">CONTACT US</a>
            <a href="About Us.html" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
                style="margin-top:15px;">ABOUT US</a>
            <a href="#Main" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
                style="margin-top:15px;">HOME</a>
            <a href="javascript:void(0)" class="navBar-item buttonML ml-right ml-hide-medium ml-hide-large"
                style="margin-top:15px;" onclick="myFunction()"> &#9776;</a>
        </div>

        <div id="demo" class="navBar-block whiteBg ml-hide ml-hide-large ml-small">
            <a href="#Main" class="navBar-item buttonML">HOME</a>
            <a href="About Us.html" class="navBar-item buttonML">ABOUT US</a>
            <a href="ContactUs.html" class="navBar-item buttonML">CONTACT US</a>
            <a href="user_page.php" class="navBar-item buttonML">USER</a>
        </div>
        <br>

        <!-- ml-content is a container for fixed size centered content, 
and is wrapped around the whole page content -->
        <div class="ml-content" style="max-width:100%">



            <div class="container">
                <div class="left">
                    <?php require 'menu.php'; ?>
                </div>
                <div class="right">
                    <form class="empform" id="empform" action="" enctype="multipart/form-data">
                        <table cellspacing="20">
                            <tr>
                                <th colspan="2">
                                    <center>Bid your items for this Sunday!</center>
                                </th>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td><input type="text" name="bid" id="biid" /></td>
                            </tr>
                            <tr>
                                <td>Product description and minimum Price</td>
                                <td><input type="text" name="empname" id="empname" /></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="empemail" id="empemail" /></td>
                            </tr>
                            <tr>
                                <td>Product image</td>
                                <td><input type="file" name="pic" id="pic" /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button class="sbtn" name="submit" id="submit" value="create">Submit</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
            <script src="js/myscript.js" type="text/javascript"></script>

    </body>

    </html>