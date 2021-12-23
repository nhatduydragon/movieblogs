<?php
     include 'inc/header.php';
     
?>

<div class="main container">
     <div class="row justify-content-center">
          <div class="col-md-8">
               <div class="card">

                    <div class="card-header">Quản lí</div>
                    <div class="card-body">
                         <p><a class="btn btn-primary" href="<?php echo $url?>admincontroller/category/create/">Thêm thể
                                   loại phim</a></p>
                         <p><a class="btn btn-success" href="<?php echo $url?>admincontroller/category/">Liệt kê thể
                                   loại
                                   phim</a></p>
                         <p><a class="btn btn-primary" href="<?php echo $url?>admincontroller/post/create/">Thêm
                                   phim</a>
                         </p>
                         <p><a class="btn btn-success" href="<?php echo $url?>admincontroller/post/">Liệt kê
                                   phim</a></p>
                         <p><a class="btn btn-primary" href="<?php echo $url?>admincontroller/postcategory/">Thêm thể
                                   loại vào phim</a></p>
                         <p><a class="btn btn-danger" href="">Liệt kê user</a></p>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php
     include 'inc/footer.php';
?>