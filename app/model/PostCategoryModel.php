<?php
     class PostCategoryModel extends Database{
          public function select(){
               $sql = 'SELECT * FROM `post_category` WHERE ';
               return $result = $this->conn->query($sql);
          }

          public function selectbyIdP($id){
               $sql = 'SELECT * FROM `post_category` WHERE id_post = '.$id.'';
               return $result = $this->conn->query($sql);
          }

          public function selectbyIdC($id){
               $sql = 'SELECT * FROM `post_category` WHERE id_category = '.$id.' ORDER BY id_post DESC ';
               return $result = $this->conn->query($sql);
          }

          public function selectbyIdCPag($id,$start,$limit){
               $sql = 'SELECT * FROM `post_category` WHERE id_category = '.$id.' ORDER BY id_post DESC LIMIT '.$start.','.$limit.'';
               return $result = $this->conn->query($sql);
          }

          public function store($po,$ca){
               $sql = 'INSERT INTO `post_category`(`id_post`, `id_category`) VALUES ('.$po.','.$ca.')';
               $this->conn->query($sql);
          }

          public function delete($id){
               $sql = 'DELETE FROM `post_category` WHERE id_post = '.$id.'';
               $this->conn->query($sql);
          }

          public function total(){
               $sql = 'SELECT count(id_post) as total FROM postcategory';
               return $this->conn->query($sql);
          }
     }
?>