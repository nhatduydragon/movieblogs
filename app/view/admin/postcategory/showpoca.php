<?php
     include 'app/view/admin/inc/header.php';
     
?>
<?php
     
     if($_SERVER['REQUEST_METHOD']=='POST'){
          $category = new CategoryModel();
          $poca = new PostCategoryModel();
         
          $result = $category->select();
          //echo $data['id'];
          $poca->delete($data['id']);
          foreach($result as $row)
               if(isset($_POST[$row['id_category']]))
                    $poca->store($data['id'],$row['id_category']);
     }
?>
</script>
<div class="main container">
     <div class="row justify-content-center">
          <div class="col-md-8">
               <div class="card">
                    <div class="card-header">
                         <?php
                              //echo $data['id'];
                              $post = new PostModel();
                              $result = $post->selectById($data['id']);
                              foreach($result as $key)
                                   echo $key['title_post'];
                    ?>
                    </div>
                    <div class="card-body">

                         <form action="" method='POST'>
                              <?php
                              $category = new CategoryModel();
                              $result1 = $category->select();
                              $poca = new PostCategoryModel();
                              $result2 = $poca->selectbyIdP($data['id']);
                              foreach($result1 as $row){
                                   $test = 0;
                                   foreach($result2 as $key){
                                        if($row['id_category'] == $key['id_category']){
                                             echo '<div class="form-group">
                                             <input checked type="checkbox" name="'.$row['id_category'].'" value="'.$row['id_category'].'">
                                             <label>'.$row['title_category'].'</label>
                                             </div>';
                                             $test = 1;
                                             break;
                                        }
                                   }
                                   if($test == 0)
                                        echo '<div class="form-group">
                                        <input type="checkbox" name="'.$row['id_category'].'" value="'.$row['id_category'].'">
                                        <label>'.$row['title_category'].'</label>
                                        </div>';
                                   else continue;
                                   }
                              ?>
                              <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>
<?php
     include 'app/view/admin/inc/footer.php';
?>