<?php
     class Post extends Controller{
          public function index(){
               
               $post = $this->model('PostModel');
               $result = $post->select();
          }
          
          public function detail($id){
               $this->model('CategoryModel');
               $this->model('PostCategoryModel');
               $post = $this->model('PostModel');
               $data = $post->selectById($id);
               $this->view('pages/detail',[
                    'id' => $id,
                    'data' => $data
               ]);
          }

          public function show(){
               
               $en = $this->model('Post');
               echo 'Hello ';
               // $this->view('Post',[
               //      'style'=>'red',
               //      'title'=>$en->getPost()
               // ]);
               //view
          }

          public function sum($a,$b){
               $en = $this->model('PostModel');
               $sum = $en->sumPost($a,$b);
               $this->view('Post',[
                    'Number'=>$sum,
                    'Color'=>'red',
                    'Hello'=>'Hello from Japan',
               ]);
          }
          static function create(){
               echo 'Post - Create';
          }

          public static function update(){
               echo 'Post - Update';
          }

          public static function delete($id){
               echo 'Post - Delete';
          }

          public function search(){
               $this->model('CategoryModel');
               $this->model('PostCategoryModel');
               $this->model('PostModel');
               $path = $_SERVER['REQUEST_URI'];
               $num = strpos($path,'keyword=');
               $str = substr($path,$num+8);
               
               $this->view('pages/search',[
                    'key' => $str
               ]);
          }


     }

?>