<?php
ob_start();
session_start();
?>

<html lang="en">

<head>


   <title>Professor Login Page</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <style>
      body {
         text-align: center;
         padding-top: 40px;
         padding-bottom: 40px;
         background-color: #ffffff;
      }

      .form-signin {
         text-align: center;
         max-width: 330px;
         padding: 15px;
         margin: 0 auto;
         color: #017572;
      }

      .form-signin .form-signin-heading,
      .form-signin .checkbox {
         margin-bottom: 20px;
      }

      .form-signin .checkbox {
         font-weight: normal;
      }

      .form-signin .form-control {
         position: relative;
         height: auto;
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         padding: 10px;
         font-size: 16px;
      }

      .form-signin .form-control:focus {
         z-index: 2;
      }

      .form-signin input[type="email"] {
         margin-bottom: -1px;
         border-bottom-right-radius: 0;
         border-bottom-left-radius: 0;
         border-color: #000000;
      }

      .form-signin input[type="password"] {
         margin-bottom: 10px;
         border-top-left-radius: 0;
         border-top-right-radius: 0;
         border-color: #000000;
      }

      .form-signin button {
         text-align: center;
      }

      h2 {
         text-align: center;
         color: #000000;

      }
   </style>

   <!-- Bootstrap CSS -->

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</head>

<body>

   <div class="mx-5">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">

         <a class="navbar-brand" href="homePage.html">Home</a>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

         </button>

         <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">

               <li class="nav-item active">

                  <a class="nav-link" href="loginStudent.php">Student</a>

               </li>

               <li class="nav-item">

                  <a class="nav-link" href="loginScheduler.php">Scheduler</a>

               </li>

            </ul>

         </div>

      </nav>

      <h2>Professor Login </h2>
      <div class="container form-signin">

         <?php
         $msg = '';

         if (
            isset($_POST['login']) && !empty($_POST['E-mail'])
            && !empty($_POST['Your Password'])
         ) {

            if (
               $_POST['username'] == 'User4' &&
               $_POST['password'] == 'User4'
            ) {
               $_SESSION['valid'] = true;
               $_SESSION['timeout'] = time();
               $_SESSION['username'] = 'Professor';

               echo 'You have entered valid use name and password';
            } else {
               $msg = 'Wrong username or password';
            }
         }
         ?>
      </div> <!-- /container -->

      <div class="container">

         <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                         ?>" method="post">
            <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
            <input type="text" class="form-control" name="username" placeholder="Username = E-mail" required autofocus></br>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div>
               <a href="professorHome.html" class="btn btn-primary">Login</a>
            </div>
         </form>
         <div>
            <a href="logout.php" class="btn btn-primary">Close the system</a>
         </div>

      </div>

      <!-- Bootstrap Script -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <!-- Bootstrap Javascript -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </div>
</body>

</html>