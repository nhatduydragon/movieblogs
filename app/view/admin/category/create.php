<?php
     include 'app/view/admin/inc/header.php';
?>
<?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
          $category = $_POST['category'];
          $status = $_POST['status'];
          $db = new CategoryModel();
          $db->store($category,$status);
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
                    <div class="card-header">Thêm thể loại phim</div>
                    <div class="card-body">
                         <form action="" method="POST">
                              <div class="form-group">
                                   <label>Tiêu đề thể loại phim</label>
                                   <input name="category" type="text" class="form-control" placeholder="Enter category">
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