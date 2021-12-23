<?php
     class CategoryModel extends Database{
          public function select(){
               $result = $this->conn->query('SELECT * FROM category ORDER BY id_category DESC');
               return $result;
          }

          public function selectById($id){
               $result = $this->conn->query('SELECT * FROM category WHERE id_category = '.$id.' ');
               return $result;
          }

          public function store($category,$status){
               $sql = 'INSERT INTO `category`(`title_category`,`status_category`) VALUES ('.'"'.$category.'"'.','.$status.')';

               if($this->conn->query($sql))
                    $_SESSION['success'] = 'Thêm thể loại thành công';
               else $_SESSION['fail'] = 'Thêm thể loại thất bại';
               //$result = $this->conn->query($sql);
               
          }

          public function update($id,$updata=[]){
               $sql = 'UPDATE `category` 
               SET `title_category`='.'"'.$updata['category'].'"'.',`status_category`= '.$updata['status'].' WHERE id_category = '.$id.'';
               if($this->conn->query($sql))
                    $_SESSION['success'] = 'Cập nhật thể loại thành công';
               else $_SESSION['fail'] = 'Cập nhật thể loại thất bại';

          }

          public function delete($id){
               $sql = 'DELETE FROM `category` WHERE id_category = '.$id.'';
               
               if($this->conn->query($sql))
                    $_SESSION['success'] = 'Xóa thể loại thành công';
               else $_SESSION['fail'] = 'Phải xóa bài viết cùng thể loại trước';
          }
     }
?>