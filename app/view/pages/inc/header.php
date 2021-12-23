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
     <link rel="stylesheet" type="text/css" href="<?php echo $url?>public/css/style.css">
     <script src="<?php echo $url?>public/js/main.js"></script>
     <title>MovieBlogsMVC</title>
</head>

<body>
     <div class="container">
          <img src="<?php echo $url?>public/img/logomovie.png" width="20%" alt="">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <!-- <a class="navbar-brand" href="#">Navbar</a> -->
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                         <li class="nav-item ">
                              <a class="nav-link" href="<?php echo $url?>">Home<span
                                        class="sr-only">(current)</span></a>
                         </li>
                         <!-- <li class="nav-item">
                              <a class="nav-link" href="">Movie</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="">TV/series</a>
                         </li> -->
                         <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Category
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                   <?php
                                        $db = new CategoryModel();
                                        $result = $db->select();
                                        foreach($result as $key)
                                             echo '<a class="dropdown-item" href="'.$url.'/Category/show/'.$key['id_category'].'">'.$key['title_category'].'</a>';
                                   ?>
                                   <!-- <a class="dropdown-item" href="">A</a>
                                   <a class="dropdown-item" href="">B</a>
                                   <a class="dropdown-item" href="">C</a>
                                   <a class="dropdown-item" href="">D</a> -->
                              </div>
                         </li>

                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="<?php echo $url?>Post/search" method="GET">
                         <input name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search"
                              aria-label="Search">
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
               </div>
          </nav>