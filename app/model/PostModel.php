<?php
     class PostModel extends Database{
          
          public function select(){
               $result = $this->conn->query('SELECT * FROM post ORDER BY id_post DESC ');
               return $result;
          }
          
          public function total(){
               $sql = 'SELECT count(id_post) as total FROM post';
               return $this->conn->query($sql);
          }

          public function selectPag($start,$limit){
               $result = $this->conn->query('SELECT * FROM post ORDER BY id_post DESC LIMIT '.$start.','.$limit.'');
               return $result;
          }

          public function selectById($id){
               $result = $this->conn->query('SELECT * FROM post WHERE id_post = '.$id.' ');
               return $result;
          }

          public function store( $title,$image,$summary,$content,$status){
               $sql = 'INSERT INTO `post`(`title_post`, `summary_post`, `content_post`, `image_post`, `status_post`) 
               VALUES ('.'"'.$title.'"'.','.'"'.$summary.'"'.','.'"'.$content.'"'.','.'"'.$image.'"'.','.$status.')';
               if($this->conn->query($sql)){
                    $_SESSION['success'] = 'Thêm phim thành công';
                    move_uploaded_file($_FILES['image']['tmp_name'],$image);
               }
                    
               else $_SESSION['fail'] = 'Thêm phim thất bại';
          }

          public function update($id,$updata=[]){
               $image = 'public/img/'.time().'_'.$updata['image'];
               if(empty($updata['image'])){
                    $sql = 'UPDATE `post` 
                    SET `title_post`='.'"'.$updata['title'].'"'.',`summary_post`='.'"'.$updata['summary'].'"'.',
                    `content_post`='.'"'.$updata['content'].'"'.',`status_post`='.$updata['status'].' WHERE id_post='.$id.'';
                    if($this->conn->query($sql))
                         
                         $_SESSION['success'] = 'Cập nhật phim thành công w';    
                    else $_SESSION['fail'] = 'Cập nhật phim thất bại w';
               }
               else{
                    $sql = 'UPDATE `post` 
                    SET `title_post`='.'"'.$updata['title'].'"'.',`summary_post`='.'"'.$updata['summary'].'"'.',
                    `content_post`='.'"'.$updata['content'].'"'.',`image_post`='.'"'.$image.'"'.',`status_post`='.$updata['status'].' WHERE id_post='.$id.'';
                    if($this->conn->query($sql)){
                         unlink($updata['ex_img']);
                         $image = 'public/img/'.time().'_'.$updata['image'];
                         move_uploaded_file($_FILES['image']['tmp_name'],$image);
                         $_SESSION['success'] = $image;   
                    }
                          
                    else $_SESSION['fail'] = 'Cập nhật phim thất bại';
               }
          }

          public function search($str){
               $sql = 'SELECT * FROM `post` WHERE `title_post` LIKE '.'"%'.$str.'%"'.' 
                    OR `summary_post` LIKE '.'"%'.$str.'%"'.' OR `content_post` LIKE '.'"%'.$str.'%"'.'
                    ORDER BY id_post DESC ';
                              
               return $this->conn->query($sql);
          }

          public function searchLimit($str,$start,$limit){
               $sql = 'SELECT * FROM `post` WHERE `title_post` LIKE '.'"%'.$str.'%"'.' 
                    OR `summary_post` LIKE '.'"%'.$str.'%"'.' OR `content_post` LIKE '.'"%'.$str.'%"'.'
                    ORDER BY id_post DESC LIMIT '.$start.','.$limit.'';
               
               

               return $this->conn->query($sql);
          }
          
     }
?>