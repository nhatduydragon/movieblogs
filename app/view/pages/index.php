<?php
     include 'inc/header.php';
     include 'inc/slidebar.php';
     
     //Phan trang
     $post = new PostModel();
     $count = $post->total();
     $row = $count->fetch_assoc();
     $total = $row['total'];
     
     $current_page = isset($_GET['page']) ? $_GET['page'] : 1;



     $limit = 5;
     $total_page = ceil($total / $limit);
     if ($current_page > $total_page){
          $current_page = $total_page;
     }
     else if ($current_page < 1){
          $current_page = 1;
     }
     
     $start = ($current_page - 1) * $limit;
     
     $result = $post->selectPag($start,$limit);
     
?>

<div class="container">
     <div class="main">
          <p class="tintuc text-center font-weight-bold text-uppercase">Phân tích phim (Không tóm tắt)</p>

          <?php
               foreach($result as $key){
          ?>
          <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <img src="<?php echo $key['image_post']?>" alt="" width="100%">
               </div>
               <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="box-baiviet">
                         <h5 class="tieudebaiviet"><?php echo $key['title_post']?></h5>
                         <div class="tomtatbaiviet"><?php echo $key['summary_post']?></div>
                         <a href="<?php ?>Post/detail/<?php echo $key['id_post']?>/" class="btn btn-primary">Xem
                              bài viết</a>


                    </div>
               </div>
          </div>

          <hr class="my-4">
          <?php } ?>

          <div class="phantrang">
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                         <?php
                    if($current_page > 1 && $total_page >1 )
                         echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($current_page-1).'">Prev</a></li>';
                    
                    for($i=1;$i<=$total_page;$i++)
                         if($i==$current_page)
                              echo '<li class="page-item disabled"><a class="page-link" href="#">'.$i.'</a></li>';
                         else echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($i).'">'.$i.'</a></li>';
                    
                    if ($current_page < $total_page && $total_page > 1)
                         echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($current_page+1).'"> Next</a></li>';

               ?>
                    </ul>
               </nav>
          </div>
     </div>
</div>
<?php
     include 'inc/footer.php';
?>