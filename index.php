
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <title>Singup Page</title>
</head>

<body>
  <body class="text-center">
  <section class="form signup">
      <header>Registration for faculty </header>
  <form action="#" method="post">
        <div class="error-txt">
          <p></p>
        </div>
        <div class="name-details">
          <div class="field input"><label for="">faculty name</label>
            <input type="text" placeholder="First name" name="name" id="name">
          </div>
          <div class="field input">
            <label for="">Faculty Last name</label>
            <input type="text" placeholder="Last name" name="lname" id="lname">
          </div>
        </div>
        <div class="field input">
            <label for="">Department</label>
            <input type="text" placeholder="Department" name="department" id="department">
          </div>
        <div class="field input">
          <label for="">Email address</label>
          <input type="email" placeholder="Enter your email" name="email" id="email">
        </div>
        <div class="field input">
          <label for="">password</label>
          <input type="password" placeholder="Enter your password" name="password" id="password">
        

        </div>
        <div class="field button">
          <input type="submit" value="continue to chat" id="btn">
        </div>
        <div class="link">Already singup?<a href="login.php">Login now</a></div>

  </form> 

</body>
  </section>

  <script src="javascript\singup.js"></script>
</body>

</html>