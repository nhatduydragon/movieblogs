<?php
     include 'inc/header.php';
     $cate = new CategoryModel();
     $result = $cate->selectById($data['id']);
     foreach($result as $value){
          $title = $value['title_category'];
          $id = intval($value['id_category']);
     }
     $poca = new PostCategoryModel();
     $post = new PostModel();
     //Phan trang
     // $count = $post->total();
     // $row = $count->fetch_assoc();
     // $total = $row['total'];
     $result1 = $poca->selectbyIdC($id);
     $total = 0;
     foreach($result1 as $i)
          $total++;
     
     $current_page = isset($_SESSION['page']) ? $_SESSION['page'] : 1;

     

     $limit = 5;
     $total_page = ceil($total / $limit);
     
     if ($current_page > $total_page){
          $current_page = $total_page;
     }
     else if ($current_page < 1){
          $current_page = 1;
     }
     $start = ($current_page - 1) * $limit;
     //echo $start.' '.$limit;
     $result1 = $poca->selectbyIdCPag($id,$start,$limit);
     $result2 = $post->select();
     
?>

<div class="container">
     <div class="main">
          <p class="tintuc text-center font-weight-bold text-uppercase">
               <?php echo $title;?>
          </p>
          <?php
               
               foreach($result1 as $value)
                    foreach($result2 as $key){
                         if($value['id_post']==$key['id_post']){
          ?>
          <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <img src="<?php echo $url.$key['image_post']?>" alt="" width="100%">
               </div>
               <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="box-baiviet">
                         <h5 class="tieudebaiviet"><?php echo $key['title_post']?></h5>
                         <div class="tomtatbaiviet"><?php echo $key['summary_post']?></div>
                         <a href="<?php echo $url?>Post/detail/<?php echo $key['id_post']?>" class="btn btn-primary">Xem
                              bài viết</a>


                    </div>
               </div>
          </div>
          <hr class="my-4">
          <?php }} ?>
          <div class="phantrang">
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                         <?php
                    if($current_page > 1 && $total_page >1 ){
                         echo '<li class="page-item"><a class="page-link" href="'.$url.'Category/show/'.$id.'/?page='.($current_page-1).'">Prev</a></li>';
                         $_SESSION['page'] = $current_page-1;
                    }
                         
                    
                    for($i=1;$i<=$total_page;$i++)
                         if($i==$current_page)
                              echo '<li class="page-item disabled"><a class="page-link" href="#">'.$i.'</a></li>';
                         else {
                              echo '<li class="page-item"><a class="page-link" href="'.$url.'Category/show/'.$id.'/?page='.($i).'">'.$i.'</a></li>';
                              $_SESSION['page'] = $i;
                         }
                    
                    if ($current_page < $total_page && $total_page > 1){
                         echo '<li class="page-item"><a class="page-link" href="'.$url.'Category/show/'.$id.'/?page='.($current_page+1).'"> Next</a></li>';
                         $_SESSION['page'] = $current_page+1;
                    }
                         

               ?>
                    </ul>
               </nav>
          </div>



     </div>
</div>
<?php
     include 'inc/footer.php';
?>