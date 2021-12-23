<?php
     include 'app/view/admin/inc/header.php';
?>
<?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
          foreach($data as $key){
               $id = $key['id_post'];
               $ex_img = $key['image_post'];
          }
               
          $title = $_POST['title'];
          $image = $_FILES['image']['name'];
          $summary = $_POST['summary'];
          $content = $_POST['content'];
          $status = $_POST['status'];
          $updata = [
               'title' => $title,
               'image' => $image,
               'summary' => $summary,
               'content' => $content,
               'status' => $status,
               'ex_img' => $ex_img
          ];
          
          $db = new PostModel();
          $db->update($id,$updata);
     }
?>
<div class="main container">
     <div class="row justify-content-center">
          <div class="col-md-8">
               <?php 
                         if(isset($_SESSION['success'])){
                              echo '<div class="alert alert-primary" role="alert">
                                        '.$_SESSION['success'].'
                                   </div>';
                              unset($_SESSION['success']);
                         }
                         if(isset($_SESSION['fail'])){
                              echo '<div class="alert alert-danger" role="alert">
                                        '.$_SESSION['fail'].'
                                   </div>';
                              unset($_SESSION['fail']);
                         }
                         
               ?>

               <div class="card">
                    <div class="card-header">Cap nhat phim</div>
                    <div class="card-body">
                         <form action="" method="POST" enctype="multipart/form-data">
                              <?php
                                   foreach($data as $key)
                                        $id = $key['id_post'];
                                   $db = new PostModel();
                                   $bit = $db->selectById($id);
                                   foreach($bit as $key){
                              ?>
                              <div class="form-group">
                                   <label>Tiêu đề phim</label>
                                   <input name="title" type="text" class="form-control"
                                        value="<?php echo $key['title_post']?>">
                              </div>
                              <div class=" form-group">
                                   <label for="exampleInputEmail1">Hình ảnh</label>
                                   <input type="file" name="image" class="form-control"><br>
                                   <img src="<?php echo $url.$key['image_post']?>" width="20%" alt="">
                              </div>
                              <div class="form-group">
                                   <label>Tóm tắt</label>
                                   <textarea class="form-control" id="ckeditor_tomtat" name="summary">
                                        <?php echo $key['summary_post']?>
                                   </textarea>
                              </div>
                              <div class="form-group">
                                   <label>Nội dung</label>
                                   <textarea class="form-control" id="ckeditor_noidung" name="content">
                                        <?php echo $key['content_post']?>
                                   </textarea>
                              </div>
                              <div class="form-group">
                                   <label>Tình trạng</label>

                                   <select name="status" class="form-control">
                                        <?php
                                        if($key['status_post']==1)
                                             echo '<option value="0">Không</option>
                                        <option selected value="1">Kích hoạt</option>';
                                        else echo '<option selected value="0">Không</option>
                                                  <option  value="1">Kích hoạt</option>';
                                   ?>

                                   </select>
                              </div>

                              <button type="submit" class="btn btn-primary">Submit</button>
                              <?php
                                   }
                              ?>
                         </form>
                    </div>
               </div>
          </div>
     </div>

     <?php
     include 'app/view/admin/inc/footer.php';
?>