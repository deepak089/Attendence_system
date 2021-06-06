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
$msg = false;
$img=false;
$error=false;
if(isset($_SESSION)){
if (isset($_POST['add_student'])) {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];

    if(($_REQUEST['name']=="") || ($_REQUEST['roll_no']=="") ||($_REQUEST['course']=="")||($_REQUEST['semester']=="")||($_REQUEST['branch']==""))
    {
        $msg = true;
    }
    else
    {
        $sql =" INSERT INTO student ( name, roll_no ,course ,semester ,branch  ) VALUES ('$name','$roll_no', '$course' ,'$semester','$branch')";
              $res=mysqli_query($conn,$sql);
              
          if($res){
              $img=true;
          }
          else
          {
              $error=true;
          }
        }
      
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Signup page</title>
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
            <button id="check_record" class="btn btn-outline-primary"><a href="view.php">Record</a>
            </button>
        </div>
        </div>
        <div class="text-center header">Add new Student</div>
        <form action=""  method="post">
        <div class="form jumbotron">

            <div class="form-group">
                <label for=""> Student Name</label>
                <input type="text" class="form-control" name="name" placeholder="name">
            </div>
            <div class="form-group">
                <label for="">Roll no </label>
                <input type="text" class="form-control" name="roll_no" placeholder="Roll no">
            </div>
            <div class="form-group">
                <label for="">course</label>
                <input type="text" class="form-control" name="course"  placeholder="course">
            </div>
            <div class="form-group">
                <label for="">semester</label>
                <input type="text" class="form-control" name="semester"  placeholder="semester">
            </div>
            <div class="form-group">
                <label for="">branch</label>
                <input type="text" class="form-control" name="branch"  placeholder="branch">
            </div>
            <div class="form-gorup">
                <button name="add_student" class="btn btn-outline-dark" >Add  Student</button>
            </div>
            
        <?php if($msg) {
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All fields required to fill</div>';
        }
         ?>
         <?php if($img)
         {
            echo '<div class="alert alert-success col-sm-6 ml-5 mt-2">successully submitted</div>';
         }
         ?>
         <?php if($error)
         {
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">some error occur</div>';
         }
         ?>
        </div>
        </form>
        <div class="container">
            <div class="jumbotron">
            <div class="head text-center"><h1>Mark Attendance  <?php echo  date("d/m/Y") ;?> </h1></div>
            <form id="data" method="post" >
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Sr. no.</th>
                        <th scope="col">S. Name</th>
                        <th scope="col">S. Roll No</th>
                        <th scope="col">Course </th>
                        <th scope="col">semester</th>
                        <th scope="col">Branch </th>
                        <th>Attendance</th>
              
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql=" SELECT  *  FROM student";
                    $res=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($res)>0){
                        $count=0;
                        while($row=mysqli_fetch_assoc($res)){
                            $count++;
                            ?>
                            
                      <tr>
                      <th scope="row"><?php echo $count;?> </th>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['roll_no'];?></td>
                      <td><?php echo $row['course'];?></td>
                      <td><?php echo $row['semester'];?></td>
                      
                      <td><?php echo $row['branch'];?></td>
                      
                     <td>
                          <input type="radio" name="atnd[<?php echo $row['id'];?>]" value="present" class="present" require>P</button>
                          <input type="radio" name="atnd[<?php echo $row['id'];?>]" class="absent" value="absent" require> A</button>
                      </td>
                    </tr> 
                  
<?php


                        }
                    }
                    ?>    
                    </tbody>
                  </table>
                  
                  <input class="btn btn-primary" type="submit" value="Take Attendence">
                  </form>
                  <?php
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                      $at = $_POST['atnd'];
                      $date = date('d/m/y');

                      $sql="SELECT distinct date FROM atnd";
                      $res=mysqli_query($conn,$sql);
                      $b=false;
                      if(mysqli_num_rows($res)>0){
                          while($row=mysqli_fetch_assoc($res)){
                            //    $b=true;
                               if($date == $row['date']){
                                   $b=true;
                                   echo '<div class="alert alert-danger">
                                   attndence already taken </div>';
                               }
                          }
                        }
                          if(!$b){
                              foreach($at as $key => $value){
                                  if($value =="present"){
                                      $query ="INSERT INTO  atnd ( id, value ,date) VALUES ('$key','present','$date')";
                                      $insertres=mysqli_query($conn, $query);
                                  }
                                  else{
                                      
                                    $query ="INSERT INTO atnd (id ,value , date ) VALUES ('$key','absent','$date')";
                                    $insertres=mysqli_query($conn, $query);
                                  }

                              }
                              if($insertres){
                                echo '<div class="alert alert-danger">
                                attndence taken </div>';
                              }
                          }
                      
                  }



                  ?>
                  
                  

 
          
        </div>
    </div>
</div>
    
</body>

</html>

