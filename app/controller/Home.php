<?php
     class Home extends Controller{
          public function index(){
               $db = $this->model('PostModel');
               $cate = $this->model('CategoryModel');
               $this->model('PostCategoryModel');
               $data = $db->select();
               $view = $this->view('pages/index',$data);
          }

          public static function show(){
               echo 'Home - Show';
          }


          public static function create(){
               echo 'Home - Create';
          }

          public static function update(){
               echo 'Home - Update';
          }

          public static function delete($id){
               echo 'Home - Delete';
          }

     }
?>