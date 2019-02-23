<?php
function __autoload($class)
{
    require_once "classes/$class.php";
}
if (isset($_POST['submit'])){


    $user = new user();
    $user->editUsers($_POST);
}

if(isset($_GET['id'])){
    $uid = $_GET['id'];
    $user = new user();
    $result = $user->selectOne($uid);

}




?>
<html>
<head>
    <meta charset=utf-8>
    <title>Edit Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!--navbar-->
 <?php include "admin_thems/navbar.php"?>
<?php include "admin_thems/sidebar.php"?>

            <div class="container">
                <div class="card card-register mx-auto mt-5">
                    <div class="card-header">Register an Account</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="hidden" name="id" value="<?= $result['id'] ?>">

                                            <input type="text" name="name" class="form-control" placeholder="First name" required="required" autofocus="autofocus" value="<?php echo $result['name'];?>">
                                            <label for="firstName">First name</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="text" name="lastName" class="form-control" placeholder="Last name" required="required" value="<?= $result['family'] ?>">
                                            <label for="lastName">Last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="email" name="email" class="form-control" placeholder="email" required="required" autofocus="autofocus" value="<?php echo $result['email'];?>">
                                            <label for="email">email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="password" name="password" class="form-control" placeholder="password" required="required" value="<?php echo $result['password'];?>">
                                            <label for="password">password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="text" name="city" class="form-control" placeholder="city" required="required" autofocus="autofocus" value="<?php echo $result['city'];?>">
                                            <label for="city">city</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="date" name="birthday" class="form-control" placeholder="birthday" required="required" value="<?php echo $result['birthday'];?>">
                                    <label for="birthday">birthday</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="text" name="postcode" class="form-control" placeholder="postcode" required="required" value="<?php echo $result['postcode'];?>">
                                            <label for="inputPassword">postCode</label>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="text" name="discipline" class="form-control" placeholder="discipline" required="required" value="<?php echo $result['discipline'];?>">
                                            <label for="discipline">discipline</label>
                                        </div>
                                    </div>

                                </div>
                                <input type="submit" name = "submit" class="btn btn-primary"></input>

                        </form>

        </div>
    </div>
                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Page level plugin JavaScript-->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin.min.js"></script>

                <!-- Demo scripts for this page-->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-bar-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>