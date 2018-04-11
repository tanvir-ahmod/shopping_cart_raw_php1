<?php
include('connection.php');
$query = "SELECT * FROM products ORDER BY id ASC";

$result = $connection->query($query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--[if IE 7]>
    <link href="css/font-awesome-ie7.min.css" rel="stylesheet">
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="topNav">
        <div class="container">
            <div class="alignR">
                <!-- <div class="pull-left socialNw">
                     <a href="#"><span class="icon-twitter"></span></a>
                     <a href="#"><span class="icon-facebook"></span></a>
                     <a href="#"><span class="icon-youtube"></span></a>
                     <a href="#"><span class="icon-tumblr"></span></a>
                 </div>-->
                <a href="index.html"> <span class="icon-home"></span> Home</a>
                <a href="#"><span class="icon-user"></span> My Account</a>
                <a href="register.html"><span class="icon-edit"></span> Free Register </a>
                <a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
                <a href="cart.php"><span class="icon-shopping-cart"></span> 2 Item(s) - <span
                            class="badge badge-warning"> $448.42</span></a>
            </div>
        </div>
    </div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
    <div id="gototop"></div>
    <header id="header">
        <div class="row">
            <div class="span4">
                <h1>
                    <a class="logo" href="index.html"><span>Twitter Bootstrap ecommerce template</span>
                        <img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
                    </a>
                </h1>
            </div>

            <div class="span8 alignR">
                <p><br> <strong> Support (24/7) 0177777777 </strong><br><br></p>
                <span class="btn btn-mini">[ 2 ] <span class="icon-shopping-cart"></span></span>
                <span class="btn btn-warning btn-mini">$</span>
            </div>
        </div>
    </header>

    <!--
    Navigation Bar Section
    -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class=""><a href="#">Home </a></li>
                    </ul>
                    <form action="#" class="navbar-search pull-right">
                        <input type="text" placeholder="Search" class="search-query span2">
                    </form>
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span>
                                Login <b class="caret"></b></a>
                            <div class="dropdown-menu">
                                <form class="form-horizontal loginFrm">
                                    <div class="control-group">
                                        <input type="text" class="span2" id="inputEmail" placeholder="Email">
                                    </div>
                                    <div class="control-group">
                                        <input type="password" class="span2" id="inputPassword" placeholder="Password">
                                    </div>
                                    <div class="control-group">
                                        <label class="checkbox">
                                            <input type="checkbox"> Remember me
                                        </label>
                                        <button type="submit" class="shopBtn btn-block">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--
    Body Section
    -->
    <!--
    Three column view
    -->
    <h3>Products </h3>
    <ul class="thumbnails">

        <?php

        //dynamically generating views
        while ($row = $result->fetch_assoc()) {

            ?>

            <li class="span4">
                <div class="thumbnail">
                    <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
                        <img src="<?php echo $row["image"]; ?>" alt="">
                        <div class="caption cntr">
                            <p><?php echo $row["p_name"]; ?></p>
                            <p><strong> $<?php echo $row["price"]; ?></strong></p>
                            <h5 class="text-info">Available quantity : <?php echo $row["quantity"]; ?></h5>
                            <input type="text" name="quantity" class="form-control" value="1">
                            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
                            <input type="hidden" name="hidden_image_path" value="<?php echo $row["image"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                            <br class="clr">
                            <input type="submit" name="add" style="margin-top:5px;" class="shopBtn"
                                   value="Add to Cart">
                        </div>
                    </form>

                    <form action="edit_item.php" method="post">
                        <div class="caption cntr">
                            <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">
                            <input type="submit" style="margin-top:5px;" class="btn btn-default" value="Edit">
                        </div>
                    </form>

                        <a class="btn btn-danger" style="margin-top:5px;"
                           href="delete_item.php?id=<?php echo $row['id']; ?>">Delete</a>

                </div>


            </li>

            <?php
        }

        ?>

    </ul>

    <!--
    Clients
    -->


    <!--
    Footer
    -->

</div><!-- /container -->

<div class="copyright">
    <div class="container">

        <span>Copyright &copy; 2018<br> e-commerce shopping cart</span>
    </div>
</div>
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script src="assets/js/shop.js"></script>
</body>
</html>