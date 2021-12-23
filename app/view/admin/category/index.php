<?php
     include 'app/view/admin/inc/header.php';
?>
<?php
     if(isset($_GET['delete'])==0){
          $db = new CategoryModel();
          foreach($data as $key=>$value)
               $id = $value['id_category'];
          
          $db->delete($id);
     }
          
?>
<div class="main container">
     <div class="row justify-content-center">
          <div class="col-md-8">
               <div class="card">
                    <div class="card-header">Danh sách thể loại phim</div>
                    <div class="card-body">
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

                         <table class="table table-striped">
                              <thead>
                                   <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên thể loại</th>
                                        <th scope="col">Tình trạng</th>
                                        <th scope="col">Edit|Delete</th>

                                   </tr>
                              </thead>
                              <tbody>

                                   <?php 
                                        foreach($data as $key=>$value){
                                   ?>
                                   <tr>
                                        <th scope="row"><?php echo $key ?></th>
                                        <td><?php echo $value['title_category'] ?></td>
                                        <?php 
                                             if($value['status_category']) 
                                                  echo '<th class="text-primary">Kích hoạt</th>';
                                             else echo '<th class="text-danger">Không kích hoạt</th>';

                                        ?>


                                        <td>
                                             <a class="btn btn-warning"
                                                  href="<?php echo $url?>admincontroller/category/show/<?php echo $value['id_category']?>">Edit</a>
                                             <a class="btn btn-danger"
                                                  href="<?php echo $url?>admincontroller/category/?delete=0">Delete</a>
                                        </td>
                                   </tr>
                                   <?php } ?>
                              </tbody>
                         </table>

                    </div>
               </div>
          </div>
     </div>
</div>

<?php
     include 'app/view/admin/inc/footer.php';
?>