<?php
     include 'app/view/admin/inc/header.php';
     $post = new PostModel();
     $count = $post->total();
     $row = $count->fetch_assoc();
     $total = $row['total'];
     
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
     
     $result = $post->selectPag($start,$limit);
?>

<div class="main container">
     <div class="row justify-content-center">
          <div class="col-md-8">
               <div class="card">
                    <div class="card-header">Danh sách phim</div>
                    <div class="card-body">

                         <table class="table table-striped">
                              <thead>
                                   <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên phim</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Tóm tắt</th>
                                        <th scope="col">Tình trạng</th>
                                        <th scope="col">Edit|Delete</th>

                                   </tr>
                              </thead>
                              <tbody>

                                   <?php
                                        foreach($result as $key=>$value){
                                   ?>
                                   <tr>
                                        <th scope="row"><?php echo $key?></th>
                                        <td><?php echo $value['title_post']?></td>
                                        <td><img src="<?php echo $url.$value['image_post']?>" alt="">
                                        </td>
                                        <td><?php echo $value['summary_post']?></td>
                                        <?php 
                                             if($value['status_post']) 
                                                  echo '<th class="text-primary">Kích hoạt</th>';
                                             else echo '<th class="text-danger">Không kích hoạt</th>';

                                        ?>
                                        <td>
                                             <a class="btn btn-warning"
                                                  href="<?php echo $url?>admincontroller/post/show/<?php echo $value['id_post']?>">Edit</a>
                                             <a class="btn btn-danger" href="">Delete</a>
                                        </td>
                                   </tr>
                                   <?php }?>
                              </tbody>
                         </table>
                         <div class="phantrang">
                              <nav aria-label="Page navigation example">
                                   <ul class="pagination">
                                        <?php
                                             if($current_page > 1 && $total_page >1 ){
                                                  echo '<li class="page-item"><a class="page-link" href="'.$url.'admincontroller/post/?page='.($current_page-1).'">Prev</a></li>';
                                                  $_SESSION['page'] = $current_page-1;
                                             }
                                                  
                    
                                             for($i=1;$i<=$total_page;$i++)
                                                  if($i==$current_page)
                                                  echo '<li class="page-item disabled"><a class="page-link" href="#">'.$i.'</a></li>';
                                                  else {
                                                       echo '<li class="page-item"><a class="page-link" href="'.$url.'admincontroller/post/?page='.($i).'">'.$i.'</a></li>';
                                                       $_SESSION['page'] = $i;
                                                       
                                                  }
                    
                                             if ($current_page < $total_page && $total_page > 1){
                                                  echo '<li class="page-item"><a class="page-link" href="'.$url.'admincontroller/post/?page='.($current_page+1).'"> Next</a></li>';
                                                  $_SESSION['page'] = $current_page+1;
                                             }
                                             

                                        ?>
                                   </ul>
                              </nav>
                         </div>

                    </div>
               </div>

               </ul>

          </div>
     </div>

</div>

</div>

<?php
     include 'app/view/admin/inc/footer.php';
?>