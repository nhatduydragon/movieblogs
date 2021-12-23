<?php
     class AdminController extends Controller{
          //http://localhost/MyProject/admincontroller/category/show/17/
          public function index(){
               $this->view('admin/index');
          }

          public function category($action = '',$id = ''){

               switch ($action){
                    case 'show':
                         $cate = $this->model('CategoryModel');
                         $data = $cate->selectById($id);
                         $this->view('admin/category/show',$data);
                         break;
                    case 'create':
                         $cate = $this->model('CategoryModel');
                         $this->view('admin/category/create');
                         break;
                    default:
                         $cate = $this->model('CategoryModel');
                         $data = $cate->select();
                         $this->view('admin/category/index',$data);
               }

                    
          }

          public function post($action = '',$id = ''){

               switch ($action){
                    case 'show':
                         $cate = $this->model('PostModel');
                         $data = $cate->selectById($id);
                         
                         $this->view('admin/post/show',$data);
                         break;
                    case 'create':
                         $post = $this->model('PostModel');
                         $this->view('admin/post/create');
                         break;
                    default:
                         $post = $this->model('PostModel');
                         $data = $post->select();
                         $this->view('admin/post/index',$data);
               }

                    
          }

          public function postcategory($action = '',$id = ''){
               $post = $this->model('PostModel');
               //$data = $post->select();
               $cate = $this->model('CategoryModel');
               $poca = $this->model('PostCategoryModel');
               $data = $poca->selectbyIdP($id);
               if($action=='showpoca')
                    $this->view('admin/postcategory/showpoca',[
                         'id' => $id,
                         'data' => $data
                    ]);
               else $this->view('admin/postcategory/postcategory');
          }

          
     }
?>