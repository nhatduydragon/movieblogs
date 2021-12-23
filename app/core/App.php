<?php     
     class App{
          protected $controller = 'Home';
          protected $action = 'index';
          protected $params = [];
          
          public function __construct(){
               //http://localhost/MVC/post/detail/1/
               
               $arr = $this->urlProcess();
               
               // Xu li Controller
               if(isset($arr[0])){
                    if(file_exists("./app/controller/".$arr[0].".php")){
                         $this->controller = $arr[0];
                         unset($arr[0]);
                    }
               }
               
               //require_once "./app/controller/".$this->controller.".php";
               include "./app/controller/".$this->controller.".php";
               $this->controller = new $this->controller;
               // Xu li Action
               if(isset($arr[1])){
                    if(method_exists($this->controller,$arr[1])){
                         $this->action = $arr[1];
                         
                    }
                    unset($arr[1]);
               }
               //Xu li parameter
               $this->params = $arr?array_values($arr):[];
               
               
               call_user_func_array([$this->controller,$this->action], $this->params);
               
               
          }

          public function urlProcess(){
               if(isset($_GET['url'])){
                    return explode('/',filter_var(trim($_GET['url'],'/')));
                    
               }
          }
     }
?>