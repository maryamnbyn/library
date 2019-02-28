<?php

    function __autoload($class)
    {
        require_once "classes/$class.php";
    }
    if (isset($_GET['del']))
    {
        $id   = $_GET['del'];
        $user = new user();
        $user->destroy($id);
    }

?>
<html>
<head>
    <meta charset=utf-8>
    <title>User List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php include "admin_thems/navbar.php"?>
<?php include "admin_thems/sidebar.php"?>

<!--create table-->

    <div class="col-md-10 mt-3">
        <div class="jumbotron">
            <h4 class="mb-4">User List!</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Family</th>
                    <th scope="col">birthday</th>
                    <th scope="col">postcode</th>
                    <th scope="col">discipline</th>
                    <th scope="col">city</th>
                    <th scope="col">email</th>


                </tr>
                </thead>
                <tbody>
                <?php
                $user = new user();
                $rows = $user->selectUsers();
                foreach($rows as $row){

                    ?>
                    <tr>

                        <th scope="row"><?php echo $row['id'];?></th>
                        <td><?php echo  $row['name'];?></td>
                        <td><?php echo $row['family'];?></td>
                        <td><?php echo $row['birthday'];?></td>
                        <td><?php echo $row['postcode'];?></td>
                        <td><?php echo $row['discipline'];?></td>
                        <td><?php echo $row['city'];?></td>
                        <td><?php echo $row['email'];?></td>


                        <td><a class="btn btn-sm btn-primary" href="edit_userList.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp
                            <a class="btn btn-sm btn-danger" href="userList.php?del=<?php echo $row['id'];?>">Delete</a></td>
                    </tr>
                    <?php

                }
                ?>


                </tbody>
            </table>
        </div>

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