<?php
     include 'inc/header.php';
     $post = new PostModel();
     //Phan trang
     $path = $_SERVER['REQUEST_URI'];
     $num = strpos($path,'page=')+5;
     $num1 = strpos($path,'&');
     //echo $num.'_'.$num1.'_';
     $page = substr($path,$num,$num1-$num);
     
     $result = $post->search($data['key']);
     $total = 0;
     foreach($result as $key)
          $total++;
     
     $current_page = isset($page) ? $page : 1;
     
     $limit =5;
     $total_page = ceil($total / $limit);
     if ($current_page > $total_page){
          $current_page = $total_page;
     }
     else if ($current_page < 1){
          $current_page = 1;
     }
     
     $start = ($current_page - 1) * $limit;
     
     $result1 = $post->searchLimit($data['key'],$start,$limit);
?>

<div class="container">
     <div class="main">
          <p class="tintuc text-center font-weight-bold text-uppercase">
               Từ khóa: <?php echo $data['key']?>
          </p>

          <?php
               foreach($result1 as $key){
          ?>
          <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <img src="<?php echo $url.$key['image_post']?>" alt="" width="100%">
               </div>
               <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="box-baiviet">
                         <h5 class="tieudebaiviet"><?php echo $key['title_post']?></h5>
                         <div class="tomtatbaiviet"><?php echo $key['summary_post']?></div>
                         <a href="<?php echo $url?>Post/detail/<?php echo $key['id_post']?>/"
                              class="btn btn-primary">Xem
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
                         echo '<li class="page-item"><a class="page-link" href="'.$url.'Post/search?page='.($current_page-1).'&&keyword='.$data['key'].'">Prev</a></li>';
                    
                    for($i=1;$i<=$total_page;$i++)
                         if($i==$current_page)
                              echo '<li class="page-item disabled"><a class="page-link" href="#">'.$i.'</a></li>';
                         else echo '<li class="page-item"><a class="page-link" href="'.$url.'Post/search?page='.($i).'&&keyword='.$data['key'].'">'.$i.'</a></li>';
                    
                    if ($current_page < $total_page && $total_page > 1)
                         echo '<li class="page-item"><a class="page-link" href="'.$url.'Post/search?page='.($current_page+1).'&&keyword='.$data['key'].'"> Next</a></li>';

               ?>
                    </ul>
               </nav>
          </div>


     </div>
</div>
<?php
     include 'inc/footer.php';
?>