<?php
     include 'app/view/admin/inc/header.php';
?>
<?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
          $category = $_POST['category'];
          $status = $_POST['status'];
          $updata = [
               'category' => $category,
               'status' => $status
          ];
          foreach($data as $key)
               $id = $key['id_category'];
          $db = new CategoryModel();
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
                    <div class="card-header">Cập nhật thể loại phim</div>
                    <div class="card-body">
                         <form action="" method="POST">
                              <?php 
                                   foreach($data as $key){
                              ?>
                              <div class="form-group">
                                   <label>Tiêu đề thể loại phim</label>
                                   <input name="category" type="text" class="form-control"
                                        value="<?php echo $key['title_category']?>">
                              </div>
                              <div class="form-group">
                                   <label>Tình trạng</label>
                                   <select name="status" class="form-control">
                                        <?php
                                             if($key['status_category'] == 0)
                                                  echo '<option selected value="0">Không</option>
                                                       <option  value="1">Kích hoạt</option>';
                                             else echo '<option value="0">Không</option>
                                                       <option selected value="1">Kích hoạt</option>';
                                        ?>

                                   </select>
                              </div>
                              <?php } ?>
                              <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                    </div>
               </div>

          </div>
     </div>

     <?php
     include 'app/view/admin/inc/footer.php';
?>