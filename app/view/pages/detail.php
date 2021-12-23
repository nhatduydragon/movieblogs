<?php
     include 'inc/header.php';
     
?>

<div class="main">
     <div class="container">
          <?php
                    $id = $data['id'];
                    
                    //$db = new Database();
                    // $result = $post->select();
                    foreach($data['data'] as $key){
                         echo '<div class="tieude">'.$key['title_post'].'</div>';
                         echo '<div class="tomtat">'.$key['summary_post'].'</div>';
                         echo '<hr class="my-4">';
                         echo '<div class="noidung">'.$key['content_post'].'</div>';;
                    }
               ?>
     </div>
     <div class="theloai row">
          <p class="col-3 col-md-4 col-xl-2">Thể loại:</p>
          <div class="linktheloai col-9 col-md-8 col-xl-10">
               <?php
                         $poca = new PostCategoryModel();
                         $cate = new CategoryModel();
                         $result = $poca->selectbyIdP(intval($id));
                         $result1 = $cate->select();
                         foreach($result as $key)
                              foreach($result1 as $value)
                                   if($key['id_category']==$value['id_category'])
                                        echo '<a href="'.$url.'/Category/show/'.$value['id_category'].'">'.$value['title_category'].'</a> ';
          
                              
                    ?>
          </div>
     </div>
</div>
<?php
     include 'inc/footer.php';
?>