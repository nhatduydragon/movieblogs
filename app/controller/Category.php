<?php
     class Category extends Controller{
          public static function index(){
               echo 'Category - Index';
          }
          public function show($id){
               $this->model('PostModel');
               $this->model('CategoryModel');
               $this->model('PostCategoryModel');
               $this->view('pages/the-loai',[
                    'id' => $id
               ]);
          }

          public static function create(){
               echo 'Category - Create';
          }

          public static function update(){
               echo 'Category - Update';
          }

          public static function delete($id){
               echo 'Category - Delete';
          }

     }
?>