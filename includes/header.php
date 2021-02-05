<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Soft Masr - Project">
        <meta name="author" content="Ahmed ElShahat">
        <title>Soft Masr</title>

        <!-- FontAwesome -->
        <link href="../templets/assets/css/font-awesome.min.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="../templets/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Style -->
        <link href="../templets/assets/css/style.css" rel="stylesheet">
    </head>
    <body class="admin-panel">
        <div class="admin-panel__sidebar">
            <h2>Admin Panel</h2>
            <div class="welcome">
                <p>Welcome ( <strong><?php echo $_SESSION['user']['username'];?></strong> )</p>
            </div>

            <div class="home">
                <a href="index.php" class="btn"><i class="fa fa-home"></i> Admin Home</a>
            </div>

            <div class="panel-group" id="admincontrols" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#admincontrols" href="#products" aria-expanded="true"><i class="fa fa-shopping-cart"></i> Products</a>
                        </h4>
                    </div>
                    <div id="products" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <ul>
                                <li><a href="addProduct.php">Add Product</a></li>
                                <li><a href="products.php">All Products</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#admincontrols" href="#users" aria-expanded="false"><i class="fa fa-user"></i> Users</a>
                        </h4>
                    </div>
                    <div id="users" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <ul>
                                <li><a href="addUser.php">Add User</a></li>
                                <li><a href="users.php">All Users</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#admincontrols" href="#guestbook" aria-expanded="false"><i class="fa fa-comments"></i> Guest Book</a>
                        </h4>
                    </div>
                    <div id="guestbook" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <ul>
                                <li><a href="messages.php">All Messages</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="logout">
                    <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </div>
       

        