<?php
     include 'app/view/admin/inc/header.php';
?>

<?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
          $title = $_POST['title'];
          $image = 'public/img/'.time().'_'.$_FILES['image']['name'];
          $summary = $_POST['summary'];
          $content = $_POST['content'];
          $status = $_POST['status'];
          $db = new PostModel();
          $db->store($title,$image,$summary,$content,$status);
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
                    <div class="card-header">Thêm phim</div>
                    <div class="card-body">
                         <form action="" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                   <label>Tiêu đề phim</label>
                                   <input name="title" type="text" class="form-control" placeholder="Enter Movie name">
                              </div>
                              <div class="form-group">
                                   <label for="exampleInputEmail1">Hình ảnh</label>
                                   <input type="file" name="image" class="form-control">
                              </div>
                              <div class="form-group">
                                   <label>Tóm tắt</label>
                                   <textarea class="form-control" id="ckeditor_tomtat" name="summary"
                                        placeholder="Tóm tắt..."></textarea>
                              </div>
                              <div class="form-group">
                                   <label>Nội dung</label>
                                   <textarea class="form-control" id="ckeditor_noidung" name="content"
                                        placeholder="Nội dung..."></textarea>
                              </div>
                              <div class="form-group">
                                   <label>Tình trạng</label>
                                   <select name="status" class="form-control">
                                        <option value="0">Không</option>
                                        <option selected value="1">Kích hoạt</option>
                                   </select>
                              </div>

                              <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                    </div>
               </div>
          </div>
     </div>

     <?php
     include 'app/view/admin/inc/footer.php';
?>