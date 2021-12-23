<?php
     $url = 'http://localhost/MyProject/';
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script src="<?php echo $url?>public/js/main.js">

     </script>
     <!-- <link rel="stylesheet" type="text/css" href="public/css/style.css"> -->
     <title>MovieBlogsMVC</title>

     <style>
     .main {
          margin-top: 40px;
     }

     .main {
          margin-top: 40px;
     }

     img {
          width: 180px;
     }
     </style>
</head>


<body>
     <div class="bg bg-dark">
          <div class="container">
               <ul class="nav justify-content-end">
                    <li class="nav-item dropdown">
                         <a class="text-light nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                              aria-haspopup="true" aria-expanded="false">Admin</a>
                         <div class="dropdown-menu">
                              <a class="dropdown-item" href="http://localhost/MyProject/admincontroller/">Dashboard</a>
                              <a class="dropdown-item" href="">Logout</a>
                         </div>
                    </li>
               </ul>
          </div>
     </div>