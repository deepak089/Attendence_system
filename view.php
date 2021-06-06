<?php 

if(!isset($_SESSION)){
    session_start();
}
include 'php/config.php';
if(isset($_SESSION['is_login'])){

    $email=$_SESSION['email'];
}
else
{
    echo "<script> location.href='index.php';</script>";
}
?> 
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Data view</title>
    <style>
    #logout{
float: left;
margin-left: 50px;

}

#check_record{
    float: right;
margin-right: 50px;
    
}
</style>
</head>

<body>

<div class="wrapper">
        <div class="text-center heading">
        Attendance System
        </div>
        <div class="button">
        <div class="logout_button">
            <button id="logout" class="btn btn-outline-primary"><a href="logout.php">logout</a></button>
        </div>
      
        <div class="check_record">
            <button id="check_record" class="btn btn-outline-primary"><a href="dash.php">Add Student</a>
            </button>
        </div>
        </div>
        <div class="text-center add">View Record </div>

            <form action="" method="post" class="data">
                <table class="table bold jumbotron">
                    <thead>
                        <tr>
                            <th scope="col">Sr. no.</th>
                            <th scope="col">Date</th>
                            <th scope="col">view</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $query = "SELECT distinct date FROM atnd";
                            $res = mysqli_query($conn, $query);
                            $count = 0;
                            if (mysqli_num_rows($res) > 0) {

                                while ($row = mysqli_fetch_assoc($res)) {
                                    $count++;
                            ?>
                                    <th scope="row"><?php echo $count; ?> </th>
                                    <td><?php echo $row['date']; ?></td>
                                    <td>
                                    <button class="btn btn-outline-dark">
                                        <a href="viewp.php?date=<?php echo $row['date']; ?>" >view</a></button>
                                    </td>
                                    </td>
                        </tr>
                <?php
                                }
                            }
                ?>
                    </tbody>
                </table>


            </form>
        </div>
   
</body>

</html>